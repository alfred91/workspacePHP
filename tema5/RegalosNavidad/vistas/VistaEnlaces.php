<?php namespace RegalosNavidad\vistas;

use RegalosNavidad\controladores\ControladorEnlace;

class VistaEnlaces
{

    public static function render($enlaces){
        include "CabeceraMain.php";
        ?>            
<h1 class="mt-5 text-center">Lista de Enlaces

<a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarTodos">
🎁  👈🏽
            </a></h1>
        <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Enlace Web</th>
                        <th class="col col-lg-2 text-center">Precio</th>
                        <th class="col col-lg-2 text-center">Imagen</th>
                        <th class="col col-lg-2 text-center">Prioridad</th>
                        <th class="col col-lg-2 text-center">idRegalo</th>
                        <th class="col col-lg-2 text-center">Eliminar</th>
                        <th class="col col-lg-2 text-center">Modificar</th>

                    </tr>
                </thead>
                
                    <?php
                        foreach ($enlaces as $enlace) {
                            ?>
                              <tr>
            <td class="col col-lg-2 text-center"><?= $enlace->getId() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getNombre() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getEnlaceWeb() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getPrecio() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getImagen() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getPrioridad() ?></td>
            <td class="col col-lg-2 text-center"><?= $enlace->getIdRegalo()?></td>
    <!-- Botón para mostrar detalles de un regalo -->
  

            
            <td class="col col-lg-2 text-center">
                <!-- Delete Button -->
                <a href="index.php?accion=borrarEnlace&id=<?= $enlace->getId() ?>" class="btn btn-danger">🔥</a>
            </td>
            <td class="col col-lg-2 text-center">
            <a href="?accion=modificarEnlace&id=<?= $enlace->getId() ?>" class="btn btn-info">🎁</a>
            </td>

                              </tr>
        

                            <?php
                        }
                    
                    ?>
            </table>
        </div>
      
        <?php (include"PieMain.php");
    } 
}
?>