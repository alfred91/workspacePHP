<div class="modal fade" id="modificarIncidencia<?= $incidencia->getId() ?>" tabindex="-1"
    aria-labelledby="modificarIncidenciaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificarIncidenciaLabel">Modificar
                    <?= $incidencia->getId() ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?modificarIncidencia=<?= $incidencia->getId() ?>" method="post">
                    <input type="hidden" name="id" value="<?= $incidencia->getId() ?>">
                    <label for="solucion">Solucion:</label>
                    <input type="text" name="solucion" value="<?= $incidencia->getSolucion() ?>">
                    <br><br>

                    <select name="estado" id="estado" value="<?= $incidencia->getEstado() ?>">
                        <option value="<?= $incidencia->getEstado() ?>">
                            <?= $incidencia->getEstado() ?>
                        </option>
                        <option value="Cerrada ">Cerrada</option>
                        <option value="reparado">Reparado</option>
                        <option value="Abierta">Abierta</option>
                    </select>
                    <br><br>
                    <button type="submit" class="btn btn-success" name="accion"
                        value="modificarIncidencia">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>