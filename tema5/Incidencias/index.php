<?php
namespace Incidencias;

use Incidencias\controladores\ControladorIncidencia;
use Incidencias\controladores\ControladorCliente;

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
            ControladorIncidencia::mostrarTodos();
        }


        if (strcmp($_REQUEST['accion'], 'borrarIncidencia') == 0) {

            $id = $_REQUEST['id'];
            ControladorIncidencia::borrarIncidencia($id);
            ControladorIncidencia::mostrarIncidencias();
        }

        if (strcmp($_REQUEST['accion'], 'insertarIncidencia') == 0) {

            $id = $_REQUEST['id'];
            $latitud = $_REQUEST['latitud'];
            $longitud = $_REQUEST['longitud'];
            $ciudad = $_REQUEST['ciudad'];
            $direccion = $_REQUEST['direccion'];
            $descripcion = $_REQUEST['descripcion'];
            $solucion = $_REQUEST['solucion'];
            $estado = $_REQUEST['estado'];
            $idCliente = $_REQUEST['idCliente'];

            ControladorIncidencia::insertarIncidencia($id, $latitud, $longitud, $ciudad, $direccion, $descripcion, $solucion, $estado, $idCliente);
            ControladorIncidencia::mostrarIncidencias();
        }
        if (strcmp($_REQUEST['accion'], 'modificarIncidencia') == 0) {

            $id = $_REQUEST['id'];
            $solucion = $_REQUEST['solucion'];
            $estado = $_REQUEST['estado'];


            ControladorIncidencia::modificarIncidencia($id, $solucion, $estado);
            ControladorIncidencia::mostrarIncidencias();
        }


    } else {
        ControladorCliente::mostrarInicio();

    }
}

?>