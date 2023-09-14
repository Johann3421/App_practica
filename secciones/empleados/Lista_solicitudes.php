<?php
include("../../templates/header.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Formulario de Mantenimiento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Lista de Solicitudes de Servicio</h1>
            <select class="form-control" id="solicitudes">
                <option value="solicitud1">Solicitud 1</option>
                <option value="solicitud2">Solicitud 2</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
            <button class="btn btn-primary mt-2" onclick="seleccionarSolicitud()">Seleccionar</button>
        </div>
        <div class="col-md-6">
            <h1>Información del Equipo</h1>
            <label for="equipo" class="form-label">Equipo</label>
                <div class="input-group">
                    <input type="text" id="equipo" name="equipo" class="form-control" placeholder="Código del equipo" required>
                    <button type="button" onclick="buscarEquipo()" class="btn btn-outline-secondary">Buscar</button>
                    <input type="hidden" id="equipoCodigo" name="equipoCodigo">
                </div>
                <div id="infoEquipo" class="border p-3"></div>
    <!-- Agrega más opciones según sea necesario -->
</select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <h1>La Falla se Puede Solucionar</h1>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="solucion" value="si" id="solucionSi">
                <label class="form-check-label" for="solucionSi">
                    Sí
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="solucion" value="no" id="solucionNo">
                <label class="form-check-label" for="solucionNo">
                    No
                </label>
            </div>
            <div class="form-group mt-2">
                <label for="detalle">Detalle:</label>
                <textarea class="form-control" id="detalle" name="detalle"></textarea>
            </div>
            <button class="btn btn-primary" onclick="actualizar()">Actualizar</button>
        </div>
    </div>
</div>

<script>
     function seleccionarSolicitud() {
        var solicitudSeleccionada = document.getElementById("solicitudes").value;

        // Realizar petición AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "lista_solicitudes_bd.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                document.getElementById("infoEquipo").innerHTML = xhr.responseText;
            }
        }
        xhr.send("solicitud=" + solicitudSeleccionada);
    }

function actualizar() {
    var solucion = document.querySelector('input[name="solucion"]:checked');
    var detalle = document.getElementById("detalle").value;

    if (!solucion) {
        alert("Selecciona si la falla se puede solucionar o no.");
        return;
    }

    // Realizar petición AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "lista_solicitudes_bd.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            alert(xhr.responseText); // Puedes mostrar un mensaje de éxito o hacer otras acciones aquí
        }
    }
    xhr.send("solucion=" + solucion.value + "&detalle=" + detalle);
}
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


</script>

<?php
include("../../templates/footer.php");
?>