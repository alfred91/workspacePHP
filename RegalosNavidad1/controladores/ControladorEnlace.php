<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\ModeloEnlace;
use RegalosNavidad\vistas\VistaEnlaces;
use RegalosNavidad\vistas\VistaInicio;

class ControladorEnlace
{

    public static function mostrarInicio()
    {
        VistaInicio::render();
    }

    public static function mostraEnlaces($idRegalo)
    {
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);

        VistaEnlaces::render($enlaces);

    }

    public static function insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo)
    {
        ModeloEnlace::insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo);
        
        // Obtener la lista actualizada de enlaces
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);
    
        // Renderizar la vista de enlaces con la lista actualizada
        VistaEnlaces::render($enlaces);
    }
    
    public static function actualizarEnlaceModal($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $id)
    {
        // Get the idRegalo associated with the enlace
        $enlace = ModeloEnlace::obtenerEnlacePorId($id);
        $idRegalo = $enlace->getIdRegalo();
    
        // Update the enlace
        ModeloEnlace::actualizarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $id);
    
        // Render the enlaces view for the corresponding idRegalo
        ControladorEnlace::mostraEnlaces($idRegalo);
    }
    

    public static function borrarEnlace($id)
    {
        // Obtener el idRegalo asociado al enlace que estás eliminando
        $enlace = ModeloEnlace::obtenerEnlacePorId($id);

        $idRegalo = $enlace->getIdRegalo();
    
        ModeloEnlace::borrarEnlaces($id);
    
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);
    
        VistaEnlaces::render($enlaces);
    }
    
    
}

?>