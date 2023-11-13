<?php
namespace RegalosNavidad\modelos;

class UsuarioModelo
{

    public static function iniciarSesion($email, $password)
    {

        $conn = new conectar();
        $conexion = $conn->getConexion();
        $stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $usuario = $stmt->fetch();


        if ($usuario && strcmp($usuario['password'], $password) == 0) {
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['password'] = $usuario['password'];
            $conn->finishConection();

            return true;
        } else {

            $conn->finishConection();
            return false;
        }
    }
    public static function cerrarSesion()
    {

        session_destroy();
    }

}

?>