<div class="maintitle">{L_CONFIGURATION_TITLE}</div>
<br />
<div class="genmed">{L_CONFIGURATION_EXPLAIN}</div>
<br />
<form action="{S_CONFIG_ACTION}" method="post">
	<table width="99%" cellpadding="3" cellspacing="1" border="0" align="center" class="forumline">
		<tr> 
			<th colspan="2">{L_GENERAL_SETTINGS}</th>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_GAMES_PER_PAGE}</td>
			<td class="row2" width="50%"> 
				<input type="text" maxlength="4" size="20" name="games_per_page" value="{L_GAMES_PER_PAGE}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_ONLY_ADMIN_CREATE}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="only_admin_create" value="0" {L_ONLY_ADMIN_CREATE_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="only_admin_create" value="1" {L_ONLY_ADMIN_CREATE_YES} />{L_YES}
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_ALLOW_GUEST}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="allow_guest" value="0" {L_ALLOW_GUEST_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="allow_guest" value="1" {L_ALLOW_GUEST_YES} />{L_YES}
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_MODERATOR_GROUP}</td>
			<td class="row2" width="50%"> 
				{SELECT_MOD_GROUP_BOX}
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_SHOW_STATS}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="show_stats" value="0" {L_SHOW_STATS_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="show_stats" value="1" {L_SHOW_STATS_YES} />{L_YES}
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_MAKE_WORDS_UPPER}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="make_words_upper" value="0" {L_MAKE_WORDS_UPPER_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="make_words_upper" value="1" {L_MAKE_WORDS_UPPER_YES} />{L_YES}
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_CONVERT_SPECIAL_CHARS}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="convert_special_l" value="0" {L_CONVERT_SPECIAL_LETTERS_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="convert_special_l" value="1" {L_CONVERT_SPECIAL_LETTERS_YES} />{L_YES}
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_REQUESSING_LOSE_TRIES}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="requessing_lose" value="0" {L_REQUESSING_LOSE_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="requessing_lose" value="1" {L_REQUESSING_LOSE_YES} />{L_YES}
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_POINTS_MOD_INSTALLED}</td>
			<td class="row1" width="50%"> 
				<input type="radio" name="points_mod_installed" value="0" {L_POINTS_MOD_INSTALLED_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="points_mod_installed" value="1" {L_POINTS_MOD_INSTALLED_YES} />{L_YES}
			</td>
		</tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_POINTS_MOD_WON}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="5" size="20" name="points_mod_won" value="{L_POINTS_MOD_WON}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_POINTS_MOD_LOST}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="5" size="20" name="points_mod_lost" value="{L_POINTS_MOD_LOST}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_POINTS_MOD_CREATED}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="5" size="20" name="points_mod_created" value="{L_POINTS_MOD_CREATED}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_POINTS_MOD_LETTERS}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="5" size="20" name="points_mod_letters" value="{L_POINTS_MOD_LETTERS}" class="post" />
			</td>
		</tr>
		<tr>
			<td class="row1" width="50%">{L_HANGMAN_TIME_PLAY_AGAIN}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="time_play_again" value="{L_TIME_PLAY_AGAIN}" class="post" />
			</td>
		</tr>
		<tr>
			<td class="row1" width="50%">{L_HANGMAN_STANDART_FILTER}</td>
			<td class="row1" width="50%">
				<select name="standart_filter">
					<!-- BEGIN Filters -->
						{Filters.Filter}
					<!-- END Filters -->
				</select>
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_SCORE_WON}</td>
			<td class="row2" width="50%"> 
				<input type="text" maxlength="5" size="20" name="score_won" value="{L_SCORE_WON}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_SCORE_LOST}</td>
			<td class="row2" width="50%"> 
				<input type="text" maxlength="5" size="20" name="score_lost" value="{L_SCORE_LOST}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_SCORE_CREATE}</td>
			<td class="row2" width="50%"> 
				<input type="text" maxlength="5" size="20" name="score_create" value="{L_SCORE_CREATE}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_SCORE_LETTERS}</td>
			<td class="row2" width="50%"> 
				<input type="text" maxlength="5" size="20" name="score_letters" value="{L_SCORE_LETTERS}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row2" width="50%">{L_HANGMAN_HSC_LETTERS_P}</td>
			<td class="row2" width="50%"> 
				<input type="radio" name="hsc_letters_p" value="0" {L_HSC_LETTERS_P_NO} />{L_NO}&nbsp;&nbsp;
				<input type="radio" name="hsc_letters_p" value="1" {L_HSC_LETTERS_P_YES} />{L_YES}
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td class="row1" width="50%">{L_HANGMAN_STANDART_DAYS}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="standart_days" value="{L_STANDART_DAYS}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row1" width="50%">{L_USER_GAMES_PER_DAY}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="games_per_day" value="{L_GAMES_PER_DAY}" class="post" />
			</td>
		</tr>
		<tr>
			<td class="row1" width="50%">{L_HANGMAN_STANDART_TRIES}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="standart_tries" value="{L_STANDART_TRIES}" class="post" />
			</td>
		</tr><tr>
			<td class="row1" width="50%">{L_HANGMAN_MIN_HELP}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="min_help" value="{L_MIN_HELP}" class="post" />
			</td>
		</tr><tr>
			<td class="row1" width="50%">{L_TRIES_MINIMUM}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="minimum_tries" value="{L_MINIMUM_TRIES}" class="post" />
			</td>
		</tr><tr>
			<td class="row1" width="50%">{L_TRIES_MAXIMUM}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="maximum_tries" value="{L_MAXIMUM_TRIES}" class="post" />
			</td>
		</tr><tr>
			<td class="row1" width="50%">{L_MIN_LETTERS}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="minimum_letters" value="{L_MINIMUM_LETTERS}" class="post" />
			</td>
		</tr>
		<tr>
			<td class="row1" width="50%">{L_MAX_LETTERS}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="4" size="20" name="maximum_letters" value="{L_MAXIMUM_LETTERS}" class="post" />
			</td>
		</tr>		
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td class="row2" width="50%">{L_HANGMAN_HIGHSCORE_FILTER}</td>
			<td class="row2" width="50%">
				<select name="highscore_filter">
					<option value="won" {SEL_won}>{L_ORDER_BY_WON}</option>
					<option value="lost" {SEL_lost}>{L_ORDER_BY_LOST}</option>
					<option value="score" {SEL_score}>{L_ORDER_BY_POINTS}</option>
					<option value="created" {SEL_created}>{L_ORDER_BY_CREATED}</option>
					<option value="r_letters" {SEL_r_letters}>{L_ORDER_BY_R_LETTERS}</option>
					<option value="w_letters" {SEL_w_letters}>{L_ORDER_BY_W_LETTERS}</option>
				</select>
			</td>
		</tr><tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_ALLOWED_LETTERS}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="254" size="30" name="letters" value="{L_ALLOWED_LETTERS}" class="post" />
			</td>
		</tr>
		<tr> 
			<td class="row1" width="50%">{L_HANGMAN_AUTO_REPLACE_LETTERS}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="254" size="30" name="auto_replace_letters" value="{L_AUTO_REPLACE_LETTERS}" class="post" />
			</td>
		</tr>
		<tr>
			<td class="row1" width="50%">{L_HANGMAN_STANDART_TITLE}</td>
			<td class="row1" width="50%"> 
				<input type="text" maxlength="254" size="20" name="standart_title" value="{L_STANDART_TITLE}" class="post" />
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
			</td>
			<td align="center">
				<input type="reset" value="{L_RESET}" class="button" />
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td colspan="2" align="center">	
				<input type="submit" name="del_hangmans" value="{L_RESET_HANGMANS}"  class="button" />
				&nbsp;&nbsp; 
				<input type="submit" name="del_highscore" value="{L_RESET_HIGHSCORE}" class="button" />
				&nbsp;&nbsp; 
				<input type="submit" name="del_won" value="{L_RESET_WON}" class="button" />
				&nbsp;&nbsp; 
				<input type="submit" name="del_time_up" value="{L_RESET_TIME_UP}" class="button" />
			</td>
		</tr>
	</table>
	
</form>
