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

    public static function mostrarJugadores()
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Jugadores");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $jugadores = $stmt->fetchAll();

        $listaJugadores = [];

        foreach ($jugadores as $jugador) {
            $objJugador = new Jugador();
            $objJugador->setId($jugador['id']);
            $objJugador->setEmail($jugador['email']);
            $objJugador->setPassword($jugador['password']);
            $objJugador->setNombre($jugador['nombre']);
            $objJugador->setApodo($jugador['apodo']);
            $objJugador->setNivel($jugador['nivel']);
            $objJugador->setEdad($jugador['edad']);

            array_push($listaJugadores, $objJugador);
        }

        $conn->finishConection();

        return $listaJugadores;
    }

}
?>