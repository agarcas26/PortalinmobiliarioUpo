<?php

include_once '../Controladores/UsuarioController.php';


if (isset($_POST['enviar'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre_apellidos = $_POST['nombre_apellidos'];
    $pass = $_POST['contrasenya'];
    $conf_pass = $_POST['conf_contrasenya'];
    $tipo = $_POST['tipo'];
    $emmpresa = $_POST['empresa'];
    if ($pass == $conf_pass) {
        registroController($nombre_usuario, $nombre_apellidos, $pass, $tipo, $empresa);
    }
}

function registroController($nombre_usuario, $nombre_apellidos, $pass, $tipo, $empresa) {
    if ($tipo == "profesional") {
        if (preg_match("/[[:alpha:]]*/", $empresa)) {
            filter_var($empresa, FILTER_SANITIZE_STRING);
        }
    }
    if (preg_match($nombre_apellidos, "/[[:alpha:]]*/") && preg_match($nombre_usuario, "/[A-Za-z0-9_]{4,15}/") && preg_match($pass, "/[A-Za-z0-9_]{8,15}/")) {
        filter_var($nombre_apellidos, FILTER_SANITIZE_STRING);
        filter_var($nombre_usuario, FILTER_SANITIZE_MAGIC_QUOTES);
        filter_var($pass, FILTER_SANITIZE_MAGIC_QUOTES);

        if (getUsuarioByUsuario($nombre_usuario) == NULL) {
            nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, false, $tipo, $empresa);
            if ($tipo == profesional) {
                $_SESSION['usuario_profesional'] = $nombre_usuario;
            } else {
                $_SESSION['usuario_particular'] = $nombre_usuario;
            }
        }
        header("Location: ../Vistas/login.php");
    } else {
        unset($_POST['registro']);
        header("Location: ../Vistas/registro.php");
    }
}
