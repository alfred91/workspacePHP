const Pokemon = require("../models/Pokemon");
const multer = require("multer");

// Obtener todos los Pokemon
exports.getAllPokemons = async (req, res) => {
  try {
    const pokemons = await Pokemon.find().sort({ nombre: 1 });
    res.status(200).send(pokemons);
  } catch (error) {
    res.status(500).send({ message: "Error al obtener los Pokemon", error });
  }
};

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, "images/"); // Directorio donde se guardan las imágenes
  },
  filename: (req, file, cb) => {
    cb(null, file.originalname);
  },
});

const upload = multer({ storage: storage });

// Crear un nuevo Pokemon
exports.createPokemon = async (req, res) => {
  try {
    console.log("Datos del formulario:", req.body);
    console.log("Archivo de imagen:", req.file);

    const newPokemon = new Pokemon(req.body);
    newPokemon.imagen = req.file.filename;
    const savedPokemon = await newPokemon.save();

    console.log("Pokemon creado:", savedPokemon);

    res.status(201).send(savedPokemon);
  } catch (error) {
    console.error("Error al crear el Pokemon:", error);
    res.status(500).send({ message: "Error al crear el Pokemon", error });
  }
};

// Controlador para buscar Pokemon por nombre
exports.buscarPokemonPorNombre = async (req, res) => {
  try {
    const nombre = req.params.nombre;
    const pokemones = await Pokemon.find({ nombre: new RegExp(nombre, "i") });
    if (!pokemones || pokemones.length === 0) {
      return res.status(404).json({ message: "Pokemon no encontrado" });
    }

    res.status(200).json(pokemones);
  } catch (error) {
    res.status(500).json({ message: "Error al buscar Pokemon", error });
  }
};

// Obtener un Pokemon por ID
exports.getPokemonById = async (req, res) => {
  try {
    const pokemon = await Pokemon.findById(req.params.id);
    if (!pokemon) {
      return res.status(404).send({ message: "Pokemon no encontrado" });
    }
    res.status(200).send(pokemon);
  } catch (error) {
    res.status(500).send({ message: "Error al obtener el Pokemon", error });
  }
};

// Eliminar un Pokemon
exports.deletePokemon = async (req, res) => {
  try {
    const deletedPokemon = await Pokemon.findByIdAndDelete(req.params.id);
    if (!deletedPokemon) {
      return res.status(404).send({ message: "Pokemon no encontrado" });
    }
    res.status(200).send({ message: "Pokemon eliminado" });
  } catch (error) {
    res.status(500).send({ message: "Error al eliminar el Pokemon", error });
  }
};

// Get por tipo
exports.getPokemonByType = async (req, res) => {
  try {
    const tipo = req.params.tipo;
    const pokemons = await Pokemon.find({ tipo: tipo }).sort({ nombre: 1 });
    if (pokemons.length === 0) {
      return res
        .status(404)
        .json({ message: "No se encontraron Pokemon del tipo especificado" });
    }
    res.status(200).json(pokemons);
  } catch (error) {
    res
      .status(500)
      .json({ message: "Error al obtener los Pokemon por tipo", error });
  }
};

// Atacar a un pokemon
exports.atacarPokemon = async (req, res) => {
  try {
    const pokemonId = req.params.id;
    const puntosAtaque = parseInt(req.params.puntosAtaque);
    const pokemon = await Pokemon.findById(pokemonId);

    if (!pokemon) {
      return res.status(404).json({ message: "Pokemon no encontrado" });
    }

    if (pokemon.fueraCombate) {
      return res
        .status(400)
        .json({ message: "El Pokemon ya está fuera de combate" });
    }

    pokemon.puntosSaludJuego -= puntosAtaque;

    if (pokemon.puntosSaludJuego < 0) {
      pokemon.puntosSaludJuego = 0;
    }

    const fueraCombate = pokemon.puntosSaludJuego <= 0;

    if (fueraCombate) {
      pokemon.fueraCombate = true;
    }

    const updatedPokemon = await pokemon.save();

    res.status(200).json({ pokemon: updatedPokemon, fueraCombate });
  } catch (error) {
    res.status(500).json({ message: "Error al atacar al Pokemon", error });
  }
};
