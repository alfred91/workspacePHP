<?php

namespace Examen\controladores;

use Examen\vistas\VistaInicio;
use Examen\modelos\ModeloParticipante;
use Examen\vistas\VistaAmigos;

class ControladorParticipante {

    public static function mostrarInicio()
    {

        VistaInicio::render();
    }

    public static function mostrarTodos()
    {

        ModeloParticipante::mostrarParticipantes();


    }
    public static function mostrarParticipantes()
    {
        ModeloParticipante::mostrarParticipantes();
        VistaParticipantes::render("");

    }


}
?>