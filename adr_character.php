<?php 
/***************************************************************************
 *					adr_character.php
 *				------------------------
 *	begin 			: 31/01/2004
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
define('IN_ADR_BATTLE', true);
define('IN_ADR_SHOPS', true);
define('IN_ADR_VAULT', true); 
$phpbb_root_path = './'; 
include($phpbb_root_path . 'extension.inc'); 
include($phpbb_root_path . 'common.'.$phpEx);

$loc = 'character';
$sub_loc = 'adr_character';

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
adr_template_file('adr_character_body.tpl');

include($phpbb_root_path . 'includes/page_header.'.$phpEx);

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
$points = $userdata['user_points'];
$posts = $userdata['user_posts'];

// Let's define some actions
$Level_up = isset($_POST['level_up']);
$carac_up = intval($_POST['carac_up']);
$Step2 = isset($_POST['Step2']);
$Step4 = isset($_POST['Step4']);
$bio_edit = isset($_POST['bio_edit']);
$upgrade_bio = isset($_POST['upgrade_bio']);
$delete = isset($_POST['delete']);
$monsters = isset($_POST['battle_monsters']);
$players = isset($_POST['battle_players']);
$delete_confirm = isset($_POST['delete_confirm']);

if ( intval($_GET['list']))
{
	if ( intval($_GET['list']) == '2' )
	{
		$players = TRUE;
	}
	else
	{
		$monsters = TRUE;
	}
}

// Get the general settings
$adr_general = adr_get_general_config();

adr_enable_check();
adr_ban_check($user_id);

// See if the user has ever created a character or no
$row = adr_get_user_infos($searchid);
$current_name = $row['character_name'];

// If someone is looking at a character's user that doesn't exist , let's display an error message
if (  !( $row['character_class'] ) && ($searchid != $user_id) ) 
{
	message_die(GENERAL_MESSAGE, $lang['Adr_character_lack']);
}

// Sounds strange , but this prevents characters without class if the user leaves the page while creating a character
if ( is_numeric($row['character_race']) && !$row['character_class'] && $searchid == $user_id )  
{
	$Step3 = TRUE;
}



// The user has no character yet
if ( (!(is_numeric($row['character_race'])) &&  $searchid == $user_id )  || $Step3 ) 
{
	// Does character meet minimum post count for character creation
	if ( $adr_general['posts_enable'] && $posts < $adr_general['posts_min'] )
	{   
   		adr_previous ( Adr_posts , 'index' , '' );
	}

	if ($Step2)
	{
		$sql = "SELECT character_id FROM " . ADR_CHARACTERS_TABLE ."
			WHERE character_id = $user_id";
		if(!$result = $db->sql_query($sql)){
			message_die(GENERAL_MESSAGE, 'Error getting character info', '', __LINE__, __FILE__, $sql);}
		$character_twice = $db->sql_fetchrow($result);
		if ( $character_twice != ''){     
			adr_previous( Adr_character_twice , adr_character, '');
		}else{
		$bio 				= trim($_POST['bio']);
		$name 			= $_POST['name'];
		$race 			= intval($_POST['race']);
		$element 			= intval($_POST['element']);
		$alignment 			= intval($_POST['alignment']);

		$reuse_char 		= unexploit_user_characteristics($userdata['user_id']);
		$details 			= explode('%SPLIT%', $reuse_char);		
		$power 			= $details[0];
		$agility 			= $details[1];
		$endurance 			= $details[2];
		$intelligence 		= $details[3];
		$willpower 			= $details[4];
		$charm 			= $details[5];
		$magic_attack 		= $details[6];
		$magic_resistance 	= $details[7];
		delete_unexploited_characteristics($userdata['user_id']);
		
		##=== START character checks
		// Empty name check
		if(!$name){
			adr_previous(Fields_empty, adr_character, '');}

		// Same name character check
		$sql = "SELECT character_id FROM " . ADR_CHARACTERS_TABLE ."
			WHERE character_name = '" . str_replace("\'", "''", $name) . "'";
		if(!$result = $db->sql_query($sql)){
			message_die(CRITICAL_ERROR, 'Error checking for duplicate character name');}
		$name_check = $db->sql_fetchrow($result);
		if(is_numeric($name_check['character_id'])){
			adr_previous(Adr_character_same_name_creation, adr_character, '');}

		// Same username. It can be there own but no one elses
		$sql = "SELECT user_id FROM " . USERS_TABLE . "
			WHERE username = '" . str_replace("\'", "''", $name) . "'
			AND user_id != '$user_id'";
		if(!$result = $db->sql_query($sql)){
			message_die(CRITICAL_ERROR, 'Error checking for duplicate user names');}
		$username_check = $db->sql_fetchrow($result);
		if(is_numeric($username_check['user_id'])){
			adr_previous(Adr_user_same_name_creation, adr_character, '');}
		##=== END character checks

		$sql = "SELECT * FROM " . ADR_RACES_TABLE ." r , " . ADR_ELEMENTS_TABLE ." e , " . ADR_ALIGNMENTS_TABLE ." a
			WHERE r.race_id = $race 
			AND e.element_id = $element
			AND a.alignment_id = $alignment ";
		if (!$result = $db->sql_query($sql)) 
		{
			message_die(CRITICAL_ERROR, 'Error Getting ADR Config!');
		}
		$infos = $db->sql_fetchrow($result);

		$power = $power + ( $infos['race_might_bonus'] - $infos['race_might_malus'] );
		$agility = $agility + ( $infos['race_dexterity_bonus'] - $infos['race_dexterity_malus'] );
		$endurance = $endurance + ( $infos['race_constitution_bonus'] - $infos['race_constitution_malus'] );
		$intelligence = $intelligence + ( $infos['race_intelligence_bonus'] - $infos['race_intelligence_malus'] );
		$willpower = $willpower + ( $infos['race_wisdom_bonus'] - $infos['race_wisdom_malus'] );
		$charm = $charm + ( $infos['race_charisma_bonus'] - $infos['race_charisma_malus'] );
		$magic_attack = $magic_attack + ( $infos['race_magic_attack_bonus'] - $infos['race_magic_attack_malus'] );
		$magic_resistance = $magic_resistance + ( $infos['race_magic_resistance_bonus'] - $infos['race_magic_resistance_malus'] );
		$mining = 1 + ( $infos['race_skill_mining_bonus'] + $infos['element_skill_mining_bonus'] );
		$stone = 1 + ( $infos['race_skill_stone_bonus'] + $infos['element_skill_stone_bonus'] );
		$forge = 1 + ( $infos['race_skill_forge_bonus'] + $infos['element_skill_forge_bonus'] );
		$enchantment = 1 + ( $infos['race_skill_enchantment_bonus'] + $infos['element_skill_enchantment_bonus'] );
		$trading = 1 + ( $infos['race_skill_trading_bonus'] + $infos['element_skill_trading_bonus'] );
		$thief = 1 + ( $infos['race_skill_thief_bonus'] + $infos['element_skill_thief_bonus'] );
		$current_time = time();

		$sql = "INSERT INTO " . ADR_CHARACTERS_TABLE ."
			( character_id , character_name , character_desc , character_race , character_element , character_alignment , character_might , character_dexterity , character_constitution , character_intelligence , character_wisdom ,character_charisma, character_skill_mining , character_skill_stone , character_skill_forge , character_skill_enchantment , character_skill_trading , character_skill_thief , character_birth, character_battle_limit, character_skill_limit, character_trading_limit, character_thief_limit )
			VALUES ( $user_id , '" . str_replace("\'", "''", $name ) . "' , '" . str_replace("\'", "''", $bio) . "' , $race , $element , $alignment , $power , $agility , $endurance , $intelligence , $willpower , $charm, $mining , $stone , $forge , $enchantment , $trading , $thief , $current_time, ".$adr_general['Adr_character_battle_limit'].", ".$adr_general['Adr_character_skill_limit'].", ".$adr_general['Adr_character_trading_limit'].", ".$adr_general['Adr_character_thief_limit']." ) ";
		if (!$result = $db->sql_query($sql)) {
			message_die(GENERAL_ERROR, 'Could not insert new character into database', '', __LINE__, __FILE__, $sql);}
			adr_update_posters_infos();
		} 

		$Step3 = TRUE ;
	} 
	else if ($Step4)
	{
		$class_id = intval($_POST['class']);
		if ( !$class_id )
		{
			adr_previous( Adr_character_must_select_class , adr_character , '' );
		}

		$sql = "SELECT * FROM " . ADR_CLASSES_TABLE ."
				WHERE class_id = $class_id  ";
		if (!$result = $db->sql_query($sql)) 
		{
			message_die(CRITICAL_ERROR, 'Error Getting ADR Config!');
		}
		$class = $db->sql_fetchrow($result);

		$sql = "UPDATE " . ADR_CHARACTERS_TABLE ."
			SET character_class = $class_id ,
				character_hp = ".$class['class_base_hp'].",
				character_hp_max = ".$class['class_base_hp'].",
				character_mp = ".$class['class_base_mp'].",
				character_mp_max = ".$class['class_base_mp'].",
				character_ac = ".$class['class_base_ac']."
			WHERE character_id = $user_id ";
		if (!$result = $db->sql_query($sql)) 
		{
			message_die(CRITICAL_ERROR, 'Error Getting ADR Config!');
		}

		adr_update_posters_infos();
		adr_previous( Adr_character_success , adr_character , '' );

	}
	if ($Step3)
	{
		$template->assign_block_vars( 'nocharacterclass' , array());

		if ( $userdata['user_level'] == ADMIN )
		{
			$sql_level = '';
		}
		else if ( $userdata['user_level'] == MOD )
		{
			$sql_level = ' AND c.class_level <> 1';
		}
		else
		{
			$sql_level = 'AND c.class_level = 0';
		}

		$sql = "SELECT c.* FROM " . ADR_CLASSES_TABLE ." c , " . ADR_CHARACTERS_TABLE ." u
				WHERE c.class_might_req < u.character_might
				$sql_level
				AND c.class_dexterity_req <= u.character_dexterity
				AND c.class_constitution_req <= u.character_constitution
				AND c.class_intelligence_req <= u.character_intelligence
				AND c.class_wisdom_req <= u.character_wisdom
				AND c.class_charisma_req <= u.character_charisma
				AND c.class_selectable = 1
				AND u.character_id = $user_id ";
		if (!$result = $db->sql_query($sql)) 
		{
			message_die(CRITICAL_ERROR, 'Error Getting ADR Config!');
		}
		$class = $db->sql_fetchrowset($result);

		if ( !count($class) )
		{
			$sql = "DELETE FROM " . ADR_CHARACTERS_TABLE . " 
				WHERE character_id = $user_id"; 
			if( !$db->sql_query($sql) ) 
			{ 
				message_die(GENERAL_ERROR, 'Could not delete user from user pets table', '', __LINE__, __FILE__, $sql); 
			}
			adr_previous( Adr_character_impossible , adr_character , '' );
		}
		for ( $i = 0 ; $i < count($class) ; $i ++)
		{
			$template->assign_block_vars('nocharacterclass.classes' , array(
				"CLASS_NAME" => adr_get_lang($class[$i]['class_name']),
				"CLASS_DESC" => adr_get_lang($class[$i]['class_desc']),
				"CLASS_IMG" => $class[$i]['class_img'],
				"CLASS_ID" => $class[$i]['class_id'],
				"BASE_HP" => $class[$i]['class_base_hp'],
				"BASE_MP" => $class[$i]['class_base_mp'],
				"BASE_AC" => $class[$i]['class_base_ac'],
				"UPDATE_XP_REQ" => $class[$i]['class_update_xp_req'],
				"UPDATE_HP" => $class[$i]['class_update_hp'],
				"UPDATE_MP" => $class[$i]['class_update_mp'],
				"UPDATE_AC" => $class[$i]['class_update_ac'],
			));
		}

		$template->assign_vars(array(
			"L_BASE_HP" => $lang['Adr_classes_base_hp'],
			"L_BASE_MP" => $lang['Adr_classes_base_mp'],
			"L_BASE_AC" => $lang['Adr_classes_base_ac'],
			"L_UPDATE_HP" => $lang['Adr_classes_update_hp'],
			"L_UPDATE_MP" => $lang['Adr_classes_update_mp'],
			"L_UPDATE_AC" => $lang['Adr_classes_update_ac'],
			"L_NEW_CHARACTER_CLASS_DESC" => $lang['Adr_races_desc'],
			"L_NEW_CHARACTER_CLASS_CHOOSE" => $lang['Select'],
		));
	}
	else
	{
		$template->assign_block_vars( 'nocharacter' , array());

		if ( $adr_general['allow_reroll'] )
		{
			$template->assign_block_vars( 'nocharacter.reroll' , array());
		}

		// Prepare the level check for races , elements and alignments
		if ( $userdata['user_level'] == ADMIN )
		{
			$sql_race_level = '';
			$sql_element_level = '';
			$sql_alignment_level = '';
		}
		else if ( $userdata['user_level'] == MOD )
		{
			$sql_race_level = 'WHERE race_level <> 1';
			$sql_element_level = 'WHERE element_level  <> 1';
			$sql_alignment_level = 'WHERE alignment_level <> 1';
		}
		else
		{
			$sql_race_level = 'WHERE race_level = 0';
			$sql_element_level = 'WHERE element_level = 0';
			$sql_alignment_level = 'WHERE alignment_level = 0';
		}

		// Build the lists
		$sql = "SELECT *	FROM " . ADR_RACES_TABLE . "
			$sql_race_level ";
		$result = $db->sql_query($sql);
		if( !$result )
		{
			message_die(GENERAL_ERROR, 'Could not obtain races information', "", __LINE__, __FILE__, $sql);
		}
		$races = $db->sql_fetchrowset($result);
		$races_list = '<select name="race" tabindex="4">';
		for($i = 0; $i < count($races); $i++)
		{
			$races[$i]['race_name'] = adr_get_lang($races[$i]['race_name']);
			$previous_race = ( isset($_POST['race']) ) ? intval($_POST['race']) : 1;
			$race_selected = ( $previous_race == $races[$i]['race_id'] ) ? 'selected' : '';
			$races_list .= '<option value = "'.$races[$i]['race_id'].'" '.$race_selected.' >' . $races[$i]['race_name'] . '</option>';
		}
		$races_list .= '</select>';


		$sql = "SELECT *	FROM " . ADR_ELEMENTS_TABLE . "
			$sql_element_level ";
		$result = $db->sql_query($sql);
		if( !$result )
		{
			message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
		}
		$elements = $db->sql_fetchrowset($result);
		$elements_list = '<select name="element" tabindex="5">';
		for($i = 0; $i < count($elements); $i++)
		{
			$elements[$i]['element_name'] = adr_get_lang($elements[$i]['element_name']);
			$previous_element = ( isset($_POST['element']) ) ? intval($_POST['element']) : 1;
			$element_selected = ( $previous_element == $elements[$i]['element_id'] ) ? 'selected' : '';
			$elements_list .= '<option value = "'.$elements[$i]['element_id'].'" '.$element_selected.' >' . $elements[$i]['element_name'] . '</option>';
		}
		$elements_list .= '</select>';
	
		$sql = "SELECT *	FROM " . ADR_ALIGNMENTS_TABLE . "
			$sql_alignment_level ";
		$result = $db->sql_query($sql);
		if( !$result )
		{
			message_die(GENERAL_ERROR, 'Could not obtain alignments information', "", __LINE__, __FILE__, $sql);
		}
		$alignments = $db->sql_fetchrowset($result);
		$alignments_list = '<select name="alignment" tabindex="6">';
		for($i = 0; $i < count($alignments); $i++)
		{
			$alignments[$i]['alignment_name'] = adr_get_lang($alignments[$i]['alignment_name']);
			$previous_alignment = ( isset($_POST['alignment']) ) ? intval($_POST['alignment']) : 1;
			$alignment_selected = ( $previous_alignment == $alignments[$i]['alignment_id'] ) ? 'selected' : '';
			$alignments_list .= '<option value = "'.$alignments[$i]['alignment_id'].'" '.$alignment_selected.' >' . $alignments[$i]['alignment_name'] . '</option>';
		}
		$alignments_list .= '</select>';
	
		if ( $_POST['power'] && !$adr_general['allow_reroll'] )
		{		
			$reuse_char 		= unexploit_user_characteristics($userdata['user_id']);
			$details 			= explode('%SPLIT%', $reuse_char);		
			$power 			= $details[0];
			$agility 			= $details[1];
			$endurance 			= $details[2];
			$intelligence 		= $details[3];
			$willpower 			= $details[4];
			$charm 			= $details[5];
			$magic_attack 		= $details[6];
			$magic_resistance 	= $details[7];
		}
		else
		{
			if ($adr_general['allow_reroll'])
			{
				$allow = 1;
			}
			else
			{
				$allow = '';
			}

			set_unexploited_characteristics($userdata['user_id'], $adr_general['min_characteristic'], $adr_general['max_characteristic'], $allow);
		
			$reuse_char 		= unexploit_user_characteristics($userdata['user_id']);
			$details 			= explode('%SPLIT%', $reuse_char);		
			$power 			= $details[0];
			$agility 			= $details[1];
			$endurance 			= $details[2];
			$intelligence 		= $details[3];
			$willpower 			= $details[4];
			$charm 			= $details[5];
			$magic_attack 		= $details[6];
			$magic_resistance 	= $details[7];				
		}

		$s_hidden_fields .= '<input type="hidden" name="race" value="' . $race . '" />';
		$s_hidden_fields .= '<input type="hidden" name="element" value="' . $element . '" />';
		$s_hidden_fields .= '<input type="hidden" name="alignment" value="' . $alignment . '" />';
		$s_hidden_fields .= '<input type="hidden" name="name" value="' . $name . '" />';
		$s_hidden_fields .= '<input type="hidden" name="bio" value="' . $bio . '" />';

		$template->assign_vars(array(
			'L_NEW_CHARACTER' => $lang['Adr_character_new'],
			'L_NEW_CHARACTER_NAME' => $lang['Adr_character_new_name'],
			'L_CHARACTERISTICS' => $lang['Adr_character_characteristics'],
			'L_POWER' => $lang['Adr_character_power'],
			'L_AGILITY' => $lang['Adr_character_agility'],
			'L_ENDURANCE' => $lang['Adr_character_endurance'],
			'L_INTELLIGENCE' => $lang['Adr_character_intelligence'],
			'L_WILLPOWER' => $lang['Adr_character_willpower'],
			'L_CHARM' => $lang['Adr_character_charm'],
			'L_MA' => $lang['Adr_character_ma'],
			'L_MD' => $lang['Adr_character_md'],
			'L_REROLL' => $lang['Adr_character_reroll'],
			'L_RACES_SELECT' => $lang['Adr_character_races_select'],
			'L_ELEMENTS_SELECT' => $lang['Adr_character_elements_select'],
			'L_ALIGNMENTS_SELECT' => $lang['Adr_character_alignments_select'],
			'L_RACES_MINI_FAQ' => $lang['Adr_character_races_mini_faq'],
			'L_ELEMENTS_MINI_FAQ' => $lang['Adr_character_elements_mini_faq'],
			'L_ALIGNMENTS_MINI_FAQ' => $lang['Adr_character_alignments_mini_faq'],
			'L_NEW_CHARACTER_BIOGRAPHY' => $lang['Adr_character_new_bio'],
			'L_NEW_CHARACTER_BIOGRAPHY_EXPLAIN' => $lang['Adr_character_new_bio_explain'],
			'BIO' => ( !empty($_POST['bio']) ) ? htmlspecialchars(stripslashes(trim(str_replace('<br />', "\n", $_POST['bio'] ) ))) : '',
			'NAME' => ( !empty($_POST['name']) ) ? htmlspecialchars(stripslashes($_POST['name'])) : '',
			'RACES_LIST' => $races_list,
			'ELEMENTS_LIST' => $elements_list,
			'ALIGNMENTS_LIST' => $alignments_list,
			
			'POWER' 		=> $power,
			'AGILITY' 		=> $agility,
			'ENDURANCE' 	=> $endurance,
			'INTELLIGENCE' 	=> $intelligence,
			'WILLPOWER' 	=> $willpower,
			'CHARM' 		=> $charm,
			'MA' 			=> $magic_attack,
			'MD' 			=> $magic_resistance,
						
			'MAX' => $adr_general['max_characteristic'],
			'S_HIDDEN_FIELDS' => $s_hidden_fields,
		));
	}

}

// He even has a character
else
{
	if ( $players )
	{
		adr_template_file('adr_character_battle_body.tpl');

		$start = ( isset($_GET['start']) ) ? intval($_GET['start']) : 0;

		if ( isset($_GET['mode2']) || isset($_POST['mode2']) )
		{
			$mode2 = ( isset($_POST['mode2']) ) ? htmlspecialchars($_POST['mode2']) : htmlspecialchars($_GET['mode2']);
		}
		else
		{
			$mode2 = 'default';
		}

		if(isset($_POST['order']))
		{
			$sort_order = ($_POST['order'] == 'ASC') ? 'ASC' : 'DESC';
		}
		else if(isset($_GET['order']))
		{
			$sort_order = ($_GET['order'] == 'ASC') ? 'ASC' : 'DESC';
		}
		else
		{
			$sort_order = 'ASC';
		}

		$mode_types_text = array( $lang['Adr_pvp_result'] , $lang['Adr_pvp_player_name'] , $lang['Adr_pvp_player_level'] );
		$mode_types = array( 'result' , 'name', 'level' );
		
		$select_sort_mode = '<select name="mode2">';
		for($i = 0; $i < count($mode_types_text); $i++)
		{
			$selected = ( $mode2 == $mode_types[$i] ) ? ' selected="selected"' : '';
			$select_sort_mode .= '<option value="' . $mode_types[$i] . '"' . $selected . '>' . $mode_types_text[$i] . '</option>';
		}
		$select_sort_mode .= '</select>';

		$select_sort_order = '<select name="order">';
		if($sort_order == 'ASC')
		{
			$select_sort_order .= '<option value="ASC" selected="selected">' . $lang['Sort_Ascending'] . '</option><option value="DESC">' . $lang['Sort_Descending'] . '</option>';
		}
		else
		{
			$select_sort_order .= '<option value="ASC">' . $lang['Sort_Ascending'] . '</option><option value="DESC" selected="selected">' . $lang['Sort_Descending'] . '</option>';
		}
		$select_sort_order .= '</select>';

		switch( $mode2 )
		{
			case 'result':
				$order_by = "b.battle_result $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
			case 'name':
				$order_by = "c.character_name $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
			case 'level':
				$order_by = "c.character_level $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
			default:
				$order_by = "b.battle_id $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
		}

		// Strange request isn't it ?
		$sql = "SELECT b.* , c.character_name , c.character_level FROM  " . ADR_BATTLE_PVP_TABLE . " b
			LEFT JOIN " . ADR_CHARACTERS_TABLE . " c ON ( ( b.battle_challenger_id = c.character_id AND b.battle_challenger_id <> $searchid ) OR ( b.battle_opponent_id = c.character_id AND b.battle_opponent_id <> $searchid ) )
			WHERE b.battle_result <> 0
			AND   b.battle_result <> 3
			AND ( b.battle_opponent_id = $searchid OR b.battle_challenger_id = $searchid )
			ORDER BY $order_by ";
		if ( !($result = $db->sql_query($sql)) ) 
		{ 
			message_die(CRITICAL_ERROR, 'Error Getting Adr Users!'); 
		}	

		if ( $row = $db->sql_fetchrow($result) )
		{
			$i = 0;
			do
			{
				$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];
				
				if ( ( ($row['battle_result'] == 1) && ($row['battle_challenger_id'] == $searchid) ) || ( ($row['battle_result'] == 2) && ($row['battle_opponent_id'] == $searchid) ) )
				{
					$battle_result = sprintf( $lang['Adr_pvp_victory_current'] , $current_name);
				}
				else if ( ( ($row['battle_result'] == 1) && ($row['battle_opponent_id'] == $searchid) ) || ( ($row['battle_result'] == 2) && ($row['battle_challenger_id'] == $searchid) ) )
				{
					$battle_result = sprintf( $lang['Adr_pvp_victory_current'] , $row['character_name']);
				}
				else if ( ( ($row['battle_result'] == 5) && ($row['battle_challenger_id'] == $searchid) ) || ( ($row['battle_result'] == 6) && ($row['battle_opponent_id'] == $searchid) ) )
				{
					$battle_result = sprintf( $lang['Adr_pvp_stopped_current'] , $row['character_name']);
				}
				else if ( ( ($row['battle_result'] == 5) && ($row['battle_opponent_id'] == $searchid) ) || ( ($row['battle_result'] == 6) && ($row['battle_challenger_id'] == $searchid) ) )
				{
					$battle_result = sprintf( $lang['Adr_pvp_stopped_current'] , $current_name);
				}
				else if ( ( ($row['battle_result'] == 8) && ($row['battle_challenger_id'] == $searchid) ) || ( ($row['battle_result'] == 9) && ($row['battle_opponent_id'] == $searchid) ) )
				{
					$battle_result = sprintf( $lang['Adr_pvp_flee_current'] , $current_name);
				}
				else if ( ( ($row['battle_result'] == 8) && ($row['battle_opponent_id'] == $searchid) ) || ( ($row['battle_result'] == 9) && ($row['battle_challenger_id'] == $searchid) ) )
				{
					$battle_result = sprintf( $lang['Adr_pvp_flee_current'] , $row['character_name']);
				}

				$template->assign_block_vars('battle', array(
					"ROW_CLASS" => $row_class,
					"RESULT" => $battle_result ,
					"MONSTER_NAME" => adr_get_lang($row['character_name']),
					"MONSTER_LEVEL" => $row['character_level'],
				));

				$i++;
			}
			while ( $row = $db->sql_fetchrow($result) );
		}

		$sql = "SELECT count(*) AS total FROM  " . ADR_BATTLE_PVP_TABLE . " 
			WHERE battle_result <> 0
			AND   battle_result <> 3
			AND ( battle_opponent_id = $searchid OR battle_challenger_id = $searchid )";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Error getting total users', '', __LINE__, __FILE__, $sql);
		}
		if ( $total = $db->sql_fetchrow($result) )
		{
			$total_battle = $total['total'];
			$pagination = generate_pagination("adr_character.$phpEx?".POST_USERS_URL."=$searchid&amp;mode2=$mode2&amp;order=$sort_order&amp;list=2", $total_battle , $board_config['topics_per_page'], $start). '&nbsp;';	
		}

		$template->assign_vars(array(
			'L_MONSTER_NAME' => $lang['Adr_pvp_player_name'],
			'L_MONSTER_LEVEL' => $lang['Adr_pvp_player_level'],
			'L_RESULT' => $lang['Adr_battle_result'],
			'L_SELECT_SORT_METHOD' => $lang['Select_sort_method'],
			'L_ORDER' => $lang['Order'],
			'L_SORT' => $lang['Sort'],
			'L_SUBMIT' => $lang['Sort'],
			'S_MODE_SELECT' => $select_sort_mode,
			'S_ORDER_SELECT' => $select_sort_order,
			'PAGINATION' => $pagination,
			'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $total_battle  / $board_config['topics_per_page'] )), 
			'L_GOTO_PAGE' => $lang['Goto_page'],
			"S_BATTLE_ACTION" => append_sid("adr_character.$phpEx?".POST_USERS_URL."=$searchid&amp;mode2=$mode2&amp;order=$sort_order&amp;list=2"),
		));
	}

	if ( $monsters )
	{
		adr_template_file('adr_character_battle_body.tpl');

		$start = ( isset($_GET['start']) ) ? intval($_GET['start']) : 0;

		if ( isset($_GET['mode2']) || isset($_POST['mode2']) )
		{
			$mode2 = ( isset($_POST['mode2']) ) ? htmlspecialchars($_POST['mode2']) : htmlspecialchars($_GET['mode2']);
		}
		else
		{
			$mode2 = 'default';
		}

		if(isset($_POST['order']))
		{
			$sort_order = ($_POST['order'] == 'ASC') ? 'ASC' : 'DESC';
		}
		else if(isset($_GET['order']))
		{
			$sort_order = ($_GET['order'] == 'ASC') ? 'ASC' : 'DESC';
		}
		else
		{
			$sort_order = 'ASC';
		}

		$mode_types_text = array( $lang['Adr_battle_result'] , $lang['Adr_battle_monster_name'] , $lang['Adr_battle_monster_level'] );
		$mode_types = array( 'result' , 'name', 'level' );
		
		$select_sort_mode = '<select name="mode2">';
		for($i = 0; $i < count($mode_types_text); $i++)
		{
			$selected = ( $mode2 == $mode_types[$i] ) ? ' selected="selected"' : '';
			$select_sort_mode .= '<option value="' . $mode_types[$i] . '"' . $selected . '>' . $mode_types_text[$i] . '</option>';
		}
		$select_sort_mode .= '</select>';

		$select_sort_order = '<select name="order">';
		if($sort_order == 'ASC')
		{
			$select_sort_order .= '<option value="ASC" selected="selected">' . $lang['Sort_Ascending'] . '</option><option value="DESC">' . $lang['Sort_Descending'] . '</option>';
		}
		else
		{
			$select_sort_order .= '<option value="ASC">' . $lang['Sort_Ascending'] . '</option><option value="DESC" selected="selected">' . $lang['Sort_Descending'] . '</option>';
		}
		$select_sort_order .= '</select>';

		switch( $mode2 )
		{
			case 'result':
				$order_by = "b.battle_result $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
			case 'name':
				$order_by = "m.monster_name $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
			case 'level':
				$order_by = "m.monster_level $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
			default:
				$order_by = "b.battle_id $sort_order LIMIT $start, " . $board_config['topics_per_page'];
				break;
		}

		$sql = "SELECT b.battle_result , m.monster_name , m.monster_level	FROM  " . ADR_BATTLE_LIST_TABLE . " b
			LEFT JOIN " . ADR_BATTLE_MONSTERS_TABLE . " m ON ( b.battle_opponent_id = m.monster_id )
			WHERE b.battle_type = 1 
			AND b.battle_challenger_id = $searchid 
			ORDER BY $order_by ";
		if ( !($result = $db->sql_query($sql)) ) 
		{ 
			message_die(CRITICAL_ERROR, 'Error Getting Adr Users!'); 
		}	

		if ( $row = $db->sql_fetchrow($result) )
		{
			$i = 0;
			do
			{
				$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];
				
				if ( $row['battle_result'] == 1 )
				{
					$battle_result = $lang['Adr_battle_result_victory'];
				}
				else if ( $row['battle_result'] == 2 )
				{
					$battle_result = $lang['Adr_battle_result_defeat'];
				}
            		elseif  ( $row['battle_result'] == 3 )
            		{
               			$battle_result = $lang['Adr_battle_result_flee'];
            		}
            		else
            		{
               			$battle_result = $lang['Adr_battle_result_double_ko'];
            		} 

				$template->assign_block_vars('battle', array(
					"ROW_CLASS" => $row_class,
					"RESULT" => $battle_result ,
					"MONSTER_NAME" => adr_get_lang($row['monster_name']),
					"MONSTER_LEVEL" => $row['monster_level'],
				));

				$i++;
			}
			while ( $row = $db->sql_fetchrow($result) );
		}


		$sql = "SELECT count(*) AS total FROM  " . ADR_BATTLE_LIST_TABLE . " 
			WHERE battle_challenger_id = $searchid 
			AND battle_type = 1 ";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Error getting total users', '', __LINE__, __FILE__, $sql);
		}
		if ( $total = $db->sql_fetchrow($result) )
		{
			$total_battle = $total['total'];
			$pagination = generate_pagination("adr_character.$phpEx?".POST_USERS_URL."=$searchid&amp;mode2=$mode2&amp;order=$sort_order&amp;list=1", $total_battle , $board_config['topics_per_page'], $start). '&nbsp;';	
		}

		$template->assign_vars(array(
			'L_MONSTER_NAME' => $lang['Adr_battle_monster_name'],
			'L_MONSTER_LEVEL' => $lang['Adr_battle_monster_level'],
			'L_RESULT' => $lang['Adr_battle_result'],
			'L_SELECT_SORT_METHOD' => $lang['Select_sort_method'],
			'L_ORDER' => $lang['Order'],
			'L_SORT' => $lang['Sort'],
			'L_SUBMIT' => $lang['Sort'],
			'S_MODE_SELECT' => $select_sort_mode,
			'S_ORDER_SELECT' => $select_sort_order,
			'PAGINATION' => $pagination,
			'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $total_battle  / $board_config['topics_per_page'] )), 
			'L_GOTO_PAGE' => $lang['Goto_page'],
			"S_BATTLE_ACTION" => append_sid("adr_character.$phpEx?".POST_USERS_URL."=$searchid&amp;mode2=$mode2&amp;order=$sort_order&amp;list=1"),
		));
	}

	$template->assign_block_vars( 'character' , array());

	if ( $user_id == $searchid )
	{
		$template->assign_block_vars( 'character.owner' , array());

		// Check if the user can gain a level
		if ( adr_seek_levelup($user_id) )
		{
			$template->assign_block_vars( 'character_level_up' , array());

			if ( $Level_up )
			{
				$carac[1]='character_might';
				$carac[2]='character_dexterity';
				$carac[3]='character_constitution';
				$carac[4]='character_intelligence';
				$carac[5]='character_wisdom';
				$carac[6]='character_charisma';

				$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
					SET $carac[$carac_up] = $carac[$carac_up] + 1 
				WHERE character_id = $user_id ";
				if (!($result = $db->sql_query($sql) ))
				{
					message_die(GENERAL_ERROR, 'Could not update user experience',"", __LINE__, __FILE__, $sql);
				}
				adr_level_up($user_id , character_page );
			}
		}

		// Check if the user can delete his character
		if ( $adr_general['allow_character_delete'] )
		{
			$template->assign_block_vars( 'character.owner.delete' , array());
		}

		if ( $delete )
		{
			adr_template_file('adr_confirm_body.tpl');
			$template->assign_block_vars('delete_character' , array());

			$template->assign_vars(array(
				'MESSAGE_TITLE' => $lang['Adr_items_sell_confirm'],
				'MESSAGE_TEXT' => $lang['Adr_character_delete_confirm'],
				'L_YES' => $lang['Yes'],
				'L_NO' => $lang['No'],
			));

		}

		else if ( $delete_confirm )
		{
			// Active loan check
			$sql = "SELECT loan_time FROM " . ADR_VAULT_USERS_TABLE . "
				WHERE owner_id = $user_id ";
			if ( !($result = $db->sql_query($sql)) ) 
			{ 
				message_die(CRITICAL_ERROR, 'Error Getting Vault Users!'); 
			}
			$loan_check = $db->sql_fetchrow($result);

			if ( $loan_check['loan_time'] <= 0 )			
			{
				$sql = " DELETE FROM " . ADR_CHARACTERS_TABLE . "
					WHERE character_id = $user_id ";
				if (!$db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
				}

				$sql = " DELETE FROM " . ADR_BATTLE_LIST_TABLE . "
					WHERE battle_challenger_id = $user_id 
					AND battle_type = 1 ";
				if (!$db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
				}

            		$sql = "DELETE FROM " . ADR_SHOPS_TABLE ."
               			WHERE shop_owner_id = $user_id ";
            		if( !$db->sql_query($sql) )
            		{
               			message_die(GENERAL_ERROR, 'Could not delete shop', "", __LINE__, __FILE__, $sql);
            		} 

				adr_update_posters_infos();
				adr_previous( Adr_character_successful_deleted , adr_character , '' );
			}

			else
			{
				adr_previous( Adr_character_active_loan , adr_character , '' );				
			}
		}

		else if ( $bio_edit )
		{
			adr_template_file('adr_character_edit_body.tpl');

			$message = $row['character_desc'];
			$message = str_replace('<', '&lt;', $message);
			$message = str_replace('>', '&gt;', $message);
			$message = str_replace('<br />', "\n", $message);

			$template->assign_vars(array(
				'L_SUBMIT' => $lang['Submit'],
				'L_NEW_CHARACTER_BIOGRAPHY' => $lang['Adr_character_new_bio'],
				'L_NEW_CHARACTER_BIOGRAPHY_EXPLAIN' => $lang['Adr_character_new_bio_explain'],
				'NEW_BIO' => $message,
			));
		}
		else if ( $upgrade_bio )
		{
			$bio = $_POST['new_bio'];

			$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
				SET character_desc = '" . str_replace("\'", "''", $bio) . "'
				WHERE character_id = $user_id ";
			if ( !($result = $db->sql_query($sql)) ) 
			{ 
				message_die(CRITICAL_ERROR, 'Error updating bio informations !'); 
			}

			adr_previous( Adr_character_bio_updated , adr_character , '' );
		}

		// Check if quota limits are enabled
		if ( $adr_general['Adr_character_limit_enable'] == 1 )
		{
			$template->assign_block_vars( 'character.limit' , array());
		}
	}

	$avatar_img = '';
	if ( $view_userdata['user_avatar_type'] && $view_userdata['user_allowavatar'] )
	{
		switch( $view_userdata['user_avatar_type'] )
		{
			case USER_AVATAR_UPLOAD:
				$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $view_userdata['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $view_userdata['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $view_userdata['user_avatar'] . '" alt="" border="0" />' : '';
				break;
		}
	}

	$sql = "SELECT c.* , r.race_name , r.race_weight , r.race_weight_per_level , r.race_img , e.element_name , e.element_img , a.alignment_name , a.alignment_img , cl.class_name , cl.class_img , cl.class_update_xp_req
		FROM  " . ADR_CHARACTERS_TABLE . " c , " . ADR_RACES_TABLE . " r , " . ADR_ELEMENTS_TABLE . " e , " . ADR_ALIGNMENTS_TABLE . " a , " . ADR_CLASSES_TABLE . " cl
		WHERE c.character_id= $searchid
		AND cl.class_id = c.character_class
		AND r.race_id = c.character_race
		AND e.element_id = c.character_element
		AND a.alignment_id = c.character_alignment ";
	if ( !($result = $db->sql_query($sql)) ) 
	{ 
		message_die(CRITICAL_ERROR, 'Error Getting Adr Users!'); 
	}	
	$row = $db->sql_fetchrow($result);

	if ( $row['character_desc'] )
	{
		$template->assign_block_vars( 'character.bio' , array());
	}

	$class = adr_get_lang($row['class_name']);
	$race = adr_get_lang($row['race_name']);
	$element = adr_get_lang($row['element_name']);
	$alignment = adr_get_lang($row['alignment_name']);

	// Work out weight stats
	$max_weight = adr_weight_stats($row['character_level'], $row['race_weight'], $row['race_weight_per_level'], $row['character_might']);

	// Count up characters current weight
	$sql = "SELECT SUM(item_weight) AS total FROM  " . ADR_SHOPS_ITEMS_TABLE . "
		WHERE item_owner_id = $searchid 
		AND item_in_warehouse = 0 
		AND item_duration > 0
		AND item_in_shop = 0";
	if ( !($result = $db->sql_query($sql)) ) 
	{ 
		message_die(CRITICAL_ERROR, 'Error Getting Adr Users!'); 
	}	
	$weight = $db->sql_fetchrow($result);
	if ( $weight[total] != '' )
	{
		$current_weight = $weight[total];
	}
	else
	{
		$current_weight = 0;
	}

	//changed from max_hp to max_xp
   	$max_xp = $row['class_update_xp_req'];
   	for ( $p = 1 ; $p < $row['character_level'] ; $p ++ )
  	{
      	$max_xp = floor($max_xp * (( $adr_general['next_level_penalty'] + 100 ) / 100 ));
   	}

	##=== Create bar widths ===##
		list($hp_percent_width, $hp_percent_empty) = adr_make_bars($row['character_hp'], $row['character_hp_max'], '318');
		list($mp_percent_width, $mp_percent_empty) = adr_make_bars($row['character_mp'], $row['character_mp_max'], '318');
		list($exp_percent_width, $exp_percent_empty) = adr_make_bars($row['character_xp'], $max_xp, '318');
		list($weight_percent_width, $weight_percent_empty) = adr_make_bars($current_weight, $max_weight, '318');
	##=== Create bar widths ===##

	$template->assign_vars(array(
		'LEVEL' => $row['character_level'],
		'POWER' => $row['character_might'],
		'AGILITY' => $row['character_dexterity'],
		'CONSTIT' => $row['character_constitution'],
		'INT' => $row['character_intelligence'],
		'WIS' => $row['character_wisdom'],
		'CHA' => $row['character_charisma'],
		'POINTS' => number_format($view_userdata['user_points']),
		'HP' => $row['character_hp'],
		'MP' => $row['character_mp'],
		'EXP' => $row['character_xp'],
		'HP_MAX' => $row['character_hp_max'],
		'MP_MAX' => $row['character_mp_max'],
		'SP' => number_format($row['character_sp']),
		'EXP_MAX' => $max_xp,
		'WEIGHT' => $current_weight,
		'WEIGHT_MAX' => $max_weight,
		'WEIGHT_PERCENT_WIDTH' => $weight_percent_width,
		'BATTLE_VICTORIES' => number_format($row['character_victories']),
		'BATTLE_DEFEATS' => number_format($row['character_defeats']),
		'BATTLE_FLEES' => number_format($row['character_flees']),
		'BATTLE_VICTORIES_PVP' => number_format($row['character_victories_pvp']),
		'BATTLE_DEFEATS_PVP' => number_format($row['character_defeats_pvp']),
		'BATTLE_FLEES_PVP' => number_format($row['character_flees_pvp']),
		'BATTLE_LIMIT' => $row['character_battle_limit'].'/'.$adr_general['Adr_character_battle_limit'],
		'SKILL_LIMIT' => $row['character_skill_limit'].'/'.$adr_general['Adr_character_skill_limit'],
		'TRADING_LIMIT' => $row['character_trading_limit'].'/'.$adr_general['Adr_character_trading_limit'],
		'THIEF_LIMIT' => $row['character_thief_limit'].'/'.$adr_general['Adr_character_thief_limit'],
		'QUOTA_TIMER'   => adr_character_replenish_timer($user_id),
		'FP' => number_format($row['character_fp']),
		'AC' => $row['character_ac'],
		'NAME' => $row['character_name'],
		'BIO' => str_replace("\n", "\n<br />\n", $row['character_desc']),
		'AVATAR_IMG' => $avatar_img, 
		'CLASS' => $class,
		'RACE' => $race,
		'ELEMENT' => $element,
		'ALIGNMENT' => $alignment,
		'CLASS_IMG' => $row['class_img'],
		'RACE_IMG' => $row['race_img'],
		'ELEMENT_IMG' => $row['element_img'],
		'ALIGNMENT_IMG' => $row['alignment_img'],
		'HP_PERCENT_WIDTH' => $hp_percent_width,
		'MP_PERCENT_WIDTH' => $mp_percent_width,
		'EXP_PERCENT_WIDTH' => $exp_percent_width,
		'ADR_YEAR' => $adr_years,
		'ADR_MONTH' => $adr_months,
		'ADR_WEEK' => $adr_weeks,
		'ADR_DAY' => $adr_days,
		'ADR_HOUR' => $adr_hours,
		'CHAR_YEAR' => adr_character_age($user_id, '0'),
		'HP_PERCENT_EMPTY' => $hp_percent_empty,
		'MP_PERCENT_EMPTY' => $mp_percent_empty,
		'EXP_PERCENT_EMPTY' => $exp_percent_empty,
		'WEIGHT_PERCENT_EMPTY' => $weight_percent_empty,
		'L_YEAR' => $lang['year'],
		'L_MONTH' => $lang['month'],
		'L_WEEK' => $lang['week'],
		'L_DAY' => $lang['day'],
		'L_HOUR' => $lang['hour'],
		'L_AGE' => $lang['Adr_character_age'],
		'L_CHARACTER_AGE' => $lang_age,
		'L_MA' => $lang['Adr_character_ma'],
		'L_MD' => $lang['Adr_character_md'],
		'L_BIO' => $lang['Adr_character_new_bio'],
		'L_CLASS' => $lang['Adr_character_class'],
		'L_RACE' => $lang['Adr_character_race'],
		'L_ELEMENT' => $lang['Adr_character_element'],
		'L_ALIGNMENT' => $lang['Adr_character_alignment'],
		'L_HEALTH'=> $lang['Adr_character_health'],
		'L_MAGIC' => $lang['Adr_character_magic'],
		'L_EXPERIENCE' => $lang['Adr_character_experience'],	
		'L_SP' => $lang['Adr_character_sp'],	
		'L_WEIGHT' => $lang['Adr_character_weight'],	
		'L_AC' => $lang['Adr_character_ac'],
		'L_POWER' => $lang['Adr_character_power'],
		'L_AGILITY' => $lang['Adr_character_agility'],
		'L_CONSTIT' => $lang['Adr_character_endurance'],
		'L_INT' => $lang['Adr_character_intelligence'],
		'L_WIS' => $lang['Adr_character_willpower'],
		'L_CHA' => $lang['Adr_character_charm'],
		'L_HP' => $lang['Adr_character_health'],
		'L_MP' => $lang['Adr_character_magic'],
		'L_POINTS' => get_reward_name(),
		'L_BATTLE_STATISTICS' => $lang['Adr_character_battle_statistics'],
		'L_BATTLE_VICTORIES' => $lang['Adr_character_victories'],
		'L_BATTLE_DEFEATS' => $lang['Adr_character_defeats'],
		'L_BATTLE_SKILLS' => $lang['Adr_character_battle_skills'],
		'L_BATTLE_LIMIT' => $lang['Adr_character_battle_limit'],
		'L_SKILL_LIMIT' => $lang['Adr_character_skill_limit'],
		'L_TRADING_LIMIT' => $lang['Adr_character_trading_limit'],
		'L_THIEF_LIMIT' => $lang['Adr_character_thief_limit'],
		'L_BATTLE_FLEES' => $lang['Adr_character_flees'],
		'L_QUOTA_TIMER' => $lang['Adr_character_quota_timer'],
		'L_FP' => $lang['Adr_character_fp'],
		'L_STATS_MONSTER' => $lang['Adr_character_stats_monster'],
		'L_STATS_PVP' => $lang['Adr_character_stats_pvp'],
		'L_BATTLE_SEE_MONSTERS' => $lang['Adr_character_battle_history_monsters'],
		'L_BATTLE_SEE_PLAYERS' => $lang['Adr_character_battle_history_players'],
		'L_CHARACTER_LEVEL_UP' => $lang['Adr_level_up'],
		'L_CHARACTER_LEVEL_UP_SELECT' => $lang['Adr_level_up_select'],
		'L_LEVEL_UP' => $lang['Adr_level_up_perform'],
		'L_DELETE_CHARACTER' => $lang['Adr_character_delete'],
		'L_EDIT_CHARACTER' => $lang['Adr_character_edit'],
	));

	include($phpbb_root_path . 'adr/includes/adr_header.'.$phpEx);
}

$template->assign_vars(array(
	'L_NAME' => $lang['Adr_races_name'],
	'L_DESC' => $lang['Adr_races_desc'],
	'L_IMG' => $lang['Adr_races_image'],
	'L_LEVEL' => $lang['Adr_character_level'],
	'L_PROGRESS' => $lang['Adr_character_progress'],
	'L_SKILLS' => $lang['Adr_character_skills'],
	'L_CHARACTER_OF' => sprintf ( $lang['Adr_character_of'], $view_userdata['username'] ),
	'L_STEP2' => $lang['Adr_character_new_step2'],
	'L_STEP4' => $lang['Adr_character_new_step4'],
	'L_NEW_CHARACTER_CLASS' => $lang['Adr_character_new_class'],
	'S_CHARACTER_ACTION'     => append_sid("adr_character.$phpEx?".POST_USERS_URL."=".$searchid),
));

$template->pparse('body');
#==== Start Copyright ======================== |
?>
	<SCRIPT language="JavaScript">
	function copyright()
		{
		var popurl 	= "adr/includes/adr_copy.php" 
		var winpops = window.open(popurl, "", "width=400, height=350,")
		}
	</SCRIPT>
	
	<?PHP
echo "<table width='100%' border='0'>
		<tr>
			<td align='center' valign='top' colspan='1'>
				<span class='genmed'>
					<a style='TEXT-DECORATION:NONE;' href='javascript:copyright();'><span class='gensmall'>&copy; ADR</a></span>
				</span>
			</td>
		</tr>
	  </table>";
#==== End Copyright ========================== |
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
 
?> 
