<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el código del equipo y las instrucciones del formulario
    $codigoEquipo = $_POST["codigoEquipo"];
    $instrucciones = $_POST["instrucciones"];

    // Crea un nombre de archivo único
    $nombreArchivo = "instrucciones_" . date("YmdHis") . ".txt";

    // Abre el archivo para escritura
    $archivo = fopen($nombreArchivo, "w");

    // Escribe el código del equipo y las instrucciones en el archivo
    fwrite($archivo, "Código del Equipo: " . $codigoEquipo . "\n\n");
    fwrite($archivo, "Instrucciones:\n" . $instrucciones);

    // Cierra el archivo
    fclose($archivo);

    // Descarga el archivo generado
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($nombreArchivo));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($nombreArchivo));
    readfile($nombreArchivo);

    // Elimina el archivo después de la descarga
    unlink($nombreArchivo);

    exit;
} else {
    // Si no se recibieron datos por POST, muestra un mensaje de error
    echo "No se recibieron datos del formulario.";
}
?>

