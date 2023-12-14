<div class="modal fade" id="nuevoAmigo" tabindex="-1" aria-labelledby="nuevoAmigoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoAmigoModalLabel">Añadir Regalo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <form action="?nuevoAmigo" method="post">
               
                <label for="nombre">Nombre:</label>
                    <input type="text" name="Nombre" value="Nombre" required>
                    <br><br>

                    <label for="estado">Estado:</label>
                    <select name="estado" required>
                        <option value="Activo">Activo</option>
                        <option value="Comprado">Comprado</option>
                        <option value="Entregado">Entregado</option>
                    </select>

                    <br><br>

                    <label for="hora">Hora:</label>
                    <input type="time" name="hora" value="09:00" required>
                    <br><br>

                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" value="Mojacar" required>
                    <br><br>

                    <label for="lugar">Lugar:</label>
                    <input type="text" name="lugar" value="Parador" required>
                    <br><br>

                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" value="2023-12-20" required>
                    <br><br>

                  
                    
                    <input type="hidden" name="idParticipante" value="<?php echo $participante->getId(); ?>"> 

                    <button type="submit" class="btn btn-success" name="accion" value="nuevaPartida">Crear Partida</button>
                </form>
            </div>
        </div>
    </div>
</div>