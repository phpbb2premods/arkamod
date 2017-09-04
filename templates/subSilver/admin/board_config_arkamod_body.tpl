
<h1>{L_CONFIGURATION_PLUS_TITLE}</h1>

<p>{L_CONFIGURATION_PLUS_EXPLAIN}</p>

<form action="{S_CONFIG_PLUS_ACTION}" method="post"><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
	<tr>
		<th class="thHead" colspan="2">{L_GENERAL_CONVIMOD_SETTINGS}</th>
	</tr>

	{BIRTHDAY_CONFIG_BOX}
	<tr>
		<td class="row2" colspan="2"><span class="gensmall"><strong>{L_PORTAL_SETTINGS}</strong></span></td>
	</tr>
	<tr>
      <td class="row1">{L_ACTIVEPORTAIL}</td>
      <td class="row2"><input type="radio" name="activeportail" value="1" {ACTIVEPORTAIL_YES} /> {L_YES}&nbsp;&nbsp;<input type="radio" name="activeportail" value="0" {ACTIVEPORTAIL_NO} /> {L_NO}</td>
   </tr>
	<tr>
		<td class="catBottom" colspan="2" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" />		</td>
	</tr>
</table>
</form>

<br clear="all" />
