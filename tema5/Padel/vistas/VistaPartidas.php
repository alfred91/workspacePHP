<?php

namespace Padel\vistas;

class VistaPartidas
{
    public static function render($partidas)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">Lista de Partidas </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-success text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Fecha</th>
                        <th class="col col-lg-2 text-center">Hora</th>
                        <th class="col col-lg-2 text-center">Ciudad</th>
                        <th class="col col-lg-2 text-center">Lugar</th>
                        <th class="col col-lg-2 text-center">Cubierto</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">NJugadores</th>
                        <th class="col col-lg-2 text-center">Acciones</th>
                    </tr>
                </thead>

                <?php
                if (!isset($partidas)) { ?>
                    <h3 class='text-center'>
                        <?php echo $jugador->getNombre(); ?> no tiene partidas, puedes crear una aquí
                    </h3>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevaPartidaModal">Añadir
                            partida</a>
                    </div>

                    <?php include "VistaNuevaPartida.php";
                } else {
                    foreach ($partidas as $partida) { ?>
                        <tr>

                            <td class="col col-lg-2 text-center">
                                <?= $partida->getFecha() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getHora() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getCiudad() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getLugar() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getCubierto() == 1 ? 'Si' : 'No' ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <?= $partida->getEstado() ?>
                            </td>
                            <td>
                                <? echo "Número de jugadores: " . count($partida->getJugadores()) ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <a href="?accion=verDetallePartida&id=<?= $partida->getId() ?>" class="btn btn-info">Ver</a><br>
                                <a href="index.php?accion=eliminarPartida&id=<?= $partida->getId() ?>" class="btn btn-danger">X </a>
                            </td>
                        </tr>
                <?php

                    }
                }
                include "VistaNuevaPartida.php";
                include "VistaDetallePartida.php";
                ?>
            </table>
        </div>

<?php
    }
}
?>