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
<body>
        <div align="center">

<?php

//#############################################################
// DAVIDE
//#############################################################

if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}

$myFile = "GaraAttiva.txt";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
define("NOMEGARA", $theData);


//$MyCmd = '';//$_GET['cmd'];
//if ($MyCmd==''){$MyCmd='totale';}
$MyCmd = $_GET['cmd'];
//$MyPrint = $_GET['print'];
//include ('class.ezpdf.php');
//$pdf =& new Cezpdf('a4','landscape');
//$pdf->selectFont('./fonts/Helvetica.afm');
$MioSelect="";
//if ($MyPrint != 'Y'){
//   require_once('./class2.php');
//   //require_once(HEADERF);
//}
//else {



//FISSA LE VARIABILI PER IL MASSIMO PUNTEGGIO DEGLI STAGE DELLA GARA ED IL NUMERO DI STAGE
$Miaconnection = mysql_connect("localhost", "atsverona", "Jump02052012") or die ("NON è possibile stabilire una connessione.");
$Miaquery = "SELECT * FROM steel.gare WHERE NomeGara LIKE '%" .NOMEGARA ."%'";
$Mioresult = mysql_query($Miaquery) or die ("Errore sulla query LIST: ".mysql_error());
$Miarow = mysql_fetch_array($Mioresult) or die(mysql_error());
define("NUMEROSTAGES", $Miarow['NumeroStages']);
define("TOTPROVE", $Miarow['TotProve']);
define("PROVEOK", $Miarow['ProveOk']);
mysql_close($Miaconnection);

//#############################################################

//}

$MiaData = date('d/m/Y - G:i:s');

$connection = mysql_connect("localhost", "atsverona", "Jump02052012");

$db = mysql_select_db("atsveron_steel", $connection);

$NumeroSpan = 5 + NUMEROSTAGES;

                for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                    $MioSelect = "" .$MioSelect ." Score_Stage_" .$Sel .",";
                }

if ($MyCmd == 'totale'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $querySemiauto = "SELECT ID, Surname, Name, " .$MioSelect ." TotalScore FROM " .$MioNomeGara ." WHERE Division='SEMIAUTO' AND SubscriptionType='GARA' AND TotalScore!='0' ORDER BY TotalScore ASC";
              $resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query SEMIAUTO: ".mysql_error());
              $queryRevolver = "SELECT ID, Surname, Name, " .$MioSelect ." TotalScore FROM " .$MioNomeGara ." WHERE Division='REVOLVER' AND SubscriptionType='GARA' AND TotalScore!='0' ORDER BY TotalScore ASC";
              $resultRevolver = mysql_query($queryRevolver) or die ("Errore sulla query REVOLVER: ".mysql_error());
              echo "<center><B>GENERALE</center></B><BR><BR>";
}

	if ($MyCmd == 'definitiva'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiauto = "SELECT f.ID, f.Surname, f.Name, " .$MioSelect ." f.TotalScore
                             FROM (
                             SELECT ID, Surname, Name, MIN(TotalScore) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Division='SEMIAUTO' AND SubscriptionType='GARA'
                             GROUP BY Surname, Name)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Name=x.Name and f.Surname=x.Surname and f.TotalScore=x.maxpunti
                             ORDER BY f.TotalScore ASC";


              $resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query semiauto: ".mysql_error());

              $queryRevolver = "SELECT f.ID, f.Surname, f.Name, " .$MioSelect ." f.TotalScore
                             FROM (
                             SELECT ID, Surname, Name, MIN(TotalScore) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Division='REVOLVER' AND SubscriptionType='GARA'
                             GROUP BY Surname, Name)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Name=x.Name and f.Surname=x.Surname and f.TotalScore=x.maxpunti
                             ORDER BY f.TotalScore ASC";

              $resultRevolver = mysql_query($queryRevolver);

              echo "<center><B>DEFINITIVA</center></B><BR><BR>";
              }


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
               echo "<br>";

              //echo "<div class='miocentro'>";
              echo "<font color='#70A401'>";
              echo "<center><B></B><BR></center>";
              echo "<TABLE BORDER='1'>";

              //CLASSIFICA AUTOMATICA
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO</center></B></TH>";
              echo "</TR>";
              echo "<TR>";
              echo "<TH></TH>";
              echo "<TH><center><B><font color='#000000'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Nome</font></B></center></TH>";

              for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                  echo "<TH><center><B><font color='#000000'>Stage " .$Sel ."</font></B></center></TH>";
              }

              echo "<TH><center><B><font color='#000000'>Totale</font></B></center></TH>";

              echo "</TR>";

              $ClassificaA=1;
              while ($rowSemi = mysql_fetch_array($resultSemiauto))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#FF0000'>" .$ClassificaA ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowSemi['ID'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowSemi['Surname'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowSemi['Name'] ."</font></TD>";

                     for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                        echo "<TD><font color='#000000'>" .$rowSemi['Score_Stage_' .$Sel .''] ."</font></TD>";
                     }

                     echo "<TD><font color='#000000'><B>" .$rowSemi['TotalScore'] ."</B></font></TD>";

                     $ClassificaA++;
                  }

              echo "</TABLE>";
			  
			  echo "<SCRIPT LANGUAGE='javascript'>{
    	               window.scrollBy(0,30);
    	               scrolldelay = setTimeout('pageScroll()',1000);}</SCRIPT>";

             // CLASSIFICA REVOLVER
              echo "<BR><BR><BR>";
              echo "<center><B></B><BR></center>";
              echo "<TABLE BORDER='1'>";

              //CLASSIFICA REVOLVER
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER</center></B></TH>";
              echo "</TR>";
              echo "<TR>";
              echo "<TH></TH>";
              echo "<TH><center><B><font color='#000000'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Nome</font></B></center></TH>";

              for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                  echo "<TH><center><B><font color='#000000'>Score<BR>Stage " .$Sel ."</font></B></center></TH>";
              }

              echo "<TH><center><B><font color='#000000'>Totale</font></B></center></TH>";

              echo "</TR>";

              $ClassificaR=1;
              while ($rowSemi = mysql_fetch_array($resultSemiauto))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#FF0000'>" .$ClassificaR ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowRev['ID'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowRev['Surname'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowRev['Name'] ."</font></TD>";

                     for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                        echo "<TD><font color='#000000'>" .$rowRev['Score_Stage_' .$Sel .''] ."</font></TD>";
                     }

                     echo "<TD><font color='#FFFFFF'><B>" .$rowRev['TotalScore'] ."</B></font></TD>";

                     $ClassificaR++;
                  }



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



