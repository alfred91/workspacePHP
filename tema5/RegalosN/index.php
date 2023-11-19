<?php namespace RegalosNavidad;
session_start();

//session_destroy();

use RegalosNavidad\controladores\ControladorRegalo;
use RegalosNavidad\controladores\ControladorEnlace;
use RegalosNavidad\controladores\ControladorLogin;
use RegalosNavidad\vistas\VistaRegalos;
use RegalosNavidad\vistas\VistaEnlaces;
use RegalosNavidad\vistas\VistaDetalle;




//Autocargar las clases --------------------------
spl_autoload_register(function ($class) {
    //echo substr($class, strpos($class,"\\")+1);
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});
//Fin Autcargar ----------------------------------


if (isset($_REQUEST)) {

    if (isset($_REQUEST["accion"])) {

        //MOSTRAR TODOS LOS RESULTADOS
        if (strcmp($_REQUEST['accion'],'mostrarTodos') == 0) {
            
            //Comprobar si estamos logueados
            if (isset($_SESSION['usuario'])) {
                // Deserializa el objeto de usuario y almacénalo en una variable de sesión
                ControladorRegalo::mostrarRegalos();
                            } else {
                //Pintar login
                ControladorLogin::mostrarFormulario("");
            }
        }

    if (strcmp($_REQUEST['accion'],'enviarForm') == 0) {

        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        ControladorLogin::checkLogin($email, $password);
        
    }
    if (strcmp($_REQUEST['accion'],'verEnlaces') == 0) {
        $idRegalo = $_REQUEST['id'];
        ControladorEnlace::mostraEnlaces($idRegalo);
    }

    if (strcmp($_REQUEST["accion"],'cerrarSesion') == 0) {
                ControladorLogin::cerrarSesion();
                die();
    }
    
    if (strcmp($_REQUEST["accion"],'mostrarRegalos') == 0) {
        // Si se solicitó la acción de mostrar regalos, manejarla aquí
        ControladorRegalo::mostrarRegalos("");
        VistaRegalos::render($regalos);


    }
    if (strcmp($_REQUEST["accion"],'borrarRegalo') == 0) {

        $id=$_REQUEST['id'];
        ControladorRegalo::borrarRegalo($id);

    }

    if (strcmp($_REQUEST['accion'], 'insertarRegalo') == 0) {

        ControladorRegalo::verInsertarRegalo();
    }

    if (strcmp($_REQUEST['accion'], 'verDetalle') == 0) {

                $id = $_REQUEST['id'];
                ControladorRegalo::detalleRegalo($id);

    }

    if (strcmp($_REQUEST['accion'], 'verEnlace') == 0) {

        $idRegalo = $_REQUEST['idRegalo'];

        $enlaces=ControladorEnlace::mostraEnlaces($idRegalo);

}
if (strcmp($_REQUEST['accion'], 'borrarEnlace') == 0) {
    $id=$_REQUEST['id'];
    ControladorEnlace::borrarEnlace($id);
}
if (strcmp($_REQUEST['accion'], 'modificarEnlace') == 0) {

    $idRegalo = $_REQUEST['idRegalo'];

    $enlaces=ControladorEnlace::mostraEnlaces($idRegalo);

}
    
    if (strcmp($_REQUEST['accion'], 'insertarRegaloForm') == 0) {
        $nombre = $_REQUEST['nombre'];
        $destinatario = $_REQUEST['destinatario'];
        $precio = $_REQUEST['precio'];
        $estado = $_REQUEST['estado'];
        $anio = $_REQUEST['anio'];
        $idUsuario = $_REQUEST['idUsuario'];

        ControladorRegalo::insertarRegalo( $nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    }

    if (strcmp($_REQUEST['accion'], 'insertarRegaloModal') == 0) {
        $nombre = $_REQUEST['nombre'];
        $destinatario = $_REQUEST['destinatario'];
        $precio = $_REQUEST['precio'];
        $estado = $_REQUEST['estado'];
        $anio = $_REQUEST['anio'];
        $idUsuario = $_REQUEST['idUsuario'];

        ControladorRegalo::insertarRegalo( $nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    }

    if (strcmp($_REQUEST['accion'], 'actualizarRegaloForm') == 0) {
        $nombre = $_REQUEST['nombre'];
        $destinatario = $_REQUEST['destinatario'];
        $precio = $_REQUEST['precio']; 
        $estado = $_REQUEST['estado'];
        $anio = $_REQUEST['anio'];
        $id = $_REQUEST['id'];
        $idUsuario = $_REQUEST['idUsuario'];

        ControladorRegalo::actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $id, $idUsuario);
        ControladorRegalo::mostrarRegalos("");
    }
}
// Después de manejar las acciones, mostrar la vista correspondient
    else {
    // Mostrar la página de inicio
    ControladorRegalo::mostrarInicio();
    }
}
?>