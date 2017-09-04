<?php

/***************************************************************************
 *              lang_cash.php [French]
 *               -------------------
 *   begin        : Sat Jul 20 2003
 *   copyright    : (C) 2003 Q-Zar
 *   email        : admin@enfantsdamnes.be
 *
 *   $Id: lang_cash.php,v 1.0.0.0 2003/10/08 00:55:17 Xore Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 ***************************************************************************/

//
// Admin menu
//
$lang['Cmcat_main'] = 'Cash Mod - Principal';
$lang['Cmcat_addons'] = 'Add-ons';
$lang['Cmcat_other'] = 'Autres';
$lang['Cmcat_help'] = 'Aide';

$lang['Cash_Configuration'] = 'Argent&nbsp;-&nbsp;Configuration';
$lang['Cash_Currencies'] = 'Argent&nbsp;-&nbsp;Monnaies';
$lang['Cash_Exchange'] = 'Argent&nbsp;-&nbsp;Echanges';
$lang['Cash_Events'] = 'Argent&nbsp;-&nbsp;Ev�nements';
$lang['Cash_Forums'] = 'Argent&nbsp;-&nbsp;Forums';
$lang['Cash_Groups'] = 'Argent&nbsp;-&nbsp;Groupes';
$lang['Cash_Help'] = 'Argent&nbsp;-&nbsp;Aide';
$lang['Cash_Logs'] = 'Argent&nbsp;-&nbsp;Logs';
$lang['Cash_Settings'] = 'Argent&nbsp;-&nbsp;R�glages';

$lang['Cmenu_cash_config'] = 'R�glages g�n�raux du Cash Mod, modifiant toutes les monnaies';
$lang['Cmenu_cash_currencies'] = 'Ajouter, Enlever, ou d�placer des monnaies';
$lang['Cmenu_cash_settings'] = 'R�glages sp�cifiques pour chaque monnaie';
$lang['Cmenu_cash_events'] = 'Montants � donner lors d\'�v�nements';
$lang['Cmenu_cash_reset'] = 'Remettre � z�ro ou Recompter les montants';
$lang['Cmenu_cash_exchange'] = 'Activer/D�sactiver l\'�change de monnaies, taux d\'�change';
$lang['Cmenu_cash_forums'] = 'Activer ou d�sactiver les monnaies pour chaque forum';
$lang['Cmenu_cash_groups'] = 'R�glages sp�cifiques par groupe d\'utilisateur, rang et niveaux';
$lang['Cmenu_cash_log'] = 'Voir/Effacer les Logs Argent';
$lang['Cmenu_cash_help'] = 'Aide Cash Mod';

// Config
$lang['Cash_config'] = 'Cash Mod - Configuration';
$lang['Cash_config_explain'] = 'Le formulaire ci-dessous vous permettra de configurer le Cash Mod.';

$lang['Cash_admincp'] = 'Mode Admin pour Cash Mod';
$lang['Cash_adminnavbar'] = 'Barre de Navigation Cash Mod';
$lang['Sidebar'] = 'Classique';
$lang['Menu'] = 'Menu';

$lang['Messages'] = 'Messages';
$lang['Spam'] = 'Spam';
$lang['Click_return_cash_config'] = 'Cliquez %sici%s pour retourner � la Configuration du Cash Mod';
$lang['Cash_config_updated'] = 'Configuration du Cash Mod Mise A Jour';
$lang['Cash_disabled'] = 'D�sactiver le Cash Mod';
$lang['Cash_message'] = 'Montrer les gains dans l\'�cran de confirmation de Post/R�ponse';
$lang['Cash_display_message'] = 'Message indiquant les gains';
$lang['Cash_display_message_explain'] = 'Doit contenir exactement 1 "%s"';
$lang['Cash_spam_disable_num'] = 'Nombre de posts apr�s lesquels d�sactiver les gains (pr�vention de spam)';
$lang['Cash_spam_disable_time'] = 'P�riode durant laquelle ce nombre doit �tre d�pass� (heures)';
$lang['Cash_spam_disable_message'] = 'Message annon�ant le spam et le gain z�ro';

// Currencies
$lang['Cash_currencies'] = 'Cash Mod - Monnaies';
$lang['Cash_currencies_explain'] = 'Le formulaire ci-dessous vous permet de g�rer vos monnaies.';

$lang['Click_return_cash_currencies'] = 'Cliquez %sici%s pour retourner aux monnaies du Cash Mod';
$lang['Cash_currencies_updated'] = 'Monnaies du Cash Mod Mises A Jour';
$lang['Cash_field'] = 'Champ';
$lang['Cash_currency'] = 'Monnaie';
$lang['Name_of_currency'] = 'Nom de la monnaie';
$lang['Default'] = 'D�faut';
$lang['Cash_order'] = 'Ordre';
$lang['Cash_set_all'] = 'Indiquer pour tous les utilisateurs';
$lang['Cash_delete'] = 'Effacer la monnaie';
$lang['Decimals'] = 'Centimes';

$lang['Cash_confirm_copy'] = 'Copier toutes les donn�es d\'utilisateur de %s vers %s ?<br />Ceci ne peut pas �tre annul� apr�s';
$lang['Cash_confirm_delete'] = 'Effacer %s ?<br />Ceci ne peut pas �tre annul� apr�s';

$lang['Cash_copy_currency'] = 'Copier les donn�es de la monnaie';

$lang['Cash_new_currency'] = 'Cr�er une nouvelle monnaie';
$lang['Cash_currency_dbfield'] = 'Champ de la base de donn�es pour la monnaie ( user_points pour l\'ArkaMod )';
$lang['Cash_currency_decimals'] = 'Nombre de d�cimales pour la monnaie';
$lang['Cash_currency_default'] = 'Montant par d�faut pour la monnaie';

$lang['Bad_dbfield'] = 'Mauvais nom de champ, doit �tre de la forme \'user_mot\'<br /><br />%s<br /><br/>Exemples:<br />user_points<br />user_argent<br />user_cash<br />user_avertissements<br /><br />';

// 0 monnaies (la plupart des panneaux admin ne fonctionneront pas... )
$lang['Insufficient_currencies'] = 'Vous devez cr�er des monnaies avant de pouvoir modifier des r�glages';

//
// Add-ons ?
//

// Ev�nements
$lang['Cash_events'] = 'Ev�nements Cash Mod';
$lang['Cash_events_explain'] = 'Le formulaire ci-dessous vous permettra de d�terminer les gains d\'argent pour des �v�nements personnalis�s.';

$lang['No_events'] = 'Aucun �v�nement cr��';
$lang['Existing_events'] = 'Ev�nements Cr��s';
$lang['Add_an_event'] = 'Ajouter un �v�nement';
$lang['Cash_events_updated'] = 'Ev�nements Argent Mis A Jour';
$lang['Click_return_cash_events'] = 'Cliquez %sici%s pour retourner aux Ev�nements Argent';

//Remettre � z�ro
$lang['Cash_reset_title'] = 'Remettre le Cash Mod � Z�ro';
$lang['Cash_reset_explain'] = 'Le formulaire ci-dessous vous permettra de remettre les montants de tous les utilisateurs � z�ro.';

$lang['Cash_resetting'] = 'Remise � z�ro de l\'argent';
$lang['User_of'] = 'Utilisateur %s sur %s';

$lang['Set_checked'] = 'Modifier monnaies s�lectionn�es';
$lang['Recount_checked'] = 'Recompter monnaies s�lectionn�es';

$lang['Cash_confirm_reset'] = 'Confirmer la remise � z�ro des monnaies ?<br />Ceci ne peut pas �tre annul� apr�s';
$lang['Cash_confirm_recount'] = 'Confirmer le recomptage des monnaies ?<br />Ceci ne peut pas �tre annul� apr�s.<br /><br />Cette action n\'est pas conseill�e pour les forums avec beaucoup d\'utilisateurs et/ou topics.<br /><br />Il est conseill� de d�sactiver votre forum pendant que cette action est en cours. <br />Vous pouvez d�sactiver votre forum dans la %sConfiguration%s';

$lang['Update_successful'] = 'Mise � jour termin�e!';
$lang['Click_return_cash_reset'] = 'Cliquez %sici%s pour retourner � la Remise � Z�ro de l\'argent';
$lang['User_updated'] = '%s mis � jour<br />';

//
// Autres
//

// Echange
$lang['Cash_exchange'] = 'Cash Mod - Echange';
$lang['Cash_exchange_explain'] = 'Le formulaire ci-dessous vous permettra d\'indiquer la valeur relative de vos monnaies, et de permettre aux utilisateurs de faire des �changes.';

$lang['Exchange_insufficient_currencies'] = 'Vous n\'avez pas assez de monnaies pour cr�er des taux d\'�change.<br />Il vous en faut au moins deux';

// Forums
$lang['Forum_cm_settings'] = 'Cash Mod - R�glages Forum';
$lang['Forum_cm_settings_explain'] = 'A partir de ce panneau, vous pouvez indiquer quels forums utiliseront le Cash Mod';

// Groupes
$lang['Cash_groups'] = 'Cash Mod - Groupes';
$lang['Cash_groups_explain'] = 'A partir de ce panneau, vous pouvez indiquer des privil�ges sp�ciaux par rang, groupe, administrateur ou mod�rateur';

$lang['Click_return_cash_groups'] = 'Cliquez %sici%s pour retourner aux Groupes Argent';
$lang['Cash_groups_updated'] = 'Groupes Argent Mis A Jour';

$lang['Set'] = 'Modifier';
$lang['Up'] = 'Haut';
$lang['Down'] = 'Bas';

// Aide
$lang['Cmh_support'] = 'Support Cash Mod';
$lang['Cmh_troubleshooting'] = 'Erreurs Communes';
$lang['Cmh_upgrading'] = 'Mise A Jour';
$lang['Cmh_addons'] = 'Add-Ons';
$lang['Cmh_demo_boards'] = 'Forums de D�mo';
$lang['Cmh_translations'] = 'Traductions';
$lang['Cmh_features'] = 'Fonctions';

$lang['Cmhe_support'] = 'Information G�n�rale';
$lang['Cmhe_troubleshooting'] = 'Si vous avez des probl�mes avec le Cash Mod,regardez ici pour des corrections';
$lang['Cmhe_upgrading'] = 'Vous avez en ce moment la version %s, les mises � jour seront mises ici jusqu\'� la derni�re version';
$lang['Cmhe_addons'] = 'Une liste de Mods utilisant les fonctions du Cash Mod';
$lang['Cmhe_demo_boards'] = 'Une liste de forums d�mo utilisant le Cash Mod';
$lang['Cmhe_translations'] = 'Une liste de traductions pour le Cash Mod';
$lang['Cmhe_features'] = 'Une liste de fonctions du Cash Mod, et d�veloppement pour les versions futures';

// Logs
$lang['Logs'] = 'Logs Cash Mod';
$lang['Logs_explain'] = 'A partir de ce panneau vous pourrez voir les logs d\'�v�nements concernants le Cash Mods';

// R�glages
$lang['Cash_settings'] = 'R�glages Cash Mod';
$lang['Cash_settings_explain'] = 'Le formulaire ci-dessous vous permettra de personnaliser les r�glages monnaie.';


$lang['Display'] = 'Affichage';
$lang['Implementation'] = 'Implementation';
$lang['Allowances'] = 'Argent de Poche';
$lang['Allowances_explain'] = 'L\'argent de poche n�cessite le plug-in Cash Mod Allowances';
$lang['Click_return_cash_settings'] = 'Cliquez %sici%s pour retourner aux r�glages du Cash Mod';
$lang['Cash_settings_updated'] = 'R�glages du Cash Mod Mis A Jour';

$lang['Cash_enabled'] = 'Activer la monnaie';
$lang['Cash_custom_currency'] = 'Monnaie personnalis�e pour Cash Mod';
$lang['Cash_image'] = 'Afficher la monnaie en tant qu\'image';
$lang['Cash_imageurl'] = 'Image (Relative au dossier de base de phpBB2):';
$lang['Cash_imageurl_explain'] = 'Utiliser ceci pour d�finir une petite image, associ�e avec la monnaie';
$lang['Prefix'] = 'Pr�fixe';
$lang['Postfix'] = 'Suffixe';
$lang['Cash_currency_style'] = 'Style de monnaie pour le Cash Mod';
$lang['Cash_currency_style_explain'] = 'Symbole de monnaie ' . $lang['Prefix'] . ' ou ' . $lang['Postfix'];
$lang['Cash_display_usercp'] = 'Montrer les gains dans les profils';
$lang['Cash_display_userpost'] = 'Montrer les gains dans les topics';
$lang['Cash_display_memberlist'] = 'Montrer les gains dans la liste de membres';

$lang['Cash_amount_per_post'] = 'Argent gagn� par nouveau topic';
$lang['Cash_amount_post_bonus'] = 'Argent bonus gagn� par r�ponse sur le topic';
$lang['Cash_amount_per_reply'] = 'Argent gagn� par r�ponse';
$lang['Cash_amount_per_character'] = 'Argent gagn� par caract�re';
$lang['Cash_maxearn'] = 'Montant maximum gagn� par r�ponse';
$lang['Cash_amount_per_pm'] = 'Argent gagn� par message priv�';
$lang['Cash_include_quotes'] = 'Inclure les citations en calculant l\'argent par caract�re';
$lang['Cash_exchangeable'] = 'Permettre aux utilisateurs d\'�changer cette monnaie';
$lang['Cash_allow_donate'] = 'Permettre aux utilisateurs de donner de l\'argent aux autres';
$lang['Cash_allow_mod_edit'] = 'Permettre aux mod�rateurs d\'�diter l\'argent des membres';
$lang['Cash_allow_negative'] = 'Autoriser les montants n�gatifs';

$lang['Cash_allowance_enabled'] = 'Activer l\'argent de poche';
$lang['Cash_allowance_amount'] = 'Montant gagn� en tant qu\'argent de poche';
$lang['Cash_allownace_frequency'] = 'Fr�quence de l\'argent de poche';
$lang['Cash_allownace_frequencies'][CASH_ALLOW_DAY] = 'Jour';
$lang['Cash_allownace_frequencies'][CASH_ALLOW_WEEK] = 'Semaine';
$lang['Cash_allownace_frequencies'][CASH_ALLOW_MONTH] = 'Mois';
$lang['Cash_allownace_frequencies'][CASH_ALLOW_YEAR] = 'Ann�e';
$lang['Cash_allowance_next'] = 'Temps avant le prochain argent de poche';

// Groupes
$lang['Cash_status_type'][CASH_GROUPS_DEFAULT] = 'D�faut';
$lang['Cash_status_type'][CASH_GROUPS_CUSTOM] = 'Personnalis�';
$lang['Cash_status_type'][CASH_GROUPS_OFF] = 'Off';
$lang['Cash_status'] = 'Statut';

// Cash Mod Log Text
// Note: there isn't really a whole lot i can do about it, if languages use a
// grammar that requires these arguments (%s) to be in a different order, it's stuck in
// this order. The up side is that this is about 10x more comprehensive than the
// last way i did it.
//

/* argument order: [donater id][donater name][currency list][receiver id][receiver name]

eg.
Joe donated 14 gold, $10, 3 points to Peter
*/
$lang['Cash_clause'][CASH_LOG_DONATE] = '<a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a> a donn� <b>%s</b> � <a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a>';

/* argument order: [admin/mod id][admin/mod name][editee id][editee name][Added list][removed list][Set list]

eg.
Joe modified Peter's Cash:
Added 14 gold
Removed $10
Set 3 points
*/
$lang['Cash_clause'][CASH_LOG_ADMIN_MODEDIT] = '<a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new">%s</a> a modifi� l\'argent de <a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a>:<br />Ajout� <b>%s</b><br />Enlev� <b>%s</b><br />Mis � <b>%s</b>';

/* argument order: [admin/mod id][admin/mod name][currency name]

eg.
Joe created points 
*/
$lang['Cash_clause'][CASH_LOG_ADMIN_CREATE_CURRENCY] = '<a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a> a cr�� les <b>%s</b>';

/* argument order: [admin/mod id][admin/mod name][currency name]

eg.
Joe deleted $ 
*/
$lang['Cash_clause'][CASH_LOG_ADMIN_DELETE_CURRENCY] = '<a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a> a effac� les <b>%s</b>';

/* argument order: [admin/mod id][admin/mod name][old currency name][new currency name]

eg.
Joe renamed silver to gold
*/
$lang['Cash_clause'][CASH_LOG_ADMIN_RENAME_CURRENCY] = '<a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a> a renomm� <b>%s</b> en <b>%s</b>';

/* argument order: [admin/mod id][admin/mod name][copied currency name][copied over currency name]

eg.
Joe copied users' gold to points
*/
$lang['Cash_clause'][CASH_LOG_ADMIN_COPY_CURRENCY] = '<a href="' . $phpbb_root_path . 'profile.' . $phpEx . ' ?mode=viewprofile&u=%s" target="_new"><b>%s</b></a> a copi� les <b>%s</b> du membre vers les <b>%s</b>';
$lang['Log'] = 'Log';
$lang['Action'] = 'Action';
$lang['Type'] = 'Type';
$lang['Cash_all'] = 'Tous';
$lang['Cash_admin'] = 'Admin';
$lang['Cash_user'] = 'Membre';
$lang['Delete_all_logs'] = 'Effacer les logs';
$lang['Delete_admin_logs'] = 'Effacer les logs admin';
$lang['Delete_user_logs'] = 'Effacer les logs membre';
$lang['All'] = 'Tous';
$lang['Day'] = 'Jour';
$lang['Week'] = 'Semaine';
$lang['Month'] = 'Mois';
$lang['Year'] = 'Ann�e';
$lang['Page'] = 'Page';
$lang['Per_page'] = 'par page';

//
// Now for some regular stuff...
//

//
// User CP
//
$lang['Donate'] = 'Donner';
$lang['Mod_usercash'] = 'Modifier l\'argent de %s';
$lang['Exchange'] = 'Echange';

//
// Exchange
//
$lang['Convert'] = 'Convertir';
$lang['Select_one'] = 'En s�lectionner une';
$lang['Exchange_lack_of_currencies'] = 'Il n\'y a pas assez de monnaies pour vous permettre d\'�changer<br />Pour utiliser cette fonction, votre admin doit cr�� au moins deux monnaies';
$lang['You_have'] = 'Vous avez';
$lang['One_worth'] = 'Un(e) %s vaut:';
$lang['Cannot_exchange'] = 'Vous ne pouvez �changer ceci : %s, actuellement';

//
// Donate
//
$lang['Amount'] = 'Montant';
$lang['Donate_to'] = 'Donner � %s';
$lang['Donation_recieved'] = 'Vous avez re�u une donation de %s';
$lang['Has_donated'] = '%s vous a donn� [b]%s[/b]. \n\n%s a �crit:\n';

//
// Mod Edit
//
$lang['Add'] = 'Ajouter';
$lang['Remove'] = 'Effacer';
$lang['Omit'] = 'Exclure';
$lang['Amount'] = 'Montant';
$lang['Donate_to'] = 'Donner � %s';
$lang['Has_moderated'] = '%s a mod�r� vos %s';
$lang['Has_added'] = '[*]Ajout�: [b]%s[/b]\n';
$lang['Has_removed'] = '[*]Enlev�: [b]%s[/b]\n';
$lang['Has_set'] = '[*]Mis � : [b]%s[/b]\n';

// That's all folks!

?>