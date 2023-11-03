<?php include('cabecera.php'); ?>

<h1 class="mt-4">Proyectos</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="proyectos.php">Proyectos</a> > Nuevo Proyecto</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Añadir un proyecto
                            </div>
                            <div class="card-body">
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">

                <!--CONTENIDO DEL FORMULARIO, EL POST LO MANDAMOS DE TIPO OCULTO --> 

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

                            <label>Importancia (1-5): </label>
                            <input type="number" name="importancia" required><br><br>

                            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">



                            <input type="submit" value="Añadir proyecto">
                        </form>                     
                        <?php var_dump($idUsuario)?>
<?php include('pie.php'); ?> 