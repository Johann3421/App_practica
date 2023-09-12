<?php
include("../../bd.php");
// Obtiene los datos del formulario
$codigo = $_POST['equipo'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$imagen = $_POST['imagen'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];

// Escapa caracteres especiales para evitar inyecciones SQL
$modelo = mysqli_real_escape_string($conexion, $modelo);
$serie = mysqli_real_escape_string($conexion, $serie);
$imagen = mysqli_real_escape_string($conexion, $imagen);
$descripcion = mysqli_real_escape_string($conexion, $descripcion);

// Inserta o actualiza los datos en la tabla de equipos
$sql = "INSERT INTO equipos (codigo, modelo, serie, imagen, fecha_mantenimiento, descripcion) 
        VALUES ('$codigo', '$modelo', '$serie', '$imagen', '$fecha', '$descripcion') 
        ON DUPLICATE KEY UPDATE 
        modelo = VALUES(modelo), 
        serie = VALUES(serie), 
        imagen = VALUES(imagen), 
        fecha_mantenimiento = VALUES(fecha_mantenimiento), 
        descripcion = VALUES(descripcion)";
$resultado = mysqli_query($conexion, $sql);

// Verifica si la consulta fue exitosa
if ($resultado) {
    echo "Información de mantenimiento actualizada exitosamente.";
} else {
    echo "Error al actualizar la información de mantenimiento: " . mysqli_error($conexion);
}

// Cierra la conexión
mysqli_close($conexion);
?>


