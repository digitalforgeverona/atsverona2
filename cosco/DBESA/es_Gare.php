<?php



            require_once('class2.php');

            require_once(HEADERF);

            //include "connessione.php";



            $connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



            $db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



            $MyCmd = $_GET['cmd'];

            

            if ($MyCmd == ''){

            echo "<BR>";

            echo "<center>";

            echo "<FORM METHOD='POST' ACTION='es_Gare.php?cmd=salva'>";

            //echo "<FORM METHOD='POST' ACTION='test.php'>";

            echo "<TABLE BORDER='1'>";

            echo "<TH COLSPAN=2><B>CONFIGURA NUOVA GARA</B></TH>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>NOME GARA</B></TD>";

            echo "<TD style='width:150px;'><input type='TEXT' name='NomeGara' value=''></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>NUMERO STAGES</B></TD>";

            echo "<TD style='width:30px;'><input type='TEXT' name='NumeroStages' value=''></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>PREZZO GARA</B></TD>";

            echo "<TD style='width:30px;'><input type='TEXT' name='PrezzoGara' value=''></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>PREZZO RIENTRO</B></TD>";

            echo "<TD style='width:30px;'><input type='TEXT' name='PrezzoRientro' value=''></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>PUNTI MASSIMI</B><BR>

                 Inserire i singoli punti massimi di ogni stage separati da virgola. (Es: 50,40,60)

                 </TD>";

            echo "<TD style='width:30px;'><input type='TEXT' name='PuntiMassimi' value=''></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>NUMERO COLPI</B><BR>

                 Inserire il numero di colpi di ogni stage separati da virgola. (Es: 10,15,20)</TD>";

            echo "<TD style='width:30px;'><input type='TEXT' name='NumeroColpi' value=''></TD>";

            echo "</TR>";

			echo "<TR>";

            echo "<TD style='width:150px;'><B>VERSIONE 2012</B><BR>

                 Selezionare se si desidera utilizzare il metodo di conteggio basato su 2 risultati</TD>";

            echo "<TD style='width:30px;'><input type='checkbox' name='NewMode' value='1' checked/></TD>";

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

			$NewMode = $_REQUEST["NewMode"];	

            $NomeGara = "" .$MioAnno ." " .$_REQUEST["NomeGara"] ."";

            $NumeroStages = $_REQUEST["NumeroStages"];

            $PuntiMassimi = $_REQUEST["PuntiMassimi"];

            $NumeroColpi = $_REQUEST["NumeroColpi"];

            $PrezzoGara = str_replace(',', '.', $_REQUEST["PrezzoGara"]);

            $PrezzoRientro = str_replace(',', '.', $_REQUEST["PrezzoRientro"]);

            $queryI = "INSERT INTO gare (NomeGara, NumeroStages, PuntiMassimi, NumeroColpi, PrezzoGara, PrezzoRientro)

                       VALUES('" .$NomeGara ."',

                                 '" .$NumeroStages ."',

                                 '" .$PuntiMassimi ."',

                                 '" .$NumeroColpi ."',

                                 '" .$PrezzoGara ."',

                                 '" .$PrezzoRientro ."')";

            $result = mysql_query($queryI)

                       or die ("Errore sulla query di Inserimento Gara: ".mysql_error());





            $myFile = "GaraAttiva.txt";

            $fh = fopen($myFile, 'w') or die("can't open file");

            $stringData = "" .$NomeGara ."";

            fwrite($fh, $stringData);

            fclose($fh);

            

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





               $MioNomeGara = str_replace(' ', '_', $NomeGara);



               $QueryCreate = "CREATE TABLE " .$MioNomeGara ."

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

                        TotalePunti DOUBLE,

                        Percentuale DOUBLE,

                        Chiamato TINYINT(1)

                        )";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella: ".mysql_error());

            

 // AGGIUNGE LA TABELLA PER LE 2 PRESTAZIONI SE SELEZIONATO IL FLAG

 

 			if ($NewMode == 1){

				

			   $NumeroStages = 2;

			   $NomeGara = "" .$NomeGara ."_Def";

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





               $MioNomeGara = str_replace(' ', '_', $NomeGara);



               $QueryCreate = "CREATE TABLE " .$MioNomeGara ."

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

                        TotalePunti DOUBLE,

                        Percentuale DOUBLE

                        )";



               $result = mysql_query($QueryCreate)

                       or die ("Errore sulla query di creazione tabella: ".mysql_error());

				

				}

			

			

			mysql_close($connection);

            //echo "Prezzo: " .$PrezzoRientro ."";

            header ("Location: es_Gare.php?cmd=list");

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

            echo "<TH COLSPAN=7><B>ELENCO GARE INSERITE</B></TH>";

            echo "<TR>";

            echo "<TH><center><B>NOME GARA</B></center></TH>";

            echo "<TH><center><B>NUMERO STAGES</B></center></TH>";

            echo "<TH><center><B>PUNTI MASSIMI</B></center></TH>";

            echo "<TH><center><B>NUMERO COLPI</B></center></TH>";

            echo "<TH><center><B>GARA</B></center></TH>";

            echo "<TH><center><B>RIENTRI</B></center></TH>";

            echo "<TH><center><B>ATTIVA</B></center></TH>";

            //echo "<TH><center><B>BACKUP</B></center></TH>";

            while ($row = mysql_fetch_array($result))

               {

                   $NomeGara = $row['NomeGara'];

                   $NumeroStages = $row['NumeroStages'];

                   $PuntiMassimi = $row['PuntiMassimi'];

                   $NumeroColpi = $row['NumeroColpi'];

                   $PrezzoGara = $row['PrezzoGara'];

                   $PrezzoRientro = $row['PrezzoRientro'];

            echo "<TR>";

            echo "<TD style='width:150px;'>" .$NomeGara ."</TD>";

            echo "<TD style='width:30px;'><center>" .$NumeroStages ."</center></TD>";

            echo "<TD style='width:30px;'><center>" .$PuntiMassimi ."</center></TD>";

            echo "<TD style='width:30px;'><center>" .$NumeroColpi ."</center></TD>";

            echo "<TD style='width:30px;'><center>" .$PrezzoGara ."</center></TD>";

            echo "<TD style='width:30px;'><center>" .$PrezzoRientro ."</center></TD>";

            echo "<TD style='width:30px;'><center><a href='./es_Gare.php?cmd=set&NomeGara=" .$row['NomeGara'] ."'><img src='arrow_16.png' title='Attiva Gara'/></a></center></TD>";

            //echo "<TD style='width:30px;'><center><a href='./es_Gare.php?cmd=bck&NomeGara=" .$row['NomeGara'] ."'><img src='BackUp.png' title='BackUp Gara'/></a></center></TD>";

            echo "</TR>";

               }

            echo "</TABLE>";

            echo "<BR>";

            echo "<BR>";



            }

            

            if ($MyCmd == 'set'){



            $NomeGara = $_GET['NomeGara'];

            $myFile = "GaraAttiva.txt";

            $fh = fopen($myFile, 'w') or die("can't open file");

            $stringData = "" .$NomeGara ."";

            fwrite($fh, $stringData);

            fclose($fh);

            header ("Location: es_Gare.php?cmd=list");

            /* Redirect browser to starjokes.com  web site */

            exit;    // Closes further script execution



            }

            

            if ($MyCmd == 'bck'){



                $NomeGara = $_GET['NomeGara'];

                $MioNomeGara = str_replace(' ', '_', $NomeGara);

                $MioFileFrm = "../../../mysql/data/esagonale/" .$MioNomeGara .".frm";

                $MioFileMYD = "../../../mysql/data/esagonale/" .$MioNomeGara .".MYD";

                $MioFileMYI = "../../../mysql/data/esagonale/" .$MioNomeGara .".MYI";

                $MioZip = "../../../../../../../" .$MioNomeGara .".zip";



                require ("zipfile.inc.php");

                $zipfile = new zipfile();

                $filedataFrm = implode("", file($MioFileFrm));

                $filedataMYD = implode("", file($MioFileMYD));

                $filedataMYI = implode("", file($MioFileMYI));

                //$zipfile->add_dir("../../../../../../../Utility");

                $zipfile->add_file($filedataFrm, "" .$MioNomeGara .".frm");

                $zipfile->add_file($filedataMYD, "" .$MioNomeGara .".MYD");

                $zipfile->add_file($filedataMYI, "" .$MioNomeGara .".MYI");

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

                     Il file si trova nella cartella principale<BR>

                     del programma.<BR><BR>

                     Inviare il file a: <a href='mailto:davide.brutto@atsverona.it?subject=BACKUP GARA ESAGONALE&body=In allegato il file di BackUp

                     '>davide.brutto@atsverona.it</a><BR><BR>

                     RICORDANDOSI DI ALLEGARE IL FILE.";

                echo "<BR>";

                echo "<BR>";

                echo "<BR>";









            }

            

            mysql_close($connection);



            require_once(FOOTERF);



?>

