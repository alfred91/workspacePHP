<?php
namespace RegalosNavidad\modelos;

use RegalosNavidad\modelos\conectar;
use \PDO;

class EnlaceModelo
{

    public static function mostrarEnlaces($idRegalo)
    {

        $conn = new conectar();
        $conexion = $conn->getConexion();
        $stmt = $conexion->prepare("SELECT links FROM Enlaces WHERE idRegalo = :idRegalo");
        $stmt->bindParam(':idRegalo', $idRegalo);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\enlace');
        $stmt->execute();

        $enlaces = $stmt->fetch();

        $conn->finishConection();

        return $enlaces;

    }
}



?>