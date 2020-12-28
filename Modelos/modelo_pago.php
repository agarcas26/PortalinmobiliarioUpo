<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pago
 *
 * @author agarc
 */
class pago {
    private $id_pago;
    private $cuantia;
    private $usuario_pk;
    private $periodo;
    
    function __construct() {
        
    }
    function getId_pago() {
        return $this->id_pago;
    }

    function getCuantia() {
        return $this->cuantia;
    }

    function getUsuario_pk() {
        return $this->usuario_pk;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function setId_pago($id_pago) {
        $this->id_pago = $id_pago;
    }

    function setCuantia($cuantia) {
        $this->cuantia = $cuantia;
    }

    function setUsuario_pk($usuario_pk) {
        $this->usuario_pk = $usuario_pk;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function __toString() {
        
    }

}
