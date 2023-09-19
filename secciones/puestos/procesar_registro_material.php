<?php
include("../../bd.php");

$codigoMaterial = $_POST['codigoMaterial'];
$nombreMaterial = $_POST['nombreMaterial'];
$cantidadMaterial = $_POST['cantidadMaterial'];
$lugarVenta = $_POST['lugarVenta'];
$precioMaterial = $_POST['precioMaterial'];
$almacenamiento = $_POST['almacenamiento'];

// Escapa caracteres especiales para evitar inyecciones SQL
$nombreMaterial = mysqli_real_escape_string($conexion, $nombreMaterial);
$lugarVenta = mysqli_real_escape_string($conexion, $lugarVenta);
$almacenamiento = mysqli_real_escape_string($conexion, $almacenamiento);

$sql = "INSERT INTO material (codigo, nombre, cantidad, lugar_venta, precio, almacenamiento) 
        VALUES ('$codigoMaterial', '$nombreMaterial', '$cantidadMaterial', '$lugarVenta', '$precioMaterial', '$almacenamiento')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "Registro de material exitoso.";
} else {
    echo "Error al registrar el material: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
