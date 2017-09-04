<?php

/***************************************************************************
 *                                arcade_favoris.php
 *                            -------------------
 *   Commencé le                : Dimanche,13 Octobre, 2004
 *   Par : KaZ - www.asianpower-td.com
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}
	
//chargement du template
$template->set_filenames(array(
   		'arcade_favoris' => 'arcade_favoris_body.tpl')
		);
$template->assign_vars(array(
		'FAV' => $lang['fav']) 
	);
if($arcade_config['use_fav_category'])
		{
			$sql = "SELECT g.*, u.username, u.user_id, s.score_game, s.score_date, f.* FROM "
			. GAMES_TABLE." g left join " 
			. USERS_TABLE . " u ON g.game_highuser = u.user_id LEFT JOIN " 
			. SCORES_TABLE . " s on s.game_id = g.game_id and s.user_id = " . $userdata['user_id'] . " LEFT JOIN "
			. ARCADE_FAV_TABLE . " f on f.game_id = g.game_id WHERE f.user_id=".$userdata['user_id'] ;
			
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des jeux favoris", '', __LINE__, __FILE__, $sql); 
			}
			if (mysql_num_rows($result))
			{
				$template->assign_block_vars('favrow',array()) ;
				
				while( $frow = $db->sql_fetchrow($result))
				{
				$template->assign_block_vars('favrow.fav_row',array(
				'GAMENAMEF' => $frow[game_name],
				'DELFAVORI' => '<a href="' . append_sid("arcade.$phpEx?delfavori=" . $frow['game_id'] ) .'"><img src="' . append_sid("images/delfavs.gif").'" border=0 alt="'.$lang['del_fav'].'"></a>',
				'GAMELINKF' => '<nobr><a href="' . append_sid("games.$phpEx?gid=" . $frow['game_id'] ) . '">' . $frow['game_name'] . '</a></nobr> ',
				'GAMEPICF' => ( $frow['game_pic'] != '' ) ? "<a href='" . append_sid("games.$phpEx?gid=" . $frow['game_id'] ) . "'><img src='" . "games/pics/" . $frow['game_pic'] . "' align='absmiddle' border='0' width='30' height='30' vspace='2' hspace='2' alt='" . $frow['game_name'] . "' ></a>" : '' ,
				'GAMESETF' => ( $frow['game_set'] != 0  ) ? $lang['game_actual_nbset'] . $frow['game_set'] : '',
				'HIGHSCOREF' => $frow['game_highscore'],
				'YOURHIGHSCOREF' => $frow['score_game'],
				'NORECORDF' => ( $frow['game_highscore'] == 0 ) ? $lang['no_record'] : '',
				'HIGHUSERF' => ( $frow['game_highuser'] != 0 ) ? '(' . $frow['username'] . ')' : '' ,
				'URL_SCOREBOARDF' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=" . $frow['game_id'] ) . '">' . "<img src='templates/" . $theme['template_name'] . "/images/scoreboard.gif' align='absmiddle' border='0' alt='" . $lang['scoreboard'] . " " . $frow['game_name'] . "'>" . '</a></nobr> ',
				'GAMEIDF' => $frow['game_id'],
				'DATEHIGHF' => "<nobr>" . create_date( $board_config['default_dateformat'] , $frow['game_highdate'] , $board_config['board_timezone'] ) . "</nobr>",
				'YOURDATEHIGHF' => "<nobr>" . create_date( $board_config['default_dateformat'] , $frow['score_date'] , $board_config['board_timezone'] ) . "</nobr>",
				'IMGFIRSTF' => ( $frow['game_highuser'] == $userdata['user_id'] ) ? "&nbsp;&nbsp;<img src='templates/" . $theme['template_name'] . "/images/couronne.gif' align='absmiddle'>" : "" ,
//début ajout paiement arcade par jeu
				'COUTF' => 
				($arcade_config['pay_all_games']==1 and $arcade_config['use_points_pay_charging'] and $arcade_config['use_points_pay_submit']) ? sprintf($lang['game_cost'],(2*$arcade_config['points_pay']),$board_config['points_name']) :
				(($arcade_config['pay_all_games']==1)? sprintf($lang['game_cost'],$arcade_config['points_pay'],$board_config['points_name']):
				(($arcade_config['pay_all_games']==0 and $frow['point_pay']==0)?'':
				(($arcade_config['pay_all_games']==0 and $arcade_config['use_points_pay_charging'] and $arcade_config['use_points_pay_submit']) ? sprintf($lang['game_cost'],(2*$frow['point_pay']),$board_config['points_name']) :
				(($arcade_config['pay_all_games']==0)? sprintf($lang['game_cost'],$frow['point_pay'],$board_config['points_name']):
				'')))),
//fin ajout paiement arcade par jeu
				'GAMEDESCF' => $frow['game_desc']
				));
				
				if ( $frow['game_highscore'] !=0 )
						{
							$template->assign_block_vars('favrow.fav_row.recordrow',array()) ;
						}	
				if ( $frow['score_game'] !=0 )
						{
							$template->assign_block_vars('favrow.fav_row.yourrecordrow',array()) ;
						}
				}
			}
		}

$template->assign_var_from_handle('ARCADE_FAVORIS', 'arcade_favoris');

?>