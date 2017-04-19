<?php



$MyCmd = $_GET['cmd'];

$MyPrint = $_GET['print'];

include ('class.ezpdf.php');

$pdf =& new Cezpdf('a4','landscape');

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

$Miaconnection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");

$Miaquery = "SELECT * FROM atsveron_dbesa.gare WHERE NomeGara LIKE '%" .NOMEGARA ."%'";

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



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



$NumeroSpan = 6 + (2*NUMEROSTAGES);



            for ($Sel=1; $Sel <= NUMEROSTAGES; $Sel++){

                  $MioSelect = "" .$MioSelect ." Tempo_" .$Sel .", Punteggio_" .$Sel .",";

              }



            if (NUMEROSTAGES==1){

                $MioSelect = "" .$MioSelect ." HF_1,";

                $MioSelectPunti = "";

                $MioSelectPuntiDef = "";

            }

            else {

                $MioSelectPunti = "TotalePunti";

                $MioSelectPuntiDef = "f.TotalePunti";

            }



        if ($MyCmd == 'totale'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);



              $querySemiautoA = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='A' ORDER BY TotalePunti DESC";

              $resultSemiautoA = mysql_query($querySemiautoA) or die ("Errore sulla query SEMIAUTO: ".mysql_error());

              $querySemiautoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='B' ORDER BY TotalePunti DESC";

              $resultSemiautoB = mysql_query($querySemiautoB);

              $queryRevolverA = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='A' ORDER BY TotalePunti DESC";

              $resultRevolverA = mysql_query($queryRevolverA) or die ("Errore sulla query REVOLVER: ".mysql_error());

              $queryRevolverB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='B' ORDER BY TotalePunti DESC";

              $resultRevolverB = mysql_query($queryRevolverB);

              $queryMonoA = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='MONOFILARE' AND Classe='A' ORDER BY TotalePunti DESC";

              $resultMonoA = mysql_query($queryMonoA);

			  $queryMonoB = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, Percentuale FROM " .$MioNomeGara ." WHERE Divisione='MONOFILARE' AND Classe='B' ORDER BY TotalePunti DESC";

              $resultMonoB = mysql_query($queryMonoB);

              

			  if ($MyPrint != 'Y'){echo "<center><B>GENERALE</center></B><BR><BR>";}

              }



         if ($MyCmd == 'definitiva'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO'

							 AND Classe='A'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultSemiautoA = mysql_query($querySemiautoA) or die ("Errore sulla query semiauto: ".mysql_error());

              

			  $querySemiautoB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO'

							 AND Classe='B'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultSemiautoB = mysql_query($querySemiautoB) or die ("Errore sulla query semiauto: ".mysql_error());

			  

			  $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER'

							 AND Classe='A'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

              			  

			  $queryRevolverB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER'

							 AND Classe='B'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverB = mysql_query($queryRevolverB);

			  

			  $queryMonoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='MONOFILARE'

							 AND Classe='A'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultMonoA = mysql_query($queryMonoA);

			  

			  $queryMonoB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='MONOFILARE'

							 AND Classe='B'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultMonoB = mysql_query($queryMonoB);

			  			  

			  

		if ($MyPrint != 'Y'){echo "<center><B>DEFINITIVA</center></B><BR><BR>";}

              }



// DEFINITIVA NO DIVISIONE A e B



if ($MyCmd == 'definitivaNoAB'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultSemiautoA = mysql_query($querySemiautoA) or die ("Errore sulla query semiauto: ".mysql_error());

              

			  $resultSemiautoB='';

			  

			  $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

              $resultRevolverB='';

			  

			  $queryMonoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='MONOFILARE'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultMonoA = mysql_query($queryMonoA);

              $resultMonoB='';

			  

			  			  

			  

		if ($MyPrint != 'Y'){echo "<center><B>DEFINITIVA</center></B><BR><BR>";}

              }





// ********* FINE DEFINITIVA NO A e B



         if ($MyCmd == 'senior'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              

              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultSemiautoA = mysql_query($querySemiautoA);

              

              $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

			  

			  $queryMonoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='MONOFILARE' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              		$resultMonoA = mysql_query($queryMonoA);

              

			  	if ($MyPrint != 'Y'){echo "<center><B>SENIOR</center></B><BR><BR>";}

              }



         if ($MyCmd == 'esordiente'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              

              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO' AND Esordiente='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultSemiautoA = mysql_query($querySemiautoA);

              

              $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER' AND Esordiente='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

			  

			  

			  $queryMonoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='MONOFILARE' AND Esordiente='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultMonoA = mysql_query($queryMonoA);

              

			  if ($MyPrint != 'Y'){echo "<center><B>ESORDIENTI</center></B><BR><BR>";}

              }



         if ($MyCmd == 'lady'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              //$querySemiauto = "SELECT ID, Cognome, Nome, " .$MioSelect ." TotalePunti, MAX(TotalePunti), Percentuale FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Lady='1' GROUP BY Nome, Cognome ORDER BY TotalePunti DESC";



              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO' AND Lady='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultSemiautoA = mysql_query($querySemiautoA);

              

              $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER' AND Lady='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

			  

			  

			  $queryMonoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='MONOFILARE' AND Lady='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultMonoA = mysql_query($queryMonoA);

              

		if ($MyPrint != 'Y'){echo "<center><B>LADY</center></B><BR><BR>";}

              }



         if ($MyCmd == 'squadre'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiautoA = "SELECT NomeSquadra,

              SUM(Punti) AS GT

              FROM puntisquadre

              GROUP BY NomeSquadra, Anno

              ORDER BY GT DESC";

              $resultSemiautoA = mysql_query($querySemiautoA);

              $querySemiautoMin = "SELECT NomeSquadra,

              MIN(Punti) AS MP

              FROM puntisquadre

              GROUP BY NomeSquadra, Anno

              ORDER BY NomeSquadra DESC";

              $resultSemiautoMin = mysql_query($querySemiautoMin);

              //$resultRevolver = mysql_query($queryRevolver);

              

              if ($MyPrint != 'Y'){echo "<center><B>DEFINITIVA</center></B><BR><BR>";}

              }



//INIZIO PARTE STAMPA



if ($MyPrint == 'Y'){



    $data = array();

    $dataR = array();

    $dataB = array();

    $dataRB = array();







               $Posizione = 1;

               while($data[] = mysql_fetch_assoc($resultSemiautoA)) {}

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

               if ($resultSemiautoB!=''){

			   while($dataB[] = mysql_fetch_assoc($resultSemiautoB)) {}

                        /*echo("<SCRIPT LANGUAGE='JavaScript'>

                        window.alert('CONTEGGIO: " .count($data) ."')

                        </SCRIPT>");*/

                        if (count($dataB)>=1){

                             for ($outindex = 0; $outindex < count($dataB) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataB[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

			   }

               

			   $Posizione = 1;

               while($dataR[] = mysql_fetch_assoc($resultRevolverA)) {}

                        if (count($dataR)>=1){

                             for ($outindex = 0; $outindex < count($dataR) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataR[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

               

			   

			   $Posizione = 1;

               if ($resultRevolverB!=''){

			   while($dataRB[] = mysql_fetch_assoc($resultRevolverB)) {}

                        if (count($dataRB)>=1){

                             for ($outindex = 0; $outindex < count($dataRB) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataRB[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

				

			   }

				

			   $Posizione = 1;

               while($dataM[] = mysql_fetch_assoc($resultMonoA)) {}

                        if (count($dataM)>=1){

                             for ($outindex = 0; $outindex < count($dataM) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataM[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

			   

			   $Posizione = 1;

               if ($resultMonoB!=''){

			   while($dataMB[] = mysql_fetch_assoc($resultMonoB)) {}

                        if (count($dataMB)>=1){

                             for ($outindex = 0; $outindex < count($dataMB) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataMB[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

						

			   }

		

			   

			   

        $pdf->ezText('ESAGONALE - ' .NOMEGARA .'' ,20);

        $pdf->ezText('' .$MiaData .'',14);

        $pdf->ezText(' ',14);

        $pdf->ezText('CLASSIFICA: ' .$MyCmd .'',14);

        $pdf->ezTable($data,'','SEMIAUTO A', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        if ($resultSemiautoB!=''){

		$pdf->ezText(' ',50);

		$pdf->ezTable($dataB,'','SEMIAUTO B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

		}

		$pdf->ezText(' ',50);

        $pdf->ezTable($dataR,'','REVOLVER A', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        if ($resultRevolverB!=''){

		$pdf->ezText(' ',50);

        $pdf->ezTable($dataRB,'','REVOLVER B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

		}

		$pdf->ezText(' ',50);

        $pdf->ezTable($dataM,'','MONOFILARE A', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        if ($resultMonoB!=''){

		$pdf->ezText(' ',50);

        $pdf->ezTable($dataMB,'','MONOFILARE B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

		}

        $pdf->stream();

        mysql_close($connection);

        exit;



    }

    else {



//NON STAMPA MA MOSTRA A VIDEO



              echo "<div class=''>";

              echo "<font color='#5179bc'>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              if (NUMEROSTAGES==1){

                  echo "<TH><center><B><font color='#5179bc'>HF_1</font></B></center></TH>";

              }

              else {

                echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaAA=1;

              while ($rowSemiA = mysql_fetch_array($resultSemiautoA))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaAA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiA['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiA['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiA['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiA['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiA['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     if (NUMEROSTAGES==1){

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiA['HF_1'] ."</font></TD>";

                     }

                     else {

                        echo "<TD><font color='#3e3e3e'>" .$rowSemiA['TotalePunti'] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiA['Percentuale'] ."</font></TD>";

                     $ClassificaAA++;

                  }



              //CLASSIFICA AUTOMATICA CLASSE B

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              if (NUMEROSTAGES==1){

                  echo "<TH><center><B><font color='#5179bc'>HF_1</font></B></center></TH>";

              }

              else {

                echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaAB=1;

              while ($rowSemiB = mysql_fetch_array($resultSemiautoB))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaAB ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiB['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiB['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiB['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiB['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiB['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     if (NUMEROSTAGES==1){

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiB['HF_1'] ."</font></TD>";

                     }

                     else {

                        echo "<TD><font color='#3e3e3e'>" .$rowSemiB['TotalePunti'] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiB['Percentuale'] ."</font></TD>";

                     $ClassificaAB++;

                  }







                  echo "</TABLE>";



             // CLASSIFICA REVOLVER

              echo "<BR><BR><BR>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA REVOLVER classe A

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              if (NUMEROSTAGES==1){

                  echo "<TH><center><B><font color='#5179bc'>HF_1</font></B></center></TH>";

              }

              else {

                echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaRA=1;

              while ($rowRevA = mysql_fetch_array($resultRevolverA))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaRA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRevA['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRevA['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRevA['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowRevA['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowRevA['Punteggio_' .$i .''] ."</font></TD>";

                     }

                      if (NUMEROSTAGES==1){

                        echo "<TD><font color='#3e3e3e'>" .$rowRevA['HF_1'] ."</font></TD>";

                     }

                     else {

                        echo "<TD><font color='#3e3e3e'>" .$rowRevA['TotalePunti'] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowRevA['Percentuale'] ."</font></TD>";

                     $ClassificaRA++;

                  }





              //CLASSIFICA REVOLVER classe B

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              if (NUMEROSTAGES==1){

                  echo "<TH><center><B><font color='#5179bc'>HF_1</font></B></center></TH>";

              }

              else {

                echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaRB=1;

              while ($rowRevB = mysql_fetch_array($resultRevolverB))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaRB ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRevB['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRevB['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRevB['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowRevB['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowRevB['Punteggio_' .$i .''] ."</font></TD>";

                     }

                      if (NUMEROSTAGES==1){

                        echo "<TD><font color='#3e3e3e'>" .$rowRevB['HF_1'] ."</font></TD>";

                     }

                     else {

                        echo "<TD><font color='#3e3e3e'>" .$rowRevB['TotalePunti'] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowRevB['Percentuale'] ."</font></TD>";

                     $ClassificaRB++;

                  }

				  

				    echo "</TABLE>";



             // CLASSIFICA REVOLVER

              echo "<BR><BR><BR>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";  



			//CLASSIFICA MONO classe A

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>MONOFILARE A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              if (NUMEROSTAGES==1){

                  echo "<TH><center><B><font color='#5179bc'>HF_1</font></B></center></TH>";

              }

              else {

                echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Percentuale</font></B></center></TH>";

              echo "</TR>";



			$ClassificaMA=1;

              while ($rowMonoA = mysql_fetch_array($resultMonoA))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaMA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoA['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoA['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoA['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowMonoA['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowMonoA['Punteggio_' .$i .''] ."</font></TD>";

                     }

                      if (NUMEROSTAGES==1){

                        echo "<TD><font color='#3e3e3e'>" .$rowMonoA['HF_1'] ."</font></TD>";

                     }

                     else {

                        echo "<TD><font color='#3e3e3e'>" .$rowMonoA['TotalePunti'] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoA['Percentuale'] ."</font></TD>";

                     $ClassificaMA++;

                  }





              //CLASSIFICA MONO classe B

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>MONOFILARE B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              if (NUMEROSTAGES==1){

                  echo "<TH><center><B><font color='#5179bc'>HF_1</font></B></center></TH>";

              }

              else {

                echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaMB=1;

              while ($rowMonoB = mysql_fetch_array($resultMonoB))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaMB ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoB['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoB['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoB['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowMonoB['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowMonoB['Punteggio_' .$i .''] ."</font></TD>";

                     }

                      if (NUMEROSTAGES==1){

                        echo "<TD><font color='#3e3e3e'>" .$rowMonoB['HF_1'] ."</font></TD>";

                     }

                     else {

                        echo "<TD><font color='#3e3e3e'>" .$rowMonoB['TotalePunti'] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowMonoB['Percentuale'] ."</font></TD>";

                     $ClassificaMB++;

                  }

				  

				  











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











