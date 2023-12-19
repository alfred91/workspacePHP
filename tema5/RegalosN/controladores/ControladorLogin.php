<?php namespace RegalosNavidad\controladores;

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
    
    /** 
     * Comprobar si el login es correcto o no
     */
    public static function checkLogin($email, $password)
    {
        $resultado = ModeloUsuario::checkLogin($email, $password);

        // Según login muestro otra vez el login o muestro los resultados
        if ($resultado == false) {

            echo '<script>alert("Datos incorrectos");</script>';
            ControladorLogin::mostrarFormulario();
            
        } else {
            // Meter en la sesión el usuario
            $_SESSION['usuario'] = serialize($resultado);

            // Pintamos resultados
            ControladorRegalo::mostrarRegalos();
        }
    }

    public static function cerrarSesion()
    {
        session_destroy();

        VistaInicio::render();
    }

    /**
     * Método que muestra todos los resultados
     */
    public static function mostrarTodos()
    {
        //LLamar a BBDD para traerme todos los resultados
        $resultados = ModeloRegalo::mostrarRegalos("");

        //LLamar a una vista para pintar todos los resultados
        vistaRegalos::render($resultados);
    }

    /**
     * Método que eliminar un resultado de la BBDD
     */
    }



?>