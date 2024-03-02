const User = require("../models/User");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");

// Registro
exports.register = async (req, res) => {
  try {
    const { username, password } = req.body;
    const existingUser = await User.findOne({ username });
    
    if (existingUser) {
      return res.status(400).json({ message: "El usuario ya existe" });
    }

    // Cifrar la contraseña y crear el usuario
    const hashedPassword = await bcrypt.hash(password, 10);

    const newUser = new User({
      username,
      password: hashedPassword,
    });

    await newUser.save();

    res.status(201).json({ message: "Usuario registrado correctamente" });
  } catch (error) {
    console.error("Error al registrar usuario:", error);
    res
      .status(500)
      .json({ message: "Error interno del servidor al registrar usuario" });
  }
};

// Inicio de sesión
exports.login = async (req, res) => {
  try {
    const { username, password } = req.body;

    const user = await User.findOne({ username });

    if (!user) {
      return res.status(401).json({ message: "Nombre de Usuario incorrecto" });
    }

    const isPasswordValid = await bcrypt.compare(password, user.password);

    if (!isPasswordValid) {
      return res.status(401).json({ message: "Contraseña incorrecta" });
    }

    // Generar un token JWT y enviarlo en la respuesta
    const token = jwt.sign({ userId: user._id }, "secreto", {
      expiresIn: "24h",
    });

    res.status(200).json({ token, userId: user._id });
  } catch (error) {
    console.error("Error al iniciar sesión:", error);
    res
      .status(500)
      .json({ message: "Error del servidor al iniciar sesión" });
  }
};

// Middleware para redirigir al usuario
exports.loginRedirect = (req, res, next) => {
  res.redirect("/");
};

exports.registerRedirect = (req, res, next) => {
  res.redirect("/login");
};

exports.logout = (req, res) => {
  req.logout();
  res.redirect("/login");
};
