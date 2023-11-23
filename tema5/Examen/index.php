<?php
namespace Examen;

use Examen\controladores\ControladorIncidencias;
use Examen\controladores\ControladorClientes;
use Examen\vistas\VistaIncidencias;

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

        if (strcmp($_REQUEST['accion'], 'mostrarIncidencias') == 0) {
            ControladorIncidencias::mostrarIncidencias();
        }
        

        if (strcmp($_REQUEST['accion'], 'editarIndicencia') == 0) {
            $id = $_REQUEST['id'];

            ControladorIncidencias::editarIncidencia($id);
        }

        if (strcmp($_REQUEST['accion'], 'ModificarIncidencia') == 0) {
            $id = $_REQUEST['id'];
            $solucion = $_REQUEST['solucion'];
            $estado = $_REQUEST['estado'];

            ControladorIncidencias::enviarModificarIncidencia($id, $solucion, $estado);
        }

        if (strcmp($_REQUEST['accion'], 'eliminarIncidencia') == 0) {
            $id = $_REQUEST['id'];

            ControladorIncidencias::eliminarIncidencia($id);
        }

        if (strcmp($_REQUEST['accion'], 'insertarIncidencia') == 0) {

            ControladorIncidencias::insertarIncidencia();
        }

        if (strcmp($_REQUEST['accion'], 'buscarCliente') == 0) {
            $dni = $_REQUEST['dni'];

            ControladorIncidencias::buscarCliente($dni);
        }

        if (strcmp($_REQUEST['accion'], 'insertarIncidencia') == 0) {
            $id = $_REQUEST['id'];

            ControladorIncidencias::insertarIncidencia($id);
        }

        if (strcmp($_REQUEST['accion'], 'buscarIncidencia') == 0) {
            $incidencia = $_REQUEST['incidencia'];

            ControladorIncidencias::buscarIncidencia($incidencia);
        }

    } else {
        ControladorIncidencias::mostrarIncidencias();
    }
        ControladorClientes::mostrarIncidencias();


    }

?>