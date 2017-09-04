<?php

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Users']['Permissions_arcade'] = $filename . "?mode=user";
	$module['Groups']['Permissions_arcade'] = $filename . "?mode=group";

	return;
}

//
// Load default header
//
$no_page_header = TRUE;

$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
require( $phpbb_root_path . 'gf_funcs/gen_funcs.' . $phpEx);

$mode = get_var2(array('name'=> 'mode','intval'=> false,'okvar'=> array('user','group'),'default' => ''));
$user_id = get_var2(array('name'=>POST_USERS_URL, 'intval'=>true, 'default'=>0 ));
$group_id = get_var2(array('name'=>POST_GROUPS_URL, 'intval'=>true, 'default'=>0 ));

// ---------------
// Start Functions
//

$arcade_auth_fields = array('auth_view', 'auth_play');

//
// End Functions
// -------------

if ( isset($HTTP_POST_VARS['submit']) && ( ( $mode == 'user' && $user_id ) || ( $mode == 'group' && $group_id ) ) )
{
	$user_level = '';
	if ( $mode == 'user' )
	{
		//
		// Get group_id for this user_id
		//
		$sql = "SELECT g.group_id, u.user_level
			FROM " . USER_GROUP_TABLE . " ug, " . USERS_TABLE . " u, " . GROUPS_TABLE . " g
			WHERE u.user_id = $user_id 
				AND ug.user_id = u.user_id 
				AND g.group_id = ug.group_id 
				AND g.group_single_user = " . TRUE;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not select info from user/user_group table', '', __LINE__, __FILE__, $sql);
		}

		$row = $db->sql_fetchrow($result);

		$group_id = $row['group_id'];
		$db->sql_freeresult($result);
	}
	
	$sql = "SELECT arcade_catid FROM " . AUTH_ARCADE_ACCESS_TABLE . " WHERE group_id = $group_id";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not select info from user/user_group table', '', __LINE__, __FILE__, $sql);
	}
	
	//Liste des cat�gories o� l'utilisateur a d�j� acc�s.'
	$cat_list = array();
	while ($row = $db->sql_fetchrow($result))
	{
		$cat_list[$row['arcade_catid']] = 1;
	}
	
	$private = get_var2(array('name'=>'private', 'intval'=>false, 'method'=>'POST' ));
	
	//Liste des autorisation � ajouter et � supprimer
	$liste_a_creer = '';
	$liste_a_supprimer = '';
	foreach( $private AS $key=>$val )
	{
	   if ( ( $val == 1 ) and ( !isset($cat_list[$key])) )
	   {
	     $new_insert = "($group_id,$key)";
		 $liste_a_creer .= ( $liste_a_creer == '' ) ? $new_insert : ', ' . $new_insert;
	   }
	   else if( $val == 0 )
	   {
	     $liste_a_supprimer .= ( $liste_a_supprimer == '' ) ? $key : ', ' . $key;
	   }
	}
	
	if ($liste_a_creer != '')
	{
		$sql = "INSERT INTO " . AUTH_ARCADE_ACCESS_TABLE . " ( group_id, arcade_catid) VALUES " . $liste_a_creer ;
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update arcade auth table', '', __LINE__, __FILE__, $sql);
		}
	}
	
	if ($liste_a_supprimer != '')
	{
		$sql = "DELETE FROM " . AUTH_ARCADE_ACCESS_TABLE . " WHERE group_id=$group_id AND arcade_catid IN ( $liste_a_supprimer )";
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update arcade auth table', '', __LINE__, __FILE__, $sql);
		}
	}
//	$message = 'Permission arcades mises � jour';
	$message = $lang['Arcade_auth_updated'] . '<br /><br />' . sprintf($lang['Click_return_arcadeauth'], '<a href="' . append_sid("admin_arcade_auth.$phpEx?mode=$mode") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');
	message_die(GENERAL_MESSAGE, $message);
}
else if ( ( $mode == 'user' && ( isset($HTTP_POST_VARS['username']) || $user_id ) ) || ( $mode == 'group' && $group_id ) )
{
// GESTION DES DROITS POUR UN UTILISATEUR
	if ( isset($HTTP_POST_VARS['username']) )
	{
		$this_userdata = get_userdata($HTTP_POST_VARS['username'], true);
		if ( !is_array($this_userdata) )
		{
			message_die(GENERAL_MESSAGE, $lang['No_such_user']);
		}
		$user_id = $this_userdata['user_id'];
	}

	$sql = "SELECT * 
		FROM " . ARCADE_CATEGORIES_TABLE . "
		ORDER BY arcade_catorder";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't obtain arcade categories information", "", __LINE__, __FILE__, $sql);
	}

	$arcade_access = array();
	while( $row = $db->sql_fetchrow($result) )
	{
		$arcade_access[] = $row;
	}
	$db->sql_freeresult($result);

//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
	$sql = "SELECT u.user_id, u.username, u.user_level, g.group_id, g.group_name, g.group_single_user FROM " . USERS_TABLE . " u, " . GROUPS_TABLE . " g, " . USER_GROUP_TABLE . " ug WHERE ";
	$sql .= ( $mode == 'user' ) ? "u.user_id = $user_id AND ug.user_id = u.user_id AND g.group_id = ug.group_id" : "g.group_id = $group_id AND ug.group_id = g.group_id AND u.user_id = ug.user_id";
MOD-*/
//-- add
	$sql = 'SELECT u.user_id, u.username, u.user_level, u.user_color, u.user_group_id, g.group_id, g.group_name, g.group_single_user, ug.user_pending
			FROM ' . USERS_TABLE . ' u, ' . GROUPS_TABLE . ' g, ' . USER_GROUP_TABLE . ' ug
				WHERE ' . ( ($mode == 'user') ? 'u.user_id = ' . intval($user_id) . '
					AND ug.user_id = u.user_id
					AND g.group_id = ug.group_id' : 'g.group_id = ' . intval($group_id) . '
					AND ug.group_id = g.group_id
					AND u.user_id = ug.user_id') . '
			ORDER BY ' . ( ($mode == 'user') ? 'g.group_name' : 'u.username' );
//-- fin mod : rank color system -----------------------------------------------

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't obtain user/group information", "", __LINE__, __FILE__, $sql);
	}
	$ug_info = array();
	while( $row = $db->sql_fetchrow($result) )
	{
		$ug_info[] = $row;
	}
	$db->sql_freeresult($result);

	
	$sql = ( $mode == 'user' ) ? "SELECT aa.arcade_catid FROM " . AUTH_ARCADE_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE. " g WHERE ug.user_id = $user_id AND g.group_id = ug.group_id AND aa.group_id = ug.group_id AND g.group_single_user = 1" : "SELECT arcade_catid FROM " . AUTH_ARCADE_ACCESS_TABLE . " WHERE group_id = $group_id";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't obtain user/group permissions", "", __LINE__, __FILE__, $sql);
	}

	$auth_access = array();
	while($row=$db->sql_fetchrow($result))
	{
		$auth_access[$row['arcade_catid']]=1;
	}	

	$nbcat = count($arcade_access);
	
	for ($i=0;$i<$nbcat;$i++)
	{
		$row_class = ( !( $i % 2 ) ) ? 'row2' : 'row1';
		$row_color = ( !( $i % 2 ) ) ? $theme['td_color1'] : $theme['td_color2'];
		if(($arcade_access[$i]['arcade_catauth']==1)||($arcade_access[$i]['arcade_catauth']==2))
		{
			$selected1 = ( isset($auth_access[$arcade_access[$i]['arcade_catid']]) ) ? 'selected="selected"' : '';
			$selected0 = ( !isset($auth_access[$arcade_access[$i]['arcade_catid']]) ) ? 'selected="selected"' : '';
			$optionlist_acl =  '<select name="private[' . $arcade_access[$i]['arcade_catid'] . ']">';
			if ( $mode=='user' && $ug_info[0]['user_level'] == ADMIN )
			{
				$optionlist_acl .= '<option value="1" selected="selected" >' . $lang['Allowed_Access'] . '</option>';
			}
			else
			{
				$optionlist_acl .= '<option value="1" ' . $selected1 . '>' . $lang['Allowed_Access'] . '</option><option value="0" ' . $selected0 . '>' . $lang['Disallowed_Access'] . '</option>';
			}
			$optionlist_acl .= '</select>';
		}
		else
		{
			$optionlist_acl = '&nbsp;';
		}
		
		$template->assign_block_vars('categorie', array(
			'ROW_COLOR' => '#' . $row_color,
			'ROW_CLASS' => $row_class,
			'CATTITLE' => $arcade_access[$i]['arcade_cattitle'],
			'S_AUTH' => $optionlist_acl)
		);
	}


	if ( $mode == 'user' )
	{
		$t_username = $ug_info[0]['username'];
	}
	else
	{
		$t_groupname = $ug_info[0]['group_name'];
	}

	$name = array();
	$id = array();

//-- mod : rank color system ---------------------------------------------------
//-- add
	$ug_color = array();
	$ug_ary = array();
//-- fin mod : rank color system -----------------------------------------------

	for($i = 0; $i < count($ug_info); $i++)
	{
		if( ( $mode == 'user' && !$ug_info[$i]['group_single_user'] ) || $mode == 'group' )
		{
			$name[] = ( $mode == 'user' ) ? $ug_info[$i]['group_name'] :  $ug_info[$i]['username'];
			$id[] = ( $mode == 'user' ) ? intval($ug_info[$i]['group_id']) : intval($ug_info[$i]['user_id']);
//-- mod : rank color system ---------------------------------------------------
//-- add
			$ug_color[] = ($mode == 'user') ? $rcs->get_group_class(intval($ug_info[$i]['group_id'])) : $rcs->get_colors($ug_info[$i]);
//-- fin mod : rank color system -----------------------------------------------
		}
	}

	if( count($name) )
	{
		$t_usergroup_list = '';
//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
		for($i = 0; $i < count($ug_info); $i++)
		{
MOD-*/
//-- add
		for ( $i = 0; $i < count($name); $i++ )
		{
			$ug_ary = ( $mode == 'user' ) ? array('mode' => 'group', POST_GROUPS_URL => intval($id[$i])) : array('mode' => 'user', POST_USERS_URL => intval($id[$i]));
//-- fin mod : rank color system -----------------------------------------------
			$ug = ( $mode == 'user' ) ? 'group&amp;' . POST_GROUPS_URL : 'user&amp;' . POST_USERS_URL;

//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
			$t_usergroup_list .= ( ( $t_usergroup_list != '' ) ? ', ' : '' ) . '<a href="' . append_sid("admin_ug_auth.$phpEx?mode=$ug=" . $id[$i]) . '">' . $name[$i] . '</a>';
MOD-*/
//-- add
				$t_usergroup_list .= ( ($t_usergroup_list != '') ? ', ' : '' ) . '<a href="' . $get->url('admin/admin_arcade_auth', $ug_ary, true) . '"' . $ug_color[$i] . '>' . $name[$i] . '</a>';
//-- fin mod : rank color system -----------------------------------------------
		}
	}
	else
	{
		$t_usergroup_list = $lang['None'];
	}

	//
	// Dump in the page header ...
	//
	include('./page_header_admin.'.$phpEx);

	$template->set_filenames(array(
		"body" => 'admin/auth_arcade_body.tpl')
	);

	$s_hidden_fields = '<input type="hidden" name="mode" value="' . $mode . '" /><input type="hidden" name="adv" value="' . $adv . '" />';
	$s_hidden_fields .= ( $mode == 'user' ) ? '<input type="hidden" name="' . POST_USERS_URL . '" value="' . $user_id . '" />' : '<input type="hidden" name="' . POST_GROUPS_URL . '" value="' . $group_id . '" />';

	if ( $mode == 'user' )
	{
		$template->assign_block_vars('switch_user_auth', array());

		$template->assign_vars(array(
//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
			'USERNAME' => $t_username,
MOD-*/
//-- add
			'USERNAME' => $rcs->get_colors($ug_info[0], $t_username),
//-- fin mod : rank color system -----------------------------------------------
			'USER_LEVEL' => $lang['User_Level'] . " : " . $s_user_type,
			'USER_GROUP_MEMBERSHIPS' => $lang['Group_memberships'] . ' : ' . $t_usergroup_list)
		);
	}
	else
	{
		$template->assign_block_vars("switch_group_auth", array());

		$template->assign_vars(array(
//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
			'USERNAME' => $t_groupname,
MOD-*/
//-- add
			'USERNAME' => $rcs->get_group_class(intval($group_id), $t_groupname),
//-- fin mod : rank color system -----------------------------------------------
			'GROUP_MEMBERSHIP' => $lang['Usergroup_members'] . ' : ' . $t_usergroup_list)
		);
	}

	$template->assign_vars(array(
		'L_USER_OR_GROUPNAME' => ( $mode == 'user' ) ? $lang['Username'] : $lang['Group_name'],

		'L_AUTH_TITLE' => ( $mode == 'user' ) ? $lang['Auth_Arcade_Control_User'] : $lang['Auth_Arcade_Control_Group'],
		'L_AUTH_EXPLAIN' => ( $mode == 'user' ) ? $lang['User_arcade_auth_explain'] : $lang['Group_arcade_auth_explain'],
		'L_MODERATOR_STATUS' => $lang['Moderator_status'],
		'L_PERMISSIONS' => $lang['arcade_cat_auth'],
		'L_SUBMIT' => $lang['Submit'],
		'L_RESET' => $lang['Reset'], 
		'L_CATEGORIES' => $lang['Arcade_categories'], 

		'U_USER_OR_GROUP' => append_sid("admin_arcade_auth.$phpEx"),
		'U_SWITCH_MODE' => $u_switch_mode,

		'S_COLUMN_SPAN' => $s_column_span,
		'S_AUTH_ACTION' => append_sid("admin_arcade_auth.$phpEx"), 
		'S_HIDDEN_FIELDS' => $s_hidden_fields)
	);

}
else
{
	//
	// Select a user/group
	//
	include('./page_header_admin.'.$phpEx);

	$template->set_filenames(array(
		'body' => ( $mode == 'user' ) ? 'admin/user_select_body.tpl' : 'admin/auth_select_body.tpl')
	);

	if ( $mode == 'user' )
	{
		$template->assign_vars(array(
			'L_FIND_USERNAME' => $lang['Find_username'],
			'U_SEARCH_USER' => append_sid("../search.$phpEx?mode=searchuser"))
		);
	}
	else
	{
//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
		$sql = "SELECT group_id, group_name
			FROM " . GROUPS_TABLE . "
			WHERE group_single_user <> " . TRUE;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Couldn't get group list", "", __LINE__, __FILE__, $sql);
		}

		if ( $row = $db->sql_fetchrow($result) )
		{
			$select_list = '<select name="' . POST_GROUPS_URL . '">';
			do
			{
				$select_list .= '<option value="' . $row['group_id'] . '">' . $row['group_name'] . '</option>';
			}
			while ( $row = $db->sql_fetchrow($result) );
			$select_list .= '</select>';
		}

		$template->assign_vars(array(
			'S_AUTH_SELECT' => $select_list)
		);
MOD-*/
//-- add
		// select all groups
		$sql = 'SELECT group_id, group_name
			FROM ' . GROUPS_TABLE . '
				WHERE group_single_user = 0
			ORDER BY group_name';
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain groups list', '', __LINE__, __FILE__, $sql);
		}

		$items = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$group_color = $rcs->get_group_class($row['group_id']);
			$items[] = array('name' => $row['group_name'], 'value' => intval($row['group_id']), 'style' => $group_color);
		}
		$db->sql_freeresult($result);

		if ( empty($items) )
		{
			$items[] = array('name' => $lang['None'], 'value' => 0);
		}

		// build groups list
		$select_list = array('name' => POST_GROUPS_URL, 'items' => $items);
		$rcs->constructor($select_list, 'S_AUTH_SELECT');
		unset($items);
//-- fin mod : rank color system -----------------------------------------------
	}

	$s_hidden_fields = '<input type="hidden" name="mode" value="' . $mode . '" />';

	$l_type = ( $mode == 'user' ) ? 'USER' : 'AUTH';

	$template->assign_vars(array(
		'L_' . $l_type . '_TITLE' => ( $mode == 'user' ) ? $lang['Auth_Arcade_Control_User'] : $lang['Auth_Arcade_Control_Group'],
		'L_' . $l_type . '_EXPLAIN' => ( $mode == 'user' ) ? $lang['User_arcade_auth_explain'] : $lang['Group_arcade_auth_explain'],
		'L_' . $l_type . '_SELECT' => ( $mode == 'user' ) ? $lang['Select_a_User'] : $lang['Select_a_Group'],
		'L_LOOK_UP' => ( $mode == 'user' ) ? $lang['Look_up_User'] : $lang['Look_up_Group'],
//-- mod : rank color system ---------------------------------------------------
//-- add
		'I_SELECT' => $phpbb_root_path . $images['cmd_select'],
		'I_SEARCH' => $phpbb_root_path . $images['cmd_search'],
//-- fin mod : rank color system -----------------------------------------------
		'S_HIDDEN_FIELDS' => $s_hidden_fields, 
		'S_' . $l_type . '_ACTION' => append_sid("admin_arcade_auth.$phpEx"))
	);

}

$template->pparse('body');

include('./page_footer_admin.'.$phpEx);

?>
