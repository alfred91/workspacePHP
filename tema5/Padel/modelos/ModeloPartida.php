<?php namespace Padel\modelos;

use Padel\modelos\Conectar;
use \PDO;

class ModeloPartida{
public static function mostrarPartidas($idJugador){

        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Partidas WHERE idJugador = ? ORDER BY Fecha");
        $stmt->bindValue(1, $idJugador);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Partida');
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        $conn->finishConection();

        return $resultado;
    }
    public static function mostrarTodos()
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Partidas ORDER BY Fecha ASC");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Partida');
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        $conn->finishConection();

        return $resultados;
    }

}
?>