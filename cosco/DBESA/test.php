<?php



require_once('class2.php');

require_once(HEADERF);



$PrezzoRientro=$_REQUEST["PrezzoRientro"];

echo "Prezzo: " .$PrezzoRientro ."";





mysql_close($Miaconnection);

require_once(FOOTERF);



?>

