<?php
/*
+---------------------------------------------------------------+
|	e107 website system
|
|	©Steve Dunstan 2001-2005
|	http://e107.org
|	jalist@e107.org
|
|	Released under the terms and conditions of the
|	GNU General Public License (http://gnu.org).
|	
|	Tema Shadow - by Alf - http://www.frock.it
+---------------------------------------------------------------+
*/

// [multilanguage]
@include_once(e_THEME."Shadow/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."Shadow/languages/Italiano.php");
setlocale(LC_TIME, 'it_IT');

// [theme]
$themename = "Shadow";
$themeversion = "1.0";
$themeauthor = "Alf";
$themeemail = "info@frock.it";
$themewebsite = "http://www.frock.it";
$themedate = "9 set 08";
$themeinfo = "<b>Ti è piaciuto questo tema? Valuta la possibilità di supportare il lavoro del webMaster con una piccola </b><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=info%40frock%2eit&item_name=Donazione&no_shipping=0&no_note=1&tax=0&currency_code=EUR&lc=IT&bn=PP%2dDonationsBF&charset=UTF%2d8'><img src='https://www.paypal.com/it_IT/i/btn/x-click-but04.gif'/></a> ";
define("STANDARDS_MODE", "");
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;

$register_sc[] = 'FOOTER';
$register_sc[] = 'CUSTOM';

define("IMODE", "lite");
define("ICONPRINTPDF", "pdf_16.png");

// [page defines used for css controll on per page basis]
define("e_PAGE", substr(strrchr($_SERVER['PHP_SELF'], "/"), 1));
define("e_PAGECLASS", str_replace(substr(strrchr(e_PAGE, "."), 0), "", e_PAGE));


// [layout]

$layout = "_default";

$HEADER = "
<div id='pagina'>
<div id='contenuti'>
<div style='text-align:right'>
<a href='".THEME_ABS."Pagine/home.php'><img src='".THEME_ABS."images/home.gif'/ style='vertical-align:middle;'>&nbsp;Home</a>
</div>
";
$FOOTER = "
</div>
</div>
<div id='footer'>
{FOOTER}
</div>
";

$CUSTOMHEADER['my_shadowbox'] = "
<script type='text/javascript' src='".THEME_ABS."src/adapter/shadowbox-base.js'></script>
<script type='text/javascript' src='".THEME_ABS."src/shadowbox.js'></script>
<script type='text/javascript'>
Shadowbox.loadSkin('classic', '".THEME_ABS."src/skin');
Shadowbox.loadLanguage('it', '".THEME_ABS."src/lang');
Shadowbox.loadPlayer(['flv', 'html', 'iframe', 'img', 'qt', 'swf', 'wmp'], '".THEME_ABS."src/player');
window.onload = function(){Shadowbox.init();};
</script>
<div id='paginashadow'>
<div id='contenutishadow'>
";
$CUSTOMFOOTER['my_shadowbox'] = "
</div>
</div>
<div id='footer'>
{FOOTER}
</div>
";


$CUSTOMHEADER['my_home'] = "
<script type='text/javascript' src='".THEME_ABS."JS/mootools.js'></script>
<script type='text/javascript' src='".THEME_ABS."JS/menu.js'></script>
<script type='text/javascript' src='".THEME_ABS."src/adapter/shadowbox-base.js'></script>
<script type='text/javascript' src='".THEME_ABS."src/shadowbox.js'></script>
<script type='text/javascript'>
Shadowbox.loadSkin('classic', '".THEME_ABS."src/skin');
Shadowbox.loadLanguage('en', '".THEME_ABS."src/lang');
Shadowbox.loadPlayer(['flv', 'html', 'iframe', 'img', 'qt', 'swf', 'wmp'], '".THEME_ABS."src/player');
window.onload = function(){Shadowbox.init();};
</script>
<div id='paginahome'>
<div id='contenutihome'>
";
if (ADMIN==TRUE){
$CUSTOMFOOTER['my_home'] = "
</div>
<div id='menulaterale'>
<script type='text/javascript' src='".THEME_ABS."JS/animatedcollapse.js'>
</script>
<div id='aprichiudi'>
<a href='#nogo' onclick='javascript:collapse2.slideit()'>open/close<img src='".THEME_ABS."images/menuout.gif' style='margin:10px 10px'/></a>
</div>
<div id='cat' style='width: 190px; height: auto; '>
{SETSTYLE=menu1}
{MENU=1}
{SETSTYLE}
</div>
<script type='text/javascript'>
//Syntax: var uniquevar=new animatedcollapse('DIV_id', animatetime_milisec, enablepersist(true/fase), [initialstate] )
var collapse2=new animatedcollapse('cat', 800, true)
</script>
</div>
</div>
<div id='footer'>
{FOOTER}
</div>
";
} else {
$CUSTOMFOOTER['my_home'] = "
</div>
<div id='menulaterale'>
</div>
</div>
<div id='footer'>
{FOOTER}
</div>
";
}


$CUSTOMPAGES['my_home'] = "home";
$CUSTOMPAGES['my_shadowbox'] = "pagina1.php pagina2.php pagina3.php";


//INIZIA STILE NEWS

function news_style($news) 
{
	$miomese  = strftime("%b %y", $news['news_datestamp']);
	$miadata  = strftime("%d", $news['news_datestamp']);
	$NEWSSTYLE = "
<div id='newscontenitore'>
  <div id='titolo'>
  <img src='".THEME."images/new.gif' style='padding:0 2px 0 0;vertical-align:middle;' />
  {NEWSTITLE}
  </div>
  <div id='datautore'>
   <div id='dataora'>
   ".$miadata."&nbsp;&nbsp;".$miomese."
   </div>
   <div id='autore'>
   {NEWSAUTHOR}
   </div>
  </div>
  <div id='sommario'>
  <span style='color:#F89B49;'>In breve:</span>&nbsp;
  {NEWSSUMMARY}
  </div>
  <div id='news'>
  <div id='newsimg'>
  <div id='shadow-container'>
  <div class='shadow1'>
  <div class='shadow2'>
  <div class='shadow3'>
  <div class='container'>
  {NEWSIMAGE}
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  {NEWSBODY}
  <br />
  <div style='text-align:right;'>
 {EXTENDED}
 </div>
 </div>
 <div id='pulsantinews'>
 {NEWSCOMMENTS}
 <span style='text-align:right; margin-left:50px;'>
 {EMAILICON}&nbsp;&nbsp;
 {PRINTICON}&nbsp;&nbsp;
 {PDFICON}
 &nbsp;&nbsp;&nbsp;&nbsp;{ADMINOPTIONS}
 </span>
 </div>
</div>
<br />

";
	return $NEWSSTYLE;
} 


define('ICONMAIL', 'email_16.png');
define('ICONPRINT', 'print_16.png');
define("ICONSTYLE", "float: right; border:0");
define("COMMENTLINK", LAN_THEME_3);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", "<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", " | ");
define("CBWIDTH","96%");

//	[tablestyle]
function tablestyle($caption, $text, $mode)
{
	global $style;

	if($style == "menu1")
	{
		echo "
	<div style='width:176px; margin:0 5px 0 5px; background:#fafafa;border:2px solid #cecaca;'>
    
	<div class='caption1'>$caption</div><div class='padder1'>$text</div>
    
    </div>
    <br />";
	
	}
	
	else
	if (e_PAGE == 'home.php') 
	{
	
	echo "<div class='padder'>$text</div>";
	
	}
	
	else
	{
		echo "<br /><div class='caption'>$caption</div><br /><div class='padder'>$text</div>";
	}
}

$COMMENTSTYLE = "

<div id='topcommenti'>
".LAN_THEME_7."&nbsp;{USERNAME}&nbsp;&nbsp;".LAN_THEME_8."{TIMEDATE}
</div>
<div id='commenti'>

<div id='avatar'>
<div class='avatar'>
{AVATAR}
</div>
<div class='livello'>
{LEVEL}
{COMMENTS}
</div>
</div>

<div id='testocommento'>
{COMMENT}
</div>
</div>
<div id='bottomcommenti'>
{REPLY}&nbsp;&nbsp;&nbsp;{SUBJECT}&nbsp;&nbsp;&nbsp;&nbsp;{COMMENTEDIT}
</div>
<br />
";


?>