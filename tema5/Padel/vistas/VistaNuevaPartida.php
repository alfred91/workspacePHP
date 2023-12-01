<div class="modal fade" id="nuevaPartida" tabindex="-1" aria-labelledby="nuevaPartidaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaPartidaModalLabel">Añadir Partida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Inserción -->
                <form action="?nuevaPartida" method="post">

                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" value="2023-12-20" required>
                    <br><br>

                    <label for="hora">Hora:</label>
                    <input type="time" name="hora" value="09:00" required>
                    <br><br>

                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" required value="Ciudad">
                    <br><br>

                    <label for="lugar">Lugar:</label>
                    <input type="text" name="lugar" required value="Lugar">
                    <br><br>

                    <label for="cubierto">Cubierto:</label>
                    <select name="cubierto" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>

                    <br><br>

                    <input type="hidden" name="idJugador" value="<?php echo $usuario->getId(); ?>"> <!-- Asegúrate de imprimir el ID del usuario -->

                    <button type="submit" class="btn btn-success" name="accion" value="nuevaPartida">Crear Partida</button>
                </form>
            </div>
        </div>
    </div>
</div>