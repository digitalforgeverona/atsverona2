<?php



            require_once('class2.php');

            require_once(HEADERF);



            $connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");



            $MyCmd = $_GET['cmd'];

            
/*
            if ($MyCmd == 'new'){



            echo "<BR>";

            echo "<center>";

            echo "<FORM METHOD='POST' ACTION='es_InserisciDatiGara.php?cmd=find' name='Inserisci'>";

            echo "<TABLE BORDER='1'>";

            echo "<TH COLSPAN=2><B>CERCA TIRATORE</B></TH>";

            echo "<TR>";

            echo "<TD style='width:150px;'><B>NUMERO TIRATORE</B></TD>";

            echo "<TD style='width:150px;'><input type='TEXT' name='ID' value=''></TD>";

            echo "</TR>";

            echo "<TR>";

            echo "<TD COLSPAN=2 style='width:200px;'><center><input type='submit' value='TROVA'></TD>";

            echo "</TR>";

            echo "</TABLE>";

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

              echo "<center><B>INSERIMENTO DATI</B><BR><BR>

                   Tiratore: " .$ID ." - " .$row['Nome'] ." " .$row['Cognome'] ."";

              $s=0;

              for($i=0; $i <= $Numero; $i++){



                           $MiaEtichettaSx = substr($NomiColonne[$i],0,2);

                           if ($MiaEtichettaSx == 'A_'){



                              $MioNumeroStage = substr($NomiColonne[$i],2,1);

                              $NumeroColpi = $MieiNumeroColpi[$s];

                              echo "<BR>";

                              echo "<center>";

                              echo "<FORM METHOD='POST' ACTION='es_InserisciDatiGara.php?cmd=add&ID=" .$ID ."' name='Inserisci'>";

                              echo "<TABLE BORDER='1'>";

                              echo "<TH COLSPAN=7><B>STAGE " .$MioNumeroStage ." - Colpi: " .$NumeroColpi ."</B></TH>";

                              echo "<TR>";

                              $c=$i+6;

                                   for($n=$i; $n <= $c; $n++){

                                      $MioValore = $row[$NomiColonne[$n]];

                                      echo "<TD style='width:50px;'><center>" .$NomiColonne[$n] ."<br> <input type='TEXT' name='" .$NomiColonne[$n] ."' value='" .$MioValore ."' size='2'></TD>";



                                      }

                              echo "</TR>";

                              $s++;

                              }



              }

                              echo "<TR>";

                              echo "<TD COLSPAN=7><center><input type='submit' value='SALVA'></TD>";

                              echo "</TR>";

                              echo "</TABLE>";

                              echo "</FORM>";

							  

							  echo "<script type='text/javascript' language='JavaScript'>

									document.forms['Inserisci'].elements['A_1'].focus();

									</script>";	

							  



            }

*/            

            if ($MyCmd == 'add'){



                $ID = $_GET["ID"];
				
				$Stage = $_REQUEST["Stage"];

                $MioNomeGara = str_replace(' ', '_', NOMEGARA);

                $query = "SELECT * FROM " .$MioNomeGara ." WHERE ID ='" .$ID ."'";

                $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

                $row = mysql_fetch_array($result) or die(mysql_error());

                $NomiColonne = My_mysql_column_names($MioNomeGara, $connection);

                $Numero = count($NomiColonne)-1;



                $NumeroRequest = count($_REQUEST);
                

                $st=10;

                $f=9;

                $nst=0;


                /*while($nst<=NUMEROSTAGES-1){

                

                    $tot=$st+($f*$nst)+6;

                    //echo "TOT: " .$tot ."<BR>";

                    for ($i=$st+($f*$nst); $i<=$tot; $i++){

                    

                      $NomeCampi[]=$NomiColonne[$i];

                      //echo "NomeColonna: " .$NomiColonne[$i] ."<BR>";

                    

                    }

                    $nst++;

                }

                */

                $ParteQuery="";

               //$NumeroCampi=count($NomeCampi)-1;

                /*for ($n=0; $n <= $NumeroCampi; $n++){



                    $ParteQuery = "" .$ParteQuery ." "

                                .$NomeCampi[$n] ." = '" .str_replace(',', '.', $_REQUEST[$NomeCampi[$n]]) ."'";

                    if ($n <= $NumeroCampi-1){

                         $ParteQuery = "" .$ParteQuery .",";

                        }



                }
*/
                $ParteQuery .= "A_" .$Stage ."=".str_replace(',', '.', $_REQUEST['A_' .$Stage .'']) .",";
				$ParteQuery .= "C_" .$Stage ."=".str_replace(',', '.', $_REQUEST['C_' .$Stage .'']) .",";
				$ParteQuery .= "D_" .$Stage ."=".str_replace(',', '.', $_REQUEST['D_' .$Stage .'']) .",";
				$ParteQuery .= "M_" .$Stage ."=".str_replace(',', '.', $_REQUEST['M_' .$Stage .'']) .",";
				$ParteQuery .= "NS_" .$Stage ."=".str_replace(',', '.', $_REQUEST['NS_' .$Stage .'']) .",";
				$ParteQuery .= "P_" .$Stage ."=".str_replace(',', '.', $_REQUEST['P_' .$Stage .'']) .",";
				$ParteQuery .= "Tempo_" .$Stage ."=".str_replace(',', '.', $_REQUEST['Tempo_' .$Stage .'']) ."";

                //echo "QUERY: " .$ParteQuery ."";

                



                    $queryU = "UPDATE " .$MioNomeGara ."

                            SET " .$ParteQuery ."

                            WHERE ID = '" .$ID ."'";



                    $result = mysql_query($queryU)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());



             //AGGIORNAMENTO RISULTATI

             

             //for ($s=0; $s<=NUMEROSTAGES-1; $s++){


					$s=0;
                    $c=$s*7;



                    //CONTROLLO COLPI

                    $MieiColpiInseriti[]=array();

                    $MieiTempiInseriti[]=array();

                    $MieiColpiInseriti[$s]=$_REQUEST['A_' .$Stage .'']+$_REQUEST['C_' .$Stage .'']+

                    $_REQUEST['D_' .$Stage .'']+$_REQUEST['M_' .$Stage .''];

                    $MieiTempiInseriti[$s]=$_REQUEST['Tempo_' .$Stage .''];

                    

                    $MieiAlpha[]=$_REQUEST['A_' .$Stage .'']*5;

                    $MieiCiarlie[]=$_REQUEST['C_' .$Stage .'']*3;

                    $MieiDelta[]=$_REQUEST['D_' .$Stage .'']*1;

                    $MieiMiss[]=$_REQUEST['M_' .$Stage .'']*10;

                    $MieiNoShoot[]=$_REQUEST['NS_' .$Stage .'']*10;

                    $MieiPenalty[]=$_REQUEST['P_' .$Stage .'']*10;

                    $MieiTempo[]=str_replace(',', '.', $_REQUEST['Tempo_' .$Stage .'']);

                    

                    $PuntiPar[]=$MieiAlpha[$s]+$MieiCiarlie[$s]+$MieiDelta[$s]-$MieiMiss[$s]-$MieiNoShoot[$s]-$MieiPenalty[$s];
//print_r($NomeCampi);
//exit();
                    if ($PuntiPar[$s]>=0){

                        $MioHF=$PuntiPar[$s]/$MieiTempo[$s];

                        $HF[$s]=round($MioHF, 2);

                        }

                    else {

                        $HF[$s]= 0;

                        }

                        

                    //echo "HF: " .$HF[$s] ."<BR>";

                    

                    $m=$Stage;

                    $MioHF = str_replace(',', '.', $HF[$s]);

                    $queryU = "UPDATE " .$MioNomeGara ."

                            SET HF_" .$m ." = '" .$MioHF ."'

                            WHERE ID = '" .$ID ."'";



                    $result = mysql_query($queryU)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

                       

                       





             //}

                    $OK=0;

                    $OKTempo=0;
					
					$queryColpi = "SELECT NumeroColpi, PuntiMassimi FROM gare WHERE NomeGara = '" .NOMEGARA ."'";
					
					//echo $queryColpi;
					
					//exit();
					
					$result = mysql_query($queryColpi) or die ("Errore sulla query di Ricerca Colpi: ".mysql_error());
					
					$row = mysql_fetch_array($result) or die(mysql_error());
					
					$ColpiArray = split($row['NumeroColpi'],",");
					
					$MieiNumeroColpi = $ColpiArray[$Stage-1];
					
					$PuntiArray = split($row['PuntiMassimi'],",");
					
					//$MieiPuntiMassimi = $PuntiArray[$Stage-1];
					
					
					
                    
                        if ($MieiColpiInseriti[$s]==$MieiNumeroColpi[$s]){

                            $OK++;

                        }

                        else {

                        }

                        if ($MieiTempiInseriti[$s]!='0'){

                           $OKTempo++;

                        }

                    }

                    // CONTROLLO SE TUTTI I DATI SONO INSERITI
					
					$queryHF = "SELECT * FROM " .$MioNomeGara ." WHERE ID = '" .$ID ."'";
					
					$result = mysql_query($queryHF) or die ("Errore sulla query di HF: ".mysql_error());
					
					$rowHF = mysql_fetch_array($result) or die(mysql_error());
					
					
					for ($s=1; $s<=NUMEROSTAGES; $s++){ 
					
							if($rowHF['HF_' .$s] >= 0.1){
								
									$OK++;
								
								} 
					
						}
					
					//echo "NUMERO: " .$OK;
					//exit();

                    if ($OK==NUMEROSTAGES){

//$MieiPuntiMassimi=$PuntiArray;

                       My_Calcolo_Punti($MieiPuntiMassimi);

                       /*if ($OKTempo != NUMEROSTAGES){

                          echo "<CENTER><B>TEMPO MANCANTE<br><br>

                                In uno degli stage inseriti manca il TEMPO!

                                <br><br>

                                Premere il tasto indietro del browser<br>

                                per modificare i dati.";

                                exit;

                      }
*/
                       header ("Location: ElencoIscrizioni.php?stage=" .$Stage);

                       exit;    // Closes further script execution

                       }

                       else {



                           /*echo "<CENTER><B>DATI NON CORRISPONDENTI<br><br>

                                IL NUMERO DI COLPI INSERITI NON CORRISPONDE<br>

                                AL NUMERO DI COLPI IMPOSTATO!

                                <br><br>

                                Premere il tasto indietro del browser<br>

                                per modificare i dati.";*/

							header ("Location: ElencoIscrizioni.php?stage=" .$Stage);
	
							exit;    // Closes further script execution



                           }

                           



                      



           // }

            

            

            

            

            echo "<BR><BR>";

            

            mysql_close($connection);



            require_once(FOOTERF);

            

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

		  

		   // CALCOLO PUNTI MONOFILARE



         $MioNomeGara = str_replace(' ', '_', NOMEGARA);

         $QuerySelectAll = "SELECT * FROM " .$MioNomeGara ." WHERE Divisione='MONOFILARE'";

         $ArrayTotPunti = array();



         for ($m=1; $m<=NUMEROSTAGES; $m++){

             $NumRiga=0;

             $ResultAll = mysql_query($QuerySelectAll)

                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());

             $QueryMaxHF = "SELECT MAX(HF_" .$m .") FROM " .$MioNomeGara ." WHERE Divisione='MONOFILARE'";

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

          $QueryMaxPunti = "SELECT MAX(TotalePunti) FROM " .$MioNomeGara ." WHERE Divisione='MONOFILARE'";

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

