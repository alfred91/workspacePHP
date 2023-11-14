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

        // Utilizando un INNER JOIN para combinar las tablas Regalos y Enlaces
        $stmt = $conexion->prepare("SELECT enlaceWeb FROM Enlaces WHERE idRegalo = :idRegalo");

        $stmt->bindParam(':idRegalo', $idRegalo, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\enlace');
        $stmt->execute();

        $enlaces = $stmt->fetchAll();

        $conn->finishConection();

        return $enlaces;
    }
}




?>