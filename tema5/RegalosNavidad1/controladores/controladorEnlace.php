<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\modeloEnlace;
use RegalosNavidad\vistas\vistaInicio;

class ControladorEnlace
{

    public static function mostrarInicio()
    {
        vistaInicio::render();
    }

    public static function mostraEnlaces($idRegalo)
    {

        return modeloEnlace::mostrarEnlaces($idRegalo);

       

    }

}

?>