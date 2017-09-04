<?php
/*=========================================================================*
**			Hangman Mod by Pete (developed for phpBB-Boards)
**             	        -------------------
**   begin                : Avril, 2004
**   copyright            : (c) 2004 Pete©
**   email                : p.s16@web.de
**
**
****************************************************************************
**
**   This program is free software; you can redistribute it and/or modify
**   it under the terms of the GNU General Public License as published by
**   the Free Software Foundation; either version 2 of the License, or
**   (at your option) any later version.
*****************************************************************************/

define('IN_PHPBB', true);
define('IN_HANGMAN',true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/functions_hangman.'.$phpEx);
//$hangman_cfg['show_numbers'] = true;
// Start session management
$userdata = session_pagestart($user_ip, PAGE_HANGMAN);
init_userprefs($userdata);
if ($userdata['user_id'] == ANONYMOUS)
{
   include($phpbb_root_path . 'language/lang_' .$board_config['default_lang']. '/lang_hangman.' . $phpEx);
}
else
{
   include($phpbb_root_path . 'language/lang_' .$userdata['user_lang']. '/lang_hangman.' . $phpEx);
}
// End session management 

// Make sure the player is registered if not AND $hangman_cfg says he can't see any...
$user_id = $userdata['user_id'];
//i hate my mistakes in writing userid always i wanted user_id!!!
$userid = $user_id;

if ((!$userdata['session_logged_in'] && $user_id == ANONYMOUS) && !$hangman_cfg['allow_guest'])
{
	$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";
	header($header_location . append_sid("login.$phpEx?redirect=hangman.$phpEx", true));
	exit;
}

$page_title = 'Hangman';

//get submitted params ;)
$params = array(
		'mode'	=> 'mode',	'buchstabe' => 'buchstabe',	'order'	=> 'order',
		'offset'=> 'offset',	'game_index'=> 'game_index',	'maximal_versuche' => 'maximal_versuche',
		'wort'		=> 'wort','subject' => 'subject',	'hilfe'	=> 'hilfe',
		'gueltige_tage' => 'gueltige_tage','order' => 'order', 	'confirm'=> 'confirm',
		'filter'	=> 'filter','hfilter' => 'hfilter','horder'=>'horder','hlimit'=>'hlimit');
while( list($var, $param) = @each($params) )
{
	if ( !empty($_POST[$param]) || !empty($_GET[$param]) )
	{
		$$var = ( !empty($_POST[$param]) ) ? $_POST[$param] : $_GET[$param];
	}
	else
	{
		$$var = '';
	}
}
//
//PARANOIA PARANOIA PARANOIA PARANOIA PARANOIA PARANOIA PARANOIA PARANOIA PARANOIA 
//some security checks on vars
//
if ($offset)
{
	if (is_numeric($offset)===false)
			die("Hacking attempt");
}
else
	$offset = 0;
	

if ($hlimit)
{
	if (is_numeric($hlimit)===false)
			die("Hacking attempt");
}
else
	$hlimit = 10;

if ($horder !='asc' && $horder!='desc')
{
	$horder = 'desc';
}

if ($hfilter != 'won' && $hfilter !='lost' && $hfilter!='score' && $hfilter!='created' && $hfilter!='r_letters' && $hfilter!='w_letters')
	$hfilter = '';
	
if ($buchstabe)
{
	if (strlen($buchstabe)>3)
		die("Hacking attempt");
	else
	{
		$buchstabe = $buchstabe[1];
	}
	//if config says -> convert to upper...
	if ($hangman_cfg['make_words_upper'] == 1)
		$buchstabe=strtoupper($buchstabe);

}
if ($filter)
{
	if(	$filter!='' && $filter!='unquessed' && $filter!='won' && $filter!='own' &&
	 	$filter!='others' && $filter!='time_up' && $filter!='none' )
		die("Hacking attempt");
}
if ($game_index)
{
	if (is_numeric($game_index===false))
		die("Hacking attempt");
}
//
//END PARANOIA END PARANOIA END PARANOIA END PARANOIA END PARANOIA END PARANOIA END PARANOIA 
//

//standard site == overview (if no mode submitted - hangman.php with no post/get-vars)
if ($mode =='')
	$mode = 'overview';

/* Hangmans anzeigen => header,hangman_overview.tpl,footer */
if ($mode == 'overview')
{
	$template->set_filenames(array( 
     		'body' => 'hangman/hangman_overview.tpl'));
 	//is there any filter set?
 	//MAKE A FILTER
 	$filter_sql = '';
 	$page_nav = '';
 	$filters = array(	
 				"none" 		=> '<option value="none">'.$lang['filter_nofilter'].'</option>',
 				'unquessed' 	=> '<option value="unquessed">'.$lang['filter_unquessed'].'</option>',
 				"time_up" 	=> '<option value="time_up">'.$lang['filter_time_up'].'</option>',
 				"won" 		=> '<option value="won">'.$lang['filter_won'].'</option>',
 				"own" 		=> '<option value="own">'.$lang['filter_own'].'</option>',
 				"others" 	=> '<option value="others">'.$lang['filter_others'].'</option>'
 				);
	if (!isset($_GET['filter']) && !isset($_POST['filter']))
 		$filter = $hangman_cfg['standart_filter'];
 	switch ($filter)
 	{
 		case 'unquessed':
 			$page_nav = "&submit=submit&filter=unquessed";
 			$filter_sql = " WHERE bwon='0'";
 			$filters['unquessed'] = '<option value="unquessed" selected="selected">'.$lang['filter_unquessed'].'</option>';
 			break;
 		case 'time_up':
 			$page_nav = "&submit=submit&filter=time_up";
 			$now = time();
 			$filter_sql = " WHERE time_limit < '$now' AND bwon <> '1' AND time_limit <> '0'";
 			$filters["time_up"] = '<option value="time_up" selected="selected">'.$lang['filter_time_up'].'</option>';
 			break;
 		case 'won':
 			$page_nav = "&submit=submit&filter=won";
 			$filter_sql = " WHERE bwon='1'";
 			$filters["won"] = '<option value="won" selected="selected">'.$lang['filter_won'].'</option>';
 			break;
 		case 'own':
 			$page_nav = "&submit=submit&filter=own";
 			$filter_sql = " WHERE userid = $user_id";
 			$filters["own"] = '<option value="own" selected="selected">'.$lang['filter_own'].'</option>';
 			break;
 		case 'others':
 			$page_nav = "&submit=submit&filter=others";
 			$filter_sql = " WHERE userid <> $user_id";
 			$filters["others"] = '<option value="others" selected="selected">'.$lang['filter_others'].'</option>';
 			break;
 		default:
 			$page_nav = '';
 			$filter_sql = '';
 			$filters["none"] = '<option value="none" selected="selected">'.$lang['filter_nofilter'].'</option>';
 			break;
	}
 	$per_page = $hangman_cfg['games_per_page'];
 	//ADMIN or MODERATOR?
 	if ($userdata['user_level'] == ADMIN || hangman_is_group_member($user_id,$hangman_cfg['moderator_group']))
 	{
 		$template->assign_block_vars('switch_admin_on',array(
 			'U_ADMIN_MULTIDELETE'	=> append_sid("hangman.$phpEx?mode=multi_del"),
 			'S_ADMIN_MULTIDELETE_GO'=> $lang['administration_multidelete_go'],
 			'S_ADMIN_MULTIDELETE_RESET'=> $lang['administration_reset']
 			));
 	}
 	//show numbers # in front of hangman
 	if ($hangman_cfg['show_numbers'])
 		$template->assign_block_vars('switch_show_numbers',array());
 	else
 		$template->assign_block_vars('switch_no_show_numbers',array());
 	/*	looking for HANGMAN_DATE,HANGMAN_TOPIC,HANGMAN_CREATOR,HANGMAN_STATUS
 		for creating main page overview filtered by filter limited by hangman_cfg*/
 	$sql = "SELECT * FROM " . HANGMAN_WORDS . " $filter_sql ORDER BY bwon ASC, time_created DESC,bwon ASC LIMIT $offset,$per_page";// OFFSET $offset"; wegen frheren mysql versionen
 	if ( !($result = $db->sql_query($sql)) )
	{
			message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
	}
  	
  	$hangman_count = $db->sql_numrows($result);
    	$hangman_rows = $db->sql_fetchrowset($result);
    	
    	//assign vars for each hangman
    	for ($i = 0; $i < $hangman_count; $i++)
    	{
    		//general data
    		$hangman_date 		= $hangman_rows[$i]['time_created'];
    		$hangman_lease_date = $hangman_rows[$i]['time_limit'];
    		$hangman_max_quess 	= $hangman_rows[$i]['max_tries'];
    		$hangman_topic 		= $hangman_rows[$i]['hangman_subject'];
    		$hangman_id			= $hangman_rows[$i]['hangmanid'];
    		$hangman_word		= $hangman_rows[$i]['hangman_word'];
  		//if hangman subject is to long cut it to 20 chars
    		if ( strlen($hangman_topic)>25)
    			$hangman_topic = substr($hangman_topic,0,25).'...';
    		
    		//$hangman_topic = "[#$hangman_id]&nbsp;-&nbsp;$hangman_topic";
    		//get username of creator

    		$hangman_creator = hangman_get_username($hangman_rows[$i]['userid']);
  	
  		$users_losttime = hangman_getuserslosttime($user_id,$hangman_id);

  		//display hangman status in overview
  		$hangman_status = $lang['status_green'];
  		if ( ( (time() - $users_losttime) < 60*$hangman_cfg['time_play_again']))
    		{
    			$zeit = 60*$hangman_cfg['time_play_again'] - (time() - $users_losttime);
			if ($zeit > 7200)
			{
				$zeit = ($zeit - ($zeit%3600)) / 3600;
				$quess_msg = sprintf($lang['quess_lost_retry_overview'],$zeit,$lang['hours']);
			}
			else if ($zeit > 60)
			{
				$zeit = ($zeit - ($zeit%60)) / 60;
				$quess_msg = sprintf($lang['quess_lost_retry_overview'],$zeit,$lang['minutes']);
			}
			else
				$quess_msg = sprintf($lang['quess_lost_retry_overview'],$zeit,$lang['seconds']);
				
    			$hangman_status = $quess_msg;
    		}
    		else if ($hangman_cfg['time_play_again'] == 0 && $users_losttime)
    			$hangman_status = $lang['quess_lost'];
    		
    		if ($hangman_lease_date > 0)
    		{	
    			$days_left = @gmdate("d",$hangman_lease_date-time());
    		}
		
    		//if hangman is out of time nobody can quess it now ;)
  		if ($hangman_lease_date != 0 && ($hangman_lease_date < time()))
    		{
    			$hangman_status = sprintf($lang['status_time'],$hangman_word);
    			$days_left = gmdate("d.m.y",$hangman_lease_date);
    		}
    		//if hangman is not limited assign unlimited status to days left
    		else if ($hangman_lease_date == 0)
    		{
    			$days_left = $lang['status_unlimited'];
    		}
    		//if not display remaining time
    		else
    			$days_left = gmdate("d",$hangman_lease_date-time());
		
		//is the game won?
    		if ($hangman_rows[$i]['bwon'])
    		{
	    		//if the hangman is won > the time is changed to lonely '---'
	    		$days_left = '---';
    			//who is the winner?
    			$errater = hangman_get_username($hangman_rows[$i]['winner']);
  			$hangman_status = sprintf($lang['status_won'],(strlen($hangman_word)<15?$hangman_word:substr($hangman_word,0,12).'...'),$errater);
  		}
    		
    		//for different colors in different lines
    		$klasse = (($i%2 == 1)?"row1":"row3");
    		
    		//get hangman quessors
    		$quessors = array();
    		$quessor_count = 0;
    		hangman_get_quessors($quessors,$hangman_rows[$i]['userid'],$hangman_id,$quessors_count);
		$lang_quessors = ($quessors_count > 0)?$lang['quess_quessors']:$lang['quess_nobody'];
		//assign the vars for each hangman
    		$template->assign_block_vars("Hangmans", array(
    			"KLASSE"		=> $klasse,
    			"HANGMAN_ID"		=> $hangman_id,
    			"HANGMAN_DATE" 		=> hangman_show_time($hangman_date,$userdata['user_timezone']),
    			"HANGMAN_LEASE_DATE" 	=> $days_left,
    			"HANGMAN_TOPIC" 	=> $hangman_topic,
    			"HANGMAN_LINK" 		=> append_sid("hangman.$phpEx?mode=quess&game_index=$hangman_id&filter=$filter&offset=$offset"),
    			"HANGMAN_CREATOR" 	=> $hangman_creator,
    			"HANGMAN_MAX_QUESS" 	=> $hangman_max_quess,
    			"HANGMAN_STATUS" 	=> $hangman_status,
    			"L_QUESSORS_TEXT"	=> $lang_quessors
			));
		//assign quessors
		for ($a = 0; $a < $quessors_count; $a++)
		{
			$quessors_name	= $quessors[$a]['name'].((intval($quessors[$a]['quesscount'])>1)?'('.intval($quessors[$a]['quesscount']).')':'');
			if ($quessors[$a]['userid']==$user_id)
				$quessors_name='<b>'.$quessors_name.'</b>';
				
			if ($quessors_count-1 != $a)
				$quessors_name	= $quessors_name.',';
			else
				$quessors_name	= $quessors_name;
			$template->assign_block_vars("Hangmans.Quessors", array(
				"L_QUESSORS_NAME"	=>  $quessors_name
				));
		}
		//if ADMIN is watching display admin stuff ;)
    		if ($userdata['user_level'] == ADMIN || hangman_is_group_member($user_id,$hangman_cfg['moderator_group']))
    		{
    			$hangman_admin_delete='<a href="'.append_sid("hangman.php?mode=delete&game_index=$hangman_id").'"/><img src="'.$images['icon_delpost'].'" border="0"/></a>';
    			$template->assign_block_vars('Hangmans.switch_admin_on',array(
    					'HANGMAN_ADMIN_DELETE' 	=> $hangman_admin_delete,
    					'HANGMAN_ID'		=> $hangman_id,
    					'KLASSE'		=> $klasse));
    		}
    		//show numbers # in front of hangman
 		if ($hangman_cfg['show_numbers'])
 			$template->assign_block_vars('Hangmans.switch_show_numbers',array(
 					'KLASSE'=>$klasse,
 					"HANGMAN_ID"	=> $hangman_id
 					));
 		else
 			$template->assign_block_vars('Hangmans.switch_no_show_numbers',array(
 					'KLASSE'=>$klasse));
 	
    	}//end assigning for each hangman
    	 		
     	//filter
		while( list($name, $text) = @each($filters) )
     	{
     		$template->assign_block_vars("Filters",array(
     			'Filter'	=> $text
     		));
     	}
     	//ministatistics
     	if($hangman_cfg['show_stats'])
		{
			$stats = get_hangman_stats();
			$template->assign_block_vars('switch_show_stats',array(
				'L_HANGMANSTATS_ONLINE' => sprintf($lang['hangmanstats_online'],$stats['count']),
				'L_HANGMANSTATS_TODAY' 	=> sprintf($lang['hangmanstats_today'],$stats['today']),
				'L_HANGMANSTATS_WON' 	=> sprintf($lang['hangmanstats_won'],$stats['won']),
				'L_HANGMANSTATS_BEST' 	=> sprintf($lang['hangmanstats_best'],hangman_get_username($stats['best_player'])),
				'L_HANGMANSTATS_TOTAL'		=> sprintf($lang['hangmanstats_total'],$stats['total_hangmans'])
				));
		}
		$sql = "SELECT count(*) as anz FROM ".HANGMAN_WORDS." $filter_sql";
		if ( !($result = $db->sql_query($sql)) )
		{
				message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$hang_c = $db->sql_fetchrow($result);
		$hang_c = $hang_c['anz'];
		//echo 'Anzahl:'.$hang_c;
		
		$page_string = generate_pagination(append_sid("hangman.$phpEx?mode=overview$page_nav"),$hang_c,$per_page,$offset,true);
    	$page_string = str_replace('start','offset',$page_string);
	
	//template assign the remaining vars
  	$template->assign_vars(array(
  		"U_HIGHSCORE_PAGE"	=> append_sid("hangman.$phpEx?mode=highscore"),
  		"U_CREATION_PAGE"	=> append_sid("hangman.$phpEx?mode=create"),
  		'U_PREV_NEXT'		=> $page_string,
  		"U_HELP_PAGE"		=> append_sid("hangman.$phpEx?mode=help"),
  		
  		"L_HIGHSCORE_PAGE"	=> $lang['highscore_page'],
  		"L_OVERVIEW_PAGE"	=> $lang['overview_page'],
  		"L_CREATION_PAGE"	=> $lang['creation_page'],
  		"L_NEXT_PAGE"		=> $lang['next_page'],
  		"L_PREV_PAGE"		=> $lang['prev_page'],
  		"L_HELP_PAGE"		=> $lang['help_page'],
  		'U_HANGMAN' 		=> append_sid('hangman.'.$phpEx),
		'L_HANGMAN' 		=> "Hangman",
	
  		"L_HANGMAN_DATE"	=> $lang['hangman_date'],
  		"L_HANGMAN_LEASE_DATE"	=> $lang['hangman_lease_date'],
  		"L_HANGMAN_CREATOR"	=> $lang['hangman_creator'],
  		"L_HANGMAN_MAX_TRIES"	=> $lang['hangman_max_tries'],
  		"L_HANGMAN_SUBJECT"	=> $lang['hangman_subject'],
  		"L_HANGMAN_OVERALL_HEADLINE"=> $lang['hangman_overall_headline'],
  		"L_HANGMAN_STATUS"	=> $lang['hangman_status'],
  		"L_HANGMAN_COPYRIGHT"	=>$lang['hangman_copyright'],
  		
  		"L_FILTER_HEADLINE"	=> $lang['filter_headline'],
    		"L_SUBMIT"		=> $lang['filter_submit'],
    		"L_FILTER_ACTION"	=> append_sid("hangman.php")
  		));
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

}
/*=================================
###	Hangman quessing 	###
=================================*/
else if ($mode == 'quess' || $mode == 'window')
{
	
	if ($mode == 'window')
	{
		$page_title = 'Hangman';
		$gen_simple_header = TRUE;
		$template->set_filenames(array( 
     			'body' => 'hangman/hangman_window.tpl'));
     	}
     	else
     	{
     		$template->set_filenames(array( 
     			'body' => 'hangman/hangman_quess.tpl'));
     	}
     		
 	//a SQL ;)
 	//is there a hangman with the given index?
 	$sql = "SELECT * FROM " . HANGMAN_WORDS . " WHERE hangmanid = '$game_index'";
 	
 	if ( !($result = $db->sql_query($sql)) )
	{
			message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
	}
	if (! ($row = $db->sql_fetchrow($result)))
	{
		message_die(GENERAL_MESSAGE, $lang['error_get_hangman'], '', __LINE__,__FILE__,$sql);
	}
	
	if ( $userdata['user_id'] == ANONYMOUS && $row['bwon'] != true)
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
 	
	//set some vars
	$hangman_word 		= $row['hangman_word'];
	if ($hangman_cfg['make_words_upper'] == 1)
		$hangman_word	= strtoupper($hangman_word);
		
	$hangman_subject 	= $row['hangman_subject'];
	$hangman_msg		= $row['hangman_help'];
	
	$hangman_quessed_letters= $row['quessed_letters'];
	//to create the bbcode
	include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
//hangman help text creating	
	$hangman_msg	= smilies_pass($hangman_msg);
	$hangman_msg	= bbencode_second_pass($hangman_msg,$row['bbcodeid']);
	$hangman_msg 	= str_replace("\n", "\n<br />\n", $hangman_msg);

	$hangman_max_versuche	= $row['max_tries'];
	$hangman_date 		= $row['time_created'];
 	$hangman_lease_date	= $row['time_limit'];
 	$hangman_creator_id	= $row['userid'];
//get the users who tried to quess
	$quessors 	= array();
	$quessors_count	= 0;
	if ($mode == 'window')
		hangman_get_quessors($quessors,$row['userid'],$game_index,$quessors_count,true);
	else
		hangman_get_quessors($quessors,$row['userid'],$game_index,$quessors_count,false);
//and if there are any show them ;)
	if ( $quessors_count > 0 )
	{
		$template->assign_vars(array(
				"L_QUESSORS_TEXT"	=> $lang['quess_quessors'] 
				));
		for ($i = 0; $i < $quessors_count; $i++)
		{
			$quessors_name	= $quessors[$i]['name'].((intval($quessors[$i]['quesscount'])>1)?'('.intval($quessors[$i]['quesscount']).')':'');
			if ($quessors[$i]['userid']==$user_id)
				$quessors_name = '<b>'.$quessors_name.'</b>';
			if ($quessors_count-1 != $i)
				$quessors_name	= $quessors_name.',';
			else
				$quessors_name	= $quessors_name;
			$template->assign_block_vars("Quessors", array(
				"L_QUESSORS_NAME"	=>  $quessors_name
				));
		}
	}
	
	//get creators name
	$hangman_creator = '';
	if ($mode == 'window')
		$hangman_creator = hangman_get_username($row['userid'],true);
	else
		$hangman_creator = hangman_get_username($row['userid'],false);
  	
  	$bdone_play = 'no';
//word already quessed
	if ( $row['bwon'] == true && $bdone_play == 'no')
	{
		//who is the winner?
		$username = hangman_get_username($row['winner']);
		
		//make word ready
		$hangman_word = str_replace('_','&#8226;',wordwrap($hangman_word,1,' ',1));
 		$quess_msg = sprintf($lang['quess_won_other'],$username);
 		$bdone_play='disp_word';
	}

//creator is trying to quess ?
	if ( $user_id == $row['userid'] && $bdone_play == 'no')
	{
		//add the quessed letters ;) to show author how good the others are, but only if not won yet
 		
 		if ($row['bwon']==false)
 		{
 			hangman_display_quessed_letters($hangman_word,$hangman_quessed_letters);
		}
		$hangman_word = str_replace('_','&#8226;',wordwrap($hangman_word,1,' ',1));
		$bdone_play = 'disp_word';
		$quess_msg = $lang['hangman_self'];
	}
	
//time is up ?	
 	if ($hangman_lease_date != 0 && ($hangman_lease_date < time()) && $bdone_play == 'no')
 	{
 
 		//space displaying as a dot
 		$hangman_word = str_replace('_','&#8226;',wordwrap($hangman_word,1,' ',1));
 		$quess_msg = $lang['quess_time_up'];
 		$quess_picture = '<img src="'.$lang['hangman_picture_time'].'">';
 		$bdone_play = 'disp_word';
	}
	
	if ($bdone_play == 'no')
	{
		//already started? or need a new entry @ hangman_quess ?...
		$sql = "SELECT * FROM " . HANGMAN_QUESS . " WHERE hangmanid='$game_index' AND userid='$user_id'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
		}
	
		$row = $db->sql_fetchrow($result);
		$hangman_userid 	= $row['userid'];
		$hangman_versuche 	= $row['tries'];

		if ( $hangman_userid != $user_id)
		{
			//...we need one...
			$sql = "INSERT INTO " . HANGMAN_QUESS. " (userid,hangmanid,tries,losttime,quesscount) values('$user_id','$game_index',0,0,1)";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
			}
			$sql = "SELECT * FROM " . HANGMAN_QUESS . " WHERE hangmanid='$game_index' AND userid='$user_id'";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
			}
			$row = $db->sql_fetchrow($result);
			$hangman_versuche = 0;
			//to prevent add 1 to tries on getting first time on hangman ;)
			$hangman_cfg['requessing_lose'] = false;
		}
		//to much?
		if ($hangman_versuche >= $hangman_max_versuche)
		{
			$bbreack = false;
			//yes, to much, but could he do it again?
			if ($hangman_cfg['time_play_again'] != 0)
			{
				$hangman_losttime = $row['losttime'];
				
				//timedifference ? can user play again?
				if ( (time() - $hangman_losttime) > 60*$hangman_cfg['time_play_again'])
				{
					//huuu he waited so long ;) let him play again
					$quesscount = $row['quesscount']+1;
					$sql = "UPDATE " . HANGMAN_QUESS . " SET tries='0', losttime='0', quesscount='$quesscount' WHERE hangmanid='$game_index' AND userid='$user_id'";
					if ( !($result = $db->sql_query($sql)) )
					{
						message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
					}
					$bbreack = true;
					$hangman_versuche = 0;
					//to prevent add 1 to tries on getting first time on the hangman ;)
					$hangman_cfg['requessing_lose'] = false;
				}
				
			}
			//user will play again or not ?
			if ($bbreack==false)
			{
				//display all quessed stuff
				hangman_display_quessed_letters($hangman_word,$hangman_quessed_letters);
				
				//message and if he can play again...
				$quess_msg = $lang['quess_lost'];
				if($hangman_cfg['time_play_again'] != 0)
				{
					$zeit = 60*$hangman_cfg['time_play_again'] - (time() - $hangman_losttime);
					if ($zeit > 7200)
					{
						$zeit = ($zeit - ($zeit%3600)) / 3600;
						$quess_msg = sprintf($lang['quess_lost_retry'],$zeit,$lang['hours']);
					}
					else if ($zeit > 60)
					{
						$zeit = ($zeit - ($zeit%60)) / 60;
						$quess_msg = sprintf($lang['quess_lost_retry'],$zeit,$lang['minutes']);
					}
					else
						$quess_msg = sprintf($lang['quess_lost_retry'],$zeit,$lang['seconds']);
					
				}
				$quess_picture = '<img src="'.sprintf($lang['hangman_picture_lost'],9).'">';
				$bdone_play = 'yes';
			}
		}
	}// will play or time stuff end

	if ($bdone_play == 'no')
	{
		//...letter or word submitted - check it
		$bfound = false;
		$counter = -1;
//WORT?

		if (isset($_POST['wortversuch']))
			$wortversuch = $_POST['wortversuch'];
		if (strlen($wortversuch)<0 || strlen($wortversuch)>$hangman_cfg['maximum_letters'])
			$wortversuch = '';
//		echo $wortversuch;
		if ($wortversuch != '')
		{
			if ($hangman_cfg['make_words_upper']==true)
				$wortversuch =	strtoupper($wortversuch);

			$wortversuch = str_replace(chr(32),'_',$wortversuch);
//		echo $wortversuch;
			if($hangman_cfg['make_words_upper']==true)
			{
				if (strtoupper($hangman_word) == $wortversuch)
					$bfound = true;
			}
			else if ($hangman_word == $wortversuch)
				$bfound = true;
			if ($bfound)
			{
				$counter = hangman_display_quessed_letters($hangman_word,$hangman_word);
				hangman_updatescore(0,0,0,$hangman_creator_id,$user_id,strlen($hangman_word)-strlen($hangman_quessed_letters),0);
			}
			else
				hangman_updatescore(0,0,0,$hangman_creator_id,$user_id,0,1);
		}
//echo intval($bfound);
//LETTER if no word or wortversuch false
		if (!$bfound && $wortversuch == '')
		{
		
			for ($i = 0; $i < strlen($hangman_word); $i++)
			{
				$akt_char = ($hangman_cfg['make_words_upper']==true)?strtoupper($hangman_word[$i]):$hangman_word[$i];
				if ($akt_char == $buchstabe)
				{
					//letter found
					//just update new letters
					$bfound = true;
					if (strpos($hangman_quessed_letters,$akt_char)===false)
					{
						$hangman_quessed_letters =$hangman_quessed_letters . $akt_char;
						//als erstes Hangman wort tabelle aktualisiern
						$sql = "UPDATE " . HANGMAN_WORDS . " SET quessed_letters='$hangman_quessed_letters' WHERE hangmanid=$game_index";
						if ( !($result = $db->sql_query($sql)) )
						{
							message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
						}
						hangman_updatescore(0,0,0,$hangman_creator_id,$user_id,1,0);
					}
					else if ($hangman_cfg['requessing_lose'])
						$bfound = false;
					break;
				}		
			}	
			//no letter submitted > change to true > so tries will remain...
			if (!$buchstabe && !$hangman_cfg['requessing_lose'])
				$bfound = true;
		}
		//if letter not found
		if ($bfound == false)
		{
			//update table how many failed tries
			$hangman_versuche++;
			$zeit = time();
			$sql = "UPDATE " . HANGMAN_QUESS . " SET tries='$hangman_versuche',losttime='0' WHERE hangmanid='$game_index' AND userid='$user_id'";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
			}
			hangman_updatescore(0,0,0,$hangman_creator_id,$user_id,0,1);
			//how many wrong tries
			if ($hangman_versuche >= $hangman_max_versuche)
			{
				//to much > update score
				hangman_updatescore(1,0,0,$hangman_creator_id,$user_id,0,0);
				$sql = "UPDATE ".HANGMAN_QUESS." SET losttime='$zeit' WHERE hangmanid='$game_index' AND userid='$user_id'";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
				}
				//display all quessed stuff
				hangman_display_quessed_letters($hangman_word,$hangman_quessed_letters);
			
				//and show all lost stuff
				$quess_msg = $lang['quess_lost'];
				$quess_picture = '<img src="'.sprintf($lang['hangman_picture_lost'],9).'">';
				$bdone_play = 'yes';
			}
		}//checked the letter ;)
	}
	if ($bdone_play == 'no')
	{
		if ($counter == -1)
		{	//display all quessed stuff and count wrong letters
			$counter = hangman_display_quessed_letters($hangman_word,$hangman_quessed_letters);
		}
		// hangman won cause no letter is wrong
		if ($counter == 0 )
		{
			$quess_msg = $lang['quess_won_self'];
			$quess_picture = '<img src="'.$lang['hangman_picture_won'].'">';
			$bdone_play = 'disp_word';
			//db update > hangman is won
			$sql = "UPDATE " .HANGMAN_WORDS. " SET bwon='1',winner='$user_id' WHERE hangmanid='$game_index'";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
			}
			//update score
			hangman_updatescore(0,1,0,0,$user_id);
			
		}
	}
	if ($bdone_play == 'no')
	{
		$template->assign_block_vars('switch_show_letters',array(
				"L_QUESS_LETTERS" 	=> $lang['quess_letters'],
				"U_ACTION"		=> append_sid("hangman.php?mode=quess&game_index=$game_index&filter=$filter&offset=$offset"),
				"L_TRY_A_WORD"		=> $lang['try_a_word'],
				"L_TRY"			=> $lang['try']
				));
		if(intval($hangman_cfg['maximum_letters'])>0 && intval($hangman_cfg['maximum_letters'])<255)
			$template->assign_block_vars('switch_show_letters.switch_shorter_words',array('MAXLENGTH'=>$hangman_cfg['maximum_letters']));
		else
			$template->assign_block_vars('switch_show_letters.switch_longer_words',array());
		
		$restversuche = $hangman_max_versuche - $hangman_versuche;

		//display link to letters
		$letters = $hangman_cfg['letters'];
		
		for ($i = 0; $i <= strlen($letters); $i++)
		{
			$l = $letters[$i];
			if ($l == '+')
				$l = '%2B';
			$link = ($mode == 'window')?"hangman.$phpEx?mode=window&game_index=$game_index&buchstabe=[$l]&filter=$filter&offset=$offset":"hangman.$phpEx?mode=quess&game_index=$game_index&buchstabe=[$l]&filter=$filter&offset=$offset";
			if($letters[$i])
			{
				if(strpos($hangman_quessed_letters.$hangman_cfg['auto_replace_letters'],$letters[$i]) === false)
					$template->assign_block_vars("switch_show_letters.Letters",array(
						"LETTER_LINK"	=> $link,
						"LETTER_SIGN"	=> $letters[$i])
						);
			}
			else if ($letters[$i] == '0')
			{
				if(strpos($hangman_quessed_letters.$hangman_cfg['auto_replace_letters'],'0') === false)
					$template->assign_block_vars("switch_show_letters.Letters",array(
						"LETTER_LINK"	=> $link,
						"LETTER_SIGN"	=> $letters[$i])
						);
			}

		}
		$quess_msg = sprintf($lang['quess_remaining_tries'],$restversuche);
		//get the picture ;)
		if ($restversuche >= 9)
			$quess_picture = sprintf($lang['hangman_picture_lost'],0);
		else 
			$quess_picture = sprintf($lang['hangman_picture_lost'],8-$restversuche);
		$quess_picture = '<img src="'.$quess_picture.'">';
		$bdone_play = 'yes';
	}
	if ($bdone_play == 'no')
		die('Something gone wrong :(');
	else
	{
		$template->assign_vars(array(
				"HANGMAN_WORD"		=> ($bdone_play=='disp_word')?'<br><br>'.$hangman_word:'',
				"QUESS_MSG" 		=> $quess_msg,
				"QUESS_PICTURE"		=> $quess_picture,
				"HANGMAN_SUBJECT" 	=> $hangman_subject,
				"HANGMAN_MSG"		=> $hangman_msg,
				"L_HANGMAN_QUESS"	=> $lang['hangman_quess'],
				"L_HANGMAN_CREATOR" 	=> $lang['hangman_creator'],
				"L_HANGMAN_CREATOR_NAME"=> $hangman_creator,
				"L_HANGMAN_OVERALL_HEADLINE"=>$lang['hangman_overall_headline'],
				"L_HANGMAN_COPYRIGHT"	=>$lang['hangman_copyright'],
				"U_HANGMAN" 		=> append_sid("hangman.php?filter=$filter&offset=$offset"),
				"L_HANGMAN" 		=> "Hangman",
				"HANGMAN_DOT"		=> '&#8226;'
				));
		if (strlen($hangman_msg) > 0)
		{
			$template->assign_block_vars('show_help',array());
		}
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	}
	exit;
}
/*=================================
###	Hangman creating 	###
=================================*/
else if ($mode == 'create')
{
	//if option set only admin
	if ( ($userdata['user_level'] != ADMIN && !hangman_is_group_member($user_id,$hangman_cfg['moderator_group'])) && $hangman_cfg['only_admin_create'])
	{
		$message = $lang['error_only_admin_create'];
		message_die(GENERAL_MESSAGE, $message);
		exit;
	}
	if ( $userdata['user_id'] == ANONYMOUS )
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	
	$template->set_filenames(array( 
     		'body' => 'hangman/hangman_create.tpl'));
	$template->assign_vars(array(
		"HANGMAN_CREATE"	=> append_sid("hangman.$phpEx?mode=new"),
		"L_HANGMAN_QUESS"	=> $lang['hangman_quess'],
		"L_HANGMAN_OVERALL_HEADLINE"=>$lang['hangman_overall_headline'],
		"L_CREATE_HANGMAN"	=> $lang['create_hangman'],
		"L_CREATE_HELP_HANGMAN"	=> sprintf($lang['create_help_hangman'],$hangman_cfg['minimum_letters'],$hangman_cfg['maximum_letters']),
		"L_CREATE_SUBJECT"	=> $lang['create_subject'],
		"L_CREATE_HELP"		=> $lang['create_help'],
		"L_CREATE_HELP_HELP"	=> sprintf($lang['create_help_help'],$hangman_cfg['min_help']),
		"L_CREATE_DAYS"		=> $lang['create_days'],
		"L_CREATE_DAYS_HELP"	=> $lang['create_days_help'],
		"L_CREATE_TRIES"	=> $lang['create_tries'],
		"L_CREATE_NEW"		=> $lang['create_new'],
		"L_HANGMAN_COPYRIGHT"	=> $lang['hangman_copyright'],
		"U_HANGMAN" 		=> append_sid("hangman.$phpEx"),
		"L_HANGMAN" 		=> "Hangman",
		"L_CREATION_PAGE"	=> $lang['creation_page'],
		"L_CREATE_YES"		=> $lang['create_yes'],
		"L_CREATE_NO"		=> $lang['create_no'],
		"L_HELP_PAGE"		=> $lang['help_page'],
  		"U_HELP_PAGE"		=> append_sid("hangman.$phpEx?mode=help"),
  		"L_HIGHSCORE_PAGE"	=> $lang['highscore_page'],
  		"U_HIGHSCORE_PAGE"	=> append_sid("hangman.$phpEx?mode=highscore"),
  		"L_OVERVIEW_PAGE"	=> $lang['overview_page'],
  		"U_OVERVIEW_PAGE"	=> append_sid("hangman.$phpEx?mode=overview"),
		
		"L_STANDART_TITLE"	=> (strlen($title)>0)?$title:$hangman_cfg['standart_title'],
		"L_HANG_HELP"		=> $hilfe,
		"L_HANG_WORD"		=> $wort
		));
	for ($i=$hangman_cfg['minimum_tries']; $i<=$hangman_cfg['maximum_tries']; $i++)
	{	$template->assign_block_vars("Versuche",array(
			"Wert" => $i,
			"Select" => ($i==$hangman_cfg['standart_tries'])?'selected="selected"':''
			));
	}
	for ($i=0; $i<30; $i++)
	{	$template->assign_block_vars("Gueltige_Tage",array(
			"Wert" => $i,
			"Select"=> ($i==$hangman_cfg['standart_days'])?'selected="selected"':''
			));
	}
	if(intval($hangman_cfg['maximum_letters'])>0 && intval($hangman_cfg['maximum_letters'])<255)
			$template->assign_block_vars('switch_shorter_words',array('MAXLENGTH'=>$hangman_cfg['maximum_letters']));
		else
			$template->assign_block_vars('switch_longer_words',array());

	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

}
/*Hangman eintragen*/
else if ($mode == 'new')
{
	if ($confirm != $lang['create_yes'] )
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	if ($userdata['user_level'] != ADMIN && !hangman_is_group_member($user_id,$hangman_cfg['moderator_group']) && $hangman_cfg['only_admin_create'])
	{
		$message = $lang['error_only_admin_create'];
		message_die(GENERAL_MESSAGE, $message);
		exit;
	}
	if ( $userdata['user_id'] == ANONYMOUS )
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	
	//convert special chars (german,.. ;)
	if ($hangman_cfg['convert_special_l'])
		$wort = str_replace(array('ä','ö','ü','ß','Ä','Ö','Ü'),array('ae','oe','ue','ss','AE','OE','UE'),$wort);
	
	//make uppercase ?
	if ( $hangman_cfg['make_words_upper'] == 1)
	{
		$wort = str_replace(array('ä','ü','ö'),array('Ä','Ü','Ö'),$wort);
		$wort = strtoupper($wort);
	}
	//convert space to underline
	$wort = str_replace(chr(32),'_',$wort);
	$fehlermsg = '';
	
	//something missing ?
	if (!$wort)
		$fehlermsg = $lang['error_hangman_word'];
	else if (!$subject)
		$fehlermsg = $lang['error_hangman_subject'];
	else if (strlen($hilfe) < $hangman_cfg['min_help'])
		$fehlermsg = $lang['error_hangman_help'];
	else if (!$maximal_versuche || $maximal_versuche < $hangman_cfg['minimum_tries'] || $maximal_versuche > $hangman_cfg['maximum_tries'])
		$fehlermsg = $lang['error_hangman_tries'];
	else if (($gueltige_tage === null) || $gueltige_tage<0 || $gueltige_tage>30)
		$fehlermsg = $lang['error_hangman_lease'];
	//something wrong?
	else if (!hangman_check_word($wort,$remaining))
		$fehlermsg=sprintf($lang['error_hangman_forbidden_letters'],$hangman_cfg['letters'],$remaining);
	else if (strlen($subject)>70)
		$fehlermsg = $lang['error_hangman_tolong'];
	else if (strlen($wort)>$hangman_cfg['maximum_letters'] && $hangman_cfg['maximum_letters'] >= 0)
		$fehlermsg = $lang['error_hangman_tolon'];
	else if (strlen($wort) < $hangman_cfg['minimum_letters'])
		$fehlermsg = $lang['error_is_short'];
	//parse checks successfull ;)
	if (intval($hangman_cfg['games_per_day']) > 0 )
	{
		$today_begin = strtotime(date('Ymd',time()));
		$sql = "SELECT count(hangmanid) FROM ".HANGMAN_WORDS." WHERE userid = '$user_id' AND time_created >= '$today_begin'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$today_count = intval($row['count(hangmanid)']);
		if ($today_count > intval($hangman_cfg['games_per_day']))
		{
			$fehlermsg = $lang['error_to_much'];		
		}
	}
	if ($fehlermsg == '')
	{
		$fehlermsg = $lang['new_sucess'];
		//parse the stuff for postingstyle in helpmessage
		include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
		include($phpbb_root_path . 'includes/functions_post.'.$phpEx);
	
		$html_on = false;
		$bbcode_on = true;
		$smilies_on = true;
		$bbcode_uid = make_bbcode_uid();
	
		$zeit = time();
		$hilfe = prepare_message(trim($hilfe), $html_on, $bbcode_on, $smilies_on, $bbcode_uid);
		$html_on = false;
		$bbcode_on = false;
		$smilies_on = false;
		$subject = prepare_message(trim($subject), $html_on, $bbcode_on, $smilies_on, $bbcode_uid);
		//how long is time_limit 4 hangman ?
		if ($gueltige_tage!=0)
			$gueltige_zeit = time() + 60*60*24*$gueltige_tage;
		else
			$gueltige_zeit = 0;
		$sql = "INSERT INTO " .HANGMAN_WORDS. " (userid , hangman_word, hangman_help , hangman_subject , max_tries, bbcodeid,time_created,time_limit ) 
	 				values ( '$user_id',
	 				'$wort',
	 				'$hilfe',
	 				'$subject',
	 				'$maximal_versuche',
	 				'$bbcode_uid',
	 				'$zeit',
	 				'$gueltige_zeit')";
	 
		if ( !($result = $db->sql_query($sql)) )
		{

			message_die(GENERAL_ERROR, $lang['error_set_hangman'], '', __LINE__, __FILE__, $sql);
		}
		
		//update score ;)
		hangman_updatescore(0,0,1,$user_id,$user_id);
		hangman_counter();
	}
	
	$u_back = '<a href="'.append_sid("hangman.php?mode=create&hilfe=$hilfe&subject=$subject&wort=$wort").'" class="nav">'.$lang['try_again'].'</a>';
	//echo $u_back;
	$template->set_filenames(array( 
     		'body' => 'hangman/hangman_new.tpl'));
	$template->assign_vars(array(
		"HANGMAN_WORT"		=> $wort,
		"U_OVERVIEW_PAGE" 	=> append_sid("hangman.$phpEx?mode=overview"),
		"L_OVERVIEW_PAGE" 	=> $lang['overview_page'],
		"ERROR_MSG"		=> $fehlermsg,
		"L_NEW_TITLE"		=> $lang['new_title'],
		"L_HANGMAN_COPYRIGHT"	=> $lang['hangman_copyright'],
		"L_HANGMAN_OVERALL_HEADLINE" => $lang['hangman_overall_headline'],
		"U_HANGMAN" 		=> append_sid('hangman.'.$phpEx),
		"L_HANGMAN" 		=> "Hangman",
		"L_CREATION_DONE_PAGE"	=> $lang['creation_done_page'],
		"L_CREATION_PAGE"	=> $lang['creation_page'],
  		"U_CREATION_PAGE"	=> append_sid("hangman.$phpEx?mode=create"),
  		"U_BACK"		=> $u_back
		));
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	exit;
}
//*******************************//
//*	Highscore		*//
//*******************************//
else if ($mode == 'highscore')
{
	$sql ='';
	
	if (strlen($hfilter) < 1)
		$hfilter = $hangman_cfg['highscore_filter'];
	$sql_part = '';
	switch($hfilter)
	{
		default:
		case 'won':
			$sql_part = 'ORDER BY won ' .strtoupper($horder).' LIMIT '.$hlimit;break;
		case 'lost':
			$sql_part = 'ORDER BY lost ' . strtoupper($horder.' LIMIT '.$hlimit);break;
		case 'score':
			$sql_part = 'ORDER BY points ' . strtoupper($horder).' LIMIT '.$hlimit;break;
		case 'created':
			$sql_part = 'ORDER BY created ' . strtoupper($horder).' LIMIT '.$hlimit;break;
		case 'r_letters':
			$sql_part = 'ORDER BY r_letters ' . strtoupper($horder).' LIMIT '.$hlimit;break;
		case 'w_letters':
			$sql_part = 'ORDER BY w_letters ' . strtoupper($horder).' LIMIT '.$hlimit;break;
	}
	$sql = "SELECT * FROM ".HANGMAN_SCORE. " WHERE userid<>'".ANONYMOUS."' AND userid IS NOT NULL AND userid <> '0' ".$sql_part;
	if ( !($result = $db->sql_query($sql)) )
	{
			message_die(GENERAL_ERROR, $lang['error_get_highscore'], '', __LINE__, __FILE__, $sql);
	}
  	
  	$stats_count = $db->sql_numrows($result);
    	$stats_rows = $db->sql_fetchrowset($result);
    	
    	for ($i = 0; $i < $stats_count; $i++)
    	{
  		$name = hangman_get_username($stats_rows[$i]['userid']);
  		$won = $stats_rows[$i]['won'];
  		$lost = $stats_rows[$i]['lost'];
  		$created = $stats_rows[$i]['created'];
  		$points=$stats_rows[$i]['points'];
  		$r_letters=$stats_rows[$i]['r_letters'];
  		$w_letters=$stats_rows[$i]['w_letters'];
  		if($hangman_cfg['hsc_letters_p'])
  		{
  			$insg = $r_letters+$w_letters;
  			if($insg > 0)
  			{
  				$r_letters = $r_letters.'<span style="color:#a4a6a3;">('.intval( ($r_letters * 100) /( $r_letters + $w_letters)).'%)</span>';
  				$w_letters = $w_letters.'<span style="color:#a4a6a3;">('.intval( ($w_letters * 100) /( $r_letters + $w_letters)).'%)</span>';
  			}
  			else
  			{
  				$r_letters = $r_letters.'<span style="color:#a4a6a3;">(0%)</span>';
  				$w_letters = $w_letters.'<span style="color:#a4a6a3;">(0%)</span>';
  			}
  			
  		}
  		$klasse = (($i%2)==1)?"row2":"row1";
  		$template->assign_block_vars("Highscore",array(
  				"USERNAME"	=>$name,
  				"WON"		=>$won,
  				"LOST"		=>$lost,
  				"CREATED"	=>$created,
  				"POINTS"	=>$points,
  				"R_LETTERS"	=>$r_letters,
  				"W_LETTERS"	=>$w_letters,
  				"KLASSE"	=>$klasse
  				));
    	}
	$template->set_filenames(array(
			'body' => 'hangman/hangman_highscore.tpl'
			));
	$template->assign_vars(array(
  		"U_ORDER_BY_WON"=> append_sid("hangman.$phpEx?mode=highscore&order=won"),
  		"U_ORDER_BY_LOST"=> append_sid("hangman.$phpEx?mode=highscore&order=lost"),
  		"U_ORDER_BY_CREATED"=> append_sid("hangman.$phpEx?mode=highscore&order=created"),
  		"U_ORDER_BY_POINTS"=>append_sid("hangman.$phpEx?mode=highscore&order=points"),
  		"U_ORDER_BY_R_LETTERS"=>append_sid("hangman.$phpEx?mode=highscore&order=r_letters"),
  		"U_ORDER_BY_W_LETTERS"=>append_sid("hangman.$phpEx?mode=highscore&order=w_letters"),
  		
  		"U_CREATION_PAGE"	=> append_sid("hangman.$phpEx?mode=create"),
  		"U_OVERVIEW_PAGE"	=> append_sid("hangman.$phpEx?mode=overview"),
  		
  		"L_ORDER_BY_WON"	=> $lang['order_by_won'],
  		"L_ORDER_BY_LOST"	=> $lang['order_by_lost'],
  		"L_ORDER_BY_CREATED"	=> $lang['order_by_created'],
  		"L_ORDER_BY_POINTS"	=> $lang['order_by_points'],
  		"L_ORDER_BY_R_LETTERS"	=> $lang['order_by_r_letters'],
  		"L_ORDER_BY_W_LETTERS"	=> $lang['order_by_w_letters'],
  		
  		"L_CREATION_PAGE"	=> $lang['creation_page'],
  		"L_OVERVIEW_PAGE"	=> $lang['overview_page'],
  		
  		"L_HIGHSCORE_USER"	=> $lang['highscore_user'],
  		"L_HIGHSCORE_WON"	=> $lang['highscore_won'],
  		"L_HIGHSCORE_LOST"	=> $lang['highscore_lost'],
  		"L_HIGHSCORE_CREATED"	=> $lang['highscore_created'],
  		"L_HIGHSCORE_POINTS"	=> $lang['highscore_points'],
  		"L_HIGHSCORE_R_LETTERS" => $lang['highscore_r_letters'],
  		"L_HIGHSCORE_W_LETTERS" => $lang['highscore_w_letters'],
  		
  		"L_ASC" => $lang['highscore_asc'],
  		"L_DESC" => $lang['highscore_desc'],
  		
  		"L_HANGMAN_COPYRIGHT"	=>$lang['hangman_copyright'],
  		"L_HANGMAN_OVERALL_HEADLINE"=>$lang['hangman_overall_headline'],
  		
  		"L_ORDER_BY"		=> $lang['order_by'],
  		"L_HIGHSCORE_ACTION"	=> append_sid('hangman.'.$phpEx.'?mode=highscore'),
  		"L_SUBMIT"		=> $lang['filter_submit'],
  		"U_HANGMAN" 		=> append_sid('hangman.'.$phpEx),
		"L_HANGMAN" 		=> "Hangman",
		"L_HIGHSCORE_PAGE"	=> $lang['highscore_page'],
		//what is selected?
		"SEL_".$hfilter		=> 'selected="selected"',
		"SEL_".$horder		=> 'selected="selected"',
		"SEL_".$hlimit		=> 'selected="selected"'
  		));
	
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	exit;
}
else if ( $mode == 'delete')
{
	if ($userdata['user_level'] != ADMIN && !hangman_is_group_member($user_id,$hangman_cfg['moderator_group']))
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	else if ( $confirm == $lang['administration_yes'])
	{
		$del_score = $_POST['del_score'];
		hangman_delete_hangman($game_index,$del_score);
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	else if ($confirm == $lang['administration_no'] )
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	$template->set_filenames(array(
		'body' => 'hangman/hangman_admin.tpl'
		));
	$sql = "SELECT * FROM " . HANGMAN_WORDS . " WHERE hangmanid = '$game_index'";
 	if ( !($result = $db->sql_query($sql)) )
	{
			message_die(GENERAL_ERROR, $lang['error_administration'], '', __LINE__, __FILE__, $sql);
	}
  	$row = $db->sql_fetchrow($result);
  	$hangman_subject = $row['hangman_subject'];
	$l_admin_text = sprintf($lang['administration_text'],'<b/>"'.$hangman_subject.'"</b>');
	$l_admin_text .= '<br><input type="checkbox" class="liteoption" checked="checked"><span class="gen">'.$lang['administration_text_score'].'</span></input>';
  	$template->assign_vars(array(
			"L_ADMIN_TEXT"	=> $l_admin_text,
			"L_ADMIN_TITLE"	=> $lang['administration_title'],
			"L_ADMIN_YES"	=> $lang['administration_yes'],
			"L_ADMIN_NO"	=> $lang['administration_no'],
			"L_HANGMAN_OVERALL_HEADLINE"=>$lang['hangman_overall_headline'],
			"L_HANGMAN_COPYRIGHT"	=>$lang['hangman_copyright'],
  			"U_HANGMAN" 		=> append_sid('hangman.'.$phpEx),
			"L_HANGMAN" 		=> "Hangman",
			"U_ADMINISTRATION"	=> append_sid("hangman.$phpEx?mode=delete&game_index=$game_index"),
			"HANGMAN_SUBJECT"	=> $hangman_subject)
			);
		
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	exit;
}
/*MULTIDELETE*/
else if ( $mode == 'multi_del')
{
	if ($userdata['user_level'] != ADMIN && !hangman_is_group_member($user_id,$hangman_cfg['moderator_group']))
	{
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	else if ( isset($_GET['submit']) || isset($_POST['submit']) )
	{
		$sql = "SELECT * FROM ".HANGMAN_WORDS;
		if ( !($result = $db->sql_query($sql)) )
		{
				message_die(GENERAL_ERROR, $lang['error_administration'], '', __LINE__, __FILE__, $sql);
		}
  		$rowcount = $db->sql_numrows($result);
  		$rows	= $db->sql_fetchrowset($result);
  		$submitted_id = '';
		for ($i = 0; $i<=$rowcount; $i++)
		{
			$id = $rows[$i]['hangmanid'];
			if (isset($_POST["delete_id$id"]) || isset($_GET["delete_id$id"]))
			{
				hangman_delete_hangman($id);
			}
		}
		redirect(append_sid("hangman.$phpEx?mode=overview"));
		exit;
	}
	else 
	{
		redirect(append_sid("hangman.$phpEx?mode=help"));
		exit;
	}
	exit;
}/*HELP*/
else
{
	$template->set_filenames(array(
		'body'	=> 'hangman/hangman_help.tpl'
		));
	$template->assign_vars(array(
			"L_HELP_PAGE"	=> $lang['help_page'],
			"L_HANGMAN"	=> "Hangman",
			"U_HANGMAN"	=> append_sid("hangman.$phpEx?mode=overview"),
			"L_HANGMAN_OVERALL_HEADLINE" => $lang['hangman_overall_headline'],
			"L_HELP_TITLE"=> $lang['help_title'],
			"L_HANGMAN_COPYRIGHT"	=>$lang['hangman_copyright'],
			"L_OVERVIEW_PAGE"=> $lang['overview_page'],
			"U_OVERVIEW_PAGE"=>append_sid("hangman.$phpEx?mode=overview")
			));
	//some help for overview
	$template->assign_block_vars("Help",array(
			"L_HELP_TOPIC"	=> $lang['overview_page'],
			"L_HELP_TEXT"	=> $lang['help_overview']
			));
	//some help for creation
	$template->assign_block_vars("Help",array(
			"L_HELP_TOPIC"	=> $lang['creation_page'],
			"L_HELP_TEXT"	=> $lang['help_creation']
			));
	//some help for highscore
	$template->assign_block_vars("Help",array(
			"L_HELP_TOPIC"	=> $lang['highscore_page'],
			"L_HELP_TEXT"	=> $lang['help_highscore']
			));
	if($hangman_cfg['points_mod_installed'] === true)
	{
		//some help for highscore - points_system
		$template->assign_block_vars("Help",array(
			"L_HELP_TOPIC"	=> $lang['highscore_page'],
			"L_HELP_TEXT"	=> sprintf($lang['help_points'],$hangman_cfg['points_mod_lost'],$hangman_cfg['points_mod_won'],$hangman_cfg['points_mod_letters'],$hangman_cfg['points_mod_created'])
			));
	}
	//some help for highscore
	$template->assign_block_vars("Help",array(
			"L_HELP_TOPIC"	=> $lang['highscore_page'],
			"L_HELP_TEXT"	=> sprintf($lang['help_highscore_system'],$hangman_cfg['score_create'],$hangman_cfg['score_won'],$hangman_cfg['score_letters'],$hangman_cfg['score_lost'])
			));
					
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	exit;
}
?>