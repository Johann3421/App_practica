<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost:33064", "root", "johann", "app");

// Verifica si la conexión fue exitosa
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtiene el código del equipo enviado por GET
$codigoEquipo = $_GET['codigo'];

// Escapa caracteres especiales para evitar inyecciones SQL
$codigoEquipo = mysqli_real_escape_string($conexion, $codigoEquipo);

// Consulta SQL para obtener información del equipo
$sql = "SELECT modelo, serie, imagen, DATE_FORMAT(fecha_mantenimiento, '%Y-%m-%d') as fecha, descripcion FROM equipos WHERE codigo = '$codigoEquipo'";
$resultado = mysqli_query($conexion, $sql);

// Verifica si la consulta fue exitosa y devuelve los datos en formato JSON
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $equipo = mysqli_fetch_assoc($resultado);
    echo json_encode($equipo);
} else {
    // Si el equipo no se encuentra, devuelve un objeto JSON vacío
    echo json_encode([]);
}

// Cierra la conexión
mysqli_close($conexion);
?>

