<?php
include("../../templates/header.php");

?>
<br/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Material</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Registro de Material</h1>

        <!-- Formulario de Registro de Material -->
        <form action="procesar_registro_material.php" method="POST">
            <!-- Código -->
            <div class="mb-3">
                <label for="codigoMaterial" class="form-label">Código de Material</label>
                <input type="text" class="form-control" id="codigoMaterial" name="codigoMaterial" required>
            </div>

            <!-- Datos de Material -->
            <h2>Datos de Material</h2>
            <div class="mb-3">
                <label for="nombreMaterial" class="form-label">Nombre del Material</label>
                <input type="text" class="form-control" id="nombreMaterial" name="nombreMaterial" required>
            </div>
            <div class="mb-3">
                <label for="cantidadMaterial" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidadMaterial" name="cantidadMaterial" required>
            </div>
            <div class="mb-3">
                <label for="lugarVenta" class="form-label">Lugar de Venta</label>
                <input type="text" class="form-control" id="lugarVenta" name="lugarVenta">
            </div>
            <div class="mb-3">
                <label for="precioMaterial" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precioMaterial" name="precioMaterial">
            </div>
            <div class="mb-3">
                <label for="almacenamiento" class="form-label">Lugar de Almacenamiento</label>
                <input type="text" class="form-control" id="almacenamiento" name="almacenamiento">
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
