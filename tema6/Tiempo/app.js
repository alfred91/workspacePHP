function getWeather() {
    const apiKey = '***REMOVED***';
    const city = $('#cityInput').val();

    if (!city) {
        alert('Por favor, ingrese una ciudad.');
        return;
    }

    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

    $.ajax({
        url: apiUrl,
        type: 'GET',
        success: function (data) {
            displayWeather(data);
        },
        error: function (error) {
            alert('Error al obtener datos del clima.');
            console.error(error);
        }
    });
}

function displayWeather(data) {
    const weatherInfo = $('#weatherInfo');
    const cityName = data.name;
    const temperature = data.main.temp;

    const weatherHtml = `<h2>Clima en ${cityName}</h2>
                        <p>Temperatura: ${temperature}°C</p>`;

    weatherInfo.html(weatherHtml);
}