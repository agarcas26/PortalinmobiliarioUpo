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
    
    function listar_contratos_alquileres() {
        $sentence = "SELECT * FROM `contrato_alquiler`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function crear_contrato_alquileres($nombre_usuario, $id_contrato_compra, $id_compra, $fecha_contrato_senyal) {
        //Creamos el alquiler
        $sentence = "INSERT INTO `contrato_alquiler` (`nombre_usuario`, `id_contrato_compra`, `id_compra`, `fecha_contrato_senyal`) VALUES (".$nombre_usuario.",". $id_contrato_compra.",". $id_compra.",". $fecha_contrato_senyal.")";
        $result = mysqli_query($this->conexion, $sentence);

        //Recuperamos el id del alquiler
   
        //Creamos el contrato_alquiler
        
    }
}