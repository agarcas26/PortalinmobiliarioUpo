<?php

include_once '../Controladores/UsuarioController.php';
include_once '../Modelos/UsuarioModel.php';
include_once '../DAO/daoUsuarios.php';



if (isset($_POST['entrar'])) {
    //$dao = new daoUsuarios();
    if (controllerInicioSesion($_POST['nombre_usuario'], $_POST['contrasenya']) == true) {
        //LA SESION DEBE SER PARTICULAR O PROFESIONAL
        $_SESSION['usuario'] = $_POST['user'];
        header("Location: ../Vistas/index.php");
    } else {
        header("Location: ../Vistas/login.php");
    }

    //$dao->destruct();
}

if (isset($_POST['registro'])) {
    header("Location: ../Vistas/registro.php");
}

function controllerInicioSesion($nombre_usuario, $pass) {
    $r = false;
    if (preg_match("/[A-Za-z0-9_]{4}/", $nombre_usuario) && preg_match("/[A-Za-z0-9_]{4}/", $pass)) {
        $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $usuario = getUsuarioByUsuario($nombre_usuario, $pass);
        $r = true;
        sleep(600);
        if ($usuario->get_contrasenya_user() == $pass) {
            $r = true;
        }
    }
    return $r;
}
