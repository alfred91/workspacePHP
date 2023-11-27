 <div class="modal fade" id="nuevaIncidencia" tabindex="-1" aria-labelledby="nuevaIncidenciaModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="nuevaIncidencialLabel">Añadir Incidencia</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario de Inserción -->
                                    <form action="?insertarIncidencia" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $incidencia->getId()+1;?>">
                                    <br>
                                        <label for="latitud">Latitud:</label>
                                        <input type="number" name="latitud" required>
                                        <br><br>
                                        <label for="longitud">Longitud:</label>
                                        <input type="number" name="longitud">
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
                                        <br><br>
                                        <label for="idCliente">IdCliente</label>
                                        <input type="number" name="idCliente">
                                        <br><br>
                                        <button type="submit" class="btn btn-success" name="accion" value="insertarIncidencia">
                                            Insertar Incidencia</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>