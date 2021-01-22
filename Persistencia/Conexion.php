<?php

class Conexion {

    private $conexion;

    function establecer_conexion() {
        $host = "174.138.6.73";
        $port = 3306;
        $user = "administrador";
        $pwd = "@Grupo10Inm";
        $db_name = "PortalinmobiliariaUPO";

        $this->conexion = mysqli_connect($host, $user, $pwd, $db_name, $port);

        if (!$conexion) {
            die("Ha habido un error con la conexión " . mysqli_error($conexion));
        } else {
            return $conexion;
        }
    }

    function cerrar_conexion() {
        mysqli_close($this->conexion);
    }

}
