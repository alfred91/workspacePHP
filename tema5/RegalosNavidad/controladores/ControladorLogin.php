<?php namespace RegalosNavidad\controladores;
USE RegalosNavidad\vistas\VistaRegalos;
USE RegalosNavidad\vistas\VistaInicio;
USE PDO;

use RegalosNavidad\vistas\VistaLogin;
use RegalosNavidad\modelos\Conectar;
use RegalosNavidad\modelos\test_conexion;
class ControladorLogin {

    public static function mostrarFormulario() {
        VistaLogin::render();
    }

    public static function iniciarSesion($email, $password) {
        $conn = conexion();
        $sql = "SELECT * FROM Usuarios WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            var_dump($conn);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $user['id'];;
            $_SESSION['usuario'] = $user['nombre'];
            $_SESSION['email'] = $user['email'];

            header("Location: VistaInicio.php");           // Redirigir a la página de inicio de la aplicación después de iniciar sesión
            
            exit();
                    } else {

            // Si las credenciales no son incorrectas, mostrar el formulario de inicio de sesión nuevamente con un mensaje de error
            VistaLogin::render();
            echo '<p class="text-danger mt-3">Credenciales incorrectas. Por favor, inténtelo de nuevo.</p>';
        }
    }
}
?>
