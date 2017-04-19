<?php
     require_once('class2.php');
     //require_once(HEADERF);
     include ('class.ezpdf.php');
     require_once('fpdf.php');
     require_once('fpdi.php');
     
	 if (!USER) {
    header("location:".e_BASE."index.php");
    exit;
}
	 
	 $MiaData = date('d/m/Y - G:i:s');

        $data = array();

               $connection = mysql_connect("localhost", "atsverona", "Jump02052012")
                           or die ("NON è possibile stabilire una connessione.");
               $db = mysql_select_db("atsveron_steel", $connection)
                           or die ("NON è possibile selezionare il DB.");
               $NomeGara = str_replace(' ', '_', NOMEGARA);
               $query = "SELECT * FROM " .$NomeGara ." WHERE ID = '" .$_GET['ID'] ."'";
               $result = mysql_query($query);
               while ($data = mysql_fetch_array($result))
               {
               $ID = $data['ID'];
               $Tessera = $data['Tessera'];
			   $Nome = $data['Nome'];
			   $Classe = $data['Classe'];
			   $Categoria = $data['Categoria'];
               $Division = $data['Division'];
			   $Club = $data['Club'];
               $MatchType = $data['MatchType'];
			   $DataGara = $data['DataGara'];
			   $Turno = $data['Turno'];
			   $Gruppo = $data['Gruppo'];
               }
               $NumeroStages = NUMEROSTAGES;
               $NumeroProve = TOTPROVE;

//' .$MieiStages[$i] .'

//// initiate FPDI
$pdf =& new FPDI();
for($i=1;$i<=NUMEROSTAGES;$i++){
//// add a page
$pdf->AddPage('L','A5');
//// set the sourcefile
$pdf->setSourceFile('./BaseStatino_' .$MieiStages[$i] .'.pdf');
//// import page 1
$tplIdx = $pdf->importPage(1);
//// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 210);
Scrivi($i,$pdf,$ID,$Nome,$Division,$MatchType,$DataGara,$Turno,$Gruppo,$Classe,$Categoria);
}

$NomeFile = "Statino.pdf";
$pdf->Output($NomeFile, 'I');
shell_exec("print /D RICOH " .$NomeFile ."");

function Scrivi($MioStage,$pdf,$ID,$Nome,$Division,$MatchType,$DataGara,$Turno,$Gruppo,$Classe,$Categoria){

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(8, 120);
$pdf->Write(0, 'Numero Gara: ');
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(8, 115);
$pdf->Write(0, 'Nome: ' .$Nome);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(79, 124);
$pdf->Write(0, 'Div.: ');
$pdf->SetXY(8, 124);
$pdf->Write(0, 'Tipo Prova: ');
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(46, 120);
$pdf->Write(0, 'Data: ');
$pdf->SetXY(79, 120);
$pdf->Write(0, 'Turno: ');
$pdf->SetXY(97, 120);
$pdf->Write(0, 'Gruppo: ');
$pdf->SetXY(8, 128);
$pdf->Write(0, 'Categoria: ');
$pdf->SetFont('Arial','',10);
$pdf->SetXY(32, 120);
$pdf->Write(0, '' .$ID);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(87, 124);
$pdf->Write(0, '' .$Division);
$pdf->SetXY(29, 124);
$pdf->Write(0, '' .$MatchType);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(55, 120);
$pdf->Write(0, '' .$DataGara);
$pdf->SetXY(91, 120);
$pdf->Write(0, '' .$Turno);
$pdf->SetXY(112, 120);
$pdf->Write(0, '' .$Gruppo);
$pdf->SetXY(27, 128);
$pdf->Write(0, '' .$Categoria);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(5, 36);
$pdf->Cell(195, 10, 'Gara: ' .NOMEGARA,0,0,'R');
$pdf->SetFont('Arial','B',20);
$pdf->SetXY(165, 48);
$pdf->Write(0, '' .$MioStage);
$pdf->SetFont('Arial','B',9);	
}

?>