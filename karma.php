<?php

unset($x);
define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
//Taken from login.php
//
// Set page ID for session management
//
$userdata = session_pagestart($user_ip, PAGE_LOGIN);
init_userprefs($userdata);
//
// End session management
//

//echo $username;
$user = $_GET['u']; //UserID of victim
$x = $_GET['x']; // applaud or smite
if($x == "applaud")
{
	$x = 1;
}
else
{
	$x = -1;
}
if(!$userdata['session_logged_in'])
{
	header('Location: login.php');
}
else
{
	global $db;
	$sql = "select karma_time from " . USERS_TABLE . " where user_id='$userdata[user_id]'"; //get last time user tried a karma vote
	$result = $db->sql_query($sql);
	$array = mysql_fetch_array($result);
	$time_old = $array[0];

	$sql = "select user_id from " . USERS_TABLE . " where user_id='$userdata[user_id]'";//make sure no one votes for themselves
	$result = $db->sql_query($sql);
	$array = mysql_fetch_array($result);
	$voter_id = $array[0];
	if($voter_id == $user)
	{
		message_die(Karma, 'Vous ne pouvez pas voter pour vous même');
	}
	else
	{

		$time = time();
		$diff = $time - $time_old;
		if($diff >= 86400 || $userdata['user_level'] > 0) //make sure they haven't voted in the last hour or if they're a mod or admin, they can continue
		{
			$sql = "select karma from " . USERS_TABLE . " where user_id='$user'"; //find the victim
			$result = $db->sql_query($sql); 
			$array = mysql_fetch_array($result);
 			$karma = $array[0];
			$karma += $x; //change the karma based on appluad or smite.
	
			//update the database with current time() for voter
			$karma_update = "update " . USERS_TABLE . " set karma ='$karma' where user_id='$user'";		
			$time_update = "update " . USERS_TABLE . " set karma_time ='$time' where user_id ='$userdata[user_id]'";
			$result = $db->sql_query($karma_update);
			$time_result = $db->sql_query($time_update);
	
			if($result&&$time_result) //Both gotta happen...
			{	   
				if(!isset($_GET['t']))
				{
    					header('Location: index.php');
   					break;
 				}
				else
				{
					header('Location: viewtopic.php?t='.$_GET['t']);
				}
			}
			else
			{
				message_die(Karma, '<a href=index.php>Cliquez ici pour retourner sur l\'index</a>');
				return;
			}
		}
		else
		{
			message_die(Karma, 'Vous avez deja voté aujourd\'hui, <a href=index.php>Cliquez ici pour retourner sur l\'index</a>');
		}
	}
}
?>
