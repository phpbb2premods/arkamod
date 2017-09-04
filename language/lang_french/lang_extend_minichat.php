<?php
/**
*
* @package minichat
* @version $Id: lang_extend_minichat.php,v 1.0.0 2007/03/25 ABDev Exp $
* @copyright (c) 2007 ABDev, EzCom
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Original author : Malach, http://www.phantasia-fr.com/
*/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

/**
* admin part
*/
if ( $lang_extend_admin )
{
	$lang['Shoutbox_Settings'] = 'MiniChat';
	$lang['shoutbox_on'] = 'Activer MiniChat';
	$lang['date_on'] = 'Afficher la date';
	$lang['sb_make_links'] = 'Faire des liens';
	$lang['sb_links_names'] = 'Lier le nom d\'utilisateur � son profil';
	$lang['sb_allow_edit'] = 'Autoriser les administrateurs et les mod�rateurs � �diter les messages';
	$lang['sb_allow_edit_all'] = 'Autoriser les utilisateurs � �diter leurs messages';
	$lang['sb_allow_delete'] = 'Autoriser les administrateurs et les mod�rateurs � supprimer les messages';
	$lang['sb_allow_delete_all'] = 'Autoriser les utilisateurs � supprimer leurs messages';
	$lang['sb_allow_guest'] = 'Autoriser les invit�s � �mettre des messages dans MiniChat';
	$lang['sb_allow_guest_view'] = 'Autoriser les invit�s � voir MiniChat';
	$lang['delete_days'] = 'Nombre de jours avant que les messages ne soient supprim�s';
	$lang['sb_text_lenght'] = 'Nombre maximal de lettres par message';
	$lang['sb_word_lenght'] = 'Nombre maximal de lettres par mot';
	$lang['shout_size'] = 'Dimensions de MiniChat';
	$lang['sb_banned_user_send'] = 'D�sactiver l\'envoi de messages pour cet utilisateur';
	$lang['sb_banned_user_send_e'] = 'ID des utilisateurs ne pouvant pas �mettre de messages dans MiniChat.<br />S�parez les IDs par des virgules (<strong>18, 124</strong>)';
	$lang['sb_banned_user_view'] = 'D�sactiver MiniChat pour cet utilisateur';
	$lang['sb_banned_user_view_e'] = 'ID des utilisateurs ne pouvant pas voir MiniChat.<br />S�parez les IDs par des virgules (<strong>18, 124</strong>)';
	$lang['sb_refresh_time'] = 'Temps de rafra�chissement automatique de MiniChat (en secondes)';
	$lang['sb_messages_number_on_index'] = 'Nombre de messages affich�s dans MiniChat sur l\'index du forum';

	$lang['MiniChat_Config'] = 'MiniChat Configuration';
	$lang['MiniChat_explain'] = 'Depuis ce formulaire, vous pouvez personnaliser toutes les options de MiniChat.';
	$lang['Click_return_minichat_config'] = 'Cliquez %sici%s pour revenir � la configuration de MiniChat';
}

$lang['Shoutbox'] = 'MiniChat';
$lang['gg_mes'] = 'Message';
$lang['login_to_shoutcast'] = 'Vous devez �tre connect� pour utiliser MiniChat';
$lang['sb_show'] = '<strong>Afficher</strong>';
$lang['sb_hide'] = '<strong>Masquer</strong>';
$lang['sb_hide_done'] = 'Termin�';
$lang['too_long_word'] = 'Mot trop long';
$lang['sb_banned_send'] = 'Vous ne pouvez pas envoyer de messages';
$lang['shout_refresh'] = 'Rafra�chir';
$lang['Censor'] = 'Censurer';
$lang['Flood'] = 'Vous ne pouvez pas poster un autre sujet en si peu de temps apr�s le dernier; veuillez r�essayer dans un court instant.';
$lang['title_minichat'] = 'MiniChat';

?>
