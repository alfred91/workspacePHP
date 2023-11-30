<?php
namespace Padel\modelos;
use Padel\modelos\Conectar;
use \PDO;

class ModeloJugador
{

    public static function checkLogin($email, $password)
    {

        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Jugadores WHERE email = ? AND password = ?");
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Padel\modelos\Jugador');
        $stmt->execute();

        $resultado = $stmt->fetch();

        $conn->finishConection();

        return $resultado;
    }


}
?>