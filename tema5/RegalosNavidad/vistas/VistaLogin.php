<?php namespace RegalosNavidad\vistas;

class VistaLogin {

    public static function render() {
        include("cabecera.php");?>

        <div class="container">
            <h2 class="text-center mt-5">Inicio de Sesión</h2>
            <form action="index.php?controller=ControladorLogin&action=iniciarSesion" method="post" class="mt-4">                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>

        <?php
    }
}
?>
