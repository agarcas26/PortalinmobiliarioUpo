<?php

include_once '../DAO/daoAdministradores.php';

function getAdminByUsuario($nombre_usuario, $contraseña_usuario) {
    $dao = new daoAdministradores();
    $usuario_datos = $dao->get_administrador($nombre_usuario, $contraseña_usuario);
    if (mysqli_num_rows($usuario_datos) > 0) {
        $aux = mysqli_fetch_array($usuario_datos);
        $usuario = new Administradores($aux[0], $aux[1]);
    } else {
        $usuario = null;
    }
    $dao->destruct();

    return $usuario;
}
