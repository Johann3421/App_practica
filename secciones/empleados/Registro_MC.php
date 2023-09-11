<?php
include("../../templates/header.php");

?>
<br/>
<div class="container mt-4">
    <h2>Registro de Mantenimiento Controlado</h2>

    <!-- Campo de búsqueda de código de equipo -->
    <div class="mb-3">
        <label for="codigoEquipo" class="form-label">Código de Equipo</label>
        <input type="text" class="form-control" id="codigoEquipo" name="codigoEquipo" placeholder="Ingrese el código del equipo">
    </div>

    <!-- Botón para buscar órdenes de trabajo -->
    <button type="button" class="btn btn-primary" id="buscarOrdenesTrabajo">Buscar</button>

    <!-- Lista de órdenes de trabajo pendientes -->
    <ul class="list-group mt-4" id="listaOrdenesTrabajo">
        <!-- Aquí se mostrarán las órdenes de trabajo pendientes -->
    </ul>

    <!-- Cuadro de registro de inspección -->
    <div class="mt-4">
        <h3>Registro de Inspección</h3>
        <div id="registroInspeccion">
            <!-- Aquí se mostrará la actividad a realizar -->
        </div>
    </div>

    <!-- Cuadro de Mano de Obra -->
    <div class="mt-4">
        <h3>Mano de Obra</h3>
        <div id="manoDeObra">
            <!-- Aquí se mostrará la información del encargado -->
        </div>
    </div>

    <!-- Cuadro de Materiales -->
    <div class="mt-4">
        <h3>Materiales</h3>
        <div id="materiales">
            <!-- Aquí se mostrarán los materiales necesarios -->
        </div>
    </div>
</div>




<?php
include("../../templates/footer.php");
include("script.php")
?>