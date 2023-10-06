<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilo.css">
    <title>Fichas de Personajes</title>
</head>
<body>
    <h1 class="h1">World of Warcraft</h1>
    <div class="container mt-5">
        <div class="row">
            <?php
                $personajes = [
                    [
                        "nombre" => "Guerrero",
                        "descripcion" => "Los guerreros se equipan con cuidado para el combate y se enfrentan a sus enemigos de frente, dejando que los ataques resbalen contra su pesada armadura. Usan diversas tácticas de combate y una gran variedad de tipos de armas para proteger a los combatientes menos hábiles. Los guerreros deben controlar cuidadosamente su ira para maximizar su efectividad en el combate.",
                        "fotos" => ["./img/guerrero.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Paladín",
                        "descripcion" => "Los paladines se colocan justo delante de sus enemigos, confiando en su pesada armadura y la sanación para poder sobrevivir a una lluvia de ataques. Ya sea con enormes escudos o con aplastantes armas a dos manos, los paladines pueden aguantar zarpas y espadas de sus compañeros más débiles, pero deben usar la magia sanadora con cuidado para asegurarse de que se mantienen en pie.",
                        "fotos" => ["./img/paladin.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Cazador",
                        "descripcion" => "Los cazadores luchan contra sus enemigos a distancia o de cerca y ordenan a sus mascotas que ataquen mientras preparan sus flechas, disparan sus armas de fuego o blanden sus armas de asta. Si bien sus armas son efectivas a corta y larga distancia, los cazadores son también extremadamente ágiles. Son capaces de evadir o entorpecer a sus enemigos para controlar el espacio de combate.",
                        "fotos" => ["./img/cazador.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Pícaro",
                        "descripcion" => "os pícaros a menudo inician sus batallas entre las sombras, comenzando con sanguinarios golpes cuerpo a cuerpo. En batallas largas, usan ataques sucesivos, cuidadosamente seleccionados para preparar al enemigo para el golpe final. Los pícaros deben tener especial cuidado al seleccionar a sus objetivos para no malgastar sus ataques de combo y deben saber cuándo esconderse o huir si la batalla se vuelve contra ellos. ",
                        "fotos" => ["./img/picaro.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Sacerdote",
                        "descripcion" => "Los sacerdotes usan poderosa magia de sanación para asegurarse de que tanto ellos como sus compañeros no son derribados. También controlan poderosos hechizos ofensivos a distancia, pero pueden verse sobrepasados por los enemigos debido a su fragilidad física y a su ligera armadura. Los sacerdotes más experimentados combinan el uso de sus hechizos ofensivos y de control con la importancia de mantener vivo al resto del grupo.
                        ",
                        "fotos" => ["./img/sacerdote.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Chamán",
                        "descripcion" => "Durante el combate, el chamán coloca totems de control y daño en el suelo para maximizar su efectividad y ponerle las cosas más difíciles a los enemigos Los chamanes son lo suficientemente versátiles para luchar contra los enemigos de cerca o a distancia, pero los chamanes sabios eligen su camino de ataque basado en los puntos fuertes y débiles de sus enemigos.",
                        "fotos" => ["./img/chaman.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Mago",
                        "descripcion" => "Los magos destruyen a sus enemigos con encantamientos arcanos. Aunque controlan poderosos hechizos ofensivos, los magos son frágiles y su armadura es ligera, lo que los hace particularmente vulnerables a los ataques a corta distancia. Los magos sabios usan sus hechizos con cuidado para mantener a sus enemigos a distancia o retenerlos en el lugar.
                        ",
                        "fotos" => ["./img/mago.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]                    
                    ],
                    [
                        "nombre" => "Brujo",
                        "descripcion" => "Los brujos incineran y destruyen a los enemigos debilitados con una combinación de atroces enfermedades y magia oscura. Mientras que sus mascotas les protegen y mejoran, los brujos golpean a los enemigos desde la distancia. Ya que son taumaturgos físicamente débiles desprovistos de una poderosa armadura, los brujos astutos dejan que sus esbirros se lleven el grueso de los ataques enemigos para salvar su propio pellejo.",
                        "fotos" => ["./img/brujo.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],[
                        "nombre" => "Monje",
                        "descripcion" => "Sea cual sea el papel que desempeñen en el combate, los monjes suelen centrarse en sus pies y manos para las acciones principales, mientras que su fuerte conexión con su chi interno les vale para potenciar sus facultades. Además, los monjes son capaces de sanar a sus aliados al tiempo que infligen daño a sus enemigos.",
                        "fotos" => ["./img/monje.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]       
                    ],
                    [
                        "nombre" => "Druida",
                        "descripcion" => "Los druidas poseen una gran variedad de estilos de combate. Pueden llevar a cabo todos los roles: sanación, tanque, daño cuerpo a cuerpo y daño a distancia. Es vital que los druidas adopten la forma adecuada para cada situación ya que cada forma conlleva un propósito diferente.",
                        "fotos" => ["./img/druida.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Cazador de Demonios",
                        "descripcion" => "Los cazadores de demonios sacrifican la armadura pesada para ganar velocidad, lo que les permite recortar distancias rápidamente y mutilar a sus enemigos con armas de una mano. No obstante, los Illidari también deben aprovechar su agilidad en aras de la defensa para asegurar la victoria.",
                        "fotos" => ["./img/cazademonios.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                    [
                        "nombre" => "Caballero de la Muerte",
                        "descripcion" => "Los caballeros de la Muerte se enfrentan a sus enemigos de cerca, asestando golpes con sus armas con magia oscura que vuelve a los enemigos vulnerables o les inflige daño con poder oscuro. Arrastran a los enemigos a enfrentamientos uno contra uno, obligándoles a concentrar sus ataques lejos de sus compañeros más débiles. Para evitar que sus enemigos escapen de sus garras, los caballeros de la Muerte deben ser conscientes del poder que invocan de las runas y controlar sus ataques de forma apropiada.",
                        "fotos" => ["./img/caballeromuerte.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]                    ],
                    [
                        "nombre" => "Evocador",
                        "descripcion" => "Los evocadores poseen facultades potenciadas especiales que pueden utilizar para cambiar la fuerza de un hechizo o facultad mientras lo lanzan. Los más habilidosos aprovechan estos hechizos potenciados y, cuando están en combate, se sitúan a cierta distancia para acabar con sus enemigos con ataques de aliento o restaurar la salud de sus aliados para que sigan en la lucha.",
                        "fotos" => ["./img/evocador.png", "./img/guerrero.png"],
                        "caracteristicas" => ["Poder sagrado", "Sanación"]
                    ],
                ];

                foreach ($personajes as $personaje) {
                    echo "<div class='col-lg-4 col-md-6 mb-4'>";
                    echo "<div class='card'>";
                    echo "<img src='". $personaje['fotos'][0] . "' class='card-img-top' alt='" . $personaje['nombre'] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $personaje['nombre'] . "</h5>";
                    echo "<p class='card-text'>" . $personaje['descripcion'] . "</p>";

                    echo "<h6>Características:</h6>";
                    echo "<ul>";
                    
                        foreach ($personaje['caracteristicas'] as $caracteristica) {

                        echo "<li>$caracteristica</li>";
                        }
                            echo "</ul>";

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
