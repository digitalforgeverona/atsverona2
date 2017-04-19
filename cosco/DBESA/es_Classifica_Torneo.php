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



//QUERY GENERALE PUNTEGGIO TOTALE





$queryPuntiSingolo = "SELECT MT.ID, MT.Cognome, MT.Nome, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM CLASSIFICA_CHIUSA_SEMIAUTO_DEF as MT

					WHERE Classe='A'

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GareConsiderate DESC, GT DESC";

$queryPuntiSingoloB = "SELECT MT.ID, MT.Cognome, MT.Nome, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM CLASSIFICA_CHIUSA_SEMIAUTO_DEF as MT

					WHERE Classe='B'

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GareConsiderate DESC, GT DESC";

$queryPuntiSingoloR = "SELECT MT.ID, MT.Cognome, MT.Nome, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM CLASSIFICA_CHIUSA_REVOLVER_DEF as MT

					WHERE Classe='A'

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GareConsiderate DESC, GT DESC";

$queryPuntiSingoloRB = "SELECT MT.ID, MT.Cognome, MT.Nome, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM CLASSIFICA_CHIUSA_REVOLVER_DEF as MT

					WHERE Classe='B'

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GareConsiderate DESC, GT DESC";





$resultPuntiSingolo = mysql_query($queryPuntiSingolo)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());

					   

$resultPuntiSingoloB = mysql_query($queryPuntiSingoloB)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());

					   

$resultPuntiSingoloR = mysql_query($queryPuntiSingoloR)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());

					   

$resultPuntiSingoloRB = mysql_query($queryPuntiSingoloRB)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());









//********************************************************

// INIZIO PARTE STAMPA

//********************************************************





if ($MyPrint == 'Y'){



    $data = array();

    $dataR = array();

    $dataB = array();

    $dataRB = array();



               $Posizione = 1;

               while($data[] = mysql_fetch_assoc($resultPuntiSingolo)) {}

                       

                        if (count($data)>=1){

                             for ($outindex = 0; $outindex < count($data) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $data[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

						

						

				$Posizione = 1;

               while($dataB[] = mysql_fetch_assoc($resultPuntiSingoloB)) {}

                       

                        if (count($dataB)>=1){

                             for ($outindex = 0; $outindex < count($dataB) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataB[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

						



               $Posizione = 1;

               while($dataR[] = mysql_fetch_assoc($resultPuntiSingoloR)) {}

                        if (count($dataR)>=1){

                             for ($outindex = 0; $outindex < count($dataR) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataR[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

						

						

				$Posizione = 1;

               while($dataRB[] = mysql_fetch_assoc($resultPuntiSingoloRB)) {}

                        if (count($dataRB)>=1){

                             for ($outindex = 0; $outindex < count($dataRB) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $dataRB[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

						

						

		//echo "OK";				

        //exit;       

        

        $pdf->ezText('ESAGONALE - 2015' ,20);

        $pdf->ezText('' .$MiaData .'',14);

        $pdf->ezText(' ',14);

        $pdf->ezText('CLASSIFICA: FINALE',14);

        $pdf->ezTable($data,'','SEMIAUTO A', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        

	    $pdf->ezText(' ',50);

        $pdf->ezTable($dataB,'','SEMIAUTO B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

	    

        $pdf->ezText(' ',50);

        $pdf->ezTable($dataR,'','REVOLVER A', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

		

		$pdf->ezText(' ',50);

        $pdf->ezTable($dataRB,'','REVOLVER B', array('xPos'=>50,'xOrientation'=>'right','width'=>750));

        

        $pdf->stream();

        mysql_close($connection);

        exit;

        }

        







//**************** FINE STAMPA ***************************



				

				$NumeroSpan=8;

				

				echo "<br><br>";

				echo "<div class='miocentro'>";

              echo "<font color='#5179bc'>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($row = mysql_fetch_array($resultPuntiSingolo))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Nome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['GT'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$row['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Senior'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Lady'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$row['GareConsiderate'] ."</font></TD>";

					 echo "</TR>";

					 $ClassificaA++;

  					}

  					echo "<TR>";

              		echo "<TH COLSPAN=" .$NumeroSpan ."><B><center><a href=./es_mySQL_to_excel.php?Tabella=CLASSIFICA_CHIUSA_SEMIAUTO_DEF&Classe=A&Divisione=SEMIAUTO>

					ESPORTA IN EXCEL  <img src='./e107_images/icons/excel.png' width='16' height='16' border='2' alt='Crea EXCEL' /></a></center></B></TH>

					";

              		echo "</TR>";

              		echo "<TR>";

  					echo "</TABLE>";

					

					

   



				echo "<br><br>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($row = mysql_fetch_array($resultPuntiSingoloB))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Nome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['GT'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$row['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Senior'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$row['Lady'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$row['GareConsiderate'] ."</font></TD>";

					 echo "</TR>";

					 $ClassificaA++;

  					}

  					echo "<TR>";

              		echo "<TH COLSPAN=" .$NumeroSpan ."><B><center><a href=./es_mySQL_to_excel.php?Tabella=CLASSIFICA_CHIUSA_SEMIAUTO_DEF&Classe=B&Divisione=SEMIAUTO>

					ESPORTA IN EXCEL  <img src='./e107_images/icons/excel.png' width='16' height='16' border='2' alt='Crea EXCEL' /></a></center></B></TH>

					";

              		echo "</TR>";

              		echo "<TR>";

  					echo "</TABLE>";

					

//**************************************************************************************************************					

					

					   

			// CLASSIFICA REVOLVER

              echo "<BR><BR><BR>";

              echo "<TABLE BORDER='1'>";

			  

			  echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($rowR = mysql_fetch_array($resultPuntiSingoloR))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowR['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowR['Nome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowR['GT'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$rowR['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowR['Senior'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowR['Lady'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$rowR['GareConsiderate'] ."</font></TD>";

					 echo "</TR>";

					 $ClassificaA++;

  					}

  					echo "<TR>";

              		echo "<TH COLSPAN=" .$NumeroSpan ."><B><center><a href=./es_mySQL_to_excel.php?Tabella=CLASSIFICA_CHIUSA_REVOLVER_DEF&Classe=A&Divisione=REVOLVER>

					ESPORTA IN EXCEL  <img src='./e107_images/icons/excel.png' width='16' height='16' border='2' alt='Crea EXCEL' /></a></center></B></TH>

					";

              		echo "</TR>";

              		echo "<TR>";

  					echo "</TABLE>";

              echo "<BR><BR>";

			  

			  // CLASSIFICA REVOLVER

              echo "<BR><BR><BR>";

              echo "<TABLE BORDER='1'>";

			  

			  echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>REVOLVER B</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#5179bc'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($rowRB = mysql_fetch_array($resultPuntiSingoloRB))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRB['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRB['Nome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRB['GT'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$rowRB['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRB['Senior'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRB['Lady'] ."</font></TD>";

					 echo "<TD><font color='#3e3e3e'>" .$rowRB['GareConsiderate'] ."</font></TD>";

					 echo "</TR>";

					 $ClassificaA++;

  					}

  					echo "<TR>";

              		echo "<TH COLSPAN=" .$NumeroSpan ."><B><center><a href=./es_mySQL_to_excel.php?Tabella=CLASSIFICA_CHIUSA_REVOLVER_DEF&Classe=B&Divisione=REVOLVER>

					ESPORTA IN EXCEL  <img src='./e107_images/icons/excel.png' width='16' height='16' border='2' alt='Crea EXCEL' /></a></center></B></TH>

					";

              		echo "</TR>";

              		echo "<TR>";

  					echo "</TABLE></DIV>";

					echo "<BR><BR>";



              echo "<center><B><a href=./es_Chiudi_Classifica.php?print=Y&cmd=>

                    CREA STAMPA PDF

               <img src='./e107_plugins/pdf/images/pdf_16.png' width='16' height='16' border='2' alt='Crea PDF' />

               </a>";



              echo "<BR><BR>";

			  

			  

			  



	



require_once(FOOTERF);





mysql_close($connection);



?>