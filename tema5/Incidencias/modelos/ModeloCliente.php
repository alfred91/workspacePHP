<?php
namespace Incidencias\modelos;

use Incidencias\modelos\Conectar;
use \PDO;

class ModeloCliente
{
    public static function buscarCliente($dni)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Clientes WHERE dni LIKE :dni");
        $stmt->bindValue(':dni','%'.$dni.'%',PDO::PARAM_STR);
   
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Cliente');
        $stmt->execute();

        $clientes = $stmt->fetchAll();

        $conn->finishConection();

        return $clientes;
    }
    
    public static function buscarApellidos($apellidos)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Clientes WHERE apellidos LIKE :dni");
        $stmt->bindValue(':dni','%'.$apellidos.'%',PDO::PARAM_STR);
   
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Cliente');
        $stmt->execute();

        $clientes = $stmt->fetchAll();

        $conn->finishConection();

        return $clientes;
    }
}

?>