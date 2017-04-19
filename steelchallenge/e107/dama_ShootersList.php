<?php
               require_once('class2.php');
               require_once(HEADERF);
               include('index_include.php');

if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}

               $connection = mysql_connect("localhost", "atsverona", "Jump02052012")
                           or die ("NON è possibile stabilire una connessione.");

               $db = mysql_select_db("atsveron_steel", $connection)
                           or die ("NON è possibile selezionare il DB.");

               $MyCercaNome = $_REQUEST["CercaNome"];
               $MyCercaCognome = $_REQUEST["CercaCognome"];
               $TrovaN = $_GET['Nome'];
               $TrovaC = $_GET['Cognome'];
               if ($TrovaN != "" and $TrovaC != ""){

                  $MyCercaNome = $TrovaN;
                  $MyCercaCognome = $TrovaC;

               }

               $query = "SELECT ID, Cognome, Nome FROM shooters
                        WHERE Nome LIKE '%" .$MyCercaNome ."%'
                        AND Cognome LIKE '%" .$MyCercaCognome ."%'
                        ORDER BY Cognome";

               $result = mysql_query($query)
                       or die ("Errore sulla query: ".mysql_error());

               echo "<TABLE BORDER='1'>";
               echo "<TH COLSPAN=6><center><B>CERCA</B></center></TH>";
               echo "<FORM METHOD='POST' ACTION='dama_ShootersList.php'>";
               echo "<TR>";
               echo "<TD style='width:80px;'><B>COGNOME</B></TD>";
               echo "<TD style='width:80px;'><input type='TEXT' name='CercaCognome' value=''></TD>";
               echo "<TD style='width:80px;'>  </TD>";
               echo "<TD style='width:80px;'><B>NOME</B></TD>";
               echo "<TD style='width:80px;'><input type='TEXT' name='CercaNome' value=''></TD>";
               echo "<TD style='width:80px;'><input type='submit' value='CERCA'></TD>";
               echo "</TR>";
               echo "</TABLE>";
               echo "<BR>";

               echo "<TABLE BORDER='1'>";
               echo "<TR>";
               echo "<TH style='width:80px;'>AGGIUNGI<br>A<br>GARA</TH>
                    <TH style='width:150px;'>COGNOME</TH>
                    <TH style='width:150px;'>NOME</TH>
                    <TH COLSPAN=2 style='width:50px;'>COMANDI</TH>";
                    //<TH style='width:50px;'>ELIMINA</TH>";
               echo "</TR>";

               $MyCounter = 0;

               while ($row = mysql_fetch_array($result))
               {
                   echo "<TR>";

                   echo "<TD bgcolor='#FFFFFF'><center><a href='./dama_AggiungiTiratore.php?cmd=add&ID=" .$row['ID'] ."'><img src='extended_16.png' title='Aggiungi Tiratore alla gara'/></a></TD>
                        <TD>", $row['Cognome'], "</TD>
                        <TD>", $row['Nome'],"</TD>
                        <TD bgcolor='#FFFFFF'><center><a href='./dama_ModificaShooter.php?cmd=edit&ID=" .$row['ID'] ."'><img src='edit_16.png' title='Modifica Tiratore'/></a></center></TD>
                        <TD bgcolor='#FFFFFF'><center><a href='./dama_ModificaShooter.php?cmd=del&ID=" .$row['ID'] ."'><img src='delete_16.png' title='Elimina Tiratore'/></a></center></TD>";
                   echo "</TR>";

                   $MyCounter = $MyCounter + 1;
               }



               echo "</TABLE>";

               echo "<br><b>";
               echo "TOTALE TIRATORI: " .$MyCounter ."";

               mysql_close($connection);



               echo "<br>";

               require_once(FOOTERF);



?>


