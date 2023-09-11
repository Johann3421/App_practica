<?php
include("../../templates/header.php");

?>
<br/>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato de Equipo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Formato de Equipo</h1>
        <form action="generar_formato_equipo.php" method="post">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código del Equipo</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="mb-3">
                <label for="encargado" class="form-label">Nombre del Encargado</label>
                <input type="text" class="form-control" id="encargado" name="encargado" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>
</html>



<?php
include("../../templates/footer.php");

?>