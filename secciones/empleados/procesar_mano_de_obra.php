<?php
include("../../bd.php");

// Obtén los datos del formulario
$codigoTrabajador = $_POST['codigoTrabajador'];
$horasTrabajadas = $_POST['horasTrabajadas'];

// Escapa caracteres especiales para evitar inyecciones SQL
$codigoTrabajador = mysqli_real_escape_string($conexion, $codigoTrabajador);
$horasTrabajadas = mysqli_real_escape_string($conexion, $horasTrabajadas);

// Busca al trabajador en la base de datos
$sql = "SELECT * FROM trabajadores WHERE codigo = '$codigoTrabajador'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $trabajador = mysqli_fetch_assoc($resultado);
    $sueldo = $trabajador['sueldo'];
    $totalPagar = $sueldo * $horasTrabajadas;
    
    // Agrega al trabajador a la lista en la interfaz
    echo json_encode([
        'codigo' => $trabajador['codigo'],
        'nombre' => $trabajador['nombre'],
        'foto' => $trabajador['foto'],
        'sueldo' => $sueldo,
        'horasTrabajadas' => $horasTrabajadas,
        'totalPagar' => $totalPagar
    ]);
} else {
    echo json_encode(null);
}

// Cierra la conexión
mysqli_close($conexion);
?>

