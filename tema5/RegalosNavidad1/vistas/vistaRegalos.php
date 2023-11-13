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
            
            <h1 class="mt-5 text-center">Lista de Regalos de <?php echo $_SESSION['nombre']?></h1>
        <table>
        <tr><td><button class="btn btn-success" a href="?addRegalo">Añadir regalo</button></td>
            <td><a class="btn btn-info href="#" data-bs-toggle="modal"
                                        data-bs-target="#nuevoRegaloModal">Añadir Regalo</a></td></tr>

        </table>


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
                        echo $enlace->getNombreRegalo();  // Acceder al nombre del regalo desde el JOIN
                        echo $enlace->getEnlaceWeb();
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