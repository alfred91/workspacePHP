<?php
namespace Padel\vistas;

use Padel\controladores\ControladorPartida;

class VistaJugador
{
    public static function render($partidas)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">🎁 Lista de Partidas de <?php echo $jugador->getNombre(); ?> 🎁 </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Destinatario</th>
                        <th class="col col-lg-2 text-center">Precio</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">
                            <a class="btn btn-danger" href="?accion=mostrarPartidasOrdenados"> 🢁 </a> Año
                            <a class="btn btn-danger" href="?accion=mostrarpartidasOrdenadosDesc"> 🢃 </a>
                        </th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
                        <th class="col col-lg-2 text-center">Detalle</th>
                        <th class="col col-lg-2 text-center">Modificar</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        
                    </tr>
                </thead>

                <?php
                if (empty($partidas)) { ?>

                    <h3 class='text-center'>
                        <?php echo $jugador->getNombre(); ?> no tiene partidas, puedes crear uno aquí
                    </h3>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevaPartidaModal">Añadir
                            partida</a>
                    </div>

                <?php include "VistaNuevaPartida.php";
                } else {
                    foreach ($partidas as $partida) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getDestinatario() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getPrecio() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getEstado() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $partida->getanio() ?>
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
                        include "VistaNuevopartida.php";
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