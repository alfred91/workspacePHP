<?php

namespace Examen\vistas;

class VistaParticipantes
{
    public static function render($participantes)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">Lista de Participantes Amigo Invisible </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Email</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Telefono</th>
                        <th class="col col-lg-2 text-center">Acciones</th>
                    </tr>
                </thead>

                <?php

                if (empty($participantes)) {
                ?>
                    <h3 class='text-center'>
                        No tienes regalos, puedes crear uno aquí

                    </h3>
                    <div class="text-center mt-3">
                        <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#nuevoAmigo">Añadir Amigo Invisible</a>
                    </div>

                    <?php include "VistaNuevoAmigo.php";
                } else {
                    foreach ($participantes as $participante) { ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $participante->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $participante->getEmail() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $participante->getTelefono() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $participante->getId() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <a href="?accion=verDetalleAmigo&id=<?= $participante->getId() ?>" class="btn btn-info">Ver</a><br>
                                <a href="index.php?accion=eliminarAmigo&id=<?= $participante->getId() ?>" class="btn btn-danger">X</a>
                                <a href="index.php?accion=modificarAmigo&id=<?= $participante->getId() ?>" class="btn btn-warning">@</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
<?php
        include "VistaNuevoAmigo.php";
        include "VistaDetalleAmigo.php";
    }
}
?>