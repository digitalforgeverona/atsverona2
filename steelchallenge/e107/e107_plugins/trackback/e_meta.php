<?php
/*
+ ----------------------------------------------------------------------------------------------+
|     e107 website system  : http://e107.org
|     Steve Dunstan 2001-2002 : jalist@e107.org
|     Released under the terms and conditions of the GNU General Public License (http://gnu.org).
|
|     $Source: /cvsroot/e107/e107_0.7/e107_plugins/trackback/e_meta.php,v $
|     $Revision: 1.3 $
|     $Date: 2007/07/12 13:00:07 $
|     $Author: sweetas $
+-----------------------------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }

if(isset($pref['trackbackEnabled'])){
	echo "<link rel='pingback' href='".SITEURLBASE.e_PLUGIN_ABS."trackback/trackback.php' />";
}

?>