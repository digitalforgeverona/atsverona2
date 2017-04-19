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
|     Clarity -  Theme by roofdog78  www.roofdog78.com
+----------------------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

// [multilanguage]

@include_once(THEME."languages/".e_LANGUAGE.".php");
@include_once(THEME."languages/English.php");

// [theme]
$themename = "Clarity";
$themeversion = "1.1";
$themeauthor = "Leon Lloyd [roofdog78]";
$themeemail = "e107@roofdog78.com";
$themewebsite = "http://www.roofdog78.com";
$themedate = "17/03/2008";
$themeinfo = "<strong>If you decide to use this theme please do not remove the link to http://www.roofdog78.com</strong><br /><br /><a rel='license' href='http://creativecommons.org/licenses/by-sa/2.0/uk/'><img alt='Creative Commons License' style='border-width:0; float: left; margin-right: 10px; margin-bottom: 10px' src='http://i.creativecommons.org/l/by-sa/2.0/uk/88x31.png' /></a>This work is licenced under a <a rel='license' href='http://creativecommons.org/licenses/by-sa/2.0/uk/'>Creative Commons Licence</a>";

define("STANDARDS_MODE", TRUE);
define("BULLET", "bullet2.png");
define("IMODE", "lite");

$xhtmlcompliant = true;
$csscompliant = true;

$register_sc[]="THEME_BY_ROOFDOG";
$sc_style['THEME_BY_ROOFDOG']['pre'] = "<br/>";
$sc_style['THEME_BY_ROOFDOG']['post'] = "";

$sc_style['BANNER']['pre'] = "<table cellspacing='3' cellpadding='3'><tr><td colspan='2' style='background:#EEEEEE;padding:8px;text-align:center;border:1px solid #DDDDDD;'>";
$sc_style['BANNER']['post'] = "</td></tr></table>";

// [layout]

$layout = "_default"; 

$HEADER = "
<table id='mainwrap' cellspacing='0' cellpadding='0'>
     <tr>
         <td colspan='2'>
	         <div id='topsection'>
	             {SITETAG}
	         </div>
	     </td>
	 </tr>
	 <tr>
	     <td  colspan='2'>
             <div id='headersection'>
			     &nbsp;
             </div>
         </td>
     </tr>
     <tr>
         <td colspan='2'>	 
		     <div>
                 {SITELINKS_ALT=no_icons+noclick}
             </div>
	     </td>
	 </tr>
	 <tr>
	     <td id='subnav' colspan='2'>
			 <div style='padding-right:10px;'>
				 {SEARCH}
		     </div>
	     </td>
	 </tr>
	 <tr>
	     <td id='leftside' valign='top'>
			 {SETSTYLE=side_menus}
             {MENU=1}
		 </td>
		 <td id='rightside' valign='top'>
      	     <table id='topmenu' cellspacing='3' cellpadding='3'>
				 <tr>
					 <td class='left' valign='top'>
						 {SETSTYLE=top_menus}
						 {MENU=2}
					 </td>
					 <td class='right' valign='top'>
						 {MENU=3}
					 </td>
				 </tr>
			 </table>
                     {BANNER}
			 <table cellspacing='3' cellpadding='3'>
				 <tr>
					 <td id='content' valign='top'>
						 {SETSTYLE=content_menus}
";

$FOOTER = "
                     </td>
                 </tr>
             </table>							 
         </td>
	 </tr> 
	 <tr>
	     <td  colspan='2'>
		     <div id='bottom'>
			     {SETSTYLE=bottom_menu}
				 {MENU=4}
			 </div>
		 </td>
	 </tr>
</table>
<table>
	 <tr>
	     <td>
             <div id='footer'>
		         {SITELINKS}<br /><br />
				 {SITEDISCLAIMER}
				 
				 <!--DO NOT REMOVE-->
				 {THEME_BY_ROOFDOG}
				 <!--END-->
				 
		     </div>
	     </td>
	 </tr>
</table>
";

$CUSTOMHEADER['news'] = "
<table id='mainwrap' cellspacing='0' cellpadding='0'>
     <tr>
         <td colspan='2'>
	         <div id='topsection'>
	             {SITETAG}
	         </div>
	     </td>
	 </tr>
	 <tr>
	     <td  colspan='2'>
             <div id='headersection'>
			     &nbsp;
             </div>
         </td>
     </tr>
     <tr>
         <td colspan='2'>	 
		     <div>
                 {SITELINKS_ALT=no_icons+noclick}
             </div>
	     </td>
	 </tr>
	 <tr>
	     <td id='subnav' colspan='2'>
			 <div style='padding-right:10px;'>
				 {SEARCH}
		     </div>
	     </td>
	 </tr>
	 <tr>
	     <td id='leftside' valign='top'>
			 {SETSTYLE=side_menus}
             {MENU=1}
		 </td>
		 <td id='rightside' valign='top'>
      	     <table id='topmenu' cellspacing='3' cellpadding='3'>
				 <tr>
					 <td class='left' valign='top'>
						 {SETSTYLE=top_menus}
						 {MENU=2}
					 </td>
					 <td class='right' valign='top'>
						 {MENU=3}
					 </td>
				 </tr>
			 </table>
                     {BANNER}
			 <table cellspacing='3' cellpadding='3'>
				 <tr>
					 <td id='content' valign='top'>
";

$CUSTOMFOOTER['news'] = "
                     </td>
                 </tr>
             </table>							 
         </td>
	 </tr> 
	 <tr>
	     <td  colspan='2'>
		     <div id='bottom'>
			     {SETSTYLE=bottom_menu}
				 {MENU=4}
			 </div>
		 </td>
	 </tr>
</table>
<table>
	 <tr>
	     <td>
             <div id='footer'>
		         {SITELINKS}<br /><br />
				 {SITEDISCLAIMER}
				 
				 <!--DO NOT REMOVE-->
				 {THEME_BY_ROOFDOG}
				 <!--END-->
				 
		     </div>
	     </td>
	 </tr>
</table>     
                     
";

$CUSTOMPAGES['news'] = " news.php ";

// [tablestyles]

function tablestyle($caption, $text){
	global $style;
	
if($style == "top_menus"){
	echo "
	 <table class='menu_table' cellspacing='0' style='width:100%;'>
	     <tr>
	         <td class='menu_caption2'>
	             ".$caption."
	         </td>
	     </tr>
	     <tr>
	         <td class='menu_body2'>
	         ".$text."
	         </td>
	     </tr>
	 </table>
";
}

if($style == "side_menus"){
	echo "
	 <table class='menu_table3' cellspacing='0' style='width:210px;'>
	     <tr>
	         <td class='menu_caption3'>
	             ".$caption."
	         </td>
	     </tr>
	     <tr>
	         <td class='menu_body3'>
	         ".$text."
	         </td>
	     </tr>
	 </table>
";
}

if($style == "content_menus"){
	echo "
     <table class='news_table' cellspacing='0' style='width:100%;'>
         <tr>
             <td class='menu_caption'>
                 ".$caption."
             </td>
         </tr>
         <tr>
             <td class='menu_body'>
                 ".$text."
			 </td>
		 </tr>
     </table>
";
}

if($style == "bottom_menu"){
	echo "
     <table class='menu_table2' cellspacing='0' style='width:100%;'>
         <tr>
             <td class='menu_caption'>
                 ".$caption."
             </td>
         </tr>
         <tr>
             <td class='menu_body4'>
                 ".$text."
			 </td>
		 </tr>
     </table>
";
}

else if($style == ""){
echo "
     <table class='menu_table' cellspacing='0' style='width:100%;'>
         <tr>
             <td class='menu_caption2'>
                 ".$caption."
             </td>
         </tr>
         <tr>
             <td class='menu_body2'>
                 ".$text."
			 </td>
		 </tr>
     </table>
";
}
}

// [linkstyle]

define(PRELINK, "|&nbsp;&nbsp;");
define(POSTLINK, "");
define(LINKSTART, "");
define(LINKEND, "&nbsp;&nbsp;|&nbsp;&nbsp;");
define(LINKDISPLAY, 1);	
define(LINKALIGN, "");

//[newstyle]

$NEWSSTYLE = "
      
     <table class='news_table' cellspacing='0'>
         <tr>
             <td class='news_caption' colspan='2'>
                 {NEWSTITLE}
             </td>
         </tr>
		 <tr class='news_info'>
		     <td style='float:left;padding:8px;width:80%;'>
			     <img src='".THEME."images/bullet2.png' alt='' style='vertical-align: middle;'/> ".LAN_THEME_6." {NEWSDATE} ".LAN_THEME_7." {NEWSAUTHOR}
			 </td>
             <td style='background:#EEEEEE;width:20%;'>&nbsp;</td>			 
         </tr>
         <tr>
             <td class='news_body' colspan='2'>
                 {NEWSBODY}<br />{EXTENDED}<br />
			 </td>
		 </tr>
		 <tr class='news_info'>
		     <td style='float:left;padding:8px;width:80%;'>
			      {NEWSCOMMENTS}
			 </td> 
			 <td style='padding:5px;width:20%;text-align:right;'>
			     {PDFICON}&nbsp;{EMAILICON}{PRINTICON}{ADMINOPTIONS}
			 </td>
         </tr>
     </table>
";

define("ICONSTYLE", "");
define("COMMENTLINK", LAN_THEME_3);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "<br />");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", "<br />");

$sc_style['NEWSCOMMENTS']['pre'] = '<img src="'.THEME.'images/bullet2.png" alt="" style="vertical-align: middle;"/>';
$sc_style['NEWSCOMMENTS']['post'] = '';

// [commentstyle]

$COMMENTSTYLE = "
".LAN_THEME_8." {USERNAME} @ <span class='smalltext'>{TIMEDATE}</span><br /><br />
{COMMENT}<br />
<span class='smalltext'>{REPLY}</span><br /><br />
<div style='text-align: right;' class='smallext'>{IPADDRESS}</div>
";

// [chatboxstyle]

$CHATBOXSTYLE = "
<div class='cbheader'><img src='".THEME."images/bullet2.png' alt='' style='vertical-align: middle;' />
{USERNAME} - {TIMEDATE}</div>
<div class='smalltext' style='padding:3px;'>
{MESSAGE}
</div>
<br />
";

?>