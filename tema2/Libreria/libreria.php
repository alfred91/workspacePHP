<?php

// Definir la estructura del array asociativo para los libros
$libros = [
    "1234567890123" => [
        "isbn" => "1234567890123",
        "titulo" => "Harry Potter y la piedra filosofal",
        "descripcion" => "Descripción del Libro 1",
        "categoria" => "ciencias",
        "editorial" => "Editorial 1",
        "foto" => "./img/a.jpeg",
        "precio" => 19.99
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 2",
        "descripcion" => "Descripción del Libro 2",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 15.49
    ],
    "2345678901235" => [
        "isbn" => "2345678901235",
        "titulo" => "Libro 3",
        "descripcion" => "Descripción del Libro 3",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/c.jpeg",
        "precio" => 15.59
    ],
    "2345678901236" => [
        "isbn" => "2345678901236",
        "titulo" => "Libro 4",
        "descripcion" => "Descripción del Libro 4",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/a.jpeg",
        "precio" => 16.49
    ],
    "2345678901237" => [
        "isbn" => "2345678901237",
        "titulo" => "Libro 5",
        "descripcion" => "Descripción del Libro 5",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 17.49
    ],
    "2345678901238" => [
        "isbn" => "2345678901238",
        "titulo" => "Libro 6",
        "descripcion" => "Descripción del Libro 6",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/c.jpeg",
        "precio" => 13.49
    ],
    "2345678901239" => [
        "isbn" => "2345678901239",
        "titulo" => "Libro 7",
        "descripcion" => "Descripción del Libro 7",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/d.jpeg",
        "precio" => 19.95
    ],
    "2345678901241" => [
        "isbn" => "2345678901241",
        "titulo" => "Libro 8",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "8345678901241" => [
        "isbn" => "8345678901241",
        "titulo" => "Libro 9",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "7345678901241" => [
        "isbn" => "7345678901241",
        "titulo" => "Libro 10",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "6345678901241" => [
        "isbn" => "6345678901241",
        "titulo" => "Libro 11",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "5345678901241" => [
        "isbn" => "5345678901241",
        "titulo" => "Libro 12",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "4345678901241" => [
        "isbn" => "4345678901241",
        "titulo" => "Libro 13",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "3345678901241" => [
        "isbn" => "3345678901241",
        "titulo" => "Libro 14",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/d.jpeg",
        "precio" => 11.99
    ],
    "1345678901241" => [
        "isbn" => "1345678901241",
        "titulo" => "Libro 15",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "cocina",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    
];

// Función para mostrar la lista de libros en una tabla
function mostrarLibrosEnTabla($libros)
{
    echo "<table border='1'>";
    $contador = 0;
    echo "<tr>"; // Inicia una nueva fila antes de comenzar a mostrar los libros
    foreach ($libros as $isbn => $libro) {
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
            echo "</tr><tr>"; // Cierra la fila después de cada 4 libros y comienza una nueva fila
        }
    }
    echo "</tr>"; // Cierra la última fila
    echo "</table>";
}

?>
