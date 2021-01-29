<?php

include_once '../Controladores/AdministradoresController.php';
include_once '../Modelos/AdministradoresModel.php';
include_once '../DAO/daoAdministradores.php';

if (isset($_POST['entrar'])) {
    if (controllerInicioSesionAdmin($_POST['nombre_usuario'], $_POST['contrasenya']) == true) {
            $_SESSION['admin'] = $_POST['nombre_usuario'];
       //header("Location: ../Vistas/index.php");
    } else {
        header("Location: ../Vistas/login_admin.php");
    }

}

function controllerInicioSesionAdmin($nombre_usuario, $pass) {
    $r = false;
    $r = true;
    if (preg_match("/[A-Za-z0-9_]{3,15}/", $nombre_usuario) && preg_match("/[A-Za-z0-9_]{0,15}/", $pass)) {
        $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        echo $nombre_usuario . $pass;
        $usuario = getAdminByUsuario($nombre_usuario, $pass);
        echo "a". $usuario;
        if (isset($usuario)) {
            if ($usuario->getContrasenya_admin() == $pass) {
                $r = true;
            }
        }
    }
    return $r;
}