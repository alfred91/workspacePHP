<?php session_start();
include 'lib.php';

// SI PINCHAMOS EN LOGIN CON POST Y TENEMOS EL EMAIL Y LA CONTRASEÑA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {

    $email=$_POST['email'];
    $password=$_POST['password'];
//LLAMA A LA FUNCION QUE COMPRUEBA LA CONTRASEÑA Y AUTENTICA AL USUARIO 
        userLogin($email,$password);

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

        crearProyecto($nombre,$fechaInicio,$fechaFinPrevista,
                        $diasTranscurridos,$porcentajeCompletado,$importancia);

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
    $proyectoId = $_GET['id'];
            eliminarProyecto($proyectoId);

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

        $proyectoEncontrado = proyectoPorId($proyectoId);
        
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