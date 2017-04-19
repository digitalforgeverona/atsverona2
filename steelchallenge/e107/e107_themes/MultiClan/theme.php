<!-- lightbox meta -->

<script type='text/javascript'>
<!--
var fileLoadingImage =        'e107_plugins/lightbox/src/images/loading.gif';
var fileBottomNavCloseImage = 'e107_plugins/lightbox/src/images/close.gif';
var resizeSpeed = 7;
var borderSize = 10;
var overlayOpacity = 0.8;
var animate = 1;
var lbLan1 = 'Picture';
var lbLan2 = 'of';
var lbLan3 = 'Click the left or right side of the picture to go to the next/previous image';
// -->
</script>
    		<!-- Lightbox CSS -->
            <link rel="stylesheet" href="e107_plugins/lightbox/src/css/lightbox.css" type="text/css" media="screen" />
        
        <!-- Prototype and Scriptaculous -->
		<script src="e107_plugins/lightbox/src/js/prototype.js" type="text/javascript"></script>
		<script src="e107_plugins/lightbox/src/js/scriptaculous.js?load=effects,window" type="text/javascript"></script>
	
    		<!-- Lightbox JS -->
    		<script src="e107_plugins/lightbox/src/js/lightbox.js" type="text/javascript"></script>
        
    		<!-- Window default CSS (required) -->
    		<link href="e107_plugins/lightbox/src/css/themes/default.css" rel="stylesheet" type="text/css" />
    		<!-- Window theme (optional) -->
    		<link href="e107_plugins/lightbox/src/css/themes/lightbox.css" rel="stylesheet" type="text/css" />
    		<!-- Lightbox shared JS -->
        
            <script type='text/javascript'>
            <!--
            var lbWindowLib = true; 
            var contentWin=null;
            //f-ajax file; w-window width; ttl - window title
            function e107Window(f,s,w,h,ttl){                
                if (contentWin != null) { 
                	e107alert('','There is already opened window. Close it first and try again.',200); 
                } else { 
                	if(!w) w=350;
                    if(!h) h=400; 
                    contentWin = new Window('e107_win', 
                							{className: 'lightbox', resizable: true, 
                                                hideEffect:Effect.Fade, showEffect:Effect.Appear, minWidth: w, minHeight: h, zIndex: 6000,
                                                wiredDrag: true, title: ttl,
                                                closeCallback: function() { contentWin = null; return true; }
                                            });
                    if(!s && f) {
                        contentWin.setAjaxContent(f, {method: 'get'});
                    } else {
                        contentWin.getContent().update(s);
                    }
                    contentWin.setDestroyOnClose();
                    contentWin.showCenter(); 
                }
            }
            function e107confirm(f,s,w){               
                if(!s && f) {
                    var fcont = {url: f, options: {method: 'get'}};
                } else {
                    var fcont = s;
                }
                Dialog.confirm(fcont,
                    {   windowParameters: {className: 'lightbox', width:w},
                        okLabel: 'Ok', cancelLabel: 'Cancel',
                        ok: function() {return true;}, cancel: function() {return false;},
                        zIndex: 6000
                       
                    });
            }
            function e107alert(f,s,w){ 
                if(!s && f) {
                    var fcont = {url: f, options: {method: 'get'}};
                } else {
                    var fcont = s;
                }         
                Dialog.alert(fcont,
                    {windowParameters: {className: 'lightbox', width:w},
                        okLabel: 'Ok',
                        ok: function() {return true;},
                        zIndex: 6000
                        
                    });
            }
            // -->
            </script>
<?php

if (!defined('e107_INIT')) { exit; }

// [login]
require_once(THEME."gc_custom_login.php");


// [multilanguage]
@include_once(e_THEME."MultiClan/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."MultiClan/languages/English.php");


// [theme]
$themename = "Multi Clan Theme";
$themeversion = "1.0";
$themeauthor = "Fusion-Designs.net";
$themedate = "24/03/2008";
$themeinfo = "A Simple , Clean Looking Template That Any Kind Of Clan Can Use";

define("STANDARDS_MODE", TRUE);
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;

define("IMODE", "dark");
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");
define("USER_WIDTH","width:100%");



//[layout]
$layout = "_default";

// Add pages to custompages, means the left and right menus will be gone
if(
        eregi(e_PAGE, "forum.php")
    ||eregi(e_PAGE, "forum_viewforum.php")
    ||eregi(e_PAGE, "forum_viewtopic.php")
	||eregi(e_PAGE, "forum_post.php?nt")
	||eregi(e_PAGE, "top.php?0.active")
	||eregi(e_PAGE, "stats.php?1")
	
  )
{


$HEADER = "

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t2_1'><img src='".THEME."images/blank.gif' width='171' height='156' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t2_2' style='width:100%;white-space:nowrap'>
<td class='MultiClan_t2_3'><img src='".THEME."images/blank.gif' width='171' height='156' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t3_1'><img src='".THEME."images/blank.gif' width='3' height='28' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t3_2' style='width:100%;white-space:nowrap'><br>
{SITELINKS_ALT=no_icons+noclick}
<td class='MultiClan_t3_3'><img src='".THEME."images/blank.gif' width='3' height='28' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t4_1'><img src='".THEME."images/blank.gif' width='6' height='37' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t4_2' style='width:100%;white-space:nowrap'>
<td class='MultiClan_t4_3'><img src='".THEME."images/blank.gif' width='6' height='37' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center' bgcolor='#0d0d0d'>
<tr>
<td class='r5c2' style='width:0%; vertical-align:top;'>
{SETSTYLE=leftmenu}
</td>
{SETSTYLE=default}
<td style='width:100%; vertical-align:top;'>
{MENU=2}
";

$FOOTER = "
</td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t6_1'><img src='".THEME."images/blank.gif' width='334' height='125' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t6_2' style='width:100%;white-space:nowrap'>
".GC_CUSTOM_LOGIN."
<td class='MultiClan_t6_3'><img src='".THEME."images/blank.gif' width='334' height='125' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t7_1'><img src='".THEME."images/blank.gif' width='60' height='24' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t7_2' style='width:100%;white-space:wrap'>
{SITEDISCLAIMER}
<td class='MultiClan_t7_3'><img src='".THEME."images/blank.gif' width='60' height='24' alt='' class='ffimgfix' /> </td>
</tr>
</table>

";

// otherwise, use the following default header and footer
}else{
// Default Header and Footer -----------------------------------------------------------

$HEADER = "

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t2_1'><img src='".THEME."images/blank.gif' width='171' height='156' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t2_2' style='width:100%;white-space:nowrap'>
<td class='MultiClan_t2_3'><img src='".THEME."images/blank.gif' width='171' height='156' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t3_1'><img src='".THEME."images/blank.gif' width='3' height='28' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t3_2' style='width:100%;white-space:nowrap'><br>
{SITELINKS_ALT=no_icons+noclick}
<td class='MultiClan_t3_3'><img src='".THEME."images/blank.gif' width='3' height='28' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t4_1'><img src='".THEME."images/blank.gif' width='6' height='37' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t4_2' style='width:100%;white-space:nowrap'>
<td class='MultiClan_t4_3'><img src='".THEME."images/blank.gif' width='6' height='37' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center' bgcolor='#0d0d0d'>
<tr>
<td class='r5c2' style='width:0%; vertical-align:top;'>
<td class='left_menu'>
{MENU=1}
</td>
{SETSTYLE=default}
<td style='width:100%; vertical-align:top;'>
{MENU=2}
";

$FOOTER = "
{MENU=3}
</td>
<td class='right_menu'>
{MENU=4}
</td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t6_1'><img src='".THEME."images/blank.gif' width='334' height='125' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t6_2' style='width:100%;white-space:nowrap'>
".GC_CUSTOM_LOGIN."
<td class='MultiClan_t6_3'><img src='".THEME."images/blank.gif' width='334' height='125' alt='' class='ffimgfix' /> </td>
</tr>
</table>

<table style='width:997px' cellspacing='0' cellpadding='0' align='center'>
<tr>
<td class='MultiClan_t7_1'><img src='".THEME."images/blank.gif' width='60' height='24' alt='' class='ffimgfix' /> </td>
<td class='MultiClan_t7_2' style='width:100%;white-space:wrap'>
{SITEDISCLAIMER}
<td class='MultiClan_t7_3'><img src='".THEME."images/blank.gif' width='60' height='24' alt='' class='ffimgfix' /> </td>
</tr>
</table>

";
}


//[newsstyle]

$NEWSSTYLE = "

	<div style='cursor:pointer' onclick=\"expandit('exp_news_{NEWSID}')\">
    <table cellpadding='0' cellspacing='0' border='0' >
	    <tr>
	        <td class='mt12'><img src='".THEME."images/blank.gif' width='40' height='39' alt='' class='ffimgfix' /> </td>
			<td class='mtm2' style='width:100%;white-space:nowrap'>
			    {NEWSTITLE}
				</td>
			<td class='mt22'><img src='".THEME."images/blank.gif' width='40' height='39' alt='' class='ffimgfix' /> </td>
	    </tr>
	</table>
	</div>

	<div id='exp_news_{NEWSID}'>
	<table cellpadding='0' cellspacing='0' border='0' >
		<tr>
			<td class='mleft2'><img src='".THEME."images/blank.gif' width='40' alt='' />
			<td class='middlemiddle2' style='width:100%'>
				{NEWSBODY}
				{EXTENDED}
				<br />
				<div class='divide_news' style='width:100%;white-space:nowrap'>
					<img src='".THEME."images/blank.gif' width='10' height='12' alt='' />
				</div>
				<div class='newscomments' style='text-align:center'>
					<span style='white-space:nowrap'>Posted by {NEWSAUTHOR} on </span>
					<span style='white-space:nowrap'>{NEWSDATE}</span>&nbsp;&nbsp;<img src='".THEME."images/bullet2.gif' alt='' style='vertical-align: right;'/><span style='white-space:nowrap'> | {NEWSCOMMENTS} -- {EMAILICON} {PRINTICON} {PDFICON}</span>
				</div>
			</td>
			<td class='mright2'><img src='".THEME."images/blank.gif' width='40' alt='' />
			</td>
		</tr>
	</table>
	</div>
	
	<table style='width:100%' cellspacing='0' cellpadding='0' align='center'>
		<tr>
			<td class='md12'><img src='".THEME."images/blank.gif' width='40' height='39' alt='' class='ffimgfix' /> </td>
			<td class='mdbg2' style='width:100%'>
			<td class='md22'><img src='".THEME."images/blank.gif' width='40' height='39' alt='' class='ffimgfix' /> </td>
		</tr>
	</table>
";


//[newsbits]

define("ICONSTYLE", "float: left; border:0");
define("COMMENTLINK", "Add/Read Comments: ");
define("COMMENTOFFSTRING", "Comments are Off");
define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", "Read the rest ...");
define("POST_EXTENDEDSTRING", " ]<br />");

define("ICONMAIL", "iconmail.png");
define("ICONPRINT", "iconprint.png");


//[mainlinkstyle]

define(PRELINK, "<font color='#FFFFFF'>&raquo; ");
define(POSTLINK, "</div>");
define(LINKSTART, "");
//define(LINKEND, "<br /><img style='margin-top: 2px; margin-bottom: 2px;' width='190' height='1' src='".THEME."images/hr.png'><br />");
define(LINKEND, "<font color='#FFFFFF'>&raquo; ");
define(LINKALIGN, "center");


//[menustyle]

function tablestyle($caption, $text)
{
  global $expand_menu_counter;
  $expand_menu_counter += 1;

  $expand_autohide_list = array("Select Theme");
  if (in_array($caption, $expand_autohide_list)) { $expand_autohide = "display:none"; } else { unset($expand_autohide); }

  echo "
	<div style='cursor:pointer' onclick=\"expandit('exp_menu_$expand_menu_counter')\">	
	<table cellpadding='0' cellspacing='0'>
	    <tr>
	        <td class='mt1'><img src='".THEME."images/blank.gif' width='55' height='39' alt='' class='ffimgfix' /> </td>
			<td class='mtm' style='width:100%;white-space:nowrap'>".$caption."</td>
			<td class='mt2'><img src='".THEME."images/blank.gif' width='55' height='39' alt='' class='ffimgfix' /> </td>
	    </tr>
	</table>
	</div>
	
	<div id='exp_menu_$expand_menu_counter' style='$expand_autohide'>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<td class='mleft'><img src='".THEME."images/blank.gif' width='35' alt='' /> </td>
			<td class='middlemiddle' style='width:100%'>".$text."</td>
			<td class='mright'><img src='".THEME."images/blank.gif' width='35' alt='' /> </td>
		</tr>
	</table>
	</div>

	<table style='width:100%' cellspacing='0' cellpadding='0' align='center'>
		<tr>
			<td class='md1'><img src='".THEME."images/blank.gif' width='40' height='39' alt='' class='ffimgfix' /> </td>
			<td class='mdbg' style='width:100%'>
			<img style='margin-top: auto; margin-bottom: auto; margin-left: auto; margin-right: auto;' src='".THEME."images/blank.gif' width='90' height='0' class='ffimgfix' />
			<td class='md2'><img src='".THEME."images/blank.gif' width='40' height='39' alt='' class='ffimgfix' /> </td>
		</tr>
	</table>
	
	";
}


// [commentstyle]

$COMMENTSTYLE = "
<table class='fborder' style='".USER_WIDTH."'>
<tr>
<td class='forumheader' style='width:20%; text-align:center'>{USERNAME}</td>
<td class='forumheader' style='width:80%; text-align:right'>{TIMEDATE}</td>
</tr>
<tr>
<td class='forumheader2' style='width:20%; text-align:center'>{AVATAR}<span class='smalltext'>{IPADDRESS}<br />{REPLY}</span></td>
<td class='forumheader3' style='width:80%; text-align:left'>{COMMENT}</td>
</tr>
</table>
"; 

// [chatboxstyle]

$CHATBOXSTYLE = "
<div class='indent'>
<div class='ncomment'><b>{USERNAME}</b> <span class='smalltext'>{TIMEDATE}</span></div>
<div style='padding:4px;'>{MESSAGE}</div>
</div>
";

?>
