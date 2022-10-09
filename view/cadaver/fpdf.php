<?php
// Ajuste o path abaixo se necessário
// define('FPDF_FONTPATH','fpdf/font/');
require('FPDF/fpdf.php');

$pdf = new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Image('/var/images/imagem.jpg',10,40,45,55,'JPG','http://www.dnocs.gov.br/logo.jpg');

$pdf->Output();
?>