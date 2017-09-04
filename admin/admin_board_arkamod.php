<?php
//-- mod : quick post es -------------------------------------------------------
/***************************************************************************
 *				admin_board_arkamod.php
 *				--------------------
 *   begin		: 21/03/2005
 *   copyright		: dragons (http://www.ezcom-fr.com)
 *   version		: 1.0.0 (04/11/2005)
 *
 ***************************************************************************/
 
 define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['General']['Config_arkamod'] = "$file";
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//
// Pull all config data
//
$sql = "SELECT *
	FROM " . CONFIG_TABLE;
if(!$result = $db->sql_query($sql))
{
	message_die(CRITICAL_ERROR, "Could not query arkamod config information", "", __LINE__, __FILE__, $sql);
}
else
{
	while( $row = $db->sql_fetchrow($result) )
	{
		$config_name = $row['config_name'];
		$config_value = $row['config_value'];
		$default_config[$config_name] = isset($HTTP_POST_VARS['submit']) ? str_replace("'", "\'", $config_value) : $config_value;
		
		$new[$config_name] = ( isset($HTTP_POST_VARS[$config_name]) ) ? $HTTP_POST_VARS[$config_name] : $default_config[$config_name];

		
		if( isset($HTTP_POST_VARS['submit']) && $default_config[$config_name] != $new[$config_name] )
		{
			$sql = "UPDATE " . CONFIG_TABLE . " SET
				config_value = '" . str_replace("\'", "''", $new[$config_name]) . "'
				WHERE config_name = '$config_name'";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Failed to update general configuration for $config_name", "", __LINE__, __FILE__, $sql);
			}
		}
	}

	if( isset($HTTP_POST_VARS['submit']) )
	{
		$message = $lang['Config_arkamod_updated'] . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

		message_die(GENERAL_MESSAGE, $message);
	}
}

//-- mod : Add On Disable GfPortal --------------------------------------
//-- add
$activeportail_yes = ( $new['activeportail'] ) ? "checked=\"checked\"" : "";
$activeportail_no = ( !$new['activeportail'] ) ? "checked=\"checked\"" : "";
//-- fin mod : Add On Disable GfPortal -----------------------------------

$template->set_filenames(array(
	"body" => "admin/board_config_arkamod_body.tpl")
);

//-- mod : birthday ------------------------------------------------------------
//-- add
$bday_fields = array(
	'bday_show' => $new['bday_show'],
	'bday_wishes' => $new['bday_wishes'],
	'bday_require' => $new['bday_require'],
	'bday_lock' => $new['bday_lock'],
	'bday_lookahead' => $new['bday_lookahead'],
	'bday_min' => $new['bday_min'],
	'bday_max' => $new['bday_max'],
	'bday_zodiac' => $new['bday_zodiac'],
);
$birthday->display_config($bday_fields);
//-- fin mod : birthday --------------------------------------------------------

$template->assign_vars(array(

	"S_CONFIG_PLUS_ACTION" => append_sid("admin_board_arkamod.$phpEx"),

	"L_YES" => $lang['Yes'],
	"L_NO" => $lang['No'],
	"L_CONFIGURATION_PLUS_TITLE" => $lang['General_Config_arkamod'],
	"L_CONFIGURATION_PLUS_EXPLAIN" => $lang['Config_arkamod_explain'],
	"L_GENERAL_PLUS_SETTINGS" => $lang['General_arkamod_settings'],
	"L_ENABLED" => $lang['Enabled'],
	"L_DISABLED" => $lang['Disabled'],
	"L_SUBMIT" => $lang['Submit'], 
	"L_RESET" => $lang['Reset'],

//-- mod : Add On Disable GfPortal ----------------------------------------
//-- add
	"L_PORTAL_SETTINGS" => $lang['portal_setting'],
	"L_ACTIVEPORTAIL" => $lang['activeportail'],

	"ACTIVEPORTAIL_YES" => $activeportail_yes,
	"ACTIVEPORTAIL_NO" => $activeportail_no,
//-- fin mod : Add On Disable GfPortal -----------------------------------



));

$template->pparse("body");

include('./page_footer_admin.'.$phpEx);

?>
