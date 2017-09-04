
<form method="post" action="{S_MONSTERS_ACTION}">

<h1>{L_MONSTERS_TITLE}</h1>

<p>{L_MONSTERS_EXPLAIN}</p>

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="row1" width="60%">{L_NAME}<br /><span class="gensmall">{L_KEY_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="monster_name" value="{NAME}" size="30" maxlength="255" />
	<!-- BEGIN monsters_edit -->
		<br /><span class="gensmall">{NAME_EXPLAIN}</span>
	<!-- END monsters_edit -->
		</td>
	</tr>

	<tr>
		<td class="row1">{L_IMG}<br /><span class="gensmall">{L_IMG_EXPLAIN}</span></td>
	<!-- BEGIN monsters_add -->
		<td class="row2" align="center" ><input type="text" name="monster_img" size="30" maxlength="255" /></td>
	<!-- END monsters_add -->
	<!-- BEGIN monsters_edit -->
		<td class="row2" align="center" ><input type="text" name="monster_img" value="{IMG}" size="30" maxlength="255" /><br /><img src="../adr/images/monsters/{IMG_EX}" alt="{NAME}" /></td>
	<!-- END monsters_edit -->
	</tr>
	<tr>
		<td class="row1">{L_LEVEL}</td>
		<td class="row2" align="center" ><input type="text" name="monster_level" size="4" maxlength="8" value="{LEVEL}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_HP}</td>
		<td class="row2" align="center" ><input type="text" name="hp" size="4" maxlength="8" value="{BASE_HP}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_MP}</td>
		<td class="row2" align="center" ><input type="text" name="mp" size="4" maxlength="8" value="{BASE_MP}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_DEF}</td>
		<td class="row2" align="center" ><input type="text" name="def" size="4" maxlength="8" value="{BASE_DEF}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_ATT}</td>
		<td class="row2" align="center" ><input type="text" name="att" size="4" maxlength="8" value="{BASE_ATT}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_MA}</td>
		<td class="row2" align="center" ><input type="text" name="ma" size="4" maxlength="8" value="{BASE_MA}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_MD}</td>
		<td class="row2" align="center" ><input type="text" name="md" size="4" maxlength="8" value="{BASE_MD}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_MP_POWER}</td>
		<td class="row2" align="center" ><input type="text" name="mp_power" size="4" maxlength="8" value="{BASE_MP_POWER}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_ELEMENT}</td>
		<td class="row2" align="center" ><span class="gensmall">{BASE_ELEMENT}</span></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_SP}</td>
		<td class="row2" align="center" ><input type="text" name="sp" size="4" maxlength="8" value="{BASE_SP}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_BASE_SPELL}<br /><span class="gensmall"><i>{L_BASE_SPELL_EXPLAIN}</i></span></td>
		<td class="row2" align="center" ><input type="text" name="custom_spell" value="{BASE_SPELL}" size="30" maxlength="100" /></td>
	</tr>
	<tr>
		<td class="row1">{L_THIEF_SKILL}</td>
		<td class="row2" align="center" ><input type="text" name="thief_skill" size="3" maxlength="8" value="{THIEF_SKILL}" /></td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="95%">
	<tr>
		<td class="catBottom" align="center" colspan="2">{S_HIDDEN_FIELDS}<input class="mainoption" type="submit" value="{L_SUBMIT}" /></td>
	</tr>
</table>

</form>