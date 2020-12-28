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
    private $name;
    private $idTypeAnuncio;

    function __construct() {
        
    }

    function getIdAnuncio() {
        return $this->idAnuncio;
    }

    function getName() {
        return $this->name;
    }

    function getIdTypeAnuncio() {
        return $this->idTypeAnuncio;
    }

    function setIdAnuncio($idAnuncio) {
        $this->idAnuncio = $idAnuncio;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setIdTypeAnuncio($idTypeAnuncio) {
        $this->idTypeAnuncio = $idTypeAnuncio;
    }

    public function __toString() {
        
    }

}
