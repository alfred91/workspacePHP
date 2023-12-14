<?php

namespace Examen\vistas;

class VistaAmigos
{
    public static function render($amigos)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">Lista de Regalos Amigo Invisible </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">Maximo Dinero</th>
                        <th class="col col-lg-2 text-center">Fecha Tope</th>
                        <th class="col col-lg-2 text-center">Lugar</th>
                        <th class="col col-lg-2 text-center">Observaciones</th>
                        <th class="col col-lg-2 text-center">Emoji</th>
                        <th class="col col-lg-2 text-center">Acciones</th>

                    </tr>
                </thead>

                <?php

                if (empty($amigos)) {
                ?>
                    <h3 class='text-center'>
                        No tienes regalos, puedes crear uno aquí

                    </h3>
                    <div class="text-center mt-3">
                        <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#nuevoAmigo">Añadir Amigo Invisible</a>
                    </div>

                    <?php include "VistaNuevoAmigo.php";
                } else {
                    foreach ($amigos as $amigo) { ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getestado() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getMaximoDinero() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getFechaTope() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getLugar() == 1 ? 'Si' : 'No' ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getObservaciones() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $amigo->getEmoji() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <a href="?accion=verDetalleAmigo&id=<?= $amigo->getId() ?>" class="btn btn-info">Ver</a><br>
                                <a href="index.php?accion=eliminarAmigo&id=<?= $amigo->getId() ?>" class="btn btn-danger">X</a>
                                <a href="index.php?accion=modificarAmigo&id=<?= $amigo->getId() ?>" class="btn btn-warning">@</a>
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