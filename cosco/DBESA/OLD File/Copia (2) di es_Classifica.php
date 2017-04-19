<?php

$MyCmd = $_GET['cmd'];
$MyPrint = $_GET['print'];
include ('class.ezpdf.php');
$pdf =& new Cezpdf('a4','portrait');
$pdf->selectFont('./fonts/Helvetica.afm');
$MioSelect="";
if ($MyPrint != 'Y'){
   require_once('./class2.php');
   require_once(HEADERF);
}
else {

//#############################################################
// DAVIDE
// SCRIVE IN UN FILE IL NOME DELLA GARA ATTIVA
//#############################################################

$myFile = "GaraAttiva.txt";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
define("NOMEGARA", $theData);

//FISSA LE VARIABILI PER IL MASSIMO PUNTEGGIO DEGLI STAGE DELLA GARA ED IL NUMERO DI STAGE
$Miaconnection = mysql_connect("localhost", "root", "") or die ("NON è possibile stabilire una connessione.");
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

//#############################################################

}

$MiaData = date('d/m/Y - G:i:s');

$connection = mysql_connect("localhost", "root", "");

$db = mysql_select_db("esagonale", $connection);

$NumeroSpan = 6 + (2*NUMEROSTAGES);

            for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                  $MioSelect = "" .$MioSelect ." HF_" .$Sel .", Punteggio_" .$Sel .",";
              }

        if ($MyCmd == 'totale'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $querySemiauto = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' ORDER BY TotalePunti DESC";
              $resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query SEMIAUTO: ".mysql_error());
              //$querySemiautoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='B' ORDER BY TotalePunti DESC";
              //$resultSemiautoB = mysql_query($querySemiautoB);
              $queryRevolver = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' ORDER BY TotalePunti DESC";
              $resultRevolver = mysql_query($queryRevolver) or die ("Errore sulla query REVOLVER: ".mysql_error());
              //$queryRevolverB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='B' ORDER BY TotalePunti DESC";
              //$resultRevolverB = mysql_query($queryRevolverB);
              if ($MyPrint != 'Y'){echo "<center><B>GENERALE</center></B><BR><BR>";}
              }
              
         if ($MyCmd == 'definitiva'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              //$querySemiauto = "SELECT ID, Cognome, Nome, " .$MioSelect ." Percentuale, TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              $querySemiauto = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='SEMIAUTO'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";


              $resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query semiauto: ".mysql_error());
              //$querySemiautoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='B' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultSemiautoB = mysql_query($querySemiautoB);
              //$queryRevolver = "SELECT ID, Cognome, Nome, " .$MioSelect ." Percentuale, TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              $queryRevolver = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='REVOLVER'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultRevolver = mysql_query($queryRevolver);
              //$queryRevolverB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='B' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultRevolverB = mysql_query($queryRevolverB);
              if ($MyPrint != 'Y'){echo "<center><B>DEFINITIVA</center></B><BR><BR>";}
              }
              
         if ($MyCmd == 'senior'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              //$querySemiauto = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Senior='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";

              $querySemiauto = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='SEMIAUTO' AND Senior='1'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultSemiauto = mysql_query($querySemiauto);
              //$querySemiautoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='B' AND Senior='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultSemiautoB = mysql_query($querySemiautoB);
              //$queryRevolver = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Senior='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";

              $queryRevolver = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='REVOLVER' AND Senior='1'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultRevolver = mysql_query($queryRevolver);
              //$queryRevolverB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='B' AND Senior='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultRevolverB = mysql_query($queryRevolverB);
              if ($MyPrint != 'Y'){echo "<center><B>SENIOR</center></B><BR><BR>";}
              }
              
         if ($MyCmd == 'esordiente'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              //$querySemiauto = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Esordiente='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";

              $querySemiauto = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='SEMIAUTO' AND Esordiente='1'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultSemiauto = mysql_query($querySemiauto);
              //$querySemiautoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' Classe='B' AND Esordiente='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultSemiautoB = mysql_query($querySemiautoB);
              //$queryRevolver = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Esordiente='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";

              $queryRevolver = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='REVOLVER' AND Esordiente='1'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultRevolver = mysql_query($queryRevolver);
              //$queryRevolverB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' Classe='B' AND Esordiente='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultRevolverB = mysql_query($queryRevolverB);
              if ($MyPrint != 'Y'){echo "<center><B>ESORDIENTI</center></B><BR><BR>";}
              }
              
         if ($MyCmd == 'lady'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              //$querySemiauto = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Lady='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";

              $querySemiauto = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='SEMIAUTO' AND Lady='1'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultSemiauto = mysql_query($querySemiauto);
              //$querySemiautoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' Classe='B' AND Lady='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultSemiautoB = mysql_query($querySemiautoB);
              //$queryRevolver = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Lady='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";

              $queryRevolver = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale
                             FROM (
                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Divisione='REVOLVER' AND Lady='1'
                             GROUP BY Cognome, Nome)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti
                             ORDER BY f.TotalePunti DESC";

              $resultRevolver = mysql_query($queryRevolver);
              //$queryRevolverB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' Classe='B' AND Lady='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";
              //$resultRevolverB = mysql_query($queryRevolverB);
              if ($MyPrint != 'Y'){echo "<center><B>LADY</center></B><BR><BR>";}
              }
              
         if ($MyCmd == 'squadre'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $querySemiauto = "SELECT T.Squadra,
              SUM(T.T) AS GT
              FROM
              (SELECT *,
              MAX(TotalePunti) AS T
              FROM " .$MioNomeGara ."
              WHERE Divisione='SEMIAUTO'
              GROUP BY Nome, Cognome
              ORDER BY TotalePunti DESC) AS T
              WHERE Squadra != ''
              GROUP BY Squadra
              ORDER BY GT DESC";
              $resultSemiauto = mysql_query($querySemiauto);
              $queryRevolver = "SELECT T.Squadra,
              SUM(T.T) AS GT
              FROM
              (SELECT *,
              MAX(TotalePunti) AS T
              FROM " .$MioNomeGara ."
              WHERE Divisione='REVOLVER'
              GROUP BY Nome, Cognome
              ORDER BY TotalePunti DESC) AS T
              WHERE Squadra != ''
              GROUP BY Squadra
              ORDER BY GT DESC";
              $resultRevolver = mysql_query($queryRevolver);
              if ($MyPrint != 'Y'){echo "<center><B>DEFINITIVA</center></B><BR><BR>";}
              }

//INIZIO PARTE STAMPA

if ($MyPrint == 'Y'){

    $data = array();
    $dataR = array();
    $dataB = array();
    $dataRB = array();



               $Posizione = 1;
               while($data[] = mysql_fetch_assoc($resultSemiauto)) {}
                        /*echo("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('CONTEGGIO: " .count($data) ."')
                        </SCRIPT>");*/
                        if (count($data)>=1){
                             for ($outindex = 0; $outindex < count($data) - 1; $outindex++){
                                 $Posizione = $outindex + 1;
                                 $data[$outindex]['ID'] = "" .$Posizione ."";
                             }
                        }

               $Posizione = 1;
               while($dataR[] = mysql_fetch_assoc($resultRevolver)) {}
                        if (count($dataR)>=1){
                             for ($outindex = 0; $outindex < count($dataR) - 1; $outindex++){
                                 $Posizione = $outindex + 1;
                                 $dataR[$outindex]['ID'] = "" .$Posizione ."";
                             }
                        }
               /*
               $Posizione = 1;
               while($dataB[] = mysql_fetch_assoc($resultSemiautoB)) {}

                        if (count($dataB)>=1){
                             for ($outindex = 0; $outindex < count($dataB) - 1; $outindex++){
                                 $Posizione = $outindex + 1;
                                 $dataB[$outindex]['ID'] = "" .$Posizione ."";
                             }
                        }

               $Posizione = 1;
               while($dataRB[] = mysql_fetch_assoc($resultRevolverB)) {}
                        if (count($dataRB)>=1){
                             for ($outindex = 0; $outindex < count($dataRB) - 1; $outindex++){
                                 $Posizione = $outindex + 1;
                                 $dataRB[$outindex]['ID'] = "" .$Posizione ."";
                             }
                        }
               */

        $pdf->ezText('ESAGONALE - ' .NOMEGARA .'' ,20);
        $pdf->ezText('' .$MiaData .'',14);
        $pdf->ezText(' ',14);
        $pdf->ezText('CLASSIFICA: ' .$MyCmd .'',14);
        $pdf->ezTable($data,'','SEMIAUTO', array('xPos'=>50,'xOrientation'=>'right','width'=>500));
        //$pdf->ezText(' ',50);
        //$pdf->ezTable($dataB,'','SEMIAUTO B', array('xPos'=>50,'xOrientation'=>'right','width'=>500));
        $pdf->ezText(' ',50);
        $pdf->ezTable($dataR,'','REVOLVER', array('xPos'=>50,'xOrientation'=>'right','width'=>500));
        //$pdf->ezText(' ',50);
        //$pdf->ezTable($dataRB,'','REVOLVER B', array('xPos'=>50,'xOrientation'=>'right','width'=>500));


        //if (isset($d) && $d){
        //$pdfcode = $pdf->output(1);
        //$pdfcode = str_replace("\n","\n<br>",htmlspecialchars($pdfcode));
        //echo '<html><body>';
        //echo trim($pdfcode);
        //echo '</body></html>';
        //} else {
        $pdf->stream();
        mysql_close($connection);
        exit;
        //}

    }
    else {

//NON STAMPA MA MOSTRA A VIDEO

              echo "<div class='miocentro'>";
              echo "<font color='#70A401'>";
              echo "<center><B></B><BR></center>";
              echo "<TABLE BORDER='1'>";

              //CLASSIFICA AUTOMATICA
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO</center></B></TH>";
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
              echo "<TH><center><B><font color='#70A401'>Percentuale</font></B></center></TH>";
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
                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['HF_' .$i .''] ."</font></TD>";
                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Punteggio_' .$i .''] ."</font></TD>";
                     }
                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['TotalePunti'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Percentuale'] ."</font></TD>";
                     $ClassificaA++;
                  }
                  
              /*
              //CLASSIFICA AUTOMATICA CAT B
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>CLASSE B</center></B></TH>";
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
              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              for ($i=1; $i<=NUMEROSTAGES; $i++){
                  echo "<TH><center><B><font color='#70A401'>HF " .$i ."</font></B></center></TH>";
                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";
              }
              echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";
              echo "<TH><center><B><font color='#70A401'>Percentuale</font></B></center></TH>";
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
                         echo "<TD><font color='#FFFFFF'>" .$rowRev['HF_' .$i .''] ."</font></TD>";
                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Punteggio_' .$i .''] ."</font></TD>";
                     }
                     echo "<TD><font color='#FFFFFF'>" .$rowRev['TotalePunti'] ."</font></TD>";
                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Percentuale'] ."</font></TD>";
                     $ClassificaR++;
                  }
                  
                  
              /*
              //CLASSIFICA REVOLVER CAT B
              echo "<TR>";
              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>CLASSE B</center></B></TH>";
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

              echo "</TABLE></div>";
              echo "<BR><BR>";
              
              echo "<center><B><a href=./es_Classifica.php?print=Y&cmd=" .$MyCmd .">
                    CREA STAMPA PDF
               <img src='./e107_plugins/pdf/images/pdf_16.png' width='16' height='16' border='2' alt='Crea PDF' />
               </a>";
              
              echo "<BR><BR>";
           
           



require_once(FOOTERF);
}

mysql_close($connection);

?>





