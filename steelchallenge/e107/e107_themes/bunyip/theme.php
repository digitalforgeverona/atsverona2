<?php
/*
+---------------------------------------------------------------+
|	e107 website system
|
|	http://e107org
|
|	Released under the terms and conditions of the
|	GNU General Public License (http://gnu.org).
|
+---------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

// [multilanguage]

@include_once(e_THEME."bunyip/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."bunyip/languages/English.php");

// [theme]
$themename = "bunyip";
$themeversion = "1.0";
$themeauthor = "Star Adrael";
$themeemail = "staradrael@gmail.com";
$themewebsite = "http://www.staradrael.net";
$themedate = "17/03/2007";
$themeinfo = "Created by Star Adrael";
define("STANDARDS_MODE", TRUE);	 // for stupid IE
$xhtmlcompliant = TRUE;	 // Hopefully it still is!
$csscompliant = FALSE;	 // Ditto
define("IMODE", "lite");	//use the default 'lite' image set
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");	 
define("USER_WIDTH","width:100%");	 //make the forums 100% of the space available or any width you define

if(!defined("e_THEME")){ exit; }
$page=substr(strrchr($_SERVER['PHP_SELF'], "/"), 1);
define("e_PAGE", $page);

// [layout]

$layout = "_default";

$HEADER = "
<table id='wrapper'>

	<tr><td colspan='2' id='menuspace'></td></tr>

	<tr id='header'>
	<td colspan='2' id='header2'>

<table id='headerheader'><tr><td id='logoheader'>
{SITENAME}
</td>
<td id='bannerheader'>{BANNER=top}</td>
</tr></table>

</td>	
 </tr>

	<tr><td colspan='2' id='menuspace'></td></tr>

	<tr>
		<td colspan='2' id='menu'>

				<table id='navheader'><tr><td id='navheader1'>Navigation Menu:</td><td id='navheader2'>{SITELINKS_ALT=noclick}</td></tr></table>

</td>
	</tr>

	<tr><td colspan='2' id='menuspace'></td></tr>

	<tr>
		<td colspan='2' id='menu2'>

<table id='searchheader'><tr><td id='searchheader1'>{SEARCH}</td><td id='searchheader2'>{CUSTOM=login}</td></tr></table>

</td>
	</tr>

	<tr><td colspan='2' id='menuspace'></td></tr>

<tr>
<td id='content' valign='top'>
";

$FOOTER = "
</td>
<td id='sidebar' valign='top'>
		{MENU=1}
</td>
		</tr>
	</table>
<br>
<table id='footerhr'>
<tr><td><td></tr>
</table>
<br>
<table id='bannerfooter'>
<tr><td>
{BANNER=bottom}
<td></tr>
</table>

	<table id='footer'>
			<tr><td>{SITEDISCLAIMER}<td></tr>
</table>


";

$NEWSSTYLE = "
<div class='entry-title'>{NEWSTITLE}</div>
<div class='date'>".LAN_THEME_6." {NEWSAUTHOR} ".LAN_THEME_7." {NEWSDATE}</div>
<p>
	{NEWSBODY}
	{EXTENDED}
</p>
<br>
<hr>
<br>
<div class='comments'>{NEWSCOMMENTS}{TRACKBACK}</div><div class='icons'>{EMAILICON}{PRINTICON}{PDFICON}{ADMINOPTIONS}</div>
<br />
";

define("ICONSTYLE", "float: left; border:0");
define("COMMENTLINK", LAN_THEME_3);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", " | ");


// [linkstyle]
define('PRELINK', "<ul>");
define('POSTLINK', "</ul>");
define('LINKSTART', "<li>");
define("LINKSTART_HILITE", "");
define('LINKEND', "</li>");
define('LINKDISPLAY', 1);
define('LINKALIGN', "center");

//	[tablestyle]

function tablestyle($caption, $text, $mode){
	echo "
	<div class='entry-title2'>$caption</div>\n
	<div class='sidemenu'>$text</div>\n
	<br />";
}
$COMMENTSTYLE = "
<table style='width: 450px;'>
<tr>
<td style='width: 30%; vertical-align: top;'><span class='mediumtext'>{USERNAME}</span><br /><span class='smalltext'>{TIMEDATE}</span><br />{AVATAR}{REPLY}</td>
<td style='width: 70%; vertical-align: top;'><span class='mediumtext'>{COMMENT} {COMMENTEDIT}</span></td>
</tr>
</table>";


$CHATBOXSTYLE = "
<img src='".THEME."images/icon-comment.png' style='vertical-align: middle' />&nbsp;<b>{USERNAME}</b>
<div class='smalltext'>
{MESSAGE}
</div>
<br />";

?>
