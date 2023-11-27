<?php

    namespace Incidencias\controladores;

use DeepRacer\vistas\VistaResultados;
use Incidencias\vistas\VistaInicio;
 

    class ControladorCliente{

        public static function mostrarInicio(){

            VistaInicio::render();
        }

        public static function mostrarCliente(){

            VistaResultados::render("");

    }
}
?>