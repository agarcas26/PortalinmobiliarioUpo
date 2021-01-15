<?php

include_once '../DAO/daoUsuarios.php';
include_once '../Modelos/UsuarioModel.php';

function getUsuarioByUsuario($nombre_usuario) {
    $usuario = get_usuario_by_nombre_usuario($nombre_usuario);
}

function nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, $moroso) {
    $nuevo_usuario = new Usuario($nombre_apellidos, $nombre_usuario, $pass, $moroso);
}

function actualizarDatosUsuario($datos) {
    
    if(preg_match($pattern, $datos[0]) && preg_match($pattern, $datos[1])){
        filter_var($datos[0], FILTER_SANITIZE_STRING);
        filter_var($datos[1], FILTER_SANITIZE_STRING);
        
        //Duda sobre como se actualizarían los datos del usuario
    }
       
    
    
}
