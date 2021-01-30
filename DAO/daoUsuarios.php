<?php

include_once '../Persistencia/Conexion.php';
include_once '../Modelos/UsuarioModel.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

class daoUsuarios {

    public $conObj;
    public $conexion;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conexion = $this->conObj->getConexion();
    }

    function destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    function leer_usuarios() {
        $sentence = "SELECT * FROM `usuarios`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function crear_usuario($nombre_apellidos, $nombre_usuario, $contrasenya, $moroso) {
        $sentence = "INSERT INTO `usuarios` (`nombre_usuario`,`contrasenya_user`,`nombre_apellidos`,`moroso`) VALUES ('" . $nombre_usuario . "','" . $contrasenya . "','" . $nombre_apellidos . "','" . $moroso . "')";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function eliminar_usuario($nombre_usuario) {
        $sentence = "DELETE FROM `usuarios` (`nombre_usuario`,`contrasenya_user`,`nombre_apellidos`,`moroso`) VALUES ('" . $nombre_usuario . "','" . $contrasenya . "')";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function modificar_usuario($usuario) {
        $sentence = "UPDATE `usuarios` SET **** WHERE";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function get_usuario_by_nombre_usuario($nombre_usuario) {
        $sentence = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario';";

        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

}
