<?php
$url_base="http://localhost/app/";


?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>

  <nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link active" href="<?php echo $url_base; ?>index.php" aria-current="page">Software Mantenimiento <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo $url_base; ?>secciones/empleados/index.php" id="gestionDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gestion Mantenimiento
            </a>
            <div class="dropdown-menu" aria-labelledby="gestionDropdown">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/empleados/M.Preventivo.php">M.Preventivo</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/empleados/Solicitud_servicio.php">Solicitud Servicio</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/empleados/Lista_solicitudes.php">Lista Solicitudes</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/empleados/M.Orden_de_Trabajo.php">M.Orden de Trabajo</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/empleados/Registro_MC.php">Registro MC</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/empleados/Registro_MPP.php">Registro MPP</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo $url_base; ?>secciones/puestos/index.php" id="tablasDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tablas
            </a>
            <div class="dropdown-menu" aria-labelledby="tablasDropdown">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/puestos/Equipos.php">Equipos</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/puestos/Material.php">Material</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/puestos/Operarios.php">Operarios</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/puestos/Herramientas.php">Herramientas</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo $url_base; ?>secciones/usuarios/index.php" id="reportesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reportes
            </a>
            <div class="dropdown-menu" aria-labelledby="reportesDropdown">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/usuarios/RPT.php">RPT Equipos Detalle</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/usuarios/Formato_hoja.php">Formato Hoja Instruccion</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/usuarios/Formato_equipo.php">Formato Equipo</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Cerrar Sesión</a>
        </li>
    </ul>
</nav>


  <main class="container">
