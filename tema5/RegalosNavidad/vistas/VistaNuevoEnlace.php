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
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="" required>
                    <br><br>
                    <label for="enlaceWeb">Enlace Web:</label>
                    <input type="url" name="enlaceWeb" value="" required>
                    <br><br>
                    <label for="precio">Precio:</label>
                    <input type="number" step=".01" min="1" max="4999" name="precio" value="" required>
                    <br><br>
                    <label for="imagen">Imagen:</label>
                    <p></p>
                    <input type="file" name="imagen">
                    <br><br>

                    <label for="prioridad">Prioridad:</label>
                    <select name="prioridad" required>
                        <option value="0">Baja</option>
                        <option value="1">Media</option>
                        <option value="2">Alta</option>
                    </select>
                    <input type="hidden" name="idRegalo" value="<?php echo $_GET['id']; ?>">

                    <button type="submit" class="btn btn-success float-end" name="accion"
                        value="actualizarEnlaceModal">Insertar Enlace</button>

                </form>
            </div>
        </div>
    </div>
</div>