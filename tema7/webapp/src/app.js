const express = require("express");
const app = express();
const axios = require("axios");
const PORT = process.env.PORT || 8080;

// Configuración de EJS
app.set("view engine", "ejs");
app.set("views", "views");

// Middleware para servir archivos estáticos
app.use(express.static("public"));

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
app.get("/pokemon/:id", (req, res) => {
    axios.get(`http://api:3000/api/pokemon/id/${req.params.id}`)
        .then(response => {
            // Renderizamos la plantilla con los datos del Pokémon
            res.render("pokemonDetail", { pokemon: response.data });
        })
        .catch(error => {
            console.error("Error al obtener los detalles del Pokémon:", error.message);
            res.status(500).send("Error al obtener los detalles del Pokémon");
        });
});

// Iniciar el servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en el puerto ${PORT}`);
});
