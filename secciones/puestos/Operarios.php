<?php
include("../../templates/header.php");

?>
<br/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Operario</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Registro de Operario</h1>

        <!-- Formulario de Registro de Operario -->
        <form action="procesar_registro_operario.php" method="POST" enctype="multipart/form-data">
            <!-- Código -->
            <div class="mb-3">
                <label for="codigoOperario" class="form-label">Código de Operario</label>
                <input type="text" class="form-control" id="codigoOperario" name="codigoOperario" required>
            </div>

            <!-- Datos de Operario -->
            <h2>Datos de Operario</h2>
            <div class="mb-3">
                <label for="nombreOperario" class="form-label">Nombre del Operario</label>
                <input type="text" class="form-control" id="nombreOperario" name="nombreOperario" required>
            </div>
            <div class="mb-3">
                <label for="sueldoOperario" class="form-label">Sueldo</label>
                <input type="number" class="form-control" id="sueldoOperario" name="sueldoOperario" required>
            </div>

            <!-- Imagen de Perfil -->
            <div class="mb-3">
                <label for="imagenOperario" class="form-label">Imagen de Perfil</label>
                <input type="file" class="form-control" id="imagenOperario" name="imagenOperario" accept="image/*" required>
            </div>

            <!-- Botones -->
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-primary" id="botonNuevo">Nuevo</button>
            <button type="button" class="btn btn-danger" id="botonSalir">Salir</button>
        </form>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-Yy3z7U5LJ7x5Og0tPe3vI5Bx8r+/p2LC5f5z5s5k5t5z5Og0tPe3vI5Bx8r+/p2LC5f5z" crossorigin="anonymous"></script>
</body>
</html>



<?php
include("../../templates/footer.php");
?>