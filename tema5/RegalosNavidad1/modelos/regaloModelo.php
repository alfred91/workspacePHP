<?php
namespace RegalosNavidad\modelos;

use RegalosNavidad\modelos\conectar, \PDO;

class RegaloModelo
{

    public static function mostrarRegalos($idUsuario)
    {

        $conexion = new conectar();
        $consulta = $conexion->getConexion()->prepare("SELECT * FROM Regalos WHERE idUsuario = :idUsuario");
        $consulta->bindParam(':idUsuario', $idUsuario);
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\regalo');
        $consulta->execute();


        $regalos = $consulta->fetchAll();
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
        $consulta = $conexion->getConexion()->prepare("INSERT INTO Regalos (nombre, destinatario, precio, estado, year, idUsuario)
                                                    VALUES (:nombre, :destinatario, :precio, :estado, :year, :idUsuario)");
        $consulta->bindParam(':idUsuario', $idUsuario);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':destinatario', $destinatario);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':estado', $estado);
        $consulta->bindParam(':year', $year);
        $consulta->execute();
     
        $conexion->finishConection();
        var_dump($consulta); // Agrega esta línea para verificar los resultados
        return $consulta;
    }


}

?>