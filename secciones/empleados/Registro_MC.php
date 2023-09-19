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
        </div>
    </div>

    <!-- Cuadro de Materiales -->
        <h3>Materiales</h3>
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



<?php
include("../../templates/footer.php");

?>