<?php
function conexion(){

    $bbdd="miBD";
    $usuario="root";
    $password="usuario";

        try {
            $dsn = "mysql:host=172.17.0.1:3306;dbname=$bbdd";
            $dbh = new PDO($dsn, $usuario, $password);
            return $dbh;

        } catch (PDOException $e){
            echo "Error ".$e->getMessage();
            die();
        }        
    }?>