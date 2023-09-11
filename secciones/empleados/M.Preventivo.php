<?php
include("../../templates/header.php");
include("../../bd.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Preventivo</title>
    <!-- Incluye la librería de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Mantenimiento Preventivo</h1>
        <form action="guardar_mantenimiento_preventivo.php" method="POST">
            <!-- Campo de selección de equipo -->
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo</label>
                <div class="input-group">
                    <input type="text" id="equipo" name="equipo" class="form-control" placeholder="Código del equipo" required>
                    <button type="button" onclick="buscarEquipo()" class="btn btn-outline-secondary">Buscar</button>
                </div>
            </div>
            <!-- Información del equipo -->
            <div id="infoEquipo" class="mb-3">
                <!-- Aquí se mostrará la información del equipo (modelo, serie, imagen) -->
            </div>
            <!-- Campo de modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo del equipo" required>
            </div>
            <!-- Campo de serie -->
            <div class="mb-3">
                <label for="serie" class="form-label">Serie</label>
                <input type="text" id="serie" name="serie" class="form-control" placeholder="Serie del equipo" required>
            </div>
            <!-- Campo de imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="text" id="imagen" name="imagen" class="form-control" placeholder="Ruta de la imagen" required>
            </div>
            <!-- Campo de descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Detalles del mantenimiento y acciones preventivas" required></textarea>
            </div>
            <!-- Programación de Mantenimiento Preventivo -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
                <button type="button" onclick="agregarFecha()" class="btn btn-outline-secondary mt-2">Agregar Fecha</button>
            </div>
            <!-- Lista de fechas programadas -->
            <div class="mb-3">
                <label>Fechas Programadas</label>
                <ul id="fechasProgramadas" class="list-group"></ul>
            </div>
            <!-- Campo oculto para el código del equipo -->
            <input type="hidden" id="equipoCodigo" name="equipoCodigo">
            <!-- Botón de enviar el formulario -->
            <button type="submit" class="btn btn-primary">Guardar Mantenimiento Preventivo</button>
        </form>
    </div>

    <!-- Incluye los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ... (otros scripts) ... -->

    <script>
        // Función para buscar equipo
        function buscarEquipo() {
    var codigoEquipo = document.getElementById("equipo").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var equipo = JSON.parse(this.responseText);
            if (equipo) {
                document.getElementById("infoEquipo").innerHTML = `
                    <p>Modelo: ${equipo.modelo}</p>
                    <p>Serie: ${equipo.serie}</p>
                    <p>Fecha de Mantenimiento: ${equipo.fecha}</p>
                    <p>Descripción: ${equipo.descripcion}</p>
                    <img src="${equipo.imagen}" alt="Imagen del Equipo">
                `;
            } else {
                alert("Equipo no encontrado");
            }
        }
    };
    xhttp.open("GET", "buscar_equipo.php?codigo=" + codigoEquipo, true);
    xhttp.send();
}
        // Función para agregar fecha a la lista
        function agregarFecha() {
            var fecha = document.getElementById("fecha").value;
            var listaFechas = document.getElementById("fechasProgramadas");
            var nuevaFecha = document.createElement("li");
            nuevaFecha.textContent = fecha;
            listaFechas.appendChild(nuevaFecha);
        }
    </script>

    <!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <div class="mb-4">
        <br/>
    <h3>Materiales Utilizados</h3>
    <form action="procesar_mantenimiento.php" id="materialesForm">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar por código" id="codigoMaterial">
            <button class="btn btn-primary" type="button" id="buscarMaterial">Buscar</button>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cantidad utilizada" id="cantidadMaterial">
            <button class="btn btn-success" type="button" id="agregarMaterial">Agregar</button>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="listaMateriales">
            <!-- Aquí se mostrarán los materiales registrados -->
        </tbody>
    </table>
</div>
<br/>
<div class="mb-4">
    <h3>Herramientas Utilizadas</h3>
    <form id="herramientasForm">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar por código" id="codigoHerramienta">
            <button class="btn btn-primary" type="button" id="buscarHerramienta">Buscar</button>
        </div>
        <button class="btn btn-success" type="button" id="agregarHerramienta">Agregar</button>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="listaHerramientas">
            <!-- Aquí se mostrarán las herramientas registradas -->
        </tbody>
    </table>
</div>
<br/>
<div class="mb-4">
    <h3>Mano de Obra</h3>
    <form id="manoDeObraForm">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar por código de trabajador" id="codigoTrabajador">
            <button class="btn btn-primary" type="button" id="buscarTrabajador">Buscar</button>
        </div>
        <div class="mb-3">
            <label for="horasTrabajadas" class="form-label">Horas Trabajadas</label>
            <input type="number" class="form-control" id="horasTrabajadas" name="horasTrabajadas" placeholder="Horas trabajadas">
        </div>
        <button class="btn btn-success" type="button" id="agregarTrabajador">Agregar</button>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Sueldo</th>
                <th>Horas Trabajadas</th>
                <th>Total a Pagar</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="listaTrabajadores">
            <!-- Aquí se mostrarán los trabajadores registrados -->
        </tbody>
    </table>
</div>
<br/>
<div class="mb-4">
    <h3>Qué se va a Realizar</h3>
    <form id="procedimientosForm">
        <div class="mb-3">
            <label for="descripcionProcedimiento" class="form-label">Descripción de Procedimientos</label>
            <textarea class="form-control" id="descripcionProcedimiento" name="descripcionProcedimiento" rows="4" placeholder="Ingrese los procedimientos a realizar"></textarea>
        </div>
        <button class="btn btn-success" type="button" id="agregarProcedimiento">Agregar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="listaProcedimientos">
            <!-- Aquí se mostrarán los procedimientos registrados -->
        </tbody>
    </table>
    
    <button class="btn btn-primary" type="button" id="imprimirProcedimientos">Imprimir</button>
</div>





    <!-- Incluye la librería de jQuery (necesaria para algunas funcionalidades de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye la librería de Bootstrap (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    
    <!-- Aquí puedes incluir tus scripts personalizados para la funcionalidad del formulario -->
    <script>
        // Tu código JavaScript personalizado aquí
    </script>
</body>
</html>


<?php
include("../../templates/footer.php");


?>



