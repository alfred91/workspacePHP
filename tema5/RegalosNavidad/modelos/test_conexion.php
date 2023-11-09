<?php
namespace RegalosNavidad\modelos;

require_once 'Conectar.php';

use PDO;


$conexion = Conectar::conexion();

try {
    $query = $conexion->query("SELECT * FROM Regalos");
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r($resultado);

} catch (\PDOException $e) {

    echo "Error en la consulta: " . $e->getMessage();
}
?>