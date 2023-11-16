<?php
namespace RegalosNavidad\modelos;

class ModeloUsuario
{

    public static function checkLogin($email, $password)
    {

        $conn = new conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE email = ? AND password = ?");
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        $resultado = $stmt->fetch();

        $conn->finishConection();

        return $resultado;
        
    
    }

}

?>