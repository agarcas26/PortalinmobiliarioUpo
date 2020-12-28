<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inmueble
 *
 * @author agarc
 */
class inmueble {
    private $direccion;
    private $usuario_pk;
    private $resenyas_usuarios;
    private $num_habitaciones;
    private $num_banyos;  
    private $cocina;
    private $tipo_inmueble;
    private $num_plantas;
    private $planta;
    private $ascensor;
    function __construct() {
        
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getUsuario_pk() {
        return $this->usuario_pk;
    }

    function getResenyas_usuarios() {
        return $this->resenyas_usuarios;
    }

    function getNum_habitaciones() {
        return $this->num_habitaciones;
    }

    function getNum_banyos() {
        return $this->num_banyos;
    }

    function getCocina() {
        return $this->cocina;
    }

    function getTipo_inmueble() {
        return $this->tipo_inmueble;
    }

    function getNum_plantas() {
        return $this->num_plantas;
    }

    function getPlanta() {
        return $this->planta;
    }

    function getAscensor() {
        return $this->ascensor;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setUsuario_pk($usuario_pk) {
        $this->usuario_pk = $usuario_pk;
    }

    function setResenyas_usuarios($resenyas_usuarios) {
        $this->resenyas_usuarios = $resenyas_usuarios;
    }

    function setNum_habitaciones($num_habitaciones) {
        $this->num_habitaciones = $num_habitaciones;
    }

    function setNum_banyos($num_banyos) {
        $this->num_banyos = $num_banyos;
    }

    function setCocina($cocina) {
        $this->cocina = $cocina;
    }

    function setTipo_inmueble($tipo_inmueble) {
        $this->tipo_inmueble = $tipo_inmueble;
    }

    function setNum_plantas($num_plantas) {
        $this->num_plantas = $num_plantas;
    }

    function setPlanta($planta) {
        $this->planta = $planta;
    }

    function setAscensor($ascensor) {
        $this->ascensor = $ascensor;
    }

    public function __toString() {
        
    }

    
    
}
