<?php
namespace RegalosNavidad\vistas;


class VistaDetalle
{

    public static function render($regalo)
    {
        include ("CabeceraMain.php");
        ?>            

        <div class="container-fluid">
    
            <h1 class="mt-5 text-center">🔍 Detalle <?php echo $regalo->getNombre();?> 🔍

<a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarRegalos">
 🎁 👈🏽
            </a></h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Id Usuario</th>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Destinatario</th>
                        <th class="col col-lg-2 text-center">Precio</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <th class="col col-lg-2 text-center">Año</th>
                        <th class="col col-lg-2 text-center">Enlaces</th>
              

                    </tr>
                </thead>
                              <tr>
            <td class="col col-lg-2 text-center"><?= $regalo->getId() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getIdUsuario() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getNombre() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getDestinatario() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getPrecio() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getEstado() ?></td>
            <td class="col col-lg-2 text-center"><?= $regalo->getanio() ?></td>
            <td class="col col-lg-2 text-center">
            <a href="?accion=verEnlaces&id=<?= $regalo->getId() ?>" class="btn btn-info">🔍</a>
            </td>
           
            </td>
        </tr>

            </table>
        </div>
      
        <?php (include"PieMain.php");
    } 
}
?>