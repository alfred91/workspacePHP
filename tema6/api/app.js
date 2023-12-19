const express = require('express');
const app = express();

// Rutas
const helloRoutes = require('./routes/hello');

// Middleware
app.use('/api', helloRoutes);

module.exports = app;