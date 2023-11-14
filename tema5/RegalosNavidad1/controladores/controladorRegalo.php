<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\regaloModelo;
use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\vistas\vistaRegalos;


class ControladorRegalo
{

    public static function mostrarInicio()
    {

        vistaInicio::render();
    }

    public static function mostrarRegalos($idUsuario)
    {

        $regalos = regaloModelo::mostrarRegalos($idUsuario); // Obtener los regalos del modelo

        //vistaRegalos::render($regalos);

        return $regalos;
    }

    public static function borrarRegalo($id) {
        $modelo = new regaloModelo();
        $modelo->borrarRegalo($id);
    }
    
public static function insertarRegalo($idUsuario, $nombre, $destinatario, $precio, $estado, $anio) {
    $nuevoRegalo=regaloModelo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    var_dump($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);

    vistaRegalos::render($nuevoRegalo);

}



    public static function detalleRegalo($id) {
        $detalles = regaloModelo::detalleRegalo($id);
        // Luego, puedes hacer algo con los detalles, como pasarlos a la vista o realizar alguna otra acción.
        return $detalles;
    }
    public static function actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario) {

        $regalos = regaloModelo::actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    
        return $regalos;
        // Puedes redirigir a la página principal u otra página después de actualizar el regalo
    }
    
}

?>