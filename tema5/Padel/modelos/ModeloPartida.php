<?php

namespace Padel\modelos;

use \PDO;
use \PDOException;
use Padel\modelos\Conectar;

class ModeloPartida
{
    public static function mostrarPartidas($idJugador)
    {

        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT p.* FROM Partidas p
                                    INNER JOIN PartidasJugadores pj ON p.id = pj.idPartida
                                    WHERE pj.idJugador = ? 
                                    ORDER BY p.Fecha DESC");
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

        $stmt = $conexion->prepare("SELECT * FROM Partidas ORDER BY Fecha");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Partida');
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        $conn->finishConection();

        return $resultados;
    }

    public static function nuevaPartida($fecha, $hora, $ciudad, $lugar, $cubierto, $jugador)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        try {
            $conexion->beginTransaction(); // Start a transaction

            $stmt = $conexion->prepare('INSERT INTO Partidas (Fecha, Hora, Ciudad, Lugar, Cubierto, Estado)
                                    VALUES (:Fecha, :Hora, :Ciudad, :Lugar, :Cubierto, "Abierta")');
            $stmt->bindValue(':Fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindValue(':Hora', $hora, PDO::PARAM_STR);
            $stmt->bindValue(':Ciudad', $ciudad, PDO::PARAM_STR);
            $stmt->bindValue(':Lugar', $lugar, PDO::PARAM_STR);
            $stmt->bindValue(':Cubierto', $cubierto, PDO::PARAM_STR);

            $stmt->execute();
            $idPartida = $conexion->lastInsertId();

            $stmt = $conexion->prepare('INSERT INTO PartidasJugadores (IdPartida, IdJugador) VALUES (:IdPartida, :IdJugador)');
            $stmt->bindValue(':IdPartida', $idPartida, PDO::PARAM_INT);
            $stmt->bindValue(':IdJugador', $jugador, PDO::PARAM_INT);
            $stmt->execute();

            $conexion->commit();
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo 'Error al crear la partida: ' . $e->getMessage();
        } finally {
            $conn->finishConection();
        }
    }

    public static function apuntarsePartida($idPartida, $idJugador)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        try {
            $stmt = $conexion->prepare('INSERT INTO PartidasJugadores (IdPartida, IdJugador) VALUES (:IdPartida, :IdJugador)');
            $stmt->bindValue(':IdPartida', $idPartida, PDO::PARAM_INT);
            $stmt->bindValue(':IdJugador', $idJugador, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al apuntarse a la partida';
        } finally {
            $conn->finishConection();
        }
    }
    public static function borrarsePartida($idPartida, $idJugador)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        try {
            $stmt = $conexion->prepare('DELETE FROM PartidasJugadores WHERE IdPartida = :IdPartida AND IdJugador = :IdJugador');
            $stmt->bindValue(':IdPartida', $idPartida, PDO::PARAM_INT);
            $stmt->bindValue(':IdJugador', $idJugador, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al Borrarse de la partida';
        } finally {
            $conn->finishConection();
        }
    }
    public static function detallePartida($idPartida)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        // Obtener datos de la partida
        $stmt = $conexion->prepare('
    SELECT p.*
    FROM Partidas p
    WHERE p.id = :idPartida
');

        $stmt->bindValue(':idPartida', $idPartida, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Partida');
        $stmt->execute();

        $partida = $stmt->fetch();

        // Obtener los jugadores asociados a la partida
        $stmt = $conexion->prepare('
    SELECT j.*
    FROM Jugadores j
    INNER JOIN PartidasJugadores pj ON j.id = pj.IdJugador
    WHERE pj.IdPartida = :idPartida
');
        $stmt->bindValue(':idPartida', $idPartida, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Jugador');
        $stmt->execute();

        $jugadores = $stmt->fetchAll();

        // Establecer los jugadores en la partida
        $partida->setJugadores($jugadores);

        $conn->finishConection();

        return $partida;
    }



    public static function mostrarJugadoresPartida($idPartida, $idJugador)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();
        try {
            $stmt = $conexion->prepare("SELECT j.*
            FROM Jugadores j
            INNER JOIN PartidasJugadores pj ON j.id = pj.idJugador
            WHERE pj.idPartida = :idPartida;
");
            $stmt->bindParam(':idPartida', $idPartida, PDO::PARAM_STR);
            $stmt->bindParam(':idJugador', $idJugador, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }

    public static function cerrarPartida($id)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        try {
            $stmt = $conexion->prepare('UPDATE Partidas SET estado = "Cerrada" WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error CLOSING the game: ' . $e->getMessage();
        } finally {
            $conn->finishConection();
        }
    }
    public static function abrirPartida($id)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        try {
            $stmt = $conexion->prepare('UPDATE Partidas SET estado = "Abierta" WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error OPENING the game: ' . $e->getMessage();
        } finally {
            $conn->finishConection();
        }
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
