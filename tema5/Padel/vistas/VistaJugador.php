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
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Email</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Password</th>
                        <th class="col col-lg-2 text-center">Apodo</th>
                        <th class="col col-lg-2 text-center">Nivel</th>
                        <th class="col col-lg-2 text-center">Edad</th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
                        <th class="col col-lg-2 text-center">Detalle</th>
                        <th class="col col-lg-2 text-center">Modificar</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        
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
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getPassword() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $jugador->getNombre() ?>
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

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un jugador$jugador -->
                                <a href="?accion=verEnlaces&id=<?= $jugador->getId() ?>" class="btn btn-warning">🔗</a>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un jugador$jugador -->
                                <a href="?accion=verDetalle&id=<?= $jugador->getId() ?>" class="btn btn-primary">🔍</a>
                            </td>
                           
                            <!-- Modify Button (Open Modal) -->
                            <td class="col col-lg-2 text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modificarJugadorModal<?= $jugador->getId() ?>"> ✍️
                                </button>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <!-- Delete Button -->
                                <a href="index.php?accion=borrarjugador$jugador&id=<?= $jugador->getId() ?>" class="btn btn-danger">🔥</a>
                            </td>
                        </tr>
                    <?php   
                        //include "VistaNuevoJugador.php";
                        //include "VistaActualizarJugador.php";
                    }
                }
                ?>
            </table>
        </div>

        <?php include "PieMain.php";
    }
}
?>