<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subcontrata{
    private $nombre_subcontrata;
    private $id_anuncio;
    private $contacto;
    private $descripcion;
    
    function getNombre_subcontrata() {
        return $this->nombre_subcontrata;
    }

    function getId_anuncio() {
        return $this->id_anuncio;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setNombre_subcontrata($nombre_subcontrata) {
        $this->nombre_subcontrata = $nombre_subcontrata;
    }

    function setId_anuncio($id_anuncio) {
        $this->id_anuncio = $id_anuncio;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}