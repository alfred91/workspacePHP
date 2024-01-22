const express = require("express");
const axios = require("axios");
const app = express();
const PORT = process.env.PORT || 8080;

// Configuración de EJS para el motor de plantillas
app.set("view engine", "ejs");
app.set("views", "./views");

// Middleware para servir archivos estáticos
app.use(express.static("public"));
app.use("/images", express.static("images"));

// Middleware para parsear el cuerpo de las peticiones POST
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Ruta para la página principal que lista los Pokemon
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

// Ruta para la vista de registro
app.get("/register", (req, res) => {
  res.render("register");
});

// Ruta para manejar la solicitud POST desde el formulario de registro
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

// Ruta para mostrar el formulario de inicio de sesión
app.get("/login", (req, res) => {
  res.render("login");
});

// Ruta para manejar el POST desde el formulario de inicio de sesión
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

// Ruta para mostrar la vista de batalla
app.get("/pokemon/batalla", async (req, res) => {
  try {
    const response = await axios.get(
      "http://api:3000/api/pokemon/list"
    );
    const pokemons = response.data;
    res.render("batalla", { pokemons });
  } catch (error) {
    console.error("Error al obtener los pokemons:", error.message);
    res.render("batalla", { pokemons: [] });
  }
});

// Ruta para mostrar el formulario de crear Pokemon
app.get("/pokemon/create", (req, res) => res.render("createPokemon"));

// Ruta para manejar la solicitud POST desde el formulario
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
