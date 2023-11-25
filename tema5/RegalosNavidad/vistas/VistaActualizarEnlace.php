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
                <!-- Modify Form (Update Form) -->

                <form action="?modificarEnlace=<?= $enlace->getNombre() ?>" method="post">

                    <input type="hidden" name="id" value="<?= $enlace->getId() ?>">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= $enlace->getNombre() ?>" required>
                    <br><br>
                    <label for="enlaceWeb">Enlace Web:</label>
                    <input type="text" name="enlaceWeb" value="<?= $enlace->getEnlaceWeb() ?>">
                    <br><br>
                    <label for="precio">precio:</label>
                    <input type="number" step=".01" min="0.01" max="9999" name="precio"
                        value="<?= $enlace->getPrecio() ?>">
                    <br><br>
                    <label for="imagen">Imagen:</label>
                    <input type="text" name="imagen" value="<?= $enlace->getImagen() ?>">
                    <br><br>

                    <label for="prioridad">Prioridad:</label>
                    <select name="prioridad" required>
                        <option value="0" <?= $enlace->getPrioridad() == 0 ? 'selected' : '' ?>>Baja</option>
                        <option value="1" <?= $enlace->getPrioridad() == 1 ? 'selected' : '' ?>>Media</option>
                        <option value="2" <?= $enlace->getPrioridad() == 2 ? 'selected' : '' ?>>Alta</option>
                    </select><p></p>
                    
                    <input type="hidden" name="idRegalo" value="<?= $enlace->getIdRegalo() ?>">

                    <button type="submit" class="btn btn-success" name="accion" value="actualizarEnlaceModal">Insertar
                        Enlace</button>
                </form>
            </div>
        </div>
    </div>
</div>