<?php
//     Italian Translation: e107 Italian Team http://www.e107it.org
if(!defined('e_HTTP')){ die("Unauthorised Access");}
if (!getperms("2")) {
	header("location:".e_BASE."index.php");
	 exit;
}
global $sql;
if(isset($_POST['reset'])){
		for($mc=1;$mc<=5;$mc++){
			$sql -> db_Select("menus","*", "menu_location='".$mc."' ORDER BY menu_order");
			$count = 1;
			$sql2 = new db;
			while(list($menu_id, $menu_name, $menu_location, $menu_order) = $sql-> db_Fetch()){
				$sql2 -> db_Update("menus", "menu_order='$count' WHERE menu_id='$menu_id' ");
				$count++;
			}
			$text = "<b>Menus resettati nel database</b><br /><br />";
		}
}else{
	unset($text);
}

$text .= "
Da qui puoi decidere 'Dove' e 'in quale ordine' visualizzare i tuoi Blocchi.
Usa il Menu a tendina per spostare in alto o in basso i Blocchi.
<br />
<br />
Se riscontri che i Blocchi non sono aggiornati in modo appropriato clicca sul pulsante refresh.
<br />
<form method='post' id='menurefresh' action='".$_SERVER['PHP_SELF']."'>
<div><input type='submit' class='button' name='reset' value='Refresh' /></div>
</form>
<br />
<div class='indent'><span style='color:red'>*</span> indica che la visibilità del Blocco è stata modificata</div>";

$ns -> tablerender("Help Menù Blocchi", $text);
?>
