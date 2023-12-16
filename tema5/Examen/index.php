<?php

namespace Examen;

session_start();
//session_destroy();

use Examen\vistas\VistaInicio;
use Examen\controladores\ControladorAmigo;
use Examen\controladores\ControladorParticipante;
use Examen\vistas\VistaAmigos;

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
            ControladorAmigo::mostrarTodos();
            VistaAmigos::render("");
        }

        if (strcmp($_REQUEST['accion'], 'eliminarAmigo') == 0) {

            $id = $_REQUEST['id'];
            ControladorAmigo::eliminarAmigo($id);
            ControladorAmigo::mostrarTodos();
        }

        if (strcmp($_REQUEST['accion'], 'addAmigo') == 0) {  // CREAR UN REGALO

            $nombre = $_REQUEST['nombre'];
            $estado = $_REQUEST['estado'];
            $naximoDinero = $_REQUEST['maximoDinero'];
            $fechaTope = $_REQUEST['fechaTope'];
            $lugar = $_REQUEST['lugar'];
            $observaciones = $_REQUEST['observaciones'];
            $emoji = $_REQUEST['emoji'];

            ControladorAmigo::addAmigo($nombre, $estado, $naximoDinero, $fechaTope, $lugar, $observaciones,$emoji);
            ControladorAmigo::mostrarTodos();
        }

        if (strcmp($_REQUEST['accion'], 'verDetalleAmigo') == 0) {

            $id = $_REQUEST['id'];
            ControladorAmigo::detalleAmigo($id);
            VistaAmigos::render($id);
            
        } else
            VistaInicio::render();
    }
}
