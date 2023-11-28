<?php
namespace RegalosNavidad\vistas;

use RegalosNavidad\controladores\ControladorEnlace;

class VistaRegalos
{
    public static function render($regalos)
    {
        include("CabeceraMain.php"); ?>

        <div class="container-fluid">
            <h1 class="mt-5 text-center">🎁 Lista de Regalos de <?php echo $usuario->getNombre(); ?> 🎁 </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Destinatario</th>
                        <th class="col col-lg-2 text-center">Precio</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">
                            <a class="btn btn-danger" href="?accion=mostrarRegalosOrdenados"> 🢁 </a> Año
                            <a class="btn btn-danger" href="?accion=mostrarRegalosOrdenadosDesc"> 🢃 </a>
                        </th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
                        <th class="col col-lg-2 text-center">Detalle</th>
                        <th class="col col-lg-2 text-center">Modificar</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        
                    </tr>
                </thead>

                <?php
                if (empty($regalos)) { ?>

                    <h3 class='text-center'>
                        <?php echo $usuario->getNombre(); ?> no tiene regalos, puedes crear uno aquí
                    </h3>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevoRegaloModal">Añadir
                            Regalo</a>
                    </div>

                <?php include "VistaNuevoRegalo.php";
                } else {
                    foreach ($regalos as $regalo) {
                        ?>
                        <tr>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getNombre() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getDestinatario() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getPrecio() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getEstado() ?>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <?= $regalo->getanio() ?>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un regalo -->
                                <a href="?accion=verEnlaces&id=<?= $regalo->getId() ?>" class="btn btn-warning">🔗</a>
                            </td>

                            <td class="col col-lg-2 text-center">
                                <!-- Botón para mostrar detalles de un regalo -->
                                <a href="?accion=verDetalle&id=<?= $regalo->getId() ?>" class="btn btn-primary">🔍</a>
                            </td>
                           
                            <!-- Modify Button (Open Modal) -->
                            <td class="col col-lg-2 text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modificarRegaloModal<?= $regalo->getId() ?>"> ✍️
                                </button>
                            </td>
                            <td class="col col-lg-2 text-center">
                                <!-- Delete Button -->
                                <a href="index.php?accion=borrarRegalo&id=<?= $regalo->getId() ?>" class="btn btn-danger">🔥</a>
                            </td>
                        </tr>
                    <?php   
                        include "VistaNuevoRegalo.php";
                        include "VistaActualizarRegalo.php";
                    }
                }
                ?>
            </table>
        </div>

        <?php include "PieMain.php";
    }
}
?>