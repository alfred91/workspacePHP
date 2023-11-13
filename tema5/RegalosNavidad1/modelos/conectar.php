<?php
namespace RegalosNavidad\modelos;

use \PDO, \PDOException;

class Conectar
{

    private $conexion;

    public function __construct($host = "", $bd = "", $usuario = "", $password = "")
    {

        $host = 'mariadb:3306';
        $bd = 'Regalos';
        $usuario = 'root';
        $password = 'toor';

        try {
            if ($this->conexion == null) {

                $this->conexion = new PDO("mysql:host=" . $host . ";dbname=" . $bd, $usuario, $password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            }

        } catch (PDOException $e) {
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