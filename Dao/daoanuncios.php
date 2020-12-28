<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/anuncios.php';
require_once '../Modelos/usuario.php';

class daoanuncios{
    public $conObj;
    public $conn;
    private $anuncio;
    
    function __construct(){
        $this->conObj = new conn(); 
        $this->conn = $this->conObj->establecer_conexion();
    }
    
    //operaciones crud 
    
    public function insertar($objAnuncio){
        //paso del objeto anuncio a las variables individuales
        $idAnuncio = $objAnuncio->getIdAnuncio();
        $idTypeAnuncio = $objAnuncio->getIdTypeAnuncio();
        $name = $objAnuncio->getName();
        
        
    }
}