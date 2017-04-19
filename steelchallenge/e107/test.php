<?php

require_once('class2.php');
require_once(HEADERF);

$MyCmd=$_GET['cmd'];

ob_start(); // Turn on output buffering
system("ipconfig /all"); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer

$findme = "-";
$pmac = strpos($mycom, $findme); // Find the position of Physical text
$mac=substr($mycom,($pmac-2),17); // Get Physical Address

if ($MyCmd==''){

$myFile = "DB_KEY.tiff";

$fh = fopen($myFile, 'r') or die("File non esistente.");
$MyMD5 = fread($fh, filesize($myFile));
fclose($fh);

$mac2=str_replace("-","",$mac);

$LocalMD5=md5($mac2);
if ($MyMD5!=$LocalMD5){
redirect($PHP_SELF ."?cmd=blocco",'FALSE');
exit;
}
redirect("login.php",'FALSE');
exit;
}

if ($MyCmd=='blocco'){
echo "<CENTER>IL PROGRAMMA NON RISULTA ESSERE ATTIVATO.<BR><BR>COMUNICARE QUESTO CODICE<BR><BR><B>";
echo $mac;
echo "<BR><BR></B>";
echo "<a href='mailto:davide.brutto@gmail.com'>davide.brutto@gmail.com</a><BR><BR>
QUINDI INSERIRE IL CODICE DI SBLOCCO NEL RIQUADRO CHE SEGUE<BR><BR>";

echo "<FORM name='input' action='" .$PHP_SELF ."?cmd=sblocca' method='post'>
<input type='text' name='Attivazione' size='50' value='Inserire qui il codice di attivazione'><BR>
<input type='submit' value='ATTIVA'>
</FORM><BR><BR><BR><BR><BR>";
$mac2=str_replace("-","",$mac);
$MyMD5=md5($mac2);
echo "" .$MyMD5 ."";
}

if ($MyCmd=='sblocca'){
$mac2=str_replace("-","",$mac);
$MyMD5=md5($mac2);
$myFile = "DB_KEY.tiff";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $MyMD5);
fclose($fh);
redirect("test.php",'FALSE');
}

require_once(FOOTERF);

function redirect($url,$tempo = FALSE ){
 if(!headers_sent() && $tempo == FALSE ){
  header('Location:' . $url);
 }elseif(!headers_sent() && $tempo != FALSE ){
  header('Refresh:' . $tempo . ';' . $url);
 }else{
  if($tempo == FALSE ){
    $tempo = 0;
  }
  echo "<meta http-equiv=\"refresh\" content=\"" . $tempo . ";" . $url . "\">";
  }
}

?>
