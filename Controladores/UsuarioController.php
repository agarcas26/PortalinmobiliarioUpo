<?php

include_once '../DAO/daoUsuarios.php';
include_once '../DAO/daoParticular.php';
include_once '../DAO/daoProfesional.php';
include_once '../Modelos/UsuarioModel.php';

function getUsuarioByUsuario($nombre_usuario) {
    $dao = new daoUsuarios();
    $aux = $dao->get_usuario_by_nombre_usuario($nombre_usuario);
    $daoProfesional = new daoProfesional();
    if (mysqli_num_rows($aux) > 0) {
        $usuario_datos = mysqli_fetch_row($aux);
        $usuario = new Usuario($usuario_datos[2], $usuario_datos[0], $usuario_datos[1], $usuario_datos[3]);
        if ($daoProfesional->get_usuario_by_nombre_usuario($nombre_usuario) > 0) {
            $usuario->setTipo("profesional");
        } else {
            $usuario->setTipo("particular");
        }
    } else {
        $usuario = null;
    }
    $dao->destruct();
    $daoProfesional->destruct();
    return $usuario;
}

function nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, $moroso, $tipo, $empresa) {
    $dao = new daoUsuarios();
    $nuevo_usuario = new Usuario($nombre_apellidos, $nombre_usuario, $pass, $moroso, $tipo);
    $dao->crear_usuario($nombre_apellidos, $nombre_usuario, $pass, $moroso);
    $dao->destruct();

    if ($tipo == 'particular') {
        $dao_particular = new daoParticular();
        $dao_particular->crear_particular($nombre_usuario);
        $dao_particular->destruct();
    } else {
        $dao_profesional = new daoProfesional();
        $dao_profesional->crear_profesional($nombre_usuario, $empresa);
        $dao_profesional->destruct();
    }
}

function actualizarDatosUsuario($datos) {

    if (preg_match($pattern, $datos[0]) && preg_match($pattern, $datos[1])) {
        filter_var($datos[0], FILTER_SANITIZE_STRING);
        filter_var($datos[1], FILTER_SANITIZE_STRING);
    }
}
