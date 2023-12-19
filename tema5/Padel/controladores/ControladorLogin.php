<?php

namespace Padel\controladores;

use Padel\vistas\VistaInicio;
use Padel\modelos\ModeloJugador;
use Padel\vistas\VistaLogin;

class ControladorLogin
{

    /**
     * Método que muestra la página principal de bienvenida
     */
    public static function mostrarInicio()
    {
        vistaInicio::render();
    }

    /** 
     * Pintar formulario de login usuario
     */

    public static function mostrarFormulario()
    {
        VistaLogin::render();
    }

    /** 
     * Comprobar datos de login
     */
    public static function checkLogin($email, $password)
    {

        $resultado = ModeloJugador::checkLogin($email, $password);


        if (!$resultado) {
            echo '<script>alert("Datos incorrectos");</script>';
            ControladorLogin::mostrarFormulario();
        } else {
            $_SESSION['usuario'] = serialize($resultado);
            ControladorPartida::mostrarPartidas();
        }
    }

    /** 
     * Cerrar sesion
     */
    public static function cerrarSesion()
    {
        session_destroy();

        VistaInicio::render();
    }
}
