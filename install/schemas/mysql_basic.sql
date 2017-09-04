#
# Basic DB data for phpBB2 devel
#
# $Id: mysql_basic.sql,v 1.29.2.20 2005/10/30 15:17:14 acydburn Exp $

# -- Config
INSERT INTO phpbb_config (config_name, config_value) VALUES ('config_id','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_disable','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sitename','ArkaMod');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('site_desc','De EZcom-fr.com');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_name','phpbb2mysql');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_path','/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_domain','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_secure','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('session_length','3600');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_html','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_html_tags','b,i,u,pre');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_bbcode','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_smilies','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_namechange','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_theme_create','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_local','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_remote','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_upload','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('enable_confirm', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_autologin','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_autologin_time','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('override_user_style','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('posts_per_page','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('topics_per_page','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('hot_threshold','25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_poll_options','10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_chars','255');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_inbox_privmsgs','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sentbox_privmsgs','25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_savebox_privmsgs','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_sig','Cordialement le Staff - Thanks, The Management');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email','votreadresse-youraddress@votredomaine-yourdomain.com');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_delivery','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_host','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_username','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_password','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sendmail_fix','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('require_activation','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('flood_interval','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_form','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_filesize','6144');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_width','80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_height','80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_path','images/avatars');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_gallery_path','images/avatars/gallery');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smilies_path','images/smiles');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_style','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_dateformat','l d F Y G:i');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_timezone','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('prune_enable','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('privmsg_disable','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('gzip_compress','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_fax', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_mail', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('record_online_users', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('record_online_date', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_name', 'www.myserver.tld');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_port', '80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('script_path', '/phpBB2/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('version', '.0.23');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('version1', 'ArkaMod V2.2.13');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_login_attempts', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('login_reset_time', '30');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_flood_interval','15');
ALTER TABLE phpbb_search_results ADD search_time int(11) DEFAULT '0' NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rand_seed','0');
INSERT INTO phpbb_config VALUES ('board_disable_msg', 'Message de désactivation du forum...');
UPDATE phpbb_config SET config_value = '1' WHERE config_name = 'enable_confirm';
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_min_chars', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('prune_shouts', '0');
UPDATE phpbb_forums SET auth_edit = '1';
UPDATE phpbb_forums SET auth_delete = '1';

INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_bbcode','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_guest','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_guest_view','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_delete','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_delete_all','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_edit','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_edit_all','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_smilies','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_banned_user_id','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_banned_user_id_view','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_date_format','|d M Y| H:i');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_date_on','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_delete_days','30');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_height','170');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_links_names','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_make_links','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_messages_number_on_index', '20');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_on','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_refresh_time', '120');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_text_lenght','500');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_width','100%');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_word_lenght','90');


# -- Categories
INSERT INTO phpbb_categories (cat_id, cat_title, cat_order) VALUES (1, 'Description de l ‘ArkaMod de EzCom-fr.com', 10);
INSERT INTO phpbb_categories (cat_id, cat_title, cat_order) VALUES (2, 'Jeux Arcade', 30);
INSERT INTO `phpbb_categories` (`cat_id`, `cat_title`, `cat_order`) VALUES (3, 'Liens', 20);


# -- Forums

ALTER TABLE `phpbb_forums` ADD `forum_link` VARCHAR(255) NULL;
ALTER TABLE `phpbb_forums` ADD `forum_link_count` INT(11) NOT NULL DEFAULT '1';
ALTER TABLE `phpbb_forums` ADD `forum_link_date` INT(11) NOT NULL DEFAULT '0';

INSERT INTO phpbb_forums (forum_id, forum_name, forum_desc, cat_id, forum_order, forum_posts, forum_topics, forum_last_post_id, auth_view, auth_read, auth_post, auth_reply, auth_edit, auth_delete, auth_announce, auth_sticky, auth_pollcreate, auth_vote, auth_attachments) VALUES (1, 'Description de l ‘ArkaMod', 'Description de l ‘ArkaMod de EzCom-fr.com', 1, 10, 1, 1, 1, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 3);
INSERT INTO phpbb_forums (forum_id, cat_id, forum_name, forum_desc, forum_status, forum_order, forum_posts, forum_topics, forum_last_post_id, auth_view, auth_read, auth_post, auth_reply, auth_edit, auth_delete, auth_sticky, auth_announce, auth_vote, auth_pollcreate, auth_attachments) VALUES (2, 2, 'Arcade', '', 0, 40, 0, 0, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 3);
INSERT INTO `phpbb_forums` (`forum_id`, `cat_id`, `forum_name`, `forum_desc`, `forum_status`, `forum_order`, `forum_posts`, `forum_topics`, `forum_last_post_id`, `prune_next`, `prune_enable`, `auth_view`, `auth_read`, `auth_post`, `auth_reply`, `auth_edit`, `auth_delete`, `auth_sticky`, `auth_announce`, `auth_vote`, `auth_pollcreate`, `auth_attachments`, `attached_forum_id`, `forum_icon`, `forum_qpes`, `auth_download`, `forum_link`, `forum_link_count`, `forum_link_date`) VALUES (3, 3, 'EzCom', '\r\nRessources et support de versions pré-modifiées.', 0, 20, 0, 0, 0, NULL, 0, 0, 0, 1, 1, 1, 1, 3, 3, 1, 1, 1, -1, 'images/mini1.gif', 1, 1, 'http://www.ezcom-fr.com', 0, 1187554598);

# -- Users
INSERT INTO phpbb_users (user_id, username, user_level, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_viewemail, user_style, user_aim, user_yim, user_msnm, user_posts, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_pm, user_notify_pm, user_allow_viewonline, user_rank, user_avatar, user_lang, user_timezone, user_dateformat, user_actkey, user_newpasswd, user_notify, user_active) VALUES ( -1, 'Anonymous', 0, 0, '', '', '', '', '', '', '', '', 0, NULL, '', '', '', 0, 0, 1, 1, 1, 0, 1, 1, NULL, '', '', 0, '', '', '', 0, 0);

# -- username: admin    password: admin (change this or remove it once everything is working!)
INSERT INTO phpbb_users (user_id, username, user_level, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_viewemail, user_style, user_aim, user_yim, user_msnm, user_posts, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_pm, user_notify_pm, user_popup_pm, user_allow_viewonline, user_rank, user_avatar, user_lang, user_timezone, user_dateformat, user_actkey, user_newpasswd, user_notify, user_active) VALUES ( 2, 'Admin', 1, 0, '21232f297a57a5a743894a0e4a801fc3', 'admin@yourdomain.com', '', '', '', '', '', '', 1, 1, '', '', '', 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, '', 'french', 0, 'l d F Y G:i', '', '', 0, 1);


# -- Ranks
INSERT INTO phpbb_ranks (rank_id, rank_title, rank_min, rank_special, rank_image) VALUES ( 1, 'Administrateur - Site Admin', -1, 1, NULL);


# -- Groups
INSERT INTO phpbb_groups (group_id, group_name, group_description, group_single_user) VALUES (1, 'Anonymous', 'Personal User', 1);
INSERT INTO phpbb_groups (group_id, group_name, group_description, group_single_user) VALUES (2, 'Admin', 'Personal User', 1);


# -- portal -> portal
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('welcome_text', 'Bienvenue sur la version de portail : <b>Gf-Portail</b>.<br/>Vous pouvez changer ce message dans la configuration générale du portail.<br/>Ce portail est entièrement <b>paramétrable</b> depuis l\'ACP.<br/>J\'espère qu\'il vous plaîra.<br/><i>Giefca</i>');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('number_of_news', '4');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('news_length', '200');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('news_forum', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('poll_id', '');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('forum_header', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('space_row', '3');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('space_col', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col1_size', '20');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col1_unit', 'percent');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col2_size', '60');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col2_unit', 'percent');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col3_size', '20');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col3_unit', 'percent');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('bodyline', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('head_out_bodyline', '0');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('foot_out_bodyline', '0');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('guest_avatar', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('simple_welcome', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('number_recent_topics', '10');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scrolling_topics', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_height', '200');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_up', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_delay', '100');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_step', '2');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('default_struct', '1') ;

INSERT INTO phpbb_portal_links ( link_url, link_text, link_img, link_active ) VALUES ('http://www.phpbb.com', 'phpBB community', 'images/banner_phpbbcom.gif', 1);
INSERT INTO `phpbb_portal_links` VALUES (2, 'http://ezcom-fr.com/index.php', 'Le support et tout ce qu''il faut pour utiliser les forums phpBB preMODifies.', 'images/mini1.gif', '', '', 1);
INSERT INTO `phpbb_portal_links` VALUES (3, 'http://www.ezcom-fr.org', 'Association de EZcom.', 'images/mini2.jpg', '', '', 1);

INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'bienvenue');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'liens');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'login');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'menu');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'news');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'sondage');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'statistiques');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'welcome');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'whoisonline');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'entete');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'change_style');
INSERT INTO phpbb_portal_mod ( mod_name ) VALUES ( 'recent_topics');

INSERT INTO phpbb_portal_page (page_id, page_desc) VALUES(1, 'page principale');

INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 1, 2, 1);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 2, 1, 2);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 3, 3, 2);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 4, 1, 1);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 5, 2, 2);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 6, 1, 4);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 7, 1, 3);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 8, 3, 1);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 9, 3, 9);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 10, 0, 1);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 11, 1, 5);
INSERT INTO phpbb_portal_struct ( page_id, mod_id, struct_col, struct_order) VALUES ( 1, 12, 3, 8);

INSERT INTO phpbb_portal ( portal_name , portal_value ) VALUES ('default_mennav', '1');
INSERT INTO phpbb_portal_navmen ( menu_id , menu_desc ) VALUES (1, 'Menu principal');
INSERT INTO `phpbb_portal_navig` VALUES (1, 4, 'Home', '', 'portal.php', '', 1, 'icon_mini_house', '', 0, 1, 0, 0, 0, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (2, 4, 'FAQ', '', 'faq.php', '', 1, 'icon_mini_faq', '', 0, 4, 0, 0, 0, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (3, 4, 'Forum', '', 'index.php', '', 1, 'icon_mini_house', '', 0, 2, 0, 0, 0, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (4, 4, 'Search', '', 'search.php', '', 1, 'icon_mini_search', '', 0, 3, 0, 0, 0, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (5, 4, 'Memberlist', '', 'memberlist.php', '', 1, 'icon_mini_members', '', 0, 5, 0, 0, 0, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (6, 4, 'Usergroups', '', 'groupcp.php', '', 1, 'icon_mini_groups', '', 0, 6, 0, 0, 0, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (7, 4, 'Private_Messaging', '', 'privmsg.php', '', 1, 'icon_mini_message', '', 0, 8, 0, 0, 1, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (8, 4, 'Profile', '', 'profile.php?mode=editprofile', '', 1, 'icon_mini_profile', '', 0, 7, 0, 0, 1, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (9, 4, 'Login', '', 'login.php', '', 1, 'icon_mini_login', '', 0, 9, 0, 0, -1, 1, '');
INSERT INTO `phpbb_portal_navig` VALUES (10, 4, 'Logout', '', 'login.php?logout=true', '', 1, 'icon_mini_login', '', 0, 10, 0, 0, 1, 1, '');

# -- User -> Group
INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES (1, -1, 0);
INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES (2, 2, 0);


# -- Demo Topic
INSERT INTO phpbb_topics (topic_id, topic_title, topic_poster, topic_time, topic_views, topic_replies, forum_id, topic_status, topic_type, topic_vote, topic_first_post_id, topic_last_post_id) VALUES (1, 'Bienvenue Dans le forum ArkaMod', 2, '972086460', 0, 0, 1, 0, 0, 0, 1, 1);


# -- Demo Post
INSERT INTO phpbb_posts (post_id, topic_id, forum_id, poster_id, post_time, post_username, poster_ip) VALUES (1, 1, 1, 2, 972086460, NULL, '7F000001');

INSERT INTO `phpbb_posts_text` VALUES (1, 'a76b46264f', 'Bienvenue Dans le forum ArkaMod', '[align=center:a76b46264f][img:a76b46264f]http://www.clanmystik.com/jeux/sonic1.png[/img:a76b46264f][img:a76b46264f]http://www.clanmystik.com/jeux/sonic2.png[/img:a76b46264f]\r\n[color=#FF0000:a76b46264f][size=18:a76b46264f]voici la préMODée ArkaMod V2.2.13 a Base de :\r\n\r\nphpBB 2.0.23 (français)[/color:a76b46264f][/size:a76b46264f]\r\n\r\n\r\n[list:a76b46264f][*:a76b46264f] Merci à toute l''equipe de [url=http://www.ezcom-fr.com]EzCom[/url] ainsi qu''aux createurs des MODs qui ont fait que cette preMOD existe.\r\nVersion ayant pour but de rendre conviviale votre forum, c''est la préMOD qui remplace la lignée Akamod 1.4.2.\r\n [*:a76b46264f]7 templates (thèmes) sont disponibles.\r\n\r\n[size=18:a76b46264f][color=#FF0000:a76b46264f]Listing des  Mods installés[/color:a76b46264f][/size:a76b46264f][/align:a76b46264f]\r\n[/list:u:a76b46264f]\r\n[list:a76b46264f]\r\n[list:a76b46264f]\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Arcade v2.1.2 - Giefca -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Permet d''ajouter des jeux en flash sur votre forum en\r\ngérant les différents scores des membres. \r\nLes jeux doivent avoir été spécifiquement adaptés à ce MOD pour que\r\nles scores puissent s''enregistrer.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Add-on Points Arcade  1.1.3 -NiCo[L-aS]-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce mod vous permet d''utiliser le points system avec le mod arcade [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Add-on Heading Arcade 1.1 -CanoScan-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Il rajoute un entete dans la page arcade.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Add-on Arcade Comments System v3.4.0 -JRSweets-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Le champion d''un jeu peut saisir un commentaire qui sera visible par chaque personne jouant au jeu.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Add-on Arcade Championnat 1.0.5 -NiCo[L-aS]-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce mod vous permet de proposer un championnat sur tous les jeux du mod arcade[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Add-on Arcade Game Restriction 1.0.0 -JRSweets-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]obligation de poster pour jouer[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD ADR 0.4.5 (Advanced Dungeons &amp; Rabbits) -Seteo-Bloke-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.adr-support.com/adr_support/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce mod permet d''avoir un systeme de jeux de role sur votre forum[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Cash Mod 2.2.3 -Robert Hetzler-[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.xore.ca/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Mod Argent permettant aux utilisateurs de gagner de l''argent/des points en postant[/b:a76b46264f] \r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD hangman_156 -unTouched/b][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b][url=http://pete.dsl-inet.com/]Site du mod[/url][/b:a76b46264f]\r\n[b:a76b46264f]Jeux du pendu.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD BBcode Box Reloaded (BBcBxR) 1.2.2 =&gt; reddog -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] \r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Mod remplaçant les BBCode classic avec beaucoup d''option et réglable dans l''ACP.[/b:a76b46264f]\r\n    [color=#0040FF:a76b46264f]* ADDON 1.1.0a  hide  -[/color:a76b46264f] \r\n[color=#0040FF:a76b46264f]* ADDON 1.1.2  thumbnails  -[/color:a76b46264f] \r\n[color=#0040FF:a76b46264f]* ADDON 1.0.0 youtube  -[/color:a76b46264f] \r\n[color=#0040FF:a76b46264f]* ADDON 1.0.0 Dailymotion  -[/color:a76b46264f] \r\n\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f] [size=14:a76b46264f][b:a76b46264f]MOD Birthday Event 1.1.0c =&gt; reddog -[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ajoute l''événement Anniversaire sur votre forum.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD dHTML Slide Menu for ACP 1.0.0 =&gt; markus_petrux [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.phpmix.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce mod réduit l''affichage de la colonne de gauche dans l''ACP.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]eXtreme Styles v2.3.1 =&gt; CyberAlien[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.phpbbstyles.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Système de cache + beaucoup de fonctions ajoutées pour les templates[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD File Attachment v2.4.5 =&gt; Acyd Burn -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] \r\n[*:a76b46264f][b:a76b46264f][url=http://www.opentools.de/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce Mod permet de joindre des fichiers dans vos posts.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Forum Icon with ACP Control 1.0.9 =&gt; ycl6 -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] \r\n[*:a76b46264f][b:a76b46264f][url=http://macphpbbmod.sourceforge.net]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD permet d''allouer une icone à un forum via le panneau d''administration.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD GfPortal v1.2.0b =&gt; Giefca[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Portail entièrement paramètrable et personnalisable depuis le panneau d''administration.[/b:a76b46264f]\r\n\r\n    *[color=#0040FF:a76b46264f]ADDON 1.0.0 au MOD GfPortal =&gt; Vgamerz :[/color:a76b46264f]\r\n     [b:a76b46264f] Permet de désactiver le portail avec une option dans l''administration[/b:a76b46264f]\r\n\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Overall Forums Permission 1.0.2 =&gt; Smartor -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] \r\n[*:a76b46264f][b:a76b46264f][url=http://smartor.is-root.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD permet de gérer les permissions de tous les forums en même temps sur un seul panneau.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Pseudo sub-forums 1.0.6 =&gt; niekas[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.freedomlist.com] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Permet de créer des sous-forums.[/b:a76b46264f]\r\n\r\n    [color=#0040FF:a76b46264f]* ADDON 1.0.0 au MOD Pseudo sub-forums =&gt; crewstyle -[/color:a76b46264f] \r\n      [b:a76b46264f] Permet de garder l''état de l''image du Forum Principal en &quot;Non Lu&quot; lorsqu''un au moins, de ses Sous-Forums, l''est aussi.[/b:a76b46264f]\r\n\r\n    * ADDON [color=#0040FF:a76b46264f]jumpbox 1.0.0 au MOD Pseudo sub-forums =&gt; reddog -[/color:a76b46264f] \r\n [b:a76b46264f]     Adapte la jumpbox au pseudo forum[/b:a76b46264f]\r\n\r\n   [color=#0040FF:a76b46264f] * ADDON Mark sub-forums 1.1.0 au MOD Pseudo sub-forums =&gt; Darathor [/color:a76b46264f]\r\n[b:a76b46264f]      Ajoute dans les forums contenant des sous-forums un lien permettant de marquer comme lus les topics des sous-forums.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Post Icons 1.0.1 =&gt; Ptirhiik[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]-\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[*:a76b46264f][b:a76b46264f][url=http://rpgnet.clanmckeen.com/portail/] Site du mod[/url][/b:a76b46264f]\r\n[b:a76b46264f]Ce Mod permet d''ajouter une icône à un topic/post lors de sa création ou de sa modification.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Quick Post ES (Expansion Set) 1.1.3 =&gt; reddog - [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com/] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Une réponse rapide doté de beaucoup d''option et réglable via l''ACP[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Rank Color System 0.1.5 =&gt; reddog -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] \r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com/] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce Mod ajoute des rangs de couleur et donne la couleur au membre suivant son groupe partout sur le forum.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Separate stickies/announcements from other posts =&gt; CyberAlien -[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.phpbbstyles.com] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce mod sépare les annonces et les post it des autres posts.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Similar Topics 1.0.1 =&gt; Leuchte - [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.leuchte.net] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ajoute les sujet similaire dans le viewtopic.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Sort memberlist per letter 1.0.1 =&gt; Freakin'' Booty -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] \r\n[*:a76b46264f][b:a76b46264f][url=http://www.freakingbooty.tk] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Classement des membres par lettre dans le memberlist.[/b:a76b46264f]\r\n\r\n\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Today Userlist 1.2.2 =&gt; reddog -[/b:a76b46264f][/size:a76b46264f] [/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com/] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce Mod ajoute la liste des membres ayant visités le forum, possibilité de régler dans l''ACP entre 24 heures ou durant la journée.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MOD Quick Administrator User Options and Information 1.0.0 =&gt; pentapenguin -[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.pentapenguin.com] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD permet d''ajouter deux liens sur la vue du profil de l''utilisateur :\r\n&quot;Editer le profil de l''utilisateur&quot; &amp; &quot;Editer les permissions de l''utilisateur&quot; avec si l''utilisateur est en activité (activé), si l''utilisateur a été banni, ou si l''e-mail de l''utilisateur a été bannie. [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Message privé d''accueil pour les nouveaux membres 1.0.2[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] : \r\n[*:a76b46264f][b:a76b46264f][url=http://www.johnabela.com/] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD enverra un PM aux nouveaux utilisateurs de bienvenue.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Nom du posteur dans l''email de notification 1.0.0[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] : \r\n[*:a76b46264f][b:a76b46264f][url=http://www.phpcodeur.net/] Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD permet, que lorsqu''un mp vous est envoyé, dans le notification par mail soit inclus le nom du posteur.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Notify Email For Private Message Shows Poster Name 1.0.0[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f] : \r\n[*:a76b46264f][b:a76b46264f][url=http://forum.phpbb.biz/viewtopic_94496.html]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Permet de connaitre le nom du posteur dans l''email de notification[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Today At/Yesterday At 1.3.1[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.netclectic.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] : \r\n[b:a76b46264f]Remplace la date d''un sujet en mettant soit &quot;hier&quot;, si le message a été posté la veille, soit &quot;aujourd''hui&quot; si le message a été posté dans la journée [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Add-on TopStat Arcade[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gf-phpbb.info]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Il rajoute un entete dans la page arcade contenant des statistiques concernant le mod arcade. Il y 3 catégories affichés dans un tableau[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Advanced Visual Confirmation V1.2.0, AmigaLink [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.essenmitfreude.info/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce mod remplace la confirmation visuel de phpBB par un system de confirmation visuel Captcha qui accroit la difficulté pour les robots de s''inscrire. [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Olympus-Style Login Screen V3.2.0 , afterlife_69 [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.gamerzvault.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD modifie l''affichage de la page login pour la rendre comme celle de phpBB 3.0 [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Favoris Arcade 1.3, KaZ[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.ttmt-spirit.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Cet addon permet d''ajouter ses jeux préférés dans la catégorie des Favoris (activable dans le PC).[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Signature Editor Preview Deluxe with BBcBxR 1.1.1a, ABDev [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.oxygen-powered.net]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Ce MOD permet de disposer sur votre forum d''un éditeur de signature. \r\n[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]MiniChat 1.0.5c (version modifiée), Auteurs : Przemo, Malach, PastisD, ABDev [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]intégre un chat au forum, avec de multiples possibilités\r\n[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]vAgreement Terms 1.0.0 , Auteurs : Phantomk [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.phpbb.com/phpBB/viewtopic.php?t=392263]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Description : remplace l''écran d''acception des conditions d''utilisation du forum par un autre proche de celui de vBulletin\r\n[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Flag 0.0.5 , Auteurs : reddog  [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] :\r\n[b:a76b46264f]Description :ce MODule ajoute un menu déroulant dans le profil où l''utilisateur peut sélectionner le drapeau de son pays. L''icône du drapeau est affichée dans la liste des membres (possibilité de trier celle-ci selon ce critère), dans le profil de l''utilisateur, et dans les messages. \r\n[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Browsers List  0.06 , Auteurs : reddog  [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Description :ce MODule ajoute un menu déroulant dans le profil où l''utilisateur peut sélectionner son navigateur utilisé sur internet. L''icône du navigateur est affichée dans la liste des membres (possibilité de trier celle-ci selon ce critère), dans le profil de l''utilisateur, et dans les messages. \r\n[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Forum Link 2.0.7, Auteurs : crewstyle [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://crewstyle2.free.fr/crewdev]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Ce MOD offre la possibilité de transformer un forum en lien externe vers un nouveau site.[/b:a76b46264f]\r\n\r\n[color=#0040FF:a76b46264f]*ADD-ON Forum Link &amp; Pseudo SubForum 2.0.0 [/color:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Email Confirmation, Auteurs : kooky 1.0.1[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.myphpbb.zaup.org]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Ce mod ajoutera un champ de confirmation d''email quand un utilisateur essayera de s''enregistrer.[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Split Categories, Auteurs : Reddog 1.0.1[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.reddevboard.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]sépare les catégories sur l''index. [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Advance Admin Index Stats, Auteurs : Civphp 1.0.0[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.civphpbb.net]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Ce mod permet d''ajouter des statistiques supplémentaire dans le panneau d''administration . [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Disable Board Message, Auteurs : Sko22 1.0.0[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.quellicheilpc.com/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Permet de configurer le message de désactivation du forum  [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Auto-suppression du compte1.0.0, Auteurs : Poupoune[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://crewstyle2.free.fr/crewdev/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Ce MOD permet à vos membres de supprimer leurs propres comptes sur votre forum.\r\n Cette fonctionnalité peut être désactivé dans le panneau d''administratio[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Karma 2.0.0, Auteurs : achaab[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.phpbb.biz/]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Ce mod attribue un karma a vos membres, qui sera la somme des votes effectués par les autres membres, qui pouront voter une fois par jour. Le résultat apparait dans le viewprofile et le viewtopic[/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Level Mod 2.0.0, Auteurs : William[/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f]Site du mod[/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Ce mod ajoute des stats visiblent dans le profil et dans les messages: \r\n - Niveau : le niveau est basé sur l''activité du membre! \r\n - HP: represente l''activité du membre. \r\n - MP: represente comment le membre a repondu aux messages. \r\n - Exp: represente le pourcentage de messages posté par un membre. [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Lottery Modification 2.3.0, Auteurs : Zarath [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://www.zarath.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]vous autorise à organiser une loterie sur votre forum [/b:a76b46264f]\r\n\r\n[*:a76b46264f][color=#0040FF:a76b46264f][size=14:a76b46264f][b:a76b46264f]Rabbitoshi Lite 3.1.3, Auteurs : Insydius [/b:a76b46264f][/size:a76b46264f][/color:a76b46264f]\r\n[*:a76b46264f][b:a76b46264f][url=http://phpbb.insyderonline.com]Site du mod[/url][/b:a76b46264f]\r\n[color=#FF0000:a76b46264f]Description du MOD:[/color:a76b46264f] \r\n[b:a76b46264f]Un système d''animal de compagnie pour son forum [/b:a76b46264f]\r\n[/list:u:a76b46264f]\r\n[/list:u:a76b46264f]\r\n\r\n[b:a76b46264f][size=18:a76b46264f]Téléchargement et Support officiel [color=#FF0000:a76b46264f]UNIQUEMENT[/color:a76b46264f] sur [url=http://www.ezcom-fr.com]EZcom-fr.com[/size:a76b46264f][/b:a76b46264f]\r\n[/url]\r\n\r\n[b:a76b46264f][color=#FF0000:a76b46264f][size=14:a76b46264f]L''ArkaMod doit garder son nom, meme si par la suite des mod''s y sont  ajoutés.\r\nElle ne peut servir de base en aucun cas pour la création d''une autre premod sous quel nom que  ce soit.[/size:a76b46264f][/color:a76b46264f][/b:a76b46264f]\r\n\r\n\r\n\r\nLéo');
        

                 
# -- Themes
INSERT INTO phpbb_themes (themes_id, template_name, style_name, head_stylesheet, body_background, body_bgcolor, body_text, body_link, body_vlink, body_alink, body_hlink, tr_color1, tr_color2, tr_color3, tr_class1, tr_class2, tr_class3, th_color1, th_color2, th_color3, th_class1, th_class2, th_class3, td_color1, td_color2, td_color3, td_class1, td_class2, td_class3, fontface1, fontface2, fontface3, fontsize1, fontsize2, fontsize3, fontcolor1, fontcolor2, fontcolor3, span_class1, span_class2, span_class3) VALUES (1, 'subSilver', 'subSilver', 'subSilver.css', '', 'E5E5E5', '000000', '006699', '5493B4', '', 'DD6900', 'EFEFEF', 'DEE3E7', 'D1D7DC', '', '', '', '98AAB1', '006699', 'FFFFFF', 'cellpic1.gif', 'cellpic3.gif', 'cellpic2.jpg', 'FAFAFA', 'FFFFFF', '', 'row1', 'row2', '', 'Verdana, Arial, Helvetica, sans-serif', 'Trebuchet MS', 'Courier, \'Courier New\', sans-serif', 10, 11, 12, '444444', '006600', 'FFA34F', '', '', '');

INSERT INTO phpbb_themes_name (themes_id, tr_color1_name, tr_color2_name, tr_color3_name, tr_class1_name, tr_class2_name, tr_class3_name, th_color1_name, th_color2_name, th_color3_name, th_class1_name, th_class2_name, th_class3_name, td_color1_name, td_color2_name, td_color3_name, td_class1_name, td_class2_name, td_class3_name, fontface1_name, fontface2_name, fontface3_name, fontsize1_name, fontsize2_name, fontsize3_name, fontcolor1_name, fontcolor2_name, fontcolor3_name, span_class1_name, span_class2_name, span_class3_name) VALUES (1, 'Couleur de la rangée la plus claire - The lightest row colour', 'Couleur de la rangée moyenne - The medium row color', 'Couleur de la rangée la plus foncée - The darkest row colour', '', '', '', 'Bordure entourant la page toute entière - Border round the whole page', 'Bordure externe à la table - Outer table border', 'Bordure interne à la table - Inner table border', 'Image argentée dégradée - Silver gradient picture', 'Image bleutée dégradée - Blue gradient picture', 'Image fondue dégradée - Fade-out gradient on index', 'Arrière plan du cadre de citation - Background for quote boxes', 'Toutes les zones blanches - All white areas', '', 'Arrière plan des messages des sujets - Background for topic posts', '2nd arrière plan des messages des sujets - 2nd background for topic posts', '', 'Police principale - Main fonts', 'Police additionnelle des titres des sujets - Additional topic title font', 'Polices de forme - Form fonts', 'Plus petite taille de police - Smallest font size', 'Taille de police moyenne - Medium font size', 'Taille de police normale (corps du messages etc...) - Normal font size (post body etc)', 'Texte de citation et du copyright - Quote & copyright text', 'Couleur du texte de code - Code text colour', 'Couleur principale des textes des en-têtes de table - Main table header text colour', '', '', '');


# -- Smilies
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 1, ':D', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 2, ':-D', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 3, ':grin:', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 4, ':)', 'icon_smile.gif', 'Smile');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 5, ':-)', 'icon_smile.gif', 'Smile');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 6, ':smile:', 'icon_smile.gif', 'Smile');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 7, ':(', 'icon_sad.gif', 'Sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 8, ':-(', 'icon_sad.gif', 'Sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 9, ':sad:', 'icon_sad.gif', 'Sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 10, ':o', 'icon_surprised.gif', 'Surprised');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 11, ':-o', 'icon_surprised.gif', 'Surprised');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 12, ':eek:', 'icon_surprised.gif', 'Surprised');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 13, ':shock:', 'icon_eek.gif', 'Shocked');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 14, ':?', 'icon_confused.gif', 'Confused');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 15, ':-?', 'icon_confused.gif', 'Confused');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 16, ':???:', 'icon_confused.gif', 'Confused');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 17, '8)', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 18, '8-)', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 19, ':cool:', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 20, ':lol:', 'icon_lol.gif', 'Laughing');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 21, ':x', 'icon_mad.gif', 'Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 22, ':-x', 'icon_mad.gif', 'Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 23, ':mad:', 'icon_mad.gif', 'Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 24, ':P', 'icon_razz.gif', 'Razz');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 25, ':-P', 'icon_razz.gif', 'Razz');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 26, ':razz:', 'icon_razz.gif', 'Razz');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 27, ':oops:', 'icon_redface.gif', 'Embarassed');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 28, ':cry:', 'icon_cry.gif', 'Crying or Very sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 29, ':evil:', 'icon_evil.gif', 'Evil or Very Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 30, ':twisted:', 'icon_twisted.gif', 'Twisted Evil');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 31, ':roll:', 'icon_rolleyes.gif', 'Rolling Eyes');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 32, ':wink:', 'icon_wink.gif', 'Wink');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 33, ';)', 'icon_wink.gif', 'Wink');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 34, ';-)', 'icon_wink.gif', 'Wink');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 35, ':!:', 'icon_exclaim.gif', 'Exclamation');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 36, ':?:', 'icon_question.gif', 'Question');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 37, ':idea:', 'icon_idea.gif', 'Idea');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 38, ':arrow:', 'icon_arrow.gif', 'Arrow');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 39, ':|', 'icon_neutral.gif', 'Neutral');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 40, ':-|', 'icon_neutral.gif', 'Neutral');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 41, ':neutral:', 'icon_neutral.gif', 'Neutral');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 42, ':mrgreen:', 'icon_mrgreen.gif', 'Mr. Green');


# -- wordlist
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 1, 'example', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 2, 'post', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 3, 'phpbb', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 4, 'installation', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 5, 'delete', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 6, 'topic', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 7, 'forum', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 8, 'since', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 9, 'everything', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 10, 'seems', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 11, 'working', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 12, 'welcome', 0 );


# -- wordmatch
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 1, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 2, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 3, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 4, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 5, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 6, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 7, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 8, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 9, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 10, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 11, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 12, 1, 1 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 3, 1, 1 );


# -- QPES
INSERT INTO phpbb_config (config_name, config_value) VALUES ('users_qp_settings', '1-0-1-1-1-1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('anons_qp_settings', '1-0-1-1-1-1');
UPDATE phpbb_users SET user_qp_settings = '1-0-1-1-1-1' WHERE user_qp_settings = '0';

# -- bbc box config
INSERT INTO phpbb_bbc_box VALUES (1, 'strike', '1', '0', 's', 's', 'strike', 'strike', '0', '10');
INSERT INTO phpbb_bbc_box VALUES (2, 'spoiler', '1', '0', 'spoil', 'spoil', 'spoiler', 'spoiler', '0', '20');
INSERT INTO phpbb_bbc_box VALUES (3, 'fade', '1', '0', 'fade', 'fade', 'fade', 'fade', '0', '30');
INSERT INTO phpbb_bbc_box VALUES (4, 'rainbow', '1', '0', 'rainbow', 'rainbow', 'rainbow', 'rainbow', '1', '40');
INSERT INTO phpbb_bbc_box VALUES (5, 'justify', '1', '0', 'align=justify', 'align', 'justify', 'justify', '0', '50');
INSERT INTO phpbb_bbc_box VALUES (6, 'right', '1', '0', 'align=right', 'align', 'right', 'right', '0', '60');
INSERT INTO phpbb_bbc_box VALUES (7, 'center', '1', '0', 'align=center', 'align', 'center', 'center', '0', '70');
INSERT INTO phpbb_bbc_box VALUES (8, 'left', '1', '0', 'align=left', 'align', 'left', 'left', '1', '80');
INSERT INTO phpbb_bbc_box VALUES (9, 'link', '1', '0', 'link=', 'link', 'link', 'alink', '0', '90');
INSERT INTO phpbb_bbc_box VALUES (10, 'target', '1', '0', 'target=', 'target', 'target', 'atarget', '1', '100');
INSERT INTO phpbb_bbc_box VALUES (11, 'marqd', '1', '0', 'marq=down', 'marq', 'marqd', 'marqd', '0', '110');
INSERT INTO phpbb_bbc_box VALUES (12, 'marqu', '1', '0', 'marq=up', 'marq', 'marqu', 'marqu', '0', '120');
INSERT INTO phpbb_bbc_box VALUES (13, 'marql', '1', '0', 'marq=left', 'marq', 'marql', 'marql', '0', '130');
INSERT INTO phpbb_bbc_box VALUES (14, 'marqr', '1', '0', 'marq=right', 'marq', 'marqr', 'marqr', '1', '140');
INSERT INTO phpbb_bbc_box VALUES (15, 'email', '1', '0', 'email', 'email', 'email', 'email', '0', '150');
INSERT INTO phpbb_bbc_box VALUES (16, 'flash', '1', '0', 'flash width=250 height=250', 'flash', 'flash', 'flash', '0', '160');
INSERT INTO phpbb_bbc_box VALUES (17, 'video', '1', '0', 'video width=400 height=350', 'video', 'video', 'video', '0', '170');
INSERT INTO phpbb_bbc_box VALUES (18, 'stream', '1', '0', 'stream', 'stream', 'stream', 'stream', '0', '180');
INSERT INTO phpbb_bbc_box VALUES (19, 'real', '1', '0', 'ram width=220 height=140', 'ram', 'real', 'real', '0', '190');
INSERT INTO phpbb_bbc_box VALUES (20, 'quick', '1', '0', 'quick width=480 height=224', 'quick', 'quick', 'quick', '1', '200');
INSERT INTO phpbb_bbc_box VALUES (21, 'sup', '1', '0', 'sup', 'sup', 'sup', 'sup', '0', '210');
INSERT INTO phpbb_bbc_box VALUES (22, 'sub', '1', '0', 'sub', 'sub', 'sub', 'sub', '1', '220');
INSERT INTO phpbb_bbc_box (bbc_name, bbc_value, bbc_auth, bbc_before, bbc_after, bbc_helpline, bbc_img, bbc_divider) VALUES ('hide', '1', '0', 'hide', 'hide', 'hide', 'hide', '0');
INSERT INTO phpbb_bbc_box (bbc_name, bbc_value, bbc_auth, bbc_before, bbc_after, bbc_helpline, bbc_img, bbc_divider) VALUES ('tmb', '1', '0', 'tmb', 'tmb', 'tmb', 'tmb', '0');
INSERT INTO phpbb_bbc_box (bbc_name, bbc_value, bbc_auth, bbc_before, bbc_after, bbc_helpline, bbc_img, bbc_divider) VALUES ('youtube', '1', '0', 'youtube', 'youtube', 'youtube', 'youtube', '0');
INSERT INTO phpbb_bbc_box VALUES (26,'dailymotion','1','0','dailymotion','dailymotion','dailymotion','dailymotion','0',280);

# -- config
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_box_on', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_advanced', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_per_row', '14');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_time_regen', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_style_path', 'default');


# -- Mod Birthday Event
ALTER TABLE phpbb_users ADD user_birthday VARCHAR(10) NOT NULL DEFAULT '';
ALTER TABLE phpbb_users ADD user_zodiac TINYINT(2) NOT NULL DEFAULT 0;
ALTER TABLE phpbb_users ADD INDEX user_birthday (user_birthday);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_show',1);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_require',0);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_lock',0);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_lookahead',7);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_min',5);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_max',100);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_zodiac',0);

# -- attachments_config
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('upload_dir','files');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('upload_img','images/icon_clip.gif');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('topic_icon','images/icon_clip.gif');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('display_order','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('basic_data_updated', '0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_filesize','262144');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attachment_quota','52428800');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_filesize_pm','262144');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_attachments','3');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_attachments_pm','1');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('disable_mod','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('allow_pm_attach','1');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attachment_topic_review','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('allow_ftp_upload','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('show_apcp','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attach_version','2.4.5');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('default_upload_quota', '0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('default_pm_quota', '0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_server','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_path','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('download_path','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_user','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_pass','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_pasv_mode','1');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_display_inlined','1');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_max_width','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_max_height','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_link_width','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_link_height','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_create_thumbnail','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_min_thumb_filesize','12000');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_imagick', '');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('use_gd2','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('wma_autoplay','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('flash_autoplay','0');


# -- forbidden_extensions
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (1,'php');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (2,'php3');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (3,'php4');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (4,'phtml');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (5,'pl');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (6,'asp');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (7,'cgi');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (8,'php5');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (9,'php6');


# -- extension_groups
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (1,'Images',1,1,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (2,'Archives',0,1,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (3,'Plain Text',0,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (4,'Documents',0,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (5,'Real Media',0,0,2,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (6,'Streams',2,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (7,'Flash Files',3,0,1,'',0,'');

# -- extensions
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (1, 1,'gif', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (2, 1,'png', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (3, 1,'jpeg', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (4, 1,'jpg', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (5, 1,'tif', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (6, 1,'tga', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (7, 2,'gtar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (8, 2,'gz', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (9, 2,'tar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (10, 2,'zip', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (11, 2,'rar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (12, 2,'ace', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (13, 3,'txt', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (14, 3,'c', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (15, 3,'h', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (16, 3,'cpp', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (17, 3,'hpp', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (18, 3,'diz', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (19, 4,'xls', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (20, 4,'doc', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (21, 4,'dot', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (22, 4,'pdf', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (23, 4,'ai', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (24, 4,'ps', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (25, 4,'ppt', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (26, 5,'rm', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (27, 6,'wma', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (28, 7,'swf', '');

# -- default quota limits
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (1, 'Low', 262144);
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (2, 'Medium', 2097152);
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (3, 'High', 5242880);

# -- Rank Color System
INSERT INTO phpbb_rcs VALUES (1, 'Administrator', 'CC0000', 0, 0, 10);
#
# -- Config
#
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cache_rcs', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_enable', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_level_admin', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_level_mod', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_ranks_stats', '1');
ALTER TABLE phpbb_groups ADD group_color mediumint(8) NOT NULL DEFAULT '0';
ALTER TABLE phpbb_users ADD user_color mediumint(8) NOT NULL DEFAULT '0';
ALTER TABLE phpbb_users ADD user_group_id mediumint(8) NOT NULL DEFAULT '0';
ALTER TABLE phpbb_themes ADD rcs_admincolor varchar(6) NOT NULL DEFAULT '';
ALTER TABLE phpbb_themes ADD rcs_modcolor varchar(6) NOT NULL DEFAULT '';
ALTER TABLE phpbb_themes ADD rcs_usercolor varchar(6) NOT NULL DEFAULT '';
UPDATE phpbb_themes SET rcs_admincolor = 'FFA34F';
UPDATE phpbb_themes SET rcs_modcolor = '006600';
UPDATE phpbb_themes SET rcs_usercolor = '006699';

# -- Add On Disable GfPortal
INSERT INTO phpbb_config (config_name, config_value) VALUES ('activeportail','1');

# -- Arcades
INSERT INTO phpbb_arcade_categories(  arcade_catid,  arcade_cattitle,  arcade_catorder  )
VALUES ( 1,  'Les jeux du forums', 1  );

INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_category_mod','1');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('category_preview_games','2');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('games_par_page','10');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('game_order','Fixed');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('display_winner_avatar','1');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('stat_par_page','10');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('winner_avatar_position','left');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('maxsize_avatar','200');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('linkcat_align','2');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_mod','0');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_pay_mod','0');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_win_mod','0');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_pay_charging','0');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_pay_submit','0');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('points_winner','0');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('points_pay','0');
INSERT INTO phpbb_arcade values('championnat_points_one','10');
INSERT INTO phpbb_arcade values('championnat_points_two','6');
INSERT INTO phpbb_arcade values('championnat_points_three','3');
INSERT INTO phpbb_arcade values('championnat_points_four','2');
INSERT INTO phpbb_arcade values('championnat_points_five','1');
INSERT INTO phpbb_arcade values('use_cagnotte_mod','0');
INSERT INTO phpbb_arcade values('use_points_cagnotte','0');
INSERT INTO phpbb_arcade values('cagnotte','0');
INSERT INTO phpbb_arcade values('championnat_cat','');
INSERT INTO phpbb_arcade values('championnat_taux_un','40');
INSERT INTO phpbb_arcade values('championnat_taux_deux','20');
INSERT INTO phpbb_arcade values('championnat_taux_trois','10');
INSERT INTO phpbb_arcade values('championnat_taux_quatre','9');
INSERT INTO phpbb_arcade values('championnat_taux_cinq','6');
INSERT INTO phpbb_arcade values('championnat_taux_six','5');
INSERT INTO phpbb_arcade values('championnat_taux_sept','4');
INSERT INTO phpbb_arcade values('championnat_taux_huit','3');
INSERT INTO phpbb_arcade values('championnat_taux_neuf','2');
INSERT INTO phpbb_arcade values('championnat_taux_dix','1');
INSERT INTO phpbb_arcade values('cat_use','0');
INSERT INTO phpbb_arcade values('day_distrib','0');
INSERT INTO phpbb_arcade values('date_distribcagnotte','0');
INSERT INTO phpbb_arcade values('use_auto_distrib','0');
INSERT INTO phpbb_arcade values('championnat_use','1');
INSERT INTO `phpbb_arcade` VALUES ('limit_by_posts', '0'); 
INSERT INTO `phpbb_arcade` VALUES ('limit_type', 'date'); 
INSERT INTO `phpbb_arcade` VALUES ('posts_needed', '3'); 
INSERT INTO `phpbb_arcade` VALUES ('days_limit', '7'); 

#adr
INSERT INTO phpbb_config (config_name, config_value) VALUES ('stock_use', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('stock_time', '86400');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('stock_last_change', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_experience_for_new', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_experience_for_reply', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_experience_for_edit', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_use_cache_system', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_topics_display', '1-1-0-0-0-1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_profile_display', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_time_start', 'time()');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_character_age', '16');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_skill_sp_enable', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_character_sp_enable', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_thief_enable', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_thief_points', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_warehouse_duration', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_shop_duration', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_warehouse_tax', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('Adr_shop_tax', '10');
INSERT INTO phpbb_config(config_name, config_value) VALUES('Adr_version', '0.4.5');


INSERT INTO phpbb_adr_alignments (alignment_id, alignment_name, alignment_desc, alignment_level, alignment_img) VALUES (1, 'Adr_alignment_neutral', 'Adr_alignment_neutral_desc', 0, 'Neutral.gif');
INSERT INTO phpbb_adr_alignments (alignment_id, alignment_name, alignment_desc, alignment_level, alignment_img) VALUES (2, 'Adr_alignment_evil', 'Adr_alignment_evil_desc', 0, 'Evil.gif');
INSERT INTO phpbb_adr_alignments (alignment_id, alignment_name, alignment_desc, alignment_level, alignment_img) VALUES (3, 'Adr_alignment_good', 'Adr_alignment_good_desc', 0, 'Good.gif');

INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (1, 'Globuz', 'Monster1.jpg', 1, 15, 30, 30);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (2, 'Kargh', 'Monster2.jpg', 2, 20, 40, 60);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (3, 'Bouglou', 'Monster3.jpg', 1, 14, 40, 70);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (4, 'Dretg', 'Monster4.jpg', 1, 25, 30, 30);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (5, 'Greyiok', 'Monster5.jpg', 1, 10, 70, 70);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (6, 'Itchy', 'Monster6.jpg', 2, 25, 90, 80);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (7, 'Globber', 'Monster7.jpg', 3, 45, 250, 200);
INSERT INTO phpbb_adr_battle_monsters (monster_id, monster_name, monster_img, monster_level, monster_base_hp, monster_base_att, monster_base_def) VALUES (8, 'Scratchy', 'Monster8.jpg', 4, 80, 350, 300);


INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (1, 'Adr_class_fighter', 'Adr_class_fighter_desc', 0, 'Fighter.gif', 0, 0, 0, 0, 0, 0, 30, 2, 15, 3, 0, 1, 1500, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (2, 'Adr_class_barbare', 'Adr_class_barbare_desc', 0, 'Barbare.gif', 12, 0, 10, 0, 0, 0, 40, 1, 10, 4, 0, 0, 2000, 1, 5, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (3, 'Adr_class_druid', 'Adr_class_druid_desc', 0, 'Druid.gif', 0, 0, 0, 0, 10, 0, 20, 20, 10, 1, 2, 2, 1800, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (4, 'Adr_class_bard', 'Adr_class_bard_desc', 0, 'Bard.gif', 3, 3, 3, 3, 3, 10, 15, 15, 15, 2, 2, 2, 1200, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (5, 'Adr_class_magician', 'Adr_class_magician_desc', 0, 'Magician.gif', 0, 0, 0, 14, 14, 0, 8, 30, 5, 0, 1, 3, 2500, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (6, 'Adr_class_monk', 'Adr_class_monk_desc', 0, 'Monk.gif', 5, 5, 5, 5, 5, 5, 25, 10, 20, 2, 2, 1, 2400, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (7, 'Adr_class_paladin', 'Adr_class_paladin_desc', 0, 'Paladin.gif', 10, 8, 10, 10, 8, 15, 40, 15, 20, 2, 4, 1, 3000, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (8, 'Adr_class_priest', 'Adr_class_priest_desc', 0, 'Priest.gif', 0, 0, 0, 10, 12, 0, 20, 20, 15, 1, 2, 2, 2000, 0, 0, 1);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (9, 'Adr_class_sorceror', 'Adr_class_sorceror_desc', 0, 'Sorcerer.gif', 0, 0, 0, 16, 0, 0, 30, 100, 10, 0, 1, 10, 4500, 5, 10, 0);
INSERT INTO phpbb_adr_classes (class_id, class_name, class_desc, class_level, class_img, class_might_req, class_dexterity_req, class_constitution_req, class_intelligence_req, class_wisdom_req, class_charisma_req, class_base_hp, class_base_mp, class_base_ac, class_update_hp, class_update_mp, class_update_ac, class_update_xp_req, class_update_of, class_update_of_req, class_selectable) VALUES (10, 'Adr_class_thief', 'Adr_class_thief_desc', 0, 'Thief.gif', 0, 12, 0, 0, 0, 0, 20, 10, 10, 1, 2, 1, 1500, 0, 0, 1);

INSERT INTO phpbb_adr_elements (element_id, element_name, element_desc, element_level, element_img, element_skill_mining_bonus, element_skill_stone_bonus, element_skill_forge_bonus, element_skill_enchantment_bonus, element_skill_trading_bonus, element_skill_thief_bonus) VALUES (1, 'Adr_element_water', 'Adr_element_water_desc', 0, 'Water.gif', 0, 0, 0, 1, 0, 0);
INSERT INTO phpbb_adr_elements (element_id, element_name, element_desc, element_level, element_img, element_skill_mining_bonus, element_skill_stone_bonus, element_skill_forge_bonus, element_skill_enchantment_bonus, element_skill_trading_bonus, element_skill_thief_bonus) VALUES (2, 'Adr_element_earth', 'Adr_element_earth_desc', 0, 'Earth.gif', 1, 1, 0, 0, 0, 0);
INSERT INTO phpbb_adr_elements (element_id, element_name, element_desc, element_level, element_img, element_skill_mining_bonus, element_skill_stone_bonus, element_skill_forge_bonus, element_skill_enchantment_bonus, element_skill_trading_bonus, element_skill_thief_bonus) VALUES (3, 'Adr_element_holy', 'Adr_element_holy_desc', 2, 'Holy.gif', 1, 1, 1, 1, 1, 1);
INSERT INTO phpbb_adr_elements (element_id, element_name, element_desc, element_level, element_img, element_skill_mining_bonus, element_skill_stone_bonus, element_skill_forge_bonus, element_skill_enchantment_bonus, element_skill_trading_bonus, element_skill_thief_bonus) VALUES (4, 'Adr_element_fire', 'Adr_element_fire_desc', 0, 'Fire.gif', 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_adr_elements (element_id, element_name, element_desc, element_level, element_img, element_skill_mining_bonus, element_skill_stone_bonus, element_skill_forge_bonus, element_skill_enchantment_bonus, element_skill_trading_bonus, element_skill_thief_bonus) VALUES (5, 'Adr_element_ice', 'Adr_element_ice_desc', 0, 'Ice.gif', 0, 0, 0, 0, 1, 0);
INSERT INTO phpbb_adr_elements (element_id, element_name, element_desc, element_level, element_img, element_skill_mining_bonus, element_skill_stone_bonus, element_skill_forge_bonus, element_skill_enchantment_bonus, element_skill_trading_bonus, element_skill_thief_bonus) VALUES (6, 'Adr_element_wind', 'Adr_element_wind_desc', 0, 'Wind.gif', 0, 0, 0, 0, 0, 1);

INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('max_characteristic', 20);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('min_characteristic', 3);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('allow_reroll', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('allow_character_delete', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('allow_shop_steal', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('new_shop_price', 500);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('item_modifier_power', 100);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('skill_trading_power', 2);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('skill_thief_failure_damage', 2000);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('skill_thief_failure_punishment', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('skill_thief_failure_type', 2);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('skill_thief_failure_time', 6);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('vault_loan_enable', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('interests_rate', 4);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('interests_time', 86400);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('loan_interests', 15);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('loan_interests_time', 864000);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('loan_max_sum', 5000);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('loan_requirements', 0);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('stock_max_change', 10);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('stock_min_change', 0);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('vault_enable', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_enable', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_monster_stats_modifier', 150);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_exp_min', 10);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_exp_max', 40);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_exp_modifier', 120);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_reward_min', 10);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_reward_max', 40);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_reward_modifier', 120);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('temple_heal_cost', 100);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('temple_resurrect_cost', 300);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('cell_allow_user_caution', '1');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('cell_allow_user_judge', '1');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('cell_allow_user_blank', '1');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('cell_amount_user_blank', '5000');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('cell_user_judge_voters', '10');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('cell_user_judge_posts', '2');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('item_power_level', 0);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('training_skill_cost', 1000);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('training_charac_cost', 3000);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('training_upgrade_cost', 10000);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('training_allow_change', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('training_change_cost', 100);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('next_level_penalty', '10');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_pvp_enable', '1');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_pvp_defies_max', '5');
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('pvp_base_exp_min', 10);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('pvp_base_exp_max', 40);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('pvp_base_exp_modifier', 120);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('pvp_base_reward_min', 10);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('pvp_base_reward_max', 40);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('pvp_base_reward_modifier', 120);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('weight_enable', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_disable_rpg', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_limit_regen_duration', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_character_limit_enable', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_character_battle_limit', 20);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_character_skill_limit', 30);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_character_trading_limit', 30);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_character_thief_limit', 10);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_base_sp_modifier', 120);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('posts_enable', 0);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('posts_min', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('battle_calc_type', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_cache_interval', 15);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_cache_last_updated', 0);

ALTER TABLE phpbb_adr_shops_items CHANGE `item_steal_dc` `item_steal_dc` TINYINT(2) DEFAULT '2' NOT NULL;

UPDATE phpbb_adr_battle_list SET battle_text = '' WHERE battle_result != 0;
UPDATE phpbb_adr_battle_pvp SET battle_text = '' WHERE battle_result != 3;

INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (1, 'Adr_race_human', 'Adr_race_human_desc', 0, 'Human.gif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (2, 'Adr_race_half-elf', 'Adr_race_half-elf_desc', 0, 'Half-elf.gif', 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (3, 'Adr_race_half-orc', 'Adr_race_half-orc_desc', 0, 'Half-orc.gif', 2, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 3);
INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (4, 'Adr_race_elf', 'Adr_race_elf_desc', 0, 'Elf.gif', 0, 2, 0, 0, 0, 2, 0, 0, 0, 1, 1, 0, 1, 0, 2, 0, 0, 0);
INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (5, 'Adr_race_gnome', 'Adr_race_gnome_desc', 0, 'Gnome.gif', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 0);
INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (6, 'Adr_race_halfeling', 'Adr_race_halfeling_desc', 2, 'Halfeling.gif', 0, 2, 0, 0, 2, 0, 0, 0, 0, 0, 0, 3, 0, 0, 2, 0, 0, 0);
INSERT INTO phpbb_adr_races (race_id, race_name, race_desc, race_level, race_img, race_might_bonus, race_dexterity_bonus, race_constitution_bonus, race_intelligence_bonus, race_wisdom_bonus, race_charisma_bonus, race_skill_mining_bonus, race_skill_stone_bonus, race_skill_forge_bonus, race_skill_enchantment_bonus, race_skill_trading_bonus, race_skill_thief_bonus, race_might_malus, race_dexterity_malus, race_constitution_malus, race_intelligence_malus, race_wisdom_malus, race_charisma_malus) VALUES (7, 'Adr_race_dwarf', 'Adr_race_dwarf_desc', 0, 'Dwarf.gif', 1, 0, 2, 0, 1, 0, 2, 2, 1, 0, 0, 0, 0, 2, 0, 0, 0, 3);

INSERT INTO phpbb_adr_shops (shop_id, shop_owner_id, shop_name, shop_desc) VALUES (1, 1, 'Adr_shop_forums', 'Adr_shop_forums_desc');

INSERT INTO phpbb_adr_stores(store_id, store_name, store_desc, store_img, store_status, store_sales_status, store_admin) VALUES(1, 'Forum Store', 'The general forum store', '',1 ,0 ,0 );
INSERT INTO phpbb_adr_stores(store_name, store_desc, store_img, store_status, store_sales_status, store_admin) VALUES('Admin Only Store', 'Viewable only by the board admin', '',1 ,0 ,1 );

INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (11, 1, 27721, 4, 5, 600, 600, 'ring2.gif', 'Adr_items_ring_2', 'Adr_items_ring_2_desc', 14, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (10, 1, 11000, 3, 1, 150, 150, 'ring1.gif', 'Adr_items_ring_1', 'Adr_items_ring_1_desc', 14, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (9, 1, 1078, 4, 3, 1, 1, 'scroll4.gif', 'Adr_items_scroll_4', 'Adr_items_scroll_4_desc', 12, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (8, 1, 550, 3, 1, 1, 1, 'scroll3.gif', 'Adr_items_scroll_3', 'Adr_items_scroll_3_desc', 12, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (7, 1, 771, 3, 3, 1, 1, 'scroll2.gif', 'Adr_items_scroll_2', 'Adr_items_scroll_2_desc', 11, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (6, 1, 550, 3, 1, 1, 1, 'scroll1.gif', 'Adr_items_scroll_1', 'Adr_items_scroll_1_desc', 11, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (5, 1, 154, 3, 3, 200, 200, 'miner.gif', 'Adr_items_miner', 'Adr_items_miner_desc', 3, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (4, 1, 111, 3, 1, 100, 100, 'tome.gif', 'Adr_item_tome', 'Adr_item_tome_desc', 4, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (3, 1, 555, 4, 5, 1, 1, 'diamond.gif', 'Adr_items_diamond', 'Adr_items_diamond_desc', 2, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (2, 1, 352, 3, 4, 1, 1, 'sapphire.gif', 'Adr_items_sapphire', 'Adr_items_sapphire_desc', 2, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (1, 1, 56, 3, 1, 1, 1, 'ore.gif', 'Adr_item_ore', 'Adr_item_ore_desc', 1, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (12, 1, 7701, 4, 1, 50, 50, 'amulet1.gif', 'Adr_items_amulet_1', 'Adr_items_amulet_1_desc', 13, 0);
INSERT INTO phpbb_adr_shops_items (item_id, item_owner_id, item_price, item_quality, item_power, item_duration, item_duration_max, item_icon, item_name, item_desc, item_type_use, item_in_shop) VALUES (13, 1, 13861, 4, 5, 650, 650, 'amulet2.gif', 'Adr_items_amulet_2', 'Adr_items_amulet_2_desc', 13, 0);

INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (0, 0, 'Adr_dont_care');
INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (1, 20, 'Adr_items_quality_very_poor');
INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (2, 50, 'Adr_items_quality_poor');
INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (3, 100, 'Adr_items_quality_medium');
INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (4, 140, 'Adr_items_quality_good');
INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (5, 200, 'Adr_items_quality_very_good');
INSERT INTO phpbb_adr_shops_items_quality (item_quality_id, item_quality_modifier_price, item_quality_lang) VALUES (6, 300, 'Adr_items_quality_excellent');

INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (0, 0, 'Adr_dont_care');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (1, 50, 'Adr_items_type_raw_materials');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (2, 200, 'Adr_items_type_rare_raw_materials');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (3, 100, 'Adr_items_type_tools_pickaxe');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (4, 100, 'Adr_items_type_tools_magictome');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (5, 100, 'Adr_items_type_weapon');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (6, 1000, 'Adr_items_type_enchanted_weapon');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (7, 200, 'Adr_items_type_armor');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (8, 100, 'Adr_items_type_buckler');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (9, 50, 'Adr_items_type_helm');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (10, 50, 'Adr_items_type_gloves');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (11, 500, 'Adr_items_type_magic_attack');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (12, 500, 'Adr_items_type_magic_defend');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (13, 5000, 'Adr_items_type_amulet');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (14, 10000, 'Adr_items_type_ring');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (15, 20, 'Adr_items_type_health_potion');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (16, 20, 'Adr_items_type_mana_potion');
INSERT INTO phpbb_adr_shops_items_type (item_type_id, item_type_base_price, item_type_lang) VALUES (17, 1, 'Adr_items_type_misc');

INSERT INTO phpbb_adr_skills (skill_id, skill_name, skill_desc, skill_img, skill_req, skill_chance) VALUES (1, 'Adr_mining', 'Adr_skill_mining_desc', 'skill_mining.gif', 100, 5);
INSERT INTO phpbb_adr_skills (skill_id, skill_name, skill_desc, skill_img, skill_req, skill_chance) VALUES (2, 'Adr_stone', 'Adr_skill_stone_desc', 'skill_stone.gif', 200, 5);
INSERT INTO phpbb_adr_skills (skill_id, skill_name, skill_desc, skill_img, skill_req, skill_chance) VALUES (3, 'Adr_forge', 'Adr_skill_forge_desc', 'skill_forge.gif', 50, 5);
INSERT INTO phpbb_adr_skills (skill_id, skill_name, skill_desc, skill_img, skill_req, skill_chance) VALUES (4, 'Adr_enchantment', 'Adr_skill_enchantment_desc', 'skill_enchantment.gif', 300, 5);
INSERT INTO phpbb_adr_skills (skill_id, skill_name, skill_desc, skill_img, skill_req, skill_chance) VALUES (5, 'Adr_trading', 'Adr_skill_trading_desc', 'skill_trading.gif', 80, 5);
INSERT INTO phpbb_adr_skills (skill_id, skill_name, skill_desc, skill_img, skill_req, skill_chance) VALUES (6, 'Adr_thief', 'Adr_skill_thief_desc', 'skill_thief.gif', 70, 5);

INSERT INTO phpbb_adr_vault_exchange (stock_id, stock_name, stock_desc, stock_price, stock_previous_price, stock_best_price, stock_worst_price) VALUES (1, 'Adr_vault_action_name_1', 'Adr_vault_action_desc_1', 113, 108, 113, 100);
INSERT INTO phpbb_adr_vault_exchange (stock_id, stock_name, stock_desc, stock_price, stock_previous_price, stock_best_price, stock_worst_price) VALUES (2, 'Adr_vault_action_name_2', 'Adr_vault_action_desc_2', 177, 192, 200, 177);
INSERT INTO phpbb_adr_vault_exchange (stock_id, stock_name, stock_desc, stock_price, stock_previous_price, stock_best_price, stock_worst_price) VALUES (3, 'Adr_vault_action_name_3', 'Adr_vault_action_desc_3', 280, 288, 300, 280);

UPDATE phpbb_adr_general SET `config_value` = '0' WHERE `config_name` = 'Adr_disable_rpg';

INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_shop_steal_sell', 1);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_shop_steal_min_lvl', 5);
INSERT INTO phpbb_adr_general (config_name, config_value) VALUES ('Adr_shop_steal_show', 0);

# -- Points
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable',0);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_display_after_posts',1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_post_message','Vous avez Gagnez %s pour avoir écrit ce message');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable_spam_num',10);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable_spam_time',24);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable_spam_message','Vous avez excédé la quantité répartie de postes et ne gagnerez rien pour votre poste');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_installed','yes');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_version','2.2.3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_adminbig','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_adminnavbar','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('points_name','Points');
ALTER TABLE phpbb_users ADD user_points INT DEFAULT '100' NOT NULL;

INSERT INTO `phpbb_captcha_config` VALUES ('width', '350');
INSERT INTO `phpbb_captcha_config` VALUES ('height', '90');
INSERT INTO `phpbb_captcha_config` VALUES ('exsample_code', 'SAMPLE');
INSERT INTO `phpbb_captcha_config` VALUES ('background_color', '#E5ECF9');
INSERT INTO `phpbb_captcha_config` VALUES ('jpeg', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('jpeg_quality', '50');
INSERT INTO `phpbb_captcha_config` VALUES ('pre_letters', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('pre_letters_great', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('font', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('trans_letters', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('chess', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('ellipses', '1');
INSERT INTO `phpbb_captcha_config` VALUES ('arcs', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('lines', '1');
INSERT INTO `phpbb_captcha_config` VALUES ('image', '0');
INSERT INTO `phpbb_captcha_config` VALUES ('bg_transition', '25');
INSERT INTO `phpbb_captcha_config` VALUES ('gammacorrect', '0.8');
INSERT INTO `phpbb_captcha_config` VALUES ('foreground_lattice_x', '15');
INSERT INTO `phpbb_captcha_config` VALUES ('foreground_lattice_y', '15');
INSERT INTO `phpbb_captcha_config` VALUES ('lattice_color', '#FFFFFF');
INSERT INTO `phpbb_captcha_config` VALUES ('avc_version', '1.2.0');

ALTER TABLE `phpbb_confirm` CHANGE `code` `code` CHAR(10) NOT NULL;
ALTER TABLE phpbb_users ADD user_browser VARCHAR(100) DEFAULT '' NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('browsers_path', 'images/browsers/');
ALTER TABLE phpbb_users ADD user_flag VARCHAR(100) DEFAULT '' NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('flags_path', 'images/flags/');
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_wishes',1);
INSERT INTO `phpbb_config` VALUES ('account_delete', '1');
INSERT INTO `phpbb_shoutbox` (`id`, `sb_user_id`, `msg`, `timestamp`, `sb_username`, `shout_bbcode_uid`, `enable_bbcode`, `enable_html`, `enable_smilies`, `shout_ip`, `shout_group_id`) VALUES (1, 2, 'Bienvenue Dans le forum ArkaMod de [url=http://www.ezcom-fr.com/]EzCom[/url]', 0, 'Admin', '0', 1, 0, 1, '0', 0);

# 
#-----[Karma]------------------------------------------ 
# 

ALTER TABLE phpbb_users ADD karma MEDIUMINT DEFAULT '0' NOT NULL ;
ALTER TABLE phpbb_users ADD karma_time BIGINT DEFAULT '0' NOT NULL ;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('karmap','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('karmav','1');

# 
#-----[lottery]------------------------------------------ 
# 

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_cost', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_ticktype', 'single');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_length', '500000');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_name', 'Lottery');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_base', '50');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_start', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_reset', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_status', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_items', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_win_items', '');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_show_entries', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_mb', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_mb_amount', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_history', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_currency', '');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_item_mcost', '1');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_item_xcost', '500');
INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_random_shop', '');

# 
#-----[rabbitoshi]------------------------------------------ 
#

INSERT INTO `phpbb_config` VALUES ('rabbitoshi_enable', '1');
INSERT INTO `phpbb_config` VALUES ('rabbitoshi_name', 'Rabbitoshi');
INSERT INTO `phpbb_config` VALUES ('rabbitoshi_enable_cron', '1');
INSERT INTO `phpbb_config` VALUES ('rabbitoshi_cron_time', '86400');
INSERT INTO `phpbb_config` VALUES ('rabbitoshi_cron_last_time', '1224351963');