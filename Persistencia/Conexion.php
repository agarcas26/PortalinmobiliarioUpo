<?php

class Conexion {

    private $conexion;

    function getConexion() {
        return $this->conexion;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }

    function establecer_conexion() {
        $host = "174.138.6.73";
        $port = 3306;
        $user = "administrador";
        $pwd = "@Grupo10Inm";
        $db_name = "PortalinmobiliariaUPO";

        $this->setConexion(mysqli_connect($host, $user, $pwd, $db_name, $port));

        if (!$this->getConexion()) {
            die("Ha habido un error con la conexión " . mysqli_error($this->getConexion()));
        } else {
            return $this->getConexion();
        }
    }

    function cerrar_conexion() {
        mysqli_close($this->getConexion());
    }

}
