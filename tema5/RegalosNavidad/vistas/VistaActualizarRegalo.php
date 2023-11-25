<div class="modal fade" id="modificarRegaloModal<?= $regalo->getId() ?>" tabindex="-1"
                        aria-labelledby="modificarRegaloModalLabel" aria-hidden="true">
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
                                        <select name="estado">
                                            <option value="pendiente" <?= ($regalo->getEstado() == 'pendiente') ? 'selected' : '' ?>>
                                                Pendiente</option>
                                            <option value="comprado" <?= ($regalo->getEstado() == 'comprado') ? 'selected' : '' ?>>
                                                Comprado</option>
                                            <option value="envuelto" <?= ($regalo->getEstado() == 'envuelto') ? 'selected' : '' ?>>
                                                Envuelto</option>
                                            <option value="entregado" <?= ($regalo->getEstado() == 'entregado') ? 'selected' : '' ?>>
                                                Entregado</option>
                                        </select>
                                        <br><br>
                                        <label for="anio">Año:</label>
                                        <input type="number" min="1900" name="anio" value="<?= $regalo->getanio() ?>">

                                        <input type="hidden" name="idUsuario" value="<?= $regalo->getIdUsuario() ?>">
                                        <br><br>
                                        <button type="submit" class="btn btn-success" name="accion" value="actualizarRegaloModal">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>