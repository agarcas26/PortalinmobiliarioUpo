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

    function __destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    function listar_buquedas() {
        $sentence = "SELECT * FROM `buqueda`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function listar_buquedas_usuario($nombre_usuario) {
        $sentence = "SELECT * FROM `buqueda` WHERE `nombre_usuario`='" . $nombre_usuario . "';";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

}
