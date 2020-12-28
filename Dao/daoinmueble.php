<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/anuncios.php';
require_once '../Modelos/usuario.php';

class daoinmueble{
  public $conObj;
  public $conn;
  public $inmueble;
  
  function __construct() {
      $this->conObj= new conn();
      $this->conn= $this->conObj->establecer_conexion();
      
  }
  
  public function insertar($objInmueble){
      
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
}