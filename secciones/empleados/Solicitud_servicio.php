<?php
include("../../templates/header.php");
?>



<!DOCTYPE html>
<html lang="en">

<h3>Solicitud de Servicio</h3>

        <div class="form-group">
            <label for="codigoEquipo">Código de Equipo</label>
            <input type="text" class="form-control" id="codigoEquipo" name="codigoEquipo" required>
            <button type="button" class="btn btn-primary mt-2" id="buscarEquipo">Buscar</button>
            <div id="informacionEquipo" class="mt-2"></div> <!-- Este div mostrará la información del equipo -->
        </div>

        <div class="form-group">
            <label for="urgencia">Urgencia</label>
            <select class="form-control" id="urgencia" name="urgencia" required>
                <option value="alta">Alta</option>
                <option value="media">Media</option>
                <option value="baja">Baja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="descripcionFalla">Descripción de la Falla</label>
            <textarea class="form-control" id="descripcionFalla" name="descripcionFalla" rows="4" required></textarea>
        </div>

        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        <button type="button" class="btn btn-primary" id="nuevo">Nuevo</button>
        <button type="button" class="btn btn-secondary" id="salir">Salir</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        // Función para guardar la solicitud
        document.getElementById("guardar").addEventListener("click", function() {
            // Obtener los datos
            var codigoEquipo = document.getElementById("codigoEquipo").value;
            var urgencia = document.getElementById("urgencia").value;
            var descripcionFalla = document.getElementById("descripcionFalla").value;

            // Aquí puedes agregar la lógica para enviar los datos al servidor
        });
        document.getElementById("guardar").addEventListener("click", function() {
    var codigoEquipo = document.getElementById("codigoEquipo").value;
    var urgencia = document.getElementById("urgencia").value;
    var descripcionFalla = document.getElementById("descripcionFalla").value;

    // Envía los datos al servidor usando fetch
    fetch("guardar_solicitud.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "codigoEquipo=" + encodeURIComponent(codigoEquipo) + "&urgencia=" + encodeURIComponent(urgencia) + "&descripcionFalla=" + encodeURIComponent(descripcionFalla)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Solicitud guardada exitosamente");
            // Limpiar los campos después de guardar
            document.getElementById("codigoEquipo").value = "";
            document.getElementById("urgencia").value = "alta";
            document.getElementById("descripcionFalla").value = "";
            document.getElementById("informacionEquipo").innerHTML = "";
        } else {
            alert("Error al guardar la solicitud: " + data.mensaje);
        }
    })
    .catch(error => console.error("Error:", error));
});

    document.getElementById("salir").addEventListener("click", function() {
        window.close();
    });

    document.getElementById("buscarEquipo").addEventListener("click", function() {
        var codigoEquipo = document.getElementById("codigoEquipo").value;

        fetch("procesar_equipo.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "codigoEquipo=" + codigoEquipo
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("informacionEquipo").innerHTML = `
                    <p>Código: ${data.codigo}</p>
                    <p>Urgencia: ${data.urgencia}</p>
                    <p>Descripción de Falla: ${data.descripcion}</p>
                    <p>Fecha de Creación: ${data.fecha_creacion}</p>
                `;
            } else {
                alert(data.mensaje);
            }
        })
        .catch(error => console.error("Error:", error));
    });
</script>

</body>

</html>

<?php
include("../../templates/footer.php");
?>
