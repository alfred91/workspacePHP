<?php
namespace Padel\modelos;

class PartidasJugadores
{
    private $jugador;
    private $partida;

    public function __construct(Jugador $jugador, Partida $partida)
    {
        $this->jugador = $jugador;
        $this->partida = $partida;
    }

    public function getJugador()
    {
        return $this->jugador;
    }

    public function getPartida()
    {
        return $this->partida;
    }
}
?>