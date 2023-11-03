<?php session_start();
//CREAMOS EL MAZO SI NO ESTA CREADO
if (!isset($_SESSION['mazo'])) {
    $_SESSION['mazo'] = array(
                'c1','c2','c3','c4','c5','c6','c7','c11','c12','c13',
                'd1','d2','d3','d4','d5','d6','d7','d11','d12','d13',
                'p1','p2','p3','p4','p5','p6','p7','p11','p12','p13',
                't1','t2','t3','t4','t5','t6','t7','t11','t12','t13');

    shuffle($_SESSION['mazo']); //BARAJAR
    $_SESSION['cartasJugadas'] = 0;
    $_SESSION['cartasUsuario'] = array();
}

// FUNCION PARA CALCULAR LA SUMA DE LOS VALORES DE LAS CARTAS
    function sumaCartas($cartas) {
        $suma = 0;
        foreach ($cartas as $carta) {
            $valor = intval(substr($carta, 1));
            if ($valor > 7) {
                $suma += 0.5;
            } else {
                $suma += $valor;
            }
        }
        return $suma;
    }

// PEDIR CARTA
    if (isset($_POST['pedir'])) {

        $carta = array_shift($_SESSION['mazo']);
        $_SESSION['cartasUsuario'][] = $carta;
        $_SESSION['cartasJugadas']++;

        $suma = sumaCartas($_SESSION['cartasUsuario']);
        
            if ($suma > 7.5) {
                $_SESSION['resultado'] = 'Has perdido';

            } elseif ($suma == 7.5) {
                $_SESSION['resultado'] = 'Has ganado';

            }

        
}
//REINICIAR
    if (isset($_POST['reiniciar'])) {
        session_destroy();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego 7 y media</title>
    <style>
        .contenedor {
            margin: 0 auto;
            text-align: left;
            position: relative;
            }
        
        body {
        margin: 0 auto;
        text-align: left;
        background: #006400; 
            }
            
        .carta-container {
            display: flex;
            justify-content: flex-start;            
            }

        .carta-fila {
        display: flex;
        justify-content: flex-end;
            }

        .carta {
            width: 150px;
            height: 210px;
            margin: 10px;
            background-size: cover;
            }

        .pedir {
            background-image: url('cartas/dorso-rojo.svg');
            width: 150px;
            height: 200px;
            margin-right: 20px;
            position:left ;
            margin: 10px;

            }

        .reiniciar-btn {
            margin-top: 20px;
            }

        .resultado {
            margin-top: 20px;
            }

    </style>
</head>
<body>
    <table>
        <tr class="carta-fila">
            <td>
            <form method="post">
            <?php if (count($_SESSION['mazo']) > 0): ?>
                <button type="submit" name="pedir" class="pedir"></button>
            <?php endif; ?>
        </form>
            </td>
            
            <td class="carta-container">
            <?php foreach ($_SESSION["cartasUsuario"] as $carta): ?>
                <div class='carta' style="background-image: url('cartas/<?php echo $carta; ?>.svg');"></div>
            <?php endforeach; ?>
            </td>
        </tr>
    </table>

        <div class="reiniciar-btn">
            <form method="post">
                <button type="submit" name="reiniciar">Reiniciar</button>
            </form>
        </div>

        <div class="resultado">
            <h2>Cartas jugadas: <?php echo $_SESSION['cartasJugadas']; ?></h2>
            <h2>Suma: <?php echo sumaCartas($_SESSION['cartasUsuario']); ?></h2>
            <h2>Cartas restantes en el mazo: <?php echo count($_SESSION['mazo']); ?></h2>

            <?php if (sumaCartas($_SESSION['cartasUsuario']) > 7): ?>
                <h2>Resultado: <?php echo isset($_SESSION['resultado']) ? $_SESSION['resultado'] : ""; ?></h2>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
