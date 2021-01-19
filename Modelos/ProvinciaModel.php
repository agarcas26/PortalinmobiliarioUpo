<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Provincia{
    private $nombre_provincia;
    private $comunidad_autonoma;
    
    function getNombre_provincia() {
        return $this->nombre_provincia;
    }

    function getComunidad_autonoma() {
        return $this->comunidad_autonoma;
    }

    function setNombre_provincia($nombre_provincia) {
        $this->nombre_provincia = $nombre_provincia;
    }

    function setComunidad_autonoma($comunidad_autonoma) {
        $this->comunidad_autonoma = $comunidad_autonoma;
    }

    function __construct() {
        
    }

}