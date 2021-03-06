<?php
/***************************************************************************
*                               admin_adr_forums_shop.php
*                              -------------------
*     begin                : 08/02/2004
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
define('IN_ADR_SHOPS', 1);
define('IN_ADR_CHARACTER', 1);

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Adr']['Adr_forum_shop'] = $filename;

	return;
}

$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
include($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx);
include_once($phpbb_root_path . 'adr/includes/adr_functions_admin.'.$phpEx);


if( isset($_POST['mode']) || isset($_GET['mode']) )
{
	$mode = ( isset($_POST['mode']) ) ? $_POST['mode'] : $_GET['mode'];
	$mode = htmlspecialchars($mode);
}
else
{
	$mode = "";
}

if ( $mode != "" )
{
	switch( $mode )
	{

		case 'add_item':

			adr_template_file('admin/config_adr_shops_items_edit_body.tpl');

			$template->assign_block_vars('add',array());

			$s_hidden_fields = '<input type="hidden" name="mode" value="savenew_item" /><input type="hidden" name="item_type" value="' . $item_type . '" />';

			$sql = "SELECT * FROM " . ADR_ELEMENTS_TABLE ;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$element_list = $db->sql_fetchrowset($result);

			$element_weap_list = '<select name="element_weap_list">';
                  $element_weap_list .= '<option value = "0" >' . $lang['Adr_items_element_none'] . '</option>';
                  for( $i = 0; $i < count($element_list); $i++ )
                  {
				$element_list[$i]['element_name'] = adr_get_lang($element_list[$i]['element_name']);
				$element_selected = ( $items['item_element'] == $element_list[$i]['element_id'] ) ? 'selected' : '';
				$element_weap_list .= '<option value = "'.$element_list[$i]['element_id'].'" '.$element_selected.' >' . $element_list[$i]['element_name'] . '</option>';
                  }
                  $element_weap_list .= '</select>';	

			$sql = "SELECT * FROM " . ADR_STORES_TABLE . "
					WHERE store_admin = 0 ";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$store_list = $db->sql_fetchrowset($result);

			// Stores list
			$store_cat_list = '<select name="store_cat_list">';
			for($i = 0; $i < count($store_list); $i++)
			{
				$store_list[$i]['store_name'] = adr_get_lang($store_list[$i]['store_name']);
				$store_selected = ( $items['item_store_id'] == $store_list[$i]['store_id'] ) ? 'selected' : '';
				$store_cat_list .= '<option value = "'.$store_list[$i]['store_id'].'" '.$store_selected.' >' . $store_list [$i]['store_name'] . '</option>';
			}
			$store_cat_list .= '</select>';

			// Steal DC options
			$steal_dc[0] = $lang['Adr_steal_none'];
			$steal_dc[1] = $lang['Adr_steal_very_easy'].' (7)';
			$steal_dc[2] = $lang['Adr_steal_easy'].' (12)';
			$steal_dc[3] = $lang['Adr_steal_average'].' (20)';
			$steal_dc[4] = $lang['Adr_steal_tough'].' (30)';
			$steal_dc[5] = $lang['Adr_steal_challenging'].' (45)';
			$steal_dc[6] = $lang['Adr_steal_formidable'].' (75)';
			$steal_dc[7] = $lang['Adr_steal_heroic'].' (100)';
			$steal_dc[8] = $lang['Adr_steal_impossible'].' (150)';

			$steal_list = '<select name="steal_dc">';
			for($i = 0; $i < 9; $i++)
			{
				$steal_list .= '<option value = "'.$i.'" >' . $steal_dc[$i] . '</option>';
			}
			$steal_list .= '</select>';
			// END steal DC options

			// START alignment restrictions
			$sql = "SELECT * FROM " . ADR_ALIGNMENTS_TABLE;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$align_list = $db->sql_fetchrowset($result);

			// Explode current alignment list
			$current_align_list = explode(",", $items['item_restrict_align']);

			// Make multiple selection box
			$align_type = '<select name="align_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($align_list); $i++)
			{
				$align_list[$i]['alignment_name'] = adr_get_lang($align_list[$i]['alignment_name']);
				$align_selected = (in_array($align_list[$i]['alignment_id'], $current_align_list)) ? 'selected' : '';
				$align_type .= '<option value = "'.$align_list[$i]['alignment_id'].'" '.$align_selected.' >' . $align_list[$i]['alignment_name'] . '</option>';
			}
			$align_type .= '</select>';
			// END alignment restrictions

			// START class restrictions
			$sql = "SELECT * FROM " . ADR_CLASSES_TABLE;
			$result = $db->sql_query($sql);
			if(!$result)
			{
				message_die(GENERAL_ERROR, 'Could not obtain class info', "", __LINE__, __FILE__, $sql);
			}
			$class_list = $db->sql_fetchrowset($result);

			// Explode current class list
			$current_class_list = explode(",", $items['item_restrict_class']);

			// Make multiple selection box
			$class_type = '<select name="class_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($class_list); $i++)
			{
				$class_list[$i]['class_name'] = adr_get_lang($class_list[$i]['class_name']);
				$class_selected = (in_array($class_list[$i]['class_id'], $current_class_list)) ? 'selected' : '';
				$class_type .= '<option value = "'.$class_list[$i]['class_id'].'" '.$class_selected.' >' . $class_list[$i]['class_name'] . '</option>';
			}
			$class_type .= '</select>';
			// END class restrictions

			// START race restrictions
			$sql = "SELECT * FROM " . ADR_RACES_TABLE;
			$result = $db->sql_query($sql);
			if(!$result)
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$race_list = $db->sql_fetchrowset($result);

			// Explode current race list
			$current_race_list = explode(",", $items['shop_restrict_race']);

			// Make multiple selection box
			$race_type = '<select name="race_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($race_list); $i++)
			{
				$race_list[$i]['race_name'] = adr_get_lang($race_list[$i]['race_name']);
				$race_selected = (in_array($race_list[$i]['race_id'], $current_race_list)) ? 'selected' : '';
				$race_type .= '<option value = "'.$race_list[$i]['race_id'].'" '.$race_selected.' >' . $race_list[$i]['race_name'] . '</option>';
			}
			$race_type .= '</select>';
			// END race restrictions

			// START element restrictions
			$sql = "SELECT * FROM " . ADR_ELEMENTS_TABLE;
			$result = $db->sql_query($sql);
			if(!$result)
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$element_list = $db->sql_fetchrowset($result);

			// Explode current element list
			$current_element_list = explode(",", $items['shop_restrict_element']);

			// Make multiple selection box
			$element_type = '<select name="element_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($element_list); $i++)
			{
				$element_list[$i]['element_name'] = adr_get_lang($element_list[$i]['element_name']);
				$element_selected = (in_array($element_list[$i]['element_id'], $current_element_list)) ? 'selected' : '';
				$element_type .= '<option value = "'.$element_list[$i]['element_id'].'" '.$element_selected.' >' . $element_list[$i]['element_name'] . '</option>';
			}
			$element_type .= '</select>';
			// END element restrictions

			$template->assign_vars(array(
				"ALIGNMENT_TYPE_ENABLE" => ($items['item_restrict_alignment_enable']) ? 'checked' : '',
				"ALIGNMENT_LIST" => $align_type,
				"CLASS_TYPE_ENABLE" => ($items['item_restrict_class_enable']) ? 'checked' : '',
				"CLASS_LIST" => $class_type,
				"RACE_TYPE_ENABLE" => ($items['item_restrict_race_enable']) ? 'checked' : '',
				"RACE_LIST" => $race_type,
				"ELEMENT_TYPE_ENABLE" => ($items['item_restrict_element_enable']) ? 'checked' : '',
				"ELEMENT_LIST" => $element_type,
				"ITEM_QUALITY" => adr_get_item_quality($items['item_quality'],'list'),
				"ITEM_TYPE" => adr_get_item_type($items['item_type_use'],'list'),
				"ITEM_ELEMENT_LIST" => $element_weap_list,
				"ITEM_ELEMENT_STR" => $items['item_element_str_dmg'],
				"ITEM_ELEMENT_SAME" => $items['item_element_same_dmg'],
				"ITEM_ELEMENT_WEAK" => $items['item_element_weak_dmg'],
				"ITEM_STORE_LIST" => $store_cat_list,
				"ITEM_WEIGHT" => $items['item_weight'],
				"ITEM_AUTH" => ( $items['item_auth'] ) ? 'checked' : '',
				"ITEM_MAX_SKILL" => $items['item_max_skill'],
				"ITEM_SELL_BACK_PERCENT" => $items['item_sell_back_percentage'],
				"ITEM_STEAL_LIST" => $steal_list,
				"L_ITEM_STEAL" => $lang['Adr_items_steal_dc'],
				"L_ITEM_STEAL_EXPLAIN" => $lang['Adr_items_steal_explain'],
				"L_ITEM_SELL_BACK_PERCENT" => $lang['Adr_item_sell_back'],
				"L_ITEM_SELL_BACK_PERCENT_EXPLAIN" => $lang['Adr_item_sell_back_explain'],
				"L_ITEM_ELEMENT" => $lang['Adr_shops_item_element'],
				"L_ITEM_ELEMENT_STR" => $lang['Adr_shops_item_element_str'],
				"L_ITEM_ELEMENT_SAME" => $lang['Adr_shops_item_element_same'],
				"L_ITEM_ELEMENT_WEAK" => $lang['Adr_shops_item_element_weak'],
				"L_ITEM_MAX_SKILL" => $lang['Adr_item_max_skill'],
				"L_ITEM_WEIGHT" => $lang['Adr_shops_item_weight'],
				"L_ITEM_STORE" => $lang['Adr_items_store'],
				"L_ITEM_ENHANCEMENTS" => $lang['Adr_items_enhancements'],
				"L_ITEM_ADD_POWER" => $lang['Adr_items_dex'],
				"L_ITEM_ADD_POWER_EXPLAIN" => $lang['Adr_items_dex_explain'],
				"L_ITEM_MP_USE" => $lang['Adr_items_mp_use'],
				"L_ITEM_MP_USE_EXPLAIN" => $lang['Adr_items_mp_use_explain'],
				"L_POINTS" => $board_config['points_name'],
				"L_NAME_EXPLAIN" => $lang['Adr_races_name_explain'],
				"L_ITEMS_TITLE" => $lang['Adr_shops_item_add_title'],
				"L_ITEMS_EXPLAIN" => $lang['Adr_shops_item_add_title_explain'],
				"L_ITEM_NAME" => $lang['Adr_shops_categories_item_name'],
				"L_ITEM_DESC" => $lang['Adr_shops_categories_item_desc'],
				"L_ITEM_QUALITY" => $lang['Adr_items_quality'],
				"L_ITEM_POWER" => $lang['Adr_items_power'],
				"L_ITEM_ENHANCEMENTS" => $lang['Adr_items_enhancements'],
				"L_ITEM_ADD_POWER" => $lang['Adr_items_dex'],
				"L_ITEM_ADD_POWER_EXPLAIN" => $lang['Adr_items_dex_explain'],
				"L_ITEM_MP_USE" => $lang['Adr_items_mp_use'],
				"L_ITEM_MP_USE_EXPLAIN" => $lang['Adr_items_mp_use_explain'],
				"L_ITEM_DURATION" => $lang['Adr_items_duration'],
				"L_ITEM_DURATION_MAX" => $lang['Adr_items_duration_max'],
				"L_ITEM_TYPE" => $lang['Adr_items_type_use'],
				"L_ITEM_AUTH" => $lang['Adr_store_auth'],
				"L_RESTRICT_TITLE" => $lang['Adr_admin_item_restrict_chars'],
				"L_RESTRICT_CHARS" => $lang['Adr_admin_item_restrict_chars'],
				"L_RESTRICT_CHARS_EXPLAIN" => $lang['Adr_admin_item_restrict_chars_explain'],
				"L_RESTRICT_LEVEL" => $lang['Adr_admin_item_restrict_level'],
				"L_RESTRICT_LEVEL_EXPLAIN" => $lang['Adr_admin_item_restrict_level_explain'],
				"L_RESTRICT_AC" => $lang['Adr_char_ac'],
				"L_RESTRICT_DEX" => $lang['Adr_char_dex'],
				"L_RESTRICT_INT" => $lang['Adr_char_int'],
				"L_RESTRICT_WIS" => $lang['Adr_char_wis'],
				"L_RESTRICT_STR" => $lang['Adr_char_str'],
				"L_RESTRICT_CHA" => $lang['Adr_char_cha'],
				"L_RESTRICT_CON" => $lang['Adr_char_con'],
        		"L_RESTRICT_CLASS_ENABLE" => $lang['Adr_admin_item_restrict_class_enable'],
        		"L_RESTRICT_CLASS_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_class_enable_explain'],
        		"L_RESTRICT_ALIGNMENT_ENABLE" => $lang['Adr_admin_item_restrict_alignment_enable'],
        		"L_RESTRICT_ALIGNMENT_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_alignment_enable_explain'],
        		"L_RESTRICT_RACE_ENABLE" => $lang['Adr_admin_item_restrict_race_enable'],
        		"L_RESTRICT_RACE_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_race_enable_explain'],
        		"L_RESTRICT_ELEMENT_ENABLE" => $lang['Adr_admin_item_restrict_element_enable'],
        		"L_RESTRICT_ELEMENT_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_element_enable_explain'],
        		"L_RESTRICT_CLASS" => $lang['Adr_admin_item_restrict_class'],
        		"L_RESTRICT_ALIGNMENT" => $lang['Adr_admin_item_restrict_alignment'],
        		"L_RESTRICT_RACE" => $lang['Adr_admin_item_restrict_race'],
        		"L_RESTRICT_ELEMENT" => $lang['Adr_admin_item_restrict_element'],
				"L_NAME" => $lang['Adr_races_name'],
				"L_DESC" => $lang['Adr_races_desc'],
				"L_ACTION" => $lang['Action'],
				"L_ITEMS" => $lang['Adr_shops_categories_items'],
				"L_EDIT" => $lang['Edit'],
				"L_DELETE" => $lang['Delete'],
				"L_ITEM_IMG" => $lang['Adr_races_image'],
				"L_ITEM_PRICE" => $lang['Adr_items_price'],
				"L_ITEM_PRICE_EXPLAIN" => $lang['Adr_items_price_explain'],
				"L_IMG" => $lang['Adr_races_image'],
				"L_IMG_EXPLAIN" => $lang['Adr_items_image_explain'],
				"L_ITEM_ELEMENT" => $lang['Adr_shops_item_element'],
				"L_SUBMIT" => $lang['Submit'],
				"S_ITEMS_ACTION" => append_sid("admin_adr_forums_shop.$phpEx"),
				"S_HIDDEN_FIELDS" => $s_hidden_fields, 
			));

			$template->pparse("body");

		break;

		case 'delete_item':

			$item_id = ( !empty($_POST['item_id']) ) ? intval($_POST['item_id']) : intval($_GET['item_id']);

			$sql = "DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_id = " . $item_id . "
				AND item_owner_id = 1 ";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't delete item", "", __LINE__, __FILE__, $sql);
			}

			adr_previous( Adr_shops_items_successful_deleted , admin_adr_forums_shop , '' );

		break;

		case 'edit_item':

			$item_id = ( !empty($_POST['item_id']) ) ? intval($_POST['item_id']) : intval($_GET['item_id']);

			adr_template_file('admin/config_adr_shops_items_edit_body.tpl');

			##=== START: check if item is to be copied as new or just edited ===##
			$edit_type = (($_POST['edit_type'] === 'edit_item') || ($_GET['edit_type'] === 'edit_item')) ? 'edit_item' : 'copy_item';
			if($edit_type === 'edit_item') $template->assign_block_vars('edit', array());
			if($edit_type === 'copy_item') $template->assign_block_vars('copy', array());
			if($edit_type === 'edit_item')
				$s_hidden_fields = '<input type="hidden" name="mode" value="save_item" /><input type="hidden" name="item_id" value="' . $item_id . '" />';
			else
				$s_hidden_fields = '<input type="hidden" name="mode" value="savenew_item" /><input type="hidden" name="item_id" value="' . $item_id . '" />';
			##=== END: check if item is to be copied as new or just edited ===##

			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_id = $item_id 
				AND item_owner_id = 1";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain items information', "", __LINE__, __FILE__, $sql);
			}
			$items = $db->sql_fetchrow($result);

			$sql = "SELECT * FROM " . ADR_ELEMENTS_TABLE ;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$element_list = $db->sql_fetchrowset($result);

			$element_weap_list = '<select name="element_weap_list">';
                  $element_weap_list .= '<option value = "0" >' . $lang['Adr_items_element_none'] . '</option>';
                  for( $i = 0; $i < count($element_list); $i++ )
                  {
				$element_list[$i]['element_name'] = adr_get_lang($element_list[$i]['element_name']);
				$element_selected = ( $items['item_element'] == $element_list[$i]['element_id'] ) ? 'selected' : '';
				$element_weap_list .= '<option value = "'.$element_list[$i]['element_id'].'" '.$element_selected.' >' . $element_list[$i]['element_name'] . '</option>';
                  }
                  $element_weap_list .= '</select>';	

			$sql = "SELECT * FROM " . ADR_STORES_TABLE . "
					WHERE store_admin = 0 ";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$store_list = $db->sql_fetchrowset($result);

			// Stores list
			$store_cat_list = '<select name="store_cat_list">';
			for($i = 0; $i < count($store_list); $i++)
			{
				$store_list[$i]['store_name'] = adr_get_lang($store_list[$i]['store_name']);
				$store_selected = ( $items['item_store_id'] == $store_list[$i]['store_id'] ) ? 'selected' : '';
				$store_cat_list .= '<option value = "'.$store_list[$i]['store_id'].'" '.$store_selected.' >' . $store_list [$i]['store_name'] . '</option>';
			}
			$store_cat_list .= '</select>';

			// Steal DC options
			$steal_dc[0] = $lang['Adr_steal_none'];
			$steal_dc[1] = $lang['Adr_steal_very_easy'].' (7)';
			$steal_dc[2] = $lang['Adr_steal_easy'].' (12)';
			$steal_dc[3] = $lang['Adr_steal_average'].' (20)';
			$steal_dc[4] = $lang['Adr_steal_tough'].' (30)';
			$steal_dc[5] = $lang['Adr_steal_challenging'].' (45)';
			$steal_dc[6] = $lang['Adr_steal_formidable'].' (75)';
			$steal_dc[7] = $lang['Adr_steal_heroic'].' (100)';
			$steal_dc[8] = $lang['Adr_steal_impossible'].' (150)';

			$steal_list = '<select name="steal_dc">';
			for($i = 0; $i < 9; $i++)
			{
				$selected = ($i == $items['item_steal_dc']) ? ' selected="selected"' : '';
				$steal_list .= '<option value = "'.$i.'" '.$selected.'>' . $steal_dc[$i] . '</option>';
			}
			$steal_list .= '</select>';
			// END steal DC options

			// START alignment restrictions
			$sql = "SELECT * FROM " . ADR_ALIGNMENTS_TABLE;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$align_list = $db->sql_fetchrowset($result);

			// Explode current alignment list
			$current_align_list = explode(",", $items['item_restrict_align']);

			// Make multiple selection box
			$align_type = '<select name="align_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($align_list); $i++)
			{
				$align_list[$i]['alignment_name'] = adr_get_lang($align_list[$i]['alignment_name']);
				$align_selected = (in_array($align_list[$i]['alignment_id'], $current_align_list)) ? 'selected' : '';
				$align_type .= '<option value = "'.$align_list[$i]['alignment_id'].'" '.$align_selected.' >' . $align_list[$i]['alignment_name'] . '</option>';
			}
			$align_type .= '</select>';
			// END alignment restrictions

			// START class restrictions
			$sql = "SELECT * FROM " . ADR_CLASSES_TABLE;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain class info', "", __LINE__, __FILE__, $sql);
			}
			$class_list = $db->sql_fetchrowset($result);

			// Explode current class list
			$current_class_list = explode(",", $items['item_restrict_class']);

			// Make multiple selection box
			$class_type = '<select name="class_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($class_list); $i++)
			{
				$class_list[$i]['class_name'] = adr_get_lang($class_list[$i]['class_name']);
				$class_selected = (in_array($class_list[$i]['class_id'], $current_class_list)) ? 'selected' : '';
				$class_type .= '<option value = "'.$class_list[$i]['class_id'].'" '.$class_selected.' >' . $class_list[$i]['class_name'] . '</option>';
			}
			$class_type .= '</select>';
			// END class restrictions

			// START race restrictions
			$sql = "SELECT * FROM " . ADR_RACES_TABLE;
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$race_list = $db->sql_fetchrowset($result);

			// Explode current race list
			$current_race_list = explode(",", $items['item_restrict_race']);

			// Make multiple selection box
			$race_type = '<select name="race_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($race_list); $i++)
			{
				$race_list[$i]['race_name'] = adr_get_lang($race_list[$i]['race_name']);
				$race_selected = (in_array($race_list[$i]['race_id'], $current_race_list)) ? 'selected' : '';
				$race_type .= '<option value = "'.$race_list[$i]['race_id'].'" '.$race_selected.' >' . $race_list[$i]['race_name'] . '</option>';
			}
			$race_type .= '</select>';
			// END race restrictions

			// START element restrictions
			$sql = "SELECT * FROM " . ADR_ELEMENTS_TABLE;
			$result = $db->sql_query($sql);
			if(!$result)
			{
				message_die(GENERAL_ERROR, 'Could not obtain elements information', "", __LINE__, __FILE__, $sql);
			}
			$element_list = $db->sql_fetchrowset($result);

			// Explode current element list
			$current_element_list = explode(",", $items['item_restrict_element']);

			// Make multiple selection box
			$element_type = '<select name="element_type_list[]" size="6" multiple>';
			for($i = 0; $i < count($element_list); $i++)
			{
				$element_list[$i]['element_name'] = adr_get_lang($element_list[$i]['element_name']);
				$element_selected = (in_array($element_list[$i]['element_id'], $current_element_list)) ? 'selected' : '';
				$element_type .= '<option value = "'.$element_list[$i]['element_id'].'" '.$element_selected.' >' . $element_list[$i]['element_name'] . '</option>';
			}
			$element_type .= '</select>';
			// END element restrictions

			$template->assign_vars(array(
				"ITEM_NAME" => $items['item_name'],
				"ITEM_DESC" => $items['item_desc'],
				"ITEM_NAME_EXPLAIN" => adr_get_lang($items['item_name']),
				"ITEM_DESC_EXPLAIN" => adr_get_lang($items['item_desc']),
				"ITEM_IMG" => $items['item_icon'],
				"ITEM_QUALITY" => adr_get_item_quality($items['item_quality'],'list'),
				"ITEM_TYPE" => adr_get_item_type($items['item_type_use'],'list'),
				"ITEM_DURATION" => $items['item_duration'],
				"ITEM_DURATION_MAX" => $items['item_duration_max'],
				"ITEM_POWER" => $items['item_power'],
				"ITEM_ADD_POWER" => $items['item_add_power'],
				"ITEM_MP_USE" => $items['item_mp_use'],
				"ITEM_PRICE" => $items['item_price'],
				"ITEM_ELEMENT_LIST" => $element_weap_list,
				"ITEM_ELEMENT_STR" => $items['item_element_str_dmg'],
				"ITEM_ELEMENT_SAME" => $items['item_element_same_dmg'],
				"ITEM_ELEMENT_WEAK" => $items['item_element_weak_dmg'],
				"ITEM_STORE_LIST" => $store_cat_list,
				"ITEM_WEIGHT" => $items['item_weight'],
				"ITEM_AUTH" => ( $items['item_auth'] ) ? 'checked' : '',
				"ITEM_MAX_SKILL" => $items['item_max_skill'],
				"ITEM_SELL_BACK_PERCENT" => $items['item_sell_back_percentage'],
				"ITEM_STEAL_LIST" => $steal_list,
				"ALIGNMENT_TYPE_ENABLE" => ($items['item_restrict_align_enable']) ? 'checked' : '',
				"ALIGNMENT_LIST" => $align_type,
				"CLASS_TYPE_ENABLE" => ($items['item_restrict_class_enable']) ? 'checked' : '',
				"CLASS_LIST" => $class_type,
				"RACE_TYPE_ENABLE" => ($items['item_restrict_race_enable']) ? 'checked' : '',
				"RACE_LIST" => $race_type,
				"ELEMENT_TYPE_ENABLE" => ($items['item_restrict_element_enable']) ? 'checked' : '',
				"ELEMENT_LIST" => $element_type,
				"RESTRICT_LEVEL" => $items['item_restrict_level'],
				"RESTRICT_CON" => $items['item_restrict_con'],
				"RESTRICT_STR" => $items['item_restrict_str'],
				"RESTRICT_DEX" => $items['item_restrict_dex'],
				"RESTRICT_INT" => $items['item_restrict_int'],
				"RESTRICT_WIS" => $items['item_restrict_wis'],
				"RESTRICT_CHA" => $items['item_restrict_cha'],
				"L_ITEM_STEAL" => $lang['Adr_items_steal_dc'],
				"L_ITEM_STEAL_EXPLAIN" => $lang['Adr_items_steal_explain'],
				"L_ITEM_SELL_BACK_PERCENT" => $lang['Adr_item_sell_back'],
				"L_ITEM_SELL_BACK_PERCENT_EXPLAIN" => $lang['Adr_item_sell_back_explain'],
				"L_ITEM_ELEMENT" => $lang['Adr_shops_item_element'],
				"L_ITEM_ELEMENT_STR" => $lang['Adr_shops_item_element_str'],
				"L_ITEM_ELEMENT_SAME" => $lang['Adr_shops_item_element_same'],
				"L_ITEM_ELEMENT_WEAK" => $lang['Adr_shops_item_element_weak'],
				"L_ITEM_MAX_SKILL" => $lang['Adr_item_max_skill'],
				"L_ITEM_WEIGHT" => $lang['Adr_shops_item_weight'],
				"L_ITEM_ENHANCEMENTS" => $lang['Adr_items_enhancements'],
				"L_ITEM_ADD_POWER" => $lang['Adr_items_dex'],
				"L_ITEM_ADD_POWER_EXPLAIN" => $lang['Adr_items_dex_explain'],
				"L_ITEM_MP_USE" => $lang['Adr_items_mp_use'],
				"L_ITEM_MP_USE_EXPLAIN" => $lang['Adr_items_mp_use_explain'],
				"L_ITEM_STORE" => $lang['Adr_items_store'],
				"L_POINTS" => $board_config['points_name'],
				"L_NAME_EXPLAIN" => $lang['Adr_races_name_explain'],
				"L_ITEMS_TITLE" => $lang['Adr_shops_item_add_title'],
				"L_ITEMS_EXPLAIN" => $lang['Adr_shops_item_add_title_explain'],
				"L_ITEM_NAME" => $lang['Adr_shops_categories_item_name'],
				"L_ITEM_DESC" => $lang['Adr_shops_categories_item_desc'],
				"L_ITEM_QUALITY" => $lang['Adr_items_quality'],
				"L_ITEM_POWER" => $lang['Adr_items_power'],
				"L_ITEM_DURATION" => $lang['Adr_items_duration'],
				"L_ITEM_DURATION_MAX" => $lang['Adr_items_duration_max'],
				"L_ITEM_AUTH" => $lang['Adr_store_auth'],
				"L_RESTRICT_TITLE" => $lang['Adr_admin_item_restrict_chars'],
				"L_RESTRICT_CHARS" => $lang['Adr_admin_item_restrict_chars'],
				"L_RESTRICT_CHARS_EXPLAIN" => $lang['Adr_admin_item_restrict_chars_explain'],
				"L_RESTRICT_LEVEL" => $lang['Adr_admin_item_restrict_level'],
				"L_RESTRICT_LEVEL_EXPLAIN" => $lang['Adr_admin_item_restrict_level_explain'],
				"L_RESTRICT_AC" => $lang['Adr_char_ac'],
				"L_RESTRICT_DEX" => $lang['Adr_char_dex'],
				"L_RESTRICT_INT" => $lang['Adr_char_int'],
				"L_RESTRICT_WIS" => $lang['Adr_char_wis'],
				"L_RESTRICT_STR" => $lang['Adr_char_str'],
				"L_RESTRICT_CHA" => $lang['Adr_char_cha'],
				"L_RESTRICT_CON" => $lang['Adr_char_con'],
        		"L_RESTRICT_CLASS_ENABLE" => $lang['Adr_admin_item_restrict_class_enable'],
        		"L_RESTRICT_CLASS_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_class_enable_explain'],
        		"L_RESTRICT_ALIGNMENT_ENABLE" => $lang['Adr_admin_item_restrict_alignment_enable'],
        		"L_RESTRICT_ALIGNMENT_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_alignment_enable_explain'],
        		"L_RESTRICT_RACE_ENABLE" => $lang['Adr_admin_item_restrict_race_enable'],
        		"L_RESTRICT_RACE_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_race_enable_explain'],
        		"L_RESTRICT_ELEMENT_ENABLE" => $lang['Adr_admin_item_restrict_element_enable'],
        		"L_RESTRICT_ELEMENT_ENABLE_EXPLAIN" => $lang['Adr_admin_item_restrict_element_enable_explain'],
        		"L_RESTRICT_CLASS" => $lang['Adr_admin_item_restrict_class'],
        		"L_RESTRICT_ALIGNMENT" => $lang['Adr_admin_item_restrict_alignment'],
        		"L_RESTRICT_RACE" => $lang['Adr_admin_item_restrict_race'],
        		"L_RESTRICT_ELEMENT" => $lang['Adr_admin_item_restrict_element'],
				"L_MASS_ITEM_DELETION" => $lang['Adr_admin_item_mass_delete'],
				"L_MASS_ITEM_DELETION_EXPLAIN" => $lang['Adr_admin_item_mass_delete_ex'],
				"L_NAME" => $lang['Adr_races_name'],
				"L_DESC" => $lang['Adr_races_desc'],
				"L_ACTION" => $lang['Action'],
				"L_ITEMS" => $lang['Adr_shops_categories_items'],
				"L_EDIT" => $lang['Edit'],
				"L_DELETE" => $lang['Delete'],
				"L_ITEM_IMG" => $lang['Adr_races_image'],
				"L_ITEM_PRICE" => $lang['Adr_items_price'],
				"L_ITEM_PRICE_EXPLAIN" => $lang['Adr_items_price_explain'],
				"L_IMG" => $lang['Adr_races_image'],
				"L_IMG_EXPLAIN" => $lang['Adr_items_image_explain'],
				"L_ITEM_TYPE" => $lang['Adr_items_type_use'],
				"L_SUBMIT" => $lang['Submit'],
				"S_ITEMS_ACTION" => append_sid("admin_adr_forums_shop.$phpEx"),
				"S_HIDDEN_FIELDS" => $s_hidden_fields, 
			));

			$template->pparse("body");

		break;

		case "save_item":

			$item_id = intval($_POST['item_id']);
			$item_name = ( isset($_POST['item_name']) ) ? trim($_POST['item_name']) : trim($_GET['item_name']);
			$item_desc = ( isset($_POST['item_desc']) ) ? trim($_POST['item_desc']) : trim($_GET['item_desc']);
			$item_icon = ( isset($_POST['item_img']) ) ? trim($_POST['item_img']) : trim($_GET['item_img']);
			$item_quality = intval($_POST['item_quality']);
			$item_type_use = intval($_POST['item_type_use']);
			$item_power = intval($_POST['item_power']);
			$item_add_power = intval($_POST['item_add_power']);
			$item_mp_use = intval($_POST['item_mp_use']);
			$item_duration = intval($_POST['item_duration']);
			$item_duration_max = intval($_POST['item_duration_max']);
			$item_price = intval($_POST['item_price']);
			$item_element = intval($_POST['element_weap_list']);
			$item_element_str = intval($_POST['item_element_str']);
			$item_element_same = intval($_POST['item_element_same']);
			$item_element_weak = intval($_POST['item_element_weak']);	
			$item_store = intval($_POST['store_cat_list']);
			$item_weight = intval($_POST['item_weight']);
			$item_auth = intval($_POST['item_auth']);
			$item_max_skill = intval($_POST['item_max_skill']);
			$item_sell_back_percent = intval($_POST['item_sell_back_percent']);
			$item_steal_dc = intval($_POST['steal_dc']);
			$restrict_level = intval($_POST['restrict_level']);
			$restrict_str = intval($_POST['restrict_str']);
			$restrict_dex = intval($_POST['restrict_dex']);
			$restrict_con = intval($_POST['restrict_con']);
			$restrict_int = intval($_POST['restrict_int']);
			$restrict_wis = intval($_POST['restrict_wis']);
			$restrict_cha = intval($_POST['restrict_cha']);
			$class_enable = intval($_POST['class_enable']);
			$class = (isset($_POST['class_type_list'])) ? $_POST['class_type_list'] : array();
			$alignment_enable = intval($_POST['alignment_enable']);
			$alignment = (isset($_POST['align_type_list'])) ? $_POST['align_type_list'] : array();
			$race_enable = intval($_POST['race_enable']);
			$race = (isset($_POST['race_type_list'])) ? $_POST['race_type_list'] : array();
			$element_enable = intval($_POST['element_enable']);
			$element = (isset($_POST['element_type_list'])) ? $_POST['element_type_list'] : array();

	         ##=== START: Prevent 0% element effects
	         if($item_element == '0'){
	            $item_element_str = intval(100);
	            $item_element_same = intval(100);
	            $item_element_weak = intval(100);
	         }
	         ##=== END: Prevent 0% element effects

			// START RESTRICTION CHECKS
			// Make new restriction arrays
			$newalignlist = adr_admin_make_array($alignment_enable, $alignment);
			$newclasslist = adr_admin_make_array($class_enable, $class);
			$newracelist = adr_admin_make_array($race_enable, $race);
			$newelementlist = adr_admin_make_array($element_enable, $element);

			// Make sure admin chose one or more options if enabled
			if(($alignment_enable == '1') && (count($alignment) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_alignment_error']);
			if(($class_enable == '1') && (count($class) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_class_error']);
			if(($race_enable == '1') && (count($race) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_race_error']);
			if(($element_enable == '1') && (count($element) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_element_error']);
			// END RESTRICTION CHECKS

			##=== START: Check for mass item deletion from character inventories
			if(intval($_POST['mass_item_deletion']) == '1'){
				$sql = "DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_name = '$item_name'
					AND item_owner_id != '1'";
				if( !($result = $db->sql_query($sql)) ){
					message_die(GENERAL_ERROR, "Could NOT mass delete by item name", "", __LINE__, __FILE__, $sql);}
			}
			##=== END: Check for mass item deletion from character inventories

			if ( !$item_price )
			{
				// If no price is defined , let's calculate the real item price

				$adr_general = adr_get_general_config();

				// Get the base and modifier price
				$adr_quality_price = adr_get_item_quality( $item_quality , price );
				$adr_type_price = adr_get_item_type( $item_type_use , price );

				// First define the base price
				$item_price = $adr_type_price;

				// Then apply the quality modifier
				$item_price = $item_price * ( ( $adr_quality_price / 100 ));

				// And now the power - it's a little more complicated
				$item_price = ( $item_power > 1 ) ? ( $item_price + ( $item_price * ( ( $item_power - 1 ) * ( $adr_general['item_modifier_power'] - 100 ) / 100 ))) : $item_price ;

				// Apply the duration penalty
				$item_price = abs($item_price / ($item_duration_max / $item_duration));

				// Finally let's use a non decimal value & add 10 %
				$item_price = ceil($item_price * 1.1);
			}

			$sql = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
				SET 	item_name = '" . str_replace("\'", "''", $item_name) . "', 
					item_desc = '" . str_replace("\'", "''", $item_desc) . "', 
					item_icon = '" . str_replace("\'", "''", $item_icon) . "', 
					item_quality = $item_quality, 
					item_type_use = $item_type_use, 
					item_power = $item_power, 
					item_add_power = $item_add_power,
					item_mp_use = $item_mp_use,
					item_duration = $item_duration, 
					item_duration_max = $item_duration_max, 
					item_price = $item_price , 
					item_weight = $item_weight, 
					item_auth = $item_auth , 
					item_max_skill = $item_max_skill ,
					item_sell_back_percentage = $item_sell_back_percent , 
					item_steal_dc = $item_steal_dc,
					item_restrict_align_enable = $alignment_enable,
					item_restrict_align = '$newalignlist',
					item_restrict_class_enable = $class_enable,
					item_restrict_class = '$newclasslist',
					item_restrict_race_enable = $race_enable,
					item_restrict_race = '$newracelist',
					item_restrict_element_enable = $element_enable,
					item_restrict_element = '$newelementlist',
					item_restrict_level = $restrict_level,
					item_restrict_str = $restrict_str,
					item_restrict_dex = $restrict_dex,
					item_restrict_con = $restrict_con,
					item_restrict_int = $restrict_int,
					item_restrict_wis = $restrict_wis,
					item_restrict_cha = $restrict_cha,
					item_store_id = $item_store , 
					item_element = $item_element,
					item_element_str_dmg = $item_element_str,
					item_element_same_dmg = $item_element_same,
					item_element_weak_dmg = $item_element_weak 
				WHERE item_id = " . $item_id . "
				AND item_owner_id = 1 ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, "Couldn't update shops items", "", __LINE__, __FILE__, $sql);
			}

			adr_previous( Adr_shops_items_successful_edited , admin_adr_forums_shop , '' );

		break;

		case "savenew_item":

			$sql = "SELECT item_id FROM " . ADR_SHOPS_ITEMS_TABLE ."
				ORDER BY item_id 
				DESC LIMIT 1";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, 'Could not obtain races information', "", __LINE__, __FILE__, $sql);
			}
			$fields_data = $db->sql_fetchrow($result);
			$item_id = $fields_data['item_id'] + 1 ;

			$item_name = ( isset($_POST['item_name']) ) ? trim($_POST['item_name']) : trim($_GET['item_name']);
			$item_desc = ( isset($_POST['item_desc']) ) ? trim($_POST['item_desc']) : trim($_GET['item_desc']);
			$item_icon = ( isset($_POST['item_img']) ) ? trim($_POST['item_img']) : trim($_GET['item_img']);
			$item_quality = intval($_POST['item_quality']);
			$item_type = intval($_POST['item_type_use']);
			$item_power = intval($_POST['item_power']);
			$item_duration = intval($_POST['item_duration']);
			$item_duration_max = intval($_POST['item_duration_max']);
			$item_price = intval($_POST['item_price']);
			$item_add_power = intval($_POST['item_add_power']);
			$item_mp_use = intval($_POST['item_mp_use']);
			$item_element = intval($_POST['element_weap_list']);
			$item_element_str = intval($_POST['item_element_str']);
			$item_element_same = intval($_POST['item_element_same']);
			$item_element_weak = intval($_POST['item_element_weak']);	
			$item_weight = intval($_POST['item_weight']);
			$item_store = intval($_POST['store_cat_list']);
			$item_auth = intval($_POST['item_auth']);
			$item_max_skill = intval($_POST['item_max_skill']);
			$item_sell_back_percent = intval($_POST['item_sell_back_percent']);
			$item_steal_dc = intval($_POST['steal_dc']);
			$restrict_level = intval($_POST['restrict_level']);
			$restrict_str = intval($_POST['restrict_str']);
			$restrict_dex = intval($_POST['restrict_dex']);
			$restrict_con = intval($_POST['restrict_con']);
			$restrict_int = intval($_POST['restrict_int']);
			$restrict_wis = intval($_POST['restrict_wis']);
			$restrict_cha = intval($_POST['restrict_cha']);
			$class_enable = intval($_POST['class_enable']);
			$class = (isset($_POST['class_type_list'])) ? $_POST['class_type_list'] : array();
			$alignment_enable = intval($_POST['alignment_enable']);
			$alignment = (isset($_POST['align_type_list'])) ? $_POST['align_type_list'] : array();
			$race_enable = intval($_POST['race_enable']);
			$race = (isset($_POST['race_type_list'])) ? $_POST['race_type_list'] : array();
			$element_enable = intval($_POST['element_enable']);
			$element = (isset($_POST['element_type_list'])) ? $_POST['element_type_list'] : array();

	         ##=== START: Prevent 0% element effects
	         if($item_element == '0'){
	            $item_element_str = intval(100);
	            $item_element_same = intval(100);
	            $item_element_weak = intval(100);
	         }
	         ##=== END: Prevent 0% element effects

			if ($item_name == '' || !$item_power || !$item_duration )
			{
				message_die(MESSAGE, $lang['Fields_empty']);
			}

			// START RESTRICTION CHECKS
			// Make new restriction arrays
			$newalignlist = adr_admin_make_array($alignment_enable, $alignment);
			$newclasslist = adr_admin_make_array($class_enable, $class);
			$newracelist = adr_admin_make_array($race_enable, $race);
			$newelementlist = adr_admin_make_array($element_enable, $element);

			// Make sure admin chose one or more options if enabled
			if(($alignment_enable == '1') && (count($alignment) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_alignment_error']);
			if(($class_enable == '1') && (count($class) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_class_error']);
			if(($race_enable == '1') && (count($race) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_race_error']);
			if(($element_enable == '1') && (count($element) < '1')) message_die(MESSAGE, $lang['Adr_admin_store_element_error']);
			// END RESTRICTION CHECKS

			if ($item_price == '' )
			{
				// If no price is defined , let's calculate the real item price

				$adr_general = adr_get_general_config();

				// Get the base and modifier price
				$adr_quality_price = adr_get_item_quality( $item_quality , price );
				$adr_type_price = adr_get_item_type( $item_type , price );

				// First define the base price
				$item_price = $adr_type_price;

				// Then apply the quality modifier
				$item_price = $item_price * ( ( $adr_quality_price / 100 ));

				// And now the power - it's a little more complicated
				$item_price = ( $item_power > 1 ) ? ( $item_price + ( $item_price * ( ( $item_power - 1 ) * ( $adr_general['item_modifier_power'] - 100 ) / 100 ))) : $item_price ;

				// Apply the duration penalty
				$item_price = abs($item_price / ($item_duration_max / $item_duration));

				// Finally let's use a non decimal value & add 10 %
				$item_price = ceil($item_price * 1.1);
			}

			$sql = "INSERT INTO " . ADR_SHOPS_ITEMS_TABLE . " 
				( item_id , item_owner_id , item_type_use , item_name , item_desc , item_icon , item_price , item_quality , item_duration , item_duration_max , item_power , item_add_power , item_mp_use , item_weight , item_auth , item_max_skill, item_sell_back_percentage, item_steal_dc, item_restrict_align_enable, item_restrict_align, item_restrict_class_enable, item_restrict_class, item_restrict_race_enable, item_restrict_race, item_restrict_element_enable, item_restrict_element, item_restrict_level, item_restrict_str, item_restrict_dex, item_restrict_con, item_restrict_int, item_restrict_wis, item_restrict_cha , item_store_id , item_element , item_element_str_dmg , item_element_same_dmg , item_element_weak_dmg )
				VALUES ( $item_id , 1 , $item_type , '" . str_replace("\'", "''", $item_name) . "', '" . str_replace("\'", "''", $item_desc) . "' , '" . str_replace("\'", "''", $item_icon) . "' , $item_price , $item_quality , $item_duration , $item_duration_max ,$item_power , $item_add_power , $item_mp_use , $item_weight , $item_auth , $item_max_skill, $item_sell_back_percent, $item_steal_dc, $alignment_enable, '$newalignlist', $class_enable, '$newclasslist', $race_enable, '$newracelist', $element_enable, '$newelementlist', $restrict_level, $restrict_str, $restrict_dex, $restrict_con, $restrict_int, $restrict_wis, $restrict_cha , $item_store , $item_element , $item_element_str , $item_element_same , $item_element_weak )";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't insert new item", "", __LINE__, __FILE__, $sql);
			}

			adr_previous( Adr_shops_items_successful_added , admin_adr_forums_shop , '' );

		break;

	}
}
else
{
	adr_template_file('admin/config_adr_shops_items_list_body.tpl');

	$start = ( isset($_GET['start']) ) ? intval($_GET['start']) : 0;

	if ( isset($_GET['mode2']) || isset($_POST['mode2']) )
	{
		$mode2 = ( isset($_POST['mode2']) ) ? htmlspecialchars($_POST['mode2']) : htmlspecialchars($_GET['mode2']);
	}
	else
	{
		$mode2 = 'itemname';
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

	if ( isset($_GET['cat']) || isset($_POST['cat']) )
	{
		$cat = ( isset($_POST['cat']) ) ? htmlspecialchars($_POST['cat']) : htmlspecialchars($_GET['cat']);
	}
	else
	{
		$cat = 0;
	}
	$cat_sql = ( $cat ) ? 'AND i.item_type_use = '.$cat : '';

	$select_category = adr_get_item_type($items['item_type_use'],'list'); 
	$select_category = str_replace('<select name="item_type_use">', '<select name="cat"><option value="0" selected="selected">All</option>', $select_category); 
	$select_category = str_replace('<option value = "' . $cat . '" >', '<option value="' . $cat . '" selected="selected">', $select_category);

	$mode_types_text = array( $lang['Adr_shops_categories_item_name'] , $lang['Adr_items_price'] , $lang['Adr_items_type_use'] , $lang['Adr_items_quality'] , $lang['Adr_items_power'] );
	$mode_types = array( 'name', 'price' , 'type' , 'quality' , 'power' );

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
		case 'name':
			$order_by = "i.item_name $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'price':
			$order_by = "i.item_price $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'type':
			$order_by = "i.item_type_use $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'quality':
			$order_by = "i.item_quality $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'power':
			$order_by = "i.item_power $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		default:
			$order_by = "i.item_name $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
	}

	$sql = "SELECT i.* , q.item_quality_lang , t.item_type_lang FROM " . ADR_SHOPS_ITEMS_TABLE . " i
			LEFT JOIN " . ADR_SHOPS_ITEMS_QUALITY_TABLE . " q ON ( i.item_quality = q.item_quality_id )
			LEFT JOIN " . ADR_SHOPS_ITEMS_TYPE_TABLE . " t ON ( i.item_type_use = t.item_type_id )
		WHERE i.item_owner_id = 1
		$cat_sql
		ORDER BY $order_by";
	$result = $db->sql_query($sql);
	if( !$result )
	{
		message_die(GENERAL_ERROR, 'Could not obtain items information', "", __LINE__, __FILE__, $sql);
	}
	$items = $db->sql_fetchrowset($result);

	$s_hidden_fields = '<input type="hidden" name="mode" value="add_item" /><input type="hidden" name="item_type" value="' . $category_id . '" />';

	for($k = 0; $k < count($items); $k++)
	{
		$row_class = ( !($k % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

		$template->assign_block_vars("items", array(
			"ROW_CLASS" => $row_class,
			"ITEM_NAME" => adr_get_lang($items[$k]['item_name']),
			"ITEM_DESC" => adr_get_lang($items[$k]['item_desc']),
			"ITEM_IMG" => $items[$k]['item_icon'],
			"ITEM_TYPE" => $lang[$items[$k]['item_type_lang']],
			"ITEM_QUALITY" => $lang[$items[$k]['item_quality_lang']],
			"ITEM_DURATION" => number_format($items[$k]['item_duration']),
			"ITEM_MAX_DURATION" => number_format($items[$k]['item_duration_max']),
			"ITEM_POWER" => ($items[$k]['item_power'] + $items[$k]['item_add_power']),
			"ITEM_MP_USE" => $items[$k]['item_mp_use'],
			"ITEM_WEIGHT" => number_format($items[$k]['item_weight']),
			"ITEM_PRICE" => number_format($items[$k]['item_price']),
			"ITEM_SELL_BACK" => $items[$k]['item_sell_back_percentage'],
			"ITEM_STR" =>  $items[$k]['item_restrict_str'],
			"ITEM_DEX" =>  $items[$k]['item_restrict_dex'],
			"ITEM_CON" =>  $items[$k]['item_restrict_con'],
			"ITEM_INT" =>  $items[$k]['item_restrict_int'],
			"ITEM_WIS" =>  $items[$k]['item_restrict_wis'],
			"ITEM_CHA" =>  $items[$k]['item_restrict_cha'],
			"ITEM_LVL" =>  $items[$k]['item_restrict_level'],
			"U_ITEM_EDIT" => append_sid("admin_adr_forums_shop.$phpEx?mode=edit_item&amp;item_id=" . $items[$k]['item_id'] . "&amp;edit_type=edit_item"),
			"U_ITEM_COPY" => append_sid("admin_adr_forums_shop.$phpEx?mode=edit_item&amp;item_id=" . $items[$k]['item_id'] . "&amp;edit_type=copy_item"),
			"U_ITEM_DELETE" => append_sid("admin_adr_forums_shop.$phpEx?mode=delete_item&amp;item_id=" . $items[$k]['item_id']),
		));

		##=== START: Show restrictions
		$align_array = explode(",", $items[$k]['item_restrict_align']);
		if($items[$k]['item_restrict_align_enable'] == '1')
		{
			$align_count = count($align_array);
			$align_list = '';

			for($a = 0; $a < $align_count; $a++)
			{
				// Cached sql query
				$align_info = adr_get_alignment_infos($align_array[$a]);

				$align_list .= adr_get_lang($align_info['alignment_name']);
				if($a < ($align_count - 2)){
					$align_list .= ", ";
				}
			}

			$template->assign_block_vars('items.align_restrict', array(
				"ALIGN_LIST" => '<b>'.$lang['Adr_character_alignment'].'</b>: '.$align_list
			));
		}

		$class_array = explode(",", $items[$k]['item_restrict_class']);
		if($items[$k]['item_restrict_class_enable'] == '1')
		{
			$class_count = count($class_array);
			$class_list = '';

			for($c = 0; $c < $class_count; $c++)
			{
				// Cached sql query
				$class_info = adr_get_class_infos($class_array[$c]);

				$class_list .= adr_get_lang($class_info['class_name']);
				if($c < ($class_count - 2)){
					$class_list .= ", ";
				}
			}

			$template->assign_block_vars('items.class_restrict', array(
				"CLASS_LIST" => '<b>'.$lang['Adr_character_class'].'</b>: '.$class_list
			));
		}

		$element_array = explode(",", $items[$k]['item_restrict_element']);
		if($items[$k]['item_restrict_element_enable'] == '1')
		{
			$element_count = count($element_array);
			$element_list = '';

			for($e = 0; $e < $element_count; $e++)
			{
				// Cached sql query
				$element_info = adr_get_element_infos($element_array[$e]);

				$element_list .= adr_get_lang($element_info['element_name']);
				if($e < ($element_count - 2)){
					$element_list .= ", ";
				}
			}

			$template->assign_block_vars('items.element_restrict', array(
				"ELEMENT_LIST" => '<b>'.$lang['Adr_character_element'].'</b>: '.$element_list
			));
		}

		$race_array = explode(",", $items[$k]['item_restrict_race']);
		if($items[$k]['item_restrict_race_enable'] == '1')
		{
			$race_count = count($race_array);
			$race_list = '';

    		for($r = 0; $r < $race_count; $r++)
			{
				// Cached sql query
				$race_info = adr_get_race_infos($race_array[$r]);

				$race_list .= adr_get_lang($race_info['race_name']);
				if($r < ($race_count - 2)){
					$race_list .= ", ";
				}
			}

			$template->assign_block_vars('items.race_restrict', array(
				"RACE_LIST" => '<b>'.$lang['Adr_character_race'].'</b>: '.$race_list
			));
		}
		##=== END: Show restrictions
	}

	$sql = "SELECT count(*) AS total FROM " . ADR_SHOPS_ITEMS_TABLE ." 
		WHERE item_owner_id = 1 ";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Error getting total users', '', __LINE__, __FILE__, $sql);
	}
	if ( $total = $db->sql_fetchrow($result) )
	{
		$total_items = $total['total'];
		$pagination = generate_pagination("admin_adr_forums_shop.$phpEx?mode2=$mode2&amp;order=$sort_order&amp;cat=$cat", $total_items, $board_config['topics_per_page'], $start). '&nbsp;';	
	}

	$template->assign_vars(array(
		"L_ITEM_NAME" => $lang['Adr_shops_categories_item_name'],
		"L_ITEM_DESC" => $lang['Adr_shops_categories_item_desc'],
		"L_ITEM_TITLE" => $lang['Adr_shops_item_title'],
		"L_ITEM_TEXT" => $lang['Adr_shops_item_title_explain'],
		"L_ITEM_TYPE" => $lang['Adr_items_type_use'],
		"L_ADD_ITEM" => $lang['Adr_shops_item_add'],
		"L_ITEM_QUALITY" => $lang['Adr_items_quality'],
		"L_ITEM_POWER" => $lang['Adr_items_power'],
		"L_ITEM_WEIGHT" => $lang['Adr_shops_item_weight'],
		"L_ITEM_DURATION" => $lang['Adr_items_duration'],
		"L_ITEM_AUTH" => $lang['Adr_store_auth'],
		"L_ITEM_SELL_BACK" => $lang['Adr_item_sell_back_title'],
		"L_ACTION" => $lang['Action'],
		"L_ITEMS" => $lang['Adr_shops_categories_items'],
		"L_COPY" => $lang['Adr_items_copy'],
		"L_LVL" => $lang['Adr_char_lvl'],
		"L_DEX" => $lang['Adr_char_dex'],
		"L_INT" => $lang['Adr_char_int'],
		"L_WIS" => $lang['Adr_char_wis'],
		"L_STR" => $lang['Adr_char_str'],
		"L_CHA" => $lang['Adr_char_cha'],
		"L_CON" => $lang['Adr_char_con'],
		"L_DELETE" => $lang['Delete'],
		"L_ITEM_IMG" => $lang['Adr_races_image'],
		"L_ITEM_PRICE" => $lang['Adr_items_price'],
		'L_SELECT_SORT_METHOD' => $lang['Select_sort_method'],
		'L_ORDER' => $lang['Order'],
		'L_SORT' => $lang['Sort'],
		'L_SUBMIT' => $lang['Sort'],
		'S_MODE_SELECT' => $select_sort_mode,
		'S_ORDER_SELECT' => $select_sort_order,
		'SELECT_CAT' => $select_category,
		'L_SELECT_CAT' => $lang['Adr_items_select'],
		'PAGINATION' => $pagination,
		'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $total_items / $board_config['topics_per_page'] )), 
		'L_GOTO_PAGE' => $lang['Goto_page'],
		"L_GIVE" => $lang['Adr_items_give'],
		"L_SELL" => $lang['Adr_items_sell'],
		"L_EDIT" => $lang['Adr_items_edit'],
		"L_SHOP" => $lang['Adr_items_into_shop'],
		"S_SHOPS_ACTION" => append_sid("admin_adr_forums_shop.$phpEx?mode2=$mode2&amp;order=$sort_order"),
		"S_HIDDEN_FIELDS" => $s_hidden_fields, 
	));

	$template->pparse("body");
}

include('./page_footer_admin.'.$phpEx);

?>
