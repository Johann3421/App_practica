<?php
include("../../bd.php");
// Obtiene los datos del formulario
$codigo = $_POST['nombreEquipo'];
$modelo = $_POST['accesorios'];
$serie = $_POST['parteEquipo'];
$imagen = $_POST['fabricante'];
$fecha = $_POST['parametrosElectricos'];


// Escapa caracteres especiales para evitar inyecciones SQL
$modelo = mysqli_real_escape_string($conexion, $modelo);
$serie = mysqli_real_escape_string($conexion, $serie);
$imagen = mysqli_real_escape_string($conexion, $imagen);

// Inserta o actualiza los datos en la tabla de equipos
$sql = "INSERT INTO equipo (nombre_equipo, accesorios, partes_equipo, fabricante, parametros_electricos) 
        VALUES ('$codigo', '$modelo', '$serie', '$imagen', '$fecha') 
        ON DUPLICATE KEY UPDATE 
        nombre_equipo = VALUES(nombre_equipo), 
        accesorios = VALUES(accesorios), 
        partes_equipo = VALUES(partes_equipo), 
        fabricante = VALUES(fabricante), 
        parametros_electricos = VALUES(parametros_electricos)";
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