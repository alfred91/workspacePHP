<?php
namespace RegalosNavidad\vistas;
use RegalosNavidad\controladores\controladorEnlace;

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
                        <th class="col col-lg-2 text-center">idUsuario</th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
                    </tr>
                </thead>
                
                    <?php
                    if (isset($regalos)) {
                        foreach ($regalos as $regalo) {
                            ?>
                              <tr>
            <td><?= $regalo->getNombre() ?></td>
            <td><?= $regalo->getDestinatario() ?></td>
            <td><?= $regalo->getPrecio() ?></td>
            <td><?= $regalo->getEstado() ?></td>
            <td><?= $regalo->getYear() ?></td>
            <td><?= $regalo->getIdUsuario()?></td>
            <td>
                <?php
                // Obtén los enlaces asociados al regalo actual
                $enlaces = controladorEnlace::mostraEnlaces($regalo);

                // Muestra los enlaces si existen
                if ($enlaces && is_array($enlaces)) {
                    foreach ($enlaces as $enlace) {
                         $enlace->getEnlaceWeb() . "<br>";
                    }
                } else {
                    echo "Sin enlaces";
                }
                ?>
            </td>
        </tr>
                            <?php
                        }
                    }
                    ?>
                </>
            </table>
        </div>
        
        <?php
        include"pieMain.php";
    }
}
?>