const express = require("express");
const router = express.Router();
const authController = require("../controllers/authController");

// Rutas de autenticacion
router.post("/register", authController.register);
router.post("/login", authController.login, authController.loginRedirect);
router.get("/logout", authController.logout);

// Rutas para las vistas
router.get("/register", (req, res) => {
  res.render("register");
});

router.get("/login", (req, res) => {
  res.render("login");
});

module.exports = router;