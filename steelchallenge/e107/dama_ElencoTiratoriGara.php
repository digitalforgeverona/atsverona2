<?php

require_once('./class2.php');
require_once(HEADERF);
require "class.datepicker.php";
$dp=new datepicker();

if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}

$connection = mysql_connect("localhost", "atsverona", "Jump02052012")
                           or die ("NON è possibile stabilire una connessione (1).");

$db = mysql_select_db("atsveron_steel", $connection)
                           or die ("NON è possibile selezionare il DB.");

include 'Config_Conn.php';

// QUERY CATEGORIE
$queryCategorie = "SELECT * FROM " .DB_TABLE_Categorie ." ORDER BY Categoria";
$resultCategorie = mysql_query($queryCategorie) or die ("Errore sulla query: ".mysql_error());

// QUERY CLASSI
$queryClassi = "SELECT * FROM " .DB_TABLE_Classi ." ORDER BY Classe";
$resultClassi = mysql_query($queryClassi) or die ("Errore sulla query: ".mysql_error());

// QUERY DIVISIONI
$queryDivisioni = "SELECT * FROM " .DB_TABLE_Divisioni ." ORDER BY Divisione";
$resultDivisioni = mysql_query($queryDivisioni) or die ("Errore sulla query: ".mysql_error());

// QUERY FascieTiratori
$queryFascieTiratori = "SELECT * FROM " .DB_TABLE_FascieTiratori ." ORDER BY Fascia";
$resultFascieTiratori = mysql_query($queryFascieTiratori) or die ("Errore sulla query: ".mysql_error());

// QUERY CLUB
$querySquadre = "SELECT * FROM " .DB_TABLE_Squadre ." ORDER BY NomeSquadra";
$resultSquadre = mysql_query($querySquadre) or die ("Errore sulla query: ".mysql_error());


$MyCmd = $_GET['cmd'];
$OrderBy = $_GET['OrderBy'];
if ($OrderBy==''){$OrderBy='ID';}
$OrderType = $_GET['OrderType'];
if ($OrderType==''){$OrderType='DESC';}

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
                   $MyNome = $row['Name'];
                   $MyCognome = $row['Surname'];
               }

               echo "<BR><center>
                    Nome: " .$MyNome ."<BR>
                    Cognome: " .$MyCognome ."<BR><BR>
                    <a href='./dama_ElencoTiratoriGara.php?cmd=erase&ID=" .$MyID ."'>ELIMINA</a>
                    <a href='./dama_ElencoTiratoriGara.php'>ANNULLA</a>
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

if ($MyCmd=='save'){

/*
$MyID = $_REQUEST['ID'];
$MyDivision = $_REQUEST['Divisione'];
$MyTipoGara = $_REQUEST['TipoGara'];
*/

$MyID = $_REQUEST['ID'];
//$Tessera = trim($_REQUEST['Tessera']);
$Club = trim($_REQUEST['Squadre']);
$MyNome = trim($_REQUEST['Nome']);
$Tessera = trim($_REQUEST['Tessera']);
$Classe = trim($_REQUEST['Classe']);
$Categoria = trim($_REQUEST['Categoria']);
$Fascia = trim($_REQUEST['Fascia']);
$MyDivision = trim($_REQUEST['Divisione']);
$MyTipoGara = trim($_REQUEST['TipoGara']);
$DataGara = trim($_REQUEST['DataGara']);
$Turno = trim($_REQUEST['Turno']);
$Gruppo = trim($_REQUEST['Gruppo']);

$MioNomeGara = str_replace(' ', '_', NOMEGARA);

$queryU = "UPDATE " .$MioNomeGara ." SET 
			Club = '" .$Club ."',
			Nome = '" .$MyNome ."',
			Tessera = '" .$Tessera ."',
			Classe = '" .$Classe ."',
			Categoria = '" .$Categoria ."',
			Fascia = '" .$Fascia ."',
			Division = '" .$MyDivision ."',
			MatchType = '" .$MyTipoGara ."',
			DataGara = '" .$DataGara ."',
			Turno = '" .$Turno ."',
		   	Gruppo = '" .$Gruppo ."'
		   	WHERE ID = '" .$MyID ."'";
$result = mysql_query($queryU) or die ("Errore sulla query di Aggiornamento: ".mysql_error());

echo "<BR><BR><BR><CENTER>AGGIORNAMENTO TIRATORE - " .$Nome ." - ESEGUITO CORRETTAMENTE.<BR><BR><BR>";

header( "Location: dama_ElencoTiratoriGara.php?cmd=show" );


}// END CMD=SAVE


if ($MyCmd=='modify'||$MyCmd=='insert'){

$ID = $_GET["ID"];
$MioNomeGara = str_replace(' ', '_', NOMEGARA);

$queryD = "SELECT Divisione, DivisioneSteel FROM e107_MARE_Divisioni_Steel";
$resultD = mysql_query($queryD) or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

if($MyCmd=='modify'){
$query = "SELECT * FROM " .$MioNomeGara ." WHERE ID =" .$ID ."";
$result = mysql_query($query) or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

while ($row = mysql_fetch_array($result))
{
   $MyID = $row['ID'];
   $Tessera = trim($row['Tessera']);
   $Club = trim($row['Club']);
   $MyNome = trim($row['Nome']);
   $Tessera = trim($row['Tessera']);
   $Classe = trim($row['Classe']);
   $Categoria = trim($row['Categoria']);
   $Fascia = trim($row['Fascia']);
   $MyDivision = trim($row['Division']);
   $MySubscriptionType = trim($row['MatchType']);
   $DataGara = trim($row['DataGara']);
   $Turno = trim($row['Turno']);
   $Gruppo = trim($row['Gruppo']);
	echo "<CENTER><div style='position:center;width:800px;background-color:#FFFFFF;overflow:auto'>
   		<TABLE BORDER='1' class='fborder'>
		<FORM METHOD='POST' ACTION='" .$PHP_SELF ."?cmd=save'>
   		<TR><TH colspan='2' class='forumheader1'><center><B><font color='#000000'>MODIFICA<BR>DATI ISCRIZIONE</font></B></center><input type='hidden' name='ID' value='" .$MyID ."'></TH></TR>";
}}


if($MyCmd=='insert'){
$query = "SELECT * FROM " .DB_TABLE_Tiratori ." WHERE ID ='" .$ID ."'";
//echo "QUERY: " .$query ."";
$result = mysql_query($query) or die ("Errore sulla query di ricerca tiratore per inser in gara: ".mysql_error());

while ($row = mysql_fetch_array($result))
{
   $MyID = $row['ID'];
   $Tessera = trim($row['Tessera']);
   $Club = trim($row['Club']);
   $MyNome = trim($row['Nome']);
   $Tessera = trim($row['Tessera']);
   $Classe = trim($row['Classe']);
   $Categoria = trim($row['Categoria']);
   $Fascia = trim($row['Fascia']);
   $MyDivision = trim($row['Divisione']);
   $MySubscriptionType = '';
   $DataGara = '';
   $Turno = '';
   $Gruppo = '';
	echo "<CENTER><div style='position:center;width:800px;background-color:#FFFFFF;overflow:auto'>
   		<TABLE BORDER='1' class='fborder'>
		<FORM METHOD='POST' ACTION='" .$PHP_SELF ."?cmd=DoInsert'>
   		<TR><TH colspan='2' class='forumheader1'><center><B>INSERISCI<BR>TIRATORE ALLA GARA</B></center><input type='hidden' name='ID' value='" .$MyID ."'></TH></TR>";
}}


   echo "<TR>
		<TD class='forumheader4' style='width:100px'>Tessera</TD><TD class='forumheader5' style='width:200px'><input type='TEXT' readonly='readonly' style='width:50px;' name='Tessera' value='" .$Tessera ."'></TD>
		</TR>
		<TR>
		<TD class='forumheader4' style='width:100px'>Cognome Nome</TD><TD class='forumheader5' style='width:200px'><input type='TEXT' readonly='readonly' style='width:200px;' name='Nome' value='" .$MyNome ."'></TD>
		</TR>";
		/*echo "<TR>
		<TD class='forumheader4' style='width:50px'>CLASSE</TD>
		<TD class='forumheader5' style='width:200px'>
		<select name='Classe'>";
		while ($row_Classi = mysql_fetch_array($resultClassi))
		{
		if ($row_Classi['Classe']!=$Classe){
		echo "<option value='" .$row_Classi['Classe'] ."'>" .$row_Classi['Classe'] ."</option>";}
		else {
		echo "<option value='" .$row_Classi['Classe'] ."' selected='selected'>" .$row_Classi['Classe'] ."</option>";}   
		} //CHIUDE While Classi
		echo "</select>
		</TD>
		</TR>";*/
		echo "<TR>
		<TD class='forumheader4' style='width:50px'>CATEGORIA</TD>
		<TD class='forumheader5' style='width:200px'>
		<select name='Categoria'>";
		while ($row_Categorie = mysql_fetch_array($resultCategorie))
		{
		if ($row_Categorie['Categoria']!=$Categoria){
		echo "<option value='" .$row_Categorie['Categoria'] ."'>" .$row_Categorie['Categoria'] ."</option>";}
		else {
		echo "<option value='" .$row_Categorie['Categoria'] ."' selected='selected'>" .$row_Categorie['Categoria'] ."</option>";}   
		} //CHIUDE While Classi
		echo "</select>
		</TD>
		</TR>";
		/*echo "<TR>
		<TD class='forumheader4' style='width:50px'>FASCIA</TD>
		<TD class='forumheader5' style='width:200px'>
		<select name='Fascia'>";
		while ($row_FascieTiratori = mysql_fetch_array($resultFascieTiratori))
		{
		if ($row_FascieTiratori['Fascia']!=$Fascia){
		echo "<option value='" .$row_FascieTiratori['Fascia'] ."'>" .$row_FascieTiratori['Fascia'] ."</option>";}
		else {
		echo "<option value='" .$row_FascieTiratori['Fascia'] ."' selected='selected'>" .$row_FascieTiratori['Fascia'] ."</option>";}   
		} //CHIUDE While Classi
		echo "</select>
		</TD>
		</TR>";*/
		echo "<TR>
		<TD class='forumheader4' style='width:50px'>CLUB</TD>
		<TD class='forumheader5' style='width:200px'>
		<select name='Squadre'>";
		while ($row_Squadre = mysql_fetch_array($resultSquadre))
		{
		if ($row_Squadre['NomeSquadra']!=$Club){
		echo "<option value='" .$row_Squadre['NomeSquadra'] ."'>" .$row_Squadre['NomeSquadra'] ."</option>";}
		else {
		echo "<option value='" .$row_Squadre['NomeSquadra'] ."' selected='selected'>" .$row_Squadre['NomeSquadra'] ."</option>";}   
		} //CHIUDE While SQUADRE
		echo "</select>
		</TD>
		</TR>
		<TR>
		<TD class='forumheader4' style='width:100px'>DIVISIONE</TD><TD class='forumheader5' style='width:200px'>
		<SELECT NAME='Divisione'>";
          while ($row1 = mysql_fetch_array($resultD))
		  	{
				    $Pippo=trim($row1['Divisione']);
				if (trim($MyDivision)==$Pippo){
					$Selezionato = 'SELECTED';}
					else {$Selezionato = '';}
				echo "<OPTION VALUE='" .$row1['DivisioneSteel'] ."' " .$Selezionato .">" .$row1['Divisione'] ."</OPTION>";
	  		}
          echo "</SELECT></TD>
		</TR>
		<TR>
		<TD class='forumheader4' style='width:100px'>EVENTO</TD><TD class='forumheader5' style='width:200px'>
		<SELECT NAME='TipoGara'>";
          //while ($row2 = mysql_fetch_array($resultTG))
		  //{
			 	if (trim($MySubscriptionType)=='CENTERFIRE_PISTOL_EVENT'){
					echo "<OPTION VALUE=CENTERFIRE_PISTOL_EVENT SELECTED>CENTERFIRE_PISTOL_EVENT</OPTION>";
					echo "<OPTION VALUE=RIMFIRE_PISTOL_EVENT>RIMFIRE_PISTOL_EVENT</OPTION>";
					}
					else {
					echo "<OPTION VALUE=CENTERFIRE_PISTOL_EVENT>CENTERFIRE_PISTOL_EVENT</OPTION>";
					echo "<OPTION VALUE=RIMFIRE_PISTOL_EVENT SELECTED>RIMFIRE_PISTOL_EVENT</OPTION>";	
					}
				
		  //}
          echo "</SELECT></TD>
		</TR>
		<TR>
		<TD class='forumheader4' style='width:50px'>DATA GARA</TD><TD class='forumheader5' style='width:200px'>";
?>
   <input type="TEXT" name="DataGara" id="DataGara" SIZE="20" value="<?php echo "" .$DataGara .""; ?>">
   <input type="button" value="..." onclick="<?php echo$dp->show("DataGara")?>">
<?php
echo "<BR>Inserire nel formato AAAA-MM-GG</TD></TR>";
		echo "<TR>
		<TD class='forumheader4' style='width:50px'>TURNO</TD>
		<TD class='forumheader5' style='width:200px'><input type='TEXT' style='width:20px;' name='Turno' value='" .$Turno ."'></TD>
		</TR>
		<TR>
		<TD class='forumheader4' style='width:50px'>GRUPPO</TD>
		<TD class='forumheader5' style='width:200px'><input type='TEXT' style='width:20px;' name='Gruppo' value='" .$Gruppo ."'></TD>
		</TR>
		<TR>
		<TD  class='forumheader1' COLSPAN='2'><center><input type='submit' value='SALVA'></center></TD>
		</TR>
		</TABLE>
   		</DIV>";
      
//}// END WHILE

mysql_close($connection);
require_once(FOOTERF);
exit;

}// END IF MODIFY

// ****************************************** INSERT TIRATORE ALLA GARA ***************************************

if ($MyCmd=='DoInsert'){

$MioNomeGara = str_replace(' ', '_', NOMEGARA);
$Club = trim($_REQUEST['Squadre']);
$MyNome = trim($_REQUEST['Nome']);
$Tessera = trim($_REQUEST['Tessera']);
$Classe = trim($_REQUEST['Classe']);
$Categoria = trim($_REQUEST['Categoria']);
$Fascia = trim($_REQUEST['Fascia']);
$MyDivision = trim($_REQUEST['Divisione']);
$MyTipoGara = trim($_REQUEST['TipoGara']);
$DataGara = trim($_REQUEST['DataGara']);
$Turno = trim($_REQUEST['Turno']);
$Gruppo = trim($_REQUEST['Gruppo']);

$query = "SELECT * FROM gare WHERE NomeGara='" .NOMEGARA ."'";
            $result = mysql_query($query) or die ("Errore sulla query LIST: ".mysql_error());
			while ($row = mysql_fetch_array($result)) {
				$NumeroStages=$row['NumeroStages'];
				$SC104=$row['SC104'];
				}
			//echo "NUMSTAGE: " .$NumeroStages ."<BR>";
			//echo "SC104: " .$SC104 ."<BR>";
			$Togli=0;
			if ($SC104!=0){$Togli=3;}
			
			$CampiBianchi=';';
			$TotCampiBianchi=($NumeroStages*15)-$Togli+$NumeroStages+1;
			//echo "TotCampiBianchi: " .$TotCampiBianchi ."<BR>";
			
			for ($c=1; $c<$TotCampiBianchi+8; $c++){
				$CampiBianchi = "" .$CampiBianchi .";";
			}
			
			$sql0="','" .$Tessera ."','" .$MyNome ."','" .$Classe ."','" .$Categoria ."','" .$Fascia ."','" .$MyDivision ."','" .$Club ."','" .$MyTipoGara ."','" .$DataGara ."','" .$Turno ."','" .$Gruppo ."" ;
			
			
			   $sql = "insert into " .$MioNomeGara ." values ('" .$sql0 ."" .$CampiBianchi ."')";
			   $sql2= str_replace(";","','",$sql);
			   //echo "QUERY: " .$sql2 ."<br>";
			   mysql_query($sql2) or die ("Errore sulla query di INSERT tabella: ".mysql_error());
				header( "Location: dama_ElencoTiratoriGara.php?cmd=show" );
}
// ****************************************FINE INSERT TIRATORE ALLA GARA **************************************





          //if ($MyCmd == 'show'){
              $MioNomeGara = str_replace(' ', '_', NOMEGARA);
              $query = "SELECT * FROM " .$MioNomeGara ." ORDER BY " .$OrderBy ." " .$OrderType . "";
              $result = mysql_query($query)
                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

              $NomiColonne = mysql_column_names($MioNomeGara, $connection);
              if ($MyCmd=='show'){
			  $Numero = 11;
			  $NumeroSpan=15;
			  }
			  else {
			  $Numero = count($NomiColonne)-1;
			  $NumeroSpan=$Numero+5;
			  }
			  //echo "Lunghezza Array: " .$Numero ."";
              echo "<CENTER><div style='position:center;width:900px;height:400px;background-color:#FFFFFF;overflow:auto'>";

              //echo "<font color='#FFFFFF'><BR><B>GARA:" .NOMEGARA ."<BR><BR><B>";
              echo "<center>";
              echo "<TABLE BORDER='1' class='fborder'>";
              echo "<TH COLSPAN=" .$NumeroSpan ." class='forumheader1'><B>ELENCO TIRATORI GARA</B></TH>";
              echo "<TR>";
              $i=0;
              $n=1;
              echo "<TH COLSPAN='3' class='forumheader1'><B>COMANDI</B></TH>";
              if($OrderType=='ASC'){
				  $NextOrderType='DESC';
				  }
				else {
					$NextOrderType='ASC';
					}
			  while($i<=$Numero){
                                 echo "<TH class='forumheader1'><center><B><center><a href='" .$PHP_SELF ."?cmd=" .$MyCmd ."&OrderBy=" .$NomiColonne[$i] ."&OrderType=" .$NextOrderType ."' class='link3'>" .$NomiColonne[$i] ."</B></center></TH>";
                                 $i++;
                                 $n++;
              }
				//echo "<TH COLSPAN='2'>COMANDI</TH>";
              echo "</TR>";
              $m=0;
              //$Numero = count($NomiColonne)-1;
              $MyCounter = 1;
			  while ($row = mysql_fetch_array($result))
                  {
					 if($MyCounter%2==1)$MioHeader="forumheader4"; //primo colore
					 else $MioHeader="forumheader5"; //secondo colore
                     echo "<TR>";
                     echo "<TD  class='" .$MioHeader ."' bgcolor='#FFFFFF'><center><a href='./dama_statino_pdf.php?ID=" .$row['ID'] ."'><img src='printer.png' title='Stampa Statino Tiratore'/></a></TD>";
                     echo "<TD  class='" .$MioHeader ."' bgcolor='#FFFFFF'><center><a href='./dama_ElencoTiratoriGara.php?cmd=delete&ID=" .$row['ID'] ."'><img src='delete_16.png' title='ELIMINA PRESTAZIONE'/></a></TD>";
					 echo "<TD  class='" .$MioHeader ."' bgcolor='#FFFFFF'><center><a href='./dama_ElencoTiratoriGara.php?cmd=modify&ID=" .$row['ID'] ."'><img src='edit_16.png' title='MODIFICA DATI ISCRIZIONE'/></a></TD>";
                     
					 for($m=0; $m <= $Numero; $m++){
                                        $NomeCol=$NomiColonne[$m];
                                        echo "<TD class='" .$MioHeader ."'>" .$row[$NomeCol] ."</TD>";
                                        //$m++;
                                        }
                     echo "</TR>";
					 $MyCounter ++;
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
