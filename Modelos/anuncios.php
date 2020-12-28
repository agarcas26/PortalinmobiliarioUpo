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

    private $idAnuncio;
    private $precio;
    private $direccion;
    private $usuario_pk;
    
    function getIdAnuncio() {
        return $this->idAnuncio;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getUsuario_pk() {
        return $this->usuario_pk;
    }

    function setIdAnuncio($idAnuncio) {
        $this->idAnuncio = $idAnuncio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setUsuario_pk($usuario_pk) {
        $this->usuario_pk = $usuario_pk;
    }

    public function __toString() {
        
    }


}
