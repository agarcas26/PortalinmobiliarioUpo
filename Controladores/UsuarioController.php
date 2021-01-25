<?php

include_once '../DAO/daoUsuarios.php';
include_once '../Modelos/UsuarioModel.php';

function getUsuarioByUsuario($nombre_usuario, $contraseña_usuario) {
    $dao = new daoUsuarios();
    $usuario_datos = $dao->get_usuario_by_nombre_usuario($nombre_usuario, $contraseña_usuario);
    $usuario_datos = mysqli_fetch_row($usuario_datos);
    $usuario = new Usuario($usuario_datos[2], $usuario_datos[0], $usuario_datos[1], $usuario_datos[3]);

    return $usuario;
}

function nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, $moroso, $tipo, $empresa) {
    $dao = new daoUsuarios();
    $nuevo_usuario = new Usuario($nombre_apellidos, $nombre_usuario, $pass, $moroso, $tipo);
    $dao->crear_usuario_registro($nombre_apellidos, $nombre_usuario, $pass, $moroso);

    if ($tipo == particular) {
        $dao_particular = new daoParticular();
        $dao->crear_usuario_particular($nombre_usuario);
    } else {
        $dao_profesional = new daoProfesional();
        $dao->crear_usuario_particular($nombre_usuario, $empresa);
    }
}

function actualizarDatosUsuario($datos) {

    if (preg_match($pattern, $datos[0]) && preg_match($pattern, $datos[1])) {
        filter_var($datos[0], FILTER_SANITIZE_STRING);
        filter_var($datos[1], FILTER_SANITIZE_STRING);

        //Duda sobre como se actualizarían los datos del usuario
    }
}
