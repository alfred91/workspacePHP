<?php
namespace RegalosNavidad;

session_start();

use RegalosNavidad\controladores\ControladorEnlace;
use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\controladores\controladorRegalo;
use RegalosNavidad\controladores\controladorLogin;
use RegalosNavidad\vistas\vistaRegalos;

spl_autoload_register(function ($class) {
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});

if (isset($_REQUEST["accion"])) {
    if ($_REQUEST["accion"] == "mostrarFormularioLogin") {
        controladorLogin::mostrarFormulario();
        die();
    } elseif ($_REQUEST["accion"] == "enviarForm") {
        // Si se envió el formulario de inicio de sesión
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        ControladorLogin::iniciarSesion($email, $password);
    } elseif ($_REQUEST["accion"] == "cerrarSesion") {
        // Si se cerró la sesión
        ControladorLogin::cerrarSesion();
        die();
    }
}

// Después de manejar la acción, mostrar la vista correspondiente
if (isset($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
    controladorRegalo::mostrarRegalos($idUsuario);
    ControladorEnlace::mostraEnlaces($idRegalo);
    // Si el usuario ha iniciado sesión, redirigir a la página de regalos
    vistaRegalos::render($regalos);

} else {
    // Mostrar la página de inicio
    vistaInicio::render();
}
?>