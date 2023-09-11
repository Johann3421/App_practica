<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost:33064", "root", "johann", "app");

// Verifica si la conexión fue exitosa
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtiene los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar el usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = mysqli_query($conexion, $sql);

// Verifica si se encontró un usuario válido
if (mysqli_num_rows($resultado) == 1) {
    echo "Inicio de sesión exitoso. ¡Bienvenido, $usuario!";
    header("Location: index.php");
    exit();
} else {
    echo "Usuario o contraseña incorrectos. Por favor, intenta de nuevo.";
}

// Cierra la conexión
mysqli_close($conexion);
?>
