<?php
include("../../templates/header.php");

?>
<br/>
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Detalles de Equipo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Reporte de Detalles de Equipo</h1>
        <form id="formulario-detalle" method="post">
    <div class="form-group">
        <label for="codigo">Código del Producto:</label>
        <input type="text" class="form-control" id="codigo" name="codigo" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<div class="mt-4" id="resultado">
    <!-- Aquí se mostrará la información del equipo -->
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#formulario-detalle').submit(function (e) {
                e.preventDefault(); // Evita el envío del formulario por defecto

                var codigo = $('#codigo').val();

                // Realiza una solicitud AJAX para obtener la información del equipo
                $.ajax({
                    url: 'obtener_informacion_equipo.php', // Reemplaza con el nombre de tu script PHP
                    type: 'POST',
                    data: { codigo: codigo },
                    success: function (response) {
                        $('#resultado').html(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php
// Establece la conexión a la base de datos aquí
// Configurar la conexión a la base de datos (ajusta los valores según tu configuración)
$host = 'localhost:33064';
$usuario = 'root';
$contrasena = 'johann';
$base_de_datos = 'mantenimiento_preventivo';


$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);


// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];

    // Consulta SQL para obtener la información del equipo
    $sql = "SELECT * FROM equipos WHERE codigo = :codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();

    // Mostrar la información del equipo
    if ($stmt->rowCount() > 0) {
        $equipo = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h2>Información del Equipo</h2>";
        echo "<p>Equipo: " . $equipo['equipo'] . "</p>";
        echo "<p>Modelo: " . $equipo['modelo'] . "</p>";
        echo "<p>Serie: " . $equipo['serie'] . "</p>";
        if ($equipo['imagen']) {
            echo "<img src='" . $equipo['imagen'] . "' alt='Imagen del equipo'>";
        }
    } else {
        echo "<p>No se encontró ningún equipo con el código de producto proporcionado.</p>";
    }
}

?>



<?php
include("../../templates/footer.php");

?>