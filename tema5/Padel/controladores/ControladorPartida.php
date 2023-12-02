<?php

namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloPartida;
use Padel\modelos\ModeloJugador;
use Padel\vistas\VistaPartidas;
use Padel\vistas\VistaDetallePartida;

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
  public static function mostrarTodos()
  {
    $partidas = ModeloPartida::mostrarTodos();
    VistaPartidas::render($partidas);
  }

  public static function nuevaPartida($fecha, $hora, $ciudad, $lugar, $cubierto)
  {
    if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $idJugador = $usuario->getId();

      $partidas = ModeloPartida::nuevaPartida(
        $fecha,
        $hora,
        $ciudad,
        $lugar,
        $cubierto,
        $idJugador
      );
      return $partidas;
    }
    VistaPartidas::render("");
  }
  public static function apuntarsePartida($idPartida, $idJugador)
  {
    if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $idJugador = $usuario->getId();

      ModeloPartida::apuntarsePartida($idPartida, $idJugador);
    }
  }
  public static function borrarsePartida($idPartida, $idJugador)
  {
    if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $idJugador = $usuario->getId();

      ModeloPartida::borrarsePartida($idPartida, $idJugador);
    }
  }

  public static function eliminarPartida($id)
  {

    ModeloPartida::eliminarPartida($id);

    $user = unserialize($_SESSION['usuario']);

    $partidas = ModeloPartida::mostrarPartidas($user->getId());

    VistaPartidas::render($partidas);
  }
  public static function detallePartida($idPartida)
  {

    $partida = ModeloPartida::detallePartida($idPartida);

    VistaDetallePartida::render($partida);
  }


  public function addJugador(Jugador $jugador)
  {
    if (count($this->jugadores) < 4) {
      if (!in_array($jugador, $this->jugadores)) {
        $this->jugadores[] = $jugador;
      } else {
        echo "El jugador ya está inscrito en la partida.";
      }
    } else {
      echo "La partida ya tiene cuatro jugadores inscritos.";
    }
  }
}
