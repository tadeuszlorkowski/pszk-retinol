<?php
require('retinol1.php');

require('fpdf/fpdf.php');
require('fpdf/makefont/makefont.php');
	
	$found = true;
	
	$model = new Model();
	$injury_id = $_GET["id"];
	$model->get("SELECT * FROM $TABLENAME WHERE injury_id=$injury_id");
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$injury_id = $row["injury_id"];
			$victim = $row["victim"];
			$injury_date = $row["injury_date"];
			$end_date = $row["end_date"];
			$injury = $row["injury"];
			$treatment = $row["treatment"];
		}
	}
	else
		$found = false;

if($ADMINCOND) {
	
if($found) {

$pdf = new FPDF();
$pdf->SetTitle("$injury_id. $victim, $injury, $treatment");
$pdf->SetAuthor($_SESSION['name']);
$pdf->AddPage();

$pdf->AddFont('Berlin','','BerlinSansFBPL-Reg.php');
$pdf->AddFont('Times','','Times.php');
$pdf->AddFont('Times','B','Timesbd.php');
$pdf->AddFont('Times','BI','Timesbi.php');
$pdf->AddFont('Times','I','Timesi.php');


$pdf->Image('retinol.png',10,6,90);
$pdf->SetFont('Berlin','',20);
$pdf->Cell(40,70,'Retinol');
$pdf->Ln(10);
$pdf->SetFont('Berlin','',16);
$pdf->Cell(40,70,iconv("UTF-8", "ISO-8859-2",'Polski system zarządzania kontuzjami'));
$pdf->Ln(10);
$pdf->SetFont('Times','',16);
$pdf->Cell(40,70,iconv("UTF-8", "ISO-8859-2",'Numer kontuzji '.$ORG_PREFIX.$injury_id));

$pdf->Line(0,70,240,70);

$pdf->SetFont('Times','B',20);
$pdf->Cell(-40);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2",wielkie_polskie_litery($victim)));
$pdf->SetFont('Times','I',16);
$pdf->Ln(10);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2","$injury, $treatment"));
$pdf->Ln(10);

$pdf->SetFont('Times','',16);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2","Poszkodowany: $victim"));
$pdf->Ln(10);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2","Kontuzja: $injury"));
$pdf->Ln(10);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2","Metoda leczenia: $treatment"));
$pdf->Ln(10);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2","Data kontuzji: $injury_date"));
$pdf->Ln(10);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2","Data końcowa*: $end_date"));
$pdf->SetFont('Times','I',16);
$pdf->Ln(10);
$pdf->Cell(40,100,iconv("UTF-8", "ISO-8859-2",'Życzymy rychłego powrotu do zdrowia.'));

$pdf->SetY(-39);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,10,iconv("UTF-8", "ISO-8859-2",'*Data końcowa - dzień w którym ostatni widoczny objaw/metoda leczenia się skończyła (nie liczy się np. rehabilitacja)'));
$pdf->Ln(4);
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,10,iconv("UTF-8", "ISO-8859-2",'UWAGA - PSZK Retinol NIE jest systemem lekarskim. Niniejszy dokument nie został wystawiony przez pracownika'));
$pdf->Ln(4);
$pdf->Cell(0,10,iconv("UTF-8", "ISO-8859-2",'służby zdrowia i nie może zostać wykorzystany do uzyskania ulg ani zwolnień.'));

$pdf->Output();

}
else
	echo "<h1>Kontuzja nie znaleziona.</h1>";

}
else {
	echo "<h1>Nie masz uprawnień do tej funkcji.</h1>";
}





?>