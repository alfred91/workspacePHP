const express = require("express");
const pokemonController = require("../controllers/pokemonController");
const authController = require("../controllers/authController");

const router = express.Router();

// Rutas para los Pokémon
router.post("/pokemon/create", pokemonController.createPokemon);
router.get("/pokemon/list", pokemonController.getAllPokemons);
router.get("/pokemon/id/:id", pokemonController.getPokemonById);
router.put("/pokemon/update/:id", pokemonController.updatePokemon);
router.delete("/pokemon/delete/:id", pokemonController.deletePokemon);
router.get("/pokemon/find/:nombre", pokemonController.buscarPokemonPorNombre);
router.get("/pokemon/tipo/:tipo", pokemonController.getPokemonByType);
router.put("/pokemon/ataque/:id/:puntosAtaque", pokemonController.atacarPokemon);

// Ruta para el registro de usuario
router.post('/register', authController.register);

module.exports = router;