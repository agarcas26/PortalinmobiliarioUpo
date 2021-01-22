<?php
include_once '../Persistencia/Conexion.php';

class daoPago {
    private $conexion;
    
    function __construct(){
        $this->conexion = establecer_conexion();
    }
    
    function __destruct() {
        $this->conexion = null;
        cerrar_conexion();
    }

    function listar_pagos() {

        $sentence = "SELECT * FROM `pagos`";
        $result = mysqli_query($conexion, $sentence);

        return $result;
    }

    function listar_pagos_usuario($nombre_usuario) {
        
    }

    function crear_pago() {
        
    }

}
