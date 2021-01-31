<?php

include_once '../Controladores/UsuarioController.php';
include_once '../Modelos/UsuarioModel.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['guardar'])) {
    $datos = getDatosPerfil();
    if (isset($_SESSION['admin'])) {
        salvarCambiosController_admin();
    } else {
        salvarCambiosController($datos, $_POST['pass'], $_POST['nueva_pass'], $_POST['conf_nueva_pass']);
    }
    header("Location: ../Vistas/perfil.php");
}

function getDatosPerfil() {
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } else {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }
    $datos = [];
    $usuario = getUsuarioByUsuario($nombre_usuario);
    array_push($datos, $usuario->get_nombre_usuario());
    array_push($datos, $usuario->get_nombre_apellidos());

    return $datos;
}

function salvarCambiosController($datos, $pass, $nueva_pass, $conf_nueva_pass) {
    $aux = getUsuarioByUsuario($datos[0]);
    $usuario_datos = mysqli_fetch_row($aux);
    $usuario = new Usuario($usuario_datos[2], $usuario_datos[0], $usuario_datos[1], $usuario_datos[3]);

    if ($usuario->get_contrasenya() == $pass) {
        if ($nueva_pass != NULL && $nueva_pass == $conf_nueva_pass) {
            $usuario->set_contrasenya($nueva_pass);
            $dao = new daoUsuarios();
            $dao->modificar_usuario($usuario);
            $dao->destruct();
        } else {
            return "Las contraseñas no coinciden";
        }
    } else {
        return "Introduzca correctamente su contraseña actual";
    }
}

function salvarCambiosController_admin() {

    $usuario = new Usuario();
    $usuario->setTipo($_POST['tipo']);
    $usuario->set_contrasenya_user($_POST['pass']);
    $usuario->set_moroso($_POST['moroso']);
    $usuario->set_nombre_usuario($_GET['nombre_usuario']);

    $dao = new daoUsuarios();
    $dao->modificar_usuario($usuario);
    $dao->destruct();

    header("Location: ../Vistas/busqueda_usuario_admin.php");
}
