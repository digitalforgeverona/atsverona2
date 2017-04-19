
*******dAb_08 Theme v1.1 by roofdog78********


Thankyou for choosing to use this theme.

Support at http://www.roofdog78.com 

This theme is released under the Creative Commons Licence.
To learn more please goto http://creativecommons.org/licenses/by/2.0/uk/



*****Here are a few tips to help you modify this theme to your requirements:*****


 - How to remove the Login Box
 -----------------------------
 
 To remove the Login box from the header open the theme.php in your text editor and delete the following starting on line 50:
 
<div id='loginmenu'>
".RD_LOGIN."
</div>


 - How to change/remove your own logo to the header
 --------------------------------------------------
 
  To remove the current logo from the header delete the following code from line 53:

<img src='".THEME."images/logo.gif' alt=''/>

  To change the logo to your own, place your own logo.gif in the image folder, overwriting the current logo.gif.

  If you require the just logo and not the Site Name next to it, remove:

{SITENAME}

  If adding your image you may need to play around with the style.css so that your image fits in neatly. If so look for the following and adjust the padding-top value:

#title {
float: left;
padding-top: 30px;

}

**REMEBER** Any changes you make in the $HEADER will need to be made in the $CUSTOMHEADERs so the changes will apply sitewide!


 - How to change the width of the Forum
 -------------------------------------- 

  The theme comes with 3 custom layouts and the default layout. These are:

3 column - left and right menus, content area(default)
2 column - left menu only, content area
2 column - right menu only, content area
1 column - no menus, content area

  You can select which layout to have for which page. For example, the forum pages use the left menu only layout. If you open theme.php and look for line 126 you will see the following:

$CUSTOMPAGES['no_right_menu'] = " forum.php forum_viewtopic.php forum_viewforum.php forum_post.php ";

  If you wanted to use the 1 column layout you would copy (then delete):

forum.php forum_viewtopic.php forum_viewforum.php forum_post.php

   And paste it into line 208:

$CUSTOMPAGES['no_menus'] = " PASTE HERE ";

  This would then give all your forum pages a full width layout without any side menus. You can do the same with any page ie. news.php download.php etc by adding it to the $CUSTOMPAGE of your choice.

  

I recommend using Notepad++ as your text editor
http://notepad-plus.sourceforge.net/uk/site.htm

I recommend SmartFTP
http://www.smartftp.com/ 