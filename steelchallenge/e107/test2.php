<?php

require_once('class2.php');
require_once(HEADERF);

//USER_WIDTH

//GET SCREEN RESOLUTION

include("get_resolution.php");

$brut_w = ($_COOKIE['brut_w'])-500;
$brut_h = ($_COOKIE['brut_h'])-400;
echo "" .$brut_w ." is your screen width and " .$brut_h ." is your screen height.";


// END

$OrderBy = $_GET['OrderBy'];
if ($OrderBy==''){$OrderBy='ID';}
$OrderType = $_GET['OrderType'];
if ($OrderType==''){$OrderType='DESC';}

$connection = mysql_connect("localhost", "atsverona", "Jump02052012")
                           or die ("NON è possibile stabilire una connessione.");

$db = mysql_select_db("atsveron_steel", $connection)
                           or die ("NON è possibile selezionare il DB.");


include 'Config_Conn.php';

$MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $query = "SELECT * FROM " .$MioNomeGara ." ORDER BY " .$OrderBy ." " .$OrderType . "";
              $result = mysql_query($query)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

              $NomiColonne = mysql_column_names($MioNomeGara, $connection);
              if ($MyCmd=='show'){
			  $Numero = 11;
			  }
			  else {
			  $Numero = count($NomiColonne)-1;
			  }
			  //echo "Lunghezza Array: " .$Numero ."";
              echo "<CENTER><div style='position:center;width:" .$brut_w ."px;height:" .$brut_h ."px;background-color:#FFFFFF;overflow:auto'>";

              //echo "<font color='#FFFFFF'><BR><B>GARA:" .NOMEGARA ."<BR><BR><B>";
              echo "<center>";
              echo "<TABLE BORDER='1'>";
              //echo "<TH COLSPAN=4><B>ELENCO GARE INSERITE</B></TH>";
              echo "<TR>";
              $i=0;
              $n=1;
              echo "<TH COLSPAN='3'>COMANDI</TH>";
              if($OrderType=='ASC'){
				  $NextOrderType='DESC';
				  }
				else {
					$NextOrderType='ASC';
					}
			  while($i<=$Numero){
                                 echo "<TH><center><B><font color='#000000'><center><a href='" .$PHP_SELF ."?cmd=" .$MyCmd ."&OrderBy=" .$NomiColonne[$i] ."&OrderType=" .$NextOrderType ."' style='color: rgb(0,255,0)'>" .$NomiColonne[$i] ."</font></B></center></TH>";
                                 $i++;
                                 $n++;
              }
				//echo "<TH COLSPAN='2'>COMANDI</TH>";
              echo "</TR>";
              $m=0;
              //$Numero = count($NomiColonne)-1;
              while ($row = mysql_fetch_array($result))
                  {
                     echo "<TR>";
                     echo "<TD bgcolor='#FFFFFF'><center><a href='./dama_statino_pdf.php?ID=" .$row['ID'] ."'><img src='printer.png' title='Stampa Statino Tiratore'/></a></TD>";
                     echo "<TD bgcolor='#FFFFFF'><center><a href='./dama_ElencoTiratoriGara.php?cmd=delete&ID=" .$row['ID'] ."'><img src='delete_16.png' title='ELIMINA PRESTAZIONE'/></a></TD>";
					 echo "<TD bgcolor='#FFFFFF'><center><a href='./dama_ElencoTiratoriGara.php?cmd=modify&ID=" .$row['ID'] ."'><img src='edit_16.png' title='MODIFICA DATI PRESTAZIONE'/></a></TD>";
                     
					 for($m=0; $m <= $Numero; $m++){
                                        $NomeCol=$NomiColonne[$m];
                                        echo "<TD><font color='#000000'>" .$row[$NomeCol] ."</font></TD>";
                                        //$m++;
                                        }
                     echo "</TR>";
              }

              echo "</TABLE></font></div>";


require_once(FOOTERF);

function mysql_column_names($table,$link) {
  $query = "SELECT * FROM {$table}";
  $result = mysql_query($query,$link);
  $row = mysql_fetch_assoc($result);
  $columns = array_keys($row);
  return $columns;
}

?>
