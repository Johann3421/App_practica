<?php
// Incluye el archivo de conexión a la base de datos
// Cambia los valores de las siguientes variables según tu configuración
$servername = "localhost:33064"; // Por ejemplo: "localhost" o la dirección de tu servidor de base de datos
$username = "root"; // Tu nombre de usuario de la base de datos
$password = "johann"; // Tu contraseña de la base de datos
$dbname = "app"; // El nombre de tu base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se recibió un código de equipo por POST
if (isset($_POST['codigoEquipo'])) {
    // Obtiene el código de equipo del formulario
    $codigoEquipo = $_POST['codigoEquipo'];

    // Prepara la consulta SQL para buscar el equipo en la base de datos
    $sql = "SELECT * FROM equipo WHERE codigo = '$codigoEquipo'";

    // Ejecuta la consulta
    $resultado = $conn->query($sql);

    // Verifica si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Obtiene los datos del equipo
        $equipo = $resultado->fetch_assoc();

        // Puedes imprimir los datos del equipo o devolverlos como JSON
        // En este ejemplo, los devolvemos como JSON
        header('Content-Type: application/json');
        echo json_encode($equipo);
    } else {
        // Si no se encontró el equipo, puedes devolver un mensaje de error
        echo "Equipo no encontrado";
    }
} else {
    // Si no se recibió un código de equipo, muestra un mensaje de error
    echo "Código de equipo no especificado";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
