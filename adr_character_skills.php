<?php 
/***************************************************************************
 *					adr_character_skills.php
 *				------------------------
 *	begin 			: 03/02/2004
 *	copyright			: Malicious Rabbit / Dr DLP
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *
 ***************************************************************************/

define('IN_PHPBB', true); 
define('IN_ADR_CHARACTER', true);
define('IN_ADR_SKILLS', true);
$phpbb_root_path = './'; 
include($phpbb_root_path . 'extension.inc'); 
include($phpbb_root_path . 'common.'.$phpEx);

$loc = 'character';
$sub_loc = 'adr_character_skills';

//
// Start session management
$userdata = session_pagestart($user_ip, PAGE_ADR); 
init_userprefs($userdata); 
// End session management
//

include($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx);

// Sorry , only logged users ...
if ( !$userdata['session_logged_in'] )
{
	$redirect = "adr_character.$phpEx";
	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

// Includes the tpl and the header
adr_template_file('adr_character_skills_body.tpl');

include($phpbb_root_path . 'includes/page_header.'.$phpEx);

// Define the points name , adds it if not defined ( Cash Mod compliance )
$board_config['points_name'] = $board_config['points_name'] ? $board_config['points_name'] : $lang['Adr_default_points_name'] ;

// Who is looking at this page ?
$user_id = $userdata['user_id'];
if ( (!( isset($_POST[POST_USERS_URL]) || isset($_GET[POST_USERS_URL]))) || ( empty($_POST[POST_USERS_URL]) && empty($_GET[POST_USERS_URL])))
{ 
	$view_userdata = $userdata; 
} 
else 
{ 
	$view_userdata = get_userdata(intval($_GET[POST_USERS_URL])); 
} 
$searchid = $view_userdata['user_id'];

// Get the general settings
$adr_general = adr_get_general_config();

adr_enable_check();
adr_ban_check($user_id);
adr_character_created_check($user_id);

// See if the user has ever created a character or no
$row = adr_get_user_infos($searchid);

// If someone is looking at a character's user that doesn't exist , let's display an error message
if (  !( $row['character_class'] ) && ($searchid != $user_id) ) 
{
	message_die(GENERAL_MESSAGE, $lang['Adr_character_lack']);
}
else
{
	$skills = adr_get_skill_data('');

	list($mining_percent_width, $mining_percent_empty) = adr_make_bars($row['character_skill_mining_uses'], $skills[1]['skill_req'], '250');
	list($stone_percent_width, $stone_percent_empty) = adr_make_bars($row['character_skill_stone_uses'], $skills[2]['skill_req'], '250');
	list($forge_percent_width, $forge_percent_empty) = adr_make_bars($row['character_skill_forge_uses'], $skills[3]['skill_req'], '250');
	list($enchantment_percent_width, $enchantment_percent_empty) = adr_make_bars($row['character_skill_enchantment_uses'], $skills[4]['skill_req'], '250');
	list($thief_percent_width, $thief_percent_empty) = adr_make_bars($row['character_skill_thief_uses'], $skills[6]['skill_req'], '250');

	$template->assign_vars(array(
		'MINING' => $row['character_skill_mining'],
		'MINING_IMG' => $skills[1]['skill_img'],
		'MINING_MIN' => $row['character_skill_mining_uses'],
		'MINING_MAX' => $skills[1]['skill_req'],
		'MINING_BAR' => $mining_percent_width,
		'MINING_BAR_EMPTY' => $mining_percent_empty,
		'STONE' => $row['character_skill_stone'],
		'STONE_IMG' => $skills[2]['skill_img'],
		'STONE_MIN' => $row['character_skill_stone_uses'],
		'STONE_MAX' => $skills[2]['skill_req'],
		'STONE_BAR' => $stone_percent_width,
		'STONE_BAR_EMPTY' => $stone_percent_empty,
		'FORGE' => $row['character_skill_forge'],
		'FORGE_IMG' => $skills[3]['skill_img'],
		'FORGE_MIN' => $row['character_skill_forge_uses'],
		'FORGE_MAX' => $skills[3]['skill_req'],
		'FORGE_BAR' => $forge_percent_width,
		'FORGE_BAR_EMPTY' => $forge_percent_empty,
		'ENCHANTMENT' => $row['character_skill_enchantment'],
		'ENCHANTMENT_IMG' => $skills[4]['skill_img'],
		'ENCHANTMENT_MIN' => $row['character_skill_enchantment_uses'],
		'ENCHANTMENT_MAX' => $skills[4]['skill_req'],
		'ENCHANTMENT_BAR' => $enchantment_percent_width,
		'ENCHANTMENT_BAR_EMPTY' => $enchantment_percent_empty,
		'THIEF' => $row['character_skill_thief'],
		'THIEF_IMG' => $skills[6]['skill_img'],
		'THIEF_MIN' => $row['character_skill_thief_uses'],
		'THIEF_MAX' => $skills[6]['skill_req'],
		'THIEF_BAR' => $thief_percent_width,
		'THIEF_BAR_EMPTY' => $thief_percent_empty,
		'L_MINING' => $lang['Adr_mining'],
		'L_MINING_DESC' => adr_get_lang($skills[1]['skill_desc']),
		'L_STONE' => $lang['Adr_stone'],
		'L_STONE_DESC' => adr_get_lang($skills[2]['skill_desc']),
		'L_FORGE' => $lang['Adr_forge'],
		'L_FORGE_DESC' => adr_get_lang($skills[3]['skill_desc']),
		'L_ENCHANTMENT' => $lang['Adr_enchantment'],
		'L_ENCHANTMENT_DESC' => adr_get_lang($skills[4]['skill_desc']),
		'L_TRADING' => $lang['Adr_trading'],
		'L_TRADING_DESC' => adr_get_lang($skills[5]['skill_desc']),
		'L_THIEF' => $lang['Adr_thief'],
		'L_THIEF_DESC' => adr_get_lang($skills[6]['skill_desc']),
	));
}

$template->assign_vars(array(
	'L_NAME' => $lang['Adr_races_name'],
	'L_DESC' => $lang['Adr_races_desc'],
	'L_IMG' => $lang['Adr_races_image'],
	'L_LEVEL' => $lang['Adr_character_level'],
	'L_PROGRESS' => $lang['Adr_character_progress'],
	'L_CHARACTER_OF' => sprintf ( $lang['Adr_character_of'], $view_userdata['username'] ),
	'L_NEW_CHARACTER_CLASS' => $lang['Adr_character_new_class'],
	'L_SKILLS' => $lang['Adr_character_skills'],
	'S_CHARACTER_ACTION' => append_sid("adr_character_skills.$phpEx"),
));

include($phpbb_root_path . 'adr/includes/adr_header.'.$phpEx);

$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
 
?> 
