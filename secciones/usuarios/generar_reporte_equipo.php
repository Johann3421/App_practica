<?php
// Incluye el archivo de conexión a la base de datos
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el código del equipo del formulario
    $codigoEquipo = $_POST["codigoEquipo"];

    // Realiza la consulta SQL para obtener los detalles del equipo
    $sql = "SELECT * FROM equipo WHERE codigo = '$codigoEquipo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Se encontró el equipo, muestra los detalles
        $equipo = $resultado->fetch_assoc();

        // Puedes imprimir los detalles del equipo aquí o generar un informe
        echo "<h2>Detalles del Equipo:</h2>";
        echo "<p>Código del Equipo: " . $equipo["codigo"] . "</p>";
        echo "<p>Nombre del Equipo: " . $equipo["nombre_equipo"] . "</p>";
        // Agrega más campos aquí según la estructura de tu base de datos

    } else {
        // No se encontró el equipo, muestra un mensaje de error
        echo "Equipo no encontrado";
    }
} else {
    // Si no se recibieron datos por POST, muestra un mensaje de error
    echo "No se recibieron datos del formulario.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
