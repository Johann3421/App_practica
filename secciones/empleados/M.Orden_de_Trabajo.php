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
    </div>
    <br/>
        <h1>Registro de Materiales</h1>
        <form action="procesar_registro_materiales.php" method="POST" class="mb-4">
            <div class="form-group">
                <label for="codigoMaterial">Código de Material</label>
                <input type="text" id="codigoMaterial" name="codigoMaterial" class="form-control" required>
            </div>
            <button type="button" onclick="buscarMaterial()" class="btn btn-primary">Buscar</button>
        </form>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Cantidad Utilizada</th>
                    <th>Costo Unitario</th>
                    <th>Costo Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="listaMateriales">
                <!-- Aquí se mostrarán los materiales registrados -->
            </tbody>
        </table>

    <script>
        // Función para buscar material
        function buscarMaterial() {
    var codigoMaterial = document.getElementById("codigoMaterial").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var material = JSON.parse(this.responseText);
            if (material) {
                agregarMaterial(material);
            } else {
                alert("Material no encontrado");
            }
        }
    };
    xhttp.open("POST", "procesar_registro_materiales.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("codigoMaterial=" + codigoMaterial + "&cantidadUtilizada=0");
}

        // Función para agregar material a la lista
        function agregarMaterial(material) {
    var listaMateriales = document.getElementById("listaMateriales");
    var cantidadUtilizada = parseInt(prompt("Ingrese la cantidad utilizada:"));

    // Verificar si se ingresó un número válido
    if (!isNaN(cantidadUtilizada) && cantidadUtilizada > 0) {
        // Crear un objeto con los detalles del material
        var materialObj = {
            codigo: material.codigo,
            descripcion: material.descripcion,
            cantidadUtilizada: cantidadUtilizada,
            costoUnitario: material.costoUnitario,
            costoTotal: cantidadUtilizada * material.costoUnitario
        };

        // Crea una nueva fila para el material
        var nuevaFila = document.createElement("tr");
        nuevaFila.innerHTML = `
            <td>${materialObj.codigo}</td>
            <td>${materialObj.descripcion}</td>
            <td>${materialObj.cantidadUtilizada}</td>
            <td>${materialObj.costoUnitario}</td>
            <td>${materialObj.costoTotal}</td>
            <td><button type="button" onclick="eliminarMaterial(this)">Eliminar</button></td>
        `;

        // Agrega la fila a la tabla
        listaMateriales.appendChild(nuevaFila);

        // Llamar a la función AJAX para actualizar la cantidad en la base de datos
        actualizarCantidadEnBD(materialObj.codigo, cantidadUtilizada);
    } else {
        alert("Por favor ingrese una cantidad válida.");
    }
}

function actualizarCantidadEnBD(codigoMaterial, cantidadUtilizada) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Mostrar la respuesta del servidor (puede ser un mensaje de éxito o error)
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "actualizar_cantidad.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`codigoMaterial=${codigoMaterial}&cantidadUtilizada=${cantidadUtilizada}`);
}

        // Función para eliminar material de la lista
        function eliminarMaterial(botonEliminar) {
    var fila = botonEliminar.parentElement.parentElement;
    fila.remove();
}
    </script>

<br/>
<h1>Registro de Herramientas</h1>
<form action="procesar_herramientas.php" method="POST">
    <!-- Campo de búsqueda de código de herramienta -->
    <div class="form-group">
        <label for="codigoHerramienta">Código de Herramienta</label>
        <input type="text" id="codigoHerramienta" name="codigoHerramienta" class="form-control" required>
    </div>
    <button type="button" onclick="buscarHerramienta()" class="btn btn-primary">Buscar</button>

    <!-- Botón para agregar la herramienta -->
    <button type="button" onclick="agregarHerramienta()" class="btn btn-success mt-3">Agregar</button>
</form>

<table class="table">
    <thead class="thead-dark">
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

<script>
    function buscarHerramienta() {
    var codigoHerramienta = document.getElementById("codigoHerramienta").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var herramienta = JSON.parse(this.responseText);
            if (herramienta && herramienta.success) {
                agregarHerramienta(herramienta.herramienta);
            } else {
                alert("Herramienta no encontrada");
            }
        }
    };
    xhttp.open("POST", "procesar_herramientas.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("codigoHerramienta=" + codigoHerramienta);
}


function agregarHerramienta(herramienta) {
    var listaHerramientas = document.getElementById("listaHerramientas");

    // Verifica si la herramienta no es undefined y si tiene la propiedad 'codigo'
    if (herramienta && herramienta.codigo) {
        // Crea una nueva fila para la herramienta
        var nuevaFila = document.createElement("tr");
        nuevaFila.innerHTML = `
            <td>${herramienta.codigo}</td>
            <td>${herramienta.descripcion}</td>
            <td><button type="button" onclick="eliminarHerramienta(this)" class="btn btn-danger">Eliminar</button></td>
        `;

        // Agrega la fila a la tabla
        listaHerramientas.appendChild(nuevaFila);
    } else {
        alert("Herramienta no encontrada");
    }
}

    function eliminarHerramienta(botonEliminar) {
        var fila = botonEliminar.parentElement.parentElement;
        fila.remove();
    }
</script>
<br/>
<div class="container mt-4">
<h3>Mano de Obra</h3>
    <form id="manoDeObraForm" action="procesar_mano_de_obra.php" method="POST">
        <div class="form-group">
            <label for="codigoTrabajador">Código de Trabajador</label>
            <input type="text" class="form-control" id="codigoTrabajador" name="codigoTrabajador" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
        <div class="form-group">
            <label for="nombreTrabajador">Nombre</label>
            <input type="text" class="form-control" id="nombreTrabajador" name="nombreTrabajador" readonly>
        </div>
        <div class="form-group">
            <label for="fotoTrabajador">Foto</label>
            <img id="fotoTrabajador" src="" alt="Foto de Trabajador" style="max-width: 150px;" class="img-fluid">
        </div>
        <div class="form-group">
            <label for="sueldoTrabajador">Sueldo</label>
            <input type="text" class="form-control" id="sueldoTrabajador" name="sueldoTrabajador" readonly>
        </div>
        <div class="form-group">
            <label for="horasTrabajadas">Horas Trabajadas</label>
            <input type="number" class="form-control" id="horasTrabajadas" name="horasTrabajadas" min="0" required>
        </div>
        <div class="form-group">
            <label for="totalPagar">Total a Pagar</label>
            <input type="text" class="form-control" id="totalPagar" name="totalPagar" readonly>
        </div>
        <button type="submit" class="btn btn-success" id="agregarTrabajador" name="agregarTrabajador">Agregar</button>
    </form>

    <table class="table mt-4">
        <thead class="thead-dark">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById("agregarTrabajador").addEventListener("click", function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        
        var codigo = document.getElementById("codigoTrabajador").value;
        var nombre = document.getElementById("nombreTrabajador").value;
        var sueldo = document.getElementById("sueldoTrabajador").value;
        var horasTrabajadas = document.getElementById("horasTrabajadas").value;
        var totalPagar = sueldo * horasTrabajadas;
        var listaTrabajadores = document.getElementById("listaTrabajadores");

        var nuevaFila = document.createElement("tr");
        nuevaFila.innerHTML = `
            <td>${codigo}</td>
            <td>${nombre}</td>
            <td><img src="ruta_a_la_foto" alt="Foto de Trabajador" style="max-width: 50px;"></td>
            <td>${sueldo}</td>
            <td>${horasTrabajadas}</td>
            <td>${totalPagar}</td>
            <td><button type="button" class="btn btn-danger" onclick="eliminarTrabajador(this)">Eliminar</button></td>
        `;

        listaTrabajadores.appendChild(nuevaFila);

        // Llenar los campos del formulario con los datos del trabajador
        document.getElementById("codigoTrabajador").value = "";
        document.getElementById("nombreTrabajador").value = "";
        document.getElementById("sueldoTrabajador").value = "";
        document.getElementById("horasTrabajadas").value = "";
        document.getElementById("totalPagar").value = "";
    });


document.getElementById("agregarTrabajador").addEventListener("click", agregarTrabajador);

function eliminarTrabajador(botonEliminar) {
    var fila = botonEliminar.parentElement.parentElement;
    fila.remove();
}
</script>

<!-- A continuación, añadimos el código JavaScript para buscar trabajadores y mostrar su información -->
<script>
document.getElementById("buscarTrabajador").addEventListener("click", function() {
    var codigoTrabajador = document.getElementById("codigoTrabajador").value;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta.success) {
                document.getElementById("nombreTrabajador").value = respuesta.nombre;
                document.getElementById("sueldoTrabajador").value = respuesta.sueldo;
                document.getElementById("fotoTrabajador").src = respuesta.foto;
            } else {
                alert(respuesta.mensaje);
            }
        }
    };

    xhttp.open("POST", "procesar_mano_de_obra.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("codigoTrabajador=" + codigoTrabajador);
});
</script>
<br/>
<div class="container mt-4">
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
    <script>
        $(document).ready(function() {
    $("#agregarProcedimiento").click(function() {
        var descripcion = $("#descripcionProcedimiento").val();
        if (descripcion) {
            $.post("guardar_procedimiento.php", { descripcion: descripcion }, function(data) {
                if (data.success) {
                    $("#listaProcedimientos").append("<tr><td>" + descripcion + "</td><td><button class='btn btn-danger eliminar' data-id='" + data.id + "'>Eliminar</button></td></tr>");
                    $("#descripcionProcedimiento").val("");
                } else {
                    alert("Error al agregar el procedimiento");
                }
            }, "json");
        } else {
            alert("Por favor, ingresa una descripción válida.");
        }
    });
});
$(document).ready(function() {
    $("#listaProcedimientos").on("click", ".eliminar", function() {
        var id = $(this).data("id");
        var row = $(this).closest("tr");
        $.post("eliminar_procedimiento.php", { id: id }, function(data) {
            if (data.success) {
                row.remove();
            } else {
                alert("Error al eliminar el procedimiento");
            }
        }, "json");
    });
});
$(document).ready(function() {
    $("#imprimirProcedimientos").click(function() {
        var procedimientos = $("#listaProcedimientos").text();

        if (procedimientos) {
            $.post("guardar_procedimientos_txt.php", { procedimientos: procedimientos }, function(data) {
                if (data) {
                    // Descarga el archivo
                    var blob = new Blob([data]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'procedimientos.txt';
                    link.click();
                } else {
                    alert("Error al guardar los procedimientos.");
                }
            });
        } else {
            alert("No hay procedimientos para guardar.");
        }
    });
});


    </script>





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