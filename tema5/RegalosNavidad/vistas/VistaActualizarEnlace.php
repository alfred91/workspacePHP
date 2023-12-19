<div class="modal fade" id="actualizarEnlaceModal<?= $enlace->getId() ?>" tabindex="-1"
    aria-labelledby="actualizarEnlaceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actualizarEnlaceModalLabel">Modificar Enlace
                    <?= $enlace->getNombre() ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?accion=actualizarEnlaceModal&id=<?= $enlace->getId() ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $enlace->getId() ?>">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= $enlace->getNombre() ?>" required>
                    <br><br>
                    <label for="enlaceWeb">Enlace Web:</label>
                    <input type="text" name="enlaceWeb" value="<?= $enlace->getEnlaceWeb() ?>">
                    <br><br>
                    <label for="precio">Precio:</label>
                    <input type="number" step=".01" min="0.01" max="9999" name="precio"
                        value="<?= $enlace->getPrecio() ?>">
                    <p></p>
                    <label for="imagen">Imagen:</label>
                    <p></p>
                    <input type="file" name="imagen">
                    <input type="hidden" name="imagen" value="<?= base64_encode($enlace->getImagen()) ?>">
                    <br><br>

                    <label for="prioridad">Prioridad: </label>
                    <select name="prioridad" required>
                        <option value="0" <?= $enlace->getPrioridad() == 0 ? 'selected' : '' ?>>Baja</option>
                        <option value="1" <?= $enlace->getPrioridad() == 1 ? 'selected' : '' ?>>Media</option>
                        <option value="2" <?= $enlace->getPrioridad() == 2 ? 'selected' : '' ?>>Alta</option>
                    </select>

                    <button type="submit" class="btn btn-success float-end" name="accion" value="actualizarEnlaceModal">
                        Actualizar Enlace
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>