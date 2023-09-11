<?php
include("../../templates/header.php");

?>
<br/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Equipos</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Registro de Equipos</h1>

        <!-- Formulario de Registro de Equipo -->
        <form action="procesar_registro_equipo.php" method="POST" enctype="multipart/form-data">
            <!-- Datos del Equipo -->
            <h2>Datos del Equipo</h2>
            <div class="mb-3">
                <label for="nombreEquipo" class="form-label">Nombre del Equipo</label>
                <input type="text" class="form-control" id="nombreEquipo" name="nombreEquipo" required>
            </div>

            <!-- Accesorios -->
            <h2>Accesorios</h2>
            <div class="mb-3">
                <label for="accesorios" class="form-label">Accesorios</label>
                <textarea class="form-control" id="accesorios" name="accesorios" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-primary" id="agregarAccesorio">Agregar</button>
            <ul id="listaAccesorios"></ul>

            <!-- Partes del Equipo -->
            <h2>Partes del Equipo</h2>
            <div class="mb-3">
                <label for="parteEquipo" class="form-label">Nombre de la Parte</label>
                <input type="text" class="form-control" id="parteEquipo" name="parteEquipo">
            </div>
            <button type="button" class="btn btn-primary" id="agregarParte">Agregar</button>
            <ul id="listaPartes"></ul>

            <!-- Otros Datos -->
            <h2>Otros Datos</h2>
            <div class="mb-3">
                <label for="fabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" name="fabricante">
            </div>
            <div class="mb-3">
                <label for="parametrosElectricos" class="form-label">Parámetros Eléctricos</label>
                <input type="text" class="form-control" id="parametrosElectricos" name="parametrosElectricos">
            </div>

            <!-- Datos Técnicos -->
            <h2>Datos Técnicos</h2>
            <div class="mb-3">
                <label for="archivoManual" class="form-label">Cargar Manual</label>
                <input type="file" class="form-control" id="archivoManual" name="archivoManual">
            </div>
            <div class="mb-3">
                <label for="imagenEquipo" class="form-label">Cargar Imagen del Equipo</label>
                <input type="file" class="form-control" id="imagenEquipo" name="imagenEquipo">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
    </body>
</html>

<?php
include("../../templates/footer.php");
include("script.php")
?>