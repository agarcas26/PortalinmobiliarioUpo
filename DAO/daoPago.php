<?php
include_once '../Persistencia/Conexion.php';
include_once '../Modelos/PagoModel.php';
class daoPago {

    public $conObj;
    public $conexion;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conexion = $this->conObj->getConexion();
    }

    function destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    function listar_pagos() {

        $sentence = "SELECT * FROM `pagos`";
        $result = mysqli_query($this->conexion, $sentence);

        return $result;
    }

    function listar_pagos_usuario($nombre_usuario) {
        
    }

    function crear_pago() {
        $sentence = "INSERT INTO `pago`(`id_pago`, `id_contrato_senyal_compra`, `id_contrato_alquiler`, `fecha_pago`) VALUES ([value-1],[value-2],[value-3],[value-4])";
    }

}
