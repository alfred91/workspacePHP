<?php

    namespace Incidencias\controladores;

    use Incidencias\vistas\VistaInicio;
 

    class ControladorCliente{

        public static function mostrarInicio(){

            VistaInicio::render();
        }

    }
?>