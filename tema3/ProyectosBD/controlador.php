<?php session_start();
include 'db.php';
include 'lib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    if (login($email,$password)){

        header("Location: index.php");
        die();

    } else {
        header("Location: login.php?error=USUARIO_INVALIDO,REVISA_TUS_DATOS");
        die();
    }
}
//SI PINCHAMOS EN AÑADIR PROYECTO
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'nuevo') {
//RELLENAMOS EL MODAL, Y AQUI SE OBTIENEN LOS DATOS
        $nombre = $_POST['nombre'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFinPrevista = $_POST['fechaFinPrevista'];
        $diasTranscurridos = $_POST['diasTranscurridos'];
        $porcentajeCompletado = $_POST['porcentajeCompletado'];
        $importancia = $_POST['importancia'];
        $idUsuario = $_SESSION['idUsuario'];

        if (nuevo($nombre,$fechaInicio,$fechaFinPrevista,$diasTranscurridos,$porcentajeCompletado,$importancia,$idUsuario)){

        header("Location: index.php");
            die();

        } else { echo "Error al insertar proyecto: " . $stmt->errorInfo()[2];}
            
            die();
//SI PINCHAMOS EN ACTUALIZAR                                 
    } elseif ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['accion']) && $_POST['accion']=='actualizar') {
              
            $proyecto_id = $_POST['proyecto_id'];
            $nombre = $_POST['nombre'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinPrevista = $_POST['fechaFinPrevista'];
            $diasTranscurridos = $_POST['diasTranscurridos'];
            $porcentajeCompletado = $_POST['porcentajeCompletado'];
            $importancia = $_POST['importancia'];
            
            if (actualizar($proyecto_id, $nombre, $fechaInicio, $fechaFinPrevista, $diasTranscurridos, $porcentajeCompletado, $importancia)) {
                header("Location: index.php");
                die();
            } else {
                echo "Error al actualizar proyecto: ". $stmt->errorInfo()[2];}
            die();

// SI CERRAMOS SESION, SE DESRTRUYE  VOLVERIAMOS A PROYECTOS SIN LOGUEAR
        }elseif ($_GET['accion'] == 'cerrarSesion') {

            session_destroy();  
            header("Location: index.php");
            die();
            
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'buscar' && isset($_GET['nombre'])) {

        $nombre =$_GET['nombre'];
        $resultados = buscar($nombre);
                
            if ($resultados) { 
                $_SESSION['resultados'] = $resultados;
                header("Location: verProyecto.php");
            } else { 
                echo "Error al buscar proyecto: ";}
            die();

// ELIMINAR UN PROYECTO 
    }elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'borrar' && isset($_GET['id'])) {
        $proyecto_id = $_GET['id'];

            if (borrar($proyecto_id)) {
                header("Location: index.php");
                die();
            } else { echo "Error al borrar proyecto: ". $stmt->errorInfo()[2];}
            die();

        } else {
// SI ALGUIEN INTENTA ACCEDER A CONTROLADOR.PHP SIN ENVIAR DATOS O SIN UNA ACCION VALIDA NOS RERIDIGE A LOGIN
    header("Location: login.php");
    exit(); }
?>