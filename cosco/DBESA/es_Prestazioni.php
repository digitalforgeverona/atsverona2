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

// RECUPERA IL NOME DELLA GARA ATTIVA

//#############################################################



$myFile = "GaraAttiva.txt";

$fh = fopen($myFile, 'r');

$theData = fread($fh, filesize($myFile));

fclose($fh);

define("NOMEGARA", $theData);



}



$MiaData = date('d/m/Y - G:i:s');



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



       if ($MyCmd == 'prestazioni'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

			  $queryPrestazioni = "SELECT ID, Cognome, Nome, COUNT(ID) FROM " .$MioNomeGara ." GROUP BY Nome, Cognome ORDER BY COUNT(ID) DESC";  

              $resultPrestazioni = mysql_query($queryPrestazioni) or die ("Errore sulla query SEMIAUTO: ".mysql_error());

              }

              

         

//INIZIO PARTE STAMPA



if ($MyPrint == 'Y'){



    $data = array();

               $Posizione = 1;

               while($data[] = mysql_fetch_assoc($resultPrestazioni)) {}

                        if (count($data)>=1){

                             for ($outindex = 0; $outindex < count($data) - 1; $outindex++){

                                 $Posizione = $outindex + 1;

                                 $data[$outindex]['ID'] = "" .$Posizione ."";

                             }

                        }

               

        $pdf->ezText('ESAGONALE - ' .NOMEGARA .'' ,20);

        $pdf->ezText('' .$MiaData .'',14);

        $pdf->ezText(' ',14);

        $pdf->ezText('PRESTAZIONI',14);

        $pdf->ezTable($data,'','PRESTAZIONI', array('xPos'=>50,'xOrientation'=>'right','width'=>500));



        $pdf->stream();

        mysql_close($connection);

        exit;



    }

    else {



//NON STAMPA MA MOSTRA A VIDEO



              echo "<div class='miocentro'>";

              echo "<font color='#70A401'>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA

              echo "<TR>";

              echo "<TH COLSPAN=4><B><center>PRESTAZIONI</center></B></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH><center><B><font color='#70A401'>N.</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Nome</font></B></center></TH>";

              echo "<TH><center><B><font color='#70A401'>Totale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaA=1;

              while ($rowPrestazioni = mysql_fetch_array($resultPrestazioni))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#70A401'>" .$ClassificaA ."</font></TD>";

                     //echo "<TD><font color='#FFFFFF'>" .$rowSemi['ID'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowPrestazioni['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowPrestazioni['Nome'] ."</font></TD>";

                     echo "<TD><font color='#FFFFFF'>" .$rowPrestazioni['COUNT(ID)'] ."</font></TD>";

                     $ClassificaA++;

                  }

                  

              



              echo "</TABLE></div>";

              echo "<BR><BR>";

              

              echo "<center><B><a href=./es_Prestazioni.php?print=Y&cmd=" .$MyCmd .">

                    CREA STAMPA PDF

               <img src='./e107_plugins/pdf/images/pdf_16.png' width='16' height='16' border='2' alt='Crea PDF' />

               </a>";

              

              echo "<BR><BR>";

           

           







require_once(FOOTERF);

}



mysql_close($connection);



?>











