<?php
function subtotal($linea_pedido) {
    $precio = $linea_pedido["precio"];
    $cantidad = $linea_pedido["cantidad"];
    $ivaR = $linea_pedido["ivaR"];
    $ivaPorcentaje = ($ivaR == 0) ? 0.21 : 0.1;
    $subtotalConIva = $precio * $cantidad * (1 + $ivaPorcentaje);
    return $subtotalConIva;
}
?>