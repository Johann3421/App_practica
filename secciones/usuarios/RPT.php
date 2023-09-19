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

</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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




<?php
include("../../templates/footer.php");

?>