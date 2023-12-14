<?php

namespace Examne\Vistass;

class VistaDetalleAmigo
{
    public static function render($amigo)
    {
        include("CabeceraMain.php");
?>
        <div class="container-fluid">
            <h1 class="mt-5 text-center"> Detalle <?= $amigo->getId(); ?>
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
                        $participantes = $amigo->getParticipantes();

                        $usuarioInscrito = false;
                        foreach ($participantes as $participante) {
                            if ($idUsuario !== null && $idUsuario === $participante->getId()) {
                                $usuarioInscrito = true;
                                break;
                            }
                        }
                        $estado = $amigo->getestado();
                        if ($estado == 'Abierta' && !$usuarioInscrito) {
                        ?>
                            <th class="col col-lg-2 text-center">Apuntarse</th>

                        <?php
                        }

                        if ($usuarioInscrito && $estado == 'Abierta') {
                        ?> <th class="col col-lg-2 text-center">Borrarse</th>
                            <th class="col col-lg-2 text-center">Borrar Partida</th>
                        <?php }
                        if ($usuarioInscrito && $estado == 'Cerrada') {
                        ?> <th class="col col-lg-2 text-center">Borrar Partida</th>

                        <?php }

                        ?>
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
                    if ($estado == 'Abierta' && !$usuarioInscrito) {
                    ?>
                        <td class="col col-lg-2 text-center">
                            <a href="?accion=apuntarsePartida&id=<?= $partida->getId() ?>" class="btn btn-success">-></a>
                        </td>
                    <?php
                    }
                    if ($usuarioInscrito && $estado == 'Abierta') {
                    ?>

                        <td class="col col-lg-2 text-center">
                            <a href="?accion=borrarsePartida&id=<?= $partida->getId() ?>" class="btn btn-warning">x</a>
                        </td>
                        <td class="col col-lg-2 text-center">
                            <a href="?accion=eliminarPartida&id=<?= $partida->getId() ?>" class="btn btn-danger">X</a>
                        </td>

                    <?php
                    }
                    if ($usuarioInscrito && $estado == 'Cerrada') { ?>
                        <td class="col col-lg-2 text-center">
                            <a href="?accion=eliminarPartida&id=<?= $partida->getId() ?>" class="btn btn-danger">X</a>
                        </td>
                    <?php }
                    ?>
                    </td>
                </tr>
            </table>

            <h2 class="mt-4 text-center">Participantes del regalo:</h2>
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
                    $participantes = $amigo->getParticipantes($participantes);

                    foreach ($participantes as $participante) {
                        echo '<td class="col col-lg-2 text-center">' . $participante->getNombre() . '</td>';
                        echo '<td class="col col-lg-2 text-center">' . $participante->getEmail() . '</td>';
                        echo '<td class="col col-lg-2 text-center">' . $participante->getTelefono() . '</td>';
                        echo '</tr><tr>';
                    }

                    echo '<td class="col col-lg-8 text-center" colspan="4">No hay participantes para este regalo.</td>';

                    ?>
                </tr>
            </table>
        </div>
<?php
    }
}
?>