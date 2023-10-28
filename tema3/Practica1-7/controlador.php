<?php session_start();
include 'lib.php';

// SI PINCHAMOS EN LOGIN CON POST Y TENEMOS EL EMAIL Y LA CONTRASEÑA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {

    $email=$_POST['email'];
    $password=$_POST['password'];

//LLAMA A LA FUNCION QUE COMPRUEBA LA CONTRASEÑA Y AUTENTICA AL USUARIO 
        userLogin($email,$password);

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

// REDIRIGE A PROYECTOS YA LOGEADO, PARA VER LOS PROYECTOS
    header("Location: proyectos.php");
    die();

//SI PINCHAMOS EN NUEVO
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'nuevo') {

//RELLENAMOS EL FORM O EL MODAL, Y AQUI SE OBTIENEN LOS DATOS
            $nombre = $_POST['nombre'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinPrevista = $_POST['fechaFinPrevista'];
            $diasTranscurridos = $_POST['diasTranscurridos'];
            $porcentajeCompletado = $_POST['porcentajeCompletado'];
            $importancia = $_POST['importancia'];
        
            
//ASIGNA EL NUEVO ID AL PROYECTO
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

// SI PINCHAMOS EN GENERARPDF    
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'generarPDF') {

//LLAMADA A LA FUNCION GENERARPDF
            $pdfContent = generarPDF($_SESSION['proyectos']);
        
// ENCABEZADOS PARA LA DESCARGA DEL PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="proyectos.pdf"');
        
// IMPRIME CONTENIDO DEL PDF PARA LA DESCARGA EN EL NAVEGADOR
            echo $pdfContent;
            die();

// SI CERRAMOS SESION, SE DESRTRUYE                    
        } elseif ($_GET['accion'] == 'cerrarSesion') {
            // Destruir la sesión
            session_destroy();

//VOLVERIAMOS A PROYECTOS SIN EL ARRAY DE LA SESION        
            header("Location: proyectos.php");
            die();
            
        } elseif ($_GET['accion'] == 'eliminar' && isset($_GET['id'])) {
// ELIMINAR UN PROYECTO 
    $proyecto_id = $_GET['id'];

// OBTEMENOS LOS PROYECTOS DE LA SESION
    $proyectos = $_SESSION['proyectos'];

// SE BUSCA POR ID Y SE ELIMINA DEL ARRAY
    foreach ($proyectos as $key => $proyecto) {
        if ($proyecto['id'] == $proyecto_id) {
            unset($proyectos[$key]);
            break;
        }
    }
// ACTUALIZA EL ARRAY DE PROYECTOS EN LA SESION 
    $_SESSION['proyectos'] = array_values($proyectos);

// VOLVEMOS A PROYECTOS CON EL PROYECTO YA ELIMINADO
    header("Location: proyectos.php");
        die();

// SI PINCHAMOS EN ELIMINAR TODOS, UNSET ELIMINA EL ARRAY DE PROYECTOS DE LA SESION
    } elseif ($_GET['accion'] == 'eliminarTodos') {
        unset($_SESSION['proyectos']);

// VOLVEMOS A PROYECTOS CON EL ARRAY VACIO
        header("Location: proyectos.php");
        die();   

// DETALLE PROYECTO        
    } elseif ($_GET['accion'] == 'ver' && isset($_GET['id'])) {
        $proyectoId = $_GET['id'];
        $proyectos = $_SESSION['proyectos'];
    
//BUSCA EL PROYECTO ID
        $proyectoEncontrado = null;
        foreach ($proyectos as $proyecto) {
            if ($proyecto['id'] == $proyectoId) {
                $proyectoEncontrado = $proyecto;
                break;
            }
        }
        if ($proyectoEncontrado) {

// ALMACENA EL PROYECTO EN UNA VARIABLE DE SESION PARA VERLO EN DETALLE EN verProyecto.php
            $_SESSION['proyectoDetalle'] = $proyectoEncontrado;
            header("Location: verProyecto.php");
            die();
        } else {
 // SI POR ALGUN CASUAL NO ENCUENTRA EL ID, REDIRIGE A PROYECTOS CON MENSAJE DE ERROR
            header("Location: proyectos.php?error=proyecto_no_encontrado");
            die();
        }
    } else {

// SI ALGUIEN INTENTA ACCEDER A CONTROLADOR.PHP SIN ENVIAR DATOS O SIN UNA ACCION VALIDA NOS RERIDIGE A LOGIN
    header("Location: login.php");
    exit();
}?>