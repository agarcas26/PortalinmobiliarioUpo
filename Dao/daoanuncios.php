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
        $direccion = $objAnuncio->getDireccion();
        $precio = $objAnuncio->getPrecio();
        $usuario_pk = $objAnuncio->getUsuario_pk();

        $sql = "INSERT INTO anuncios values(null,'$direccion','$precio','$usuario_pk')";
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
             $objAnuncio->setDireccion($arrayAux["direccion"]);
             $objAnuncio->setPrecio($arrayAux["precio"]);
             $objAnuncio->setUsuario_pk($arrayAux["usuario_pk"]);
             
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
        $direccion = $objAnuncio->getDireccion();
        $precio = $objAnuncio->getPrecio();
        $usuario_pk = $objAnuncio->getUsuario_pk();
        
        $sql = "UPDATE anuncio SET'$idTypeAnuncio',name='$name' WHERE idAnuncio='$idAnuncio'";
         if(!$this->conn->query($sql)){
             return false;
         }else{
             return true;
         }
         mysqli_close($this->conn);
    }
    public function listar(){
        $sql = "SELECT * FROM anuncios";
        $resultado = $this->conn->query($sql);
        
        $arrayAnuncios = array();
        while($fila = mysqli_fetch_assoc($resultado)){
            array_push($arrayAnuncios,$fila);
        }
        mysqli_close($this->conn);
        return $arrayAnuncios;
    }

}
