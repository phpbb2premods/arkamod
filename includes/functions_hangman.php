<?php

//MAIN FILE FOR HANGMAN FUNCTIONS ;)
//WILL BE USEFULL FOR LATER THINGS PLANNED
if (!defined('IN_PHPBB'))
	die("Hacking attempt");
if(defined('IN_HANGMAN') && !defined('HANG_FUNC_INCLUDED'))
{
	$hangman_cfg = array(
		'games_per_page'	=> 20,
		'points_mod_installed'	=> false,
		'points_mod_won'	=> 100,
		'points_mod_lost'	=> 10,
		'points_mod_created'	=> 50,
		'points_mod_letters'	=> 10,
		'only_admin_create'	=> false,
		'time_play_again'	=> 30, 		//0 means users couldn't quess a word twice
		'make_words_upper'	=> true,
		'standart_filter'	=> 'none',
		'standart_days'		=> 3,
		'standart_tries'	=> 2,
		'score_lost'		=> 1,
		'score_won'			=> 15,
		'score_create'		=> 1,
		'score_letters'		=> 1,
		'hsc_letters_p'		=> 1,
		'highscore_filter'	=> 'score',
		'letters'			=> 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789, .:_-?;*+!',
		'auto_replace_letters'	=> ',.- _;*+?!:',
		'minimum_tries'		=> 3,
		'maximum_tries'		=> 9,
		'minimum_letters'	=> 3,		//word_length
		'maximum_letters'	=> 35,
		'convert_special_l'	=> false, 	//ü => ue,ö=>oe...
		'show_stats'		=> true,
		'games_per_day'		=> 100,
		'moderator_group'	=> -1,
		'requessing_lose'	=> true,
		'allow_guest'		=> true,	//guests can create
		'show_numbers'		=> true,	//numbers in front of hangmans in overview?
		'min_help'			=> 0,		//minimum help length
		'standart_title'	=> 'Hangman',//standart hangman title
		'hangman_counter'	=> 0,		//counts ALL hangmans ever made
		'hangman_version'	=> '1.5.6'	//for future updates will notice version
		);
/******************************************
updates hangman_counter
*******************************************/
if(!function_exists('hangman_counter')) 
{
	function hangman_counter($add = 1)
	{
		global $db,$hangman_cfg;
		$stats = get_hangman_stats();
		if ($stats['count'] > $hangman_cfg['hangman_counter'])
			$hangman_cfg['hangman_counter'] = $stats['count'] - $add;
			
		$sql = "UPDATE ".HANGMAN_CONFIGS." SET config_value ='".intval($hangman_cfg['hangman_counter']+$add)."' WHERE config_name LIKE 'hangman_counter'";
		$db->sql_query($sql);
		return 1;
	}
}
/*****************************************
//sets and/or gets the configs for hangman
******************************************/
if(!function_exists('hangman_get_config')) 
{
	function hangman_get_config(&$hangman_cfg)
	{
		global $db;
		$sql = "SELECT * FROM " . HANGMAN_CONFIGS;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_get_config'], '', __LINE__, __FILE__, $sql);
		}
  		$rowcount 	= $db->sql_numrows($result);
  		$rows		= $db->sql_fetchrowset($result);
  		if ($rowcount != count($hangman_cfg)) //set standart config if counts differs
  		{
  			$sql = "DELETE FROM " .HANGMAN_CONFIGS;
  			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_set_config'], '', __LINE__, __FILE__, $sql);
			}
  			
  			$a = ''; $b ='';
  			foreach( $hangman_cfg as $a => $b)
  			{
  				
  				$sql = "INSERT INTO " .HANGMAN_CONFIGS. " (config_name,config_value) values('$a','$b')";
  				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, $lang['error_set_config'], '', __LINE__, __FILE__, $sql);
				}
  			}
  		}
  		else
  		{
  			for ( $i = 0; $i< $rowcount; $i++)
  			{
				$hangman_cfg[$rows[$i]['config_name']] = $rows[$i]['config_value'];
  			}
  		}
  		return true;

	}
}
/**************************************************************
//checks words -> replace all good letters, if a letter remains
//it is a bad > word check failes and gives remaining
**************************************************************/
if(!function_exists('hangman_check_word'))
{
	function hangman_check_word($word,&$remaining)
	{
		global $hangman_cfg;
		$temp = $word;
		$allowed_letters = $hangman_cfg['letters'];
		for ($i = 0; $i < strlen($allowed_letters); $i++)
		{
			$letter = $allowed_letters[$i];
			$temp = str_replace($letter,'',$temp);
		}
		if (strlen($temp)>0)
		{
			$remaining = $temp;
			return false;	//word is wrong
		}
		else
			return true;	//word check failes
	}
}
/**************************************************************************
//function which gets all who quessed a hangman except the user given by id
***************************************************************************/
if(!function_exists('hangman_get_quessors')) 
{
	function hangman_get_quessors(&$quessors,$except_userid,$game_index,&$quessors_count,$no_links = false)
	{
		global $db;
		$sql = "SELECT * FROM " .HANGMAN_QUESS. " WHERE hangmanid = '$game_index' AND userid NOT LIKE '$except_userid'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
		}
  		$row = $db->sql_fetchrowset($result);
  		$quessors_count = $db->sql_numrows($result);
  		for ($i = 0; $i < $quessors_count; $i++)
    		{
    			$quessors[$i]['userid'] = $row[$i]['userid'];
    		
    			$quessors[$i]['name'] = hangman_get_username($quessors[$i]['userid'],$no_links);
    			$quessors[$i]['quesscount'] = $row[$i]['quesscount'];
    		}
    		return true;
	}
}
/*******************************************
//function will get username to given userid
//$no_link 	true	gives only username
********************************************/
if(!function_exists('hangman_get_username')) 
{
	function hangman_get_username($theuserid,$no_link = false)
	{
		global $lang;
		global $db;
		if ($theuserid == 0)
			$theuserid = ANONYMOUS;
		$res_name = '';
   		$sql = "SELECT username FROM " . USERS_TABLE. " WHERE user_id = '$theuserid'";
    		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_get_username'], '', __LINE__, __FILE__, $sql);
		}
  		$row = $db->sql_fetchrow($result);
		if ($no_link)
		{
			$res_name = $row['username'];
		}
		else
			$res_name = '<a href="' . append_sid("profile.php?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $theuserid) . '"' . $style_color .'>' . $row['username'] . '</a>';
  		return $res_name;
 	}
}
/************************************
//function simply gets users_losttime
************************************/
if(!function_exists('hangman_getuserslosttime')) 
{
	function hangman_getuserslosttime($theuserid,$hangman_id)
	{
		global $db;
		$sql = "SELECT * FROM " .HANGMAN_QUESS." WHERE userid='$theuserid' AND hangmanid='$hangman_id'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
		}
  		$row = $db->sql_fetchrow($result);
  		return $row['losttime'];
	}
}
/****************************
//display the quessed letters
*****************************/
if(!function_exists('hangman_display_quessed_letters')) 
{
	function hangman_display_quessed_letters($word,$quessed_letters)
	{
		global $hangman_cfg,$template;
		$counter = 0;
		$quessed_letters = $quessed_letters.str_replace(chr(32),'_',$hangman_cfg['auto_replace_letters']);
		for ($i = 0; $i < strlen($word); $i++)
		{
			$bfound = false;
			$akt_char = ($hangman_cfg['make_words_upper']==true)?strtoupper($word[$i]):$word[$i];
			for ($j = 0; $j < strlen($quessed_letters); $j++)
			{
				$quess_char = ($hangman_cfg['make_words_upper']==true)?strtoupper($quessed_letters[$j]):$quessed_letters[$j];
				if ( $akt_char == $quess_char )
					$bfound = true;
			}
			if (!$bfound)
				$counter++;
			//this is for getting a handle for SPACE character -> dot looks better ;)
			if ($akt_char == '_' || $akt_char == chr(32))
			{
				$akt_char = '&#8226;';
			}
			$template->assign_block_vars("Hangman_Letters",array(
				"HANGMAN_CHAR" => ($bfound==true)?$akt_char:'_'
				));
		}
		return $counter;
	}
}
/***********************************************
//deletes a hangman and adds -1 to created games if wanted
***********************************************/
if(!function_exists('hangman_delete_hangman')) 
{
	function hangman_delete_hangman($game_index,$del_score_creator = false)
	{
		global $db;
		$sql = "DELETE FROM " .HANGMAN_QUESS. " WHERE hangmanid='$game_index'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$sql = "SELECT userid FROM " .HANGMAN_WORDS." WHERE hangmanid = '$game_index' ";
    		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		//UPDATE SCORE
		if ($del_score_creator == true)
  			hangman_updatescore(0,0,-1,$row['userid'],$row['userid']);
  		else
  			hangman_updatescore(0,0,0,$row['userid'],$row['userid']);
  		$sql = "DELETE FROM " .HANGMAN_WORDS. " WHERE hangmanid='$game_index'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
  		return true;
	}
}
/********************************************
//function which get some stats -> 
//	Count all, Today created, Time up, Lost, Won, Best Player
*********************************************/
	function get_hangman_stats()
	{
		global $db,$hangman_cfg;
		$stats = array(
			'count' 	=> 0,
			'today'		=> 0,
			'time_up'	=> 0,
			'won'		=> 0,
			'best_player'	=> 0,
			'total_hangmans'=>intval($hangman_cfg['hangman_counter'])
			);
		//get hang_count if wanted
		$sql = "SELECT count(hangmanid) FROM ".HANGMAN_WORDS;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$count = $row['count(hangmanid)'];
		$stats['count'] = intval($count);
		
		//get count today if wanted
		$today_begin = strtotime(date('Ymd',time()));
		$sql = "SELECT count(hangmanid) FROM ".HANGMAN_WORDS." WHERE time_created >= '$today_begin'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$today = $row['count(hangmanid)'];
		$stats['today'] = intval($today);
  		
  		//get time up
  		$now = time();
  		$sql = "SELECT count(hangmanid) FROM ".HANGMAN_WORDS." WHERE time_limit <= '$now' AND time_limit <> 0 AND bwon <> '1'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$time_up = $row['count(hangmanid)'];
		$stats['time_up'] = intval($time_up);
  		
  		//get won if wanted
  		$sql = "SELECT count(hangmanid) FROM ".HANGMAN_WORDS." WHERE bwon = '1'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$won = $row['count(hangmanid)'];
		$stats['won'] = intval($won);
  		
  		//get best player if wanted
  		$sql = "SELECT userid FROM ".HANGMAN_SCORE." ORDER BY points DESC LIMIT 1";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$best_player = $row['userid'];
		$stats['best_player'] = intval($best_player);
		return $stats;
	}

/*******************************
//function returns true if user 
//is a group member of given group id
********************************/
if(!function_exists('hangman_is_group_member')) 
{
	function hangman_is_group_member($userid,$groupid)
	{
		global $db;
		$sql = "SELECT count(group_id) FROM ".USER_GROUP_TABLE." WHERE user_id='$userid' AND group_id='$groupid' AND user_pending = 0";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_delete_hangman'], '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		//print_r($row);
		if ($row['count(group_id)'])
			return true;
		else
			return false;
	}
}
/*****************************
//used in bbcode.php, to create new hangman
//
*****************************/
if(!function_exists('phpbb_new_hang')) 
{
	function phpbb_new_hang($text,$uid)
	{
		global $hangman_cfg,$db,$phpbb_root_path,$userdata;
		$user_id = $userdata['user_id'];
		//check if word is to long -> 35chars ;)
		//replace chars if so
		$temp = $text;
		if ($hangman_cfg['convert_special_l'])
			$temp = str_replace(array('ö','ä','ü','ß','Ö','Ä','Ü'),array('oe','ae','ue','ss','OE','AE','UE'),$temp);
		if ($hangman_cfg['make_upper'])
		{
			$temp = str_replace(array('ä','ü','ö'),array('Ä','Ü','Ö'),$temp);
			$temp = strtoupper($temp);
		}
		$temp = str_replace(' ','_',$temp);
		if(! (strlen($temp)>$hangman_cfg['maximum_letters']))
		{
			//gernerate new hangman ;) -> checking etc if allowed blabla
			$sql = "SELECT * FROM ".HANGMAN_WORDS." WHERE hangman_word LIKE '$temp' ORDER BY bwon ASC";
			$result = $db->sql_query($sql);
			if ($db->sql_numrows($result) > 0) //word already in db?
			{
				$row = $db->sql_fetchrow($result);
				$hang_id = $row['hangmanid'];
			}
			else //we have to create a new one
			{
				//anti spam feature
				$today_begin = strtotime(date('Ymd',time()));
				$sql = "SELECT count(hangmanid) FROM ".HANGMAN_WORDS." WHERE userid = '$user_id' AND time_created >= '$today_begin'";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, $lang['error_get_hangman'], '', __LINE__, __FILE__, $sql);
				}
				$row = $db->sql_fetchrow($result);
				$today_count = intval($row['count(hangmanid)']);
				//we should play some ;)
				if (intval($today_count) < intval($hangman_cfg['games_per_day']))
				{
					$wort = $temp;$hilfe = '';$subject = 'Hangman - BBCODE';
					$maximal_versuche=$hangman_cfg['standart_tries'];
					$bbcode_uid = $uid;$zeit = time();$gueltige_zeit = 0;
					$sql = "INSERT INTO " .HANGMAN_WORDS. " (userid , hangman_word, hangman_help , hangman_subject , max_tries, bbcodeid,time_created,time_limit ) 
		 					values ( '$user_id',
	 						'$wort',
	 						'$hilfe',
	 						'$subject',
	 						'$maximal_versuche',
	 						'$bbcode_uid',
	 						'$zeit',
	 						'$gueltige_zeit')";
	 				$db->sql_query($sql);
	 				$sql = "SELECT * FROM ".HANGMAN_WORDS." WHERE hangman_word LIKE '$temp' ORDER BY bwon ASC";
	 				$row = $db->sql_fetchrow($db->sql_query($sql));
					$hang_id = $row['hangmanid'];
					hangman_counter();
				}
				else
				{
					$sql  = "SELECT * FROM ".HANGMAN_WORDS." ORDER BY time_created DESC";
					$row = $db->sql_fetchrow($db->sql_query($sql));
					$hang_id = $row['hangmanid'];
				}
			}
		}
		return '[hangman='.$hang_id.':'.$uid.']';
	}
}
/************************************************
//main function to update hangman score in hanghighscore
//and if wanted in points mod...
************************************************/
if(!function_exists('hangman_updatescore')) 
{
	function hangman_updatescore($add_lost=0,$add_won=0,$add_created=0,$creator_userid=0,$quessor_userid=0,$add_r_letters=0,$add_w_letters=0)
	{
		global $hangman_cfg,$db;
		if ($creator_userid==0 && $quessor_userid==0)
			return true;
		$sql = "SELECT * FROM ".HANGMAN_SCORE." WHERE userid = '$quessor_userid' OR userid = '$creator_userid'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
		}
		$rowcount = $db->sql_numrows($result);
  		$row = $db->sql_fetchrowset($result);
  		//if creator hasn't a score
  		if ($row[0]['userid'] != $creator_userid && $row[1]['userid']!=$creator_userid && $creator_userid!=0)
  		{
  			$sql = "INSERT INTO " .HANGMAN_SCORE." (userid,won,created,lost,points,r_letters,w_letters) values
  				('$creator_userid',0,0,0,0,0,0)";
  			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
			}
		}
		$sql = "SELECT * FROM ".HANGMAN_SCORE." WHERE userid = '$quessor_userid' OR userid = '$creator_userid'";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
		}
		$rowcount = $db->sql_numrows($result);
  		$row = $db->sql_fetchrowset($result);
  		//if quessor hasn't a score
		if ($row[0]['userid'] != $quessor_userid && $row[1]['userid']!=$quessor_userid && $quessor_userid!=0)
		{
			$sql = "INSERT INTO " .HANGMAN_SCORE." (userid,won,created,lost,points,r_letters,w_letters) values
  				('$quessor_userid',0,0,0,0,0,0)";	
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
			}
  		}
  		//update creator ;)
  		if ($creator_userid!=0)
  		{
  			$add_points 	= $add_lost*intval($hangman_cfg['score_lost']) + $add_created*intval($hangman_cfg['score_create']);
  			$sql = "UPDATE ".HANGMAN_SCORE." SET points = points + $add_points
  				WHERE userid='$creator_userid'";
  			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
			}
		}
		if ($quessor_userid!=0)
		{
			//update the other ;)
			$sql = "SELECT * FROM ".HANGMAN_SCORE." WHERE userid = '$quessor_userid'";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
			}
			$row = $db->sql_fetchrow($result);
  		
  			$games_lost 	= $row['lost']	+ $add_lost;
  			$games_won 		= $row['won']	+ $add_won;
  			$games_created 	= $row['created']+$add_created;
  			$letters_won	= $row['r_letters'] + $add_r_letters;
  			$letters_lost	= $row['w_letters'] + $add_w_letters;
  			
  			$add_points	= $row['points'] + $add_won * intval($hangman_cfg['score_won']) + $add_r_letters*intval($hangman_cfg['score_letters']);
  		
  			$sql = "UPDATE ".HANGMAN_SCORE." SET lost='$games_lost',won='$games_won',created='$games_created', points='$add_points', r_letters='$letters_won', w_letters='$letters_lost'
  				WHERE userid='$quessor_userid'";
  				//echo $sql;
  			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
			}
			//here comes some cash/points mod stuff
			if ($hangman_cfg['points_mod_installed'] == 1)
			{
				$old_points = 0;
				$sql = "SELECT * FROM ".USERS_TABLE." WHERE user_id='$quessor_userid'";
				if ( !($result = $db->sql_query($sql)) ) 
              			{
              				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
              			}
              			$points_row = $db->sql_fetchrow($result);
              			$old_points = $points_row['user_points'];
              			//echo 'old: '.$old_points;
              			$new_points = $old_points 
              					- ($add_lost*intval($hangman_cfg['points_mod_lost'])) 
              					+ ($add_won*intval($hangman_cfg['points_mod_won'])) 
              					+ ($add_created*intval($hangman_cfg['points_mod_created']))
              					+ ($add_r_letters*intval($hangman_cfg['points_mod_letters']));
              			$sql = "UPDATE ".USERS_TABLE." SET user_points = '$new_points' WHERE user_id='$quessor_userid'"; 
              			if ( !($db->sql_query($sql)) ) 
              			{
              				message_die(GENERAL_ERROR, $lang['error_update_score'], '', __LINE__, __FILE__, $sql);
              			}
			}		
		}
		return true;
	}
}

/***********************************************
//		time function :)
*************************************************/
if(!function_exists('hangman_show_time')) 
{
	function hangman_show_time($tmp,$user_timezone = '',$date_format = 'd.m.y H:i')
	{
		global $board_config;
		
		if($user_timezone == '')
			$user_timezone =  $board_config['board_timezone'];
		
		if($date_format == '')
			$date_format = $board_config['default_dateformat'];
		
		return create_date($date_format, $tmp, $user_timezone);
	}
}
/************************************************
//		get hangman configs
************************************************/

	if(!hangman_get_config($hangman_cfg))
	{
		message_die(GENERAL_ERROR, $lang['error_get_config'], '', __LINE__, __FILE__, $sql);
	}
	define('HANG_FUNC_INCLUDED',true);
}
?>