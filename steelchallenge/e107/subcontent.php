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
|     $Source: /cvsroot/e107/e107_0.7/subcontent.php,v $
|     $Revision: 1.7 $
|     $Date: 2007/12/28 01:16:55 $
|     $Author: mcfly_e107 $
+----------------------------------------------------------------------------+
*/
require_once("class2.php");

//redirection to new content management plugin if it is installed
if ($sql -> db_Select("plugin", "*", "plugin_path = 'content' AND plugin_installflag = '1' ")){ 
	header("location:".e_PLUGIN."content/content_submit.php");
	exit;
} else {
	header("location:".e_BASE."index.php");
	exit;
}
?>