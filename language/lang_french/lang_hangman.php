<?php
//$lang['hangman_letters']	= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789, ._-?;*+!';
/*GENERAL*/
$lang['hangman_version']	= "1.5.6";
$lang['hangman_copyright']	= "Hangman Mod par <a href=\"mailto:p.s16@web.de\">Pete&#174;</a>";
$lang['hangman_overall_headline']="Hangman version ".$lang['hangman_version'];
$lang['color_red_open']		='<span class="genmed" style="color:#ff0000;font-weight:500;">';
$lang['color_red_close']	="</span>";
$lang['color_green_open']	='<span class="genmed" style="color:#00dd00;font-weight:500;">';
$lang['color_green_close']	="</span>";
$lang['color_yellow_open']	='<span class="genmed" style="color:#aa0000;font-weight:500;">';
$lang['color_yellow_close']	="</span>";
$lang['hangman_dot']		="&#8226;";


$lang['status_green']		=$lang['color_green_open']."Pas encore trouvé !".$lang['color_green_close'];
$lang['status_time']		=$lang['color_red_open']."%s Le temps est écoulé !".$lang['color_red_close'];
$lang['status_won']		=$lang['color_yellow_open']."%s gagné par: %s".$lang['color_yellow_close'];
$lang['status_unlimited']	="Illimité !";
/*NAVIGATION*/
$lang['highscore_page'] ="Meilleur score";
$lang['prev_page'] ="Page précédente";
$lang['help_page'] ="Aide Pendu";
$lang['next_page'] ="Page suivante";
$lang['creation_page']="Créer un Pendu";
$lang['overview_page']="Vue d'ensemble";
$lang['creation_done_page'] = "Pendu créé";
/*OVERVIEW*/
$lang['hangman_creator'] 	= "Créateur";
$lang['hangman_date'] 		= "Date de création";
$lang['hangman_lease_date'] 	= "Jours restants";
$lang['hangman_subject']	= "Sujet";
$lang['hangman_max_tries']	= "Essais";
$lang['hangman_status']		= "Etat";
/*FILTER*/
$lang['filter_headline']	= "Filtre:&nbsp;";
$lang['filter_unquessed']	= "Introuvés";
$lang['filter_won']			= "Gagnés";
$lang['filter_time_up']		= "Temps écoulés";
$lang['filter_submit']		= "Go";
$lang['filter_own']			= "Les vôtres";
$lang['filter_others']		= "Ceux des autres";
$lang['filter_nofilter']	= "Pas de filtre";
/*STATS*/
$lang['hangmanstats_online']	= "Pendus en ligne: %s";
$lang['hangmanstats_today']	= "Pendus d'aujourd'hui: %s";
$lang['hangmanstats_won']	= "Pendus trouvés: %s";
$lang['hangmanstats_best']	= "Meilleur joueur: %s";
$lang['hangmanstats_total']	= "Total des Joueurs: %s";

/*NEW(done)*/
$lang['new_title']		="Créer un nouveau Pendu";
$lang['new_sucess']		="<span class=\"modcolor\">Pendu créé avec succès !</span>";
$lang['error_hangman_word'] 	=$lang['color_red_open']."Vous ne pouvez créer un Pendu sans mot !".$lang['color_red_close'];
$lang['error_hangman_subject']	=$lang['color_red_open']."Vous ne pouvez créer un Pendu sans donner de sujet !".$lang['color_red_close'];
$lang['error_hangman_help']	=$lang['color_red_open']."Can't create Hangmans without given help!".$lang['color_red_close'];
$lang['error_hangman_tries']	=$lang['color_red_open']."Unknown option given at tries!".$lang['color_red_close'];
$lang['error_hangman_lease']	=$lang['color_red_open']."Unknown option at days left!".$lang['color_red_close'];
$lang['error_hangman_tolong']	=$lang['color_red_open']."Votre entrée est trop longue !".$lang['color_red_close'];
$lang['error_hangman_forbidden_letters']=$lang['color_red_open']."Utilisez juste des lettres et chiffres, ainsi que (. - ! ?) dans vos Pendus!".$lang['color_red_close'];
$lang['error_is_short']		=$lang['color_red_open'].'Word is to short!It needs to have at least '.intval($hangman_cfg['minimum_letters']).' letters'.$lang['color_red_close'];
$lang['try_again']		='Retour';
$lang['error_to_much']		='Vous avez créé déjà assez de Pendus, essayez plus tard !';
/*CREATE*/
$lang['create_subject']		="Sujet du Pendu";
$lang['create_help']		="Indice du Pendu";
$lang['create_help_help']	="Au moins %s lettres !";
$lang['create_tries']		="Essais";
$lang['create_days']		="Délai du jeu (en jour)";
$lang['create_new']		="Création d'un pendu";
$lang['create_day_help']	="0 pour illimité";
$lang['create_hangman']		="Mot du Pendu";
$lang['create_help_hangman']	="(au moins %s lettres)";
$lang['create_yes']		="Créer";
$lang['create_no']		="Annuler";
/*QUESS*/
$lang['hangman_quess']		="Suppositions du Pendu";
$lang['quess_letters']		="Lettres:";
$lang['quess_won_other']	=$lang['color_green_open']."Jeu déjà gagné par %s".$lang['color_green_close'];
$lang['quess_won_self']		=$lang['color_green_open']."Quelle chance ! Vous avez gagné !".$lang['color_green_close'];
$lang['quess_lost']		=$lang['color_red_open']."Désolé, vous avez perdu !".$lang['color_red_close'];
$lang['hours']			='Heures(s)';
$lang['minutes']		='Minutes(s)';
$lang['seconds']		='Secondes(s)';
$lang['quess_lost_retry']	=$lang['color_red_open']."Vous avez perdu le Jeu ! Dans %d secondes, vous pourrez réessayer !".$lang['color_red_close'];
$lang['quess_lost_retry_overview'] = $lang['color_red_open']."Vous pouvez rejouer dans %d %s !".$lang['color_red_close'];
$lang['hangman_self']		=$lang['color_red_open']."Vous avez créé le Jeu vous-même !".$lang['color_red_close'];
$lang['quess_time_up']		=$lang['color_red_open']."Le temps est écoulé pour ce Pendu !".$lang['color_red_close'];
$lang['quess_remaining_tries']	=$lang['color_red_open']."Vous avez encore %s essais.".$lang['color_red_close'];
$lang['quess_quessors']		="Les utilisateurs qui ont essayé :&nbsp;&nbsp;";
$lang['quess_nobody']		="Personne n'a essayé de deviner ce Pendu !";
$lang['try_a_word']		="Essayez un mot:";
$lang['try']			="Essai";
/*HIGHSCORE*/
$lang['highscore_user']		="Pseudo";
$lang['highscore_won']		="Jeux gagnés";
$lang['highscore_lost']		="Jeux perdus";
$lang['highscore_created']	="Créés";
$lang['highscore_points']	="Points";
$lang['highscore_r_letters']	="Lettres justes";
$lang['highscore_w_letters']	="Lettres fausses";
$lang['highscore_asc']	="Monter";
$lang['highscore_desc']	="Descendre";

$lang['highscore_filter_won']		="Nach Gewinnen";
$lang['highscore_filter_lost']		="Nach Verlusten";
$lang['highscore_filter_score']		="Nach Punkten";
$lang['highscore_filter_created']	="Nach Erstellten";
$lang['highscore_filter_r_letters']	="Nach r.Buchstaben";
$lang['highscore_filter_w_letters']	="Nach f.Buchstaben";

$lang['order_by_won']		="gagnés";
$lang['order_by_lost']		="perdus";
$lang['order_by_created']	="créés";
$lang['order_by_points']	="points";
$lang['order_by']		="Trier par";
$lang['order_by_r_letters']	="Lettres justes";
$lang['order_by_w_letters']	="Lettres fausses";

/*HELP*/
$lang['help_title']		="Aide du Pendu";
$lang['help_overview']		="Ceci est la page Principale de la Navigation. Ici, vous pouvez voir les Pendus quand ils sont créés, ainsi que le statut et d'autres choses.<br />
				Si vous voulez jouer un Pendu, il suffit de cliquer sur le sujet. Remarquez que vous ne pouvez pas jouer aux jeux que vous avez créé, qui ne sont plus à propos ou que vous avez déjà perdus.<br/>";
$lang['help_creation']		="Ceci est la page Principale de Création, remarquez que<b> tous les champs </b>doivent être remplis ! < Br / > Le sujet servira de lien vers le Pendu et (si vous voulez) c'est un peu une aide pour les autres joueurs à deviner le mot.Le mot de Pendu est le mot que les autres doivent deviner et les Jours écoulés est le délai fixé à tous les joueurs pour deviner le mot. <br /> Moins il y a d'Essais, moins les joueurs peuvent donner de mauvaises lettres avant de perdre.<br/>";

$lang['help_highscore']		="Ceci est la page où vous pouvez visualiser les meilleurs joueurs - triez selon votre volonté, voir les liens en bas à gauche.<br/>";

$lang['help_points']		="Votre Administrateur a permis d'obtenir/perdre des points par Pendu. Il l'a mis la :<br> 
				<b>défaite</b> >> <b>vous perdez [%s]</b><br>
				<b>victoire</b> >><b>vous gagnez [%s]</b><br>
				et <b>création</b> >> <b>vous gagnez [%s]</b>.<br />";

$lang['help_highscore_system']	="Votre Administrateur a mis le Système Points du Pendu à :<br>&#8226;création&nbsp;-&nbsp;[%s]<br/>&#8226;victoire&nbsp;-&nbsp;[%s]<br/>&#8226;défaite&nbsp;-&nbsp;[%s]<br/>";
















/*ERRORS*/
$lang['error_update_score']	="Erreur d'update du score !";
$lang['error_delete_hangman']	="Erreur de suppression !";
$lang['error_get_hangman']	="Erreur de fichiers !";
$lang['error_get_winner']	="Erreur pour avoir le vainqueur !";
$lang['error_set_hangman']	="Erreur de configuration !";
$lang['error_get_highscore']	="Erreur pour avoir le meilleur score !";
$lang['error_administration']	="Erreur d'administration !";
$lang['error_get_config']	="Incapable de lire la configuration !";
$lang['error_set_config']	="Incapable de mettre la nouvelle configuration !";
$lang['error_only_admin_create']="Le Jeu est mis : Création par Adminstrateur uniquement !";
$lang['error_get_username']	="Pas de Pseudo !";
/*PICTURES*/
$lang['hangman_picture_won']	="images/hangman_pics/won.gif";
$lang['hangman_picture_time']	="images/hangman_pics/time.gif";
$lang['hangman_picture_lost']	="images/hangman_pics/trans_lost_%1d.gif";
$lang['hangman_picture_link']	="images/hangman_pics/hangman_link.gif";
//
//ADMINISTRATION
//
$lang['administration_config_title'] 	="Configuration des otpions";
$lang['administration_config_head']	="Configuration";
$lang['administration_config_explain'] 	="Page principale de Configuration des Pendus";
$lang['administration_only_admin_create']="Création par Administrateur uniquement";
$lang['administration_games_per_page']	="Combien de pendus seront montrés dans la vue d'ensemble :";

$lang['administration_points_mod_installed']="Utiliser le système de points (seulement si installé)";
$lang['administration_points_mod_won']=$lang['hangman_dot']."Points pour le gagnant";
$lang['administration_points_mod_lost']=$lang['hangman_dot']."Points pour le perdant";
$lang['administration_points_mod_created']=$lang['hangman_dot']."Points de création";
$lang['administration_points_mod_letters']=$lang['hangman_dot']."Points par lettre trouvée";

$lang['administration_make_words_upper']="Créer les mots en majuscules ?";
$lang['administration_time_play_again']="Après combien de temps, les utilisateurs ne peuvent plus réessayer des mots incompris (0 -> jamais)";

$lang['administration_delete']		="Supprimer";
$lang['administration_yes']		="oui";
$lang['administration_no']		="non";
$lang['administration_nonemod']		="Aucun";
$lang['administration_title']		="Pendu supprimé";
$lang['administration_text']		="Voulez-vous supprimer %s ?";
$lang['administration_text_score'] 	="Supprimer le score créateur ?";
$lang['administration_submit']		="OK";
$lang['administration_reset']		="Annuler";
$lang['administration_reset_highscore'] = "Remettre les scores à zéro";
$lang['administration_reset_hangmans'] 	= "Supprimer tous les Pendus";
$lang['administration_multidelete_go']	= "Supprimer les Pendus cochés";

$lang['administration_deleted_highscore'] = "Meilleurs scores remis à zéro avec succès !";
$lang['administration_deleted_hangmans'] = "%s pendus ont été supprimés avec succès !";
$lang['administration_deleted_all_hangmans'] = "Supprimer tous les Pendus";

$lang['administration_standart_days']	= "Combien de jours restants à la création";
$lang['administration_standart_tries']	= "Combien d'essais maximum à la création";
$lang['administration_standart_filter']	= "Filtre standard sur la vue d'ensemble";

$lang['administration_score_won']="Meilleur score - Points pour victoire";
$lang['administration_score_lost']="Meilleur score - Points pour défaite";
$lang['administration_score_create']="Meilleur score - Points pour création";
$lang['administration_score_letters']="Meilleur score - Points par lettre trouvée";
$lang['administration_hsc_letters_p']="Meilleur score - Montrez le pourcentage de lettres fausses et justes ?";
$lang['administration_highscore_filter']= 'Filtre standard sur la page des meilleurs scores';
$lang['administration_auto_replace_letters']='Quelles lettres sont remplacées automatiquement ?';
$lang['administration_allowed_letters']	= 'Lettres autorisées';
$lang['administration_moderator_group'] = 'Sélectionnez un groupe de modération du Pendu';
$lang['administration_show_stats']	= 'Montrer les mini-stats sur la vue d\'ensemble';
$lang['administration_convert_special'] = 'Convertir (&auml;,&ouml;,&uuml;...) avant de sauver dans la DB';
$lang['administration_games_per_day']	= 'Combien de Pendus un utilisateur peut-il créer par jour (0 -> illimité)';
$lang['administration_tries_minimum']	= 'Combien d\'essais minimum';
$lang['administration_tries_maximum']	= 'Combien d\'essais maximum';
$lang['administration_min_letters']	= 'Combien de lettres doit contenir un mot du pendu au minimum';
$lang['administration_max_letters']	= 'Combien de lettres doit contenir un mot du pendu au maximum (-1 Illimité)';
$lang['administration_requessing_lose'] = 'Devinez une lettre fait perdre un essai, ne peut deviner de lettre fait perdre un essai (Encore F5)';
$lang['administration_allow_guest']	= 'Visiteurs autorisés sur le Pendu';
$lang['administration_standart_title']	= 'Pendu - Sujet standard à afficher';
$lang['administration_min_help']	= 'Longueur minimum de l\'aide au Pendu ?';
//
//ADMINISTRATION_XML
//
$lang_xml['title']			= 'Pendu - Import / Export';
$lang_xml['explain']			= 'Page principale Importation / Exportation des Pendus. <br>
						If you want to Import a File Browse it and then choose Import. This will import the Hangmans.<br>
						If you want to Export some Hangmans choose the time in which the hangmans were created and then press Export,<br>
						then your browser will send you a file. You have to choose where to save and then the download starts.';
$lang_xml['export']			= 'Pendu - Exportation';
$lang_xml['import']			= 'Pendu - Importation';
$lang_xml['choosefile']			= 'Choisir un fichier';
$lang_xml['export_start_at']		= 'Commencer à quel ID utilisateur ?';
$lang_xml['export_end_at']		= 'Terminer à quel ID utilisateur ?';
$lang_xml['export_all']			= 'Exporter tout';
$lang_xml['export_letters']		= 'Exporter les Pendus avec les lettres suivantes';
$lang_xml['export_max']			= 'Données maximum à exporter';
$lang_xml['ignore_doubles']		= 'Ignorer les données du Pendu déja contenue dans la BD';
$lang_xml['import_maximum']		= 'Données maximum à importer';
$lang_xml['import_username']		= 'Importer les noms utilisateurs assignés aux pendus (Si oui, inscrire les noms ci-contre)';
$lang_xml['import_min_letters']		= 'Importer juste les Pendus avec les lettres suivantes';
$lang_xml['import_ignore_dl']		= 'Ignorer la limitation de temps dans les Pendus';
$lang_xml['import_ignore_dl_']		= '(Cohez ici pour illimité)';
?>
