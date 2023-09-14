<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoEquipo = mysqli_real_escape_string($conexion, $_POST['codigoEquipo']);
    $urgencia = mysqli_real_escape_string($conexion, $_POST['urgencia']);
    $descripcionFalla = mysqli_real_escape_string($conexion, $_POST['descripcionFalla']);

    $sql = "INSERT INTO solicitudes_servicio (codigo_equipo, urgencia, descripcion_falla) VALUES ('$codigoEquipo', '$urgencia', '$descripcionFalla')";

    if (mysqli_query($conexion, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'mensaje' => mysqli_error($conexion)]);
    }
} else {
    echo json_encode(['success' => false, 'mensaje' => 'Método de solicitud no válido']);
}

mysqli_close($conexion);
?>
