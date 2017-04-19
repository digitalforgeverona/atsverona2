

<?php

             

             require_once('class2.php');

             require_once(HEADERF);



             

               $connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



               $cmd = $_GET["cmd"];

               $ID = $_GET["ID"];



               if ($cmd == 'show'){



               //$ID = $_REQUEST["ID"];



               //$queryS = "SELECT NomeSquadra FROM Squadre ORDER BY NomeSquadra";

               //$resultS = mysql_query($queryS)

               //        or die ("Errore sulla query di ricerca tiratore: ".mysql_error());



               echo "<br>";

               $query = "SELECT * FROM Squadre ORDER BY NomeSquadra";

               $result = mysql_query($query)

                       or die ("Errore sulla query: ".mysql_error());



              echo "<center>";

              echo "<TABLE BORDER='1'>";

              echo "<TR>";

              echo "<TH COLSPAN=2><center><B><font color='#FFFFFF'>ELENCO SQUADRE</font></B></center></TH>";

              echo "</TR>";

              echo "<TR>";

              //echo "<TH><center><B><font color='#FFFFFF'>Nome Squadra</font></B></center></TH>";

              //echo "<TH><center><B><font color='#FFFFFF'></font></B></center></TH>";

              echo "</TR>";



               while ($row = mysql_fetch_array($result))

               {

                   echo "<TR>";

                   echo "<TD>" .$row['NomeSquadra'] ."</TD>";

                   echo "<TD bgcolor='#FFFFFF'><center><a href='./es_Squadre.php?cmd=del&ID=" .$row['ID'] ."'><img src='delete_16.png' title='Elimina Squadra'/></a></center></TD>";

                   //echo "<TD></TD>";

                   echo "</TR>";



               }



               echo "<TH COLSPAN=2><center><a href='./es_Squadre.php?cmd=add'>AGGIUNGI SQUADRA</a></center></TD>";



               echo "</TABLE>";

               echo "<BR>";

               echo "<BR>";

               echo "<BR>";

               

           }

               

               

               if ($cmd == 'add'){



                   echo "<BR>";

                   echo "<center>";

                   echo "<FORM METHOD='POST' ACTION='es_Squadre.php?cmd=salva'>";

                   echo "<TABLE BORDER='1'>";

                   echo "<TH COLSPAN=2><B>CONFIGURA NUOVA SQUADRA</B></TH>";

                   echo "<TR>";

                   echo "<TD style='width:150px;'><B>NOME SQUADRA</B></TD>";

                   echo "<TD style='width:250px;'><input type='TEXT' name='NomeSquadra' value=''></TD>";

                   echo "</TR>";

                   echo "<TR>";

                   echo "<TD COLSPAN=2 style='width:200px;'><center><input type='submit' value='SALVA'></TD>";

                   echo "</TR>";

                   echo "</TABLE>";

                   echo "<BR>";

                   echo "<BR>";

                   echo "<BR>";

           }

           

                if ($cmd == 'salva'){



                    $NomeSquadra = $_REQUEST["NomeSquadra"];

                    $queryI = "INSERT INTO Squadre (NomeSquadra)

                            VALUES('" .$NomeSquadra ."')";

                    $result = mysql_query($queryI)

                            or die ("Errore sulla query di Inserimento Gara: ".mysql_error());

                    header ("Location: es_Squadre.php?cmd=show");

                    /* Redirect browser to starjokes.com  web site */

                    exit;    // Closes further script execution



            }

               

                if ($cmd == 'del'){



                   $query = "DELETE FROM Squadre WHERE ID=" .$ID ."";

                   $result = mysql_query($query)

                       or die ("Errore sulla query di cancellazione ".mysql_error());



                    mysql_close($connection);

                    header ("Location: es_Squadre.php?cmd=show");

                    /* Redirect browser to starjokes.com  web site */

                    exit;    // Closes further script execution



            }

            

            if ($cmd == 'calcola'){

                $MioNomeGara = str_replace(' ', '_', NOMEGARA);

                $querySquadreNomi = "SELECT Squadra

                          FROM " .$MioNomeGara ."

                          WHERE Squadra != ''

                          GROUP BY Squadra";

                $resultSquadreNomi = mysql_query($querySquadreNomi)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());

 

echo "INSERITE/AGGIORNATE: <BR>";                      

                while ($rowSquadreNomi = mysql_fetch_array($resultSquadreNomi))

                  { 

  $queryPuntiSquadra = "SELECT T.Squadra, SUM(T.T) AS GT 

                      FROM (SELECT Nome, Cognome, MAX(TotalePunti) AS T, Squadra

                      FROM " .$MioNomeGara ."

                      WHERE Squadra = '" .$rowSquadreNomi['Squadra'] ."'

                      GROUP BY Nome, Cognome

                      ORDER BY Squadra, T DESC LIMIT 3) AS T

                      GROUP BY Squadra";

  

  //echo "Query: " .$queryPuntiSquadra ."<BR>";

  

  $resultPuntiSquadra = mysql_query($queryPuntiSquadra)

                       or die ("Errore sulla query 1 di calcolo ".mysql_error());                

  

  /*while($row = mysql_fetch_array($resultPuntiSquadra))

  {

  echo "Punti Squadra: " .$row['GT'] ."<BR>";

  } */

  

                  

                  $QueryExist = "SELECT id FROM puntisquadre

                                WHERE Anno = '2013' AND 

                                NomeGara = '" .$MioNomeGara ."' AND 

                                NomeSquadra = '" .$rowSquadreNomi['Squadra'] ."'";

                  $ResultExist = mysql_query($QueryExist)

                       or die ("Errore sulla query di esistenza ".mysql_error());

                       

                  $NumRowsExist = mysql_num_rows($ResultExist);

                  //echo "Numero righe: " .$NumRowsExist ."<BR>";

                  //echo "Query: " .$QueryExist ."<BR>";

                  $NumRowsPunti = mysql_num_rows($resultPuntiSquadra);

                  //echo "Numero righe Punti: " .$NumRowsPunti ."<BR>";

                  

  if ($NumRowsExist == 1){

  while($row = mysql_fetch_array($ResultExist))

  {

   $MioId = $row['id'];

  }  

  while($row = mysql_fetch_array($resultPuntiSquadra))

  {

  echo "Squadra: " .$rowSquadreNomi['Squadra'] ." - Punti: " .$row['GT'] ."<BR>";                

  $QueryAggiorna = "UPDATE puntisquadre

                    SET

                    Punti = '" .$row['GT'] ."'

                    WHERE id = '" .$MioId ."'";

  $ResultAggiorna = mysql_query($QueryAggiorna)

                       or die ("Errore sulla query di esistenza ".mysql_error());

  //echo "Query: " .$QueryAggiorna ."<BR>";

  }                

  }

  ELSE

  {

  

  while($row = mysql_fetch_array($resultPuntiSquadra))

  {

  echo "Squadra: " .$rowSquadreNomi['Squadra'] ." - Punti: " .$row['GT'] ."<BR>";

                  

  $QueryAggiungi = "INSERT INTO puntisquadre

                    (Anno, NomeGara, NomeSquadra, Punti)

                    VALUES(

                    '2010',

                    '" .$MioNomeGara ."',

                    '" .$rowSquadreNomi['Squadra'] ."',

                    '" .$row['GT'] ."'

                    )";

  //echo "" .$QueryAggiungi ."<BR>";

  $ResultAggiungi = mysql_query($QueryAggiungi)

                       or die ("Errore sulla query di esistenza ".mysql_error());

  

  }

  

  } 

                  

                  }

                

                

            

            }

               

               

               

               mysql_close($connection);



               require_once(FOOTERF);



?>



