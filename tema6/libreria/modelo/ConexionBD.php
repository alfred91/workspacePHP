<?php

use MongoDB\Client;
require 'vendor/autoload.php';

class ConexionBD {

    private static $conexion;

    //Poned IP de vuestro MongoDB
    public static function conectar($database,$host="mongodb://localhost:27017",$user="root",$password="***REMOVED***") {
        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            //$host = "mongodb+srv://admin:<password>@cluster0.qmwhh.mongodb.net/".$database."?retryWrites=true&w=majority";
            $host = "mongodb://root:" . getenv('MONGO_PASSWORD') . "@172.18.0.2:27017/"; //MongoDB en Docker
            self::$conexion = (new Client($host))->{$database};
        } catch (Exception $e){
            echo $e->getMessage();
        }

        return self::$conexion;
    }

    public static function cerrar() {
        self::$conexion = null;
    }

}













?>