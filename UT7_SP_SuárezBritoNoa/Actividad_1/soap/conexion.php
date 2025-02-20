<?php
// Datos de conexión a la base de datos
$host = "localhost";
$dbname = "fp";
$username = "root"; // Ajusta si es necesario
$password = ""; // Ajusta si es necesario

try {
    // Crear conexión con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
