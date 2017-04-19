<?php

     require_once('class2.php');

     //require_once(HEADERF);

     include ('class.ezpdf.php');

     require_once('fpdf.php');

     require_once('fpdi.php');

     $MiaData = date('d/m/Y - G:i:s');

        //$pdf =& new Cezpdf('a5','landscape');

        //$pdf->selectFont('./fonts/Helvetica.afm');

        $data = array();



               $connection = mysql_connect("89.31.72.136", "ujguas10_main", "esagonale")

                           or die ("NON è possibile stabilire una connessione.");



$db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");

               $NomeGara = str_replace(' ', '_', NOMEGARA);

               $query = "SELECT * FROM " .$NomeGara ." WHERE ID = '" .$_GET['ID'] ."'";



               $result = mysql_query($query);



               while ($data = mysql_fetch_array($result))

               {



               $ID = $data['ID'];

               $Nome = $data['Nome'];

               $Cognome = $data['Cognome'];

               $Classe = $data['Classe'];

               $Divisione = $data['Divisione'];

               $TipoProva = $data['TipoProva'];

               

               }



               $QueryGara = "SELECT * FROM gare WHERE NomeGara = '" .NOMEGARA ."'";

               $resultGara = mysql_query($QueryGara) or die ("ERRORE.");

               while ($dataGara = mysql_fetch_array($resultGara))

               {

               

                     $NumeroStages = $dataGara['NumeroStages'];

                     $NumeroColpi = $dataGara['NumeroColpi'];

               

               }

               //*******************************

               $QueryVerifica = "SELECT * FROM " .$NomeGara ." WHERE Nome='" .$Nome ."' AND Cognome='" .$Cognome ."' AND Divisione='" .$Divisione ."'";

                $resultVerifica = mysql_query($QueryVerifica)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

          //sleep(2);

                while ($rowVerifica = mysql_fetch_array($resultVerifica)){



                  $GareFatte[]=$rowVerifica['Divisione'];



                }

          

                $TotGareFatte=count($GareFatte);





// initiate FPDI

$pdf =& new FPDI();

// add a page

$pdf->AddPage('P','A4');

// set the sourcefile

//if ($_GET['tipo'] == "S"){

$pdf->setSourceFile('bianco.pdf');

//}





// import page 1

$tplIdx = $pdf->importPage(1);

// use the imported page and place it at point 10,10 with a width of 100 mm

$pdf->useTemplate($tplIdx, 0, 0, 210);



// LOGO ESAGONALE

$pdf->Image('logoesagonale.gif',5,5,30);

// now write some text above the imported page

if ($TipoProva=='RIENTRO'){



   $pdf->Rect(200, 0, 10, 55, 'DF');



}





$pdf->Rect(155, 5, 40, 25, 'D');

$pdf->SetFont('Arial','B',32);

$pdf->SetTextColor(0,0,0);

$pdf->SetXY(160, 20);

$pdf->Write(0, $ID);

$pdf->SetFont('Arial','B',18);

$pdf->SetXY(20, 42);

$pdf->Write(0, 'Nome: ' .$Cognome .' ' .$Nome);

$pdf->SetFont('Arial','',12);

$pdf->SetXY(70, 50);

$pdf->Write(0, 'Cat.: ' .$Classe);

$pdf->SetXY(160, 50);

$pdf->Write(0, 'Prest.: ' .$TotGareFatte);

$pdf->SetXY(20, 50);

$pdf->Write(0, 'Div.: ' .$Divisione);

$pdf->SetXY(35, 8);

$pdf->SetFont('Arial','B',18);

$pdf->Write(0, $TipoProva);

$pdf->SetFont('Arial','B',12);

$pdf->SetXY(80, 8);

$pdf->Write(0, $MiaData);

//$pdf->SetXY(80, 12);

//$pdf->Write(0, "Stage Check: " .$NumeroStages ."");

$pdf->SetFont('Times','B',30);

$pdf->SetXY(35, 20);

$pdf->Write(0, NOMEGARA);

$pdf->SetFont('Arial','B',9);

$MyX=5;

$MyY=60;

$MyH=80;

$pdf->SetFont('Arial','B',18);

//IMMAGINE TABELLINA

/*$r=0;

for ($i=0; $i<=$NumeroStages-1; $i++){

$MyYFinal = $MyY+($MyH*$i);

$pdf->Image('tabellina.gif',$MyX,$MyYFinal,200,80);

$pdf->SetXY($MyX, $MyYFinal);

$s=$i+1;

$r=$i;

$pdf->Write(0, "STAGE: " .$s ."");

}*/



//$r=0;

//for ($i=0; $i<=1; $i++){

$MyYFinal = $MyY+($MyH*$i);

$pdf->Image('tabellina.gif',$MyX,$MyYFinal,200,60);

$pdf->SetXY($MyX, $MyYFinal);

$s=$i+1;

$r=$i;

$pdf->Write(0, "STAGE: " .$s ."");

//}



/*

$pdf->AddPage('P','A4');

// set the sourcefile

//if ($_GET['tipo'] == "S"){

$pdf->setSourceFile('./bianco.pdf');

// import page 1

$tplIdx = $pdf->importPage(1);

// use the imported page and place it at point 10,10 with a width of 100 mm

$pdf->useTemplate($tplIdx, 0, 0, 210);



// LOGO ESAGONALE

$pdf->Image('logoesagonale.gif',5,5,30);

// now write some text above the imported page

if ($TipoProva=='RIENTRO'){



   $pdf->Rect(200, 0, 10, 60, 'DF');



}





$pdf->Rect(155, 5, 40, 25, 'D');

$pdf->SetFont('Arial','B',32);

$pdf->SetTextColor(0,0,0);

$pdf->SetXY(160, 20);

$pdf->Write(0, $ID);

$pdf->SetFont('Arial','B',18);

$pdf->SetXY(20, 44);

$pdf->Write(0, 'Nome: ' .$Cognome .' ' .$Nome);

$pdf->SetFont('Arial','',12);

$pdf->SetXY(70, 52);

$pdf->Write(0, 'Cat.: ' .$Classe);

$pdf->SetXY(160, 52);

$pdf->Write(0, 'Prest.: ' .$TotGareFatte);

$pdf->SetXY(20, 52);

$pdf->Write(0, 'Div.: ' .$Divisione);

$pdf->SetXY(35, 8);

$pdf->SetFont('Arial','B',18);

$pdf->Write(0, $TipoProva);

$pdf->SetFont('Arial','B',12);

$pdf->SetXY(80, 8);

$pdf->Write(0, $MiaData);

//$pdf->SetXY(80, 12);

//$pdf->Write(0, "Stage Check: " .$NumeroStages ."");

$pdf->SetFont('Times','B',30);

$pdf->SetXY(35, 20);

$pdf->Write(0, NOMEGARA);

$pdf->SetFont('Arial','B',9);

$MyX=5;

$MyY=70;

$MyH=90;

$pdf->SetFont('Arial','B',18);



$r=0;

for ($i=0; $i<=1; $i++){

$MyYFinal = $MyY+($MyH*$i);

$pdf->Image('tabellina.gif',$MyX,$MyYFinal,200,80);

$pdf->SetXY($MyX, $MyYFinal);

$s=$i+3;

$r=$i;

$pdf->Write(0, "STAGE: " .$s ."");

}

*/

$pdf->SetFont('Arial','B',12);

$pdf->SetXY(5, $MyYFinal+$MyH-5);

$pdf->Write(0, "SAFETY OFFICER");

$pdf->Line(45, $MyYFinal+$MyH-3, 100, $MyYFinal+$MyH-3);

$pdf->SetXY(105, $MyYFinal+$MyH-5);

$pdf->Write(0, "IL TIRATORE");

$pdf->Line(135, $MyYFinal+$MyH-3, 200, $MyYFinal+$MyH-3);



$NomeFile = "Statino.pdf";

$pdf->Output($NomeFile, 'I');

shell_exec("print /D Canon " .$NomeFile ."");

?>



