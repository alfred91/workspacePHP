const token = localStorage.getItem("token");

let pokemon1Data = null;
let pokemon2Data = null;

document.addEventListener("DOMContentLoaded", async function () {
    try {
        const response = await fetch("http://localhost:3000/api/pokemon/list", {
            headers: { Authorization: `Bearer ${token}` },
        });

        if (!response.ok) {
            throw new Error(`Error en la respuesta del servidor: ${response.status}`);
        }

        const pokemons = await response.json();
        const select1 = document.querySelector('select[name="pokemonId1"]');
        const select2 = document.querySelector('select[name="pokemonId2"]');

        pokemons.forEach((pokemon) => {
            const option1 = document.createElement("option");
            option1.value = pokemon._id;
            option1.textContent = pokemon.nombre;
            select1.appendChild(option1);

            const option2 = document.createElement("option");
            option2.value = pokemon._id;
            option2.textContent = pokemon.nombre;
            select2.appendChild(option2);
        });
    } catch (error) {
        console.error("Error al cargar los Pokémon:", error);
    }
});

async function loadAbilities(pokemonId, abilitiesContainerId, opponentPokemonId) {
    try {
        const response = await fetch(`http://localhost:3000/api/pokemon/id/${pokemonId}`, {
            headers: { Authorization: `Bearer ${token}` },
        });
        if (!response.ok) {
            throw new Error(`Error en la respuesta del servidor: ${response.status}`);
        }

        const pokemon = await response.json();
        const abilitiesContainer = document.getElementById(abilitiesContainerId);

        abilitiesContainer.innerHTML = "";

        pokemon.habilidades.forEach((habilidad, index) => {
            const attackButton = document.createElement("button");
            attackButton.className = "button";
            attackButton.textContent = `Atacar con ${habilidad.nombre} : ${habilidad.damage}`;
            attackButton.onclick = async () => {
                await atacarPokemon(pokemonId, abilitiesContainerId, index, opponentPokemonId);
            };
            abilitiesContainer.appendChild(attackButton);
        });
    } catch (error) {
        console.error("Error al cargar las habilidades:", error);
    }
}

document.querySelector('select[name="pokemonId1"]').addEventListener("change", function () {
    const pokemonId = this.value;
    loadAbilities(pokemonId, "abilitiesContainer1", pokemon2Data ? pokemon2Data._id : null);
});

document.querySelector('select[name="pokemonId2"]').addEventListener("change", function () {
    const pokemonId = this.value;
    loadAbilities(pokemonId, "abilitiesContainer2", pokemon1Data ? pokemon1Data._id : null);
});

document.getElementById("openModalButton").addEventListener("click", async function () {
    const modal = document.getElementById("pokemonModal");
    modal.style.display = "block";

    const pokemonId1 = document.querySelector('select[name="pokemonId1"]').value;
    const pokemonId2 = document.querySelector('select[name="pokemonId2"]').value;

    try {
        pokemon1Data = await getPokemonInfo(pokemonId1);
        pokemon2Data = await getPokemonInfo(pokemonId2);

        updatePokemonModal(pokemon1Data, "pokemon1InfoModal");
        updatePokemonModal(pokemon2Data, "pokemon2InfoModal");

        loadAbilities(pokemon1Data._id, "abilitiesContainer1", pokemon2Data._id);
        loadAbilities(pokemon2Data._id, "abilitiesContainer2", pokemon1Data._id);
    } catch (error) {
        console.error("Error al cargar los detalles de los Pokémon:", error);
    }
});

async function getPokemonInfo(pokemonId) {
    const response = await fetch(`http://localhost:3000/api/pokemon/id/${pokemonId}`, {
        headers: { Authorization: `Bearer ${token}` },
    });

    if (!response.ok) {
        throw new Error(`Error en la respuesta del servidor: ${response.status}`);
    }

    return await response.json();
}

function updatePokemonModal(pokemon, modalId) {
    
    const modal = document.getElementById(modalId);
    modal.querySelector("h2").textContent = pokemon.nombre;
    modal.querySelector("img").src = `http://localhost:3000/images/${pokemon.imagen}`;
    modal.querySelector(".especie").textContent = `Especie: ${pokemon.especie || "No disponible"}`;
    modal.querySelector(".preevolucion").textContent = `Preevolución: ${pokemon.preevolucion || "Ninguna"}`;
    modal.querySelector(".evolucion").textContent = `Evolución: ${pokemon.evolucion || "Ninguna"}`;
    modal.querySelector(".vida").textContent = `Vida: ${pokemon.vida || "No disponible"}`;
    modal.querySelector(".puntosSaludJuego").textContent = `Puntos de Salud en Juego: ${pokemon.puntosSaludJuego || "No disponible"}`;
}

async function atacarPokemon(pokemonAtacanteId, modalInfoId, indexHabilidad, pokemonObjetivoId) {
    try {
        const pokemonAtacante = await getPokemonInfo(pokemonAtacanteId);
        const habilidadSeleccionada = pokemonAtacante.habilidades[indexHabilidad];
        const puntosAtaque = habilidadSeleccionada.damage;

        const attackResponse = await fetch(`http://localhost:3000/api/pokemon/${pokemonObjetivoId}/ataque/${puntosAtaque}`, {
            method: 'PUT',
            headers: { 'Authorization': `Bearer ${token}`, 'Content-Type': 'application/json' },
        });

        if (!attackResponse.ok) {
            throw new Error(`Error en la respuesta del servidor al atacar: ${attackResponse.status}`);
        }

        // Realiza una nueva solicitud GET para obtener la información actualizada del Pokémon objetivo
        const updatedTargetPokemon = await getPokemonInfo(pokemonObjetivoId);
        const targetModalId = pokemonAtacanteId === pokemon1Data._id ? "pokemon2InfoModal" : "pokemon1InfoModal";
        updatePokemonModal(updatedTargetPokemon, targetModalId);
        if (updatedTargetPokemon.fueraCombate) {
            alert(`${updatedTargetPokemon.nombre} está fuera de combate!`);
        }
    } catch (error) {
        console.error("Error al realizar el ataque:", error);
    }
}
