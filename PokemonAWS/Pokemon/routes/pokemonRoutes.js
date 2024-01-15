const express = require("express");
const pokemonController = require("../controllers/pokemonController");
const { authenticateToken } = require("../middleware/authMiddleware");

const multer = require('multer');
const upload = multer({ dest: 'images/' });

const router = express.Router();

// Ruta Index
router.get("/", authenticateToken, async (req, res) => {
  try {
    const pokemons = await pokemonController.getAllPokemons(req, res);
    res.render("index", { pokemons });
  } catch (error) {
    console.error("Error al obtener los pokemons:", error);
    res.status(500).send("Error al cargar la página");
  }
});
// Ruta crear Pokemon
router.get("/pokemon/create", (req, res) => {
  res.render("createPokemon");
});

// Rutas para funcionalidades
router.post('/pokemon/create', authenticateToken, upload.single('imagen'), pokemonController.createPokemon);router.get("/pokemon/list", authenticateToken, pokemonController.getAllPokemons);
router.get("/pokemon/id/:id", authenticateToken,pokemonController.getPokemonById);
router.put("/pokemon/update/:id", authenticateToken,pokemonController.updatePokemon);
router.delete("/pokemon/delete/:id", authenticateToken, pokemonController.deletePokemon);
router.get("/pokemon/find/:nombre", authenticateToken, pokemonController.buscarPokemonPorNombre);
router.get('/pokemon/tipo/:tipo', authenticateToken, pokemonController.getPokemonByType);
router.put("/pokemon/ataque/:id/:puntosAtaque", authenticateToken,pokemonController.atacarPokemon);

module.exports = router;