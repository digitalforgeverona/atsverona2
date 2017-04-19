<?php



require_once('./class2.php');

require_once(HEADERF);

$MyCmd = $_GET['cmd'];



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



$MyCmd = $_GET['cmd'];









$MioFile = "../../../mysql/data/esagonale/base.frm";

$MioBck = "../../../../../../../base.frm";

  if (!copy($MioFile, $MioBck)){

      echo "ERRORE SULLA COPIA";

  }







?>

