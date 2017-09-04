<?php
/***************************************************************************
 *                                proarcade.php
 *                            -------------------
 *   fait le                : Mercredi,19 Mai, 2003
 *   Par : giefca - http://www.gf-phpbb.com
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx);
require( $phpbb_root_path . 'gf_funcs/gen_funcs.' . $phpEx);

$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_TOPARCADES);
init_userprefs($userdata);
//
// End session management
//
// Start auth check
//

$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";

if ( !$userdata['session_logged_in'] )
{
	header($header_location . append_sid("login.$phpEx?redirect=toparcade.$phpEx", true));
	exit;
}
//
// End of auth check
//


//chargement du template
$template->set_filenames(array(
   'body' => 'toparcade_body.tpl')
);

$template->assign_vars(array(
	'L_ARCADE' => 'Le TOP 5 des jeux')
	);

$nbcol = 3 ;
$games_par_page = 12 ;
//r�cup�ration de la liste des cat�gories priv�es auxquelles l'utilisateur � acces
$liste_cat_auth = get_arcade_categories($userdata['user_id'], $userdata['user_level'],'view');
if( $liste_cat_auth == '' ) $liste_cat_auth = "''";

$sql = "SELECT COUNT(*) AS nbtot FROM " . GAMES_TABLE . " WHERE arcade_catid IN ($liste_cat_auth)";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder � la tables des jeux", '', __LINE__, __FILE__, $sql); 
}

if ($row=$db->sql_fetchrow($result))
{
	$total_games = $row['nbtot'];
}
else
{
	$total_games = 0;
}


$start = get_var2(array('name'=>'start', 'intval'=>true ));
$limit_sql = " LIMIT $start," . $games_par_page;

$sql = "SELECT distinct game_id , game_name FROM " . GAMES_TABLE . " WHERE arcade_catid IN ($liste_cat_auth) ORDER BY game_name ASC $limit_sql";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder � la tables des jeux", '', __LINE__, __FILE__, $sql); 
}

$fini = false ;
if (!$row = $db->sql_fetchrow($result) ) $fini=true ;
while ( (!$fini)  )
{
   $template->assign_block_vars('blkligne', array() ) ;
   for ( $cg = 1 ; $cg <= $nbcol ; $cg++ )
	{
	 //mise en forme de la colonne
    $template->assign_block_vars('blkligne.blkcolonne', array() ) ;
		if (!$fini)
		{
 			$template->assign_block_vars('blkligne.blkcolonne.blkgame', array(
			'GAMENAME' => '<nobr><a class="cattitle" href="' . append_sid("games.$phpEx?gid=" . $row['game_id'] ) . '">' . $row['game_name'] . '</a></nobr> '));
			
			
			$pos = 0 ;
			$posreelle = 0 ;
			$lastscore = 0 ;
 			$sql2 = "SELECT s.* , u.username FROM " . SCORES_TABLE . " s left join " . USERS_TABLE . " u on u.user_id = s.user_id WHERE s.game_id = " . $row['game_id'] . " order by s.score_game DESC, s.score_date ASC LIMIT 0,5 " ;
	   	    if( !($result2 = $db->sql_query($sql2)) )
            {
  				message_die(GENERAL_ERROR, "Impossible d'acceder � la tables des jeux", '', __LINE__, __FILE__, $sql); 
		    }
		    while( $row2 = $db->sql_fetchrow($result2) )
            {
			    $posreelle++ ;
			    if ( $lastscore != $row2['score_game'] )
				{ 
					$pos = $posreelle ;
				}
				$lastscore = $row2['score_game'] ;
 				$template->assign_block_vars('blkligne.blkcolonne.blkgame.blkscore', array(
				'SCORE' => $row2['score_game'],
				'USERNAME' => $row2['username'],
				'POS' => $pos ));				
			}     

  			if (!($row = $db->sql_fetchrow($result)) ) $fini = true ;
		}// fin if !fini
		
    }
}

$template->assign_vars( array(
	'PAGINATION' => generate_pagination(append_sid("toparcade.$phpEx?uid=$uid"), $total_games, $games_par_page, $start),
	'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $games_par_page ) + 1 ), ceil( $total_games / $games_par_page ))
));


//
// Output page header
$page_title = $lang['toparcade'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);	
$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
