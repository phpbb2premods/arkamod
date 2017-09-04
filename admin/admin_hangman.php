<?php

define('IN_PHPBB', 1);
define('IN_HANGMAN', true);
if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Games']['Hangman'] = append_sid("admin_hangman.$phpEx?mode=config");
	return;
}

$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_hangman.' . $phpEx);
include($phpbb_root_path . 'includes/functions_hangman.php');

$default_config = $hangman_cfg;

//POST_VARS
if( isset($_GET['mode']) || isset($_POST['mode']) )
{
	$mode = ($_GET['mode']) ? $_GET['mode'] : $_POST['mode'];
}
else 
{
	$mode = '';
	
}
if( isset($_GET['del_hangmans']) || isset($_POST['del_hangmans']) )
{
	$del_hangmans = ($_GET['del_hangmans']) ? $_GET['del_hangmans'] : $_POST['del_hangmans'];
}
else 
{
	$del_hangmans = '';
	
}
if( isset($_GET['del_highscore']) || isset($_POST['del_highscore']) )
{
	$del_highscore = ($_GET['del_highscore']) ? $_GET['del_highscore'] : $_POST['del_highscore'];
}
else 
{
	$del_highscore = '';
	
}
if( isset($_GET['del_won']) || isset($_POST['del_won']) )
{
	$del_won = ($_GET['del_won']) ? $_GET['del_won'] : $_POST['del_won'];
}
else 
{
	$del_won = '';
	
}
if( isset($_GET['del_time_up']) || isset($_POST['del_time_up']) )
{
	$del_time_up = ($_GET['del_time_up']) ? $_GET['del_time_up'] : $_POST['del_time_up'];
}
else 
{
	$del_time_up = '';
	
}

if ($del_hangmans)
{
	$sql1 = "TRUNCATE ".HANGMAN_QUESS;
	$sql2 = "TRUNCATE ".HANGMAN_WORDS;
	$result1 = $db->sql_query($sql1);
	$result2 = $db->sql_query($sql2);
	if(!$result1 || !$result2)
	{
		message_die(GENERAL_ERROR, 'Could not delete Hangmans', '', __LINE__, __FILE__, $sql);
	}
	
	$msg = 	$lang['administration_deleted_all_hangmans'];
	message_die(GENERAL_MESSAGE, $msg);
}
else if ($del_highscore)
{
	$sql = "TRUNCATE ".HANGMAN_SCORE;
	$result = $db->sql_query($sql);
	if (!$result)
	{
		message_die(GENERAL_ERROR, 'Could not delete Highscore!', '', __LINE__, __FILE__, $sql);
	}
	//prevent negative scores ;)
	$sql = "UPDATE ".HANGMAN_WORDS." SET userid='0'";
	$result = $db->sql_query($sql);
	if (!$result)
	{
		message_die(GENERAL_ERROR, 'Could not delete Highscore!', '', __LINE__, __FILE__, $sql);
	}
	$msg = $lang['administration_deleted_highscore'];
	message_die(GENERAL_MESSAGE, $msg);
}
else if ($del_won)
{
	$sql = "DELETE FROM ".HANGMAN_WORDS. " WHERE bwon = 1";
	$result = $db->sql_query($sql);
	if (!$result)
	{
		message_die(GENERAL_ERROR, 'Could not delete Hangmans!', '', __LINE__, __FILE__, $sql);
	}
	$msg = sprintf($lang['administration_deleted_hangmans'],$db->sql_affectedrows());
	message_die(GENERAL_MESSAGE, $msg);
}
else if ($del_time_up)
{
	$now = time();
	$sql = "DELETE FROM ".HANGMAN_WORDS. " WHERE time_limit < '$now' AND time_limit <> 0";
	$result = $db->sql_query($sql);
	if (!$result)
	{
		message_die(GENERAL_ERROR, 'Could not delete Hangmans!', '', __LINE__, __FILE__, $sql);
	}
	$msg = sprintf($lang['administration_deleted_hangmans'],$db->sql_affectedrows());
	message_die(GENERAL_MESSAGE, $msg);
}
$sql = "SELECT *
	FROM " . HANGMAN_CONFIGS;
if(!$result = $db->sql_query($sql))
{
	message_die(CRITICAL_ERROR, "Could not query config information in admin_board", "", __LINE__, __FILE__, $sql);
}
$rowcount 	= $db->sql_numrows($result);
$rows		= $db->sql_fetchrowset($result);
$a = ''; $b ='';
if ($rowcount != count($default_config)) //set standart config
{
	$sql = "DELETE FROM " .HANGMAN_CONFIGS;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, $lang['error_set_config'], '', __LINE__, __FILE__, $sql);
	}
	foreach( $default_config as $a => $b)
	{
		$sql = "INSERT INTO " .HANGMAN_CONFIGS. " (config_name,config_value) values('$a','$b')";
  		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, $lang['error_set_config'], '', __LINE__, __FILE__, $sql);
		}
  		$config_name = $a;
		$config_value = $b;
		$default_config[$config_name] = $config_value;
		//echo $a.'=>'.$b.'<br>';
  	}
  	$new = $default_config;

}
else
{
	foreach( $rows as $row )
	{
		$config_name = $row['config_name'];
		$config_value = $row['config_value'];
		$default_config[$config_name] = $config_value;
		
		$new[$config_name] = ( isset($_POST[$config_name]) ) ? $_POST[$config_name] : $default_config[$config_name];

		if( isset($_POST['submit']) )
		{
			$sql = "UPDATE " . HANGMAN_CONFIGS . " SET
				config_value = '" . str_replace("\'", "''", $new[$config_name]) . "'
				WHERE config_name = '$config_name'";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Failed to update general configuration for $config_name", "", __LINE__, __FILE__, $sql);
			}
		}
	}
}
$template->set_filenames(array(
		"body" => "hangman/admin/admin_hangman.tpl")
		);

$only_admin_create_yes = ( $new['only_admin_create'] ) ? 'checked="checked"' : '';
$only_admin_create_no  = (!$new['only_admin_create'] ) ? 'checked="checked"' : '';

$points_mod_installed_yes = ( $new['points_mod_installed'] ) ? 'checked="checked"' : '';
$points_mod_installed_no  = (!$new['points_mod_installed'] ) ? 'checked="checked"' : '';

$make_words_upper_yes = ( $new['make_words_upper'] ) ? 'checked="checked"' : '';
$make_words_upper_no  = (!$new['make_words_upper'] ) ? 'checked="checked"' : '';

$convert_special_letters_yes 	= ( $new['convert_special_l'] ) ? 'checked="checked"' : '';
$convert_special_letters_no 	= (!$new['convert_special_l'] ) ? 'checked="checked"' : '';

$show_stats_yes = ( $new['show_stats'] ) ? 'checked="checked"' : '';
$show_stats_no  = (!$new['show_stats'] ) ? 'checked="checked"' : '';

$requessing_lose_yes = ( $new['requessing_lose'] ) ? 'checked="checked"' : '';
$requessing_lose_no  = (!$new['requessing_lose'] ) ? 'checked="checked"' : '';

$hsc_letters_p_yes 	= ( $new['hsc_letters_p'] ) ? 'checked="checked"' : '';
$hsc_letters_p_no 	= (!$new['hsc_letters_p'] ) ? 'checked="checked"' : '';

$allow_guest_yes = ( $new['allow_guest'] ) ? 'checked="checked"' : '';
$allow_guest_no  = (!$new['allow_guest'] ) ? 'checked="checked"' : '';
//
//FILTER STUFF FOR FILTER IN OVERVIEW PAGE
//
$filters = array(	"none" 		=> '<option value="none">'.$lang['filter_nofilter'].'</option>',
 			'unquessed' 	=> '<option value="unquessed">'.$lang['filter_unquessed'].'</option>',
 			"time_up" 	=> '<option value="time_up">'.$lang['filter_time_up'].'</option>',
 			"won" 		=> '<option value="won">'.$lang['filter_won'].'</option>',
 			"own" 		=> '<option value="own">'.$lang['filter_own'].'</option>',
 			"others" 	=> '<option value="others">'.$lang['filter_others'].'</option>');
 	
$filter = $new['standart_filter'];
switch ($filter)
 	{
 		case 'unquessed':
 			$filters['unquessed'] = '<option value="unquessed" selected="selected">'.$lang['filter_unquessed'].'</option>';
 			break;
 		case 'time_up':
 			$filters["time_up"] = '<option value="time_up" selected="selected">'.$lang['filter_time_up'].'</option>';
 			break;
 		case 'won':
 			$filters["won"] = '<option value="won" selected="selected">'.$lang['filter_won'].'</option>';
 			break;
 		case 'own':
 			$filters["own"] = '<option value="own" selected="selected">'.$lang['filter_own'].'</option>';
 			break;
 		case 'others':
 			$filters["others"] = '<option value="others" selected="selected">'.$lang['filter_others'].'</option>';
 			break;
 		default:
 			$filters["none"] = '<option value="none" selected="selected">'.$lang['filter_nofilter'].'</option>';
 			break;
	}

while( list($name, $text) = @each($filters) )
     	{
     		$template->assign_block_vars("Filters",array(
     			'Filter'	=> $text
     		));
     	}
//
//Hangman Moderator Group ;)
//     	
$sql = "SELECT group_id, group_name
		FROM " . GROUPS_TABLE . "
		WHERE group_single_user <> " . TRUE . "
		ORDER BY group_name";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain group list', '', __LINE__, __FILE__, $sql);
}

$select_list = '';
if ( $row = $db->sql_fetchrow($result) )
{
	$select_list .= '<select name="moderator_group">';
	$select_list .= '<option value="-1">' . $lang['administration_nonemod'] . '</option>'."\n";
	do
	{
		if($row['group_id'] != $new['moderator_group'])
			$select_list .= '<option value="' . $row['group_id'] . '">' . $row['group_name'] . '</option>';
		else
			$select_list .= '<option value="' . $row['group_id'] . '" selected="selected">' . $row['group_name'] . '</option>';
		$select_list.="\n";
	}
	while ( $row = $db->sql_fetchrow($result) );
	$select_list .= '</select>';
}

//
//REST OF TEMPLATE -.-
//
$template->assign_vars(array(
		'L_CONFIGURATION_TITLE'		=> $lang['administration_config_title'],
		'L_CONFIGURATION_EXPLAIN'	=> $lang['administration_config_explain'],
		'L_GENERAL_SETTINGS'		=> $lang['administration_config_head'],
		
		'L_HANGMAN_GAMES_PER_PAGE'	=> $lang['administration_games_per_page'],
		'L_GAMES_PER_PAGE'		=> $new['games_per_page'],
		'L_HANGMAN_STANDART_FILTER'	=> $lang['administration_standart_filter'],
		
		'L_HANGMAN_TIME_PLAY_AGAIN'	=> $lang['administration_time_play_again'],
		'L_TIME_PLAY_AGAIN'		=> $new['time_play_again'],
		
		'L_HANGMAN_STANDART_TITLE'	=> $lang['administration_standart_title'],
		'L_STANDART_TITLE'		=> $new['standart_title'],
		
		'L_HANGMAN_MIN_HELP'		=> $lang['administration_min_help'],
		'L_MIN_HELP'			=> $new['min_help'],
		
		'L_HANGMAN_STANDART_DAYS'	=> $lang['administration_standart_days'],
		'L_STANDART_DAYS'		=> $new['standart_days'],
		
		'L_HANGMAN_STANDART_TRIES'	=> $lang['administration_standart_tries'],
		'L_STANDART_TRIES'		=> $new['standart_tries'],
		
		'L_TRIES_MINIMUM'		=> $lang['administration_tries_minimum'],
		'L_MINIMUM_TRIES'		=> $new['minimum_tries'],
		'L_TRIES_MAXIMUM'		=> $lang['administration_tries_maximum'],
		'L_MAXIMUM_TRIES'		=> $new['maximum_tries'],
		
		'L_MIN_LETTERS'			=> $lang['administration_min_letters'],
		'L_MINIMUM_LETTERS'		=> $new['minimum_letters'],
		
		'L_MAX_LETTERS'			=> $lang['administration_max_letters'],
		'L_MAXIMUM_LETTERS'		=> $new['maximum_letters'],
		
		'L_HANGMAN_ONLY_ADMIN_CREATE' 	=> $lang['administration_only_admin_create'],
		'L_ONLY_ADMIN_CREATE_YES' 	=> $only_admin_create_yes,
		'L_ONLY_ADMIN_CREATE_NO'	=> $only_admin_create_no,
		
		'L_HANGMAN_ALLOW_GUEST' 	=> $lang['administration_allow_guest'],
		'L_ALLOW_GUEST_YES' 		=> $allow_guest_yes,
		'L_ALLOW_GUEST_NO'		=> $allow_guest_no,
		
		'L_USER_GAMES_PER_DAY'		=> $lang['administration_games_per_day'],
		'L_GAMES_PER_DAY'		=> $new['games_per_day'],
		
		'L_USER_GAMES_PER_DAY'		=> $lang['administration_games_per_day'],
		'L_GAMES_PER_DAY'		=> $new['games_per_day'],
		
		'L_MODERATOR_GROUP'		=> $lang['administration_moderator_group'],
		
		'L_SHOW_STATS' 	=> $lang['administration_show_stats'],
		'L_SHOW_STATS_YES' 		=> $show_stats_yes,
		'L_SHOW_STATS_NO'		=> $show_stats_no,

		'L_MAKE_WORDS_UPPER' 		=> $lang['administration_make_words_upper'],
		'L_MAKE_WORDS_UPPER_YES' 	=> $make_words_upper_yes,
		'L_MAKE_WORDS_UPPER_NO'		=> $make_words_upper_no,

		'L_CONVERT_SPECIAL_CHARS' 		=> $lang['administration_convert_special'],
		'L_CONVERT_SPECIAL_LETTERS_YES' 	=> $convert_special_letters_yes,
		'L_CONVERT_SPECIAL_LETTERS_NO'		=> $convert_special_letters_no,
		
		'L_HANGMAN_POINTS_MOD_INSTALLED'=> $lang['administration_points_mod_installed'],
		'L_POINTS_MOD_INSTALLED_YES' 	=> $points_mod_installed_yes,
		'L_POINTS_MOD_INSTALLED_NO'	=> $points_mod_installed_no,
		'L_HANGMAN_POINTS_MOD_WON'	=> $lang['administration_points_mod_won'],
		'L_POINTS_MOD_WON'		=> $new['points_mod_won'],
		'L_HANGMAN_POINTS_MOD_LOST'	=> $lang['administration_points_mod_lost'],
		'L_POINTS_MOD_LOST'		=> $new['points_mod_lost'],
		'L_HANGMAN_POINTS_MOD_CREATED'	=> $lang['administration_points_mod_created'],
		'L_POINTS_MOD_CREATED'		=> $new['points_mod_created'],
		'L_HANGMAN_POINTS_MOD_LETTERS'	=> $lang['administration_points_mod_letters'],
		'L_POINTS_MOD_LETTERS'		=> $new['points_mod_letters'],
		
		
		'L_HANGMAN_SCORE_WON'		=> $lang['administration_score_won'],
		'L_SCORE_WON'			=> $new['score_won'],
		'L_HANGMAN_SCORE_LOST'		=> $lang['administration_score_lost'],
		'L_SCORE_LOST'			=> $new['score_lost'],
		'L_HANGMAN_SCORE_CREATE'	=> $lang['administration_score_create'],
		'L_SCORE_CREATE'		=> $new['score_create'],
		'L_HANGMAN_SCORE_LETTERS'	=> $lang['administration_score_letters'],
		'L_SCORE_LETTERS'		=> $new['score_letters'],
		'L_HANGMAN_HSC_LETTERS_P'	=> $lang['administration_hsc_letters_p'],
		'L_HSC_LETTERS_P_YES' 	=> $hsc_letters_p_yes,
		'L_HSC_LETTERS_P_NO'	=> $hsc_letters_p_no,
		

		'L_HANGMAN_HIGHSCORE_FILTER'	=> $lang['administration_highscore_filter'],
		'SEL_'.$new['highscore_filter']	=> 'selected="selected"',
		"L_ORDER_BY_WON"		=> $lang['order_by_won'],
  		"L_ORDER_BY_LOST"		=> $lang['order_by_lost'],
  		"L_ORDER_BY_CREATED"		=> $lang['order_by_created'],
  		"L_ORDER_BY_POINTS"		=> $lang['order_by_points'],
  		"L_ORDER_BY_R_LETTERS"		=> $lang['order_by_r_letters'],
  		"L_ORDER_BY_W_LETTERS"		=> $lang['order_by_w_letters'],

		'L_HANGMAN_ALLOWED_LETTERS'	=> $lang['administration_allowed_letters'],
		'L_HANGMAN_AUTO_REPLACE_LETTERS'=> $lang['administration_auto_replace_letters'],
		'L_ALLOWED_LETTERS'		=> $new['letters'],
		'L_AUTO_REPLACE_LETTERS'	=> $new['auto_replace_letters'],
		  				
		'L_RESET_HANGMANS'		=> $lang['administration_reset_hangmans'],
		'L_RESET_HIGHSCORE'		=> $lang['administration_reset_highscore'],
		
		'SELECT_MOD_GROUP_BOX'		=> $select_list,
		
		'L_REQUESSING_LOSE_TRIES'	=> $lang['administration_requessing_lose'],
		'L_REQUESSING_LOSE_YES'		=> $requessing_lose_yes,
		'L_REQUESSING_LOSE_NO'		=> $requessing_lose_no,
		
		
		'L_SUBMIT'			=> $lang['administration_submit'],
		'L_RESET'			=> $lang['administration_reset'],
		'L_YES'				=> $lang['administration_yes'],
		'L_NO'				=> $lang['administration_no'],
		'L_RESET_WON'			=> 'Effacer les Pendus terminés',
		'L_RESET_TIME_UP'		=> 'Effacer les pendus écoulés'
		
		));
$template->pparse("body");

include('./page_footer_admin.'.$phpEx);
?>