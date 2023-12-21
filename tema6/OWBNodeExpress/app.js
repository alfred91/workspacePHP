const express = require("express");
const app = express();

app.use(express.json());
app.use(express.urlencoded({extended:true}));

//Cargar rutas
const HelloRoutes = require("./routes/hello");
const TaskRoutes = require("./routes/task");

//Rutas base
app.use("/api", HelloRoutes);
app.use("/api", TaskRoutes);

module.exports = app;