<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost:33064";
$username = "root";
$password = "johann";
$dbname = "app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['solucion']) && isset($_POST['detalle'])) {
    $solucion = $_POST['solucion'];
    $detalle = $_POST['detalle'];

    // Aquí deberías realizar la inserción en tu base de datos utilizando los valores recibidos.
    // Por ejemplo:
    $sql = "INSERT INTO solicitudes (solucion, detalle) VALUES ('$solucion', '$detalle')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
