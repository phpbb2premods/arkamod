
<form method="post" action="{S_ITEMS_ACTION}">

<h1>{L_ITEMS_TITLE}</h1>

<p>{L_ITEMS_EXPLAIN}</p>

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="row1" width="60%">{L_NAME}<br /><span class="gensmall">{L_NAME_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="item_name" value="{ITEM_NAME}" size="30" maxlength="255" />
	<!-- BEGIN edit -->
		<br /><span class="gensmall">{ITEM_NAME_EXPLAIN}</span>
	<!-- END edit -->
		</td>
	</tr>
	<tr>
		<td class="row1" width="60%">{L_DESC}<br /><span class="gensmall">{L_NAME_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="item_desc" value="{ITEM_DESC}" size="30" rowspan="2" maxlength="255" />
	<!-- BEGIN edit -->
		<br /><span class="gensmall">{ITEM_DESC_EXPLAIN}</span>
	<!-- END edit -->
		</td>
	</tr>
	<tr>
		<td class="row1">{L_IMG}<br /><span class="gensmall">{L_IMG_EXPLAIN}</span></td>
	<!-- BEGIN add -->
		<td class="row2" align="center" ><input type="text" name="item_img" size="30" maxlength="255" /></td>
	<!-- END add -->
	<!-- BEGIN edit -->
		<td class="row2" align="center" ><input type="text" name="item_img" value="{ITEM_IMG}" size="30" maxlength="255" /><br /><img src="../adr/images/items/{ITEM_IMG}" alt="{ITEM_NAME}" /></td>
	<!-- END edit -->
	<!-- BEGIN copy -->
		<td class="row2" align="center" ><input type="text" name="item_img" value="{ITEM_IMG}" size="30" maxlength="255" /><br /><img src="../adr/images/items/{ITEM_IMG}" alt="{ITEM_NAME}" /></td>
	<!-- END copy -->
	</tr>
	<tr>
		<td class="row1">{L_ITEM_QUALITY}</td>
		<td class="row2" align="center" >{ITEM_QUALITY}</td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_TYPE}</td>
		<td class="row2" align="center" >{ITEM_TYPE}</td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_POWER}</td>
		<td class="row2" align="center" ><input type="text" name="item_power" size="8" maxlength="8" value="{ITEM_POWER}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_ADD_POWER}<br /><span class="gensmall"><i>{L_ITEM_ADD_POWER_EXPLAIN}</i></span></td>
		<td class="row2" align="center" ><input type="text" name="item_add_power" size="5" maxlength="5" value="{ITEM_ADD_POWER}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_MP_USE}<br /><span class="gensmall"><i>{L_ITEM_MP_USE_EXPLAIN}</i></span></td>
		<td class="row2" align="center" ><input type="text" name="item_mp_use" size="5" maxlength="5" value="{ITEM_MP_USE}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_DURATION}</td>
		<td class="row2" align="center" ><input type="text" name="item_duration" size="8" maxlength="8" value="{ITEM_DURATION}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_DURATION_MAX}</td>
		<td class="row2" align="center" ><input type="text" name="item_duration_max" size="8" maxlength="8" value="{ITEM_DURATION_MAX}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_PRICE}<br /><span class="gensmall">{L_ITEM_PRICE_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="item_price" size="8" maxlength="8" value="{ITEM_PRICE}" />&nbsp;<span class="gensmall">{L_POINTS}</span></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_SELL_BACK_PERCENT}<br /><span class="gensmall">{L_ITEM_SELL_BACK_PERCENT_EXPLAIN}</span></td>
		<td class="row2" align="center" ><input type="text" name="item_sell_back_percent" size="8" maxlength="3" value="{ITEM_SELL_BACK_PERCENT}" />&nbsp;%</td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="row1" width="60%">{L_ITEM_WEIGHT}</td>
		<td class="row2" align="center" ><input type="text" name="item_weight" size="8" maxlength="8" value="{ITEM_WEIGHT}" /></td>
	</tr>
	<tr>
		<td class="row1" width="60%">{L_ITEM_MAX_SKILL}</td>
		<td class="row2" align="center" ><input type="text" name="item_max_skill" size="8" maxlength="8" value="{ITEM_MAX_SKILL}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_AUTH}</td>
		<td class="row2" align="center" ><input type="checkbox" name="item_auth" value="1" {ITEM_AUTH} /></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_STORE}</td>
		<td class="row2" align="center" ><span class="gensmall">{ITEM_STORE_LIST}</span></td>
	</tr>
	<tr>
		<td class="row1" width="75%">{L_ITEM_STEAL}<br><span class="gensmall"><i>{L_ITEM_STEAL_EXPLAIN}</i></span></td>
		<td class="row2" align="center"><span class="gensmall">{ITEM_STEAL_LIST}</span></td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="row1">{L_ITEM_ELEMENT}</td>
		<td class="row2" align="center" ><span class="gensmall">{ITEM_ELEMENT_LIST}</span></td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_ELEMENT_STR}</td>
		<td class="row2" align="center" ><input type="text" name="item_element_str" size="4" maxlength="4" value="{ITEM_ELEMENT_STR}" />%</td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_ELEMENT_SAME}</td>
		<td class="row2" align="center" ><input type="text" name="item_element_same" size="4" maxlength="4" value="{ITEM_ELEMENT_SAME}" />%</td>
	</tr>
	<tr>
		<td class="row1">{L_ITEM_ELEMENT_WEAK}</td>
		<td class="row2" align="center" ><input type="text" name="item_element_weak" size="4" maxlength="4" value="{ITEM_ELEMENT_WEAK}" />%</td>
	</tr>
</table>

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<th align="center" colspan="3">{L_RESTRICT_TITLE}</th>
	</tr>
	<tr>
		<td class="row1" width="75%" valign="top"><b>{L_RESTRICT_LEVEL}</b>:<br><span class="gensmall"><i>{L_RESTRICT_LEVEL_EXPLAIN}</i></span></td>
		<td class="row2" align="center" colspan="2">
            <input type="text" name="restrict_level" size="5" maxlength="5" value="{RESTRICT_LEVEL}" />
	</tr>
	<tr>
		<td class="row1" width="75%" valign="top" rowspan="3"><b>{L_RESTRICT_CHARS}</b>:<br><span class="gensmall"><i>{L_RESTRICT_CHARS_EXPLAIN}</i></span></td>
		<td class="row2" align="center" width="12%"><span class="gensmall"><b>{L_RESTRICT_STR}</b></span><br>
            <input type="text" name="restrict_str" size="5" maxlength="5" value="{RESTRICT_STR}" /></td>
		<td class="row2" align="center" width="13%"><span class="gensmall"><b>{L_RESTRICT_DEX}</b></span><br>
            <input type="text" name="restrict_dex" size="5" maxlength="5" value="{RESTRICT_DEX}" /></td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall"><b>{L_RESTRICT_INT}</b></span><br>
            <input type="text" name="restrict_int" size="5" maxlength="5" value="{RESTRICT_INT}" /></td>
		<td class="row2" align="center"><span class="gensmall"><b>{L_RESTRICT_WIS}</b></span><br>
            <input type="text" name="restrict_wis" size="5" maxlength="5" value="{RESTRICT_WIS}" /></td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall"><b>{L_RESTRICT_CHA}</b></span><br>
            <input type="text" name="restrict_cha" size="5" maxlength="5" value="{RESTRICT_CHA}" /></td>
		<td class="row2" align="center"><span class="gensmall"><b>{L_RESTRICT_CON}</b></span><br>
            <input type="text" name="restrict_con" size="5" maxlength="5" value="{RESTRICT_CON}" /></td>
	</tr>
<!--
	<tr>
		<td class="row1" width="75%" valign="top" rowspan="3"><b>{L_RESTRICT_WEAP_PROFS}</b>:<br><span class="gensmall"><i>{L_RESTRICT_WEAP_PROFS_EXPLAIN}</i></span></td>
		<td class="row2" align="left" width="12%"><span class="gensmall"><b>{L_RESTRICT_PROF_SLASH}</b>:</span></td>
		<td class="row2" align="center" width="13%">
			<input type="text" name="restrict_slash" size="5" maxlength="5" value="{RESTRICT_PROF_SLASH}" /></td>
	</tr>
	<tr>
		<td class="row2" align="left" width="12%"><span class="gensmall"><b>{L_RESTRICT_PROF_BLUDGE}</b>:</span></td>
		<td class="row2" align="center" width="13%">
			<input type="text" name="restrict_bludge" size="5" maxlength="5" value="{RESTRICT_PROF_BLUDGE}" /></td>
	</tr>
	<tr>
		<td class="row2" align="left" width="12%"><span class="gensmall"><b>{L_RESTRICT_PROF_PIERCE}</b>:</span></td>
		<td class="row2" align="center" width="13%">
			<input type="text" name="restrict_pierce" size="5" maxlength="5" value="{RESTRICT_PROF_PIERCE}" /></td>
	</tr>
-->
	<tr>
		<td class="row1" width="75%"><b>{L_RESTRICT_ALIGNMENT_ENABLE}</b>:<br><span class="gensmall"><i>{L_RESTRICT_ALIGNMENT_ENABLE_EXPLAIN}</i></span></td>
		<td class="row2" align="center" colspan="2"><input type="checkbox" name="alignment_enable" value="1" {ALIGNMENT_TYPE_ENABLE} /></td>
	</tr>
	<tr>
		<td class="row1" width="75%" valign="top"><b>{L_RESTRICT_ALIGNMENT}</b>:</td>
		<td class="row2" align="center" colspan="2">{ALIGNMENT_LIST}</td>
	</tr>
	<tr>
		<td class="row1" width="75%"><b>{L_RESTRICT_CLASS_ENABLE}</b>:<br><span class="gensmall"><i>{L_RESTRICT_CLASS_ENABLE_EXPLAIN}</i></span></td>
		<td class="row2" align="center" colspan="2"><input type="checkbox" name="class_enable" value="1" {CLASS_TYPE_ENABLE} /></td>
	</tr>
	<tr>
		<td class="row1" width="75%" valign="top"><b>{L_RESTRICT_CLASS}</b>:</td>
		<td class="row2" align="center" colspan="2">{CLASS_LIST}</td>
	</tr>
	<tr>
		<td class="row1" width="75%"><b>{L_RESTRICT_ELEMENT_ENABLE}</b>:<br><span class="gensmall"><i>{L_RESTRICT_ELEMENT_ENABLE_EXPLAIN}</i></span></td>
		<td class="row2" align="center" colspan="2"><input type="checkbox" name="element_enable" value="1" {ELEMENT_TYPE_ENABLE} /></td>
	</tr>
	<tr>
		<td class="row1" width="75%" valign="top"><b>{L_RESTRICT_ELEMENT}</b>:</td>
		<td class="row2" align="center" colspan="2">{ELEMENT_LIST}</td>
	</tr>
	<tr>
		<td class="row1" width="75%"><b>{L_RESTRICT_RACE_ENABLE}</b>:<br><span class="gensmall"><i>{L_RESTRICT_RACE_ENABLE_EXPLAIN}</i></span></td>
		<td class="row2" align="center" colspan="2"><input type="checkbox" name="race_enable" value="1" {RACE_TYPE_ENABLE} /></td>
	</tr>
	<tr>
		<td class="row1" width="75%" valign="top"><b>{L_RESTRICT_RACE}</b>:</td>
		<td class="row2" align="center" colspan="2">{RACE_LIST}</td>
	</tr>
</table>

<!-- BEGIN edit -->
<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="row1" width="75%"><b>{L_MASS_ITEM_DELETION}</b>:<br><span class="gensmall"><i>{L_MASS_ITEM_DELETION_EXPLAIN}</i></span></td>
		<td class="row2" align="center" colspan="2"><input type="checkbox" name="mass_item_deletion" value="1" {MASS_ITEM_DELETION} /></td>
	</tr>
</table>
<!-- END edit -->

<br clear="all" />

<table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center" width="90%">
	<tr>
		<td class="catBottom" align="center" colspan="2">{S_HIDDEN_FIELDS}<input class="mainoption" type="submit" value="{L_SUBMIT}" /></td>
	</tr>
</table>

</form>
