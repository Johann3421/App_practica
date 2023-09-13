<?php
include("../../bd.php"); // Asegúrate de tener un archivo de conexión a la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Escapa caracteres especiales para evitar inyecciones SQL
    $id = mysqli_real_escape_string($conexion, $id);

    $sql = "DELETE FROM procedimientos WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $response = [
            'success' => true
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al eliminar el procedimiento: ' . mysqli_error($conexion)
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
