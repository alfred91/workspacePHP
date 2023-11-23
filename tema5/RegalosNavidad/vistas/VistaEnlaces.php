<?php namespace RegalosNavidad\vistas;

use RegalosNavidad\controladores\ControladorEnlace;

class VistaEnlaces
{

    public static function render($enlaces){
        include "CabeceraMain.php";
        ?>            
<h1 class="mt-5 text-center">Lista de Enlaces 
<a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarRegalos">🎁  👈🏽
            </a></h1>
            <div class="text-center mt-3">
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevoEnlaceModal">Añadir Enlace</a>

                <a class="btn btn-secondary" href="?accion=mostrarEnlacesOrdenadosPrecioAsc&idRegalo=<?= $enlaces[0]->getIdRegalo() ?>"> 🢁 Por Precio</a>
                <a class="btn btn-secondary" href="?accion=mostrarEnlacesOrdenadosPrecioDesc&idRegalo=<?= $enlaces[0]->getIdRegalo() ?>"> 🢃 Por Precio</a>
                
                <a class="btn btn-secondary" href="?accion=mostrarEnlacesOrdenadosPrecioAsc&idRegalo=<?= isset($_REQUEST['idRegalo']) ? $_REQUEST['idRegalo'] : '' ?>"> 🢁 Por Precio</a>
<a class="btn btn-secondary" href="?accion=mostrarEnlacesOrdenadosPrecioDesc&idRegalo=<?= isset($_REQUEST['idRegalo']) ? $_REQUEST['idRegalo'] : '' ?>"> 🢃 Por Precio</a>



</div>

</div>


<?php
        if (isset($enlaces) && !empty($enlaces)) {
            ?>

</h1>
        <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Enlace Web</th>
                        <th class="col col-lg-2 text-center">Precio</th>
                        <th class="col col-lg-2 text-center">Imagen</th>
                        <th class="col col-lg-2 text-center">Prioridad</th>
                        <th class="col col-lg-2 text-center">idRegalo</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        <th class="col col-lg-2 text-center">Modificar</th>

                    </tr>
                </thead>
                
                    <?php
                   if (array($enlaces)) {
                        foreach ($enlaces as $enlace) {
                            ?>
                              <tr>
            <td class="col col-lg-2 text-center"><?= $enlace->getId() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getNombre() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getEnlaceWeb() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getPrecio() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getImagen() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getPrioridad() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getIdRegalo()?></td>

            <td class="col col-lg-2 text-center">

<!-- BOTON DE BORRAR ENLACE -->
                <a href="index.php?accion=borrarEnlace&id=<?= $enlace->getId() ?>" class="btn btn-danger">🔥</a>
            </td>

<!-- BOTON DE MODIFICAR ENLACE -->
<td class="col col-lg-2 text-center">
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#actualizarEnlaceModal<?= $enlace->getId() ?>">🎁</button>
</td>
 <!-- Modificar Enlace Modal -->
 <div class="modal fade" id="actualizarEnlaceModal<?= $enlace->getId() ?>" tabindex="-1"
    aria-labelledby="actualizarEnlaceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actualizarEnlaceModalLabel">Modificar Enlace <?= $enlace->getNombre() ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modify Form (Update Form) -->

                <form action="?modificarEnlace=<?= $enlace->getNombre() ?>" method="post">
                    <!-- Your form fields go here, pre-filled with existing data -->
                    <input type="hidden" name="id" value="<?= $enlace->getId()?>">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= $enlace->getNombre() ?>" required>
                    <br><br>
                    <label for="enlaceWeb">Enlace Web:</label>
                    <input type="text" name="enlaceWeb" value="<?= $enlace->getEnlaceWeb() ?>">
                    <br><br>
                    <label for="precio">precio:</label>
                    <input type="number" step=".01" min="0.01" max="9999" name="precio" value="<?= $enlace->getPrecio() ?>">
                    <br><br>
                    <label for="imagen">Imagen:</label>
                    <input type="text" name="imagen" value="<?= $enlace->getImagen() ?>">
                    <br><br>
                    <label for="prioridad">Prioridad:</label>
                    <input type="number" min="1" name="prioridad" value="<?= $enlace->getPrioridad() ?>">

                    <input type="hidden" name="idRegalo" value="<?= $enlace->getIdRegalo() ?>">

                    <button type="submit" class="btn btn-success" name="accion" value="actualizarEnlaceModal">Insertar Enlace</button>
                </form>
            </div>
        </div>
    </div>
</div>

                              </tr>
        

                            <?php
                        }
                    
                    ?>
            </table>
        </div>
      
        <?php

        }} else {

            echo '<h2 class="text-center">No hay enlaces para este regalo.</h2>';
        }
        ?>

        

<!-- Nuevo Enlace Modal -->
<div class="modal fade" id="nuevoEnlaceModal" tabindex="-1" aria-labelledby="nuevoEnlaceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoEnlaceModalLabel">Añadir Enlace</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Inserción -->
                <form action="?insertarEnlaceModal" method="post" enctype="multipart/form-data">
                    <!-- Campos del formulario (nombre, enlaceWeb, precio, imagen, prioridad) -->
                    <input type="hidden" name="id" value="<?= $enlace->getId() ?>">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= $enlace->getNombre() ?>" required>
                    <br><br>
                    <label for="enlaceWeb">Enlace Web:</label>
                    <input type="text" name="enlaceWeb" value="<?= $enlace->getEnlaceWeb() ?>" required>
                    <br><br>
                    <label for="precio">Precio:</label>
                    <input type="number" step=".01" min="0.01" max="9999" name="precio" value="<?= $enlace->getPrecio() ?>" required>
                    <br><br>
                    <label for="imagen">Imagen:</label>
                    <input type="blob" name="imagen">
                    <br><br>
                    <label for="prioridad">Prioridad:</label>
                    <select name="prioridad" required>
                        <option value="0">Baja</option>
                        <option value="1">Media</option>
                        <option value="2">Alta</option>
                    </select>
                    <br><br>
                    <label for="idRegalo">ID del Regalo:</label>
                    <input type="number" min="1" name="idRegalo" value="<?= $enlace->getIdRegalo() ?>" required>
                    <!-- Add other form fields based on your data model -->

                    <button type="submit" class="btn btn-success" name="accion" value="insertarEnlaceModal">Insertar Enlace</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                            <?php
    include "PieMain.php";
    }
}
?>