<?php include('cabecera.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Nuevo Proyecto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Nuevo Proyecto</li>
                        </ol>
                        <form action="controlador.php" method="post">
                            <input type="hidden" name="accion" value="nuevo">

                            <label>Nombre:</label>
                            <input type="text" name="nombre" required><br>

                            <label>Fecha Inicio:</label>
                            <input type="date" name="fechaInicio" required><br>

                            <label>Fecha Fin prevista:</label>
                            <input type="date" name="fechaFinPrevista" required><br>

                            <label>Dias Transcurridos:</label>
                            <input type="number" name="diasTranscurridos" required><br>

                            <label>Porcentaje Completado:</label>
                            <input type="number" name="porcentajeCompletado" required><br>

                            <label>Importancia (1-5): </label>
                            <input type="number" name="importancia" required><br>

                            <input type="submit" value="Añadir proyecto">
                        </form>
<?php include('pie.php'); ?>