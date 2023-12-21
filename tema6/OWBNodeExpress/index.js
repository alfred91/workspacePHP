const mongoose = require("mongoose");
const app = require("./app");
const port = 3000;
const urlMongoDb = "mongodb+srv://usuario:usuario@taskdb.odkvgjh.mongodb.net/mydb";

mongoose
  .connect(urlMongoDb)
  .then(() => {
    console.log("Conectado a la base de datos");
    app.listen(port, () => {
      console.log(`Server is running on http://localhost:${port}`);
    });
  })
  .catch((err) => {
    console.error("Error al conectar con la base de datos", err);
  });


/** app.get("/hello", (req, res) => {
    res.status(200).send({ msg: "Hola Alfredo" });
});

 **/
