<div class="modal fade" id="nuevoProyectoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal para.. </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="controlador.php" method="post">
                                <input type="hidden" name="accion" value="nuevo">

                                <label>Nombre:</label>
                                <input type="text" name="nombre" required><br><br>

                                <label>Fecha Inicio:</label>
                                <input type="date" name="fechaInicio" required><br><br>

                                <label>Fecha Fin prevista:</label>
                                <input type="date" name="fechaFinPrevista" required><br><br>

                                <label>Dias Transcurridos:</label>
                                <input type="number" name="diasTranscurridos" required><br><br>

                                <label>Porcentaje Completado:</label>
                                <input type="number" name="porcentajeCompletado" required><br><br>

                                <label>Importancia (1-5):</label>
                                <input type="number" name="importancia" required><br><br>

                                <button type="submit" class="btn btn-primary">Añadir proyecto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  