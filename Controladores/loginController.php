<?php

include_once '../Controladores/UsuarioController.php';
include_once '../Modelos/UsuarioModel.php';
include_once '../DAO/daoUsuario.php';


if (isset($_POST['entrar'])) {
    $dao = new daoUsuario();
    if (controllerInicioSesion($_POST['user'], $_POST['pass']) == true) {
        //LA SESION DEBE SER PARTICULAR O PROFESIONAL
        $_SESSION['usuario'] = $_POST['user'];
        header("Location: ../Vistas/index.php");
    } else {
        header("Location: ../Vistas/login.php");
    }
    
    $dao->destruct();
}

if (isset($_POST['registro'])) {
    header("Location: ../Vistas/registro.php");
}

function controllerInicioSesion($nombre_usuario, $pass) {
    if (preg_match("/[\w]+@{1}[\w]+\.[a-z]{2,3}/", $nombre_usuario) && preg_match("/[\w]+@{1}[\w]+\.[a-z]{2,3}/", $pass)) {
        $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $usuario = getUsuarioByUsuario($nombre_usuario);
        if ($usuario->get_contrasenya_user() == $pass) {
            return true;
        }
    } else {
        return false;
    }
}