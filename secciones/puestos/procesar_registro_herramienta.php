<?php
include("../../bd.php");

// Obtener los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$lugarVenta = $_POST['lugar_venta'];
$precioMercado = $_POST['precio_mercado'];
$almacenamiento = $_POST['almacenamiento'];

// Escapar caracteres especiales para evitar inyecciones SQL
$nombre = mysqli_real_escape_string($conexion, $nombre);
$lugarVenta = mysqli_real_escape_string($conexion, $lugarVenta);
$almacenamiento = mysqli_real_escape_string($conexion, $almacenamiento);

// Insertar los datos en la tabla de herramientas
$sql = "INSERT INTO herramienta (codigo, nombre, lugar_venta, precio_mercado, almacenamiento) 
        VALUES ('$codigo', '$nombre', '$lugarVenta', '$precioMercado', '$almacenamiento')";

$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta fue exitosa
if ($resultado) {
    echo "Herramienta registrada exitosamente.";
} else {
    echo "Error al registrar la herramienta: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
