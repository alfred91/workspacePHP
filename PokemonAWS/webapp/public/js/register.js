document
  .getElementById("registerForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    fetch("http://3.211.131.204:3000/api/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ username, password }),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la respuesta del servidor");
        }
        return response.json();
      })
      .then((data) => {
        alert(data.message);
        window.location.href = "/login";
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
document.getElementById("loginButton").addEventListener("click", function () {
  window.location.href = "/login";
});
