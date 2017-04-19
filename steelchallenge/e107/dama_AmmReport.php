<?php

require_once('./class2.php');
$MyCmd = $_GET['cmd'];
if ($MyCmd != 'print'){
   require_once(HEADERF);
    // récupération du contenu HTML
 	
}

$MiaData = date('d/m/Y - G:i:s');

$connection = mysql_connect("localhost", "atsverona", "Jump02052012");

$db = mysql_select_db("atsveron_steel", $connection);
                           
                           
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              //$Prezzo=Array();

              //$queryPrezzo = "SELECT * FROM gare WHERE NomeGara ='" .NOMEGARA ."'";
              //$resultPrezzo = mysql_query($queryPrezzo);

              $queryTotaleIscrizioni = "SELECT * FROM " .$MioNomeGara ."";
              $resultTotaleIscrizioni = mysql_query($queryTotaleIscrizioni);
              $NumeroTotaleIscrizioni = mysql_num_rows($resultTotaleIscrizioni);

              $queryIscrizioni = "SELECT * FROM " .$MioNomeGara ." GROUP BY Tessera";
              $resultIscrizioni = mysql_query($queryIscrizioni);
              $NumeroIscrizioni = mysql_num_rows($resultIscrizioni);
              
			  $NumeroRientri=$NumeroTotaleIscrizioni-$NumeroIscrizioni;
			  
              $rowPrezzo = mysql_fetch_array($resultPrezzo);
              $PrezzoGara = $rowPrezzo['PrezzoGara'];
              $PrezzoRientro = $rowPrezzo['PrezzoRientro'];
              
              $queryDivision = "SELECT Division, COUNT(ID) FROM " .$MioNomeGara ." GROUP BY Division;";
              $resultDivision = mysql_query($queryDivision);
			  $fields_Division = mysql_num_fields($resultDivision);
			  
			  $queryCategoria = "SELECT Categoria, COUNT(ID) FROM " .$MioNomeGara ." GROUP BY Categoria;";
              $resultCategoria = mysql_query($queryCategoria);
			  $fields_Categoria = mysql_num_fields($resultCategoria);





              //require_once(HEADERF);
              //require_once('./class2.php');
              
              //echo "<B>REPORT CONTEGGI GARA</B><BR><BR>";
              
              //echo "TOTALE ISCRIZIONI-Base: " .$NumeroIscrizioni ."<BR><BR>";
              //echo "TOTALE RIENTRI: " .$NumeroRientri ."<BR><BR>";
			  //echo "<B><I>TOTALE ISCRIZIONI: " .$NumeroTotaleIscrizioni ."</B></I><BR><BR>";
            
			
			echo "<BR><B><H1><CENTER>" .NOMEGARA ."</CENTER></H1></B><BR><BR>";
			echo "<div style='position:center;width:800px;background-color:#FFFFFF'>";
			echo "<B><CENTER>DETTAGLIO ISCRITTI PER DIVISION</CENTER></B><TABLE class='fborder' BORDER='1'>";
			echo "<tr>";
			  while($rowDivision = mysql_fetch_array($resultDivision))
				{
					echo "<TH class='forumheader1'>" .$rowDivision['Division'] ."</TH>";
					$MioContaD[]=$rowDivision['COUNT(ID)'];	
				}
				echo "</tr>\n";
				for($c=0;$c<=count($MioContaD)-1;$c++)
				{
						echo "<TD class='forumheader4'>" .$MioContaD[$c] ."</td>";
				}
			  echo "</TABLE><BR><BR><BR>";
			 
			 
			 echo "<B><CENTER>DETTAGLIO ISCRITTI PER CATEGORIA</CENTER></B><TABLE class='fborder' BORDER='1'>";
			  echo "<tr>";
			  while($rowCategoria = mysql_fetch_array($resultCategoria))
				{
					echo "<TH class='forumheader1'>" .$rowCategoria['Categoria'] ."</TH>";
					$MioConta[]=$rowCategoria['COUNT(ID)'];	
				}
				echo "</tr>\n";
				for($c=0;$c<=count($MioConta)-1;$c++)
				{
						echo "<TD class='forumheader4'>" .$MioConta[$c] ."</td>";
				}
			 echo "</TABLE><BR><BR><BR>";
			 echo "<FORM METHOD='POST' ACTION='dama_AmmReport.php?cmd=calc'>";
			 echo "<B><CENTER>TOTALE ISCRITTI</CENTER></B><TABLE class='fborder' BORDER='1'>";
			  echo "<tr>";
			  if ($MyCmd!='calc'){
				 echo "<TH class='forumheader1'>Tipo</TH><TH class='forumheader1'>Numero</TH><TH class='forumheader1'>Costo</TH></TR>";
				  echo "<TR><TD class='forumheader4'>Iscrizioni</td><TD class='forumheader5'>" .$NumeroIscrizioni ."</td><TD class='forumheader5' style='width:80px'><input type='TEXT' style='width:80px;' name='ValIscrizioni' value=''></TD></TR>";
				  echo "<TR><TD class='forumheader4'>Rientri</td><TD class='forumheader5'>" .$NumeroRientri ."</td><TD class='forumheader5' style='width:80px'><input type='TEXT' style='width:80px;' name='ValRientri' value=''></TD></TR>";
				  echo "<TR><TD class='forumheader4' colspan=2>Valore Montepremi</td><TD class='forumheader5' style='width:80px'><input type='TEXT' style='width:80px;' name='ValMontepremi' value=''></TD></TR>";
				  
				  echo "<TR><TD class='forumheader4'>TOTALE ISCRITTI</td><TD class='forumheader5'><B>" .$NumeroTotaleIscrizioni ."</B></td><TD class='forumheader1' style='width:80px'><input type='submit' value='CALCOLA'></TD></TR>";
			   		echo"</TABLE><BR><BR><BR>";
					
			  }
			  else {
				  $ValIscrizioni=$_REQUEST['ValIscrizioni'];
				  $ValRientri=$_REQUEST['ValRientri'];
				  $ValMontepremi=$_REQUEST['ValMontepremi'];
				  
				  $TotIscrizioni=$NumeroIscrizioni*str_replace(',','.',$ValIscrizioni);
				  $TotRientri=$NumeroRientri*str_replace(',','.',$ValRientri);
				  $Incasso=round($TotIscrizioni+$TotRientri,0);
				  $ValOrganizzatore=round($Incasso/3,0);
				  $ValFITDS=$ValMontepremi-$ValOrganizzatore;
				  
				  echo "<TH class='forumheader1'>Tipo</TH><TH class='forumheader1'>Numero</TH><TH class='forumheader1'>Prezzo</TH><TH class='forumheader1'>Totale</TH></TR>";
				  echo "<TR><TD class='forumheader4'>Iscrizioni</td><TD class='forumheader5'>" .$NumeroIscrizioni ."</td><TD class='forumheader5'>" .$ValIscrizioni ."</td><TD class='forumheader5'>" .$TotIscrizioni ."</td></TR>";
				  echo "<TR><TD class='forumheader4'>Rientri</td><TD class='forumheader5'>" .$NumeroRientri ."</td><TD class='forumheader5'>" .$ValRientri ."</td><TD class='forumheader5'>" .$TotRientri ."</td></TR>";
				  echo "<TR><TD class='forumheader4'>TOTALE ISCRITTI</td><TD class='forumheader5'><B>" .$NumeroTotaleIscrizioni ."</B></td><TD class='forumheader1'><B>INCASSO</B></td><TD class='forumheader1'><B>" .$Incasso ."</B></td></TR>";
			  	  echo"</TABLE><BR><BR><BR>";
				  
				 	echo "<B><CENTER>CALCOLO QUOTE</CENTER></B><TABLE class='fborder' BORDER='1'>";
			  		echo "<tr>"; 
			  		echo "<TH class='forumheader1'>Montepremi</TH><TD class='forumheader4'>" .$ValMontepremi ."</TD></TR>";
					echo "<TR><TH class='forumheader1'>Quota a carico Organizzatore</TH><TD class='forumheader4'>" .$ValOrganizzatore ."</TD></TR>";
					echo "<TR><TH class='forumheader1'>Quota a carico FITDS</TH><TD class='forumheader4'><B>" .$ValFITDS ."</B></TD></TR>";
					echo "</TABLE>";
			  }
		
				echo "<BR><BR><BR></FORM></DIV>";
				
				

			

mysql_close($connection);
require_once(FOOTERF);

?>