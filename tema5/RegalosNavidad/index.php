<?php namespace RegalosNavidad;
    session_start();
    use RegalosNavidad\controladores\ControladorRegalos;
    use RegalosNavidad\controladores\ControladorLogin;

    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php"; 
    });
    //Fin Autcargar ----------------------------------


    if (isset($_REQUEST)) {
        //Tratamiento de botones, forms, ...
        if (isset($_REQUEST["accion"])) {
            ControladorLogin::mostrarFormulario();

        } else {
            //Mostrar inicio
            ControladorRegalos::mostrarInicio();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            ControladorLogin::iniciarSesion($email, $password);
        }
    }
     
    

?>