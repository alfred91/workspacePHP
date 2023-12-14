<?php

namespace Examen\modelos;

class AmigoInvisible
{
    private $id;
    private $nombre;
    private $estado;
    private $maximoDinero;
    private $fechaTope;
    private $lugar;
    private $observaciones;
    private $emoji;
    private $participantes;

    public function __construct($id = "", $nombre = "", $estado = "", $maximoDinero = "", $fechaTope = "", $lugar = "", $observaciones = "", $emoji = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->estado = $estado;
        $this->maximoDinero = $maximoDinero;
        $this->fechaTope = $fechaTope;
        $this->lugar = $lugar;
        $this->observaciones = $observaciones;
        $this->emoji = $emoji;
        $this->participantes = [];
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of maximoDinero
     */
    public function getMaximoDinero()
    {
        return $this->maximoDinero;
    }

    /**
     * Set the value of maximoDinero
     *
     * @return  self
     */
    public function setMaximoDinero($maximoDinero)
    {
        $this->maximoDinero = $maximoDinero;

        return $this;
    }

    /**
     * Get the value of fechaTope
     */
    public function getFechaTope()
    {
        return $this->fechaTope;
    }

    /**
     * Set the value of fechaTope
     *
     * @return  self
     */
    public function setFechaTope($fechaTope)
    {
        $this->fechaTope = $fechaTope;

        return $this;
    }

    /**
     * Get the value of lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set the value of lugar
     *
     * @return  self
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get the value of observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of emoji
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * Set the value of emoji
     *
     * @return  self
     */
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * Get the value of participante
     */
    public function getParticipantes()
    {
        return $this->participantes;
    }

    /**
     * Set the value of participante
     *
     * @return  self
     */
    public function setParticipantes(array $participantes)
    {
        $this->participantes = $participantes;

        return $this;
    }

    // Métodos para añadir y quitar participantes
    public function addParticipante(Participante $participante)
    {
        $this->participantes[] = $participante;
    }

    public function removeParticipante($participanteId)
    {
        foreach ($this->participantes as $key => $participante) {
            if ($participante->getId() == $participanteId) {
                unset($this->participantes[$key]);
                return;
            }
        }
    }
}
