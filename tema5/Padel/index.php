<?php

namespace Padel;

session_start();
//session_destroy();

use Padel\vistas\VistaInicio;
use Padel\controladores\ControladorPartida;
use Padel\controladores\ControladorLogin;
use Padel\controladores\ControladorJugador;
use Padel\vistas\VistaPartidas;

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
        if (strcmp($_REQUEST["accion"], 'mostrarTodos') == 0) { // TODAS LAS PARTIDAS
            ControladorPartida::mostrarTodos();
        }

        if (strcmp($_REQUEST['accion'], 'mostrarJugadores') == 0) { // TODOS LOS JUGADORES
            ControladorJugador::mostrarJugadores();
        }

        if (strcmp($_REQUEST['accion'], 'nuevaPartida') == 0) {  // CREAR UNA PARTIDA

            $fecha = $_REQUEST['fecha'];
            $hora = $_REQUEST['hora'];
            $ciudad = $_REQUEST['ciudad'];
            $lugar = $_REQUEST['lugar'];
            $cubierto = $_REQUEST['cubierto'];
            $idJugador = $_REQUEST['idJugador'];

            ControladorPartida::nuevaPartida($fecha, $hora, $ciudad, $lugar, $cubierto);
            ControladorPartida::mostrarPartidas();
        }
        if (strcmp($_REQUEST['accion'], 'eliminarPartida') == 0) {   // ELIMINAR UNA PARTIDA
            $id = $_REQUEST['id'];
            ControladorPartida::eliminarPartida($id);
            ControladorPartida::mostrarPartidas();
        }
        if (strcmp($_REQUEST['accion'], 'verDetallePartida') == 0) {    // DETALLE PARTIDA
            $id = $_REQUEST['id'];
            ControladorPartida::detallePartida($id);
        }

        if (strcmp($_REQUEST['accion'], 'apuntarsePartida') == 0) {     // APUNTARSE A UNA PARTIDA
            $idPartida = $_REQUEST['id'];
            $idJugador = $_SESSION['usuario'];
            ControladorPartida::apuntarsePartida($idPartida);
            ControladorPartida::mostrarPartidas();
        }

        if (strcmp($_REQUEST['accion'], 'borrarsePartida') == 0) {      // DESINSCRIBIRSE DE UNA PARTIDA
            $idPartida = $_REQUEST['id'];
            $idJugador = $_SESSION['usuario'];
            ControladorPartida::borrarsePartida($idPartida, $idJugador);
            ControladorPartida::mostrarPartidas();
        }
        if (strcmp($_REQUEST['accion'], 'buscarPartida') == 0) {        // BUSCAR UNA PARTIDA POR CIUDAD O FECHA
            $busqueda = $_REQUEST['busqueda'];
            ControladorPartida::buscarPartida($busqueda);
        }
        
    } else
        VistaInicio::render();
}
