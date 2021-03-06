<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Persistencia/Conexion.php';

class daoBusqueda {

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

    function listar_busquedas() {
        $sentence = "SELECT * FROM `busqueda`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function listar_busquedas_usuario($nombre_usuario) {
        $sentence = "SELECT * FROM `busqueda` WHERE `nombre_usuario`='" . $nombre_usuario . "';";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function listar_alertas_usuario($nombre_usuario) {
        $sentence = "SELECT * FROM `busqueda` WHERE `alerta`='true' AND `nombre_usuario`='" . $nombre_usuario . "';";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function eliminar_alerta_usuario($id) {
        $sentence = "UPDATE `busqueda` SET `alerta`='false'  WHERE `id_busqueda`='" . $id . "';";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function crear_busqueda($nombre_usuario, $num_banyos, $tipo_inmueble, $tipo_oferta, $precio_max, $num_hab, $m2) {
        $sentence = "INSERT INTO `busqueda`(`id_busqueda`, `nombre_usuario`, `num_banyos`, `alerta`, `tipo_inmueble`, `tipo_oferta`, `precio_max`, `num_hab`, `m2`)"
        ."VALUES (NULL,'$nombre_usuario','$num_banyos','false','$tipo_inmueble','$tipo_oferta','$precio_max','$num_hab','$m2')";
        $result = mysqli_query($this->conexion, $sentence);
        
    }

}
