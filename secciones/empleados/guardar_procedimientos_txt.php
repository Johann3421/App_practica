<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $procedimientos = $_POST['procedimientos'];

    if (!empty($procedimientos)) {
        $file = fopen("procedimientos.txt", "w");

        if ($file) {
            fwrite($file, $procedimientos);
            fclose($file);

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="procedimientos.txt"');
            readfile('procedimientos.txt');
            exit;
        } else {
            echo "Error al crear el archivo.";
        }
    } else {
        echo "No hay procedimientos para guardar.";
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Bad Request: Método no permitido.";
}
?>
