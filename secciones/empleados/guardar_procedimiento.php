<?php
include("../../bd.php"); // Asegúrate de tener un archivo de conexión a la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST["descripcion"];

    // Escapa caracteres especiales para evitar inyecciones SQL
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);

    $sql = "INSERT INTO procedimientos (descripcion) VALUES ('$descripcion')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $response = [
            'success' => true,
            'id' => mysqli_insert_id($conexion)
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al agregar el procedimiento: ' . mysqli_error($conexion)
        ];
    }

    // Devuelve la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Bad Request: Método no permitido.";
}
?>
