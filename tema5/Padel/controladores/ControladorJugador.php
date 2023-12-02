<?php
namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloPartida;
use Padel\modelos\ModeloJugador;
use Padel\vistas\VistaJugador;
use Padel\vistas\VistaPartida;
use Padel\Vistas\VistaLogin;

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

    public static function mostrarJugadoresPartida($idPartida){
      $partida= Modelopartida::buscarPartidaPorId($idPartida);
    }
    public static function mostrarTodos(){
      $partidas = ModeloPartida::mostrarTodos();
      return $partidas;
    }
}