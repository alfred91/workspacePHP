<?php
namespace RegalosNavidad\modelos;

use RegalosNavidad\modelos\conectar, \PDO;

class RegaloModelo
{

    public static function mostrarRegalos($idUsuario)
    {

        $conexion = new conectar();
        $stmt = $conexion->getConexion()->prepare("SELECT * FROM Regalos WHERE idUsuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\regalo');
        $stmt->execute();


        $regalos = $stmt->fetchAll();
        $conexion->finishConection();
        return $regalos;
    }

    public function insertarRegalo(
        $nombre,
        $destinatario,
        $precio,
        $estado,
        $year,
        $idUsuario) {

        $conexion = new conectar();
        $stmt = $conexion->getConexion()->prepare("INSERT INTO Regalos (nombre, destinatario, precio, estado, year, idUsuario)
                                                    VALUES (:nombre, :destinatario, :precio, :estado, :year, :idUsuario)");
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':destinatario', $destinatario);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
     
        $conexion->finishConection();
        var_dump($stmt); // Agrega esta línea para verificar los resultados
        return $stmt;
    }


}

?>