<?php
namespace RegalosNavidad\modelos;

use RegalosNavidad\modelos\Conectar, \PDO;

class ModeloRegalo
{

    public static function mostrarRegalos($idUsuario)
    {

        $conexion = new Conectar();
        $stmt = $conexion->getConexion()->prepare("SELECT * FROM Regalos WHERE idUsuario=?");
        $stmt->bindValue(1, $idUsuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\Regalo');
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        $conexion->finishConection();

        return $resultados;
    }

  // En ModeloRegalo.php
public static function mostrarRegalosOrdenados($idUsuario)
{
    $conexion = new Conectar();
    $stmt = $conexion->getConexion()->prepare("SELECT * FROM Regalos WHERE idUsuario=? ORDER BY anio ASC");
    $stmt->bindValue(1, $idUsuario);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\Regalo');
    $stmt->execute();

    $resultados = $stmt->fetchAll();

    $conexion->finishConection();

    return $resultados;
}
public static function mostrarRegalosOrdenadosDesc($idUsuario)
{
    $conexion = new Conectar();
    $stmt = $conexion->getConexion()->prepare("SELECT * FROM Regalos WHERE idUsuario=? ORDER BY anio DESC");
    $stmt->bindValue(1, $idUsuario);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\Regalo');
    $stmt->execute();

    $resultados = $stmt->fetchAll();

    $conexion->finishConection();

    return $resultados;
}

    
    public static function mostrarTodos()
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Regalos");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\Regalo'); //Nombre de la clase
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        $conn->finishConection();

        return $resultados;
    }

    public static function insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario){
        $conn = new Conectar();

        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("INSERT INTO Regalos (nombre, destinatario, precio, estado, anio, idUsuario) VALUES (?,?,?,?,?,?)");
        $stmt -> bindValue(1,$nombre);
        $stmt -> bindValue(2,$destinatario);
        $stmt -> bindValue(3,$precio);
        $stmt -> bindValue(4,$estado);
        $stmt -> bindValue(5,$anio);
        $stmt -> bindValue(6,$idUsuario);
        $stmt -> execute();

        $conn -> finishConection();

    }
    
    public static function actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $id){

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $stmt = $conexion->prepare("UPDATE Regalos SET nombre = ?, destinatario = ?, precio = ?, estado = ?, anio = ? where id = ? ");
        $stmt -> bindValue(1,$nombre);
        $stmt -> bindValue(2,$destinatario);
        $stmt -> bindValue(3,$precio);
        $stmt -> bindValue(4,$estado);
        $stmt -> bindValue(5,$anio);
        $stmt -> bindValue(6,$id);
        $stmt -> execute();

        $conexionObject -> finishConection();

    }
    public static function borrarRegalo($id){

        $conexion=new Conectar();
        $stmt=$conexion->getConexion()->prepare("DELETE FROM Regalos WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $conexion->finishConection();
   
    }
    
    public static function detalleRegalo($id){

        $conexion=new Conectar();
        $stmt=$conexion->getConexion()->prepare("SELECT * FROM Regalos WHERE id=?");
        $stmt->bindValue(1,$id);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\Regalo');

        $stmt->execute();

        $regalo=$stmt->fetch();

        $conexion->finishConection();

        return $regalo;
    }
      
}

?>