<?php
namespace RegalosNavidad;

session_start();

use RegalosNavidad\controladores\controladorEnlace;
use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\controladores\controladorRegalo;
use RegalosNavidad\controladores\controladorLogin;
use RegalosNavidad\vistas\vistaRegalos;

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
        $regalos = controladorRegalo::mostrarRegalos();
        vistaRegalos::render($regalos);
        die();
    } elseif ($_REQUEST["accion"] == "addRegalo") {
        // Si se solicitó la acción de agregar regalo, manejarla aquí
        $nombre = $_REQUEST["nombre"];
        $destinatario = $_REQUEST["destinatario"];
        $precio = $_REQUEST["precio"];
        $estado = $_REQUEST["estado"];
        $year = $_REQUEST["year"];
        $idUsuario = $_SESSION['idUsuario'];
        controladorRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $year, $idUsuario);
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
