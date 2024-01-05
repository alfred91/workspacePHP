const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

const userSchema = new Schema({
  username: { type: String, required: true, unique: true },
  email: { type: String, required: true, unique: true },
  password: { type: String, required: true },
});

// Antes de guardar, hashear la contraseña
userSchema.pre('save', async function (next) {
  try {
    const salt = await bcrypt.genSalt(10);
    this.password = await bcrypt.hash(this.password, salt);
    next();
  } catch (error) {
    next(error);
  }
});

// Método para generar un token JWT
userSchema.methods.generateAuthToken = function () {
  return jwt.sign({ _id: this._id, username: this.username }, 'tu_secreto');
};

const User = mongoose.model('User', userSchema);

module.exports = User;