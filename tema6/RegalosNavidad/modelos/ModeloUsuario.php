<?php

namespace RegalosNavidad\modelos;

use MongoDB\Client;

class ModeloUsuario
{
    public static function checkLogin($email, $password)
    {
        $conexion = new Conectar();
        $coleccionUsuarios = $conexion->getConexion()->selectCollection('Usuarios');

        $resultado = $coleccionUsuarios->findOne(['email' => $email, 'password' => $password]);

        $conexion->finishConection();

        return $resultado;
    }
}

?>
