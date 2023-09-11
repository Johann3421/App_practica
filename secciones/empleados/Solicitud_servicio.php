<?php
include("../../templates/header.php");

?>
<br/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Servicio</title>
    <!-- Agrega enlaces a los archivos CSS de Bootstrap y cualquier otro CSS personalizado aquí -->
    <link rel="stylesheet" href="ruta_a_tu_archivo_css_bootstrap.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Solicitud de Servicio</h1>
        <form action="procesar_solicitud_servicio.php" method="POST">
            <!-- Campo de Número de Solicitud y Fecha -->
            <div class="mb-3">
                <label for="numeroSolicitud" class="form-label">Número de Solicitud</label>
                <input type="text" class="form-control" id="numeroSolicitud" name="numeroSolicitud">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>

            <!-- Campo de Código de Equipo -->
            <div class="mb-3">
                <label for="codigoEquipo" class="form-label">Código de Equipo</label>
                <input type="text" class="form-control" id="codigoEquipo" name="codigoEquipo">
                <button type="button" class="btn btn-primary mt-2" id="buscarEquipo">Buscar</button>
                <!-- Aquí se mostrará la información del equipo -->
                <div id="infoEquipo">
                    <!-- Información del equipo se mostrará aquí -->
                </div>
            </div>

            <!-- Campo de Urgencia -->
            <div class="mb-3">
                <label for="urgencia" class="form-label">Urgencia</label>
                <select class="form-select" id="urgencia" name="urgencia">
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>
            </div>

            <!-- Campo de Descripción de Trabajo/Falla -->
            <div class="mb-3">
                <label for="descripcionTrabajo" class="form-label">Descripción de Trabajo/Falla</label>
                <textarea class="form-control" id="descripcionTrabajo" name="descripcionTrabajo" rows="4"></textarea>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button class="btn btn-primary" type="submit" name="guardarSolicitud">Guardar</button>
                <button class="btn btn-secondary" type="button" id="limpiarCampos">Nuevo</button>
                <button class="btn btn-danger" type="button" id="cerrarFormulario">Salir</button>
            </div>
        </form>
    </div>

    <!-- Agrega enlaces a los archivos JavaScript de Bootstrap y cualquier otro JavaScript personalizado aquí -->
    <script src="ruta_a_tu_archivo_js_bootstrap.js"></script>
</body>
</html>



<?php
include("../../templates/footer.php");
include("script.php");
?>