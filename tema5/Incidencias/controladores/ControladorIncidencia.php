<?php

namespace Incidencias\controladores;

use Incidencias\modelos\ModeloIncidencia;
use Incidencias\vistas\VistaInicio;
use Incidencias\vistas\VistaIncidencia;

class ControladorIncidencia
{
    public static function mostrarInicio()
    {

        VistaInicio::render();
    }

    public static function mostrarTodos()
    {

        $resultados = ModeloIncidencia::mostrarIncidencias();
        VistaIncidencia::render($resultados);
    }
    public static function mostrarIncidencias()
    {

        $resultados = ModeloIncidencia::mostrarIncidencias();
        VistaIncidencia::render($resultados);

    }

    public static function insertarIncidencia(
        $id,
        $latitud,
        $longitud,
        $ciudad,
        $direccion,
        $descripcion,
        $solucion,
        $estado,
        $idCliente
    ) {
        ModeloIncidencia::
            insertarIncidencia(
                $id,
                $latitud,
                $longitud,
                $ciudad,
                $direccion,
                $descripcion,
                $solucion,
                $estado,
                $idCliente
            );

    }
    public static function modificarIncidencia(
        $id,
        $solucion,
        $estado

    ) {
        ModeloIncidencia::
            modificarInidencia(
                $id,
                $solucion,
                $estado
            );

    }
    public static function borrarIncidencia($id)
    {

        ModeloIncidencia::borrarIncidencia($id);

        ModeloIncidencia::mostrarIncidencias();

    }
}

?>