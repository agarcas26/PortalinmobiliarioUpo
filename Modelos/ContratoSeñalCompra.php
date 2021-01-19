<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ContratoSeñalCompra{
    private $nombre_usuario;
    private $id_contrato_compra;
    private $id_compra;
    private $fecha_contrato_señal;
    
    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getId_contrato_compra() {
        return $this->id_contrato_compra;
    }

    function getId_compra() {
        return $this->id_compra;
    }

    function getFecha_contrato_señal() {
        return $this->fecha_contrato_señal;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setId_contrato_compra($id_contrato_compra) {
        $this->id_contrato_compra = $id_contrato_compra;
    }

    function setId_compra($id_compra) {
        $this->id_compra = $id_compra;
    }

    function setFecha_contrato_señal($fecha_contrato_señal) {
        $this->fecha_contrato_señal = $fecha_contrato_señal;
    }


}