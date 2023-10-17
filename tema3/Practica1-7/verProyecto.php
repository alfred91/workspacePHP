<?php include('cabecera.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detalles del Proyecto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Proyectos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Proyectos en detalle 
                                                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple"><?php


if(isset($_SESSION['proyectoDetalle'])) {
    $proyecto = $_SESSION['proyectoDetalle'];

echo "<div class='card mb-4'>
<div class='card-header'>
    <i class='fas fa-table me-1'></i>
    DataTable Example
</div>
<div class='card-body'>
    <id='datatablesSimple'>
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
    header("Location: proyectos.php?error=proyecto_no_disponible");
    exit();
}
?>

                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include('pie.php'); ?>               