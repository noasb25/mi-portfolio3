<?php
require_once "conexion.php";

function infoModulo($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM Modulos WHERE id = ?");
    $stmt->execute([$id]);
    $modulo = $stmt->fetch(PDO::FETCH_ASSOC);
    return json_encode($modulo, JSON_UNESCAPED_UNICODE);
}

function infoDepartamentos() {
    global $pdo;
    $stmt = $pdo->query("SELECT DISTINCT departamento FROM Modulos");
    $departamentos = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return json_encode($departamentos, JSON_UNESCAPED_UNICODE);
}

function infoNomenclaturas() {
    global $pdo;
    $stmt = $pdo->query("SELECT DISTINCT nomenclatura_modulo FROM Modulos");
    $nomenclaturas = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Depuración: Verifica si la variable está vacía
    if (empty($nomenclaturas)) {
        return json_encode(["error" => "No se encontraron nomenclaturas"], JSON_UNESCAPED_UNICODE);
    }

    return json_encode($nomenclaturas, JSON_UNESCAPED_UNICODE);
}

// Configurar servidor SOAP
$server = new SoapServer(null, [
    'uri' => "http://localhost/UT7_SP_SuárezBritoNoa/Actividad_1/soap"
]);

$server->addFunction("infoModulo");
$server->addFunction("infoDepartamentos");
$server->addFunction("infoNomenclaturas");

// Añadir encabezado para depuración
header("Content-Type: text/xml");

$server->handle();
?>
