function getSummonerInfo() {
    const apiKey = 'RGAPI-9352c431-f27f-4e7d-bc16-0e3525ad7fed';
    const summonerName = document.getElementById('summonerInput').value;

    if (!summonerName) {
        alert('Por favor, ingrese el nombre del invocador.');
        return;
    }

    const apiUrl = `https://la1.api.riotgames.com/lol/summoner/v4/summoners/by-name/${summonerName}?api_key=${apiKey}`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => displaySummonerInfo(data))
        .catch(error => {
            alert('Error al obtener datos del invocador.');
            console.error(error);
        });
}

function displaySummonerInfo(data) {
    const summonerInfo = document.getElementById('summonerInfo');
    const summonerName = data.name;
    const summonerLevel = data.summonerLevel;

    const summonerHtml = `<h2>Información del Invocador</h2>
                        <p>Nombre: ${summonerName}</p>
                        <p>Nivel: ${summonerLevel}</p>`;

    summonerInfo.innerHTML = summonerHtml;
}
