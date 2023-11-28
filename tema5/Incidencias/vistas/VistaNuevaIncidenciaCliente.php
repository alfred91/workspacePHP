<div class="modal fade" id="NuevaIncidencia<?= $cliente->getId(); ?>" tabindex="-1" aria-labelledby="nuevaIncidenciaClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaIncidenciaClientelLabel">Añadir Incidencia
                    <?php echo $cliente->getNombre(); ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?insertarIncidenciaCliente" method="post">
                    <label for="latitud">Latitud:</label>
                    <input type="number" name="latitud" value="1">
                    <br><br>
                    <label for="longitud">Longitud:</label>
                    <input type="number" name="longitud" value="1">
                    <br><br>
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad">
                    <br><br>
                    <label for="direccion">Direccion:</label>
                    <input type="text" name="direccion">
                    <br><br>
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion">
                    <br><br>
                    <label for="solucion">Solucion:</label>
                    <input type="text" name="solucion">
                    <br><br>
                    <label for="estado">Estado: </label>
                    <input type="text" name="estado">
                    <input type="hidden" name="idCliente" id="idCliente" value="<?= $cliente->getId(); ?>">
                    <br><br>
                    <button type="submit" class="btn btn-success" name="accion" value="insertarIncidencia">
                        Insertar Incidencia</button>
                </form>
            </div>
        </div>
    </div>
</div>