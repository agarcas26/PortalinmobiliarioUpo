<?php

include_once '../Controladores/AdministradoresController.php';
include_once '../Modelos/AdministradoresModel.php';
include_once '../DAO/daoAdministradores.php';

if (isset($_POST['entrar'])) {
    $dao = new daoAdministradores();
    if (controllerInicioSesionAdmin($_POST['nombre_usuario'], $_POST['contrasenya']) == true) {
        //LA SESION DEBE SER PARTICULAR O PROFESIONAL
        $usuario = getAdminByUsuario($_POST['nombre_usuario'], $_POST['contrasenya']);

        $_SESSION['admin'] = $_POST['nombre_usuario'];

        header("Location: ../Vistas/index.php");
    } else {
        header("Location: ../Vistas/login_admin.php");
    }

    $dao->destruct();
}

function controllerInicioSesionAdmin($nombre_usuario, $pass) {
    $r = false;
    if (preg_match("/[A-Za-z0-9_]{3,15}/", $nombre_usuario) && preg_match("/[A-Za-z0-9_]{0,15}/", $pass)) {
        $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $usuario = getAdminByUsuario($nombre_usuario, $pass);
        if (isset($usuario)) {
            if ($usuario->getContrasenya_admin() == $pass) {
                $r = true;
            }
        }
    }
    return $r;
}
