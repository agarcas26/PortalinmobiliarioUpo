<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Busqueda{
    private $id_busqueda;
    private $nombre_usuario;
    private $num_banyos;
    private $alerta;
    private $tipo_inmueble;
    private $tipo_oferta;
    private $precio_max;
    private $num_hab;
    private $m2;
    
    function __construct($id_busqueda, $nombre_usuario, $num_banyos, $alerta, $tipo_inmueble, $tipo_oferta, $precio_max, $num_hab, $m2) {
        $this->id_busqueda = $id_busqueda;
        $this->nombre_usuario = $nombre_usuario;
        $this->num_banyos = $num_banyos;
        $this->alerta = $alerta;
        $this->tipo_inmueble = $tipo_inmueble;
        $this->tipo_oferta = $tipo_oferta;
        $this->precio_max = $precio_max;
        $this->num_hab = $num_hab;
        $this->m2 = $m2;
    }

    
    function getId_busqueda() {
        return $this->id_busqueda;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getNum_banyos() {
        return $this->num_banyos;
    }

    function getAlerta() {
        return $this->alerta;
    }

    function getTipo_inmueble() {
        return $this->tipo_inmueble;
    }

    function getTipo_oferta() {
        return $this->tipo_oferta;
    }

    function getPrecio_max() {
        return $this->precio_max;
    }

    function getNum_hab() {
        return $this->num_hab;
    }

    function getM2() {
        return $this->m2;
    }

    function setId_busqueda($id_busqueda) {
        $this->id_busqueda = $id_busqueda;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setNum_banyos($num_banyos) {
        $this->num_banyos = $num_banyos;
    }

    function setAlerta($alerta) {
        $this->alerta = $alerta;
    }

    function setTipo_inmueble($tipo_inmueble) {
        $this->tipo_inmueble = $tipo_inmueble;
    }

    function setTipo_oferta($tipo_oferta) {
        $this->tipo_oferta = $tipo_oferta;
    }

    function setPrecio_max($precio_max) {
        $this->precio_max = $precio_max;
    }

    function setNum_hab($num_hab) {
        $this->num_hab = $num_hab;
    }

    function setM2($m2) {
        $this->m2 = $m2;
    }


}