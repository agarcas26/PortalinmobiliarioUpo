<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Persistencia/Conexion.php';
include_once '../Modelos/UsuarioProfesionalModel.php';
class daoProfesional {

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

    function listar_profesionales() {
        $sentence = "SELECT * FROM `profesional`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function crear_profesional($nombre_usuario, $empresa) {
        $sentence = "INSERT INTO `profesional` (`nombre_usuario`,`empresa`) VALUES ('" . $nombre_usuario . "','" . $empresa . "')";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function eliminar_profesional($nombre_usuario) {
        $sentence = "DELETE FROM `profesional` WHERE `nombre_usuario`='" . $nombre_usuario . "'";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function get_usuario_by_nombre_usuario($nombre_usuario) {
        $sentence = "SELECT * FROM `profesional` WHERE `profesional`.`nombre_usuario`='" . $nombre_usuario . "'";
        $result = mysqli_query($this->conexion, $sentence);

        return mysqli_num_rows($result);
    }

}
