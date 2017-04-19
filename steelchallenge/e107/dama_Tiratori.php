<?php

//----------------------CREDITS-------------------------
//
//             Sviluppato da Davide Brutto
//                 per contattarmi :
//               davide.brutto@gmail.com
//
//              Ver.: 1.0.0 del 11-01-2011   
//
//------------------------------------------------------
require_once("class2.php");
require_once(HEADERF);

include 'Config_Conn.php';
global $sql, $pref, $user_pref, $tp, $currentUser;
//require_once 'ProgressBar.class.php';
require "class.datepicker.php";
$dp=new datepicker();
$dp->language = 'italian';
$dp->dateFormat = 'Y-m-d';
$dp->firstDayOfWeek=1;
$cmd= $_GET['cmd'];

if (!ADMIN || !getperms('4')) {
    header("location:".e_BASE."index.php");
    exit;
}


/* CONNESSIONE AL DB */     
$connection = mysql_connect(DB_HOST_1, DB_USER_1, DB_PASSWORD_1)
		   or die ("NON è possibile stabilire una connessione.");
$db = mysql_select_db(DB_DATABASE_1, $connection)
		   or die ("NON è possibile selezionare il DB.");

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


$MioTempo=date('Y-m-d H:i:s');

if ($cmd=='show'){

$MyCercaNome = $_REQUEST["CercaNome"];
if ($MyCercaNome==''){$MyCercaNome=$_GET['CercaNome'];}
$MyCercaTessera = $_REQUEST["CercaTessera"];
if ($MyCercaTessera==''){$MyCercaTessera=$_GET['CercaTessera'];}

$query = "SELECT * FROM " .DB_TABLE_Tiratori ."
		 WHERE Nome LIKE '%" .$MyCercaNome ."%'
         AND Tessera LIKE '%" .$MyCercaTessera ."%'
		 ORDER BY Nome
		 ";
$result = mysql_query($query)
          or die ("Errore sulla query: ".mysql_error());
		  
         
/**********************************************************/

/* TABELLA TIRATORI */
echo "<center><div style='position:center;width:800px;background-color:#FFFFFF'>";
echo "<center><TABLE class='fborder' BORDER='1'>";
echo "<TH COLSPAN=6 class='forumheader1'><center><B>CERCA</B></center></TH>";
echo "<FORM METHOD='POST' ACTION='dama_Tiratori.php?cmd=show'>";
echo "<TR>";
echo "<TD class='forumheader4' style='width:80px;'><B>NOME</B></TD>";
echo "<TD class='forumheader4' style='width:80px;'><input type='TEXT' name='CercaNome' value=''></TD>";
echo "<TD class='forumheader1' style='width:80px;'>  </TD>";
echo "<TD class='forumheader4' style='width:80px;'><B>TESSERA</B></TD>";
echo "<TD class='forumheader4' style='width:80px;'><input type='TEXT' name='CercaTessera' value=''></TD>";
echo "<TD class='forumheader4' style='width:80px;'><input type='submit' value='CERCA'></TD>";
echo "</TR>";
echo "</FORM></TABLE>";
echo "<BR>";
echo "<TABLE BORDER='1'>";
echo "<TR>";
echo "<TH COLSPAN=3 class='forumheader1' style='width:80px;'>COMANDI</TH>
	<TH class='forumheader1' style='width:40px;'>TESSERA</TH>
	<TH class='forumheader1' style='width:200px;'>NOME</TH>
	<TH class='forumheader1' style='width:50px;'>DATA NASCITA</TH>
	<TH class='forumheader1' style='width:50px;'>CLASSE</TH>
	<TH class='forumheader1' style='width:50px;'>CATEGORIA</TH>";
	//<TH class='forumheader1' style='width:50px;'>FASCIA</TH>
	echo"<TH class='forumheader1' style='width:150px;'>CLUB</TH>
	<TH class='forumheader1' style='width:50px;'>EMAIL</TH>";
echo "</TR>";

$MyCounter = 1;

while ($row = mysql_fetch_array($result))
{
   	$MioFondo = "forumheader" .str_replace(' ','',$row['Fascia']) ."";
	echo "<TR>";
   	if($MyCounter%2==1)$MioHeader="forumheader4"; //primo colore
	else $MioHeader="forumheader5"; //secondo colore
   	echo "
		<TD class='" .$MioHeader ."' bgcolor='#FFFFFF'><center><a href='./dama_ElencoTiratoriGara.php?cmd=insert&ID=" .$row['ID'] ."'><img src='./e107_images/admin_images/extended_16.png' title='Aggiungi Tiratore alla Gara'/></a></center></TD>
		<TD class='" .$MioHeader ."' bgcolor='#FFFFFF'><center><a href='./dama_Tiratori.php?cmd=upd&ID=" .$row['ID'] ."'><img src='./e107_images/admin_images/edit_16.png' title='Modifica Tiratore'/></a></center></TD>
		<TD class='" .$MioHeader ."' bgcolor='#FFFFFF'><center><a href='./dama_Tiratori.php?cmd=del&ID=" .$row['ID'] ."'><img src='./e107_images/admin_images/delete_16.png' title='Elimina Tiratore'/></a></center></TD>
		<TD class='" .$MioHeader ."'> ", $row['Tessera'], "</TD>
		<TD class='" .$MioHeader ."'> ", $row['Nome'],"</TD>
		<TD class='" .$MioHeader ."'> ", $row['DataNascita'],"</TD>
		<TD class='" .$MioHeader ."'> ", $row['Classe'],"</TD>
		<TD class='" .$MioHeader ."'> ", $row['Categoria'],"</TD>";
		//<TD class='" .$MioFondo ."'> ", $row['Fascia'],"</TD>
		echo"<TD class='" .$MioHeader ."'> ", $row['Club'],"</TD>
		<TD class='" .$MioHeader ."'> ", $row['Email'],"</TD>
		";
   	echo "</TR>";

   	$MyCounter = $MyCounter + 1;
}

echo "</TABLE>
</DIV>";
echo "<br><b>";
$MyCounter = $MyCounter-1;
echo "TOTALE TIRATORI: " .$MyCounter ."";
echo "</BR></BR></BR>";

}


if ($cmd=='upd'){

$MyID = $_GET['ID'];
//QUERY RICERCA TIRATORE DA ID
$query = "SELECT * FROM " .DB_TABLE_Tiratori ." WHERE ID = '" .$MyID ."'";
$result = mysql_query($query) or die ("Errore sulla query: ".mysql_error());

while ($row = mysql_fetch_array($result))
{
$Tessera=$row['Tessera'];
$Nome=$row['Nome'];
$DataNascita=$row['DataNascita'];
$Classe=$row['Classe'];
$Categoria=$row['Categoria'];
$Fascia=$row['Fascia'];
$Club=$row['Club'];
$Email=$row['Email'];	
} // END WHILE	
	
}// END IF CMD=EDIT


if ($cmd=='new'){

$Tessera="";
$Nome="";
$DataNascita="";
$Classe="";
$Categoria="";
$Fascia="";
$Club="";
$Email="";	
	
}// END IF CMD=ADD

if ($cmd=='new' || $cmd=='upd'){
	
// TABELLA COMUNE A MODIFICA ED AGGIUNTA TIRATORE
echo "<center><div style='position:center;width:800px;background-color:#FFFFFF'>";
echo "<center>";
if ($cmd=='new'){		
echo "<FORM METHOD='POST' ACTION='dama_Tiratori.php?cmd=ins'>";}
else {
echo "<FORM METHOD='POST' ACTION='dama_Tiratori.php?cmd=doupd'>";}
echo "<TABLE class='fborder'>
<TR>
<TD class='forumheader1' style='width:400px' COLSPAN='2'><center>SCHEDA TIRATORE</center>
<input type='hidden' name='IDTiratore' value='" .$MyID ."'>
</TD>
</TR>
<TR>
<TD class='forumheader4' style='width:50px'>NUMERO TESSERA</TD>
<TD class='forumheader5' style='width:200px'><input type='TEXT' style='width:80px;' name='Tessera' value='" .$Tessera ."'></TD>
</TR>
<TR>
<TD class='forumheader4' style='width:50px'>COGNOME E NOME</TD>
<TD class='forumheader5' style='width:200px'><input type='TEXT' style='width:200px;' name='Nome' value='" .$Nome ."'><BR>(Inserire prima il Cognome e poi il Nome)</TD>
</TR>
<TR>
<TD class='forumheader4' style='width:80px'>DATA NASCITA</TD><TD class='forumheader5' style='width:250px'>";
?>
   <input type="TEXT" name="DataNascita" id="DataNascita" SIZE="20" value="<?php echo "" .$DataNascita .""; ?>">
   <input type="button" value="..." onclick="<?php echo$dp->show("DataNascita")?>">
<?php
echo "<BR>Inserire nel formato AAAA-MM-GG</TD></TR>";
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
} //CHIUDE While Fascia
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
<TD class='forumheader4' style='width:50px'>EMAIL</TD>
<TD class='forumheader5' style='width:200px'><input type='TEXT' style='width:200px;' name='Email' value='" .$Email ."'></TD>
</TR>
<TR>";
if ($cmd=='new'){
echo "<TD class='forumheader1' style='width:400px' COLSPAN='4'><center><input type='submit' value='SALVA TIRATORE'></center></TD>";}				
else {
echo "<TD class='forumheader1' style='width:400px' COLSPAN='4'><center><input type='submit' value='AGGIORNA TIRATORE'></center></TD>";}	
echo "</TR>
	</TABLE>
	</FORM>
	</DIV>
	<BR><BR><BR>
";

} // END IF EDIT Oppure ADD


if ($cmd=='ins' || $cmd=='doupd'){
//************************************************* CARICA LE VARIABILI PER INSERIMENTO E AGGIORNAMENTO ************************
$IDTiratore=$_REQUEST['IDTiratore'];
$Tessera=$_REQUEST['Tessera'];
$Nome=$_REQUEST['Nome'];
$DataNascita=$_REQUEST['DataNascita'];
$Classe=$_REQUEST['Classe'];
$Categoria=$_REQUEST['Categoria'];
$Fascia=$_REQUEST['Fascia'];
$Club=$_REQUEST['Squadre'];
$Email=$_REQUEST['Email'];	
} //END IF CMD=INS E DOUPD

if ($cmd=='ins'){	
	//QUERY DI INSERIMENTO
	$query_Ins_Tiratore = "INSERT INTO " .DB_TABLE_Tiratori ." 
						(Tessera, Nome, DataNascita, Classe, Categoria, Fascia, Club, Email)
                       	VALUES('" .$Tessera ."',
								'" .$Nome ."',
								'" .$DataNascita ."',
								'" .$Classe ."',
								'" .$Categoria ."', 
								'" .$Fascia ."', 
								'" .$Club ."',								
								'" .$Email ."')";
	$result_Ins_Tiratore = mysql_query($query_Ins_Tiratore) or die ("Errore sulla query: ".mysql_error());
	header( "Location: dama_Tiratori.php?cmd=show&CercaNome=" .$Nome ."&CercaTessera=" .$Tessera ."" );
} // FINE IF CMD=INS


if ($cmd=='doupd'){
	$queryUpTiratore = "UPDATE " .DB_TABLE_Tiratori ." SET 
						Tessera = '" .$Tessera ."',
                       	Nome = '" .$Nome ."',
                       	DataNascita ='" .$DataNascita ."',
						Classe = '" .$Classe ."',
                       	Categoria = '" .$Categoria ."',
                       	Fascia = '" .$Fascia ."',
                       	Club = '" .$Club ."',
                       	Email = '" .$Email ."'
                       	WHERE ID = '" .$IDTiratore ."'";						

$resultUpTiratore = mysql_query($queryUpTiratore) or die ("Errore sulla query di Aggiornamento: ".mysql_error());

header( "Location: dama_Tiratori.php?cmd=show&CercaNome=" .$Nome ."&CercaTessera=" .$Tessera ."" );



} // FINE IF CMD=DOUPD

// ******************************** CANCELLAZIONE TIRATORE *************************************
if ($cmd=='del'){
			  echo "<center><B>ELIMINARE IL TIRATORE?</B></center>";
			  $IDTiratore=$_GET['ID'];

				$query_Tiratore = "SELECT * FROM " .DB_TABLE_Tiratori ." WHERE ID='" .$IDTiratore ."'";
				$result_Tiratore = mysql_query($query_Tiratore) or die ("Errore sulla query: ".mysql_error());
				
				while ($row_Tiratore = mysql_fetch_array($result_Tiratore)){
					$NomeTiratore=$row_Tiratore['Nome'];
					$Tessera=$row_Tiratore['Tessera'];
				}
				
				echo "<BR><center>
                    Nome Tiratore: " .$NomeTiratore ."<BR>
                    Numero Tessera: " .$Tessera ."<BR>
                    <a href='./dama_Tiratori.php?cmd=delok&ID=" .$IDTiratore ."'>ELIMINA</a>
                    <a href='./dama_Tiratori.php?cmd=show'>ANNULLA</a>
                    <BR><BR>";
	
} // FINE IF CMD=DEL

// ********************************************* FINE RICHIESTA CANCELLA GARA *******************************************


// ********************************************* CANCELLA GARA ************************************************

if ($cmd=='delok'){
			  $IDTiratore=$_GET['ID'];
			  
			    $query_Tiratore = "SELECT * FROM " .DB_TABLE_Tiratori ." WHERE ID='" .$IDTiratore ."'";
				$result_Tiratore = mysql_query($query_Tiratore) or die ("Errore sulla query: ".mysql_error());
				
				while ($row_Tiratore = mysql_fetch_array($result_Tiratore)){
					$NomeTiratore=$row_Tiratore['Nome'];
					$Tessera=$row_Tiratore['Tessera'];
				}
			  
			  $query = "DELETE FROM " .DB_TABLE_Tiratori ." WHERE ID='" .$IDTiratore ."'";
              $result = mysql_query($query) or die ("Errore sulla query di cancellazione gara: ".mysql_error());
			  
			  echo "<BR><center><B>TIRATORE ELIMINATO</B><BR><BR>
                    Nome Tiratore: " .$NomeTiratore ."<BR>
                    Numero Tessera: " .$Tessera ."<BR>
                    <a href='./dama_Tiratori.php?cmd=show'>RITORNA</a>
					<BR><BR>";
			  
			  
	
} // FINE IF CMD=DEL

// ********************************************* FINE CANCELLA GARA *******************************************



mysql_close($connection);
require_once(FOOTERF);
?>