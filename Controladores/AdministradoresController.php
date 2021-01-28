<?php

include_once '../DAO/daoAdministradores.php';

function getAdminByUsuario($nombre_usuario, $contraseña_usuario) {
    $dao = new daoAdministradores();
    $usuario_datos = $dao->get_administrador($nombre_usuario, $contraseña_usuario);
    $usuario_datos = mysqli_fetch_row($usuario_datos);
    if (isset($usuario_datos[0])) {
        $usuario = new Administradores($usuario_datos[0],$usuario_datos[1]);
    } else {
        $usuario = null;
    }
    $dao->destruct();

    return $usuario;
}
