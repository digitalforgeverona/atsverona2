<?

// File di connessione al DB delle gare Esagonale

$dbName = "esagonale";

$link = mysql_connect("localhost", "atsverona", "Jump02052012");// or die ("NON è possibile stabilire una connessione.");
mysql_select_db($dbName);// or die ("NON è possibile selezionare il DB.");

?>
