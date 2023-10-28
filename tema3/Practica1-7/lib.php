<?php
require 'vendor/autoload.php';

//FUNCION PARA AUTENTICAR AL USUARIO
function userLogin($email,$password){
    if (strlen($password) < 8 || !preg_match("/[A-Z]/",$password)){
        header("Location: login.php?error=CONTRASENA_INVALIDA");
        die();
    }
    //CARGA EL USUARIO EN LA SESION   
    $_SESSION['usuario']=$email;

// SE ESTABLECE EL ARRAY
    $proyectos = array(

        array(
            'id' => 1,
            'nombre' => 'Proyecto 1',
            'fechaInicio' => '10-11-2022',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 7,
            'porcentajeCompletado' => 50,
            'importancia' => 1
        ),
        array(
            'id' => 2,
            'nombre' => 'Proyecto 2',
            'fechaInicio' => '01-12-2023',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 15,
            'porcentajeCompletado' => 75,
            'importancia' => 2
        ),
        array(
            'id' => 3,
            'nombre' => 'Proyecto 3',
            'fechaInicio' => '01-12-2023',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 33,
            'porcentajeCompletado' => 80,
            'importancia' => 3
        ),
        array(
            'id' => 4,
            'nombre' => 'Proyecto 4',
            'fechaInicio' => '19-11.2022',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 40,
            'porcentajeCompletado' => 90,
            'importancia' => 4
        ),
        array(
            'id' => 5,
            'nombre' => 'Proyecto 5',
            'fechaInicio' => '19-11-2022',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 5,
            'porcentajeCompletado' => 40,
            'importancia' => 5
        )

    );
        // CARGA LOS PROYECTOS EN LA SESION    
        $_SESSION['proyectos']=$proyectos;
}

//FUNCION PARA CREAR PROYECTOS
function crearProyecto($nombre,$fechaInicio,$fechaFinPrevista,
                        $diasTranscurridos,$porcentajeCompletado,$importancia){

        $proyectos = $_SESSION['proyectos'];
        $nuevoId = max(array_column($proyectos, 'id')) + 1;
                        
    //CREA EL PROYECTO CON LOS PARAMETROS QUE HAN SIDO DEFINIDOS
        $nuevoProyecto = array(
            'id' => $nuevoId,
            'nombre' => $nombre,
            'fechaInicio' => $fechaInicio,
            'fechaFinPrevista' => $fechaFinPrevista,
            'diasTranscurridos' => $diasTranscurridos,
            'porcentajeCompletado' => $porcentajeCompletado,
            'importancia' => $importancia
        );
                        
                // SE AGREGA EL PROYECTO AL ARRAY DE PROYECTOS
                            $_SESSION['proyectos'][] = $nuevoProyecto;
                                                    
                // NOS REDIRIGE A PROYECTOS DONDE YA SE PUEDE VER EL PROYECTO NUEVO        
                            header("Location: proyectos.php");
                            die(); 
}

function eliminarProyecto($proyectoId){
    // OBTEMENOS LOS PROYECTOS DE LA SESION
    $proyectos = $_SESSION['proyectos'];

    // SE BUSCA POR ID Y SE ELIMINA DEL ARRAY
    foreach ($proyectos as $key => $proyecto) {
        if ($proyecto['id'] == $proyectoId) {
            unset($proyectos[$key]);
            break;
        }
    }
    // ACTUALIZA EL ARRAY DE PROYECTOS EN LA SESION 
    $_SESSION['proyectos'] = array_values($proyectos);
}
//FUNCION PARA SACAR EL ID DE UN PROYECTO
function proyectoPorId($proyectoId){

    $proyectos = $_SESSION['proyectos'];
    
    //BUSCA EL PROYECTO ID
        foreach ($proyectos as $proyecto) {
            if ($proyecto['id'] == $proyectoId) {
               return $proyecto;
            }
        }
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