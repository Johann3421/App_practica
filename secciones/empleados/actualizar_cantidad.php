<?php
include("../../bd.php");

$codigoMaterial = $_POST['codigoMaterial'];
$cantidadUtilizada = $_POST['cantidadUtilizada'];

$cantidadUtilizada = mysqli_real_escape_string($conexion, $cantidadUtilizada);

$sql = "UPDATE materiales SET cantidad = $cantidadUtilizada WHERE codigo = '$codigoMaterial'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "Cantidad actualizada exitosamente.";
} else {
    echo "Error al actualizar la cantidad: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
