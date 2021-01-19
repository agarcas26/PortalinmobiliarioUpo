<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Compra{
    private $id_anuncio;
    private $id_compra;
    private $señal;
    
    function getId_anuncio() {
        return $this->id_anuncio;
    }

    function getId_compra() {
        return $this->id_compra;
    }

    function getSeñal() {
        return $this->señal;
    }

    function setId_anuncio($id_anuncio) {
        $this->id_anuncio = $id_anuncio;
    }

    function setId_compra($id_compra) {
        $this->id_compra = $id_compra;
    }

    function setSeñal($señal) {
        $this->señal = $señal;
    }


}