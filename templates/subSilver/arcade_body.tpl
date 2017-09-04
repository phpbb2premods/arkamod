 <!-- affichage de la phrase d'index -->
  <table width="100%" cellspacing="2" cellpadding="2" border="0">
    <tr>
	  <td align="left" valign="middle" width="100%">
		<span class="nav">
			<a href="{U_INDEX}" class="nav">{L_INDEX}</a>
		</span>
		<span class="nav">>&nbsp;Arcade</span>
	  </td>
    </tr>
  </table>
{HEADINGARCADE}
<br />
{CHAMPIONNATARCADE}
<br />
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
  <tr> 
	<th class="thTop" colspan="{ARCADE_COL}" nowrap="nowrap">&nbsp;{L_ARCADE}&nbsp;</th>
  </tr>
  <!-- BEGIN use_category_mod -->
  <tr> 
	<td class="cat" colspan="{ARCADE_COL}" nowrap="nowrap" align="center"><span class="cattitle">{CATTITLE}</span></td>
  </tr>
  <!-- END use_category_mod -->
  <tr> 
	<td class="cat" height="28" align="center" colspan="2"><span class="cattitle">{L_GAME}</span></td>
	<td class="cat" nowrap="nowrap" align="center"><span class="cattitle">{L_HIGHSCORE}</span></td>
	<td class="cat" nowrap="nowrap" align="center"><span class="cattitle">{L_YOURSCORE}</span></td>
	<td class="cat" colspan="{ARCADE_COL1}" nowrap="nowrap" align="center"><span class="cattitle">{L_DESC}</span></td>
  </tr>
{ARCADE_FAVORIS}
  <!-- BEGIN gamerow -->
  <tr> 
	<td class="row1" height="25" width='35' align='center'>{gamerow.GAMEPIC}</td>
	<td class="row1" height="25">
	    <span class='genmed'>{gamerow.GAMELINK}</span><br />
		<span class='gensmall'>{gamerow.GAMESET}</span>
	</td>
	<td class="row1" align="center" valign="center" >
		<span class='gen'>
		{gamerow.NORECORD}
	  <!-- BEGIN recordrow -->
	<b>{gamerow.HIGHSCORE}</b></span><span class='gensmall'>&nbsp;&nbsp;{gamerow.HIGHUSER}<br/>{gamerow.DATEHIGH}
	   <!-- END recordrow -->
	    </span>
	   
	</td>
	<td class="row1" align="center" valign="center" >
	<span class='gen'>
		{gamerow.NOSCORE}
	  <!-- BEGIN yourrecordrow -->
	<b>{gamerow.YOURHIGHSCORE}{gamerow.IMGFIRST}</b></span><span class='gensmall'><br/>{gamerow.YOURDATEHIGH}
	   <!-- END yourrecordrow -->
	    </span>   
	</td>
	<td class="row1" align="center" valign="center">
		<table width="100%">
		<tr>
		 <td align="center">
		<span class="name">{gamerow.GAMEDESC}</span>
		 </td>
		 <td width="25">{gamerow.URL_SCOREBOARD}</td>
	    </tr>
		</table>
	</td>
{gamerow.ADD_FAV}
  </tr>
  <!-- END gamerow -->
</table>
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{PAGE_NUMBER}</span></td>
		<td align="right" valign="middle"><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>
{WHOISPLAYING}
  <table width="100%" cellpadding="5" cellspacing="1" border="0">
   <tr>
	<td align="center">[&nbsp;{URL_ARCADE}]&nbsp;-&nbsp;[&nbsp;{URL_BESTSCORES}]&nbsp;-&nbsp;[&nbsp;{MANAGE_COMMENTS}]</td>
   </tr>
  </table>
