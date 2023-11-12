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
        var_dump($regalos); // Agrega esta línea para verificar los resultados

        return $regalos;
    }

}

?>