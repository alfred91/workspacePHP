const express = require("express");
const cors = require("cors");
const mongoose = require("mongoose");
const app = express();
const authRoutes = require("./routes/authRoutes");
const pokemonRoutes = require("./routes/pokemonRoutes");

app.use(
  cors({
    origin: [,"http://44.211.39.123:8080"],
    methods: ["GET", "POST", "DELETE", "UPDATE", "PUT", "PATCH"],
    credentials: true,
    exposedHeaders: ["Authorization"],
  })
);
app.options("*", cors());

app.use(express.json());
app.use("/api", require("./routes/pokemonRoutes"));
app.use("/images", express.static("images"));
app.use(express.static("public"));

app.get("/", (req, res) => {
  res.send("API de Pokémon funcionando!");
});

// Rutas de autenticación con el prefijo /api
app.use("/api", authRoutes);

const MONGO_USERNAME = process.env.MONGO_USERNAME;
const MONGO_PASSWORD = process.env.MONGO_PASSWORD;
const MONGO_DB = process.env.MONGO_DB;

const urlMongoDb = `mongodb://${MONGO_USERNAME}:${MONGO_PASSWORD}@mongo:27017/${MONGO_DB}?authSource=admin`;

mongoose
  .connect(urlMongoDb)
  .then(() => {
    console.log("Conectado a MongoDB");
  })
  .catch((err) => {
    console.error("Error al conectar a MongoDB", err);
  });

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Servidor corriendo en el puerto ${PORT}`);
});
