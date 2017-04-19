<?php

if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}

$MyCmd = $_GET['cmd'];
$MyPrint = $_GET['print'];
$MyStage='';
$MyClassifica = $_GET['classifica'];
$MyEvento = $_GET['evento'];
if ($MyCmd=='Parziale'){
$MyStage = $_REQUEST['NumStage'];
$MyCmd = $_REQUEST['Classifica'];
}
include ('class.ezpdf.php');
require_once('./class2.php');
require_once(HEADERF);

$MioNomeGara = str_replace(' ', '_', NOMEGARA);

if (!mysql_connect("localhost", "atsverona", "Jump02052012"))
    die("Can't connect to database");

if (!mysql_select_db("atsveron_steel"))
    die("Can't select database");

$QueryDatiGara="SELECT * FROM gare WHERE NomeGara='" .NOMEGARA ."'";
//echo "QUERY: " .$QueryDatiGara ."<BR>";
$ResultDatiGara=mysql_query($QueryDatiGara);
while($rowDatiGara = mysql_fetch_array($ResultDatiGara))
{
$DataGara = $rowDatiGara['DataGara'];
$AreaGara = $rowDatiGara['Area'];
}



for ($i=1;$i<=NUMEROSTAGES;$i++){
$SelezioneStages = $SelezioneStages ."Score_Stage_" .$i .",";
}


// sending query
if ($MyClassifica=='OverAll'){//OVERALL
$MiaQuery="SELECT Nome, ID, Tessera, Division, TotalScore, " .$SelezioneStages ." Categoria  FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' AND TotalScore!='0' ORDER BY TotalScore";
}
if ($MyClassifica=='Division'){//DIVISION
$MiaDivisione=$_GET['DivName'];
$MiaQuery="SELECT Nome, ID, Tessera, Division, TotalScore, " .$SelezioneStages ." Categoria  FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' AND TotalScore!='0' AND Division LIKE '%" .$MiaDivisione ."%' ORDER BY TotalScore";
}
if ($MyClassifica=='Category'){//CATEGORIA
$MiaCategoria=$_GET['CatName'];
$MiaQuery="SELECT Nome, ID, Tessera, Division, TotalScore, " .$SelezioneStages ." Categoria  FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' AND TotalScore!='0' AND Categoria='" .$MiaCategoria ."' ORDER BY TotalScore";
//echo "QUERY: " .$MiaQuery ."<BR>";
}
if ($MyClassifica=='Shooter'){//SHOOTER
$MiaTessera=$_GET['tessera'];
$MiaQuery="SELECT * FROM " .$MioNomeGara ." WHERE Tessera='" .$MiaTessera ."'";
//echo "QUERY: " .$MiaQuery ."<BR>";
}
if ($MyClassifica=='Stage'){//SHOOTER
$StageNum=$_GET['StageNum'];
$MiaQuery="SELECT * FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' AND TotalScore!='0' ORDER BY Score_Stage_" .$StageNum ."";
//echo "QUERY: " .$MiaQuery ."<BR>";
}
if ($MyClassifica=='SteelMaster'){//STEEL MASTER
$MiaQuery="SELECT Nome, ID, Tessera, Nuova.TotalMaster FROM (
SELECT Nome, ID, Tessera, MatchType, Division, TotalScore, Categoria, 
COUNT(ID) as 'Num_Iscriz', 
SUM(TotalScore) as TotalMaster  
FROM " .$MioNomeGara ."  
WHERE TotalScore!='0' GROUP BY Nome, Tessera) as Nuova 
WHERE Nuova.Num_Iscriz='3' 
ORDER BY Nuova.TotalMaster ASC";
//echo "QUERY: " .$MiaQuery ."<BR>";

}


$result = mysql_query($MiaQuery);
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);

//****************INTESTAZIONE**************************

if ($MyClassifica != 'Shooter' AND $MyClassifica != 'Stage' AND $MyClassifica != 'SteelMaster'){
echo "<h2>Match Scores for: " .NOMEGARA ."<BR>
Match Date: " .$DataGara ."  -  Match Area: " .$AreaGara ."<BR><BR>
" .$MyEvento ."   -   " .$MyClassifica ."  " .$MiaDivisione ."  " .$MiaCategoria ."</h2>";
//TABELLA ESERCIZI
//echo "<table border='0'><tr>
//<TD><B>Stage</B></TD><TD><B>SCSA ID</B></TD><TD><B>Stage Name</B></TD></TR>";
}

if ($MyClassifica == 'Stage'){
echo "<h2>Match Scores for: " .NOMEGARA ."<BR>
Match Date: " .$DataGara ."  -  Match Area: " .$AreaGara ."<BR><BR>
" .$MyEvento ."   -   " .$MyClassifica ."  " .$MiaDivisione ."  " .$MiaCategoria ." " .$StageNum ." " .$MieiStagesNames[$StageNum] ."</h2>";
}

if ($MyClassifica == 'SteelMaster'){
echo "<h2>Match Scores for: " .NOMEGARA ."<BR>
Match Date: " .$DataGara ."  -  Match Area: " .$AreaGara ."<BR><BR>
STEEL MASTER<BR><BR></h2>";
}

if ($MyClassifica == 'Shooter'){
while($row = mysql_fetch_array($result))
{
$Nome=$row['Nome'];
$Area=$row['Area'];
$Club=$row['Club'];
$Tessera=$row['Tessera'];
}

	
echo "<h2>Competitor Summary<BR>
Match Scores for: " .NOMEGARA ."<BR>
Match Date: " .$DataGara ."  -  Match Area: " .$AreaGara ."</h2><BR><BR>";
echo "<table border='0'>
<tr><Th align=right><B>Name :</B></Th><TD>" .$Nome ."</TD></tr>
<tr><Th align=right><B>Match :</B></Th><TD>" .NOMEGARA ."</TD></tr>
<tr><Th align=right><B>Match Area :</B></Th><TD>" .$AreaGara ."</TD></tr>
<tr><Th align=right><B>Club :</B></Th><TD>" .$Club ."</TD></tr>
<tr><Th align=right><B>FITDS Member Number :</B></Th><TD>" .$Tessera ."</TD></tr>
</table><BR><BR>";
}

// *************** FINE INTESTAZIONE *****************************

if ($MyClassifica != 'Shooter' AND $MyClassifica != 'Stage' AND $MyClassifica != 'SteelMaster' ){
//TABELLA ESERCIZI
echo "<table border='0'><tr>
<TD><B>Stage</B></TD><TD><B>SCSA ID</B></TD><TD><B>Stage Name</B></TD></TR>";
for ($s=1;$s<=NUMEROSTAGES;$s++){
	
echo "<TR><TD><center><B>" .$s ."</center></TD><TD><center><B>" .$MieiStages[$s] ."</center></TD><TD><a href='./dama_Classifica.php?classifica=Stage&evento=" .$MyEvento ."&StageNum=" .$s ."' class='link4'>" .$MieiStagesNames[$s] ."</a></TD></TR>";
}
echo "</table><BR><BR>";
// FINE ESERCIZI
}

if ($MyClassifica != 'Shooter' AND $MyClassifica != 'Stage' AND $MyClassifica != 'SteelMaster' ){// ******************************STAMPA LA TABELLA
echo "<table border='1' style=border-collapse:collapse><tr>";
// printing table headers
echo "<td><center><b>Place</b></td>";
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    $MioNome = $field->name;
	$MioNome1 = str_replace('Score_','',$MioNome);
	$MioNome2 = str_replace('_',' ',$MioNome1);
	echo "<td><center><b>{$MioNome2}</b></center></td>";
}
echo "</tr>\n";
// printing table rows
$Pos=0;
$TotCelle=NUMEROSTAGES+6;
while($row = mysql_fetch_row($result))
{
		echo "<tr>";
		$Pos++;
		echo "<td><center>$Pos</td>";
for ($r=0;$r<=NUMEROSTAGES+5;$r++){        
		if ($r==0){
			echo "<td><center><a href='./dama_Classifica.php?classifica=Shooter&tessera=" .$row['2'] ."' class='link4'>" .$row[$r] ."</a></td>";
		}
		else {
			echo "<td><center>" .$row[$r] ."</td>";
		}
}
echo "</tr>\n";
}
echo "</table>";
mysql_free_result($result);
} // FINE STAMPA TABELLA

// ************** STAMPA LA TABELLA SE PER SHOOTER ********************
if ($MyClassifica == 'Shooter'){

$result = mysql_query($MiaQuery);
while($row = mysql_fetch_array($result))
{
echo "<hr />";
$MatchType=$row['MatchType'];
$TotalScore=$row['TotalScore'];
$Division=$row['Division'];

echo "<table border='1' style=border-collapse:collapse>
<TR><TH>Match Type</TH><TH>Total Score</TH><TH>Division</TH></TR>
<TR><TD>" .$MatchType ."</TD><TD>" .$TotalScore ."</TD><TD>" .$Division ."</TD></TR></table>";
echo "<BR>";
echo "<table border='1' style=border-collapse:collapse>
<TR><TH COLSPAN=3></TH><TH COLSPAN=2 align=center>Run 1</TH><TH COLSPAN=2 align=center>Run 2</TH><TH COLSPAN=2 align=center>Run 3</TH><TH COLSPAN=2 align=center>Run 4</TH><TH COLSPAN=2 align=center>Run 5</TH></TR>
<TR><TH>Stage</TH><TH>Stage Name</TH><TH><a href='./dama_Classifica.php?classifica=OverAll&evento=" .$MatchType ."' class='link4'>Aggr<BR>Time</a></TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH></TR>";
for ($t=1;$t<=NUMEROSTAGES; $t++){
unset($MyBColor);
$MioPS="PS" .$t ."";
$PS=$row[$MioPS];
$MyBColor[$PS]="bgcolor=#CCCCCC";
if ($MieiStages[$t]=='SC104'){$MyColor='bgcolor=#000000';}
else {$MyColor='';}
echo "<TR><TD><center>" .$t ."</TD><TD><center><a href='./dama_Classifica.php?classifica=Stage&evento=" .$MatchType ."&StageNum=" .$t ."' class='link4'>" .$MieiStagesNames[$t] ."</a></TD><TD><center>" .$row['Score_Stage_' .$t .''] ."</TD>
																			<TD " .$MyBColor[1] ."><center>" .$row['Time_' .$t .'_1'] ."</TD><TD " .$MyBColor[1] ."><center>" .$row['Penalty_' .$t .'_1'] ."</TD>
																			<TD " .$MyBColor[2] ."><center>" .$row['Time_' .$t .'_2'] ."</TD><TD " .$MyBColor[2] ."><center>" .$row['Penalty_' .$t .'_2'] ."</TD>
																			<TD " .$MyBColor[3] ."><center>" .$row['Time_' .$t .'_3'] ."</TD><TD " .$MyBColor[3] ."><center>" .$row['Penalty_' .$t .'_3'] ."</TD>
																			<TD " .$MyBColor[4] ."><center>" .$row['Time_' .$t .'_4'] ."</TD><TD " .$MyBColor[4] ."><center>" .$row['Penalty_' .$t .'_4'] ."</TD>
																			<TD " .$MyColor ."" .$MyBColor[5] ."><center>" .$row['Time_' .$t .'_5'] ."</TD><TD " .$MyColor ."" .$MyBColor[5] ."><center>" .$row['Penalty_' .$t .'_5'] ."</TD>
																			</TR>";
}
echo "</table><BR><BR>";
}
}

// **************** FINE STAMPA TABELLA PER SHOOTER *******************

// ************** STAMPA LA TABELLA SE PER STAGE ********************
if ($MyClassifica == 'Stage'){

$result = mysql_query($MiaQuery);
$MatchType=$row['MatchType'];
$Pos=0;
echo "<table border='1' style=border-collapse:collapse>
<TR><TH COLSPAN=5></TH><TH COLSPAN=2 align=center>Run 1</TH><TH COLSPAN=2 align=center>Run 2</TH><TH COLSPAN=2 align=center>Run 3</TH><TH COLSPAN=2 align=center>Run 4</TH><TH COLSPAN=2 align=center>Run 5</TH></TR>
<TR><TH>Place</TH><TH>Name</TH><TH>FITDS</TH><TH>Division</TH><TH><a href='./dama_Classifica.php?classifica=OverAll&evento=" .$MyEvento ."' class='link4'>Aggr<BR>Time</a></TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH><TH>Time</TH><TH>Penalty</TH></TR>";

while($row = mysql_fetch_array($result))
{
//echo "<hr />";
$Pos++;
$MatchType=$row['MatchType'];
$TotalScore=$row['TotalScore'];
//$Division=$row['Division'];

//for ($t=1;$t<=NUMEROSTAGES; $t++){
$t=$StageNum;
unset($MyBColor);
$MioPS="PS" .$t ."";
$PS=$row[$MioPS];
$MyBColor[$PS]="bgcolor=#CCCCCC";
if ($MieiStages[$t]=='SC104'){$MyColor='bgcolor=#000000';}
else {$MyColor='';}
echo "<TR><TD><center>" .$Pos ."</TD><TD><center><a href='./dama_Classifica.php?classifica=Shooter&tessera=" .$row['Tessera'] ."' class='link4'>" .$row['Nome'] ."</a></TD><TD><center>" .$row['Tessera'] ."</TD><TD><center>" .$row['Division'] ."</TD><TD><center>" .$row['Score_Stage_' .$t .''] ."</TD>
																			<TD " .$MyBColor[1] ."><center>" .$row['Time_' .$t .'_1'] ."</TD><TD " .$MyBColor[1] ."><center>" .$row['Penalty_' .$t .'_1'] ."</TD>
																			<TD " .$MyBColor[2] ."><center>" .$row['Time_' .$t .'_2'] ."</TD><TD " .$MyBColor[2] ."><center>" .$row['Penalty_' .$t .'_2'] ."</TD>
																			<TD " .$MyBColor[3] ."><center>" .$row['Time_' .$t .'_3'] ."</TD><TD " .$MyBColor[3] ."><center>" .$row['Penalty_' .$t .'_3'] ."</TD>
																			<TD " .$MyBColor[4] ."><center>" .$row['Time_' .$t .'_4'] ."</TD><TD " .$MyBColor[4] ."><center>" .$row['Penalty_' .$t .'_4'] ."</TD>
																			<TD " .$MyColor ."" .$MyBColor[5] ."><center>" .$row['Time_' .$t .'_5'] ."</TD><TD " .$MyColor ."" .$MyBColor[5] ."><center>" .$row['Penalty_' .$t .'_5'] ."</TD>
																			</TR>";
//}

}
echo "</table><BR><BR>";
}

// **************** FINE STAMPA TABELLA PER STAGE *******************


// ************** STAMPA LA TABELLA SE PER STEELMASTER ********************

echo "<table border='1' style=border-collapse:collapse><tr>";
// printing table headers
echo "<td><center><b>Place</b></center></td>
<td><center><b>Nome</b></center></td>
<td><center><b>Tessera</b></center></td>
<td><center><b>Div 1</b></center></td>
<td><center><b>Div 2</b></center></td>
<td><center><b>Div 3</b></center></td>
<td><center><b>Totale</b></center></td>";
echo "</tr>\n";
// printing table rows
$Pos=0;
$result = mysql_query($MiaQuery);

while($row = mysql_fetch_array($result))
{
		
$MiaTessera=$row['Tessera'];
$MiaQuery2="SELECT Division FROM " .$MioNomeGara ." WHERE Tessera='" .$MiaTessera ."' ORDER BY Division";
$result2 = mysql_query($MiaQuery2);
$mc=0;
$MiaDiv=array();
while($row2 = mysql_fetch_array($result2)){
	
		$mc++;		
		$MiaDiv[$mc]=$row2['Division'];
	
	}		

		echo "<tr>";
		$Pos++;
		echo "<td><center>$Pos</td>";
		echo "<td><center><a href='./dama_Classifica.php?classifica=Shooter&tessera=" .$row['Tessera'] ."' class='link4'>" .$row['Nome'] ."</a></td>";
		echo "<td><center>" .$row['Tessera'] ."</td>";
		echo "<td><center>" .$MiaDiv[1] ."</td>";
		echo "<td><center>" .$MiaDiv[2] ."</td>";
		echo "<td><center>" .$MiaDiv[3] ."</td>";
		echo "<td><center>" .$row['TotalMaster'] ."</td>";
		
}
echo "</tr>\n";

echo "</table>";
mysql_free_result($result);



// **************** FINE STAMPA TABELLA PER STEELMASTER *******************


require_once(FOOTERF);

mysql_close($connection);

?>





