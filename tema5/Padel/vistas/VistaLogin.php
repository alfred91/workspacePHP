<?php
namespace Padel\vistas;

class VistaLogin
{

    public static function render()
    {
        include("CabeceraFormUsuarios.php"); ?>

        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">🌲 Inicio de Sesión 🌲</h2>
                            <form action="index.php" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <input type="hidden" name="idUsuario"
                                    value="<?php echo isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : ''; ?>">
                                <button type="submit" name="accion" value="enviarForm" class="btn btn-primary btn-block">Iniciar
                                    Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} ?>