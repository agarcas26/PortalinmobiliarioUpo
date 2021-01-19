<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioProfesional{
    private $nombre_usuario;
    private $empresa;
    
    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }


}