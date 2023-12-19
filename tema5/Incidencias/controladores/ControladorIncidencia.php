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

        ModeloIncidencia::mostrarIncidencias();

    }
    public static function mostrarIncidencias()
    {

        $resultados = ModeloIncidencia::mostrarIncidencias();
        VistaIncidencia::render($resultados);

    }

    public static function insertarIncidencia(
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
    public static function buscarIncidencia($incidencia) {

        $incidencias = ModeloIncidencia::buscarIncidencia($incidencia);

        VistaIncidencia::render($incidencias);
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

    }
}

?>