<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Resenya{
    private $id_resenya;
    private $nombre_usuario;
    private $cp;
    private $nombre_via;
    private $tipo_via;
    private $numero;
    private $descripcion;
    private $fecha_resenya;
    private $valoracion;
    
    function getId_resenya() {
        return $this->id_resenya;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getCp() {
        return $this->cp;
    }

    function getNombre_via() {
        return $this->nombre_via;
    }

    function getTipo_via() {
        return $this->tipo_via;
    }

    function getNumero() {
        return $this->numero;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha_resenya() {
        return $this->fecha_resenya;
    }

    function getValoracion() {
        return $this->valoracion;
    }

    function setId_resenya($id_resenya) {
        $this->id_resenya = $id_resenya;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setNombre_via($nombre_via) {
        $this->nombre_via = $nombre_via;
    }

    function setTipo_via($tipo_via) {
        $this->tipo_via = $tipo_via;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha_resenya($fecha_resenya) {
        $this->fecha_resenya = $fecha_resenya;
    }

    function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }


}