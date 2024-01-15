const token = localStorage.getItem("token");

document.getElementById("createForm").onsubmit = async function (event) {
  event.preventDefault();

  const formData = new FormData();

  formData.append("nombre", document.getElementById("nombre").value);
  formData.append("especie", document.getElementById("especie").value);

  const tipos = Array.from(document.getElementById("tipo").selectedOptions).map(
    (option) => option.value
  );

  // Agrega la imagen al FormData
  formData.append("altura", parseFloat(document.getElementById("altura").value));
  formData.append("peso", parseFloat(document.getElementById("peso").value));
  formData.append("vida", parseInt(document.getElementById("vida").value));
  formData.append("puntosSaludJuego", parseInt(document.getElementById("puntosSaludJuego").value));
  formData.append("preevolucion", document.getElementById("preevolucion").value);
  formData.append("evolucion", document.getElementById("evolucion").value);
  tipos.forEach((tipo) => { formData.append("tipo", tipo);});
  formData.append("imagen", document.getElementById("imagen").files[0]);

  const habilidadesElements = document.querySelectorAll(".habilidad");
  habilidadesElements.forEach((el, index) => {
    formData.append(`habilidades[${index}][nombre]`, el.querySelector('[name*="nombre"]').value);
    formData.append(`habilidades[${index}][damage]`, parseInt(el.querySelector('[name*="damage"]').value));
  });

  try {
    
    const response = await fetch("http://localhost:3000/api/pokemon/create", {
      method: "POST",
      headers: {
        Authorization: `Bearer ${token}`,
      },
      body: formData,
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
  const habilidadCount = habilidadesContainer.querySelectorAll(".habilidad").length;
  const nuevaHabilidad = document.createElement("div");
  nuevaHabilidad.className = "habilidad";
  nuevaHabilidad.innerHTML = `
     <input type="text" name="habilidades[${habilidadCount}][nombre]" placeholder="Nombre habilidad" required>
     <input type="number" name="habilidades[${habilidadCount}][damage]" placeholder="Daño" required>
   `;
  habilidadesContainer.appendChild(nuevaHabilidad);
}
