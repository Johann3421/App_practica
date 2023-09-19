<?php
// Configuración de conexión a la base de datos
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

if(isset($_POST["codigo"])) {
    $codigoEquipo = $_POST["codigo"];

    // Realiza la consulta SQL para obtener los detalles del equipo
    $sql = "SELECT * FROM equipo WHERE id = '$codigoEquipo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Se encontró el equipo, muestra los detalles
        $equipo = $resultado->fetch_assoc();

        // Puedes imprimir los detalles del equipo aquí o generar un informe
        echo "<h2>Detalles del Equipo:</h2>";
        echo "<p>ID: " . $equipo["id"] . "</p>";
        echo "<p>Nombre del Equipo: " . $equipo["nombre_equipo"] . "</p>";
        echo "<p>Accesorios: " . $equipo["accesorios"] . "</p>";
        echo "<p>Partes del Equipo: " . $equipo["partes_equipo"] . "</p>";
        echo "<p>Fabricante: " . $equipo["fabricante"] . "</p>";
        echo "<p>Parámetros Eléctricos: " . $equipo["parametros_electricos"] . "</p>";
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
