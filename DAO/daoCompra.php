<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Persistencia/Conexion.php';

class daoCompra {

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

    function listar_compras() {
        $sentence = "SELECT * FROM `compra`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function crear_compra($nombre_usuario, $id_anuncio, $señal) {
        //Creamos la compra
        $sentence = "INSERT INTO `compra`(`id_compra`, `id_anuncio`, `senyal`) VALUES (NULL,'$id_anuncio','$señal')";
        $result = mysqli_query($this->conexion, $sentence);

        //Recuperamos el id de la compra
        $sentence = "SELECT `id_compra` FROM `compra` WHERE `compra`.`id_anuncio`='$id_anuncio'";
        $result = mysqli_query($this->conexion, $sentence);

        //Creamos el contrato_senyal_compra
        $sentence = "INSERT INTO `contrato_senyal_compra`(`id_contrato_compra`, `nombre_usuario`, `id_compra`, `fecha_contrato_senyal`) "
                . "VALUES (NULL,'$nombre_usuario','" . mysqli_fetch_row($result)[0] . "',CURRENT_DATE)";
        $result = mysqli_query($this->conexion, $sentence);
    }

}
