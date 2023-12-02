<?php

namespace Padel\vistas;

use Padel\controladores\ControladorJugador;

class VistaJugador
{
    public static function render($jugadores)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">🎁 Lista de jugadores🎁 </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-success text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Email</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Password</th>
                        <th class="col col-lg-2 text-center">Apodo</th>
                        <th class="col col-lg-2 text-center">Nivel</th>
                        <th class="col col-lg-2 text-center">Edad</th>
                    </tr>
                </thead>

                <?php
                if (empty($jugadores)) { ?>

                    <h3 class='text-center'>
                        no tiene jugador
                    </h3>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevoJugadorModal">Añadir
                            jugador</a>
                    </div>

                    <?php
                } else {
                    foreach ($jugadores as $jugador) {
                    ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getId() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getEmail() ?>
                            </td>       <td class="col col-lg-2 text-center">
                                <?= $jugador->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getPassword() ?>
                            </td>
                     
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getApodo() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getNivel() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getEdad() ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                include "VistaNuevaPartida.php";
                include "VistaActualizarPartida.php";?>
            </table>
        </div>

<?php 
include "PieMain.php";
    }
}
?>