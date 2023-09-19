<?php
include("../../templates/header.php");
?>

<br/>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Herramientas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Registro de Herramientas</h1>
        <form id="formulario-herramientas">
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" class="form-control" id="codigo" name="codigo">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre de la Herramienta:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="lugar_venta">Lugar de Venta:</label>
                <input type="text" class="form-control" id="lugar_venta" name="lugar_venta">
            </div>
            <div class="form-group">
                <label for="precio_mercado">Precio en el Mercado:</label>
                <input type="number" class="form-control" id="precio_mercado" name="precio_mercado">
            </div>
            <div class="form-group">
                <label for="almacenamiento">Lugar de Almacenamiento:</label>
                <input type="text" class="form-control" id="almacenamiento" name="almacenamiento">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" id="nuevo">Nuevo</button>
            <button type="button" class="btn btn-danger" id="salir">Salir</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
// Establece la conexión a la base de datos aquí
?>
<script>
        $(document).ready(function(){
    $('#formulario-herramientas').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'procesar_registro_herramienta.php',
            data: $(this).serialize(),
            success: function(response){
                // Mostrar respuesta del servidor
                alert(response);
                
                // Limpia el formulario después de un registro exitoso
                $('#formulario-herramientas')[0].reset();
            },
            error: function(error){
                console.error(error);
            }
        });
    });
});

    </script>


<?php
include("../../templates/footer.php");

?>
