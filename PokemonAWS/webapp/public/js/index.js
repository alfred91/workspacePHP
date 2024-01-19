//Funcion al inicio de la pagina
document.addEventListener("DOMContentLoaded", function () {
  const token = localStorage.getItem("token");
  if (token) {
    fetch("http://3.211.131.204:3000/api/pokemon/list", {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    })
      .then((response) => {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("No autorizado");
        }
      })
      .then((pokemons) => {
        const container = document.querySelector(".container");
        container.innerHTML = "";

        pokemons.forEach((pokemon) => {
          const card = document.createElement("div");
          card.className = "card";
          card.innerHTML = `
            <img src="http://3.211.131.204:3000/images/${pokemon.imagen}" alt="${
            pokemon.nombre
          }">
            <h2><b>${pokemon.nombre}</b></h2>
            <ul class="list-disc pl-4">
                <li>Especie: ${pokemon.especie}</li>
                <li>Tipo: ${pokemon.tipo.join(", ")}</li>
                <li>Altura: ${pokemon.altura} metros</li>
                <li>Peso: ${pokemon.peso} kg</li>
                <li>Vida: ${pokemon.vida}</li>
                <li>PS en Juego: ${pokemon.puntosSaludJuego}</li>
                ${
                  pokemon.preevolucion
                    ? `<li>Preevolución: ${pokemon.preevolucion}</li>`
                    : ""
                }
                ${
                  pokemon.evolucion
                    ? `<li>Evolución: ${pokemon.evolucion}</li>`
                    : ""
                }
                <br>
                <b>HABILIDADES:</b>
                <ul>
                    ${pokemon.habilidades
                      .map(
                        (habilidad) =>
                          `<li>${habilidad.nombre}: ${habilidad.damage} daño</li>`
                      )
                      .join("")}
                </ul>
            </ul>
            <div class="button-container">
    <button class="button" onclick="obtenerDetallesPokemon('${pokemon._id}');">Ver Detalles</button>
  </div>
          `;
          container.appendChild(card);
        });
      })
      .catch((error) => {
        console.error("Error:", error);
        window.location.href = "/login";
      });
  } else {
    window.location.href = "/login";
  }
});

function redirectToCreatePokemon() {
  const token = localStorage.getItem("token");

  if (!token) {
    alert("Debes estar autenticado para crear un Pokémon.");
    window.location.href = "/login";
  } else {
    window.location.href = "/pokemon/create";
  }
}

// Función para la búsqueda
document.getElementById("searchForm").onsubmit = async function (event) {
  event.preventDefault();
  const nombre = document.getElementById("searchInput").value;
  const token = localStorage.getItem("token");

  if (!token) {
    alert("Debes estar autenticado para realizar esta acción.");
    return;
  }

  try {
    const response = await fetch(
      `http://3.211.131.204:3000/api/pokemon/find/${nombre}`,
      {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      }
    );

    if (!response.ok) {
      throw new Error(
        `Error en la respuesta del servidor: ${response.status} ${response.statusText}`
      );
    }

    const pokemones = await response.json();

    if (pokemones.length === 0) {
      alert("No se encontraron Pokémon con ese nombre.");
    } else if (pokemones.length === 1) {
      obtenerDetallesPokemon(pokemones[0]._id);
    } else {
      const container = document.querySelector(".container");
      container.innerHTML = "";

      pokemones.forEach((pokemon) => {
        const card = document.createElement("div");
        card.className = "card";
        card.innerHTML = `
            <img src="http://3.211.131.204:3000/images/${pokemon.imagen}" alt="${
          pokemon.nombre
        }">
            <h2>${pokemon.nombre}</h2>
            <ul class="list-disc pl-4">
              <li>Especie: ${pokemon.especie}</li>
              <li>Tipo: ${pokemon.tipo.join(", ")}</li>
              <li>Altura: ${pokemon.altura} metros</li>
              <li>Peso: ${pokemon.peso} kg</li>
              <li>Vida: ${pokemon.vida}</li>
              <li>PS en Juego: ${pokemon.puntosSaludJuego}</li>
              ${
                pokemon.preevolucion
                  ? `<li>Preevolución: ${pokemon.preevolucion}</li>`
                  : ""
              }
              ${
                pokemon.evolucion
                  ? `<li>Evolución: ${pokemon.evolucion}</li>`
                  : ""
              }
              <ul>
                ${pokemon.habilidades
                  .map(
                    (habilidad) =>
                      `<li>${habilidad.nombre}: ${habilidad.damage} daño</li>`
                  )
                  .join("")}
              </ul>
            </ul>
            <a href="#" onclick="obtenerDetallesPokemon('${
              pokemon._id
            }'); return false;">Ver Detalles</a>
          `;
        container.appendChild(card);
      });
    }
  } catch (error) {
    console.error("Error:", error);
  }
};

// Función para filtrar por tipo
document.getElementById("filterButton").onclick = async function () {
  const selectedType = document.getElementById("typeSelect").value;
  const token = localStorage.getItem("token");

  if (!token) {
    alert("Debes estar autenticado para realizar esta acción.");
    return;
  }

  try {
    const response = await fetch(
      `http://3.211.131.204:3000/api/pokemon/tipo/${selectedType}`,
      {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      }
    );

    if (!response.ok) {
      throw new Error(
        `Error en la respuesta del servidor: ${response.status} ${response.statusText}`
      );
    }

    const data = await response.json();
    const container = document.querySelector(".container");
    container.innerHTML = "";

    data.forEach((pokemon) => {
      const card = document.createElement("div");
      card.className = "card";
      card.innerHTML = `
                <img src="http://3.211.131.204:3000/images/${
                  pokemon.imagen
                }" alt="${pokemon.nombre}">
                <h2>${pokemon.nombre}</h2>
                <ul class="list-disc pl-4">
                    <li>Especie: ${pokemon.especie}</li>
                    <li>Tipo: ${pokemon.tipo.join(", ")}</li>
                    <li>Altura: ${pokemon.altura} metros</li>
                    <li>Peso: ${pokemon.peso} kg</li>
                    <li>Vida: ${pokemon.vida}</li>
                    <li>PS en Juego: ${
                      pokemon.puntosSaludJuego
                    }</li>
                    ${
                      pokemon.preevolucion
                        ? `<li>Preevolución: ${pokemon.preevolucion}</li>`
                        : ""
                    }
                    ${
                      pokemon.evolucion
                        ? `<li>Evolución: ${pokemon.evolucion}</li>`
                        : ""
                    }
                    <ul>
                        ${pokemon.habilidades
                          .map(
                            (habilidad) =>
                              `<li>${habilidad.nombre}: ${habilidad.damage} daño</li>`
                          )
                          .join("")}
                    </ul>
                </ul>
                <a href="#" onclick="obtenerDetallesPokemon('${
                  pokemon._id
                }'); return false;">Ver Detalles</a>
                `;
      container.appendChild(card);
    });
  } catch (error) {
    console.error("Error:", error);
  }
};

// Funciones para estado de la sesión
function updateSessionState() {
  const sessionContainer = document.getElementById("sessionContainer");
  const token = localStorage.getItem("token");
  const username = localStorage.getItem("username");

  if (token && username) {
    sessionContainer.innerHTML = `
            <p>Sesión iniciada como: ${username}</p>
            <br>
                
            <a class="button link-button battle-button" id="logoutButton" onclick="logout()">Cerrar Sesion</a>   `;
  } else {
    sessionContainer.innerHTML = `
            <a href="/login">Iniciar Sesión</a>
        `;
  }
}
function logout() {
  localStorage.removeItem("token");
  localStorage.removeItem("username");
  updateSessionState();
  window.location.href = "/login";
}

document.addEventListener("DOMContentLoaded", updateSessionState);


function obtenerDetallesPokemon(pokemonId) {
  console.log("obtenerDetallesPokemon llamado con ID:", pokemonId);
  const token = localStorage.getItem("token");

  if (!token) {
    alert("Debes estar autenticado para ver los detalles del Pokémon.");
    return;
  }

  fetch(`http://3.211.131.204:3000/api/pokemon/id/${pokemonId}`, {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error al obtener los detalles del Pokémon");
      }
      return response.json();
    })
    .then((pokemon) => {
      console.log("Datos del Pokémon recibidos:", pokemon);
      const modalContent = document.getElementById("modalContent");
      modalContent.innerHTML = renderPokemonDetails(pokemon);
      mostrarModal();
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("No se pudieron obtener los detalles del Pokémon.");
    });
}

function mostrarModal() {
  document.getElementById("pokemonModal").style.display = "block";
}

function cerrarModal() {
  document.getElementById("pokemonModal").style.display = "none";
}

function renderPokemonDetails(pokemon) {
  const pokemonBackground = pokemon.imagen
    ? `/images/bgpokemon.jpg`
    : "";
  const pokemonImage = pokemon.imagen
    ? `<img src="http://3.211.131.204:3000/images/${pokemon.imagen}" alt="Imagen de ${pokemon.nombre}" class="pokemon-image">`
    : `<p class="text-gray-600 text-center mb-4">No tiene imagen asociada.</p>`;

  const habilidadesHtml = pokemon.habilidades
    .map(
      (habilidad) =>
        `<li>${habilidad.nombre}: ${habilidad.damage} daño</li>`
    )
    .join("");

  return `
  <div class="pokemon-background" style="background-image: url('${pokemonBackground}');">
  ${pokemonImage}
</div>
<div class="div-translucent">
  <h1 class="text-3xl font-semibold mb-4">${pokemon.nombre}</h1>
  <table class="table-auto w-full table-translucent">
        <tbody>
          <tr><td class="border px-4 py-2">Especie</td><td class="border px-4 py-2">${
            pokemon.especie
          }</td></tr>
          <tr><td class="border px-4 py-2">Tipo</td><td class="border px-4 py-2">${pokemon.tipo.join(
            ", "
          )}</td></tr>
          <tr><td class="border px-4 py-2">Altura</td><td class="border px-4 py-2">${
            pokemon.altura
          } metros</td></tr>
          <tr><td class="border px-4 py-2">Peso</td><td class="border px-4 py-2">${
            pokemon.peso
          } kg</td></tr>
          <tr><td class="border px-4 py-2">Vida</td><td class="border px-4 py-2">${
            pokemon.vida
          }</td></tr>
          <tr><td class="border px-4 py-2">Puntos de Salud en Juego</td><td class="border px-4 py-2">${
            pokemon.puntosSaludJuego
          }</td></tr>
          ${
            pokemon.preevolucion
              ? `<tr><td class="border px-4 py-2">Preevolución</td><td class="border px-4 py-2">${pokemon.preevolucion}</td></tr>`
              : ""
          }
          ${
            pokemon.evolucion
              ? `<tr><td class="border px-4 py-2">Evolución</td><td class="border px-4 py-2">${pokemon.evolucion}</td></tr>`
              : ""
          }
          <tr><td class="border px-4 py-2">Habilidades</td><td class="border px-4 py-2"><ul class="list-disc pl-4">${habilidadesHtml}</ul></td></tr>
        </tbody>
      </table>
      <div class="centered-buttons">
      <button onclick="borrarPokemon('${
        pokemon._id
      }')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar Pokémon</button>
      <button onclick="cerrarModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver al Pokedex</a>
    </div>
  </div>
`;
}

function borrarPokemon(id) {
  console.log(`Token enviado: ${localStorage.getItem("token")}`);

  fetch(`http://3.211.131.204:3000/api/pokemon/delete/${id}`, {
    method: "DELETE",
    headers: {
      Authorization: `Bearer ${localStorage.getItem("token")}`,
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error al borrar el Pokémon");
      }
      return response.json();
    })
    .then((data) => {
      console.log("Pokémon borrado:", data);
      window.location.href = "/";
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("No se pudo borrar el Pokémon. Asegúrate de estar autenticado.");
    });
}
document.addEventListener("DOMContentLoaded", (event) => {
  const battleButton = document.getElementById("battleButton");
  if (battleButton) {
    battleButton.addEventListener("click", (e) => {
      e.preventDefault();

      const token = localStorage.getItem("token");
      if (!token) {
        alert("Debes estar autenticado para iniciar una batalla.");
        window.location.href = "/login";
      } else {
        window.location.href = "/pokemon/batalla";
      }
    });
  }
});
