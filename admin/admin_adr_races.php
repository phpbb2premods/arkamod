<?php
/***************************************************************************
*                               admin_adr_races.php
*                              -------------------
*     begin                : 29/01/2004
*     copyright            : Dr DLP / Malicious Rabbit
*
*
****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

define('IN_PHPBB', 1);
define('IN_ADR_ADMIN', 1);
define('IN_ADR_CHARACTER', 1);

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Adr']['Adr_races'] = $filename;

	return;
}

$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
include($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx);

if( isset($_POST['mode']) || isset($_GET['mode']) )
{
	$mode = ( isset($_POST['mode']) ) ? $_POST['mode'] : $_GET['mode'];
	$mode = htmlspecialchars($mode);
}
else
{
	$mode = "";
}

if( isset($_POST['add']) || isset($_GET['add']) )
{
	adr_template_file('admin/config_adr_races_edit_body.tpl');

	$s_hidden_fields = '<input type="hidden" name="mode" value="savenew" />';

	$template->assign_block_vars( 'races_add', array());

	$level[0] = $lang['Adr_races_level_all'];
	$level[1] = $lang['Adr_races_level_admin'];
	$level[2] = $lang['Adr_races_level_mod'];

	$level_list = '<select name="level">';
	for( $i = 0; $i < 3; $i++ )
	{
		$level_list .= '<option value = "'.$i.'" >' . $level[$i] . '</option>';
	}
	$level_list .= '</select>';

	$template->assign_vars(array(
		"LEVEL_LIST" => $level_list,
		"L_RACES_TITLE" => $lang['Adr_races_add_edit'],
		"L_RACES_EXPLAIN" => $lang['Adr_races_add_edit_explain'],
		"L_NAME" => $lang['Adr_races_name'],
		"L_NAME_EXPLAIN" => $lang['Adr_races_name_explain'],
		"L_DESC" => $lang['Adr_races_desc'],
		"L_IMG" => $lang['Adr_races_image'],
		"L_IMG_EXPLAIN" => $lang['Adr_races_image_explain'],
		"L_LEVEL" => $lang['Adr_races_level'],
		"L_LEVEL_EXPLAIN" => $lang['Adr_races_level_explain'],
		"L_MIGHT_BONUS" => $lang['Adr_races_bonus_might'],
		"L_DEXT_BONUS" => $lang['Adr_races_bonus_dext'],
		"L_CONST_BONUS" => $lang['Adr_races_bonus_const'],
		"L_INT_BONUS" => $lang['Adr_races_bonus_int'],
		"L_WIS_BONUS" => $lang['Adr_races_bonus_wis'],
		"L_CHA_BONUS" => $lang['Adr_races_bonus_cha'],
		"L_MA_BONUS" => $lang['Adr_races_bonus_ma'],
		"L_MD_BONUS" => $lang['Adr_races_bonus_md'],
		"L_MA_MALUS" => $lang['Adr_races_malus_ma'],
		"L_MD_MALUS" => $lang['Adr_races_malus_md'],
		"L_MIGHT_MALUS" => $lang['Adr_races_malus_might'],
		"L_DEXT_MALUS" => $lang['Adr_races_malus_dext'],
		"L_CONST_MALUS" => $lang['Adr_races_malus_const'],
		"L_INT_MALUS" => $lang['Adr_races_malus_int'],
		"L_WIS_MALUS" => $lang['Adr_races_malus_wis'],
		"L_CHA_MALUS" => $lang['Adr_races_malus_cha'],
		"L_MINING_BONUS" => $lang['Adr_races_bonus_mining'],
		"L_STONE_BONUS" => $lang['Adr_races_bonus_stone'],
		"L_FORGE_BONUS" => $lang['Adr_races_bonus_forge'],
		"L_ENCHANT_BONUS" => $lang['Adr_races_bonus_enchant'],
		"L_TRADING_BONUS" => $lang['Adr_races_bonus_trading'],
		"L_THIEF_BONUS" => $lang['Adr_races_bonus_thief'],
		"L_RACES_TITLE" => $lang['Adr_races_add_edit'],
		"L_RACES_EXPLAIN" => $lang['Adr_races_add_edit_explain'],
		"L_RACES_WEIGHT" => $lang['Adr_races_weight'],	
		"L_RACES_WEIGHT_PER_LEVEL" => $lang['Adr_races_weight_per_level'],	
		"L_SUBMIT" => $lang['Submit'],
		"S_HIDDEN_FIELDS" => $s_hidden_fields) 
	);

	$template->pparse("body");
}
else if ( $mode != "" )
{
	switch( $mode )
	{
		case 'delete':

			$race_id = ( !empty($_POST['id']) ) ? intval($_POST['id']) : intval($_GET['id']);

			if ( $race_id == '1' )
			{
				adr_previous( Adr_race_default , admin_adr_races , '' );
			}

			$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
				SET character_race = 1
				WHERE character_race = " . $race_id;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't delete race", "", __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . ADR_RACES_TABLE . "
				WHERE race_id = " . $race_id;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't delete race", "", __LINE__, __FILE__, $sql);
			}

			adr_previous( Adr_race_successful_deleted , admin_adr_races , '' );
			break;

		case 'edit':

			$race_id = ( !empty($_POST['id']) ) ? intval($_POST['id']) : intval($_GET['id']);

			adr_template_file('admin/config_adr_races_edit_body.tpl');

			$template->assign_block_vars( 'races_edit', array());

			$sql = "SELECT *
				FROM " . ADR_RACES_TABLE ."
				WHERE race_id = $race_id ";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain races information', "", __LINE__, __FILE__, $sql);
			}
			$races = $db->sql_fetchrow($result);

			$s_hidden_fields = '<input type="hidden" name="mode" value="save" /><input type="hidden" name="race_id" value="' . $races['race_id'] . '" />';

			$pic = $races['race_img'];

			$level[0] = $lang['Adr_races_level_all'];
			$level[1] = $lang['Adr_races_level_admin'];
			$level[2] = $lang['Adr_races_level_mod'];
			$level_list = '<select name="level">';
			for( $i = 0; $i < 3; $i++ )
			{
				$selected = ( $i == $races['race_level'] ) ? ' selected="selected"' : '';
				$level_list .= '<option value = "'.$i.'" '.$selected.' >' . $level[$i] . '</option>';
			}
			$level_list .= '</select>';

			$template->assign_vars(array(
				"RACE_NAME" => $races['race_name'],
				"RACE_NAME_EXPLAIN" => adr_get_lang($races['race_name']),
				"RACE_DESC" => $races['race_desc'],
				"RACE_DESC_EXPLAIN" => adr_get_lang($races['race_desc']),
				"RACE_IMG" => $races['race_img'],
				"RACE_IMG_EX" => $pic ,
				"RACE_WEIGHT" => $races['race_weight'],
				"RACE_WEIGHT_PER_LEVEL" => $races['race_weight_per_level'],
				"MIGHT_BONUS" => $races['race_might_bonus'],
				"DEXT_BONUS" => $races['race_dexterity_bonus'],
				"CONST_BONUS" => $races['race_constitution_bonus'],
				"INT_BONUS" => $races['race_intelligence_bonus'],
				"WIS_BONUS" => $races['race_wisdom_bonus'],
				"CHA_BONUS" => $races['race_charisma_bonus'],
				"MA_BONUS" => $races['race_magic_attack_bonus'],
				"MD_BONUS" => $races['race_magic_resistance_bonus'],
				"MA_MALUS" => $races['race_magic_attack_malus'],
				"MD_MALUS" => $races['race_magic_resistance_malus'],
				"MIGHT_MALUS" => $races['race_might_malus'],
				"DEXT_MALUS" => $races['race_dexterity_malus'],
				"CONST_MALUS" => $races['race_constitution_malus'],
				"INT_MALUS" => $races['race_intelligence_malus'],
				"WIS_MALUS" => $races['race_wisdom_malus'],
				"CHA_MALUS" => $races['race_charisma_malus'],
				"MINING_BONUS" => $races['race_skill_mining_bonus'],
				"STONE_BONUS" => $races['race_skill_stone_bonus'],
				"FORGE_BONUS" => $races['race_skill_forge_bonus'],
				"ENCHANT_BONUS" => $races['race_skill_enchantment_bonus'],
				"TRADING_BONUS" => $races['race_skill_trading_bonus'],
				"THIEF_BONUS" => $races['race_skill_thief_bonus'],
				"LEVEL_LIST" => $level_list,
				"L_RACES_TITLE" => $lang['Adr_races_add_edit'],
				"L_RACES_EXPLAIN" => $lang['Adr_races_add_edit_explain'],
				"L_RACES_WEIGHT" => $lang['Adr_races_weight'],	
				"L_RACES_WEIGHT_PER_LEVEL" => $lang['Adr_races_weight_per_level'],	
				"L_NAME" => $lang['Adr_races_name'],
				"L_NAME_EXPLAIN" => $lang['Adr_races_name_explain'],
				"L_DESC" => $lang['Adr_races_desc'],
				"L_IMG" => $lang['Adr_races_image'],
				"L_IMG_EXPLAIN" => $lang['Adr_races_image_explain'],
				"L_LEVEL" => $lang['Adr_races_level'],
				"L_LEVEL_EXPLAIN" => $lang['Adr_races_level_explain'],
				"L_MIGHT_BONUS" => $lang['Adr_races_bonus_might'],
				"L_DEXT_BONUS" => $lang['Adr_races_bonus_dext'],
				"L_CONST_BONUS" => $lang['Adr_races_bonus_const'],
				"L_INT_BONUS" => $lang['Adr_races_bonus_int'],
				"L_WIS_BONUS" => $lang['Adr_races_bonus_wis'],
				"L_CHA_BONUS" => $lang['Adr_races_bonus_cha'],
				"L_MA_BONUS" => $lang['Adr_races_bonus_ma'],
				"L_MD_BONUS" => $lang['Adr_races_bonus_md'],
				"L_MA_MALUS" => $lang['Adr_races_malus_ma'],
				"L_MD_MALUS" => $lang['Adr_races_malus_md'],
				"L_MIGHT_MALUS" => $lang['Adr_races_malus_might'],
				"L_DEXT_MALUS" => $lang['Adr_races_malus_dext'],
				"L_CONST_MALUS" => $lang['Adr_races_malus_const'],
				"L_INT_MALUS" => $lang['Adr_races_malus_int'],
				"L_WIS_MALUS" => $lang['Adr_races_malus_wis'],
				"L_CHA_MALUS" => $lang['Adr_races_malus_cha'],
				"L_MINING_BONUS" => $lang['Adr_races_bonus_mining'],
				"L_STONE_BONUS" => $lang['Adr_races_bonus_stone'],
				"L_FORGE_BONUS" => $lang['Adr_races_bonus_forge'],
				"L_ENCHANT_BONUS" => $lang['Adr_races_bonus_enchant'],
				"L_TRADING_BONUS" => $lang['Adr_races_bonus_trading'],
				"L_THIEF_BONUS" => $lang['Adr_races_bonus_thief'],
				"L_SUBMIT" => $lang['Submit'],
				"S_HIDDEN_FIELDS" => $s_hidden_fields) 
			);

			$template->pparse("body");
			break;

		case "save":

			$race_id = ( !empty($_POST['race_id']) ) ? intval($_POST['race_id']) : intval($_GET['race_id']);

			$race_name = ( isset($_POST['race_name']) ) ? trim($_POST['race_name']) : trim($_GET['race_name']);
			$race_img = ( isset($_POST['race_img']) ) ? trim($_POST['race_img']) : trim($_GET['race_img']);
			$race_desc = ( isset($_POST['race_desc']) ) ? trim($_POST['race_desc']) : trim($_GET['race_desc']);
			$level = intval($_POST['level']);
			$weight = intval($_POST['weight']);
			$weight_per_level = intval($_POST['weight_per_level']);
			$b_might = intval($_POST['might_bonus']);
			$b_dext = intval($_POST['dext_bonus']);
			$b_const = intval($_POST['const_bonus']);
			$b_int = intval($_POST['int_bonus']);
			$b_wis = intval($_POST['wis_bonus']);
			$b_cha = intval($_POST['cha_bonus']);
			$b_ma = intval($_POST['ma_bonus']);
			$b_md = intval($_POST['md_bonus']);
			$m_might = intval($_POST['might_malus']);
			$m_dext = intval($_POST['dext_malus']);
			$m_const = intval($_POST['const_malus']);
			$m_int = intval($_POST['int_malus']);
			$m_wis = intval($_POST['wis_malus']);
			$m_cha = intval($_POST['cha_malus']);
			$m_ma = intval($_POST['ma_malus']);
			$m_md = intval($_POST['md_malus']);
			$b_mining = intval($_POST['mining_bonus']);
			$b_stone = intval($_POST['stone_bonus']);
			$b_forge = intval($_POST['forge_bonus']);
			$b_enchant = intval($_POST['enchant_bonus']);
			$b_trading = intval($_POST['trading_bonus']);
			$b_thief = intval($_POST['thief_bonus']);

			if ($race_name == '' )
			{
				message_die(MESSAGE, $lang['Fields_empty']);
			}

			$sql = "UPDATE " . ADR_RACES_TABLE . "
				SET race_name = '" . str_replace("\'", "''", $race_name) . "', 	
					race_desc = '" . str_replace("\'", "''", $race_desc) . "', 
					race_img = '" . str_replace("\'", "''", $race_img) . "',
					race_level = $level ,
					race_weight = $weight ,
					race_weight_per_level = $weight_per_level ,
					race_might_bonus = $b_might , 
					race_dexterity_bonus = $b_dext ,
					race_constitution_bonus = $b_const ,
					race_intelligence_bonus = $b_int ,
					race_wisdom_bonus = $b_wis ,
					race_charisma_bonus = $b_cha ,
					race_magic_attack_bonus = $b_ma ,
					race_magic_resistance_bonus = $b_md ,
					race_might_malus = $m_might ,
					race_dexterity_malus = $m_dext ,
					race_constitution_malus = $m_const ,
					race_intelligence_malus = $m_int ,
					race_wisdom_malus = $m_wis ,
					race_charisma_malus = $m_cha ,
					race_skill_mining_bonus = $b_mining ,
					race_skill_stone_bonus = $b_stone , 
					race_skill_forge_bonus = $b_forge ,
					race_skill_enchantment_bonus = $b_enchant ,
					race_skill_trading_bonus = $b_trading , 
					race_skill_thief_bonus = $b_thief
				WHERE race_id = " . $race_id;
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, "Couldn't update races info", "", __LINE__, __FILE__, $sql);
			}

			// Update cache
			adr_update_race_infos();

			adr_previous( Adr_race_successful_edited , admin_adr_races , '' );
			break;

		case "savenew":

			$sql = "SELECT race_id
			FROM " . ADR_RACES_TABLE ."
			ORDER BY race_id 
			DESC LIMIT 1";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain races information', "", __LINE__, __FILE__, $sql);
			}
			$fields_data = $db->sql_fetchrow($result);

			$race_name = ( isset($_POST['race_name']) ) ? trim($_POST['race_name']) : trim($_GET['race_name']);
			$race_img = ( isset($_POST['race_img']) ) ? trim($_POST['race_img']) : trim($_GET['race_img']);
			$race_desc = ( isset($_POST['race_desc']) ) ? trim($_POST['race_desc']) : trim($_GET['race_desc']);
			$level = intval($_POST['level']);
			$weight = intval($_POST['weight']);
			$weight_per_level = intval($_POST['weight_per_level']);
			$b_might = intval($_POST['might_bonus']);
			$b_dext = intval($_POST['dext_bonus']);
			$b_const = intval($_POST['const_bonus']);
			$b_int = intval($_POST['int_bonus']);
			$b_wis = intval($_POST['wis_bonus']);
			$b_cha = intval($_POST['cha_bonus']);
			$b_ma = intval($_POST['ma_bonus']);
			$b_md = intval($_POST['md_bonus']);
			$m_might = intval($_POST['might_malus']);
			$m_dext = intval($_POST['dext_malus']);
			$m_const = intval($_POST['const_malus']);
			$m_int = intval($_POST['int_malus']);
			$m_wis = intval($_POST['wis_malus']);
			$m_cha = intval($_POST['cha_malus']);
			$m_ma = intval($_POST['ma_malus']);
			$m_md = intval($_POST['md_malus']);
			$b_mining = intval($_POST['mining_bonus']);
			$b_stone = intval($_POST['stone_bonus']);
			$b_forge = intval($_POST['forge_bonus']);
			$b_enchant = intval($_POST['enchant_bonus']);
			$b_trading = intval($_POST['trading_bonus']);
			$b_thief = intval($_POST['thief_bonus']);

			$race_id = $fields_data['race_id'] +1;

			if ($race_name == '' )
			{
				message_die(MESSAGE, $lang['Fields_empty']);
			}

			$sql = "INSERT INTO " . ADR_RACES_TABLE . " 
				( race_id , race_name , race_desc ,  race_level , race_img , race_might_bonus , race_dexterity_bonus , race_constitution_bonus , race_intelligence_bonus , race_wisdom_bonus , race_charisma_bonus , race_magic_attack_bonus , race_magic_resistance_bonus , race_might_malus , race_dexterity_malus , race_constitution_malus , race_intelligence_malus , race_wisdom_malus , race_charisma_malus , race_magic_attack_malus , race_magic_resistance_malus , race_skill_mining_bonus , race_skill_stone_bonus , race_skill_forge_bonus , race_skill_enchantment_bonus , race_skill_trading_bonus , race_skill_thief_bonus )
				VALUES ( $race_id,'" . str_replace("\'", "''", $race_name) . "', '" . str_replace("\'", "''", $race_desc) . "' , $level , '" . str_replace("\'", "''", $race_img) . "' , $b_might , $b_dext , $b_const , $b_int, $b_wis, $b_cha , $b_ma , $b_md , $m_might, $m_dext ,$m_const , $m_int, $m_wis , $m_cha , $m_ma , $m_md , $b_mining , $b_stone , $b_forge ,$b_enchant , $b_trading ,$b_thief )";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't insert new race", "", __LINE__, __FILE__, $sql);
			}

			// Update cache
			adr_update_race_infos();

			adr_previous( Adr_race_successful_added , admin_adr_races , '' );
			break;
	}
}
else
{

	adr_template_file('admin/config_adr_races_list_body.tpl');

	$sql = "SELECT *
		FROM " . ADR_RACES_TABLE;
	$result = $db->sql_query($sql);
	if( !$result )
	{
		message_die(GENERAL_ERROR, 'Could not obtain races information', "", __LINE__, __FILE__, $sql);
	}
	$races = $db->sql_fetchrowset($result);

	for($i = 0; $i < count($races); $i++)
	{
		$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

		$level[0] = $lang['Adr_races_level_all'];
		$level[1] = $lang['Adr_races_level_admin'];
		$level[2] = $lang['Adr_races_level_mod'];
		$race_level = $level[$races[$i]['race_level']];

		$pic = $races[$i]['race_img'];

		$template->assign_block_vars("races", array(
			"ROW_CLASS" => $row_class,
			"NAME" => adr_get_lang($races[$i]['race_name']),
			"DESC" => adr_get_lang($races[$i]['race_desc']),
			"IMG" => $pic ,
			"LEVEL" => $race_level,
			"U_RACES_EDIT" => append_sid("admin_adr_races.$phpEx?mode=edit&amp;id=" . $races[$i]['race_id']), 
			"U_RACES_DELETE" => append_sid("admin_adr_races.$phpEx?mode=delete&amp;id=" . $races[$i]['race_id']))
		);
	}


	$template->assign_vars(array(
		"L_RACES_TITLE" => $lang['Adr_races'],
		"L_RACES_TEXT" => $lang['Adr_races_explain'],
		"L_NAME" => $lang['Adr_races_name'],
		"L_IMG" => $lang['Adr_races_image'],
		"L_DESC" => $lang['Adr_races_desc'],
		"L_LEVEL" => $lang['Adr_races_level'],
		"L_RACES_ADD" => $lang['Adr_races_add'],
		"L_ACTION" => $lang['Action'],
		"L_DELETE" => $lang['Delete'],
		"L_EDIT" => $lang['Edit'],
		"L_SUBMIT" => $lang['Submit'],
		"S_RACES_ACTION" => append_sid("admin_adr_races.$phpEx"))
	);

	$template->pparse("body");
	include('./page_footer_admin.'.$phpEx);
}



?>
