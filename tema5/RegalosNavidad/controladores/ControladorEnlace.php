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

    public static function mostraEnlaces($idRegalo)
    {
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);

        VistaEnlaces::render($enlaces);

    }

    public static function insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo)
    {
        $enlaces=ModeloEnlace::insertarEnlace(
            $nombre,
            $enlaceWeb,
            $precio,
            $imagen,
            $prioridad,
            $idRegalo
        );
        VistaEnlaces::render($idRegalo);



    }
    public static function actualizarEnlace(
        $id,
        $nombre,
        $enlaceWeb,
        $precio,
        $imagen,
        $prioridad,
    ) {

        $enlace=ModeloEnlace::actualizarEnlace(
            $id,
            $nombre,
            $enlaceWeb,
            $precio,
            $imagen,
            $prioridad
        );
        return $enlace;
    }



    public static function borrarEnlace($id)
    {

        ModeloEnlace::borrarEnlaces($id);

        VistaEnlaces::render("");

    }



}

?>