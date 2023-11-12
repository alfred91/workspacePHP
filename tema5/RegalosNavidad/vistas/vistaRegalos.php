<?php
namespace RegalosNavidad\vistas;

use RegalosNavidad\controladores\controladorRegalo;

class VistaRegalos
{

    public static function render($regalos)
    {
        include "cabeceraMain.php";
        ?>

        <div class="container-fluid">
            <button class="btn btn-danger mt-5 mb-3">Añadir regalo</button>
            <h2 class="mt-5 text-center">REGALOS DE NAVIDAD</h2>
            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Destinatario</th>
                        <th class="col col-lg-2 text-center">Precio</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">Año</th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($regalos) && is_array($regalos)) {
                        foreach ($regalos as $regalo) {
                            ?>
                            <tr>
                                <td>
                                    <?= $regalo->getNombre() ?>
                                </td>
                                <td>
                                    <?= $regalo->getDestinatario() ?>
                                </td>
                                <td>
                                    <?= $regalo->getPrecio() ?>
                                </td>
                                <td>
                                    <?= $regalo->getEstado() ?>
                                </td>
                                <td>
                                    <?= $regalo->getYear() ?>
                                </td>
                                <td>
                                    <?= $enlaces->getLinks() ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        include("pieMain.php");
    }
}
?>