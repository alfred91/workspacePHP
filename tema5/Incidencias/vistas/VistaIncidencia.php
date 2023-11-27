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
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">idCliente</th>
                        <th class="col col-lg-2 text-center">Latitud</th>
                        <th class="col col-lg-2 text-center">Longitud</th>
                        <th class="col col-lg-2 text-center">Ciudad</th>
                        <th class="col col-lg-2 text-center">Direccion</th>
                        <th class="col col-lg-2 text-center">Descripcion</th>
                        <th class="col col-lg-2 text-center">Solucion</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">Modificar</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                    </tr>
                </thead>

                <?php
                if (empty($incidencias)) {
                    include("VistaNuevaIncidencia.php"); ?>

                    <h3 class='text-center'> No tiene incidencias, puedes registrar una aqui </h3>
                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevaincidencia">Añadir
                        incidencia</a>

                <?php } else {
                    foreach ($incidencias as $incidencia) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getId() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getIdCliente() ?>
                            </td>
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
                                <?= $incidencia->getSolucion() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $incidencia->getEstado() ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modificarIncidencia<?= $incidencia->getId() ?>"> ✍️
                                </button>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <a href="index.php?accion=borrarIncidencia&id=<?= $incidencia->getId() ?>" class="btn btn-danger">🔥</a>
                            </td>
                        </tr>
                        <?php
                         include("VistaNuevaIncidencia.php");
                         include("VistaModificarIncidencia.php");
                    }
                }
                ?>
            </table>
        </div>
        <?php
        include("PieMain.php");
        include("VistaNuevaIncidencia.php");
    }
}
?>