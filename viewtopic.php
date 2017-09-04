<?php
//-- mod : post icon -------------------------------------------------------------------------------
/***************************************************************************
 *                               viewtopic.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: viewtopic.php,v 1.186.2.45 2005/10/05 17:42:04 grahamje Exp $
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

define('IN_PHPBB', true);
define('IN_CASHMOD', true);
define('CM_VIEWTOPIC', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
//-- mod : post icon -------------------------------------------------------------------------------
//-- add
include($phpbb_root_path . 'includes/def_icons.'. $phpEx);
//-- fin mod : post icon ---------------------------------------------------------------------------

//
// Start initial var setup
//
$topic_id = $post_id = 0;
if ( isset($HTTP_GET_VARS[POST_TOPIC_URL]) )
{
	$topic_id = intval($HTTP_GET_VARS[POST_TOPIC_URL]);
}
else if ( isset($HTTP_GET_VARS['topic']) )
{
	$topic_id = intval($HTTP_GET_VARS['topic']);
}

if ( isset($HTTP_GET_VARS[POST_POST_URL]))
{
	$post_id = intval($HTTP_GET_VARS[POST_POST_URL]);
}


$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;
$start = ($start < 0) ? 0 : $start;

if (!$topic_id && !$post_id)
{
	message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
}

//
// Find topic id if user requested a newer
// or older topic
//
if ( isset($HTTP_GET_VARS['view']) && empty($HTTP_GET_VARS[POST_POST_URL]) )
{
	if ( $HTTP_GET_VARS['view'] == 'newest' )
	{
		if ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid']) || isset($HTTP_GET_VARS['sid']) )
		{
			$session_id = isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid']) ? $HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid'] : $HTTP_GET_VARS['sid'];

			if ( $session_id )
			{
				$sql = "SELECT p.post_id
					FROM " . POSTS_TABLE . " p, " . SESSIONS_TABLE . " s,  " . USERS_TABLE . " u
					WHERE s.session_id = '$session_id'
						AND u.user_id = s.session_user_id
						AND p.topic_id = $topic_id
						AND p.post_time >= u.user_lastvisit
					ORDER BY p.post_time ASC
					LIMIT 1";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not obtain newer/older topic information', '', __LINE__, __FILE__, $sql);
				}

				if ( !($row = $db->sql_fetchrow($result)) )
				{
					message_die(GENERAL_MESSAGE, 'No_new_posts_last_visit');
				}

				$post_id = $row['post_id'];

				if (isset($HTTP_GET_VARS['sid']))
				{
					redirect("viewtopic.$phpEx?sid=$session_id&" . POST_POST_URL . "=$post_id#$post_id");
				}
				else
				{
					redirect("viewtopic.$phpEx?" . POST_POST_URL . "=$post_id#$post_id");
				}
			}
		}

		redirect(append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id", true));
	}
	else if ( $HTTP_GET_VARS['view'] == 'next' || $HTTP_GET_VARS['view'] == 'previous' )
	{
		$sql_condition = ( $HTTP_GET_VARS['view'] == 'next' ) ? '>' : '<';
		$sql_ordering = ( $HTTP_GET_VARS['view'] == 'next' ) ? 'ASC' : 'DESC';

		$sql = "SELECT t.topic_id
			FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2
			WHERE
				t2.topic_id = $topic_id
				AND t.forum_id = t2.forum_id
				AND t.topic_moved_id = 0
				AND t.topic_last_post_id $sql_condition t2.topic_last_post_id
			ORDER BY t.topic_last_post_id $sql_ordering
			LIMIT 1";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Could not obtain newer/older topic information", '', __LINE__, __FILE__, $sql);
		}

		if ( $row = $db->sql_fetchrow($result) )
		{
			$topic_id = intval($row['topic_id']);
		}
		else
		{
			$message = ( $HTTP_GET_VARS['view'] == 'next' ) ? 'No_newer_topics' : 'No_older_topics';
			message_die(GENERAL_MESSAGE, $message);
		}
	}
}

//
// This rather complex gaggle of code handles querying for topics but
// also allows for direct linking to a post (and the calculation of which
// page the post is on and the correct display of viewtopic)
//
$join_sql_table = (!$post_id) ? '' : ", " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2 ";
$join_sql = (!$post_id) ? "t.topic_id = $topic_id" : "p.post_id = $post_id AND t.topic_id = p.topic_id AND p2.topic_id = p.topic_id AND p2.post_id <= $post_id";
$count_sql = (!$post_id) ? '' : ", COUNT(p2.post_id) AS prev_posts";

$order_sql = (!$post_id) ? '' : "GROUP BY p.post_id, t.topic_id, t.topic_title, t.topic_status, t.topic_replies, t.topic_time, t.topic_type, t.topic_vote, t.topic_last_post_id, f.forum_name, f.forum_status, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments ORDER BY p.post_id ASC";

$sql = "SELECT t.topic_id, t.topic_title, t.topic_status, t.topic_replies, t.topic_time, t.topic_type, t.topic_vote, t.topic_last_post_id, f.forum_name, f.forum_status, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments, f.attached_forum_id" . $count_sql . "
	FROM " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f" . $join_sql_table . "
	WHERE $join_sql
		AND f.forum_id = t.forum_id
		$order_sql";
//-- mod : quick post es -------------------------------------------------------
//-- add
$sql = str_replace(', f.forum_id', ', f.forum_id, f.forum_qpes', $sql);
//-- fin mod : quick post es ---------------------------------------------------
//-- mod : Attach mod ---------------------------------------------------------
//-- add
attach_setup_viewtopic_auth($order_sql, $sql);
//-- fin mod : Attach mod -----------------------------------------------------
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain topic information", '', __LINE__, __FILE__, $sql);
}

if ( !($forum_topic_data = $db->sql_fetchrow($result)) )
{
	message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
}

$forum_id = intval($forum_topic_data['forum_id']);

//
// Start session management
//
$userdata = session_pagestart($user_ip, $forum_id);
init_userprefs($userdata);
//
// End session management
//
##=== ADR START: check user if in cell or not ===#
if(($userdata['user_cell_time'] > '0') && (!defined('CELL')) && ($userdata['session_logged_in']) && ($userdata['user_level'] != ADMIN) && ($userdata['user_cell_punishment'] == '3')){
	redirect(append_sid("adr_cell.$phpEx", true));
}
##=== ADR END ===#
//
// Start auth check
//
$is_auth = array();
$is_auth = auth(AUTH_ALL, $forum_id, $userdata, $forum_topic_data);

if( !$is_auth['auth_view'] || !$is_auth['auth_read'] )
{
	if ( !$userdata['session_logged_in'] )
	{
		$redirect = ($post_id) ? POST_POST_URL . "=$post_id" : POST_TOPIC_URL . "=$topic_id";
		$redirect .= ($start) ? "&start=$start" : '';
		redirect(append_sid("login.$phpEx?redirect=viewtopic.$phpEx&$redirect", true));
	}

	$message = ( !$is_auth['auth_view'] ) ? $lang['Topic_post_not_exist'] : sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']);

	message_die(GENERAL_MESSAGE, $message);
}
//
// End auth check
//

// Forum Icon Mod
$sql = "SELECT forum_icon
	FROM " . FORUMS_TABLE . "
	WHERE forum_id = $forum_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
}
$forum_row = $db->sql_fetchrow($result);
$forum_icon = $forum_row['forum_icon'];

$forum_name = $forum_topic_data['forum_name'];
$topic_title = $forum_topic_data['topic_title'];
$topic_id = intval($forum_topic_data['topic_id']);
$topic_time = $forum_topic_data['topic_time'];

if ($post_id)
{
	$start = floor(($forum_topic_data['prev_posts'] - 1) / intval($board_config['posts_per_page'])) * intval($board_config['posts_per_page']);
}

//
// Is user watching this thread?
//
if( $userdata['session_logged_in'] )
{
	$can_watch_topic = TRUE;

	$sql = "SELECT notify_status
		FROM " . TOPICS_WATCH_TABLE . "
		WHERE topic_id = $topic_id
			AND user_id = " . $userdata['user_id'];
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain topic watch information", '', __LINE__, __FILE__, $sql);
	}

	if ( $row = $db->sql_fetchrow($result) )
	{
		if ( isset($HTTP_GET_VARS['unwatch']) )
		{
			if ( $HTTP_GET_VARS['unwatch'] == 'topic' )
			{
				$is_watching_topic = 0;

				$sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
				$sql = "DELETE $sql_priority FROM " . TOPICS_WATCH_TABLE . "
					WHERE topic_id = $topic_id
						AND user_id = " . $userdata['user_id'];
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Could not delete topic watch information", '', __LINE__, __FILE__, $sql);
				}
			}

			$template->assign_vars(array(
				'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">')
			);

			$message = $lang['No_longer_watching'] . '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">', '</a>');
			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			$is_watching_topic = TRUE;

			if ( $row['notify_status'] )
			{
				$sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
				$sql = "UPDATE $sql_priority " . TOPICS_WATCH_TABLE . "
					SET notify_status = 0
					WHERE topic_id = $topic_id
						AND user_id = " . $userdata['user_id'];
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Could not update topic watch information", '', __LINE__, __FILE__, $sql);
				}
			}
		}
	}
	else
	{
		if ( isset($HTTP_GET_VARS['watch']) )
		{
			if ( $HTTP_GET_VARS['watch'] == 'topic' )
			{
				$is_watching_topic = TRUE;

				$sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
				$sql = "INSERT $sql_priority INTO " . TOPICS_WATCH_TABLE . " (user_id, topic_id, notify_status)
					VALUES (" . $userdata['user_id'] . ", $topic_id, 0)";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Could not insert topic watch information", '', __LINE__, __FILE__, $sql);
				}
			}

			$template->assign_vars(array(
				'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">')
			);

			$message = $lang['You_are_watching'] . '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">', '</a>');
			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			$is_watching_topic = 0;
		}
	}
}
else
{
	if ( isset($HTTP_GET_VARS['unwatch']) )
	{
		if ( $HTTP_GET_VARS['unwatch'] == 'topic' )
		{
			redirect(append_sid("login.$phpEx?redirect=viewtopic.$phpEx&" . POST_TOPIC_URL . "=$topic_id&unwatch=topic", true));
		}
	}
	else
	{
		$can_watch_topic = 0;
		$is_watching_topic = 0;
	}
}

//
// Generate a 'Show posts in previous x days' select box. If the postdays var is POSTed
// then get it's value, find the number of topics with dates newer than it (to properly
// handle pagination) and alter the main query
//
//-- mod : addon hide for bbcbxr -----------------------------------------------
//-- add
$valid = false;
if( $userdata['session_logged_in'] )
{
	$sql = 'SELECT p.poster_id, p.topic_id
		FROM ' . POSTS_TABLE . ' p
			WHERE p.topic_id = ' . $topic_id . '
			AND p.poster_id = ' . $userdata['user_id'];
	$hideresult = $db->sql_query($sql);
	$valid = $db->sql_numrows($hideresult) ? true : false;
}
//-- fin mod : addon hide for bbcbxr -------------------------------------------
$previous_days = array(0, 1, 7, 14, 30, 90, 180, 364);
$previous_days_text = array($lang['All_Posts'], $lang['1_Day'], $lang['7_Days'], $lang['2_Weeks'], $lang['1_Month'], $lang['3_Months'], $lang['6_Months'], $lang['1_Year']);

if( !empty($HTTP_POST_VARS['postdays']) || !empty($HTTP_GET_VARS['postdays']) )
{
	$post_days = ( !empty($HTTP_POST_VARS['postdays']) ) ? intval($HTTP_POST_VARS['postdays']) : intval($HTTP_GET_VARS['postdays']);
	$min_post_time = time() - (intval($post_days) * 86400);

	$sql = "SELECT COUNT(p.post_id) AS num_posts
		FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p
		WHERE t.topic_id = $topic_id
			AND p.topic_id = t.topic_id
			AND p.post_time >= $min_post_time";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain limited topics count information", '', __LINE__, __FILE__, $sql);
	}

	$total_replies = ( $row = $db->sql_fetchrow($result) ) ? intval($row['num_posts']) : 0;

	$limit_posts_time = "AND p.post_time >= $min_post_time ";

	if ( !empty($HTTP_POST_VARS['postdays']))
	{
		$start = 0;
	}
}
else
{
	$total_replies = intval($forum_topic_data['topic_replies']) + 1;

	$limit_posts_time = '';
	$post_days = 0;
}

$select_post_days = '<select name="postdays">';
for($i = 0; $i < count($previous_days); $i++)
{
	$selected = ($post_days == $previous_days[$i]) ? ' selected="selected"' : '';
	$select_post_days .= '<option value="' . $previous_days[$i] . '"' . $selected . '>' . $previous_days_text[$i] . '</option>';
}
$select_post_days .= '</select>';

//
// Decide how to order the post display
//
if ( !empty($HTTP_POST_VARS['postorder']) || !empty($HTTP_GET_VARS['postorder']) )
{
	$post_order = (!empty($HTTP_POST_VARS['postorder'])) ? htmlspecialchars($HTTP_POST_VARS['postorder']) : htmlspecialchars($HTTP_GET_VARS['postorder']);
	$post_time_order = ($post_order == "asc") ? "ASC" : "DESC";
}
else
{
	$post_order = 'asc';
	$post_time_order = 'ASC';
}

$select_post_order = '<select name="postorder">';
if ( $post_time_order == 'ASC' )
{
	$select_post_order .= '<option value="asc" selected="selected">' . $lang['Oldest_First'] . '</option><option value="desc">' . $lang['Newest_First'] . '</option>';
}
else
{
	$select_post_order .= '<option value="asc">' . $lang['Oldest_First'] . '</option><option value="desc" selected="selected">' . $lang['Newest_First'] . '</option>';
}
$select_post_order .= '</select>';

//-- Mod : Similar Topics
//-- add
$sql = "SELECT topic_id
FROM ". TOPICS_TABLE ."
WHERE topic_id != $topic_id
AND MATCH (topic_title) AGAINST ('". addslashes($topic_title) ."')
ORDER BY topic_time DESC LIMIT 0,5";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not get main information for similar topics", '', __LINE__, __FILE__, $sql);
}
$topics = array();
while ( $row = $db->sql_fetchrow($result) )
{
  $topics[] = $row;
}
  $count_similar = count($topics);
if ( $count_similar > 0 )
{
  $template->assign_block_vars('similar', array(
         'L_SIMILAR' => $lang['Similar'],
         'L_TOPIC' => $lang['Topic'],
         'L_AUTHOR' => $lang['Author'],
         'L_FORUM' =>  $lang['Forum'],
         'L_REPLIES' => $lang['Replies'],
         'L_LAST_POST' => $lang['Posted'])
  );
  

for($i = 0; $i < $count_similar; $i++)
{
  $sql = "SELECT t.topic_type, t.topic_status, t.topic_id, t.topic_title, t.topic_time, t.topic_replies, t.topic_last_post_id, u.user_id, u.username, f.forum_id, f.forum_name, p.post_time, p.post_username
  FROM ". TOPICS_TABLE ." t, ". USERS_TABLE ." u, ". FORUMS_TABLE ." f, ". POSTS_TABLE ." p
  WHERE t.topic_id = '". $topics[$i]['topic_id'] ."'
  AND f.forum_id = t.forum_id
  AND p.topic_id = t.topic_id 
  AND u.user_id = p.poster_id
  GROUP BY t.topic_id";
 if ( !($result = $db->sql_query($sql)) )
 {
  	message_die(GENERAL_ERROR, "Could not get similar topics", '', __LINE__, __FILE__, $sql);
 }
  
  while ( $row = $db->sql_fetchrow($result) )
  {
   $similar = $row;
   
   $tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_t']) : array();
   $tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_f']) : array();
   $topic_type =  ( $similar['topic_type'] == POST_ANNOUNCE ) ? $lang['Topic_Announcement'] .' ': '';
	 $topic_type .= ( $similar['topic_type'] == POST_STICKY ) ? $lang['Topic_Sticky'] .' ': '';
	 $topic_type .= ( $similar['topic_vote'] ) ? $lang['Topic_Poll'] .' ': '';
   $replies = $similar['topic_replies'];
   
   if( $similar['topic_status'] == TOPIC_LOCKED )
	{
		$folder = $images['folder_locked'];
		$folder_new = $images['folder_locked_new'];
	}
	else if( $similar['topic_type'] == POST_ANNOUNCE )
	{
		$folder = $images['folder_announce'];
		$folder_new = $images['folder_announce_new'];
	}
	else if( $similar['topic_type'] == POST_GLOBAL_ANNOUNCE )
	{
		$folder = $images['folder_global_announce'];
		$folder_new = $images['folder_global_announce_new'];
	}
	else if( $similar['topic_type'] == POST_STICKY )
	{
		$folder = $images['folder_sticky'];
		$folder_new = $images['folder_sticky_new'];
	}
	else
	{
		if( $replies >= $board_config['hot_threshold'] )
		{
			$folder = $images['folder_hot'];
			$folder_new = $images['folder_hot_new'];
		}
		else
		{
			$folder = $images['folder'];
			$folder_new = $images['folder_new'];
		}
	}
  if( $userdata['session_logged_in'] )
	{
		if( $similar['post_time'] > $userdata['user_lastvisit'] ) 
		{
			if( !empty($tracking_topics) || !empty($tracking_forums) || isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_f_all']) )
			{
				$unread_topics = true;
				if( !empty($tracking_topics[$topic_id]) )
				{
					if( $tracking_topics[$topic_id] >= $similar['post_time'] )
					{
						$unread_topics = false;
					}
				}
				if( !empty($tracking_forums[$forum_id]) )
				{
					if( $tracking_forums[$forum_id] >= $similar['post_time'] )
					{
						$unread_topics = false;
					}
				}
				if( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_f_all']) )
				{
					if( $HTTP_COOKIE_VARS[$board_config['cookie_name'] .'_f_all'] >= $similar['post_time'] )
					{
						$unread_topics = false;
					}
				}

				if( $unread_topics )
				{
					$folder_image = $folder_new;
					$folder_alt = $lang['New_posts'];
					$newest_img = '<a href="'. append_sid("viewtopic.$phpEx?". POST_TOPIC_URL ."=$topic_id&amp;view=newest") .'"><img src="'. $images['icon_newest_reply'] .'" alt="'. $lang['View_newest_post'] .'" title="'. $lang['View_newest_post'] .'" border="0" /></a> ';
				}
				else
				{
					$folder_image = $folder;
					$folder_alt = ( $similar['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
					$newest_img = '';
				}
			}
			else
			{
				$folder_image = $folder_new;
				$folder_alt = ( $similar['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['New_posts'];
				$newest_img = '<a href="'. append_sid("viewtopic.$phpEx?". POST_TOPIC_URL ."=$topic_id&amp;view=newest") .'"><img src="'. $images['icon_newest_reply'] .'" alt="'. $lang['View_newest_post'] .'" title="'. $lang['View_newest_post'] .'" border="0" /></a> ';
			}
		}
		else 
		{
			$folder_image = $folder;
			$folder_alt = ( $similar['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
			$newest_img = '';
		}
	}
	else
	{
		$folder_image = $folder;
		$folder_alt = ( $similar['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
		$newest_img = '';
	}

   $title = (strlen($similar['topic_title']) > 40) ? (substr($similar['topic_title'], 0, 37) . '...') : $similar['topic_title']; 
   $topic_url = '<a href="'. append_sid("viewtopic.$phpEx?". POST_TOPIC_URL .'='. $similar['topic_id']) .'">'. $title . '</a>';

   $author_url = append_sid("profile.$phpEx?mode=viewprofile&amp;". POST_USERS_URL .'='. $similar['user_id']);

   $author = ( $similar['user_id'] != ANONYMOUS ) ? '<a href="'. append_sid("profile.$phpEx?mode=viewprofile&amp;". POST_USERS_URL .'='. $similar['user_id']) .'">'. $similar['username'] .'</a>' : ( ($similar['post_username'] != '' ) ? $similar['post_username'] : $lang['Guest'] );
  
   $forum_url = append_sid("viewforum.$phpEx?f=". $similar['forum_id']);  
   $forum = '<a href="'. $forum_url .'">'. $similar['forum_name'] .'</a>';
   $post_url = '<a href="'. append_sid("viewtopic.$phpEx?". POST_POST_URL .'='. $similar['topic_last_post_id']) .'#'. $similar['topic_last_post_id'] .'"><img src="'. $images['icon_latest_reply'] .'" alt="'. $lang['View_latest_post'] .'" title="'. $lang['View_latest_post'] .'" border="0" /></a>';
   $post_time = create_date($board_config['default_dateformat'], $similar['topic_time'], $board_config['board_timezone']);
 
    $template->assign_block_vars('similar.topics', array(
         'FOLDER' => $folder_image,
         'ALT' => $folder_alt,
         'TYPE' => $topic_type,
         'TOPICS' => $topic_url,
         'AUTHOR' => $author,
         'FORUM' => $forum,
         'REPLIES' => $replies,
         'NEWEST' => $newest_img,
         'POST_TIME' => $post_time,
         'POST_URL' => $post_url)
    );
  } // while
 } // for $i
} // if ( $count_similar > 0 )
//--fin mod : Similar Topics

//
// Go ahead and pull all data for this topic
//
$sql = "SELECT u.username, u.user_id, u.user_cell_time, u.user_posts, u.user_from, u.user_website, u.user_email, u.user_icq, u.user_aim, u.user_yim, u.user_regdate, u.user_msnm, u.user_viewemail, u.user_rank, u.user_sig, u.user_sig_bbcode_uid, u.user_avatar, u.user_avatar_type, u.user_allowavatar, u.user_allowsmile, p.*,  pt.post_text, pt.post_subject, pt.bbcode_uid
	FROM " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . POSTS_TEXT_TABLE . " pt
	WHERE p.topic_id = $topic_id
		$limit_posts_time
		AND pt.post_id = p.post_id
		AND u.user_id = p.poster_id
	ORDER BY p.post_time $post_time_order
	LIMIT $start, ".$board_config['posts_per_page'];
//-- mod : flags ---------------------------------------------------------------
//-- add
$sql = str_replace('SELECT ', 'SELECT u.user_flag, ', $sql);
//-- fin mod : flags -----------------------------------------------------------
//-- mod : browsers list -------------------------------------------------------
//-- add
$sql = str_replace('SELECT ', 'SELECT u.user_browser, ', $sql);
//-- fin mod : browsers list ---------------------------------------------------
$cm_viewtopic->generate_columns($template,$forum_id,$sql);
//-- mod : rank color system ---------------------------------------------------
//-- add
$sql = str_replace('SELECT ', 'SELECT u.user_level, u.user_color, u.user_group_id, ', $sql);
//-- fin mod : rank color system -----------------------------------------------
//-- mod : birthday ------------------------------------------------------------
//-- add
$sql = str_replace('SELECT ', 'SELECT u.user_birthday, u.user_zodiac, ', $sql);
//-- fin mod : birthday --------------------------------------------------------
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain post/user information.", '', __LINE__, __FILE__, $sql);
}

$postrow = array();
if ($row = $db->sql_fetchrow($result))
{
	do
	{
		$postrow[] = $row;
	}
	while ($row = $db->sql_fetchrow($result));
	$db->sql_freeresult($result);

	$total_posts = count($postrow);
}
else 
{ 
   include($phpbb_root_path . 'includes/functions_admin.' . $phpEx); 
   sync('topic', $topic_id); 

   message_die(GENERAL_MESSAGE, $lang['No_posts_topic']); 
} 

$resync = FALSE; 
if ($forum_topic_data['topic_replies'] + 1 < $start + count($postrow)) 
{ 
   $resync = TRUE; 
} 
elseif ($start + $board_config['posts_per_page'] > $forum_topic_data['topic_replies']) 
{ 
   $row_id = intval($forum_topic_data['topic_replies']) % intval($board_config['posts_per_page']); 
   if ($postrow[$row_id]['post_id'] != $forum_topic_data['topic_last_post_id'] || $start + count($postrow) < $forum_topic_data['topic_replies']) 
   { 
      $resync = TRUE; 
   } 
} 
elseif (count($postrow) < $board_config['posts_per_page']) 
{ 
   $resync = TRUE; 
} 

if ($resync) 
{ 
   include($phpbb_root_path . 'includes/functions_admin.' . $phpEx); 
   sync('topic', $topic_id); 

   $result = $db->sql_query('SELECT COUNT(post_id) AS total FROM ' . POSTS_TABLE . ' WHERE topic_id = ' . $topic_id); 
   $row = $db->sql_fetchrow($result); 
   $total_replies = $row['total']; 
}

$sql = "SELECT *
	FROM " . RANKS_TABLE . "
	ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain ranks information.", '', __LINE__, __FILE__, $sql);
}

$ranksrow = array();
while ( $row = $db->sql_fetchrow($result) )
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);

//
// Define censored word matches
//
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);

//
// Censor topic title
//
if ( count($orig_word) )
{
	$topic_title = preg_replace($orig_word, $replacement_word, $topic_title);
}

//
// Was a highlight request part of the URI?
//
$highlight_match = $highlight = '';
if (isset($HTTP_GET_VARS['highlight']))
{
	// Split words and phrases
	$words = explode(' ', trim(htmlspecialchars($HTTP_GET_VARS['highlight'])));

	for($i = 0; $i < sizeof($words); $i++)
	{
		if (trim($words[$i]) != '')
		{
			$highlight_match .= (($highlight_match != '') ? '|' : '') . str_replace('*', '\w*', preg_quote($words[$i], '#'));
		}
	}
	unset($words);

	$highlight = urlencode($HTTP_GET_VARS['highlight']);
	$highlight_match = phpbb_rtrim($highlight_match, "\\");
}

//
// Post, reply and other URL generation for
// templating vars
//
$new_topic_url = append_sid("posting.$phpEx?mode=newtopic&amp;" . POST_FORUM_URL . "=$forum_id");
$reply_topic_url = append_sid("posting.$phpEx?mode=reply&amp;" . POST_TOPIC_URL . "=$topic_id");
$view_forum_url = append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id");
$view_prev_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=previous");
$view_next_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=next");

//
// Mozilla navigation bar
//
$nav_links['prev'] = array(
	'url' => $view_prev_topic_url,
	'title' => $lang['View_previous_topic']
);
$nav_links['next'] = array(
	'url' => $view_next_topic_url,
	'title' => $lang['View_next_topic']
);
$nav_links['up'] = array(
	'url' => $view_forum_url,
	'title' => $forum_name
);

$reply_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $images['reply_locked'] : $images['reply_new'];
$reply_alt = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['Reply_to_topic'];
$post_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $images['post_locked'] : $images['post_new'];
$post_alt = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['Post_new_topic'];

//
// Set a cookie for this topic
//
if ( $userdata['session_logged_in'] )
{
	$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) : array();
	$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) : array();

	if ( !empty($tracking_topics[$topic_id]) && !empty($tracking_forums[$forum_id]) )
	{
		$topic_last_read = ( $tracking_topics[$topic_id] > $tracking_forums[$forum_id] ) ? $tracking_topics[$topic_id] : $tracking_forums[$forum_id];
	}
	else if ( !empty($tracking_topics[$topic_id]) || !empty($tracking_forums[$forum_id]) )
	{
		$topic_last_read = ( !empty($tracking_topics[$topic_id]) ) ? $tracking_topics[$topic_id] : $tracking_forums[$forum_id];
	}
	else
	{
		$topic_last_read = $userdata['user_lastvisit'];
	}

	if ( count($tracking_topics) >= 150 && empty($tracking_topics[$topic_id]) )
	{
		asort($tracking_topics);
		unset($tracking_topics[key($tracking_topics)]);
	}

	$tracking_topics[$topic_id] = time();

	setcookie($board_config['cookie_name'] . '_t', serialize($tracking_topics), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
}

//
// Load templates
//
$template->set_filenames(array(
	'body' => 'viewtopic_body.tpl')
);
if (intval($forum_topic_data['attached_forum_id'])>0)
{
	$parent_lookup=intval($forum_topic_data['attached_forum_id']);
}
make_jumpbox('viewforum.'.$phpEx, $forum_id);

//
// Output page header
//
$page_title = $lang['View_topic'] .' - ' . $topic_title;
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

//-- mod : quick post es -------------------------------------------------------
//-- add
$forum_qpes = intval($forum_topic_data['forum_qpes']);
if (!empty($forum_qpes))
{
	include($phpbb_root_path . 'qpes.' . $phpEx);
}
//-- fin mod : quick post es ---------------------------------------------------

//
// User authorisation levels output
//
$s_auth_can = ( ( $is_auth['auth_post'] ) ? $lang['Rules_post_can'] : $lang['Rules_post_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_reply'] ) ? $lang['Rules_reply_can'] : $lang['Rules_reply_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_edit'] ) ? $lang['Rules_edit_can'] : $lang['Rules_edit_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_delete'] ) ? $lang['Rules_delete_can'] : $lang['Rules_delete_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_vote'] ) ? $lang['Rules_vote_can'] : $lang['Rules_vote_cannot'] ) . '<br />';

//-- mod : Attach mod ----------------------------------------------------------------
//-- add
attach_build_auth_levels($is_auth, $s_auth_can);
//-- fin mod : Attach mod -----------------------------------------------------------

$topic_mod = '';

if ( $is_auth['auth_mod'] )
{
	$s_auth_can .= sprintf($lang['Rules_moderate'], "<a href=\"modcp.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;sid=" . $userdata['session_id'] . '">', '</a>');

	$topic_mod .= "<a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=delete&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_mod_delete'] . '" alt="' . $lang['Delete_topic'] . '" title="' . $lang['Delete_topic'] . '" border="0" /></a>&nbsp;';

	$topic_mod .= "<a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=move&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_mod_move'] . '" alt="' . $lang['Move_topic'] . '" title="' . $lang['Move_topic'] . '" border="0" /></a>&nbsp;';

	$topic_mod .= ( $forum_topic_data['topic_status'] == TOPIC_UNLOCKED ) ? "<a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=lock&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_mod_lock'] . '" alt="' . $lang['Lock_topic'] . '" title="' . $lang['Lock_topic'] . '" border="0" /></a>&nbsp;' : "<a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=unlock&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_mod_unlock'] . '" alt="' . $lang['Unlock_topic'] . '" title="' . $lang['Unlock_topic'] . '" border="0" /></a>&nbsp;';

	$topic_mod .= "<a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=split&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_mod_split'] . '" alt="' . $lang['Split_topic'] . '" title="' . $lang['Split_topic'] . '" border="0" /></a>&nbsp;';
}

//
// Topic watch information
//
$s_watching_topic = '';
if ( $can_watch_topic )
{
	if ( $is_watching_topic )
	{
		$s_watching_topic = "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;unwatch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '">' . $lang['Stop_watching_topic'] . '</a>';
		$s_watching_topic_img = ( isset($images['topic_un_watch']) ) ? "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;unwatch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_un_watch'] . '" alt="' . $lang['Stop_watching_topic'] . '" title="' . $lang['Stop_watching_topic'] . '" border="0"></a>' : '';
	}
	else
	{
		$s_watching_topic = "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;watch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '">' . $lang['Start_watching_topic'] . '</a>';
		$s_watching_topic_img = ( isset($images['Topic_watch']) ) ? "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;watch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['Topic_watch'] . '" alt="' . $lang['Start_watching_topic'] . '" title="' . $lang['Start_watching_topic'] . '" border="0"></a>' : '';
	}
}

//
// If we've got a hightlight set pass it on to pagination,
// I get annoyed when I lose my highlight after the first page.
//
$pagination = ( $highlight != '' ) ? generate_pagination("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight", $total_replies, $board_config['posts_per_page'], $start) : generate_pagination("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order", $total_replies, $board_config['posts_per_page'], $start);

//
// Send vars to template
//
$template->assign_vars(array(
	'FORUM_ID' => $forum_id,
    'FORUM_NAME' => $forum_name,
	'FORUM_ICON_IMG' => ($forum_icon) ? '<img src="' . $phpbb_root_path . $forum_icon . '" alt="'.$forum_name.'" title="'.$forum_name.'" />&nbsp;' : '',	// Forum Icon Mod
    'TOPIC_ID' => $topic_id,
    'TOPIC_TITLE' => $topic_title,
	'PAGINATION' => $pagination,
	'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / intval($board_config['posts_per_page']) ) + 1 ), ceil( $total_replies / intval($board_config['posts_per_page']) )),

	'POST_IMG' => $post_img,
	'REPLY_IMG' => $reply_img,

	'L_AUTHOR' => $lang['Author'],
	'L_MESSAGE' => $lang['Message'],
	'L_POSTED' => $lang['Posted'],
	'L_POST_SUBJECT' => $lang['Post_subject'],
	'L_VIEW_NEXT_TOPIC' => $lang['View_next_topic'],
	'L_VIEW_PREVIOUS_TOPIC' => $lang['View_previous_topic'],
	'L_POST_NEW_TOPIC' => $post_alt,
	'L_POST_REPLY_TOPIC' => $reply_alt,
	'L_BACK_TO_TOP' => $lang['Back_to_top'],
	'L_DISPLAY_POSTS' => $lang['Display_posts'],
	'L_LOCK_TOPIC' => $lang['Lock_topic'],
	'L_UNLOCK_TOPIC' => $lang['Unlock_topic'],
	'L_MOVE_TOPIC' => $lang['Move_topic'],
	'L_SPLIT_TOPIC' => $lang['Split_topic'],
	'L_DELETE_TOPIC' => $lang['Delete_topic'],
	'L_GOTO_PAGE' => $lang['Goto_page'],

	'S_TOPIC_LINK' => POST_TOPIC_URL,
	'S_SELECT_POST_DAYS' => $select_post_days,
	'S_SELECT_POST_ORDER' => $select_post_order,
	'S_POST_DAYS_ACTION' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . '=' . $topic_id . "&amp;start=$start"),
	'S_AUTH_LIST' => $s_auth_can,
	'S_TOPIC_ADMIN' => $topic_mod,
	'S_WATCH_TOPIC' => $s_watching_topic,
	'S_WATCH_TOPIC_IMG' => $s_watching_topic_img,

	'U_VIEW_TOPIC' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight"),
	'U_VIEW_FORUM' => $view_forum_url,
	'U_VIEW_OLDER_TOPIC' => $view_prev_topic_url,
	'U_VIEW_NEWER_TOPIC' => $view_next_topic_url,
	'U_POST_NEW_TOPIC' => $new_topic_url,
	'U_POST_REPLY_TOPIC' => $reply_topic_url)
);

//
// Does this topic contain a poll?
//
if ( !empty($forum_topic_data['topic_vote']) )
{
	$s_hidden_fields = '';

	$sql = "SELECT vd.vote_id, vd.vote_text, vd.vote_start, vd.vote_length, vr.vote_option_id, vr.vote_option_text, vr.vote_result
		FROM " . VOTE_DESC_TABLE . " vd, " . VOTE_RESULTS_TABLE . " vr
		WHERE vd.topic_id = $topic_id
			AND vr.vote_id = vd.vote_id
		ORDER BY vr.vote_option_id ASC";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain vote data for this topic", '', __LINE__, __FILE__, $sql);
	}

	if ( $vote_info = $db->sql_fetchrowset($result) )
	{
		$db->sql_freeresult($result);
		$vote_options = count($vote_info);

		$vote_id = $vote_info[0]['vote_id'];
		$vote_title = $vote_info[0]['vote_text'];

		$sql = "SELECT vote_id
			FROM " . VOTE_USERS_TABLE . "
			WHERE vote_id = $vote_id
				AND vote_user_id = " . intval($userdata['user_id']);
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Could not obtain user vote data for this topic", '', __LINE__, __FILE__, $sql);
		}

		$user_voted = ( $row = $db->sql_fetchrow($result) ) ? TRUE : 0;
		$db->sql_freeresult($result);

		if ( isset($HTTP_GET_VARS['vote']) || isset($HTTP_POST_VARS['vote']) )
		{
			$view_result = ( ( ( isset($HTTP_GET_VARS['vote']) ) ? $HTTP_GET_VARS['vote'] : $HTTP_POST_VARS['vote'] ) == 'viewresult' ) ? TRUE : 0;
		}
		else
		{
			$view_result = 0;
		}

		$poll_expired = ( $vote_info[0]['vote_length'] ) ? ( ( $vote_info[0]['vote_start'] + $vote_info[0]['vote_length'] < time() ) ? TRUE : 0 ) : 0;

		if ( $user_voted || $view_result || $poll_expired || !$is_auth['auth_vote'] || $forum_topic_data['topic_status'] == TOPIC_LOCKED )
		{
			$template->set_filenames(array(
				'pollbox' => 'viewtopic_poll_result.tpl')
			);

			$vote_results_sum = 0;

			for($i = 0; $i < $vote_options; $i++)
			{
				$vote_results_sum += $vote_info[$i]['vote_result'];
			}

			$vote_graphic = 0;
			$vote_graphic_max = count($images['voting_graphic']);

			for($i = 0; $i < $vote_options; $i++)
			{
				$vote_percent = ( $vote_results_sum > 0 ) ? $vote_info[$i]['vote_result'] / $vote_results_sum : 0;
				$vote_graphic_length = round($vote_percent * $board_config['vote_graphic_length']);

				$vote_graphic_img = $images['voting_graphic'][$vote_graphic];
				$vote_graphic = ($vote_graphic < $vote_graphic_max - 1) ? $vote_graphic + 1 : 0;

				if ( count($orig_word) )
				{
					$vote_info[$i]['vote_option_text'] = preg_replace($orig_word, $replacement_word, $vote_info[$i]['vote_option_text']);
				}

				$template->assign_block_vars("poll_option", array(
					'POLL_OPTION_CAPTION' => $vote_info[$i]['vote_option_text'],
					'POLL_OPTION_RESULT' => $vote_info[$i]['vote_result'],
					'POLL_OPTION_PERCENT' => sprintf("%.1d%%", ($vote_percent * 100)),

					'POLL_OPTION_IMG' => $vote_graphic_img,
					'POLL_OPTION_IMG_WIDTH' => $vote_graphic_length)
				);
			}

			$template->assign_vars(array(
				'L_TOTAL_VOTES' => $lang['Total_votes'],
				'TOTAL_VOTES' => $vote_results_sum)
			);

		}
		else
		{
			$template->set_filenames(array(
				'pollbox' => 'viewtopic_poll_ballot.tpl')
			);

			for($i = 0; $i < $vote_options; $i++)
			{
				if ( count($orig_word) )
				{
					$vote_info[$i]['vote_option_text'] = preg_replace($orig_word, $replacement_word, $vote_info[$i]['vote_option_text']);
				}

				$template->assign_block_vars("poll_option", array(
					'POLL_OPTION_ID' => $vote_info[$i]['vote_option_id'],
					'POLL_OPTION_CAPTION' => $vote_info[$i]['vote_option_text'])
				);
			}

			$template->assign_vars(array(
				'L_SUBMIT_VOTE' => $lang['Submit_vote'],
				'L_VIEW_RESULTS' => $lang['View_results'],

				'U_VIEW_RESULTS' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;vote=viewresult"))
			);

			$s_hidden_fields = '<input type="hidden" name="topic_id" value="' . $topic_id . '" /><input type="hidden" name="mode" value="vote" />';
		}

		if ( count($orig_word) )
		{
			$vote_title = preg_replace($orig_word, $replacement_word, $vote_title);
		}

		$s_hidden_fields .= '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" />';

		$template->assign_vars(array(
			'POLL_QUESTION' => $vote_title,

			'S_HIDDEN_FIELDS' => $s_hidden_fields,
			'S_POLL_ACTION' => append_sid("posting.$phpEx?mode=vote&amp;" . POST_TOPIC_URL . "=$topic_id"))
		);

		$template->assign_var_from_handle('POLL_DISPLAY', 'pollbox');
	}
}

//-- mod : Attach mod -------------------------------------------------
//-- add
init_display_post_attachments($forum_topic_data['topic_attachment']);
//-- fin mod : Attach mod ----------------------------------------------

//
// Update the topic view counter
//
$sql = "UPDATE " . TOPICS_TABLE . "
	SET topic_views = topic_views + 1
	WHERE topic_id = $topic_id";
if ( !$db->sql_query($sql) )
{
	message_die(GENERAL_ERROR, "Could not update topic views.", '', __LINE__, __FILE__, $sql);
}
#==== Get all adr info OUTSIDE the looping array, so it doesn't keep adding up SQL's. We can use the
#==== info from the array later in the loop below. I'm gonna add my name for faster finding later.
$adr_topic_info_char 	= adr_get_posters_char_info();
$adr_topic_info_race 	= adr_get_posters_races_info();
$adr_topic_info_elem 	= adr_get_posters_elements_info();
$adr_topic_info_clas 	= adr_get_posters_class_info();
$adr_topic_info_alig 	= adr_get_posters_alignment_info();
$adr_topic_info_pvp	= adr_get_posters_pvp_info();
$adr_topic_info_adr	= adr_get_posters_adr_info();
#==== Added By aUsTiN
//
// Okay, let's do the loop, yeah come on baby let's do the loop
// and it goes like this ...
//
for($i = 0; $i < $total_posts; $i++)
{
	$poster_id = $postrow[$i]['user_id'];
	$poster = ( $poster_id == ANONYMOUS ) ? $lang['Guest'] : $postrow[$i]['username'];
//-- mod : flags ---------------------------------------------------------------
//-- add
	$poster_flag = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $postrow[$i]['user_flag'] : '';
//-- fin mod : flags -----------------------------------------------------------
//-- mod : browsers list -------------------------------------------------------
//-- add
	$poster_browser = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $postrow[$i]['user_browser'] : '';
//-- fin mod : browsers list ---------------------------------------------------

//-- mod : birthday ------------------------------------------------------------
//-- add
	$poster_birthday = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $postrow[$i]['user_birthday'] : '';
	$poster_zodiac = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $postrow[$i]['user_zodiac'] : '';
//-- fin mod : birthday --------------------------------------------------------

	$post_date = create_date($board_config['default_dateformat'], $postrow[$i]['post_time'], $board_config['board_timezone']);
	//
    	// MOD - TODAY AT - BEGIN
	//
	if ( $board_config['time_today'] < $postrow[$i]['post_time'])
	{ 
		$post_date = sprintf($lang['Today_at'], create_date($board_config['default_timeformat'], $postrow[$i]['post_time'], $board_config['board_timezone'])); 
	}
	else if ( $board_config['time_yesterday'] < $postrow[$i]['post_time'])
	{ 
		$post_date = sprintf($lang['Yesterday_at'], create_date($board_config['default_timeformat'], $postrow[$i]['post_time'], $board_config['board_timezone'])); 
	}
    	// MOD - TODAY AT - END

	$poster_posts = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Posts'] . ': ' . $postrow[$i]['user_posts'] : '';

	$poster_from = ( $postrow[$i]['user_from'] && $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Location'] . ': ' . $postrow[$i]['user_from'] : '';

	$poster_joined = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Joined'] . ': ' . create_date($lang['DATE_FORMAT'], $postrow[$i]['user_regdate'], $board_config['board_timezone']) : '';

	$poster_pet = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $board_config['rabbitoshi_name'] .': <a class="gensmall" href=' .append_sid("rabbitoshi.$phpEx?" . POST_USERS_URL . "=" . $postrow[$i]['user_id']).'>'.$lang['Profile'].'</a>' : '';


	$poster_avatar = '';
	if ( $postrow[$i]['user_avatar_type'] && $poster_id != ANONYMOUS && $postrow[$i]['user_allowavatar'] )
	{
		switch( $postrow[$i]['user_avatar_type'] )
		{
			case USER_AVATAR_UPLOAD:
				$poster_avatar = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$poster_avatar = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$poster_avatar = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
		}
	}

	//
	// Define the little post icon
	//
	if ( $userdata['session_logged_in'] && $postrow[$i]['post_time'] > $userdata['user_lastvisit'] && $postrow[$i]['post_time'] > $topic_last_read )
	{
		$mini_post_img = $images['icon_minipost_new'];
		$mini_post_alt = $lang['New_post'];
	}
	else
	{
		$mini_post_img = $images['icon_minipost'];
		$mini_post_alt = $lang['Post'];
	}

	$mini_post_url = append_sid("viewtopic.$phpEx?" . POST_POST_URL . '=' . $postrow[$i]['post_id']) . '#' . $postrow[$i]['post_id'];

	//
	// Generate ranks, set them to empty string initially.
	//
	$poster_rank = '';
	$rank_image = '';
	if ( $postrow[$i]['user_id'] == ANONYMOUS )
	{
	}
	else if ( $postrow[$i]['user_rank'] )
	{
		for($j = 0; $j < count($ranksrow); $j++)
		{
			if ( $postrow[$i]['user_rank'] == $ranksrow[$j]['rank_id'] && $ranksrow[$j]['rank_special'] )
			{
				$poster_rank = $ranksrow[$j]['rank_title'];
				$rank_image = ( $ranksrow[$j]['rank_image'] ) ? '<img src="' . $ranksrow[$j]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
			}
		}
	}
	else
	{
		for($j = 0; $j < count($ranksrow); $j++)
		{
			if ( $postrow[$i]['user_posts'] >= $ranksrow[$j]['rank_min'] && !$ranksrow[$j]['rank_special'] )
			{
				$poster_rank = $ranksrow[$j]['rank_title'];
				$rank_image = ( $ranksrow[$j]['rank_image'] ) ? '<img src="' . $ranksrow[$j]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
			}
		}
	}

	//
	// Handle anon users posting with usernames
	//
	if ( $poster_id == ANONYMOUS && $postrow[$i]['post_username'] != '' )
	{
		$poster = $postrow[$i]['post_username'];
		$poster_rank = $lang['Guest'];
	}

	$temp_url = '';

	if ( $poster_id != ANONYMOUS )
	{
		$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$poster_id");
		$profile_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_profile'] . '" alt="' . $lang['Read_profile'] . '" title="' . $lang['Read_profile'] . '" border="0" /></a>';
		$profile = '<a href="' . $temp_url . '">' . $lang['Read_profile'] . '</a>';

		$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$poster_id");
		$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
		$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';

		if ( !empty($postrow[$i]['user_viewemail']) || $is_auth['auth_mod'] )
		{
			$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $poster_id) : 'mailto:' . $postrow[$i]['user_email'];

			$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
			$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
		}
		else
		{
			$email_img = '';
			$email = '';
		}

		$www_img = ( $postrow[$i]['user_website'] ) ? '<a href="' . $postrow[$i]['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '';
		$www = ( $postrow[$i]['user_website'] ) ? '<a href="' . $postrow[$i]['user_website'] . '" target="_userwww">' . $lang['Visit_website'] . '</a>' : '';

		if ( !empty($postrow[$i]['user_icq']) )
		{
			$icq_status_img = '<a href="http://wwp.icq.com/' . $postrow[$i]['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $postrow[$i]['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
			$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $postrow[$i]['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
			$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $postrow[$i]['user_icq'] . '">' . $lang['ICQ'] . '</a>';
		}
		else
		{
			$icq_status_img = '';
			$icq_img = '';
			$icq = '';
		}

		$aim_img = ( $postrow[$i]['user_aim'] ) ? '<a href="aim:goim?screenname=' . $postrow[$i]['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '';
		$aim = ( $postrow[$i]['user_aim'] ) ? '<a href="aim:goim?screenname=' . $postrow[$i]['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '';

		$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$poster_id");
		$msn_img = ( $postrow[$i]['user_msnm'] ) ? '<a href="' . $temp_url . '"><img src="' . $images['icon_msnm'] . '" alt="' . $lang['MSNM'] . '" title="' . $lang['MSNM'] . '" border="0" /></a>' : '';
		$msn = ( $postrow[$i]['user_msnm'] ) ? '<a href="' . $temp_url . '">' . $lang['MSNM'] . '</a>' : '';

		$yim_img = ( $postrow[$i]['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $postrow[$i]['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
		$yim = ( $postrow[$i]['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $postrow[$i]['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';
	}
	else
	{
		$profile_img = '';
		$profile = '';
		$pm_img = '';
		$pm = '';
		$email_img = '';
		$email = '';
		$www_img = '';
		$www = '';
		$icq_status_img = '';
		$icq_img = '';
		$icq = '';
		$aim_img = '';
		$aim = '';
		$msn_img = '';
		$msn = '';
		$yim_img = '';
		$yim = '';
	}

	$temp_url = append_sid("posting.$phpEx?mode=quote&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
	$quote_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_quote'] . '" alt="' . $lang['Reply_with_quote'] . '" title="' . $lang['Reply_with_quote'] . '" border="0" /></a>';
	$quote = '<a href="' . $temp_url . '">' . $lang['Reply_with_quote'] . '</a>';
	
//-- mod : quick post es -------------------------------------------------------
//-- add
	$qp_quote_img = (!empty($qp_form) && empty($qp_lite)) ? '&nbsp;<img alt="' . $lang['Reply_with_quote'] . '" src="' . $images['qp_quote'] . '" title="' . $lang['Reply_with_quote'] . '" onmousedown="addquote(' . $postrow[$i]['post_id'] . ', \'' . str_replace('\'', '\\\'', (($poster_id == ANONYMOUS) ? (($postrow[$i]['post_username'] != '') ? $postrow[$i]['post_username'] : $lang['Guest']) : $postrow[$i]['username'])) . '\')" style="cursor:pointer;" border="0" />' : '';
//-- fin mod : quick post es ---------------------------------------------------

	$temp_url = append_sid("search.$phpEx?search_author=" . urlencode($postrow[$i]['username']) . "&amp;showresults=posts");
	$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . sprintf($lang['Search_user_posts'], $postrow[$i]['username']) . '" title="' . sprintf($lang['Search_user_posts'], $postrow[$i]['username']) . '" border="0" /></a>';
	$search = '<a href="' . $temp_url . '">' . sprintf($lang['Search_user_posts'], $postrow[$i]['username']) . '</a>';

	if ( ( $userdata['user_id'] == $poster_id && $is_auth['auth_edit'] ) || $is_auth['auth_mod'] )
	{
		$temp_url = append_sid("posting.$phpEx?mode=editpost&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
		$edit_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_edit'] . '" alt="' . $lang['Edit_delete_post'] . '" title="' . $lang['Edit_delete_post'] . '" border="0" /></a>';
		$edit = '<a href="' . $temp_url . '">' . $lang['Edit_delete_post'] . '</a>';
	}
	else
	{
		$edit_img = '';
		$edit = '';
	}

	if ( $is_auth['auth_mod'] )
	{
		$temp_url = "modcp.$phpEx?mode=ip&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;" . POST_TOPIC_URL . "=" . $topic_id . "&amp;sid=" . $userdata['session_id'];
		$ip_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_ip'] . '" alt="' . $lang['View_IP'] . '" title="' . $lang['View_IP'] . '" border="0" /></a>';
		$ip = '<a href="' . $temp_url . '">' . $lang['View_IP'] . '</a>';

		$temp_url = "posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;sid=" . $userdata['session_id'];
		$delpost_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete_post'] . '" title="' . $lang['Delete_post'] . '" border="0" /></a>';
		$delpost = '<a href="' . $temp_url . '">' . $lang['Delete_post'] . '</a>';
	}
	else
	{
		$ip_img = '';
		$ip = '';

		if ( $userdata['user_id'] == $poster_id && $is_auth['auth_delete'] && $forum_topic_data['topic_last_post_id'] == $postrow[$i]['post_id'] )
		{
			$temp_url = "posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;sid=" . $userdata['session_id'];
			$delpost_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete_post'] . '" title="' . $lang['Delete_post'] . '" border="0" /></a>';
			$delpost = '<a href="' . $temp_url . '">' . $lang['Delete_post'] . '</a>';
		}
		else
		{
			$delpost_img = '';
			$delpost = '';
		}
	}

	$post_subject = ( $postrow[$i]['post_subject'] != '' ) ? $postrow[$i]['post_subject'] : '';

	$message = $postrow[$i]['post_text'];
	$bbcode_uid = $postrow[$i]['bbcode_uid'];

	$user_sig = ( $postrow[$i]['enable_sig'] && $postrow[$i]['user_sig'] != '' && $board_config['allow_sig'] ) ? $postrow[$i]['user_sig'] : '';
	$user_sig_bbcode_uid = $postrow[$i]['user_sig_bbcode_uid'];
	#==== Removed By aUsTiN
	#$adr_topic_box = adr_display_poster_infos($postrow[$i]['user_id'], $userdata['user_id']);
	if(($postrow[$i]['user_id'] != ANONYMOUS) && ($postrow[$i]['user_adr_ban'] != '1'))
		$adr_topic_box = adr_display_poster_infos($postrow[$i]['user_id'], $adr_topic_info_char, $adr_topic_info_race, $adr_topic_info_elem, $adr_topic_info_clas, $adr_topic_info_alig, $adr_topic_info_pvp, $adr_topic_info_adr, $adr_topic_info_jobs, $postrow[$i]['user_cell_time']);
	#==== Added By aUsTiN

	//
	// Note! The order used for parsing the message _is_ important, moving things around could break any
	// output
	//

	//
	// If the board has HTML off but the post has HTML
	// on then we process it, else leave it alone
	//
	if ( !$board_config['allow_html'] || !$userdata['user_allowhtml'])
	{
		if ( $user_sig != '' )
		{
			$user_sig = preg_replace('#(<)([\/]?.*?)(>)#is', "&lt;\\2&gt;", $user_sig);
		}

		if ( $postrow[$i]['enable_html'] )
		{
			$message = preg_replace('#(<)([\/]?.*?)(>)#is', "&lt;\\2&gt;", $message);
		}
	}

	//
	// Parse message and/or sig for BBCode if reqd
	//
	if ($user_sig != '' && $user_sig_bbcode_uid != '')
	{
		$user_sig = ($board_config['allow_bbcode']) ? bbencode_second_pass($user_sig, $user_sig_bbcode_uid) : preg_replace("/\:$user_sig_bbcode_uid/si", '', $user_sig);
//-- mod : addon hide for bbcbxr -----------------------------------------------
//-- add
		$user_sig = bbencode_third_pass($user_sig, $user_sig_bbcode_uid, $valid);
//-- fin mod : addon hide for bbcbxr -------------------------------------------
	}

	if ($bbcode_uid != '')
	{
		$message = ($board_config['allow_bbcode']) ? bbencode_second_pass($message, $bbcode_uid) : preg_replace("/\:$bbcode_uid/si", '', $message);
	}
//-- mod : addon hide for bbcbxr -----------------------------------------------
//-- add
		$message = bbencode_third_pass($message, $bbcode_uid, $valid);
//-- fin mod : addon hide for bbcbxr -------------------------------------------

	if ( $user_sig != '' )
	{
		$user_sig = make_clickable($user_sig);
	}
	$message = make_clickable($message);

	//
	// Parse smilies
	//
	if ( $board_config['allow_smilies'] )
	{
		if ( $postrow[$i]['user_allowsmile'] && $user_sig != '' )
		{
			$user_sig = smilies_pass($user_sig);
		}

		if ( $postrow[$i]['enable_smilies'] )
		{
			$message = smilies_pass($message);
		}
	}

	//
	// Highlight active words (primarily for search)
	//
	if ($highlight_match)
	{
		// This has been back-ported from 3.0 CVS
		$message = preg_replace('#(?!<.*)(?<!\w)(' . $highlight_match . ')(?!\w|[^<>]*>)#i', '<b style="color:#'.$theme['fontcolor3'].'">\1</b>', $message);
	}

	//
	// Replace naughty words
	//
	if (count($orig_word))
	{
		$post_subject = preg_replace($orig_word, $replacement_word, $post_subject);

		if ($user_sig != '')
		{
			$user_sig = str_replace('\"', '"', substr(@preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "@preg_replace(\$orig_word, \$replacement_word, '\\0')", '>' . $user_sig . '<'), 1, -1));
		}

		$message = str_replace('\"', '"', substr(@preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "@preg_replace(\$orig_word, \$replacement_word, '\\0')", '>' . $message . '<'), 1, -1));
	}

	//
	// Replace newlines (we use this rather than nl2br because
	// till recently it wasn't XHTML compliant)
	//
	if ( $user_sig != '' )
	{
		$user_sig = '<br />_________________<br />' . str_replace("\n", "\n<br />\n", $user_sig);
	}

	$message = str_replace("\n", "\n<br />\n", $message);

	//
	// Editing information
	//
	if ( $postrow[$i]['post_edit_count'] )
	{
		$l_edit_time_total = ( $postrow[$i]['post_edit_count'] == 1 ) ? $lang['Edited_time_total'] : $lang['Edited_times_total'];

		$l_edited_by = '<br /><br />' . sprintf($l_edit_time_total, $poster, create_date($board_config['default_dateformat'], $postrow[$i]['post_edit_time'], $board_config['board_timezone']), $postrow[$i]['post_edit_count']);
	}
	else
	{
		$l_edited_by = '';
	}

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
	$post_subject = get_icon_title($postrow[$i]['post_icon']) . '&nbsp;' . $post_subject;
//-- fin mod : post icon ---------------------------------------------------------------------------
	// Debut du mod karma
 	$sql = "select karma from " . USERS_TABLE . " where username='$poster'"; 
 	$result = $db->sql_query($sql); 
 	$array = mysql_fetch_array($result);
 	$karma = $array[0];
	//Find du mod karma

	if( $board_config['karmav'] == 1 )
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

	//
	// Again this will be handled by the templating
	// code at some point
	//
	$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
	$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];
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

	if($postrow[$i]['user_posts'] < 1) 
	{ 
   		$level_level = 0; 
	} 
	else 
	{ 
   		$level_level = floor( pow( log10( $postrow[$i]['user_posts'] ), 3 ) ) + 1; 
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

	/* 
	* We need to calculate the user's 
	* posts per day because it's not done for us, 
	* unlike in profile.php 
	*/ 
  	$level_user_ppd = ($postrow[$i]['user_posts'] / max(1, round( ( time() - $postrow[$i]['user_regdate'] ) / 86400 ))); 

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
      			$level_hp_percent = floor( (.5 + (($level_user_ppd - $level_avg_ppd) / ($level_bonus_redux * 2)) ) * 100); 
   		} 
   		else 
   		{ 
      			$level_hp_percent = floor( $level_user_ppd / ($level_avg_ppd / 50) ); 
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
	$level_user_days = max(1, round( ( time() - $postrow[$i]['user_regdate'] ) / 86400 )); 

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
    
   		$level_mp_cost = $postrow[$i]['user_posts'] * $level_post_mp_cost; 
    
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

   	$level_exp = $postrow[$i]['user_posts'] . " / " . $level_posts_for_next; 
   	$level_exp_percent = floor( ($postrow[$i]['user_posts'] - $level_posts_for_this) / 
                        max(1,($level_posts_for_next - $level_posts_for_this)) * 100);    
	} 

//
// END LEVEL HACK
// 

	$adr_topic_box = ($postrow[$i]['user_id'] != '-1') ? $adr_topic_box : '';

	$template->assign_block_vars('postrow', array(
		'ROW_COLOR' => '#' . $row_color,
		'ROW_CLASS' => $row_class,
		'POSTER_PET' => $poster_pet,
'ADR_TOPIC_BOX' => $adr_topic_box,
//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
		'POSTER_NAME' => $poster,

MOD-*/
		'POSTER_NAME' => ( $poster_id == ANONYMOUS ) ? ( ( $postrow[$i]['post_username'] != '' ) ? $postrow[$i]['post_username'] : $lang['Guest'] ) : $rcs->get_colors($postrow[$i], $postrow[$i]['username']),
//-- fin mod : rank color system -----------------------------------------------
		'POSTER_ID' => $poster_id,
		'POSTER_RANK' => $poster_rank,
		'RANK_IMAGE' => $rank_image,
		'POSTER_JOINED' => $poster_joined,
		'POSTER_KARMA' => $karma,
		'KARMA_IMAGE' => $karma_image,
		'POSTER_POSTS' => $poster_posts,
		'POSTER_FROM' => $poster_from,
		'POSTER_AVATAR' => $poster_avatar,
//
// BEGIN LEVEL MOD
// 
		"POSTER_HP" => $level_hp, 
		"POSTER_HP_WIDTH" => $level_hp_percent, 
		"POSTER_HP_EMPTY" => ( 100 - $level_hp_percent ), 
		"POSTER_MP" => $level_mp, 
		"POSTER_MP_WIDTH" => $level_mp_percent, 
		"POSTER_MP_EMPTY" => ( 100 - $level_mp_percent ), 
		"POSTER_EXP" => $level_exp, 
		"POSTER_EXP_WIDTH" => $level_exp_percent, 
		"POSTER_EXP_EMPTY" => ( 100 - $level_exp_percent ), 
		"POSTER_LEVEL" => $level_level, 
//
// END LEVEL MOD
// 
		'POST_DATE' => $post_date,
		'POST_SUBJECT' => $post_subject,
		'MESSAGE' => $message,
		'SIGNATURE' => $user_sig,
		'EDITED_MESSAGE' => $l_edited_by,

		'MINI_POST_IMG' => $mini_post_img,
		'PROFILE_IMG' => $profile_img,
		'PROFILE' => $profile,
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
		'EDIT_IMG' => $edit_img,
		'EDIT' => $edit,
		'QUOTE_IMG' => $quote_img,
		'QUOTE' => $quote,
		'IP_IMG' => $ip_img,
		'IP' => $ip,
		'DELETE_IMG' => $delpost_img,
		'DELETE' => $delpost,
		
//-- mod : quick post es -------------------------------------------------------
//-- add
		'I_QP_QUOTE' => $qp_quote_img,
//-- fin mod : quick post es ---------------------------------------------------

		'L_MINI_POST_ALT' => $mini_post_alt,

		'U_MINI_POST' => $mini_post_url,
		'U_POST_ID' => $postrow[$i]['post_id'])
	);
//-- mod : birthday ------------------------------------------------------------
//-- add
	$birthday->display_details($poster_birthday, $poster_zodiac, false, 'postrow');
//-- fin mod : birthday --------------------------------------------------------
//-- mod : flags ---------------------------------------------------------------
//-- add
	display_flag($poster_flag, false, 'postrow');
//-- fin mod : flags -----------------------------------------------------------
//-- mod : browsers list -------------------------------------------------------
//-- add
	display_browser($poster_browser, false, 'postrow');
//-- fin mod : browsers list ---------------------------------------------------
	$cm_viewtopic->post_vars($postrow[$i],$userdata,$forum_id
	);
//-- mod : Attach mod ---------------------------------------------------------
//-- add
	display_post_attachments($postrow[$i]['post_id'], $postrow[$i]['post_attachment']);
//-- fin mod : Attach mod -----------------------------------------------------
}

$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
