
{SHOUTBOX_BODY}

<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="bottom"><span class="gensmall">
	<!-- BEGIN switch_user_logged_in -->
	{LAST_VISIT_DATE}<br />
	<!-- END switch_user_logged_in -->
	{CURRENT_TIME}<br /></span><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
	<td align="right" valign="bottom" class="gensmall">
		<!-- BEGIN switch_user_logged_in -->
		<a href="{U_SEARCH_NEW}" class="gensmall">{L_SEARCH_NEW}</a><br /><a href="{U_SEARCH_SELF}" class="gensmall">{L_SEARCH_SELF}</a><br />
		<!-- END switch_user_logged_in -->
		<a href="{U_SEARCH_UNANSWERED}" class="gensmall">{L_SEARCH_UNANSWERED}</a></td>
  </tr>
</table>
<!-- BEGIN catrow -->
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
  <tr> 
	<th width="100%"colspan="3" class="thCornerL" height="25" nowrap="nowrap">&nbsp;{catrow.CAT_DESC}&nbsp;</th>
	<th width="50" class="thTop" nowrap="nowrap">&nbsp;{L_TOPICS}&nbsp;</th>
	<th width="50" class="thTop" nowrap="nowrap">&nbsp;{L_POSTS}&nbsp;</th>
	<th width="200"class="thCornerR" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
  </tr>
  <tr> 
	<td class="catLeft" colspan="3" height="28"><span class="cattitle"><a href="{catrow.U_VIEWCAT}" class="cattitle">{catrow.CAT_DESC}</a></span></td>
	<td class="rowpic" colspan="3" align="right">&nbsp;</td>
  </tr>
  <!-- BEGIN forumrow -->
  <tr> 
<td class="row1" align="center" valign="middle" height="50"><img src="{catrow.forumrow.FORUM_FOLDER_IMG}" width="46" height="25" alt="{catrow.forumrow.L_FORUM_FOLDER_ALT}" title="{catrow.forumrow.L_FORUM_FOLDER_ALT}" /></td>
<td class="row1" align="center" valign="middle" height="50">{catrow.forumrow.FORUM_ICON_IMG}</td>
<td class="row1" width="100%" height="50"><span class="forumlink"> <a href="{catrow.forumrow.U_VIEWFORUM}" class="forumlink" {catrow.forumrow.FORUM_TARGET}>{catrow.forumrow.FORUM_NAME}</a><br />
     </span> <span class="genmed">{catrow.forumrow.FORUM_DESC} </span>
<!-- BEGIN row -->
    <br /><span class="gensmall">{catrow.forumrow.L_MODERATOR} {catrow.forumrow.MODERATORS}</span>
<!-- END row -->
     <!-- BEGIN switch_attached_forums -->
	  <!-- BEGIN br -->
	  <br />
	  <!-- END br -->
	  <span class="genmed">{catrow.forumrow.switch_attached_forums.L_ATTACHED_FORUMS}:
	       <!-- BEGIN attached_forums -->
	                   <a class="nav" href="{catrow.forumrow.switch_attached_forums.attached_forums.U_VIEWFORUM}" {catrow.forumrow.switch_attached_forums.attached_forums.FORUM_TARGET}><img alt="{catrow.forumrow.switch_attached_forums.attached_forums.L_FORUM_IMAGE}" border="0" src="{catrow.forumrow.switch_attached_forums.attached_forums.FORUM_IMAGE}" title="{catrow.forumrow.switch_attached_forums.attached_forums.L_FORUM_IMAGE}" />{catrow.forumrow.switch_attached_forums.attached_forums.FORUM_NAME}</a>
	       <!-- END attached_forums -->
	  <span class="genmed">
	  <!-- END switch_attached_forums -->
	</td>
<!-- BEGIN row -->
   <td class="row2" align="center" valign="middle" height="50"><span class="gensmall">{catrow.forumrow.TOPICS}</span></td>
   <td class="row2" align="center" valign="middle" height="50"><span class="gensmall">{catrow.forumrow.POSTS}</span></td>
   <td class="row2" align="center" valign="middle" height="50" nowrap="nowrap"> <span class="gensmall">{catrow.forumrow.LAST_POST}</span></td>
<!-- END row -->
<!-- BEGIN link -->
   <td class="row2" align="center" valign="middle" height="50" colspan="3"><span class="gensmall">{catrow.forumrow.FORUM_LINK_COUNT}</span></td>
<!-- END link -->
  </tr>
<!-- END row -->
  <!-- END forumrow -->
<br class="nav" /> 
  <!-- BEGIN arcaderow --> 
  <tr>
   <td class="row1" align="center" valign="middle" height="75">{catrow.arcaderow.FOLDER}</td> 
   <td class="row1" colspan="2" width="100%" height="50"><span class="forumlink"> <a href="{catrow.arcaderow.U_VIEWFORUM}" class="forumlink">{catrow.arcaderow.FORUM_NAME}</a><br /> 
     </span> <span class="genmed">{catrow.arcaderow.FORUM_DESC}</span><br /> 
     <span class="forumlink"> <a href="{catrow.arcaderow.U_TOPARCADE}" class="forumlink">{catrow.arcaderow.BEST_SCORES}</a> 
   </td> 
   <td class="row2" colspan="3" width="100%" height="50" align="center"> 
  <!-- BEGIN bestscore -->    
      <span class="gensmall"> 
        {catrow.arcaderow.bestscore.LAST_SCOREDATE}<br />{catrow.arcaderow.bestscore.LAST_SCOREUSER}<br />
      a réalisé un score de<br />{catrow.arcaderow.bestscore.LAST_SCORE} à {catrow.arcaderow.bestscore.LAST_SCOREGAME} 
     </span> 
  <!-- END bestscore -->        
   </td> 
  </tr>
  <!-- END arcaderow --> 
  <!-- END catrow -->
</table>
<br class="nav" /> 
<table width="100%" cellspacing="0" border="0" align="center" cellpadding="2">
  <tr> 
 	<td align="left">
 	<!-- BEGIN switch_user_logged_in -->
 		<span class="gensmall"><a href="{U_MARK_READ}" class="gensmall">{L_MARK_FORUMS_READ}</a></span>
 	<!-- END switch_user_logged_in -->
 	</td>
	<td align="right"><span class="gensmall">{S_TIMEZONE}</span></td>
  </tr>
</table>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
  <tr> 
	<td class="catHead" colspan="2" height="28"><span class="cattitle"><a href="{U_VIEWONLINE}" class="cattitle">{L_WHO_IS_ONLINE}</a></span></td>
  </tr>
  <tr> 
	<td class="row1" align="center" valign="middle" rowspan="4"><img src="templates/subSilver/images/whosonline.gif" alt="{L_WHO_IS_ONLINE}" /></td>
	<td class="row1" align="left" width="100%"><span class="gensmall">{TOTAL_POSTS}<br />{TOTAL_USERS}<br />{NEWEST_USER}</span>
	</td>
  </tr>
  <tr>
	<td class="row1" align="left"><span class="gensmall">{TOTAL_USERS_ONLINE}<br />{RECORD_USERS}<br />{LOGGED_IN_USER_LIST}</span></td>
  </tr>
{ONLINELIST_BOX}
  <tr>
  	<td class="row1"><span class="gensmall">
  		<strong>{L_LEGEND}:</strong>
  		<!-- BEGIN legend -->
  		[&nbsp;<a href="{legend.U_RANK}"{legend.RANK_STYLE}>{legend.RANK_NAME}</a>&nbsp;]
  		<!-- END legend -->
  	</span></td>
  </tr>
</table>

<table width="100%" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td align="left" valign="top"><span class="gensmall">{L_ONLINE_EXPLAIN}</span></td>
</tr>
</table>
{BIRTHDAYS_BOX}
<!-- BEGIN switch_user_logged_out -->
<form method="post" action="{S_LOGIN_ACTION}">
  <table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
	<tr> 
	  <td class="catHead" height="28"><a name="login"></a><span class="cattitle">{L_LOGIN_LOGOUT}</span></td>
	</tr>
	<tr> 
	  <td class="row1" align="center" valign="middle" height="28"><span class="gensmall">{L_USERNAME}: 
		<input class="post" type="text" name="username" size="10" />
		&nbsp;&nbsp;&nbsp;{L_PASSWORD}: 
		<input class="post" type="password" name="password" size="10" maxlength="32" />
		<!-- BEGIN switch_allow_autologin -->
		&nbsp;&nbsp; &nbsp;&nbsp;{L_AUTO_LOGIN} 
		<input class="text" type="checkbox" name="autologin" />
		<!-- END switch_allow_autologin -->
		&nbsp;&nbsp;&nbsp; 
		<input type="submit" class="mainoption" name="login" value="{L_LOGIN}" />
		</span> </td>
	</tr>
  </table>
</form>
<!-- END switch_user_logged_out -->

<br clear="all" />

<table cellspacing="3" border="0" align="center" cellpadding="0">
  <tr> 
	<td width="20" align="center"><img src="templates/subSilver/images/folder_new_big.gif" alt="{L_NEW_POSTS}"/></td>
	<td><span class="gensmall">{L_NEW_POSTS}</span></td>
	<td>&nbsp;&nbsp;</td>
	<td width="20" align="center"><img src="templates/subSilver/images/folder_big.gif" alt="{L_NO_NEW_POSTS}" /></td>
	<td><span class="gensmall">{L_NO_NEW_POSTS}</span></td>
	<td>&nbsp;&nbsp;</td>
	<td width="20" align="center"><img src="templates/subSilver/images/folder_locked_big.gif" alt="{L_FORUM_LOCKED}" /></td>
	<td><span class="gensmall">{L_FORUM_LOCKED}</span></td>
	<td>&nbsp;&nbsp;</td>
	<td width="20" align="center"><img src="{FORUM_LINK_IMG}" alt="" title="{L_FORUM_LINK}" /></td>
	<td><span class="gensmall">{L_FORUM_LINK}</span></td>
  </tr>
</table>
