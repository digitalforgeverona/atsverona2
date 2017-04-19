<?

// File di connessione al DB delle gare Esagonale

$dbName = "esagonale";

$link = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012");// or die ("NON � possibile stabilire una connessione.");
mysql_select_db($dbName);// or die ("NON � possibile selezionare il DB.");

?>
