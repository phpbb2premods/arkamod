<?php
/*
###################################################################
#
#  gf_funcs/gen_funcs.php
#  Auteur : giefca - <giefca@hotmail.com> - www.gf-phpbb.com
#  Commenc� le : 04/04/2004
#  Date de derni�re modification : 04/04/2004
#
#  Description : Ce fichier contient les fonctions r�curentes
#                utilis�es dans mes scripts.
#
###################################################################
*/

// Fonction get_var2
// R�cup�ration des variables envoy�es � la page
// $variable est un tableau qui contient la description
// de la variable a r�cup�rer et les contr�les a effectuer.
// d�tail du tableau :
// 'name' = nom de la variable
// 'method' = provenance GET/POST/''
// 'default' = valeur par d�faut de la variable
// 'intval' = si TRUE la variable doit �tre enti�re
// 'okvar' = liste des valeurs autoris�es pour la variable.
//
// exemple :
/*
 $mode = get_var2(array(
  'name'=>'mode',
  'intval'=>false,
  'method'=>'GET',
  'okvar'=>array('mode1','mode2'),
  'default'=>'rien'
   )
 );
*/
function get_var2($variable)
{
  global $HTTP_GET_VARS, $HTTP_POST_VARS ;
   $var = $variable['name'] ;
   $$var = ( isset($variable['default']) ) ? $variable['default'] : '' ;
   $method = ( isset($variable['method']) ) ? $variable['method'] : '' ;
   $default = ( isset($variable['default']) ) ? $variable['default'] : '' ;

   switch($method)
   {
	  case 'POST':
	  $$var = (isset($HTTP_POST_VARS[$var])) ? $HTTP_POST_VARS[$var] : $default;
	  break;
	  case 'GET' :
  	  $$var = (isset($HTTP_GET_VARS[$var])) ? $HTTP_GET_VARS[$var] : $default;
  	  break;
	  default:
  	  if(isset($HTTP_POST_VARS[$var]) || isset($HTTP_GET_VARS[$var]))
	  {
		$$var = (isset($HTTP_POST_VARS[$var])) ? $HTTP_POST_VARS[$var] : $HTTP_GET_VARS[$var];
	  }
   }  

   if ( isset($variable['intval']) and $variable['intval']) 
   {
     $$var = intval($$var);
   }
   
   if ( isset($variable['okvar']) )
   {
      if ( !in_array($$var,$variable['okvar']) )
	  {
	    $$var = $default ; 
	  }
   }
   
   return $$var ;
}


/*-------------------*/
// strip_htmlchars
// ------------------
function strip_htmlchars($t="")
{
	// l'utilisation de l'expression r�guli�re �vite deremplacer les &#xxx;
	$t = preg_replace("/&(?!#[0-9]+;)/s", '&amp;', $t );
	$t = str_replace( "<", "&lt;"  , $t );
	$t = str_replace( ">", "&gt;"  , $t );
	$t = str_replace( '"', "&quot;", $t );
	
	return $t;
}
	
/*-------------------------------------------------------------------------*/
// add_htmlchars
/*-------------------------------------------------------------------------*/
function add_htmlchars($t="")
{
	$t = str_replace( "&lt;"  , "<", $t );
	$t = str_replace( "&gt;"  , ">", $t );
	$t = str_replace( "&quot;", '"', $t );
	$t = str_replace( "&amp;" , "&", $t );
		
	return $t;
}

?>
