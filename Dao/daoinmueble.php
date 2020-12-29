<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/anuncios.php';
require_once '../Modelos/usuario.php';
require_once '../Modelos/inmuebles.php';

class daoinmueble {

    public $conObj;
    public $conn;
    public $inmueble;

    function __construct() {
        $this->conObj = new conn();
        $this->conn = $this->conObj->establecer_conexion();
    }

    public function insertar($objInmueble) {
        $direccion = $objInmueble->getDireccion();
        $usuario_pk = $objInmueble->getUsuario_pk();
        $resenyas_usuarios = $objInmueble->getResenyas_usuarios();
        $num_habitaciones = $objInmueble->getNum_habitaciones();
        $num_banyos = $objInmueble->getNum_banyos();
        $cocina = $objInmueble->getCocina();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $num_plantas = $objInmueble->getNum_plantas();
        $planta = $objInmueble->getPlanta();
        $ascensor = $objInmueble->getAscensor();
        //tengo que pedirle al usuario la direccion y guardarla en la pk
        $sql = "INSERT INTO inmuebles values('$direccion','$usuario_pk','$resenyas_usuarios','$num_habitaciones','$num_banyos','$cocina','$tipo_inmueble','$num_plantas','$planta','$ascensor')";
        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

}
