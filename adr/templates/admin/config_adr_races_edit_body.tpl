
<form method="post" action="{S_RACES_ACTION}">

<h1>{L_RACES_TITLE}</h1>

<p>{L_RACES_EXPLAIN}</p>

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="row1" width="60%">{L_NAME}<br /><span class="gensmall">{L_NAME_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="race_name" value="{RACE_NAME}" size="30" maxlength="255" />
	<!-- BEGIN races_edit -->
		<br /><span class="gensmall">{RACE_NAME_EXPLAIN}</span>
	<!-- END races_edit -->
		</td>
	</tr>
	<tr>
		<td class="row1" width="60%">{L_DESC}<br /><span class="gensmall">{L_NAME_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="race_desc" value="{RACE_DESC}" size="30" rowspan="2" maxlength="255" />
	<!-- BEGIN races_edit -->
		<br /><span class="gensmall">{RACE_DESC_EXPLAIN}</span>
	<!-- END races_edit -->
		</td>
	</tr>
	<tr>
		<td class="row1">{L_IMG}<br /><span class="gensmall">{L_IMG_EXPLAIN}</span></td>
	<!-- BEGIN races_add -->
		<td class="row2" align="center" ><input type="text" name="race_img" size="30" maxlength="255" /></td>
	<!-- END races_add -->
	<!-- BEGIN races_edit -->
		<td class="row2" align="center" ><input type="text" name="race_img" value="{RACE_IMG}" size="30" maxlength="255" /><br /><img src="../adr/images/races/{RACE_IMG_EX}" alt="{RACE_NAME}" /></td>
	<!-- END races_edit -->
	</tr>
	<tr>
		<td class="row1">{L_LEVEL}<br /><span class="gensmall">{L_LEVEL_EXPLAIN}</span></td>
		<td class="row2" align="center" >{LEVEL_LIST}</td>
	</tr>
	<tr>
		<td class="row1" width="60%">{L_RACES_WEIGHT}</td>
		<td class="row2" align="center" ><input type="text" name="weight" value="{RACE_WEIGHT}" size="8" maxlength="12" /></td>
	</tr>
	<tr>
		<td class="row1">{L_RACES_WEIGHT_PER_LEVEL}</td>
		<td class="row2" align="center" ><input type="text" name="weight_per_level" value="{RACE_WEIGHT_PER_LEVEL}" size="3"  maxlength="5" />%</td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="60%">
	<tr>
		<td class="row1" width="60%">{L_MIGHT_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="might_bonus" value="{MIGHT_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_DEXT_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="dext_bonus" value="{DEXT_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_CONST_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="const_bonus" value="{CONST_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_INT_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="int_bonus" value="{INT_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_WIS_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="wis_bonus" value="{WIS_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_CHA_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="cha_bonus" value="{CHA_BONUS}" size="8" maxlength="8" /></td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="60%">
	<tr>
		<td class="row1" width="60%">{L_MINING_BONUS}</td>
		<td class="row2" align="center"  ><input type="text" name="mining_bonus" value="{MINING_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_STONE_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="stone_bonus" value="{STONE_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_FORGE_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="forge_bonus" value="{FORGE_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ENCHANT_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="enchant_bonus" value="{ENCHANT_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_TRADING_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="trading_bonus" value="{TRADING_BONUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_THIEF_BONUS}</td>
		<td class="row2" align="center" ><input type="text" name="thief_bonus" value="{THIEF_BONUS}" size="8" maxlength="8" /></td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="60%">
	<tr>
		<td class="row1" width="60%">{L_MIGHT_MALUS}</td>
		<td class="row2" align="center" ><input type="text" name="might_malus" value="{MIGHT_MALUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_DEXT_MALUS}</td>
		<td class="row2" align="center" ><input type="text" name="dext_malus" value="{DEXT_MALUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_CONST_MALUS}</td>
		<td class="row2" align="center" ><input type="text" name="const_malus" value="{CONST_MALUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_INT_MALUS}</td>
		<td class="row2" align="center" ><input type="text" name="int_malus" value="{INT_MALUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_WIS_MALUS}</td>
		<td class="row2" align="center" ><input type="text" name="wis_malus" value="{WIS_MALUS}" size="8" maxlength="8" /></td>
	</tr>
	<tr>
		<td class="row1">{L_CHA_MALUS}</td>
		<td class="row2" align="center" ><input type="text" name="cha_malus" value="{CHA_MALUS}" size="8" maxlength="8" /></td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="95%">
	<tr>
		<td class="catBottom" align="center" colspan="2">{S_HIDDEN_FIELDS}<input class="mainoption" type="submit" value="{L_SUBMIT}" /></td>
	</tr>
</table>

</form>