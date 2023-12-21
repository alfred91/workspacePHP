const Task = require("../models/task");

async function createTask(req, res) {
  const task = new Task();

  const params = req.body;

  task.title = params.title;

  task.description = params.description;

  try {
    const taskStore = await task.save();

    if (!taskStore) {
      res.status(400).send({ msg: "No se ha guardado la tarea" });
    } else {
      res.status(200).send({ task: taskStore });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

async function getTasks(req, res) {
  try {
    const tasks = await Task.find({ completed: false }).sort({ created: -1 });
    if (!tasks) {
      res.status(400).send({ msg: "Error al obtener la tarea" });
    } else {
      res.status(200).send(tasks);
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

async function getTask(req, res) {
  const idTask = req.params.id;

  try {
    const task = await Task.findById(idTask);
    if (!task) {
      res.status(400).send({ msg: "La tarea no se ha encontrado" });
    } else {
      res.status(200).send(task);
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

async function updateTask(req, res) {
  const idTask = req.params.id;
  const params = req.body;

  //console.log("idTask", idTask);
  //console.log("params", params);

  try {
    const task = await Task.findByIdAndUpdate(idTask, params);

    if (!idTask) {
      res.status(400).send({ msg: "No se ha podido actualizar la tarea" });
    } else {
      res.status(200).send({ msg: "Actualizacion completada" });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

async function deleteTask(req, res) {
  const idTask = req.params.id;

  try {
    const task = await Task.findByIdAndDelete(idTask);

    if (!task) {
      req.status(404).send({ msg: "No se ha podido eliminar la tarea" });
    } else {
      res.status(200).send({ msg: "Tarea elimiada correctamente" });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

module.exports = {
  createTask,
  getTasks,
  getTask,
  updateTask,
  deleteTask,
};
