<?php
namespace RegalosNavidad\vistas;
use RegalosNavidad\controladores\ControladorEnlace;

class VistaRegalos
{

    public static function render($regalos)
    {
        include ("CabeceraMain.php");
        ?>            

        <div class="container-fluid">
            
            <h1 class="mt-5 text-center">🎁 Lista de Regalos de <?php echo $usuario->getNombre();?> 🎁</h1>
 
        <a href="index.php?accion=insertarRegalo"><button class="btn btn-danger mt-2 mb-3">Añadir regalo</button></a>

                    <a class="btn btn-info" href="#" data-bs-toggle="modal"
                    data-bs-target="#nuevoRegaloModal">Añadir Regalo Modal</a>


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
                    if (isset($regalos)) {
                        foreach ($regalos as $regalo) {
                            ?>
                              <tr>
            <td class="col col-lg-2 text-center"><?= $regalo->getNombre() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getDestinatario() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getPrecio() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getEstado() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getanio() ?></td>
            
            
            <td class="col col-lg-2 text-center">
    <!-- Botón para mostrar detalles de un regalo -->
    <a href="?accion=verEnlaces&id=<?= $regalo->getId() ?>" class="btn btn-info">🔗</a>
</td>

            <td class="col col-lg-2 text-center">
                <!-- Botón para mostrar detalles de un regalo -->
                <a href="?accion=verDetalle&id=<?= $regalo->getId() ?>" class="btn btn-success">🔍</a>
            </td>
            <td class="col col-lg-2 text-center">
                <!-- Delete Button -->
                <a href="index.php?accion=borrarRegalo&id=<?= $regalo->getId() ?>" class="btn btn-danger">🔥</a>
            </td>

    <!-- Modify Button (Open Modal) -->
    <td class="col col-lg-2 text-center">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modificarRegaloModal<?= $regalo->getId() ?>"> ✍️
        </button>
    </td>


   <!-- Nuevo Regalo Modal -->
<div class="modal fade" id="nuevoRegaloModal" tabindex="-1" aria-labelledby="nuevoRegaloModalLabel" aria-hidden="true">
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
                    <input type="number" min="1900" name="anio">
                    <input type="hidden" name="idUsuario" value="<?= $regalo->getIdUsuario() ?>">

                    <br><br>

                    <!-- Add other form fields based on your data model -->

                    <button type="submit" class="btn btn-success" name="accion" value="insertarRegaloForm">Insertar Regalo</button>
                </form>
            </div>
        </div>
    </div>
</div>


   <!-- Modificar Regalo Modal -->
<div class="modal fade" id="modificarRegaloModal<?= $regalo->getId() ?>" tabindex="-1" aria-labelledby="modificarRegaloModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificarRegaloModalLabel">Modificar <?= $regalo->getNombre() ?></h5>
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

                    <button type="submit" class="btn btn-success" name="accion" value="actualizarRegaloForm">Insertar Regalo</button>
                </form>
            </div>
        </div>
    </div>
</div>


            </td>
        </tr>
                            <?php
                        }
                    }
                    ?>
                </>
            </table>
        </div>
      
        <?php
        include"PieMain.php";
    }
}
?>