<?php
/***************************************************************************
 *                                 adr_functions_battle_setup.php
 *                            -------------------
 *	Begun                : 22/10/2004
 *	Copyright            : Seteo-Bloke
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
 ***************************************************************************/

if(!defined('IN_PHPBB')){
	die("Hacking attempt");}

function adr_battle_equip_screen($user_id)
{
	global $db, $lang, $adr_general, $template, $phpEx;

	$user_id = intval($user_id);
	$char = adr_get_user_infos($user_id);

	### START restriction checks ###
	$item_sql = adr_make_restrict_sql($char);
	### END restriction checks ###

	if($char['character_hp'] < '1'){
		$message = $lang['Adr_battle_character_dead'];
		$message .= '<br /><br />'.sprintf($lang['Adr_battle_temple'], "<a href=\"" . 'adr_temple.'.$phpEx . "\">", "</a>");
		$message .= '<br /><br />'.sprintf($lang['Adr_character_return'], "<a href=\"" . 'adr_character.'.$phpEx . "\">", "</a>");
		message_die(GENERAL_MESSAGE, $message);
	}

	// No battle in progress , display the equipment page
	adr_template_file('adr_battle_equip_body.tpl');

	// First select the available items
	$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
		WHERE item_in_shop = '0'
		AND item_duration > '0'
		AND item_in_warehouse = '0'
		$item_sql
		AND item_owner_id = '$user_id'";
	if( !($result = $db->sql_query($sql))){
		message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
	$items = $db->sql_fetchrowset($result);

	// Prepare the items list
	$armor_list = '<select name="item_armor">';
	$armor_list .= '<option value = "0" >' . $lang['Adr_battle_no_armor'] . '</option>';
	$buckler_list = '<select name="item_buckler">';
	$buckler_list .= '<option value = "0" >' . $lang['Adr_battle_no_buckler'] . '</option>';
	$helm_list = '<select name="item_helm">';
	$helm_list .= '<option value = "0" >' . $lang['Adr_battle_no_helm'] . '</option>';
	$gloves_list = '<select name="item_gloves">';
	$gloves_list .= '<option value = "0" >' . $lang['Adr_battle_no_gloves'] . '</option>';
	$amulet_list = '<select name="item_amulet">';
	$amulet_list .= '<option value = "0" >' . $lang['Adr_battle_no_amulet'] . '</option>';
	$ring_list = '<select name="item_ring">';
	$ring_list .= '<option value = "0" >' . $lang['Adr_battle_no_ring'] . '</option>';
	$equip_armor = $char['equip_armor'];
	$equip_buckler = $char['equip_buckler'];
	$equip_helm = $char['equip_helm'];
	$equip_gloves = $char['equip_gloves'];
	$equip_amulet = $char['equip_amulet'];
	$equip_ring = $char['equip_ring'];

	for($i = 0; $i < count($items); $i++)
	{
		$item_power = ($items[$i]['item_power'] + $items[$i]['item_add_power']);

		if($items[$i]['item_type_use'] == '7'){
			$armor_selected = ( $equip_armor == $items[$i]['item_id'] ) ? 'selected' : '';
			$armor_list .= '<option value = "'.$items[$i]['item_id'].'" '.$armor_selected.' >' . adr_get_lang($items[$i]['item_name']) . ' ( ' . $lang['Adr_items_power'] . ' : ' . $item_power . ' - ' . $lang['Adr_items_duration'] . ' : ' . $items[$i]['item_duration'] . ' )'.'</option>';
		}
		if($items[$i]['item_type_use'] == '8'){
			$buckler_selected = ( $equip_buckler == $items[$i]['item_id'] ) ? 'selected' : '';
			$buckler_list .= '<option value = "'.$items[$i]['item_id'].'" '.$buckler_selected.'>' . adr_get_lang($items[$i]['item_name']) . ' ( ' . $lang['Adr_items_power'] . ' : ' . $item_power . ' - ' . $lang['Adr_items_duration'] . ' : ' . $items[$i]['item_duration'] . ' )'.'</option>';
		}
		if($items[$i]['item_type_use'] == '9'){
			$helm_selected = ( $equip_helm == $items[$i]['item_id'] ) ? 'selected' : '';
			$helm_list .= '<option value = "'.$items[$i]['item_id'].'" '.$helm_selected.'>' . adr_get_lang($items[$i]['item_name']) . ' ( ' . $lang['Adr_items_power'] . ' : ' . $item_power . ' - ' . $lang['Adr_items_duration'] . ' : ' . $items[$i]['item_duration'] . ' )'.'</option>';
		}
		if($items[$i]['item_type_use'] == '10'){
			$gloves_selected = ( $equip_gloves == $items[$i]['item_id'] ) ? 'selected' : '';
			$gloves_list .= '<option value = "'.$items[$i]['item_id'].'" '.$gloves_selected.'>' . adr_get_lang($items[$i]['item_name']) . ' ( ' . $lang['Adr_items_power'] . ' : ' . $item_power . ' - ' . $lang['Adr_items_duration'] . ' : ' . $items[$i]['item_duration'] . ' )'.'</option>';
		}
		if($items[$i]['item_type_use'] == '13'){
			$amulet_selected = ( $equip_amulet == $items[$i]['item_id'] ) ? 'selected' : '';
			$amulet_list .= '<option value = "'.$items[$i]['item_id'].'" '.$amulet_selected.'>' . adr_get_lang($items[$i]['item_name']) . ' ( ' . $lang['Adr_items_power'] . ' : ' . $item_power . ' - ' . $lang['Adr_items_duration'] . ' : ' . $items[$i]['item_duration'] . ' )'.'</option>';
		}
		if($items[$i]['item_type_use'] == '14'){
			$ring_selected = ( $equip_ring == $items[$i]['item_id'] ) ? 'selected' : '';
			$ring_list .= '<option value = "'.$items[$i]['item_id'].'" '.$ring_selected.'>' . adr_get_lang($items[$i]['item_name']) . ' ( ' . $lang['Adr_items_power'] . ' : ' . $item_power . ' - ' . $lang['Adr_items_duration'] . ' : ' . $items[$i]['item_duration'] . ' )'.'</option>';
		}
	}

	$armor_list .= '</select>';
	$buckler_list .= '</select>';
	$helm_list .= '</select>';
	$gloves_list .= '</select>';
	$amulet_list .= '</select>';
	$ring_list .= '</select>';

	$template->assign_vars(array(
		'SELECT_ARMOR'  => $armor_list,
		'SELECT_BUCKLER' => $buckler_list,
		'SELECT_HELM' => $helm_list,
		'SELECT_GLOVES' => $gloves_list,
		'SELECT_AMULET' => $amulet_list,
		'SELECT_RING' => $ring_list,
		'L_EQUIPMENT' => $lang['Adr_battle_equipment'],
		'L_SELECT_ARMOR'  => $lang['Adr_battle_select_armor'],
		'L_SELECT_BUCKLER' => $lang['Adr_battle_select_buckler'],
		'L_SELECT_HELM' => $lang['Adr_battle_select_helm'],
		'L_SELECT_GLOVES' => $lang['Adr_battle_select_gloves'],
		'L_SELECT_AMULET' => $lang['Adr_battle_select_amulet'],
		'L_SELECT_RING' => $lang['Adr_battle_select_ring'],
		'L_FIGHT' => $lang['Adr_battle_fight'],
	));

return;
}

function adr_battle_equip_initialise($user_id, $armor, $buckler, $helm, $gloves, $amulet, $ring)
{
	global $db, $lang, $adr_general, $template, $board_config;

	$user_id = intval($user_id);
	$armor = intval($armor);
	$buckler = intval($buckler);
	$helm = intval($helm);
	$gloves = intval($gloves);
	$amulet = intval($amulet);
	$ring = intval($ring);

	// Get the user infos
	$char = adr_get_user_infos($user_id);

	### START restriction checks ###
	$item_sql = adr_make_restrict_sql($char);
	### END restriction checks ###

	// Be sure he has a character
	if(!(is_numeric($char['character_id']))){
		adr_previous(Adr_your_character_lack, adr_character, '');}

	// Calculate the base stats
	$hp = 0;
	$mp = 0;
	$level = $char['character_level'];
	$char_element = $char['character_element'];
	$char_mp = $char['character_mp'];

	// Create base attack & defence stats
	$att = adr_battle_make_att($char['character_might'], $char['character_constitution']);
	$ma = adr_battle_make_magic_att($char['character_intelligence']);
	$def = adr_battle_make_def($char['character_ac'], $char['character_dexterity']);
	$md = adr_battle_make_magic_def($char['character_wisdom']);

	if($armor)
	{
		$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_in_shop = '0'
			AND item_owner_id = '$user_id'
			AND item_in_warehouse = '0'
			$item_sql
			AND item_id = '$armor'";
		if(!($result = $db->sql_query($sql))){
			message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
		$item = $db->sql_fetchrow($result);
		$armor_id = $item['item_id'];
		$def = ($def + ($item['item_power'] + $item['item_add_power']));
		adr_use_item($armor, $user_id);
	}

	if($buckler)
	{
		$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_in_shop = '0'
			AND item_owner_id = '$user_id'
			AND item_in_warehouse = '0'
			$item_sql
			AND item_id = '$buckler'";
		if(!($result = $db->sql_query($sql))){
			message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
		$item = $db->sql_fetchrow($result);
		$buckler_id = $item['item_id'];
		$def = ($def + ($item['item_power'] + $item['item_add_power']));
		adr_use_item($buckler, $user_id);
	}

	if($gloves)
	{
		$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_in_shop = '0'
			AND item_owner_id = '$user_id'
			AND item_in_warehouse = '0'
			$item_sql
			AND item_id = '$gloves'";
		if( !($result = $db->sql_query($sql))){
			message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
		$item = $db->sql_fetchrow($result);
		$gloves_id = $item['item_id'];
		$def = ($def + ($item['item_power'] + $item['item_add_power']));
		adr_use_item($gloves, $user_id);
	}

	if($helm)
	{
		$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_in_shop = '0'
			AND item_owner_id = '$user_id'
			AND item_in_warehouse = '0'
			$item_sql
			AND item_id = '$helm'";
		if( !($result = $db->sql_query($sql)) ){
			message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
		$item = $db->sql_fetchrow($result);
		$helm_id = $item['item_id'];
		$def = ($def + ($item['item_power'] + $item['item_add_power']));
		adr_use_item($helm, $user_id);
	}

	// Now we modify mp and hp regeneration with amulets and rings
	if($amulet)
	{
		$sql = " SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_in_shop = '0'
			AND item_owner_id = '$user_id'
			AND item_in_warehouse = '0'
			$item_sql
			AND item_id = '$amulet'";
		if( !($result = $db->sql_query($sql)) ){
			message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
		$item = $db->sql_fetchrow($result);
		$amulet_id = $item['item_id'];
		$hp = ($hp + $item['item_power']);
		adr_use_item($amulet, $user_id);
	}

	if($ring)
	{
		$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_in_shop = '0'
			AND item_owner_id = '$user_id'
			AND item_in_warehouse = '0'
			$item_sql
			AND item_id = '$ring'";
		if(!($result = $db->sql_query($sql))){
			message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);}
		$item = $db->sql_fetchrow($result);
		$ring_id = $item['item_id'];
		$mp = ($mp + $item['item_power']);
		adr_use_item($ring, $user_id);
	}

	##=== START: new monster rand selection code as posted by Sederien ===##
	// Let's care about the opponent now
	$sql = " SELECT * FROM " . ADR_BATTLE_MONSTERS_TABLE . "
		WHERE monster_level <= '$level'
		ORDER BY RAND() LIMIT 1";
	if( !($result = $db->sql_query($sql)) ){
		message_die(GENERAL_ERROR, 'Could not query monsters list', '', __LINE__, __FILE__, $sql);}
	$monsters = $db->sql_fetchrow($result);

	// Be sure monsters of the user level exists
	if(!($monsters))
		adr_previous(Adr_no_monsters, adr_character, '');

	// Get this monster base stats
	$monster_id = $monsters['monster_id'];
	$monster_level = $monsters['monster_level'];
	$monster_base_hp = $monsters['monster_base_hp'];
	$monster_base_att = $monsters['monster_base_att'];
	$monster_base_def = $monsters['monster_base_def'];
	$monster_base_element = $monsters['monster_base_element'];
	$monster_base_mp = $monsters['monster_base_mp'];
	$monster_base_mp_power = $monsters['monster_base_mp_power'];
	$monster_base_ma = $monsters['monster_base_magic_attack'];
	$monster_base_md = $monsters['monster_base_magic_resistance'];
	$monster_base_sp = $monsters['monster_base_sp'];
	##=== END: new monster selection code by Sederien ===##

	// If the user is higher level than the monster , update the monster stats
	if($monster_level < $level){
		if($adr_general['battle_calc_type']){
			// Xanathis's alternative battle modifier calculation for monster battles
			$modifier = (($adr_general['battle_monster_stats_modifier'] -100) /100) *($level - $monster_level) +1;}
		else{
			$modifier = ($adr_general['battle_monster_stats_modifier'] /100) *($level - $monster_level);}

		$monster_base_hp = ceil($monster_base_hp *$modifier);
		$monster_base_att = ceil($monster_base_att *$modifier);
		$monster_base_def = ceil($monster_base_def *$modifier);
		$monster_base_mp = ceil($monster_base_mp *$modifier);
		$monster_base_ma = ceil($monster_base_ma *$modifier);
		$monster_base_md = ceil($monster_base_md *$modifier);
		$monster_base_sp = ceil($monster_base_sp *$modifier);
	}

	##=== START array for equipment id's ##
	$equip_array = intval($helm_id).'-'.intval($armor_id).'-'.intval($gloves_id).'-'.intval($buckler_id).'-'.intval($amulet_id).'-'.intval($ring_id).'-'.intval($hp).'-'.intval($mp);
	##=== END array for equipment id's ##

	##=== START: Initiative Checks
		// 1d20 roll. Highest starts.
		$monster_dex = (10 + (rand(1, $monster_level) *2)); //temp
		$challenger_init_check = (rand(1,20) + adr_modifier_calc($char['character_dexterity']));
		$monster_init_check = (rand(1,20) + adr_modifier_calc($monster_dex));

		// Check who will start ELSE do a rand to determine.
		if($challenger_init_check >= $monster_init_check)
			$turn = 1;
		else $turn = 2;
	##=== END: Initiative Checks

	// Finally insert all theses values into the database
	$sql = "INSERT INTO " . ADR_BATTLE_LIST_TABLE . "
		(battle_type, battle_start, battle_turn,  battle_result, battle_text, battle_challenger_id, battle_challenger_hp, battle_challenger_mp, battle_challenger_att, battle_challenger_def, battle_challenger_element, battle_challenger_magic_attack, battle_challenger_magic_resistance, battle_challenger_equipment_info, battle_opponent_id, battle_opponent_hp, battle_opponent_hp_max, battle_opponent_mp, battle_opponent_mp_max, battle_opponent_mp_power, battle_opponent_att, battle_opponent_def, battle_opponent_element, battle_opponent_magic_attack, battle_opponent_magic_resistance, battle_opponent_sp)
		VALUES(1, ".time().", $turn, 0, '', $user_id, $hp, $mp, $att, $def, $char_element, $ma, $md, '$equip_array', $monster_id, $monster_base_hp, $monster_base_hp, $monster_base_mp, $monster_base_mp, $monster_base_mp_power, $monster_base_att, $monster_base_def, $monster_base_element, $monster_base_ma, $monster_base_md, $monster_base_sp)";
	$result = $db->sql_query($sql);
	if(!$result){
		message_die(GENERAL_ERROR, "Couldn't insert new battle", "", __LINE__, __FILE__, $sql);}

return;
}

?>
