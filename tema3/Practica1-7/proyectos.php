<?php include('cabecera.php');?>

    <main>                    
        <h1 class="mt-4">Proyectos</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Proyectos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Proyectos en detalle 
                            </div>     
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de proyectos
                            </div>
                            <div class="card-body"><?php
// Verificar si existe la sesión de proyectos
    if(isset($_SESSION['proyectos'])) {
        // Obtener proyectos de la sesión
        $proyectos = $_SESSION['proyectos'];

    // Mostrar proyectos en una tabla
        echo "<table id='datatablesimple' border='2'>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin Prevista</th>
                    <th>Días Transcurridos</th>
                    <th>Porcentaje Completado</th>
                    <th>Importancia</th>
                    <th>Ver</th>
                    <th>Eliminar</th>
                </tr>
        </thead>";
        foreach ($proyectos as $proyecto) {
            echo "<tr>
                    <td>{$proyecto['id']}</td>
                    <td>{$proyecto['nombre']}</td>
                    <td>{$proyecto['fechaInicio']}</td>
                    <td>{$proyecto['fechaFinPrevista']}</td>
                    <td>{$proyecto['diasTranscurridos']}</td>
                    <td>{$proyecto['porcentajeCompletado']}%</td>
                    <td>{$proyecto['importancia']}</td>
                    <td><a href='controlador.php?accion=ver&id={$proyecto['id']}'>Detalle</a></td>
                    <td><a href='controlador.php?accion=eliminar&id={$proyecto['id']}'>Eliminar</a></td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay proyectos disponibles.</p>";
    }
    ?>
                            </div>
                            </div></div>
                </main>
<?php include('pie.php'); ?>               