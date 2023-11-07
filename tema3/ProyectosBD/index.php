<?php include 'cabecera.php';
include 'db.php';?>          
        <h1 class="mt-4">Proyectos</h1>
 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Proyectos
                            </div>
                            <div class="card-body">
<?php
///MOSTRAMOS PROYECTOS SOLO CUANDO EL USUARIO ESTE LOGUEADO
if(isset($_SESSION['usuario'])){

try {
    $conn = conexion();
    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT * FROM Proyectos WHERE idUsuario = :idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':idUsuario',$idUsuario, PDO::PARAM_INT);
    $stmt->execute();

    $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<table id="datatableSimple" class="table" border="1"><thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre del Proyecto</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin Prevista</th>
            <th>Días Transcurridos</th>
            <th>Porcentaje Completado</th>
            <th>Importancia</th>
            <th>Id Usuario</th>
            <th>Actualizar</th>
            <th>Borrar</th>
        </tr>';

        foreach ($proyectos as $proyecto) {
            echo '<tr>
                <td>' . $proyecto['id'] . '</td>
                <td>' . $proyecto['nombre'] . '</td>
                <td>' . $proyecto['fechaInicio'] . '</td>
                <td>' . $proyecto['fechaFinPrevista'] . '</td>
                <td>' . $proyecto['diasTranscurridos'] . '</td>
                <td>' . $proyecto['porcentajeCompletado'] . '</td>
                <td>' . $proyecto['importancia'] . '</td>
                <td>' . $proyecto['idUsuario'] . '</td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalActualizar_' . $proyecto['id'] . '"><button type="button" class="btn btn-outline-info">@</button></a></td>
                <td><a href="controlador.php?accion=borrar&id=' . $proyecto['id'] . '"><button type="button" class="btn btn-outline-danger">X</button></a></td>
                </tr>';
        }
        echo '</table>';
        
        
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
    <!--CONTENIDO DEL MODAL, EL POST TIPO OCULTO -->
                    
    <div class="modal fade" id="nuevoProyectoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal para añadir proyecto</h5>
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

<!--MODAL PARA ACTUALIZAR UN PROYECTO-->

            <?php foreach ($proyectos as $proyecto): ?>
<div class="modal fade" id="modalActualizar_<?php echo $proyecto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalActualizarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar el proyecto <?php echo $proyecto['id']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controlador.php" method="POST">
                    <input type="hidden" name="accion" value="actualizar">
                    <input type="hidden" name="proyecto_id" value="<?php echo $proyecto['id']; ?>">

                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo ($proyecto['nombre']); ?>" required><br><br>

                    <label>Fecha Inicio:</label>
                    <input type="date" name="fechaInicio" value="<?php echo $proyecto['fechaInicio']; ?>" required><br><br>

                    <label>Fecha Fin prevista:</label>
                    <input type="date" name="fechaFinPrevista" value="<?php echo $proyecto['fechaFinPrevista']; ?>" required><br><br>

                    <label>Dias Transcurridos:</label>
                    <input type="number" name="diasTranscurridos" value="<?php echo $proyecto['diasTranscurridos']; ?>" required><br><br>

                    <label>Porcentaje Completado:</label>
                    <input type="number" name="porcentajeCompletado" value="<?php echo $proyecto['porcentajeCompletado']; ?>" required><br><br>

                    <label>Importancia (1-5):</label>
                    <input type="number" name="importancia" value="<?php echo $proyecto['importancia']; ?>" required><br><br>

                    <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach;}
include('pie.php'); ?>