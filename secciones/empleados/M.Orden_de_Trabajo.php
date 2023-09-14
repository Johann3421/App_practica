<?php
include("../../templates/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Correctivo - Orden de Trabajo</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Mantenimiento Correctivo - Orden de Trabajo</h1>

        <!-- Número de Orden de Trabajo -->
        <div class="mb-3">
            <label for="numeroOrden" class="form-label">Número de Orden de Trabajo</label>
            <input type="text" class="form-control" id="numeroOrden" readonly>
        </div>

        <!-- Fecha de Registro -->
        <div class="mb-3">
            <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
            <input type="date" class="form-control" id="fechaRegistro">
        </div>

        <!-- Materiales -->
        <div class="mb-3">
            <label for="codigoMaterial" class="form-label">Código de Material</label>
            <input type="text" class="form-control" id="codigoMaterial">
            <button type="button" class="btn btn-primary mt-2" id="buscarMaterial">Buscar</button>
        </div>

        <!-- Información del Material -->
        <div id="infoMaterial" class="mb-3">
            <!-- Aquí se mostrará la información del material (nombre, cantidad, etc.) -->
        </div>

        <!-- Cantidad de Material -->
        <div class="mb-3">
            <label for="cantidadMaterial" class="form-label">Cantidad de Material</label>
            <input type="number" class="form-control" id="cantidadMaterial">
        </div>

        <!-- Botón Agregar Material -->
        <button type="button" class="btn btn-success" id="agregarMaterial">Agregar Material</button>

        <!-- Lista de Materiales -->
        <ul class="list-group mt-3" id="listaMateriales">
            <!-- Los materiales agregados se mostrarán aquí -->
        </ul>

        <!-- Scripts de Bootstrap y lógica en JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-Yy3z7U5LJ7x5Og0tPe3vI5Bx8r+/p2LC5f5z5s5k5t5z5Og0tPe3vI5Bx8r+/p2LC5f5z" crossorigin="anonymous"></script>
        <script>
            // Lógica en JavaScript para buscar y agregar materiales
            // ...

            // Lógica en JavaScript para agregar materiales a la lista
            // ...

            // Lógica en JavaScript para eliminar materiales de la lista
            // ...
        </script>
    </div>
    <div class="container mt-4">
    <h2>Mantenimiento Correctivo - Herramientas</h2>

    <!-- Buscar herramienta por código -->
    <div class="mb-3">
        <label for="codigoHerramienta" class="form-label">Código de Herramienta</label>
        <input type="text" class="form-control" id="codigoHerramienta" name="codigoHerramienta" placeholder="Código de Herramienta">
        <button type="button" class="btn btn-primary mt-2" id="buscarHerramienta">Buscar</button>
    </div>

    <!-- Descripción de la herramienta encontrada -->
    <div class="mb-3">
        <label for="descripcionHerramienta" class="form-label">Descripción de la Herramienta</label>
        <input type="text" class="form-control" id="descripcionHerramienta" name="descripcionHerramienta" readonly>
    </div>

    <!-- Botón para agregar herramienta -->
    <button type="button" class="btn btn-success" id="agregarHerramienta">Agregar Herramienta</button>

    <!-- Lista de herramientas agregadas -->
    <ul class="list-group mt-4" id="listaHerramientas">
        <!-- Aquí se mostrarán las herramientas agregadas -->
    </ul>
</div>
<br/>
<div class="container mt-4">
    <h2>Mantenimiento Correctivo - Mano de Obra</h2>

    <!-- Buscar empleado por código -->
    <div class="mb-3">
        <label for="codigoEmpleado" class="form-label">Código de Empleado</label>
        <input type="text" class="form-control" id="codigoEmpleado" name="codigoEmpleado" placeholder="Código de Empleado">
        <button type="button" class="btn btn-primary mt-2" id="buscarEmpleado">Buscar</button>
    </div>

    <!-- Información del empleado encontrado -->
    <div class="mb-3">
        <label for="infoEmpleado" class="form-label">Información del Empleado</label>
        <input type="text" class="form-control" id="infoEmpleado" name="infoEmpleado" readonly>
    </div>

    <!-- Horas trabajadas y total a pagar -->
    <div class="mb-3">
        <label for="horasTrabajadas" class="form-label">Horas Trabajadas</label>
        <input type="number" class="form-control" id="horasTrabajadas" name="horasTrabajadas" min="0">
    </div>

    <!-- Botón para agregar empleado -->
    <button type="button" class="btn btn-success" id="agregarEmpleado">Agregar Empleado</button>

    <!-- Lista de empleados agregados -->
    <ul class="list-group mt-4" id="listaEmpleados">
        <!-- Aquí se mostrarán los empleados agregados -->
    </ul>
</div>
<br/>
<div class="container mt-4">
    <h2>Mantenimiento Correctivo - Qué se va a Realizar</h2>

    <!-- Cuadro de descripción de procedimientos -->
    <div class="mb-3">
        <label for="descripcionProcedimiento" class="form-label">Descripción del Procedimiento</label>
        <textarea class="form-control" id="descripcionProcedimiento" name="descripcionProcedimiento" rows="4"></textarea>
    </div>

    <!-- Botón para agregar procedimiento -->
    <button type="button" class="btn btn-success" id="agregarProcedimiento">Agregar Procedimiento</button>

    <!-- Lista de procedimientos agregados -->
    <ul class="list-group mt-4" id="listaProcedimientos">
        <!-- Aquí se mostrarán los procedimientos agregados -->
    </ul>
</div>

</body>
</html>


<?php
include("../../templates/footer.php");
?>