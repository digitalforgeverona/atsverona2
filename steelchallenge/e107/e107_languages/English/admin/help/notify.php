<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     �Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $Source: /cvsroot/e107/e107_0.7/e107_languages/English/admin/help/notify.php,v $
|     $Revision: 1.2 $
|     $Date: 2005/12/14 17:37:43 $
|     $Author: sweetas $
+----------------------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

$text = "Notify sends email notifications when e107 events occur.<br /><br />
For example, set 'IP banned for flooding site' to user class 'Admin' and all admins will be sent an email when your 
site is being flooded.<br /><br />
You can also, as another example, set 'News item posted by admin' to user class 'Members' and all your users will be 
sent news items you post to the site in an email.<br /><br />
If you would like the email notifications to be sent to an alternative email address - select the 'Email' option and 
enter in the email address in the field provided.";

$ns -> tablerender("Notify Help", $text);
?>