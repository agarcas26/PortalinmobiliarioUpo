<?php

include_once '../Controladores/UsuarioController.php';

if (isset($_POST['guardar'])) {
    salvarCambiosController($datos, $_POST['pass'], $_POST['nueva_pass'], $_POST['conf_nueva_pass']);
}

function getDatosPerfil($usuario) {
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } else {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }
    $usuario = getUsuarioByUsuario($nombre_usuario);
}

function salvarCambiosController($datos, $pass, $nueva_pass, $conf_nueva_pass) {
    //Comprobamos que la contraseña actual introducida concuerda con la registrada en la bbdd
    if ($datos[sizeof($datos) - 1] == $pass) {
        if ($nueva_pass != NULL) {
            if ($nueva_pass == $conf_nueva_pass) {
                //Filtrar y sanear las entradas
                $datos[sizeof($datos) - 1] = $nueva_pass;
                salvarCambios($datos);
            }
        } else {
            return "Las contraseñas no coinciden";
        }
    } else {
        return "Introduzca correctamente su contraseña actual";
    }
}
