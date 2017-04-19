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
|     $Source: /cvsrepo/rin/theme.php,v $
|     $Revision: 1.4 $
|     $Date: 2005/07/31 15:10:50 $
|     $Author: ian $
+----------------------------------------------------------------------------+
*/
if(!defined("e_THEME")){ exit; }

// [multilanguage]
@include_once(e_THEME."cipro/languages/".e_LANGUAGE.".php");
@include_once(e_THEME."cipro/languages/English.php");

// [theme]
$themename = "Cipro";
$themeversion = "1.0";
$themeauthor = "Star Adrael";
$themeemail = "staradrael@gmail.com";
$themewebsite = "http://www.staradrael.net";
$themedate = "March 8th, 2008";
$themeinfo = "Based on 'rin' ported by <a href='http://e107.webpagekoto.com' rel='external'>iandc76</a>, based on the Wordpress theme originaly done by Khaled Abou Alfa of <a href='http://www.brokenkode.com/'>brokenkode.com</a>.";
define("STANDARDS_MODE", TRUE);
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
define("IMODE", "lite");
define("THEME_DISCLAIMER", "<br/><i>".LAN_THEME_1."</i>");
define("BULLET", "bullet.jpg");

function theme_head() {
		return "<link rel='stylesheet' href='".THEME."nav_menu.css' />\n";
}

// [layout]

$layout = "_default";

$HEADER = "
<a name = 'top'></a>
<div id='hnav'>
	<div id='hmenu'>	
		{CUSTOM=login}
	</div>
</div> <!-- Closes the hnav div-->
<div id='masthead' onclick=\"location.href='".SITEURL."';\" style='cursor: pointer;'>
</div>
<div id='sitelinkswrapper'>
{SITELINKS_ALT=no_icons+noclick}
</div>
<div id='container' class='clearfix'>
	<div id='sidebar'>
		<ul>
			{SETSTYLE=menu}
			{MENU=1}
			{MENU=2}
		<ul>
	</div>
	<div id='topcontentdouble'></div>
	<div id='content'>
		<div class='contentright'>
			{SETSTYLE=content}
";

$FOOTER = "
		</div> <!--Closes the contentright div-->
    </div> <!-- Closes the content div-->
    <div id='bottomcontentdouble'>
    </div>
</div> <!-- Closes the container div-->
<a name = 'bottom'></a>
<div id='footer'>
	<div id='menu'>
		<div id='searchform'>
			{CUSTOM=search}
		</div>
		<div id='topimage'> 
		<a href='#top'></a>  
		</div>
	</div>
	<p class='credits'>{SITEDISCLAIMER} {THEMEDISCLAIMER}</p>
	<p class='wordpress'></p>
</div>
 
 
		
";

function news_style($news) 
{
	$date = strftime("%A %d %B %Y %H:%M", $news['news_datestamp']);
	$time = strftime(" %I:%M  %p", $news['news_datestamp']);
	$NEWSSTYLE = "
	<div class='post'>
        <div class='title'>{STICKY_ICON} {NEWSTITLE}</div>
		<h3><span class='posted'>Posted on </span>".$date."</h3>
		<div class='storycontent'>
		{NEWSBODY} <br />
		{EXTENDED}
		</div>
		<div class='meta'>
			<div class='author'>{NEWSAUTHOR} @ ".$time."</div>
			Filed under: {NEWSCATEGORY}
		</div>
		<div class='feedback'>{NEWSCOMMENTS}{TRACKBACK}</div>
	</div> <!-- Closes the post div-->\n";
	return $NEWSSTYLE;
} 



//        [tablestyle]

function tablestyle($caption, $text, $mode="")
{
	global $style;
	if($style == "menu")
	{
		echo "<li><h2>$caption</h2>
		<ul>$text</ul></li><br/>\n";
	}
	elseif($style == "links")
	{
		echo "<h2>$caption</h2>
		$text<br/>\n";
	}	
	elseif($style == "content")
	{
		echo "<div class='post'>
		<div class='title'>$caption</div><br />
		<div class='storycontent'>
		$text
		</div>
		</div>\n";
	}
	else
	{
		echo "<h2>$caption</h2>
		$text\n";
	}
}

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
define('LINKEND', "</li>");
define('LINKDISPLAY', 2);
define('LINKALIGN', "");
define('LINKCLASS', "");

$COMMENTSTYLE = "
<div id='response'>
	<ol id='commentlist'>
		<li>
			<div class='clearer'>&nbsp;</div>
			<div class='commentname'>
				<span class='commentauthor'>{USERNAME}</span>
			</div>
			<div class='commentinfo'>
				<span class='commentdate'>{TIMEDATE} {COMMENTEDIT}</span>
			</div>
			<div class='clearer'>&nbsp;</div>
			<div class='commenttext'>
				{COMMENT}<br/>
			{REPLY}
			</div>
		</li>
	</ol>
</div>
";


$CHATBOXSTYLE = "
<img src='".THEME."images/bullet2.gif' alt='bullet' />
<b>{USERNAME}</b><br />{TIMEDATE}
<div class='smalltext'>
{MESSAGE}
</div>
<br />";
?>
