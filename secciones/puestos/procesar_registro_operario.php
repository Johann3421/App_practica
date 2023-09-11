<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $codigoOperario = $_POST["codigoOperario"];
    $nombreOperario = $_POST["nombreOperario"];
    $sueldoOperario = $_POST["sueldoOperario"];

    // Directorio donde se guardarán las imágenes de perfil
    $directorioImagenes = "imagenes_perfil/";

    // Comprobación y manejo de la imagen de perfil
    if ($_FILES["imagenOperario"]["error"] == UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES["imagenOperario"]["name"];
        $rutaImagen = $directorioImagenes . $nombreImagen;
        move_uploaded_file($_FILES["imagenOperario"]["tmp_name"], $rutaImagen);
    } else {
        echo "Error al cargar la imagen de perfil.";
        // Puedes manejar el error de otra manera, según tus necesidades.
    }

    // Aquí puedes realizar la lógica para guardar estos datos en tu base de datos o archivo local.
    $servername = "localhost:33064";
    $username = "root";
    $password = "johann";
    $dbname = "equipos";
    
    // Crear una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Operarios (codigoOperario, nombreOperario,sueldoOperario) VALUES ('$codigoOperario', '$nombreOperario', '$sueldoOperario')";

// Ejecuta la consulta
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}
    // Redirige al usuario a la página de registro de operario
    header("Location: Operarios.php");
    exit();
}
?>
