<?php

include_once '../Persistencia/Conexion.php';
include_once '../Modelos/UsuarioModel.php';

class daoUsuario {

    public $conObj;
    public $conexion;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conexion = $this->conObj->establecer_conexion();
    }

    function destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    function leer_usuarios() {
        $sentence = "SELECT * FROM `usuarios`";
        $result = mysqli_query($this->conn, $sentence);

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

    function get_usuario_by_nombre_usuario($nombre_usuario,$contrasenya_user) {
        $sentence = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario',contrasenya_user='$contrasenya_user';";
      
        $result = mysqli_query($conexion, $sentence);

        return $result;
    }

    function escribirResenyas($objUsuario) {
        //$id_resenyas = $objUsuario->getId_resenyas();
        $nombre_usuario = $objUsuario->getNombre_usuario();
        $cp = $objUsuario->getCp();
        $nombre_via = $objUsuario->getNombre_via();
        $tipo_via = $objUsuario->getTipo_via();
        $numero = $objUsuario->getNumero();
        $descripcion = $objUsuario->getDescripcion();
        $fecha_resenya = $objUsuario->getFecha_resenya();
        $valoracion = $objUsuario->getValoracion();

        $sql = "INSERT INTO resenya values(null,'$nombre_usuario','$cp','$nombre_via','$tipo_via','$numero','$descripcion','$fecha_resenya','$valoracion')";

        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

}
