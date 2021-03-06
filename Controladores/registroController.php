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
    }else{
        session_start();
        $_SESSION["error_registro"]="Las contraseñas no coinciden.";
        header("Location: ../Vistas/registro.php");
    }
}

function registroController($nombre_usuario, $nombre_apellidos, $pass, $tipo, $empresa) {
    session_start();
        $_SESSION["error_registro"]="";
    if ($tipo == "profesional") {
        if (preg_match("/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/", $empresa)) {
            filter_var($empresa, FILTER_SANITIZE_STRING);
        } else {
            $_SESSION["error_registro"] .= "Nombre de empresa incorrecto(debe empezar con mayuscula).<br>";
        }
    }
    if (preg_match("/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/", $nombre_apellidos) && preg_match("/[A-Za-z0-9_]{3,15}/", $nombre_usuario) && preg_match("/[A-Za-z0-9_]{8,15}/", $pass)) {
        filter_var($nombre_apellidos, FILTER_SANITIZE_STRING);
        filter_var($nombre_usuario, FILTER_SANITIZE_ADD_SLASHES);
        filter_var($pass, FILTER_SANITIZE_ADD_SLASHES);

        if (getUsuarioByUsuario($nombre_usuario) == NULL) {
            nuevoUsuario($nombre_apellidos, $nombre_usuario, $pass, "false", $tipo, $empresa);
        }
        header("Location: ../Vistas/login.php");
    } else {
        if (!preg_match("/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/", $nombre_apellidos)) {
            $_SESSION["error_registro"] .= "Nombre y apellidos incorrectos(deben empezar con mayuscula).<br>";
        }
        if (!preg_match("/[A-Za-z0-9_]{3,15}/", $nombre_usuario)) {
            $_SESSION["error_registro"] .= "Nombre de usuario incorrecto(debe contener 4 a 16 caracteres alfanumericos).<br>";
        }
            if (!preg_match("/[A-Za-z0-9_]{8,15}/", $pass)) {
            $_SESSION["error_registro"] .= "Contraseña incorrecta(debe tener entre 9 y 16 caracteres alfanumericos).<br>";
        }
        
        unset($_POST['enviar']);
        header("Location: ../Vistas/registro.php");
    }
}
