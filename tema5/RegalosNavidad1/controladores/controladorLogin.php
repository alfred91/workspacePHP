<?php namespace RegalosNavidad\controladores;

use RegalosNavidad\vistas\vistaInicio;
use RegalosNavidad\modelos\modeloRegalo;
use RegalosNavidad\modelos\modeloUsuario;
use RegalosNavidad\vistas\vistaRegalos;
use RegalosNavidad\vistas\vistaRegalosForm;
use RegalosNavidad\vistas\vistaRegalosFormUpdate;
use RegalosNavidad\vistas\vistaUsuarios;

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
     * Pintar formulario de login usuairo
     */
    public static function mostrarFormLogin($error)
    {
        VistaUsuarios::render($error);
    }

    public static function mostrarFormulario()
    {
        vistaUsuarios::render();

    }
    /** 
     * Comprobar si el login es correcto o no
     */
    public static function checkLogin($email, $password)
    {
        $resultado = modeloUsuario::checkLogin($email, $password);

        //Según login muestro otra vez el login o muestro los resultados
        if ($resultado == false) {
            ControladorLogin::mostrarFormLogin("Datos incorrectos");
        } else {
            //Meter en la sesión el usuario
            $_SESSION['usuario'] = serialize($resultado);

            //Pintamos resultados
            $resultados = modeloRegalo::mostrarRegalos($email);

            vistaRegalos::render($resultados);
        }
    }

    public static function cerrarSesion()
    {
        session_destroy();
        vistaInicio::render();
    }

    /**
     * Método que muestra todos los resultados
     */
    public static function mostrarTodos()
    {
        //LLamar a BBDD para traerme todos los resultados
        $resultados = modeloRegalo::mostrarRegalos("");

        //LLamar a una vista para pintar todos los resultados
        vistaRegalos::render($resultados);
    }

    /**
     * Método que eliminar un resultado de la BBDD
     */
    public static function eliminarResultado($id)
    {

        ModeloRegalo::borrarRegalo($id);

        $resultados = ModeloRegalo::mostrarTodos();
        vistaRegalos::render($resultados);
    }

    /**
     * Método que muestra el formulario para insertar un nuevo resultado
     */
    public static function mostrarFormNuevoResultado()
    {
        vistaRegalosForm::render();
    }

    /**
     * Método que inserta en BBDD un objeto Resultado
     */
    public static function insertarNuevoResultado($resultado)
    {
        ModeloRegalo::insertar($resultado);

        $resultados = ModeloRegalo::mostrarTodos();
        vistaRegalos::render($resultados);
    }

    /**
     * Método que muestra una vista con el formulario para modificar un resultado
     */
    public static function mostrarFormModificarResultado($id)
    {
        $resultado = ModeloRegalo::getResultado($id);

        vistaRegalosFormUpdate::render($resultado);
    }

    public static function modificarResultado($resultado)
    {
        ModeloRegalo::modificarResultado($resultado);

        $resultados = ModeloRegalo::mostrarTodos();
        vistaRegalos::render($resultados);
    }


}



?>