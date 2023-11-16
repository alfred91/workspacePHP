<?php namespace RegalosNavidad;

session_start();

use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\controladores\controladorRegalo;
use RegalosNavidad\controladores\controladorLogin;
use RegalosNavidad\vistas\vistaRegalos;
use RegalosNavidad\controladores\ControladorEnlace;

spl_autoload_register(function ($class) {
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});

// Manejar acciones antes de renderizar la vista
    if (isset($_REQUEST["accion"])) {

        if ($_REQUEST["accion"] == "mostrarFormularioLogin") {
            controladorLogin::mostrarFormulario();
            die();

        } elseif ($_REQUEST["accion"] == "enviarForm") {
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            controladorLogin::iniciarSesion($email, $password);

        } elseif ($_REQUEST["accion"] == "cerrarSesion") {
            controladorLogin::cerrarSesion();
            die();
        } elseif ($_REQUEST["accion"] == "mostrarRegalos") {
            // Si se solicitó la acción de mostrar regalos, manejarla aquí
            $idUsuario = $_SESSION['idUsuario'];
            $regalos = controladorRegalo::mostrarRegalos($idUsuario);
            vistaRegalos::render($regalos);


        }
     elseif ($_REQUEST["accion"] == "borrarRegalo") {
        // Si se solicitó la acción de borrar regalo, manejarla aquí
        $idRegaloABorrar = $_REQUEST["borrarRegalo"];
        controladorRegalo::borrarRegalo($idRegaloABorrar);

        // Redirigir a la página de regalos después de borrar
        vistaRegalos::render($regalos);
      


        } elseif ($_REQUEST_METHOD["accion"] == "insertarRegalo") {
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
     elseif ($_REQUEST_METHOD["accion"] == "actualizarRegalo") {
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
    // Después de manejar las acciones, mostrar la vista correspondiente
    if (isset($_SESSION['idUsuario'])) {
        // Si el usuario ha iniciado sesión, redirigir a la página de regalos
        $idUsuario = $_SESSION['idUsuario'];
        $regalos = controladorRegalo::mostrarRegalos($idUsuario);
        
        vistaRegalos::render($regalos);
        
        
    } else {
        // Mostrar la página de inicio
        vistaInicio::render();
    }
?>