<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Localidad{
    private $nombre_localidad;
    private $nombre_provincia;
    
    function getNombre_localidad() {
        return $this->nombre_localidad;
    }

    function getNombre_provincia() {
        return $this->nombre_provincia;
    }

    function setNombre_localidad($nombre_localidad) {
        $this->nombre_localidad = $nombre_localidad;
    }

    function setNombre_provincia($nombre_provincia) {
        $this->nombre_provincia = $nombre_provincia;
    }


}