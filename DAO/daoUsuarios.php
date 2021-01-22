<?php

include_once '../Persistencia/Conexion.php';

class daoUsuario {

    private $conexion;

    function __construct() {
        $conn = new Conexion();
        $this->conexion = $conn->establecer_conexion();
    }

    function destruct() {
        $conn = new Conexion();
        $this->conexion = null;
        $conn->cerrar_conexion();
    }

    function leer_usuarios() {
        $sentence = "SELECT * FROM `usuarios`";
        $result = mysqli_query($conexion, $sentence);

        return $result;
    }

    function crear_usuario($nombre_usuario, $contrasenya, $usuario, $moroso) {
        $sentence = "INSERT INTO `usuarios` (`usuario`,`contrasenya`) VALUES ()";
        $result = mysqli_query($conexion, $sentence);
    }

    function eliminar_usuario($nombre_usuario, $contrasenya) {
        $sentence = "DELETE FROM `usuarios` (`usuario`,`contrasenya`) VALUES ()";
        $result = mysqli_query($conexion, $sentence);
    }

    function modificar_usuario($nuevos_datos) {
        $sentence = "UPDATE `usuarios` SET **** WHERE";
        $result = mysqli_query($conexion, $sentence);
    }

    function get_usuario_by_nombre_usuario($nombre_usuario) {
        $sentence = "SELECT * FROM `usuarios` WHERE `usuarios`.`nombre_usuario`='" . $nombre_usuario . "';";
        $result = mysqli_query($conexion, $sentence);
        $enc = false;

        while (!$enc && mysqli_fetch_array($result)) {
            if ($result[0] == $usuario) {
                $usuario = $result;
                $enc = true;
            }
        }

        return $usuario;
    }

}
