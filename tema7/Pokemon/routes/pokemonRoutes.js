const express = require("express");
const pokemonController = require("../controllers/pokemonController");
const router = express.Router();

// Ruta para la página principal
router.get("/", async (req, res) => {
  try {
    const pokemons = await pokemonController.getAllPokemons(req, res);
    res.render("index", { pokemons });
  } catch (error) {
    console.error("Error al obtener los pokemons:", error);
    res.render("index", { pokemons: [] });
  }
});

router.get("/pokemon/create", (req, res) => {
  res.render("createPokemon");
});

// Rutas para los Pokémon / funcionalidades
router.post("/pokemon/create", pokemonController.createPokemon);
//router.post("/pokemon/create", authenticateToken, pokemonController.createPokemon);
router.get("/pokemon/list", pokemonController.getAllPokemons);
router.get("/pokemon/id/:id", pokemonController.getPokemonById);
router.put("/pokemon/update/:id", pokemonController.updatePokemon);
router.delete("/pokemon/delete/:id", pokemonController.deletePokemon);
router.get("/pokemon/find/:nombre", pokemonController.buscarPokemonPorNombre);
router.get("/pokemon/tipo/:tipo", pokemonController.getPokemonByType);
router.put(
  "/pokemon/ataque/:id/:puntosAtaque",
  pokemonController.atacarPokemon
);

//router.get('/pokemon/detail', authenticateToken, pokemonController.algunaFuncion);

module.exports = router;
