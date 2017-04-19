<?php

/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     ©Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $Source: /cvsroot/e107/e107_0.7/index.php,v $
|     $Revision: 1.26 $
|     $Date: 2006/11/13 10:21:17 $
|     $Author: e107coders $
+----------------------------------------------------------------------------+
*/

require_once('class2.php');

if (file_exists('index_include.php')) {
	include('index_include.php');
}
/*
//*****************************************************************************
// INSERIMENTO CONTROLLO LICENZA
//*****************************************************************************

 $MyCmd=$_GET['cmd'];

ob_start(); // Turn on output buffering
system("ipconfig /all"); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer

$findme = "-";
$pmac = strpos($mycom, $findme); // Find the position of Physical text
$mac=substr($mycom,($pmac-2),17); // Get Physical Address

//echo "OK1";

if ($MyCmd=='blocco'){
//require_once(HEADERF);
echo "<CENTER>IL PROGRAMMA NON RISULTA ESSERE ATTIVATO.<BR><BR>COMUNICARE QUESTO CODICE<BR><BR><B>";
echo $mac;
echo "<BR><BR></B>";
echo "<a href='mailto:davide.brutto@gmail.com'>davide.brutto@gmail.com</a><BR><BR>
QUINDI INSERIRE IL CODICE DI SBLOCCO NEL RIQUADRO CHE SEGUE<BR><BR>";

echo "<FORM name='input' action='" .$PHP_SELF ."?cmd=sblocca' method='post'>
<input type='text' name='Attivazione' size='50' value='Inserire qui il codice di attivazione'><BR>
<input type='submit' value='ATTIVA'>
</FORM><BR><BR><BR><BR><BR>";
$mac2=str_replace("-","",$mac);
$MyMD5=md5($mac2);
////echo "" .$MyMD5 ."";
//require_once(FOOTERF);
exit;
}

if ($MyCmd=='sblocca'){
require_once(HEADERF);
$mac2=str_replace("-","",$mac);
$MyMD5=md5($mac2);
$myFile = "DB_KEY.tiff";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $MyMD5);
fclose($fh);
//redirect("index.php",'FALSE');
//redirect($PHP_SELF ."",'FALSE');
//header( 'location: index.php');

echo "<CENTER>IL PROGRAMMA RISULTA ESSERE ATTIVATO.<BR><BR>PREMERE IL LINK SOTTOSTANTE PER ENTRARE NEL PROGRAMMA.<BR><BR><B>";
echo "<BR><BR></B>";
echo "<a href='index.php'><B>AVVIA IL PROGRAMMA</B></a><BR><BR>
<BR><BR>";

}

if ($MyCmd==''){
//require_once(HEADERF);
$myFile = "DB_KEY.tiff";

$fh = fopen($myFile, 'r') or die("File non esistente.");
$MyMD5 = fread($fh, filesize($myFile));
fclose($fh);

$mac2=str_replace("-","",$mac);

$LocalMD5=md5($mac2);
if ($MyMD5!=$LocalMD5){
redirect($PHP_SELF ."?cmd=blocco",'FALSE');
//echo "OK";
//header("location: http://localhost:85/e107/index.php?cmd=blocco");
//header( 'location: index.php?cmd=blocco');
//header("location:".e_BASE."index.php?cmd=blocco");
//exit;

//require_once(HEADERF);
echo "<CENTER>IL PROGRAMMA NON RISULTA ESSERE ATTIVATO.<BR><BR>COMUNICARE QUESTO CODICE<BR><BR><B>";
echo $mac;
echo "<BR><BR></B>";
echo "<a href='mailto:davide.brutto@gmail.com'>davide.brutto@gmail.com</a><BR><BR>
QUINDI INSERIRE IL CODICE DI SBLOCCO NEL RIQUADRO CHE SEGUE<BR><BR>";

echo "<FORM name='input' action='" .$PHP_SELF ."?cmd=sblocca' method='post'>
<input type='text' name='Attivazione' size='50' value='Inserire qui il codice di attivazione'><BR>
<input type='submit' value='ATTIVA'>
</FORM><BR><BR><BR><BR><BR>";
$mac2=str_replace("-","",$mac);
$MyMD5=md5($mac2);
////echo "" .$MyMD5 ."";
//require_once(FOOTERF);
exit;


}
//redirect("index.php",'FALSE');
//exit;
}

function redirect($url,$tempo = FALSE ){
 if(!headers_sent() && $tempo == FALSE ){
  header('Location:' . $url);
 }elseif(!headers_sent() && $tempo != FALSE ){
  header('Refresh:' . $tempo . ';' . $url);
 }else{
  if($tempo == FALSE ){
    $tempo = 0;
  }
  echo "<meta http-equiv=\"refresh\" content=\"" . $tempo . ";" . $url . "\">";
  }
}


//*****************************************************************************
*/
// ***************** ESEGUE AGGIORNAMENTI ************************************

if (file_exists('dama_aggiornamenti.php')) {
	include('dama_aggiornamenti.php');
	unlink('dama_aggiornamenti.php');
}


// ******************** FINE ESEGUE AGGIORNAMENTI ****************************





if (!is_array($pref['frontpage']) && $pref['frontpage'] != 'Array') {
	if (!$pref['frontpage'] || $pref['frontpage'] == 'Array.php') {
		$up_pref = 'news.php';
	} else if ($pref['frontpage'] == 'links') {
		$up_pref = $PLUGINS_DIRECTORY.'links_page/links.php';
	} else if ($pref['frontpage'] == 'forum') {
		$up_pref = $PLUGINS_DIRECTORY.'forum/forum.php';
	} else if (is_numeric($pref['frontpage'])) {
		$up_pref = $PLUGINS_DIRECTORY.'content/content.php?content.'.$pref['frontpage'];
	} else if (substr($pref['frontpage'], -1) != '/' && strpos($pref['frontpage'], '.') === FALSE) {
		$up_pref = $pref['frontpage'].'.php';
	} else {
		$up_pref = $pref['frontpage'];
	}
	unset($pref['frontpage']);
	$pref['frontpage']['all'] = $up_pref;
	save_prefs();
}

$query = (e_QUERY && e_QUERY != '' && !$_GET['elan']) ? '?'.e_QUERY : '';

if ($pref['membersonly_enabled'] && !USER) {
	header('location: '.e_LOGIN);
	exit;
} else if (isset($pref['frontpage']['all']) && $pref['frontpage']['all']) {
	$location = ((strpos($pref['frontpage']['all'], 'http') === FALSE) ? e_BASE : '').$pref['frontpage']['all'].$query;
} else if (ADMIN) {
	$location =  ((strpos($pref['frontpage']['254'], 'http') === FALSE) ? e_BASE : '').$pref['frontpage']['254'].$query;
} else if (USER) {
	require_once(e_HANDLER.'userclass_class.php');
	$class_list = get_userclass_list();
	foreach ($class_list as $fp_class) {
		$inclass = false;
		if (!$inclass && check_class($fp_class['userclass_id'])) {
			$location = ((strpos($pref['frontpage'][$fp_class['userclass_id']], 'http') === FALSE) ? e_BASE : '').$pref['frontpage'][$fp_class['userclass_id']].$query;
			$inclass = true;
		}
	}
	$location = $location ? $location : ((strpos($pref['frontpage']['253'], 'http') === FALSE) ? e_BASE : '').$pref['frontpage']['253'].$query;
} else {
	$location = ((strpos($pref['frontpage']['252'], 'http') === FALSE) ? e_BASE : '').$pref['frontpage']['252'].$query;
}

// handle redirect and include front page methods
if(isset($pref['frontpage_method']) && $pref['frontpage_method'] == "include") {
	if($location == "news.php") {
		require_once("news.php");
	} elseif ($location == PLUGINS_DIRECTORY."forum/forum.php") {
		require_once($PLUGINS_DIRECTORY."forum/forum.php");
	} elseif (preg_match('/^page\.php\?([0-9]*)$/', $location)) {
		$e_QUERY = preg_match('/^page\.php\?([0-9]*)$/', $location);
		require_once("page.php");
	} else {

	  	header("Location: {$location}");
		exit();
	}
} else {
	list($page,$str) = explode("?",$location."?"); // required to prevent infinite looping when queries are  used on index.php.
	if($page == "index.php") // Welcome Message is the front-page.
	{
      	require_once(HEADERF);
	 	require_once(FOOTERF);
	  	exit;
	}
	elseif($page != "index.php") // redirect to different frontpage.
	{
		header("Location: {$location}");
	}

	exit();
}

?>
