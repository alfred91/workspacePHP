<?php
namespace RegalosNavidad\vistas;

use RegalosNavidad\controladores\ControladorEnlace;

class VistaRegalos
{

    public static function render($regalos)
    {
        include("CabeceraMain.php");
        ?>

        <div class="container-fluid">

            <h1 class="mt-5 text-center">🎁 Lista de Regalos de <?php echo $usuario->getNombre(); ?> 🎁
            </h1>

            <?php
            if (empty($regalos)) {
                ?>

                <h3 class='text-center'> <?php echo $usuario->getNombre(); ?>  no tiene regalos, puedes crear uno aquí </h3>
                <!-- Button to trigger Nuevo Regalo Modal -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoRegaloModal">Añadir Regalo</button>

            <?php } else {
                ?>

                <table class="table table-striped table-bordered mt-4">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th class="col col-lg-2 text-center">Nombre</th>
                            <th class="col col-lg-2 text-center">Destinatario</th>
                            <th class="col col-lg-2 text-center">Precio</th>
                            <th class="col col-lg-2 text-center">Estado</th>
                            <th class="col col-lg-2 text-center">Año</th>
                            <th class="col col-lg-2 text-center">Enlaces</th>
                            <th class="col col-lg-2 text-center">Detalle</th>
                            <th class="col col-lg-2 text-center">Eliminar</th>
                            <th class="col col-lg-2 text-center">Modificar</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($regalos as $regalo) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getDestinatario() ?>
                            </td>
                            <!-- ... (existing table data) ... -->
                        </tr>

                        <!-- Modificar Regalo Modal -->
                        <div class="modal fade" id="modificarRegaloModal<?= $regalo->getId() ?>" tabindex="-1"
                            aria-labelledby="modificarRegaloModalLabel" aria-hidden="true">
                            <!-- ... (existing modal content) ... -->

                            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modificarRegaloModalLabel">Modificar
                                                <?= $regalo->getNombre() ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Modify Form (Update Form) -->
                                            <form action="?modificarRegalo=<?= $regalo->getId() ?>" method="post">
                                                <!-- Your form fields go here, pre-filled with existing data -->
                                                <label for="nombre">ID:</label>
                                                <input type="text" name="id" value="<?= $regalo->getId() ?>" required>
                                                <br><br>
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" name="nombre" value="<?= $regalo->getNombre() ?>" required>
                                                <br><br>
                                                <label for="destinatario">Destinatario:</label>
                                                <input type="text" name="destinatario" value="<?= $regalo->getDestinatario() ?>">
                                                <br><br>
                                                <label for="precio">Precio:</label>
                                                <input type="number" min="1" name="precio" value="<?= $regalo->getPrecio() ?>">
                                                <br><br>
                                                <label for="estado">Estado:</label>
                                                <input type="text" name="estado" value="<?= $regalo->getEstado() ?>">
                                                <br><br>
                                                <label for="anio">Año:</label>
                                                <input type="number" min="1900" name="anio" value="<?= $regalo->getanio() ?>">

                                                <input type="hidden" name="idUsuario" value="<?= $regalo->getIdUsuario() ?>">
                                                <br><br>

                                                <!-- Add other form fields based on your data model -->

                                                <button type="submit" class="btn btn-success" name="accion"
                                                    value="actualizarRegaloModal">Insertar Regalo</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <?php
                    }
                    ?>
                </table>
            <?php } ?>

            <!-- Nuevo Regalo Modal -->
            <div class="modal fade" id="nuevoRegaloModal" tabindex="-1" aria-labelledby="nuevoRegaloModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="nuevoRegaloModalLabel">Añadir Regalo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario de Inserción -->
                            <form action="?insertarRegalo" method="post">
                                <!-- Campos del formulario (nombre, destinatario, precio, etc.) -->
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" required>
                                <br><br>
                                <label for="destinatario">Destinatario:</label>
                                <input type="text" name="destinatario">
                                <br><br>
                                <label for="precio">Precio:</label>
                                <input type="number" min="1" name="precio">
                                <br><br>
                                <label for="estado">Estado:</label>
                                <input type="text" name="estado">
                                <br><br>
                                <label for="anio">Año:</label>
                                <input type="number" min="2000" name="anio">
                                <input type="hidden" name="idUsuario" value="<?= $regalo->getIdUsuario() ?>">

                                <br><br>

                                <!-- Add other form fields based on your data model -->

                                <button type="submit" class="btn btn-success" name="accion"
                                    value="insertarRegaloModal">Insertar Regalo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        include "PieMain.php";
    }
}
?>
