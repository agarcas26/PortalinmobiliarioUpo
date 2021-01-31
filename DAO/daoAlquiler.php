<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Persistencia/Conexion.php';

class daoAlquiler {

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
    
    function listar_alquileres() {
        $sentence = "SELECT * FROM `alquiler`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function crear_alquileres($nombre_usuario, $id_anuncio) {

        $sentence = "INSERT INTO `alquiler`(`id_alquiler`, `id_anuncio`) VALUES (NULL,'$id_anuncio')";
        $result = mysqli_query($this->conexion, $sentence);

      
        
    }
}