<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Online</title>
    <link rel="stylesheet" href="./css/1.css">

</head>

<body>
<div class="container">
    <h1>LIBRERÍA JAROSO 2023</h1>
    <br>

    <?php
    include("libreria.php");
    
mostrarLibrosPorCategoria($libros, "Novela Histórica");

mostrarLibrosPorCategoria($libros, "Novela Negra");
    ?>
</div>
<footer>
    <br>Alfredo - IES Jaroso
</footer>
</body>

</html>
