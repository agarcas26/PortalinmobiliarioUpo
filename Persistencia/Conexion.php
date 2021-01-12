<?php

function establecer_conexion() {
    $host = "localhost";
    $port = 3306;
    $user = "root";
    $pwd = "";
    $db_name = "PortalInmobiliariaUPO";

    $conexion = mysqli_connect($host, $db_name, $pwd, $user, $port);

    if (!$conexion) {
        die("Ha habido un error con la conexión " . mysqli_error($conexion));
    }
}
