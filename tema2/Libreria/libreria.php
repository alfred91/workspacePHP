<?php

// Definir la estructura del array asociativo para los libros
$libros = [
    "1234567890123" => [
        "isbn" => "1234567890123",
        "titulo" => "Libro 1",
        "descripcion" => "Descripción del Libro 1",
        "categoria" => "ciencias",
        "editorial" => "Editorial 1",
        "foto" => "imgs/1234567890123.jpg",
        "precio" => 19.99
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 2",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 3",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 4",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 5",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 6",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 7",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 8",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "imgs/2345678901234.jpg",
        "precio" => 15.49
    ],
    
];

// Función para mostrar la lista de libros
function mostrarLibrosEnTabla($libros)
{
    echo "<table border='1'>";
    $contador = 0;
    foreach ($libros as $libro) {
        if ($contador % 4 == 0) {
            echo "<tr>";
        }
        echo "<td>";
        echo "<strong>ISBN:</strong> " . $libro["isbn"] . "<br>";
        echo "<strong>Título:</strong> " . $libro["titulo"] . "<br>";
        echo "<strong>Descripción:</strong> " . $libro["descripcion"] . "<br>";
        echo "<strong>Categoría:</strong> " . $libro["categoria"] . "<br>";
        echo "<strong>Editorial:</strong> " . $libro["editorial"] . "<br>";
        echo "<strong>Precio:</strong> $" . number_format($libro["precio"], 2) . "<br>";
        echo "<img src='" . $libro["foto"] . "' alt='" . $libro["titulo"] . "' width='100' height='150'><br>";
        echo "</td>";
        $contador++;
        if ($contador % 4 == 0) {
            echo "</tr>";
        }
    }
    echo "</table>";
}

?>
