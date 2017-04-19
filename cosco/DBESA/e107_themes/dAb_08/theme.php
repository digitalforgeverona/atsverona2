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

+----------------------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

// [multilanguage]

@include_once(THEME."languages/".e_LANGUAGE.".php");
@include_once(THEME."languages/English.php");
require_once(THEME."rd_login.php");
// [theme]
$themename = "dAb_08";
$themeversion = "1.2";
$themeauthor = "Leon Lloyd [roofdog78]";
$themeemail = "e107@roofdog78.com";
$themewebsite = "http://www.roofdog78.com";
$themedate = "10/08/2008";
$themeinfo = "<strong>If you decide to use this theme please do not remove the link to http://www.roofdog78.com</strong><br /><br /><a rel='license' href='http://creativecommons.org/licenses/by/2.0/uk/'><img alt='Creative Commons License' style='border-width:0; float: left; margin-right: 10px; margin-bottom: 10px' src='http://creativecommons.org/images/public/somerights20.png' /></a>This work is licenced under a <a rel='license' href='http://creativecommons.org/licenses/by/2.0/uk/'>Creative Commons Licence</a>";
define("STANDARDS_MODE", TRUE);
define("BULLET", "bullet2.gif");
define("IMODE", "dark");
$xhtmlcompliant = true;
$csscompliant = true;

if(!defined("e_THEME")){ exit; }
$page=substr(strrchr($_SERVER['PHP_SELF'], "/"), 1);
define("e_PAGE", $page);

// DEFAULT LAYOUT ----- LEFT AND RIGHT MENU

$layout = "_default"; 

$HEADER = "

<div id='maincontainer'>
     <div id='topsection'>
         <div id='loginmenu'>
             ".RD_LOGIN."
         </div>
         <div id='title'>
		     <a href='".SITEURL."'><img src='".THEME."images/logo.gif' alt=''/>&nbsp;{SITENAME}&nbsp;" .NOMEGARA ."</a>
		 </div>
     </div>
     <div>
         {SITELINKS_ALT=no_icons+noclick}
     </div>

     <div id='contentwrapper'>
         <div id='contentcolumn'>
";

$FOOTER = "

         </div>
     </div>
     <div id='leftcolumn'>
         {SETSTYLE=global_menu}
         {MENU=1}
     </div>
     <div id='rightcolumn'>
         {MENU=2}
     </div>
</div>
<div id='footer'>
     <div class='left_footer'>
	     {SITEDISCLAIMER}
	 </div>
     <div class='licence'>
	     <a href='http://www.atsverona.it'><img src='http://localhost:85/e107/e107_themes/dAb_08/images/somerights20.png' title='Creative Commons Licence' alt='Licence Agreement'/></a><br />
	 </div>
</div>
";

//CUSTOM LAYOUT ----- LEFT MENU ONLY

$CUSTOMHEADER['no_right_menu'] = "

     <div id='maincontainer'>
     <div id='topsection'>
         <div id='loginmenu'>
             ".RD_LOGIN."
         </div>
         <div id='title'>
		     <a href='".SITEURL."'><img src='".THEME."images/logo.gif' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;{SITENAME}</a>
		 </div>
     </div>
     <div id='navmenu'>
         {SITELINKS_ALT=no_icons}
     </div>

     <div id='contentwrapper'>
         <div id='contentcolumn_l'>
";

$CUSTOMFOOTER['no_right_menu'] = "

         </div>
     </div>
     <div id='leftcolumn'>
         {SETSTYLE=global_menu}
         {MENU=1}
     </div>
</div>
<div id='footer'>
     <div class='left_footer'>
	     {SITEDISCLAIMER}
	 </div>
     <div class='licence'>
	     <a href='http://creativecommons.org/licenses/by/2.0/uk/'><img src='http://creativecommons.org/images/public/somerights20.png' title='Creative Commons Licence' alt='Licence Agreement'/></a><br /><a href='http://www.roofdog78.com/news.html'><img src='".THEME."images/roof.png' alt='Theme by roofdog78' title='Theme by roofdog78'/></a>
	 </div>
</div>
";

$CUSTOMPAGES['no_right_menu'] = " forum.php forum_viewtopic.php forum_viewforum.php forum_post.php ";

//CUSTOM LAYOUT ----- RIGHT MENU ONLY

$CUSTOMHEADER['no_left_menu'] = "

     <div id='maincontainer'>
     <div id='topsection'>
         <div id='loginmenu'>
             ".RD_LOGIN."
         </div>
         <div id='title'>
		     <a href='".SITEURL."'><img src='".THEME."images/logo.gif' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;{SITENAME}</a>
		 </div>
     </div>
     <div id='navmenu'>
         {SITELINKS_ALT=no_icons}
     </div>

     <div id='contentwrapper'>
         <div id='contentcolumn_r'>
";

$CUSTOMFOOTER['no_left_menu'] = "

         </div>
     </div>
     <div id='rightcolumn'>
         {SETSTYLE=global_menu}
         {MENU=2}
     </div>
</div>
<div id='footer'>
     <div class='left_footer'>
	     {SITEDISCLAIMER}
	 </div>
     <div class='licence'>
	     <a href='http://creativecommons.org/licenses/by/2.0/uk/'><img src='http://creativecommons.org/images/public/somerights20.png' title='Creative Commons Licence' alt='Licence Agreement'/></a><br /><a href='http://www.roofdog78.com/news.html'><img src='".THEME."images/roof.png' alt='Theme by roofdog78' title='Theme by roofdog78'/></a>
	 </div>
</div>
";

$CUSTOMPAGES['no_left_menu'] = "  ";

//CUSTOM LAYOUT ----- NO SIDE MENUS

$CUSTOMHEADER['no_menus'] = "

     <div id='maincontainer'>
     <div id='topsection'>
         <div id='loginmenu'>
             ".RD_LOGIN."
         </div>
         <div id='title'>
		     <a href='".SITEURL."'><img src='".THEME."images/logo.gif' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;{SITENAME}</a>
		 </div>
     </div>
     <div id='navmenu'>
         {SITELINKS_ALT=no_icons}
     </div>

     <div id='contentwrapper'>
         <div id='contentcolumn_m'>
";

$CUSTOMFOOTER['no_menus'] = "

         </div>
     </div>
</div>
<div id='footer'>
     <div class='left_footer'>
	     {SITEDISCLAIMER}
	 </div>
	 
     <div class='licence'>
	     <a href='http://creativecommons.org/licenses/by/2.0/uk/'><img src='http://creativecommons.org/images/public/somerights20.png' title='Creative Commons Licence' alt='Licence Agreement'/></a><br /><a href='http://www.roofdog78.com/news.html'><img src='".THEME."images/roof.png' alt='Theme by roofdog78' title='Theme by roofdog78'/></a>
	 </div>
	 
</div>
";

$CUSTOMPAGES['no_menus'] = "  ";

//------------------------------------------------------------------------------+

$sc_style['NEWSIMAGE']['pre'] = "<div class='news_image'>";
$sc_style['NEWSIMAGE']['post'] = "</div>";

$NEWSSTYLE = "
     <table class='news_table' cellspacing='0'>
         <tr>
             <td>
			     <div class='caption'>
                     <div class='left'>&nbsp;</div>
                         <div class='right'>&nbsp;</div>
                             <div class='news_center'>
					             {NEWSTITLE}
					         </div>
                 </div>
				 <div class='news_summary'>
				     {NEWSSUMMARY}
				 </div>
                 <div class='news_content'>
                     {NEWSIMAGE} {NEWSBODY} <br/>{EXTENDED} <br/>
                         <div style='text-align:right' class='smalltext'>
                             ".LAN_THEME_6." {NEWSAUTHOR} ".LAN_THEME_7." {NEWSDATE}  | {NEWSCOMMENTS}&nbsp;&nbsp;|&nbsp;&nbsp;{EMAILICON}{PRINTICON}{PDFICON}{ADMINOPTIONS}<br/>
					     </div>
                 </div>
                 <div class='bottom'>
                     <div class='left'>&nbsp;</div>
                         <div class='right'>&nbsp;</div>
                             <div class='center'>&nbsp;</div>
			     </div>
			 </td>
         </tr>
     </table> 

";
define("ICONSTYLE", "");
define("COMMENTLINK", LAN_THEME_3);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "<br />");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", "");

// [linkstyle]

define(PRELINK, "");
define(POSTLINK, "");
define(LINKSTART, "");
define(LINKEND, "");
define(LINKDISPLAY, 1);			// 1 - along top, 2 - in left or right column
define(LINKALIGN, "center");


// [tablestyle]

function tablestyle($caption, $text){
	global $style;

if($style == "global_menu"){
	echo "
	 <table width='100%' class='menu_table' cellspacing='0'>
	     <tr>
	         <td class='menu_caption'>
	             ".$caption."
	         </td>
	     </tr>
	     <tr>
	         <td class='menu_content'>
	             ".$text."
	         </td>
	     </tr>
	     <tr>
	         <td class='menu_bottom'>&nbsp;</td>
	     </tr>
	 </table>
";
}

else if($style == ""){
echo "
     <div class='caption_table'>
         <div class='caption'>
             <div class='left'>&nbsp;</div>
                 <div class='right'>&nbsp;</div>
                     <div class='center'>
					     $caption
					 </div>
         </div>
         <div class='content'>
		     $text
		 </div>
         <div class='bottom'>
             <div class='left'>&nbsp;</div>
                 <div class='right'>&nbsp;</div>
                     <div class='center'>&nbsp;</div>
         </div>
     </div>
";
}
}

// [commentstyle]

$COMMENTSTYLE = "{USERNAME} @ <span class='smalltext'>{TIMEDATE}</span><br />
{AVATAR}<span class='smalltext'>{REPLY}</span><br />
{COMMENT}
<div style='text-align: right;' class='smallext'>{IPADDRESS}</div>";

// [chatboxstyle]

$CHATBOXSTYLE = "
<img src='".THEME."images/chatbox_16.png' alt='' style='vertical-align: middle;' />
<b>{USERNAME}</b>
<div class='smalltext'>
{MESSAGE}
</div>
<br />";

?>
