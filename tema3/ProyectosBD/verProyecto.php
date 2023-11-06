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
if (isset($_SESSION['resultados'])) {
    $resultados = $_SESSION['resultados'];
    

    echo '<table border="1">
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

        foreach ($_SESSION['resultados'] as $proyecto) {
            echo '<tr>
                <td>' . $proyecto['id'] . '</td>
                <td>' . $proyecto['nombre'] . '</td>
                <td>' . $proyecto['fechaInicio'] . '</td>
                <td>' . $proyecto['fechaFinPrevista'] . '</td>
                <td>' . $proyecto['diasTranscurridos'] . '</td>
                <td>' . $proyecto['porcentajeCompletado'] . '</td>
                <td>' . $proyecto['importancia'] . '</td>
                <td>' . $proyecto['idUsuario'] . '</td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalActualizar_' . $proyecto['id'] . '">Actualizar</a></td>
                <td><a href="controlador.php?accion=borrar&id=' . $proyecto['id'] . '">Borrar</a></td>
                </tr>';
        }
        echo '</table>';

        unset($_SESSION['resultados']);

} else { echo"No hay resultados";
}?>

<?php include('pie.php'); ?>