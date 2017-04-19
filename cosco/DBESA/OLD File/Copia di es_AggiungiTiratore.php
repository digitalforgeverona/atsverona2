<?php

require_once('class2.php');
require_once(HEADERF);

$connection = mysql_connect("localhost", "root", "")
                           or die ("NON è possibile stabilire una connessione.");

$db = mysql_select_db("esagonale", $connection)
                           or die ("NON è possibile selezionare il DB.");

$MyCmd = $_GET['cmd'];

       if ($MyCmd == 'add'){

          $MioNomeGara = str_replace(' ', '_', NOMEGARA);
          $GareFatte = Array();
          $ID = $_GET['ID'];
          $query = "SELECT * FROM shooters WHERE ID=" .$ID ."";
          $result = mysql_query($query)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());
          $row = mysql_fetch_array($result) or die(mysql_error());
          $Nome = $row['Nome'];
          $Cognome = $row['Cognome'];
          $Classe = $row['Classe'];
          $Esordiente = $row['Esordiente'];
          $Senior = $row['Senior'];
          $Lady = $row['Lady'];
          
          $queryD = "SELECT NomeDivisione FROM Divisioni";
          $resultD = mysql_query($queryD)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());
          $queryTG = "SELECT TipoGara FROM TipoGara";
          $resultTG = mysql_query($queryTG)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

          // VERIFICA SE IL TIRATORE E' GIA' PRESENTE IN GARA
          
          $QueryVerifica = "SELECT * FROM " .$MioNomeGara ." WHERE Nome='" .$Nome ."' AND Cognome='" .$Cognome ."'";
          $resultVerifica = mysql_query($QueryVerifica)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());



          while ($rowVerifica = mysql_fetch_array($resultVerifica)){

                if ($rowVerifica['TipoProva']='ISCRIZIONE'){

                   $GareFatte[]=$rowVerifica['Divisione'];

                }

          }
                       
          echo "<BR>";
          echo "<center>";
          //echo "Controllo: " .count($GareFatte) ."";
          $TotGareFatte=count($GareFatte)-1;
          //echo "Controllo: " .$TotGareFatte ."";
          for ($NumGareFatte=0; $NumGareFatte<=$TotGareFatte; $NumGareFatte++){

              echo "ISCRIZIONE GIA' INSERITA PER: " .$GareFatte[$NumGareFatte] ."<BR>";

          }
          
          
          echo "<FORM METHOD='POST' ACTION='es_AggiungiTiratore.php?cmd=salva&ID=" .$ID ."'>";
          echo "<TABLE BORDER='1'>";
          echo "<TH COLSPAN=2><B>INSERIMENTO TIRATORE IN GARA</B></TH>";
          echo "<TR>";
          echo "<TD style='width:150px;'><B>NOME</B></TD>";
          echo "<TD style='width:150px;'>" .$Nome ."</TD>";
          //echo "<TD style='width:30px;'><input type='hidden' name='Nome' value='" .$Nome ."'></TD>";
          echo "</TR>";
          echo "<TR>";
          echo "<TD style='width:150px;'><B>COGNOME</B></TD>";
          echo "<TD style='width:150px;'>" .$Cognome ."</TD>";
          echo "</TR>";
          echo "<TR>";
          echo "<TD style='width:150px;'><B>DIVISIONE</B></TD>";
          echo "<TD style='width:150px;'><SELECT NAME='Divisione'>";
          while ($row = mysql_fetch_array($resultD))
                  {
                     echo "<OPTION>" .$row['NomeDivisione'] ."</OPTION>";
              }
          echo "</SELECT></TD>";
          echo "</TR>";
          echo "<TR>";
          echo "<TD style='width:150px;'><B>TIPO PROVA</B></TD>";
          echo "<TD style='width:150px;'><SELECT NAME='TipoGara'>";
          while ($row = mysql_fetch_array($resultTG))
                  {
                     echo "<OPTION>" .$row['TipoGara'] ."</OPTION>";
              }
          echo "</SELECT></TD>";
          echo "</TR>";
          echo "<TR>";
          echo "<TD COLSPAN=2 style='width:200px;'><BR><center><input type='submit' value='AGGIUNGI'><BR>.</TD>";
          echo "</TR>";
          echo "</TABLE>";
          echo "<BR>";
          echo "<BR>";

       }


          if ($MyCmd == 'salva'){
          
             $ID = $_GET['ID'];
             $query = "SELECT * FROM shooters WHERE ID=" .$ID ."";
             $result = mysql_query($query)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());
             $row = mysql_fetch_array($result) or die(mysql_error());
             $Nome = $row['Nome'];
             $Cognome = $row['Cognome'];
             $Classe = $row['Classe'];
             $Esordiente = $row['Esordiente'];
             $Senior = $row['Senior'];
             $Lady = $row['Lady'];
             $Squadra = $row['Squadra'];
             $Divisione = $_REQUEST["Divisione"];
             $TipoGara = $_REQUEST["TipoGara"];
             $MioNomeGara = str_replace(' ', '_', NOMEGARA);

             $queryI = "INSERT INTO " .$MioNomeGara ." (Nome, Cognome, Classe, Squadra, Divisione, TipoProva, Esordiente, Senior, Lady)
                       VALUES('" .$Nome ."',
                                 '" .$Cognome ."',
                                 '" .$Classe ."',
                                 '" .$Squadra ."',
                                 '" .$Divisione ."',
                                 '" .$TipoGara ."',
                                 '" .$Esordiente ."',
                                 '" .$Senior ."',
                                 '" .$Lady ."')";
              $resultI = mysql_query($queryI)
                       or die ("Errore sulla query di Inserimento Gara: ".mysql_error());

              //echo "<BR><BR><center><B>INSERIMENTO ESEGUITO CORRETTAMENTE</B></center><BR><BR>";
              //header ("Location: es_ElencoTiratoriGara.php?cmd=show");
              header ("Location: es_ElencoTiratoriGara.php");
              /* Redirect browser to starjokes.com  web site */
              exit;    // Closes further script execution
          }
          
          if ($MyCmd == 'show'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $query = "SELECT * FROM " .$MioNomeGara ." ORDER BY ID DESC";
              $result = mysql_query($query)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

              $NomiColonne = mysql_column_names($MioNomeGara, $connection);
              $Numero = count($NomiColonne);
              //echo "Lunghezza Array: " .$Numero ."";
              echo "<BR>";
              echo "<center>";
              echo "<TABLE BORDER='1'>";
              //echo "<TH COLSPAN=4><B>ELENCO GARE INSERITE</B></TH>";
              echo "<TR>";
              $i=0;
              $n=1;
              while($i<=$Numero){
              echo "<TH><center><B>" .$NomiColonne[$i] ."</B></center></TH>";
              $i++;
              $n++;
              }
              echo "</TR>
                   </TABLE>";

              /*
              echo "<BR>";
              echo "<center>";
              echo "<TABLE BORDER='1'>";
              //echo "<TH COLSPAN=4><B>ELENCO GARE INSERITE</B></TH>";
              echo "<TR>";
              echo "<TH><center><B>NOME GARA</B></center></TH>";
              echo "<TH><center><B>NUMERO STAGES</B></center></TH>";
              echo "<TH><center><B>PUNTI MASSIMI</B></center></TH>";
              echo "<TH><center><B>ATTIVA</B></center></TH>";
              */
          }


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
