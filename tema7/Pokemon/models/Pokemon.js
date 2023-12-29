const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const PokemonSchema = new Schema({
  nombre: { type: String, required: true },
  especie: { type: String, required: true },
  preevolucion: { type: String, default: null },
  evolucion: { type: String, default: null },
  tipo: [{ type: String }], // Array de tipos
  imagen: { type: String, required: true },
  altura: { type: Number, required: true },
  peso: { type: Number, required: true },
  vida: { type: Number, required: true },
  puntosSaludJuego: { type: Number, required: true },
  habilidades: [{
    nombre: { type: String, required: true },
    damage: { type: Number, required: true }
  }]
});

module.exports = mongoose.model("Pokemon", PokemonSchema);
