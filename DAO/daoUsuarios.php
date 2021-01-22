<?php

include_once '../Persistencia/Conexion.php';

class daoUsuario {

    private $conexion;

    function __construct() {
        $this->conexion = establecer_conexion();
    }

    function __destruct() {
        $this->conexion = null;
        cerrar_conexion();
    }

    function leer_usuarios() {
        $sentence = "SELECT * FROM `usuarios`";
        $result = mysqli_query($conexion, $sentence);

        return $result;
    }

    function crear_usuario($nombre_usuario, $contrasenya, $usuario, $email, $moroso, $particular_profesional) {
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
        $listado_usuarios = leer_usuarios();
        $enc = false;

        while (!$enc && mysqli_fetch_array($listado_usuarios)) {
            if ($listado_usuarios[0] == $usuario) {
                $usuario = $listado_usuarios;
                $enc = true;
            }
        }

        return $usuario;
    }

}
