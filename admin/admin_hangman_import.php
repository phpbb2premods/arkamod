<?php
define('IN_PHPBB', 1);
define('IN_HANGMAN',true);
if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Games']['Hangman - XML'] = append_sid("admin_hangman_import.$phpEx");
	return;
}

$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
if (isset($HTTP_POST_VARS['export']))
{
	$no_page_header = TRUE;
	require('./pagestart.' . $phpEx);
}
else
	require('./pagestart.' . $phpEx);
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_hangman.' . $phpEx);
include($phpbb_root_path . 'includes/functions_hangman.' . $phpEx);
@set_time_limit(0);
//get hangman configs

class HangmanClass {
    var $word;  	//hangman word which is to be quessed
    var $tries;    	//how many tries user will have
    var $title;  	//subject or title of the hangman
    var $help;  	//the hangman helptext - unparsed ;)
    var $time;		//the hangman creationtime
    var $days;		//the hangman days left

    function HangmanClass ($hc) 
    {
        foreach ($hc as $k=>$v)
            $this->$k = $hc[$k];
    }
}

function MakeXML($temp)
{
	$content = "<?xml version=\"1.0\"?>\n<hangdb>";
	for($i=0;$i < count($temp);$i++)
	{
		$content = $content . "\n\t<hangman>";
		$content = $content . "\n\t\t<title>"	. 	utf8_encode($temp[$i]->title)	."</title>";
		$content = $content . "\n\t\t<word>"	.	utf8_encode($temp[$i]->word)	.	"</word>";
		$content = $content . "\n\t\t<tries>"	.	utf8_encode($temp[$i]->tries)	."</tries>";
		$content = $content . "\n\t\t<days>"	.	utf8_encode($temp[$i]->days)	.	"</days>";
		$content = $content . "\n\t\t<help>"	.	utf8_encode($temp[$i]->help)	.	"</help>";
		$content = $content . "\n\t</hangman>";
	}
	return $content."\n</hangdb>";
}

function readXML($filename) 
{
    // read the xml database of hangmans
    $data = implode("",file($filename));
    $parser = xml_parser_create();
    xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
    xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
    xml_parse_into_struct($parser,$data,$values,$tags);
    xml_parser_free($parser);

    // loop through the structures
    foreach ($tags as $key=>$val) 
    {
        if ($key == "hangman") 
        {
            $hangranges = $val;
            // each contiguous pair of array entries are the 
            // lower and upper range for each hangman definition
            for ($i=0; $i < count($hangranges); $i+=2) 
            {
            		$offset = $hangranges[$i] + 1;
                	$len 	= $hangranges[$i + 1] - $offset;
                	$tdb[] 	= parseHangman(array_slice($values, $offset, $len));
            }
        } else {
            continue;
        }
    }
    return $tdb;
}

function parseHangman($hvalues) 
{
    for ($i=0; $i < count($hvalues); $i++)
        $hang[$hvalues[$i]["tag"]] = $hvalues[$i]["value"];
    return new HangmanClass($hang);
}

function InsertHangmansInDB($h,$bignore_doubles,$max_import,$import_userid,$min_letters,$ignore_dleft,&$success)
{
	global $db,$phpbb_root_path,$hangman_cfg;
	//include($phpbb_root_path . 'includes/bbcode.php');
	//include($phpbb_root_path . 'includes/functions_post.php');
	$error_msg = '';
	//get the array of actual hangman words...
	$ignore_words = array();
	if ($bignore_doubles)
	{
		$sql = "SELECT * FROM ".HANGMAN_WORDS;
		$result = $db->sql_query($sql);
		$rows = $db->sql_fetchrowset($result);
		$crows = $db->sql_numrows($result);
		for ($x = 0; $x < $crows ; $x++)
		{
			$ignore_words[] = $rows[$x]['hangman_word'];
		}
	}
	$success = 0;
	for ($i=0;$i<count($h);$i++)
	{
		$zeit = time();
		$gueltige_zeit = 0;
		if (!$ignore_dleft)
			$gueltige_zeit = ($h[$i]->days>3)?($zeit + 60*60*24*($h[$i]->days)):0;
		$wort 	= $h[$i]->word;
		$help 	= $h[$i]->help;
		$hilfe	=	$help;
		
		$title = $h[$i]->title;
		$subject	= $title;
		$maximal_versuche = $h[$i]->tries;
		$skip = false;
		$skip_err = "Skipping $wort due to";
		if ( strlen($wort) < $min_letters)
		{
			$skip_err = "&#8226;few letters";
			$skip = true;
		}
		if (in_array($wort,$ignore_words))
		{
			$skip_err .= "&#8226;already in DB";
			$skip = true;
		}
		if ($hangman_cfg['make_upper'])
			$wort = strtoupper($wort);
		if (!hangman_check_word($wort,$remaining))
		{
			$skip_err .="&#8226;letter parsing:[$remaining]";
			$skip = true;
		}
		if ( $skip === false)
		{
			$sql = "INSERT INTO " .HANGMAN_WORDS. " (userid , hangman_word, hangman_help , hangman_subject , max_tries, bbcodeid,time_created,time_limit ) 
	 				values ( 
	 				'".$import_userid."',
	 				'$wort',
	 				'$hilfe',
	 				'$subject',
	 				'$maximal_versuche',
	 				'0',
	 				'$zeit',
	 				'$gueltige_zeit')";
			if ( !($result = $db->sql_query($sql)) )
			{
				$error_msg = $error_msg . '<br>SQL Error with hangman ['.intval($i).']';
			}
			else
				$success++;
		}
		else
		{
			$error_msg .= '<br><font color="blue">Skipped Hangman'.$wort.' Errors:'.$skip_err.'</font>';
		}
		if ($success >= $max_import)
		{
			$error_msg .= '<br><font color="green">Successfully stopped after'.intval($success).' Hangmans</font>';
			break;
		}
	}
	$error_msg .= '<br><font color="green">Done importing'.$success.' Hangmans</font>';
	return $error_msg;
}

function readFromDB($from,$till,$check_with_letters,$max_count,$ball)
{
	global $db,$phpbb_root_path,$hangman_cfg;
	$tdb = array();
	$html_on = false;
	$bbcode_on = false;
	$smilies_on = false;
	$distriction = '';
	if (is_numeric($from) && is_numeric($till))
	{
		$distriction = " WHERE hangmanid >= '$from' AND hangmanid <= '$till'";
	}
	else if (is_numeric($from) && $from > -1)
	{
		$distriction = " WHERE hangmanid >= '$from'";
	}
	else if (is_numeric($till) && $till > -1)
	{
		$distriction = " WHERE hangmanid <= '$till'";
	}
	if ($max_count != -1 && is_numeric($max_count))
	{
		$distriction = " LIMIT $max_count";
	}
	if ($ball)
		$distriction = '';
	
	$sql = "SELECT * FROM ".HANGMAN_WORDS." $distriction";
	
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR,'Could not get Hangmans',__LINE__,__FILE__,$sql);
	}
	$hangman_rows = $db->sql_fetchrowset($result);
	//...Letters in hangmans for wordchecks
	$temp = $hangman_cfg['letters'];
	$hangman_cfg['letters'] = $check_with_letters;
	//...must they first be converted to upper case
	$make_up = $hangman_cfg['make_words_upper'];
	//for each hangman check and write to array
	for ($i = 0; $i < count($hangman_rows); $i++)
	{
		$t = array();
		$hword = $hangman_rows[$i]['hangman_word'];
		if ($make_up)
			$hword = strtoupper($hword);
		if (hangman_check_word($hword,$t))
		{
			$hang 			= array();
			$hang['word'] 		= $hword;
			$hang['title']		= $hangman_rows[$i]['hangman_subject'];
			$hang['tries'] 		= $hangman_rows[$i]['max_tries'];	
			$hang['help']		= $hangman_rows[$i]['hangman_help'];
			$hang['days']		= intval(($hangman_rows[$i]['time_limit'] - $hangman_rows[$i]['time_created'])/(60*60*24));
			if ($hang['days'] < 1)
				$hang['days'] = 0;
			$tdb[] = new HangmanClass($hang);
		}
	}
	$hangman_cfg['letters'] = $temp;
	return $tdb;
}

if ( isset($HTTP_GET_VARS['import']) || isset($HTTP_POST_VARS['import']))
{
	$file = $HTTP_POST_FILES['import_filename'];
	$all_hangs = readXML($file['tmp_name']);
	$bignore_doubles = $_POST['ignore_doubles'];
	$max_import = 10000;
	if ($_POST['chk_max_import'])
		$max_import = $_POST['max_import'];
		
	$import_userid = ANONYMOUS;
	if ($_POST['chk_import_username'])
	{
		$temp = $_POST['import_username'];
		$sql = "SELECT * FROM ".USERS_TABLE." WHERE username LIKE '".$temp."'";
		$row = $db->sql_fetchrow($db->sql_query($sql));
		$import_userid = $row['user_id'];
		if (!$import_userid || !is_numeric($import_userid))
			$import_userid = ANONYMOUS;
	}
	$min_letters = 1;
	if ($_POST['chk_import_min_letters'])
	{
		$min_letters = $_POST['import_min_letters'];
	}
	$ignore_dleft = $_POST['chk_ignore_days_left'];
	$success = 0;
	$result_msg = InsertHangmansInDB($all_hangs,$bignore_doubles,$max_import,$import_userid,$min_letters,$ignore_dleft,$success);
	if($import_userid != ANONYMOUS)
		hangman_updatescore(0,0,1,$import_userid,$import_userid);
	message_die(GENERAL_MESSAGE,$result_msg);
	exit;
}
else if (isset($HTTP_GET_VARS['export']) || isset($HTTP_POST_VARS['export']))
{
	$from = $_POST['export_start_at'];
	if (!$_POST['chk_export_start_at'])
		$from = -1;
		
	$till = $_POST['export_end_at'];
	if (!$_POST['chk_export_end_at'])
		$till = -1;
		
	$max_count = -1;
	if ($_POST['chk_export_max'])
	{
		$max_count = $_POST['export_max'];
	}
	$ball = false;
	if ($_POST['chk_export_all'])
		$ball = true;
	$bcheck = false;
	$check_with_letters = $hangman_cfg['letters'];
	if ($_POST['chk_export_word_check'])
	{
		$check_with_letters = $_POST['export_word_check'];
		$bcheck = true;
	}
	
	$all_hangs	= readFromDB($from,$till,$check_with_letters,$max_count,$ball);
	$anzahl 	= count($all_hangs);
	$xml_text	= MakeXML($all_hangs);
	
	$now = time();
	$filename = $anzahl.'_hangmans_'.$now.'.xml';
	header("Pragma: no-cache");
	header("Content-disposition: attachment; filename=$filename");
	echo $xml_text;
	exit;
}
else
{
	$sql = "SELECT MIN(hangmanid) FROM " . HANGMAN_WORDS;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, 'Error get days',__LINE__,__FILE__,$sql);
	}
	$row = $db->sql_fetchrow($result);
	$minimum = $row['MIN(hangmanid)'];
	
	$sql = "SELECT MAX(hangmanid) FROM " . HANGMAN_WORDS;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, 'Error get days',__LINE__,__FILE__,$sql);
	}
	$row = $db->sql_fetchrow($result);
	$maximum = $row['MAX(hangmanid)'];
	
	$template->set_filenames(array(
		'body'	=>	'hangman/admin/admin_hangman_import.tpl'));
	$template->assign_vars(array(
		'U_IMPORT'		=> append_sid("admin_hangman_import.php"),
		'U_EXPORT'		=> append_sid("admin_hangman_import.php"),
		'L_IMPORT_EXPORT_TITLE'		=> $lang_xml['title'],
		'L_IMPORT_EXPORT_EXPLAIN'	=> $lang_xml['explain'],
		'L_IMPORT'			=> $lang_xml['import'],
		'L_EXPORT'			=> $lang_xml['export'],
		'L_EXPORT_START_AT'		=> $lang_xml['export_start_at'],
		'L_EXPORT_END_AT'		=> $lang_xml['export_end_at'],
		'L_EXPORT_FILE'			=> $lang_xml['choose_file'],
		'EXPORT_START_AT'		=> $minimum,
		'EXPORT_END_AT'			=> $maximum,
		'EXPORT_WITH_LETTERS'		=> EXPORT_LETTER_SET,
		'L_EXPORT_MAX'			=> $lang_xml['export_max'],
		'L_EXPORT_ALL'			=> $lang_xml['export_all'],
		'L_EXPORT_LETTERS'		=> $lang_xml['export_letters'],
		
		'L_IMPORT_IGNORE_DL'		=> $lang_xml['import_ignore_dl'],
		'L_IMPORT_IGNORE_DL_'		=> $lang_xml['import_ignore_dl_'],
		'L_IMPORT_USERNAME'		=> $lang_xml['import_username'],
		'L_IMPORT_MAXIMUM'		=> $lang_xml['import_maximum'],
		'L_IMPORT_IGNORE_DOUBLES'	=> $lang_xml['ignore_doubles'],
		'L_IMPORT_MIN_LETTERS'		=> $lang_xml['import_min_letters']
		));
	$template->pparse('body');
	include('./page_footer_admin.'.$phpEx);
	exit;
}
?><