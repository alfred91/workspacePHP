const User = require('../models/user');
const bcrypt = require('bcrypt');
const passport = require('passport');
const jwt = require('jsonwebtoken');

// Registro de usuario
exports.register = async (req, res) => {
  const { username, email, password } = req.body;

  try {
    // Verificar si el usuario ya existe
    const existingUser = await User.findOne({ $or: [{ username }, { email }] });

    if (existingUser) {
      return res.status(400).json({ message: 'El nombre de usuario o correo electrónico ya está en uso.' });
    }

    // Crear un nuevo usuario
    const newUser = new User({ username, email, password });

    // Hash de la contraseña
    const salt = await bcrypt.genSalt(10);
    newUser.password = await bcrypt.hash(password, salt);

    // Guardar el nuevo usuario en la base de datos
    await newUser.save();

    res.status(201).json({ message: 'Usuario registrado con éxito.' });
  } catch (error) {
    res.status(500).json({ message: 'Error al registrar el usuario.', error });
  }
};

// Inicio de sesión
exports.login = (req, res, next) => {
  passport.authenticate('local', (err, user, info) => {
    if (err) {
      return next(err);
    }
    if (!user) {
      return res.status(401).json({ message: 'Credenciales incorrectas.' });
    }
    req.logIn(user, async (err) => {
      if (err) {
        return next(err);
      }
      // Generar token al iniciar sesión
      const token = generateAuthToken(user);
      return res.status(200).json({ message: 'Inicio de sesión exitoso.', token });
    });
  })(req, res, next);
};

// Método para generar un token JWT
function generateAuthToken(user) {
  return jwt.sign({ _id: user._id, username: user.username }, 'tu_secreto', { expiresIn: '99h' });
}
