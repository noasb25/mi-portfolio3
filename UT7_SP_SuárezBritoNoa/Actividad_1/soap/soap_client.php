<?php
$client = new SoapClient(null, [
    'location' => "http://localhost/UT7_SP_SuárezBritoNoa/Actividad_1/soap/soap_server.php",
    'uri' => "http://localhost/UT7_SP_SuárezBritoNoa/Actividad_1/soap",
    'trace' => 1
]);

// Función para generar tablas con estilo
function generarTabla($datos, $titulo) {
    echo "<h2>$titulo</h2>";
    echo "<table class='styled-table'>";
    
    if (is_array($datos) && count($datos) > 0) {
        echo "<tr>";
        foreach (array_keys($datos[0]) as $clave) {
            echo "<th>$clave</th>";
        }
        echo "</tr>";

        foreach ($datos as $fila) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No hay datos disponibles</td></tr>";
    }

    echo "</table><br>";
}

// Encabezado HTML con enlace al CSS
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios SOAP - FP</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="container">';

try {
    // Obtener información del módulo con ID=1
    $modulo = json_decode($client->infoModulo(1), true);
    echo "<h2>Información de un módulo (ID=1)</h2>";
    echo "<table class='styled-table'>";
    foreach ($modulo as $clave => $valor) {
        echo "<tr><th>$clave</th><td>$valor</td></tr>";
    }
    echo "</table><br>";

    // Obtener lista de departamentos
    $departamentos = json_decode($client->infoDepartamentos(), true);
    echo "<h2>Lista de Departamentos</h2>";
    echo "<table class='small-table'>";
    foreach ($departamentos as $departamento) {
        echo "<tr><td>$departamento</td></tr>";
    }
    echo "</table><br>";

    // Obtener lista de nomenclaturas
    $nomenclaturas = json_decode($client->infoNomenclaturas(), true);
    echo "<h2>Lista de Nomenclaturas</h2>";
    echo "<table class='small-table'>";
    foreach ($nomenclaturas as $nomenclatura) {
        echo "<tr><td>$nomenclatura</td></tr>";
    }
    echo "</table><br>";

} catch (SoapFault $e) {
    echo "<p class='error-message'>Error SOAP: " . $e->getMessage() . "</p>";
}

echo '</div></body></html>';
?>
