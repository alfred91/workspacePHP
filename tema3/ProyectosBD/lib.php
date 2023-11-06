<?php function login($email,$password){
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

    } else {
        return false;
        }
}

function nuevo($nombre,$fechaInicio,$fechaFinPrevista,$diasTranscurridos,$porcentajeCompletado,$importancia,$idUsuario){

}
?>