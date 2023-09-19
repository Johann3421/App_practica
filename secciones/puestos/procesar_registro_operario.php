<?php

// Verifica si se recibieron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $codigoOperario = $_POST["codigoOperario"];
    $nombreOperario = $_POST["nombreOperario"];
    $sueldoOperario = $_POST["sueldoOperario"];

    // Procesa la imagen
    $imagenNombre = $_FILES["imagenOperario"]["name"];
    $imagenTmp = $_FILES["imagenOperario"]["tmp_name"];
    $imagenRuta = "imagenes/" . $imagenNombre;

    if (move_uploaded_file($imagenTmp, $imagenRuta)) {
        // La imagen se subió correctamente, ahora puedes guardar la información en la base de datos

        // Conexión a la base de datos (reemplaza con tus propios datos)
        $servername = "localhost:33064";
        $username = "root";
        $password = "johann";
        $dbname = "app";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Prepara y ejecuta la consulta para insertar los datos
        $sql = "INSERT INTO operarios (codigo, nombre, sueldo, imagen) VALUES ('$codigoOperario', '$nombreOperario', '$sueldoOperario', '$imagenRuta')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $conn->error;
        }

        $conn->close();

    } else {
        echo "Error al subir la imagen.";
    }

} else {
    echo "Acceso no autorizado.";
}
?>
