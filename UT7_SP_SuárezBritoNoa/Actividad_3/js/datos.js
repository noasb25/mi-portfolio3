const API_KEY = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJub2FqYW5hbm9hQGdtYWlsLmNvbSIsImp0aSI6ImQyYWI2NGEyLWNhMzgtNDNlMi1iNWY5LTI3ZTc3ZjkyZjk5MiIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNzM4ODUxNTg0LCJ1c2VySWQiOiJkMmFiNjRhMi1jYTM4LTQzZTItYjVmOS0yN2U3N2Y5MmY5OTIiLCJyb2xlIjoiIn0.-QCPTyol2jfRTHWX6R-EuPFU0L07enoGOEuzmhqjevA";

// Función para obtener el mapa de isobaras
async function obtenerMapaIsobaras() {
    const url = `https://opendata.aemet.es/opendata/api/mapasygraficos/analisis?api_key=${API_KEY}`;
    manejarSolicitud(url, "Mapa de Isobaras", "imagen");
}

// Función para obtener la predicción de Canarias
async function obtenerInfoCanarias() {
    const url = `https://opendata.aemet.es/opendata/api/prediccion/ccaa/hoy/coo?api_key=${API_KEY}`;
    manejarSolicitud(url, "Predicción Canarias", "texto");
}

// Función para obtener la predicción de Gran Canaria
async function obtenerInfoGranCanaria() {
    const url = `https://opendata.aemet.es/opendata/api/prediccion/provincia/manana/353?api_key=${API_KEY}`;
    manejarSolicitud(url, "Predicción Gran Canaria", "texto");
}

// Función para limpiar los resultados
function limpiarResultados() {
    document.getElementById("resultado").innerHTML = "<p>Los datos meteorológicos aparecerán aquí.</p>";
}

// Función para manejar la solicitud a la API de AEMET
async function manejarSolicitud(url, titulo, tipo) {
    try {
        const respuesta = await fetch(url);
        const datos = await respuesta.json();

        if (!datos.datos) {
            throw new Error("No se ha podido obtener la información.");
        }

        // Realizamos una segunda petición para obtener los datos finales
        const contenido = await fetch(datos.datos);
        const info = await contenido.text();

        let resultadoHTML = `<h2>${titulo}</h2>`;

        if (tipo === "imagen") {
            resultadoHTML += `<img src="${datos.datos}" alt="${titulo}" class="imagen">`;
        } else {
            resultadoHTML += `<table><tr><th>Resumen</th></tr><tr><td>${info}</td></tr></table>`;
        }

        document.getElementById("resultado").innerHTML = resultadoHTML;
    } catch (error) {
        document.getElementById("resultado").innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
    }
}
