<?php
include("../../templates/header.php");

?>
<br/>
<div class="container mt-4">
    <h2>Registro de Mantenimiento Preventivo</h2>

    <!-- Campo de búsqueda por código de equipo -->
    <div class="mb-3">
        <label for="codigoEquipo" class="form-label">Búsqueda por Código</label>
        <input type="text" class="form-control" id="codigoEquipo" name="codigoEquipo" placeholder="Ingrese el código del equipo">
    </div>

    <!-- Botón para buscar mantenimientos planeados -->
    <button type="button" class="btn btn-primary" id="buscarMantenimientos">Buscar</button>

    <!-- Lista de mantenimientos planeados -->
    <ul class="list-group mt-4" id="listaMantenimientos">
        <!-- Aquí se mostrarán los mantenimientos planeados -->
    </ul>

    <!-- Cuadro de registro de inspección -->
    <div class="mt-4" id="registroInspeccion">
        <!-- Aquí se mostrarán las actividades de inspección -->
    </div>

    <!-- Cuadro de Mano de Obra -->
    <div class="mt-4" id="manoDeObra">
        <!-- Aquí se mostrará la información del encargado -->
    </div>

    <!-- Cuadro de Materiales -->
    <div class="mt-4" id="materiales">
        <!-- Aquí se mostrarán los materiales necesarios -->
    </div>
</div>



<?php
include("../../templates/footer.php");
include("script.php")
?>