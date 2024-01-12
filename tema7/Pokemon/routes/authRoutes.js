const express = require("express");
const router = express.Router();
const authController = require("../controllers/authController");

// Rutas para autenticación
router.post("/register", authController.register);
router.post("/login", authController.login, authController.loginRedirect);
router.get("/logout", authController.logout);

// Ruta para la página de registro (vista)
router.get("/register", (req, res) => {
  res.render("register");
});

// Ruta para la página de inicio de sesión (vista)
router.get("/login", (req, res) => {
  res.render("login");
});

module.exports = router;
