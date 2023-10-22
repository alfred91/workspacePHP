<?php
require 'vendor/autoload.php';

function generarPDF($proyectos) {
    
    //Nuevo pdf, creamos una pagina y elegimos el tipo de fuente y tamaño
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('times', 'B', 16);

    // Pintar el PDF para cada proyecto
    foreach ($proyectos as $proyecto) {
        $pdf->Cell(40, 10, 'ID: ' . $proyecto['id']);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Nombre: ' . $proyecto['nombre']);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Fecha Inicio: ' . $proyecto['fechaInicio']);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Fecha Fin: ' . $proyecto['fechaFinPrevista']);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Dias transcurridos: ' . $proyecto['diasTranscurridos']);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Porcentaje completado: ' . $proyecto['porcentajeCompletado']);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Importancia: ' . $proyecto['importancia']);
        $pdf->Ln(10);
    }
    // Devuelve el PDF como caena de bytes
    return $pdf->Output('', 'S');
}
?>