<?php
namespace RegalosNavidad\modelos;
use RegalosNavidad\modelos\conectar;
use \PDO;

class ModeloUsuario

{

    public static function checkLogin($email, $password) {

        $conn = new conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE email = ? AND password = ?");
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RegalosNavidad\modelos\usuario');
        $stmt->execute();

        $resultado = $stmt->fetch();

        $conn->finishConection();

        return $resultado;
        
    
    }

}

?>