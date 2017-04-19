<?php
if(!defined("e107_INIT")){ exit; }

/*

Copyright: Darren Hester, http://www.designsbydarren.com

License: Creative Commons Attribution-Noncommercial 3.0 License. 
Essentially this means you may use our free templates for any 
personal or non-profit web design project as long as you give me 
credit . I require a link back to http://www.designsbydarren.com/ 
in the footer of all sites using this template. For more info on
Creative Commons, please visit http://www.creativecommons.org

--

e107 Theme
--------------
©2008 batboy
batboy.net
e107 [at] batboy [dot] net

*/


// multilanguage
@include_once(e_THEME."News_Portal/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."News_Portal/languages/English.php");

// theme
$themename = "News_Portal";
$themeversion = "1.1";
$themeauthor = "batboy";
$themeemail = "j@batboy.net";
$themewebsite = "http://batboy.net/";
$themedate = "2008-12-29";
$themeinfo = "Theme by <a href='http://www.designsbydarren.com'>Darren Hester</a>. Ported to e107 by <a href='http://batboy.net/'>batboy.net</a>";
define("STANDARDS_MODE", TRUE);
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
define("IMODE", "lite");
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");
$no_core_css = TRUE;
define("BULLET", "bullet.gif");
define("USER_WIDTH", "width:100%");

// layout
$layout = "_default";

$HEADER = "
<div id='page_wrapper'>
<div id='header_wrapper'>
<div id='header'>

<h1>{SITENAME}</h1>
<h2>{SITETAG}</h2>

</div>

<div id='navcontainer'>
{LINKSTYLE=topstyle}
{SITELINKS}
</div>

</div>

<div id='left_side'>
{MENU=1}

<!--
<h3>Left Side</h3>
<div class='featurebox_side'>
Lorem ipsum summo nominavi pri et. Stet eruditi perfecto at 
sed, ad enim <a href='#'>constituto</a> deseruisse quo, mea 
no quem eros munere. 
</div>
-->
</div>

<div id='right_side'>
{MENU=2}

<!--
<h3>Right Side</h3>
<div class='featurebox_side'>
Lorem ipsum summo nominavi pri et. Stet eruditi perfecto at sed, 
ad enim constituto deseruisse quo, mea no quem eros munere. 
</div>
-->
</div>

<div id='content'>
<!-- <div align='center'>{adsense_468x60}</div> -->

<div class='featurebox_center'>
Here you can add your own featured content!
</div>
"; 



$FOOTER = "
</div>
<div id='footer'>
{LINKSTYLE=bottomstyle}
{SITELINKS}
<br />
{SITEDISCLAIMER}<br />".LAN_THEME_1."
</div>
</div>
";



// newsstyle
$NEWSSTYLE = "
{NEWSICON}<h3>{NEWSTITLE}</h3>
<p>{NEWSBODY}
{EXTENDED}</p>
<span class='smalltext'>{NEWSDATE=long}  by  {NEWSAUTHOR}<br />Postato in {NEWSCATEGORY} | {NEWSCOMMENTS} | &nbsp; {EMAILICON} &nbsp; {PRINTICON} &nbsp; {PDFICON} &nbsp; {ADMINOPTIONS}</span>
<br /><br />
";

// newsliststyle
$NEWSLISTSTYLE = "
<p>
{NEWSTITLELINK} {NEWSSUMMARY}<br />
<span class='smalltext'>{NEWSDATE}</span>
</p>
"; 

// definitions
define("ICONSTYLE", "float:left; border:0; margin-right: 10px; margin-bottom: 3px; margin-top: 5px;");
define("COMMENTLINK", LAN_THEME_2);
define("COMMENTOFFSTRING", LAN_THEME_3);
define("PRE_EXTENDEDSTRING", "<br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", " | ");

// tablestyle
// http://wiki.e107.org/?title=Category:Themeing:Styling_individual_menus
function tablestyle($caption, $text, $mode){
// echo $mode;
if (($mode=='powered_by') || ($mode=='backend')) {
	echo "
		<h3>$caption</h3>
		<div class='featurebox_side'>$text</div>
		";
	} else {
	echo "
		<h3>$caption</h3>
		<div class='columntext'>$text</div>
		";
}
}

// linkstyle
// http://wiki.e107.org/?title=Styling_Individual_Sitelink_Menus
function linkstyle($np_linkstyle) {
// Common to all styles (for this theme)
  $linkstyleset['linkdisplay']      = 1;
  $linkstyleset['linkalign']        = "left";

// Common sublink settings
// NOTE: *any* settings can be customized for sublinks by using
//       'sub' as a prefix for the setting name. Plus, there's "subindent"
//  $linkstyleset['sublinkclass'] = "mysublink2;
//  $linkstyleset['subindent']    = " ";

// Now for some per-style setup
  switch ($np_linkstyle)
  {
  case 'topstyle':
	$linkstyleset['prelink'] = "<ul id='navlist'>";
	$linkstyleset['postlink'] = "</ul>";
    $linkstyleset['linkstart'] = "<li>";
	$linkstyleset['linkend'] = "</li>";
    $linkstyleset['linkstart_hilite'] = "<li id='active'>";
	$linkstyleset['linkclass_hilite'] = "current";
	$linkstyleset['linkseparator'] = "";
    break;
  case 'bottomstyle':
	$linkstyleset['prelink'] = "";
	$linkstyleset['postlink'] = "";
    $linkstyleset['linkstart'] = "";
	$linkstyleset['linkend'] = "";
    $linkstyleset['linkstart_hilite'] = "";
	$linkstyleset['linkclass_hilite'] = "";
	$linkstyleset['linkseparator'] = " | ";	
	break;
  default: // if no LINKSTYLE defined
    $linkstyleset['linkstart'] = "";
    $linkstyleset['linkstart_hilite'] = "";
    $linkstyleset['linkclass'] = "";
    $linkstyleset['sublinkclass'] = "";
  }
return $linkstyleset;
}

// commentstyle
$COMMENTSTYLE = "
<div style='padding-left: 25px; padding-bottom: 10px; border-bottom: 2px solid #0F3974;'>{COMMENT} {COMMENTEDIT}<br /><br />
<span class='smalltext'>[ ".LAN_THEME_6." {USERNAME} :: {TIMEDATE} ]</span>
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