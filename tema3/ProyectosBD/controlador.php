<?php session_start();
include 'db.php';
// SI SE AUTENTICA CON UNA CONTRASEÑA DE MAS DE 8 CARACTERES Y CON 1 MAYUS

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {

        $email=$_POST['email'];
        $password=$_POST['password'];

    if(strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
        header("Location: login.php?error=CONTRASENA_INVALIDA");
        die();
    }

// COMPROBAR DATOS DE USUARIO EN LA BASE DE DATOS
    $conn = conexion();
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
        die();
    } else {
        header("Location: login.php?error=USUARIO_INVALIDO");
    }die();

//SI PINCHAMOS EN NUEVO
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'nuevo') {

//RELLENAMOS EL FORM O EL MODAL, Y AQUI SE OBTIENEN LOS DATOS
            $nombre = $_POST['nombre'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinPrevista = $_POST['fechaFinPrevista'];
            $diasTranscurridos = $_POST['diasTranscurridos'];
            $porcentajeCompletado = $_POST['porcentajeCompletado'];
            $importancia = $_POST['importancia'];
 
//SE INSERTAN LOS CAMPOS EN LA BASE DE DATOS            
    $sql = "INSERT INTO proyectos (nombre,fechaInicio,fechaFinprevista,diasTranscurridos,porcentajeCompletado,importancia)
        VALUES (:nombre,:fechaInicio,:fechaFinPrevista,:diasTranscurridos,:porcentajeCompletado,:importancia)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':fechaInicio', $fechaInicio);
    $stmt->bindParam(':fechaFinPrevista', $fechaFinPrevista);
    $stmt->bindParam(':diasTranscurridos', $diasTranscurridos);
    $stmt->bindParam(':porcentajeCompletado', $porcentajeCompletado);
    $stmt->bindParam(':importancia', $importancia);

    
    if ($stmt->execute()) {

        header("Location: index.php");
            die();

        } else { echo "Error al insertar proyecto: " . $stmt->errorInfo()[2];}
            die();
                  


// SI CERRAMOS SESION, SE DESRTRUYE                    
        } elseif ($_GET['accion'] == 'cerrarSesion') {
            // Destruir la sesión
            session_destroy();

//VOLVERIAMOS A PROYECTOS SIN EL ARRAY DE LA SESION        
            header("Location: proyectos.php");
            die();
            
        } elseif ($_GET['accion'] == 'eliminar' && isset($_GET['id'])) {
// ELIMINAR UN PROYECTO 
    $proyecto_id = $_GET['id'];

// SE BUSCA POR ID Y SE ELIMINA
$sql = "DELETE FROM proyectos WHERE id=$proyecto_id";

            if ($con->query($sql)==TRUE) {
                header("Location: proyectos.php");
                die();
                } else {
                echo "Error: ". $sql. "<br>". $conn->error;
                }
            }

// SI ALGUIEN INTENTA ACCEDER A CONTROLADOR.PHP SIN ENVIAR DATOS O SIN UNA ACCION VALIDA NOS RERIDIGE A LOGIN
    header("Location: login.php");
    exit();?>