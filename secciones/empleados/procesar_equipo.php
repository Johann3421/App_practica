<?php
$conexion = mysqli_connect("localhost:33064", "root", "johann", "app");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $codigoEquipo = $_POST['codigoEquipo'];

    $sql = "SELECT * FROM solicitudes_servicio WHERE codigo_equipo = '$codigoEquipo'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $equipo = mysqli_fetch_assoc($resultado);
        echo json_encode([
            'success' => true,
            'codigo' => $equipo['codigo_equipo'],
            'urgencia' => $equipo['urgencia'],
            'descripcion' => $equipo['descripcion_falla'],
            'fecha_creacion' => $equipo['fecha_creacion']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'mensaje' => 'Solicitud no encontrada'
        ]);
    }
}

mysqli_close($conexion);
?>




