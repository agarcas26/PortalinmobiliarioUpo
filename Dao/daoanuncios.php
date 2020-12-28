<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/anuncios.php';
require_once '../Modelos/usuario.php';

class daoanuncios {

    public $conObj;
    public $conn;
    private $anuncio;

    function __construct() {
        $this->conObj = new conn();
        $this->conn = $this->conObj->establecer_conexion();
    }

    //operaciones crud 
    //insertar anuncio
    public function insertar($objAnuncio) {
        //paso del objeto anuncio a las variables individuales
//        $idAnuncio = $objAnuncio->getIdAnuncio();
        $idTypeAnuncio = $objAnuncio->getIdTypeAnuncio();
        $name = $objAnuncio->getName();

        $sql = "INSERT INTO anuncios values(null,'$idTypeAnuncio','$name')";
        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

    //leer anuncio por id
    public function read($objAnuncio) {
        $idAnuncio = $objAnuncio->getIdAnuncio();
        $sql = "SELECT * FROM anuncios WHERE idAnuncio='$idAnuncio'";
        $objMySqlLi = $this->conn->query($sql);
        
        if($objMySqlLi->num_rows !=1){
            return false;
        }else{
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);
             $objAnuncio->setIdAnuncio($arrayAux["idAnuncio"]);
             $objAnuncio->setIdTypeAnuncio($arrayAux["idTypeAnuncio"]);
             $objAnuncio->setName($arrayAux["name"]);
             
             return $objAnuncio;
        }
        mysqli_close($this->conn);
    }
    public function eliminar($objAnuncio){
        $idAnuncio = $objAnuncio->getIdAnuncio();
        
        $sql = "DELETE FROM anuncios WHERE idAnuncio='$idAnuncio'";
        if(!$this->conn->query($sql)){
            return false;
        }else{
            return true;
        }
        mysqli_close($this->conn);
    }
    public function modificar($objAnuncio){
        $idAnuncio = $objAnuncio->getIdAnuncio();
        $idTypeAnuncio = $objAnuncio->getIdTypeAnuncio();
        $name = $objAnuncio->getname();
        
        $sql = "UPDATE anuncio SET idAnuncio=''"
    }

}
