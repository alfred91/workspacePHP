const express = require("express");
const router = express.Router();
const authController = require("../controllers/authController");
const { authenticateToken } = require("../middleware/authMiddleware");

// Rutas para autenticación
router.post("/register", authController.register);
router.post("/login", authController.login);
router.get("/logout", authController.logout);

// Ruta para la página de registro (vista)
router.get("/register", (req, res) => {
  res.render("register");
});

// Ruta para manejar la solicitud POST desde el formulario de registro
router.post("/api/pokemon/register", authController.register);

// Ruta para la página de inicio de sesión (vista)
router.get("/login", (req, res) => {
  res.render("login");
});

// Ruta para manejar la solicitud POST desde el formulario de inicio de sesión
router.post("/login", authController.login, authController.loginRedirect);

// Middleware para redirigir al usuario después del registro o inicio de sesión
router.get("/pokemon/logout", authController.logout);

module.exports = router;
