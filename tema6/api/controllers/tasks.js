const Task = require("../models/tasks");

function createTask(req,resp) {
    resp.status(200).send({"msg":"hola"});
    
  }
  module.exports = {
    createTask,
  }