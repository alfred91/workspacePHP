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

        $idCliente=$_REQUEST['idCliente'];

        ControladorIncidencia::borrarIncidencia($idCliente);
        



    }
        

} else {
    ControladorCliente::mostrarInicio();

 }
    }

?>