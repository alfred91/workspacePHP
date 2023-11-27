<?php
namespace Incidencias\vistas;

use Incidencias\controladores\ControladorCliente;

class VistaCliente
{
    public static function render($clientes)
    {
        include("CabeceraMain.php");
        ?>

        <div class="container-fluid">

            <h1 class="mt-5 text-center">Lista de Clientes </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Direccion</th>
                        <th class="col col-lg-2 text-center">Localidad</th>
                        <th class="col col-lg-2 text-center">Movil</th>
                        <th class="col col-lg-2 text-center">Dni</th>

                    </tr>
                </thead>
                <?php
                if (empty($clientes)) { ?>

                    <h3 class='text-center'> NO HAY CLIENTES CON ESE DNI </h3>


                <?php } else {
                    foreach ($clientes as $cliente) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $cliente->getId() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $cliente->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $cliente->getDireccion() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $cliente->getLocalidad() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $cliente->getMovil() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $cliente->getDni() ?>
                            </td>

                        </tr>
                        <?php

                    }
                }
                ?>
            </table>
        </div>
        <?php
        include("PieMain.php");

    }
}
?>