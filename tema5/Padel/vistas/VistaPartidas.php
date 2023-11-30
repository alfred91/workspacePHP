<?php
namespace Padel\vistas;

use Padel\controladores\ControladorPartida;
use Padel\controladores\ControladorJugador;

class VistaPartidas
{
    public static function render($partidas)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">Lista de Partidas  </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Fecha</th>
                        <th class="col col-lg-2 text-center">Hora</th>
                        <th class="col col-lg-2 text-center">Ciudad</th>
                        <th class="col col-lg-2 text-center">Lugar</th>
                        <th class="col col-lg-2 text-center">Cubierto</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">idJugador</th>
                        
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
                    var_dump($partidas);
                    foreach ($partidas as $partida) {
                        
                        ?>
                        <tr>
                        <td class="col col-lg-2 text-center">
                                <?= $partida->getId() ?>
                            </td>
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
                                <?= $partida->getCubierto() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getEstado() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getIdJugador() ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un partida -->
                                <a href="?accion=verEnlaces&id=<?= $partida->getId() ?>" class="btn btn-warning">🔗</a>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un partida -->
                                <a href="?accion=verDetalle&id=<?= $partida->getId() ?>" class="btn btn-primary">🔍</a>
                            </td>
                           
                            <!-- Modify Button (Open Modal) -->
                            <td class="col col-lg-2 text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modificarPartidaModal<?= $partida->getId() ?>"> ✍️
                                </button>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <!-- Delete Button -->
                                <a href="index.php?accion=borrarPartida&id=<?= $partida->getId() ?>" class="btn btn-danger">🔥</a>
                            </td>
                        </tr>
                    <?php   
                        include "VistaNuevapartida.php";
                        include "VistaActualizarpartida.php";
                    }
                }
                ?>
            </table>
        </div>

        <?php include "PieMain.php";
    }
}
?>