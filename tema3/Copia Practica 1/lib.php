<?php 
    function conexion($bbdd,$usuario,$password){
        try {
            $dsn = "mysql:host=172.17.0.1:3306;dbname=new_schema";
            $dbh = new PDO($dsn, "root", "usuario");
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $dbh;
    }
?>