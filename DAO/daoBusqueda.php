<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class daoBusqueda{
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = establecer_conexion();
    }
    
    function __destruct() {
        cerrar_conexion();
        $this->conexion = null;
    }
    
    function listar_busquedas(){
        
    }
}