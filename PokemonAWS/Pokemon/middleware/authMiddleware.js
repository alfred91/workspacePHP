const jwt = require("jsonwebtoken");

exports.authenticateToken = (req, res, next) => {
  const authHeader = req.headers.authorization;

  if (!authHeader) {
    return res
      .status(401)
      .json({ message: "No hay un token de autenticación" });
  }

  // Separar el token del prefijo 'Bearer'
  const token = authHeader.split(" ")[1];

  if (!token) {
    return res.status(401).json({ message: "Formato de token incorrecto" });
  }

  // Verificar token
  jwt.verify(token, process.env.TOKEN_SECRET || "secreto", (err, user) => {
    if (err) {
      return res.status(403).json({ message: "Token no válido o expirado" });
    }

  // Adjuntar el usuario decodificado a la solicitud
    req.user = user;
    next();
  });
};
