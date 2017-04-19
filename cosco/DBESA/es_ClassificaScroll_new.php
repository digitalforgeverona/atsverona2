<?php



//require_once('class2.php');

//require_once(HEADERF);



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

//else {





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

define("NUMEROSTAGES", $Miarow['NumeroStages']*2);

$MieiPuntiMassimi = array();

global $MieiPuntiMassimi;

$MieiPuntiMassimi = split(",", $Miarow['PuntiMassimi']);

$MieiPuntiMassimi[]=$Miarow['PuntiMassimi'];



$MieiNumeroColpi = array();

global $MieiNumeroColpi;

$MieiNumeroColpi = split(",", $Miarow['NumeroColpi']);

$MieiNumeroColpi[] = $Miarow['NumeroColpi'];



mysql_close($Miaconnection);



//}



//#############################################################



// AGGIUNGE LA TABELLA nomegara_DEF



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



$MioNomeGara = str_replace(' ', '_', NOMEGARA);

$MioNomeGaraDef = "" .$MioNomeGara ."_def";

$NumeroStages = 2;



			   $i=1;

               $ParteTabella = "";

               while($i<=$NumeroStages)

                           {

                           $ParteTabella = "" .$ParteTabella ."

                                           A_" .$i ." DOUBLE,

                                           C_" .$i ." DOUBLE,

                                           D_" .$i ." DOUBLE,

                                           M_" .$i ." DOUBLE,

                                           NS_" .$i ." DOUBLE,

                                           P_" .$i ." DOUBLE,

                                           Tempo_" .$i ." DOUBLE,

                                           HF_" .$i ." DOUBLE,

                                           Punteggio_" .$i ." DOUBLE

                                           ";

                           $i++;

                           if ($i<=$NumeroStages) {

                              $ParteTabella = "" .$ParteTabella .", ";

                           }

                           }

               

			   $QueryDelete = "DROP TABLE IF EXISTS " .$MioNomeGaraDef ."";

			   $resultDelete = mysql_query($QueryDelete)

                       or die ("Errore sulla query di cancellazione tabella: ".mysql_error());

					   

			   $QueryCreate = "CREATE TABLE " .$MioNomeGaraDef ."

                            (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

                        Nome VARCHAR(45) NOT NULL,

                        Cognome VARCHAR(45) NOT NULL,

                        Classe VARCHAR(45) NOT NULL,

                        Squadra VARCHAR(100) NOT NULL,

                        Divisione VARCHAR(45) NOT NULL,

                        TipoProva VARCHAR(45) NOT NULL,

                        Esordiente TINYINT(1),

                        Senior TINYINT(1),

                        Lady TINYINT(1),

                        " .$ParteTabella .",

                        TotalePunti DOUBLE default '0',

                        Percentuale DOUBLE default '0'

                        )";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella: ".mysql_error());

	



// AGGIUNGE TUTTE LE ISCRIZIONI ALLA TABELLA nomegara_DEF



$queryAll = "SELECT * FROM " .$MioNomeGara ." WHERE TipoProva = 'ISCRIZIONE'";



$resultAll = mysql_query($queryAll)

         or die ("Errore sulla query di ricerca tiratore: ".mysql_error());



while ($rowAll = mysql_fetch_array($resultAll)){	



	$queryI = "INSERT INTO " .$MioNomeGaraDef ." (Nome, Cognome, Classe, Squadra,

                          Divisione, TipoProva, Esordiente, Senior, Lady, 

						  A_1, C_1, D_1, M_1, NS_1, P_1, Tempo_1, HF_1, Punteggio_1)

                       VALUES('" .$rowAll['Nome'] ."',

                                 '" .$rowAll['Cognome'] ."',

                                 '" .$rowAll['Classe'] ."',

                                 '" .$rowAll['Squadra'] ."',

                                 '" .$rowAll['Divisione'] ."',

                                 '" .$rowAll['TipoProva'] ."',

                                 '" .$rowAll['Esordiente'] ."',

                                 '" .$rowAll['Senior'] ."',

                                 '" .$rowAll['Lady'] ."',

								 '" .$rowAll['A_1'] ."',

                                 '" .$rowAll['C_1'] ."',

                                 '" .$rowAll['D_1'] ."',

                                 '" .$rowAll['M_1'] ."',

                                 '" .$rowAll['NS_1'] ."',

								 '" .$rowAll['P_1'] ."',

                                 '" .$rowAll['Tempo_1'] ."',

                                 '" .$rowAll['HF_1'] ."',

                                 '" .$rowAll['Punteggio_1'] ."'

								 )";



                $result = mysql_query($queryI)

                       or die ("Errore sulla query di Inserimento: ".mysql_error());

	

	}

// FINE INSERIMENTO ISCRIZIONI



// RICERCA MIGLIORI PRESTAZIONI ED AGGIUNTA ALLA TABELLA nomegara_DEF

$querySemiauto = "SELECT f.ID, f.Cognome, f.Nome, f.Divisione, f.A_1, f.C_1, f.D_1, f.M_1, f.NS_1, f.P_1, f.Tempo_1, f.HF_1, f.Punteggio_1, f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='SEMIAUTO' AND TipoProva='RIENTRO'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

$resultSemiauto = mysql_query($querySemiauto) or die ("Errore sulla query semiauto: ".mysql_error());



$MioNomeGara = str_replace(' ', '_', NOMEGARA);

$MioNomeGaraDef = "" .$MioNomeGara ."_def";



while ($rowSemiauto = mysql_fetch_array($resultSemiauto)){	



	$QueryID = "SELECT ID, Punteggio_1 FROM " .$MioNomeGaraDef ." WHERE Cognome = '" .$rowSemiauto['Cognome'] ."' AND Nome = '" .$rowSemiauto['Nome'] ."' AND Divisione = '" .$rowSemiauto['Divisione'] ."'";



	$ResultID = mysql_query($QueryID)

                       or die ("Errore sulla query di Inserimento: ".mysql_error());

					   

	while ($MiaRowID = mysql_fetch_array($ResultID))

               {

                   $MyID = $MiaRowID['ID'];

				   $MyPunteggio_1 = $MiaRowID['Punteggio_1'];

			   }

	$MyTotalePunti= $rowSemiauto['Punteggio_1'] + $MyPunteggio_1;

	$queryU = "UPDATE " .$MioNomeGaraDef ." SET 

							A_2 = '" .$rowSemiauto['A_1'] ."',

							C_2 = '" .$rowSemiauto['C_1'] ."',

							D_2 = '" .$rowSemiauto['D_1'] ."',

							M_2 = '" .$rowSemiauto['M_1'] ."',

							NS_2 = '" .$rowSemiauto['NS_1'] ."',

							P_2 = '" .$rowSemiauto['P_1'] ."',

							Tempo_2 = '" .$rowSemiauto['Tempo_1'] ."',

							HF_2 = '" .$rowSemiauto['HF_1'] ."',

							Punteggio_2 = '" .$rowSemiauto['Punteggio_1'] ."',

							TotalePunti = '" .$MyTotalePunti ."' 

							WHERE ID = '" .$MyID ."'

							";

                       



                $result = mysql_query($queryU)

                       or die ("Errore sulla query di Inserimento Seconda Prova Semiauto: ".mysql_error());

	

	}









$queryRevolver = "SELECT f.ID, f.Cognome, f.Nome, f.Divisione, f.A_1, f.C_1, f.D_1, f.M_1, f.NS_1, f.P_1, f.Tempo_1, f.HF_1, f.Punteggio_1, f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ."

                             WHERE Divisione='REVOLVER' AND TipoProva='RIENTRO'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

$resultRevolver = mysql_query($queryRevolver);



$MioNomeGara = str_replace(' ', '_', NOMEGARA);

$MioNomeGaraDef = "" .$MioNomeGara ."_def";

while ($rowRevolver = mysql_fetch_array($resultRevolver)){	

	

	$QueryID = "SELECT ID, Punteggio_1 FROM " .$MioNomeGaraDef ." WHERE Cognome = '" .$rowRevolver['Cognome'] ."' AND Nome = '" .$rowRevolver['Nome'] ."' AND Divisione = '" .$rowRevolver['Divisione'] ."'";

	$ResultID = mysql_query($QueryID)

                       or die ("Errore sulla query di Inserimento: ".mysql_error());

					   

	while ($MiaRowID = mysql_fetch_array($ResultID))

               {

                   $MyID = $MiaRowID['ID'];

				   $MyPunteggio_1 = $MiaRowID['Punteggio_1'];

			   }

	$MyTotalePunti= $rowRevolver['Punteggio_1'] + $MyPunteggio_1;

	$queryUR = "UPDATE " .$MioNomeGaraDef ." SET 

							A_2 = '" .$rowRevolver['A_1'] ."',

							C_2 = '" .$rowRevolver['C_1'] ."',

							D_2 = '" .$rowRevolver['D_1'] ."',

							M_2 = '" .$rowRevolver['M_1'] ."',

							NS_2 = '" .$rowRevolver['NS_1'] ."',

							P_2 = '" .$rowRevolver['P_1'] ."',

							Tempo_2 = '" .$rowRevolver['Tempo_1'] ."',

							HF_2 = '" .$rowRevolver['HF_1'] ."',

							Punteggio_2 = '" .$rowRevolver['Punteggio_1'] ."',

							TotalePunti = '" .$MyTotalePunti ."'

							WHERE ID = '" .$MyID ."'

							";

                       



                $result = mysql_query($queryUR)

                       or die ("Errore sulla query di Inserimento: ".mysql_error());

	

	}





// FINE RICERCA MIGLIORI PRESTAZIONI ED AGGIUNTA ALLA TABELLA nomegara_DEF



// CALCOLO PERCENTUALE



// SEMIAUTO



		  $MioNomeGara = str_replace(' ', '_', NOMEGARA);

		  $MioNomeGaraDef = "" .$MioNomeGara ."_def";

		  $QuerySelectAll = "SELECT * FROM " .$MioNomeGaraDef ." WHERE Divisione='SEMIAUTO'";

		  

          $QueryMaxPunti = "SELECT MAX(TotalePunti) FROM " .$MioNomeGaraDef ." WHERE Divisione='SEMIAUTO'";

          $resultMaxPunti = mysql_query($QueryMaxPunti)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          $rowMaxPunti = mysql_fetch_array($resultMaxPunti) or die(mysql_error());

          $MaxPunti = $rowMaxPunti['MAX(TotalePunti)'];

          $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          while ($rowAll = mysql_fetch_array($ResultAll)){

                    $MioTotalePunti = $rowAll['TotalePunti'];

                    $ID = $rowAll['ID'];

                    $MioPercento = $MioTotalePunti * 100 / $MaxPunti;

                    $MioPercentoOK = round($MioPercento, 4);

                    $queryUpPercentuale = "UPDATE " .$MioNomeGaraDef ."

                            SET Percentuale = '" .str_replace(',', '.', $MioPercentoOK) ."'

                            WHERE ID = '" .$ID ."'";

                    $resultPercentuale = mysql_query($queryUpPercentuale)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          }

		  

// REVOLVER



		  $MioNomeGara = str_replace(' ', '_', NOMEGARA);

		  $MioNomeGaraDef = "" .$MioNomeGara ."_def";

		  $QuerySelectAll = "SELECT * FROM " .$MioNomeGaraDef ." WHERE Divisione='REVOLVER'";

		  

          $QueryMaxPunti = "SELECT MAX(TotalePunti) FROM " .$MioNomeGaraDef ." WHERE Divisione='REVOLVER'";

          $resultMaxPunti = mysql_query($QueryMaxPunti)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          $rowMaxPunti = mysql_fetch_array($resultMaxPunti) or die(mysql_error());

          $MaxPunti = $rowMaxPunti['MAX(TotalePunti)'];

          $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          while ($rowAll = mysql_fetch_array($ResultAll)){

                    $MioTotalePunti = $rowAll['TotalePunti'];

                    $ID = $rowAll['ID'];

                    $MioPercento = $MioTotalePunti * 100 / $MaxPunti;

                    $MioPercentoOK = round($MioPercento, 4);

                    $queryUpPercentuale = "UPDATE " .$MioNomeGaraDef ."

                            SET Percentuale = '" .str_replace(',', '.', $MioPercentoOK) ."'

                            WHERE ID = '" .$ID ."'";

                    $resultPercentuale = mysql_query($queryUpPercentuale)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          }



// FINE CALCOLO PERCENTUALE





$MiaData = date('d/m/Y - G:i:s');

$NumeroSpan = 6 + (2*NUMEROSTAGES*2);

$NumeroStages = 2;



            for ($Sel=1; $Sel <= $NumeroStages; $Sel++){

                  $MioSelect = "" .$MioSelect ." Tempo_" .$Sel .", Punteggio_" .$Sel .",";

              }

                $MioSelectPunti = "TotalePunti";

                $MioSelectPuntiDef = "f.TotalePunti";

            

         if ($MyCmd == 'definitiva'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='SEMIAUTO' AND Classe='A'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

              

              $querySemiautoB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='SEMIAUTO' AND Classe='B'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";





              $resultSemiautoA = mysql_query($querySemiautoA) or die ("Errore sulla query semiauto: ".mysql_error());

              $resultSemiautoB = mysql_query($querySemiautoB) or die ("Errore sulla query semiauto: ".mysql_error());

              

              $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='REVOLVER' AND Classe='A'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

                             

              $queryRevolverB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='REVOLVER' AND Classe='B'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

              $resultRevolverB = mysql_query($queryRevolverB);

              

              }





if ($MyCmd == 'esordienti'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiautoB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='SEMIAUTO' AND Esordiente='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

              

              





              $resultSemiautoB = mysql_query($querySemiautoB) or die ("Errore sulla query semiauto: ".mysql_error());

              

              

              $queryRevolverB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='REVOLVER' AND Esordiente='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

                             

              



              $resultRevolverB = mysql_query($queryRevolverB);

              

              

              }





         if ($MyCmd == 'senior'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiautoA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='SEMIAUTO' AND Classe='A' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

              

              $querySemiautoB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='SEMIAUTO' AND Classe='B' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";





              $resultSemiautoA = mysql_query($querySemiautoA) or die ("Errore sulla query semiauto: ".mysql_error());

              $resultSemiautoB = mysql_query($querySemiautoB) or die ("Errore sulla query semiauto: ".mysql_error());

              

              $queryRevolverA = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='REVOLVER' AND Classe='A' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";

                             

              $queryRevolverB = "SELECT f.ID, f.Cognome, f.Nome, " .$MioSelect ." f.TotalePunti, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGaraDef ."

                             WHERE Divisione='REVOLVER' AND Classe='B' AND Senior='1'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGaraDef ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             ORDER BY f.TotalePunti DESC";



              $resultRevolverA = mysql_query($queryRevolverA);

              $resultRevolverB = mysql_query($queryRevolverB);

              

              }

         

         

//INIZIO PARTE STAMPA

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



               

			   $Posizione = 1;

               while($dataR[] = mysql_fetch_assoc($resultRevolverA)) {}

                        if (count($dataR)>=1){

                             for ($outindex = 0; $outindex < count($dataR) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataR[$outindex]['ID'] = "" .$Posizione ."";

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

                        

               

			   



        $pdf->ezText('ESAGONALE - ' .NOMEGARA .'' ,20);

        $pdf->ezText('' .$MiaData .'',14);

        $pdf->ezText(' ',14);

        $pdf->ezText('CLASSIFICA: ' .$MyCmd .'',14);

        $pdf->ezTable($data,'','SEMIAUTO', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        $pdf->ezText(' ',50);

        $pdf->ezTable($dataB,'','SEMIAUTO B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        $pdf->ezText(' ',50);

        $pdf->ezTable($dataR,'','REVOLVER', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        $pdf->ezText(' ',50);

        $pdf->ezTable($dataRB,'','REVOLVER B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));





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





echo "<script language='javascript'>

i = 0

var speed = 2

function scroll() {

i = i + speed

var div = document.getElementById('news')

div.scrollTop = i

if (i > div.scrollHeight - 160) {i = 0}

t1=setTimeout('scroll()',100)

}

</script>";



echo "<script type='text/JavaScript'>

function timedRefresh(timeoutPeriod) {

	setTimeout('location.reload(true);',timeoutPeriod);

}

</script>";			  

			  

			  $tra_venti_minuti = date("H:i",mktime(date("H"),date("i")+5));



			  echo "<center><B>AGGIORNATO ALLE: " .$MiaData2 ."<BR>

			  					PROSSIMO AGGIORNAMENTO: " .$tra_venti_minuti ."</center></B>";

			  echo "<div class='miocentro' id='news'>";





//NON STAMPA MA MOSTRA A VIDEO



              //echo "<div class='miocentro'>";

              

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

			  

			  echo "<font color='#70A401'>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA A

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";



              for ($i=1; $i<=$NumeroStages; $i++){

                  echo "<TH><center><B><font color='#70A401'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";

              }

              

                echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";

              

              echo "<TH><center><B><font color='#70A401'>Percentuale</font></B></center></TH>";

              echo "</TR>";



           $ClassificaA=0;

			  $PercentualeBefore=0;

              while ($rowSemi = mysql_fetch_array($resultSemiautoA))

                  {

                     if ($PercentualeBefore != $rowSemi['Percentuale']){

					 	$ClassificaA++;

					 }

					 echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['ID'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Nome'] ."</font></TD>";

                     for ($i=1; $i<=2; $i++){

                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     

                        echo "<TD><font color='#FFFFFF'>" .$rowSemi['TotalePunti'] ."</font></TD>";

                     

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Percentuale'] ."</font></TD>";

                     

					 

					 $PercentualeBefore = $rowSemi['Percentuale'];

                  }





                  echo "</TABLE>";





//CLASSIFICA AUTOMATICA B



              //echo "<div class='miocentro'>";

              echo "<font color='#70A401'>";

              echo "<center><B></B><BR><BR><BR></center>";

              echo "<TABLE BORDER='1'>";

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";



              for ($i=1; $i<=$NumeroStages; $i++){

                  echo "<TH><center><B><font color='#70A401'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";

              }

              

                echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";

              

              echo "<TH><center><B><font color='#70A401'>Percentuale</font></B></center></TH>";

              echo "</TR>";



           $ClassificaB=0;

			  $PercentualeBefore=0;

              while ($rowSemi = mysql_fetch_array($resultSemiautoB))

                  {

                     if ($PercentualeBefore != $rowSemi['Percentuale']){

					 	$ClassificaB++;

					 }

					 echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaB ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['ID'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Nome'] ."</font></TD>";

                     for ($i=1; $i<=2; $i++){

                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#FFFFFF'>" .$rowSemi['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     

                        echo "<TD><font color='#FFFFFF'>" .$rowSemi['TotalePunti'] ."</font></TD>";

                     

                     echo "<TD><font color='#FFFFFF'>" .$rowSemi['Percentuale'] ."</font></TD>";

                     

					 

					 $PercentualeBefore = $rowSemi['Percentuale'];

                  }





                  echo "</TABLE>";











             // CLASSIFICA REVOLVER

              echo "<BR><BR><BR>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA REVOLVER

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";



              for ($i=1; $i<=2; $i++){

                  echo "<TH><center><B><font color='#70A401'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";

              }

              

                echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";

              

              echo "<TH><center><B><font color='#70A401'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaR=0;

			  $PercentualeBefore=0;

              while ($rowRev = mysql_fetch_array($resultRevolverA))

                  {

                     if ($PercentualeBefore != $rowRev['Percentuale']){

					 	$ClassificaR++;

					 }

					 echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaR ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['ID'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Nome'] ."</font></TD>";

                     for ($i=1; $i<=2; $i++){

                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     

                        echo "<TD><font color='#FFFFFF'>" .$rowRev['TotalePunti'] ."</font></TD>";

                     

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Percentuale'] ."</font></TD>";

                     $PercentualeBefore = $rowRev['Percentuale'];

                  }



              echo "</TABLE>";

              

// CLASSIFICA REVOLVER B

              echo "<BR><BR><BR>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA REVOLVER

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#70A401'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";



              for ($i=1; $i<=2; $i++){

                  echo "<TH><center><B><font color='#70A401'>Tempo " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#70A401'>Punti " .$i ."</font></B></center></TH>";

              }

              

                echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";

              

              echo "<TH><center><B><font color='#70A401'>Percentuale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaRB=0;

			  $PercentualeBeforeB=0;

              while ($rowRev = mysql_fetch_array($resultRevolverB))

                  {

                     if ($PercentualeBeforeB != $rowRev['Percentuale']){

					 	$ClassificaRB++;

					 }

					 echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaRB ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['ID'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Nome'] ."</font></TD>";

                     for ($i=1; $i<=2; $i++){

                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#FFFFFF'>" .$rowRev['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     

                        echo "<TD><font color='#FFFFFF'>" .$rowRev['TotalePunti'] ."</font></TD>";

                     

                     echo "<TD><font color='#FFFFFF'>" .$rowRev['Percentuale'] ."</font></TD>";

                     $PercentualeBeforeB = $rowRev['Percentuale'];

                  }



              echo "</TABLE>";

			  

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

			  

			  echo "</DIV>";              

              

              echo "<BR><BR>";



              echo "<center><B><a href=./es_Classifica_New.php?print=Y&cmd=" .$MyCmd .">

                    CREA STAMPA PDF

               <img src='./e107_plugins/pdf/images/pdf_16.png' width='16' height='16' border='2' alt='Crea PDF' />

               </a>";



              echo "<BR><BR>";





	}



echo "<CENTER><IMG SRC='esagonale.png' ALT='picture of a pumpkin' HEIGHT=10 WIDTH=10 onLoad='scroll()'>";

echo "<IMG SRC='esagonale.png' ALT='picture of a pumpkin' HEIGHT=10 WIDTH=10 onLoad='timedRefresh(300000)'></CENTER>";

			   

			   

			   /*echo "<SCRIPT LANGUAGE='javascript'>function jumpScroll() {

    	              window.scroll(0,50);

                      scrolldelay = setTimeout('jumpScroll()'," .$MyCounter .");}</SCRIPT>";



               echo "<SCRIPT LANGUAGE='javascript'>{

    	              window.scroll(0,50);

                      scrolldelay = setTimeout('jumpScroll()'," .$MyCounter .");}</SCRIPT>";

*/



echo "<script language='javascript'>

i = 0

var speed = 2

function scroll() {

i = i + speed

var div = document.getElementById('news')

div.scrollTop = i

if (i > div.scrollHeight - 160) {i = 0}

t1=setTimeout('scroll()',100)

}

</script>";	







require_once(FOOTERF);





mysql_close($connection);



?>











