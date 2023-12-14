
<?php

namespace Examen\modelos;

use Examen\modelos\Conectar;
use \PDO;
use \PDOException;

class ModeloParticipante
{

    public static function mostrarPar()
    {

        $conexionObject = new Conectar();
        $conexion = $conexionObject->getConexion();

        $consulta = $conexion->prepare("SELECT * FROM Participantes");
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Examen\modelos\Participantes');
        $consulta->execute();

        $participantes = $consulta->fetchAll();

        $conexionObject->finishConection();

        return $participantes;
    }

    public static function mostrarParticipantes()
    {
        $conn = new Conectar();
        $conexion = $conn->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM Participantes");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $listaParticipantes = $stmt->fetchAll();

        $participantes = [];

        foreach ($participantes as $participante) {
            $objParticipante = new Participante();
            $objParticipante->setId($participante['id']);
            $objParticipante->setEmail($participante['email']);
            $objParticipante->setNombre($participante['nombre']);
            $objParticipante->setTelefono($participante['telefono']);

            array_push($listaParticipantes, $objParticipante);
        }

        $conn->finishConection();

        return $listaParticipantes;
    }
}
