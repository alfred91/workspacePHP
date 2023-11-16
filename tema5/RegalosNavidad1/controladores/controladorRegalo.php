<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\modeloRegalo;
use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\vistas\vistaRegalos;


class ControladorRegalo
{

    public static function mostrarInicio()
    {

        vistaInicio::render();
    }

    public static function mostrarRegalos($usuario)
    {

        $regalos = modeloRegalo::mostrarRegalos(""); // Obtener los regalos del modelo

        vistaRegalos::render($usuario);

        return $regalos;
    }

    public static function borrarRegalo($id) {

        $modelo = new modeloRegalo();
        $modelo->borrarRegalo($id);
        
    }
    
public static function insertarRegalo($idUsuario, $nombre, $destinatario, $precio, $estado, $anio) {
    $regalo=modeloRegalo::insertarRegalo();
    var_dump($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);

    vistaRegalos::render($regalo);

}



    public static function detalleRegalo($id) {
        $detalles = modeloRegalo::detalleRegalo();
        // Luego, puedes hacer algo con los detalles, como pasarlos a la vista o realizar alguna otra acción.
        return $detalles;
    }
    public static function actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario) {

        $regalos = modeloRegalo::actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    
        return $regalos;
        // Puedes redirigir a la página principal u otra página después de actualizar el regalo
    }
    
}

?>