const User = require('../models/User');
const bcrypt = require('bcrypt'); // Para cifrar contraseñas
const jwt = require('jsonwebtoken'); // Para manejar tokens JWT

exports.register = async (req, res) => {
  try {
    const { username, password } = req.body;

    // Verificar si el usuario ya existe
    const existingUser = await User.findOne({ username });
    if (existingUser) {
      return res.status(400).json({ message: 'El usuario ya existe' });
    }

    // Cifrar la contraseña
    const hashedPassword = await bcrypt.hash(password, 10);

    // Crear un nuevo usuario con la contraseña cifrada
    const newUser = new User({
      username,
      password: hashedPassword, // Guardar la contraseña cifrada
    });

    // Guardar el usuario en la base de datos
    await newUser.save();

    res.status(201).json({ message: 'Usuario registrado correctamente' });
  } catch (error) {
    console.error('Error al registrar usuario:', error);
    res.status(500).json({ message: 'Error interno del servidor al registrar usuario' });
  }
};

// Función de inicio de sesión
exports.login = async (req, res) => {
  try {
    // Extraer datos del cuerpo de la solicitud
    const { username, password } = req.body;

    // Buscar el usuario en la base de datos
    const user = await User.findOne({ username });

    if (!user) {
      return res.status(401).json({ message: 'Credenciales incorrectas 1' });
    }

    // Verificar la contraseña
    const isPasswordValid = await bcrypt.compare(password, user.password);

    if (!isPasswordValid) {
      return res.status(401).json({ message: 'Credenciales incorrectas 2' });
    }

    // Generar un token JWT para el usuario
    const token = jwt.sign({ userId: user._id }, 'secreto', { expiresIn: '24h' });

    // Enviar el token en la respuesta
    res.status(200).json({ token, userId: user._id });
  } catch (error) {
    console.error('Error al iniciar sesión:', error);
    res.status(500).json({ message: 'Error interno del servidor al iniciar sesión' });
  }
};

// Middleware para redirigir al usuario después del registro
exports.loginRedirect = (req, res, next) => {
  res.redirect('/'); // Redirige a la página principal
};

// Middleware para redirigir al usuario después del inicio de sesión
exports.registerRedirect = (req, res, next) => {
  res.redirect('/login');
};

// Middleware para cerrar sesión
exports.logout = (req, res) => {
  res.redirect('/login'); // Redirige a la página de inicio de sesión
};
