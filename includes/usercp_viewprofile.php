<?php
/***************************************************************************
 *                           usercp_viewprofile.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: usercp_viewprofile.php,v 1.5.2.6 2005/09/14 18:14:30 acydburn Exp $
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

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
	exit;
}

if ( empty($HTTP_GET_VARS[POST_USERS_URL]) || $HTTP_GET_VARS[POST_USERS_URL] == ANONYMOUS )
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}
$profiledata = get_userdata($HTTP_GET_VARS[POST_USERS_URL]);

if (!$profiledata)
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}

$sql = "SELECT *
	FROM " . RANKS_TABLE . "
	ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain ranks information', '', __LINE__, __FILE__, $sql);
}

$ranksrow = array();
while ( $row = $db->sql_fetchrow($result) )
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);

//
// Output page header and profile_view template
//
$template->set_filenames(array(
	'body' => 'profile_view_body.tpl')
);
make_jumpbox('viewforum.'.$phpEx);
// Debut du mod karma
$sql = "select karma from " . USERS_TABLE . " where username='$profiledata[username]'"; 
$result = $db->sql_query($sql); 
$array = mysql_fetch_array($result);
$karma = $array[0];

if( $board_config['karmap'] == 1 )
{
	if ( $karma > 0 )
	{
		$karma_image = '<img src="images/karma/ange.gif" " alt="Ange" title="Ange" border="0" />';
	}
	else if ( $karma < 0 )
	{
		$karma_image = '<img src="images/karma/diable.gif" " alt="Diable" title="Diable" border="0" />';
	}
	else if ( $karma == 0 )
	{
		$karma_image = '<img src="images/karma/neutre.gif" " alt="Neutre" title="Neutre" border="0" />';
	}
}
// Fin du mod Karma
//
// Calculate the number of days this user has been a member ($memberdays)
// Then calculate their posts per day
//
$regdate = $profiledata['user_regdate'];
$memberdays = max(1, round( ( time() - $regdate ) / 86400 ));
$posts_per_day = $profiledata['user_posts'] / $memberdays;

// Get the users percentage of total posts
if ( $profiledata['user_posts'] != 0  )
{
	$total_posts = get_db_stat('postcount');
	$percentage = ( $total_posts ) ? min(100, ($profiledata['user_posts'] / $total_posts) * 100) : 0;
}
else
{
	$percentage = 0;
}

$avatar_img = '';
if ( $profiledata['user_avatar_type'] && $profiledata['user_allowavatar'] )
{
	switch( $profiledata['user_avatar_type'] )
	{
		case USER_AVATAR_UPLOAD:
			$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $profiledata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_REMOTE:
			$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $profiledata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_GALLERY:
			$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $profiledata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
	}
}

$poster_rank = '';
$rank_image = '';
if ( $profiledata['user_rank'] )
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['user_rank'] == $ranksrow[$i]['rank_id'] && $ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}
else
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['user_posts'] >= $ranksrow[$i]['rank_min'] && !$ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}

$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=" . $profiledata['user_id']);
$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';

if ( !empty($profiledata['user_viewemail']) || $userdata['user_level'] == ADMIN )
{
	$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $profiledata['user_id']) : 'mailto:' . $profiledata['user_email'];

	$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
	$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
}
else
{
	$email_img = '&nbsp;';
	$email = '&nbsp;';
}

$www_img = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '&nbsp;';
$www = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww">' . $profiledata['user_website'] . '</a>' : '&nbsp;';

if ( !empty($profiledata['user_icq']) )
{
	$icq_status_img = '<a href="http://wwp.icq.com/' . $profiledata['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $profiledata['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
	$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $profiledata['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
	$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $profiledata['user_icq'] . '">' . $lang['ICQ'] . '</a>';
}
else
{
	$icq_status_img = '&nbsp;';
	$icq_img = '&nbsp;';
	$icq = '&nbsp;';
}

$aim_img = ( $profiledata['user_aim'] ) ? '<a href="aim:goim?screenname=' . $profiledata['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '&nbsp;';
$aim = ( $profiledata['user_aim'] ) ? '<a href="aim:goim?screenname=' . $profiledata['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '&nbsp;';

$msn_img = ( $profiledata['user_msnm'] ) ? $profiledata['user_msnm'] : '&nbsp;';
$msn = $msn_img;

$yim_img = ( $profiledata['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $profiledata['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
$yim = ( $profiledata['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $profiledata['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';

$temp_url = append_sid("search.$phpEx?search_author=" . urlencode($profiledata['username']) . "&amp;showresults=posts");
$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . sprintf($lang['Search_user_posts'], $profiledata['username']) . '" title="' . sprintf($lang['Search_user_posts'], $profiledata['username']) . '" border="0" /></a>';
//
// BEGIN LEVEL HACK 
// 

/* Determine Level 
* 
* A users level is determined by their total number of posts. 
* We use a nice mathmatical formula to translate a post count 
* into a level. 
* Note, a user with zero posts is level 0 
* 
*/ 

if($profiledata['user_posts'] < 1) 
{ 
	$level_level = 0; 
} 
else 
{ 
	$level_level = floor( pow( log10( $profiledata['user_posts'] ), 3 ) ) + 1; 
} 

/* Determine HP 
* 
* HP is based on user activity. 
* Max HP is based on the users level, and will be the same for 
* all users of the same level. 
* 
* Current HP is based on the users posts per day. 
* The higher the users posts per day (ppd), the more hp 
* they will have. A user with average ppd (as set below) 
* will have 50% of their hp. As a user goes over the average 
* ppd, they will have more hp, but the gains will lessen 
* as the users ppd goes up. This makes it difficult, but not 
* impossible to have 100% hp. 
* 
* For users with under the average ppd, they will have 
* hp equal to 1/2 the percentage their ppd is of average. 
* ie- a user with 2.5 ppd, and an average ppd of 5 
* will have 25% hp. 
* 
* Users who miraculously manage to get higher than 100% 
* of their max health. (by posting far more than average) 
* will get a bonus to their max hp. 
* 
* Note that a user with a level of zero, has 0 / 0 hp. 
* 
*/ 

/* 
* This value determines what the 'average' posts per day is 
* Users above this value will have more hp, and users below 
* will have less. A user with exactly this posts per day 
* will have 50% of his max hp. 
* 
* This variable should NOT be zero. 
* You may set this to a decimal amount (eg 5.1, 2.35) 
*/ 

$level_avg_ppd = 5; 

/* 
* this value sets how hard it is to achieve 100% 
* hp. The higher you set it, the harder it is to 
* get full hp. 
* 
* to judge how high to set it, a user must have 
* posts per day equal to the $level_avg_ppd plus 
* the number set below. 
* 
* This should NOT be zero. 
*/ 

$level_bonus_redux = 5; 


if($level_level < 1) 
{ 
	$level_hp = "0 / 0"; 
	$level_hp_percent = 0; 
} 
else 
{ 
	$level_max_hp = floor( (pow( $level_level, (1/4) ) ) * (pow( 10, pow( $level_level+2, (1/3) ) ) ) / (1.5) ); 
    
	if($posts_per_day >= $level_avg_ppd) 
	{ 
		$level_hp_percent = floor( (.5 + (($posts_per_day - $level_avg_ppd) / ($level_bonus_redux * 2)) ) * 100); 
	} 
	else 
	{ 
		$level_hp_percent = floor( $posts_per_day / ($level_avg_ppd / 50) ); 
	} 
    
	if($level_hp_percent > 100) 
	{ 
		//Give the User bonus max HP if they have more than 100% hp 
		$level_max_hp += floor( ($level_hp_percent - 100) * pi() ); 
		$level_hp_percent = 100; 
	} 
	else 
	{ 
		$level_hp_percent = max(0, $level_hp_percent); 
	} 
    
   	$level_cur_hp = floor($level_max_hp * ($level_hp_percent / 100) ); 
    
   	//Be sure that a user has no more than max 
   	//and no less than zero hp. 
   	$level_cur_hp = max(0, $level_cur_hp); 
   	$level_cur_hp = min($level_max_hp, $level_cur_hp); 
    
   	$level_hp = $level_cur_hp . " / " . $level_max_hp; 
} 


/* Determine MP 
* 
* MP is calculated by how long the user has been around 
* and how often they post. 
* 
* Max MP is based on level, and increases with level 
* Each post a user makes costs them mp, 
* and a user regenerates mp proportional to how 
* many days they have been registered 
* 
*/ 

//Number of days the user has been at the forums. 
$level_user_days = max(1, round( ( time() - $profiledata['user_regdate'] ) / 86400 )); 

//The mp cost for one post. 
//Raising this value will generally decrease the current 
// mp for most posters. 
//This may be set to a decimal value (eg, 2, 2.1, 3.141596) 
//This should NOT be set to 0 
$level_post_mp_cost = 1; 

//This determines how much mp a user regenerates per day 
//Raising this value will generally increase the current 
// mp for most posters. 
//This may be set to a decimal value (eg, 3, 3.5, 2.71828) 
//This should NOT be set to 0 
$level_mp_regen_per_day = 4; 

if($level_level < 1) 
{ 
	$level_mp = "0 / 0"; 
	$level_mp_percent = 100; 
} 
else 
{ 
	$level_max_mp = floor( (pow( $level_level, (1/4) ) ) * (pow( 10, pow( $level_level+2, (1/3) ) ) ) / (pi()) ); 
    
	$level_mp_cost = $profiledata['user_posts'] * $level_post_mp_cost; 
    
	$level_mp_regen = max(1, $level_user_days * $level_mp_regen_per_day); 
    
	$level_cur_mp = floor($level_max_mp - $level_mp_cost + $level_mp_regen); 
	$level_cur_mp = max(0, $level_cur_mp); 
	$level_cur_mp = min($level_max_mp, $level_cur_mp); 
    
	$level_mp = $level_cur_mp . " / " . $level_max_mp; 
    
	$level_mp_percent = floor($level_cur_mp / $level_max_mp * 100); 
} 


/* Determine EXP percentage 
* 
* Experience is determined by how far the user is away 
* from the next level. This is expressed as a percentage. 
* 
* Note, a user of level 0 has 100% experience. Making one post 
* will put them at level 1. Also, a user that is shown to have 100% 
* experience, will go up a level on their next post. 
* 
*/ 

if($level_level == 0) 
{ 
	$level_exp = "0 / 0"; 
	$level_exp_percent = 100; 
} 
else 
{ 
	$level_posts_for_next = floor( pow( 10, pow( $level_level, (1/3) ) ) ); 
	$level_posts_for_this = floor( pow( 10, pow( ($level_level - 1), (1/3) ) ) );
	$level_posts_for_this = floor( pow( 10, pow( ($level_level - 1), (1/3) ) ) ); 

	$level_exp = $profiledata['user_posts'] . " / " . $level_posts_for_next; 
	$level_exp_percent = floor( ($profiledata['user_posts'] - $level_posts_for_this) / 
                        max(1,($level_posts_for_next - $level_posts_for_this)) * 100); 
} 

//
// END LEVEL HACK
//

$search = '<a href="' . $temp_url . '">' . sprintf($lang['Search_user_posts'], $profiledata['username']) . '</a>';
if ( $board_config['Adr_profile_display'] )
{
	define ( 'IN_ADR_CHARACTER' , true );
	define ( 'IN_ADR_SHOPS' , true );
	define ( 'IN_ADR_SKILLS' , true );
	define ( 'IN_ADR_BATTLE' , true );
	include_once($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx);

      // Get the general config
      $adr_general = adr_get_general_config();
	$searchid = $profiledata['user_id'];


	$sql = "SELECT c.* , r.race_name , r.race_img , r.race_weight , r.race_weight_per_level , e.element_name , e.element_img , a.alignment_name , a.alignment_img , cl.class_name , cl.class_img , cl.class_update_xp_req
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

	if ( !(is_numeric($row['character_class'])))
	{
		$template->assign_block_vars( 'adr_profile_none' , array());
	}
	else
	{
		$template->assign_block_vars( 'adr_profile' , array());

		$class = adr_get_lang($row['class_name']);
		$race = adr_get_lang($row['race_name']);
		$element = adr_get_lang($row['element_name']);
		$alignment = adr_get_lang($row['alignment_name']);

		// Count up characters current weight
		$max_weight = $row['race_weight'];
		for ( $p = 1 ; $p < $row['character_level'] ; $p ++ )
		{
   			$max_weight = floor($max_weight * (( $row['race_weight_per_level'] + 100 ) / 100 ));
		} 

		$sql = "SELECT SUM(item_weight) AS total FROM  " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_owner_id = $searchid 
			AND item_in_warehouse = 0 
			AND item_in_shop = 0 ";
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

		$max_hp = $row['class_update_xp_req'];
		for ( $p = 1 ; $p < $row['character_level'] ; $p ++ )
		{
			$max_hp = floor($max_hp * ( ( $adr_general['next_level_penalty'] + 100 ) / 100 ));
		}

		$hp_percent_width = floor(( $row['character_hp'] / $row['character_hp_max']) * 300 );
		$mp_percent_width = floor(( $row['character_mp'] / $row['character_mp_max']) * 300 );

		// Start Exp fix
    		if ($row['character_xp'] > $max_hp)
    		{
            		$exp_percent_width = "300";
    		}
    		else
    		{
      			$exp_percent_width = floor(( $row['character_xp'] / $max_hp) * 300 );
    		}
		// End Exp fix

		// Start Weight bar
		if ( $current_weight != 0 )
		{	
			$weight_percent_width = floor(( $current_weight / $max_weight ) * 300 );
		}
		else
		{	
			$weight_percent_width = 0;
		}

    		if ($current_weight > $max_weight)
    		{
            	$weight_percent_width = "300";
    		}

    		elseif ($current_weight < $max_weight)
    		{
      			$weight_percent_width = floor(( $current_weight / $max_weight) * 300 );
    		}

		elseif ( $current_weight == 0 )
		{	
			$weight_percent_width = 0;
		}
		// End Weight bar

		$skills = adr_get_skill_data('');

		$mining_percent_width = floor(( $row['character_skill_mining_uses'] / $skills[1]['skill_req'] ) * 100 );
		$stone_percent_width = floor(( $row['character_skill_stone_uses'] / $skills[2]['skill_req'] ) * 100 );
		$forge_percent_width = floor(( $row['character_skill_forge_uses'] / $skills[3]['skill_req'] ) * 100 );
		$enchantment_percent_width = floor(( $row['character_skill_enchantment_uses'] / $skills[4]['skill_req'] ) * 100 );
		$trading_percent_width = floor(( $row['character_skill_trading_uses'] / $skills[5]['skill_req'] ) * 100 );
		$thief_percent_width = floor(( $row['character_skill_thief_uses'] / $skills[6]['skill_req'] ) * 100 );

		$sql = " SELECT item_in_shop FROM " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_owner_id = $searchid 
			AND item_in_warehouse = 0 
			AND item_in_shop = 0 ";
		if ( !($result = $db->sql_query($sql)) ) 
		{ 
			message_die(CRITICAL_ERROR, 'Error Getting Adr Users!'); 
		}	
		$items = $db->sql_fetchrowset($result);

		$items_owned = count($items);
		$items_in_inventory = 0;
		$items_in_shop = 0;

		if ( $items_owned )
		{
			for ( $p = 0 ; $p < $items_owned ; $p ++ )
			{
				if ( !$items[$p]['item_in_shop'] ) $items_in_inventory++ ;
				else $items_in_shop++ ;
			}
		}

		$inventory_link = append_sid("adr_character_inventory.$phpEx?" . POST_USERS_URL . "=" . $searchid . "");

		$sql = " SELECT shop_id FROM " . ADR_SHOPS_TABLE . "
			WHERE shop_owner_id = $searchid ";
		if ( !($result = $db->sql_query($sql)) ) 
		{ 
			message_die(CRITICAL_ERROR, 'Error Getting Adr Users!'); 
		}
		$shop = $db->sql_fetchrow($result);

		$shop_link = append_sid("adr_shops.$phpEx?mode=see_shop&amp;shop_id=" . $shop['shop_id'] . "");

		if ( is_numeric($shop['shop_id']))
		{
			$template->assign_block_vars('adr_profile.shop',array());
		}
		else
		{
			$template->assign_block_vars('adr_profile.no_shop',array());
		}
	}

	$template->assign_vars(array(
		'ITEMS_OWNED' => $items_owned,
		'ITEMS_INVENTORY' => $items_in_inventory,
		'ITEMS_SHOP' => $items_in_shop,
		'SHOP_LINK' => $shop_link,
		'INVENTORY_LINK' => $inventory_link,
		'MINING' => $row['character_skill_mining'],
		'MINING_IMG' => $skills[1]['skill_img'],
		'MINING_MIN' => $row['character_skill_mining_uses'],
		'MINING_MAX' => $skills[1]['skill_req'],
		'MINING_BAR' => $mining_percent_width,
		'STONE' => $row['character_skill_stone'],
		'STONE_IMG' => $skills[2]['skill_img'],
		'STONE_MIN' => $row['character_skill_stone_uses'],
		'STONE_MAX' => $skills[2]['skill_req'],
		'STONE_BAR' => $stone_percent_width,
		'FORGE' => $row['character_skill_forge'],
		'FORGE_IMG' => $skills[3]['skill_img'],
		'FORGE_MIN' => $row['character_skill_forge_uses'],
		'FORGE_MAX' => $skills[3]['skill_req'],
		'FORGE_BAR' => $forge_percent_width,
		'ENCHANTMENT' => $row['character_skill_enchantment'],
		'ENCHANTMENT_IMG' => $skills[4]['skill_img'],
		'ENCHANTMENT_MIN' => $row['character_skill_enchantment_uses'],
		'ENCHANTMENT_MAX' => $skills[4]['skill_req'],
		'ENCHANTMENT_BAR' => $enchantment_percent_width,
		'TRADING' => $row['character_skill_trading'],
		'TRADING_IMG' => $skills[5]['skill_img'],
		'TRADING_MIN' => $row['character_skill_trading_uses'],
		'TRADING_MAX' => $skills[5]['skill_req'],
		'TRADING_BAR' => $trading_percent_width,
		'THIEF' => $row['character_skill_thief'],
		'THIEF_IMG' => $skills[6]['skill_img'],
		'THIEF_MIN' => $row['character_skill_thief_uses'],
		'THIEF_MAX' => $skills[6]['skill_req'],
		'THIEF_BAR' => $thief_percent_width,
		'LEVEL' => $row['character_level'],
		'POWER' => $row['character_might'],
		'AGILITY' => $row['character_dexterity'],
		'CONSTIT' => $row['character_constitution'],
		'INT' => $row['character_intelligence'],
		'WIS' => $row['character_wisdom'],
		'CHA' => $row['character_charisma'],
		'POINTS' => $view_userdata['user_points'],
		'HP' => $row['character_hp'],
		'MP' => $row['character_mp'],
		'EXP' => $row['character_xp'],
		'HP_MAX' => $row['character_hp_max'],
		'MP_MAX' => $row['character_mp_max'],
		'EXP_MAX' => $max_hp,
		'WEIGHT' => $current_weight,
		'WEIGHT_MAX' => $max_weight,
		'WEIGHT_PERCENT_WIDTH' => $weight_percent_width,
		'BATTLE_VICTORIES' => number_format($row['character_victories']),
		'BATTLE_DEFEATS' => number_format($row['character_defeats']),
		'BATTLE_FLEES' => number_format($row['character_flees']),
		'BATTLE_VICTORIES_PVP' => number_format($row['character_victories_pvp']),
		'BATTLE_DEFEATS_PVP' => number_format($row['character_defeats_pvp']),
		'BATTLE_FLEES_PVP' => number_format($row['character_flees_pvp']),
		'L_STATS_MONSTER' => $lang['Adr_character_stats_monster'],
		'L_STATS_PVP' => $lang['Adr_character_stats_pvp'],
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
		'L_BIO' => $lang['Adr_character_new_bio'],
		'L_CLASS' => $lang['Adr_character_class'],
		'L_RACE' => $lang['Adr_character_race'],
		'L_ELEMENT' => $lang['Adr_character_element'],
		'L_ALIGNMENT' => $lang['Adr_character_alignment'],
		'L_HEALTH'=> $lang['Adr_character_health'],
		'L_MAGIC' => $lang['Adr_character_magic'],
		'L_EXPERIENCE' => $lang['Adr_character_experience'],
		'L_WEIGHT' => $lang['Adr_character_weight'],	
		'L_AC' => $lang['Adr_character_ac'],
		'L_POWER' => $lang['Adr_character_power'],
		'L_AGILITY' => $lang['Adr_character_agility'],
		'L_CONSTIT' => $lang['Adr_character_endurance'],
		'L_INT' => $lang['Adr_character_intelligence'],
		'L_WIS' => $lang['Adr_character_willpower'],
		'L_CHA' => $lang['Adr_character_charm'],
		'L_POINTS' => $board_config['points_name'],
		'L_BATTLE_STATISTICS' => $lang['Adr_character_battle_statistics'],
		'L_BATTLE_VICTORIES' => $lang['Adr_character_victories'],
		'L_BATTLE_DEFEATS' => $lang['Adr_character_defeats'],
		'L_BATTLE_FLEES' => $lang['Adr_character_flees'],
		'L_BATTLE_SEE' => $lang['Adr_character_battle_history'],
		'L_NAME' => $lang['Adr_races_name'],
		'L_DESC' => $lang['Adr_races_desc'],
		'L_IMG' => $lang['Adr_races_image'],
		'L_LEVEL' => $lang['Adr_character_level'],
		'L_PROGRESS' => $lang['Adr_character_progress'],
		'L_SKILLS' => $lang['Adr_character_skills'],
		'L_CHARACTER_OF' => sprintf ( $lang['Adr_character_of'], $profiledata['username'] ),
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
		'L_NO_CHARACTER' => $lang['Adr_character_lack'],
		'L_ITEMS' => $lang['Adr_items_prefs'],
		'L_COUNT_ITEMS' => $lang['Adr_count_items'],
		'L_COUNT_ITEMS_INVENTORY' => $lang['Adr_count_items_inventory'],
		'L_COUNT_ITEMS_SHOPS' => $lang['Adr_count_items_shop'],
		'L_SEE_INVENTORY' => $lang['Adr_see_inventory'],
		'L_SEE_SHOP' => $lang['Adr_see_shop'],
		'L_NO_SHOP' => $lang['Adr_no_shop'],
		'U_NAME' => append_sid("adr_character.$phpEx?" . POST_USERS_URL . "=" . $profiledata['user_id']),
	));
}

//-- mod : birthday ------------------------------------------------------------
//-- add
$birthday->display_details($profiledata['user_birthday'], $profiledata['user_zodiac']);
//-- fin mod : birthday --------------------------------------------------------

//-- mod : rank color system ---------------------------------------------------
//-- add
$username_color = $rcs->get_colors($profiledata, $profiledata['username']);
//-- fin mod : rank color system -----------------------------------------------
//-- mod : browsers list -------------------------------------------------------
//-- add
display_browser($profiledata['user_browser']);
//-- fin mod : browsers list ---------------------------------------------------
//-- mod : flags ---------------------------------------------------------------
//-- add
display_flag($profiledata['user_flag']);
//-- fin mod : flags -----------------------------------------------------------
$sql = "SELECT owner_id, owner_creature_name FROM " . RABBITOSHI_USERS_TABLE . "
	WHERE owner_id = '".$profiledata['user_id']."' ";
if( !($result = $db->sql_query($sql)) )
{ message_die(GENERAL_ERROR, 'Could not query users pet.', '', __LINE__, __FILE__, $sql); }
$petdata = $db->sql_fetchrow($result);

$user_pet = ( $profiledata['user_id'] != ANONYMOUS ) ? '<a class="gen" href=' .append_sid("rabbitoshi.$phpEx?" . POST_USERS_URL . "=" . $profiledata['user_id']).'>'.$petdata['owner_creature_name'].'</a>' : '';
//
// Generate page
//
$page_title = $lang['Viewing_profile'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);
//-- mod : Attach mod -----------------------------------------------------------
//-- add
display_upload_attach_box_limits($profiledata['user_id']);
//-- fin mod : Attach mod -------------------------------------------------------

if (function_exists('get_html_translation_table'))
{
	$u_search_author = urlencode(strtr($profiledata['username'], array_flip(get_html_translation_table(HTML_ENTITIES))));
}
else
{
	$u_search_author = urlencode(str_replace(array('&amp;', '&#039;', '&quot;', '&lt;', '&gt;'), array('&', "'", '"', '<', '>'), $profiledata['username']));
}

$template->assign_vars(array(

//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
	'USERNAME' => $profiledata['username'],
MOD-*/
//-- add
	'USERNAME' => $username_color,
//-- fin mod : rank color system -----------------------------------------------
	'JOINED' => create_date($lang['DATE_FORMAT'], $profiledata['user_regdate'], $board_config['board_timezone']),
	// Début du mod Karma
 	'KARMA' => $karma,
	'KARMA_IMAGE' => $karma_image,
	// Fin du mod karma
	'POSTER_RANK' => $poster_rank,
	'POSTER_PET' => $user_pet,
	'RANK_IMAGE' => $rank_image,
	'POSTS_PER_DAY' => $posts_per_day,
	'POSTS' => $profiledata['user_posts'],
	'PERCENTAGE' => $percentage . '%', 
	'POST_DAY_STATS' => sprintf($lang['User_post_day_stats'], $posts_per_day), 
	'POST_PERCENT_STATS' => sprintf($lang['User_post_pct_stats'], $percentage), 

	'SEARCH_IMG' => $search_img,
	'SEARCH' => $search,
	'PM_IMG' => $pm_img,
	'PM' => $pm,
	'EMAIL_IMG' => $email_img,
	'EMAIL' => $email,
	'WWW_IMG' => $www_img,
	'WWW' => $www,
	'ICQ_STATUS_IMG' => $icq_status_img,
	'ICQ_IMG' => $icq_img, 
	'ICQ' => $icq, 
	'AIM_IMG' => $aim_img,
	'AIM' => $aim,
	'MSN_IMG' => $msn_img,
	'MSN' => $msn,
	'YIM_IMG' => $yim_img,
	'YIM' => $yim,

	'LOCATION' => ( $profiledata['user_from'] ) ? $profiledata['user_from'] : '&nbsp;',
	'OCCUPATION' => ( $profiledata['user_occ'] ) ? $profiledata['user_occ'] : '&nbsp;',
	'INTERESTS' => ( $profiledata['user_interests'] ) ? $profiledata['user_interests'] : '&nbsp;',
	'AVATAR_IMG' => $avatar_img,

//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
	'L_VIEWING_PROFILE' => sprintf($lang['Viewing_user_profile'], $profiledata['username']),
	'L_ABOUT_USER' => sprintf($lang['About_user'], $profiledata['username']),
MOD-*/
//-- add
	'L_VIEWING_PROFILE' => sprintf($lang['Viewing_user_profile'], $username_color),
	'L_ABOUT_USER' => sprintf($lang['About_user'], $username_color),
//-- fin mod : rank color system -----------------------------------------------
	'L_AVATAR' => $lang['Avatar'], 
	'L_POSTER_RANK' => $lang['Poster_rank'], 
	'L_JOINED' => $lang['Joined'], 
	'L_TOTAL_POSTS' => $lang['Total_posts'], 
//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
	'L_SEARCH_USER_POSTS' => sprintf($lang['Search_user_posts'], $profiledata['username']),
MOD-*/
//-- add
	'L_SEARCH_USER_POSTS' => sprintf($lang['Search_user_posts'], $username_color),
//-- fin mod : rank color system -----------------------------------------------
	'L_CONTACT' => $lang['Contact'],
	'L_EMAIL_ADDRESS' => $lang['Email_address'],
	'L_EMAIL' => $lang['Email'],
	'L_PM' => $lang['Private_Message'],
	'L_ICQ_NUMBER' => $lang['ICQ'],
	'L_YAHOO' => $lang['YIM'],
	'L_AIM' => $lang['AIM'],
	'L_MESSENGER' => $lang['MSNM'],
	'L_WEBSITE' => $lang['Website'],
	'L_LOCATION' => $lang['Location'],
	'L_OCCUPATION' => $lang['Occupation'],
	'L_INTERESTS' => $lang['Interests'],
   'L_ARCADE' => $lang['lib_arcade'],
   'URL_STATS' => '<a class="genmed" href="' . append_sid("statarcade.$phpEx?uid=" . $profiledata['user_id'] ) . '">' . $lang['statuser'] . '</a> ',

	'U_SEARCH_USER' => append_sid("search.$phpEx?search_author=" . $u_search_author),
//
// BEGIN LEVEL MOD
//  
	"HP" => $level_hp, 
	"HP_WIDTH" => $level_hp_percent, 
	"HP_EMPTY" => ( 100 - $level_hp_percent ), 
	"MP" => $level_mp, 
	"MP_WIDTH" => $level_mp_percent, 
	"MP_EMPTY" => ( 100 - $level_mp_percent ), 
	"EXP" => $level_exp, 
	"EXP_WIDTH" => $level_exp_percent, 
	"EXP_EMPTY" => ( 100 - $level_exp_percent ), 
	"LEVEL" => $level_level, 
//
// END LEVEL MOD
//

	'S_PROFILE_ACTION' => append_sid("profile.$phpEx"))
);

// Start Quick Administrator User Options and Information MOD
if ( $userdata['user_level'] == ADMIN )
{
	$template->assign_block_vars('switch_user_admin', array());

	$sql = 'SELECT ban_userid   
		FROM ' . BANLIST_TABLE . ' 
		WHERE ban_userid = ' . $profiledata['user_id'];

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not look up banned status', '', __LINE__, __FILE__, $sql);
	}
	
	if ( $row = $db->sql_fetchrow($result) )
	{
		$banned_username = $row['ban_userid'];
	}
	
	$db->sql_freeresult($result);
	
	$sql = 'SELECT ban_email  
		FROM ' . BANLIST_TABLE . ' 
		WHERE ban_email = "' . $profiledata['user_email'] . '"';

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not look up banned status', '', __LINE__, __FILE__, $sql);
	}
	
	if ( $row = $db->sql_fetchrow($result) )
	{
		$banned_email = $row['ban_email'];
	}

	$db->sql_freeresult($result);
	
	if ( $userdata['session_admin'] )
	{
		$u_edit_profile = "admin/admin_users.$phpEx?" . POST_USERS_URL . '=' . $profiledata['user_id'] . '&amp;mode=edit&amp;returntoprofile=1&amp;sid=' . $userdata['session_id'];
		$u_edit_permissions = "admin/admin_ug_auth.$phpEx?" . POST_USERS_URL . '=' . $profiledata['user_id'] . '&amp;mode=user&amp;returntoprofile=1&amp;sid=' . $userdata['session_id'];
	}
	
	else
	{
		$u_edit_profile = append_sid("login.$phpEx?redirect=admin/admin_users.$phpEx&amp;" . POST_USERS_URL . '=' . $profiledata['user_id'] . '&amp;mode=edit&amp;returntoprofile=1&amp;admin=1');
		$u_edit_permissions = append_sid("login.$phpEx?redirect=admin/admin_ug_auth.$phpEx&amp;" . POST_USERS_URL . '=' . $profiledata['user_id'] . '&amp;mode=user&amp;returntoprofile=1&amp;admin=1');
	}
	
	$template->assign_vars(array(
		'L_QUICK_ADMIN_OPTIONS' => $lang['Quick_admin_options'],
		'L_ADMIN_EDIT_PROFILE' => $lang['Admin_edit_profile'],
		'L_ADMIN_EDIT_PERMISSIONS' => $lang['Admin_edit_permissions'],
		'L_USER_ACTIVE_INACTIVE' => ( $profiledata['user_active'] ) ? $lang['User_active'] : $lang['User_not_active'],
		'L_BANNED_USERNAME' => ( $banned_username ) ? $lang['Username_banned'] : $lang['Username_not_banned'],
		'L_BANNED_EMAIL' => ( $banned_email ) ? sprintf($lang['User_email_banned'], $profiledata['user_email']) : $lang['User_email_not_banned'],
	
		'U_ADMIN_EDIT_PROFILE' => $u_edit_profile,
		'U_ADMIN_EDIT_PERMISSIONS' => $u_edit_permissions,
	));
}
// End Quick Administrator User Options and Information MOD

$cm_viewprofile->post_vars($template,$profiledata,$userdata);
$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
