<table>
<tr><td>
<span class="gensmall"><a href="{U_INDEX}" class="nav">{L_INDEX}</a>&nbsp;&raquo;&nbsp;<a href="{U_HANGMAN}" class="nav">{L_HANGMAN}</a>&nbsp;&raquo;&nbsp;<span class="genmed"><b>{L_CREATION_PAGE}</b></span></span>
</td></tr>
</table>
<table class="forumline" width="100%" cellspacing="1" cellpadding="5" border="0" align="center">
<tr>	<th>{L_HANGMAN_OVERALL_HEADLINE}</th>	</tr>
<tr>	<td><br/>
<table class="bodyline" width="65%" cellspacing="0" cellpadding="0" border="0" align="center">
	<tr>
		<th align="center">{L_CREATE_NEW}</th>
	</tr>
	<tr>
		<td>
			<form method="post" action="{HANGMAN_CREATE}">
			<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
			<tr><td colspan="4" class="row2"><br/></td></tr>
				<tr> 
					<td class="row2" align="center" valign="top"><span class="gen"><b>{L_CREATE_SUBJECT}</b></span></td>
					<td align="center" class="row2" colspan="3">
						<input type="text" name="subject" size="45" maxLength="70" class="post" value="{L_STANDART_TITLE}">
					</td>
				</tr>
			<tr><td colspan="4" class="row2"><br/></td></tr>
				<tr>
					<td class="row2" align="center" valign="top"><span class="gen"><b>{L_CREATE_HELP}</b></span><br><span class="gensmall">{L_CREATE_HELP_HELP}</span></td>
					<td align="center" class="row2" colspan="3">
						<textarea name="hilfe" rows="10" cols="45" class="post">{L_HANG_HELP}</textarea>
					</td>
				</tr>
			<tr><td colspan="4" class="row2"><br/></td></tr>
				<tr>
					<td class="row2" align="center" colspan="4">
					<table>
						<tr>
							<td>
								<span class="gen"><b>{L_CREATE_TRIES}</b>&nbsp;&nbsp;</span>
								<select name="maximal_versuche">
									<!-- BEGIN Versuche -->
										<option value="{Versuche.Wert}" {Versuche.Select}>{Versuche.Wert}</option>
									<!-- END Versuche -->
								</select>
							</td>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<td>
								<span class="gen"><b>{L_CREATE_DAYS}</b>&nbsp;&nbsp;</span>
								<select name="gueltige_tage">
									<!-- BEGIN Gueltige_Tage -->
										<option value="{Gueltige_Tage.Wert}" {Gueltige_Tage.Select}>{Gueltige_Tage.Wert}</option>
									<!-- END Gueltige_Tage -->
								</select>
								<span class="genmed">{L_CREATE_DAY_HELP}</span>
							</td>
						</tr>
					</table>
					</td>
				</tr>
			<tr><td colspan="4" class="row2"><br/></td></tr>
				<tr>
					<td class="row2" align="center"><span class="gen"><b>{L_CREATE_HANGMAN}</b></span><br><span class="gensmall">{L_CREATE_HELP_HANGMAN}</span></td>
					<td align="center" class="row2" colspan="3">
					<!-- BEGIN switch_shorter_words -->
						<input type="text" name="wort" maxlength="{MAXLENGTH}" size="45" class="post">
					<!-- END switch_shorter_words -->
					<!-- BEGIN switch_longer_words -->
						<textarea class="post" name="wort" rows="2" cols="30">{L_HANG_WORD}</textarea>
					<!-- END switch_longer_words -->
					</td>
				</tr>
			<tr><td colspan="4" class="row2"><br/></td></tr>
				<tr>
					<td align="center" class="row3" colspan="4">
						<a href="{U_HELP_PAGE}" class="nav">{L_HELP_PAGE}</a>&nbsp;&nbsp;
						<a href="{U_OVERVIEW_PAGE}" class="nav">{L_OVERVIEW_PAGE}</a>&nbsp;&nbsp;
						<a href="{U_HIGHSCORE_PAGE}" class="nav">{L_HIGHSCORE_PAGE}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="confirm" value="{L_CREATE_YES}" class="mainoption" />&nbsp;&nbsp;
						<input type="submit" name="confirm" value="{L_CREATE_NO}" class="liteoption" />
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
	</td>	</tr>
	<tr>
		<td class="copyright" align="center">
			<span class="gensmall">{L_HANGMAN_COPYRIGHT}</span>
		</td>
	</tr>
</table>