<?php session_start();
include 'db.php';
// SI SE AUTENTICA CON UNA CONTRASEÑA DE MAS DE 8 CARACTERES Y CON 1 MAYUS

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Contraseña sin hashear

    // COMPROBAR DATOS DE USUARIO EN LA BASE DE DATOS
    $conn = conexion();
    $sql = "SELECT * FROM Usuarios WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['idUsuario'] = $user['id'];
        $_SESSION['usuario'] = $user['nombre']; //
        header("Location: index.php");
        die();
    } else {
        header("Location: login.php?error=USUARIO_INVALIDO,REVISA_TUS_DATOS");
        die();
    }

}

//SI PINCHAMOS EN NUEVO
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'nuevo') {

//RELLENAMOS EL FORM O EL MODAL, Y AQUI SE OBTIENEN LOS DATOS
            $nombre = $_POST['nombre'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinPrevista = $_POST['fechaFinPrevista'];
            $diasTranscurridos = $_POST['diasTranscurridos'];
            $porcentajeCompletado = $_POST['porcentajeCompletado'];
            $importancia = $_POST['importancia'];
            $idUsuario = $_SESSION['idUsuario'];
            
 
//SE INSERTAN LOS CAMPOS EN LA BASE DE DATOS            
    $sql = "INSERT INTO Proyectos (nombre,fechaInicio,fechaFinprevista,diasTranscurridos,porcentajeCompletado,importancia,idUsuario)
        VALUES (:nombre,:fechaInicio,:fechaFinPrevista,:diasTranscurridos,:porcentajeCompletado,:importancia,:idUsuario)";

        $conn = conexion();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFinPrevista', $fechaFinPrevista);
        $stmt->bindParam(':diasTranscurridos', $diasTranscurridos);
        $stmt->bindParam(':porcentajeCompletado', $porcentajeCompletado);
        $stmt->bindParam(':importancia', $importancia);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    
         if ($stmt->execute()) {

        header("Location: index.php");
            die();

        } else { echo "Error al insertar proyecto: " . $stmt->errorInfo()[2];}
            
            die();
    //SI PINCHAMOS EN ACTUALIZAR                                 
        } elseif ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['accion']) && $_POST['accion']=='actualizar') {
      
            $conn = conexion();
                $proyecto_id = $_POST['proyecto_id'];
                $nombre = $_POST['nombre'];
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFinPrevista = $_POST['fechaFinPrevista'];
                $diasTranscurridos = $_POST['diasTranscurridos'];
                $porcentajeCompletado = $_POST['porcentajeCompletado'];
                $importancia = $_POST['importancia'];

            $sql = "UPDATE Proyectos SET nombre=:nombre, fechaInicio=:fechaInicio, fechaFinPrevista=:fechaFinPrevista,
            diasTranscurridos=:diasTranscurridos, porcentajeCompletado=:porcentajeCompletado, importancia=:importancia 
            WHERE id=:proyecto_id AND idUsuario=:idUsuario";

            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':fechaInicio', $fechaInicio);
            $stmt->bindParam(':fechaFinPrevista', $fechaFinPrevista);
            $stmt->bindParam(':diasTranscurridos', $diasTranscurridos);
            $stmt->bindParam(':porcentajeCompletado', $porcentajeCompletado);
            $stmt->bindParam(':importancia', $importancia);
            $stmt->bindParam(':proyecto_id', $proyecto_id, PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: index.php");
                die();
            } else { echo "Error al actualizar proyecto: ". $stmt->errorInfo()[2];}
            
          die();

// SI CERRAMOS SESION, SE DESRTRUYE 
        }elseif ($_GET['accion'] == 'cerrarSesion') {
            // Destruir la sesión
            session_destroy();

//VOLVERIAMOS A PROYECTOS SIN EL ARRAY DE LA SESION        
            header("Location: index.php");
            die();
            
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'buscar' && isset($_GET['nombre'])) {
            $nombre = $_GET['nombre'];
// BUSCAR UN PROYECTO 

// SE BUSCA POR NOMBRE
        $sql = "SELECT * FROM Proyectos WHERE nombre LIKE :nombre";
        $conn = conexion();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->execute()) {
            header("Location: verProyecto.php");
            die();
        } else { echo "Error al buscar proyecto: ". $stmt->errorInfo()[2];}
        die();

        }elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'borrar' && isset($_GET['id'])) {
            $proyecto_id = $_GET['id'];
// ELIMINAR UN PROYECTO 

// SE BUSCA POR ID Y SE ELIMINA
        $sql = "DELETE FROM Proyectos WHERE id=$proyecto_id";
        $conn = conexion();
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            header("Location: index.php");
            die();
        } else { echo "Error al borrar proyecto: ". $stmt->errorInfo()[2];}
        die();

        } else {
// SI ALGUIEN INTENTA ACCEDER A CONTROLADOR.PHP SIN ENVIAR DATOS O SIN UNA ACCION VALIDA NOS RERIDIGE A LOGIN
    header("Location: login.php");
    exit(); }
?>