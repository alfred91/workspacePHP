const Pokemon = require("../models/Pokemon"); // RUTA AL MODELO POKEMON
const multer = require("multer");

// Obtener todos los Pokémon
exports.getAllPokemons = async (req, res) => {
  try {
    const pokemons = await Pokemon.find().sort({ nombre: 1 });
    res.status(200).send(pokemons);
  } catch (error) {
    res.status(500).send({ message: "Error al obtener los Pokémon", error });
  }
};

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, "images/"); // Directorio donde se guardarán las imágenes
  },
  filename: (req, file, cb) => {
    cb(null, file.originalname);
  },
});

const upload = multer({ storage: storage });

// Crear un nuevo Pokémon
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
    console.error("Error al crear el Pokémon:", error);
    res.status(500).send({ message: "Error al crear el Pokémon", error });
  }
};

// Controlador para buscar Pokémon por nombre
exports.buscarPokemonPorNombre = async (req, res) => {
  try {
    const nombre = req.params.nombre;
    const pokemones = await Pokemon.find({ nombre: new RegExp(nombre, "i") });
    if (!pokemones || pokemones.length === 0) {
      return res.status(404).json({ message: "Pokémon no encontrado" });
    }

    res.status(200).json(pokemones);
  } catch (error) {
    res.status(500).json({ message: "Error al buscar Pokémon", error });
  }
};

// Obtener un Pokémon por ID
exports.getPokemonById = async (req, res) => {
  try {
    const pokemon = await Pokemon.findById(req.params.id);
    if (!pokemon) {
      return res.status(404).send({ message: "Pokémon no encontrado" });
    }
    res.status(200).send(pokemon);
  } catch (error) {
    res.status(500).send({ message: "Error al obtener el Pokémon", error });
  }
};

// Eliminar un Pokémon
exports.deletePokemon = async (req, res) => {
  try {
    const deletedPokemon = await Pokemon.findByIdAndDelete(req.params.id);
    if (!deletedPokemon) {
      return res.status(404).send({ message: "Pokémon no encontrado" });
    }
    res.status(200).send({ message: "Pokémon eliminado" });
  } catch (error) {
    res.status(500).send({ message: "Error al eliminar el Pokémon", error });
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
        .json({ message: "No se encontraron Pokémon del tipo especificado" });
    }
    res.status(200).json(pokemons);
  } catch (error) {
    res
      .status(500)
      .json({ message: "Error al obtener los Pokémon por tipo", error });
  }
};


// Atacar a un pokemon
exports.atacarPokemon = async (req, res) => {
  try {
    const pokemonId = req.params.id;
    const puntosAtaque = parseInt(req.params.puntosAtaque);

    // Obtener el Pokémon por ID
    const pokemon = await Pokemon.findById(pokemonId);

    if (!pokemon) {
      return res.status(404).json({ message: "Pokémon no encontrado" });
    }

    if (pokemon.fueraCombate) {
      return res.status(400).json({ message: "El Pokémon ya está fuera de combate" });
    }

    // Restar puntos de ataque a los puntos de salud del juego
    pokemon.puntosSaludJuego -= puntosAtaque;

    if (pokemon.puntosSaludJuego < 0) {
      pokemon.puntosSaludJuego = 0;
    }

    // Verificar si el Pokémon está fuera de combate
    const fueraCombate = pokemon.puntosSaludJuego <= 0;

    if (fueraCombate) {
      // Marcar el Pokémon como fuera de combate si no tiene puntos de salud
      pokemon.fueraCombate = true;
    }

    // Guardar los cambios en el Pokémon
    const updatedPokemon = await pokemon.save();

    // Devolver el Pokémon modificado
    res.status(200).json({ pokemon: updatedPokemon, fueraCombate });
  } catch (error) {
    res.status(500).json({ message: "Error al atacar al Pokémon", error });
  }
};
