#<?php
global $sql, $link_class, $page;
$sql -> db_Select('links', '*', "link_category = 1 and link_name NOT REGEXP('submenu') and link_name NOT REGEXP('child') and link_class IN (".USERCLASS_LIST.") ORDER BY link_order ASC");
$ulmenu = PRELINK."<div id='menu'>";

$r="1";
while($row = $sql -> db_Fetch()){
	if(!$link_class || check_class($link_class) || ($link_class==254 && USER)){
		if($r <= "12"){
			extract($row);
			if(!preg_match("#(http:|mailto:|ftp:|https:)#",$link_url)){
				$link_url = e_HTTP.$link_url;
			}
			//if(strpos($link_url, "e107_plugins") !== FALSE){ $link_url = e_BASE.$link_url; }
			if(strpos($link_url, e_PAGE) !== FALSE){ $ulclass = '_onpage'; } else { $ulclass = ''; }

			switch ($link_open) { 
				case 1:
					$link_append = " onclick=\"window.open('$link_url'); return false;\"";
					break; 
				case 2:
				   $link_append = " target=\"_parent\"";
					break;
				case 3:
				   $link_append = " target=\"_top\"";
					break;
				default:
				   unset($link_append);
			}
			$ulmenu .= "<a ".($link_description ? " title = '$link_description' " : "title = 'add a text description to this link' ")." href='".$link_url."' accesskey='".$r."' ".$link_append.">".LINKSTART."$link_name".LINKEND."</a>";
		}
		$r++;
	}
}
$ulmenu .= "</div>\n".POSTLINK;
return $ulmenu;

