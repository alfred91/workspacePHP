<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Online</title>
</head>

<body>

    <h1>Libros Disponibles</h1>

    <?php
    include("libreria.php");
    mostrarLibrosEnTabla($libros);
    ?>

</body>

</html>
