<?php


	 require_once('class2.php');

    
	 include 'Config_Conn_SQL.php';
	 
	 $MyFase = $_GET['fase'];
	 
	 if($MyFase==''){$MyFase=1;}

		$PrinterID = $_REQUEST['PrinterID'];
		$Articolo = $_REQUEST['Articolo'];
		$Lotto = $_REQUEST['Lotto'];
		$DataSc = $_REQUEST['DataSc'];
		$QtaEti = $_REQUEST['QtaEti'];
		


		
		$connection = mssql_connect(DB_HOST_2, DB_USER_2, DB_PASSWORD_2)

                           or die ("NON è possibile stabilire una connessione con DB_2.");



      $db = mssql_select_db(DB_DATABASE_Etichette, $connection) or die ("NON è possibile selezionare la Tabella Etichette.");		
		

     $query = "SELECT * FROM " .DB_TABLE_Stampanti ." ORDER BY NumeroLinea";



     $result = mssql_query($query) or die ("Errore sulla query: ".mssql_error());
        	//echo "<br>";

		  	
			echo "<center><a href='Eti_Start_Free.php'><img src='Paluani2.png' alt='PALUANI' width='200pixels' /></a><BR>";		  	
		  	echo "<BR>clicca sul logo per tornare all'inizio<BR>";               
        	echo "<center><h1>GENERAZIONE ETICHETTE</h1></center>";


        	
if($MyFase==1){ //INIZIO FASE 1

			
			echo "<FORM METHOD='POST' ACTION='Eti_Start_Free.php?fase=2'>";

			echo "<center>";         
         echo "<table border='1'>

               <TR>

               <TD width='80' colspan='3' background='modul_red.jpg'><center>";

			echo "<B><font color='#FFFFFF'>1. STAMPANTE DI DESTINAZIONE</font></B></center></TD><TR>";

			echo "<TD width='80' background='modul_red.jpg'><font color='#FFFFFF'><center><b>Linea</b></center></font></TD>

					<TD width='80' background='modul_red.jpg'><font color='#FFFFFF'><center><b>Selezione</b></center></font></TD>

					<TD width='150' background='modul_red.jpg'><font color='#FFFFFF'><center><b>Descrizione</b></center></font></TD>
					</TR>";



			while ($row = mssql_fetch_array($result)){
			echo "<TR>
						<TD><center>	
							" .$row['NumeroLinea'] ."
						</center></TD>
						<TD><center>	
							<input CHECKED type='radio' name='PrinterID' value='", $row['ID'],"'
						</center></TD>
						<TD><center>	
							" .$row['DescrizioneLinea'] ."
						</center></TD>
					</TR>";

					}	
					

     		echo"</table>";

                echo "<br>";

                echo "<center>";

                echo "<input type='submit' value='NEXT>>'>";

                echo "</FORM>";


                

} // FINE FASE 1


if($MyFase==2){ //INIZIO FASE 2

$dbArt = mssql_select_db(DB_DATABASE_Articoli, $connection)

                           or die ("NON è possibile selezionare la Tabella Articoli.");		
$queryArt = "SELECT * FROM " .DB_TABLE_Articoli ." ORDER BY CodArticolo";
$resultArt = mssql_query($queryArt) or die ("Errore sulla query: ".mssql_error());
			
			echo "<FORM name='Inserisci' METHOD='POST' ACTION='Eti_Start_Free.php?fase=3'>";
			echo "<center>";			
			echo "<table border='1'>

               <TR>

               <TD width='100' colspan='2' background='modul_red.jpg'><center>";

			echo "<B><font color='#FFFFFF'>2. SCELTA ARTICOLO</font></B></center></TD><TR>";
			echo "<TD width='100'><center><b>ARTICOLO</b></center></TD>

					<TD width='150'><center>";
			echo "<select name='Articolo'>";			
			while ($rowArt = mssql_fetch_array($resultArt)){
						echo "<option value='" .$rowArt['CodArticolo'] ."'>" .$rowArt['CodArticolo'] . " - " .$rowArt['Desc'] ."</option>";
					}
			echo "</select>";		
			echo "</center></TD>
					</TR>";
			echo "</table>";
			echo "<br>";

         echo "<center>";

         echo "<input type='submit' value='NEXT>>'>";

echo "<script type='text/javascript' language='JavaScript'>
document.forms['Inserisci'].elements['Articolo'].focus();
</script>";	
	

} // FINE FASE 2





if($MyFase==3){ //INIZIO FASE 3

			echo "<FORM name='Inserisci' METHOD='POST' ACTION='Eti_Start_Free.php?fase=4'>";
			echo "<center>";			
			echo "<table border='1'>

               <TR>

               <TD width='100' colspan='2' background='modul_red.jpg'><center>";

			echo "<B><font color='#FFFFFF'>3. INSERIMENTO LOTTO</font></B></center></TD><TR>";
			echo "<TD width='100'><center><b>LOTTO<BR>senza L iniziale</b></center></TD>

					<TD width='150'><center>";
			echo "<INPUT TYPE='text' NAME='Lotto' VALUE =''>";		
			echo "</center></TD>
					</TR>";
			echo "</table>";
			echo "<br>";

         echo "<center>";

         echo "<input type='submit' value='NEXT>>'>";

echo "<script type='text/javascript' language='JavaScript'>
document.forms['Inserisci'].elements['Lotto'].focus();
</script>";	


} // FINE FASE 3


if($MyFase==4){ //INIZIO FASE 4

			echo "<FORM name='Inserisci' METHOD='POST' ACTION='Eti_Start_Free.php?fase=5'>";
			echo "<center>";			
			echo "<table border='1'>

               <TR>

               <TD width='100' colspan='2' background='modul_red.jpg'><center>";

			echo "<B><font color='#FFFFFF'>4. INSERIMENTO SCADENZA</font></B></center></TD><TR>";
			echo "<TD width='100'><center><b>DATA SCADENZA<BR>(gg/mm/aaaa)</b></center></TD>

					<TD width='150'><center>";
			echo "<INPUT TYPE='text' NAME='DataSc' VALUE =''>";		
			echo "</center></TD>
					</TR>";
			echo "</table>";
			echo "<br>";

         echo "<center>";

         echo "<input type='submit' value='NEXT>>'>";

echo "<script type='text/javascript' language='JavaScript'>
document.forms['Inserisci'].elements['DataSc'].focus();
</script>";	


} // FINE FASE 4

if($MyFase==5){ //INIZIO FASE 5

			echo "<FORM name='Inserisci' METHOD='POST' ACTION='Eti_Start_Free.php?fase=6'>";
			echo "<center>";			
			echo "<table border='1'>

               <TR>

               <TD width='100' colspan='2' background='modul_red.jpg'><center>";

			echo "<B><font color='#FFFFFF'>5. INSERIMENTO QUANTITA'</font></B></center></TD><TR>";
			echo "<TD width='100'><center><b>Q.ta' ETICHETTE</b><BR>Massimo 9999</center></TD>

					<TD width='150'><center>";
			echo "<INPUT TYPE='text' NAME='QtaEti' VALUE =''>";		
			echo "</center></TD>
					</TR>";
			echo "</table>";
			echo "<br>";

         echo "<center>";

         echo "<input type='submit' value='NEXT>>'>";
         echo "<script type='text/javascript' language='JavaScript'>
document.forms['Inserisci'].elements['QtaEti'].focus();
</script>";	




} // FINE FASE 5

if($MyFase==6){ //INIZIO FASE 6

			echo "<FORM name='Inserisci' METHOD='POST' ACTION='Eti_Start_Free.php?fase=7'>";
			
}

// RIASSUNTO CONFIGURAZIONE ETICHETTA

if($MyFase>=2){			

if($MyFase==6){ //INIZIO FASE 6

			//echo "<FORM METHOD='POST' ACTION='Eti_Start.php?fase=7'>";


         echo "<center>";

         echo "<input name='Stampa' type='submit' value='<<STAMPA>>'>";
         echo "<script type='text/javascript' language='JavaScript'>
document.forms['Inserisci'].elements['Stampa'].focus();
</script>";	
			echo "<br>";
			echo "<br>";


} // FINE FASE 6

if($MyFase<=5){			
			echo "<BR>";

			echo "<BR>";

			echo "<BR>";

			echo "<BR>";
}						
			$db = mssql_select_db(DB_DATABASE_Etichette, $connection) or die ("NON è possibile selezionare la Tabella Etichette.");			
			$queryDS = "SELECT * FROM " .DB_TABLE_Stampanti ." WHERE ID=" .$PrinterID ."";

     		$resultDS = mssql_query($queryDS) or die ("Errore sulla query!!!");			
			while ($row = mssql_fetch_array($resultDS)){
						$PrinterDescription=$row['DescrizioneLinea'];
						$NumeroLinea=$row['NumeroLinea'];
						$NumeroCom=$row['NumeroCom'];
						$PathDestinazioneFile=$row['PathDestinazioneFile'];
						$ModelloStampante=$row['ModelloStampante'];
					}
					
			$dbArt2 = mssql_select_db(DB_DATABASE_Articoli, $connection) or die ("NON è possibile selezionare la Tabella Articoli.");		
			$queryArt2 = "SELECT * FROM " .DB_TABLE_Articoli ." WHERE CodArticolo='" .$Articolo ."'";
			$resultArt2 = mssql_query($queryArt2) or die ("Errore sulla query: ".mssql_error());
			while ($rowArt2 = mssql_fetch_array($resultArt2)){
						$Articolo=$rowArt2['CodArticolo'];
						$ArtDescr=$rowArt2['Desc'];
						$BarCode=$rowArt2['BarCode'];
						$Pezzi=$rowArt2['PzScatola'];
					}									
			
			//echo "Articolo: " .$ArtDescr ."<BR>";
			echo "<center>";			
			echo "<table border='1'>

               <TR>        	
        				<TD width='300' colspan='2' background='modul_red.jpg'>
        				<center><B><font color='#FFFFFF'>CONFIGURAZIONE ETICHETTA</font></B>
        				</center></TD>
        			</TR>
        			<TR>
        				<TD><center><B>Stampante</B></center></TD>
        				<TD><center><input type='text' name='PrinterID' size='1' READONLY ='READONLY' value=" .$PrinterID ." />
        								<input type='text' name='PrinterDesc' size='20' READONLY ='READONLY' value=" .$PrinterDescription ." /></center></TD>
        			</TR>";
if($MyFase>=3){        			
        	echo  "<TR>
        				<TD><center><B>Articolo</B></center></TD>
        				<TD><center><input type='text' name='Articolo' size='20' READONLY ='READONLY' value=" .$Articolo ." /></center></TD>
        			</TR>
        			<TR>
        				<TD><center><B>Descrizione</B></center></TD>
        				<TD><center><input type='text' name='ArtDescr' size='50' READONLY ='READONLY' value='" .$ArtDescr ."' /></center></TD>
        			</TR>
        			<TR>
        				<TD><center><B>Bar Code</B></center></TD>
        				<TD><center><input type='text' name='BarCode' size='20' READONLY ='READONLY' value=" .$BarCode ." /></center></TD>
        			</TR>
        			<TR>
        				<TD><center><B>Pz Scatola</B></center></TD>
        				<TD><center><input type='text' name='Pezzi' size='20' READONLY ='READONLY' value=" .$Pezzi ." /></center></TD>
        			</TR>";
}
if($MyFase>=4){        			
        	echo  "<TR>
        				<TD><center><B>LOTTO</B></center></TD>
        				<TD><center><input type='text' name='Lotto' size='20' READONLY ='READONLY' value=" .$Lotto ." /></center></TD>
        			</TR>";
}
if($MyFase>=5){        			
        	echo  "<TR>
        				<TD><center><B>DATA<BR>SCADENZA</B></center></TD>
        				<TD><center><input type='text' name='DataSc' size='20' READONLY ='READONLY' value=" .$DataSc ." /></center></TD>
        			</TR>";
}
if($MyFase>=6){        			
        	echo  "<TR>
        				<TD><center><B>Q.ta' ETICHETTE</B><BR>Massimo 9999</center></TD>
        				<TD><center><input type='text' name='QtaEti' size='20' READONLY ='READONLY' value=" .$QtaEti ." /></center></TD>
        			</TR>";
}			
			echo "</table>";

if($MyFase==6){ //INIZIO FASE 6

			//echo "<FORM METHOD='POST' ACTION='Eti_Start.php?fase=7'>";
			echo "<br>";

         echo "<center>";

         echo "<input type='submit' value='<<STAMPA>>'>";


} // FINE FASE 6

			echo "</FORM>";			

}


// INIZIO PARTE DI GENERAZIONE DEL FILE DI STAMPA

if($MyFase==7){ //INIZIO FASE 7 -----> LA STAMPA

			echo "<br>";

         echo "<center><B>GENERAZIONE IN CORSO</B></center>";


// VERIFICA DELLE ETICHETTE GIA STAMPATE PER CONGRUITA' LOTTO E CONTATORE

	$db = mssql_select_db(DB_DATABASE_Etichette, $connection) or die ("NON è possibile selezionare il DB Etichette.");		
	$queryStampate = "SELECT * FROM " .DB_TABLE_Stampate ." WHERE Linea='" .$NumeroLinea ."' AND
							Lotto='" .$Lotto ."' ORDER BY Fine ASC";
	$resultStampate = mssql_query($queryStampate) or die ("Errore sulla query: ".mssql_error());
	while ($rowStampate = mssql_fetch_array($resultStampate)){
						$Fine=$rowStampate['Fine'];
						//echo "Fine: " .$Fine ."<BR>";
					}	
	

// FINE VERIFICA CONGRUITA'

				$db = mssql_select_db(DB_DATABASE_Etichette, $connection) or die ("NON è possibile selezionare la Tabella Etichette.");				

     			$query = "SELECT * FROM " .DB_TABLE_Stampanti ." ORDER BY NumeroLinea";

     			$result = mssql_query($query) or die ("Errore sulla query: ".mssql_error());
     			while ($row = mssql_fetch_array($result)){
						$FileBase=$row['ModelloStampante'];
					}
            
            
				$myFile = $FileBase;
				$fh = fopen($myFile, 'r');
				$stringData = fread($fh, filesize($myFile));
				fclose($fh);
				//echo $stringData;            
            
// INIZIO PERSONALIZZAZIONE ETICHETTA
				
				$PrimaLotto=substr($Lotto, 0, 1);
				$RestoLotto=substr($Lotto, 1, 3);
				
//UNIFORMA IL CODICE A 5 CARATTERI
				$ArtLen=strlen($Articolo);				
				for($i=$ArtLen; $i<=4;$i++) {
						$Articolo="" .$Articolo ." ";
					}
// FINE UNIFORMA
				$MioProg=$Fine + 1;

//UNIFORMA IL PROGRESSIVO A 6 CARATTERI
				$ProgLen=strlen($MioProg);				
				for($i=$ProgLen; $i<=5;$i++) {
						$MioProg="0" .$MioProg ."";
					}
					
//UNIFORMA LA QUANTITA' A 4 CARATTERI
				$QtaEtiLen=strlen($QtaEti);				
				for($i=$QtaEtiLen; $i<=3;$i++) {
						$QtaEti="0" .$QtaEti ."";
					}					
					
				//echo "MioProgressivo: " .$MioProg ."<BR>";
// FINE UNIFORMA				
				$MioBarCode="" .$Articolo ."" .$NumeroLinea ."" .$PrimaLotto ."&D" .$RestoLotto ."" .$MioProg ."";
				$MioBarCodeDescr="" .$Articolo ." " .$NumeroLinea ." " .$PrimaLotto ."" .$RestoLotto ." " .$MioProg ."";				
				//echo "<br><br><br>Mio Codice: " .$MioBarCode ."<br><br><br>";
				$stringData=str_replace('@VDescrizione:', $ArtDescr, $stringData);
				$stringData=str_replace('@VCodice Art:', $Articolo, $stringData);
				$stringData=str_replace('@VBarcode Prog:', $MioBarCode, $stringData);
				$stringData=str_replace('@VBarcode prodotto:', $BarCode, $stringData);
				$stringData=str_replace('@VDesc Barcode prog:', $MioBarCodeDescr, $stringData);
				$stringData=str_replace('@VScadenza:', $DataSc, $stringData);
				$stringData=str_replace('@VProgressivo:', $MioProg, $stringData);
				$stringData=str_replace('@V0001', $QtaEti, $stringData);

// FINE PERSONALIZZAZIONE ETICHETTA            
            
				$MiaData = date('d_m_Y_G_i_s');
	   		$MiaPath = $PathDestinazioneFile;
	   		$output_file = "" .$MiaPath ."" .$NumeroCom ."_" .$MiaData .".eti";
	   		$myFile = "file:///" . $output_file;            
				                        
            $fh = fopen($myFile, 'w') or die("can't open file");
            //$stringData = "TEST";
            fwrite($fh, $stringData);
            fclose($fh);
            
            //echo "<br><br><br>" .$stringData;
            
// INSERISCE I DATI DELL'ETICHETTA NEL DB            

		$MiaFine= $MioProg + $QtaEti;
//UNIFORMA LA FINE A 6 CARATTERI
				$FineLen=strlen($MiaFine);				
				for($i=$FineLen; $i<=5;$i++) {
						$MiaFine="0" .$MiaFine ."";
					}		
		$MiaData= date('d/m/Y');
            
		$db = mssql_select_db(DB_DATABASE_Etichette, $connection) or die ("NON è possibile selezionare il DB Etichette.");		
		$queryStampateIns = "INSERT INTO " .DB_TABLE_Stampate ." VALUES ('" .$Articolo ."', '" .$NumeroLinea ."', '" .$Lotto ."',
								'" .$MioProg ."', '" .$MiaFine ."', '" .$QtaEti ."', '" .$DataSc ."', '" .$MiaData ."')";
		//echo "QUERY: " .$queryStampateIns ."<BR>";
		$resultStampate = mssql_query($queryStampateIns) or die ("Errore sulla query: ".mssql_error());

// FINE INSERISCE I DATI DELL'ETICHETTA NEL DB 

		echo "<br>";

      echo "<center><B>GENERAZIONE ETICHETTA ESEGUITA</B></center>";           
		echo "<br>";
		            			

} // FINE FASE 7








?>

