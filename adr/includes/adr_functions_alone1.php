<?php
/***************************************************************************
 *                                 adr_functions_alone.php
 *                            -------------------
 *   begin                : 11/02/2004
 *   copyright            : Dr DLP / Malicious Rabbit
 *   email                : ukc@wanadoo.fr
 *
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

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

function adr_delete_character($user_id)
{
	global $db , $phpbb_root_path , $phpEx , $table_prefix ;

	define('IN_ADR_ADMIN', 1);
	define('IN_ADR_SHOPS', 1);
	define('IN_ADR_SETTINGS', 1);
	define('IN_ADR_VAULT', 1);
	define('IN_ADR_BATTLE', 1);
	define('IN_ADR_TEMPLE', 1);
	define('IN_ADR_CHARACTER', 1);

	include_once($phpbb_root_path . 'includes/constants.'.$phpEx);
	include_once($phpbb_root_path . 'adr/includes/adr_constants.'.$phpEx);

	$user_id = intval($user_id);

	$sql = " DELETE FROM " . ADR_CHARACTERS_TABLE . "
		WHERE character_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}

	$sql = " DELETE FROM " . ADR_SHOPS_TABLE . "
		WHERE shop_owner_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}

	$sql = " DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
		WHERE item_owner_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}

	$sql = " DELETE FROM " . ADR_VAULT_BLACKLIST_TABLE . "
		WHERE user_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}

	$sql = " DELETE FROM " . ADR_VAULT_EXCHANGE_USERS_TABLE . "
		WHERE user_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}

	$sql = " DELETE FROM " . ADR_VAULT_USERS_TABLE . "
		WHERE owner_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}

	$sql = " DELETE FROM " . ADR_BATTLE_LIST_TABLE . "
		WHERE battle_challenger_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Cannot delete this user', '', __LINE__, __FILE__, $sql);
	}
}

function adr_add_experience_points($user_id,$mode)
{
	global $lang , $phpEx , $userdata , $db , $board_config, $phpbb_root_path, $table_prefix ;

	define('IN_ADR_CHARACTER', 1);
	include_once($phpbb_root_path . 'adr/includes/adr_constants.'.$phpEx);

	$user_id = intval($user_id);

	switch($mode)
	{
		case 'newtopic' :

			$more_xp = $board_config['Adr_experience_for_new'];

		break;

		case 'reply' :

			$more_xp = $board_config['Adr_experience_for_reply'];

		break;

		case 'editpost' :

			$more_xp = $board_config['Adr_experience_for_edit'];

		break;

		default :

			$more_xp = 0;

		break;
	}

	$sql = "UPDATE " . ADR_CHARACTERS_TABLE . "
		SET character_xp = character_xp + $more_xp
		WHERE character_id = $user_id ";
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Error in posting', '', __LINE__, __FILE__, $sql);
	}
}

function adr_display_poster_infos($poster_id)
{
	global $phpbb_root_path , $lang , $board_config , $phpEx, $table_prefix ;

	define('IN_ADR_CHARACTER', 1);
	include_once($phpbb_root_path . 'adr/includes/adr_constants.'.$phpEx);
	include_once($phpbb_root_path . 'adr/includes/adr_functions_cache.'.$phpEx);

	$poster_id = intval($poster_id);
	$adr_topic_box = '';

	// Get the elements to display
	$topic_config = explode( '-' , $board_config['Adr_topics_display']);

	if ( !$topic_config[0] && !$topic_config[1] && !$topic_config[2] && !$topic_config[3] && !$topic_config[4] && !$topic_config[5] )
	{
		// Nothing to display ? End the function !
		return $adr_topic_box;
	}

	// Get the poster infos
	$poster_infos = adr_get_poster_infos($poster_id);

	if ( !$poster_infos['class_name'] )
	{
		// No character ? End the function !
		return $adr_topic_box;
	}

	// Yes , this function is very crappy .... If you know how to make the same thing with zero sql queries , please PM me !!
	include_once($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx);

	if ( $topic_config[0] )
	{
		$adr_topic_box .= $lang['Adr_topics_level'].'&nbsp;:&nbsp;'.$poster_infos['character_level'].'<br />';
	}

	if ( $topic_config[1] )
	{
		$adr_topic_box .= $lang['Adr_topics_class'].'&nbsp;:&nbsp;';

		if ( $topic_config[1] == '1' )
		{
			$adr_topic_box .= adr_get_lang($poster_infos['class_name']);
		}
		else
		{
			$adr_topic_box .= '<img src="adr/images/classes/'.$poster_infos['class_img'].'">';
		}
		$adr_topic_box .= '<br />';
	}

	if ( $topic_config[2] )
	{
		$adr_topic_box .= $lang['Adr_topics_race'].'&nbsp;:&nbsp;';

		if ( $topic_config[2] == '1' )
		{
			$adr_topic_box .= adr_get_lang($poster_infos['race_name']);
		}
		else
		{
			$adr_topic_box .= '<img src="adr/images/races/'.$poster_infos['race_img'].'">';
		}
		$adr_topic_box .= '<br />';
	}

	if ( $topic_config[3] )
	{
		$adr_topic_box .= $lang['Adr_topics_element'].'&nbsp;:&nbsp;';

		if ( $topic_config[3] == '1' )
		{
			$adr_topic_box .= adr_get_lang($poster_infos['element_name']);
		}
		else
		{
			$adr_topic_box .= '<img src="adr/images/elements/'.$poster_infos['element_img'].'">';
		}
		$adr_topic_box .= '<br />';
	}

	if ( $topic_config[4] )
	{
		$adr_topic_box .= $lang['Adr_topics_alignment'].'&nbsp;:&nbsp;';

		if ( $topic_config[4] == '1' )
		{
			$adr_topic_box .= adr_get_lang($poster_infos['alignment_name']);
		}
		else
		{
			$adr_topic_box .= '<img src="adr/images/alignments/'.$poster_infos['alignment_img'].'">';
		}
		$adr_topic_box .= '<br />';
	}
	
	if ( $topic_config[5] )
	{
		$adr_topic_box  .= '<a href="'.append_sid("adr_character.$phpEx?" . POST_USERS_URL . "=" . $poster_id).'" >'.$lang['Adr_character_see'].'</a><br /><br />';
	}

	// Show inventory link
	$adr_topic_box  .= '<a href="'.append_sid("adr_character_inventory.$phpEx?" . POST_USERS_URL . "=" . $searchid . "");

	return $adr_topic_box;
}

function adr_character_created_check($user_id)
{
	global $db , $lang , $phpEx , $phpbb_root_path , $board_config, $table_prefix ;

	$user_id = intval($user_id);

	// Check if user has created an ADR character or not
	$sql = "SELECT character_id FROM  " . ADR_CHARACTERS_TABLE . "
		WHERE character_id = $user_id ";
	if ( !($result = $db->sql_query($sql)) ) 
	{ 
		message_die(CRITICAL_ERROR, 'Error checking if user has character'); 
	}	
	$row = $db->sql_fetchrow($result);

	if ( !$row['character_id'] ) 
	{	
		adr_previous( Adr_character_lack , 'adr_character' , '' );
	}
}

function adr_ban_check($user_id)
{
	global $db , $lang , $userdata;

	if ( $userdata['user_adr_ban'] != 0 ) 
	{	
		adr_previous ( Adr_character_ban , 'index' , '' );
	}
}
	
?>
