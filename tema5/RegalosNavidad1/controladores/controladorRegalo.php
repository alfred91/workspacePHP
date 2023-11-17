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

    public static function mostrarRegalos($idUsuario)
    {

        $regalos = modeloRegalo::mostrarRegalos(""); // Obtener los regalos del modelo

        vistaRegalos::render($idUsuario);

        return $regalos;
    }

    public static function borrarRegalo($id) {

        $modelo = new modeloRegalo();
        $modelo->borrarRegalo($id);
        
    }

    public static function actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario) {

        $regalos = modeloRegalo::actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario);
    
        return $regalos;
        // Puedes redirigir a la página principal u otra página después de actualizar el regalo
    }
    
}

?>