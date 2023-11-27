<?php

namespace Incidencias\controladores;

use Incidencias\modelos\ModeloCliente;
use Incidencias\vistas\VistaCliente;
use Incidencias\vistas\VistaInicio;
 

    class ControladorCliente{

        public static function mostrarInicio(){

            VistaInicio::render();
        }

        public static function mostrarCliente(){

            VistaCliente::render("");

    }

    public static function buscarDni($dni){
        
        $cliente=ModeloCliente::buscarCliente($dni);
        
        VistaCliente::render($cliente);
        
    }


}
?>