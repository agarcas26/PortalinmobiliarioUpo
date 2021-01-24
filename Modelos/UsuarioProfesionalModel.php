<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioProfesional extends Usuario{
    private $empresa;
    

    function getEmpresa() {
        return $this->empresa;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }


}