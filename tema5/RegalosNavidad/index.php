<?php

namespace RegalosNavidad;

session_start();
//session_destroy();

use RegalosNavidad\controladores\ControladorRegalo;
use RegalosNavidad\controladores\ControladorEnlace;
use RegalosNavidad\controladores\ControladorLogin;
use RegalosNavidad\vistas\VistaEnlaces;
use RegalosNavidad\vistas\VistaRegalos;

//Autocargar las clases --------------------------
spl_autoload_register(function ($class) {
    //echo substr($class, strpos($class,"\\")+1);
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});
//Fin Autcargar ----------------------------------

if (isset($_REQUEST["accion"])) {


    if (strcmp($_REQUEST['accion'], 'mostrarRegalos') == 0) {


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

    if (strcmp($_REQUEST['accion'], 'insertarRegaloModal') == 0) {  //INSERTAR UN REGALO

        $nombre = $_REQUEST['nombre'];
        $destinatario = $_REQUEST['destinatario'];
        $precio = $_REQUEST['precio'];
        $estado = $_REQUEST['estado'];
        $anio = $_REQUEST['anio'];
        $idUsuario = $_REQUEST['idUsuario'];

        ControladorRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    }

    if (strcmp($_REQUEST['accion'], 'actualizarRegaloModal') == 0) {    // MODIFICAR UN REGALO    

        $nombre = $_REQUEST['nombre'];
        $destinatario = $_REQUEST['destinatario'];
        $precio = $_REQUEST['precio'];
        $estado = $_REQUEST['estado'];
        $anio = $_REQUEST['anio'];
        $id = $_REQUEST['id'];

        ControladorRegalo::actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $id);
        ControladorRegalo::mostrarRegalos();
    }

    if (strcmp($_REQUEST['accion'], 'verEnlaces') == 0) {   // VER LOS ENLACES DE UN REGALO CONCRETO

        $idRegalo = $_REQUEST['id'];
        ControladorEnlace::mostraEnlaces($idRegalo);
    }

    if (strcmp($_REQUEST["accion"], 'borrarRegalo') == 0) { // BORRAR UN REGALO 

        $id = $_REQUEST['id'];
        ControladorRegalo::borrarRegalo($id);
    }

    if (strcmp($_REQUEST['accion'], 'verDetalle') == 0) {   // DETALLES DE UN REGALO

        $id = $_REQUEST['id'];
        ControladorRegalo::detalleRegalo($id);
    }

    if (strcmp($_REQUEST['accion'], 'filtrarPorAnio') == 0) {   // BUSCAR REGALOS POR AÑO

        $anio = $_REQUEST['anio'];
        $usuario = unserialize($_SESSION['usuario']);
        $idUsuario = $usuario->getId();
        ControladorRegalo::filtrarPorAnio($idUsuario, $anio);
    }

    if (strcmp($_REQUEST['accion'], 'insertarEnlaceModal') == 0) {  // INSERTA UN ENLACE PARA UN REGALO ESPECIFICO

        $nombre = $_REQUEST['nombre'];
        $enlaceWeb = $_REQUEST['enlaceWeb'];
        $precio = $_REQUEST['precio'];
        $prioridad = $_REQUEST['prioridad'];
        $idRegalo = $_REQUEST['idRegalo'];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagenTmpName = $_FILES['imagen']['tmp_name'];
            $imagen = file_get_contents($imagenTmpName);
        } else {
            $imagen = null;
        }
        ControladorEnlace::insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo);
    }

    if (isset($_REQUEST['accion']) && $_REQUEST['accion'] == 'actualizarEnlaceModal') {     //ACTUALIZAR UN ENLACE
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $enlaceWeb = $_REQUEST['enlaceWeb'];
        $precio = $_REQUEST['precio'];
        $prioridad = $_REQUEST['prioridad'];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $archivoTemporal = $_FILES['imagen']['tmp_name'];
            $imagen = file_get_contents($archivoTemporal);
        } else {
            $imagen = base64_decode($_REQUEST['imagen']);
        }
        ControladorEnlace::actualizarEnlaceModal($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $id);
    }

    if (strcmp($_REQUEST['accion'], 'borrarEnlace') == 0) { // BORRAR UN ENLACE DE UN REGALO

        $id = $_REQUEST['id'];
        ControladorEnlace::borrarEnlace($id);
    }

    if (strcmp($_REQUEST['accion'], 'mostrarRegalosOrdenados') == 0) {  // ORDENAR REGALOS POR AÑO ASC
        ControladorRegalo::mostrarRegalosOrdenados();
    }

    if (strcmp($_REQUEST['accion'], 'mostrarRegalosOrdenadosDesc') == 0) {  // ORDENAR REGALOS POR AÑO DESC
        ControladorRegalo::mostrarRegalosOrdenadosDesc();
    }

    if (strcmp($_REQUEST['accion'], 'mostrarEnlacesOrdenadosPrecioAsc') == 0) { // ORDENAR ENLACES POR PRECIO ASC
        $idRegalo = $_REQUEST['idRegalo'];
        ControladorEnlace::mostrarEnlacesOrdenadosPrecioAsc($idRegalo);
    }

    if (strcmp($_REQUEST['accion'], 'mostrarEnlacesOrdenadosPrecioDesc') == 0) {  // ORDENAR ENLACES POR PRECIO DESC
        $idRegalo = $_REQUEST['idRegalo'];
        ControladorEnlace::mostrarEnlacesOrdenadosPrecioDesc($idRegalo);
    }
} else {
    ControladorRegalo::mostrarInicio();
}
