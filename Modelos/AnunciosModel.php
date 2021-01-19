<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anuncios
 *
 * @author agarc
 */
class anuncios {

    //put your code here

    private $id_anuncio;
    private $precio;
    private $nombre_via;
    private $tipo_via;
    private $cp;
    private $numero;
    private $nombre_usuario_publica;
    private $nombre_usuario_anuncio;
    private $fecha_anuncio;
    
    function __construct() {
        
    }
    function getNombre_usuario_publica() {
        return $this->nombre_usuario_publica;
    }

    function getNombre_usuario_anuncio() {
        return $this->nombre_usuario_anuncio;
    }

    function setNombre_usuario_publica($nombre_usuario_publica) {
        $this->nombre_usuario_publica = $nombre_usuario_publica;
    }

    function setNombre_usuario_anuncio($nombre_usuario_anuncio) {
        $this->nombre_usuario_anuncio = $nombre_usuario_anuncio;
    }

        function getId_anuncio() {
        return $this->id_anuncio;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getNombre_via() {
        return $this->nombre_via;
    }

    function getTipo_via() {
        return $this->tipo_via;
    }

    function getCp() {
        return $this->cp;
    }

    function getNumero() {
        return $this->numero;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getFecha_anuncio() {
        return $this->fecha_anuncio;
    }

    function setId_anuncio($id_anuncio) {
        $this->id_anuncio = $id_anuncio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setNombre_via($nombre_via) {
        $this->nombre_via = $nombre_via;
    }

    function setTipo_via($tipo_via) {
        $this->tipo_via = $tipo_via;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setFecha_anuncio($fecha_anuncio) {
        $this->fecha_anuncio = $fecha_anuncio;
    }

    public function __toString() {
        
    }



}
