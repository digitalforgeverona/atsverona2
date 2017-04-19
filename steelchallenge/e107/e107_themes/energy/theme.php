<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $Revision: 1.0 $
|     $Date: 2006/10/21 16:32:34 $
|     $Author: e107 Italian Team $
+----------------------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

// [multilanguage]
@include_once(e_THEME."energy/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."energy/languages/English.php");

//  [theme]
$themename = "energy";
$themeversion = "1.0";
$themeauthor = "e107 Italian Team - modded by mfp";
$themeemail = "info@e107italia.org";
$themewebsite = "http://www.e107italia.org";
$themedate = "21/10/2006";
$themeinfo = LAN_THEME_1;


// [page defines used for css controll on per page basis]
define("e_PAGE", substr(strrchr($_SERVER['PHP_SELF'], "/"), 1));
define("e_PAGECLASS", str_replace(substr(strrchr(e_PAGE, "."), 0), "", e_PAGE));

function theme_head() {
	global $logo;
	return "
		<link rel='alternate stylesheet' type='text/css' href='".THEME."style.css' title='Small' />
		<link rel='alternate stylesheet' type='text/css' href='".THEME."fontstyles/medium.css' title='Medium' />
		<link rel='alternate stylesheet' type='text/css' href='".THEME."fontstyles/large.css' title='Large' />
		<script type='text/javascript' src='".THEME_ABS."nicetitle.js'></script>
	";
}

define("STANDARDS_MODE", TRUE);
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
define("IMODE", "lite");
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");
$no_core_css = FALSE;

$register_sc[] = 'UL'; //Il mainmenu. Vengono definite le access key


// [layout]
$layout = "_default";

// [Date in italiano]
setlocale(LC_TIME, 'it_IT');

$HEADER = "
<div id='contenitore'> <!-- Apre Principale -->
	<div id='header'>  <!-- Apre la testata alta -->
	<img id='frontphoto' src='".e_THEME."energy/images/logo.png' width='753' height='104' title='logo' alt='logo' />
</div><div class='clock'>
				
			</div>

	{UL} <!-- Mainmenu -->
	<div id='mensinistro'>  <!-- Apre spazio menu sinistro -->
		<div class='contentsinistro'> <!-- Apre contentsinistro e definisce le proprieta -->
			<div class='fixlarghezza'> <!-- Apre FIX -->
				<div class='right'>
					<div class='smalltext'>
						Dimensione Font:&nbsp;
						<a href='#' onclick=\"setActiveStyleSheet('Small'); return false;\" title='".LAN_THEME_12."' accesskey='P'><img src='".THEME."images/font1.gif' alt='".LAN_THEME_12."'></img></a>
						<a href='#' onclick=\"setActiveStyleSheet('Medium'); return false;\" title='".LAN_THEME_13."' accesskey='M'><img src='".THEME."images/font2.gif' alt='".LAN_THEME_13."'></img></a>
						<a href='#' onclick=\"setActiveStyleSheet('Large'); return false;\" title='".LAN_THEME_14."' accesskey='G'><img src='".THEME."images/font3.gif' alt='".LAN_THEME_14."'></img></a>					
					</div>
				</div>
				<div class='itemdetails'></div>
<div class='smalltext'>				
{CUSTOM=clock}
</div><br />				
<span style='font: 10px  tahoma, verdana, arial, helvetica, sans-serif; color: #ff9148;'><b>Cerca nel sito</b></span> <br />
{CUSTOM=search}
<br />
				
				{SETSTYLE=mensinistro}
				{MENU=1}
				{SETSTYLE}
				{MENU=2}
			</div>  <!-- Chiude FIX -->
		</div> <!-- Chiude contentsinistro -->
	</div> <!-- Chiude men Men -->
	<div id='maingenerale'> <!-- Apre Main  -->

	{SETSTYLE=center}
							{MENU=5}
							
	
		<div class='contenuti'>  <!-- Apre content --> 	
			<div class='fixlarghezza'> <!-- Apre FIX -->
			".(e_PAGECLASS == "news" ? "<h2>NEWS</h2>" : "")."
								
	";

$FOOTER = "	
			</div> <!-- Chiude FIX --> 
		</div>  <!-- Chiude content --> 	
{SETSTYLE=center}
{MENU=6}

		
	</div><!-- Chiude MainGenerale --> 
	<div id='footer'>
	<br />
		
		{SITEDISCLAIMER}
	".(e_PAGECLASS == "search" ? "" : "	
	<span style='font: 10px  tahoma, verdana, arial, helvetica, sans-serif;'>Realised by <a href='http://www.e107italia.org' title='e107 ITALIA' rel='external'>e107italia</a></span>
		<br />
			
		</div> 
	")."
	</div> <!-- Chiude principale -->
";





function news_style($news){
	$mydate  = strftime("%a %d/%m/%y ", $news['news_datestamp']);
	$NEWSSTYLE = "
	<div class='headerfont'>
		<div class='colorenewsscuro'>
			<div class='left'>
				{STICKY_ICON}
				{NEWSTITLE}&nbsp;&nbsp;{ADMINOPTIONS}
			</div>
		</div>
		<div class='smalltextnews'>
			<div class='sfondoriga2news'>
				<span class='item3'>".LAN_THEME_7."{NEWSAUTHOR}&nbsp;<strong>$mydate</strong>&nbsp;&nbsp;</span>
			</div>
		</div>
	</div>
	<div class='bodytable'>
		{NEWSBODY}
		{EXTENDED}
	</div>
	<br />
	<div class='itemdetails'>
		<span class='item1'>{NEWSCOMMENTS}{TRACKBACK}</span>&nbsp; <br />
		<div class='smalltextnews'>	
			<span class='item2'> ".LAN_THEME_8."&nbsp;&nbsp;{NEWSCATEGORY}</span>&nbsp;<br />
			<span class='item4'>".LAN_THEME_9."{TRACKBACK}&nbsp;".LAN_THEME_15."{EMAILICON}&nbsp;".LAN_THEME_16."{PRINTICON}&nbsp;</span>
		</div>
	</div>
	<br />
	<br />";
	return $NEWSSTYLE;
}

define("ICONSTYLE", "border:0");
define("COMMENTLINK", LAN_THEME_3);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", " :: ");


// [linkstyle]

define('PRELINK', "");
define('POSTLINK', "");
define('LINKSTART', "");
define('LINKSTART_HILITE', "");
define('LINKEND', "");
define('LINKDISPLAY', 1);
define('LINKALIGN', "left");


//	[tablestyle] DA VEDERE
function tablestyle($caption, $text, $mode)
{
	global $style;
	if($style == "mensinistro"){
		echo "<div class='headerfont'><div class='itemdetails'></div>
		<div class='coloremensin'>{$caption}</div></div>\n{$text}\n<br /><br />\n";
	} else {	
		echo "<h2>{$caption}</h2>\n{$text}\n<br /><br />\n";
		}
}

$COMMENTSTYLE = "";


$CHATBOXSTYLE = "";

?>
