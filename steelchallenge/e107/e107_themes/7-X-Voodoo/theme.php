<?php
/*
+---------------------------------------------------------------+
|	e107 website system
|
|	©Steve Dunstan 2001-2002
|	http://e107.org
|	jalist@e107.org
|
|	Released under the terms and conditions of the
|	GNU General Public License (http://gnu.org).
+---------------------------------------------------------------+
*/

// [theme]

$themename = "7-X-Voodoo";
$themeversion = "1.0";
$themeauthor = "KulleKulle";
$themeemail = "KulleKulle@xthemes.us";
$themewebsite = "http://www.xthemes.us";
$themedate = "29/11/2005";
$themeinfo = "Theme made by KulleKulle";

// [multilanguage]

@include_once(e_THEME."7-X-Voodoo/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."7-X-Voodoo/languages/English.php");

// Define modes
define("IMODE", "lite"); 
define("THEME_DISCLAIMER", "
<div style='text-align: center;' title='High quality custom build e107 Themes.'>
<a style='color: black; text-decoration: none;' onclick=\"window.open('http://e107pimps.org'); return false;\" href=\"http://e107pimps.org\">
<img style='border: 0; vertical-align: middle;' src='".THEME."images/clean.gif' alt='' />
E107pimps.org theme.</a>
</div>
");
// [layout]
$layout = "_default";

$HEADER = 
"
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
  <tr>
<td class='hoofdleft'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
<td class='rep'>
<div style='text-align:center;'>
{CUSTOM=clock}
</div>
</td>
<td class='hoofdend'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
<td class='headtrans'></td>
<td class='headerleft2'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
<td class='lep'>
<div style='text-align:center;'>
{SITETAG}
</div>
</td>
<td class='headright'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
</tr>
</table>
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='slidetopl'><img src='".THEME."images/blank.gif' width='10' height='116' alt='' style='display: block;' /></td>
<td class='logo'><img src='".THEME."images/blank.gif' width='475' height='116' alt='' style='display: block;' /></td>
<td class='logoex'>
<div style='text-align:center'>
{BANNER}
</div>
</td>
<td class='slidetopr'><img src='".THEME."images/blank.gif' width='10' height='116' alt='' style='display: block;' /></td>
</tr>
</table>
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='breakerl'><img src='".THEME."images/blank.gif' width='10' height='28' alt='' style='display: block;' /></td>
<td class='break'></td>
<td class='breakerr'><img src='".THEME."images/blank.gif' width='10' height='28' alt='' style='display: block;' /></td>
</tr>
</table>
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='zijdel'><img src='".THEME."images/blank.gif' width='10' height='4' alt='' style='display: block;' /></td>
<td class='leftmenu' style='width:18% ; vertical-align: top' >
{SITELINKS=menu}
{MENU=1}
</td>
<td class='line'><img src='".THEME."images/blank.gif' width='11' height='4' alt='' style='display: block;' /></td>
<td class='timmy' style='width:64%; vertical-align: top'>";
$FOOTER = 
"
</td>
<td class='line'><img src='".THEME."images/blank.gif' width='11' height='4' alt='' style='display: block;' /></td>
<td class='rightmenu' style='width:18%; vertical-align:top'>
{MENU=2}
</td>
<td class='rechterzijde'><img src='".THEME."images/blank.gif' width='10' height='4' alt='' style='display: block;' /></td>
</tr>
</table>
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='fotl'><img src='".THEME."images/blank.gif' width='10' height='4' alt='' style='display: block;' /></td>
<td class='fotm'></td>
<td class='fotr'><img src='".THEME."images/blank.gif' width='10' height='4' alt='' style='display: block;' /></td>
</tr>
</table>  
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='bodeml'><img src='".THEME."images/blank.gif' width='10' height='12' alt='' style='display: block;' /></td>
<td class='bodebob'>
<div style='text-align:center'>
{THEMEDISCLAIMER}
{SITEDISCLAIMER}
</div>
</td>
<td class='bodemr'><img src='".THEME."images/blank.gif' width='10' height='12' alt='' style='display: block;' /></td>
</tr>
</table>
<table width='100%'  border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='bbl'><img src='".THEME."images/blank.gif' width='10' height='12' alt='' style='display: block;' /></td>
<td class='undmud'></td>
<td class='bbr'><img src='".THEME."images/blank.gif' width='10' height='12' alt='' style='display: block;' /></td>
</tr>
</table>
";


//	[newsstyle]

$NEWSSTYLE = "

<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='topleft'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
<td class='toprep'>
<div style='text-align:center'>
{NEWSTITLE}
</div>	
</td>
<td class='topright'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
</tr>
</table>
<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='mol'><img src='".THEME."images/blank.gif' width='18' height='9' alt='' style='display: block;' /></td>
<td class='mot'></td>
<td class='mor'><img src='".THEME."images/blank.gif' width='18' height='9' alt='' style='display: block;' /></td>
</tr>
</table>
<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='sidel1'><img src='".THEME."images/blank.gif' width='19' height='2' alt='' style='display: block;' /></td>
<td class='bodytable'>
<div style='text-align:right'>
{ADMINOPTIONS}
{PRINTICON}
{EMAILICON}
{NEWSID}
{NEWSICON}
{NEWSCATEGORY}
</div>
{NEWSBODY}
{EXTENDED}
<br/>
<br/>
Inviato da:
{NEWSAUTHOR} 
- 
{NEWSDATE} 
{NEWSCOMMENTS} 
</td>
<td class='sider1'><img src='".THEME."images/blank.gif' width='19' height='2' alt='' style='display: block;' /></td>
</tr>
</table>
<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='botl'><img src='".THEME."images/blank.gif' width='18' height='13' alt='' style='display: block;' /></td>
<td class='botm'>
</td>
<td class='botr'><img src='".THEME."images/blank.gif' width='18' height='13' alt='' style='display: block;' /></td>
</tr>
</table>

";

define("ICONSTYLE", "border:0; vertical-align:middle");
define("COMMENTLINK", "Commenti: ");
define("COMMENTOFFSTRING", "Commenti disabilitati");

define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", "Leggi tutto ...");
define("POST_EXTENDEDSTRING", " ]<br />");


// [linkstyle]

define(PRELINK, "");
define(POSTLINK, "");
define(LINKSTART, "<img src='".THEME."images/bullet3.gif' alt='' />&nbsp;");
define(LINKEND, "<br />");
define(LINKALIGN, "left");
define(LINKDISPLAY, 2);

//	[tablestyle]
function tablestyle($caption, $text, $mode=""){
	echo "
	<table cellpadding='0' cellspacing='0'>
<tr>
<td class='tpl'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
<td class='tpr' style='white-space:nowrap'>".$caption."</td>
<td class='tre'><img src='".THEME."images/blank.gif' width='18' height='28' alt='' style='display: block;' /></td>
</tr>
</table>

<table cellpadding='0' cellspacing='0'>
<tr>
<td class='tl'><img src='".THEME."images/blank.gif' width='18' height='9' alt='' style='display: block;' /></td>
<td class='tm'></td>
<td class='tr'><img src='".THEME."images/blank.gif' width='18' height='9' alt='' style='display: block;' /></td>
</tr>
</table>

<table cellpadding='0' cellspacing='0'>
<tr>
<td class='lef'><img src='".THEME."images/blank.gif' width='19' height='2' alt='' style='display: block;' /></td>
<td class='mm'>".$text."</td>
<td class='rig'><img src='".THEME."images/blank.gif' width='19' height='2' alt='' style='display: block;' /></td>
</tr>
</table>


<table cellpadding='0' cellspacing='0'>
<tr>
<td class='bl'><img src='".THEME."images/blank.gif' width='18' height='13' alt='' style='display: block;' /></td>
<td class='bm'>
</td>
<td class='br'><img src='".THEME."images/blank.gif' width='18' height='13' alt='' style='display: block;' /></td>
</tr>
</table>


";
}

// [commentstyle]

$COMMENTSTYLE = "
<div style='text-align:center'>
<table style='width:100%'>
<tr>
<td colspan='2' class='forumheader3'>
{SUBJECT}
<b>
{USERNAME}
</b>
 | 
 {TIMEDATE}
</td>
</tr>
<tr>
<td style='width:30%; vertical-align:top'>
<div class='spacer'>
{AVATAR}
</div>
<span class='smalltext'>
{LEVEL}
{COMMENTS}
<br />
{JOINED}
<br />
{REPLY}
</span>
</td>
<td style='width:50%; vertical-align:top'>
{COMMENT}
</td>
</tr>
</table>
</div>
<br />";

//	[chatboxstyle]

$CHATBOXSTYLE = "
<span class='defaulttext'><b>{USERNAME}</b></span>
<span class='smalltext'>on {TIMEDATE}</span><br />
<div class='defaulttext' style='text-align:left'>
{MESSAGE}
</div>
<br />
";





?>