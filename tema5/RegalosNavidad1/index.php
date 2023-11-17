<?php
namespace RegalosNavidad;

session_start();
//session_destroy();
use RegalosNavidad\controladores\controladorEnlace;
use RegalosNavidad\controladores\controladorRegalo;
use RegalosNavidad\controladores\controladorLogin;
use RegalosNavidad\vistas\vistaRegalos;


//Autocargar las clases --------------------------
spl_autoload_register(function ($class) {
    //echo substr($class, strpos($class,"\\")+1);
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});
//Fin Autcargar ----------------------------------


// Manejar acciones antes de renderizar la vista
if (isset($_REQUEST)) {
    if (isset($_REQUEST["accion"])) {
        // ... (resto del código de manejo de acciones)

        //MOSTRAR TODOS LOS RESULTADOS
        if (strcmp($_REQUEST['accion'],'mostrarTodos') == 0) {
            //Comprobar si estamos logueados
            if (isset($_SESSION['usuario'])) {
                // Deserializa el objeto de usuario y almacénalo en una variable de sesión
                if (is_string($_SESSION['usuario'])) {
                $_SESSION['usuario'] = unserialize($_SESSION['usuario']);
                controladorRegalo::mostrarRegalos("");
                }
                controladorLogin::mostrarFormulario("");
            } else {
                //Pintar login
                controladorLogin::mostrarFormulario("");
            }
        }

    if (strcmp($_REQUEST['accion'],'enviarForm') == 0) {
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        controladorLogin::checkLogin($email, $password);
    }

    if (strcmp($_REQUEST["accion"],'cerrarSesion') == 0) {
                controladorLogin::cerrarSesion();
                die();
    }
    
    if (strcmp($_REQUEST["accion"],'mostrarRegalos') == 0) {
        // Si se solicitó la acción de mostrar regalos, manejarla aquí
        $idUsuario = $_SESSION['idUsuario'];
        $regalos = controladorRegalo::mostrarRegalos($idUsuario);
        vistaRegalos::render($regalos);


    }
    if (strcmp($_REQUEST["accion"],'borrarRegalo') == 0) {
        // Si se solicitó la acción de borrar regalo, manejarla aquí
        $idRegaloABorrar = $_REQUEST["borrarRegalo"];
        controladorRegalo::borrarRegalo($idRegaloABorrar);

        // Redirigir a la página de regalos después de borrar
        vistaRegalos::render($regalos);



    }
    if (strcmp($_REQUEST["accion"],'insertarRegalo') == 0) {
        // Si se solicitó la acción de agregar regalo, manejarla aquí
        $nombre = $_REQUEST["nombre"];
        $destinatario = $_REQUEST["destinatario"];
        $precio = $_REQUEST["precio"];
        $estado = $_REQUEST["estado"];
        $anio = $_REQUEST["anio"];
        $idUsuario = $_SESSION['idUsuario'];

        controladorRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
        vistaRegalos::render($regalos);

    }
    if (strcmp($_REQUEST["accion"],'actualizarRegalo') == 0) {
        // Si se solicitó la acción de agregar regalo, manejarla aquí
        $nombre = $_REQUEST["nombre"];
        $destinatario = $_REQUEST["destinatario"];
        $precio = $_REQUEST["precio"];
        $estado = $_REQUEST["estado"];
        $anio = $_REQUEST["anio"];
        $idUsuario = $_SESSION['idUsuario'];

        controladorRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
        vistaRegalos::render($regalos);

    }

}
// Después de manejar las acciones, mostrar la vista correspondient
 else {
    // Mostrar la página de inicio
    controladorRegalo::mostrarInicio();
}
}
?>