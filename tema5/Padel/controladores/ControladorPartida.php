<?php

namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloPartida;
use Padel\vistas\VistaPartidas;
use Padel\vistas\VistaDetallePartida;

class ControladorPartida
{

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

  public static function apuntarsePartida($id)
  {
    if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $idJugador = $usuario->getId();

      $partida = ModeloPartida::detallePartida($id);

      echo "Estado de la partida: " . $partida->getEstado() . "<br>";
      echo "Número de jugadores: " . count($partida->getJugadores()) . "<br>";

      if ($partida->getEstado() === 'Abierta' && count($partida->getJugadores()) < 4) {
        $partida->addJugador($usuario->getNombre(), $usuario->getApodo(), $usuario->getNivel(), $usuario->getEdad());

        ModeloPartida::apuntarsePartida($id, $idJugador);

        if (count($partida->getJugadores()) === 4) {
          ModeloPartida::cerrarPartida($id);
          echo "Estado de la partida: " . $partida->getEstado() . "<br>";
          echo "Número de jugadores: " . count($partida->getJugadores()) . "<br>";
          echo "La partida se ha cerrado."; 
        } else {
          echo "Te has apuntado a la partida.";
        }
      } else {
        echo "No es posible apuntarse a la partida.";
      }
    }
  }
  
  public static function borrarsePartida($idPartida, $idJugador)
  {
    if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $idJugador = $usuario->getId();

      $partida = ModeloPartida::detallePartida($idPartida);

      ModeloPartida::borrarsePartida($idPartida, $idJugador);

      if (count($partida->getJugadores()) === 4) {

        ModeloPartida::abrirPartida($idPartida);
        echo "Estado de la partida: " . $partida->getEstado() . "<br>";
        echo "La partida se ha Abierto."; 
        echo "Número de jugadores: " . count($partida->getJugadores());

      } else {
        echo "Te has borrado de la partida.";
      }
    } else {
      echo "No es posible borrarse de la partida.";
    }
  }

  public static function eliminarPartida($id)
  {

    ModeloPartida::eliminarPartida($id);

    $user = unserialize($_SESSION['usuario']);

    ModeloPartida::mostrarPartidas($user->getId());
  }
  public static function cerrarPartida($id)
  {
    $partida = ModeloPartida::detallePartida($id);

    if ($partida->getEstado() == 'Abierta') {
      ModeloPartida::cerrarPartida($id);
    } else {
      echo "The game is already closed.";
    }
  }
  public static function abrirPartida($id)
  {
    $partida = ModeloPartida::detallePartida($id);

    if ($partida->getEstado() == 'Cerrada') {
      ModeloPartida::abrirPartida($id);
    } else {
      echo "The game is already closed.";
    }
  }

  public static function detallePartida($idPartida)
  {

    $partida = ModeloPartida::detallePartida($idPartida);

    VistaDetallePartida::render($partida);
  }
}
