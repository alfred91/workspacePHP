const token = localStorage.getItem("token");

document.getElementById("createForm").onsubmit = async function (event) {
  event.preventDefault();

  // Recoger los datos y construir el objeto a enviar
  const formData = {
    nombre: document.getElementById("nombre").value,
    especie: document.getElementById("especie").value,
    tipo: Array.from(document.getElementById("tipo").selectedOptions).map(
      (option) => option.value
    ),
    imagen: document.getElementById("imagen").value,
    altura: parseFloat(document.getElementById("altura").value),
    peso: parseFloat(document.getElementById("peso").value),
    vida: parseInt(document.getElementById("vida").value),
    puntosSaludJuego: parseInt(
      document.getElementById("puntosSaludJuego").value
    ),
    preevolucion: document.getElementById("preevolucion").value || null,
    evolucion: document.getElementById("evolucion").value || null,
    habilidades: [],
  };

  // Agregar habilidades
  const habilidadesElements = document.querySelectorAll(".habilidad");
  habilidadesElements.forEach((el) => {
    const nombreHabilidad = el.querySelector('[name*="nombre"]').value;
    const dañoHabilidad = parseInt(el.querySelector('[name*="damage"]').value);
    formData.habilidades.push({
      nombre: nombreHabilidad,
      damage: dañoHabilidad,
    });
  });

  // POST a la API
  try {
    const response = await fetch("http://localhost:3000/api/pokemon/create", {
      method: "POST",
      headers: {
        Authorization: `Bearer ${token}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData), // Convertir a JSON
    });

    if (!response.ok) {
      throw new Error(`Error en la respuesta del servidor: ${response.status}`);
    }

    window.location.href = "/";
  } catch (error) {
    console.error("Error al crear el Pokémon:", error);
  }
};

function agregarHabilidad() {
  const habilidadesContainer = document.getElementById("habilidadesContainer");
  const habilidadCount =
    habilidadesContainer.querySelectorAll(".habilidad").length;
  const nuevaHabilidad = document.createElement("div");
  nuevaHabilidad.className = "habilidad";
  nuevaHabilidad.innerHTML = `
     <input type="text" name="habilidades[${habilidadCount}][nombre]" placeholder="Nombre habilidad" required>
     <input type="number" name="habilidades[${habilidadCount}][damage]" placeholder="Daño" required>
   `;
  habilidadesContainer.appendChild(nuevaHabilidad);
}
