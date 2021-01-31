<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Persistencia/Conexion.php';

class dao_Contrato_Alquiler {

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
    
    function listar_contratos_alquileres() {
        $sentence = "SELECT * FROM `contrato_alquiler`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

   function crear_contrato_alquiler($nombre_usuario, $id_contrato_alquiler, $id_alquiler, $fecha_desde, $fecha_hasta, $precio_final) {
      
        $sentence = "INSERT INTO `contrato_alquiler` (`nombre_usuario`, `id_contrato_alquiler`, `id_alquiler`, `fecha_desde`, `fecha_hasta`, `precio_final`) VALUES (".$nombre_usuario.",". $id_contrato_alquiler.",". $id_alquiler.",". $fecha_desde.",". $fecha_hasta.",". $precio_final.")";
        $result = mysqli_query($this->conexion, $sentence);

       
        
    }
}