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
    private $numero;
    private $cp;
    private $nombre_via;
    private $tipo_via;
    private $nombre_usuario;
    private $nombre_localidad;
    private $nombre_provincia;
    private $num_banyos;
    private $cocina;
    private $tipo;
    private $numero_plantas;
    private $planta;
    private $metros;
    private $tipo_inmuebles;

    function __construct() {
        
    }

    function getNumero() {
        return $this->numero;
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

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getNombre_localidad() {
        return $this->nombre_localidad;
    }

    function getNombre_provincia() {
        return $this->nombre_provincia;
    }

    function getNum_banyos() {
        return $this->num_banyos;
    }

    function getCocina() {
        return $this->cocina;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getNumero_plantas() {
        return $this->numero_plantas;
    }

    function getPlanta() {
        return $this->planta;
    }

    function getMetros() {
        return $this->metros;
    }

    function getTipo_inmuebles() {
        return $this->tipo_inmuebles;
    }

    function setNumero($numero) {
        $this->numero = $numero;
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

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setNombre_localidad($nombre_localidad) {
        $this->nombre_localidad = $nombre_localidad;
    }

    function setNombre_provincia($nombre_provincia) {
        $this->nombre_provincia = $nombre_provincia;
    }

    function setNum_banyos($num_banyos) {
        $this->num_banyos = $num_banyos;
    }

    function setCocina($cocina) {
        $this->cocina = $cocina;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setNumero_plantas($numero_plantas) {
        $this->numero_plantas = $numero_plantas;
    }

    function setPlanta($planta) {
        $this->planta = $planta;
    }

    function setMetros($metros) {
        $this->metros = $metros;
    }

    function setTipo_inmuebles($tipo_inmuebles) {
        $this->tipo_inmuebles = $tipo_inmuebles;
    }

    public function __toString() {
        
    }

    
    
}
