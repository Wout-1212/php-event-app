import axios from "axios";

async function getLatLong(city) {
  try {
    const url = `https://geocoding-api.open-meteo.com/v1/search?name=${city}&count=10&language=en&format=json&countryCode=BE`;

    const response = await axios.get(url);

    const results = response.data.results;
    if (!results || results.length === 0) {
      throw new Error("No results found.");
    }
    return {
      latitude: results[0].latitude,
      longitude: results[0].longitude,
    };
  } catch (error) {
    console.error("Error fetching latitude and longitude:", error);
  }
}
async function getWeather(latitude, longitude, row) {
  try {
    const url = `https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&daily=temperature_2m_max,temperature_2m_min,weather_code&timezone=Europe%2FBerlin&forecast_days=3`;
    const response = await axios.get(url);
    const data = response.data;

    const maxTemps = data.daily.temperature_2m_max;
    const minTemps = data.daily.temperature_2m_min;
    const codes = data.daily.weather_code;

    const dayClasses = ["day1", "day2", "day3"];

    function getWeatherIcon(code) {
      if (code === 0) return "☀️"; // Clear sky
      if ([1, 2, 3].includes(code)) return "⛅"; // Partly cloudy
      if ([45, 48].includes(code)) return "🌫️"; // Fog
      if ([51, 53, 55, 56, 57].includes(code)) return "🌦️"; // Drizzle
      if ([61, 63, 65, 66, 67, 80, 81, 82].includes(code)) return "🌧️"; // Rain
      if ([71, 73, 75, 77, 85, 86].includes(code)) return "❄️"; // Snow
      if ([95, 96, 99].includes(code)) return "⛈️"; // Thunderstorm
    }

    dayClasses.forEach((className, i) => {
      const cell = row.querySelector(`.${className}`);
      cell.innerHTML = `
                <div class="weather">
                    <div class="weather__icon">${getWeatherIcon(codes[i])}</div>
                    <div class="weather__temp">
                        <span class="max-temp">Max: ${maxTemps[i]}°C</span>
                        <span class="min-temp">Min: ${minTemps[i]}°C</span>
                    </div>
                </div>
            `;
    });
  } catch (error) {
    console.error("Error fetching weather data:", error);
  }
}

document.addEventListener("DOMContentLoaded", async () => {
  const rows = document.querySelectorAll(".table__row");

  for (const row of rows) {
    const location = row.dataset.location;
    if (!location) continue;

    try {
      const coords = await getLatLong(location);
      if (!coords) {
        ["day1", "day2", "day3"].forEach((className) => {
          const cell = row.querySelector(`.${className}`);
          if (cell)
            cell.innerHTML = `<span class="weather__error">City not found</span>`;
        });
        continue;
      }

      await getWeather(coords.latitude, coords.longitude, row);
    } catch (error) {
      console.error("Error processing row for city:", location, error);
    }
  }
});
