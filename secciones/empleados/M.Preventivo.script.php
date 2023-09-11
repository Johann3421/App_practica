<?php
// Aquí se establece la conexión a la base de datos (similar a como lo has hecho en otros archivos)
include("../../bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];

    // Consulta SQL para obtener la información del equipo
    $sql = "SELECT * FROM equipos WHERE codigo = :codigo";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_Param(':codigo', $codigo);
    $stmt->execute();

    // Obtener los resultados como un arreglo asociativo
    $equipo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Enviar la información del equipo como JSON
    echo json_encode($equipo);
}
?>


<?php
// Aquí se establece la conexión a la base de datos (similar a como lo has hecho en otros archivos)
include("../../bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipo = $_POST['equipo'];
    $descripcion = $_POST['descripcion'];

    // Insertar el mantenimiento en la base de datos
    $sql = "INSERT INTO mantenimientos (equipo, descripcion) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ss', $equipo, $descripcion);

    if ($stmt->execute()) {
        echo "Mantenimiento guardado correctamente.";
    } else {
        echo "Error al guardar el mantenimiento: " . $stmt->error;
    }
}
?>





