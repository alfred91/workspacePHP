<?php
namespace Incidencias\modelos;

use Incidencias\modelos\Conectar;
use \PDO;

class ModeloUsuario
{
    public static function mostrarClientes($nombre)
    {

        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Clientes WHERE nombre =?");
        $stmt->bindValue(1, $nombre);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\Clientes');
        $stmt->execute();

        $cliente = $stmt->fetch();

        $conn->finishConection();

        return $cliente;
    }



}

?>