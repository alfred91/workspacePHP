<?php

$libros = [
    "1234567890123" => [
        "isbn" => "1234567890123",
        "titulo" => "Harry Potter y la piedra filosofal",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Fantasía",
        "editorial" => "Editorial 1",
        "foto" => "./img/a.jpeg",
        "precio" => 19.99
    ],
    "2345678901234" => [
        "isbn" => "2345678901234",
        "titulo" => "Libro 2",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Fantasía",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 15.49
    ],
    "2345678901235" => [
        "isbn" => "2345678901235",
        "titulo" => "Harry potter",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Fantasía",
        "editorial" => "Editorial 2",
        "foto" => "./img/c.jpeg",
        "precio" => 15.59
    ],
    "2345678901236" => [
        "isbn" => "2345678901236",
        "titulo" => "Harrys",
        "descripcion" => "Descripción del Libro 4",
        "categoria" => "Fantasía",
        "editorial" => "Editorial 2",
        "foto" => "./img/a.jpeg",
        "precio" => 16.49
    ],
    "2345678901237" => [
        "isbn" => "2345678901237",
        "titulo" => "Harry",
        "descripcion" => "Descripción del Libro 5",
        "categoria" => "Fantasía",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 17.49
    ],
    "2345678901238" => [
        "isbn" => "2345678901238",
        "titulo" => "Harry",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Histórica",
        "editorial" => "Editorial 2",
        "foto" => "./img/c.jpeg",
        "precio" => 13.49
    ],
    "2345678901239" => [
        "isbn" => "2345678901239",
        "titulo" => "Harry",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Histórica",
        "editorial" => "Editorial 2",
        "foto" => "./img/d.jpeg",
        "precio" => 19.95
    ],
    "2345678901241" => [
        "isbn" => "2345678901241",
        "titulo" => "Libro 8",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Histórica",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "8345678901241" => [
        "isbn" => "8345678901241",
        "titulo" => "Novela Histórica",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Histórica",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.89
    ],
    "7345678901241" => [
        "isbn" => "7345678901241",
        "titulo" => "Novela Histórica",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Histórica",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.79
    ],
    "6345678901241" => [
        "isbn" => "6345678901241",
        "titulo" => "Libro 11",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Negra",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 17.66
    ],
    "5345678901241" => [
        "isbn" => "5345678901241",
        "titulo" => "Libro 12",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Negra",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "4345678901241" => [
        "isbn" => "4345678901241",
        "titulo" => "Libro 13",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Negra",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    "3345678901241" => [
        "isbn" => "3345678901241",
        "titulo" => "Libro 14",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Negra",
        "editorial" => "Editorial 2",
        "foto" => "./img/d.jpeg",
        "precio" => 11.99
    ],
    "1345678901241" => [
        "isbn" => "1345678901241",
        "titulo" => "Libro 15",
        "descripcion" => "Harry Poter y la Camara secreta",
        "categoria" => "Novela Negra",
        "editorial" => "Editorial 2",
        "foto" => "./img/b.jpeg",
        "precio" => 11.99
    ],
    
];

function mostrarLibrosPorCategoria($libros, $categoria)
{
    $librosMostrados = 0;

    echo "<h2 class='categorias'>$categoria</h2>";

    echo "<div class='layout'>";
    foreach ($libros as $isbn => $libro) {
        if ($libro["categoria"] == $categoria && $librosMostrados < 4) {
            echo "<div class='libro'>";
            echo "<img src='" . $libro["foto"] . "' alt='" . $libro["titulo"] . "'><br>";           
            echo "<strong>Título:</strong> " . $libro["titulo"] . "<br>";
            echo $libro["descripcion"] . "<br>";
            echo "<strong class='precio'>" .$libro["precio"]. "€</strong><br>";        
            echo "</div>";

            $librosMostrados++;
        }
    }

    echo "</div>";
}

?>