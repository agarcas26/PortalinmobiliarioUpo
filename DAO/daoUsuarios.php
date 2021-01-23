<?php

include_once '../Persistencia/Conexion.php';
require_once '../Modelos/UsuarioModel.php';
class daoUsuario {

    public $conObj;
    public $conn;
    private $usuario;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conn = $this->conObj->establecer_conexion();
    }

    function destruct() {
        $conn = new Conexion();
        $this->conexion = null;
        $conn->cerrar_conexion();
    }

    function leer_usuarios($objUsuario) {
        $nombre_usuario = $objUsuario->getNombre_usuario();
        
        $sentence = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario'";
        $objMySqlLi = $this->conn->query($sentence);
        if($objMySqlLi->num_rows != 1){
            return false;
        }else{
            $arrayAux = mysqli_fetch_assoc($objMySqlLi); 
            $objUsuario->setNombre_usuario($arrayAux["nombre_usuario"]);
            $objUsuario->setContrasenya_user($arrayAux["contrasenya_user"]);
            $objUsuario->setNombre_apellidos($arrayAux["nombre_apellidos"]);
            $objUsuario->setMoroso($arrayAux["moroso"]);
            
            return  $objUsuario;
        }
        

     mysqli_close($this->conn);
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
