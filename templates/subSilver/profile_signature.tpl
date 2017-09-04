
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
<tr>
	<td align="left"><span class="nav">
  <a href="{U_INDEX}" class="nav">{L_INDEX}</a>&nbsp;&raquo;&nbsp;<a href="{U_PROFILE}" class="nav">{L_PROFILE}</a>&nbsp;&raquo;&nbsp;{L_SIGNATURE}
	</span></td>
</tr>
</table>

<center>
<!-- BEGIN switch_current_sig -->
{BBC_JS_BOX}
<form name="post" method="post" action="{SIG_LINK}"><table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
<tr>
	<th colspan="2" height="25" valign="middle">{SIG_CURRENT}</th>
</tr>
<tr>
	<td class="row1" width="140" height="140"><span class="gen">{L_SIGNATURE}:</span></td>
	<td class="row2" width="520" valign="bottom"><span class="gen">{CURRENT_PREVIEW}</span></td>
</tr>
<tr>
	<td class="row1" width="140" height="20"><span class="gen"></span></td>
	<td class="row2" width="520" valign="middle" nowrap="nowrap">{PROFIL_IMG} {EMAIL_IMG} {PM_IMG}</td>
</tr>
</table>
<br />
<table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
<tr>
	<th colspan="2" height="25" valign="middle">{SIG_EDIT}</th>
</tr>
<tr>
	<td class="row1" width="130" height="20">&nbsp;</td>
	<td class="row2" width="530" align="middle">
	<table cellspacing="0" cellpadding="2" border="0">{BBC_DISPLAY_BOX}</table>
</tr>
<tr>
	<td class="row1" width="130" height="150">
		<span class="gen">{L_SIGNATURE}:</span>
		<br />
  	<span class="gensmall">{L_SIGNATURE_EXPLAIN}<br /><br />{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span>
	</td>
	<td class="row2" width="530" align="middle">
  	<textarea name="message" rows="15" cols="76" wrap="virtual" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);">{SIGNATURE}</textarea>
	</td>
</tr>
<tr>
	<td class="row1" width="130" height="20">&nbsp;</td>
	<td class="row2" width="530" align="middle">
		<input type="button" class="button" value="{L_PROFILE}" onClick="location='{U_PROFILE}'">
		<input type="button" class="button" value="{SIG_CURRENT}" onClick="location='{SIG_LINK}'">
		<input type="submit" class="button" value="{SIG_PREVIEW}" name="preview">
		<input type="submit" class="mainoption" value="{SIG_SAVE}" name="save">
		<input type="submit" class="button" value="{SIG_CANCEL}" name="cancel">
	</td>
</tr>
</table></form>
<!-- END switch_current_sig -->

<!-- BEGIN switch_preview_sig -->
{BBC_JS_BOX}
<form method="post" action="{SIG_LINK}" name="post"><table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
<tr>
	<th colspan="2" height="25" valign="middle">{SIG_PREVIEW}</th>
</tr>
<tr>
	<td class="row1" width="140" height="140"><span class="gen">{L_SIGNATURE}:</span></td>
	<td class="row2" width="520" valign="bottom"><span class="gen">{REAL_PREVIEW}</span></td>
</tr>
<tr>
	<td class="row1" width="140" height="20"><span class="gen"></span></td>
	<td class="row2" width="520" valign="middle" nowrap="nowrap">{PROFIL_IMG} {EMAIL_IMG} {PM_IMG}</td>
</tr>
</table>
<br />
<table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
<tr>
	<th colspan="2" height="25" valign="middle">{SIG_EDIT}</th>
</tr>
<tr>
	<td class="row1" width="130" height="20">&nbsp;</td>
	<td class="row2" width="530" align="middle"><table cellspacing="0" cellpadding="2" border="0">
	{BBC_DISPLAY_BOX}
	</table></td>
</tr>
<tr>
	<td class="row1" width="130" height="150">
		<span class="gen">{L_SIGNATURE}:</span>
		<br />
  	<span class="gensmall">{L_SIGNATURE_EXPLAIN}<br /><br />{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span>
	</td>
	<td class="row2" width="530" align="middle">
  	<textarea name="message" rows="15" cols="76" wrap="virtual" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);">{SIGNATURE}</textarea>
	</td>
</tr>
<tr>
	<td class="row1" width="130" height="20">&nbsp;</td>
	<td class="row2" width="530" align="middle">
		<input type="button" class="button" value="{L_PROFILE}" onClick="location='{U_PROFILE}'">
		<input type="button" class="button" value="{SIG_CURRENT}" onClick="location='{SIG_LINK}'">
		<input type="submit" class="button" value="{SIG_PREVIEW}" name="preview">
		<input type="submit" class="mainoption" value="{SIG_SAVE}" name="save">
		<input type="submit" class="button" value="{SIG_CANCEL}" name="cancel">
	</td>
</tr>
</table></form>
<!-- END switch_preview_sig -->

<!-- BEGIN switch_save_sig -->
{BBC_JS_BOX}
<form method="post" action="{SIG_LINK}" name="post"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
<tr>
	<th class="thHead" height="25" valign="middle">{SIG_SAVE}</th>
</tr>
<tr>
	<td class="row1" valign="middle" align="middle" height="100"><span class="gen">{SAVE_MESSAGE}</span></td>
</tr>
<tr>
	<td class="row2" align="middle">
		<input type="button" class="button" value="{L_PROFILE}" onClick="location='{U_PROFILE}'">
		<input type="button" class="button" value="{SIG_CURRENT}" onClick="location='{SIG_LINK}'">
		<input type="submit" class="mainoption" value="{SIG_CANCEL}" name="cancel">
	</td>
</tr>
</table></form>
<!-- END switch_save_sig -->
</center>
