<?php
namespace Incidencias;

use Incidencias\controladores\ControladorIncidencia;
use Incidencias\controladores\ControladorCliente;
use Incidencias\vistas\VistaIncidencia;

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
            ControladorIncidencia::mostrarIncidencias();
        }


    if (strcmp($_REQUEST['accion'], 'borrarIncidencia') == 0) { 

        $id=$_REQUEST['id'];
        ControladorIncidencia::borrarIncidencia($id);
        ControladorIncidencia::mostrarIncidencias();
        }

    if(strcmp($_REQUEST['accion'], 'insertarIncidencia') == 0) {
        
        $latitud=$_REQUEST['latitud'];
        $longitud=$_REQUEST['longitud'];
        $ciudad=$_REQUEST['ciudad'];
        $direccion=$_REQUEST['direccion'];
        $descripcion=$_REQUEST['descripcion'];
        $solucion=$_REQUEST['solucion'];
        $estado=$_REQUEST['estado'];
        $idCliente=$_REQUEST['idCliente'];

        ControladorIncidencia::insertarIncidencia($latitud,$longitud,$ciudad,$direccion,$descripcion,$solucion,$estado,$idCliente);
        ControladorIncidencia::mostrarIncidencias();
    }

    if(strcmp($_REQUEST['accion'], 'modificarIncidencia') == 0) {

        $id=$_REQUEST['id'];
        $solucion=$_REQUEST['solucion'];
        $estado=$_REQUEST['estado'];


        ControladorIncidencia::modificarIncidencia($id,$solucion,$estado);
        ControladorIncidencia::mostrarIncidencias();
    }

    if (strcmp($_REQUEST['accion'], 'buscarIncidencia') == 0) { 

        $incidencia=$_REQUEST['incidencia'];
        ControladorIncidencia::buscarIncidencia($incidencia);
 
    }

    if (strcmp($_REQUEST['accion'], 'buscarDni') == 0) { 

        $dni = $_REQUEST['dni'];
        ControladorCliente::buscarDni($dni);
        ControladorCliente::mostrarCliente();
    }

} else {
    ControladorCliente::mostrarInicio();

 }
}
?>