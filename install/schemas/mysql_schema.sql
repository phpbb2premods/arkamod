#
# phpBB2 - MySQL schema
#
# $Id: mysql_schema.sql,v 1.35.2.9 2005/10/30 15:17:14 acydburn Exp $
#

#
# Table structure for table 'phpbb_auth_access'
#
CREATE TABLE phpbb_auth_access (
   group_id mediumint(8) DEFAULT '0' NOT NULL,
   forum_id smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   auth_view tinyint(1) DEFAULT '0' NOT NULL,
   auth_read tinyint(1) DEFAULT '0' NOT NULL,
   auth_post tinyint(1) DEFAULT '0' NOT NULL,
   auth_reply tinyint(1) DEFAULT '0' NOT NULL,
   auth_edit tinyint(1) DEFAULT '0' NOT NULL,
   auth_delete tinyint(1) DEFAULT '0' NOT NULL,
   auth_sticky tinyint(1) DEFAULT '0' NOT NULL,
   auth_announce tinyint(1) DEFAULT '0' NOT NULL,
   auth_vote tinyint(1) DEFAULT '0' NOT NULL,
   auth_pollcreate tinyint(1) DEFAULT '0' NOT NULL,
   auth_attachments tinyint(1) DEFAULT '0' NOT NULL,
   auth_mod tinyint(1) DEFAULT '0' NOT NULL,
   KEY group_id (group_id),
   KEY forum_id (forum_id)
);


#
# Table structure for table 'phpbb_user_group'
#
CREATE TABLE phpbb_user_group (
   group_id mediumint(8) DEFAULT '0' NOT NULL,
   user_id mediumint(8) DEFAULT '0' NOT NULL,
   user_pending tinyint(1),
   KEY group_id (group_id),
   KEY user_id (user_id)
);


#
# Table structure for table 'phpbb_groups'
#
CREATE TABLE phpbb_groups (
   group_id mediumint(8) NOT NULL auto_increment,
   group_type tinyint(4) DEFAULT '1' NOT NULL,
   group_name varchar(40) NOT NULL,
   group_description varchar(255) NOT NULL,
   group_moderator mediumint(8) DEFAULT '0' NOT NULL,
   group_single_user tinyint(1) DEFAULT '1' NOT NULL,
   PRIMARY KEY (group_id),
   KEY group_single_user (group_single_user)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal'
#
CREATE TABLE phpbb_portal (
  portal_name varchar(255) NOT NULL default '',
  portal_value varchar(255) NOT NULL default '',
  PRIMARY KEY  (portal_name)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_links'
#
CREATE TABLE phpbb_portal_links (
  link_id mediumint(8) NOT NULL auto_increment,
  link_url varchar(100) NOT NULL default '',
  link_text varchar(100) NOT NULL default '',
  link_img varchar(100) NOT NULL default '',
  link_imgwidth varchar(4) NOT NULL default '',
  link_imgheight varchar(4) NOT NULL default '',
  link_active tinyint(1) NOT NULL default '0',
  UNIQUE KEY link_id (link_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_mod'
#
CREATE TABLE phpbb_portal_mod (
  mod_id mediumint(11) NOT NULL auto_increment,
  mod_name varchar(100) NOT NULL default '',
  mod_auth tinyint(1) unsigned NOT NULL default '0',
  mod_type tinyint(1) NOT NULL default '0',
  mod_table tinyint(1) NOT NULL default '0',
  mod_title varchar(100) NOT NULL default '',
  mod_source text NOT NULL,
  KEY mod_id (mod_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_page'
#
CREATE TABLE phpbb_portal_page(
page_id MEDIUMINT(8) NOT NULL AUTO_INCREMENT, 
page_desc VARCHAR(100) NOT NULL, 
page_defaultsize TINYINT(1) NOT NULL DEFAULT '1', 
page_col1width VARCHAR(10) NOT NULL, 
page_col1unit VARCHAR(10) NOT NULL, 
page_col2width VARCHAR(10) NOT NULL, 
page_col2unit VARCHAR(10) NOT NULL, 
page_col3width VARCHAR(10) NOT NULL, 
page_col3unit VARCHAR(10) NOT NULL,
display_header TINYINT(1) NOT NULL default '-1',
  KEY page_id (page_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_struct'
#
CREATE TABLE phpbb_portal_struct (
  struct_id mediumint(11) NOT NULL auto_increment,
  page_id mediumint(8) NOT NULL default '0',
  mod_id mediumint(11) NOT NULL default '0',
  struct_col tinyint(1) NOT NULL default '0',
  struct_order mediumint(8) NOT NULL default '0',
  KEY struct_id (struct_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_welcome'
#
CREATE TABLE phpbb_portal_welcome (
  welcome_msg text NOT NULL,
  bbcode_uid varchar(10) NOT NULL default ''
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_auth_portal'
#
CREATE TABLE `phpbb_auth_portal` (
  `group_id` mediumint(9) NOT NULL default '0',
  `mod_id` mediumint(9) NOT NULL default '0',
  `auth_view` tinyint(1) NOT NULL default '0'
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_navig'
#
CREATE TABLE phpbb_portal_navig (
  navlig_id mediumint(8) NOT NULL auto_increment,
  navlig_type tinyint(1) NOT NULL default '0',
  navlig_langkey varchar(50) NOT NULL default '',
  navlig_texte varchar(100) NOT NULL default '',
  navlig_url varchar(100) NOT NULL default '',
  navlig_script varchar(100) NOT NULL default '',
  navlig_icone tinyint(1) NOT NULL default '0',
  navlig_imgkey varchar(50) NOT NULL default '',
  navlig_iconeimg varchar(100) NOT NULL default '',
  navlig_iconesize int(3) NOT NULL default '0',
  navlig_order tinyint(1) NOT NULL default '0',
  navlig_tab tinyint(1) NOT NULL default '0',
  navlig_tabsize int(3) NOT NULL default '0',
  navlig_auth tinyint(1) NOT NULL default '0',
  menu_id mediumint(8) NOT NULL default '0',
  navlig_cars varchar(10) NOT NULL default '',
  PRIMARY KEY  (navlig_id)
) ;


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_navmen'
#
CREATE TABLE phpbb_portal_navmen (
  menu_id mediumint(8) NOT NULL auto_increment,
  menu_desc varchar(100) NOT NULL default '',
  PRIMARY KEY  (menu_id)
) ;


# --------------------------------------------------------
#
# Table structure for table 'phpbb_portal_pagmen'
#
CREATE TABLE phpbb_portal_pagmen (
  page_id mediumint(8) NOT NULL default '0',
  menu_id mediumint(8) NOT NULL default '0',
  UNIQUE KEY page_id (page_id)
) ;


# --------------------------------------------------------
#
# Table structure for table 'phpbb_banlist'
#
CREATE TABLE phpbb_banlist (
   ban_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   ban_userid mediumint(8) NOT NULL,
   ban_ip char(8) NOT NULL,
   ban_email varchar(255),
   PRIMARY KEY (ban_id),
   KEY ban_ip_user_id (ban_ip, ban_userid)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_categories'
#
CREATE TABLE phpbb_categories (
   cat_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   cat_title varchar(100),
   cat_order mediumint(8) UNSIGNED NOT NULL,
   PRIMARY KEY (cat_id),
   KEY cat_order (cat_order)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_config'
#
CREATE TABLE phpbb_config (
    config_name varchar(255) NOT NULL,
    config_value varchar(255) NOT NULL,
    PRIMARY KEY (config_name)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_confirm'
#
CREATE TABLE phpbb_confirm (
  confirm_id char(32) DEFAULT '' NOT NULL,
  session_id char(32) DEFAULT '' NOT NULL,
  code char(6) DEFAULT '' NOT NULL, 
  PRIMARY KEY  (session_id,confirm_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_disallow'
#
CREATE TABLE phpbb_disallow (
   disallow_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   disallow_username varchar(25) DEFAULT '' NOT NULL,
   PRIMARY KEY (disallow_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_forum_prune'
#
CREATE TABLE phpbb_forum_prune (
   prune_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   forum_id smallint(5) UNSIGNED NOT NULL,
   prune_days smallint(5) UNSIGNED NOT NULL,
   prune_freq smallint(5) UNSIGNED NOT NULL,
   PRIMARY KEY(prune_id),
   KEY forum_id (forum_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_forums'
#
CREATE TABLE phpbb_forums (
   forum_id smallint(5) UNSIGNED NOT NULL,
   cat_id mediumint(8) UNSIGNED NOT NULL,
   forum_name varchar(150),
   forum_desc text,
   forum_status tinyint(4) DEFAULT '0' NOT NULL,
   forum_order mediumint(8) UNSIGNED DEFAULT '1' NOT NULL,
   forum_posts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_topics mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_last_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   prune_next int(11),
   prune_enable tinyint(1) DEFAULT '0' NOT NULL,
   auth_view tinyint(2) DEFAULT '0' NOT NULL,
   auth_read tinyint(2) DEFAULT '0' NOT NULL,
   auth_post tinyint(2) DEFAULT '0' NOT NULL,
   auth_reply tinyint(2) DEFAULT '0' NOT NULL,
   auth_edit tinyint(2) DEFAULT '0' NOT NULL,
   auth_delete tinyint(2) DEFAULT '0' NOT NULL,
   auth_sticky tinyint(2) DEFAULT '0' NOT NULL,
   auth_announce tinyint(2) DEFAULT '0' NOT NULL,
   auth_vote tinyint(2) DEFAULT '0' NOT NULL,
   auth_pollcreate tinyint(2) DEFAULT '0' NOT NULL,
   auth_attachments tinyint(2) DEFAULT '0' NOT NULL,
   PRIMARY KEY (forum_id),
   KEY forums_order (forum_order),
   KEY cat_id (cat_id),
   KEY forum_last_post_id (forum_last_post_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_posts'
#
CREATE TABLE phpbb_posts (
   post_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_id smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   poster_id mediumint(8) DEFAULT '0' NOT NULL,
   post_time int(11) DEFAULT '0' NOT NULL,
   poster_ip char(8) NOT NULL,
   post_username varchar(25),
   enable_bbcode tinyint(1) DEFAULT '1' NOT NULL,
   enable_html tinyint(1) DEFAULT '0' NOT NULL,
   enable_smilies tinyint(1) DEFAULT '1' NOT NULL,
   enable_sig tinyint(1) DEFAULT '1' NOT NULL,
   post_edit_time int(11),
   post_edit_count smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   PRIMARY KEY (post_id),
   KEY forum_id (forum_id),
   KEY topic_id (topic_id),
   KEY poster_id (poster_id),
   KEY post_time (post_time)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_posts_text'
#
CREATE TABLE phpbb_posts_text (
   post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   bbcode_uid char(10) NOT NULL,
   post_subject char(60),
   post_text text,
   PRIMARY KEY (post_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_privmsgs'
#
CREATE TABLE phpbb_privmsgs (
   privmsgs_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   privmsgs_type tinyint(4) DEFAULT '0' NOT NULL,
   privmsgs_subject varchar(255) DEFAULT '0' NOT NULL,
   privmsgs_from_userid mediumint(8) DEFAULT '0' NOT NULL,
   privmsgs_to_userid mediumint(8) DEFAULT '0' NOT NULL,
   privmsgs_date int(11) DEFAULT '0' NOT NULL,
   privmsgs_ip char(8) NOT NULL,
   privmsgs_enable_bbcode tinyint(1) DEFAULT '1' NOT NULL,
   privmsgs_enable_html tinyint(1) DEFAULT '0' NOT NULL,
   privmsgs_enable_smilies tinyint(1) DEFAULT '1' NOT NULL,
   privmsgs_attach_sig tinyint(1) DEFAULT '1' NOT NULL,
   PRIMARY KEY (privmsgs_id),
   KEY privmsgs_from_userid (privmsgs_from_userid),
   KEY privmsgs_to_userid (privmsgs_to_userid)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_privmsgs_text'
#
CREATE TABLE phpbb_privmsgs_text (
   privmsgs_text_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   privmsgs_bbcode_uid char(10) DEFAULT '0' NOT NULL,
   privmsgs_text text,
   PRIMARY KEY (privmsgs_text_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_ranks'
#
CREATE TABLE phpbb_ranks (
   rank_id smallint(5) UNSIGNED NOT NULL auto_increment,
   rank_title varchar(50) NOT NULL,
   rank_min mediumint(8) DEFAULT '0' NOT NULL,
   rank_special tinyint(1) DEFAULT '0',
   rank_image varchar(255),
   PRIMARY KEY (rank_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_search_results`
#
CREATE TABLE phpbb_search_results (
  search_id int(11) UNSIGNED NOT NULL default '0',
  session_id char(32) NOT NULL default '',
  search_array text NOT NULL,
  PRIMARY KEY  (search_id),
  KEY session_id (session_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_search_wordlist`
#
CREATE TABLE phpbb_search_wordlist (
  word_text varchar(50) binary NOT NULL default '',
  word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  word_common tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY (word_text),
  KEY word_id (word_id)
);

# --------------------------------------------------------
#
# Table structure for table `phpbb_search_wordmatch`
#
CREATE TABLE phpbb_search_wordmatch (
  post_id mediumint(8) UNSIGNED NOT NULL default '0',
  word_id mediumint(8) UNSIGNED NOT NULL default '0',
  title_match tinyint(1) NOT NULL default '0',
  KEY post_id (post_id),
  KEY word_id (word_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_sessions'
#
# Note that if you're running 3.23.x you may want to make
# this table a type HEAP. This type of table is stored
# within system memory and therefore for big busy boards
# is likely to be noticeably faster than continually
# writing to disk ...
#
CREATE TABLE phpbb_sessions (
   session_id char(32) DEFAULT '' NOT NULL,
   session_user_id mediumint(8) DEFAULT '0' NOT NULL,
   session_start int(11) DEFAULT '0' NOT NULL,
   session_time int(11) DEFAULT '0' NOT NULL,
   session_ip char(8) DEFAULT '0' NOT NULL,
   session_page int(11) DEFAULT '0' NOT NULL,
   session_logged_in tinyint(1) DEFAULT '0' NOT NULL,
   session_admin tinyint(2) DEFAULT '0' NOT NULL,
   PRIMARY KEY (session_id),
   KEY session_user_id (session_user_id),
   KEY session_id_ip_user_id (session_id, session_ip, session_user_id)
);

# --------------------------------------------------------
#
# Table structure for table `phpbb_sessions_keys`
#
CREATE TABLE phpbb_sessions_keys (
  key_id varchar(32) DEFAULT '0' NOT NULL,
  user_id mediumint(8) DEFAULT '0' NOT NULL,
  last_ip varchar(8) DEFAULT '0' NOT NULL,
  last_login int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY (key_id, user_id),
  KEY last_login (last_login)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_smilies'
#
CREATE TABLE phpbb_smilies (
   smilies_id smallint(5) UNSIGNED NOT NULL auto_increment,
   code varchar(50),
   smile_url varchar(100),
   emoticon varchar(75),
   PRIMARY KEY (smilies_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_themes'
#
CREATE TABLE phpbb_themes (
   themes_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   template_name varchar(30) NOT NULL default '',
   style_name varchar(30) NOT NULL default '',
   head_stylesheet varchar(100) default NULL,
   body_background varchar(100) default NULL,
   body_bgcolor varchar(6) default NULL,
   body_text varchar(6) default NULL,
   body_link varchar(6) default NULL,
   body_vlink varchar(6) default NULL,
   body_alink varchar(6) default NULL,
   body_hlink varchar(6) default NULL,
   tr_color1 varchar(6) default NULL,
   tr_color2 varchar(6) default NULL,
   tr_color3 varchar(6) default NULL,
   tr_class1 varchar(25) default NULL,
   tr_class2 varchar(25) default NULL,
   tr_class3 varchar(25) default NULL,
   th_color1 varchar(6) default NULL,
   th_color2 varchar(6) default NULL,
   th_color3 varchar(6) default NULL,
   th_class1 varchar(25) default NULL,
   th_class2 varchar(25) default NULL,
   th_class3 varchar(25) default NULL,
   td_color1 varchar(6) default NULL,
   td_color2 varchar(6) default NULL,
   td_color3 varchar(6) default NULL,
   td_class1 varchar(25) default NULL,
   td_class2 varchar(25) default NULL,
   td_class3 varchar(25) default NULL,
   fontface1 varchar(50) default NULL,
   fontface2 varchar(50) default NULL,
   fontface3 varchar(50) default NULL,
   fontsize1 tinyint(4) default NULL,
   fontsize2 tinyint(4) default NULL,
   fontsize3 tinyint(4) default NULL,
   fontcolor1 varchar(6) default NULL,
   fontcolor2 varchar(6) default NULL,
   fontcolor3 varchar(6) default NULL,
   span_class1 varchar(25) default NULL,
   span_class2 varchar(25) default NULL,
   span_class3 varchar(25) default NULL,
   img_size_poll smallint(5) UNSIGNED,
   img_size_privmsg smallint(5) UNSIGNED,
   PRIMARY KEY  (themes_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_themes_name'
#
CREATE TABLE phpbb_themes_name (
   themes_id smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   tr_color1_name char(50),
   tr_color2_name char(50),
   tr_color3_name char(50),
   tr_class1_name char(50),
   tr_class2_name char(50),
   tr_class3_name char(50),
   th_color1_name char(50),
   th_color2_name char(50),
   th_color3_name char(50),
   th_class1_name char(50),
   th_class2_name char(50),
   th_class3_name char(50),
   td_color1_name char(50),
   td_color2_name char(50),
   td_color3_name char(50),
   td_class1_name char(50),
   td_class2_name char(50),
   td_class3_name char(50),
   fontface1_name char(50),
   fontface2_name char(50),
   fontface3_name char(50),
   fontsize1_name char(50),
   fontsize2_name char(50),
   fontsize3_name char(50),
   fontcolor1_name char(50),
   fontcolor2_name char(50),
   fontcolor3_name char(50),
   span_class1_name char(50),
   span_class2_name char(50),
   span_class3_name char(50),
   PRIMARY KEY (themes_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_topics'
#
CREATE TABLE phpbb_topics (
   topic_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   forum_id smallint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_title char(60) NOT NULL,
   topic_poster mediumint(8) DEFAULT '0' NOT NULL,
   topic_time int(11) DEFAULT '0' NOT NULL,
   topic_views mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_replies mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_status tinyint(3) DEFAULT '0' NOT NULL,
   topic_vote tinyint(1) DEFAULT '0' NOT NULL,
   topic_type tinyint(3) DEFAULT '0' NOT NULL,
   topic_first_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_last_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_moved_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   PRIMARY KEY (topic_id),
   KEY forum_id (forum_id),
   KEY topic_moved_id (topic_moved_id),
   KEY topic_status (topic_status),
   KEY topic_type (topic_type)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_topics_watch'
#
CREATE TABLE phpbb_topics_watch (
  topic_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  user_id mediumint(8) NOT NULL DEFAULT '0',
  notify_status tinyint(1) NOT NULL default '0',
  KEY topic_id (topic_id),
  KEY user_id (user_id),
  KEY notify_status (notify_status)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_users'
#
CREATE TABLE phpbb_users (
   user_id mediumint(8) NOT NULL,
   user_active tinyint(1) DEFAULT '1',
   username varchar(25) NOT NULL,
   user_password varchar(32) NOT NULL,
   user_session_time int(11) DEFAULT '0' NOT NULL,
   user_session_page smallint(5) DEFAULT '0' NOT NULL,
   user_lastvisit int(11) DEFAULT '0' NOT NULL,
   user_regdate int(11) DEFAULT '0' NOT NULL,
   user_level tinyint(4) DEFAULT '0',
   user_posts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   user_timezone decimal(5,2) DEFAULT '0' NOT NULL,
   user_style tinyint(4),
   user_lang varchar(255),
   user_dateformat varchar(14) DEFAULT 'd M Y H:i' NOT NULL,
   user_new_privmsg smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   user_unread_privmsg smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   user_last_privmsg int(11) DEFAULT '0' NOT NULL,
   user_emailtime int(11),
   user_viewemail tinyint(1),
   user_attachsig tinyint(1),
   user_allowhtml tinyint(1) DEFAULT '1',
   user_allowbbcode tinyint(1) DEFAULT '1',
   user_allowsmile tinyint(1) DEFAULT '1',
   user_allowavatar tinyint(1) DEFAULT '1' NOT NULL,
   user_allow_pm tinyint(1) DEFAULT '1' NOT NULL,
   user_allow_viewonline tinyint(1) DEFAULT '1' NOT NULL,
   user_notify tinyint(1) DEFAULT '1' NOT NULL,
   user_notify_pm tinyint(1) DEFAULT '0' NOT NULL,
   user_popup_pm tinyint(1) DEFAULT '0' NOT NULL,
   user_rank int(11) DEFAULT '0',
   user_avatar varchar(100),
   user_avatar_type tinyint(4) DEFAULT '0' NOT NULL,
   user_email varchar(255),
   user_icq varchar(15),
   user_website varchar(100),
   user_from varchar(100),
   user_sig text,
   user_sig_bbcode_uid char(10),
   user_aim varchar(255),
   user_yim varchar(255),
   user_msnm varchar(255),
   user_occ varchar(100),
   user_interests varchar(255),
   user_actkey varchar(32),
   user_newpasswd varchar(32),
   PRIMARY KEY (user_id),
   KEY user_session_time (user_session_time)
);

ALTER TABLE phpbb_users ADD COLUMN user_login_tries smallint(5) UNSIGNED DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD COLUMN user_last_login_try int(11) DEFAULT '0' NOT NULL;

# --------------------------------------------------------
#
# Table structure for table 'phpbb_vote_desc'
#
CREATE TABLE phpbb_vote_desc (
  vote_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  topic_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  vote_text text NOT NULL,
  vote_start int(11) NOT NULL DEFAULT '0',
  vote_length int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY  (vote_id),
  KEY topic_id (topic_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_vote_results'
#
CREATE TABLE phpbb_vote_results (
  vote_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  vote_option_id tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  vote_option_text varchar(255) NOT NULL,
  vote_result int(11) NOT NULL DEFAULT '0',
  KEY vote_option_id (vote_option_id),
  KEY vote_id (vote_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_vote_voters'
#
CREATE TABLE phpbb_vote_voters (
  vote_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  vote_user_id mediumint(8) NOT NULL DEFAULT '0',
  vote_user_ip char(8) NOT NULL,
  KEY vote_id (vote_id),
  KEY vote_user_id (vote_user_id),
  KEY vote_user_ip (vote_user_ip)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_words'
#
CREATE TABLE phpbb_words (
   word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   word char(100) NOT NULL,
   replacement char(100) NOT NULL,
   PRIMARY KEY (word_id)
);


# -- subforum
ALTER TABLE phpbb_forums ADD attached_forum_id MEDIUMINT(8) DEFAULT '-1' NOT NULL;
ALTER TABLE phpbb_topics ADD INDEX topic_last_post_id(topic_last_post_id);

# -- Forum_icon
ALTER TABLE `phpbb_forums` ADD `forum_icon` VARCHAR( 255 ) default NULL;

# -- Post_icon
ALTER TABLE phpbb_topics ADD topic_icon TINYINT(2);
ALTER TABLE phpbb_posts ADD post_icon TINYINT(2);
ALTER TABLE phpbb_posts ADD INDEX (post_icon);

# -- Mod QPES
ALTER TABLE phpbb_forums ADD forum_qpes tinyint(1) DEFAULT '1' NOT NULL; 
ALTER TABLE phpbb_users ADD user_qp_settings varchar(25) DEFAULT '0' NOT NULL;


# --------------------------------------------------------
#
# Table structure for table 'phpbb_bbc_box'
#
CREATE TABLE phpbb_bbc_box (
	bbc_id smallint(5) unsigned NOT NULL auto_increment,
	bbc_name varchar(255) NOT NULL,
	bbc_value varchar(255) NOT NULL,
	bbc_auth varchar(255) NOT NULL,
	bbc_before varchar(255) NOT NULL,
	bbc_after varchar(255) NOT NULL,
	bbc_helpline varchar(255) NOT NULL,
	bbc_img varchar(255) NOT NULL,
	bbc_divider varchar(255) NOT NULL,
	bbc_order mediumint(8) DEFAULT '1' NOT NULL,
	PRIMARY KEY (bbc_id)
);


# -- Mod Similar Topic


#
# Table structure for table 'phpbb_attachments_config'
#
CREATE TABLE phpbb_attachments_config (
  config_name varchar(255) NOT NULL,
  config_value varchar(255) NOT NULL,
  PRIMARY KEY (config_name)
);

#
# Table structure for table 'phpbb_forbidden_extensions'
#
CREATE TABLE phpbb_forbidden_extensions (
  ext_id mediumint(8) UNSIGNED NOT NULL auto_increment, 
  extension varchar(100) NOT NULL, 
  PRIMARY KEY (ext_id)
);

#
# Table structure for table 'phpbb_extension_groups'
#
CREATE TABLE phpbb_extension_groups (
  group_id mediumint(8) NOT NULL auto_increment,
  group_name char(20) NOT NULL,
  cat_id tinyint(2) DEFAULT '0' NOT NULL, 
  allow_group tinyint(1) DEFAULT '0' NOT NULL,
  download_mode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
  upload_icon varchar(100) DEFAULT '',
  max_filesize int(20) DEFAULT '0' NOT NULL,
  forum_permissions varchar(255) default '' NOT NULL,
  PRIMARY KEY group_id (group_id)
);

#
# Table structure for table 'phpbb_extensions'
#
CREATE TABLE phpbb_extensions (
  ext_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  extension varchar(100) NOT NULL,
  comment varchar(100),
  PRIMARY KEY ext_id (ext_id)
);

#
# Table structure for table 'phpbb_attachments_desc'
#
CREATE TABLE phpbb_attachments_desc (
  attach_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  physical_filename varchar(255) NOT NULL,
  real_filename varchar(255) NOT NULL,
  download_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  comment varchar(255),
  extension varchar(100),
  mimetype varchar(100),
  filesize int(20) NOT NULL,
  filetime int(11) DEFAULT '0' NOT NULL,
  thumbnail tinyint(1) DEFAULT '0' NOT NULL,
  PRIMARY KEY (attach_id),
  KEY filetime (filetime),
  KEY physical_filename (physical_filename(10)),
  KEY filesize (filesize)
);

#
# Table structure for table 'phpbb_attachments'
#
CREATE TABLE phpbb_attachments (
  attach_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  privmsgs_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  user_id_1 mediumint(8) NOT NULL,
  user_id_2 mediumint(8) NOT NULL,
  KEY attach_id_post_id (attach_id, post_id),
  KEY attach_id_privmsgs_id (attach_id, privmsgs_id),
  KEY post_id (post_id),
  KEY privmsgs_id (privmsgs_id)
);

#
# Table structure for table 'phpbb_quota_limits'
#
CREATE TABLE phpbb_quota_limits (
  quota_limit_id mediumint(8) unsigned NOT NULL auto_increment,
  quota_desc varchar(20) NOT NULL default '',
  quota_limit bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (quota_limit_id)
);

#
# Table structure for table 'phpbb_attach_quota'
#
CREATE TABLE phpbb_attach_quota (
  user_id mediumint(8) unsigned NOT NULL default '0',
  group_id mediumint(8) unsigned NOT NULL default '0',
  quota_type smallint(2) NOT NULL default '0',
  quota_limit_id mediumint(8) unsigned NOT NULL default '0',
  KEY quota_type (quota_type)
);

ALTER TABLE phpbb_forums ADD auth_download TINYINT(2) DEFAULT '0' NOT NULL;  
ALTER TABLE phpbb_auth_access ADD auth_download TINYINT(1) DEFAULT '0' NOT NULL;  
ALTER TABLE phpbb_posts ADD post_attachment TINYINT(1) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_topics ADD topic_attachment TINYINT(1) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_privmsgs ADD privmsgs_attachment TINYINT(1) DEFAULT '0' NOT NULL;


#
# Table structure for table 'phpbb_rcs'
#
CREATE TABLE phpbb_rcs (
	rcs_id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	rcs_name varchar(50) NOT NULL DEFAULT '',
	rcs_color varchar(6) NOT NULL DEFAULT '',
	rcs_single tinyint(1) NOT NULL DEFAULT '0',
	rcs_display tinyint(1) NOT NULL DEFAULT '0',
	rcs_order mediumint(8) UNSIGNED NOT NULL,
	PRIMARY KEY (rcs_id)
);

#
# -- Arcades
#

CREATE TABLE phpbb_games (
  game_id mediumint(8) NOT NULL auto_increment,
  game_pic varchar(50) NOT NULL default '', 
  game_desc varchar(255) NOT NULL default '', 
  game_highscore INT( 11 ) DEFAULT '0' NOT NULL,
  game_highdate int(11) NOT NULL default '0',
  game_highuser mediumint(8) NOT NULL default '0',
  game_name varchar(50) NOT NULL default '',
  game_swf varchar(50) NOT NULL default '',
  game_scorevar varchar(20) NOT NULL default '',
  game_type tinyint(4) NOT NULL default '0', 
  game_width MEDIUMINT(5) DEFAULT '550' NOT NULL, 
  game_height VARCHAR(5) DEFAULT '380' NOT NULL,
  game_order MEDIUMINT(8) DEFAULT '0' NOT NULL, 
  game_set MEDIUMINT(8) DEFAULT '0' NOT NULL,
  arcade_catid MEDIUMINT(8) unsigned DEFAULT '1' NOT NULL,
  KEY game_id (game_id)
);

CREATE TABLE phpbb_scores (
  game_id mediumint(8) NOT NULL default '0', 
  user_id mediumint(8) NOT NULL default '0',
  score_game int(11) NOT NULL default '0',
  score_date int(11) NOT NULL default '0',
  score_time int(11) NOT NULL default '0',
  score_set mediumint(8) NOT NULL default '0',
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
);

CREATE TABLE phpbb_gamehash (
gamehash_id CHAR(32) NOT NULL,
game_id MEDIUMINT(8) NOT NULL,
user_id MEDIUMINT(8) NOT NULL,
hash_date INT(11) NOT NULL
); 

CREATE TABLE phpbb_hackgame ( 
user_id MEDIUMINT(8) NOT NULL, 
game_id MEDIUMINT(8) NOT NULL, 
date_hack INT(11) NOT NULL
); 

CREATE TABLE phpbb_arcade_categories ( 
  arcade_catid mediumint(8) unsigned NOT NULL auto_increment, 
  arcade_cattitle varchar(100) NOT NULL default '', 
  arcade_nbelmt mediumint(8) unsigned NOT NULL default '0', 
  arcade_catorder mediumint(8) unsigned NOT NULL default '0',
  arcade_catauth TINYINT( 2 ) NOT NULL,
  KEY arcade_catid (arcade_catid)
) ; 

CREATE TABLE phpbb_arcade (
  arcade_name varchar(255) NOT NULL default '', 
  arcade_value varchar(255) NOT NULL default '', 
  PRIMARY KEY  (arcade_name) 
);

CREATE TABLE phpbb_auth_arcade_access (
  group_id mediumint(8) NOT NULL default '0', 
  arcade_catid mediumint(8) unsigned NOT NULL default '0',
  KEY group_id (group_id), 
  KEY arcade_catid (arcade_catid) 
) ; 

#
# -- Comments
#

CREATE TABLE phpbb_arcade_comments (
game_id mediumint(8) NOT NULL default '0',
comments_value varchar(255) NOT NULL default ''
) ;


#
# -- Championnat
#

CREATE TABLE phpbb_arcade_championnat ( 
  game_id mediumint(8) NOT NULL default '0', 
  one_userid  mediumint(8) NOT NULL default '0', 
  two_userid mediumint(8) NOT NULL default '0', 
  three_userid mediumint(8) NOT NULL default '0', 
  four_userid mediumint(8) NOT NULL default '0', 
  five_userid mediumint(8) NOT NULL default '0',
  KEY game_id (`game_id`) 
) ;

ALTER TABLE phpbb_users ADD user_adr_ban tinyint(1) default '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_time INT(11) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_time_judgement INT(11) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_caution INT(8) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_sentence TEXT DEFAULT '';
ALTER TABLE phpbb_users ADD user_cell_enable_caution INT(8) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_enable_free INT(8) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_celleds INT(8) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_cell_punishment TINYINT(1) DEFAULT '0' NOT NULL;

CREATE TABLE phpbb_adr_alignments (
  alignment_id smallint(8) NOT NULL default '0',
  alignment_name varchar(255) NOT NULL default '',
  alignment_desc text NOT NULL,
  alignment_level tinyint(1) NOT NULL default '0',
  alignment_img varchar(255) NOT NULL default '',
  PRIMARY KEY  (alignment_id)
) ;

CREATE TABLE phpbb_adr_battle_list (
  battle_id int(8) NOT NULL auto_increment,
  battle_type tinyint(1) NOT NULL default '0',
  battle_turn tinyint(1) NOT NULL default '0',
  battle_result tinyint(1) NOT NULL default '0',
  battle_text text NOT NULL,
  battle_challenger_equipment_info varchar(255) NOT NULL default '',
  battle_round int(12) NOT NULL default '0',
  battle_start int(12) NOT NULL default '0',
  battle_finish int(12) NOT NULL default '0',
  battle_challenger_id int(8) NOT NULL default '0',
  battle_challenger_hp int(8) NOT NULL default '0',
  battle_challenger_mp int(8) NOT NULL default '0',
  battle_challenger_att int(8) NOT NULL default '0',
  battle_challenger_def int(8) NOT NULL default '0',
  battle_challenger_magic_attack int(8) NOT NULL default '0',
  battle_challenger_magic_resistance int(8) NOT NULL default '0',
  battle_challenger_dmg int(8) NOT NULL default '0',
  battle_challenger_element int(3) NOT NULL default '0',
  battle_opponent_id int(8) NOT NULL default '0',
  battle_opponent_hp int(8) NOT NULL default '0',
  battle_opponent_mp int(8) NOT NULL default '0',
  battle_opponent_att int(8) NOT NULL default '0',
  battle_opponent_def int(8) NOT NULL default '0',
  battle_opponent_magic_attack int(8) NOT NULL default '0',
  battle_opponent_magic_resistance int(8) NOT NULL default '0',
  battle_opponent_mp_power int(8) NOT NULL default '0',
  battle_opponent_sp int(12) NOT NULL default '0',
  battle_opponent_dmg int(8) NOT NULL default '0',
  battle_opponent_hp_max int(8) NOT NULL default '0',
  battle_opponent_mp_max int(8) NOT NULL default '0',
  battle_opponent_element int(3) NOT NULL default '0',
  PRIMARY KEY  (battle_id)
) ;

CREATE TABLE phpbb_adr_battle_monsters (
  monster_id int(8) NOT NULL default '0',
  monster_name varchar(255) NOT NULL default '',
  monster_img varchar(255) NOT NULL default '',
  monster_level int(8) NOT NULL default '0',
  monster_base_hp int(8) NOT NULL default '0',
  monster_base_att int(8) NOT NULL default '0',
  monster_base_def int(8) NOT NULL default '0',
  monster_base_mp int(8) NOT NULL default '10',
  monster_base_mp_power int(8) NOT NULL default '1',
  monster_base_custom_spell varchar(255) NOT NULL default 'a magical spell',
  monster_base_magic_attack int(8) NOT NULL default '10',
  monster_base_magic_resistance int(8) NOT NULL default '10',
  monster_base_sp int(8) NOT NULL default '0',
  monster_thief_skill int(3) NOT NULL default '0',
  monster_base_element int(3) NOT NULL default '1',
  PRIMARY KEY  (monster_id)
) ;

CREATE TABLE phpbb_adr_battle_pvp (
  battle_id int(8) NOT NULL auto_increment,
  battle_turn int(8) NOT NULL default '0',
  battle_result tinyint(1) NOT NULL default '0',
  battle_text text NOT NULL,
  battle_text_chat text NOT NULL,
  battle_start int(12) NOT NULL default '0',
  battle_finish int(12) NOT NULL default '0',
  battle_challenger_id int(8) NOT NULL default '0',
  battle_challenger_att int(8) NOT NULL default '0',
  battle_challenger_def int(8) NOT NULL default '0',
  battle_challenger_hp int(8) NOT NULL default '0',
  battle_challenger_mp int(8) NOT NULL default '0',
  battle_challenger_hp_max int(8) NOT NULL default '0',
  battle_challenger_mp_max int(8) NOT NULL default '0',
  battle_challenger_hp_regen int(8) NOT NULL default '0',
  battle_challenger_mp_regen int(8) NOT NULL default '0',
  battle_challenger_dmg int(8) NOT NULL default '0',
  battle_challenger_magic_attack int(8) NOT NULL default '0',
  battle_challenger_magic_resistance int(8) NOT NULL default '0',
  battle_challenger_element int(3) NOT NULL default '0',
  battle_opponent_id int(8) NOT NULL default '0',
  battle_opponent_att int(8) NOT NULL default '0',
  battle_opponent_def int(8) NOT NULL default '0',
  battle_opponent_hp int(8) NOT NULL default '0',
  battle_opponent_mp int(8) NOT NULL default '0',
  battle_opponent_hp_max int(8) NOT NULL default '0',
  battle_opponent_mp_max int(8) NOT NULL default '0',
  battle_opponent_hp_regen int(8) NOT NULL default '0',
  battle_opponent_mp_regen int(8) NOT NULL default '0',
  battle_opponent_dmg int(8) NOT NULL default '0',
  battle_opponent_magic_attack int(8) NOT NULL default '0',
  battle_opponent_magic_resistance int(8) NOT NULL default '0',
  battle_opponent_element int(3) NOT NULL default '0',
  PRIMARY KEY  (battle_id)
) ;

CREATE TABLE phpbb_adr_characters (
  character_id int(8) NOT NULL default '0',
  character_name varchar(255) NOT NULL default '',
  character_desc text NOT NULL,
  character_race int(8) NOT NULL default '0',
  character_class int(8) NOT NULL default '0',
  character_alignment int(8) NOT NULL default '0',
  character_element int(8) NOT NULL default '0',
  character_hp int(8) NOT NULL default '0',
  character_hp_max int(8) NOT NULL default '0',
  character_mp int(8) NOT NULL default '0',
  character_mp_max int(8) NOT NULL default '0',
  character_ac int(8) NOT NULL default '0',
  character_xp int(11) NOT NULL default '0',
  character_level int(8) NOT NULL default '1',
  character_might int(8) NOT NULL default '0',
  character_dexterity int(8) NOT NULL default '0',
  character_constitution int(8) NOT NULL default '0',
  character_intelligence int(8) NOT NULL default '0',
  character_wisdom int(8) NOT NULL default '0',
  character_charisma int(8) NOT NULL default '0',
  character_birth int(12) NOT NULL default '1093694853',
  character_limit_update int(8) NOT NULL default '1',
  character_battle_limit int(3) NOT NULL default '20',
  character_skill_limit int(3) NOT NULL default '30',
  character_trading_limit int(3) NOT NULL default '30',
  character_thief_limit int(3) NOT NULL default '10',
  character_sp int(12) NOT NULL default '0',
  character_magic_attack int(8) NOT NULL default '10',
  character_magic_resistance int(8) NOT NULL default '10',
  character_warehouse tinyint(1) NOT NULL default '0',
  character_warehouse_update int(8) NOT NULL default '0',
  character_shop_update int(8) NOT NULL default '0',
  character_skill_mining int(8) UNSIGNED NOT NULL default '0',
  character_skill_stone int(8) UNSIGNED NOT NULL default '0',
  character_skill_forge int(8) UNSIGNED NOT NULL default '0',
  character_skill_enchantment int(8) UNSIGNED NOT NULL default '0',
  character_skill_trading int(8) UNSIGNED NOT NULL default '0',
  character_skill_thief int(8) UNSIGNED NOT NULL default '0',
  character_skill_mining_uses int(8) UNSIGNED NOT NULL default '0',
  character_skill_stone_uses int(8) UNSIGNED NOT NULL default '0',
  character_skill_forge_uses int(8) UNSIGNED NOT NULL default '0',
  character_skill_enchantment_uses int(8) UNSIGNED NOT NULL default '0',
  character_skill_trading_uses int(8) UNSIGNED NOT NULL default '0',
  character_skill_thief_uses int(8) UNSIGNED NOT NULL default '0',
  character_victories int(8) NOT NULL default '0',
  character_defeats int(8) NOT NULL default '0',
  character_flees int(8) NOT NULL default '0',
  prefs_pvp_notif_pm tinyint(1) NOT NULL default '1',
  prefs_pvp_allow tinyint(1) NOT NULL default '1',
  prefs_tax_pm_notify TINYINT(1) NOT NULL default '1',
  equip_armor int(8) NOT NULL default '0',
  equip_buckler int(8) NOT NULL default '0',
  equip_helm int(8) NOT NULL default '0',
  equip_gloves int(8) NOT NULL default '0',
  equip_amulet int(8) NOT NULL default '0',
  equip_ring int(8) NOT NULL default '0',
  character_pref_give_pm int(1) NOT NULL default '1',
  character_pref_seller_pm int(1) NOT NULL default '1', 
  character_double_ko int(8) NOT NULL default '0',
  character_victories_pvp int(8) NOT NULL default '0',
  character_defeats_pvp int(8) NOT NULL default '0',
  character_flees_pvp int(8) NOT NULL default '0',
  character_fp int(12) NOT NULL default '0',
  PRIMARY KEY  (character_id)
) ;

CREATE TABLE phpbb_adr_classes (
  class_id smallint(8) NOT NULL default '0',
  class_name varchar(255) NOT NULL default '',
  class_desc text NOT NULL,
  class_level tinyint(1) NOT NULL default '0',
  class_img varchar(255) NOT NULL default '',
  class_might_req int(8) NOT NULL default '0',
  class_dexterity_req int(8) NOT NULL default '0',
  class_constitution_req int(8) NOT NULL default '0',
  class_intelligence_req int(8) NOT NULL default '0',
  class_wisdom_req int(8) NOT NULL default '0',
  class_charisma_req int(8) NOT NULL default '0',
  class_base_hp int(8) NOT NULL default '0',
  class_base_mp int(8) NOT NULL default '0',
  class_base_ac int(8) NOT NULL default '0',
  class_update_hp int(8) NOT NULL default '0',
  class_update_mp int(8) NOT NULL default '0',
  class_update_ac int(8) NOT NULL default '0',
  class_update_xp_req int(8) NOT NULL default '0',
  class_update_of int(8) NOT NULL default '0',
  class_update_of_req int(8) NOT NULL default '0',
  class_selectable int(8) NOT NULL default '0',
  class_magic_attack_req int(8) NOT NULL default '0',
  class_magic_resistance_req int(8) NOT NULL default '0',
  PRIMARY KEY  (class_id)
) ;

CREATE TABLE phpbb_adr_elements (
  element_id smallint(8) NOT NULL default '0',
  element_name varchar(255) NOT NULL default '',
  element_desc text NOT NULL,
  element_level tinyint(1) NOT NULL default '0',
  element_img varchar(255) NOT NULL default '',
  element_skill_mining_bonus int(8) NOT NULL default '0',
  element_skill_stone_bonus int(8) NOT NULL default '0',
  element_skill_forge_bonus int(8) NOT NULL default '0',
  element_skill_enchantment_bonus int(8) NOT NULL default '0',
  element_skill_trading_bonus int(8) NOT NULL default '0',
  element_skill_thief_bonus int(8) NOT NULL default '0',
  element_oppose_strong int(3) NOT NULL default '0',
  element_oppose_strong_dmg int(3) NOT NULL default '100',
  element_oppose_same_dmg int(3) NOT NULL default '100',
  element_oppose_weak int(3) NOT NULL default '0',
  element_oppose_weak_dmg int(3) NOT NULL default '100',
  element_colour varchar(255) NOT NULL default '',
  PRIMARY KEY  (element_id)
) ;

CREATE TABLE phpbb_adr_general (
  config_name varchar(255) NOT NULL default '0',
  config_value int(15) NOT NULL default '0',
  PRIMARY KEY  (config_name)
) ;

CREATE TABLE phpbb_adr_races (
  race_id smallint(8) NOT NULL default '0',
  race_name varchar(255) NOT NULL default '',
  race_desc text NOT NULL,
  race_level tinyint(1) NOT NULL default '0',
  race_img varchar(255) NOT NULL default '',
  race_might_bonus int(8) NOT NULL default '0',
  race_dexterity_bonus int(8) NOT NULL default '0',
  race_constitution_bonus int(8) NOT NULL default '0',
  race_intelligence_bonus int(8) NOT NULL default '0',
  race_wisdom_bonus int(8) NOT NULL default '0',
  race_charisma_bonus int(8) NOT NULL default '0',
  race_skill_mining_bonus int(8) NOT NULL default '0',
  race_skill_stone_bonus int(8) NOT NULL default '0',
  race_skill_forge_bonus int(8) NOT NULL default '0',
  race_skill_enchantment_bonus int(8) NOT NULL default '0',
  race_skill_trading_bonus int(8) NOT NULL default '0',
  race_skill_thief_bonus int(8) NOT NULL default '0',
  race_might_malus int(8) NOT NULL default '0',
  race_dexterity_malus int(8) NOT NULL default '0',
  race_constitution_malus int(8) NOT NULL default '0',
  race_intelligence_malus int(8) NOT NULL default '0',
  race_wisdom_malus int(8) NOT NULL default '0',
  race_charisma_malus int(8) NOT NULL default '0',
  race_weight int(12) NOT NULL default '1000',
  race_weight_per_level int(3) NOT NULL default '5',
  race_magic_attack_bonus int(8) NOT NULL default '0',
  race_magic_resistance_bonus int(8) NOT NULL default '0',
  race_magic_attack_malus int(8) NOT NULL default '0',
  race_magic_resistance_malus int(8) NOT NULL default '0',
  PRIMARY KEY  (race_id)
) ;

CREATE TABLE phpbb_adr_shops (
  shop_id int(8) NOT NULL default '0',
  shop_owner_id int(8) NOT NULL default '0',
  shop_name varchar(255) NOT NULL default '',
  shop_desc varchar(255) NOT NULL default '',
  shop_last_updated int(12) NOT NULL default '0',
  PRIMARY KEY  (shop_id)
) ;


CREATE TABLE phpbb_adr_stores (
  store_id int(8) NOT NULL auto_increment,
  store_name varchar(100) NOT NULL default '',
  store_desc varchar(255) NOT NULL default '',
  store_img varchar(255) NOT NULL default '',
  store_status tinyint(1) NOT NULL default '1',
  store_sales_status tinyint(1) NOT NULL default '0',
  store_admin tinyint(1) NOT NULL default '0',
  store_owner_id int(1) NOT NULL default '1',
  KEY store_id (store_id)
) ;

CREATE TABLE phpbb_adr_stores_stats(
  store_stats_character_id int(12) NOT NULL default '0',
  store_stats_store_id int(12) NOT NULL default '0',
  store_stats_buy_total int(12) NOT NULL default '0',
  store_stats_buy_last int(12) NOT NULL default '0',
  store_stats_sold_total int(12) NOT NULL default '0',
  store_stats_sold_last int(12) NOT NULL default '0',
  store_stats_stolen_item_total int(12) NOT NULL default '0',
  store_stats_stolen_item_fail_total int(12) NOT NULL default '0',
  store_stats_stolen_item_last int(12) NOT NULL default '0',
  store_stats_stolen_points_total int(12) NOT NULL default '0',
  store_stats_stolen_points_last int(12) NOT NULL default '0',
  PRIMARY KEY  (store_stats_character_id, store_stats_store_id)
) ;

CREATE TABLE phpbb_adr_stores_user_history(
  user_store_trans_id int(12) NOT NULL default '0',
  user_store_owner_id int(8) NOT NULL default '0',
  user_store_info TEXT NOT NULL default '',
  user_store_total_price int(12) NOT NULL default '0',
  user_store_date int(12) NOT NULL default '0',
  user_store_buyer TEXT NOT NULL default '',
  PRIMARY KEY(user_store_trans_id, user_store_owner_id)
) ;

CREATE TABLE phpbb_adr_shops_items (
  item_id int(8) NOT NULL auto_increment,
  item_owner_id int(8) NOT NULL default '0',
  item_price int(8) NOT NULL default '0',
  item_quality int(8) NOT NULL default '0',
  item_power int(8) NOT NULL default '0',
  item_duration int(8) NOT NULL default '0',
  item_duration_max int(8) NOT NULL default '1',
  item_icon varchar(255) NOT NULL default '',
  item_name varchar(255) NOT NULL default '',
  item_desc varchar(255) NOT NULL default '',
  item_type_use int(8) NOT NULL default '16',
  item_in_shop tinyint(1) NOT NULL default '0',
  item_store_id int(8) NOT NULL default '1',
  item_weight int(12) NOT NULL default '25',
  item_auth int(1) NOT NULL default '0',
  item_max_skill int(8) NOT NULL default '25',
  item_add_power int(8) NOT NULL default '0',
  item_mp_use int(8) NOT NULL default '0',
  item_monster_thief tinyint(1) NOT NULL default '0',
  item_element int(4) NOT NULL default '0',
  item_element_str_dmg int(4) NOT NULL default '100',
  item_element_same_dmg int(4) NOT NULL default '100',
  item_element_weak_dmg int(4) NOT NULL default '100',
  item_in_warehouse tinyint(1) NOT NULL default '0',
  item_sell_back_percentage int(3) NOT NULL default '50',
  item_stolen_id int(12) NOT NULL default '0',
  item_steal_dc smallint(3) NOT NULL default '0',
  item_bought_timestamp int(12) NOT NULL default '0',
  item_restrict_align_enable tinyint(1) NOT NULL default '0',
  item_restrict_align varchar(255) NOT NULL default '0',
  item_restrict_class_enable tinyint(1) NOT NULL default '0',
  item_restrict_class varchar(255) NOT NULL default '0',
  item_restrict_element_enable tinyint(1) NOT NULL default '0',
  item_restrict_element varchar(255) NOT NULL default '0',
  item_restrict_race_enable tinyint(1) NOT NULL default '0',
  item_restrict_race varchar(255) NOT NULL default '0',
  item_restrict_level int(8) NOT NULL default '0',
  item_restrict_str int(8) NOT NULL default '0',
  item_restrict_dex int(8) NOT NULL default '0',
  item_restrict_int int(8) NOT NULL default '0',
  item_restrict_wis int(8) NOT NULL default '0',
  item_restrict_cha int(8) NOT NULL default '0',
  item_restrict_con int(8) NOT NULL default '0',
  item_crit_hit smallint(3) NOT NULL default '20',
  item_crit_hit_mod smallint(3) NOT NULL default '2',
  item_stolen_timestamp int(12) NOT NULL default '0',
  item_stolen_by varchar(255) NOT NULL default '',
  item_donated_timestamp int(12) NOT NULL default '0',
  item_donated_by varchar(255) NOT NULL default '',
  KEY item_id (item_id),
  KEY item_owner_id (item_owner_id)
) ;

CREATE TABLE phpbb_adr_shops_items_quality (
  item_quality_id int(8) NOT NULL default '0',
  item_quality_modifier_price int(8) NOT NULL default '0',
  item_quality_lang varchar(255) NOT NULL default '',
  PRIMARY KEY  (item_quality_id)
) ;

CREATE TABLE phpbb_adr_shops_items_type (
  item_type_id int(8) NOT NULL default '0',
  item_type_base_price int(8) NOT NULL default '0',
  item_type_lang varchar(255) NOT NULL default '',
  PRIMARY KEY  (item_type_id)
) ;

CREATE TABLE phpbb_adr_skills (
  skill_id tinyint(1) NOT NULL default '0',
  skill_name varchar(255) NOT NULL default '',
  skill_desc text NOT NULL,
  skill_img varchar(255) NOT NULL default '',
  skill_req int(8) NOT NULL default '0',
  skill_chance mediumint(3) NOT NULL default '5',
  PRIMARY KEY  (skill_id)
) ;

CREATE TABLE phpbb_adr_vault_blacklist (
  user_id int(8) NOT NULL default '0',
  user_due int(8) NOT NULL default '0',
  PRIMARY KEY  (user_id)
) ;

CREATE TABLE phpbb_adr_vault_exchange (
  stock_id int(8) NOT NULL default '0',
  stock_name varchar(40) NOT NULL default '',
  stock_desc varchar(255) NOT NULL default '',
  stock_price int(8) NOT NULL default '0',
  stock_previous_price int(8) NOT NULL default '0',
  stock_best_price int(8) NOT NULL default '0',
  stock_worst_price int(8) NOT NULL default '0',
  PRIMARY KEY  (stock_id)
) ;

CREATE TABLE phpbb_adr_vault_exchange_users (
  stock_id mediumint(8) NOT NULL default '0',
  user_id mediumint(8) NOT NULL default '0',
  stock_amount mediumint(8) NOT NULL default '0',
  KEY stock_id (stock_id),
  KEY user_id (user_id)
) ;

CREATE TABLE phpbb_adr_vault_users (
  owner_id int(8) NOT NULL default '0',
  account_id int(8) NOT NULL default '0',
  account_sum int(8) NOT NULL default '0',
  account_time int(11) NOT NULL default '0',
  loan_sum int(8) NOT NULL default '0',
  loan_time int(11) NOT NULL default '0',
  account_protect tinyint(1) NOT NULL default '0',
  loan_protect tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (owner_id)
) ;

CREATE TABLE phpbb_adr_jail_users (
  celled_id int(8) NOT NULL default '0',
  user_id int(8) NOT NULL default '0',
  user_cell_date int(11) NOT NULL default '0',
  user_freed_by int(8) NOT NULL default '0',
  user_sentence text,
  user_caution int(8) NOT NULL default '0',
  user_time int(11) NOT NULL default '0',
  PRIMARY KEY  (celled_id)
) ;

CREATE TABLE phpbb_adr_jail_votes (
  vote_id mediumint(8) NOT NULL default '0',
  voter_id mediumint(8) NOT NULL default '0',
  vote_result mediumint(8) NOT NULL default '0',
  KEY vote_id (vote_id),
  KEY voter_id (voter_id)
) ;

CREATE TABLE phpbb_adr_create_exploit_fix (
  user_id int(10) NOT NULL default '0',
  power int(8) NOT NULL default '0',
  agility int(8) NOT NULL default '0',
  endurance int(8) NOT NULL default '0',
  intelligence int(8) NOT NULL default '0',
  willpower int(8) NOT NULL default '0',
  charm int(8) NOT NULL default '0',
  magic_attack int(8) NOT NULL default '0',
  magic_resistance int(8) NOT NULL default '0',
  PRIMARY KEY  (user_id)
) ;

CREATE TABLE phpbb_adr_battle_community(
  chat_id int(10) NOT NULL auto_increment,
  chat_posts int(10) NOT NULL default '0',
  chat_text text,
  chat_date date default NULL,
  PRIMARY KEY (chat_id)
) ;

CREATE TABLE phpbb_adr_bug_fix(
  fix_id varchar(255) NOT NULL default '',
  fix_install_date int(12) NOT NULL default '0',
  fix_installed_by varchar(255) NOT NULL default '',
  PRIMARY KEY(fix_id)
) ;

#
# -- Points
#

CREATE TABLE phpbb_cash (
  cash_id smallint(6) NOT NULL auto_increment,
  cash_order smallint(6) NOT NULL default '0',
  cash_settings smallint(4) NOT NULL default '3313',
  cash_dbfield varchar(64) NOT NULL default '',
  cash_name varchar(64) NOT NULL default 'GP',
  cash_default int(11) NOT NULL default '0',
  cash_decimals tinyint(2) NOT NULL default '0',
  cash_imageurl varchar(255) NOT NULL default '',
  cash_exchange int(11) NOT NULL default '1',
  cash_perpost int(11) NOT NULL default '25',
  cash_postbonus int(11) NOT NULL default '2',
  cash_perreply int(11) NOT NULL default '25',
  cash_maxearn int(11) NOT NULL default '75',
  cash_perpm int(11) NOT NULL default '0',
  cash_perchar int(11) NOT NULL default '20',
  cash_allowance tinyint(1) NOT NULL default '0',
  cash_allowanceamount int(11) NOT NULL default '0',
  cash_allowancetime tinyint(2) NOT NULL default '2',
  cash_allowancenext int(11) NOT NULL default '0',
  cash_forumlist varchar(255) NOT NULL default '',
  PRIMARY KEY  (cash_id)
);
 
CREATE TABLE phpbb_cash_events (
  event_name varchar(32) NOT NULL default '',
  event_data varchar(255) NOT NULL default '',
  PRIMARY KEY  (event_name)
);
 
CREATE TABLE phpbb_cash_exchange (
  ex_cash_id1 int(11) NOT NULL default '0',
  ex_cash_id2 int(11) NOT NULL default '0',
  ex_cash_enabled int(1) NOT NULL default '0',
  PRIMARY KEY  (ex_cash_id1,ex_cash_id2)
);

CREATE TABLE phpbb_cash_groups (
  group_id mediumint(6) NOT NULL default '0',
  group_type tinyint(2) NOT NULL default '0',
  cash_id smallint(6) NOT NULL default '0',
  cash_perpost int(11) NOT NULL default '0',
  cash_postbonus int(11) NOT NULL default '0',
  cash_perreply int(11) NOT NULL default '0',
  cash_perchar int(11) NOT NULL default '0',
  cash_maxearn int(11) NOT NULL default '0',
  cash_perpm int(11) NOT NULL default '0',
  cash_allowance tinyint(1) NOT NULL default '0',
  cash_allowanceamount int(11) NOT NULL default '0',
  cash_allowancetime tinyint(2) NOT NULL default '2',
  cash_allowancenext int(11) NOT NULL default '0',
  PRIMARY KEY  (group_id,group_type,cash_id)
);

CREATE TABLE phpbb_cash_log (
  log_id int(11) NOT NULL auto_increment,
  log_time int(11) NOT NULL default '0',
  log_type smallint(6) NOT NULL default '0',
  log_action varchar(255) NOT NULL default '',
  log_text varchar(255) NOT NULL default '',
  PRIMARY KEY  (log_id)
);

CREATE TABLE `phpbb_captcha_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ;

# -- Mod Today Userlist
CREATE TABLE phpbb_guests_visit (
  guest_time INT( 11 ) NOT NULL DEFAULT '0',
  guest_visit INT( 11 ) NOT NULL DEFAULT '0',
  PRIMARY KEY  ( guest_time )
);

# -- Mod favoris
CREATE TABLE `phpbb_arcade_fav` (
  `order_fav` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `game_id` mediumint(8) NOT NULL default '0'
) ;
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) VALUES ('use_fav_category', '1');
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) VALUES ('nbr_games_fav', '-1');
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) VALUES ('use_hide_fav', '1');
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) VALUES ('fav_nbr_in_page', '10');

# -- Mod minichat
CREATE TABLE phpbb_shoutbox (
	id int(11) NOT NULL auto_increment,
	sb_user_id int(11) NOT NULL default '0',
	msg varchar(255) NOT NULL default '',
	timestamp int(10) unsigned NOT NULL default '0',
	sb_username varchar(255) NOT NULL default '',
	shout_bbcode_uid varchar(10) NOT NULL default '',
	enable_bbcode tinyint(1) NOT NULL default '0',
	enable_html tinyint(1) NOT NULL default '0',
	enable_smilies tinyint(1) NOT NULL default '0',
	shout_ip varchar(8) NOT NULL default '',
	shout_group_id mediumint(8) NOT NULL default '0',
	PRIMARY KEY (id)
);


# -- Mod pendu
CREATE TABLE phpbb_hangman_configs ( 
     config_name varchar(20) NOT NULL default '',
     config_value varchar(255) NOT NULL default '' ) ;

CREATE TABLE phpbb_hangman_quess ( userid mediumint(8) NOT NULL default '0',
     hangmanid mediumint(8) NOT NULL default '0',
     tries tinyint(2) default NULL, losttime int(11) default NULL,
     quesscount int(4) NOT NULL default '1' ) ;

CREATE TABLE phpbb_hangman_score ( 
     userid mediumint(8) NOT NULL default '0',
     created mediumint(8) NOT NULL default '0',
     won mediumint(8) NOT NULL default '0',
     lost mediumint(8) NOT NULL default '0',
     points mediumint(8) NOT NULL default '0',
     r_letters mediumint(8) NOT NULL default '0',
     w_letters mediumint(8) NOT NULL default '0' ) ;

CREATE TABLE phpbb_hangman_words ( 
     hangmanid mediumint(8) NOT NULL auto_increment,
     userid mediumint(8) NOT NULL default '0',
     hangman_word text, hangman_help text,
     hangman_subject varchar(70) NOT NULL default '',
     max_tries tinyint(2) default NULL,
     time_created int(11) NOT NULL default '0',
     time_limit int(11) NOT NULL default '0',
     bwon tinyint(1) NOT NULL default '0',
     quessed_letters varchar(35) default NULL,
     bbcodeid varchar(10) NOT NULL default '',
     winner mediumint(8) default '0',
 PRIMARY KEY (hangmanid) ) ;
INSERT INTO `phpbb_hangman_words` VALUES (1, 2, 'BIENVENUE_DANS_LE_FORUM_ARKAMOD_DE_EZCOM', '', 'Jeu du pendu', 3, 1222593121, 1222852321, 0, NULL, '1bb990af93', 0);


# 
#-----[ lottery ]------------------------------------------ 
#

CREATE TABLE `phpbb_lottery`
	(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		`user_id` INT (10) NOT NULL,
		PRIMARY KEY(`id`),
		INDEX(`user_id`)
	);
CREATE TABLE `phpbb_lottery_history`
	(
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
		`user_id` INT (10) NOT NULL, 
		`amount` INT (10) NOT NULL, 
		`currency` CHAR (32) NOT NULL, 
		`time` INT (10) NOT NULL,
		PRIMARY KEY(`id`),
		INDEX(`user_id`)
	);

# 
#-----[ rabbitoshi ]------------------------------------------ 
#

CREATE TABLE `phpbb_rabbitoshi_config` (
  `creature_id` smallint(2) NOT NULL default '0',
  `creature_name` varchar(255) NOT NULL default '',
  `creature_prize` int(8) NOT NULL default '0',
  `creature_power` int(8) NOT NULL default '0',
  `creature_magicpower` int(8) NOT NULL default '0',
  `creature_armor` int(8) NOT NULL default '0',
  `creature_max_hunger` int(8) NOT NULL default '0',
  `creature_max_thirst` int(8) NOT NULL default '0',
  `creature_max_health` int(8) NOT NULL default '0',
  `creature_mp_max` int(8) NOT NULL default '0',
  `creature_max_hygiene` int(8) NOT NULL default '0',
  `creature_food_id` smallint(2) NOT NULL default '0',
  `creature_buyable` tinyint(1) NOT NULL default '1',
  `creature_evolution_of` int(8) NOT NULL default '0',
  `creature_img` varchar(255) NOT NULL default '',
  `creature_experience_max` int(8) NOT NULL default '100',
  `creature_max_attack` int(8) NOT NULL default '1',
  `creature_max_magicattack` int(8) NOT NULL default '1',
  PRIMARY KEY  (`creature_id`)
);
 

INSERT INTO `phpbb_rabbitoshi_config` VALUES (1, 'Rabbit', 300, 2, 3, 5, 20, 20, 30, 10, 15, 5, 1, 0, 'Rabbit.gif', 500, 1, 1);

CREATE TABLE `phpbb_rabbitoshi_general` (
  `config_name` varchar(255) NOT NULL default '0',
  `config_value` int(15) NOT NULL default '0',
  PRIMARY KEY  (`config_name`)
);


INSERT INTO `phpbb_rabbitoshi_general` VALUES ('thirst_time', 600);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('thirst_value', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hunger_time', 600);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hunger_value', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hygiene_time', 3600);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hygiene_value', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_time', 86400);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_value', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('rebirth_enable', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('rebirth_price', 100);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('vet_enable', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('vet_price', 300);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hotel_enable', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hotel_cost', 500);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('evolution_enable', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('evolution_cost', 100);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('evolution_time', 25);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('exp_lose', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_price', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hunger_price', 20);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('thirst_price', 20);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hygiene_price', 20);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('level_price', 500);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('power_price', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magicpower_price', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('armor_price', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('attack_price', 100);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magicattack_price', 100);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mp_price', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_raise', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hunger_raise', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('thirst_raise', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hygiene_raise', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('power_raise', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magicpower_raise', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('armor_raise', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('attack_raise', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magicattack_raise', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mp_raise', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('level_raise', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('experience_min', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('experience_max', 20);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mp_min', 3);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mp_max', 10);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('attack_reload', 10);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magic_reload', 15);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('regeneration_level', 7);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('regeneration_magicpower', 10);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('regeneration_mp', 25);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('regeneration_mp_need', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('regeneration_hp_give', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('regeneration_price', 1000);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_transfert_level', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_transfert_magicpower', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_transfert_health', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_transfert_percent', 25);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_transfert_price', 700);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mana_transfert_level', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mana_transfert_magicpower', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mana_transfert_mp', 40);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mana_transfert_percent', 50);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mana_transfert_price', 700);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('sacrifice_level', 7);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('sacrifice_power', 10);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('sacrifice_armor', 7);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('sacrifice_mp', 20);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('sacrifice_price', 1000);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('health_levelup', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hunger_levelup', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('thirst_levelup', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('hygiene_levelup', 5);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('power_levelup', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magicpower_levelup', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('armor_levelup', 2);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('mp_levelup', 3);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('attack_levelup', 1);
INSERT INTO `phpbb_rabbitoshi_general` VALUES ('magicattack_levelup', 1);

CREATE TABLE `phpbb_rabbitoshi_shop` (
  `item_id` smallint(1) NOT NULL default '0',
  `item_name` varchar(255) NOT NULL default '',
  `item_prize` int(8) NOT NULL default '0',
  `item_desc` varchar(255) NOT NULL default '',
  `item_type` smallint(1) NOT NULL default '0',
  `item_power` int(8) NOT NULL default '0',
  `item_img` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`item_id`)
);


INSERT INTO `phpbb_rabbitoshi_shop` VALUES (1, 'Water', 25, 'The thirst quenching liquid resource.', 2, 4, 'Water.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (2, 'Cleaner', 50, 'Used to clean and bathe your pets.', 3, 10, 'Cleaner.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (3, 'Seeds', 10, 'Small healthy seeds good for smaller animals.', 1, 1, 'Seeds.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (4, 'Corn', 20, 'The favorite food of household animals.', 1, 20, 'Corn.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (5, 'Apples', 30, 'Sweet juicy fruits good enough for animals of all sizes.', 1, 3, 'Apples.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (6, 'Orange', 30, 'Citrus fruit for animals who perfer sweets.', 1, 10, 'Orange.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (7, 'Meat', 50, 'For the carnivorous eaters of the kingdom.', 1, 3, 'Meat.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (8, 'Fish', 55, 'Some creatures prefer the salty oil fishes of the sea.', 1, 3, 'Fish.gif');
INSERT INTO `phpbb_rabbitoshi_shop` VALUES (9, 'Diamonds', 500, 'Mythical creatures love eating jewels.', 1, 10, 'Diamonds.gif');

CREATE TABLE `phpbb_rabbitoshi_shop_users` (
  `item_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `item_amount` mediumint(8) NOT NULL default '0',
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
);

CREATE TABLE `phpbb_rabbitoshi_users` (
  `owner_id` int(8) NOT NULL default '0',
  `owner_last_visit` int(11) NOT NULL default '0',
  `owner_creature_id` smallint(2) NOT NULL default '0',
  `owner_creature_name` varchar(255) NOT NULL default '',
  `creature_level` int(8) NOT NULL default '1',
  `creature_power` int(8) NOT NULL default '0',
  `creature_magicpower` int(8) NOT NULL default '0',
  `creature_armor` int(8) NOT NULL default '0',
  `creature_experience` int(8) NOT NULL default '0',
  `creature_hunger` int(8) NOT NULL default '0',
  `creature_hunger_max` int(8) NOT NULL default '0',
  `creature_thirst` int(8) NOT NULL default '0',
  `creature_thirst_max` int(8) NOT NULL default '0',
  `creature_health` int(8) NOT NULL default '0',
  `creature_health_max` int(8) NOT NULL default '0',
  `creature_mp` int(8) NOT NULL default '0',
  `creature_max_mp` int(8) NOT NULL default '0',
  `creature_hygiene` int(8) NOT NULL default '0',
  `creature_hygiene_max` int(8) NOT NULL default '0',
  `creature_attack` int(8) NOT NULL default '1',
  `creature_attack_max` int(8) NOT NULL default '1',
  `creature_magicattack` int(8) NOT NULL default '1',
  `creature_magicattack_max` int(8) NOT NULL default '1',
  `creature_age` int(11) NOT NULL default '0',
  `creature_hotel` int(11) NOT NULL default '0',
  `owner_notification` tinyint(1) NOT NULL default '0',
  `owner_hide` tinyint(1) NOT NULL default '0',
  `owner_feed_full` tinyint(1) NOT NULL default '1',
  `owner_drink_full` tinyint(1) NOT NULL default '1',
  `owner_clean_full` tinyint(1) NOT NULL default '1',
  `creature_statut` int(8) NOT NULL default '0',
  `creature_avatar` varchar(255) NOT NULL default 'default_avatar.gif',
  `creature_invoc` int(8) NOT NULL default '0',
  `creature_experience_level` int(8) NOT NULL default '0',
  `creature_experience_level_limit` int(8) NOT NULL default '0',
  `creature_ability` int(8) NOT NULL default '0',
  PRIMARY KEY  (`owner_id`)
);
        
      
