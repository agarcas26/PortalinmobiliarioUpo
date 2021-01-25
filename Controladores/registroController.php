<?php

include_once '../Controladores/UsuarioController.php';


if (isset($_POST['enviar'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre_apellidos = $_POST['nombre_apellidos'];
    $pass = $_POST['contrasenya'];
    $conf_pass = $_POST['conf_contrasenya'];
    $tipo = $_POST['tipo'];
    $empresa = $_POST['empresa'];
    if ($pass == $conf_pass) {
        registroController($nombre_usuario, $nombre_apellidos, $pass, $tipo, $empresa);
    }
}

function registroController($nombre_usuario, $nombre_apellidos, $pass, $tipo, $empresa) {
    if ($tipo == "profesional") {
        if (preg_match("/^[a-zA-Z]+[a-zA-Z]+$/", $empresa)) {
            filter_var($empresa, FILTER_SANITIZE_STRING);
        }
    }
    if (preg_match($nombre_apellidos, "/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/") && preg_match("/[A-Za-z0-9_]{3,15}/", $nombre_usuario) && preg_match("/[A-Za-z0-9_]{8,15}/", $pass)) {
        filter_var($nombre_apellidos, FILTER_SANITIZE_STRING);
        filter_var($nombre_usuario, FILTER_SANITIZE_MAGIC_QUOTES);
        filter_var($pass, FILTER_SANITIZE_MAGIC_QUOTES);

        if (getUsuarioByUsuario($nombre_usuario,$pass) == NULL) {
            nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, false, $tipo, $empresa);
            if ($tipo == profesional) {
                $_SESSION['usuario_profesional'] = $nombre_usuario;
            } else {
                $_SESSION['usuario_particular'] = $nombre_usuario;
            }
        }
        header("Location: ../Vistas/index.php");
    } else {
        //unset($_POST['registro']);
        //header("Location: ../Vistas/registro.php");
    }
}
