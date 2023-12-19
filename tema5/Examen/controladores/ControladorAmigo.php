<?php

namespace Examen\controladores;

use Examen\vistas\VistaInicio;
use Examen\modelos\ModeloAmigo;
use Examen\vistas\VistaAmigos;

class ControladorAmigo {

    public static function mostrarInicio()
    {

        VistaInicio::render();
    }

    // Muestra todas las partidas disponibles.
    public static function mostrarTodos()
    {
      $amigos = ModeloAmigo::mostrarTodos();
      VistaAmigos::render($amigos);
    }

    public static function eliminarAmigo($id)
    {
  
      ModeloAmigo::eliminarAmigo($id);
  
      ModeloAmigo::mostrarTodos();
    }
  
    
    public static function detalleAmigo($id){

        $datos=ModeloAmigo::detalleAmigo($id);

        VistaAmigos::render($datos);
    }

    public static function mostrarAmigos()
    {
        $amigos = ModeloAmigo::mostrarTodos();
        VistaAmigos::render($amigos);

    }

    public static function addAmigo($id){
        
    }

}
?>