const express = require("express");
const pokemonController = require("../controllers/pokemonController");
const authController = require('../controllers/authController');
const router = express.Router();

// Ruta para la página principal que lista todos los Pokémon
router.get("/", (req, res) => {
    // Lógica para obtener la lista de Pokémon y renderizar la página principal
    // Puedes usar el código que tenías en la ruta principal ("/") antes
    res.render("index", { pokemons: [] });
});

// Ruta para la página de registro (vista)
router.get('/register', (req, res) => {
    res.render('register'); // Asegúrate de tener la vista register configurada en tu sistema de vistas
});

// Ruta para manejar la solicitud POST desde el formulario de registro
router.post('/register', authController.register, authController.loginRedirect);

// Ruta para la página de inicio de sesión (vista)
router.get('/pokemon/login', (req, res) => {
    res.render('login');
});
// Deberías tener algo como esto en tus rutas de Express
router.get('/pokemon/create', (req, res) => {
    res.render('createPokemon');
});

// Ruta para manejar la solicitud POST desde el formulario de inicio de sesión
router.post('/login', authController.login, authController.loginRedirect);

// Rutas para los Pokémon y otras funcionalidades
router.post("/pokemon/create", pokemonController.createPokemon);
router.get("/pokemon/list", pokemonController.getAllPokemons);
router.get("/pokemon/id/:id", pokemonController.getPokemonById);
router.put("/pokemon/update/:id", pokemonController.updatePokemon);
router.delete("/pokemon/delete/:id", pokemonController.deletePokemon);
router.get("/pokemon/find/:nombre", pokemonController.buscarPokemonPorNombre);
router.get("/pokemon/tipo/:tipo", pokemonController.getPokemonByType);
router.put("/pokemon/ataque/:id/:puntosAtaque", pokemonController.atacarPokemon);

// Middleware para redirigir al usuario después del registro o inicio de sesión
router.get('/pokemon/logout', authController.logout);

module.exports = router;
