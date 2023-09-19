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
        <form action="procesar_registro_material.php" method="POST" id="formulario-material">
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
            <button type="submit" class="btn btn-success" onclick="handleSubmit(event)">Guardar</button>
    <button type="button" class="btn btn-primary" onclick="limpiarFormulario()">Nuevo</button>
    <button type="button" class="btn btn-danger" onclick="salir()">Salir</button>
        </form>
    </div>

    <!-- Scripts de Bootstrap -->
    
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function handleSubmit(event) {
    event.preventDefault();

    // Realiza la petición al servidor aquí
    // Por ejemplo, usando AJAX
    $.ajax({
        type: 'POST',
        url: 'procesar_registro_material.php',
        data: $('#formulario-material').serialize(),
        success: function(response){
            // Manejar la respuesta del servidor aquí
            console.log(response);
        },
        error: function(error){
            // Manejar errores aquí
            console.error(error);
        }
    });
}

// Función para limpiar el formulario
function limpiarFormulario() {
    // Obtener todos los elementos de entrada del formulario
    var formInputs = document.querySelectorAll('#formulario-material input');
    
    // Limpiar los valores de los elementos de entrada
    formInputs.forEach(function(input) {
        input.value = '';
    });
}


// Función para salir
function salir() {
    // Redirige a la página de inicio o realiza alguna otra acción
    window.location.href = 'Material.php';
}

</script>

<?php
include("../../templates/footer.php");

?>
