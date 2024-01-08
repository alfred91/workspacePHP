// authMiddleware.js

const jwt = require('jsonwebtoken');

exports.authenticateToken = (req, res, next) => {
  // Obtener el token del encabezado de la solicitud
  const token = req.header('Authorization');

  if (!token) {
    return res.status(401).json({ message: 'Acceso no autorizado' });
  }

  // Verificar el token
  jwt.verify(token, 'secreto', (err, user) => {
    if (err) {
      return res.status(403).json({ message: 'Token no válido' });
    }

    req.user = user; // Almacenar el usuario autenticado en el objeto de solicitud
    next(); // Continuar con la ruta protegida
  });
};
