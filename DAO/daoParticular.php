<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Persistencia/Conexion.php';

class daoParticular {

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

    function listar_particulares() {
        $sentence = "SELECT * FROM `particular`";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function crear_particular($nombre_usuario) {
        $sentence = "INSERT INTO `particular` (`nombre_usuario`) VALUES ('" . $nombre_usuario . "')";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function eliminar_particular($nombre_usuario) {
        $sentence = "DELETE FROM `particular` WHERE `nombre_usuario`='" . $nombre_usuario . "'";
        $result = mysqli_query($this->conexion, $sentence);
    }

}
