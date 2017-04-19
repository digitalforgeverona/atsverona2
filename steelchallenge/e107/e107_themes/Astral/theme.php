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

$themename = "Astral";
$themeversion = "1.0";
$themeauthor = "KulleKulle";
$themeemail = "KulleKulle@e107pims.org";
$themewebsite = "http://e107pims.org";
$themedate = "18/1/2005";
$themeinfo = "Template & Coding By KulleKulle";

// [multilanguage]

@include_once(e_THEME."Astral/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."Astral/languages/English.php");

// Define modes
define("IMODE", "dark");  
define("THEME_DISCLAIMER", "
<div style='text-align: center;' title='High quality custom build e107 Themes.'>
<a style='color: Silver; text-decoration: none;' onclick=\"window.open('http://e107pimps.org'); return false;\" href=\"http://e107pimps.org\">
<img style='border: 0; vertical-align: middle;' src='".THEME."images/clean.gif' alt='' />
E107pimps.org theme.</a>
</div>
");
// [layout]
$layout = "_default";
$HEADER .= 
"<div style='text-align:center'>


<table width='100%'   border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='tole'><img src='".THEME."images/blank.gif' width='95' height='30' alt='' style='display: block;' /></td>
<td class='toed'>
<div style='text-align:center'>
{CUSTOM=clock}
</div>
</td>
<td class='tori'><img src='".THEME."images/blank.gif' width='99' height='30' alt='' style='display: block;' /></td>
</tr>
</table>

<table width='100%'   border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='otle'><img src='".THEME."images/blank.gif' width='79' height='23' alt='' style='display: block;' /></td>
<td class='oted'></td>
<td class='otri'><img src='".THEME."images/blank.gif' width='80' height='23' alt='' style='display: block;' /></td>
</tr>
</table>



<table width='100%'   border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='leftt'> <img src='".THEME."images/blank.gif' width='17 alt='' style='display: block;' /></td>
<td class='menunew' style='width:20%;vertical-align: top' >
<br/>
<div class='siteli' style='text-align:left'>
{SITELINKS=menu}
{MENU=1}
</div>
</td>

<td class='bluer'style='width:60%;vertical-align: top'>
<div style='text-align:center'>
<br/>
<div style='text-align:center'>
{BANNER}
</div>
";



$FOOTER .= 
"
</div>
</td>

<td class='menurit'style='width:20%;vertical-align: top' align='right'>
<br/>
{MENU=2}
</td>
<td class='rightt'><img src='".THEME."images/blank.gif' width='17 alt='' style='display: block;' /></td>
</tr>
</table>

<table width='100%'   border='0' cellpadding='0' cellspacing='0'>
<tr>
<td class='mole'><img src='".THEME."images/blank.gif' width='297' height='62' alt='' style='display: block;' /></td>
<td class='morep'></td>
<td class='mori'><img src='".THEME."images/blank.gif' width='303' height='62' alt='' style='display: block;' /></td>
</tr>
</table>


";
$FOOTER .= <<<EOF
<div style="text-align: center;">

</div>
EOF;
$FOOTER .= "
{SITEDISCLAIMER}
<br/>
<br/>
{THEMEDISCLAIMER}
</div>
";


$CUSTOMPAGES = "news.php forum.php ";

//	[newsstyle]

$NEWSSTYLE = "

<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='libo'><img src='".THEME."images/blank.gif' width='17' height='15' alt='' style='display: block;' /></td>
<td class='bo'></td>
<td class='rebo'><img src='".THEME."images/blank.gif' width='17' height='15' alt='' style='display: block;' /></td>
</tr>
</table>


<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='sile'><img src='".THEME."images/blank.gif' width='9' height='15' alt='' style='display: block;' /></td>
<td class='titbar'>
<div style='text-align:left'>
{PRINTICON}
{EMAILICON}
{ADMINOPTIONS}
</div>
<div style='text-align:center'>
{NEWSTITLE}
</div>
</div>
</td>
<td class='sire'><img src='".THEME."images/blank.gif' width='12' height='15' alt='' style='display: block;' /></td>
</tr>
</table>



<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='sile'><img src='".THEME."images/blank.gif' width='9' height='15' alt='' style='display: block;' /></td>
<td class='siwri'>
{NEWSBODY}
{EXTENDED}
</td>
<td class='sire'><img src='".THEME."images/blank.gif' width='12' height='15' alt='' style='display: block;' /></td>
</tr>
</table>


<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='sile'><img src='".THEME."images/blank.gif' width='9' height='15' alt='' style='display: block;' /></td>
<td class='newsshit'>
Inviato da:
{NEWSAUTHOR} 
| 
{NEWSDATE}
 | 
{NEWSCOMMENTS}
</td>
<td class='sire'><img src='".THEME."images/blank.gif' width='12' height='15' alt='' style='display: block;' /></td>
</tr>
</table>

<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='bole'><img src='".THEME."images/blank.gif' width='18' height='15' alt='' style='display: block;' /></td>
<td class='bene'></td>
<td class='bore'><img src='".THEME."images/blank.gif' width='20' height='15' alt='' style='display: block;' /></td>
</tr>
</table>

<br/>
<br/>
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
<br/>	
<table width='100%'cellpadding='0' cellspacing='0'>
<tr>
<td class='wastel'><img src='".THEME."images/blank.gif' width='60' height='36' alt='' style='display: block;' /></td>
<td class='wastrep'>
<div class='mtex'>
".$caption."
</div>
</td>
<td class='waster'><img src='".THEME."images/blank.gif' width='26' height='36' alt='' style='display: block;' /></td>
</tr>
</table>
<br/>

<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='libo'><img src='".THEME."images/blank.gif' width='17' height='15' alt='' style='display: block;' /></td>
<td class='bo'></td>
<td class='rebo'><img src='".THEME."images/blank.gif' width='17' height='15' alt='' style='display: block;' /></td>
</tr>
</table>


<table width='100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='sile'><img src='".THEME."images/blank.gif' width='9' height='15' alt='' style='display: block;' /></td>
<td class='mmid'>
<div style='text-align=left'>
".$text."
</div>
</td>
<td class='sire'><img src='".THEME."images/blank.gif' width='12' height='15' alt='' style='display: block;' /></td>
</tr>
</table>

<table style='width:100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='bole'><img src='".THEME."images/blank.gif' width='18' height='15' alt='' style='display: block;' /></td>
<td class='bene'></td>
<td class='bore'><img src='".THEME."images/blank.gif' width='20' height='15' alt='' style='display: block;' /></td>
</tr>
</table>
<br/>

";
}

// [commentstyle]
$COMMENTSTYLE = "
<div style='text-align:center'>
<table style='width:100%'>
<tr>
<td colspan='2' class='forumheader'>
<img src='".THEME."images/bullet2.gif' alt='bullet' /> 
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
</span>
</td>
<td style='width:70%; vertical-align:top'>
{COMMENT}
</td>
</tr>
</table>
</div>
<br />";

//	[chatboxstyle]

$CHATBOXSTYLE = "
<div class='spacer'>
<div class='forumheader3'>
<img src='".THEME."images/bullet2.gif' alt='bullet' />
<b>{USERNAME}</b><br />
<span class='smalltext'>{TIMEDATE}</span><br />
{MESSAGE}
</div>
</div>
";




$CHATBOXSTYLE = "

<div class='spacer'>
<div class='forumheader3'>
<img src='".THEME."images/bullet2.gif' alt='bullet' />
<b>{USERNAME}</b><br />
<span class='smalltext'>{TIMEDATE}</span><br />
{MESSAGE}
</div>
</div>";




?>
