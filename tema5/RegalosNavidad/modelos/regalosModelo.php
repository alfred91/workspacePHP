<?php namespace RegalosNavidad\modelos;
USE RegalosNavidad\modelos\Conectar;
USE PDO;

class RegalosModelo {

    private $db;
    private $regalos;

    public function __construct(){

        $this->db=Conectar::conexion();

        $this->regalos=array();


    }

    public function getRegalos(){

        $consulta=$this->db->query("SELECT * FROM Regalos");

        while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

            $this->regalos[]=$filas;

            }

        return $this->regalos;

    

    }


}

?>