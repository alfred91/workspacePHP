<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\ModeloEnlace;
use RegalosNavidad\vistas\VistaEnlaces;
use RegalosNavidad\vistas\VistaInicio;

class ControladorEnlace
{

    public static function mostrarInicio()
    {
        vistaInicio::render();
    }

    public static function mostraEnlaces($id)
    {
        $enlaces=ModeloEnlace::mostrarEnlaces($id);

        VistaEnlaces::render($enlaces);
       
    }

    public static function insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo){

        
    }

    public static function borrarEnlace($id){

        ModeloEnlace::borrarEnlaces($id);

        VistaEnlaces::render($id);

    }

    

}

?>