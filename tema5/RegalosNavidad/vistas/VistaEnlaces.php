<?php

namespace RegalosNavidad\vistas;

class VistaEnlaces
{
    public static function render($enlaces)
    {
        include "CabeceraMain.php";
?>
        <h1 class="mt-5 text-center">Lista de Enlaces 🔗
            <a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarRegalos">🎁
            </a>
        </h1>

        </div>

        <?php if (isset($enlaces) && !empty($enlaces)) { ?>

            </h1>
            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Enlace Web</th>
                        <th class="col col-lg-2 text-center"><a class="btn btn-danger" href="?accion=mostrarEnlacesOrdenadosPrecioAsc&idRegalo=<?= $enlaces[0]->getIdRegalo() ?>">🢁</a>
                            Precio
                            <a class="btn btn-danger" href="?accion=mostrarEnlacesOrdenadosPrecioDesc&idRegalo=<?= $enlaces[0]->getIdRegalo() ?>">🢃</a>
                        </th>
                        <th class="col col-lg-2 text-center">Imagen</th>
                        <th class="col col-lg-2 text-center">Prioridad</th>
                        <th class="col col-lg-2 text-center">idRegalo</th>
                        <th class="col col-lg-2 text-center">Modificar</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                    </tr>
                </thead>

                <?php
                if (isset($enlaces)) {
                    foreach ($enlaces as $enlace) {
                ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $enlace->getId() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $enlace->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $enlace->getEnlaceWeb() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $enlace->getPrecio() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <img src="data:image/png;base64,<?= base64_encode($enlace->getImagen()) ?>" alt="Sin imagen" style="max-width: 100px; max-height: 100px;">
                            </td>

                            <td class="col col-lg-2 text-center">
                                <?= $enlace->getPrioridad() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $enlace->getIdRegalo() ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actualizarEnlaceModal<?= $enlace->getId() ?>">🎁</button>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <a href="index.php?accion=borrarEnlace&id=<?= $enlace->getId() ?>" class="btn btn-danger">🔥</a>
                            </td>

                            <?php include "VistaActualizarEnlace.php"; ?>
                        </tr>
                    <?php
                    } ?>
            </table>
            </div>

        <?php

                }
            } else {
        ?>
        <div class="text-center mt-3">
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevoEnlaceModal">Añadir Enlace</a>
        </div>
<?php
                echo '<h3 class="text-center">No hay enlaces para este regalo.</h3>';
                include "PieMain.php";
            }
            include "VistaNuevoEnlace.php";
            include "PieMain.php";
        }
    }
