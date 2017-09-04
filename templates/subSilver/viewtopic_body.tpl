
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="left" valign="bottom" colspan="2"><a class="maintitle" href="{U_VIEW_TOPIC}">{TOPIC_TITLE}</a><br />
	  <span class="gensmall"><b>{PAGINATION}</b><br />
	  &nbsp; </span></td>
  </tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="left" valign="bottom" nowrap="nowrap"><span class="nav"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" align="middle" /></a>&nbsp;&nbsp;&nbsp;<a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" alt="{L_POST_REPLY_TOPIC}" align="middle" /></a></span></td>
	<td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	 
	  	  <!-- BEGIN switch_parent_link -->
	 -> <a class="nav" href="{PARENT_URL}">{PARENT_NAME}</a>
	  	  <!-- END switch_parent_link -->
	 -> 
{FORUM_ICON_IMG}<a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
  </tr>
</table>

<table class="forumline" width="100%" cellspacing="1" cellpadding="3" border="0">
	<tr align="right">
		<td class="catHead" colspan="2" height="28"><span class="nav"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> :: <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a> &nbsp;</span></td>
	</tr>
	{POLL_DISPLAY} 
	<tr>
		<th class="thLeft" width="150" height="26" nowrap="nowrap">{L_AUTHOR}</th>
		<th class="thRight" nowrap="nowrap">{L_MESSAGE}</th>
	</tr>
	<!-- BEGIN postrow -->
	<tr> 
		<td width="150" align="left" valign="top" class="{postrow.ROW_CLASS}"><span class="name"><a name="{postrow.U_POST_ID}"></a><b>{postrow.POSTER_NAME}</b>{postrow.I_QP_QUOTE}</span><br /><span class="postdetails">{postrow.POSTER_RANK}<br />{postrow.RANK_IMAGE}{postrow.POSTER_AVATAR}<br />{postrow.POSTER_JOINED}<br />{postrow.POSTER_POSTS}<br /><font size=1>Karma: {postrow.POSTER_KARMA}<br />{postrow.KARMA_IMAGE}&nbsp;&nbsp;<a href="karma.php?x=applaud&u={postrow.POSTER_ID}&t={TOPIC_ID}"> +1</a>&nbsp;/&nbsp;<a href="karma.php?x=smite&u={postrow.POSTER_ID}&t={TOPIC_ID}"> -1</a></font><br />{postrow.ADR_TOPIC_BOX}{postrow.POSTER_FROM}<br />{postrow.POSTER_PET}
<!-- [BEGIN LEVEL MOD] --> 
		<br />    
		<span class="postdetails"> 
     		Niveau: <b>{postrow.POSTER_LEVEL}</b> 
		<br />   <br />  
		<table width="142" border="0" cellpadding="0" cellspacing="0" background="templates/subSilver/images/corps.gif" height="49"> 
  			<tr> 
    				<td width="31" rowspan="2">&nbsp;</td> 
    				<td width="109" valign="top"> 
      					<table width="111" border="0" cellpadding="0" cellspacing="0"> 
        					<tr> 
          						<td valign="top" align="left"><img src="templates/subSilver/images/01.gif" width="1" height="4"></td> 
        					</tr> 
        					<tr> 
          						<td><img src="templates/subSilver/images/barreV.gif" width="{postrow.POSTER_HP_WIDTH}" height="10" alt="{postrow.POSTER_HP}" name="barreHP"><img src="templates/subSilver/images/rondV.gif" width="4" height="10"></td> 
        					</tr> 
        					<tr> 
          						<td><img src="templates/subSilver/images/02.gif" width="1" height="3"></td> 
        					</tr> 
        					<tr> 
          						<td><img src="templates/subSilver/images/barreB.gif" width="{postrow.POSTER_MP_WIDTH}" height="10" alt="{postrow.POSTER_MP}" name="barreMP"><img src="templates/subSilver/images/rondB.gif" width="4" height="10"></td> 
        					</tr> 
        					<tr> 
          						<td><img src="templates/subSilver/images/03.gif" width="1" height="3"></td> 
        					</tr> 
        					<tr> 
          						<td><img src="templates/subSilver/images/barreR.gif" width="{postrow.POSTER_EXP_WIDTH}" height="10" alt="{postrow.POSTER_EXP}" name="barreEXP"><img src="templates/subSilver/images/rondR.gif" width="4" height="10"></td> 
        					</tr> 
        					<tr> 
          						<td height="5"></td> 
        					</tr> 
      					</table> 
    				</td> 
  				<td width="3"></td> 
  			</tr> 
  			<tr> 
    				<td></td> 
    				<td></td> 
  			</tr> 
		</table> 
		<p></p> 
		<p></p> 

<!-- [END LEVEL MOD] -->

			<!-- BEGIN birthday -->
			<br />{L_AGE}:&nbsp;{postrow.birthday.AGE}
			<!-- BEGIN zodiac --><img class="gensmall" src="{postrow.birthday.I_ZODIAC}" alt="{postrow.birthday.L_ZODIAC}" title="{postrow.birthday.L_ZODIAC}" style="vertical-align:text-bottom;" /><!-- END zodiac -->
			<!-- BEGIN birthcake -->&nbsp;<img class="gensmall" src="{I_BIRTHCAKE}" alt="{L_BIRTHCAKE}" title="{L_BIRTHCAKE}" style="vertical-align:text-bottom;" /><!-- END birthcake -->
			<!-- END birthday -->
			<!-- BEGIN browser -->
			<br />{L_BROWSER}:&nbsp;<img class="gensmall" src="{postrow.browser.BROWSER_IMG}" alt="{postrow.browser.BROWSER_NAME}" title="{postrow.browser.BROWSER_NAME}" style="vertical-align:text-bottom;" border="0" />
			<!-- END browser -->
			<!-- BEGIN flag -->
			<br />{L_FLAG}:&nbsp;<img class="gensmall" src="{postrow.flag.FLAG_IMG}" alt="{postrow.flag.FLAG_NAME}" title="{postrow.flag.FLAG_NAME}" style="vertical-align:text-bottom;" border="0" />
			<!-- END flag -->
<br />{postrow.CASH}</span><br /></td>
		<td class="{postrow.ROW_CLASS}" width="100%" height="28" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="100%"><a href="{postrow.U_MINI_POST}"><img src="{postrow.MINI_POST_IMG}" width="12" height="9" alt="{postrow.L_MINI_POST_ALT}" title="{postrow.L_MINI_POST_ALT}" border="0" /></a><span class="postdetails">{L_POSTED}: {postrow.POST_DATE}<span class="gen">&nbsp;</span>&nbsp; &nbsp;{L_POST_SUBJECT}: {postrow.POST_SUBJECT}</span></td>
				<td valign="top" nowrap="nowrap">{postrow.QUOTE_IMG} {postrow.EDIT_IMG} {postrow.DELETE_IMG} {postrow.IP_IMG}</td>
			</tr>
			<tr> 
				<td colspan="2"><hr /></td>
			</tr>
			<tr>
				<td colspan="2"><div id="message_{postrow.U_POST_ID}"><span class="postbody">{postrow.MESSAGE}</span></div><span class="postbody"></span>{postrow.ATTACHMENTS}<span class="postbody">{postrow.SIGNATURE}</span><span class="gensmall">{postrow.EDITED_MESSAGE}</span></td>
			</tr>
		</table></td>
	</tr>
	<tr> 
		<td class="{postrow.ROW_CLASS}" width="150" align="left" valign="middle"><span class="nav"><a href="#top" class="nav">{L_BACK_TO_TOP}</a></span></td>
		<td class="{postrow.ROW_CLASS}" width="100%" height="28" valign="bottom" nowrap="nowrap"><table cellspacing="0" cellpadding="0" border="0" height="18" width="18">
			<tr> 
				<td valign="middle" nowrap="nowrap">{postrow.PROFILE_IMG} {postrow.PM_IMG} {postrow.EMAIL_IMG} {postrow.WWW_IMG} {postrow.AIM_IMG} {postrow.YIM_IMG} {postrow.MSN_IMG}<script language="JavaScript" type="text/javascript"><!-- 

	if ( navigator.userAgent.toLowerCase().indexOf('mozilla') != -1 && navigator.userAgent.indexOf('5.') == -1 && navigator.userAgent.indexOf('6.') == -1 )
		document.write(' {postrow.ICQ_IMG}');
	else
		document.write('</td><td>&nbsp;</td><td valign="top" nowrap="nowrap"><div style="position:relative"><div style="position:absolute">{postrow.ICQ_IMG}</div><div style="position:absolute;left:3px;top:-1px">{postrow.ICQ_STATUS_IMG}</div></div>');
				
				//--></script><noscript>{postrow.ICQ_IMG}</noscript></td>
			</tr>
		</table></td>
	</tr>
	<tr> 
		<td class="spaceRow" colspan="2" height="1"><img src="templates/subSilver/images/spacer.gif" alt="" width="1" height="1" /></td>
	</tr>
	<!-- END postrow -->
	<tr align="center"> 
		<td class="catBottom" colspan="2" height="28"><table cellspacing="0" cellpadding="0" border="0">
			<tr><form method="post" action="{S_POST_DAYS_ACTION}">
				<td align="center"><span class="gensmall">{L_DISPLAY_POSTS}: {S_SELECT_POST_DAYS}&nbsp;{S_SELECT_POST_ORDER}&nbsp;<input type="submit" value="{L_GO}" class="liteoption" name="submit" /></span></td>
			</form></tr>
		</table></td>
	</tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" align="middle" /></a>&nbsp;&nbsp;&nbsp;<a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" alt="{L_POST_REPLY_TOPIC}" align="middle" /></a>
      <!-- BEGIN qp_form -->
      <!-- BEGIN qp_button -->
      &nbsp;&nbsp;<a href="{qp_form.qp_button.U_QPES}"><img src="{qp_form.qp_button.I_QPES}" border="0" alt="{qp_form.qp_button.L_QPES_ALT}" align="middle" /></a>
      <!-- END qp_button -->
      <!-- END qp_form -->
	</span></td>
	<td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	  	  <!-- BEGIN switch_parent_link -->
	  -> <a class="nav" href="{PARENT_URL}">{PARENT_NAME}</a>
	  	  <!-- END switch_parent_link -->
	  -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
	<td align="right" valign="top" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span> 
	  </td>
  </tr>
  <tr>
	<td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
  </tr>
</table>
<!-- BEGIN qp_form -->
{QP_BOX}
<!-- END qp_form -->

<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
	<td width="40%" valign="top" nowrap="nowrap" align="left"><span class="gensmall">{S_WATCH_TOPIC}</span><br />
	  &nbsp;<br />
	  {S_TOPIC_ADMIN}</td>
<td align="right" valign="top" nowrap="nowrap">{JUMPBOX}<span class="gensmall">{S_AUTH_LIST}</span></td>
  </tr>
      <tr>
   <td width="100%" colspan="2" align="center">
   <br />
<!-- BEGIN similar -->
<table width="85%" cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
 <tr>
  <td class="catHead" colspan="6"><span class="genmed"><b>{similar.L_SIMILAR}</b></span></td>
 </tr>
 <tr>
  <th colspan="2">{similar.L_TOPIC}</th>
  <th>{similar.L_AUTHOR}</th>
  <th>{similar.L_FORUM}</th>
  <th>{similar.L_REPLIES}</th>
  <th>{similar.L_LAST_POST}</th>
 </tr>
 <!-- BEGIN topics -->
 <tr>
  <td class="row1" align="center"><span class="genmed"><img src="{similar.topics.FOLDER}" border="0" alt="{similar.topics.ALT}" title="{similar.topics.ALT}" /></span></td>
  <td class="row1" width="30%">{similar.topics.NEWEST}<span class="gensmall">{similar.topics.TYPE}</span> <span class="topictitle">{similar.topics.TOPICS}</span></td>
  <td class="row1" width="10%"><span class="genmed">{similar.topics.AUTHOR}</span></td>
  <td class="row1"><span class="genmed">{similar.topics.FORUM}</span></td>
  <td class="row1" width="15%" align="center"><span class="genmed">{similar.topics.REPLIES}</span></td>
  <td class="row1"><span class="genmed">{similar.topics.POST_TIME} {similar.topics.POST_URL}</span></td>
 </tr>
 <!-- END topics -->
</table>
<!-- END similar -->
   </td>
  </tr>
</table>
