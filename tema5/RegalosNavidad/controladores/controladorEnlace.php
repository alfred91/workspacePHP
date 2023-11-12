<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\enlaceModelo;
use RegalosNavidad\vistas\vistaInicio;

class ControladorEnlace
{

    public static function mostrarInicio()
    {
        VistaInicio::render();
    }

    public static function mostraEnlaces($idRegalo)
    {

        $enlaces = EnlaceModelo::mostrarEnlaces($idRegalo);

        return $enlaces;

    }

}


?>