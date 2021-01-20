<?php

function listar_pagos(){
    
    $sentence = "SELECT * FROM `pagos`";
    $result = mysqli_query($conexion, $sentence);
    
    return $result;
}

function listar_pagos_usuario($nombre_usuario){
    
}

function crear_pago(){
    
    
}
