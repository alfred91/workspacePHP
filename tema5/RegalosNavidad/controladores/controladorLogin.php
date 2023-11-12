<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\modelos\usuarioModelo;
use RegalosNavidad\vistas\vistaLogin;


class ControladorLogin
{

    public static function mostrarInicio()
    {
        vistaInicio::render();
    }

    public static function mostrarFormulario()
    {
        vistaLogin::render();
    }

    public static function iniciarSesion($email, $password)
    {
        usuarioModelo::iniciarSesion($email, $password);

    }

    public static function cerrarSesion()
    {

        usuarioModelo::cerrarSesion();
        vistaInicio::render();
    }

} ?>