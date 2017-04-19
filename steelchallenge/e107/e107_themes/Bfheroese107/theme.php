<?php
if(!defined("e107_INIT")){ exit; }

/*

Bfheroes CSS Template, Fixed-Width, 3-Columns
Released: 17-08-08
Copyright: bfhero, http://www.bfheroesita.com

License: Creative Commons Attribution-Noncommercial 3.0 License. 
Essentially this means you may use our free templates for any 
personal or non-profit web design project as long as you give me 
credit . I require a link back to http://www.bfheroesita.com/ 
in the footer of all sites using this template. For more info on
Creative Commons, please visit http://www.creativecommons.org

--

e107 Theme
--------------
©2008 bfhero
bfheroita.com
e107 [at] bfhero [dot] net

*/


// multilanguage
@include_once(e_THEME."Bfheroes/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."Bfheroes/languages/English.php");

// theme
$themename = "Bfheroes";
$themeversion = "1.0";
$themeauthor = "bfhero";
$themeemail = "bfhero@bfheroesita.com";
$themewebsite = "http://www.bfheroesita.com/";
$themedate = "17-08-2008";
$themeinfo = "Theme created by <a href='http://www.bfheroesita.com'>bfhero</a>";
define("STANDARDS_MODE", TRUE);
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
define("IMODE", "lite");
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");
$no_core_css = TRUE;
define("BULLET", "bullet2.gif");

// layout
$layout = "_default";

$HEADER = "
<!-- Begin Outside Page Wrapper -->
<div id='wrapper'>
 
<!-- Begin Top Bar (Pre-Header) -->
<div id='top'>
<p>Ciao benvenuto su bfheroesita <a href='#'>bfheroesita...</a></p>
</div>
<!-- End Top Bar (Pre-Header) -->

<!-- Begin Page Header --> 
<div id='header'>
<h1>{SITENAME}</h1>
<h2>{SITETAG}</h2>
</div>
<!-- End Page Header -->
 
<!-- Begin Menu Bar -->
<div id='menu'>
<div id='navcontainer'>
<div class='navlist'>{SITELINKS_ALT=no_icons}</div>
</div>
</div>
<!-- End Menu Bar -->
 
<!-- Begin Main Content Area -->
<div id='content'>
<div id='inside'>

<!-- Begin Left Column -->
<div id='left'>
{SITELINKS}
{MENU=1}
</div>
<!-- End Left Column -->

<!-- Begin Middle Column -->
<div id='middle'>
{WMESSAGE}
";

$FOOTER = "
</div>
<!-- End Middle Column -->
 
<!-- Begin Right Column -->
<div id='right'> 
{MENU=2}
</div>
<!-- End Right Column -->
 
<div class='spacer'></div>
 
</div>
</div>
<!-- End Main Content Area -->

<!-- Begin Footer -->
<div id='footer' class='footertext'>
<br />
{SITEDISCLAIMER}
<br />
CSS Template courtesy of <a title='bfheores' href='http://www.bfheroesita.com'>Designs By bfhero</a>. Ported to e107 by <a href='http://www.bfheroesita.com'>bfhero</a><br />
<a title='Valid XHTML 1.0 Transitional' href='http://validator.w3.org/check?uri=referer'>Valid XHTML 1.1</a>
</div>
<!-- End PageFooter -->
 
</div>
<!-- End Outside Page Wrapper -->
";

$CUSTOMHEADER = "
<!-- Begin Outside Page Wrapper -->
<div id='wrapper'>
 
<!-- Begin Top Bar (Pre-Header) -->
<div id='top'>
<p>Ciao benvenuto su bfheroesita <a href='#'>bfheroesita...</a></p>
</div>
<!-- End Top Bar (Pre-Header) -->

<!-- Begin Page Header --> 
<div id='header'>
<h1>{SITENAME}</h1>
<h2>{SITETAG}</h2>
</div>
<!-- End Page Header -->
 
<!-- Begin Menu Bar -->
<div id='menu'>
<div id='navcontainer'>
<div class='navlist'>{SITELINKS_ALT=no_icons}</div>
</div>
</div>
<!-- End Menu Bar -->
 
<!-- Begin Main Content Area -->
<div id='content'>
<div id='inside'>

<!-- Begin Left Column -->
<div id='left'>
{SITELINKS}
{MENU=1}
</div>
<!-- End Left Column -->

<!-- Begin Middle Column -->
<div id='middlecustom'>
{WMESSAGE}
";

$CUSTOMFOOTER = "
</div>
<!-- End Middle Column -->
 
<div class='spacer'></div>
 
</div>
</div>
<!-- End Main Content Area -->

<!-- Begin Footer -->
<div id='footer' class='footertext'>
<br />
{SITEDISCLAIMER}
<br />
CSS Template courtesy of <a title='bfheores' href='http://www.bfheroesita.com'>Designs By bfhero</a>. Ported to e107 by <a href='http://www.bfheroesita.com'>bfhero</a><br />
<a title='Valid XHTML 1.0 Transitional' href='http://validator.w3.org/check?uri=referer'>Valid XHTML 1.1</a>
</div>
<!-- End PageFooter -->
 
</div>
<!-- End Outside Page Wrapper -->
";


$CUSTOMPAGES = "forum.php forum_post.php forum_viewforum.php forum_viewtopic.php user.php submitnews.php download.php links.php stats.php usersettings.php signup.php";


// newsstyle
$NEWSSTYLE = "
{NEWSICON}<br />
<h3>{NEWSTITLE}</h3>
{NEWSBODY}
{EXTENDED}<br /><br />
<span class='smalltext'>{NEWSDATE=long}  by  {NEWSAUTHOR}<br />Posted in {NEWSCATEGORY} | {NEWSCOMMENTS} | &nbsp; {EMAILICON} &nbsp; {PRINTICON} &nbsp; {PDFICON} &nbsp; {ADMINOPTIONS}</span>
<br /><br /><br />
";

// newsliststyle
$NEWSLISTSTYLE = "
<p>
{NEWSTITLELINK} {NEWSSUMMARY}<br />
<span class='smalltext'>{NEWSDATE}</span>
</p>
"; 

// definitions
define("ICONSTYLE", "float:left; border:0; margin-right: 10px; margin-bottom: 3px; margin-top: 5px; ");
define("COMMENTLINK", LAN_THEME_2);
define("COMMENTOFFSTRING", LAN_THEME_3);
define("PRE_EXTENDEDSTRING", "<br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", " | ");

// tablestyle
function tablestyle($caption, $text, $mode){
echo "
		<h4>$caption</h4>
		$text
		<br /><br />
	";
}

// linkstyle
define('PRELINK', "");
define('POSTLINK', "");
define('LINKSTART', "<img src='".e_THEME."Bfheroes/images/bullet2.gif' alt='bullet2' style='vertical-align: middle;' /> ");
define('LINKEND', "<br />");
define('LINKDISPLAY', 2);
define('LINKALIGN', "left");

// commentstyle
$COMMENTSTYLE = "
<div style='padding-left: 25px;'>
{COMMENT} {COMMENTEDIT}<br /><br />
<span class='smalltext'>
[ ".LAN_THEME_6." {USERNAME} :: {TIMEDATE} ]
</span>
</div>
<br /><br />
";

// chatboxstyle
$CHATBOXSTYLE = "
<img src='".e_IMAGE_ABS."admin_images/chatbox_16.png' alt='' style='vertical-align: middle;' />
<b>{USERNAME}</b>
<div class='smalltext'>
{MESSAGE}
</div>
<br />
";

?>