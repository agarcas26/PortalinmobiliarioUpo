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
    private $fecha_pago;
    private $id_contrato_alquiler;
    private $id_contrato_senyal_pago;
    
    function __construct() {
        
    }
    function getId_pago() {
        return $this->id_pago;
    }

    function getFecha_pago() {
        return $this->fecha_pago;
    }

    function getId_contrato_alquiler() {
        return $this->id_contrato_alquiler;
    }

    function getId_contrato_senyal_pago() {
        return $this->id_contrato_senyal_pago;
    }

    function setId_pago($id_pago) {
        $this->id_pago = $id_pago;
    }

    function setFecha_pago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    function setId_contrato_alquiler($id_contrato_alquiler) {
        $this->id_contrato_alquiler = $id_contrato_alquiler;
    }

    function setId_contrato_senyal_pago($id_contrato_senyal_pago) {
        $this->id_contrato_senyal_pago = $id_contrato_senyal_pago;
    }


}
