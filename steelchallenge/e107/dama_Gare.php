<?php

            require_once('class2.php');
            
            $MyCmd = $_GET['cmd'];
			if ($MyCmd!='esporta'){
				require_once(HEADERF);
			}
			
			if (!USER) {
				header("location:".e_BASE."index.php");
				exit;
			}			
			
            $connection = mysql_connect("localhost", "atsverona", "Jump02052012")
                           or die ("NON è possibile stabilire una connessione.");

            $db = mysql_select_db("atsveron_steel", $connection)
                           or die ("NON è possibile selezionare il DB.");

            
			
			

            if ($MyCmd == ''){
            echo "<BR>";
            echo "<center>";
            echo "<FORM METHOD='POST' ACTION='dama_Gare.php?cmd=salva'>";
            echo "<TABLE BORDER='1'>";
            echo "<TH COLSPAN=2><B>CONFIGURA NUOVA GARA</B></TH>";
            echo "<TR>";
            echo "<TD style='width:150px;'><B>NOME GARA</B><BR>Non inserire caratteri accentati, simboli di primo o secondo</TD>";
            echo "<TD style='width:150px;'><input type='TEXT' name='NomeGara' value=''></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>DATA GARA</B><BR>nel formato AAAA-MM-GG</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='DataGara' value=''></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>AREA</B></TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='Area' value=''></TD>";
            echo "</TR>";
            echo "<TR>";
            echo "<TD style='width:150px;'><B>NUMERO STAGES</B></TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='NumeroStages' value=''></TD>";
            echo "</TR>";
            echo "<TR>";
            echo "<TD style='width:150px;'><B>FIVE TO GO</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC101' value='0'></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>SHOW DOWN</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC102' value='0'></TD>";
            echo "</TR>";			
			echo "<TR>";
            echo "<TD style='width:150px;'><B>SMOKE AND HOPE</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC103' value='0'></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>OUTER LIMITS</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC104' value='0'></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>ACCELERATOR</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC105' value='0'></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>PENDULUM</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC106' value='0'></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>SPEED OPTION</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC107' value='0'></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>ROUND ABOUT</B><BR>Stage Numero</TD>";
            echo "<TD style='width:30px;'><input type='TEXT' name='SC108' value='0'></TD>";
            echo "</TR>";
            echo "<TR>";
            echo "<TD COLSPAN=2 style='width:200px;'><center><input type='submit' value='SALVA'></TD>";
            echo "</TR>";
            echo "</TABLE>";
            echo "<BR>";
            echo "<BR>";
            }

            $MioAnno = date('Y');

            if ($MyCmd == 'salva'){
            $NomeGara = "" .$MioAnno ." " .$_REQUEST["NomeGara"] ."";
            $NumeroStages = $_REQUEST["NumeroStages"];
            $Area = $_REQUEST["Area"];
			$DataGara = $_REQUEST["DataGara"];
            $SC101 = $_REQUEST["SC101"];
            $SC102 = $_REQUEST["SC102"];
			$SC103 = $_REQUEST["SC103"];
			$SC104 = $_REQUEST["SC104"];
            $SC105 = $_REQUEST["SC105"];
			$SC106 = $_REQUEST["SC106"];
			$SC107 = $_REQUEST["SC107"];
			$SC108 = $_REQUEST["SC108"];
			
			
			
            $queryI = "INSERT INTO gare (NomeGara, DataGara, Area, NumeroStages, SC101, SC102, SC103, SC104, SC105, SC106, SC107, SC108)
                       VALUES('" .$NomeGara ."',
                                 '" .$DataGara ."',
								 '" .$Area ."',
                                 '" .$NumeroStages ."',
                                 '" .$SC101 ."',
                                 '" .$SC102 ."',
								 '" .$SC103 ."',
								 '" .$SC104 ."',
								 '" .$SC105 ."',
								 '" .$SC106 ."',
								 '" .$SC107 ."',
								 '" .$SC108 ."')";
            $result = mysql_query($queryI)
                       or die ("Errore sulla query di Inserimento Gara: ".mysql_error());

//exit;



            $myFile = "GaraAttiva.txt";
            $fh = fopen($myFile, 'w') or die("can't open file");
            $stringData = "" .$NomeGara ."";
            fwrite($fh, $stringData);
            fclose($fh);

            $i=1;
            $p=1;
               $ParteTabella = "";
               while($i<=$NumeroStages)
                           {
                            if ($i!=$SC104){
							while($p<=5){
                            $ParteTabella = "" .$ParteTabella ."
                                           Time_" .$i . "_" .$p ." DOUBLE,
                                           Penalty_" .$i . "_" .$p  ." DOUBLE,
                                           Score_" .$i . "_" .$p  ." DOUBLE
                                           ";
                            $p++;
                            if ($p<=5) {
                               $ParteTabella = "" .$ParteTabella .", ";
                            }// END IF P<=TOTPROVE
                           }// END WHILE
						}// END IF I!=SC104
						else {
							while($p<=4){
                            $ParteTabella = "" .$ParteTabella ."
                                           Time_" .$i . "_" .$p ." DOUBLE,
                                           Penalty_" .$i . "_" .$p  ." DOUBLE,
                                           Score_" .$i . "_" .$p  ." DOUBLE
                                           ";
                            $p++;
                            if ($p<=4) {
                               $ParteTabella = "" .$ParteTabella .", ";
                            }// END IF P<=TOTPROVEX
                           }// END WHILEX
							
							
						}// END ELSE
                           $p=1;
                           $i++;
                           if ($i<=$NumeroStages) {
                              $ParteTabella = "" .$ParteTabella .", ";
                           }
                           }

               $TS=1;
               while($TS<=$NumeroStages){

                    $ParteTabella="" .$ParteTabella .", Score_Stage_" .$TS ." DOUBLE";
                    $TS++;
               }

               $MioNomeGara = str_replace(' ', '_', $NomeGara);

               $QueryCreate = "CREATE TABLE " .$MioNomeGara ."
                            (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        Tessera VARCHAR(50) NOT NULL,
						Nome VARCHAR(300) NOT NULL,
						Classe VARCHAR(100) NOT NULL,
						Categoria VARCHAR(100) NOT NULL,
						Fascia VARCHAR(100) NOT NULL,
						Division VARCHAR(100) NOT NULL,
						Club VARCHAR(200) NOT NULL,
                        MatchType VARCHAR(45) NOT NULL,
						DataGara DATE NOT NULL,
						Turno VARCHAR(50) NOT NULL,
						Gruppo VARCHAR(50) NOT NULL,
                        " .$ParteTabella .",
                        TotalScore DOUBLE,
						PS1 VARCHAR(2) NOT NULL,
						PS2 VARCHAR(2) NOT NULL,
						PS3 VARCHAR(2) NOT NULL,
						PS4 VARCHAR(2) NOT NULL,
						PS5 VARCHAR(2) NOT NULL,
						PS6 VARCHAR(2) NOT NULL,
						PS7 VARCHAR(2) NOT NULL,
						PS8 VARCHAR(2) NOT NULL
                        )";

                        //echo "<BR><BR><BR>" .$QueryCreate ."<BR><BR><BR>";

               $result = mysql_query($QueryCreate)
                       or die ("Errore sulla query di creazione tabella: ".mysql_error());




            mysql_close($connection);
            //echo "Prezzo: " .$PrezzoRientro ."";
            header ("Location: dama_Gare.php?cmd=list");
            /* Redirect browser to starjokes.com  web site */
            exit;    // Closes further script execution
            }

            if ($MyCmd == 'list'){
            $query = "SELECT * FROM gare";
            $result = mysql_query($query)
                       or die ("Errore sulla query LIST: ".mysql_error());
            echo "<BR>";
            echo "<center>";
            echo "<TABLE BORDER='1'>";
            echo "<TR><TH COLSPAN=17><B>ELENCO GARE INSERITE</B></TH></TR>";
            echo "<TR><TH COLSPAN=4><B>DATI GARA</B></TH><TH COLSPAN=8><B>STAGES</B></TH><TH COLSPAN=5><B>COMANDI</B></TH></TR>";
			echo "<TR>";
            echo "<TH><center><B>NOME GARA</B></center></TH>";
			echo "<TH><center><B>DATA GARA</B></center></TH>";
			echo "<TH><center><B>AREA</B></center></TH>";
            echo "<TH><center><B>NUMERO ESERCIZI</B></center></TH>";
            echo "<TH><center><B>1</B></center></TH>";
            echo "<TH><center><B>2</B></center></TH>";
            echo "<TH><center><B>3</B></center></TH>";
			echo "<TH><center><B>4</B></center></TH>";
			echo "<TH><center><B>5</B></center></TH>";
			echo "<TH><center><B>6</B></center></TH>";
			echo "<TH><center><B>7</B></center></TH>";
			echo "<TH><center><B>8</B></center></TH>";
            echo "<TH><center><B>ATTIVA</B></center></TH>";
			echo "<TH><center><B>IMPORTA<BR>ISCRITTI</B></center></TH>";
            echo "<TH><center><B>ETICHETTE</B></center></TH>";
			echo "<TH><center><B>ESPORTA<BR>ISCRITTI</B></center></TH>";
			echo "<TH><center><B>BACKUP<BR>GARA</B></center></TH>";
			//echo "<TH><center><B>RESTORE<BR>GARA</B></center></TH>";
            while ($row = mysql_fetch_array($result))
               {
                   $NomeGara = $row['NomeGara'];
				   $DataGara = $row['DataGara'];
				   $Area = $row['Area'];
                   $NumeroStages = $row['NumeroStages'];
                   unset($Stage);
				   $Stage[0]='';
                   $Stage[$row['SC101']]='FIVE TO GO';
                   $Stage[$row['SC102']]='SHOW DOWN';
				   $Stage[$row['SC103']]='SMOKE AND HOPE';
				   $Stage[$row['SC104']]='OUTER LIMITS';
				   $Stage[$row['SC105']]='ACCELERATOR';
				   $Stage[$row['SC106']]='PENDULUM';
				   $Stage[$row['SC107']]='SPEED OPTION';
				   $Stage[$row['SC108']]='ROUND ABOUT';
            echo "<TR>";
            echo "<TD style='width:150px;'>" .$NomeGara ."</TD>";
			echo "<TD style='width:150px;'>" .$DataGara ."</TD>";
			echo "<TD style='width:150px;'>" .$Area ."</TD>";
            echo "<TD style='width:30px;'><center>" .$NumeroStages ."</center></TD>";
            echo "<TD style='width:30px;'><center>" .$Stage[1] ."</center></TD>";
            echo "<TD style='width:30px;'><center>" .$Stage[2] ."</center></TD>";
            echo "<TD style='width:30px;'><center>" .$Stage[3] ."</center></TD>";
			echo "<TD style='width:30px;'><center>" .$Stage[4] ."</center></TD>";
			echo "<TD style='width:30px;'><center>" .$Stage[5] ."</center></TD>";
			echo "<TD style='width:30px;'><center>" .$Stage[6] ."</center></TD>";
			echo "<TD style='width:30px;'><center>" .$Stage[7] ."</center></TD>";
			echo "<TD style='width:30px;'><center>" .$Stage[8] ."</center></TD>";
            echo "<TD style='width:30px;'><center><a href='./dama_Gare.php?cmd=set&NomeGara=" .$row['NomeGara'] ."'><img src='arrow_16.png' title='Attiva Gara' border=0/></a></center></TD>";
            echo "<TD style='width:30px;'><center><a href='./dama_Gare.php?cmd=imp&NomeGara=" .$row['NomeGara'] ."'><img src='user_lite.png' title='Importa Iscritti Gara' border=0/></a></center></TD>";
			echo "<TD style='width:30px;'><center><a href='./dama_EtiStat.php?cmd=eti&NomeGara=" .$row['NomeGara'] ."'><img src='e107_images/admin_images/custom_16.png' title='Stampa Etichette Statini' border=0/></a></center></TD>";
            echo "<TD style='width:30px;'><center><a href='./dama_Gare.php?cmd=esporta&NomeGara=" .$row['NomeGara'] ."'><img src='e107_images/fileinspector/folder_up.png' title='Esporta Iscritti Gara' border=0/></a></center></TD>";
			echo "<TD style='width:30px;'><center><a href='./dama_Gare.php?cmd=backup&NomeGara=" .$row['NomeGara'] ."'><img src='BackUp.png' title='Backup completo della gara' border=0/></a></center></TD>";
            
			echo "</TR>";
               }
            echo "</TABLE>";
            echo "<BR>";
            echo "<BR></CENTER>";
			echo "<a href='./dama_Gare.php?cmd=restore'><img src='e107_images/admin_images/cat_tools_32.png' title='Restore completo della gara' border=0/>  CARICA UNA GARA COMPLETA</a><BR><BR>";
			echo "<a href='./dama_Gare.php?cmd=Del'><img src='e107_images/admin_images/nopreview.png' title='Cancellazione della gara' border=0/>  CANCELLA UNA GARA COMPLETA</a><BR><BR>";
			
            }

			if ($MyCmd == 'imp'){
			$NomeGara = $_GET['NomeGara'];
			//require_once(e_FILE."shortcode/batch/download_shortcodes.php");
			//require_once(e_HANDLER."upload_handler.php");
			echo "<center><table><tr>
			<FORM enctype='multipart/form-data' METHOD='POST' ACTION='./dama_Gare.php?cmd=import&NomeGara=" .$NomeGara ."'>
			<td class='forumheader3'><span style='text-decoration:underline'>Seleziona il File</span></td>
			<td class='forumheader3'><input class='tbox' style='width:90%'  id='file_realpath' name='file_userfile' type='file' size='47' /></td>
			</tr><tr>
			<td class='forumheader3' colspan='2'><span style='text-decoration:underline'><center><input type='submit' value='SALVA'></span></td>
			</tr>
			</table></center>";
			}

			if ($MyCmd == 'import'){
			
			$NomeGara = $_GET['NomeGara'];
			$MioFile = $_FILES['file_userfile'];
            $MioFile2 = str_replace("\'","\\",$MioFile['tmp_name']);
			//print_r($MioFile2);
			//exit;
			$MioNomeGara = str_replace(' ', '_', $NomeGara);
			$fcontents = file ($MioFile2);
			$query = "SELECT * FROM gare WHERE NomeGara='" .$NomeGara ."'";
            $result = mysql_query($query) or die ("Errore sulla query LIST: ".mysql_error());
			while ($row = mysql_fetch_array($result)) {
				$NumeroStages=$row['NumeroStages'];
				$SC104=$row['SC104'];
				}
			echo "NUMSTAGE: " .$NumeroStages ."<BR>";
			echo "SC104: " .$SC104 ."<BR>";
			$Togli=0;
			if ($SC104!=0){$Togli=3;}
			
			$CampiBianchi=';';
			$TotCampiBianchi=($NumeroStages*15)-$Togli+$NumeroStages;
			echo "TotCampiBianchi: " .$TotCampiBianchi ."<BR>";
			
			for ($c=1; $c<$TotCampiBianchi; $c++){
				$CampiBianchi = "" .$CampiBianchi .";";
				}
			
			
			for($i=2; $i<sizeof ($fcontents); $i++) {
			   $line = str_replace("'"," ",trim($fcontents[$i]));
			   $arr = explode("\t", $line);
			   $sql = "insert into " .$MioNomeGara ." values ('".
				 implode("';'", $arr) ."" .$CampiBianchi .";;;;;;;;')";
			   $sql2= str_replace(";","','",$sql);
			   mysql_query($sql2) or die ("Errore sulla query di INSERT tabella: ".mysql_error());
			   //echo "" .$sql2 ."<BR>";
			}
			
			
			
			
            header ("Location: dama_ElencoTiratoriGara.php");
            /* Redirect browser to starjokes.com  web site */
            exit;    // Closes further script execution

            }

			
			if ($MyCmd == 'esporta'){
				
				$NomeGara=$_GET['NomeGara'];
				$MioNomeGara = str_replace(' ', '_', $NomeGara);
				
				$csv_output="\n";
				$values = mysql_query("SELECT Tessera, Nome, Classe, Categoria, Fascia, Division, Club, MatchType, DataGara, Turno, Gruppo FROM " .$MioNomeGara ."");
				//$values = mysql_query("SELECT * FROM " .$MioNomeGara ."");
				//$Colonne=SHOW COLUMNS FROM 
				$csv_output  .= 'ID;Tessera;Nome;Classe;Categoria;Fascia;Divisione;Club;TipoGaraSteel;DataGara;Turno;Gruppo';
				
				$MieiTutti=11;
				
				$csv_output .="\n";
				while ($rowr = mysql_fetch_row($values)) {
				$csv_output .= ";";
				for ($j=0;$j<$MieiTutti;$j++) {
				$csv_output .= $rowr[$j].";";
				}
				$csv_output .= "\n";
				}
				
				//echo "OK:" .$csv_output ."";
				
				//exit;
				
				$filename = "Export_".date("Y-m-d_H-i",time());
				//header("Content-type: application/vnd.ms-excel");
				//header("Content-disposition: csv" . date("Y-m-d") . ".csv");
				//header( "Content-disposition: filename=".$filename.".csv");
				
				// Output to browser with appropriate mime type, you choose ;)
				//header("Content-type: text/x-csv");
				header("Content-type: text/csv");
				//header("Content-type: application/csv");
				header("Content-Disposition: attachment; filename=".$filename.".csv");

				print $csv_output;
				
				
				//header ("Location: dama_Gare.php?cmd=list");
            /* Redirect browser to starjokes.com  web site */
            exit;    // Closes further script execution
			}
			


            if ($MyCmd == 'set'){

            $NomeGara = $_GET['NomeGara'];
            $myFile = "GaraAttiva.txt";
            $fh = fopen($myFile, 'w') or die("can't open file");
            $stringData = "" .$NomeGara ."";
            fwrite($fh, $stringData);
            fclose($fh);
            header ("Location: dama_Gare.php?cmd=list");
            /* Redirect browser to starjokes.com  web site */
            exit;    // Closes further script execution

            }

            if ($MyCmd == 'backup'){

                $NomeGara = $_GET['NomeGara'];
                $MioNomeGara = str_replace(' ', '_', $NomeGara);
                
				// BACKUP DATI GARA
				
				
				$csv_output="\n";
				$values = mysql_query("SELECT NomeGara, DataGara, Area, NumeroStages, SC101, SC102, SC103, SC104, SC105, SC106, SC107, SC108 FROM Gare where NomeGara='" .$NomeGara ."'");
				//$values = mysql_query("SELECT * FROM " .$MioNomeGara ."");
				//$Colonne=SHOW COLUMNS FROM 
				$csv_output  .= 'ID;NomeGara;DataGara;Area;NumeroStages;SC101;SC102;SC103;SC104;SC105;SC106;SC107;SC108';
				
				$MieiTutti=12;
				
				$csv_output .="\n";
				while ($rowr = mysql_fetch_row($values)) {
				$csv_output .= ";";
				for ($j=0;$j<$MieiTutti;$j++) {
				$csv_output .= $rowr[$j].";";
				}
				$csv_output .= "\n";
				}
				//$filename = "Export_".date("Y-m-d_H-i",time());
				//header("Content-type: text/csv");
				//header("Content-Disposition: attachment; filename=".$filename.".csv");
				//print $csv_output;
				$myFile = "../../../../../../../DatiGara.csv";
				$fh = fopen($myFile, 'w') or die("can't open file");
				$stringData = "" .$csv_output ."";
				fwrite($fh, $stringData);
				fclose($fh);
				
				
				// ********************** FINE BACKUP DATI GARA
				
				
				$MioFileFrm = "../../../mysql/data/steel/" .$MioNomeGara .".frm";
                $MioFileMYD = "../../../mysql/data/steel/" .$MioNomeGara .".MYD";
                $MioFileMYI = "../../../mysql/data/steel/" .$MioNomeGara .".MYI";
                $MioFileCSV = "../../../../../../../DatiGara.csv";
				$MioZip = "../../../../../../../BackUp/" .$MioNomeGara .".zip";

                require ("zipfile.inc.php");
                $zipfile = new zipfile();
                $filedataFrm = implode("", file($MioFileFrm));
                $filedataMYD = implode("", file($MioFileMYD));
                $filedataMYI = implode("", file($MioFileMYI));
				$filedataCSV = implode("", file($MioFileCSV));
                //$zipfile->add_dir("../../../../../../../Utility");
                $zipfile->add_file($filedataFrm, "" .$MioNomeGara .".frm");
                $zipfile->add_file($filedataMYD, "" .$MioNomeGara .".MYD");
                $zipfile->add_file($filedataMYI, "" .$MioNomeGara .".MYI");
				$zipfile->add_file($filedataCSV, "DatiGara.csv");
                // set file to write
                $file = $MioZip; //"zipfile.zip";
                // open file
                $fh = fopen($file, "w") or die("Could not open file for writing!");
                // write to file
                fwrite($fh, $zipfile->file()) or die("Could not write to file");
                // close file
                fclose($fh);

                echo "<BR>";
                echo "<BR>";
                echo "<BR>";
                echo "<B><center>";
                echo "BACKUP ESEGUITO CORRETTAMENTE.<BR><BR>
                     File di BackUp: " .$MioNomeGara .".zip<BR><BR>
                     Il file si trova nella cartella BackUp.<BR><BR>
                     ";
                echo "<BR>";
                echo "<BR>";
                echo "<BR>";
            }
			
			if ($MyCmd == 'restore'){
			//$NomeGara = $_GET['NomeGara'];
			echo "<center><table><tr>
			<FORM enctype='multipart/form-data' METHOD='POST' ACTION='./dama_Gare.php?cmd=restored'>
			<td class='forumheader3'><span style='text-decoration:underline'>Seleziona il File ZIP</span></td>
			<td class='forumheader3'><input class='tbox' style='width:90%'  id='file_realpath' name='file_userfile' type='file' size='47' /></td>
			</tr><tr>
			<td class='forumheader3' colspan='2'><span style='text-decoration:underline'><center><input type='submit' value='IMPORTA'></span></td>
			</tr>
			</table></center>";
			}
			
			if ($MyCmd == 'restored'){
			
			include('pclzip.lib.php');
			
			$MioFile = $_FILES['file_userfile'];
            $MioFile2 = str_replace("\'","\\",$MioFile['tmp_name']);
			//$fcontents = file ($MioFile2);
			//zip file to extract
			$archive = new PclZip($MioFile2);
			
			//extract to a folder called newdir
			if ($archive->extract(PCLZIP_OPT_PATH, '../../../../../../../Tmp') == 0) 
			{
			//failed
			die("Error : ".$archive->errorInfo(true));
			}
			echo "1) Estrazione dei file COMPLETATA.<BR><BR>";
			
			
			
			
			$MioNomeFile=substr($MioFile['name'],0,-4);
			
			$file1 = '../../../../../../../Tmp/' .$MioNomeFile .'.frm';
			$file2 = '../../../../../../../Tmp/' .$MioNomeFile .'.MYD';
			$file3 = '../../../../../../../Tmp/' .$MioNomeFile .'.MYI';
			$newfile1 = '../../../mysql/data/steel/' .$MioNomeFile .'.frm';
			$newfile2 = '../../../mysql/data/steel/' .$MioNomeFile .'.MYD';
			$newfile3 = '../../../mysql/data/steel/' .$MioNomeFile .'.MYI';
			$fcontents = file ('../../../../../../../Tmp/DatiGara.csv');
			
			if (!copy($file1, $newfile1)) {
				echo "2) Copia dei File DB FALLITA.<BR><BR>";
			}
			else {
				echo "2) Copia dei File DB COMPLETATA.<BR><BR>";
				}
			if (!copy($file2, $newfile2)) {
				echo "2) Copia dei File DB FALLITA.<BR><BR>";
			}
			else {
				echo "2) Copia dei File DB COMPLETATA.<BR><BR>";
				}
			if (!copy($file3, $newfile3)) {
				echo "2) Copia dei File DB FALLITA.<BR><BR>";
			}
			else {
				echo "2) Copia dei File DB COMPLETATA.<BR><BR>";
				}
			
			// ORA IMPORTA LA CONFIGURAZIONE DELLA GARA NELLA TABELLA GARE
			for($i=2; $i<sizeof ($fcontents); $i++) {
			   $line = trim($fcontents[$i]);
			   $arr = explode("\t", $line);
			   $sql = "insert into Gare values ('".implode("';'", $arr) ."')";
			   $sql2= str_replace(";","','",$sql);
			   //echo "SQL: " .substr($sql2,0,-4) ."<BR>";
			   $sql3="" .substr($sql2,0,-4) .")";
			   mysql_query($sql3) or die ("Errore sulla query di INSERT tabella: ".mysql_error());
			   echo "3) Importazione dati Configurazione GARA COMPLETATA.<BR><BR>";
			}
			
			delete_directory("../../../../../../../Tmp");
			
			
            //header ("Location: dama_ElencoTiratoriGara.php");
            /* Redirect browser to starjokes.com  web site */
            //exit;    // Closes further script execution

            }
			
			
			if ($MyCmd == 'Del'){
				
				$query = "SELECT * FROM gare WHERE NomeGara !='2011 Base'";
            	$result = mysql_query($query) or die ("Errore sulla query LIST: ".mysql_error());
				
				echo "<BR>";
				echo "<center>";
				echo "<FORM METHOD='POST' ACTION='dama_Gare.php?cmd=Delete'>";
				echo "<TABLE BORDER='1'>";
				echo "<TR><TH colspan='2'><B>ELENCO GARE INSERITE</B></TH></TR>";
				echo "<TR>";
				echo "<TH><center><B>SELEZIONA</B></center></TH>";
				echo "<TH><center><B>NOME GARA</B></center></TH></TR>";
				while ($row = mysql_fetch_array($result))
               		{
                   		$IDGara = $row['ID'];
						$NomeGara = $row['NomeGara'];
				   		echo "<TR><TD style='width:20px;'><CENTER><input type='radio' name='Cancella[]' value='" .$IDGara .";" .$NomeGara ."'></CENTER></TD>";
						echo "<TD style='width:300px;'>" .$NomeGara ."</TD></TR>";
				   
			   		}
				echo "<TR>";
				echo "<TD COLSPAN=2 style='width:200px;'><BR><center><input type='submit' value='CANCELLA GARE'><BR><BR></TD>";
				echo "</TR>";
				echo "</TABLE></FORM><BR><BR>";

			
			}
			
			if ($MyCmd == 'Delete'){
				
				$C=1;
				$GareToDelete='';
				foreach($_POST['Cancella'] as $Cancella){
					$Gare=split(';',$Cancella);
					$GareToDelete=$Gare[0];
					$NomeGareToDelete=$Gare[1];
					
				}
				
				echo "<FORM METHOD='POST' ACTION='dama_Gare.php?cmd=DeleteOK'>";
				echo "<TABLE BORDER='1'>";
				echo "<TR>";
				echo "<TH colspan='2'><H2><CENTER>ATTENZIONE</CENTER><BR><BR>
						<CENTER>SI STA PROCEDENDO CON LA<BR>CANCELLAZIONE DELLA GARA:<BR><BR>
						" .$NomeGareToDelete ."<BR><BR>
						CONTINUARE?</CENTER></H2><BR><BR><input type='hidden' name='GareToDelete' value='" .$Cancella ."'></TH></TR>";
						
				echo "<TR><TD><CENTER><input type='submit' name='OK' value='ESEGUI CANCELLAZIONE'></TD>";
				echo "<TD><input type='submit' name='CANCEL' value='NON CANCELLARE'></CENTER></TD></TR></TABLE></FORM>";
	
			}
			
			if ($MyCmd == 'DeleteOK'){
			
			
				if ($_POST['OK']){
					$Tutte=$_REQUEST['GareToDelete'];
					$Gare=split(';',$Tutte);
					$GareToDelete=$Gare[0];
					$NomeGareToDelete=$Gare[1];
					
					if ($NomeGareToDelete!=NOMEGARA){
					
					$QueryDelete="DELETE FROM gare WHERE ID='" .$GareToDelete ."'";
					$TableName=str_replace(" ","_",$NomeGareToDelete);
					$QueryDrop = "DROP TABLE " .$TableName ."";
					//echo "" .$QueryDrop ."<BR>";
					$result = mysql_query($QueryDelete) or die ("Errore sulla query DELETE: ".mysql_error());
					$result = mysql_query($QueryDrop) or die ("Errore sulla query DROP: ".mysql_error());
					echo "<TABLE BORDER='1'>";
					echo "<TR>";
					echo "<TH colspan='2'><H2><CENTER>ATTENZIONE</CENTER><BR><BR>
							<CENTER>LA GARA<BR><BR>" .$NomeGareToDelete ."<BR><BR>E' STATA CANCELLATA.<BR><BR></CENTER></H2></TR></TABLE>";
					}
					else {
						echo "<TABLE BORDER='1'>";
						echo "<TR>";
						echo "<TH colspan='2'><H2><CENTER>ATTENZIONE</CENTER><BR><BR>
								<CENTER>LA GARA NON E' STATA CANCELLATA.<BR><BR>IN QUANTO RISULTA ESSERE LA GARA ATTIVA.<BR><BR></CENTER></H2></TR></TABLE>";
						mysql_close($connection);
						require_once(FOOTERF);
						exit;
					}
				}
				else {
					echo "<TABLE BORDER='1'>";
					echo "<TR>";
					echo "<TH colspan='2'><H2><CENTER>ATTENZIONE</CENTER><BR><BR>
							<CENTER>LA GARA NON E' STATA CANCELLATA.<BR><BR></CENTER></H2></TR></TABLE>";
				}
			}
			

            mysql_close($connection);

            require_once(FOOTERF);


function delete_directory($dirname) {
   if (is_dir($dirname))
      $dir_handle = opendir($dirname);
   if (!$dir_handle)
      return false;
   while($file = readdir($dir_handle)) {
      if ($file != "." && $file != "..") {
         if (!is_dir($dirname."/".$file))
            unlink($dirname."/".$file);
         else
            delete_directory($dirname.'/'.$file);    
      }
   }
   closedir($dir_handle);
   rmdir($dirname);
   return true;
}

?>
