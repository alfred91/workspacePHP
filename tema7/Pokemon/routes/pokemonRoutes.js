const express = require("express");
const pokemonController = require("../controllers/pokemonController");
const { authenticateToken } = require("../middleware/authMiddleware");
const multer = require('multer');
const upload = multer({ dest: 'uploads/' });

const router = express.Router();

// Ruta para la página principal
router.get("/", authenticateToken, async (req, res) => {
  try {
    const pokemons = await pokemonController.getAllPokemons(req, res);
    console.log("Pokémons obtenidos:", pokemons); // Agrega este console.log para verificar los datos
    res.render("index", { pokemons });
  } catch (error) {
    console.error("Error al obtener los pokemons:", error);
    res.status(500).send("Error al cargar la página");
  }
});


router.get("/pokemon/create", (req, res) => {
  res.render("createPokemon");
});

// Rutas para los Pokémon / funcionalidades

router.post('/pokemon/create', authenticateToken, pokemonController.createPokemon);
router.get("/pokemon/list", authenticateToken, pokemonController.getAllPokemons);
router.get("/pokemon/id/:id", pokemonController.getPokemonById);
router.put("/pokemon/update/:id", authenticateToken,pokemonController.updatePokemon);
router.delete("/pokemon/delete/:id", authenticateToken, pokemonController.deletePokemon);
router.get("/pokemon/find/:nombre", authenticateToken, pokemonController.buscarPokemonPorNombre);
router.get('/pokemon/tipo/:tipo', authenticateToken, pokemonController.getPokemonByType);
router.put("/pokemon/ataque/:id/:puntosAtaque", pokemonController.atacarPokemon);

//router.get('/pokemon/detail', authenticateToken, pokemonController.algunaFuncion);

module.exports = router;
