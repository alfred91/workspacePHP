document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loginForm");

  form.onsubmit = function (event) {
    event.preventDefault();

    const username = document.querySelector('input[name="username"]').value;
    const password = document.querySelector('input[name="password"]').value;

    fetch("http://54.164.66.113:3000/api/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ username, password }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.token) {
          localStorage.setItem("token", data.token);
          console.log(localStorage.getItem("token"));
          localStorage.setItem("username", username);
          window.location.href = "/";
        } else {
          alert("Error al iniciar sesión");
        }
      })
      .catch((error) => console.error("Error:", error));
  };
});
document.getElementById('registerButton').addEventListener('click', function () {
  window.location.href = '/register';
});

