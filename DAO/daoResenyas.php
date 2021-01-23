<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/ResenyaModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoResenyas {

    public $conObj;
    public $conn;
    private $resenya;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conn = $this->conObj->establecer_conexion();
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

    
    function modificarResenyas($objUsuario){
        
    }
}
