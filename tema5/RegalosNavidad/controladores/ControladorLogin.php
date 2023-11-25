<?php
namespace RegalosNavidad\controladores;

use RegalosNavidad\vistas\VistaInicio;
use RegalosNavidad\modelos\ModeloRegalo;
use RegalosNavidad\modelos\ModeloUsuario;
use RegalosNavidad\vistas\VistaRegalos;
use RegalosNavidad\vistas\VistaUsuarios;

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
     * Pintar formulario de login usuaro
     */

    public static function mostrarFormulario()
    {
        VistaUsuarios::render();

    }

    public static function checkLogin($email, $password)
    {

        $resultado = ModeloUsuario::checkLogin($email, $password);


        if (!$resultado) {
            echo '<script>alert("Datos incorrectos");</script>';
            ControladorLogin::mostrarFormulario();

        } else {
            $_SESSION['usuario'] = serialize($resultado);
            ControladorRegalo::mostrarRegalos("");

        }
    }


    public static function cerrarSesion()
    {
        session_destroy();

        VistaInicio::render();
    }
}

?>