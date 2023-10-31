<?php include 'cabecera.php';
include 'db.php';?>          
        <h1 class="mt-4">Proyectos</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Proyectos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Proyectos
                            </div>
                            <div class="card-body">
<?php
try{
$conn=conexion();
if ($conn) {
    echo "Conexión exitosa";
} else {
    echo "Error en la conexión";
}

$sql = "SELECT * FROM proyectos WHERE idUsuario =:idUsuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idUsuario', $_SESSION['idUsuario']);
$stmt->execute();

$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre del Proyecto</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin Prevista</th>
            <th>Días Transcurridos</th>
            <th>Porcentaje Completado</th>
            <th>Importancia</th>
            </tr>';

    foreach ($proyectos as $proyecto) {
        var_dump($proyecto);
        echo '<tr>
            <td>'. $proyecto['id']. '</td>
            <td>'. $proyecto['nombre']. '</td>
            <td>'. $proyecto['fechaInicio']. '</td>
            <td>'. $proyecto['fechaFinPrevista']. '</td>
            <td>'. $proyecto['diasTranscurridos']. '</td>
            <td>'. $proyecto['porcentajeCompletado']. '</td>
            <td>'. $proyecto['importancia']. '</td>
            </tr>';
    }
} catch (PDOException $e){
    echo "Error: ". $e->getMessage();
    }
    echo "</table>";
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
<?php include('pie.php'); ?>