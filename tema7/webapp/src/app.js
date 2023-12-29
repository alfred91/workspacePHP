const express = require("express");
const app = express();
const axios = require("axios");
const PORT = process.env.PORT || 8080;

// Configuración de EJS
app.set("view engine", "ejs");
app.set("views", "views");

// Middleware para servir archivos estáticos
app.use(express.static("public"));
app.use('/images', express.static('../images/'));

// Middleware para parsear el cuerpo de las peticiones POST
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Ruta para la página principal que lista todos los Pokémon
app.get("/", (req, res) => {
    axios.get('http://api:3000/api/pokemon/list')
        .then(response => {
            // Pasamos los pokemons a la plantilla
            res.render("index", { pokemons: response.data });
        })
        .catch(error => {
            // En caso de error, pasamos un array vacío
            console.error("Error al obtener los pokemons:", error.message);
            res.render("index", { pokemons: [] });
        });
});

// Rutas para las demás vistas
app.get("/login", (req, res) => res.render("login"));
app.get("/register", (req, res) => res.render("register"));
app.get("/pokemon/create", (req, res) => res.render("create-pokemon"));

// Ruta para ver los detalles de un Pokémon específico
app.get("/pokemon/:id", async (req, res) => {
    const idOrName = req.params.id;

    // Intenta buscar el Pokémon por ID
    try {
        const response = await axios.get(`http://api:3000/api/pokemon/id/${idOrName}`);
        const pokemon = response.data;
        res.render("pokemonDetail", { pokemon });
    } catch (error) {
        // Si no se encuentra por ID, intenta buscar por nombre
        try {
            const response = await axios.get(`http://api:3000/api/pokemon/find/${idOrName}`);
            const pokemon = response.data;
            res.render("pokemonDetail", { pokemon });
        } catch (error) {
            console.error("Error al obtener los detalles del Pokémon:", error.message);
            res.status(500).send("Error al obtener los detalles del Pokémon");
        }
    }
});

// Iniciar el servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en el puerto ${PORT}`);
});
