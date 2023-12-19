<?php namespace RegalosNavidad\controladores;

use RegalosNavidad\modelos\ModeloRegalo;
use RegalosNavidad\vistas\VistaDetalle;
use RegalosNavidad\vistas\VistaInicio;
use RegalosNavidad\vistas\VistaInsertarRegalo;
use RegalosNavidad\vistas\VistaRegalos;

class ControladorRegalo
{

    public static function mostrarInicio()
    {

        VistaInicio::render();
    }

   public static function mostrarRegalos(){

    $usuario = unserialize($_SESSION['usuario']);

    $regalos = ModeloRegalo::mostrarRegalos($usuario -> getId());

    VistaRegalos::render($regalos);
}

public static function detalleRegalo($id){
 
    $regalo=ModeloRegalo::detalleRegalo($id);

    VistaDetalle::render($regalo);
}

public static function verInsertarRegalo(){

    VistaInsertarRegalo::render();
}

public static function insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario){

    $regalos = ModeloRegalo::insertarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);

    $user = unserialize($_SESSION['usuario']);

    $regalos = ModeloRegalo::mostrarRegalos($user -> getId());

    VistaRegalos::render($regalos);
    
}
public static function actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario) {

    $regalos = ModeloRegalo::actualizarRegalo($nombre, $destinatario, $precio, $estado, $anio, $idUsuario);

    return $regalos;    
}


public static function borrarRegalo($id){

    ModeloRegalo::borrarRegalo($id);

    $user = unserialize($_SESSION['usuario']);

    $regalos = ModeloRegalo::mostrarRegalos($user -> getId());

    // RENDERIZAMOS LA VISTA DE RESULTADOS
    VistaRegalos::render($regalos);
    die();
}


}

?>