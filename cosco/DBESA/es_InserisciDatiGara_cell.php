<?php



            require_once('class2.php');

            //require_once(HEADERF);

			//include_once(THEME."style.css");

			echo "<link rel='stylesheet' href='" .THEME. "style.css' type='text/css' />\n";

			echo "<link rel='stylesheet' href='e107_files/e107.css' type='text/css' />\n";

			//include_once(THEME."theme.php");

			//require_once(THEME."rd_login.php");



            $connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



            $MyCmd = $_GET['cmd'];

            

            if ($MyCmd == 'new'){



            //echo "<div id='contentcolumn'>";

			echo "<BR>";

            echo "<center>";

            echo "<FORM METHOD='POST' ACTION='es_InserisciDatiGara_cell.php?cmd=find' name='Inserisci'>";

            echo "<TABLE BORDER='1' width='100%'>";

            echo "<TH COLSPAN=2 style='font-size: 300%; color:#FFFFFF; size: 50%'><B>CERCA TIRATORE</B></TH>";

            echo "<TR>";

            echo "<TD style='font-size: 300%; color:#FFFFFF; size: 50%'><B>NUMERO<BR>TIRATORE</B></TD>";

            echo "<TD><input type='TEXT' name='ID' style='font-size: 500%;' value='' size='7'></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD COLSPAN=2  style='padding-top: 15px;'><center><input type='submit' value='TROVA' style='font-size: 500%;'></TD>";

            echo "</TR>";

            echo "</TABLE>";

			//echo "</div>";

            echo "<BR>";

            echo "<BR>";



echo "<script type='text/javascript' language='JavaScript'>

document.forms['Inserisci'].elements['ID'].focus();

</script>";	



                }

            

            if ($MyCmd == 'find'){



               $ID = $_REQUEST["ID"];

               $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $query = "SELECT * FROM " .$MioNomeGara ." WHERE ID ='" .$ID ."'";

              $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

              $row = mysql_fetch_array($result) or die(mysql_error());

              $NomiColonne = My_mysql_column_names($MioNomeGara, $connection);

              $Numero = count($NomiColonne)-1;

              $i=0;

              echo "<center><B><font color='#70A401' size='300%'>INSERIMENTO DATI</B><BR>

                   Tiratore: " .$ID ." - " .$row['Nome'] ." " .$row['Cognome'] ."</FONT>";

              $s=0;

              for($i=0; $i <= $Numero; $i++){



                           $MiaEtichettaSx = substr($NomiColonne[$i],0,2);

                           if ($MiaEtichettaSx == 'A_'){



                              $MioNumeroStage = substr($NomiColonne[$i],2,1);

                              $NumeroColpi = $MieiNumeroColpi[$s];

                              echo "<BR>";

                              echo "<center>";

                              echo "<FORM METHOD='POST' ACTION='es_InserisciDatiGara_cell.php?cmd=add&ID=" .$ID ."' name='Inserisci'>";

                              echo "<TABLE BORDER='1' width='100%'>";

                              echo "<TH class='forumheader6' COLSPAN=7><B>STAGE " .$MioNumeroStage ." - Colpi: " .$NumeroColpi ."</B></TH>";

                              echo "<TR>";

                              $c=$i+6;

                                   for($n=$i; $n <= $c; $n++){

                                      $MioValore = $row[$NomiColonne[$n]];

                                      echo "<TD class='forumheader7'><center>" .$NomiColonne[$n] ."<br> <input type='TEXT' name='" .$NomiColonne[$n] ."' value='" .$MioValore ."' size='5' style='font-size: 30px;'></TD>";



                                      }

                              echo "</TR>";

                              $s++;

                              }



              }

                              echo "<TR>";

                              echo "<TD COLSPAN=7  style='padding-top: 15px;'><center><input type='submit' value='SALVA' style='font-size: 500%;'></TD>";

                              echo "</TR>";

                              echo "</TABLE>";

                              echo "</FORM>";

							  

							  echo "<script type='text/javascript' language='JavaScript'>

									document.forms['Inserisci'].elements['A_1'].focus();

									</script>";	

							  



            }

            

            if ($MyCmd == 'add'){



                $ID = $_GET["ID"];

                $MioNomeGara = str_replace(' ', '_', NOMEGARA);

                $query = "SELECT * FROM " .$MioNomeGara ." WHERE ID ='" .$ID ."'";

                $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

                $row = mysql_fetch_array($result) or die(mysql_error());

                $NomiColonne = My_mysql_column_names($MioNomeGara, $connection);

                $Numero = count($NomiColonne)-1;



                $NumeroRequest = count($_REQUEST);

                //echo "Numero: " .$NumeroRequest ."";





                /*

                for ($i=10; $i <= 16; $i++){

                    $NomeCampi[]=$NomiColonne[$i];

                }



                for ($i=19; $i <= 25; $i++){

                    $NomeCampi[]=$NomiColonne[$i];

                }

                */

                

                $st=10;

                $f=9;

                $nst=0;

                //echo "NS: " .NUMEROSTAGES ."<BR>";

                //for ($ns=0; $ns<=NUMEROSTAGES; $ns++){

                while($nst<=NUMEROSTAGES-1){

                

                    $tot=$st+($f*$nst)+6;

                    //echo "TOT: " .$tot ."<BR>";

                    for ($i=$st+($f*$nst); $i<=$tot; $i++){

                    

                      $NomeCampi[]=$NomiColonne[$i];

                      //echo "NomeColonna: " .$NomiColonne[$i] ."<BR>";

                    

                    }

                    $nst++;

                }

                

                $ParteQuery="";

                $NumeroCampi=count($NomeCampi)-1;

                for ($n=0; $n <= $NumeroCampi; $n++){



                    $ParteQuery = "" .$ParteQuery ." "

                                .$NomeCampi[$n] ." = '" .str_replace(',', '.', $_REQUEST[$NomeCampi[$n]]) ."'";

                    if ($n <= $NumeroCampi-1){

                         $ParteQuery = "" .$ParteQuery .",";

                        }



                }

                

                //echo "QUERY: " .$ParteQuery ."";

                



                    $queryU = "UPDATE " .$MioNomeGara ."

                            SET " .$ParteQuery ."

                            WHERE ID = '" .$ID ."'";



                    $result = mysql_query($queryU)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());



             //AGGIORNAMENTO RISULTATI

             

             for ($s=0; $s<=NUMEROSTAGES-1; $s++){



                    $c=$s*7;



                    //CONTROLLO COLPI

                    $MieiColpiInseriti[]=array();

                    $MieiTempiInseriti[]=array();

                    //$MieiColpiInseriti[$s]=$_REQUEST[$NomeCampi[0+$c]]+$_REQUEST[$NomeCampi[1+$c]]+

                    //$_REQUEST[$NomeCampi[2+$c]]+$_REQUEST[$NomeCampi[3+$c]]+$_REQUEST[$NomeCampi[4+$c]];

                    $MieiColpiInseriti[$s]=$_REQUEST[$NomeCampi[0+$c]]+$_REQUEST[$NomeCampi[1+$c]]+

                    $_REQUEST[$NomeCampi[2+$c]]+$_REQUEST[$NomeCampi[3+$c]];

                    $MieiTempiInseriti[$s]=$_REQUEST[$NomeCampi[6+$c]];

                    //if ($MieiColpiInseriti==$MieiNumeroColpi[$s]){



                    $MieiAlpha[]=$_REQUEST[$NomeCampi[0+$c]]*5;

                    $MieiCiarlie[]=$_REQUEST[$NomeCampi[1+$c]]*3;

                    $MieiDelta[]=$_REQUEST[$NomeCampi[2+$c]]*1;

                    $MieiMiss[]=$_REQUEST[$NomeCampi[3+$c]]*10;

                    $MieiNoShoot[]=$_REQUEST[$NomeCampi[4+$c]]*10;

                    $MieiPenalty[]=$_REQUEST[$NomeCampi[5+$c]]*10;

                    $MieiTempo[]=str_replace(',', '.', $_REQUEST[$NomeCampi[6+$c]]);

                    

                    $PuntiPar[]=$MieiAlpha[$s]+$MieiCiarlie[$s]+$MieiDelta[$s]-$MieiMiss[$s]-$MieiNoShoot[$s]-$MieiPenalty[$s];

                    if ($PuntiPar[$s]>=0){

                        $MioHF=$PuntiPar[$s]/$MieiTempo[$s];

                        $HF[$s]=round($MioHF, 2);

                        }

                    else {

                        $HF[$s]= 0;

                        }

                        

                    //echo "HF: " .$HF[$s] ."<BR>";

                    

                    $m=$s+1;

                    $MioHF = str_replace(',', '.', $HF[$s]);

                    $queryU = "UPDATE " .$MioNomeGara ."

                            SET HF_" .$m ." = '" .$MioHF ."'

                            WHERE ID = '" .$ID ."'";



                    $result = mysql_query($queryU)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

                       

                       





             }

                    $OK=0;

                    $OKTempo=0;

                    for ($s=0; $s<=NUMEROSTAGES-1; $s++){



                        if ($MieiColpiInseriti[$s]==$MieiNumeroColpi[$s]){

                            $OK++;

                        }

                        else {

                        }

                        if ($MieiTempiInseriti[$s]!='0'){

                           $OKTempo++;

                        }

                    }

                    

                    if ($OK==NUMEROSTAGES){



                       My_Calcolo_Punti($MieiPuntiMassimi);

                       if ($OKTempo != NUMEROSTAGES){

                          echo "<CENTER><B><font color='#70A401' size='300%'>TEMPO MANCANTE<br><br>

                                In uno degli stage inseriti manca il TEMPO!

                                <br><br>

                                Premere il tasto indietro del browser<br>

                                per modificare i dati.";

                                exit;

                      }

                       header ("Location: es_InserisciDatiGara_cell.php?cmd=new");

                       //echo "Numero Tempi: " .$OKTempo ."";

                       /* Redirect browser to starjokes.com  web site */

                       exit;    // Closes further script execution

                       //echo "<BR>Array Punti 1: " .count($MieiPuntiMassimi) ."<BR>" .NUMEROSTAGES ."";



                       }

                       else {



                           echo "<CENTER><B><font color='#70A401' size='300%'>DATI NON CORRISPONDENTI<br><br>

                                IL NUMERO DI COLPI INSERITI NON CORRISPONDE<br>

                                AL NUMERO DI COLPI IMPOSTATO!

                                <br><br>

                                Premere il tasto indietro del browser<br>

                                per modificare i dati.";





                           }

                           



                      



            }

            

            

            

            

            echo "<BR><BR>";

            

            mysql_close($connection);



            //require_once(FOOTERF);

            

            //exit;

            

function My_mysql_column_names($table,$link) {

  $query = "SELECT * FROM {$table}";

  $result = mysql_query($query,$link);

  $row = mysql_fetch_assoc($result);

  $Mycolumns = array_keys($row);

  return $Mycolumns;

}



function My_Calcolo_Punti($PuntiMaxStages){



         // CALCOLO PUNTI AUTOMATICA

         

         $MioNomeGara = str_replace(' ', '_', NOMEGARA);

         $QuerySelectAll = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO'";

         $ArrayTotPunti = array();



         for ($m=1; $m<=NUMEROSTAGES; $m++){

             $NumRiga=0;

             $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

             $QueryMaxHF = "SELECT MAX(HF_" .$m .") FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO'";

             $resultMaxHF = mysql_query($QueryMaxHF)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

             $rowMaxHF = mysql_fetch_array($resultMaxHF) or die(mysql_error());

             $MaxHF = $rowMaxHF['MAX(HF_' .$m .')'];

             $MaxPuntiStage = $PuntiMaxStages[$m-1];

             while ($rowAll = mysql_fetch_array($ResultAll)){

                    $MioHF = $rowAll['HF_' .$m .''];

                    $MieiPuntiStageTot = $MaxPuntiStage*$MioHF/$MaxHF;

                    $MieiPuntiStage = round($MieiPuntiStageTot, 4);

                    $ID = $rowAll['ID'];

                    $ArrayTotPunti[$NumRiga]=$ArrayTotPunti[$NumRiga]+$MieiPuntiStage;

                    $queryUpAll = "UPDATE " .$MioNomeGara ."

                            SET Punteggio_" .$m ." = '" .str_replace(',', '.', $MieiPuntiStage) ."',

                            TotalePunti = '" .str_replace(',', '.', $ArrayTotPunti[$NumRiga]) ."'

                            WHERE ID = '" .$ID ."'";

                    $result = mysql_query($queryUpAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

                    $NumRiga++;

              }

          }

          

          //CALCOLO PERCENTUALE

          $QueryMaxPunti = "SELECT MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='SEMIAUTO'";

          $resultMaxPunti = mysql_query($QueryMaxPunti)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          $rowMaxPunti = mysql_fetch_array($resultMaxPunti) or die(mysql_error());

          $MaxPunti = $rowMaxPunti['MAX(TotalePunti)'];

          $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          while ($rowAll = mysql_fetch_array($ResultAll)){

                    $MioTotalePunti = $rowAll['TotalePunti'];

                    $ID = $rowAll['ID'];

                    $MioPercento = $MioTotalePunti * 100 / $MaxPunti;

                    $MioPercentoOK = round($MioPercento, 4);

                    $queryUpPercentuale = "UPDATE " .$MioNomeGara ."

                            SET Percentuale = '" .str_replace(',', '.', $MioPercentoOK) ."'

                            WHERE ID = '" .$ID ."'";

                    $resultPercentuale = mysql_query($queryUpPercentuale)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          }

          

          // CALCOLO PUNTI REVOLVER



         $MioNomeGara = str_replace(' ', '_', NOMEGARA);

         $QuerySelectAll = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER'";

         $ArrayTotPunti = array();



         for ($m=1; $m<=NUMEROSTAGES; $m++){

             $NumRiga=0;

             $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

             $QueryMaxHF = "SELECT MAX(HF_" .$m .") FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER'";

             $resultMaxHF = mysql_query($QueryMaxHF)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

             $rowMaxHF = mysql_fetch_array($resultMaxHF) or die(mysql_error());

             $MaxHF = $rowMaxHF['MAX(HF_' .$m .')'];

             $MaxPuntiStage = $PuntiMaxStages[$m-1];

             while ($rowAll = mysql_fetch_array($ResultAll)){

                    $MioHF = $rowAll['HF_' .$m .''];

                    $MieiPuntiStageTot = $MaxPuntiStage*$MioHF/$MaxHF;

                    $MieiPuntiStage = round($MieiPuntiStageTot, 4);

                    $ID = $rowAll['ID'];

                    $ArrayTotPunti[$NumRiga]=$ArrayTotPunti[$NumRiga]+$MieiPuntiStage;

                    $queryUpAll = "UPDATE " .$MioNomeGara ."

                            SET Punteggio_" .$m ." = '" .$MieiPuntiStage ."',

                            TotalePunti = '" .$ArrayTotPunti[$NumRiga] ."'

                            WHERE ID = '" .$ID ."'";

                    $result = mysql_query($queryUpAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

                    $NumRiga++;

              }

          }

          

          //CALCOLO PERCENTUALE

          $QueryMaxPunti = "SELECT MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='REVOLVER'";

          $resultMaxPunti = mysql_query($QueryMaxPunti)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          $rowMaxPunti = mysql_fetch_array($resultMaxPunti) or die(mysql_error());

          $MaxPunti = $rowMaxPunti['MAX(TotalePunti)'];

          $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          while ($rowAll = mysql_fetch_array($ResultAll)){

                    $MioTotalePunti = $rowAll['TotalePunti'];

                    $ID = $rowAll['ID'];

                    $MioPercento = $MioTotalePunti * 100 / $MaxPunti;

                    $MioPercentoOK = round($MioPercento, 4);

                    $queryUpPercentuale = "UPDATE " .$MioNomeGara ."

                            SET Percentuale = '" .str_replace(',', '.', $MioPercentoOK) ."'

                            WHERE ID = '" .$ID ."'";

                    $resultPercentuale = mysql_query($queryUpPercentuale)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

          }

}



?>

