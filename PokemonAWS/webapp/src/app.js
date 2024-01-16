const express = require("express");
const axios = require("axios");
const app = express();
const PORT = process.env.PORT || 8080;

// Configuración de EJS para el motor de plantillas
app.set("view engine", "ejs");
app.set("views", "./views");

// Middleware para servir archivos estáticos desde la carpeta 'public' y 'images'
app.use(express.static("public"));
app.use("/images", express.static("images"));

// Middleware para parsear el cuerpo de las peticiones POST
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Ruta para la página principal que lista todos los Pokémon
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

// Ruta para la página de registro (vista)
app.get("/register", (req, res) => {
  res.render("register");
});

// Ruta para manejar la solicitud POST desde el formulario de registro
app.post("/register", (req, res) => {
  axios
    .post("http://api:3000/api/register", req.body)
    .then((response) => {
      res.redirect("/");
    })
    .catch((error) => {
      console.error("Error al registrar:", error.message);
      res.render("register", { error: "Error al registrar" });
    });
});

// Ruta para mostrar el formulario de creación de Pokémon
app.get("/pokemon/create", (req, res) => res.render("createPokemon"));

// Ruta para manejar la solicitud POST desde el formulario de creación de Pokémon
app.post("/pokemon/create", (req, res) => {
  // Lógica para crear un nuevo Pokémon con los datos del formulario
  console.log("Datos del formulario:", req.body);
  axios
    .post("http://api:3000/api/pokemon/create", req.body)
    .then((response) => {
      // Redirigir al index
      res.redirect("/");
    })
    .catch((error) => {
      console.error("Error al crear el Pokémon:", error.message);
      res.status(500).send("Error al crear el Pokémon");
    });
});

// Ruta para ver detalles de un Pokémon
app.get("/pokemon/:id", async (req, res) => {
  const idOrName = req.params.id;

  // Intenta buscar por ID
  try {
    const response = await axios.get(
      `http://api:3000/api/pokemon/id/${idOrName}`
    );
    const pokemon = response.data;
    res.render("pokemonDetail", { pokemon });
  } catch (error) {
    // Si no encuentra por ID, busca por nombre
    try {
      const response = await axios.get(
        `http://api:3000/api/pokemon/find/${idOrName}`
      );
      const pokemon = response.data;
      res.render("pokemonDetail", { pokemon });
    } catch (error) {
      console.error(
        "Error al obtener los detalles del Pokémon:",
        error.message
      );
      res.status(500).send("Error al obtener los detalles del Pokémon");
    }
  }
});

// Ruta para mostrar el form de login
app.get("/login", (req, res) => {
  res.render("login");
});

// Ruta para manejar el POST desde el form de login
app.post("/login", (req, res) => {
  axios
    .post("http://api:3000/api/login", {
      username: req.body.username,
      password: req.body.password,
    })
    .then((response) => {
      res.redirect("/");
    })
    .catch((error) => {
      console.error("Error al iniciar sesión:", error.message);
      res.render("login", { error: "Error al iniciar sesión" });
    });
});

// Iniciar el servidor
app.listen(PORT, () => {
  console.log(`Servidor corriendo en el puerto ${PORT}`);
});
