<?php
namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloJugador;
use Padel\vistas\VistaJugador;


class ControladorJugador
{

    /**
     * Método que muestra la página principal de bienvenida
     */
    public static function mostrarInicio()
    {
        VistaInicio::render();
    }

    public static function mostrarJugadores(){
      $jugadores = ModeloJugador::mostrarJugadores();
      VistaJugador::render($jugadores);
      
        
    }
    
}