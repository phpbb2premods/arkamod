<script language="Javascript" type="text/javascript">
<!--
function setCheckboxes(theForm, elementName, isChecked)
{
	var chkboxes = document.forms[theForm].elements[elementName];
	var count = chkboxes.length;

	if (count)
	{
		for (var i = 0; i < count; i++)
		{
			chkboxes[i].checked = isChecked;
	    	}
	}
	else
	{
    		chkboxes.checked = isChecked;
	}
	return true;
}

//-->
</script>

<form method="post" action="{S_TOWN_ACTION}">
<!-- BEGIN main -->
<br />
<table cellspacing="2" cellpadding="2" border="1" align="center" class="forumline" width="50%" >
	<tr>
		<td align="center" class="row1" onMouseOver="this.style.backgroundColor='{T_TD_COLOR2}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR1}" onClick="window.location.href='{U_TOWN_TRAINING}';"><span class="gen">{L_TOWN_TRAINING}</span></td>
	</tr>
	<tr>
		<td align="center" class="row1" onMouseOver="this.style.backgroundColor='{T_TD_COLOR1}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR2}" onClick="window.location.href='{U_TOWN_WAREHOUSE}';"><span class="gen">{L_TOWN_WAREHOUSE}</span></td>
	</tr>
</table>
<br clear="all" />
<!-- END main -->

<!-- BEGIN training -->
<!-- BEGIN training_main -->
<br />
<table cellspacing="2" cellpadding="2" border="1" align="center" class="forumline" width="50%" >
	<tr>
		<td align="center" class="row1" onMouseOver="this.style.backgroundColor='{T_TD_COLOR2}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR1}" onClick="window.location.href='{U_TOWN_TRAINING_SKILL}';"><span class="gen">{L_TOWN_TRAINING_SKILL}</span></td>
	</tr>
	<tr>
		<td align="center" class="row2" onMouseOver="this.style.backgroundColor='{T_TD_COLOR1}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR2}" onClick="window.location.href='{U_TOWN_TRAINING_CHARAC}';"><span class="gen">{L_TOWN_TRAINING_CHARAC}</span></td>
	</tr>
	<tr>
		<td align="center" class="row1" onMouseOver="this.style.backgroundColor='{T_TD_COLOR2}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR1}" onClick="window.location.href='{U_TOWN_TRAINING_UPGRADE}';"><span class="gen">{L_TOWN_TRAINING_UPGRADE}</span></td>
	</tr>
	<!-- BEGIN change -->
	<tr>
		<td align="center" class="row2" onMouseOver="this.style.backgroundColor='{T_TD_COLOR1}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR2}" onClick="window.location.href='{U_TOWN_TRAINING_CHANGE}';"><span class="gen">{L_TOWN_TRAINING_CHANGE}</span></td>
	</tr>
	<!-- END change -->
</table>
<br clear="all" />
<!-- END training_main -->

<!-- BEGIN train_class -->
</form><form method="post" action="{S_TOWN_ACTION}">
<br />
<table cellspacing="1" cellpadding="0" border="0" align="center" class="forumline" width="100%">
	<tr>
		<th align="center">{L_SELECT_UPGRADE}</th>
	</tr>
	<tr>
		<td align="center" class="catHead">{L_SELECT_UPGRADE_COST}</td>
	</tr>
</table>
<br clear="all" />
<table cellspacing="1" cellpadding="0" border="0" align="center" class="forumline" width="100%">
	<tr>
		<th align="center">{L_NEW_CHARACTER_CLASS_DESC}</th>
		<th align="center">{L_NEW_CHARACTER_CLASS_CHOOSE}</th>
	</tr>
	<!-- BEGIN classes -->
	<tr>
		<td width="85%" align="center">
			<table cellspacing="1" cellpadding="2" border="0" align="center" width="100%">
				<tr>
					<td class="row1" width="60%"><span class="gensmall">{L_NAME}</span></td>
					<td class="row2" align="center"><span class="gensmall">{training.train_class.classes.CLASS_NAME}</span></td>
				</tr>
				<tr>
					<td class="row1"><span class="gensmall">{L_DESC}</span></td>
					<td class="row2" align="center"><span class="gensmall">{training.train_class.classes.CLASS_DESC}</span></td>
				</tr>
				<tr>
					<td class="row1"><span class="gensmall">{L_IMG}</span></td>
					<td class="row2" align="center"><img src="./adr/images/classes/{training.train_class.classes.CLASS_IMG}" alt="{classes.CLASS_NAME}" /></td>
				</tr>
				<tr>
					<td class="row1"><span class="gensmall">{L_UPDATE_HP}</span></td>
					<td class="row2" align="center"><span class="gensmall">{training.train_class.classes.UPDATE_HP}</span></td>
				</tr>
				<tr>
					<td class="row1"><span class="gensmall">{L_UPDATE_MP}</span></td>
					<td class="row2" align="center"><span class="gensmall">{training.train_class.classes.UPDATE_MP}</span></td>
				</tr>
				<tr>
					<td class="row1"><span class="gensmall">{L_UPDATE_AC}</span></td>
					<td class="row2" align="center"><span class="gensmall">{training.train_class.classes.UPDATE_AC}</span></td>
				</tr>
			</table>

		</span></td>
		<td class="row1" align="center"><span class="gen"><input type="radio" name="new_class" value="{training.train_class.classes.CLASS_ID}" ></span></td>
	</tr>
	<tr>
		<td class="catBottom" colspan="2" height="3" >&nbsp;</td>
	</tr>
	<!-- END classes -->
</table>
<br clear="all" />
<table cellspacing="1" cellpadding="0" border="0" align="center" class="forumline" width="100%">
	<tr>
		<td align="center" class="catBottom">
			<input type="hidden" name="mode" value="training" />
			<input type="hidden" name="sub_mode" value="{S_HIDDEN}" />
			<input type="submit" value="{L_SELECT_UPGRADE_ACTION}" class="mainoption" />
		</td>
	</tr>
</table>
<br clear="all" />
</form><form method="post" action="{S_TOWN_ACTION}">
<!-- END train_class -->

<!-- BEGIN train_skill -->
<br />
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="right" nowrap="nowrap" width="100%"><span class="gensmall">{POINTS}&nbsp;&nbsp;&nbsp;</span></td>
	</tr>
</table>
<br />
<table cellspacing="1" cellpadding="1" border="1" align="center" class="forumline" width="100%" height="100%">
	<tr>
		<th align="center" colspan="5">{L_SKILLS}</th>
	</tr>
	<tr height="25">
		<td class="row2" align="center"><span class="gen"><b>{L_NAME}</b></span></td>
		<td class="row2" align="center"><span class="gen"><b>{L_LEVEL}</b></span></td>
		<td class="row2" align="center"><span class="gen"><b>{L_COST}</b></span></td>
		<td class="row2" align="center"><span class="gen"><b>{L_SELECT}</b></span></td>
	</tr>
	<tr>
		<td class="row1" align="center"><span class="gensmall">{L_MINING}</span></td>
		<td class="row1" align="center"><span class="gen">{MINING}</span></td>
		<td class="row1" align="center"><span class="gen">{MINING_COST}</span></td>
		<td class="row1" align="center">
			<input type="radio" name="training_skill" value="1">
		</td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall">{L_STONE}</span></td>
		<td class="row2" align="center"><span class="gen">{STONE}</span></td>
		<td class="row2" align="center"><span class="gen">{STONE_COST}</span></td>
		<td class="row2" align="center">
			<input type="radio" name="training_skill" value="2">
		</td>
	</tr>
	<tr>
		<td class="row1" align="center"><span class="gensmall">{L_FORGE}</span></td>
		<td class="row1" align="center"><span class="gen">{FORGE}</span></td>
		<td class="row1" align="center"><span class="gen">{FORGE_COST}</span></td>
		<td class="row1" align="center">
			<input type="radio" name="training_skill" value="3">
		</td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall">{L_ENCHANTMENT}</span></td>
		<td class="row2" align="center"><span class="gen">{ENCHANTMENT}</span></td>
		<td class="row2" align="center"><span class="gen">{ENCHANTMENT_COST}</span></td>
		<td class="row2" align="center">
			<input type="radio" name="training_skill" value="4">
		</td>
	</tr>
   <tr>
      <td class="row1" align="center"><span class="gensmall">{L_THIEF}</span></td>
      <td class="row1" align="center"><span class="gen">{THIEF}</span></td>
      <td class="row1" align="center"><span class="gen">{THIEF_COST}</span></td>
      <td class="row1" align="center">
         <input type="radio" name="training_skill" value="6">
      </td>
   </tr>
</table>
<br clear="all" />
<table cellspacing="1" cellpadding="0" border="0" align="center" class="forumline" width="100%">
	<tr>
		<td align="center" class="catBottom">
			<input type="hidden" name="mode" value="training" />
			<input type="hidden" name="sub_mode" value="train_skill_action" />
			<input type="submit" value="{L_SKILLS_ACTION}" class="mainoption" />
		</td>
	</tr>
</table>
</form><form method="post" action="{S_TOWN_ACTION}">
<!-- END train_skill -->


<!-- BEGIN train_charac -->
<br />
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="right" nowrap="nowrap" width="100%"><span class="gensmall">{POINTS}&nbsp;&nbsp;&nbsp;</span></td>
	</tr>
</table>
<br />
<table cellspacing="1" cellpadding="1" border="1" align="center" class="forumline" width="100%" height="100%">
	<tr>
		<th align="center" colspan="5">{L_SKILLS}</th>
	</tr>
	<tr height="25">
		<td class="row2" align="center"><span class="gen"><b>{L_NAME}</b></span></td>
		<td class="row2" align="center"><span class="gen"><b>{L_LEVEL}</b></span></td>
		<td class="row2" align="center"><span class="gen"><b>{L_COST}</b></span></td>
		<td class="row2" align="center"><span class="gen"><b>{L_SELECT}</b></span></td>
	</tr>
	<tr>
		<td class="row1" align="center"><span class="gensmall">{L_MINING}</span></td>
		<td class="row1" align="center"><span class="gen">{MINING}</span></td>
		<td class="row1" align="center"><span class="gen">{MINING_COST}</span></td>
		<td class="row1" align="center">
			<input type="radio" name="training_charac" value="1">
		</td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall">{L_STONE}</span></td>
		<td class="row2" align="center"><span class="gen">{STONE}</span></td>
		<td class="row2" align="center"><span class="gen">{STONE_COST}</span></td>
		<td class="row2" align="center">
			<input type="radio" name="training_charac" value="2">
		</td>
	</tr>
	<tr>
		<td class="row1" align="center"><span class="gensmall">{L_FORGE}</span></td>
		<td class="row1" align="center"><span class="gen">{FORGE}</span></td>
		<td class="row1" align="center"><span class="gen">{FORGE_COST}</span></td>
		<td class="row1" align="center">
			<input type="radio" name="training_charac" value="3">
		</td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall">{L_ENCHANTMENT}</span></td>
		<td class="row2" align="center"><span class="gen">{ENCHANTMENT}</span></td>
		<td class="row2" align="center"><span class="gen">{ENCHANTMENT_COST}</span></td>
		<td class="row2" align="center">
			<input type="radio" name="training_charac" value="4">
		</td>
	</tr>
	<tr>
		<td class="row1" align="center"><span class="gensmall">{L_TRADING}</span></td>
		<td class="row1" align="center"><span class="gen">{TRADING}</span></td>
		<td class="row1" align="center"><span class="gen">{TRADING_COST}</span></td>
		<td class="row1" align="center">
			<input type="radio" name="training_charac" value="5">
		</td>
	</tr>
	<tr>
		<td class="row2" align="center"><span class="gensmall">{L_THIEF}</span></td>
		<td class="row2" align="center"><span class="gen">{THIEF}</span></td>
		<td class="row2" align="center"><span class="gen">{THIEF_COST}</span></td>
		<td class="row2" align="center">
			<input type="radio" name="training_charac" value="6">
		</td>
	</tr>
</table>
<br clear="all" />
<table cellspacing="1" cellpadding="0" border="0" align="center" class="forumline" width="100%">
	<tr>
		<td align="center" class="catBottom">
			<input type="hidden" name="mode" value="training" />
			<input type="hidden" name="sub_mode" value="train_charac_action" />
			<input type="submit" value="{L_SKILLS_ACTION}" class="mainoption" />
		</td>
	</tr>
</table>
</form>
<form method="post" action="{S_TOWN_ACTION}">
<!-- END train_charac -->
<br clear="all" />
<!-- END training -->

<!-- BEGIN warehouse -->
<br clear="all" />
<!-- BEGIN no_warehouse -->
</form>
<form method="post" action="{S_MODE_ACTION}" name="items_form" >
<br />
<table width="100%" border="2" cellspacing="1" cellpadding="3" align="center">
	<tr>
		<th align="center" >{L_PERSONAL_WAREHOUSE}</th>
	</tr>
	<tr>
		<td class="row2" align="center" ><span class="gen">{L_NO_WAREHOUSE}</span> </td>
	</tr>
	<tr>
		<td class="row3" align="center" ><input type="submit" value="{L_OPEN_WAREHOUSE}" name="open" class="mainoption" /></td>
	</tr>
</table>
</form>
<br clear="all" />
<form method="post" action="{S_MODE_ACTION}">
<!-- END no_warehouse -->

<!-- BEGIN see_warehouse -->
</form>
<form method="post" action="{S_MODE_ACTION}" name="items_form" >
<br />
<table cellspacing="1" cellpadding="1" border="0" align="center" class="forumline" width="100%" >
	<tr>
		<td align="center" class="catHead"><span class="gen">{OWNER_NAME}{OWNER_S}{WAREHOUSE_NAME}</span></td>
	</tr>
</table>
<br />
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="center" nowrap="nowrap">
			<span class="genmed">
			<a href="#" onclick="setCheckboxes('items_form', 'item_box[]', true); return false;" class="gensmall">{L_CHECK_ALL}</a>&nbsp;/&nbsp;
			<a href="#" onclick="setCheckboxes('items_form', 'item_box[]', false); return false;" class="gensmall">{L_UNCHECK_ALL}</a>
			</span>
		</td>
		<td align="center" nowrap="nowrap"><span class="genmed">
			{L_SELECT_SORT_METHOD}:&nbsp;{S_MODE_SELECT}&nbsp;&nbsp;
			{L_ORDER}&nbsp;{S_ORDER_SELECT}&nbsp;&nbsp;
			{L_SELECT_CAT}&nbsp;:&nbsp;{SELECT_CAT}&nbsp;&nbsp;
			<input type="submit" value="{L_SORT}" class="liteoption" /></span>
		</td>
	</tr>
</table>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
	<tr>
		<th align="center">&nbsp;</th>
		<th align="center">{L_ITEM_NAME}:</th>
		<th align="left">{L_ITEM_DESC}:</th>
		<th align="center">{L_ITEM_PRICE}:</th>
		<th align="center">{L_ITEM_QUALITY}:</th>
		<th align="center">{L_ITEM_POWER}:</th>
		<th align="center">{L_ITEM_WEIGHT}:</th>
		<th align="center">{L_ITEM_DURATION}:</th>
		<th align="center">{L_ITEM_TYPE}:</th>
	</tr>
<!-- BEGIN items -->
	<tr>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center">
			<input type="hidden" name="warehouse_owner_id" value="{warehouse_OWNER_ID}" />
			<input type="checkbox" name="item_box[]" value="{warehouse.see_warehouse.items.ITEM_ID}" />
		</td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" ><img style="border:0" src="./adr/images/items/{warehouse.see_warehouse.items.ITEM_IMG}"><br /><span class="gen"><b>{warehouse.see_warehouse.items.ITEM_NAME}</b></font></span></a></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="left" ><span class="gensmall">&nbsp;<i>{warehouse.see_warehouse.items.ITEM_DESC}</i></ span></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" ><span class="gensmall">{warehouse.see_warehouse.items.ITEM_PRICE}</span></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" ><span class="gensmall">{warehouse.see_warehouse.items.ITEM_QUALITY}</span></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" ><span class="gensmall">{warehouse.see_warehouse.items.ITEM_POWER}</span></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" ><span class="gensmall">{warehouse.see_warehouse.items.ITEM_WEIGHT}</span></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" nowrap="nowrap"><span class="gensmall">{warehouse.see_warehouse.items.ITEM_DURATION} / {warehouse.see_warehouse.items.ITEM_DURATION_MAX}</span></td>
		<td class="{warehouse.see_warehouse.items.ROW_CLASS}" align="center" ><span class="gensmall">{warehouse.see_warehouse.items.ITEM_TYPE}</span></td>
	</tr>
<!-- END items -->
	<tr>
		<td class="catBottom" colspan="10" height="28" align="left">{ACTION_SELECT}&nbsp;<input type="submit" value="{L_SUBMIT}" class="mainoption" /></td>
	</tr>
</table>
<br /><br />
<table cellspacing="2" cellpadding="2" border="1" align="center" class="forumline" width="50%" >
	<tr>
		<td align="center" class="row2" onMouseOver="this.style.backgroundColor='{T_TD_COLOR1}'; this.style.cursor='pointer';" onMouseOut=this.style.backgroundColor="{T_TR_COLOR2}" onClick="window.location.href='{U_WAREHOUSE_DELETE}';"><span class="gen">{L_WAREHOUSE_DELETE}</span></td>
	</tr>
</table>
<br />
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr> 
		<td><span class="nav">{PAGE_NUMBER}</span></td>
		<td align="right"><span class="gensmall"><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>

</form>
<form method="post" action="{S_MODE_ACTION}">
<!-- END see_warehouse -->
<br clear="all" />
<!-- END warehouse -->
</form>
<br clear="all" />
