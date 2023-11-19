<?php
namespace RegalosNavidad\modelos;

use RegalosNavidad\modelos\Conectar;
use \PDO;

class ModeloEnlace
{
    public static function mostrarEnlaces($idRegalo)
    {
        $conexion = new Conectar();
        $stmt=$conexion->getConexion()->prepare("SELECT * FROM Enlaces WHERE idRegalo = ?");
        $stmt -> bindValue(1,$idRegalo);
        echo "SQL: " . $stmt->queryString . PHP_EOL;
        echo "Bound Parameter: " . $idRegalo . PHP_EOL;
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\Enlace');
        
        $stmt->execute();

        $enlaces = $stmt->fetchAll();

        $conexion->finishConection();

        return $enlaces;
    }

    public static function insertarEnlace($nombre, $enlaceWeb, $precio, $imagen, $prioridad, $idRegalo){
        $conn = new Conectar();

        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("INSERT INTO Regalos (nombre, destinatario, precio, estado, anio, idUsuario) VALUES (?,?,?,?,?,?)");
        $stmt -> bindValue(1,$nombre);
        $stmt -> bindValue(2,$enlaceWeb);
        $stmt -> bindValue(3,$precio);
        $stmt -> bindValue(4,$imagen);
        $stmt -> bindValue(5,$prioridad);
        $stmt -> bindValue(6,$idRegalo);
        $stmt -> execute();

        $conn -> finishConection();

    }

    public static function borrarEnlaces($id){
        
        $conexion=new Conectar();

        $stmt=$conexion->getConexion()->prepare("DELETE FROM Enlaces WHERE id=?");

        $stmt->bindParam(1, $id);


        $stmt->execute();     

        $conexion->finishConection();        

    }
}
?>