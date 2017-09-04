<?php
/***************************************************************************
 *                            lang_admin.php [French]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php,v 1.35.2.12 2005/10/30 15:17:14 acydburn Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/* CONTRIBUTORS 
	Translation produced by Helix
	http://www.phpbb-fr.com/
*/ 

//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = 'Administration G�n�rale';
$lang['Users'] = 'Administration des Utilisateurs';
$lang['Groups'] = 'Administration des Groupes';
$lang['Forums'] = 'Administration des Forums';
$lang['Styles'] = 'Administration des Th�mes';

$lang['Configuration'] = 'Configuration';
$lang['Permissions'] = 'Permissions';
$lang['Manage'] = 'Gestion';
$lang['Disallow'] = 'Interdire un nom d\'utilisateur';
$lang['Prune'] = 'D�lester';
$lang['Mass_Email'] = 'E-mail de Masse';
$lang['Ranks'] = 'Rangs';
$lang['Smilies'] = 'Smilies';
$lang['Ban_Management'] = 'Contr�le du bannissement';
$lang['Word_Censor'] = 'Censure';
$lang['Export'] = 'Exporter';
$lang['Create_new'] = 'Cr�er';
$lang['Add_new'] = 'Ajouter';
$lang['Backup_DB'] = 'Sauvegarder la base de donn�es';
$lang['Restore_DB'] = 'Restaurer la base de donn�es';


//
// Index
//
$lang['Admin'] = 'Administration';
$lang['Not_admin'] = 'Vous n\'�tes pas autoris� � administrer ce forum';
$lang['Welcome_phpBB'] = 'Bienvenue sur phpBB';
$lang['Admin_intro'] = 'Merci d\'avoir choisi phpBB comme solution de forum. Cet �cran vous donnera un rapide aper�u des diverses statistiques de votre forum. Vous pouvez revenir sur cette page en cliquant sur le lien <u>Index de l\'Administration</u> dans le volet de gauche. Pour retourner � l\'index de votre forum, cliquez sur le logo phpBB dans le volet de gauche. Les autres liens du volet de gauche vous permettront de contr�ler tous les aspects de votre forum. Chaque page contiendra les instructions n�cessaires concernant l\'utilisation des outils.';
$lang['Main_index'] = 'Index du Forum';
$lang['Forum_stats'] = 'Statistiques du Forum';
$lang['Admin_Index'] = 'Index de l\'Administration';
$lang['Preview_forum'] = 'Aper�u du Forum';

$lang['Click_return_admin_index'] = 'Cliquez %sici%s pour revenir � l\'Index d\'Administration';

$lang['Statistic'] = 'Statistique';
$lang['Value'] = 'Valeur';
$lang['Number_posts'] = 'Nombre de messages';
$lang['Posts_per_day'] = 'Messages par jour';
$lang['Number_topics'] = 'Nombre de sujets';
$lang['Topics_per_day'] = 'Sujets par jour';
$lang['Number_users'] = 'Nombre d\'utilisateurs';
$lang['Users_per_day'] = 'Utilisateurs par jour';
$lang['Board_started'] = 'Ouverture du forum';
$lang['Avatar_dir_size'] = 'Taille du r�pertoire des Avatars';
$lang['Database_size'] = 'Taille de la base de donn�es';
$lang['Gzip_compression'] ='Compression Gzip';
$lang['Not_available'] = 'Non disponible';

$lang['ON'] = 'ON'; // This is for GZip compression
$lang['OFF'] = 'OFF';


//
// DB Utils
//
$lang['Database_Utilities'] = 'Utilitaires de la Base de donn�es';

$lang['Restore'] = 'Restaurer';
$lang['Backup'] = 'Sauvegarder';
$lang['Restore_explain'] = 'Ceci ex�cutera une restauration compl�te de toutes les tables de phpBB � partir d\'un fichier sauvegard�. Si votre serveur le supporte, vous pourrez envoyer au serveur un fichier texte compress� au format gzip et il sera automatiquement d�compress�. <B>ATTENTION</B>: Cette op�ration effacera toutes les donn�es existantes. La restauration peut prendre un certain temps � s\'effectuer, veuillez donc ne pas vous d�placer de cette page tant que l\'op�ration n\'est pas termin�e.';
$lang['Backup_explain'] = 'Ici, vous pouvez sauvegarder toutes les donn�es relatives � phpBB. Si vous avez des tables suppl�mentaires personnalis�es dans la m�me base de donn�es que phpBB et que vous voulez les sauvegarder aussi, veuillez entrer leurs noms, s�par�s par une virgule dans la zone de texte \'Tables Suppl�mentaires\' ci-dessous. Si votre serveur le supporte, vous pourrez compresser le fichier-sauvegarde au format gzip afin de r�duire sa taille avant de le t�l�charger.';

$lang['Backup_options'] = 'Options de Sauvegarde';
$lang['Start_backup'] = 'D�marrer la sauvegarde';
$lang['Full_backup'] = 'Sauvegarde compl�te';
$lang['Structure_backup'] = 'Sauvegarde de la structure uniquement';
$lang['Data_backup'] = 'Sauvegarde des donn�es uniquement';
$lang['Additional_tables'] = 'Tables Suppl�mentaires';
$lang['Gzip_compress'] = 'Compression Gzip';
$lang['Select_file'] = 'S�lectionner un fichier';
$lang['Start_Restore'] = 'D�marrer la restauration';

$lang['Restore_success'] = 'La Base de donn�es a �t� restaur�e avec succ�s.<br /><br />Votre forum devrait revenir dans l\'�tat dans lequel il �tait lorsque la sauvegarde a �t� effectu�e.';
$lang['Backup_download'] = 'Le t�l�chargement va d�buter sous peu; veuillez patienter jusqu\'� ce qu\'il commence.';
$lang['Backups_not_supported'] = 'D�sol�, mais la sauvegarde de base de donn�es n\'est pas support�e actuellement par votre syst�me de base de donn�es.';

$lang['Restore_Error_uploading'] = 'Erreur durant l\'envoi de la sauvegarde.';
$lang['Restore_Error_filename'] = 'Probl�me de nom de fichier; veuillez essayer avec un autre fichier.';
$lang['Restore_Error_decompress'] = 'Impossible de d�compresser le fichier gzip; veuillez renvoyer une version non compress�e du fichier.';
$lang['Restore_Error_no_file'] = 'Aucun fichier n\'a �t� envoy�.';


//
// Auth pages
//
$lang['Select_a_User'] = 'S�lectionner un Utilisateur';
$lang['Select_a_Group'] = 'S�lectionner un Groupe';
$lang['Select_a_Forum'] = 'S�lectionner un Forum';
$lang['Auth_Control_User'] = 'Contr�le des Permissions des Utilisateurs';
$lang['Auth_Control_Group'] = 'Contr�le des Permissions des Groupes';
$lang['Auth_Control_Forum'] = 'Contr�le des Permissions des Forums';
$lang['Look_up_User'] = 'Rechercher l\'Utilisateur';
$lang['Look_up_Group'] = 'Rechercher le Groupe';
$lang['Look_up_Forum'] = 'Rechercher le Forum';

$lang['Group_auth_explain'] = 'Ici, vous pouvez modifier les permissions et les statuts de mod�rateurs assign�s � chaque groupe. N\'oubliez pas qu\'en changeant les permissions de groupe, les permissions individuelles d\'utilisateurs pourront toujours autoriser un utilisateur � entrer sur un forum, etc. Vous serez pr�venu le cas �ch�ant.';
$lang['User_auth_explain'] = 'Ici, vous pouvez modifier les permissions et les statuts de mod�rateurs assign�s � chaque utilisateur, individuellement. N\'oubliez pas qu\'en changeant les permissions individuelles d\'utilisateurs, les permissions de groupe pourront toujours autoriser un utilisateur � entrer sur un forum, etc. Vous serez pr�venu le cas �ch�ant.';
$lang['Forum_auth_explain'] = 'Ici, vous pouvez modifier les niveaux d\'acc�s de chaque forum. Vous aurez deux modes pour le faire, un mode simple, et un mode avanc�; le mode avanc� offre un plus grand contr�le sur le fonctionnement de chaque forum. Rappelez-vous qu\'en modifiant les niveaux d\'acc�s d\'un forum, les utilisateurs du forum pourront en �tre affect�s.';

$lang['Simple_mode'] = 'Mode Simple';
$lang['Advanced_mode'] = 'Mode Avanc�';
$lang['Moderator_status'] = 'Statut de Mod�rateur';

$lang['Allowed_Access'] = 'Acc�s Autoris�';
$lang['Disallowed_Access'] = 'Acc�s Interdit';
$lang['Is_Moderator'] = 'est mod�rateur';
$lang['Not_Moderator'] = 'n\'est pas mod�rateur';

$lang['Conflict_warning'] = 'Avertissement : Conflit des Autorisations';
$lang['Conflict_access_userauth'] = 'Cet utilisateur a toujours les droits d\'acc�s � ce forum gr�ce � son appartenance � un groupe. Vous pouvez modifier les permissions du groupe ou retirer cet utilisateur du groupe pour l\'emp�cher compl�tement d\'avoir les droits d\'acc�s. L\'attribution des droits par les groupes (et les forums concern�s) sont not�s ci-dessous.';
$lang['Conflict_mod_userauth'] = 'Cet utilisateur a toujours les droits de mod�ration � ce forum gr�ce � son appartenance � un groupe. Vous pouvez modifier les permissions du groupe ou retirer cet utilisateur du groupe pour l\'emp�cher compl�tement d\'avoir les droits de mod�ration. L\'attribution des droits par les groupes (et les forums concern�s) sont not�s ci-dessous.';

$lang['Conflict_access_groupauth'] = 'L\'utilisateur suivant (ou les utilisateurs) a toujours les droits d\'acc�s � ce forum gr�ce � ses permissions d\'utilisateur. Vous pouvez modifier les permissions d\'utilisateur pour l\'emp�cher compl�tement d\'avoir les droits d\'acc�s. L\'attribution des droits par les permissions d\'utilisateur (et les forums concern�s) sont not�s ci-dessous.';
$lang['Conflict_mod_groupauth'] = 'L\'utilisateur suivant (ou les utilisateurs) a toujours les droits de mod�ration � ce forum gr�ce � ses permissions d\'utilisateur. Vous pouvez modifier les permissions d\'utilisateur pour l\'emp�cher compl�tement d\'avoir les droits de mod�ration. L\'attribution des droits par les permissions d\'utilisateur (et les forums concern�s) sont not�s ci-dessous.';

$lang['Public'] = 'Public';
$lang['Private'] = 'Priv�';
$lang['Registered'] = 'Enregistr�';
$lang['Administrators'] = 'Administrateurs';
$lang['Hidden'] = 'Invisible';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'TOUS';
$lang['Forum_REG'] = 'MEMBRES';
$lang['Forum_PRIVATE'] = 'PRIVE';
$lang['Forum_MOD'] = 'MOD';
$lang['Forum_ADMIN'] = 'ADMIN';

$lang['View'] = 'Voir';
$lang['Read'] = 'Lire';
$lang['Post'] = 'Poster';
$lang['Reply'] = 'R�pondre';
$lang['Edit'] = 'Editer';
$lang['Delete'] = 'Supprimer';
$lang['Sticky'] = 'Post-it';
$lang['Announce'] = 'Annoncer';
$lang['Vote'] = 'Voter';
$lang['Pollcreate'] = 'Cr�er un sondage';

$lang['Permissions'] = 'Permissions';
$lang['Simple_Permission'] = 'Permission Simple';

$lang['User_Level'] = 'Niveau de l\'utilisateur';
$lang['Auth_User'] = 'Utilisateur';
$lang['Auth_Admin'] = 'Administrateur';
$lang['Group_memberships'] = 'Effectifs des groupes d\'utilisateurs';
$lang['Usergroup_members'] = 'Ce groupe est compos� des membres suivants';

$lang['Forum_auth_updated'] = 'Permissions du forum mises � jour';
$lang['User_auth_updated'] = 'Permissions de l\'utilisateur mises � jour';
$lang['Group_auth_updated'] = 'Permissions du groupe mises � jour';

$lang['Auth_updated'] = 'Les permissions ont �t� mises � jour';
$lang['Click_return_userauth'] = 'Cliquez %sici%s pour revenir aux Permissions d\'Utilisateurs';
$lang['Click_return_groupauth'] = 'Cliquez %sici%s pour revenir aux Permissions de Groupes';
$lang['Click_return_forumauth'] = 'Cliquez %sici%s pour revenir aux Permissions des Forums';


//
// Banning
//
$lang['Ban_control'] = 'Contr�le du Bannissement';
$lang['Ban_explain'] = 'Ici, vous pouvez contr�ler les bannissements des utilisateurs. Vous pouvez accomplir cela en bannissant soit un utilisateur sp�cifique, soit un intervalle d\'adresses IP ou un nom de serveur. Ces m�thodes emp�cheront un utilisateur d\'atteindre votre forum. Pour emp�cher un utilisateur de s\'enregistrer sous un nom d\'utilisateur diff�rent, vous pouvez �galement bannir une adresse e-mail sp�cifique. Veuillez noter que bannir uniquement l\'adresse e-mail n\'emp�chera pas l\'utilisateur concern� de se connecter ou poster sur votre forum; vous devrez utiliser l\'une des deux m�thodes cit�es ci-dessus.';
$lang['Ban_explain_warn'] = 'Veuillez noter qu\'entrer un intervalle d\'adresses IP aura pour r�sultat de prendre en compte toutes les adresses entre l\'IP de d�part et l\'IP de fin dans la liste de bannissement. Des essais seront effectu�s afin de r�duire le nombre d\'adresses IP ajout�es � la base de donn�es en introduisant des jokers automatiquement aux endroits appropri�s. Si vous devez r�ellement entrer un intervalle, essayez de le garder r�duit ou au mieux, fixez des adresses sp�cifiques.';

$lang['Select_username'] = 'S�lectionner un Nom d\'utilisateur';
$lang['Select_ip'] = 'S�lectionner une adresse IP';
$lang['Select_email'] = 'S�lectionner une adresse e-mail';

$lang['Ban_username'] = 'Bannir un ou plusieurs utilisateurs sp�cifiques';
$lang['Ban_username_explain'] = 'Vous pouvez bannir plusieurs utilisateurs d\'une fois en utilisant la combinaison appropri�e de souris et clavier pour votre ordinateur et navigateur internet';

$lang['Ban_IP'] = 'Bannir une ou plusieurs adresses IP ou noms de serveurs';
$lang['IP_hostname'] = 'Adresses IP ou noms de serveurs';
$lang['Ban_IP_explain'] = 'Pour sp�cifier plusieurs IP ou noms de serveurs diff�rents, s�parez-les par des virgules. Pour sp�cifier un intervalle d\'adresses IP, s�parez le d�but et la fin avec un trait d\'union (-); pour sp�cifier un joker, utilisez une �toile (*)';

$lang['Ban_email'] = 'Bannir une ou plusieurs adresses e-mail';
$lang['Ban_email_explain'] = 'Pour sp�cifier plus d\'une adresse e-mail, s�parez-les par des virgules. Pour sp�cifier un joker pour le nom d\'utilisateur, utilisez * ; par exemple *@hotmail.com';

$lang['Unban_username'] = 'D�bannir un ou plusieurs utilisateurs sp�cifiques';
$lang['Unban_username_explain'] = 'Vous pouvez d�bannir plusieurs utilisateurs en une fois en utilisant la combinaison appropri�e de souris et clavier pour votre ordinateur et navigateur internet';

$lang['Unban_IP'] = 'D�bannir une ou plusieurs adresses IP';
$lang['Unban_IP_explain'] = 'Vous pouvez d�bannir plusieurs adresses IP en une fois en utilisant la combinaison appropri�e de souris et clavier pour votre ordinateur et navigateur internet';

$lang['Unban_email'] = 'D�bannir une ou plusieurs adresses e-mail';
$lang['Unban_email_explain'] = 'Vous pouvez d�bannir plusieurs adresses e-mail en une fois en utilisant la combinaison appropri�e de souris et clavier pour votre ordinateur et navigateur internet';

$lang['No_banned_users'] = 'Aucun nom d\'utilisateur banni';
$lang['No_banned_ip'] = 'Aucune adresse IP bannie'; 
$lang['No_banned_email'] = 'Aucune adresse e-mail bannie';

$lang['Ban_update_sucessful'] = 'La liste de bannissement a �t� mise � jour avec succ�s';
$lang['Click_return_banadmin'] = 'Cliquez %sici%s pour revenir au Contr�le du Bannissement';


//
// Configuration
//
$lang['General_Config'] = 'Configuration G�n�rale';
$lang['Config_explain'] = 'Le formulaire ci-dessous vous permettra de personnaliser toutes les options g�n�rales du forum. Pour les Utilisateurs et les Forums, utilisez les liens relatifs sur le volet de gauche.';

$lang['Click_return_config'] = 'Cliquez %sici%s pour revenir � Configuration G�n�rale';

$lang['General_settings'] = 'Options G�n�rales du Forum';
$lang['Server_name'] = 'Nom de domaine';
$lang['Server_name_explain'] = 'Le nom de domaine � partir duquel ce forum fonctionne';
$lang['Script_path'] = 'Chemin du script';
$lang['Script_path_explain'] = 'Le chemin relatif de phpBB2 par rapport au nom de domaine';
$lang['Server_port'] = 'Port du serveur';
$lang['Server_port_explain'] = 'Le port utilis� par votre serveur est habituellement le 80. Modifier uniquement si diff�rent';
$lang['Site_name'] = 'Nom du site';
$lang['Site_desc'] = 'Description du site';
$lang['Board_disable'] = 'D�sactiver le forum';
$lang['activeportail'] = "Activer portail";
$lang['portal_setting'] = "Option du portail";
$lang['Board_disable_explain'] = 'Ceci rendra le forum indisponible aux utilisateurs. Toutefois, les administrateurs auront toujours acc�s au Panneau d\'Administration m�me si le forum est d�sactiv�.';
$lang['Board_disable_msg'] = 'Message de d�sactivation du forum';
$lang['Board_disable_msg_explain'] = 'Ce message apparaitra si vous d�sactivez le forum.';
$lang['Acct_activation'] = 'Activation du compte';
$lang['Acc_None'] = 'Aucune'; // These three entries are the type of activation
$lang['Acc_User'] = 'Utilisateur';
$lang['Acc_Admin'] = 'Administrateur';

$lang['Abilities_settings'] = 'Options de Base de l\'Utilisateur et du Forum';
$lang['Max_poll_options'] = 'Nombre maximal d\'options pour les sondages';
$lang['Flood_Interval'] = 'Intervalle de flood';
$lang['Flood_Interval_explain'] = 'Nombre de secondes durant lequel un utilisateur doit patienter avant de pouvoir reposter.';
$lang['Board_email_form'] = 'Messagerie e-mail via le forum';
$lang['Board_email_form_explain'] = 'Les utilisateurs s\'envoient des e-mail par ce forum';
$lang['Topics_per_page'] = 'Sujets par page';
$lang['Posts_per_page'] = 'Messages par page';
$lang['Hot_threshold'] = 'Seuil de Messages pour �tre Populaire';
$lang['Default_style'] = 'Th�me par d�faut';
$lang['Override_style'] = 'Annuler le th�me de l\'utilisateur';
$lang['Override_style_explain'] = 'Remplace le th�me de l\'utilisateur par le th�me par d�faut';
$lang['Default_language'] = 'Langue par d�faut';
$lang['Date_format'] = 'Format de la date';
$lang['System_timezone'] = 'Fuseau horaire';
$lang['Enable_gzip'] = 'Activer la compression GZip';
$lang['Enable_prune'] = 'Activer le d�lestage du Forum';
$lang['Allow_HTML'] = 'Autoriser le HTML';
$lang['Allow_BBCode'] = 'Autoriser le BBCode';
$lang['Allowed_tags'] = 'Balises HTML autoris�es';
$lang['Allowed_tags_explain'] = 'S�parez les balises avec des virgules';
$lang['Allow_smilies'] = 'Autoriser les Smilies';
$lang['Smilies_path'] = 'Chemin de stockage des Smilies';
$lang['Smilies_path_explain'] = 'Chemin sous votre r�pertoire phpBB, ex : images/smiles';
$lang['Allow_sig'] = 'Autoriser les Signatures';
$lang['Max_sig_length'] = 'Longueur Maximale de la signature';
$lang['Max_sig_length_explain'] = 'Nombre maximal de caract�res dans la signature de l\'utilisateur';
$lang['Allow_name_change'] = 'Autoriser les changements de nom d\'utilisateur';

$lang['Avatar_settings'] = 'Option des avatars';
$lang['Allow_local'] = 'Activer la galerie des avatars';
$lang['Allow_remote'] = 'Activer les avatars � distance';
$lang['Allow_remote_explain'] = 'Les avatars sont stock�s sur un autre site web';
$lang['Allow_upload'] = 'Activer l\'envoi d\'avatar';
$lang['Max_filesize'] = 'Taille maximale du fichier avatar';
$lang['Max_filesize_explain'] = 'Pour les avatars envoy�s';
$lang['Max_avatar_size'] = 'Dimensions maximales de l\'avatar';
$lang['Max_avatar_size_explain'] = '(Hauteur x Largeur en pixels)';
$lang['Avatar_storage_path'] = 'Chemin de stockage des avatars';
$lang['Avatar_storage_path_explain'] = 'Chemin sous votre r�pertoire phpBB, ex : images/avatars';
$lang['Avatar_gallery_path'] = 'Chemin de la galerie des avatars';
$lang['Avatar_gallery_path_explain'] = 'Chemin sous votre r�pertoire phpBB pour les images pr�-charg�es, ex : images/avatars/gallery';

$lang['COPPA_settings'] = 'Options COPPA';
$lang['COPPA_fax'] = 'Num�ro de Fax COPPA';
$lang['COPPA_mail'] = 'Adresse postale de la COPPA';
$lang['COPPA_mail_explain'] = 'Ceci est l\'adresse postale o� les parents enverront le formulaire d\'enregistrement COPPA';

$lang['Email_settings'] = 'Options de l\'e-mail';
$lang['Admin_email'] = 'Adresse e-mail de l\'Administrateur';
$lang['Email_sig'] = 'Signature e-mail';
$lang['Email_sig_explain'] = 'Ce texte sera attach� � tous les e-mails que le forum enverra';
$lang['Use_SMTP'] = 'Utiliser un serveur SMTP pour l\'e-mail';
$lang['Use_SMTP_explain'] = 'Dites oui si vous voulez ou devez envoyer des e-mails par un serveur sp�cifique au lieu de la fonction locale mail()';
$lang['SMTP_server'] = 'Adresse du serveur SMTP';
$lang['SMTP_username'] = 'Nom d\'utilisateur SMTP';
$lang['SMTP_username_explain'] = 'Entrez un nom d\'utilisateur pour votre serveur SMTP seulement si n�cessaire';
$lang['SMTP_password'] = 'Mot de passe SMTP';
$lang['SMTP_password_explain'] = 'Entrez un mot de passe pour votre serveur SMTP seulement si n�cessaire';

$lang['Disable_privmsg'] = 'Messagerie Priv�e';
$lang['Inbox_limits'] = 'Messages Max dans la Bo�te de r�ception';
$lang['Sentbox_limits'] = 'Messages Max dans la Bo�te des messages envoy�s';
$lang['Savebox_limits'] = 'Message Max dans la Bo�te des Archives';

$lang['Cookie_settings'] = 'Options du Cooky';
$lang['Cookie_settings_explain'] = 'Ces d�tails d�finissent la mani�re dont les cookies sont envoy�s au navigateur internet des utilisateurs. Dans la majeure partie des cas, les valeurs par d�faut devraient �tre suffisantes. Si vous avez besoin de les modifier, faites-le avec pr�caution; des valeurs incorrectes pourraient emp�cher les utilisateurs de se connecter.';
$lang['Cookie_domain'] = 'Domaine du cooky';
$lang['Cookie_name'] = 'Nom du cooky';
$lang['Cookie_path'] = 'Chemin du cooky';
$lang['Cookie_secure'] = 'Cooky s�curis�';
$lang['Cookie_secure_explain'] = 'Si votre serveur fonctionne via SSL, activez cette fonction; sinon, laissez-la d�sactiv�e';
$lang['Session_length'] = 'Dur�e de la session [ secondes ]';

// Visual Confirmation
$lang['Visual_confirm'] = 'Activer la confirmation visuelle';
$lang['Visual_confirm_explain'] = 'Requiert que les nouveaux utilisateurs entrent un code d�fini par une image lors de leur enregistrement.';

// Autologin Keys - added 2.0.18
$lang['Allow_autologin'] = 'Permettre les connexions automatiques';
$lang['Allow_autologin_explain'] = 'D�termine si les utilisateurs sont autoris�s � choisir d\'�tre automatiquement connect� lors de leur visite sur le forum';
$lang['Autologin_time'] = 'Expiration de la clef de connexion automatique';
$lang['Autologin_time_explain'] = 'Nombre de jour(s) durant lequel(s), la clef de connexion automatique est valide si l\'utilisateur ne visite le forum. Mettre � z�ro pour d�sactiver l\'expiration.';
// Search Flood Control - added 2.0.20
$lang['Search_Flood_Interval'] = 'Intervalles de flood pour la recherche';
$lang['Search_Flood_Interval_explain'] = 'Temps en secondes qu\'un utilisateur doit patienter entre deux recherches'; 

//
// Forum Management
//
$lang['Forum_admin'] = 'Administration des Forums';
$lang['Forum_admin_explain'] = 'Depuis ce panneau de contr�le, vous pouvez ajouter, supprimer, �diter, r�ordonner et resynchroniser vos cat�gories et forums.';
$lang['Edit_forum'] = 'Editer un forum';
$lang['Create_forum'] = 'Cr�er un nouveau forum';
$lang['Create_category'] = 'Cr�er une nouvelle cat�gorie';
$lang['Remove'] = 'Enlever';
$lang['Action'] = 'Action';
$lang['Update_order'] = 'Mettre � jour l\'Ordre';
$lang['Config_updated'] = 'Configuration du Forum mise � jour avec succ�s';
$lang['Edit'] = 'Editer';
$lang['Delete'] = 'Supprimer';
$lang['Move_up'] = 'Monter';
$lang['Move_down'] = 'Descendre';
$lang['Resync'] = 'Resynchroniser';
$lang['No_mode'] = 'Aucun mode n\'a �t� d�fini';
$lang['Forum_edit_delete_explain'] = 'Le formulaire ci-dessous vous permettra de personnaliser toutes les options g�n�rales du forum. Pour les configurations Utilisateurs et Forums, utilisez les liens relatifs dans le volet de gauche.';

$lang['Move_contents'] = 'D�placer tout le contenu vers';
$lang['Forum_delete'] = 'Supprimer un Forum';
$lang['Forum_delete_explain'] = 'Le formulaire ci-dessous vous permettra de supprimer un forum (ou une cat�gorie) et d�cider o� vous voulez mettre les messages (ou les forums) qu\'il contenait.';

$lang['Status_locked'] = 'Verrouill�';
$lang['Status_unlocked'] = 'D�verrouill�';
$lang['Forum_settings'] = 'Options G�n�rales des Forums';
$lang['Forum_name'] = 'Nom du Forum';
$lang['Forum_desc'] = 'Description';
$lang['Forum_status'] = 'Statut du forum';
$lang['Forum_icon'] = 'Ic�ne du forum<br /><span class="gensmall">Par exemple, si v�tre image est situ�e ci-contre : <b>phpBBRoot/images/forum_icon/test.gif</b><br /> alors il faudra indiquer comme ceci : <b>images/forum_icon/test.gif</b></span>'; // Forum Icon MOD
$lang['Forum_pruning'] = 'Auto-d�lestage';

$lang['prune_freq'] = 'V�rifier l\'�ge des sujets tous les ';
$lang['prune_days'] = 'Retirer les sujets n\'ayant pas eu de r�ponses depuis';
$lang['Set_prune_data'] = 'Vous avez activ� l\'auto-d�lestage pour ce forum mais n\'avez pas d�fini une fr�quence ou un nombre de jours � d�lester. Veuillez revenir en arri�re et le faire';

$lang['Move_and_Delete'] = 'D�placer et Supprimer';

$lang['Delete_all_posts'] = 'Supprimer tous les messages';
$lang['Nowhere_to_move'] = 'Nul part o� d�placer';

$lang['Edit_Category'] = 'Editer une Cat�gorie';
$lang['Edit_Category_explain'] = 'Utilisez ce formulaire pour modifer le nom d\'une cat�gorie.';

$lang['Forums_updated'] = 'Informations du Forum et de la Cat�gorie mises � jour avec succ�s';

$lang['Must_delete_forums'] = 'Vous devez supprimer tous vos forums avant de pouvoir supprimer cette cat�gorie';

$lang['Click_return_forumadmin'] = 'Cliquez %sici%s pour revenir � l\'Administration des Forums';


//
// Smiley Management
//
$lang['smiley_title'] = 'Utilitaire d\'Edition des Smilies';
$lang['smile_desc'] = 'Depuis cette page vous pouvez ajouter, retirer et �diter les �motic�nes ou smilies que les utilisateurs utilisent dans leurs messages et messages priv�s.';

$lang['smiley_config'] = 'Configuration des Smilies';
$lang['smiley_code'] = 'Code du Smilie';
$lang['smiley_url'] = 'Fichier Image du Smilie';
$lang['smiley_emot'] = 'Emotion du Smilie';
$lang['smile_add'] = 'Ajouter un nouveau Smilie';
$lang['Smile'] = 'Smile';
$lang['Emotion'] = 'Emotion';

$lang['Select_pak'] = 'Selectionner le Fichier Pack (.pak)';
$lang['replace_existing'] = 'Remplacer les Smilies existants';
$lang['keep_existing'] = 'Conserver les Smilies existants';
$lang['smiley_import_inst'] = 'Vous devez d�zipper le pack de smilies et envoyer tous les fichiers dans le r�pertoire de Smilies appropri� pour l\'installation. Ensuite, s�lectionnez les informations correctes dans ce formulaire pour importer le pack de smilies.';
$lang['smiley_import'] = 'Importer un Pack de Smilies';
$lang['choose_smile_pak'] = 'Choisir un Pack de Smilies, fichier .pak';
$lang['import'] = 'Importer les Smilies';
$lang['smile_conflicts'] = 'Que doit-il �tre fait en cas de conflits ?';
$lang['del_existing_smileys'] = 'Supprimer les smilies existants avant l\'importation';
$lang['import_smile_pack'] = 'Importer un Pack de Smilies';
$lang['export_smile_pack'] = 'Cr�er un Pack de Smilies';
$lang['export_smiles'] = 'Pour cr�er un pack de smilies � partir de vos smilies actuellement install�s, cliquez %sici%s pour t�l�charger le fichier .pak de smilies. Nommez ce fichier de fa�on appropri�e afin de vous assurer de conserver l\'extension de fichier .pak. Ensuite, cr�ez un fichier zip contenant toutes les images de vos smilies plus le fichier de configuration .pak.';

$lang['smiley_add_success'] = 'Le smilie a �t� ajout� avec succ�s';
$lang['smiley_edit_success'] = 'Le smilie a �t� mis � jour avec succ�s';
$lang['smiley_import_success'] = 'Le pack de smilies a �t� import� avec succ�s !';
$lang['smiley_del_success'] = 'Le smilie a �t� retir� avec succ�s';
$lang['Click_return_smileadmin'] = 'Cliquez %sici%s pour revenir � l\'Administration des Smilies';
$lang['Confirm_delete_smiley'] = '�tes-vous s�re de vouloir supprimer ce smiley ?';


//
// User Management
//
$lang['User_admin'] = 'Administration des Utilisateurs';
$lang['User_admin_explain'] = 'Ici, vous pouvez changer les informations des utilisateurs et certaines options sp�cifiques. Pour modifier les permissions des utilisateurs, veuillez utiliser le syst�me de permissions d\'utilisateurs et de groupes.';

$lang['Look_up_user'] = 'Rechercher l\'utilisateur';

$lang['Admin_user_fail'] = 'Impossible de mettre � jour le profil de l\'utilisateur.';
$lang['Admin_user_updated'] = 'Le profil de l\'utilisateur a �t� mis � jour avec succ�s.';
$lang['Click_return_useradmin'] = 'Cliquez %sici%s pour revenir � l\'Administration des Utilisateurs';

// Start Quick Administrator User Options and Information MOD
$lang['Click_return_userprofile'] = 'Cliquez %sici%s pour revenir au profil de l\'utilisateur';
// End Quick Administrator User Options and Information MOD

$lang['User_delete'] = 'Supprimer cet utilisateur';
$lang['User_delete_explain'] = 'Cliquez ici pour supprimer cet utilisateur; ceci ne peut pas �tre r�tabli.';
$lang['User_deleted'] = 'L\'utilisateur a �t� supprim� avec succ�s.';

$lang['User_status'] = 'L\'utilisateur est actif';
$lang['User_allowpm'] = 'Peut envoyer des Messages Priv�s';
$lang['User_allowavatar'] = 'Peut afficher un avatar';

$lang['Admin_avatar_explain'] = 'Ici vous pouvez voir et supprimer l\'avatar actuel de l\'utilisateur.';

$lang['User_special'] = 'Champs sp�ciaux pour administrateurs uniquement';
$lang['User_special_explain'] = 'Ces champs ne peuvent pas �tre modifi�s par l\'utilisateur. Ici, vous pouvez d�finir leur statut et d\'autres options non donn�es aux utilisateurs.';


//
// Group Management
//
$lang['Group_administration'] = 'Administration des Groupes';
$lang['Group_admin_explain'] = 'Depuis ce panneau, vous pouvez administrer tous vos groupes d\'utilisateurs. Vous pouvez supprimer, cr�er et �diter les groupes existants. Vous pouvez choisir des mod�rateurs, alterner le statut ouvert/ferm� d\'un groupe et d�finir le nom et la description d\'un groupe';
$lang['Error_updating_groups'] = 'Il y a eu une erreur durant la mise � jour des groupes';
$lang['Updated_group'] = 'Le groupe a �t� mis � jour avec succ�s';
$lang['Added_new_group'] = 'Le nouveau groupe a �t� cr�� avec succ�s';
$lang['Deleted_group'] = 'Le groupe a �t� supprim� avec succ�s';
$lang['New_group'] = 'Cr�er un nouveau groupe';
$lang['Edit_group'] = 'Editer un groupe';
$lang['group_name'] = 'Nom du groupe';
$lang['group_description'] = 'Description du groupe';
$lang['group_moderator'] = 'Mod�rateur du groupe';
$lang['group_status'] = 'Statut du groupe';
$lang['group_open'] = 'Groupe ouvert';
$lang['group_closed'] = 'Groupe ferm�';
$lang['group_hidden'] = 'Groupe invisible';
$lang['group_delete'] = 'Supprimer un groupe';
$lang['group_delete_check'] = 'Supprimer ce groupe';
$lang['submit_group_changes'] = 'Envoyer les modifications';
$lang['reset_group_changes'] = 'Remettre � zero';
$lang['No_group_name'] = 'Vous devez sp�cifier un nom pour ce groupe';
$lang['No_group_moderator'] = 'Vous devez sp�cifier un mod�rateur pour ce groupe';
$lang['No_group_mode'] = 'Vous devez sp�cifier un mode pour ce groupe, ouvert ou ferm�';
$lang['No_group_action'] = 'Aucune action n\'a �t� sp�cifi�e';
$lang['delete_group_moderator'] = 'Supprimer l\'ancien mod�rateur du groupe ?';
$lang['delete_moderator_explain'] = 'Si vous changez le mod�rateur du groupe, cochez cette case pour enlever l\'ancien mod�rateur de ce groupe. Sinon, vous pouvez ne pas la cocher, et l\'utilisateur deviendra un membre r�gulier de ce groupe.';
$lang['Click_return_groupsadmin'] = 'Cliquez %sici%s pour revenir � l\'Administration des Groupes.';
$lang['Select_group'] = 'S�lectionner un groupe';
$lang['Look_up_group'] = 'Rechercher le groupe';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'D�lester un Forum';
$lang['Forum_Prune_explain'] = 'Ceci supprimera tous les sujets n\'ayant pas eu de r�ponses depuis le nombre de jours que vous aurez choisi. Si vous n\'entrez pas de nombre, tous les sujets seront supprim�s. Par contre cela ne supprimera ni les sujets dans lesquels un sondage est encore en cours, ni les annonces. Vous devrez supprimer ces sujets manuellement.';
$lang['Do_Prune'] = 'Faire le D�lestage';
$lang['All_Forums'] = 'Tous les Forums';
$lang['Prune_topics_not_posted'] = 'D�lester les sujets sans r�ponses depuis cette p�riode (en jours)';
$lang['Topics_pruned'] = 'Sujets d�lest�s';
$lang['Posts_pruned'] = 'Messages d�lest�s';
$lang['Prune_success'] = 'Le d�lestage des forums s\'est d�roul� avec succ�s';


//
// Word censor
//
$lang['Words_title'] = 'Censure des Mots';
$lang['Words_explain'] = 'Depuis ce panneau de contr�le, vous pouvez ajouter, �diter, et retirer les mots qui seront automatiquement censur�s sur vos forums. De plus, les gens ne seront pas autoris�s � s\'inscrire avec des noms d\'utilisateurs contenant ces mots. Les jokers (*) sont accept�s dans le champ \'Mot\', ex : *test* concordera avec detestable, test* concordera avec testing, et *test avec detest.';
$lang['Word'] = 'Mot';
$lang['Edit_word_censor'] = 'Editer la censure du mot';
$lang['Replacement'] = 'Remplacement';
$lang['Add_new_word'] = 'Ajouter un nouveau mot';
$lang['Update_word'] = 'Mettre � jour la censure du mot';

$lang['Must_enter_word'] = 'Vous devez entrer un mot et son rempla�ant';
$lang['No_word_selected'] = 'Aucun mot s�lectionn� pour l\'�dition';

$lang['Word_updated'] = 'Le mot censur� s�lectionn� a �t� mis � jour avec succ�s';
$lang['Word_added'] = 'Le mot censur� a �t� ajout� avec succ�s';
$lang['Word_removed'] = 'Le mot censur� s�lectionn� a �t� retir� avec succ�s';

$lang['Click_return_wordadmin'] = 'Cliquez %sici%s pour revenir � l\'Administration de la Censure des Mots';
$lang['Confirm_delete_word'] = 'Etes-vous s�re de vouloir supprimer ce mot censur� ?';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'Ici, vous pouvez envoyer le m�me e-mail � tous les utilisateurs du forum ou seulement � ceux d\'un groupe donn�. Pour ce faire, un e-mail sera envoy� en copie cach�e � partir de l\'adresse e-mail d\'administration vers ses destinataires. L\'envoi massif d\'e-mail prend un certain temps; soyez patient apr�s l\'envoi et n\'interrompez pas le chargement de la page. Vous serez averti automatiquement de la fin de l\'op�ration.';
$lang['Compose'] = 'Composer';

$lang['Recipients'] = 'Destinataires';
$lang['All_users'] = 'Tous les Utilisateurs';

$lang['Email_successfull'] = 'Votre message a �t� envoy�';
$lang['Click_return_massemail'] = 'Cliquez %sici%s pour revenir au formulaire de l\'E-mail de Masse';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Administration des Rangs';
$lang['Ranks_explain'] = 'En utilisant ce formulaire vous pouvez ajouter, �diter, voir et supprimer des rangs. Vous pouvez �galement cr�er des rangs personnalis�s qui pourront �tre assign�s � des utilisateurs sp�cifiques par l\'outil de Gestion des Utilisateurs';

$lang['Add_new_rank'] = 'Ajouter un nouveau rang';

$lang['Rank_title'] = 'Titre du Rang';
$lang['Rank_special'] = 'D�finir en tant que Rang Sp�cial';
$lang['Rank_minimum'] = 'Messages Minimums'; 
$lang['Rank_maximum'] = 'Messages Maximums';
$lang['Rank_image'] = 'Image du Rang (relatif au chemin de phpBB2)';
$lang['Rank_image_explain'] = 'Utilisez ceci pour associer une petite image avec le rang en question';

$lang['Must_select_rank'] = 'Vous devez s�lectionner un rang';
$lang['No_assigned_rank'] = 'Aucun rang sp�cial assign�';

$lang['Rank_updated'] = 'Le rang a �t� mis � jour avec succ�s';
$lang['Rank_added'] = 'Le rang a �t� ajout� avec succ�s';
$lang['Rank_removed'] = 'Le rang a �t� supprim� avec succ�s';
$lang['No_update_ranks'] = 'Le rang a �t� supprim� avec succ�s; toutefois, les comptes des utilisateurs n\'ont pas �t� mis � jour. Vous devrez remettre � z�ro manuellement leur rang.';

$lang['Click_return_rankadmin'] = 'Cliquez %sici%s pour revenir � l\'Administration des Rangs';
$lang['Confirm_delete_rank'] = 'Etes-vous s�re de vouloir supprimer ce rang ?';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Contr�le des Noms d\'utilisateurs Interdits';
$lang['Disallow_explain'] = 'Ici, vous pouvez contr�ler les noms d\'utilisateurs qui seront interdits � l\'usage. Les noms d\'utilisateurs interdits peuvent contenir un caract�re joker (*). Veuillez noter que vous ne pourrez pas interdire un nom d\'utilisateur d�j� enregistr�; vous devrez d\'abord supprimer le compte de l\'utilisateur et ensuite interdire le nom d\'utilisateur';

$lang['Delete_disallow'] = 'Supprimer';
$lang['Delete_disallow_title'] = 'Retirer un Nom d\'utilisateur Interdit';
$lang['Delete_disallow_explain'] = 'Vous pouvez retirer un nom d\'utilisateur interdit en s�lectionnant le nom d\'utilisateur depuis la liste et en cliquant sur Supprimer';

$lang['Add_disallow'] = 'Ajouter';
$lang['Add_disallow_title'] = 'Ajouter un nom d\'utilisateur interdit';
$lang['Add_disallow_explain'] = 'Vous pouvez interdire un nom d\'utilisateur en utilisant le caract�re joker *';

$lang['No_disallowed'] = 'Aucun Nom d\'utilisateur Interdit';

$lang['Disallowed_deleted'] = 'Le nom d\'utilisateur interdit a �t� retir� avec succ�s';
$lang['Disallow_successful'] = 'Le nom d\'utilisateur interdit a �t� ajout� avec succ�s';
$lang['Disallowed_already'] = 'Le nom que vous avez entr� ne peut �tre interdit. Soit il existe d�j� dans la liste, soit il est dans la liste des mots censur�s, ou soit il est d�j� enregistr�';

$lang['Click_return_disallowadmin'] = 'Cliquez %sici%s pour revenir � l\'Administration des Noms d\'utilisateurs Interdits';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Administration des Th�mes';
$lang['Styles_explain'] = 'En utilisant cet outil, vous pouvez ajouter, �diter, supprimer et g�rer les th�mes (mod�les de documents et th�mes) disponibles aupr�s des utilisateurs.';
$lang['Styles_addnew_explain'] = 'La liste suivante contient tous les th�mes actuellement disponibles pour le mod�le de document courant. Les �l�ments sur cette liste n\'ont pas encore �t� install�s dans la base de donn�es de phpBB. Pour installer un th�me, il suffit de cliquer sur le lien \'Installer\' � c�t� d\'une entr�e';

$lang['Select_template'] = 'S�lectionner un Mod�le de document';

$lang['Style'] = 'Th�me';
$lang['Template'] = 'Mod�le de document';
$lang['Install'] = 'Installer';
$lang['Download'] = 'T�l�charger';

$lang['Edit_theme'] = 'Editer un Th�me';
$lang['Edit_theme_explain'] = 'Dans le formulaire ci-dessous, vous pouvez �diter les param�tres pour le th�me s�lectionn�';

$lang['Create_theme'] = 'Cr�er un Th�me';
$lang['Create_theme_explain'] = 'Utilisez le formulaire ci-dessous pour cr�er un nouveau th�me pour un mod�le de document s�lectionn�. Lorsque vous entrerez les couleurs (pour lesquelles vous devrez utiliser une notation hexad�cimale), vous ne devrez pas inclure le # initial, ex : CCCCCC est valide, #CCCCCC ne l\'est pas';

$lang['Export_themes'] = 'Exporter des Th�mes';
$lang['Export_explain'] = 'Dans ce panneau, vous pourrez exporter les donn�es de ce th�me pour un mod�le de document s�lectionn�. S�lectionnez le mod�le de document depuis la liste ci-dessous, et le script cr�era le fichier de configuration du th�me et essaiera de le copier dans le r�pertoire s�lectionn� des mod�les de documents. S\'il ne peut pas le copier lui-m�me, il vous proposera de le t�l�charger. Afin que le script puisse copier le fichier, vous devez donner les droits d\'�criture pour le r�pertoire sur le serveur. Pour plus d\'informations � propos de cela, allez voir le Guide de l\'utilisateur de phpBB 2.';

$lang['Theme_installed'] = 'Le th�me s�lectionn� a �t� install� avec succ�s';
$lang['Style_removed'] = 'Le th�me s�lectionn� a �t� retir� de la base de donn�es. Pour enlever compl�tement ce th�me de votre syst�me, vous devez supprimer les fichiers appropri�s dans le r�pertoire du mod�le de document.';
$lang['Theme_info_saved'] = 'Les informations du th�me pour le mod�le de document s�lectionn� ont �t� sauvegard�es. Vous devriez restreindre les permissions du fichier theme_info.cfg (et si possible dans le r�pertoire du mod�le de document s�lectionn�) � la lecture seule';
$lang['Theme_updated'] = 'Le th�me s�lectionn� a �t� mis � jour. Vous devriez exporter maintenant les nouveaux param�tres du th�me';
$lang['Theme_created'] = 'Th�me cr��. Vous devriez exporter maintenant le th�me vers le fichier de configuration du th�me pour le conserver en lieu s�r ou l\'utiliser ailleurs';

$lang['Confirm_delete_style'] = 'Etes-vous s�r de vouloir supprimer ce th�me ?';

$lang['Download_theme_cfg'] = 'L\'exportateur n\'arrive pas � �crire le fichier des informations du th�me. Cliquez sur le bouton ci-dessous pour t�l�charger ce fichier avec votre navigateur internet. Une fois t�l�charg�, vous pourrez le transf�rer vers le r�pertoire contenant les mod�les de documents. Vous pourrez ensuite cr�er un pack des fichiers pour le distribuer ou l\'utiliser ailleurs si vous le d�sirez';
$lang['No_themes'] = 'Le mod�le de document que vous avez s�lectionn� n\'a pas de th�me. Pour cr�er un nouveau th�me, cliquez sur Cr�er un Nouveau Th�me sur le volet de gauche';
$lang['No_template_dir'] = 'Impossible d\'ouvrir le r�pertoire du mod�le de document. Il peut �tre illisible par le serveur ou ne pas exister';
$lang['Cannot_remove_style'] = 'Vous ne pouvez pas enlever le th�me s�lectionn� tant qu\'il est utilis� par le forum en tant que th�me par d�faut. Veuillez changer le th�me par d�faut et r�essayer.';
$lang['Style_exists'] = 'Le nom du th�me choisi existe d�j�; veuillez revenir en arri�re et choisir un nom diff�rent.';

$lang['Click_return_styleadmin'] = 'Cliquez %sici%s pour revenir � l\'administration des th�mes';

$lang['Theme_settings'] = 'Options du th�me';
$lang['Theme_element'] = 'El�ment du th�me';
$lang['Simple_name'] = 'Nom simple';
$lang['Value'] = 'Valeur';
$lang['Save_Settings'] = 'Sauver les param�tres';

$lang['Stylesheet'] = 'Feuille de style CSS';
$lang['Stylesheet_explain'] = 'Nom du fichier pour la feuille de style CSS � utiliser pour ce th�me.';
$lang['Background_image'] = 'Image de fond';
$lang['Background_color'] = 'Couleur de fond';
$lang['Theme_name'] = 'Nom du th�me';
$lang['Link_color'] = 'Couleur du lien';
$lang['Text_color'] = 'Couleur du texte';
$lang['VLink_color'] = 'Couleur du lien Visit�';
$lang['ALink_color'] = 'Couleur du lien Actif';
$lang['HLink_color'] = 'Couleur du lien survol�';
$lang['Tr_color1'] = 'Table Rang�e Couleur 1';
$lang['Tr_color2'] = 'Table Rang�e Couleur 2';
$lang['Tr_color3'] = 'Table Rang�e Couleur 3';
$lang['Tr_class1'] = 'Table Rang�e Class 1';
$lang['Tr_class2'] = 'Table Rang�e Class 2';
$lang['Tr_class3'] = 'Table Rang�e Class 3';
$lang['Th_color1'] = 'Table En-t�te Couleur 1';
$lang['Th_color2'] = 'Table En-t�te Couleur 2';
$lang['Th_color3'] = 'Table En-t�te Couleur 3';
$lang['Th_class1'] = 'Table En-t�te Class 1';
$lang['Th_class2'] = 'Table En-t�te Class 2';
$lang['Th_class3'] = 'Table En-t�te Class 3';
$lang['Td_color1'] = 'Table Cellule Couleur 1';
$lang['Td_color2'] = 'Table Cellule Couleur 2';
$lang['Td_color3'] = 'Table Cellule Couleur 3';
$lang['Td_class1'] = 'Table Cellule Class 1';
$lang['Td_class2'] = 'Table Cellule Class 2';
$lang['Td_class3'] = 'Table Cellule Class 3';
$lang['fontface1'] = 'Nom de la police 1';
$lang['fontface2'] = 'Nom de la police 2';
$lang['fontface3'] = 'Nom de la police 3';
$lang['fontsize1'] = 'Taille Police 1';
$lang['fontsize2'] = 'Taille Police 2';
$lang['fontsize3'] = 'Taille Police 3';
$lang['fontcolor1'] = 'Couleur Police 1';
$lang['fontcolor2'] = 'Couleur Police 2';
$lang['fontcolor3'] = 'Couleur Police 3';
$lang['span_class1'] = 'Span Class 1';
$lang['span_class2'] = 'Span Class 2';
$lang['span_class3'] = 'Span Class 3';
$lang['img_poll_size'] = 'Taille Image Sondage [px]';
$lang['img_pm_size'] = 'Taille Statut Message Priv� [px]';


//
// Install Process
//
$lang['Welcome_install'] = 'Bienvenue � l\'installation de phpBB 2<br /> ArkaMod V2 de EZcom-fr.com';
$lang['Initial_config'] = 'Configuration de base';
$lang['DB_config'] = 'Configuration de la base de donn�es';
$lang['Admin_config'] = 'Configuration du compte administrateur';
$lang['continue_upgrade'] = 'Une fois que vous avez t�l�charg� le fichier config.php vers votre ordinateur, vous pouvez cliquer sur le boutton \'Continuer la Mise � jour\' ci-dessous pour progresser dans le processus de mise � jour. Veuillez attendre la fin du processus de mise � jour avant d\'envoyer le fichier config.php.';
$lang['upgrade_submit'] = 'Continuer la mise � jour';

$lang['Installer_Error'] = 'Une erreur s\'est produite durant l\'installation';
$lang['Previous_Install'] = 'Une installation pr�c�dente a �t� d�tect�e';
$lang['Install_db_error'] = 'Une erreur s\'est produite en essayant de mettre � jour la base de donn�es';

$lang['Re_install'] = 'Votre installation pr�c�dente est toujours active. <br /><br />Si vous voulez r�installer phpBB 2, cliquez sur le bouton Oui ci-dessous. Vous �tes conscient qu\'en faisant cela, vous d�truirez toutes les donn�es existantes; aucune sauvegarde ne sera faite ! Le nom d\'utilisateur de l\'administrateur et le mot de passe que vous utilisez pour vous connecter au forum sera recr�� apr�s la r�installation; rien d\'autre ne sera fait conserv�. <br /><br />R�fl�chissez bien avant d\'appuyer sur Oui !';

$lang['Inst_Step_0'] = 'Merci d\'avoir choisi phpBB 2. Afin d\'achever cette installation, veuillez remplir les d�tails demand�s ci-dessous. Veuillez noter que la base de donn�es dans laquelle vous installez devrait d�j� exister. Si vous �tes en train d\'installer sur une base de donn�es qui utilise ODBC, MS Access par exemple, vous devez d\'abord lui cr�er un SGBD avant de continuer.';

$lang['Start_Install'] = 'D�marrer l\'installation';
$lang['Finish_Install'] = 'Finir l\'installation';

$lang['Default_lang'] = 'Langue par d�faut du Forum';
$lang['DB_Host'] = 'Nom du Serveur de Base de donn�es / SGBD';
$lang['DB_Name'] = 'Nom de votre base de donn�es';
$lang['DB_Username'] = 'Nom d\'utilisateur';
$lang['DB_Password'] = 'Mot de passe';
$lang['Database'] = 'Votre Base de donn�es';
$lang['Install_lang'] = 'Choisissez la langue pour l\'installation';
$lang['dbms'] = 'Type de la base de donn�es';
$lang['Table_Prefix'] = 'Pr�fixe des tables';
$lang['Admin_Username'] = 'Nom d\'utilisateur';
$lang['Admin_Password'] = 'Mot de passe';
$lang['Admin_Password_confirm'] = 'Mot de passe [ Confirmer ]';

$lang['Inst_Step_2'] = 'Votre compte d\'administration a �t� cr��. A ce point, l\'installation de base est termin�e. Vous allez �tre redirig� vers une nouvelle page qui vous permettra d\'administrer votre nouvelle installation. Veuillez vous assurer de v�rifier les d�tails de la Configuration G�n�rale et d\'op�rer les changements qui s\'imposent. Merci d\'avoir choisi phpBB 2.';

$lang['Unwriteable_config'] = 'Votre fichier config.php est en lecture seule actuellement. Une copie du fichier config.php va vous �tre propos�e en t�l�chargement apr�s avoir avoir cliqu� sur le boutton ci-dessous. Vous devrez envoyer ce fichier dans le m�me r�pertoire o� est install� phpBB 2. Une fois termin�, vous pourrez vous connecter en utilisant vos nom d\'utilisateur et mot de passe d\'administrateur que vous avez fourni pr�c�demment, et visiter le Panneau d\'Administration (un lien appara�tra en bas de chaque page une fois connect�) pour v�rifier la Configuration G�n�rale. Merci d\'avoir choisi phpBB 2.';
$lang['Download_config'] = 'T�l�charger le fichier config.php';

$lang['ftp_choose'] = 'Choisir la m�thode de t�l�chargement';
$lang['ftp_option'] = '<br />Tant que les extensions FTP seront activ�es dans cette version de PHP, l\'option d\'essayer d\'envoyer automatiquement le fichier config.php sur un ftp peut vous �tre donn�e.';
$lang['ftp_instructs'] = 'Vous avez choisi de transf�rer automatiquement via FTP le fichier vers le compte contenant phpBB 2. Veuillez compl�ter les informations ci-dessous afin de faciliter cette op�ration. Notez que le chemin FTP doit �tre le chemin exact vers le r�pertoire o� est install� phpBB2 comme si vous �tiez en train d\'envoyer le fichier avec n\'importe quel client FTP.';
$lang['ftp_info'] = 'Entrez vos informations FTP';
$lang['Attempt_ftp'] = 'Essayer de transf�rer le fichier config.php vers un serveur ftp';
$lang['Send_file'] = 'Juste m\'envoyer le fichier et je l\'enverrai manuellement sur le serveur ftp';
$lang['ftp_path'] = 'Chemin de phpBB2 FTP';
$lang['ftp_username'] = 'Votre nom d\'utilisateur FTP';
$lang['ftp_password'] = 'Votre mot de passe FTP';
$lang['Transfer_config'] = 'D�marrer le transfert';
$lang['NoFTP_config'] = 'La tentative d\'envoi du fichier config.php par FTP a �chou�. Veuillez t�l�charger le fichier config.php et l\'envoyer manuellement sur votre serveur FTP.';

$lang['Install'] = 'Installation';
$lang['Upgrade'] = 'Mise � jour';


$lang['Install_Method'] = 'Choix du type d\'installation';

$lang['Install_No_Ext'] = 'La configuration de php sur votre serveur ne supporte pas le type de base de donn�es que vous avez choisi';

$lang['Install_No_PCRE'] = 'phpBB2 requiert le support des expressions r�guli�res Perl pour PHP, mais votre configuration de PHP ne le supporte apparemment pas !';

//
// Version Check
//
$lang['Version_up_to_date'] = 'Votre installation est � jour, aucune mise � jour n\'est disponible pour votre version de phpBB.';
$lang['Version_not_up_to_date'] = 'Votre installation de phpBB <b>ne semble pas</b> �tre � jour. Des mises � jours sont disponibles pour votre version de phpBB, veuillez visiter <a href="http://www.phpbb.com/downloads.php" target="_new">http://www.phpbb.com/downloads.php</a> ou <a href="http://www.phpbb-fr.com/">http://www.phpbb-fr.com/</a> afin d\'obtenir une version plus r�cente.';
$lang['Latest_version_info'] = 'La derni�re version de phpBB disponible est <b>phpBB %s</b>.';
$lang['Current_version_info'] = 'Vous utilisez <b>phpBB %s</b>.';
$lang['Connect_socket_error'] = 'Impossible d\'ouvrir une connection au serveur phpBB, l\'erreur retourn�e est :<br />%s.';
$lang['Socket_functions_disabled'] = 'Impossible d\'utiliser les fonctions de socket.';
$lang['Mailing_list_subscribe_reminder'] = 'Afin d\'obtenir les derni�res informations sur les mises � jours de phpBB, <a href="http://www.phpbb.com/support/" target="_new">inscrivez-vous � notre liste de diffusion</a> (en anglais).';
$lang['Version_information'] = 'Informations de version'; 
//
//Advance Admin Index 
//
$lang['Board_statistic'] = 'Statistiques du forum';
$lang['Database_statistic'] = 'Statistiques de la Base De Donn�es';
$lang['Version_info'] = 'Informations de Version';
$lang['Thereof_deactivated_users'] = 'Nombre de Membres Inactifs';
$lang['Thereof_Moderators'] = 'Nombres de Mod�rateurs';
$lang['Thereof_Administrators'] = 'Nombres d\'Administrateurs';
$lang['Deactivated_Users'] = 'Membres en attente d\'Activation';
$lang['Users_with_Admin_Privileges'] = 'Membres ayant les droits d\'Administrateur';
$lang['Users_with_Mod_Privileges'] = 'Membres ayant les droits de Mod�rateur';
$lang['DB_size'] = 'Taille de la Base De Donn�es';
$lang['Version_of_PHP'] = 'Version de <a href="http://www.php.net/">PHP</a>';
$lang['Version_of_MySQL'] = 'Version de <a href="http://www.mysql.com/">MySQL</a>';

//
// Config dragonsmod (PreMOD DragonsMod)
//
$lang['Config_arkamod'] = 'ArkaMod +';
$lang['General_Config_arkamod'] = 'Configuration G�n�rale de la Pre-Mode ArkaMod';
$lang['Config_arkamod_explain'] = 'Le formulaire ci-dessous vous permettra de personnaliser toutes les options g�n�rales de la Pre-Mode ArkaMod.';
$lang['General_arkamod_settings'] = 'Options G�n�rales de la Pre-Mode ArkaMod';
$lang['Config_arkamod_updated'] = 'Configuration de la Pre-Mode ArkaMod mise � jour avec succ�s';

//
// Login attempts configuration
//
$lang['Max_login_attempts'] = 'Nombre de tentatives de connexions autoris�es';
$lang['Max_login_attempts_explain'] = 'Permet de d�finir le nombre maximum de tentatives de connexions apr�s lequel l\'utilisateur ne pourra plus se connecter.';
$lang['Login_reset_time'] = 'Temps de blocage de la connexion';
$lang['Login_reset_time_explain'] = 'Nombre de minutes durant lequel un utilisateur ayant d�pass� le nombre de tentatives connexions autoris�es ne pourra pas se connecter';
$lang['game_access_settings'] = 'Restrictions d\'acc�s aux Jeux'; 
$lang['limit_by_posts'] = 'Activer les restrictions'; 
$lang['posts_needed'] = 'Nombres de messages obligatoires'; 
$lang['days_limit'] = 'Nombre de jours'; 
$lang['limit_by_posts_explain'] = 'En activant ces restrictions, vous emp�chez les membres n\'ayant jamais post� de messages ou depuis un temps d�fini de jouer aux jeux.'; 
$lang['posts_needed_explain'] = 'Le nombre de messages obligatoires pour jouer.'; 
$lang['days_limit_explain'] = 'Le nombre de jours servant � la v�rification des messages.'; 
$lang['posts_only'] = 'Messages seulement'; 
$lang['posts_date'] = 'Messages et Date'; 
$lang['limit_type'] = 'Type de Restriction'; 
$lang['limit_type_explain'] = 'Restreint l\'acc�s aux jeux par messages seulement ou par date et messages.'; 
// ADR admin keys
$lang['User_adr_ban']='ADR Ban?';
$lang['User_adr_ban_explain']='Bannir cet utilisateur pour qu\'il ne puisse plus utiliser aucune des possibilit�s de l\'ADR';
// crewstyle's mod : Forum Link
$lang['Forum_link'] = 'Lien externe';
$lang['Forum_link_explain'] = 'Laissez ce champs vide si vous voulez que ce forum se comporte normalement.<br>Pour le transformer en lien externe, entrez tout simplement l\'URL du lien.';
// crewstyle's mod : Forum Link
//
// That's all Folks!
// -------------------------------------------------

// Added by Attached Forums MOD
$lang['Attached_Field_Title'] = 'Sous-forums';
$lang['Attached_Description'] = 'Ce champs a �t� ajout� par le MOD sub-forums. Cela montrera tous les forums attachables (si disponible) dans cette cat�gorie';
$lang['Detach_Description'] = 'D�tacher tous les forums';
$lang['Has_attachments'] = 'Ce forum a d\'autres forums qui lui sont attach�s. Si vous assignez une nouvelle cat�gorie � ce forum cela fera bouger tous ces sous-forums vers la nouvelle cat�gorie sauf si vous cochez la case "D�tacher"';
$lang['No_attach_forums'] = 'Pas de forum attachable dans cette cat�gorie';
// End Added by Attached Forums MOD
// Arcade
$lang['Admin_arcade_games'] = 'Administration du mod Arcade';
$lang['Manage_arcade_games'] = 'Gestion des jeux d\'arcade';
$lang['Config_arcade'] = 'Configuration';
$lang['Arcade_Config'] = 'Configuration du mod Arcade';
$lang['Arcade_config_explain'] = 'Le formulaire ci-dessous vous permettra de personnaliser toutes les options g�n�rales du mod arcade.';
$lang['Click_return_arcade_config'] = 'Cliquez %sici%s pour revenir � la Configuration du mod Arcade';
$lang['General_arcade_settings'] = 'Options G�n�rales du mod Arcade';
$lang['statarcade_settings'] = 'Options des Stats arcade';
$lang['games_area_settings'] = 'Options de l\'aire de jeu';
$lang['Arcade_config_updated'] = 'Configuration du mod Arcade mise � jour avec succ�s';
$lang['Admin_arcade_cat'] = 'Administration des Cat�gories de jeux';
$lang['Admin_arcade_cat_explain'] = 'Depuis ce panneau vous pouvez g�rer les cat�gories de jeux';
$lang['use_category_mod'] = 'Utiliser la pr�sentation par cat�gorie';
$lang['use_category_mod_explain'] = 'Si vous n\'activer pas cette option, les jeux ne seront pas affich�s par cat�gorie sur votre forum.';
$lang['category_preview_games'] = 'Nombre de preview games par cat�gorie';
$lang['category_preview_games_explain'] = 'Pr�cisez ici le nombre de jeux � afficher directement au niveau des cat�gories.<br />Cette option n\'est utile que si vous utilisez la pr�sentation par cat�gorie.';
$lang['games_par_page'] = 'Nombre de jeux par page';
$lang['games_par_page_explain'] = 'Pr�cisez ici le nombre de jeux � afficher par page arcade.';
$lang['stat_par_page'] = 'Nombre de jeux par page de stats utilisateur';
$lang['stat_par_page_explain'] = 'Pr�cisez ici le nombre de jeux � afficher par page de stats arcade.';
$lang['game_order_alpha'] = 'Ordre alphab�tique';
$lang['game_order_popular'] = 'Ordre de popularit�';
$lang['game_order_fixed'] = 'Ordre fix� manuellement';
$lang['game_order_random'] = 'Ordre al�atoire';
$lang['game_order_news'] = 'Ordre des nouveaut�s';
$lang['games_order'] = 'Ordre d\'affichage des jeux';
$lang['games_order_explain'] = 'Pr�cisez ici l\'ordre dans lequel vous d�sirez voir appara�tre les jeux sur la page arcade.';
$lang['arcade_cat_titre'] = 'Titre de la cat�gorie';
$lang['Description'] = 'Description';
$lang['Deplace'] = 'D�placer';
$lang['Resynch'] = 'Resynchroniser';
$lang['Up_arcade_cat'] = 'Monter';
$lang['Down_arcade_cat'] = 'Descendre';
$lang['New_category'] = 'Cr�er une nouvelle cat�gorie';
$lang['arcade_cat_delete'] = 'Supprimer une cat�gorie';
$lang['arcade_cat_title'] = 'Titre de la cat�gorie';
$lang['arcade_cat_move_elmt'] = 'D�placer tout le contenu vers';
$lang['arcade_cat_move_and_del'] = 'D�placer et supprimer';
$lang['Admin_arcade_editcat_explain'] = 'Depuis ce panneau vous pouvez renseigner les diff�rentes infos de la cat�gorie.';
$lang['arcade_delete_cat_explain'] = 'Depuis ce panneau vous pouvez supprimer une categorie en d�pla�ant au pr�alable son contenu.';
$lang['arcade_categorie_settings'] = 'Options g�n�rales de la cat�gorie';
$lang['Game_width'] = 'Largeur du jeu';
$lang['Game_width_explain'] = 'ici vous pouvez pr�ciser la largeur, en pixels, du jeu en flash';
$lang['Game_height'] = 'Hauteur du jeu';
$lang['Game_height_explain'] = 'ici vous pouvez pr�ciser la hauteur, en pixels, du jeu en flash';
$lang['Game_category'] = 'Cat�gorie du jeu';
$lang['Game_category_explain'] = 'Pr�cisez ici la cat�gorie � laquelle le jeu est rattach�.';
$lang['Arcade_sets'] = 'Parties jou�es';
$lang['Synchro_game_set'] = 'Resynchroniser les parties jou�es';
$lang['display_winner_avatar'] = 'Afficher l\'avatar du champion';
$lang['display_winner_avatar_explain'] = 'Cette option permet d\'afficher l\'avatar du champion � c�t� du jeu pendant une partie.';
$lang['Manage_game'] = 'Gestion des jeux d\'arcades';
$lang['Manage_game_explain'] = 'Sur cette page vous pouvez g�rer les jeux du module Arcade.';
$lang['For_game_selection'] = 'Pour la s�lection';
$lang['Arcade_manage'] = 'Gestion des jeux';
$lang['Initialize_score'] = 'Mettre les scores � z�ro';
$lang['Delete_game'] = 'Supprimer le jeu';
$lang['Arcade_game'] = 'Jeux';
$lang['Arcade_highscore'] = 'Records';
$lang['Arcade_scores'] = 'Nombres de scores';
$lang['Edit_game'] = 'Editer un jeu';
$lang['Create_game'] = 'Ajouter un jeu';
$lang['Edit_game_explain'] = 'Ce formulaire vous permet de modifier les caract�ristiques des jeux d\'arcades. Attention tout de m�me � renseigner les bonnes informations (swf, variable score, type de score) si vous voulez que le jeu tourne comme il faut.';
$lang['Game_settings'] = 'Options g�n�rales du jeu';
$lang['Game_name'] = 'Nom du jeu';
$lang['Game_name_explain'] = 'C\'est ce nom qui appara�tra comme lien vers le jeu.';
$lang['Game_description'] = 'Description du jeu';
$lang['Game_description_explain'] = "Saisissez ici une petite description du jeu: th�me, touches de contr�les.<br/> Cette description appara�t dans la liste des jeux.";
$lang['Game_thumbail'] = 'Vignette du jeu';
$lang['Game_thumbail_explain'] = "Saisissez ici le nom de l'image qui appara�tra en regard de ce jeu dans la liste des jeux.<br/>Les vignettes doivent �tre plac�es dans le r�pertoire /games/pics/ .";
$lang['Game_swf'] = 'Nom du fichier swf';
$lang['Game_swf_explain'] = "Saisissez ici le nom exact du fichier swf correspondant au jeu (ex : monjeu.swf ).<br/>Tous les fichiers swf doivent �tre plac�s dans le r�pertoire /games/ .";
$lang['Score_settings'] = 'Gestion du score';
$lang['Score_settings_explain'] = "<b>Ces options sont sp�cifiques � chaque jeu et doivent �tre respect�es pour que la gestion du score puisse fonctionner.</b>";
$lang['Game_scorevariable'] = 'Nom de la variable score';
$lang['Game_scorevariable_explain'] = 'Pr�cisez ici le nom de la variable qui est retourn�e par le jeu en flash.';
$lang['Game_typescore'] = 'Type de gestion du score';
$lang['Game_typescore_explain'] = 'Pr�cisez ici le type de gestion de score.';
$lang['Games_updated'] = 'Informations du jeu mises � jour avec succ�s';
$lang['Click_return_gameadmin'] = "Cliquez %sici%s pour revenir � l'Administration des Jeux";
$lang['All_checked'] = 'Tout cocher';
$lang['Nothing_checked'] = 'Tout d�cocher';
$lang['Right_avatar'] = 'A droite du jeu';
$lang['Left_avatar'] = 'A gauche du jeu';
$lang['winner_avatar_position'] = 'Position de l\'avatar du champion';
$lang['winner_avatar_position_explain'] = 'Cette option vous permet de pr�ciser o� sera plac� l\'avatar du champion sur l\'aire de jeu.';
$lang['maxsize_avatar'] = 'Largeur maximum de l\'avatar';
$lang['maxsize_avatar_explain'] = "Pour ne pas d�former l'aire de jeu vous pouvez fixer une largeur maximum en pixels pour l'avatar du champion.<br />0 = illimit�.";
$lang['arcade_cat_auth'] = 'Permissions';
$lang['arcade_auth_0'] = 'Membres';
$lang['arcade_auth_1'] = 'Priv�';
$lang['arcade_auth_2'] = 'Priv� [Invisible]';
$lang['arcade_auth_3'] = 'Mod�rateurs';
$lang['arcade_auth_4'] = 'Mod�rateurs [Invisible]';
$lang['arcade_auth_5'] = 'Administrateurs';
$lang['arcade_auth_6'] = 'Administrateurs [Invisible]';
$lang['Permissions_arcade'] = 'Permissions arcades';
$lang['Arcade_categories'] = 'Cat�gories';
$lang['linkcat_align'] = 'Alignement du lien cat�gorie';
$lang['linkcat_align_explain'] = 'Pr�cisez ici la position du lien "Voir tous les jeux de la cat�gorie" affich� en bas de chaque cat�gorie.';
$lang['linkcat_left'] = 'Gauche';
$lang['linkcat_center'] = 'Centre';
$lang['linkcat_right'] = 'Droite';
$lang['Auth_Arcade_Control_User'] = 'Contr�le des Permissions Arcades des Utilisateurs';
$lang['Auth_Arcade_Control_Group'] = 'Contr�le des Permissions Arcades des Groupes';
$lang['Group_arcade_auth_explain'] = 'Ici, vous pouvez modifier les permissions d\'acc�s aux cat�gories arcades assign�es � chaque groupe. N\'oubliez pas qu\'en changeant les permissions arcades de groupe, les permissions individuelles d\'utilisateurs pourront toujours autoriser un utilisateur � acc�der � une cat�gorie arcade, etc. Vous serez pr�venu le cas �ch�ant.';
$lang['User_arcade_auth_explain'] = 'Ici, vous pouvez modifier les permissions d\'acc�s aux cat�gories arcades assign�es � chaque utilisateur. N\'oubliez pas qu\'en changeant les permissions arcades d\'un utilisateur, les permissions groupe pourront toujours autoriser un utilisateur � acc�der � une cat�gorie arcade, etc. Vous serez pr�venu le cas �ch�ant.';
$lang['Arcade_auth_updated'] = 'Les permissions arcade ont �t� mises � jour';
$lang['Click_return_arcadeauth'] = 'Cliquez %sici%s pour revenir aux Permissions arcades';
// Arcade
// Start addon arcade championnat
$lang['championnat_points_one'] = 'Nombre de points au premier';
$lang['championnat_points_one_explain'] = 'Entrez le nombre de points qu\'obtient le premier de chaque jeu.';
$lang['championnat_points_two'] = 'Nombre de points au second';
$lang['championnat_points_two_explain'] = 'Entrez le nombre de points qu\'obtient le second de chaque jeu.';
$lang['championnat_points_three'] = 'Nombre de points au troisi�me';
$lang['championnat_points_three_explain'] = 'Entrez le nombre de points qu\'obtient le troisi�me de chaque jeu.';
$lang['championnat_points_four'] = 'Nombre de points au quatri�me';
$lang['championnat_points_four_explain'] = 'Entrez le nombre de points qu\'obtient le quatri�me de chaque jeu.';
$lang['championnat_points_five'] = 'Nombre de points au cinqui�me';
$lang['championnat_points_five_explain'] = 'Entrez le nombre de points qu\'obtient le cinqui�me de chaque jeu.';
$lang['championnat_reset'] = 'Remettre � z�ro le championnat';
$lang['arcade_championnat_area_settings'] = 'Configuration de l\'addon Arcade Championnat';
$lang['use_cagnotte_mod'] = 'Utiliser le syst�me de cagnotte';
$lang['use_cagnotte_mod_explain'] = 'Cette option vous permet de d�finir une cagnotte qui sera donn�e au premier du championnat en cliquant sur le bouton ci-dessous (N�cessite le mod Point System ou le Cash Mod)';
$lang['use_points_cagnotte'] = 'Utiliser le mod points arcade';
$lang['use_points_cagnotte_explain'] = 'Si le mod points arcade est install�, la cagnotte est calcul�e toute seule en fonction des points pay�s par les joueurs. Dans ce cas, vous devez r�initialiser le montant de la cagnotte � z�ro � chaque d�but de championnat.';
$lang['cagnotte'] = 'Cagnotte';
$lang['cagnotte_explain'] = 'Nombre de points r�partis entre les dix premiers du championnat. La cagnotte peut �tre calcul�e gr�ce au mod points arcade si celui-ci est install� ou bien d�finie manuellement ici.';
$lang['cagnotte_distrib'] = 'Donner le montant de la cagnotte au vainqueur';
$lang['championnat_categorie'] = 'Cat�gorie du championnat';
$lang['championnat_categorie_explain'] = 'Choisissez ici la cat�gorie dans laquelle sont situ�s tous les jeux du championnat.';
$lang['championnat_taux'] = 'R�glages de la r�partition de la cagnotte';
$lang['championnat_taux_explain'] = 'Ici, vous d�finissez les pourcentages de redistribution de la cagnotte aux dix premiers du championnat. Chaque taux doit �tre inf�rieur � 100 et inf�rieur au taux le pr�c�dent (ex: taux au second < taux au premier). La somme de tous les taux doit �tre �gale � 100. Il est conseill� de laisser la configuration par d�faut.';
$lang['championnat_taux_un'] = 'Taux au premier :';
$lang['championnat_taux_deux'] = 'Taux au second :';
$lang['championnat_taux_trois'] = 'Taux au troisi�me :';
$lang['championnat_taux_quatre'] = 'Taux au quatri�me :';
$lang['championnat_taux_cinq'] = 'Taux au cinqui�me :';
$lang['championnat_taux_six'] = 'Taux au sixi�me :';
$lang['championnat_taux_sept'] = 'Taux au septi�me :';
$lang['championnat_taux_huit'] = 'Taux au huiti�me :';
$lang['championnat_taux_neuf'] = 'Taux au neuvi�me :';
$lang['championnat_taux_dix'] = 'Taux au dixi�me :';
$lang['use_auto_distrib'] = 'Utiliser le syst�me de distribution automatique de la cagnotte';
$lang['use_auto_distrib_explain'] = 'Si vous activez cette option, la cagnotte sera distribu�e automatiquement au bout du nombre de jours d�finis ci-dessous.';
$lang['day_distrib'] = 'Distribuer la cagnotte dans X jours';
$lang['day_distrib_explain'] = 'Nombre de jours restants avant la prochaine distribution automatique de la cagnotte.';
$lang['cat_use'] = 'Utiliser le syst�me de cat�gorie du championnat';
$lang['cat_use_explain'] = 'Si vous validez cette option, le championnat se fera sur une cat�gorie de jeux que vous pouvez d�finir. Si cette option est d�sactiv�e, le championnat s\'effectuera sur tous les jeux (par d�faut).';
$lang['championnat_use'] = 'Activer/D�sactiver le championnat';
$lang['championnat_use_explain'] = 'Si vous n\'activez pas cette option, le championnat sera d�sactiv� sur votre site.';
// End addon arcade championnat
$lang['Rabbitoshi_Pets_Management']='Gestion des animaux';
$lang['Rabbitoshi_Shop']='Magasin';
$lang['Rabbitoshi_settings']='Configuration g�n�rale';
$lang['Rabbitoshi_owners']='Propri�taires';
$lang['Chmod'] = 'V�rification des CHMODs';
$lang['Folder'] = 'Le dossier ';
$lang['Exist_and_writable'] = ' existe et est\'il inscriptible ?';
$lang['File'] = 'Le fichier ';
$lang['Folder_found'] = '<b style="color:green">Dossier trouv�</b>';
$lang['Folder_not_found'] = '<b style="color:red">Dossier non trouv� (Uploadez le dossier)</b>';
$lang['File_found'] = '<b style="color:green">Fichier trouv�</b>';
$lang['File_not_found'] = '<b style="color:red">Fichier non trouv� (Uploadez le fichier)</b>';
$lang['Folder_writable'] = ', <b style="color:green">Dossier inscriptible</b>';
$lang['File_writable'] = ', <b style="color:green">Fichier inscriptible</b>';
$lang['Folder_unwritable'] = ', <b style="color:red">Dossier non inscriptible (CHMOD 777)</b>';
$lang['File_unwritable'] = ', <b style="color:red">Fichier non inscriptible (CHMOD 666)</b>';
// Begin Account Self-Delete MOD
$lang['account_delete'] = 'Permettre aux membres de supprimer leurs propres comptes';
// End Account Self-Delete MOD
$lang['karma_settings'] = "Option du Karma";
$lang['karmap'] = "Activer l'affichage des images sur le viewprofile";
$lang['karmav'] = "Activer l'affichage des images sur le viewtopic";
$lang['karma'] = "Karma";
// Lottery Variables
$lang['lottery_second'] = 'Seconde';
$lang['lottery_seconds'] = 'Secondes';
$lang['lottery_minute'] = 'Minute';
$lang['lottery_minutes'] = 'Minutes';
$lang['lottery_hour'] = 'Heure';
$lang['lottery_hours'] = 'Heures';
$lang['lottery_day'] = 'Jour';
$lang['lottery_days'] = 'Jours';
$lang['lottery_no_items'] = 'Il n\'y a aucun objet dans la base de donn�es de la boutique !';
$lang['lottery_rand'] = 'Al�atoire';
$lang['lottery_statistics'] = 'Statistiques de la loterie';
$lang['lottery_edit_settings'] = 'Editer les options de la loterie';
$lang['lottery_no_one'] = 'Personne';
$lang['lottery_editor'] = 'Configuration de la loterie';
$lang['lottery_index_explain'] = 'De ce panneau, vous pouvez �diter les diff�rentes options de la loterie.';
$lang['lottery_no_item'] = 'Aucun objet de ce type n\'existe !';
$lang['lottery_invalid_action'] = 'Action invalide !';
$lang['lottery_click_to_return'] = 'Cliquez %sIci%s pour retourner aux options de la loterie.';
$lang['lottery_random_items_updated'] = 'Options de l\'objet al�atoire mises � jour !';
$lang['lottery_item_added'] = 'L\'objet a �t� ajout� � l\'inventaire !';
$lang['lottery_item_removed'] = 'L\'objet a �t� supprim� de l\'inventaire !';
$lang['lottery_updated'] = 'Loterie mise � jour !';
$lang['lottery_status'] = 'Statut de la loterie';
$lang['lottery_add_item'] = 'Ajouter un objet';
$lang['lottery_add_items'] = 'Ajouter un objet � l\'inventaire';
$lang['lottery_remove_item'] = 'Supprimer un objet';
$lang['lottery_current_items'] = 'Inventaire actuel des objets';
$lang['lottery_update_settings'] = 'Mettre � jour les options';
$lang['lottery_max_cost'] = 'Prix maximal';
$lang['lottery_min_cost'] = 'Prix minimal';
$lang['lottery_all_shops'] = 'Tout les boutiques';
$lang['lottery_from_shop'] = 'de la boutique';
$lang['lottery_update'] = 'Mettre � jour';
$lang['lottery_currency'] = 'Monnaie � utiliser';
$lang['lottery_history'] = 'Historique de la loterie';
$lang['lottery_item_pool'] = 'Inventaire d\'objets';
$lang['lottery_full_display'] = 'Affichage complet';
$lang['lottery_max'] = 'nombre maximum';
$lang['lottery_off'] = 'D�sactiv�';
$lang['lottery_on'] = 'Activ�';
$lang['lottery_mult_tickets'] = 'Billets multiples';
$lang['lottery_multiple'] = 'Multiples';
$lang['lottery_single'] = 'Uniques';
$lang['lottery_tickets_allowed'] = 'Billets autoris�s';
$lang['lottery_draw_periods'] = 'Tirage toutes les';//Dur�e entre deux tirages (1 jour = 86400 secondes)
$lang['lottery_entry_cost'] = 'Prix du billet';
$lang['lottery_base_amount'] = 'Montant de base de la loterie';
$lang['lottery_name'] = 'Nom de la loterie';
$lang['lottery_auto_restart'] = 'Red�marrage automatique';
$lang['lottery_last_won'] = 'Dernier gagnant';
$lang['lottery_pool'] = 'Gain de la loterie';
$lang['lottery_time_left'] = 'Temps restant';
$lang['lottery_duration_left'] = 'Dur�e restante';
$lang['lottery_total_entries'] = 'Total des entr�es';
$lang['lottery_items_table'] = 'Editer l\'inventaire d\'objets';
$lang['lottery_items_settings'] = 'Editer les options des objets';

// Lottery Error Variables
$lang['lottery_error_updating'] = 'Erreur lors de la mise � jour de la table %s !';
$lang['lottery_error_deleting'] = 'Erreur lors de la suppression de la table %s !';
$lang['lottery_error_selecting'] = 'Erreur lors de la r�cup�rations des informations de la table %s !';
$lang['lottery_error_inserting'] = 'Erreur d\'insertion dans la table %s !';
$lang['lottery_error_variable'] = 'La variable %s ne peut pas �tre lue !';

$lang['Rabbitoshi_settings']='Configuration g�n�rale du syst�me de cr�atures';
$lang['Rabbitoshi_Pets_Management']='Gestion des cr�atures';
$lang['Rabbitoshi_owners']='Propri�taires d\'animaux';
$lang['Rabbitoshi_Shop']='Animaleries';
?>
