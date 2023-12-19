<?php
namespace RegalosNavidad\modelos;

require_once 'Conectar.php';

use \PDO;

$conexion = new Conectar();

try {
    $pdo = $conexion->getConexion();
    $query = $pdo->query("SELECT * FROM Usuarios");
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    print_r($resultado);

} catch (\PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>