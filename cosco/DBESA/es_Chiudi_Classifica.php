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







if ($MyPrint !== 'Y'){



/********************************************

CREAZIONE DELLA TABELLA CLASSIFICA DEFINITIVA

*********************************************/



			$QueryDrop = "DROP TABLE IF EXISTS CLASSIFICA_CHIUSA_SEMIAUTO";

				$ResultDrop = mysql_query($QueryDrop) or die ("Errore sulla query DROP SEMIAUTO: ".mysql_error());



			 $QueryCreate = "CREATE TABLE CLASSIFICA_CHIUSA_SEMIAUTO

                            (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

                        Cognome VARCHAR(45) NOT NULL,

                        Nome VARCHAR(45) NOT NULL,

                        Classe VARCHAR(45) NOT NULL,

                        Esordiente TINYINT(1),

                        Senior TINYINT(1),

                        Lady TINYINT(1),

						Percentuale DOUBLE,

                        Bonus TINYINT(1)

						)";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella SEMIAUTO: ".mysql_error());

				

				

				$QueryDrop = "DROP TABLE IF EXISTS CLASSIFICA_CHIUSA_SEMIAUTO_DEF";

				$ResultDrop = mysql_query($QueryDrop) or die ("Errore sulla query DROP SEMIAUTO: ".mysql_error());



			 $QueryCreate = "CREATE TABLE CLASSIFICA_CHIUSA_SEMIAUTO_DEF

                            (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

                        Cognome VARCHAR(45) NOT NULL,

                        Nome VARCHAR(45) NOT NULL,

                        Classe VARCHAR(45) NOT NULL,

                        Esordiente TINYINT(1),

                        Senior TINYINT(1),

                        Lady TINYINT(1),

						Percentuale DOUBLE,

                        Contatore VARCHAR(45)

						)";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella SEMIAUTO: ".mysql_error());

				

					   

				$QueryDrop = "DROP TABLE IF EXISTS CLASSIFICA_CHIUSA_REVOLVER";

				$ResultDrop = mysql_query($QueryDrop) or die ("Errore sulla query DROP REVOLVER: ".mysql_error());



			 $QueryCreate = "CREATE TABLE CLASSIFICA_CHIUSA_REVOLVER

                            (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

                        Cognome VARCHAR(45) NOT NULL,

                        Nome VARCHAR(45) NOT NULL,

                        Classe VARCHAR(45) NOT NULL,

                        Esordiente TINYINT(1),

                        Senior TINYINT(1),

                        Lady TINYINT(1),

                        Percentuale DOUBLE

                        )";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella REVOLVER: ".mysql_error());

					   

					   

					   

				$QueryDrop = "DROP TABLE IF EXISTS CLASSIFICA_CHIUSA_REVOLVER_DEF";

				$ResultDrop = mysql_query($QueryDrop) or die ("Errore sulla query DROP REVOLVER: ".mysql_error());



			 $QueryCreate = "CREATE TABLE CLASSIFICA_CHIUSA_REVOLVER_DEF

                            (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

                        Cognome VARCHAR(45) NOT NULL,

                        Nome VARCHAR(45) NOT NULL,

                        Classe VARCHAR(45) NOT NULL,

                        Esordiente TINYINT(1),

                        Senior TINYINT(1),

                        Lady TINYINT(1),

                        Percentuale DOUBLE,

                        Contatore VARCHAR(45)

                        )";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella REVOLVER: ".mysql_error());

					   

					   

					   

					   

/***********************

FINE CREAZIONE TABELLA

***********************/

			//echo "<br><br>";

			//echo "<center>- = GARE ELABORATE = - <br><br>";

			

			$AnnoRiferimento = $_REQUEST['Anno_Riferimento'];

			

			//$AnnoRiferimento = '2015';

			

			$query = 'SELECT NomeGara FROM gare WHERE NomeGara LIKE "' .$AnnoRiferimento .'%"';

            $result = mysql_query($query)

                       or die ("Errore sulla query LIST: ".mysql_error());

			while ($row = mysql_fetch_array($result))

               {

                   $NomeGara = $row['NomeGara'];

			

			$pos = strpos(strtoupper($NomeGara),"BONUS");

			$pos2 = strpos(strtoupper($NomeGara),"BASE");







			if($pos === false) {

				

				if ($pos2 === false) {

			

			//echo "" .$NomeGara ."<BR>";

				

              $MioNomeGara = str_replace(' ', '_', $NomeGara);

			  

			  //echo "Nome Gara: " .$MioNomeGara ."_def<br>";

			  

              $querySemiautoInsert = "INSERT INTO CLASSIFICA_CHIUSA_SEMIAUTO (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale)

			  				 SELECT f.Cognome, f.Nome, f.Classe, f.Esordiente, f.Senior, f.Lady, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, Classe, Esordiente, Senior, Lady, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ." 

                             WHERE Divisione='SEMIAUTO'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             GROUP BY Cognome, Nome

							 ORDER BY f.TotalePunti DESC";

			//echo "QUERY: " .$querySemiautoInsert ."<BR>";				 

              $ResultSemiautoInsert = mysql_query($querySemiautoInsert) or die ("Errore sulla query semiauto: ".mysql_error());

              

			  $queryRevolverInsert = "INSERT INTO CLASSIFICA_CHIUSA_REVOLVER (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale)

			  				 SELECT f.Cognome, f.Nome, f.Classe, f.Esordiente, f.Senior, f.Lady, f.Percentuale

                             FROM (

                             SELECT ID, Cognome, Nome, Classe, Esordiente, Senior, Lady, MAX(TotalePunti) as maxpunti

                             FROM " .$MioNomeGara ." 

                             WHERE Divisione='REVOLVER'

                             GROUP BY Cognome, Nome)

                             AS x inner join " .$MioNomeGara ." AS f

                             on f.Nome=x.Nome and f.Cognome=x.Cognome and f.TotalePunti=x.maxpunti

                             GROUP BY Cognome, Nome

							 ORDER BY f.TotalePunti DESC";

							 

              $ResultRevolverInsert = mysql_query($queryRevolverInsert) or die ("Errore sulla query REVOLVER: ".mysql_error());

			 

				}

			}

		}





//exit;

			   

/********************************************

CALCOLO DEI PUNTEGGI

********************************************/

			  

$queryPuntiSingolo = "INSERT INTO CLASSIFICA_CHIUSA_SEMIAUTO_DEF (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale, Contatore)

					SELECT * FROM

          			(SELECT MT.Cognome, MT.Nome, MT.Classe, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM(

					SELECT t1.id, t1.Cognome, t1.Nome, t1.Classe, t1.Esordiente, t1.Senior, t1.Lady, t1.Percentuale, COUNT(*) as Contatore

					FROM (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_SEMIAUTO ORDER BY Cognome, Nome, Percentuale DESC) AS t1

					JOIN (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_SEMIAUTO ORDER BY Cognome, Nome, Percentuale DESC) AS t2

					ON t1.Cognome=t2.Cognome AND t1.Nome=t2.Nome AND t1.Percentuale <= t2.Percentuale

					WHERE t1.Classe='A'

					GROUP BY t1.id

					ORDER BY Cognome, Nome, Percentuale ) AS MT

					WHERE MT.Contatore <=4

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GT DESC) AS MTT

					ORDER BY MTT.GareConsiderate DESC, MTT.GT DESC";

					  

$queryPuntiSingoloB = "INSERT INTO CLASSIFICA_CHIUSA_SEMIAUTO_DEF (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale, Contatore)

					SELECT * FROM

          			(SELECT MT.Cognome, MT.Nome, MT.Classe, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM(

					SELECT t1.id, t1.Cognome, t1.Nome, t1.Classe, t1.Esordiente, t1.Senior, t1.Lady, t1.Percentuale, COUNT(*) as Contatore

					FROM (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_SEMIAUTO ORDER BY Cognome, Nome, Percentuale DESC) AS t1

					JOIN (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_SEMIAUTO ORDER BY Cognome, Nome, Percentuale DESC) AS t2

					ON t1.Cognome=t2.Cognome AND t1.Nome=t2.Nome AND t1.Percentuale <= t2.Percentuale

					WHERE t1.Classe='B'

					GROUP BY t1.id

					ORDER BY Cognome, Nome, Percentuale ) AS MT

					WHERE MT.Contatore <=4

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GT DESC) AS MTT

					ORDER BY MTT.GareConsiderate DESC, MTT.GT DESC";



  

  $resultPuntiSingolo = mysql_query($queryPuntiSingolo)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());

					   

  $resultPuntiSingoloB = mysql_query($queryPuntiSingoloB)

                       or die ("Errore sulla query 2 di calcolo ".mysql_error());  

						

						$Cognome = "";

						$num = 1;



  	$queryPuntiSingoloR = "INSERT INTO CLASSIFICA_CHIUSA_REVOLVER_DEF (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale, Contatore)

					SELECT * FROM

          			(SELECT MT.Cognome, MT.Nome, MT.Classe, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM(

					SELECT t1.id, t1.Cognome, t1.Nome, t1.Classe, t1.Esordiente, t1.Senior, t1.Lady, t1.Percentuale, COUNT(*) as Contatore

					FROM (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_REVOLVER ORDER BY Cognome, Nome, Percentuale DESC) AS t1

					JOIN (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_REVOLVER ORDER BY Cognome, Nome, Percentuale DESC) AS t2

					ON t1.Cognome=t2.Cognome AND t1.Nome=t2.Nome AND t1.Percentuale <= t2.Percentuale

					WHERE t1.Classe='A'

					GROUP BY t1.id

					ORDER BY Cognome, Nome, Percentuale ) AS MT

					WHERE MT.Contatore <=4

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GT DESC) AS MTT

					ORDER BY MTT.GareConsiderate DESC, MTT.GT DESC";

					  

$queryPuntiSingoloRB = "INSERT INTO CLASSIFICA_CHIUSA_REVOLVER_DEF (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale, Contatore)

					SELECT * FROM

          			(SELECT MT.Cognome, MT.Nome, MT.Classe, MT.Esordiente, MT.Senior, MT.Lady, SUM(MT.Percentuale) as GT, MT.Contatore AS GareConsiderate

					FROM(

					SELECT t1.id, t1.Cognome, t1.Nome, t1.Classe, t1.Esordiente, t1.Senior, t1.Lady, t1.Percentuale, COUNT(*) as Contatore

					FROM (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_REVOLVER ORDER BY Cognome, Nome, Percentuale DESC) AS t1

					JOIN (SELECT * FROM atsveron_dbesa.CLASSIFICA_CHIUSA_REVOLVER ORDER BY Cognome, Nome, Percentuale DESC) AS t2

					ON t1.Cognome=t2.Cognome AND t1.Nome=t2.Nome AND t1.Percentuale <= t2.Percentuale

					WHERE t1.Classe='B'

					GROUP BY t1.id

					ORDER BY Cognome, Nome, Percentuale ) AS MT

					WHERE MT.Contatore <=4

					GROUP BY MT.Cognome, MT.Nome

					ORDER BY GT DESC) AS MTT

					ORDER BY MTT.GareConsiderate DESC, MTT.GT DESC";

	

	

		

	

  $resultPuntiSingoloR = mysql_query($queryPuntiSingoloR)

                       or die ("Errore sulla query 3 di calcolo ".mysql_error());

					   

  $resultPuntiSingoloRB = mysql_query($queryPuntiSingoloRB)

                       or die ("Errore sulla query 4 di calcolo ".mysql_error());





/********************************************

	AGGIUNTA PUNTI GARE BONUS

********************************************/



//SELEZIONE GARE



$NGR = $_POST['NG'];

$MyBonus = array();

$MyPunti = array();

while($MNG<=$NGR){

$MyBonus[$MNG] = $_POST['Gara_' .$MNG .""];

$MyPunti[$MNG] = $_POST['Punti_' .$MNG .""];

$MNG = $MNG+1;

}

$bar = implode('', $MyBonus); 

if (empty($bar)) {

    echo "<CENTER><BR><BR>";

	echo "SELEZIONARE LA O LE GARE BONUS E SCRIVERE<BR>IL VALORE DEI PUNTI PER OGNI GARA BONUS<BR><BR>NEL CASO IN CUI NON CI SIANO GARE BONUS E' NECESSARIO SELEZIONARE<BR>

	UNA GARA QUALSIASI E METTERE 0 (ZERO) COME PUNTI<BR><BR>";

	$query = "SELECT * FROM gare";

            $result = mysql_query($query)

                       or die ("Errore sulla query LIST: ".mysql_error());

            echo "<BR>";

            echo "<center>";

			echo "<FORM METHOD='POST' ACTION='es_Chiudi_Classifica.php'>";

            echo "<TABLE BORDER='1'>";

			echo "<TH COLSPAN=3><B>ELENCO GARE INSERITE</B></TH>";

            echo "<TR>";

            echo "<TH><center><B>NOME GARA</B></center></TH>";

            echo "<TH><center><B>SELEZIONA</B></center></TH>";

			echo "<TH><center><B>PUNTI</B></center></TH>";

			echo "</TR>";

            //echo "</TABLE>";

			$ng = 0;

			while ($row = mysql_fetch_array($result))

               {

                   $NomeGara = $row['NomeGara'];

            echo "<TR>";

            echo "<TD style='width:150px;'>" .$NomeGara ."</TD>";

            echo "<TD style='width:30px;'><center><input type='checkbox' name='Gara_" .$ng ."' value='" .$NomeGara ."'></center></TD>";

			echo "<TD style='width:5px;'><center><input type='TEXT' size='3' name='Punti_" .$ng ."'></center></TD>";

            echo "</TR>";

			$ng = $ng+1;

               }

			echo "<input type='HIDDEN' name='NG' value='" .$ng ."'>";

			

			echo "<TR><TD COLSPAN=3><center><input type='TEXT' size='3' name='Anno_Riferimento'></TD></TR>";

			echo "<TR><TD COLSPAN=3><center><input type='submit' value='CONTINUA >'</TD></TR>";

			echo "</TABLE>";

			echo "</FORM>";   

            echo "<BR>";

            echo "<BR>";			

			require_once(FOOTERF);

			mysql_close($connection);

			exit;	

}



// INSERIMENTO DEI PUNTI AI TIRATORI



			  while (list($key, $NomeGara) = each($MyBonus)) {



			  $MioNomeGara = str_replace(' ', '_', $NomeGara);

			  $MioPuntiGara = $MyPunti[$key];

              if ($MioNomeGara){

			  $querySemiautoInsert = "INSERT INTO CLASSIFICA_CHIUSA_SEMIAUTO_DEF (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale)

			  				 SELECT f.Cognome, f.Nome, f.Classe, f.Esordiente, f.Senior, f.Lady, " .$MioPuntiGara ."

                             FROM " .$MioNomeGara ." AS f

                             WHERE Divisione='SEMIAUTO'

                             GROUP BY Cognome, Nome";

							 

			  $queryRevolverInsert = "INSERT INTO CLASSIFICA_CHIUSA_REVOLVER_DEF (Cognome, Nome, Classe, Esordiente, Senior, Lady, Percentuale)

			  				 SELECT f.Cognome, f.Nome, f.Classe, f.Esordiente, f.Senior, f.Lady, " .$MioPuntiGara ."

                             FROM " .$MioNomeGara ." AS f

                             WHERE Divisione='REVOLVER'

                             GROUP BY Cognome, Nome";

							 

			  //echo "" . $querySemiautoInsert ."";

			  //exit();

			  $ResultSemiautoInsert = mysql_query($querySemiautoInsert) or die ("Errore sulla query semiauto: ".mysql_error());

			  $ResultRevolverInsert = mysql_query($queryRevolverInsert) or die ("Errore sulla query revolver: ".mysql_error());

			  }

			  }

}

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

        

        $pdf->ezText('TROFEO ESAGONALE' ,20);

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





				echo "<br><br>";

				echo "<div class='miocentro'>";

              echo "<font color='#70A401'>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><B><center>SEMIAUTO A</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($row = mysql_fetch_array($resultPuntiSingolo))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Nome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['GT'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$row['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Senior'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Lady'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$row['GareConsiderate'] ."</font></TD>";

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

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($row = mysql_fetch_array($resultPuntiSingoloB))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Nome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['GT'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$row['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Senior'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$row['Lady'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$row['GareConsiderate'] ."</font></TD>";

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

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($rowR = mysql_fetch_array($resultPuntiSingoloR))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowR['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowR['Nome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowR['GT'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$rowR['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowR['Senior'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowR['Lady'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$rowR['GareConsiderate'] ."</font></TD>";

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

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Punti</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Esordiente</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Senior</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Lady</font></B></center></TH>";

			  echo "<TH><center><B><font color='#70A401'>Gare Considerate</font></B></center></TH>";

			  echo "</TR>";

			  

	$ClassificaA=1;

	while($rowRB = mysql_fetch_array($resultPuntiSingoloRB))

  					{

  				     echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRB['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRB['Nome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRB['GT'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$rowRB['Esordiente'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRB['Senior'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowRB['Lady'] ."</font></TD>";

					 echo "<TD><font color='#FFFFFF'>" .$rowRB['GareConsiderate'] ."</font></TD>";

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