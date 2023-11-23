<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\ModeloRegalo;
use RegalosNavidad\vistas\VistaDetalle;
use RegalosNavidad\vistas\VistaInicio;
use RegalosNavidad\vistas\VistaInsertarRegalo;
use RegalosNavidad\vistas\VistaRegalos;

class ControladorRegalo
{

    public static function mostrarInicio()
    {

        VistaInicio::render();
    }

    public static function mostrarRegalos()
    {
        if (isset($_SESSION['usuario'])) {

        $usuario = unserialize($_SESSION['usuario']);

        $regalos = ModeloRegalo::mostrarRegalos($usuario->getId());

        VistaRegalos::render($regalos);
        }
    }

    public static function detalleRegalo($id)
    {

        $regalo = ModeloRegalo::detalleRegalo($id);

        VistaDetalle::render($regalo);

    }

    public static function insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario)
    {

        ModeloRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);

        $user = unserialize($_SESSION['usuario']);

        $regalos = ModeloRegalo::mostrarRegalos($user->getId());

        VistaRegalos::render($regalos);
    }

    public static function actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario)
    {

        ModeloRegalo::actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    }

    public static function borrarRegalo($id)
    {

        ModeloRegalo::borrarRegalo($id);

        $user = unserialize($_SESSION['usuario']);

        $regalos = ModeloRegalo::mostrarRegalos($user->getId());

        // RENDERIZAMOS LA VISTA DE RESULTADOS
        VistaRegalos::render($regalos);
        die();
    }

    public static function filtrarPorAnio($idUsuario,$anio){

        $regalos = ModeloRegalo::filtrarPorAnio($idUsuario,$anio);

        VistaRegalos::render($regalos);
    }


public static function mostrarRegalosOrdenados()
{
    $usuario = unserialize($_SESSION['usuario']);
    $regalos = ModeloRegalo::mostrarRegalosOrdenados($usuario->getId());
    VistaRegalos::render($regalos);
}
public static function mostrarRegalosOrdenadosDesc()
{
    $usuario = unserialize($_SESSION['usuario']);
    $regalos = ModeloRegalo::mostrarRegalosOrdenadosDesc($usuario->getId());
    VistaRegalos::render($regalos);
}

}

?>