<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ContratoAlquiler{
    private $nombre_usuario;
    private $id_contrato_alquiler;
    private $id_alquiler;
    private $fecha_desde;
    private $fecha_hasta;
    private $precio_final;
    
    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getId_contrato_alquiler() {
        return $this->id_contrato_alquiler;
    }

    function getId_alquiler() {
        return $this->id_alquiler;
    }

    function getFecha_desde() {
        return $this->fecha_desde;
    }

    function getFecha_hasta() {
        return $this->fecha_hasta;
    }

    function getPrecio_final() {
        return $this->precio_final;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setId_contrato_alquiler($id_contrato_alquiler) {
        $this->id_contrato_alquiler = $id_contrato_alquiler;
    }

    function setId_alquiler($id_alquiler) {
        $this->id_alquiler = $id_alquiler;
    }

    function setFecha_desde($fecha_desde) {
        $this->fecha_desde = $fecha_desde;
    }

    function setFecha_hasta($fecha_hasta) {
        $this->fecha_hasta = $fecha_hasta;
    }

    function setPrecio_final($precio_final) {
        $this->precio_final = $precio_final;
    }


}