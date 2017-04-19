<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/wpp.css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Pannello di controllo</title>
</head>
<body>
<?php
  if(eregi('msie.[4|5|6|7|8]', $_SERVER['HTTP_USER_AGENT'])) {
       echo "<BR><BR><BR><center>PER UTILIZZARE IL PROGRAMMA PUNTI DELL'ESAGONALE<BR>
       E' CONSIGLIATO UTILIZZARE CHROME!!!<BR><BR><BR>";
       echo "<center><B><a href=./chromesetup.exe>INSTALLA CHROME</a>";
	   header ('Location: ./e107/index.php');
  }
else {
       header ('Location: ./e107/index.php');
       }


?>
</body>
</html>
