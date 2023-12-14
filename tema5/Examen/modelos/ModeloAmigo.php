<?php

namespace Examen\modelos;

use Examen\modelos\Conectar;
use \PDO;
use \PDOException;

class ModeloAmigo
{
    public static function mostrarTodos()
    {

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("SELECT * FROM AmigoInvisible ORDER BY fechaTope DESC");
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\AmigoInvisible'); //Nombre de la clase
        $consulta->execute();

        $amigos = $consulta->fetchAll();

        $conexionObject->finishConection();

        return $amigos;
    }

    public static function DetalleAmigo($id)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare('
    SELECT a.*
    FROM AmigoInvisible a
    WHERE a.id = :id
    ');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\AmigoInvisible');
        $stmt->execute();

        $amigos = $stmt->fetch();

        $stmt = $conexion->prepare('
    SELECT p.*
    FROM Participante p
    INNER JOIN AmigosParticipantes ap ON p.id = ap.IdParticipante
    WHERE ap.IdAmigo = :id
    ');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\Participante');
        $stmt->execute();

        $participantes = $stmt->fetchAll();

        $amigos->setParticipantes($participantes);

        $conn->finishConection();

        return $amigos;
    }

    public static function mostrarAmigos($idParticipante)
    {

        $conn = new Conectar();
        $conexion = $conn->getConexion();
        $stmt = $conexion->prepare("SELECT p.* FROM Amigos a
                                    INNER JOIN AmigosParticipantes ap ON a.id = ap.idAmigo
                                    WHERE ap.idParticipante = ? AND a.FechaTope >= CURDATE()
                                    ORDER BY a.Fecha DESC");
        $stmt->bindValue(1, $idParticipante, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\Participantes');
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        $conn->finishConection();

        return $resultados;
    }

    public static function eliminarAmigo($id)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();
        try {
            $stmt = $conexion->prepare('DELETE FROM AmigoInvisible WHERE Id=:id');
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al borrar el regalo';
        } finally {
            $conn->finishConection();
        }
    }
    public static function nuevoAmigo($nombre, $estado, $maximoDinero, $fechaTope, $lugar, $observaciones, $emoji, $participantes)
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        try {
            $conexion->beginTransaction();

            $stmt = $conexion->prepare('INSERT INTO AmigoInvisible (Nombre, Estado, maximoDinero, fechaTope, Lugar, Observaciones, Emoji, Participantes)
                                    VALUES (:Nombre, :Estado, :maximoDinero, :fechaTope, :Lugar, :Observaciones, :Emoji, :Participantes)');
            $stmt->bindValue(':Nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindValue(':Estado', $estado, PDO::PARAM_STR);
            $stmt->bindValue(':maximoDinero', $maximoDinero, PDO::PARAM_STR);
            $stmt->bindValue(':fechaTope', $fechaTope, PDO::PARAM_STR);
            $stmt->bindValue(':Lugar', $lugar, PDO::PARAM_STR);
            $stmt->bindValue(':Observaciones' . $observaciones, PDO::PARAM_STR);
            $stmt->bindValue(':Emoji' . $emoji, PDO::PARAM_STR);
            $stmt->bindValue(':Participantes' . $participantes, PDO::PARAM_STR);


            $stmt->execute();
            $idAmigo = $conexion->lastInsertId();

            $stmt = $conexion->prepare('INSERT INTO AmigosParticipantes (IdParticipante, IdAmigo) VALUES (:IdParticipante, :IdAmigo)');
            $stmt->bindValue(':idParticipante', $idParticipante, PDO::PARAM_INT);
            $stmt->bindValue(':IdAmigo', $idAmigo, PDO::PARAM_INT);
            $stmt->execute();

            $conexion->commit();
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo 'Error al crear el regalo: ' . $e->getMessage();
        } finally {
            $conn->finishConection();
        }
    }

    public static function buscarAmigo($amigo)
    {
        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();
        $consulta = $conexion->prepare("SELECT * FROM Participantes WHERE nombre LIKE ? OR email LIKE ?");
        $consulta->bindValue(1, "%" . $amigo . "%");
        $consulta->bindValue(2, "%" . $amigo . "%");
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\AmigoInvisible');
        $consulta->execute();

        $partidas = $consulta->fetchAll();
        $conexionObject->finishConection();

        return $partidas;
    }
    public static function borrarAmigo($id)
    {
        try {
            $conexionObject = new Conectar();
            $conexion = $conexionObject->getConexion();

            $query = $conexion->prepare('DELETE FROM AmigoInvisible WHERE id=:id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexionObject->finishConection();
    }
}
