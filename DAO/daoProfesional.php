<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Persistencia/Conexion.php';

class daoProfesional {

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

    function listar_profesionales() {
        $sentence = "SELECT * FROM `profesional`";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function crear_profesional($nombre_usuario, $empresa) {
        $sentence = "INSERT INTO `profesional` (`nombre_usuario`,`empresa`) VALUES ('" . $nombre_usuario . "','" . $empresa . "')";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function eliminar_profesional($nombre_usuario) {
        $sentence = "DELETE FROM `profesional` WHERE `nombre_usuario`='" . $nombre_usuario . "'";
        $result = mysqli_query($this->conexion, $sentence);
    }

}