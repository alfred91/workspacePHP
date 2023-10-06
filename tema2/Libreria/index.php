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
    // Llamamos a la función para mostrar solo los 4 primeros libros de la categoría "Novela Histórica"
mostrarLibrosPorCategoria($libros, "Novela Histórica");

// Llamamos a la función para mostrar solo los 4 primeros libros de la categoría "Novela Negra"
mostrarLibrosPorCategoria($libros, "Novela Negra");
    ?>
</div>
<footer>
    <br>Alfredo - IES Jaroso
</footer>
</body>

</html>
