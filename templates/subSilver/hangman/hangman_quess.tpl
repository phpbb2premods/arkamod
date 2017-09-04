<table>
<tr><td>
<span class="gensmall"><a href="{U_INDEX}" class="nav">{L_INDEX}</a>&nbsp;&raquo;&nbsp;<a href="{U_HANGMAN}" class="nav">{L_HANGMAN}</a>&nbsp;&raquo;&nbsp;<span class="genmed"><b>{HANGMAN_SUBJECT}</b></span></span>
</td></tr>
</table>
<table class="forumline" width="100%" cellspacing="1" cellpadding="5" border="0" align="center" height="40%">
	<tr>	
		<th>{L_HANGMAN_OVERALL_HEADLINE}</th>	
	</tr>
	<tr>
		<td class="postbody"><br/>
		<center>
			<table class="bodyline" width="80%" height="50%" cellspacing="1" cellpadding="5" border="0" align="center">
				<tr>
					<th colspan="2" align="center">{L_HANGMAN_QUESS}</th>
				</tr>
				<tr>
					<td width="20%"></td>
					<td align="center" colspan="1" valign="bottom" height="40px" align="center" width="80%">
						<br><b>
						<!-- BEGIN Hangman_Letters -->
							{Hangman_Letters.HANGMAN_CHAR}
						<!-- END Hangman_Letters -->
						{HANGMAN_WORD}</b>
					</td>
				</tr>
				<tr>
					<td height="10px" colspan="2"></td>
				</tr>
				<tr>
					<td height="70px" valign="middle" align="center" width="20%">
						{QUESS_PICTURE}
					</td>
					<td height="70px" valign="right" align="center" width="80%">
						<span class="genmed">{QUESS_MSG}</span>
					</td>
				</tr>
				<!-- BEGIN switch_show_letters -->
				<tr>
					<td align="left" width="20%">
						<span class="genmed"/><b>{switch_show_letters.L_QUESS_LETTERS}</b></span>
					</td>
					<td align="center" width="80%">
						<!-- BEGIN Letters -->
							<a href="{switch_show_letters.Letters.LETTER_LINK}" class="nav">{switch_show_letters.Letters.LETTER_SIGN}</a>&nbsp;
						<!-- END Letters -->
					</td>
				</tr>
				<tr>
					<td align="left" width="20%">
						<span class="genmed"><b>{switch_show_letters.L_TRY_A_WORD}</b></span>
					</td>
					<td align="center" width="80%">
						<form method="POST" action="{switch_show_letters.U_ACTION}">
						<table width="100%"><tr><td width="80%" align="center">
							<!-- BEGIN switch_shorter_words -->
								<input type="text" name="wortversuch" maxlength="{MAXLENGTH}" size="45" class="post">
							<!-- END switch_shorter_words -->
							<!-- BEGIN switch_longer_words -->
								<textarea class="post" name="wortversuch" cols="30" rows="2"></textarea>
							<!-- END switch_longer_words -->
							</td><td width="20%" align="center">
							<input class="mainoption" type="submit" name="{switch_show_letters.L_TRY}" value="{switch_show_letters.L_TRY}">
							</td></tr></table>
						</form>
					</td>
					
				</tr>
				<!-- END switch_show_letters -->
				<tr>
					<td align="left" width="20%">
						<span class="genmed"/><b>{L_HANGMAN_CREATOR}:</b></span>
					</td>
					<td align="left" width="80%">
						<span class="genmed"/>{L_HANGMAN_CREATOR_NAME}</span>
					</td>
				</tr>
				<tr>
					<td align="left" width="20%">
						<span class="genmed"/><b>{L_QUESSORS_TEXT}</b></span>
					</td>
					<td align="left" width="80%">
						<span class="gensmall"><i>
						<!-- BEGIN Quessors -->
							{Quessors.L_QUESSORS_NAME}
						<!-- END Quessors -->
						</i></span>
					</td>
				</tr>
			</table>
		</center>
		</td>
	</tr>
	<!-- BEGIN show_help -->
	<tr>
		<td>
			<table class="bodyline" width="80%" cellspacing="1" cellpadding="5" border="0" align="center" height="50%">
				<tr>
					<th align="center">{HANGMAN_SUBJECT}</th>
				</tr>
				<tr>
					<td valign="top" class="postbody">{HANGMAN_MSG}<hr /></td>
				</tr>
			</table>	
		</td>
	</tr>
	<!-- END show_help -->
	<tr>
		<td class="copyright" align="center">
			<span class="gensmall">{L_HANGMAN_COPYRIGHT}</span>
		</td>
	</tr>
</table>