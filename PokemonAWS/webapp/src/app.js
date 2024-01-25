const express = require("express");
const axios = require("axios");
const app = express();
const PORT = process.env.PORT || 8080;

app.set("view engine", "ejs");
app.set("views", "./views");

app.use(express.static("public"));
app.use("/images", express.static("images"));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

//  Ruta Index
app.get("/", (req, res) => {
  axios
    .get("http://api:3000/api/pokemon/list")
    .then((response) => {
      res.render("index", { pokemons: response.data });
    })
    .catch((error) => {
      console.error("Error al obtener los pokemons:", error.message);
      res.render("index", { pokemons: [] });
    });
});

// Ruta para el Registro
app.get("/register", (req, res) => {
  res.render("register");
});

app.post("/register", (req, res) => {
  axios
    .post("http://api:3000/api/register", req.body)
    .then(() => {
      res.redirect("/");
    })
    .catch(() => {
      console.error("Error al registrar");
      res.render("register", { error: "Error al registrar" });
    });
});

// Ruta para el Inicio de Sesion
app.get("/login", (req, res) => {
  res.render("login");
});

app.post("/login", (req, res) => {
  axios
    .post("http://api:3000/api/login", {
      username: req.body.username,
      password: req.body.password,
    })
    .then(() => {
      res.redirect("/");
    })
    .catch(() => {
      console.error("Error al iniciar sesión");
      res.render("login", { error: "Error al iniciar sesión" });
    });
});

// Ruta para mostrar la vista de Batalla
app.get("/pokemon/batalla", async (req, res) => {
  try {
    const response = await axios.get("http://api:3000/api/pokemon/list");
    const pokemons = response.data;
    res.render("batalla", { pokemons });
  } catch (error) {
    console.error("Error al obtener los pokemons:", error.message);
    res.render("batalla", { pokemons: [] });
  }
});

// Ruta para Crear Pokemon
app.get("/pokemon/create", (req, res) => res.render("createPokemon"));

app.post("/pokemon/create", (req, res) => {
  axios
    .post("http://api:3000/api/pokemon/create", req.body)
    .then(() => {
      res.redirect("/");
    })
    .catch(() => {
      console.error("Error al crear el Pokemon");
      res.status(500).send("Error al crear el Pokemon");
    });
});

// Ruta para ver detalles de un Pokemon
app.get("/pokemon/:id", async (req, res) => {
  const idOrName = req.params.id;

  try {
    const response = await axios.get(
      `http://api:3000/api/pokemon/id/${idOrName}`
    );
    const pokemon = response.data;
    res.render("pokemonDetail", { pokemon });
  } catch (error) {
    try {
      const response = await axios.get(
        `http://api:3000/api/pokemon/find/${idOrName}`
      );
      const pokemon = response.data;
      res.render("pokemonDetail", { pokemon });
    } catch (error) {
      console.error("Error al obtener los detalles del Pokemon");
      res.status(500).send("Error al obtener los detalles del Pokemon");
    }
  }
});

// Iniciar el servidor
app.listen(PORT, () => {
  console.log(`Servidor corriendo en el puerto ${PORT}`);
});
