<?php
namespace Incidencias\vistas;

use Incidencias\controladores\ControladorIncidencias;

class VistaIncidencia
{

    public static function render($incidencias)
    {
        include("CabeceraMain.php");
        ?>

        <div class="container-fluid">

            <h1 class="mt-5 text-center">Lista de Incidencias </h1>

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
                        <th class="col col-lg-2 text-center">Detalle</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        <th class="col col-lg-2 text-center">Modificar</th>

                    </tr>
                </thead>

                <?php
               if (empty($incidencias)) {?>

            <h3 class='text-center'> No tiene incidencias, puedes registrar una aqui </h3>
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevoincidenciaModal">Añadir incidencia</a>            
            
            <?php } else {
                foreach ($incidencias as $incidencia) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getLatitud() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getLongitud() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getCiudad() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getDireccion() ?>
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