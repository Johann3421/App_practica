<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost:33064", "root", "johann", "app");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtén el código de la herramienta enviado por POST
$codigoHerramienta = $_POST['codigoHerramienta'];

// Escapa caracteres especiales para evitar inyecciones SQL
$codigoHerramienta = mysqli_real_escape_string($conexion, $codigoHerramienta);

// Inicializa un arreglo para la respuesta JSON
$respuesta = array();

// Realiza la consulta para obtener la información de la herramienta
$sql = "SELECT * FROM herramientas WHERE codigo = '$codigoHerramienta'";
$resultado = mysqli_query($conexion, $sql);

// Verifica si se encontró la herramienta
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtiene los datos de la herramienta
    $herramienta = mysqli_fetch_assoc($resultado);

    // Agrega los datos al arreglo de respuesta
    $respuesta['success'] = true;
    $respuesta['mensaje'] = 'Herramienta encontrada';
    $respuesta['herramienta'] = $herramienta;
} else {
    // No se encontró la herramienta
    $respuesta['success'] = false;
    $respuesta['mensaje'] = 'Herramienta no encontrada';
}

// Cierra la conexión
mysqli_close($conexion);

// Devuelve la respuesta como JSON
echo json_encode($respuesta);
?>

