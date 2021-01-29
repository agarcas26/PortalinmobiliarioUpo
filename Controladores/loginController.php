<?php

include_once '../Controladores/UsuarioController.php';
include_once '../Modelos/UsuarioModel.php';
include_once '../DAO/daoUsuarios.php';

session_start();


if (isset($_POST['entrar'])) {
    if (controllerInicioSesion($_POST['nombre_usuario'], $_POST['contrasenya']) == true) {
        //LA SESION DEBE SER PARTICULAR O PROFESIONAL
        $usuario = getUsuarioByUsuario($_POST['nombre_usuario']);

        if ($usuario->getTipo() == "profesional") {
            $_SESSION['usuario_profesional'] = $_POST['nombre_usuario'];
        } else {
            $_SESSION['usuario_particular'] = $_POST['nombre_usuario'];
        }
        header("Location: ../Vistas/index.php");
    } else {
        header("Location: ../Vistas/login.php");
    }
}

if (isset($_POST['registro'])) {
    header("Location: ../Vistas/registro.php");
}

function controllerInicioSesion($nombre_usuario, $pass) {
    $r = false;
    if (preg_match("/[A-Za-z0-9_]{3,15}/", $nombre_usuario) && preg_match("/[A-Za-z0-9_]{0,15}/", $pass)) {
        $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $usuario = getUsuarioByUsuario($nombre_usuario);
        if (isset($usuario)) {
            if ($usuario->get_contrasenya_user() == $pass) {
                $r = true;
            }
        }
    }
    return $r;
}
