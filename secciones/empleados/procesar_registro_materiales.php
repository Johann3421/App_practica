<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost:33064", "root", "johann", "app");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtén los datos del formulario
$codigoMaterial = $_POST['codigoMaterial'];
$cantidadUtilizada = $_POST['cantidadUtilizada'];

// Escapa caracteres especiales para evitar inyecciones SQL
$codigoMaterial = mysqli_real_escape_string($conexion, $codigoMaterial);
$cantidadUtilizada = mysqli_real_escape_string($conexion, $cantidadUtilizada);

// Busca el material en la base de datos
$sql = "SELECT * FROM materiales WHERE codigo = $codigoMaterial";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $material = mysqli_fetch_assoc($resultado);
    $costoUnitario = $material['costo_unitario'];
    $costoTotal = $costoUnitario * $cantidadUtilizada;
    
    // Agrega el material a la lista en la interfaz
    echo json_encode([
        'codigo' => $material['codigo'],
        'descripcion' => $material['descripcion'],
        'cantidadUtilizada' => $cantidadUtilizada,
        'costoUnitario' => $costoUnitario,
        'costoTotal' => $costoTotal
    ]);
} else {
    echo json_encode(null);
}

// Cierra la conexión
mysqli_close($conexion);
?>
