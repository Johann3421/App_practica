<?php

$servername = "localhost:33064";  // Cambia esto si tu servidor MySQL no se encuentra en localhost.
$username = "root";         // Tu nombre de usuario de MySQL (por defecto es root en XAMPP).
$password = "johann";             // Deja esto en blanco si no configuraste una contraseña en MySQL.
$database = "equipos";  // Reemplaza con el nombre de tu base de datos.

// Crea una conexión a la base de datos.
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión.
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $codigoMaterial = $_POST["codigoMaterial"];
    $nombreMaterial = $_POST["nombreMaterial"];
    $cantidadMaterial = $_POST["cantidadMaterial"];
    $lugarVenta = $_POST["lugarVenta"];
    $precioMaterial = $_POST["precioMaterial"];
    $almacenamiento = $_POST["almacenamiento"];

    // Aquí puedes realizar la lógica para guardar estos datos en tu base de datos o archivo local.
    // Consulta SQL para insertar los datos en una tabla llamada "materiales"
$sql = "INSERT INTO materiales (codigo, nombre, cantidad, lugar_venta, precio, almacenamiento) VALUES ('$codigoMaterial', '$nombreMaterial', '$cantidadMaterial', '$lugarVenta', '$precioMaterial', '$almacenamiento')";
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}


    // Redirige al usuario a la página de registro de material
    header("Location: material.php");
    exit();
}
?>
