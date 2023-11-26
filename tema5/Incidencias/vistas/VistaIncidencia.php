<?php
namespace Examen\vistas;

use Examen\controladores\ControladorIncidencias;

class VistaIncidencias
{

    public static function render($incidencias)
    {
        include("CabeceraMain.php");
        ?>

        <div class="container-fluid">

            <h1 class="mt-5 text-center">Incidencias de <?php echo $usuario->getNombre(); ?>
            </h1>
           
        
   

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Latitud</th>
                        <th class="col col-lg-2 text-center">Longitud</th>
                        <th class="col col-lg-2 text-center">Ciudad</th>
                        <th class="col col-lg-2 text-center">Direccion</th>
                        <th class="col col-lg-2 text-center">Descripcion</th>
                        <th class="col col-lg-2 text-center">Solucion</th>

                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">
                            <a class="btn btn-danger" href="?accion=mostrarincidenciasOrdenados"> 🢁 </a> Año 
                            <a class="btn btn-danger" href="?accion=mostrarincidenciasOrdenadosDesc"> 🢃 </a>
                        </th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
                        <th class="col col-lg-2 text-center">Detalle</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        <th class="col col-lg-2 text-center">Modificar</th>

                    </tr>
                </thead>

                <?php
               if (empty($incidencias)) {?>

            <h3 class='text-center'> <?php echo $usuario->getNombre(); ?>  no tiene incidencias, puedes crear uno aqui </h3>
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevoincidenciaModal">Añadir incidencia</a>            
            
            <?php } else {
                foreach ($incidencias as $incidencia) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencias->getLatitud() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getLongitud() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getCiudad() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getDirecion() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getDescripcion() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getEstado() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getSolucion() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getanio() ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un incidencia -->
                                <a href="?accion=verEnlaces&id=<?= $incidencia->getId() ?>" class="btn btn-info">🔗</a>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un incidencia -->
                                <a href="?accion=verDetalle&id=<?= $incidencia->getId() ?>" class="btn btn-success">🔍</a>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <!-- Delete Button -->
                                <a href="index.php?accion=borrarincidencia&id=<?= $incidencia->getId() ?>" class="btn btn-danger">🔥</a>
                            </td>

                            <!-- Modify Button (Open Modal) -->
                            <td class="col col-lg-2 text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modificarincidenciaModal<?= $incidencia->getId() ?>"> ✍️
                                </button>
                            </td>
                        </tr>

                            <!-- Nuevo incidencia Modal -->
                            <div class="modal fade" id="nuevoincidenciaModal" tabindex="-1" aria-labelledby="nuevoincidenciaModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="nuevoincidenciaModalLabel">Añadir incidencia</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario de Inserción -->
                                            <form action="?insertarincidencia" method="post">
                                                <!-- Campos del formulario (nombre, destinatario, precio, etc.) -->
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" name="nombre" required>
                                                <br><br>
                                                <label for="destinatario">Destinatario:</label>
                                                <input type="text" name="destinatario">
                                                <br><br>
                                                <label for="precio">Precio:</label>
                                                <input type="number" min="1" name="precio">
                                                <br><br>
                                                <label for="estado">Estado:</label>
                                                <select name="estado">
                                                    <option value="pendiente">Pendiente</option>
                                                    <option value="comprado">Comprado</option>
                                                    <option value="envuelto">Envuelto</option>
                                                    <option value="entregado">Entregado</option>
                                                </select>
                                                <br><br>

                                                <label for="anio">Año:</label>
                                                <input type="number" min="2000" name="anio">
                                                <input type="hidden" name="idUsuario" value="<?= $incidencia->getIdUsuario() ?>">

                                                <br><br>


                                                <button type="submit" class="btn btn-success" name="accion"
                                                    value="insertarincidenciaModal">Insertar incidencia</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modificarincidenciaModal<?= $incidencia->getId() ?>" tabindex="-1"
                                aria-labelledby="modificarincidenciaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modificarincidenciaModalLabel">Modificar
                                                <?= $incidencia->getNombre() ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="?modificarincidencia=<?= $incidencia->getId() ?>" method="post">
                                                <label for="nombre">ID:</label>
                                                <input type="text" name="id" value="<?= $incidencia->getId() ?>" required>
                                                <br><br>
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" name="nombre" value="<?= $incidencia->getNombre() ?>" required>
                                                <br><br>
                                                <label for="destinatario">Destinatario:</label>
                                                <input type="text" name="destinatario" value="<?= $incidencia->getDestinatario() ?>">
                                                <br><br>
                                                <label for="precio">Precio:</label>
                                                <input type="number" min="1" name="precio" value="<?= $incidencia->getPrecio() ?>">
                                                <br><br>
                                                <label for="estado">Estado:</label>
                                                <select name="estado">
                                                    <option value="pendiente" <?= ($incidencia->getEstado() == 'pendiente') ? 'selected' : '' ?>>Pendiente</option>
                                                    <option value="comprado" <?= ($incidencia->getEstado() == 'comprado') ? 'selected' : '' ?>>Comprado</option>
                                                    <option value="envuelto" <?= ($incidencia->getEstado() == 'envuelto') ? 'selected' : '' ?>>Envuelto</option>
                                                    <option value="entregado" <?= ($incidencia->getEstado() == 'entregado') ? 'selected' : '' ?>>Entregado</option>
                                                </select>
                                                <br><br>

                                                <label for="anio">Año:</label>
                                                <input type="number" min="1900" name="anio" value="<?= $incidencia->getanio() ?>">

                                                <input type="hidden" name="idUsuario" value="<?= $incidencia->getIdUsuario() ?>">
                                                <br><br>
                                                <button type="submit" class="btn btn-success" name="accion"
                                                    value="actualizarincidenciaModal">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                ?>
            </table>
        </div>

        <?php
        include "PieMain.php";
    }
}
?>