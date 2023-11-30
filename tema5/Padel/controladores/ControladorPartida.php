<?php
namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloPartida;
use Padel\modelos\ModeloJugador;
use Padel\vistas\VistaPartidas;
use Padel\Vistas\VistaLogin;

class ControladorPartida
{

    /**
     * Método que muestra la página principal de bienvenida
     */
    public static function mostrarInicio()
    {
        VistaInicio::render();
    }

    public static function mostrarPartidas()
    {
        if (isset($_SESSION['usuario'])) {

            $usuario = unserialize($_SESSION['usuario']);

            $partidas = ModeloPartida::mostrarPartidas($usuario->getId());

            VistaPartidas::render($partidas);
        }
    }
    public static function mostrarTodos(){
      $partidas = ModeloPartida::mostrarTodos();
      return $partidas;
    }

  //  public function añadirJugador(Jugador $jugador) {
    // Verificar que no haya más de cuatro jugadores
   // if (count($this->jugadores) < 4) {
        // Verificar que el jugador no esté ya en la partida
 //       if (!in_array($jugador, $this->jugadores)) {
  //          $this->jugadores[] = $jugador;
 //       } else {
            // Manejar el caso en que el jugador ya esté en la partida
 //           echo "El jugador ya está inscrito en la partida.";
  //      }
  //  } else {
        // Manejar el caso en que la partida ya tenga cuatro jugadores
 //       echo "La partida ya tiene cuatro jugadores inscritos.";
 //   }
//}

}