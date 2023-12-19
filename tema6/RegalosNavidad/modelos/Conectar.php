<?php

namespace RegalosNavidad\modelos;

use MongoDB\Client;
use Exception;

class Conectar
{
    private $conexion;

    public function __construct($host = 'localhost', $puerto = 27017, $usuario = '', $password = '')
    {
        $host = 'localhost';
        $puerto = 27018;
        $usuario = 'root';
        $password = 'toor';

        try {
            $this->conexion = new Client(
                "mongodb://{$usuario}:{$password}@{$host}:{$puerto}",
                [],
                ['typeMap' => ['root' => 'array', 'document' => 'array']]
            );
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get the value of conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    public function finishConection()
    {
        $this->conexion = null;
    }
}
?>
