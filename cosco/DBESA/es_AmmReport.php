<?php



require_once('./class2.php');

$MyCmd = $_GET['cmd'];

if ($MyCmd != 'print'){

   require_once(HEADERF);

}

//include ('class.ezpdf.php');

//require_once('fpdf.php');

//require_once('fpdi.php');

$MiaData = date('d/m/Y - G:i:s');



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");

                           

                           

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $Prezzo=Array();



              $queryPrezzo = "SELECT * FROM gare WHERE NomeGara ='" .NOMEGARA ."'";

              $resultPrezzo = mysql_query($queryPrezzo);



              $queryPrestazioniA = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione = 'SEMIAUTO'";

              $resultPrestazioniA = mysql_query($queryPrestazioniA);

              $NumeroPrestazioniA = mysql_num_rows($resultPrestazioniA);

              

              $queryRientriA = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione = 'SEMIAUTO' AND TipoProva='RIENTRO'";

              $resultRientriA = mysql_query($queryRientriA);

              $NumeroRientriA = mysql_num_rows($resultRientriA);

              

              $queryRientriR = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione = 'REVOLVER' AND TipoProva='RIENTRO'";

              $resultRientriR = mysql_query($queryRientriR);

              $NumeroRientriR = mysql_num_rows($resultRientriR);



	      $queryPrestazioniR = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione = 'REVOLVER'";

              $resultPrestazioniR = mysql_query($queryPrestazioniR);

              $NumeroPrestazioniR = mysql_num_rows($resultPrestazioniR);



              $queryPartecipanti = "SELECT * FROM " .$MioNomeGara ." GROUP BY nome, cognome";

              $resultPartecipanti = mysql_query($queryPartecipanti);

              $NumeroPartecipanti = mysql_num_rows($resultPartecipanti);

              

              $rowPrezzo = mysql_fetch_array($resultPrezzo);

              $PrezzoGara = $rowPrezzo['PrezzoGara'];

              $PrezzoRientro = $rowPrezzo['PrezzoRientro'];

              

              $query = "SELECT TipoProva, COUNT(ID) FROM " .$MioNomeGara ." GROUP BY TipoProva;";

              $result = mysql_query($query);







              if ($MyCmd == 'print'){

                   //require_once('./class2.php');

                   include ('class.ezpdf.php');

                   require_once('fpdf.php');

                   require_once('fpdi.php');

                   

                   // initiate FPDI

                   $pdf =& new FPDI();

                   $pdf->AddPage('P','A4');

                   // set the sourcefile

                   $pdf->setSourceFile('./bianco.pdf');



                   // import page 1

                   $tplIdx = $pdf->importPage(1);

                   // use the imported page and place it

                   $pdf->useTemplate($tplIdx, 0, 0, 210);



                   // LOGO ESAGONALE

                   $pdf->Image('logoesagonale.gif',5,5,30);

                   // now write some text above the imported page

                   $pdf->SetFont('Times','B',30);

                   $pdf->SetXY(35, 20);

                   $pdf->Write(0, NOMEGARA);

                   

                   $pdf->SetFont('Times','B',24);

                   $pdf->SetXY(45, 50);

                   $pdf->Write(0, "REPORT CONTEGGI GARA");

                   $pdf->SetFont('Times','',12);

                   $pdf->SetXY(35, 75);

                   $pdf->Write(0, $MiaData);

                   $pdf->SetXY(35, 85);

                   $pdf->Write(0, "TOTALE PRESTAZIONI Auto: " .$NumeroPrestazioniA ." - Revolver: " .$NumeroPrestazioniR ."");

                   $pdf->SetXY(35, 95);

                   $pdf->Write(0, "TOTALE PARTECIPANTI: " .$NumeroPartecipanti ."");

                   

                   while ($row = mysql_fetch_array($result))

                         {

                    if ($row['TipoProva']=='ISCRIZIONE'){

                        $TotaleGare=$row['COUNT(ID)']*$PrezzoGara;

                        $pdf->SetXY(35, 105);

                        $pdf->Write(0, "TOTALE ISCRIZIONI: " .$row['COUNT(ID)'] ." * " .$PrezzoGara ." Euro = " .$TotaleGare ."");

                        }

                    if ($row['TipoProva']=='RIENTRO'){

                        $TotaleRientro=$row['COUNT(ID)']*$PrezzoRientro;

                        $pdf->SetXY(35, 115);

                        $pdf->Write(0, "TOTALE RIENTRI: " .$row['COUNT(ID)'] ." * " .$PrezzoRientro ." Euro = " .$TotaleRientro ."");

                        }

                    if ($row['TipoProva']=='OMAGGIO'){

                        $pdf->SetXY(35, 125);

                        $pdf->Write(0, "TOTALE OMAGGI: " .$row['COUNT(ID)'] ."");

                        }

                         }

                    $TotaleCassa = $TotaleGare + $TotaleRientro;

                    $pdf->SetFont('Times','B',14);

                    $pdf->SetXY(35, 135);

                    $pdf->Write(0, "Totale Cassa: " .$TotaleCassa ." Euro");

                   

                   

                   $NomeFile = "Report.pdf";

                   $pdf->Output($NomeFile, 'D');







                  }

              else {



              require_once(HEADERF);

              //require_once('./class2.php');

              

              echo "<B><center>REPORT CONTEGGI GARA</B></center><BR><BR>";

              

              echo "TOTALE PRESTAZIONI Auto: " .$NumeroPrestazioniA ."<BR><BR>";

	      echo "TOTALE PRESTAZIONI Revolver: " .$NumeroPrestazioniR ."<BR><BR>";

              echo "TOTALE PARTECIPANTI: " .$NumeroPartecipanti ."<BR><BR>";

              echo "TOTALE RIENTRI Auto: " .$NumeroRientriA ."<BR><BR>";

              echo "TOTALE RIENTRI Revolver: " .$NumeroRientriR ."<BR><BR>";

              

              while ($row = mysql_fetch_array($result))

                  {

                    if ($row['TipoProva']=='ISCRIZIONE'){

                        $TotaleGare=$row['COUNT(ID)']*$PrezzoGara;

                        echo "TOTALE ISCRIZIONI: " .$row['COUNT(ID)'] ." * " .$PrezzoGara ." Euro = " .$TotaleGare ."<BR>";

                        }

                    if ($row['TipoProva']=='RIENTRO'){

                        $TotaleRientro=$row['COUNT(ID)']*$PrezzoRientro;

                        echo "TOTALE RIENTRI: " .$row['COUNT(ID)'] ." * " .$PrezzoRientro ." Euro = " .$TotaleRientro ."<BR>";

                        }

                    if ($row['TipoProva']=='OMAGGIO'){

                        echo "TOTALE OMAGGI: " .$row['COUNT(ID)'] ."<BR>";

                        }

                    echo "<BR>";

               }

               

               echo "<BR>";

               $TotaleCassa = $TotaleGare + $TotaleRientro;

               echo "<B>Totale Cassa: " .$TotaleCassa ." Euro";

               

               echo "<BR>";

               echo "<BR>";

               echo "<BR>";



               echo "<center><B><a href=./es_AmmReport.php?cmd=print>

                    CREA REPORT PDF

               <img src='./e107_plugins/pdf/images/pdf_16.png' width='16' height='16' border='2' alt='Crea PDF' />

               </a>";



               echo "<BR>";

               echo "<BR>";

               echo "<BR>";



               }

                           

                           

                           

                           





mysql_close($connection);

require_once(FOOTERF);





?>

