<?php
require 'vendor/autoload.php';

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('times', 'B', 16);
$pdf->Cell(40, 10, 'Hello, TCPDF!');
$pdf->Output('example.pdf', 'D');
?>