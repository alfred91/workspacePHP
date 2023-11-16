<?php
namespace RegalosNavidad\modelos;

use RegalosNavidad\modelos\conectar, \PDO;

class ModeloRegalo
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
        $anio,
        $idUsuario) {

        $conexion = new conectar();
        $consulta = $conexion->getConexion()->prepare("INSERT INTO Regalos (nombre, destinatario, precio, estado, anio, idUsuario)
                                                    VALUES (:nombre, :destinatario, :precio, :estado, :anio, :idUsuario)");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':destinatario', $destinatario);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':estado', $estado);
        $consulta->bindParam(':anio', $anio);
        $consulta->bindParam(':idUsuario', $idUsuario);


        $consulta->execute();
     
        $conexion->finishConection();
        return $consulta;
    }

    public function borrarRegalo($id){
        $conexion=new conectar();
        $consulta=$conexion->getConexion()->prepare("DELETE FROM regalos WHERE id=:id");
        $consulta->bindparam(':id',$id);
        $consulta->execute();

        $conexion->finishConection();
        return $consulta;
    }
    
    public static function actualizarRegalo($id, $nombre, $destinatario, $precio, $estado, $anio, $idUsuario) {
    
        $conexion = new conectar();
        $consulta = $conexion->getConexion()->prepare("UPDATE Regalos 
            SET nombre=:nombre, destinatario=:destinatario, precio=:precio, estado=:estado, anio=:anio, idUsuario=:idUsuario
            WHERE id=:id");
    
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":nombre", $nombre);
        $consulta->bindParam(":destinatario", $destinatario);
        $consulta->bindParam(":precio", $precio);
        $consulta->bindParam(":estado", $estado);
        $consulta->bindParam(":anio", $anio);
        $consulta->bindParam(":idUsuario", $idUsuario);
    
        $consulta->execute();
        $conexion->finishConection();
    
        return $consulta;
    }
    
    
    public function detalleRegalo($id){
        $conexion=new conectar();
        $consulta=$conexion->getConexion()->prepare("SELECT * FROM regalos WHERE id=:id");
        $consulta->bindParam(":id",$id);

        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\regalo');
        $consulta->execute();
        $consulta->fetchAll();

        $conexion->finishConection();
        return $consulta;
    }
      
}

?>