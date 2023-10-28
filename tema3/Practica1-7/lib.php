<?php
require 'vendor/autoload.php';

//FUNCION PARA AUTENTICAR AL USUARIO, SE LE LLAMA DESDE CONTROLADOR
function userLogin($email,$password){
    if (strlen($password) < 8 || !preg_match("/[A-Z]/",$password)){
        header("Location: login.php?error=CONTRASENA_INVALIDA");
        die();
    }
 //CARGA EL USUARIO EN LA SESION   
    $_SESSION['usuario']=$email;
}




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