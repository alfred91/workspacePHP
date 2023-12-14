<div class="modal fade" id="modificarAmigoModal<?= $amigo->getId() ?>" tabindex="-1"
                        aria-labelledby="modificarPartidaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificarPartidaModalLabel">Modificar
                                        <?= $amigo->getNombre() ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="?modificarPartida=<?= $amigo->getId() ?>" method="post">
                                        <label for="nombre">ID:</label>
                                        <input type="text" name="id" value="<?= $amigo->getId() ?>" required>
                                        <br><br>
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" value="<?= $amigo->getNombre() ?>" required>
                                        <br><br>
                                        <label for="destinatario">Destinatario:</label>
                                        <input type="text" name="destinatario" value="<?= $amigo->getDestinatario() ?>">
                                        <br><br>
                                        <label for="precio">Precio:</label>
                                        <input type="number" min="1" name="precio" value="<?= $amigo->getPrecio() ?>">
                                        <br><br>
                                        <label for="estado">Estado:</label>
                                        <select name="estado">
                                            <option value="pendiente" <?= ($amigo->getEstado() == 'pendiente') ? 'selected' : '' ?>>
                                                Pendiente</option>
                                            <option value="comprado" <?= ($amigo->getEstado() == 'comprado') ? 'selected' : '' ?>>
                                                Comprado</option>
                                            <option value="envuelto" <?= ($amigo->getEstado() == 'envuelto') ? 'selected' : '' ?>>
                                                Envuelto</option>
                                            <option value="entregado" <?= ($amigo->getEstado() == 'entregado') ? 'selected' : '' ?>>
                                                Entregado</option>
                                        </select>
                                        <br><br>
                                        <label for="anio">Año:</label>
                                        <input type="number" min="1900" name="anio" value="<?= $amigo->getanio() ?>">

                                        <input type="hidden" name="idUsuario" value="<?= $amigo->getIdUsuario() ?>">
                                        <br><br>
                                        <button type="submit" class="btn btn-success" name="accion" value="actualizarpartidaModal">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>