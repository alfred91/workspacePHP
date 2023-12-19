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
                                    <input type="hidden" name="idUsuario" value="<?= $usuario->getId() ?>">

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
                                        <select name="estado">
                                            <option value="pendiente">Pendiente</option>
                                            <option value="comprado">Comprado</option>
                                            <option value="envuelto">Envuelto</option>
                                            <option value="entregado">Entregado</option>
                                        </select>
                                        <br><br>
                                        <label for="anio">Año:</label>
                                        <input type="number" min="2000" name="anio">
                                        <br><br>
                                        <button type="submit" class="btn btn-success" name="accion"
                                            value="insertarRegaloModal">Insertar Regalo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>