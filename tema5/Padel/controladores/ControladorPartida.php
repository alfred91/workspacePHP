<?php

namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloPartida;
use Padel\vistas\VistaPartidas;
use Padel\vistas\VistaDetallePartida;

class ControladorPartida
{
  // Muestra la página de inicio.
  public static function mostrarInicio()
  {
    VistaInicio::render();
  }

  // Muestra todas las partidas asociadas al usuario actualmente logueado.
  public static function mostrarPartidas()
  {
    if (isset($_SESSION['usuario'])) {
      // Obtiene el usuario de la sesión.
      $usuario = unserialize($_SESSION['usuario']);

      $partidas = ModeloPartida::mostrarPartidas($usuario->getId());

      VistaPartidas::render($partidas);
    }
  }

  // Muestra todas las partidas disponibles.
  public static function mostrarTodos()
  {
    $partidas = ModeloPartida::mostrarTodos();
    VistaPartidas::render($partidas);
  }

  // Crear una nueva partida.
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

  // Apuntarse a una partida.
  public static function apuntarsePartida($id)
  {

// Verifica si el usuario está logueado
    if (isset($_SESSION['usuario'])) {      

      $usuario = unserialize($_SESSION['usuario']);
      $idJugador = $usuario->getId();
      $partida = ModeloPartida::detallePartida($id);

// Comprueba que la partida esté abierta y tenga menos de 4 jugadores, tambien comrpueba que el nivel sea el mismo

      if ($partida->getEstado() === 'Abierta' && count($partida->getJugadores()) < 4) {

        foreach ($partida->getJugadores() as $jugador) {

          if ($jugador->getNivel() == $usuario->getNivel()) {

            $partida->addJugador($usuario->getNombre(), $usuario->getApodo(), $usuario->getNivel(), $usuario->getEdad());

            ModeloPartida::apuntarsePartida($id, $idJugador);

            if (count($partida->getJugadores()) === 4) {
              ModeloPartida::cerrarPartida($id);
              echo "Te has apuntado a la partida.";
              echo "La partida se ha cerrado.";
            } else {
              echo "Estado de la partida: " . $partida->getEstado() . "<br>";
              echo "Número de jugadores: " . count($partida->getJugadores()) . "<br>";
              echo "Te has apuntado a la partida.";
            }
          }
        }

        echo "No ha sido posible unirse";
      }
    }
  }

  // Borrar un jugador de una partida
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

  // Borrar una partida
  public static function eliminarPartida($id)
  {

    ModeloPartida::eliminarPartida($id);

    $user = unserialize($_SESSION['usuario']);

    ModeloPartida::mostrarPartidas($user->getId());
  }

  // Cerrar una partida
  public static function cerrarPartida($id)
  {
    $partida = ModeloPartida::detallePartida($id);

    if ($partida->getEstado() == 'Abierta') {
      ModeloPartida::cerrarPartida($id);
    } else {
      echo "La partida esta cerrada.";
    }
  }

  // Reabrir una partida, permitiendo la unión de más jugadores.
  public static function abrirPartida($id)
  {
    $partida = ModeloPartida::detallePartida($id);

    if ($partida->getEstado() == 'Cerrada') {
      ModeloPartida::abrirPartida($id);
    } else {
      echo "La partida se ha abierto.";
    }
  }
  // Muestra los detalles de una partida en concreto
  public static function detallePartida($idPartida)
  {

    $partida = ModeloPartida::detallePartida($idPartida);

    VistaDetallePartida::render($partida);
  }

    // Busca partidas
  public static function buscarPartida($partida)
  {

    $partidas = Modelopartida::buscarPartida($partida);

    VistaPartidas::render($partidas);
  }
}
