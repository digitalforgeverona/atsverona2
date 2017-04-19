<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<script type="text/javascript">
function pageScroll() {
    	window.scrollBy(0,30);
    	scrolldelay = setTimeout('pageScroll()',1000); // scrolls every 1000 milliseconds
}
function stopScroll() {
    	clearTimeout(scrolldelay);
}

</script>
<head>
       <title>CLASSIFICHE</title>

</head>
<body bgcolor="black">
        <div align="center"; background-color="#003366"; layer-background-color="#003366"; visibility="visible">



<?php

//#############################################################

// DAVIDE

// SCRIVE IN UN FILE IL NOME DELLA GARA ATTIVA
$myFile = "GaraAttiva.txt";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
define("NOMEGARA", $theData);

//FISSA LE VARIABILI PER IL MASSIMO PUNTEGGIO DEGLI STAGE DELLA GARA ED IL NUMERO DI STAGE
$Miaconnection = mysql_connect("localhost", "atsverona", "Jump02052012") or die ("NON è possibile stabilire una connessione.");
$Miaquery = "SELECT * FROM esagonale.gare WHERE NomeGara LIKE '%" .NOMEGARA ."%'";
$Mioresult = mysql_query($Miaquery) or die ("Errore sulla query LIST: ".mysql_error());
$Miarow = mysql_fetch_array($Mioresult) or die(mysql_error());
define("NUMEROSTAGES", $Miarow['NumeroStages']);
$MieiPuntiMassimi = array();
global $MieiPuntiMassimi;
$MieiPuntiMassimi = split(",", $Miarow['PuntiMassimi']);

$MieiNumeroColpi = array();
global $MieiNumeroColpi;
$MieiNumeroColpi = split(",", $Miarow['NumeroColpi']);

mysql_close($Miaconnection);
//***************************************

//require_once('./class2.php');
$MyCmd = '';//$_GET['cmd'];
if ($MyCmd==''){$MyCmd='totale';}
//include ('class.ezpdf.php');
//require_once('fpdf.php');
//require_once('fpdi.php');
$MiaData = date('d/m/Y - G:i:s');

$connection = mysql_connect("localhost", "atsverona", "Jump02052012");

$db = mysql_select_db("esagonale", $connection);

$NumeroSpan = 5 + (2*NUMEROSTAGES);

        if ($MyCmd == 'totale'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $querySemiauto = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' ORDER BY TotalePunti DESC";
              $resultSemiauto = mysql_query($querySemiauto);
              //$querySemiautoB = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='B' ORDER BY TotalePunti DESC";
              //$resultSemiautoB = mysql_query($querySemiautoB);
              $queryRevolver = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' ORDER BY TotalePunti DESC";
              $resultRevolver = mysql_query($queryRevolver);
              //$queryRevolverB = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='B' ORDER BY TotalePunti DESC";
              //$resultRevolverB = mysql_query($queryRevolverB);
              echo "<center><B>GENERALE</center></B><BR><BR>";
              }


              echo "<br>";
               echo "<br>";


               echo "<img src='logo.gif' />";

               echo "<br>";
               echo "<br>";
               echo "<font color='#70A401'>";
               echo "<B><H1>" .$MioNomeGara ."</H1>";

              //echo "<div class='miocentro'>";

              echo "<center><B><BR><BR></B></center>";
              echo "<TABLE BORDER='1'>";

              //CLASSIFICA AUTOMATICA CAT A
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#FFFFFF'><B><center>SEMIAUTO</center></B></font></TH>";
              echo "</TR>";
              echo "<TR>";
              echo "<TH></TH>";
              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              for ($i=1; $i<=NUMEROSTAGES; $i++){
                  echo "<TH><center><B><font color='#70A401'>Tempo " .$i ."</font></B></center></TH>";
                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";
              }
              echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";
              echo "</TR>";

              $ClassificaA=1;
              while ($rowSemi = mysql_fetch_array($resultSemiauto))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['ID'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Cognome'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Nome'] ."</font></TD>";
                     for ($i=1; $i<=NUMEROSTAGES; $i++){
                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Tempo_' .$i .''] ."</font></TD>";
                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Punteggio_' .$i .''] ."</font></TD>";
                     }
                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['TotalePunti'] ."</font></TD>";
                     $ClassificaA++;
                  }

              /*
              //CLASSIFICA AUTOMATICA CAT B
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#FFFFFF'><B><center>CLASSE B</center></B></font></TH>";
              echo "</TR>";
              echo "<TR>";
              echo "<TH></TH>";
              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              for ($i=1; $i<=NUMEROSTAGES; $i++){
                  echo "<TH><center><B><font color='#70A401'>HF " .$i ."</font></B></center></TH>";
                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";
              }
              echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";
              echo "</TR>";

              $ClassificaAB=1;
              while ($rowSemiB = mysql_fetch_array($resultSemiautoB))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#70A401'>" .$ClassificaAB ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemiB['ID'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemiB['Cognome'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemiB['Nome'] ."</font></TD>";
                     for ($i=1; $i<=NUMEROSTAGES; $i++){
                         echo "<TD><font color='#FFFFFF'>" .$rowSemiB['HF_' .$i .''] ."</font></TD>";
                         echo "<TD><font color='#FFFFFF'>" .$rowSemiB['Punteggio_' .$i .''] ."</font></TD>";
                     }
                     echo "<TD><font color='#FFFFFF'>" .$rowSemiB['TotalePunti'] ."</font></TD>";
                     $ClassificaAB++;
                  }

               */
                  echo "</TABLE>";
                  
                  echo "<SCRIPT LANGUAGE='javascript'>{
    	               window.scrollBy(0,30);
    	               scrolldelay = setTimeout('pageScroll()',1000);}</SCRIPT>";

             // CLASSIFICA REVOLVER
              echo "<BR><BR><BR>";
              echo "<center><B></B><BR></center>";
              echo "<TABLE BORDER='1'>";

              //CLASSIFICA REVOLVER CAT A
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#FFFFFF'><B><center>REVOLVER</center></B></font></TH>";
              echo "</TR>";
              echo "<TR>";
              echo "<TH></TH>";
              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              for ($i=1; $i<=NUMEROSTAGES; $i++){
                  echo "<TH><center><B><font color='#70A401'>Tempo " .$i ."</font></B></center></TH>";
                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";
              }
              echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";
              echo "</TR>";

              $ClassificaR=1;
              while ($rowRev = mysql_fetch_array($resultRevolver))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#70A401'>" .$ClassificaR ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRev['ID'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Cognome'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Nome'] ."</font></TD>";
                     for ($i=1; $i<=NUMEROSTAGES; $i++){
                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Tempo_' .$i .''] ."</font></TD>";
                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Punteggio_' .$i .''] ."</font></TD>";
                     }
                     echo "<TD><font color='#FFFFFF'>" .$rowRev['TotalePunti'] ."</font></TD>";
                     $ClassificaR++;
                  }


              /*
              //CLASSIFICA REVOLVER CAT B
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#FFFFFF'><B><center>CLASSE B</center></B></font></TH>";
              echo "</TR>";
              echo "<TR>";
              echo "<TH></TH>";
              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              for ($i=1; $i<=NUMEROSTAGES; $i++){
                  echo "<TH><center><B><font color='#70A401'>HF " .$i ."</font></B></center></TH>";
                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";
              }
              echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";
              echo "</TR>";

              $ClassificaRB=1;
              while ($rowRevB = mysql_fetch_array($resultRevolverB))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#70A401'>" .$ClassificaRB ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRevB['ID'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRevB['Cognome'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRevB['Nome'] ."</font></TD>";
                     for ($i=1; $i<=NUMEROSTAGES; $i++){
                         echo "<TD><font color='#FFFFFF'>" .$rowRevB['HF_' .$i .''] ."</font></TD>";
                         echo "<TD><font color='#FFFFFF'>" .$rowRevB['Punteggio_' .$i .''] ."</font></TD>";
                     }
                     echo "<TD><font color='#FFFFFF'>" .$rowRevB['TotalePunti'] ."</font></TD>";
                     $ClassificaRB++;
                  }


              */


              echo "</TABLE>";
              //echo "<onLoad='pageScroll()'>";
              echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
               echo "<br>";
           
           


mysql_close($connection);

               $MyCounter = ($ClassificaR + $ClassificaA + 10) * 1000;
               //echo "" .$MyCounter ."";
               echo "<SCRIPT LANGUAGE='javascript'>function jumpScroll() {
    	              window.scroll(0,50);
                      scrolldelay = setTimeout('jumpScroll()'," .$MyCounter .");}</SCRIPT>";

               echo "<SCRIPT LANGUAGE='javascript'>{
    	              window.scroll(0,50);
                      scrolldelay = setTimeout('jumpScroll()'," .$MyCounter .");}</SCRIPT>";


?>

        </div>
</body>
</html>



