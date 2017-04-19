<?php



require_once('./class2.php');

require_once(HEADERF);



$connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



$MyCmd = $_GET['cmd'];



          if ($MyCmd == 'delete'){



             $ID = $_GET["ID"];



                echo "<center><B>ELIMINARE LA PRESTAZIONE?</B></center>";



                 $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $query = "SELECT * FROM " .$MioNomeGara ." WHERE ID =" .$ID ."";

              $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());





               while ($row = mysql_fetch_array($result))

               {

                   $MyID = $row['ID'];

                   $MyNome = $row['Nome'];

                   $MyCognome = $row['Cognome'];

               }



               echo "<BR><center>

                    Nome: " .$MyNome ."<BR>

                    Cognome: " .$MyCognome ."<BR><BR>

                    <a href='./es_ElencoTiratoriGara.php?cmd=erase&ID=" .$MyID ."'>ELIMINA</a>

                    <a href='./es_ElencoTiratoriGara.php'>ANNULLA</a>

                    <BR><BR>";

               }



          //}





          if ($MyCmd == 'erase'){



              $ID = $_GET["ID"];

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $query = "DELETE FROM " .$MioNomeGara ." WHERE ID='" .$ID ."'";

              $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());



          }



          //if ($MyCmd == 'show'){

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $query = "SELECT * FROM " .$MioNomeGara ." ORDER BY ID DESC";

              $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());



              $NomiColonne = mysql_column_names($MioNomeGara, $connection);

              $Numero = count($NomiColonne)-1;

              //echo "Lunghezza Array: " .$Numero ."";

              echo "<div class='miocentro'>";



              //echo "<font color='#3e3e3e'><BR><B>GARA:" .NOMEGARA ."<BR><BR><B>";

              echo "<center>";

              echo "<TABLE BORDER='1'>";

              //echo "<TH COLSPAN=4><B>ELENCO GARE INSERITE</B></TH>";

              echo "<TR>";

              $i=0;

              $n=1;

              echo "<TH></TH>";

              while($i<=$Numero){

                                 echo "<TH><center><B><font color='#5179bc'>" .$NomiColonne[$i] ."</font></B></center></TH>";

                                 $i++;

                                 $n++;

              }



              echo "</TR>";

              $m=0;

              $Numero = count($NomiColonne)-1;

              while ($row = mysql_fetch_array($result))

                  {

                     echo "<TR>";

                     echo "<TD><center><a href='./statino_pdf.php?ID=" .$row['ID'] ."'><img src='printer.png' title='Stampa Statino Tiratore'/></a></TD>";

                     for($m=0; $m <= $Numero; $m++){

                                        $NomeCol=$NomiColonne[$m];

                                        echo "<TD><font color='#3e3e3e'>" .$row[$NomeCol] ."</font></TD>";

                                        //$m++;

                                        }

                     echo "<TD><center><a href='./es_ElencoTiratoriGara.php?cmd=delete&ID=" .$row['ID'] ."'><img src='delete_16.png' title='ELIMINA PRESTAZIONE'/></a></TD>";

                     echo "</TR>";

              }



              echo "</TABLE></font></div>";



          //}









mysql_close($connection);

require_once(FOOTERF);



function mysql_column_names($table,$link) {

  $query = "SELECT * FROM {$table}";

  $result = mysql_query($query,$link);

  $row = mysql_fetch_assoc($result);

  $columns = array_keys($row);

  return $columns;

}



?>

