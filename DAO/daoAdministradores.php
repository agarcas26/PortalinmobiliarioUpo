<?php

include_once '../Persistencia/Conexion.php';

class daoAdministradores {

    public $conObj;
    private $conexion;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conexion = $this->conObj->getConexion();
    }

    function destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    function listar_administradores() {
        $sentence = "SELECT * FROM `administradores`";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function get_administrador($nombre_usuario_admin, $contrasenya_admin) {
        $sentence = "SELECT * FROM `administradores` WHERE `nombre_usuario_admin` ='$nombre_usuario_admin' and `contrasenya` ='$contrasenya_admin';";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

}
