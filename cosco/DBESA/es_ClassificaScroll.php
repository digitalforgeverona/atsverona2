<?php



require_once('./class2.php');

require_once(HEADERF);



//#############################################################



// DAVIDE



// SCRIVE IN UN FILE IL NOME DELLA GARA ATTIVA

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













//***************************************



//require_once('./class2.php');

$MyCmd = '';//$_GET['cmd'];

if ($MyCmd==''){$MyCmd='totale';}

//include ('class.ezpdf.php');

//require_once('fpdf.php');

//require_once('fpdi.php');

$MiaData = date('d/m/Y - G:i:s');



$MiaData2 = date('G:i');



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



$NumeroSpan = 5 + (2*NUMEROSTAGES);



        if ($MyCmd == 'totale'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $querySemiauto = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' ORDER BY TotalePunti DESC";

              $resultSemiauto = mysql_query($querySemiauto);

              //$querySemiautoB = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO' AND Classe='B' ORDER BY TotalePunti DESC";

              //$resultSemiautoB = mysql_query($querySemiautoB);

              $queryRevolver = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' ORDER BY TotalePunti DESC";

              $resultRevolver = mysql_query($queryRevolver);

			  

			  $queryMono = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='MONOFILARE' ORDER BY TotalePunti DESC";

              $resultMono = mysql_query($queryMono);

              //$queryRevolverB = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER' AND Classe='B' ORDER BY TotalePunti DESC";

              //$resultRevolverB = mysql_query($queryRevolverB);

              //echo "<center><B>GENERALE</center></B><BR><BR>";

              

			  

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

              echo "<font color='#5179bc'>";

              //echo "<center><B><BR><BR></B></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA AUTOMATICA CAT A

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#3e3e3e'><B><center>SEMIAUTO</center></B></font></TH>";

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

              echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaA=1;

              while ($rowSemi = mysql_fetch_array($resultSemiauto))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaA ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemi['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemi['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowSemi['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowSemi['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowSemi['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowSemi['TotalePunti'] ."</font></TD>";

                     $ClassificaA++;

                  }



              /*

              //CLASSIFICA AUTOMATICA CAT B

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#3e3e3e'><B><center>CLASSE B</center></B></font></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>HF " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

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

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiB['HF_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowSemiB['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowSemiB['TotalePunti'] ."</font></TD>";

                     $ClassificaAB++;

                  }



               */

                  echo "</TABLE>";

                  

                  /*echo "<SCRIPT LANGUAGE='javascript'>{

    	               window.scrollBy(0,30);

    	               scrolldelay = setTimeout('pageScroll()',1000);}</SCRIPT>";

					*/

					

					

             // CLASSIFICA REVOLVER

              echo "<BR><BR><BR>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA REVOLVER CAT A

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#3e3e3e'><B><center>REVOLVER</center></B></font></TH>";

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

              echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaR=1;

              while ($rowRev = mysql_fetch_array($resultRevolver))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaR ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRev['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRev['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowRev['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowRev['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowRev['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowRev['TotalePunti'] ."</font></TD>";

                     $ClassificaR++;

                  }





              /*

              //CLASSIFICA REVOLVER CAT B

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#3e3e3e'><B><center>CLASSE B</center></B></font></TH>";

              echo "</TR>";

              echo "<TR>";

              echo "<TH></TH>";

              echo "<TH><center><B><font color='#5179bc'>N. Prova</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Cognome</font></B></center></TH>";

              echo "<TH><center><B><font color='#5179bc'>Nome</font></B></center></TH>";



              for ($i=1; $i<=NUMEROSTAGES; $i++){

                  echo "<TH><center><B><font color='#5179bc'>HF " .$i ."</font></B></center></TH>";

                  echo "<TH><center><B><font color='#5179bc'>Punti " .$i ."</font></B></center></TH>";

              }

              echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

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

                         echo "<TD><font color='#3e3e3e'>" .$rowRevB['HF_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowRevB['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowRevB['TotalePunti'] ."</font></TD>";

                     $ClassificaRB++;

                  }





              */

				echo "</TABLE>";

				

				// CLASSIFICA MONO

              echo "<BR><BR><BR>";

              echo "<center><B></B><BR></center>";

              echo "<TABLE BORDER='1'>";



              //CLASSIFICA MONO CAT A

              echo "<TR>";

              echo "<TH COLSPAN=" .$NumeroSpan ."><font color='#3e3e3e'><B><center>MONOFILARE</center></B></font></TH>";

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

              echo "<TH><center><B><font color='#5179bc'>Totale</font></B></center></TH>";

              echo "</TR>";



              $ClassificaM=1;

              while ($rowMono = mysql_fetch_array($resultMono))

                  {

                     echo "<TR>";

                     echo "<TD><font color='#5179bc'>" .$ClassificaM ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMono['ID'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMono['Cognome'] ."</font></TD>";

                     echo "<TD><font color='#3e3e3e'>" .$rowMono['Nome'] ."</font></TD>";

                     for ($i=1; $i<=NUMEROSTAGES; $i++){

                         echo "<TD><font color='#3e3e3e'>" .$rowMono['Tempo_' .$i .''] ."</font></TD>";

                         echo "<TD><font color='#3e3e3e'>" .$rowMono['Punteggio_' .$i .''] ."</font></TD>";

                     }

                     echo "<TD><font color='#3e3e3e'>" .$rowMono['TotalePunti'] ."</font></TD>";

                     $ClassificaM++;

                  }

				

				

				



              echo "</TABLE>";

              //echo "<onLoad='pageScroll()'>";

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

           		echo "</div>";

           





mysql_close($connection);



               //$MyCounter = ($ClassificaR + $ClassificaA + 10) * 1000;

               //echo "" .$MyCounter ."";

               

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



?>









