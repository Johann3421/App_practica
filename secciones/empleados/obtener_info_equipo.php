<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost:33064";
$username = "root";
$password = "johann";
$dbname = "app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEquipo = $_POST['codigo'];

    $sql = "SELECT * FROM equipos WHERE codigo = $idEquipo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>Información del Equipo</h3>";
        echo "<p>ID: " . $row["codigo"]. "</p>";
        echo "<p>Nombre: " . $row["modelo"]. "</p>";
        echo "<p>Marca: " . $row["serie"]. "</p>";
        echo "<p>Modelo: " . $row["imagen"]. "</p>";
    } else {
        echo "No se encontró información para el equipo con ID $idEquipo";
    }
}

$conn->close();
?>
