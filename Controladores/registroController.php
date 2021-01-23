<?php

include_once '../Controladores/UsuarioController.php';


if ($_POST['enviar']) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['conf_contrasena'];
    $tipo = $_POST['tipo'];
    registroController($nombre_usuario, $usuario, $pass, $tipo);
}

function registroController($nombre_usuario, $usuario, $pass, $tipo) {

    if (preg_match($nombre_usuario, "^(?!.* (?: |$))[A-Z][a-z ]+$") && preg_match($email, "/^[\w]+@{1}[\w]+\.[a-z]{2,3}$/") && preg_match($usuario, "^@?(\w){1,15}") && preg_match($pass, "^(?![a-z]*$)(?![A-Z]*$)(?!\d*$)(?")) {
        filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
        filter_var($email, FILTER_SANITIZE_EMAIL);
        filter_var($usuario, FILTER_SANITIZE_MAGIC_QUOTES);
        filter_var($pass, FILTER_SANITIZE_MAGIC_QUOTES);

        if (getUsuarioByUsuario($nombre_usuario) == NULL) {
            nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, false);
        }
        header("Location: ../Vistas/login.php");
    } else {
        unset($_POST['registro']);
        header("Location: ../Vistas/registro.php");
    }
}
