<?php session_start();
if (!isset($_SESSION['mazo'])) {
    
    $mazo=array('c1','c2','c3','c4','c5','c6','c7','c11','c12','c13',
                'd1','d2','d3','d4','d5','d6','d7','d11','d12','d13',
                'p1','p2','p3','p4','p5','p6','p7','p11','p12','p13',
                't1','t2','t3','t4','t5','t6','t7','t11','t12','t13');

    shuffle($mazo);
    $_SESSION['mazo']=$mazo;
    $_SESSION['cartasJugadas'] = 0;
    $_SESSION['cartasUsuario'] = array();
}

if (isset($_POST['pedir'])) {

    $carta=array_shift($_SESSION['mazo']);

    $_SESSION['cartasUsuario'][]=$carta;

    $_SESSION['cartasJugadas']++;

    $suma=sumaCartas($_SESSION['cartasUsuario']);

    if ($suma>=7.5) {
        $_SESSION['resultado'] = ($suma==7.5) ?'Has ganado':'Has perdido';
    }

}
function sumaCartas($cartas) {

$suma=0;

foreach ($cartas as $carta) {

    $valor=intval(substr($carta,1));

    if ($valor > 7) {
        $suma += 0.5;
    } else {
        $suma += $valor;
    }
}
return $suma;
}?>