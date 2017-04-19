<?php

if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}

$MyCmd = $_GET['cmd'];
$MyPrint = $_GET['print'];
$MyStage='';
if ($MyCmd=='Parziale'){
$MyStage = $_REQUEST['NumStage'];
$MyCmd = $_REQUEST['Classifica'];
}
include ('class.ezpdf.php');
//$pdf =& new Cezpdf('a4','landscape');
//$pdf->selectFont('./fonts/Helvetica.afm');
$MioSelect="";



if ($MyPrint != 'Y'){
   require_once('./class2.php');
   require_once(HEADERF);
}
else {

//#############################################################
// DAVIDE
//#############################################################

$myFile = "GaraAttiva.txt";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
define("NOMEGARA", $theData);

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

}

$MiaPagina=(TOTPROVE*NUMEROSTAGES)+NUMEROSTAGES;
If ($MiaPagina >= 100){
$pdf =& new Cezpdf('a0','landscape');
}
$MiaPagina=(TOTPROVE*NUMEROSTAGES)+NUMEROSTAGES;
If ($MiaPagina <= 100){
$pdf =& new Cezpdf('a1','landscape');
}
$MiaPagina=(TOTPROVE*NUMEROSTAGES)+NUMEROSTAGES;
If ($MiaPagina <= 100){
$pdf =& new Cezpdf('a2','landscape');
}
$MiaPagina=(TOTPROVE*NUMEROSTAGES)+NUMEROSTAGES;
If ($MiaPagina <= 100){
$pdf =& new Cezpdf('a3','landscape');
}
$MiaPagina=(TOTPROVE*NUMEROSTAGES)+NUMEROSTAGES;
If ($MiaPagina <= 100){
$pdf =& new Cezpdf('a4','landscape');
}

$pdf->selectFont('./fonts/Helvetica.afm');

$MiaData = date('d/m/Y - G:i:s');

$connection = mysql_connect("localhost", "atsverona", "Jump02052012");

$db = mysql_select_db("atsveron_steel", $connection);

$NumeroSpan = 5 + (NUMEROSTAGES*TOTPROVE)+NUMEROSTAGES;

if ($MyStage == ''){ //DEVO ESTRARRE TUTTI GLI STAGE
if ($MyPrint != 'Y'){ // NON FA LA STAMPA
            for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  $MioSelect = "" .$MioSelect ." Score_" .$Sel ."_" .$SelProve .",";
               }
                  $MioSelect = "" .$MioSelect ." Score_Stage_" .$Sel .",";
              }
}
else { //FA LA STAMPA
     for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                  $MioSelect = "" .$MioSelect ." Score_Stage_" .$Sel .",";
              }
}
}
else {//DEVO ESTRARRE SOLO UNO STAGE

if ($MyPrint != 'Y'){//NON FA LA STAMPA
            for ($Sel=$MyStage; $Sel <= $MyStage; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  $MioSelect = "" .$MioSelect ." Score_" .$Sel ."_" .$SelProve .",";
               }
                  $MioSelect = "" .$MioSelect ." Score_Stage_" .$Sel .",";
              }
}
else {//FA LA STAMPA
     for ($Sel=$MyStage; $Sel <= $MyStage; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  $MioSelect = "" .$MioSelect ." Score_" .$Sel ."_" .$SelProve .",";
               }
                  $MioSelect = "" .$MioSelect ." Score_Stage_" .$Sel .",";
              }
}

}

        if ($MyCmd == 'totale'){
            if ($MyStage == ''){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $querySemiauto = "SELECT ID, Surname, Name, " .$MioSelect ." TotalScore FROM " .$MioNomeGara ." WHERE Division='SEMIAUTO' AND SubscriptionType='GARA' AND TotalScore!='0' ORDER BY TotalScore ASC";
              $resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query SEMIAUTO: ".mysql_error());
              $queryRevolver = "SELECT ID, Surname, Name, " .$MioSelect ." TotalScore FROM " .$MioNomeGara ." WHERE Division='REVOLVER' AND SubscriptionType='GARA' AND TotalScore!='0' ORDER BY TotalScore ASC";
              $resultRevolver = mysql_query($queryRevolver) or die ("Errore sulla query REVOLVER: ".mysql_error());
              if ($MyPrint != 'Y'){echo "<center><B>GENERALE</center></B><BR><BR>";}
            }
            else {
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $querySemiauto = "SELECT ID, Surname, Name, " .$MioSelect ." Score_Stage_" .$MyStage ." FROM " .$MioNomeGara ." WHERE Division='SEMIAUTO' AND Score_Stage_" .$MyStage ."!='0' ORDER BY Score_Stage_" .$MyStage ." ASC";
              $resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query SEMIAUTO: ".mysql_error());
              $queryRevolver = "SELECT ID, Surname, Name, " .$MioSelect ." Score_Stage_" .$MyStage ." FROM " .$MioNomeGara ." WHERE Division='REVOLVER' AND Score_Stage_" .$MyStage ."!='0' ORDER BY Score_Stage_" .$MyStage ." ASC";
              $resultRevolver = mysql_query($queryRevolver) or die ("Errore sulla query REVOLVER: ".mysql_error());
              if ($MyPrint != 'Y'){echo "<center><B>GENERALE</center></B><BR><BR>";}
            }
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

              if ($MyPrint != 'Y'){echo "<center><B>DEFINITIVA</center></B><BR><BR>";}
              }

         if ($MyCmd == 'senior'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiauto = "SELECT f.ID, f.Surname, f.Name, " .$MioSelect ." f.TotalScore
                             FROM (
                             SELECT ID, Surname, Name, MIN(TotalScore) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Division='SEMIAUTO' AND SubscriptionType='GARA' AND Senior='1'
                             GROUP BY Surname, Name)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Name=x.Name and f.Surname=x.Surname and f.TotalScore=x.maxpunti
                             ORDER BY f.TotalScore ASC";

              $resultSemiauto = mysql_query($querySemiauto);

              $queryRevolver = "SELECT f.ID, f.Surname, f.Name, " .$MioSelect ." f.TotalScore
                             FROM (
                             SELECT ID, Surname, Name, MIN(TotalScore) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Division='REVOLVER' AND SubscriptionType='GARA' AND Senior='1'
                             GROUP BY Surname, Name)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Name=x.Name and f.Surname=x.Surname and f.TotalScore=x.maxpunti
                             ORDER BY f.TotalScore ASC";

              $resultRevolver = mysql_query($queryRevolver);

              if ($MyPrint != 'Y'){echo "<center><B>SENIOR</center></B><BR><BR>";}
              }

         if ($MyCmd == 'lady'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiauto = "SELECT f.ID, f.Surname, f.Name, " .$MioSelect ." f.TotalScore
                             FROM (
                             SELECT ID, Surname, Name, MIN(TotalScore) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Division='SEMIAUTO' AND SubscriptionType='GARA' AND Lady='1'
                             GROUP BY Surname, Name)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Name=x.Name and f.Surname=x.Surname and f.TotalScore=x.maxpunti
                             ORDER BY f.TotalScore ASC";

              $resultSemiauto = mysql_query($querySemiauto);



              $queryRevolver = "SELECT f.ID, f.Surname, f.Name, " .$MioSelect ." f.TotalScore
                             FROM (
                             SELECT ID, Surname, Name, MIN(TotalScore) as maxpunti
                             FROM " .$MioNomeGara ."
                             WHERE Division='REVOLVER' AND SubscriptionType='GARA' AND Lady='1'
                             GROUP BY Surname, Name)
                             AS x inner join " .$MioNomeGara ." AS f
                             on f.Name=x.Name and f.Surname=x.Surname and f.TotalScore=x.maxpunti
                             ORDER BY f.TotalScore ASC";

              $resultRevolver = mysql_query($queryRevolver);

              if ($MyPrint != 'Y'){echo "<center><B>LADY</center></B><BR><BR>";}
              }

         if ($MyCmd == 'SelStage'){

          echo "<FORM METHOD='POST' ACTION='dama_Classifica.php?cmd=Parziale'>";
          echo "<TABLE BORDER='1'>";
          echo "<TH COLSPAN=2><B>SELEZIONA LO STAGE DA VISUALIZZARE</B></TH>";
          echo "<TR>";
          echo "<TD style='width:50px;'><B>STAGE: </B></TD>";
          echo "<TD style='width:50px;'><SELECT NAME='NumStage'>";
          for ($NumSt=1; $NumSt<=NUMEROSTAGES; $NumSt++)
                  {
                     echo "<OPTION>" .$NumSt ."</OPTION>";
              }
          echo "</SELECT></TD>";
          echo "</TR>";
          echo "<TR>";
          echo "<TD style='width:50px;'><B>CLASSIFICA: </B></TD>";
          echo "<TD style='width:50px;'><SELECT NAME='Classifica'>";
          echo "<OPTION>totale</OPTION>";
          echo "<OPTION>definitiva</OPTION>";
          echo "</SELECT></TD>";
          echo "</TR>";
          echo "<TR>";
          echo "<TD COLSPAN=2 style='width:200px;'><BR><center><input type='submit' value='SELEZIONA'><BR>.</TD>";
          echo "</TR>";
          echo "</TABLE>";
          echo "</FORM>";
          echo "<BR>";
          echo "<BR>";
          require_once(FOOTERF);
          exit;
         }
//INIZIO PARTE STAMPA

if ($MyPrint == 'Y'){

    $data = array();
    $dataR = array();
    $dataB = array();
    $dataRB = array();



               $Posizione = 1;
               while($data[] = mysql_fetch_assoc($resultSemiauto)) {}
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
        $Intestazioni=array('ID'=>'POS','Surname'=>'Cognome','Name'=>'Nome');
        for ($In=1; $In<=NUMEROSTAGES; $In++){
            $Intestazioni["Score_Stage_" .$In .""]="Stage " .$In ."";
        }
        $Intestazioni["TotalScore"]="TOTALE";
        //print_r($Intestazioni);
        //exit;
        $pdf->ezText('STEEL CHALLANGE - ' .NOMEGARA .'' ,20);
        $pdf->ezText('' .$MiaData .'',14);
        $pdf->ezText(' ',14);
        $pdf->ezText('CLASSIFICA: ' .$MyCmd .'',14);
        $pdf->ezTable($data,$Intestazioni,'SEMIAUTO', array('xPos'=>50,'xOrientation'=>'right','maxWidth'=>700));
        $pdf->ezText(' ',50);
        $pdf->ezTable($dataR,$Intestazioni,'REVOLVER', array('xPos'=>50,'xOrientation'=>'right','maxWidth'=>700));
        $pdf->stream();
        mysql_close($connection);
        exit;
        //}

    }
    else { //NON STAMPA MA MOSTRA A VIDEO

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
              echo "<TH><center><B><font color='#000000'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Nome</font></B></center></TH>";

         if ($MyStage == ''){
              for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  echo "<TH><center><B><font color='#000000'>Score " .$Sel ."_" .$SelProve ."</font></B></center></TH>";
               }
                  echo "<TH><center><B><font color='#000000'>Score<BR>Stage " .$Sel ."</font></B></center></TH>";
              }

              echo "<TH><center><B><font color='#000000'>Totale</font></B></center></TH>";
         }
         else {
             for ($Sel=$MyStage; $Sel <= $MyStage; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  echo "<TH><center><B><font color='#000000'>Score " .$Sel ."_" .$SelProve ."</font></B></center></TH>";
               }
                  echo "<TH><center><B><font color='#000000'>Score<BR>Stage " .$Sel ."</font></B></center></TH>";
              }
         }
              echo "</TR>";

              $ClassificaA=1;
              while ($rowSemi = mysql_fetch_array($resultSemiauto))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#FF0000'>" .$ClassificaA ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowSemi['ID'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowSemi['Surname'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowSemi['Name'] ."</font></TD>";

                    if ($MyStage == ''){
                     for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                        for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                            echo "<TD><font color='#000000'>" .$rowSemi['Score_' .$Sel .'_' .$SelProve .''] ."</font></TD>";
                        }
                        echo "<TD><font color='#000000'>" .$rowSemi['Score_Stage_' .$Sel .''] ."</font></TD>";
                     }

                     echo "<TD><font color='#000000'>" .$rowSemi['TotalScore'] ."</font></TD>";
                    }
                    else {

                     for ($Sel=$MyStage; $Sel <= $MyStage; $Sel++){
                        for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                            echo "<TD><font color='#000000'>" .$rowSemi['Score_' .$Sel .'_' .$SelProve .''] ."</font></TD>";
                        }
                        echo "<TD><font color='#000000'>" .$rowSemi['Score_Stage_' .$Sel .''] ."</font></TD>";
                     }

                    }
                     $ClassificaA++;
                  }

				echo "<TR>";
              	echo "<TH COLSPAN=" .$NumeroSpan ."><B><center><a href=./dama_mySQL_to_excel.php?Tabella=" .$MioNomeGara ."&Divisione=SEMIAUTO>
					ESPORTA IN EXCEL  <img src='./e107_images/icons/excel.png' width='16' height='16' border='2' alt='Crea EXCEL' /></a></center></B></TH>
					";
              	echo "</TR>";

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
              echo "<TH><center><B><font color='#000000'>N. Prova</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Cognome</font></B></center></TH>";
              echo "<TH><center><B><font color='#000000'>Nome</font></B></center></TH>";

         if ($MyStage == ''){
              for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  echo "<TH><center><B><font color='#000000'>Score " .$Sel ."_" .$SelProve ."</font></B></center></TH>";
               }
                  echo "<TH><center><B><font color='#000000'>Score<BR>Stage " .$Sel ."</font></B></center></TH>";
              }

              echo "<TH><center><B><font color='#000000'>Totale</font></B></center></TH>";
         }
         else {
              for ($Sel=$MyStage; $Sel <= $MyStage; $Sel++){
               for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                  echo "<TH><center><B><font color='#000000'>Score " .$Sel ."_" .$SelProve ."</font></B></center></TH>";
               }
                  echo "<TH><center><B><font color='#000000'>Score<BR>Stage " .$Sel ."</font></B></center></TH>";
              }
         }
              echo "</TR>";

              $ClassificaR=1;
              while ($rowRev = mysql_fetch_array($resultRevolver))
                  {
                     echo "<TR>";
                     echo "<TD><font color='#FF0000'>" .$ClassificaR ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowRev['ID'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowRev['Surname'] ."</font></TD>";
                     echo "<TD><font color='#000000'>" .$rowRev['Name'] ."</font></TD>";
                   if ($MyStage == ''){
                     for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){
                        for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                            echo "<TD><font color='#000000'>" .$rowRev['Score_' .$Sel .'_' .$SelProve .''] ."</font></TD>";
                        }
                        echo "<TD><font color='#000000'>" .$rowRev['Score_Stage_' .$Sel .''] ."</font></TD>";
                     }

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['TotalScore'] ."</font></TD>";
                    }
                    else {
                     for ($Sel=$MyStage; $Sel <= $MyStage; $Sel++){
                        for ($SelProve=1; $SelProve <=TOTPROVE; $SelProve++){
                            echo "<TD><font color='#000000'>" .$rowRev['Score_' .$Sel .'_' .$SelProve .''] ."</font></TD>";
                        }
                        echo "<TD><font color='#000000'>" .$rowRev['Score_Stage_' .$Sel .''] ."</font></TD>";
                     }
                    }
                     $ClassificaR++;
                  }

				echo "<TR>";
              	echo "<TH COLSPAN=" .$NumeroSpan ."><B><center><a href=./dama_mySQL_to_excel.php?Tabella=" .$MioNomeGara ."&Divisione=REVOLVER>
					ESPORTA IN EXCEL  <img src='./e107_images/icons/excel.png' width='16' height='16' border='2' alt='Crea EXCEL' /></a></center></B></TH>
					";
              	echo "</TR>";

              echo "</TABLE></div>";
              echo "<BR><BR>";

         if ($MyStage == ''){
              echo "<center><B><a href=./dama_Classifica.php?print=Y&cmd=" .$MyCmd .">
                    CREA STAMPA PDF
               <img src='./e107_plugins/pdf/images/pdf_16.png' width='16' height='16' border='2' alt='Crea PDF' />
               </a>";
         }

              echo "<BR><BR>";





require_once(FOOTERF);
}

mysql_close($connection);

?>





