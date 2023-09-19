<?php
include("../../templates/header.php");

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

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el ID del equipo del formulario
    $idEquipo = $_POST["idEquipo"];

    // Realiza la consulta SQL para obtener los detalles del equipo
    $sql = "SELECT * FROM equipo WHERE id = '$idEquipo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Se encontró el equipo, muestra los detalles
        $equipo = $resultado->fetch_assoc();

        echo "<h2>Detalles del Equipo:</h2>";
        echo "<p>ID del Equipo: " . $equipo["id"] . "</p>";
        echo "<p>Nombre del Equipo: " . $equipo["nombre_equipo"] . "</p>";
        echo "<p>Accesorios: " . $equipo["accesorios"] . "</p>";
        echo "<p>Partes del Equipo: " . $equipo["partes_equipo"] . "</p>";
        echo "<p>Fabricante: " . $equipo["fabricante"] . "</p>";
        echo "<p>Parámetros Eléctricos: " . $equipo["parametros_electricos"] . "</p>";
    } else {
        // No se encontró el equipo, muestra un mensaje de error
        echo "Equipo no encontrado";
    }
}

$conn->close();
?>

<br/>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato Hoja de Instrucción</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Formato Hoja de Instrucción</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="idEquipo">ID del Equipo:</label>
                <input type="text" class="form-control" id="idEquipo" name="idEquipo" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <div class="container mt-5">
        <h2>Instrucciones:</h2>
        <form action="generar_instruccion.php" method="post">
            <div class="form-group">
                <textarea class="form-control" id="instrucciones" name="instrucciones" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Imprimir</button>
        </form>
    </div>
</body>
</html>

<?php
include("../../templates/footer.php");
?>
