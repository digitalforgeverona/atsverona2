<?php

$MyClassifica = $_GET['Classifica'];
$MyEvento = $_GET['Evento'];



include ('class.ezpdf.php');
//$pdf =& new Cezpdf('a4','landscape');
//$pdf->selectFont('./fonts/Helvetica.afm');
$MioSelect="";
$ClassNomeStage='';
$MieQueryToDo = array();
$MioNomeDivisione = array();


//#############################################################
// DAVIDE
//#############################################################

$myFile = "GaraAttiva.txt";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
define("NOMEGARA", $theData);
$MioNomeGara = str_replace(' ', '_', NOMEGARA);

//FISSA LE VARIABILI PER IL MASSIMO PUNTEGGIO DEGLI STAGE DELLA GARA ED IL NUMERO DI STAGE
$Miaconnection = mysql_connect("localhost", "atsverona", "Jump02052012") or die ("NON è possibile stabilire una connessione.");
$Miaquery = "SELECT * FROM atsveron_steel.gare WHERE NomeGara LIKE '%" .NOMEGARA ."%'";
$Mioresult = mysql_query($Miaquery) or die ("Errore sulla query LIST: ".mysql_error());
$Miarow = mysql_fetch_array($Mioresult) or die(mysql_error());
define("NUMEROSTAGES", $Miarow['NumeroStages']);
define("SC101", $Miarow['SC101']);
define("SC102", $Miarow['SC102']);
define("SC103", $Miarow['SC103']);
define("SC104", $Miarow['SC104']);
define("SC105", $Miarow['SC105']);
define("SC106", $Miarow['SC106']);
define("SC107", $Miarow['SC107']);
define("SC108", $Miarow['SC108']);
$MieiStages = array();
$MieiStages[$Miarow['SC101']]='SC101';
$MieiStages[$Miarow['SC102']]='SC102';
$MieiStages[$Miarow['SC103']]='SC103';
$MieiStages[$Miarow['SC104']]='SC104';
$MieiStages[$Miarow['SC105']]='SC105';
$MieiStages[$Miarow['SC106']]='SC106';
$MieiStages[$Miarow['SC107']]='SC107';
$MieiStages[$Miarow['SC108']]='SC108';
global $MieiStages;

$MieiStagesNames = array();
$MieiStagesNames[$Miarow['SC101']]='Five to Go';
$MieiStagesNames[$Miarow['SC102']]='Show Down';
$MieiStagesNames[$Miarow['SC103']]='Smoke and Hope';
$MieiStagesNames[$Miarow['SC104']]='Outer Limits';
$MieiStagesNames[$Miarow['SC105']]='Accelerator';
$MieiStagesNames[$Miarow['SC106']]='Pendulum';
$MieiStagesNames[$Miarow['SC107']]='Speed Option';
$MieiStagesNames[$Miarow['SC108']]='Round About';
global $MieiStages;

mysql_close($Miaconnection);

//#############################################################


//$pdf =& new Cezpdf('a4','landscape');

//$pdf->selectFont('./fonts/Helvetica.afm');

$MiaData = date('d/m/Y - G:i:s');

$connection = mysql_connect("localhost", "atsverona", "Jump02052012");

$db = mysql_select_db("atsveron_steel", $connection);

// ********************************* QUERY PER LA STAMPA ***********************************
$SelezioneStages='';

if ($MyClassifica=='Stage'){//STAGE

// QUERY STAGE

for ($S=1;$S<=NUMEROSTAGES;$S++)
{
$ClassNomeStage=$MieiStagesNames[$S];
if ($MieiStages[$S]!='SC104'){

$MiaQuery_Main_Stage="SELECT ID, Nome, Tessera, Division, Time_" .$S ."_1, Penalty_" .$S ."_1, 
						 									Time_" .$S ."_2, Penalty_" .$S ."_2,
															Time_" .$S ."_3, Penalty_" .$S ."_3,
															Time_" .$S ."_4, Penalty_" .$S ."_4,
															Time_" .$S ."_5, Penalty_" .$S ."_5,															
															Score_Stage_" .$S .",
															PS" .$S .",
															Categoria  
															FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' 
															AND TotalScore!='0' ORDER BY Score_Stage_" .$S ."";
}

else {
$MiaQuery_Main_Stage="SELECT ID, Nome, Tessera, Division, Time_" .$S ."_1, Penalty_" .$S ."_1, 
						 									Time_" .$S ."_2, Penalty_" .$S ."_2,
															Time_" .$S ."_3, Penalty_" .$S ."_3,
															Time_" .$S ."_4, Penalty_" .$S ."_4,															
															Score_Stage_" .$S .",
															PS" .$S .",
															Categoria  
															FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' 
															AND TotalScore!='0' ORDER BY Score_Stage_" .$S ."";	
}

$MieQueryToDo[]=$MiaQuery_Main_Stage;

}

}


if ($MyClassifica=='Verify'){//VERIFY

// QUERY VERIFY

for ($S=1;$S<=NUMEROSTAGES;$S++)
{
$ClassNomeStage=$MieiStagesNames[$S];
if ($MieiStages[$S]!='SC104'){

$MiaQuery_Main_Stage="SELECT ID, Nome, Tessera, Division, Time_" .$S ."_1, Penalty_" .$S ."_1, 
						 									Time_" .$S ."_2, Penalty_" .$S ."_2,
															Time_" .$S ."_3, Penalty_" .$S ."_3,
															Time_" .$S ."_4, Penalty_" .$S ."_4,
															Time_" .$S ."_5, Penalty_" .$S ."_5,															
															Score_Stage_" .$S .",
															PS" .$S .",
															Categoria  
															FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' 
															AND TotalScore!='0' ORDER BY Nome";
}

else {
$MiaQuery_Main_Stage="SELECT ID, Nome, Tessera, Division, Time_" .$S ."_1, Penalty_" .$S ."_1, 
						 									Time_" .$S ."_2, Penalty_" .$S ."_2,
															Time_" .$S ."_3, Penalty_" .$S ."_3,
															Time_" .$S ."_4, Penalty_" .$S ."_4,															
															Score_Stage_" .$S .",
															PS" .$S .",
															Categoria  
															FROM " .$MioNomeGara ." WHERE MatchType LIKE '%" .$MyEvento ."%' 
															AND TotalScore!='0' ORDER BY Nome";	
}

$MieQueryToDo[]=$MiaQuery_Main_Stage;

}

}



// ********************************* FINE QUERY PER LA STAMPA ***********************************

//********************************** INIZIO PARTE STAMPA ****************************************

$pdf =& new Cezpdf('a4','landscape');
$pdf->selectFont('./fonts/Helvetica.afm');

$MyClassificaN=$MyClassifica;

for($AR=0; $AR<=count($MieQueryToDo)-1;$AR++){

$data=array();

$queryToDo=$MieQueryToDo[$AR];

//if ($MyClassificaN=='Division'){
$AR1=$AR+1;
$MyClassifica=$MieiStagesNames[$AR1];
//}


$resultQuery = mysql_query($queryToDo) or die ("Errore sulla query semiauto: ".mysql_error());


	   $Posizione = 1;
	   while($data[] = mysql_fetch_assoc($resultQuery)) {}

		//$DataMio[]=$data;

			if (count($data)>=1){
					 for ($outindex = 0; $outindex < count($data) - 1; $outindex++){
						 $Posizione = $outindex + 1;
						 $data[$outindex]['ID'] = "" .$Posizione ."";
					 }
				}
		$Intestazioni["ID"]="";
		$Intestazioni["Tessera"]="\nTess";
		$Intestazioni["Nome"]="\nCognome Nome";
		$Intestazioni["Division"]="\nDivisione";
		
		
		//for ($In=1; $In<=NUMEROSTAGES; $In++){
         
		 	//$Intestazioni['Time_1_1']="1\nTime ";
			//$Intestazioni[5]="2\nTime ";
			//$Intestazioni['Time_1_3']="3\nTime ";
			//$Intestazioni['Time_1_4']="4\nTime ";
		 /*
			$Intestazioni[$pippo]="1\nTime ";
			$Intestazioni["Time_" .$AR1 ."_2"]="2\nTime ";
			$Intestazioni["Time_" .$AR1 ."_3"]="3\nTime ";
			$Intestazioni["Time_" .$AR1 ."_4"]="4\nTime ";
		if ($MieiStages[$AR1]!='SC104'){	
			$Intestazioni["Time_" .$AR1 ."_5"]="5\nTime ";
		}*/
			$Intestazioni["Score_Stage_" .$AR1]="Stage\nTime";
			$Intestazioni["PS" .$AR1]="P\nS\n"; 
        //}
        //$Intestazioni["TotalScore"]="TOTALE";
		
		//print_r($Intestazioni);
		//exit;
		
  		$pdf->ezText('' ,10);
		$pdf->ezText('' .$MiaData .'',12,array('justification'=>'right'));
		$pdf-> addJpegFromFile('Banner_STEEL.jpg',80,$pdf->y-10,600);
		$pdf->ezText('' ,10);
		$pdf->ezText('' ,10);
		$pdf->ezText('' ,10);
		$pdf->ezText('' .NOMEGARA .'' ,20);
        $pdf->ezText('',10);
        $pdf->ezText('EVENTO: ' .$MyEvento .' - ' .$MyClassificaN .' - ' .$AR1 .'',14);
		$Colonne=array();
		$Colore=array('0'=>0.9,'1'=>0.9,'2'=>0.9);
        $Opzioni=array('maxWidth'=>750,'fontSize'=>7,'xPos'=>25,'xOrientation'=>'right','shadeCol'=>$Colore);
		$pdf->ezTable($data,' ',$MyClassifica, $Opzioni);
	
	if ($AR<=count($MieQueryToDo)-2){
		//if ($AR!=0){
		$pdf->ezNewPage();
		//}
	}
	
}
		
		//print_r($DataMio);
		$pdf->stream();
        mysql_close($connection);
        exit;

?>