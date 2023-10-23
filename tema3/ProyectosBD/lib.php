<?php
require 'vendor/autoload.php';

function generarPDF($proyectos) {
    
//NUEVO PDF, AÑADIMOS PAGINA Y ESTABLECEMOS LA FUENTE, TAMAÑO Y TIPO
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('times', 'B', 16);

//PINTAR EN EL PDF LOS DATOS DE CADA PROYECTO:
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
//DEVUELVE EL PDF COMO CADENA DE BYTES
    return $pdf->Output('', 'S');
}
?>


<?php 
    function conexion($bbdd,$usuario,$password){
        try {
            $dsn = "mysql:host=172.17.0.1:3306;dbname=new_schema";
            $dbh = new PDO($dsn, "root", "usuario");
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $dbh;
    }
?>