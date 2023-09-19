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