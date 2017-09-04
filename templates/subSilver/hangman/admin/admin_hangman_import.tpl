<center>
<div class="maintitle">{L_IMPORT_EXPORT_TITLE}</div>
<br />
<div class="genmed">{L_IMPORT_EXPORT_EXPLAIN}</div>
<br />
<form action="{U_IMPORT}" method="POST" enctype="multipart/form-data">
<table width="75%" class="forumline">
	<tr>
		<th colspan="3">{L_IMPORT}</th>
	</tr>
	<tr>
		<td class="row1">{L_IMPORT_IGNORE_DOUBLES}</td>
		<td class="row1"><input type="checkbox" class="post" name="ignore_doubles"></td>
		<td class="row1">
		</td>
	</tr>
	<tr>
		<td class="row2">{L_IMPORT_MAXIMUM}</td>
		<td class="row2"><input type="text" class="post" name="max_import" value="100"></td>
		<td class="row2"><input type="checkbox" class="post" name="chk_max_import"></td>
	</tr>
	<tr>
		<td class="row1">{L_IMPORT_USERNAME}</td>
		<td class="row1"><input type="text" class="post" name="import_username"></td>
		<td class="row1"><input type="checkbox" class="post" name="chk_import_username"></td>
	</tr>
	<tr>
		<td class="row2">{L_IMPORT_MIN_LETTERS}</td>
		<td class="row2"><input type="text" class="post" name="import_min_letters"></td>
		<td class="row2"><input type="checkbox" class="post" name="chk_import_min_letters"></td>
	</tr>
	<tr>
		<td class="row1">{L_IMPORT_IGNORE_DL}</td>
		<td class="row1" colspan="2"><input type="checkbox" class="post" name="chk_ignore_days_left">
		<span class="gensmall">{L_IMPORT_IGNORE_DL_}</span></td>
	</tr>
	<tr>
		<td class="row2" colspan="3" align="center">{L_IMPORT_FILE}
		<input type="file" class="post" name="import_filename">
		<input type="submit" name="import" value="Import" class="mainoption"></td>
	</tr>
</table>
</form>
<br>
<hr/>
<br>
<form action="{U_EXPORT}" method="POST" enctype="multipart/form-data">
<table width="75%" class="forumline" align="center">
	<tr>
		<th colspan="3">{L_EXPORT}</th>
	</tr>
	<tr>
		<td class="row1">
			{L_EXPORT_START_AT}</td>
		<td class="row1">
			<input type="checkbox" name="chk_export_start_at"></td>
		<td class="row1">
			<input type="text" name="export_start_at" value="{EXPORT_START_AT}">
		</td>
	</tr>
	<tr>
		<td class="row2">
			{L_EXPORT_END_AT}</td>
		<td class="row2">
			<input type="checkbox" name="chk_export_end_at"></td>
		<td class="row2">
			<input type="text" name="export_end_at" value="{EXPORT_END_AT}">
		</td>
	</tr>
	<tr>
		<td class="row1">{L_EXPORT_ALL}</td>
		<td class="row1">
			<input type="checkbox" class="post" name="chk_export_all">
		</td>
		<td class="row1">
		</td>
	</tr>
	<tr>
		<td class="row2">
			{L_EXPORT_MAX}</td>
		<td class="row2">
			<input type="checkbox" class="post" name="chk_export_max"></td>
		<td class="row2">
			<input type="text" class="post" name="export_max" value="100"></td>
	</tr>
	<tr>
		<td class="row1">
			{L_EXPORT_LETTERS}</td>
		<td class="row1">
			<input type="checkbox" class="post" name="chk_export_word_check"></td>
		<td class="row1">
			<input type="text" class="post" name="export_word_check" value="{EXPORT_WITH_LETTERS}"></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="submit" name="export" value="Export" class="mainoption">
		</td>
	</tr>
</table>
</form>
</center>