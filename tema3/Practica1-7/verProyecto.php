<?php include('cabecera.php');?>          
        <h1 class="mt-4">Proyectos</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="proyectos.php">Proyectos</a> > Detalle</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Detalle del proyecto
                            </div>
                            <div class="card-body"><?php

if(isset($_SESSION['proyectoDetalle'])) {
    $proyecto = $_SESSION['proyectoDetalle'];

echo "<table id='datatablesSimple' border='2'>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin Prevista</th>
                    <th>Días Transcurridos</th>
                    <th>Porcentaje Completado</th>
                    <th>Importancia</th>
                    <th>Eliminar</th>
                </tr>
        </thead>";
            echo "<tr>
                    <td>{$proyecto['id']}</td>
                    <td>{$proyecto['nombre']}</td>
                    <td>{$proyecto['fechaInicio']}</td>
                    <td>{$proyecto['fechaFinPrevista']}</td>
                    <td>{$proyecto['diasTranscurridos']}</td>
                    <td>{$proyecto['porcentajeCompletado']}%</td>
                    <td>{$proyecto['importancia']}</td>
                    <td><a href='controlador.php?accion=eliminar&id={$proyecto['id']}'>Eliminar</a></td>
                </tr>";
        
        echo "</table>";
} else {
    // Si no hay datos del proyecto en la sesión, redirige a la página de proyectos
    echo"Proyecto no disponible";
    exit();
}
?>
                                </table>
<?php include('pie.php'); ?>               