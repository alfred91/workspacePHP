<?php
    function login($email,$password){
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
            $_SESSION['usuario'] = $user['nombre'];
            return true;
        } return false;            
    }

    function nuevo($nombre,$fechaInicio,$fechaFinPrevista,$diasTranscurridos,$porcentajeCompletado,$importancia,$idUsuario){
    $conn = conexion();
    //SE INSERTAN LOS CAMPOS EN LA BASE DE DATOS            
    $sql = "INSERT INTO Proyectos (nombre,fechaInicio,fechaFinprevista,diasTranscurridos,porcentajeCompletado,importancia,idUsuario)
    VALUES (:nombre,:fechaInicio,:fechaFinPrevista,:diasTranscurridos,:porcentajeCompletado,:importancia,:idUsuario)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFinPrevista', $fechaFinPrevista);
        $stmt->bindParam(':diasTranscurridos', $diasTranscurridos);
        $stmt->bindParam(':porcentajeCompletado', $porcentajeCompletado);
        $stmt->bindParam(':importancia', $importancia);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
}
function actualizar($proyecto_id, $nombre, $fechaInicio, $fechaFinPrevista, $diasTranscurridos, $porcentajeCompletado, $importancia) {
    $conn = conexion();

    $sql = "UPDATE Proyectos SET nombre=:nombre, fechaInicio=:fechaInicio, fechaFinprevista=:fechaFinPrevista,
            diasTranscurridos=:diasTranscurridos, porcentajeCompletado=:porcentajeCompletado, importancia=:importancia 
            WHERE id=:proyecto_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':fechaInicio', $fechaInicio);
    $stmt->bindParam(':fechaFinPrevista', $fechaFinPrevista);
    $stmt->bindParam(':diasTranscurridos', $diasTranscurridos);
    $stmt->bindParam(':porcentajeCompletado', $porcentajeCompletado);
    $stmt->bindParam(':importancia', $importancia);
    $stmt->bindParam(':proyecto_id', $proyecto_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    }
}

function buscar($nombre){
    // BUSCAR UN PROYECTO POR NOMBRE
    $conn = conexion();
    $sql = "SELECT * FROM Proyectos WHERE idUsuario=:idUsuario AND nombre LIKE :nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
}

function borrar($proyecto_id){

    $sql = "DELETE FROM Proyectos WHERE id=$proyecto_id";
    $conn = conexion();
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()){
        return true;
    }
}
?>