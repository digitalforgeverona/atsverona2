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
+---------------------------------------------------------------+
*/

// [multilanguage]
@include_once(e_THEME."exas_b07_multicolor/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."exas_b07_multicolor/languages/English.php");

// [theme]
$themename = "exas_b07_multicolor";
$themeversion = "1.0";
$themeauthor = "Exas.nl ";
$themeemail = "info@exas.nl";
$themewebsite = "http://www.exas.nl";
$themedate = "21/08/2005";
$themeinfo = "Light theme based on a Mamboteam.com design.";
define("STANDARDS_MODE", "");
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;

define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");
define("IMODE", "lite");

function theme_head() {
	return "<link rel='stylesheet' href='".THEME_ABS."nav_menu.css' />\n";
}

// [layout]

$layout = "_default";

$HEADER = "
<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='collefttop'></td>
<td id='logo'>
<div id='sitename'> {SITENAME} </div>
</td>
<td id='logo2'>
<div id='banner'>{BANNER}</div>
 
</td>
<td id='colrighttop'></td>
</tr>
</table>

<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colleft'></td>
<td >
<div>{SITELINKS_ALT=no_icons}</div>
</td>
<td id='colright'></td>
</tr>
</table>

<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colleft2'></td>
<td id='infoleft'>
<div class='fullpadder'>
{CUSTOM=search+".THEME_ABS."images/search_16.png+19+18}
</div>
</td>
<td id='inforight'>
<div class='fullpadder'>
{CUSTOM=clock}
</div>
</td>
<td id='colright2'></td>
</tr>
</table>

<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colleft3'></td>
<td>
<table class='tablewrapper' cellpadding='0' cellspacing='0'>
<tr>

<td id='menuarea'>
<table class='menutable' cellpadding='0' cellspacing='0'>
<tr>
<td class='menutop'></td>
</tr>
<tr>
<td class='menubody'>
<div class='menuwrapper'>
{SETSTYLE=menu1}
{SITELINKS=flat:2}
{MENU=1}
</div>
</td>
</tr>
<tr>
<td class='menubottom'></td>
</tr>
</table>
</td>

<td id='contentarea'>
<div class='padder'>
<table class='tablewrapper' cellpadding='0' cellspacing='0'>
<tr><td class='pageheader'></td></tr>
<tr><td class='pagebody'>

<embed src='mio_mp3.mp3' width='185' height='25' autostart='True' loop='True'></embed>
<noembed>Il tuo browser non supporta il tag embed per questo motivo che non senti alcuna musica</noembed>


";

$FOOTER = "
</td></tr>
</table>
</div>
</td>
<td id='menuarea2'>
<table class='menutable' cellpadding='0' cellspacing='0'>
<tr>
<td class='menutop'></td>
</tr>
<tr>
<td class='menubody'>
<div class='menuwrapper'>
{SETSTYLE=menu1}
{MENU=2}
</div>
</td>
</tr>
<tr>
<td class='menubottom'></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td id='colright3'></td>
</tr>
</table>
<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colbotleft'></td>
<td id='colbot'>
<div class='smalltext' style='text-align: center;'>{SITEDISCLAIMER}<br /></div>
</td>
<td id='colbotright'></td>
</tr>
</table>

";

$CUSTOMHEADER = "
<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='collefttop'></td>
<td id='logo'>
<div id='sitename'>[ {SITENAME} ]</div>
</td>
<td id='logo2'>
<div id='banner'>{BANNER}</div>
 
</td>
<td id='colrighttop'></td>
</tr>
</table>

<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colleft'></td>
<td >
<div>{SITELINKS_ALT=no_icons}</div>
</td>
<td id='colright'></td>
</tr>
</table>

<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colleft2'></td>
<td id='infoleft'>
<div class='fullpadder'>
{CUSTOM=search+".THEME_ABS."images/search_16.png+19+18}
</div>
</td>
<td id='inforight'>
<div class='fullpadder'>
{CUSTOM=clock}
</div>
</td>
<td id='colright2'></td>
</tr>
</table>

<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colleft3'></td>
<td>
<table class='tablewrapper' cellpadding='0' cellspacing='0'>
<tr>

<td id='menuarea'>
<table class='menutable' cellpadding='0' cellspacing='0'>
<tr>
<td class='menutop'></td>
</tr>
<tr>
<td class='menubody'>
<div class='menuwrapper'>
{SETSTYLE=menu1}
{SITELINKS=flat:2}
{MENU=1}
</div>
</td>
</tr>
<tr>
<td class='menubottom'></td>
</tr>
</table>
</td>

<td id='fullcontentarea'>
<div class='padder'>
<table class='tablewrapper' cellpadding='0' cellspacing='0'>
<tr><td class='pageheader'></td></tr>
<tr><td class='pagebody'>

";

$CUSTOMFOOTER = "
</table>
</div>
</td>
</table>
</div>
</td>

<td id='colright3'></td>
</tr>
</table>
<table class='maintable' cellpadding='0' cellspacing='0'>
<tr>
<td id='colbotleft'></td>
<td id='colbot'>
<div class='smalltext' style='text-align: center;'>{SITEDISCLAIMER}<br />{THEMEDISCLAIMER}</div>
</td>
<td id='colbotright'></td>
</tr>
</table>

";

$CUSTOMPAGES = "forum.php forum_post.php forum_viewforum.php forum_viewtopic.php user.php submitnews.php download.php links.php stats.php usersettings.php signup.php faq.php";

$NEWSSTYLE = "
<div class='pagebodynews'><div class='contentheading' style='padding:3px'>{STICKY_ICON}
{NEWSICON}&nbsp;{NEWSTITLE}</div>
{NEWSBODY}
{EXTENDED}
<div style='text-align:right' class='smalltext'>
{NEWSAUTHOR}
 - {NEWSDATE}
<br />
{NEWSCOMMENTS}{TRACKBACK}<br /> {EMAILICON}&nbsp;{PRINTICON}&nbsp;{ADMINOPTIONS}&nbsp;{PDFICON}
<br /><br />
</div>
</div>
";

$NEWSLISTSTYLE = "
<div class='pagebodynews'><div class='contentheading' style='padding:1px'>{STICKY_ICON}
{NEWSICON}&nbsp;{NEWSTITLELINK}</div>
&nbsp; &nbsp; {NEWSSUMMARY}
<div style='text-align:right' class='smalltext'>

{NEWSDATE}&nbsp;{NEWSCOMMENTS}&nbsp;{TRACKBACK}
<div class='newsbottom'>
<br />
</div>
</div>
</div>
";


define("ICONSTYLE",  "float: left;  border:0");
define("COMMENTLINK", LAN_THEME_2);
define("COMMENTOFFSTRING", LAN_THEME_3);
define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", " | ");
define("CBWIDTH","98%");



// [linkstyle]

define('PRELINK', "");
define('POSTLINK', "");
define('LINKSTART', "<div class='link1' onmouseover=\"this.className='link2';\" onmouseout=\"this.className='link1';\"><div class='linktext'><img src='".THEME_ABS."images/bullet1.gif' alt='' />&nbsp;&nbsp;");
define("LINKSTART_HILITE", "<div class='link2' onmouseover=\"this.className='link1';\" onmouseout=\"this.className='link2';\"><div class='linktext'><img src='".THEME_ABS."images/bullet1.gif' alt='' />&nbsp;&nbsp;");
define('LINKEND', "</div></div>");
define('LINKDISPLAY', 1);
define('LINKALIGN', "left");

//	[tablestyle]

function tablestyle($caption, $text, $mode)
{
	global $style;

	if($style == "menu1")
	{
		echo "<div class='caption'><div class='captionpadder'>$caption</div></div><br /><div class='padder'>$text</div><br />";
	}
	else if($style == "menu2")
	{
		echo "<table class='menutable' cellpadding='0' cellspacing='0'>
<tr><td class='menutop2'></td></tr>
<tr><td class='menubody2'><div class='menuwrapper'>$caption<br /><br />$text</div></td></tr>
<tr><td class='menubottom2'></td></tr>
</table>";
	}
	else
	{
		echo "<div class='captiontext'>$caption<br /><br /></div>$text<br />";
	}
}

$COMMENTSTYLE = "<br /><br />
<div class='captiontext'><img src='".THEME_ABS."images/bullet1.gif' alt='' style='vertical-align: middle;' /> {USERNAME} | {TIMEDATE}</div>
{COMMENT} {COMMENTEDIT}<br />
<span class='smalltext'>{REPLY}{IPADDRESS}</span>
";


$CHATBOXSTYLE = "
<div class='tbox'><img src='".THEME_ABS."images/bullet1.gif' alt='' style='vertical-align: middle;' /> {USERNAME} | <span class='cbdate'>{TIMEDATE}</span></div>
<div class='chatboxtext'>
{MESSAGE}
</div>
<br />";

?>
