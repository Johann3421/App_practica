<?php
$servername = "localhost:33064";
$username = "root";
$password = "johann";
$dbname = "app";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $codigoEquipo = $_POST["codigo"];
    $encargado = $_POST["encargado"];

    // Aquí puedes realizar cualquier procesamiento adicional que necesites,
    // como consultar la base de datos para obtener información del equipo.

    // Una vez que tengas la información necesaria, puedes generar el formato.
    // Por ejemplo, puedes imprimirlo en formato HTML o guardarlo como un archivo PDF.

    // Por ahora, simplemente mostraremos los datos que recibimos:
    echo "<h2>Formato de Equipo Generado:</h2>";
    echo "<p>Código del Equipo: $codigoEquipo</p>";
    echo "<p>Nombre del Encargado: $encargado</p>";
} else {
    // Si no se recibieron datos por POST, muestra un mensaje de error.
    echo "No se recibieron datos del formulario.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
