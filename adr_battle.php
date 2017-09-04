<?php 
/***************************************************************************
 *					adr_battle.php
 *				------------------------
 *	begin 			: 08/02/2004
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
$phpbb_root_path = './'; 
include($phpbb_root_path . 'extension.inc'); 
include($phpbb_root_path . 'common.'.$phpEx);

$loc = 'town';
$sub_loc = 'adr_battle';

//
// Start session management
$userdata = session_pagestart($user_ip, PAGE_ADR); 
init_userprefs($userdata); 
// End session management
//
$user_id = $userdata['user_id'];
$user_points = $userdata['user_points'];
include($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx);

// Sorry , only logged users ...
if ( !$userdata['session_logged_in'] )
{
	$redirect = "adr_battle.$phpEx";
	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

// Get the general config
$adr_general = adr_get_general_config();

adr_enable_check();
adr_ban_check($user_id);
adr_character_created_check($user_id);
adr_levelup_check($user_id);
adr_weight_check($user_id);

if ( !$adr_general['battle_enable'] ) 
{	
	adr_previous ( Adr_battle_disabled , adr_character , '' );
}

// Deny access if user is imprisioned
if($userdata['user_cell_time']){
	adr_previous(Adr_shops_no_thief, adr_cell, '');}

// Includes the tpl and the header
adr_template_file('adr_battle_body.tpl');
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$equip = isset($_POST['equip']);
$attack = isset($_POST['attack']);
$spell = isset($_POST['spell']);
$potion = isset($_POST['potion']);
$defend = isset($_POST['defend']);
$flee = isset($_POST['flee']);

// Select if the user has a battle in progress or no
$sql = " SELECT * FROM  " . ADR_BATTLE_LIST_TABLE . " 
	WHERE battle_challenger_id = $user_id
	AND battle_result = 0
	AND battle_type = 1 ";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
}
$bat = $db->sql_fetchrow($result);

if ( !(is_numeric($bat['battle_id'])) && !$equip )
{
	// Moved the equip screen infos into adr_funtions_battle_setup.php
	include_once($phpbb_root_path . '/adr/includes/adr_functions_battle_setup.'.$phpEx);
    adr_battle_equip_screen($user_id);
}
else if ( !(is_numeric($bat['battle_id'])) && $equip )
{
	// Check quota
	if($adr_general['Adr_character_limit_enable'] == '1') adr_battle_quota_check($user_id);

	// Let's calculate all the statistics now

	// Fix the items ids
	$armor = intval($_POST['item_armor']);
	$buckler = intval($_POST['item_buckler']);
	$helm = intval($_POST['item_helm']);
	$gloves = intval($_POST['item_gloves']);
	$amulet = intval($_POST['item_amulet']);
	$ring = intval($_POST['item_ring']);

	// Battle start infos gone into adr_functions_battle_setup.php
	include_once($phpbb_root_path . '/adr/includes/adr_functions_battle_setup.'.$phpEx);
	adr_battle_equip_initialise($user_id, $armor, $buckler, $helm, $gloves, $amulet, $ring);
}

// Select again if the user has a battle in progress or no
$sql = " SELECT * FROM  " . ADR_BATTLE_LIST_TABLE . " 
	WHERE battle_challenger_id = $user_id
	AND battle_result = 0
	AND battle_type = 1 ";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
}
$bat = $db->sql_fetchrow($result);

// Get the monster infos
$monster = adr_get_monster_infos($bat['battle_opponent_id']);

// Get character infos
$challenger = adr_get_user_infos($user_id);

$user_ma = $bat['battle_challenger_magic_attack'];
$user_md = $bat['battle_challenger_magic_resistance'];
$monster_ma = $bat['battle_opponent_magic_attack'];
$monster_md = $bat['battle_opponent_magic_resistance'];
$challenger_element = $challenger['character_element'];
$opponent_element = $monster['monster_base_element'];
$battle_round = $bat['battle_round'];

### START armour info arrays ###
// array info: 0=helm, 1=armour, 2=gloves, 3=buckler, 4=amulet, 5=ring, 6=hp_regen, 7=mp_regen
$armour_info = explode('-', $bat['battle_challenger_equipment_info']);
$helm_equip = ($armour_info[0] != '') ? $armour_info[0] : intval(0);
$armour_equip = ($armour_info[1] != '') ? $armour_info[1] : intval(0);
$gloves_equip = ($armour_info[2] != '') ? $armour_info[2] : intval(0);
$buckler_equip = ($armour_info[3] != '') ? $armour_info[3] : intval(0);
$amulet_equip = ($armour_info[4] != '') ? $armour_info[4] : intval(0);
$ring_equip = ($armour_info[5] != '') ? $armour_info[5] : intval(0);
### END armour info arrays ###

### START restriction checks ###
$item_sql = adr_make_restrict_sql($challenger);
### END restriction checks ###

if (( is_numeric($bat['battle_id']) && $bat['battle_type'] == 1) && (($attack) || ($spell) || ($potion) || ($defend) || ($flee) || ($equip)) )
{
	// Prefix challenger battle message
	$battle_message .= '<font color="blue">['.$challenger['character_name'].$lang['Adr_battle_msg_check'].']: </font>';
	if(($bat['battle_round'] == '0') && ($bat['battle_turn'] == '2')){
		$battle_message .= $monster['monster_name'].' '.$lang['Adr_battle_msg_monster_start'].'<br>';}

	if(($flee) && ($bat['battle_turn'] == '1'))
	{
		$dice = rand(1,20);
		$monster_dice = rand(1,20);

		// To flee you must roll higher than opponent or roll straight 20. 1= auto fail
		if((($dice > $monster_dice) && ($dice != '1')) || ($dice == '20') )
		{
			// Update the database
			$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
				SET battle_result = 3,
					battle_finish = ".time()."
				WHERE battle_challenger_id = '$user_id'
				AND battle_result = '0'
				AND battle_type = '1'";
			if(!($result = $db->sql_query($sql)))
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);

			$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
				SET character_flees = (character_flees + 1)
				WHERE character_id = '$user_id'";
			if(!($result = $db->sql_query($sql)))
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);

			// Delete stolen items from users inventory
			$sql = " DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_monster_thief = '1'
				AND item_owner_id = '$user_id'";
			if(!($result = $db->sql_query($sql)))
				message_die(GENERAL_ERROR, 'Could not delete stolen items', '', __LINE__, __FILE__, $sql);

			// Delete broken items from users inventory
			$sql = " DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_duration < '1'
				AND item_in_warehouse = '0'
				AND item_owner_id = '$user_id'";
			if(!($result = $db->sql_query($sql)))
				message_die(GENERAL_ERROR, 'Could not delete broken items', '', __LINE__, __FILE__, $sql);

			$message = sprintf($lang['Adr_battle_flee'], $challenger['character_name']);
			$message .= '<br /><br />'.sprintf($lang['Adr_battle_return'], "<a href=\"" . 'adr_battle.'.$phpEx . "\">", "</a>");
			$message .= '<br /><br />'.sprintf($lang['Adr_character_return'], "<a href=\"" . 'adr_character.'.$phpEx . "\">", "</a>");
			message_die(GENERAL_MESSAGE, $message);
		}
		else{
			// If flee attempt fails
			// Create failure message
			$battle_message .= sprintf($lang['Adr_battle_flee_fail'], $challenger['character_name']).'<br>';

			// Update the database
			$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
				SET battle_turn = 2,
					battle_round = (battle_round + 1)
				WHERE battle_challenger_id = '$user_id'
				AND battle_result = '0'
				AND battle_type = '1'";
			if(!($result = $db->sql_query($sql)))
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
		}
	}
	else if ( $spell && $bat['battle_turn'] == 1 )
	{
		// Define the weapon quality and power
		$item_spell = intval($_POST['item_spell']);
		$power = 0;
		$damage = 0;

		if ( $item_spell )
		{
			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_in_shop = 0 
				AND item_in_warehouse = 0
				AND item_owner_id = $user_id 
				AND item_duration > 0
				$item_sql
				AND item_id = $item_spell ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
			}
			$item = $db->sql_fetchrow($result);

			if ( $challenger['character_mp'] < ($item['item_mp_use'] + $item['item_power']) || $challenger['character_mp'] < 0 ) 
			{	
				adr_previous ( Adr_battle_check , 'adr_battle' , '' );
			}

			$power = ($item['item_power'] + $item['item_add_power']);
			$item['item_name'] = adr_get_lang($item['item_name']);
			$mp_usage = $item['item_power'] + $item['item_mp_use'];
			if ( $mp_usage == '' )
			{
      				adr_previous ( Adr_battle_check , 'adr_battle' , '' );				
			}

			adr_use_item($item_spell , $user_id);
			
			// Substract the magic points
			$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
				SET character_mp = character_mp - $mp_usage
				WHERE character_id = $user_id ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
			}
		}

		if ( $item['item_type_use'] == 11 )
		{
/*
			$dice = rand(1,20);
			$diff = (($user_ma + $dice + $challenger['character_level']) >= ($monster_md + $item['item_power'])) ? TRUE : FALSE;
			$power = ($power + adr_modifier_calc($challenger['character_intelligence']));
*/

			// Sort out magic check & opponents saving throw
			$dice = rand(1,20);
			$monster['monster_wisdom'] = (10 + (rand(1, $monster['monster_level']) *2)); //temp calc
			$magic_check = ceil($dice + $item['item_power'] + adr_modifier_calc($challenger['character_intelligence']));
			$fort_save = (11 + adr_modifier_calc($monster['monster_wisdom']));
			$diff = ((($magic_check >= $fort_save) && ($dice != '1')) || ($dice == '20')) ? TRUE : FALSE;
			$power = ($power + adr_modifier_calc($challenger['character_intelligence']));

			// Grab details for Elemental infos
			$elemental = adr_get_element_infos($opponent_element);
			$element_name = adr_get_element_infos($item['item_element']);

			// Here we apply text colour if set
			if($element_name['element_colour'] != ''){
				$item['item_name'] = '<font color="'.$element_name['element_colour'].'">'.adr_get_lang($item['item_name']).'</font>';}
			else{
				$item['item_name'] = adr_get_lang($item['item_name']);}

			if((($diff === TRUE) && ($dice != '1')) || ($dice == '20')){
				$damage = 1;

				// Work out attack type
				if(($item['item_element']) && ($item['item_element'] === $elemental['element_oppose_strong']) && ($item['item_duration'] > '1') && (!empty($item['item_name']))){
					$damage = ceil(($power *($item['item_element_weak_dmg'] /100)));
				}
				elseif(($item['item_element']) && (!empty($item['item_name'])) && ($item['item_element'] === $opponent_element) && ($item['item_duration'] > '1')){
					$damage = ceil(($power *($item['item_element_same_dmg'] /100)));
				}
				elseif(($item['item_element']) && (!empty($item['item_name'])) && ($item['item_element'] === $elemental['element_oppose_weak']) && ($item['item_duration'] > '1')){
					$damage = ceil(($power *($item['item_element_str_dmg'] /100)));
				}
				else{
					$damage = ceil($power);
				}

				// Fix dmg value
				$damage = ($damage < '1') ? rand(1,3) : $damage;
				$damage = ($damage > $bat['battle_opponent_hp']) ? $bat['battle_opponent_hp'] : $damage;

				// Fix attack msg type
				if(($item['item_element'] > '0') && ($element_name['element_name'] != '')){
					$battle_message .= sprintf($lang['Adr_battle_spell_success'], $challenger['character_name'], $item['item_name'], adr_get_lang($element_name['element_name']), $damage, $monster['monster_name']).'<br>';}
				else{
					$battle_message .= sprintf($lang['Adr_battle_spell_success_norm'], $challenger['character_name'], $item['item_name'], $damage, $monster['monster_name']).'<br>';}
			}
			else{
				$damage = 0;
				$battle_message .= sprintf( $lang['Adr_battle_spell_failure'], $challenger['character_name'], $item['item_name'], $monster['monster_name']).'<br />';
			}

			if ( $item['item_duration'] < 2 )
			{
				$battle_message .= '</span><span class="gensmall">'; // set new span class
				$battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_spell_dura'], $challenger['character_name'], $item['item_name']).'<br>';
				$battle_message .= '</span><span class="genmed">'; // reset span class to default
			}

			// Update the database
			$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
				SET battle_opponent_hp = battle_opponent_hp - $damage ,
					battle_challenger_dmg = $damage , 
					battle_turn = 2,
					battle_round = (battle_round + 1)
				WHERE battle_challenger_id = $user_id
				AND battle_result = 0
				AND battle_type = 1 ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
			}
		}	
		else if ( $item['item_type_use'] == 12 )
		{
			// Create battle message
			$battle_message .= sprintf($lang['Adr_battle_spell_defensive_success'], $challenger['character_name'], $item['item_name'], $power).'<br>';
			if($item['item_duration'] < '2'){
				$battle_message .= '</span><span class="gensmall">'; // set new span class
				$battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_spell_def_dura'], $challenger['character_name'], $item['item_name']).'<br>';
				$battle_message .= '</span><span class="genmed">'; // reset span class to default
			}

			// Update the database
			$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
				SET battle_challenger_att = battle_challenger_att + $power ,
					battle_challenger_def = battle_challenger_def + $power ,
					battle_turn = 2,
					battle_round = (battle_round + 1)
				WHERE battle_challenger_id = $user_id
				AND battle_result = 0
				AND battle_type = 1 ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
			}
		}
	}
	else if ( $potion && $bat['battle_turn'] == 1 )
	{
		// Define the weapon quality and power
		$item_potion = intval($_POST['item_potion']);
		$power = 1;

		if ( $item_potion )
		{
			$sql = " SELECT item_name , item_duration , item_power , item_type_use , item_add_power FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_in_shop = 0 
				AND item_in_warehouse = 0
				AND item_duration > 0
				$item_sql
				AND item_owner_id = $user_id 
				AND item_id = $item_potion ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
			}
			$item = $db->sql_fetchrow($result);

			if ( $challenger['character_mp'] < 0 ) 
			{	
				adr_previous ( Adr_battle_check , 'adr_battle' , '' );
			}

			$power = ($item['item_power'] + $item['item_add_power']);
		}

		if ( $item['item_type_use'] == 15 )
		{
			if(($item['item_duration'] > '0') && ($challenger['character_hp'] < $challenger['character_hp_max'])){
				$power = ($power < '1') ? rand(1,3) : $power;
				$power = (($power + $challenger['character_hp']) > $challenger['character_hp_max']) ? ($challenger['character_hp_max'] - $challenger['character_hp']) : $power;
				$battle_message .= sprintf($lang['Adr_battle_potion_hp_success'], $challenger['character_name'], adr_get_lang($item['item_name']), $power).'<br>';

				$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
					SET character_hp = (character_hp + $power)
					WHERE character_id = '$user_id'";
				if(!($result = $db->sql_query($sql))){
					message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);}

				// Use item
				adr_use_item($item_potion, $user_id);
			}
			elseif(($item['item_duration'] > '0') && ($challenger['character_hp'] >= $challenger['character_hp_max'])){
				$power = 0;
				$battle_message .= sprintf($lang['Adr_battle_potion_hp_success_none'], $challenger['character_name'], adr_get_lang($item['item_name'])).'<br>';
			}

			// low dura message
			if(($item['item_duration'] < '2') && ($power > '0')){
				$battle_message .= '</span><span class="gensmall">'; // set new span class
				$battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_potion_hp_dura_none'], $challenger['character_name'], adr_get_lang($item['item_name']), adr_get_lang($item['item_name'])).'<br>';
				$battle_message .= '</span><span class="genmed">'; // reset span class to default
			}

			// Update the database
			$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
				SET battle_turn = 2,
					battle_round = (battle_round + 1)
				WHERE battle_challenger_id = '$user_id'
				AND battle_result = '0'
				AND battle_type = '1'";
			if(!($result = $db->sql_query($sql))){
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);}
		}	
		else if ( $item['item_type_use'] == 16 )
		{
			if(($item['item_duration'] > '0') && ($challenger['character_mp'] < $challenger['character_mp_max'])){
				$power = ($power < '1') ? rand(1,3) : $power;
				$power = (($power + $challenger['character_mp']) > $challenger['character_mp_max']) ? ($challenger['character_mp_max'] - $challenger['character_mp']) : $power;
				$battle_message .= sprintf($lang['Adr_battle_potion_mp_success'], $challenger['character_name'], adr_get_lang($item['item_name']), $power).'<br>';

				$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
					SET character_mp = (character_mp + $power)
					WHERE character_id = '$user_id'";
				if(!($result = $db->sql_query($sql))){
					message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);}

				// Use item
				adr_use_item($item_potion, $user_id);
			}
			elseif(($item['item_duration'] > '0') && ($challenger['character_mp'] >= $challenger['character_mp_max'])){
				$power = 0;
				$battle_message .= sprintf($lang['Adr_battle_potion_mp_success_none'], $challenger['character_name'], adr_get_lang($item['item_name'])).'<br>';
			}

			// low dura message
			if(($item['item_duration'] < '2') && ($power > '0')){
				$battle_message .= '</span><span class="gensmall">'; // set new span class
				$battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_potion_hp_dura_none'], $challenger['character_name'], adr_get_lang($item['item_name']), adr_get_lang($item['item_name'])).'<br>';
				$battle_message .= '</span><span class="genmed">'; // reset span class to default
			}

			// Update the database
			$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
				SET battle_turn = 2,
					battle_round = (battle_round + 1)
				WHERE battle_challenger_id = '$user_id'
				AND battle_result = '0'
				AND battle_type = '1'";
			if(!($result = $db->sql_query($sql))){
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);}
		}
	}
	else if ( $attack && $bat['battle_turn'] == 1 )
	{
		// Define the weapon quality and power
		$weap = intval($_POST['item_weapon']);
		$power = 1;
		$quality = 0;

		if ( $weap )
		{
			$sql = " SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_in_shop = 0 
				AND item_in_warehouse = 0
				AND item_duration > 0
				$item_sql
				AND item_owner_id = $user_id 
				AND item_id = $weap ";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
			}
			$item = $db->sql_fetchrow($result);

			if ( $challenger['character_mp'] < $item['item_mp_use'] || $challenger['character_mp'] < 0 || $item['item_mp_use'] == '' ) 
			{	
				adr_previous ( Adr_battle_check , 'adr_battle' , '' );
			}

			if ( $item['item_mp_use'] > 0 )
			{
				$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
					SET character_mp = character_mp - " . $item['item_mp_use'] . "
					WHERE character_id = $user_id ";
				if( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
				}
			}

			// Check for magic weap bonuses. Also get better crit threat range later on...
			$quality = ($item['item_type_use'] == '6') ? ($item['item_quality'] *2) : $item['item_quality'];
			$power = ($item['item_power'] + $item['item_add_power']);
			adr_use_item($weap , $user_id);
		}

		// Let's check if the attack succeeds
		$dice = rand(1,20);
		$diff = (($bat['battle_challenger_att'] + $quality + $dice + $challenger['character_level']) > ($bat['battle_opponent_def'] + $challenger['character_level'])) ? TRUE : FALSE;
		$power = ($power + adr_modifier_calc($challenger['character_might']));
		$damage = 1;

		// Grab details for Elemental addon
		$elemental = adr_get_element_infos($opponent_element);

		// Grab item element infos if not bare hands strike
		$element_name = ($item['item_name'] != '') ? adr_get_element_infos($item['item_element']) : '';

		// Here we apply text colour if set
		if($element_name['element_colour'] != ''){
			$item['item_name'] = '<font color="'.$element_name['element_colour'].'">'.$item['item_name'].'</font>';
		}
		else{
			$item['item_name'] = $item['item_name'];
		}

		##=== START: Critical hit code
		$threat_range = ($item['item_type_use'] == '6') ? '19' : '20'; // magic weaps get slightly better threat range
		$crit_result = adr_battle_make_crit_roll($bat['battle_challenger_att'], $challenger['character_level'], $bat['battle_opponent_def'], $item['item_type_use'], $power, $quality, $threat_range);
		##=== END: Critical hit code

		// Bare fist strike
		if($item['item_name'] == ''){
			$monster_def_dice = rand(1,20);
			$monster_modifier = rand(1,20); // this is temp. until proper monster characteristics are added to ADR

			// Grab modifers
			$bare_power = adr_modifier_calc($challenger['character_might']);

			if(((($dice + $bare_power) >= ($monster_def_dice + $monster_modifier)) && ($dice != '1')) || ($dice == '20')){
				$damage = rand(1,3);
				$damage = ($damage > $bat['battle_opponent_hp']) ? $bat['battle_opponent_hp'] : $damage;
				$battle_message .= sprintf($lang['Adr_battle_attack_bare'], $challenger['character_name'], $damage, $monster['monster_name']).'<br>';
			}
			else{
				$damage = 0;
				$battle_message .= sprintf($lang['Adr_battle_attack_bare_fail'], $challenger['character_name'], $monster['monster_name']).'<br>';
			}
		}
		else{
			if((($diff === TRUE) && ($dice != '1')) || ($dice >= $threat_range)){
				// Prefix msg if crit hit
				$battle_message .= ($crit_result === TRUE) ? '<br>'.$lang['Adr_battle_critical_hit'].'</b><br />' : '';
				$damage = 1;

				// Work out attack type
				if(($item['item_element']) && ($item['item_element'] === $elemental['element_oppose_strong']) && ($item['item_duration'] > '1') && (!empty($item['item_name']))){
					$damage = ceil(($power *($item['item_element_weak_dmg'] /100)));
				}
				elseif(($item['item_element']) && (!empty($item['item_name'])) && ($item['item_element'] === $opponent_element) && ($item['item_duration'] > '1')){
					$damage = ceil(($power *($item['item_element_same_dmg'] /100)));
				}
				elseif(($item['item_element']) && (!empty($item['item_name'])) && ($item['item_element'] === $elemental['element_oppose_weak']) && ($item['item_duration'] > '1')){
					$damage = ceil(($power *($item['item_element_str_dmg'] /100)));
				}
				else{
					$damage = ceil($power);
				}

				// Fix dmg value
				$damage = ($damage < '1') ? rand(1,3) : $damage;
				$damage = ($damage > $bat['battle_opponent_hp']) ? $bat['battle_opponent_hp'] : $damage;

				// Fix attack msg type
				if(($item['item_element'] > '0') && ($element_name['element_name'] != '')){
					$battle_message .= sprintf($lang['Adr_battle_attack_success'], $challenger['character_name'], $monster['monster_name'], $item['item_name'], adr_get_lang($element_name['element_name']), $damage).'<br>';}
				else{
					$battle_message .= sprintf($lang['Adr_battle_attack_success_norm'], $challenger['character_name'], $monster['monster_name'], $item['item_name'], $damage).'<br>';}
			}
			else{
				$damage = 0;
				$battle_message .= sprintf($lang['Adr_battle_attack_failure'], $challenger['character_name'], $monster['monster_name'], $item['item_name']).'<br>';
			}
		}

		if(($item['item_duration'] < '2') && ($item['item_name'] != '')){
			$battle_message .= '</span><span class="gensmall">'; // set new span class
			$battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_attack_dura'], $challenger['character_name'], adr_get_lang($item['item_name'])).'<br>';
			$battle_message .= '</span><span class="genmed">'; // reset span class to default
		}

		// Update the database
		$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
			SET battle_opponent_hp = battle_opponent_hp - $damage ,
				battle_turn = 2,
				battle_round = (battle_round + 1),
				battle_challenger_dmg = $damage
			WHERE battle_challenger_id = $user_id
			AND battle_result = 0
			AND battle_type = 1 ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
		}
	}
	else if ( $defend && $bat['battle_turn'] == 1 )
	{
		$def = TRUE;
		$power = floor( ( $monster['monster_level'] * rand(1,3) ) / 2 );
		$battle_message .= sprintf($lang['Adr_battle_defend'], $challenger['character_name'], $monster['monster_name']).'<br>';

		// Update the database
		$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
			SET	battle_turn = 2,
				battle_round = (battle_round + 1)
			WHERE battle_challenger_id = $user_id
			AND battle_result = 0
			AND battle_type = 1 ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);
		}
	}

	// Get the user infos
	$challenger = adr_get_user_infos($user_id);

	##=== START: additional status checks on user ===##
	if(($bat['battle_turn'] == '1') && (($attack) || ($item_spell) || ($item_potion) || ($defend) || ($flee) || ($equip))){
		$hp_regen = adr_hp_regen_check($user_id, $bat['battle_challenger_hp']);
		$challenger['character_hp'] += $hp_regen;
		$mp_regen = adr_mp_regen_check($user_id, $bat['battle_challenger_mp']);

		$battle_message .= '<span class="gensmall"><font color="#FF0000">'; // prefix new span class
		if((($hp_regen > '0') && ($mp_regen == '0')) || (($mp_regen > '0') && ($hp_regen == '0'))){
			if($hp_regen > '0'){ $battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_regen_xp'], $challenger['character_name'], intval($hp_regen)).'<br />';}
			elseif($mp_regen > '0'){ $battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_regen_mp'], $challenger['character_name'], intval($mp_regen)).'<br />';}
		}
		elseif(($hp_regen > '0') && ($mp_regen > '0')){
			$battle_message .= '&nbsp;&nbsp;>&nbsp;'.sprintf($lang['Adr_battle_regen_both'], $challenger['character_name'], intval($hp_regen), intval($mp_regen)).'<br />';
		}
		$battle_message .= '</font></span>'; // reset span class to default
	}
	##=== END: additional status checks on user ===##

	$sql = " SELECT * FROM  " . ADR_BATTLE_LIST_TABLE . " 
		WHERE battle_challenger_id = $user_id
		AND battle_result = 0
		AND battle_type = 1 ";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
	}
	$bat = $db->sql_fetchrow($result);

	// Now sort out monster turn
	if(($bat['battle_turn'] == '2') && ($bat['battle_opponent_hp'] > '0'))
	{
		$monster_name = adr_get_lang($monster['monster_name']);
		$character_name = $challenger['character_name'];
        $monster['monster_crit_hit_mod'] = intval(2);
        $monster['monster_crit_hit'] = intval(20);
		$monster['monster_int'] = (10 + (rand(1, $monster['monster_level']) *2)); //temp calc
		$monster['monster_str'] = (10 + (rand(1, $monster['monster_level']) *2)); //temp calc

		// Prefix monster message
		$battle_message .= '<font color="orange">['.$monster_name.$lang['Adr_battle_msg_check'].']: </font>';

		if($def != TRUE)
			$power = ceil($monster['monster_level'] *rand(1,3));
		else
			$power = floor(($monster['monster_level'] *rand(1,3)) /2);

		// Has the monster the ability to steal from user?
		$thief_chance = rand(1,20);

		if(($board_config['Adr_thief_enable'] == '1') && ($thief_chance == '20')){
			$sql = "SELECT item_id, item_name FROM  " . ADR_SHOPS_ITEMS_TABLE . "
				WHERE item_monster_thief = '0'
				AND item_in_warehouse = '0'
				AND item_in_shop = '0'
				AND item_duration > '0'
				AND item_owner_id = '$user_id'
				AND item_id NOT IN ($helm_equip, $armour_equip, $gloves_equip, $buckler_equip, $amulet_equip, $ring_equip)
				ORDER BY rand() LIMIT 1";
			if(!($result = $db->sql_query($sql))){
				message_die(GENERAL_ERROR, 'Could not query items for monster item steal', '', __LINE__, __FILE__, $sql);}
			$item_to_steal = $db->sql_fetchrow($result);

			// Rand to check type of thief attack
			$success_chance = rand(1,20);
			$rand = rand(1,20);

			##=== START: steal item checks
			$challenger_item_spot_check = (20 + adr_modifier_calc($challenger['character_skill_thief']));
			$monster_item_attempt = (((($rand + adr_modifier_calc($monster['monster_thief_skill'])) > $challenger_item_spot_check) && ($rand != '1')) || ($rand == '20')) ? TRUE : FALSE;
			##=== END: steal item checks

			##=== START: steal points checks
			$challenger_points_spot_check = (10 + adr_modifier_calc($challenger['character_skill_thief']));
			$monster_points_attempt = (((($rand + $monster['monster_thief_skill']) > $challenger_points_spot_check) && ($rand != '1')) || ($rand == '20')) ? TRUE : FALSE;
			##=== END: steal points checks

			if(($success_chance == '20') && ($monster_item_attempt == TRUE) && ($item_to_steal['item_name'] != '')){
				$damage = 0;

				// Mark the item as stolen
				$sql = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
					SET item_monster_thief = 1
					WHERE item_owner_id = '$user_id'
					AND item_id = '" . $item_to_steal['item_id'] . "'";
				if(!($result = $db->sql_query($sql))){
					message_die(GENERAL_ERROR, 'Could not update stolen item by monster', '', __LINE__, __FILE__, $sql);}

					$battle_message .= sprintf($lang['Adr_battle_opponent_thief_success'], $monster_name, adr_get_lang($item_to_steal['item_name']), $character_name);
			}
			elseif(($success_chance >= '15') && ($success_chance != '20') && ($user_points > '0') && ($monster_points_attempt == TRUE)){
				$damage = 0;
				$points_stolen = floor(($user_points /100) *$board_config['Adr_thief_points']);
				subtract_reward($user_id, $points_stolen);
				$battle_message .= sprintf($lang['Adr_battle_opponent_thief_points'], $monster_name, $points_stolen, get_reward_name(), $character_name);
			}
			else{
				$damage = 0;
				$battle_message .= sprintf($lang['Adr_battle_opponent_thief_failure'], $monster_name, adr_get_lang($item_to_steal['item_name']), $character_name);
			}
		}
		else{
			$attack_type = rand(1,20);
			##=== START: Critical hit code
			$threat_range = $monster['monster_crit_hit'];
//			list($crit_result, $power) = explode('-', adr_battle_make_crit_roll($bat['battle_opponent_att'], $monster['monster_level'], $bat['battle_challenger_def'], 0, $power, 0, $threat_range, 0));
			##=== END: Critical hit code

			if(($bat['battle_opponent_mp'] > '0') && ($bat['battle_opponent_mp'] >= $bat['battle_opponent_mp_power']) && ($attack_type > '16')){
				$damage = 1;
				$power = ceil($power + adr_modifier_calc($bat['battle_opponent_mp_power']));
				$monster_elemental = adr_get_element_infos($opponent_element);

				// Sort out magic check & opponents saving throw
				$dice = rand(1,20);
				$magic_check = ceil($dice + $bat['battle_opponent_mp_power'] + adr_modifier_calc($monster['monster_int']));
				$fort_save = (11 + adr_modifier_calc($challenger['character_wisdom']));
				$success = ((($magic_check >= $fort_save) && ($dice != '1')) || ($dice >= $threat_range)) ? TRUE : FALSE;

				if($success === TRUE){
					// Prefix msg if crit hit
					$battle_message .= ($dice >= $threat_range) ? $lang['Adr_battle_critical_hit'].' ' : '';

					// Work out attack type
					if($challenger_element === $monster_elemental['element_oppose_weak']){
						$damage = ceil(($power *($monster_elemental['element_oppose_strong_dmg'] /100)));
					}
					elseif($challenger_element === $opponent_element){
						$damage = ceil(($power *($monster_elemental['element_oppose_same_dmg'] /100)));
					}
					elseif($challenger_element === $monster_elemental['element_oppose_strong']){
						$damage = ceil(($power *($monster_elemental['element_oppose_weak_dmg'] /100)));
					}
					else{
						$damage = ceil($power);
					}

					// Fix dmg value
					$damage = ($damage < '1') ? rand(1,3) : $damage;
					$damage = ($dice >= $threat_range) ? ($damage *$monster['monster_crit_hit_mod']) : $damage;
					$damage = ($damage > $challenger['character_hp']) ? $challenger['character_hp'] : $damage;

					// Fix attack msg type
					if($monster['monster_base_custom_spell'] != ''){
						$battle_message .= sprintf($lang['Adr_battle_opponent_spell_success'], $monster_name, $monster['monster_base_custom_spell'], $character_name, $damage);}
					else{
						$battle_message .= sprintf($lang['Adr_battle_opponent_spell_success2'], $monster_name, $character_name, $damage);}
				}
				else{
					$damage = 0;
					$battle_message .= sprintf($lang['Adr_battle_opponent_spell_failure'], $monster_name, $character_name);
				}

				// Remove monster MP
				$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
					SET battle_opponent_mp = (battle_opponent_mp - '" . $bat['battle_opponent_mp_power'] . "')
					WHERE battle_challenger_id = '$user_id'
						AND battle_result = '0'
						AND battle_type = '1'";
				if(!($result = $db->sql_query($sql))){
					message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);}
			}
			else{
				// Let's check if the attack succeeds
				$dice = rand(1,20);
				$success = (((($bat['battle_opponent_att'] + $dice) >= ($bat['battle_challenger_def'] + adr_modifier_calc($challenger['character_dexterity']))) && ($dice != '1')) || ($dice >= $threat_range)) ? TRUE : FALSE;
				$power = ceil(($power /2) + (adr_modifier_calc($monster['monster_str'])));
				$damage = 1;

				if($success == TRUE){
					// Attack success , calculate the damage . Critical dice roll is still success
					$damage = ($power < '1') ? rand(1,3) : $power;
					$damage = ($dice >= $threat_range) ? ceil($damage *$monster['monster_crit_hit_mod']) : ceil($damage);
					$damage = ($damage > $challenger['character_hp']) ? $challenger['character_hp'] : $damage;
					$battle_message .= ($dice >= $threat_range) ? $lang['Adr_battle_critical_hit'].' ' : '';
					$battle_message .= sprintf($lang['Adr_battle_opponent_attack_success'], $monster_name, $character_name, $damage);
				}
				else{
					$damage = 0;
					$battle_message .= sprintf($lang['Adr_battle_opponent_attack_failure'], $monster_name, $character_name);
				}
			}

			// Prevent instant kills at start of battle
			if(($bat['battle_round'] == '0') && (($challenger['character_hp'] - $damage) < '1'))
				$character_hp = '1';
			else{
				$character_hp = '(character_hp - '.$damage.')';}
				$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
				SET character_hp = $character_hp
				WHERE character_id = '$user_id'";
			if(!($result = $db->sql_query($sql))){
				message_die(GENERAL_ERROR, 'Could not update battle', '', __LINE__, __FILE__, $sql);}
		}

		// End msg with round number
		$round_check = (($bat['battle_round'] == '0') && ($bat['battle_turn'] == '2')) ? 'battle_round = (battle_round + 1), ' : '';
		$battle_message .= '<font size="1"><p align="right">[Battle Round: '.($battle_round + 1).']</p></font>';

		// Fix battle text
		$battle_text = $battle_message.$bat['battle_text'];
		$battle_text_format = str_replace('<br />', "<br>", $battle_text);
		$battle_text_format = '%BSS%'. str_replace('\'', '%APOS%', $battle_text_format) .'%BSE%';

		$sql = "UPDATE " . ADR_BATTLE_LIST_TABLE . "
			SET battle_text = '" . str_replace("\'", "''", $battle_text_format) . "',
				battle_turn = 1,
				$round_check
				battle_opponent_dmg = $damage
			WHERE battle_challenger_id = '$user_id'
			AND battle_result = '0'
			AND battle_type = '1'";
		if(!($result = $db->sql_query($sql))){
			message_die(GENERAL_ERROR, 'Could not update battle at end of user turn', '', __LINE__, __FILE__, $sql);}
	}

	// Check again after the available actions
	$sql = " SELECT * FROM  " . ADR_BATTLE_LIST_TABLE . " 
		WHERE battle_challenger_id = $user_id
		AND battle_result = 0
		AND battle_type = 1 ";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
	}
	$bat = $db->sql_fetchrow($result);

	// Check for any stolen items
	$sql = " SELECT item_name FROM  " . ADR_SHOPS_ITEMS_TABLE . " 
		WHERE item_owner_id = '$user_id'
		AND item_monster_thief = '1'
		LIMIT 1";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
	}
	$stolen = $db->sql_fetchrow($result);

	// Get the monster infos
	$monster = adr_get_monster_infos($bat['battle_opponent_id']);
	
	// Get the user infos
	$sql = "SELECT c.* , u.user_avatar , u.user_avatar_type, u.user_allowavatar FROM " . ADR_CHARACTERS_TABLE . " c , " . USERS_TABLE . " u
		WHERE c.character_id = $user_id 
		AND c.character_id = u.user_id ";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query user', '', __LINE__, __FILE__, $sql);
	}
	$challenger = $db->sql_fetchrow($result);

   	$challenger_hp = $challenger['character_hp'];
   	$opponent_hp = $bat['battle_opponent_hp'];

	// We have to know if one of the opponents is dead
	if (( $opponent_hp < 1 && $challenger_hp > 0) || (($opponent_hp < '1') && ($challenger_hp < '1')) )
	{
		// The monster is dead , give money and xp to the users , then update the database

		// Get the experience earned
		$exp = rand ( $adr_general['battle_base_exp_min'] , $adr_general['battle_base_exp_max'] );
		if (( $monster['monster_level'] - $challenger['character_level'] ) > 1 )
		{
			$exp = floor( ( ( $monster['monster_level'] - $challenger['character_level'] ) * $adr_general['battle_base_exp_modifier'] ) / 100 );
		}

		// Get the money earned
		$reward = rand ( $adr_general['battle_base_reward_min'] , $adr_general['battle_base_reward_max'] );
		if (( $monster['monster_level'] - $challenger['character_level'] ) > 1 )
		{
			$reward = floor( ( ( $monster['monster_level'] - $challenger['character_level'] ) * $adr_general['battle_base_reward_modifier'] ) / 100 );
		}

		$sql = " UPDATE  " . ADR_BATTLE_LIST_TABLE . " 
			SET battle_result = 1 ,
				battle_opponent_hp = 0,
				battle_finish = ".time().",
				battle_text = ''
			WHERE battle_challenger_id = $user_id
			AND battle_result = 0
			AND battle_type = 1 ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update battle list', '', __LINE__, __FILE__, $sql);
		}

		add_reward( $user_id, $reward );

		// If $challenger['character_hp'] is < '1' then update sql to hp = 1
		$sql_update_hp = ($challenger['character_hp'] < '1') ? 'character_hp = 1' : '';

		$sql = " UPDATE  " . ADR_CHARACTERS_TABLE . " 
			SET character_xp = character_xp + $exp ,
				character_victories = character_victories + 1 ,
				$sql_update_hp
				character_sp = character_sp + '" . $bat['battle_opponent_sp'] . "'
			WHERE character_id = $user_id ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update character', '', __LINE__, __FILE__, $sql);
		}

		// Remove item stolen status
		$sql = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
			SET item_monster_thief = 0 
			WHERE item_owner_id = $user_id ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update stolen item status', '', __LINE__, __FILE__, $sql);
		}

		// Delete broken items from users inventory
		$sql = " DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_duration < 1 
			AND item_owner_id = $user_id ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not delete broken items', '', __LINE__, __FILE__, $sql);
		}

		$message = sprintf($lang['Adr_battle_won'] , $bat['battle_challenger_dmg'] , $exp , $bat['battle_opponent_sp'] , $reward , get_reward_name() );
		if ( $stolen['item_name'] != '' )
		{
			$message .= '<br />'.sprintf($lang['Adr_battle_stolen_items'] , $monster['monster_name'] ) ;
		}
		$message .= '<br /><br />'.sprintf($lang['Adr_battle_return'] ,"<a href=\"" . 'adr_battle.'.$phpEx . "\">", "</a>") ;
		$message .= '<br /><br />'.sprintf($lang['Adr_character_return'] ,"<a href=\"" . 'adr_character.'.$phpEx . "\">", "</a>") ;
		message_die ( GENERAL_MESSAGE , $message );
	}

	if ( $challenger_hp < 1 && $opponent_hp > 0 )
	{
		// The character is dead , update the database

		$sql = " UPDATE  " . ADR_BATTLE_LIST_TABLE . " 
			SET battle_result = 2,
				battle_finish = ".time().",
				battle_text = ''
			WHERE battle_challenger_id = $user_id
			AND battle_result = 0
			AND battle_type = 1 ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update battle list', '', __LINE__, __FILE__, $sql);
		}

		$sql = " UPDATE  " . ADR_CHARACTERS_TABLE . " 
			SET character_hp = 0 ,
			    character_defeats = character_defeats + 1
			WHERE character_id = $user_id ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not update character', '', __LINE__, __FILE__, $sql);
		}

		// Delete stolen items from users inventory
		$sql = " DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_monster_thief = 1
			AND item_owner_id = $user_id ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not delete stolen items', '', __LINE__, __FILE__, $sql);
		}

		// Delete broken items from users inventory
		$sql = " DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_duration < 1 
			AND item_owner_id = $user_id ";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not delete broken items', '', __LINE__, __FILE__, $sql);
		}

		$message = sprintf($lang['Adr_battle_lost'] , $monster['monster_name'] , $bat['battle_opponent_dmg'] );
		if ( $stolen['item_name'] != '' )
		{
			$message .= '<br /><br />'.sprintf($lang['Adr_battle_stolen_items_lost'] , $monster['monster_name'] ) ;
		}
		$message .= '<br /><br />'.sprintf($lang['Adr_battle_temple'] ,"<a href=\"" . 'adr_temple.'.$phpEx . "\">", "</a>") ;
		$message .= '<br /><br />'.sprintf($lang['Adr_character_return'] ,"<a href=\"" . 'adr_character.'.$phpEx . "\">", "</a>") ;
		message_die ( GENERAL_MESSAGE , $message );

	}
}

	$avatar_img = '';
	if(($userdata['user_avatar_type']) && ($userdata['user_allowavatar'])){
		switch($userdata['user_avatar_type']){
			case USER_AVATAR_UPLOAD:
				$avatar_img = ($board_config['allow_avatar_upload']) ? '<img src="' . $board_config['avatar_path'] . '/' . $userdata['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$avatar_img = ($board_config['allow_avatar_remote']) ? '<img src="' . $userdata['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$avatar_img = ($board_config['allow_avatar_local']) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $userdata['user_avatar'] . '" alt="" border="0" />' : '';
				break;
		}
	}

	// First select the available items
	$sql = " SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
		WHERE item_in_shop = 0 
		$item_sql
		AND item_duration > 0
		AND item_in_warehouse = 0
		AND item_monster_thief = 0
		AND item_owner_id = $user_id ";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query battle list', '', __LINE__, __FILE__, $sql);
	}
	$items = $db->sql_fetchrowset($result);

	// Prepare the items list
	$weapon_list = '<select name="item_weapon">';
	$weapon_list .= '<option value = "0" >' . $lang['Adr_battle_no_weapon'] . '</option>';
	$spell_list = '<select name="item_spell">';
	$spell_list .= '<option value = "0" >' . $lang['Adr_battle_no_spell'] . '</option>';
	$potion_list = '<select name="item_potion">';
	$potion_list .= '<option value = "0" >' . $lang['Adr_battle_no_potion'] . '</option>';

	for ( $i = 0, $i_count = count($items); $i < $i_count ; $i ++ )
	{
		$item_name = adr_get_lang($items[$i]['item_name']);
		$item_power = ($adr_general['item_power_level'] == '1') ? ($items[$i]['item_power'] + $items[$i]['item_add_power']) : $items[$i]['item_power'];

		if ( ( $items[$i]['item_type_use'] ==  5 || $items[$i]['item_type_use'] ==  6 ) && ( $items[$i]['item_mp_use'] <= $challenger['character_mp'] ) )
		{
			$weapon_selected = ( $_POST['item_weapon'] == $items[$i]['item_id'] ) ? 'selected' : '';
        			$weapon_list .= '<option value = "'.$items[$i]['item_id'].'" '.$weapon_selected.'>' . $item_name . ' (' . $lang['Adr_items_power'] . ': ' . $item_power . '; ' . $lang['Adr_items_duration'] . ': ' . $items[$i]['item_duration'] . ')'.'</option>'; 
		}
		else if ( ( $items[$i]['item_type_use'] == 11 ||  $items[$i]['item_type_use'] == 12 ) && ( ( $items[$i]['item_power'] + $items[$i]['item_mp_use'] ) <= $challenger['character_mp'] ) )
		{
			$spell_selected = ( $_POST['item_spell'] == $items[$i]['item_id'] ) ? 'selected' : '';
			$spell_list .= '<option value = "'.$items[$i]['item_id'].'" '.$spell_selected.' >' . $item_name . ' (' . $lang['Adr_items_power'] . ': ' . $item_power . '; ' . $lang['Adr_items_duration'] . ': ' . $items[$i]['item_duration'] . ')'.'</option>';
		}
		else if ( $items[$i]['item_type_use'] == 15 || $items[$i]['item_type_use'] == 16 )
		{
			$potion_selected = ( $_POST['item_potion'] == $items[$i]['item_id'] ) ? 'selected' : '';
			$potion_list .= '<option value = "'.$items[$i]['item_id'].'" '.$potion_selected.' >' . $item_name . ' (' . $lang['Adr_items_power'] . ': ' . $item_power . '; ' . $lang['Adr_items_duration'] . ': ' . $items[$i]['item_duration'] . ')'.'</option>';
		}
	}

	$weapon_list .= '</select>';
	$spell_list .= '</select>';
	$potion_list .= '</select>';

	##=== START: Create bar widths ===##
		list($challenger_hp_width, $challenger_hp_empty) = adr_make_bars($challenger['character_hp'], $challenger['character_hp_max'], '100');
		list($challenger_mp_width, $challenger_mp_empty) = adr_make_bars($challenger['character_mp'], $challenger['character_mp_max'], '100');
		list($opponent_hp_width, $opponent_hp_empty) = adr_make_bars($bat['battle_opponent_hp'], $bat['battle_opponent_hp_max'], '100');
		list($opponent_mp_width, $opponent_mp_empty) = adr_make_bars($bat['battle_opponent_mp'], $bat['battle_opponent_mp_max'], '100');
	##=== END: Create bar widths ===##

	###=== START: grab challenger & opponent infos ===###
		$monster_element_name = adr_get_element_infos($monster['monster_base_element']);
		$monster_alignment_name = (!$monster['monster_base_alignment']) ? adr_get_alignment_infos(2) : adr_get_alignment_infos($monster['monster_base_alignment']);
		$challenger_element = adr_get_element_infos($challenger['character_element']);
		$challenger_alignment = adr_get_alignment_infos($challenger['character_alignment']);
		$challenger_class = adr_get_class_infos($challenger['character_class']);
	###=== END: grab challenger & opponent infos ===###

	$template->assign_vars(array(
		'ATTACK' => $weapon_list,
		'SPELL' => $spell_list,
		'POTION' => $potion_list,
		'NAME' => $challenger['character_name'],
		'AVATAR_IMG' => $avatar_img, 
		'MONSTER_NAME' => adr_get_lang($monster['monster_name']),
		'MONSTER_IMG' => $monster['monster_img'],
		'BATTLE_TEXT' => $bat['battle_text'],
		'HP' => $challenger['character_hp'],
		'HP_MAX' => $challenger['character_hp_max'],
		'HP_WIDTH' => $challenger_hp_width,
		'MP' => $challenger['character_mp'],
		'MP_MAX' => $challenger['character_mp_max'],
		'MP_WIDTH' => $challenger_mp_width,
		'ATT' => $bat['battle_challenger_att'],
		'DEF' => $bat['battle_challenger_def'],
		'MONSTER_HP' => $bat['battle_opponent_hp'],
		'MONSTER_HP_MAX' => $bat['battle_opponent_hp_max'],
		'MONSTER_HP_WIDTH' => $opponent_hp_width,
		'MONSTER_MP' => $bat['battle_opponent_mp'],
		'MONSTER_MP_MAX' => $bat['battle_opponent_mp_max'],
		'MONSTER_MP_WIDTH' => $opponent_mp_width,
		'MONSTER_ATT' => $bat['battle_opponent_att'],
		'MONSTER_DEF' => $bat['battle_opponent_def'],
		'L_HP'=> $lang['Adr_character_health'],
		'L_MP' => $lang['Adr_character_magic'],
		'L_ATT' => $lang['Adr_attack'],
		'L_DEF' => $lang['Adr_defense'],
		'L_ATTACK' => $lang['Adr_attack_opponent'],
		'L_POTION' => $lang['Adr_potion_opponent'],
		'L_DEFEND' => $lang['Adr_defend_opponent'],
		'L_FLEE' => $lang['Adr_flee_opponent'],
		'L_SPELL' => $lang['Adr_spell_opponent'],
		'L_ACTIONS' => $lang['Adr_actions_opponent'],
		'L_ATTRIBUTES' => $lang['Adr_battle_attributes'],
		'L_PHY_ATT' => $lang['Adr_battle_phy_att'],
		'L_PHY_DEF' => $lang['Adr_battle_phy_def'],
		'L_MAG_ATT' => $lang['Adr_battle_mag_att'],
		'L_MAG_DEF' => $lang['Adr_battle_mag_def'],
		'L_ALIGNMENT' => $lang['Adr_battle_alignment'],
		'L_ELEMENT' => $lang['Adr_battle_element'],
		'L_CLASS' => $lang['Adr_battle_class'],
      	'ALIGNMENT' => adr_get_lang($challenger_alignment['alignment_name']),
      	'ELEMENT' => adr_get_lang($challenger_element['element_name']),
		'CLASS' => adr_get_lang($challenger_class['class_name']),
		'M_ATT' => $bat['battle_challenger_magic_attack'],
		'M_DEF' => $bat['battle_challenger_magic_resistance'],
		'MONSTER_M_ATT' => $bat['battle_opponent_magic_attack'],
		'MONSTER_M_DEF' => $bat['battle_opponent_magic_resistance'],
      	'MONSTER_ALIGNMENT' => adr_get_lang($monster_alignment_name['alignment_name']),
      	'MONSTER_ELEMENT' => adr_get_lang($monster_element_name['element_name']),
		'HP_EMPTY' => $challenger_hp_empty,
		'MP_EMPTY' => $challenger_mp_empty,
		'MONSTER_HP_EMPTY' => $opponent_hp_empty,
		'MONSTER_MP_EMPTY' => $opponent_mp_empty,
		'TAUNT_LIST' => $level_list,
		'L_COMMS' => $lang['Adr_pvp_comms'],
		'L_TYPE_HERE' => $lang['Adr_pvp_custom_taunt'],
		'L_CUSTOM_SENTANCE' => $lang['Adr_pvp_taunt'],
		'S_CHATBOX' => append_sid("adr_battle_chatbox.$phpEx?battle_id=".$battle_id),
	));

include($phpbb_root_path . 'adr/includes/adr_header.'.$phpEx);
$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
?> 
