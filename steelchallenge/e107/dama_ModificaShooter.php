
             <?php

             require_once('class2.php');
             require_once(HEADERF);

if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}

             $connection = mysql_connect("localhost", "atsverona", "Jump02052012")
                           or die ("NON è possibile stabilire una connessione.");

               $db = mysql_select_db("atsveron_steel", $connection)
                           or die ("NON è possibile selezionare il DB.");

               $cmd = $_GET["cmd"];

               if ($cmd == 'edit'){

               $ID = $_REQUEST["ID"];

               //$queryS = "SELECT NomeSquadra FROM Squadre ORDER BY NomeSquadra";
               //$resultS = mysql_query($queryS)
               //        or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

               echo "<br>";

               if ($ID != ""){

               $query = "SELECT * FROM shooters WHERE ID = '" .$ID ."'";

               $result = mysql_query($query)
                       or die ("Errore sulla query: ".mysql_error());

               while ($row = mysql_fetch_array($result))
               {
                   $MyID = $row['ID'];
                   $MyNome = $row['Nome'];
                   $MyCognome = $row['Cognome'];
                   $MySenior = $row['Senior'];
                   $MySqualificato = $row['Squalificato'];
                   $MyLady = $row['Lady'];
                   $MyData_Inserimento = $row['Data_Inserimento'];
               }
               }
               else {
                   $MiaData = date('Y-m-d - G:i:s');
                   $MyID = "";
                   $MyNome = "";
                   $MyCognome = "";
                   $MySenior = "";
                   $MySqualificato = "";
                   $MyLady = "";
                   $MyClasse = "";
                   $MyData_Inserimento = $MiaData;

                   echo "<center><B>AGGIUNGI TIRATORE</B></center>";
               }

               mysql_close($connection);

             echo "<br>";
               if ($MyID != ''){
               echo "<FORM METHOD='POST' ACTION='dama_ModificaShooter.php?cmd=Save&ID=" .$ID ."'>";
               }
               else {
               echo "<FORM METHOD='POST' ACTION='dama_ModificaShooter.php?cmd=add'>";
               }
                    echo "Numero: " .$ID ."";
                    //echo "<input type='TEXT' name='ID' value='" .$MyID ."'>";
                    echo "<br>";
                    echo "<br>";
                    echo "Nome: ";
                    echo "<input type='TEXT' name='Nome' value='" .$MyNome ."'>";
                    echo "<br>";
                    echo "<br>";
                    echo "Cognome: ";
                    echo "<input type='TEXT' name='Cognome' value='" .$MyCognome ."'>";
                    echo "<br>";
                    echo "<br>";
                    echo "Data Inserimento: ";
                    echo "<input type='TEXT' name='Data_Inserimento' value='" .$MyData_Inserimento ."'>";
                    echo "<br>";
                    echo "<br>";
                    echo "Senior: ";
                    if ($MySenior == 0){
                        echo "<input type='checkbox' name='Senior' value='1'/>";
                       }
                    else {
                       echo "<input type='checkbox' name='Senior' value='1' checked/>";
                     }
                     echo "<br>";
                    echo "<br>";
                    echo "Lady: ";
                    if ($MyLady == 0){
                        echo "<input type='checkbox' name='Lady' value='1'/>";
                       }
                    else {
                       echo "<input type='checkbox' name='Lady' value='1' checked/>";
                     }
                     echo "<br>";
                    echo "<br>";
                    echo "Squalificato: ";
                    if ($MySqualificato == 0){
                        echo "<input type='checkbox' name='Squalificato' value='1'/>";
                       }
                    else {
                       echo "<input type='checkbox' name='Squalificato' value='1' checked/>";
                     }

                    echo "<br>";
                    echo "<br>";
                    echo "<input type='submit' value='Salva'>";

                    echo "</FORM>";

                    echo "<br>";
                    echo "<br>";
                }

                if ($cmd == 'Save'){

                $ID = $_GET["ID"];
                $Nome = $_REQUEST["Nome"];
                $Cognome = $_REQUEST["Cognome"];
                $Senior = $_REQUEST["Senior"];
                $Squalificato = $_REQUEST["Squalificato"];
                $Lady = $_REQUEST["Lady"];
                $Data_Inserimento = $_REQUEST["Data_Inserimento"];

                $queryU = "UPDATE shooters SET Nome = '" .$Nome ."',
                       Cognome = '" .$Cognome ."',
                       Data_Inserimento = '" .$Data_Inserimento ."',
                       Senior = '" .$Senior ."',
                       Squalificato = '" .$Squalificato ."',
                       Lady = '" .$Lady ."'
                       WHERE ID = '" .$ID ."'";

                $result = mysql_query($queryU)
                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

                //echo "" .$queryU ."";

                mysql_close($connection);

                header ("Location: dama_ModificaShooter.php?cmd=edit&ID=" .$ID ."");

                /* Redirect browser to starjokes.com  web site */
                exit;    // Closes further script execution

                }
                if ($cmd == 'add'){

                //$ID = $_GET["ID"];
                $Nome = $_REQUEST["Nome"];
                $Cognome = $_REQUEST["Cognome"];
                $Senior = $_REQUEST["Senior"];
                $Squalificato = $_REQUEST["Squalificato"];
                $Lady = $_REQUEST["Lady"];
                $Data_Inserimento = $_REQUEST["Data_Inserimento"];

                $queryI = "INSERT INTO shooters (Nome, Cognome, Data_Inserimento,
                Senior, Squalificato, Lady)
                       VALUES('" .$Nome ."',
                                 '" .$Cognome ."',
                                 '" .$Data_Inserimento ."',
                                 '" .$Senior ."',
                                 '" .$Squalificato ."',
                                 '" .$Lady ."')";

                $result = mysql_query($queryI)
                       or die ("Errore sulla query di Inserimento: ".mysql_error());


                mysql_close($connection);

                header ("Location: ./dama_ShootersList.php?Nome=" .$Nome ."&Cognome=" .$Cognome ."");

                /* Redirect browser to starjokes.com  web site */
                exit;    // Closes further script execution

                }

                if ($cmd == 'del'){

               $ID = $_REQUEST["ID"];

                echo "<center><B>ELIMINARE IL TIRATORE?</B></center>";

                $query = "SELECT * FROM shooters WHERE ID = '" .$ID ."'";

               $result = mysql_query($query)
                       or die ("Errore sulla query: ".mysql_error());


               while ($row = mysql_fetch_array($result))
               {
                   $MyID = $row['ID'];
                   $MyNome = $row['Nome'];
                   $MyCognome = $row['Cognome'];
                   $MySenior = $row['Senior'];
                   $MySqualificato = $row['Squalificato'];
                   $MyLady = $row['Lady'];
               }

               echo "<BR><center>
                    Nome: " .$MyNome ."<BR>
                    Cognome: " .$MyCognome ."<BR><BR>
                    <a href='./dama_ModificaShooter.php?cmd=delete&ID=" .$MyID ."'>ELIMINA</a>
                    <a href='./dama_ShootersList.php'>ANNULLA</a>
               ";
               }

               if ($cmd == 'delete'){

                  $ID = $_GET["ID"];

                  $query = "DELETE FROM shooters WHERE ID=" .$ID ."";
                  $result = mysql_query($query)
                       or die ("Errore sulla query di cancellazione ".mysql_error());

                  mysql_close($connection);

                header ("Location: dama_ShootersList.php");

                /* Redirect browser to starjokes.com  web site */
                exit;    // Closes further script execution


               }

                    require_once(FOOTERF);
             ?>

