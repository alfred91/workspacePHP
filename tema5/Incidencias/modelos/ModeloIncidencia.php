<?php

namespace Incidencias\modelos;

use Incidencias\modelos\Conectar;
use \PDO;

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


    public static function editarIncidencia($id)
    {

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("SELECT * FROM Incidencias WHERE id = ?");
        $consulta->bindValue(1, $id);
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Incidencia'); //Nombre de la clase
        $consulta->execute();

        $incidencias = $consulta->fetchAll();

        $conexionObject->finishConection();

        return $incidencias;
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

    public static function modificarInidencias($latitud, $longitud, $ciudad, $direccion, $solucion, $estado, $id)
    {
        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("INSERT INTO Incidencias (latitud, longitud, ciudad, direccion, solucion, estado, idCliente) VALUES (?,?,?,?,?,?,?)");
        $consulta->bindValue(1, $latitud);
        $consulta->bindValue(2, $longitud);
        $consulta->bindValue(3, $ciudad);
        $consulta->bindValue(4, $direccion);
        $consulta->bindValue(5, $solucion);
        $consulta->bindValue(6, $estado);
        $consulta->bindValue(7, $id);
        $consulta->execute();

        $conexionObject->finishConection();

    }

    public static function buscarIncidencia($incidencia)
    {

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("SELECT * FROM Clientes WHERE ciudad = ? OR nombre LIKE '%$incidencia%'");
        $consulta->bindValue(1, $incidencia);
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Incidencias\modelos\Cliente'); //Nombre de la clase
        $consulta->execute();

        $incidencias = $consulta->fetchAll();

        $conexionObject->finishConection();

        return $incidencias;
    }




}


?>