<?php

namespace Padel\vistas;

class VistaDetallePartida
{
    public static function render($partida)
    {
        include("CabeceraMain.php");
?>
        <div class="container-fluid">
            <h1 class="mt-5 text-center"> Detalle <?= $partida->getId(); ?>
                <a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarpartidas">

                </a>
            </h1>

            <table class="table table-striped table-bordered mt-4">
                <thead class="bg-success text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">ID</th>
                        <th class="col col-lg-2 text-center">Fecha</th>
                        <th class="col col-lg-2 text-center">Hora</th>
                        <th class="col col-lg-2 text-center">Ciudad</th>
                        <th class="col col-lg-2 text-center">Lugar</th>
                        <th class="col col-lg-2 text-center">Cubierto</th>
                        <th class="col col-lg-2 text-center">Estado</th>
                        <?php
                        $estado = $partida->getEstado();
                        if ($estado == 'Abierta') {
                        ?>
                            <th class="col col-lg-2 text-center">Apuntarse</th>
                        <?php
                        }
                        ?>
                        <th class="col col-lg-2 text-center">Borrarse</th>
                        <th class="col col-lg-2 text-center">Borrar Partida</th>
                    </tr>
                </thead>
                <tr>
                    <td class="col col-lg-2 text-center"><?= $partida->getId() ?></td>
                    <td class="col col-lg-2 text-center"><?= $partida->getFecha() ?></td>
                    <td class="col col-lg-2 text-center"><?= $partida->getHora() ?></td>
                    <td class="col col-lg-2 text-center"><?= $partida->getCiudad() ?></td>
                    <td class="col col-lg-2 text-center"><?= $partida->getLugar() ?></td>
                    <td class="col col-lg-2 text-center"><?= $partida->getCubierto() ?></td>
                    <td class="col col-lg-2 text-center"><?= $partida->getEstado() ?></td>

                    <?php
                    $estado = $partida->getEstado();
                    if ($estado == 'Abierta') {
                    ?>
                        <td class="col col-lg-2 text-center">
                            <a href="?accion=apuntarsePartida&id=<?= $partida->getId() ?>" class="btn btn-success">-></a>
                        </td>
                    <?php
                    }
                    ?>
                    <td class="col col-lg-2 text-center">
                        <a href="?accion=borrarsePartida&id=<?= $partida->getId() ?>" class="btn btn-warning">x</a>
                    </td>
                    <td class="col col-lg-2 text-center">
                        <a href="?accion=eliminarPartida&id=<?= $partida->getId() ?>" class="btn btn-danger">X</a>
                    </td>
                </tr>
            </table>

            <h2 class="mt-4 text-center">Jugadores en la Partida</h2>
            <table class="table table-striped table-bordered mt-2 width='500'">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="col col-lg-2 text-center">Nombre</th>
                        <th class="col col-lg-2 text-center">Apodo</th>
                        <th class="col col-lg-2 text-center">Nivel</th>
                        <th class="col col-lg-2 text-center">Edad</th>
                    </tr>
                </thead>
                <tr>
                    <?php
                    $jugadores = $partida->getJugadores();
                    if (!empty($jugadores)) {
                        foreach ($jugadores as $jugador) {
                            echo '<td class="col col-lg-2 text-center">' . $jugador->getNombre() . '</td>';
                            echo '<td class="col col-lg-2 text-center">' . $jugador->getApodo() . '</td>';
                            echo '<td class="col col-lg-2 text-center">' . $jugador->getNivel() . '</td>';
                            echo '<td class="col col-lg-2 text-center">' . $jugador->getEdad() . '</td>';
                            echo '</tr><tr>';
                        
                        }
                    } else {
                        echo '<td class="col col-lg-8 text-center" colspan="4">No hay jugadores inscritos.</td>';
                    }
                    ?>
                </tr>
            </table>
        </div>
<?php
        //include "PieMain.php";
    }
}
?>