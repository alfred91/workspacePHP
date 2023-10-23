<?php include 'cartas.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 y media</title>
</head>
<body>

    <div class="carta-boca-abajo" onclick="pedirCarta()"></div>

    <?php foreach ($_SESSION["cartasUsuario"] as $carta): ?>
    <div class='carta' style="background-image: url('cartas/<?php echo $carta; ?>.svg');"></div>
<?php endforeach; ?>

<br>

    <?php if (!isset($_SESSION['resultado'])): ?>
        <form method="post">
            <button type="submit" name="pedir">Pedir Carta</button>
            <button type="submit" name="reiniciar" class="reiniciar">Reiniciar</button>
        </form>
    <?php endif; ?>

    <h2>Partidas jugadas:<?php echo $_SESSION['cartasJugadas'];?></h2>
    <h2>Partidas ganadas:<?php echo $_SESSION['cartasJugadas'] - count($_SESSION['mazo']);?></h2>
    <h2>Partidas perdidas:<?php echo count($_SESSION['mazo']);?></h2>

<script>
        function pedirCarta() {
            document.querySelector('.carta-boca-abajo').style.backgroundImage = "url('cartas/<?php echo end($_SESSION['mazo']); ?>.svg')";
        }
    </script>
</body>
</html>