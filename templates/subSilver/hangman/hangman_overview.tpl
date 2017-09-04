<table>
<tr><td>
<span class="gensmall"><a href="{U_INDEX}" class="nav">{L_INDEX}</a>&nbsp;&raquo;&nbsp;<a href="{U_HANGMAN}" class="nav">{L_HANGMAN}</a>&nbsp;&raquo;&nbsp;<span class="genmed"><b>{L_OVERVIEW_PAGE}</b></span></span>
</td></tr>
</table>
<table class="forumline" width="100%" cellspacing="1" cellpadding="5" border="0" align="center">
<tr>	<th>{L_HANGMAN_OVERALL_HEADLINE}</th>	</tr>
<tr>
	<td width="100%">
		<table width="100%">
			<tr>
				<td align="left">
			<!-- BEGIN switch_show_stats -->
		<span class="gensmall">
			{switch_show_stats.L_HANGMANSTATS_ONLINE}&nbsp;&#8226;&nbsp;
			{switch_show_stats.L_HANGMANSTATS_TODAY}&nbsp;&#8226;&nbsp;
			{switch_show_stats.L_HANGMANSTATS_WON}<br>
			{switch_show_stats.L_HANGMANSTATS_TOTAL}<br>
			{switch_show_stats.L_HANGMANSTATS_BEST}
		</span>
			<!-- END switch_show_stats -->
				</td>
				<td align="right">
		<form method="POST" action="{S_OVERVIEW_ACTION}">
		<table>
			<td>
				<span class="gensmall">	{L_FILTER_HEADLINE}</span>
			</td>
			<td>
				<select name="filter">
					<!-- BEGIN Filters -->
						{Filters.Filter}
					<!-- END Filters -->
				</select>
			</td>
			<td>
				<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption">
				<input type="hidden" name="mode" value="overview">
			</tr>
		</table>
		</form>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
	<!-- BEGIN switch_admin_on -->
	<form method="POST" action="{switch_admin_on.U_ADMIN_MULTIDELETE}">
	<!-- END switch_admin_on -->
<table class="bodyline" width="95%" cellspacing="0" cellpadding="2" border="0" align="center">
	<tr>
	<!-- BEGIN switch_no_show_numbers -->
		<th align="center">{L_HANGMAN_SUBJECT}</th>
	<!-- END switch_no_show_numbers -->
	<!-- BEGIN switch_show_numbers -->
		<th align="center" colspan="2">{L_HANGMAN_SUBJECT}</th>
	<!-- END switch_show_numbers -->
		<th align="center">{L_HANGMAN_STATUS}</th>
		<th align="center">{L_HANGMAN_MAX_TRIES}</th>
		<th align="center">{L_HANGMAN_DATE}</th>
		<th align="center">{L_HANGMAN_LEASE_DATE}</th>
		<th align="center">{L_HANGMAN_CREATOR}</th>
		<!-- BEGIN switch_admin_on -->
		<th  align="center" colspan="2">{HANGMAN_ADMINISTRATION}</th>
		<!-- END switch_admin_on -->
	</tr>
	<!-- BEGIN Hangmans -->
	<tr>
	<!-- BEGIN switch_show_numbers -->
		<td class="{Hangmans.switch_show_numbers.KLASSE}" align="left"><span class="gensmall">#&nbsp;{Hangmans.switch_show_numbers.HANGMAN_ID}</span></td>
		<td class="{Hangmans.KLASSE}" align="left"><a href="{Hangmans.HANGMAN_LINK}" class="mainmenu">{Hangmans.HANGMAN_TOPIC}</a></td>
	<!-- END switch_show_numbers -->
	<!-- BEGIN switch_no_show_numbers -->
		<td class="{Hangmans.KLASSE}" align="left" colspan="2"><a href="{Hangmans.HANGMAN_LINK}" class="mainmenu">{Hangmans.HANGMAN_TOPIC}</a></td>
	<!-- END switch_no_show_numbers -->
		<td class="{Hangmans.KLASSE}" align="center"><span class="gensmall">{Hangmans.HANGMAN_STATUS}</span></td>
		<td class="{Hangmans.KLASSE}" align="center"><span class="gensmall">{Hangmans.HANGMAN_MAX_QUESS}</span></td>
		<td class="{Hangmans.KLASSE}" align="center"><span class="gensmall">{Hangmans.HANGMAN_DATE}</span></td>
		<td class="{Hangmans.KLASSE}" align="center"><span class="gensmall">{Hangmans.HANGMAN_LEASE_DATE}</span></td>
		<td class="{Hangmans.KLASSE}" align="center"><span class="gensmall">{Hangmans.HANGMAN_CREATOR}</span></td>
		<!-- BEGIN switch_admin_on -->
		<td class="{Hangmans.switch_admin_on.KLASSE}" align="center">
			<span class="gensmall">{Hangmans.switch_admin_on.HANGMAN_ADMIN_DELETE}</span>
			<input type="checkbox" name="delete_id{Hangmans.switch_admin_on.HANGMAN_ID}" value="1">
		</td>
		<!-- END switch_admin_on -->
	</tr>
	<tr cellspacing="0" cellpadding="0">
	<!-- BEGIN switch_show_numbers -->
		<td class="{Hangmans.KLASSE}" colspan="2"></td>
	<!-- END switch_show_numbers -->
	<!-- BEGIN switch_no_show_numbers -->
		<td class="{Hangmans.KLASSE}" colspan="1"></td>
	<!-- END switch_no_show_numbers -->
		<td colspan="5" class="{Hangmans.KLASSE}">
			<table class="{Hangmans.KLASSE}" cellspacing="0" cellpadding="0" valign="middle">
				<tr class="{Hangmans.KLASSE}" width="100%">
					<td class="{Hangmans.KLASSE}" align="left">
						<span class="gensmall">{Hangmans.L_QUESSORS_TEXT}</span>
					</td>
					<td class="{Hangmans.KLASSE}" align="left">
						<span class="gensmall"><i>
							<!-- BEGIN Quessors -->
								{Hangmans.Quessors.L_QUESSORS_NAME}
							<!-- END Quessors -->
						</i></span>
					</td>
				</tr>
			</table>
		</td>
		<!-- BEGIN switch_admin_on -->
		<td class="{Hangmans.switch_admin_on.KLASSE}" colspan="2">&nbsp;</td>
		<!-- END switch_admin_on -->
	</tr>
	<!-- END Hangmans -->
	</tr>
	<tr>
		<td align="left" colspan="4" class="row3">
			<a href="{U_HELP_PAGE}" class="nav">{L_HELP_PAGE}</a>&nbsp;&nbsp;
			<a href="{U_HIGHSCORE_PAGE}" class="nav">{L_HIGHSCORE_PAGE}</a>&nbsp;&nbsp;
			<a href="{U_CREATION_PAGE}" class="nav">{L_CREATION_PAGE}</a>&nbsp;&nbsp;
		</td>
		<td align="right" colspan="4" class="row3">
		<!-- BEGIN switch_admin_on -->
			<input type="submit" name="submit" value="{switch_admin_on.S_ADMIN_MULTIDELETE_GO}" class="mainoption">
			<input type="reset" name="reset" value="{switch_admin_on.S_ADMIN_MULTIDELETE_RESET}" class="liteoption">
		<!-- END switch_admin_on -->
		</td>
	</tr>
</table></form><br>
	<div class="nav" align="right">{U_PREV_NEXT}</div>
	</td>	
	</tr>
	<tr>
		<td class="copyright" align="center">
			<span class="gensmall">{L_HANGMAN_COPYRIGHT}</span>
		</td>
	</tr>
</table>