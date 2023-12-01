<?php
namespace Padel\vistas;


class VistaDetalle
{

    public static function render($partida)
    {
        include ("CabeceraMain.php");
        ?>            

        <div class="container-fluid">
    
            <h1 class="mt-5 text-center"> Detalle <?php echo $partida->getNombre();?> 🔍

<a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarpartidas">
 🎁 
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
            <td class="col col-lg-2 text-center"><?= $partida->getId() ?></td>
            <td class="col col-lg-2 text-center"><?= $partida->getIdUsuario() ?></td>
            <td class="col col-lg-2 text-center"><?= $partida->getNombre() ?></td>
            <td class="col col-lg-2 text-center"><?= $partida->getDestinatario() ?></td>
            <td class="col col-lg-2 text-center"><?= $partida->getPrecio() ?></td>
            <td class="col col-lg-2 text-center"><?= $partida->getEstado() ?></td>
            <td class="col col-lg-2 text-center"><?= $partida->getJugadoresPartida() ?></td>
            <td class="col col-lg-2 text-center">
            <a href="?accion=verEnlaces&id=<?= $partida->getId() ?>" class="btn btn-warning">🔗</a>
            </td>
           
            </td>
        </tr>

            </table>
        </div>
      
        <?php (include"PieMain.php");
    } 
}
?>