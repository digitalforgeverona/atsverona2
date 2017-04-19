<?php
     require_once('class2.php');
     //require_once(HEADERF);
     include ('class.ezpdf.php');
     require_once('fpdf.php');
     require_once('fpdi.php');
     $MioNomeGara = $_GET['NomeGara'];
	 
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
               $NomeGara = str_replace(' ', '_', $MioNomeGara);
               $query = "SELECT * FROM " .$NomeGara ."";
               $result = mysql_query($query) or die ("Errore sulla query LIST: ".mysql_error());;
               
               $NumeroStages = NUMEROSTAGES;
               //$NumeroProve = TOTPROVE;

//' .$MieiStages[$i] .'

//// initiate FPDI
$pdf =& new FPDI();
//for($i=1;$i<=NUMEROSTAGES;$i++){
//// add a page
//$pdf->AddPage('P','A4');
//// set the sourcefile
//$pdf->setSourceFile('./Bianco.pdf');
//// import page 1
//$tplIdx = $pdf->importPage(1);
//// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplIdx, 0, 0, 210);

$R=0;
$C=0;
$Num=0;
while ($data = mysql_fetch_array($result))
               {			   
               $ID = $data['ID'];
               $Tessera = $data['Tessera'];
			   $Nome = $data['Nome'];
			   $Categoria = $data['Categoria'];
               $Division = $data['Division'];
               $MatchType = $data['MatchType'];
			   $DataGara = $data['DataGara'];
			   $Turno = $data['Turno'];
			   $Gruppo = $data['Gruppo'];
               if ($Num==0){
				   $Num ++;
				   	//// add a page
					$pdf->AddPage('P','A4');
					//// set the sourcefile
					$pdf->setSourceFile('./Bianco.pdf');
					//// import page 1
					$tplIdx = $pdf->importPage(1);
					//// use the imported page and place it at point 10,10 with a width of 100 mm
					$pdf->useTemplate($tplIdx, 0, 0, 210);}
				   else {
					   	$Num=0;
					   	
					}
				Scrivi($pdf,$ID,$Nome,$Division,$MatchType,$DataGara,$Turno,$Gruppo,$Categoria,$Tessera,$Num);
			   
}

$NomeFile = "Statino.pdf";
$pdf->Output($NomeFile, 'I');
shell_exec("print /D RICOH " .$NomeFile ."");


function Scrivi($pdf,$ID,$Nome,$Division,$MatchType,$DataGara,$Turno,$Gruppo,$Categoria,$Tessera,$Num){

if ($Num==1){
	$M=0;}
	else {
	$M=148;}

	for ($R=0;$R<=3;$R++){
		for ($C=0;$C<=2;$C++){
		
		$DXC=$C*70;
		$DYC=$R*37;
		
		$pdf->SetFont('Arial','B',14);
		//$pdf->SetXY($DXC,$DYC+$M);
		//$pdf->Cell(70,35,$C .' - ' .$R .' - ' .$M,1,1,'C',false);
		
		$pdf->Text($DXC+7, $DYC+$M+10,$ID);
		$pdf->SetFont('Arial','B',14);
		$pdf->Text($DXC+7, $DYC+$M+16,$Nome);
		$pdf->SetFont('Arial','B',10);
		$pdf->Text($DXC+7, $DYC+$M+20,$Tessera .' - ' .$MatchType);
		$pdf->Text($DXC+7, $DYC+$M+24,'Div:' .$Division);
		$pdf->Text($DXC+7, $DYC+$M+28,'Cat:' .$Categoria);
		$pdf->Text($DXC+7, $DYC+$M+32,$DataGara .'  Tur:' .$Turno .'  Grup:' .$Gruppo);
		
		}
	}
}// END FUNCTION

?>