<?php

try {
    $conexion = new mysqli("localhost", "root", "johann", "app", 33064);
    if ($conexion->connect_errno) {
        throw new Exception("Fallo en la conexión a la base de datos: " . $conexion->connect_error);
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>