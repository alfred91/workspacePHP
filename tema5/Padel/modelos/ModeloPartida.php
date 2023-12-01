<?php

namespace Padel\modelos;

use Padel\modelos\Conectar;
use \PDO;
use \PDOException;

class ModeloPartida
{
    public static function mostrarPartidas($idJugador)
    {

        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT p.* FROM Partidas p
                                    INNER JOIN PartidasJugadores pj ON p.id = pj.idPartida
                                    WHERE pj.idJugador = ? 
                                    ORDER BY p.Fecha ASC");
        $stmt->bindValue(1, $idJugador, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Partida');
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        $conn->finishConection();

        return $resultados;
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

    // En ModeloPartida.php
    public static function nuevaPartida($fecha, $hora, $ciudad, $lugar, $cubierto, $jugadores)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        
            $stmt = $conexion->prepare('INSERT INTO Partidas (Fecha, Hora, Ciudad, Lugar, Cubierto, Estado)
                                    VALUES (:Fecha, :Hora, :Ciudad, :Lugar, :Cubierto, "abierta")');
            $stmt->bindValue(':Fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindValue(':Hora', $hora, PDO::PARAM_STR);
            $stmt->bindValue(':Ciudad', $ciudad, PDO::PARAM_STR);
            $stmt->bindValue(':Lugar', $lugar, PDO::PARAM_STR);
            $stmt->bindValue(':Cubierto', $cubierto, PDO::PARAM_STR);

            $stmt->execute();
            $idPartida = $conexion->lastInsertId();  // Obtener el ID de la partida recién creada

                $stmt = $conexion->prepare('INSERT INTO PartidasJugadores (IdPartida, IdJugador) VALUES (:IdPartida, :IdJugador)');
                $stmt->bindValue(':IdPartida', $idPartida, PDO::PARAM_INT);
                $stmt->bindValue(':IdJugador', $jugadores, PDO::PARAM_INT);
                $stmt->execute();
        
            $conn->finishConection();
        
    }
    
    public static function apuntarsePartida($idPartida,$idJugador){
        $conn = new Conectar();
        $conexion = $conn->getConexion();
        $stmt = $conexion->prepare('INSERT INTO PartidasJugadores (IdPartida, IdJugador) VALUES (:IdPartida, :IdJugador)');
                $stmt->bindValue(':IdPartida', $idPartida, PDO::PARAM_INT);
                $stmt->bindValue(':IdJugador', $idJugador, PDO::PARAM_INT);
                $stmt->execute();
                $conn->finishConection();
    }

    public static function eliminarPartida($id)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();
        try {
            $stmt = $conexion->prepare('DELETE FROM Partidas WHERE Id=?');
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al borrar la partida';
        } finally {
            $conn->finishConection();
        }
    }
}
