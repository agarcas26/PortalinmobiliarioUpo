<?php

function establecer_conexion() {
    $host = "174.138.6.73";
    $port = 3306;
    $user = "administrador";
    $pwd = "@Grupo10Inm";
    $db_name = "PortalinmobiliariaUPO";

    $conexion = mysqli_connect($host, $user, $pwd, $db_name, $port);

    if (!$conexion) {
        die("Ha habido un error con la conexión " . mysqli_error($conexion));
    }
}
