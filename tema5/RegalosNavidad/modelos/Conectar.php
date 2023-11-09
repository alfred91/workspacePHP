<?php
namespace RegalosNavidad\modelos;
use PDO;
use PDOException;

class Conectar {

    public static function conexion() {
        $bbdd="Regalos";
        $usuario="root";
        $password="toor";
    
        try {
            $dsn = "mysql:host=172.21.0.2;port=3306;dbname=$bbdd";
            $dbh = new PDO($dsn, $usuario, $password);
            return $dbh;

        } catch (PDOException $e){
            echo "Error ".$e->getMessage();
            die();
        }        
    }
}

?>