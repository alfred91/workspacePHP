<?php
namespace Padel;

session_start();
//session_destroy();

use Padel\vistas\VistaInicio;
use Padel\controladores\ControladorPartida;
use Padel\controladores\ControladorLogin;
use Padel\controladores\ControladorJugador;

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


        if (strcmp($_REQUEST['accion'], 'mostrarPartidas') == 0) {


            if (isset($_SESSION['usuario'])) {  // SI EL USUARIO ESTA EN LA SESION MOSTRAMOS LOS Partidas

                ControladorPartida::mostrarPartidas();

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

        if (strcmp($_REQUEST['accion'], 'mostrarJugadores') == 0) {
            ControladorJugador::mostrarJugadores();
        }

        if (strcmp($_REQUEST['accion'], 'mostrarJugadores') == 0) {
            ControladorJugador::mostrarJugadores();
        }
    }
}