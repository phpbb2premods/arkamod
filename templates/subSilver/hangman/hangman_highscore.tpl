<table>
<tr><td>
<span class="gensmall"><a href="{U_INDEX}" class="nav">{L_INDEX}</a>&nbsp;&raquo;&nbsp;<a href="{U_HANGMAN}" class="nav">{L_HANGMAN}</a>&nbsp;&raquo;&nbsp;<span class="genmed"><b>{L_HIGHSCORE_PAGE}</b></span></span>
</td></tr>
</table>
<table class="forumline" width="100%" cellspacing="1" cellpadding="5" border="0" align="center">
<tr>	<th>{L_HANGMAN_OVERALL_HEADLINE}</th>	</tr>
<tr>	<td><br/>
<table class="bodyline" width="70%" cellspacing="1" cellpadding="5" border="0" align="center">
	<tr>
		<th >{L_HIGHSCORE_USER}</th>
		<th >{L_HIGHSCORE_CREATED}</th>
		<th >{L_HIGHSCORE_LOST}</th>
		<th >{L_HIGHSCORE_WON}</th>
		<th >{L_HIGHSCORE_POINTS}</th>
		<th >{L_HIGHSCORE_R_LETTERS}</th>
		<th >{L_HIGHSCORE_W_LETTERS}</th>
	</tr>
	<!-- BEGIN Highscore -->
	<tr>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.USERNAME}</span></td>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.CREATED}</span></td>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.LOST}</span></td>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.WON}</span></td>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.POINTS}</span></td>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.R_LETTERS}</span></td>
		<td class="{Highscore.KLASSE}"><span class="gensmall">{Highscore.W_LETTERS}</span></td>
	</tr>
	<!-- END Highscore -->
	<tr>
		<td class="row3" align="left">
			<span class="gensmall"><b>{L_ORDER_BY}</b>&nbsp;&nbsp;</span>
		</td>
		<td colspan="3" align="left" class="row3" valign="middle">
			<form method="POST" action="{S_HIGHSCORE_ACTION}">
			<table>
				<tr>
					<td>
						<select name="hfilter">
							<option value="won" {SEL_won}>{L_ORDER_BY_WON}</option>
							<option value="lost" {SEL_lost}>{L_ORDER_BY_LOST}</option>
							<option value="score" {SEL_score}>{L_ORDER_BY_POINTS}</option>
							<option value="created" {SEL_created}>{L_ORDER_BY_CREATED}</option>
							<option value="r_letters" {SEL_r_letters}>{L_ORDER_BY_R_LETTERS}</option>
							<option value="w_letters" {SEL_w_letters}>{L_ORDER_BY_W_LETTERS}</option>
						</select>
					</td>
					<td>
						<select name="horder">
							<option value="asc" {SEL_asc}>{L_ASC}</option>
							<option value="desc" {SEL_desc}>{L_DESC}</option>
						</select>
					</td>
					<td>
						<select name="hlimit">
							<option value="10" {SEL_10}>Top - 10</option>
							<option value="20" {SEL_20}>Top - 20</option>
							<option value="50" {SEL_50}>Top - 50</option>
							<option value="100" {SEL_100}>Top - 100</option>
						</select>
					</td>
					<td>
						<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption">
						<input type="hidden" name="mode" value="highscore">
					</td>
				</tr>
			</table>
		</form>
		</td>
		<td class="row3" colspan="3" align="center">
			<table width="100%">
				<tr>
					<td align="left" class="row3">
						<a href="{U_CREATION_PAGE}" class="nav">{L_CREATION_PAGE}</span></a>
					</td>
				</tr><tr>
					<td class="row3" align="right">
						<a href="{U_OVERVIEW_PAGE}" class="nav">{L_OVERVIEW_PAGE}</span></a>
					</td>
				</tr>
			</table>
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