<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\ModeloEnlace;
use RegalosNavidad\vistas\VistaEnlaces;
use RegalosNavidad\vistas\VistaInicio;

class ControladorEnlace
{

    // MÉTODO PARA MOSTRAR LA PÁGINA DE INICIO
    public static function mostrarInicio()
    {
        VistaInicio::render();
    }

    // MÉTODO PARA MOSTRAR LOS ENLACES DE UN REGALO
    public static function mostraEnlaces($idRegalo)
    {
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);

        // RENDERIZAR LA VISTA DE ENLACES CON LA LISTA OBTENIDA
        VistaEnlaces::render($enlaces);
    }

    // MÉTODO PARA MOSTRAR LOS ENLACES ORDENADOS POR PRECIO ASCENDENTE
    public static function mostrarEnlacesOrdenadosPrecioAsc($idRegalo)
    {
        $enlaces = ModeloEnlace::mostraEnlacesPrecioAsc($idRegalo);
        VistaEnlaces::render($enlaces);
    }

    // MÉTODO PARA MOSTRAR LOS ENLACES ORDENADOS POR PRECIO DESCENDENTE
    public static function mostrarEnlacesOrdenadosPrecioDesc($idRegalo)
    {
        $enlaces = ModeloEnlace::mostraEnlacesPrecioDesc($idRegalo);
        VistaEnlaces::render($enlaces);
    }

    // MÉTODO PARA INSERTAR UN NUEVO ENLACE
    public static function insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo)
    {
        // INSERTAR ENLACE EN LA BASE DE DATOS
        ModeloEnlace::insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo);

        // OBTENER LA LISTA ACTUALIZADA DE ENLACES
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);

        // RENDERIZAR LA VISTA DE ENLACES CON LA LISTA ACTUALIZADA
        VistaEnlaces::render($enlaces);
    }

    // MÉTODO PARA ACTUALIZAR UN ENLACE
    public static function actualizarEnlaceModal($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $id)
    {
        // OBTENER EL IDREGALO ASOCIADO AL ENLACE QUE SE ESTÁ ACTUALIZANDO
        $enlace = ModeloEnlace::obtenerEnlacePorId($id);
        $idRegalo = $enlace->getIdRegalo();

        // ACTUALIZAR EL ENLACE EN LA BASE DE DATOS
        ModeloEnlace::actualizarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $id);

        // OBTENER LA LISTA ACTUALIZADA DE ENLACES
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);

        // RENDERIZAR LA VISTA DE ENLACES CON LA LISTA ACTUALIZADA
        VistaEnlaces::render($enlaces);
    }

    // MÉTODO PARA BORRAR UN ENLACE
    public static function borrarEnlace($id)
    {
        // OBTENER EL IDREGALO ASOCIADO AL ENLACE QUE SE ESTÁ BORRANDO
        $enlace = ModeloEnlace::obtenerEnlacePorId($id);
        $idRegalo = $enlace->getIdRegalo();

        // BORRAR EL ENLACE DE LA BASE DE DATOS
        ModeloEnlace::borrarEnlaces($id);

        // OBTENER LA LISTA ACTUALIZADA DE ENLACES
        $enlaces = ModeloEnlace::mostrarEnlaces($idRegalo);

        // RENDERIZAR LA VISTA DE ENLACES CON LA LISTA ACTUALIZADA
        VistaEnlaces::render($enlaces);
    }
}
?>