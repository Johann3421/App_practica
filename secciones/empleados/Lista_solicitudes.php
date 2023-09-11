<?php
include("../../templates/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Solicitudes de Servicio</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Solicitudes de Servicio</h1>

        <!-- Lista de Solicitudes -->
        <ul class="list-group">
            <!-- Ejemplo de solicitud -->
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Equipo: Equipo ABC</h5>
                        <p>Fecha: 2023-08-29</p>
                        <p>Descripción de la falla: El equipo no enciende.</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Opciones para la falla -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fallaSolucionable" id="fallaSi" value="Si">
                            <label class="form-check-label" for="fallaSi">
                                La falla se puede solucionar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fallaSolucionable" id="fallaNo" value="No">
                            <label class="form-check-label" for="fallaNo">
                                La falla no se puede solucionar
                            </label>
                        </div>
                        <!-- Detalle -->
                        <div class="form-group">
                            <label for="detalleFalla">Detalle</label>
                            <textarea class="form-control" id="detalleFalla" name="detalleFalla" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </li>
            <!-- Fin del ejemplo de solicitud -->
        </ul>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-Yy3z7U5LJ7x5Og0tPe3vI5Bx8r+/p2LC5f5z5s5k5t5z5Og0tPe3vI5Bx8r+/p2LC5f5z" crossorigin="anonymous"></script>
</body>
</html>



<?php
include("../../templates/footer.php");
include("script.php");
?>