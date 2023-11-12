<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\EnlaceModelo;
use RegalosNavidad\vistas\VistaInicio;

class ControladorEnlace
{

    public static function mostrarInicio()
    {
        VistaInicio::render();
    }

    public static function mostraEnlaces($idRegalo)
    {

        $enlaces = EnlaceModelo::mostrarEnlaces($idRegalo);

        VistaInicio::render();

        return $enlaces;

    }

}


?>