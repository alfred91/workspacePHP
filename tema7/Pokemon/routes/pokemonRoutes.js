const express = require("express");
const pokemonController = require("../controllers/pokemonController");
const { authenticateToken } = require("../middleware/authMiddleware");
const multer = require('multer');
const upload = multer({ dest: 'images/' });
const router = express.Router();

// Index
router.get("/", authenticateToken, async (req, res) => {
  try {
    const pokemons = await pokemonController.getAllPokemons(req, res);
    res.render("index", { pokemons });
  } catch (error) {
    console.error("Error al obtener los pokemons:", error);
    res.status(500).send("Error al cargar la página");
  }
});
// Crear Pokemon
router.get("/pokemon/create", authenticateToken, async (req, res) => {
  res.render("createPokemon");
});

// Iniciar batalla
router.get ("/pokemon/batalla",authenticateToken, async (req, res) => {
  res.render("batalla");
});


// Rutas para funcionalidades
router.post('/pokemon/create', authenticateToken, upload.single('imagen'), pokemonController.createPokemon);
router.get("/pokemon/list", authenticateToken, pokemonController.getAllPokemons);
router.get("/pokemon/id/:id", authenticateToken,pokemonController.getPokemonById);
router.delete("/pokemon/delete/:id", authenticateToken, pokemonController.deletePokemon);
router.get("/pokemon/find/:nombre", authenticateToken, pokemonController.buscarPokemonPorNombre);
router.get('/pokemon/tipo/:tipo', authenticateToken, pokemonController.getPokemonByType);
router.put("/pokemon/:id/ataque/:puntosAtaque", authenticateToken, pokemonController.atacarPokemon);

module.exports = router;