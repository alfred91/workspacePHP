<?php

namespace Incidencias\modelos;

use Incidencias\modelos\Conectar;
use \PDO;
use \PDOException;

class ModeloIncidencia
{

    public static function mostrarIncidencias()
    {

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("SELECT * FROM Incidencias");
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencia'); //Nombre de la clase
        $consulta->execute();

        $incidencias = $consulta->fetchAll();

        $conexionObject->finishConection();

        return $incidencias;
    }

    public static function mostrarIncidenciasCliente($idCliente)
    {
        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();
        $consulta = $conexion->prepare('SELECT * FROM Incidencias WHERE idCliente = ?');
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencia');
        $consulta->execute();

        $incidencias = $consulta->fetchAll();
        $conexionObject->finishConection();

        return $incidencias;
    }

    public static function insertarIncidencia(
        $latitud,
        $longitud,
        $ciudad,
        $direccion,
        $descripcion,
        $solucion,
        $estado,
        $idCliente
    ) {
        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare('INSERT INTO Incidencias (latitud, longitud, ciudad, direccion, descripcion, solucion, estado, idCliente) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        $consulta->bindValue(1, $latitud);
        $consulta->bindValue(2, $longitud);
        $consulta->bindValue(3, $ciudad);
        $consulta->bindValue(4, $direccion);
        $consulta->bindValue(5, $descripcion);
        $consulta->bindValue(6, $solucion);
        $consulta->bindValue(7, $estado);
        $consulta->bindValue(8, $idCliente);

        $consulta->execute();
        $conexionObject->finishConection();

    }

    public static function modificarInidencia($id, $solucion, $estado)
    {

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("UPDATE Incidencias SET solucion = ?, estado = ? where id = ? ");
        $consulta->bindValue(1, $solucion);
        $consulta->bindValue(2, $estado);
        $consulta->bindValue(3, $id);
        $consulta->execute();

        $conexionObject->finishConection();
    }

    public static function borrarIncidencia($id)
    {
        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("DELETE FROM Incidencias WHERE id = ?");
        $consulta->bindValue(1, $id);
        $consulta->execute();

        $conexionObject->finishConection();
    }

    public static function buscarIncidencia($incidencia)
    {
        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();
        $consulta = $conexion->prepare("SELECT * FROM Incidencias WHERE ciudad LIKE ? OR estado LIKE ?");
        $consulta-> bindValue(1, "%".$incidencia."%");
        $consulta-> bindValue(2, "%".$incidencia."%");
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencia');
        $consulta->execute();
    
        $incidencia = $consulta->fetchAll();
        $conexionObject->finishConection();
    
        return $incidencia;
    }
    

}
?>