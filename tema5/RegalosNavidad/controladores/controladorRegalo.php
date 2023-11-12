<?php namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\regaloModelo;
use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\vistas\vistaRegalos;


    class ControladorRegalo {

        public static function mostrarInicio() {

            vistaInicio::render();
        }

        public static function mostrarRegalos($idUsuario){

            $regalos = regaloModelo::mostrarRegalos($idUsuario); // Obtener los regalos del modelo

            vistaRegalos::render($regalos); // Pasar los regalos a la vista
        }
        
}

?>