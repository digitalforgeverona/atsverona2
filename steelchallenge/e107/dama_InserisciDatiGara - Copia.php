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

            $MyCmd = $_GET['cmd'];

            if ($MyCmd == 'new'){

            echo "<BR>";
            echo "<center>";
            echo "<FORM METHOD='POST' ACTION='dama_InserisciDatiGara.php?cmd=find' name='Inserisci'>";
            echo "<TABLE BORDER='1'>";
            echo "<TH COLSPAN=2><B>CERCA TIRATORE</B></TH>";
            echo "<TR>";
            echo "<TD style='width:150px;'><B>NUMERO TIRATORE</B></TD>";
            echo "<TD style='width:150px;'><input type='TEXT' name='ID' value=''></TD>";
            echo "</TR>";
			echo "<TR>";
            echo "<TD style='width:150px;'><B>NUMERO STAGE</B></TD>";
            echo "<TD style='width:150px;'><input type='TEXT' name='STAGE' value=''></TD>";
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
			   $Stage = $_REQUEST["STAGE"];
               $S=$Stage;
			   
			   if ($S>NUMEROSTAGES){
				
				echo "<CENTER><BR><B>IL NUMERO DI STAGES DI QUESTA GARA E' " .NUMEROSTAGES ."<BR><BR>
				TORNA ALLA PAGINA PRECEDENTE E VERIFICA IL NUMERO DI STAGE.</B></CENTER>";
				require_once(FOOTERF);
				exit;
				
				
				}
			   
			   
			   
			   
			   $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              
			  if ($MieiStages[$S]=='SC104'){$Prove=4;}
			  if ($MieiStages[$S]!='SC104'){$Prove=5;}
			  
			  $MiaSelectCampi="Nome, Classe, Division, ";
			  
			  for ($P=1;$P<=$Prove;$P++){
				  
				  $MiaSelectCampi="" .$MiaSelectCampi ."Time_" .$S ."_" .$P .", 
				  										Penalty_" .$S ."_" .$P .", "; 
				 }
				
				$MiaSelectCampi="" .$MiaSelectCampi ."Score_Stage_" .$S ." ";
				
			  $query = "SELECT " .$MiaSelectCampi ." FROM " .$MioNomeGara ." WHERE ID ='" .$ID ."'";
              $result = mysql_query($query) or die ("Errore sulla query di ricerca tiratore: ".mysql_error());
              $row = mysql_fetch_array($result) or die(mysql_error());
              $NomiColonne = My_mysql_column_names($MioNomeGara, $connection, $query);
              $Numero = count($NomiColonne)-1;

			  $i=0;
              echo "<center><B>Tiratore: " .$ID ." - " .$row['Nome'] ." - " .$row['Division'] ." - " .$row['Classe'] ."</B><BR>";
              $s=0;
$MSG='TEST';
              echo "<BR>";
                              echo "<center>";
                              echo "<FORM METHOD='POST' ACTION='dama_InserisciDatiGara.php?cmd=add&ID=" .$ID ."&Stage=" .$S ."&Prove=" .$Prove ."' name='Inserisci' onsubmit='return ConfirmDelete();'>";
                              echo "<TABLE BORDER='1'>";
							 echo "<TR>";
							 echo "<TH COLSPAN=" .(($Prove*2)+1) ." bgcolor='#878787'><font color='#FFFFFF'><B>STAGE " .$Stage ."</B></font></TH>";
							 echo "</TR>";
							 echo "<TR>";
							 echo "<TH bgcolor='#878787'></TH><TH bgcolor='#878787'><font color='#FFFFFF'><B>TIME</B></font></TH><TH bgcolor='#878787'><font color='#FFFFFF'><B>PENALTIES</B></font></TH>";
							 echo "</TR>";
							 echo "<TR>";
$ms=0;							 
for($i=3; $i <= $Numero-1; $i=$i+2){
	$ms++;
	$MioValoreT = $row[$NomiColonne[$i]];
	$MioValoreP = $row[$NomiColonne[$i+1]];
	echo "<TR>";
	echo "<TD style='width:30px;'><center><B>" .$ms ."</TD>";
	echo "<TD style='width:80px;'><center><input type='TEXT' name='" .$NomiColonne[$i] ."' value='" .$MioValoreT ."' size='7'></TD>";
	echo "<TD style='width:80px;'><center><input type='TEXT' name='" .$NomiColonne[$i+1] ."' value='" .$MioValoreP ."' size='7'></TD>";
	echo "</TR>";
			  
}
			 
  echo "<TR>";
  echo "<TH COLSPAN=" .($Prove*2) ." bgcolor='#878787'><font color='#FFFFFF'><B>SCORE STAGE: " .$row[$NomiColonne[$Numero]] ."</B></font></TH>";
  echo "</TR>";
  echo "<TR>";
  echo "<TD COLSPAN=" .(TOTPROVE*2) ."><center><input type='submit' value='SALVA'></TD>";
  echo "</TR>";
  echo "</TABLE>";
  echo "</FORM><BR><BR>";
  echo "<script type='text/javascript' language='JavaScript'>
		document.forms['Inserisci'].elements['$NomiColonne[3]'].focus();
		</script>";

echo "
			   <script language='javascript'>
				  function ConfirmDelete()
				  {
					if (confirm('$MSG'))
					{
					  return true;
					}
					else
					{
					  return false;
					}
				  }  
				</script>
			   ";


}

            if ($MyCmd == 'add'){
				$MioNomeGara = str_replace(' ', '_', NOMEGARA);
				$NomeGara2 = "" .NOMEGARA ."";
				
				$query = "SELECT * FROM gare WHERE NomeGara='" .$NomeGara2 ."'";
            	$result = mysql_query($query) or die ("Errore sulla query LIST: ".mysql_error());
				
                $ArrayScore = array();
                $ID = $_GET["ID"];
				$Stage = $_GET["Stage"];
				$Prove = $_GET["Prove"];
                $MioNomeGara = str_replace(' ', '_', NOMEGARA);
                $MioCheck=0;
                $MioSuperTotale=0;
                
                $ArrayScore=NULL;
     			$st=$Stage;
				for ($pr=1; $pr<=$Prove; $pr++){
                     $MioTime="" .str_replace(',', '.', $_REQUEST["Time_" .$st ."_" .$pr .""]) ."";
                     $MioPenalty="" .$_REQUEST["Penalty_" .$st ."_" .$pr .""] ."";
                     $pos = strpos($MioTime, '.');
					 if ($pos === false) {
						$MioTime = substr_replace($MioTime, '.', -2,0);		
					 }
 
					 if ($MioPenalty == 5) {
						 	$MioScore = $MioPenalty*3*2;
						 }// IF
						else {
					 		$MioScore=$MioTime+($MioPenalty*3);
						}//ELSE
						if ($MioScore >= (5*3*2)){
							$MioScore = (5*3*2);
							}//IF
                     
					$ArrayScore[]=$MioScore;
					$MioTime = str_replace(',', '.', $MioTime);
					$MioScore = str_replace(',', '.', $MioScore);

                     $queryUP ="" .$queryUP ."
                        Time_" .$st ."_" .$pr ." = '" .$MioTime ."',
                        Penalty_" .$st ."_" .$pr ." = '" .$MioPenalty ."',
                        Score_" .$st ."_" .$pr ." = '" .$MioScore ."'";

                        if ($pr <= $Prove-1){
                         $queryUP = "" .$queryUP .", ";
                        }// IF
                     }// END FOR PR<=TOTPROVE
					 
				
				sort($ArrayScore);
                     
					 $TotaleStage=0;
                     for ($aa=0; $aa<=$Prove-2; $aa++){
                            $TotaleStage=$TotaleStage + $ArrayScore[$aa];
                    }// END FOR AA<=PROVEOK
                     $TotaleStage = str_replace(',', '.', $TotaleStage);
					 $queryUPScore = "" .$queryUPScore ."
                            Score_Stage_" .$st ." = " .$TotaleStage .", ";


                $queryU = "UPDATE " .$MioNomeGara ."
                            SET " .$queryUPTotale ." " .$queryUPScore ." " .$queryUP ."
                            WHERE ID = '" .$ID ."'";
				
                $result = mysql_query($queryU)
                       or die ("Errore sulla query di Aggiornamento1: ".mysql_error());


                //CONTROLLO SE TUTTI I DATI SONO INSERITI E CALCOLO IL TOTALE DELLA GARA
				$MiaSelect="";
				for ($r=1;$r<=NUMEROSTAGES;$r++){
					$MiaSelect="" .$MiaSelect ." Score_Stage_" .$r ."";
					if ($r<NUMEROSTAGES){$MiaSelect="" .$MiaSelect .", ";}
					}
				
				$query = "SELECT " .$MiaSelect ." FROM " .$MioNomeGara ." WHERE ID='" .$ID ."'";

				$result = mysql_query($query) or die ("Errore sulla query LIST: ".mysql_error());
				$row = mysql_fetch_array($result) or die(mysql_error());
				
				$key = array_search('0', $row);
				
				if ($key==''){
					
					for ($t=0;$t<=NUMEROSTAGES; $t++){
					 $MioSuperTotale=$MioSuperTotale+$row[$t];
					}
					 $MioSuperTotale = str_replace(',', '.', $MioSuperTotale);
                     $queryUPTotale = "TotalScore = " .$MioSuperTotale ." ";
					 $queryU = "UPDATE " .$MioNomeGara ."
                            SET " .$queryUPTotale ."
                            WHERE ID = '" .$ID ."'";

                $result = mysql_query($queryU)
                       or die ("Errore sulla query di Aggiornamento1: ".mysql_error());
                }

                mysql_close($connection);

                    header ("Location: dama_InserisciDatiGara.php?cmd=new");
                    /* Redirect browser to starjokes.com  web site */
                    exit;    // Closes further script execution

            }



            mysql_close($connection);



            require_once(FOOTERF);



function My_mysql_column_names($table,$link,$MiaQuery) {
  $query = "SELECT " .$MiaQuery . " FROM {$table}";
  $result = mysql_query($MiaQuery,$link);
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
                    $MieiPuntiStage = round($MieiPuntiStageTot, 2);
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
                    $MioPercentoOK = round($MioPercento, 2);
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
                    $MieiPuntiStage = round($MieiPuntiStageTot, 2);
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
                    $MioPercentoOK = round($MioPercento, 2);
                    $queryUpPercentuale = "UPDATE " .$MioNomeGara ."
                            SET Percentuale = '" .str_replace(',', '.', $MioPercentoOK) ."'
                            WHERE ID = '" .$ID ."'";
                    $resultPercentuale = mysql_query($queryUpPercentuale)
                       or die ("Errore sulla query di Aggiornamento: ".mysql_error());
          }
}

?>
