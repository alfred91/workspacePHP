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
    public static function mostrarIncidencias($idCliente)
    {

        $resultados = ModeloIncidencia::mostrarIncidencias();

        VistaIncidencia::render($resultados);

    }
    public static function borrarIncidencia($idCliente){
        
        ModeloIncidencia::borrarIncidencia($idCliente);

      ModeloIncidencia::mostrarIncidenciasCliente($idCliente);

        VistaIncidencia::render("");
        die();

    }
}

?>