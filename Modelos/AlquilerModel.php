<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Alquiler{
    private $id_anuncio;
    private $id_alquiler;
    
    function getId_anuncio() {
        return $this->id_anuncio;
    }

    function getId_alquiler() {
        return $this->id_alquiler;
    }

    function setId_anuncio($id_anuncio) {
        $this->id_anuncio = $id_anuncio;
    }

    function setId_alquiler($id_alquiler) {
        $this->id_alquiler = $id_alquiler;
    }


}