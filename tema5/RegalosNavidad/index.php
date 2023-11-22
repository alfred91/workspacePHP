<?php
namespace RegalosNavidad;

session_start();
//session_destroy();

use RegalosNavidad\controladores\ControladorRegalo;
use RegalosNavidad\controladores\ControladorEnlace;
use RegalosNavidad\controladores\ControladorLogin;
use RegalosNavidad\vistas\VistaRegalos;

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


        if (strcmp($_REQUEST['accion'], 'mostrarTodos') == 0) {


            if (isset($_SESSION['usuario'])) {  // SI EL USUARIO ESTA EN LA SESION MOSTRAMOS LOS REGALOS

                ControladorRegalo::mostrarRegalos();
            } else {

                ControladorLogin::mostrarFormulario();  // DE LO CONTRARIO SE MUESTRA UN FORM DE LOGIN
            }
        }

        if (strcmp($_REQUEST['accion'], 'enviarForm') == 0) { // COMPROBAMOS LOS DATOS DEL FORMULARIO AL ENVIAR

            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            ControladorLogin::checkLogin($email, $password);

        }

        if (strcmp($_REQUEST["accion"], 'cerrarSesion') == 0) { // CERRAR SESION
            ControladorLogin::cerrarSesion();
            die();
        }

        if (strcmp($_REQUEST["accion"], 'mostrarRegalos') == 0) {   

            ControladorRegalo::mostrarRegalos();
            VistaRegalos::render($regalos);

        }

        if (strcmp($_REQUEST['accion'], 'insertarRegaloModal') == 0) {

            $nombre = $_REQUEST['nombre'];
            $destinatario = $_REQUEST['destinatario'];
            $precio = $_REQUEST['precio'];
            $estado = $_REQUEST['estado'];
            $anio = $_REQUEST['anio'];
            $idUsuario = $_REQUEST['idUsuario'];

            ControladorRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
        }

        if (strcmp($_REQUEST['accion'], 'actualizarRegaloModal') == 0) {

            $nombre = $_REQUEST['nombre'];
            $destinatario = $_REQUEST['destinatario'];
            $precio = $_REQUEST['precio'];
            $estado = $_REQUEST['estado'];
            $anio = $_REQUEST['anio'];
            $id = $_REQUEST['id'];


            ControladorRegalo::actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $id);
            ControladorRegalo::mostrarRegalos();
        }

        if (strcmp($_REQUEST['accion'], 'verEnlaces') == 0) {

            $idRegalo = $_REQUEST['id'];
            ControladorEnlace::mostraEnlaces($idRegalo);
        }

        if (strcmp($_REQUEST["accion"], 'borrarRegalo') == 0) {

            $id = $_REQUEST['id'];
            ControladorRegalo::borrarRegalo($id);

        }

        if (strcmp($_REQUEST['accion'], 'verDetalle') == 0) {

            $id = $_REQUEST['id'];
            ControladorRegalo::detalleRegalo($id);

        }

        if (strcmp($_REQUEST['accion'], 'verEnlace') == 0) {

            $idRegalo = $_REQUEST['idRegalo'];
            $enlaces = ControladorEnlace::mostraEnlaces($idRegalo);

        }
        if (strcmp($_REQUEST['accion'], 'borrarEnlace') == 0) {

            $id = $_REQUEST['id'];
            ControladorEnlace::borrarEnlace($id);
        }
        if (strcmp($_REQUEST['accion'], 'actualizarEnlaceModal') == 0) {

            $nombre = $_REQUEST['nombre'];
            $enlaceWeb = $_REQUEST['enlaceWeb'];
            $precio = $_REQUEST['precio'];
            $imagen = $_REQUEST['imagen'];
            $prioridad = $_REQUEST['prioridad'];
            $id = $_REQUEST['id'];

            ControladorEnlace::actualizarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo);
            ControladorEnlace::mostraEnlaces("");

        }
    } else {
        ControladorRegalo::mostrarInicio();
    }
}
?>