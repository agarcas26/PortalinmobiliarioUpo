<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/daoUsuarios.php';
include_once '../Controladores/UsuarioController.php';
include_once '../Modelos/UsuarioModel.php';


if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_GET['busuario'])) {
    $daoUsuario = new daoUsuarios();
    $usuarios = $daoUsuario->get_usuario_by_nombre_usuario($_GET['user']);
    $daoUsuario->destruct();

    if (mysqli_num_rows($usuarios) > 0) {
        echo '<table>';
        while ($aux = mysqli_fetch_array($usuarios)) {
            echo '<tr>';
            echo '<td>' . $aux[0] . '</td>';
            echo '<td>' . $aux[1] . '</td>';
            echo '<td>' . $aux[2] . '</td>';
            echo '<td>' . $aux[3] . '</td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Eliminar usuario"/><input name="nombre_usuario" id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
            echo '<td><a href="../Vistas/modificar_usuario_admin.php?nombre_usuario=' . $aux[0] . '" ><button>Modificar usuario</button></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    unset($_GET['busuario']);
}

if (isset($_POST['eliminar'])) {
    $daoUsuario = new daoUsuarios();
    $usuarios = $daoUsuario->eliminar_usuario($_POST['nombre_usuario']);
    $daoUsuario->destruct();

    header("Location: ../Vistas/busqueda_usuario_admin.php");
}


if (isset($_POST['guardar'])) {
    $usuario = new Usuario($_POST['nombre_apellidos'],$_POST['nombre_usuario'],$_POST['contrasenya'],$_POST['moroso']);

    $usuario->setTipo($_POST['tipo']);
    
    $daoUsuario = new daoUsuarios();
    $daoUsuario->modificar_usuario($usuario);
    $daoUsuario->destruct();

    unset($_SESSION['searchuser']);
    unset($_POST['guardar']);
    header("Location: ../Vistas/busqueda_usuario_admin.php");
}

function listar_usuarios() {
    $daoUsuario = new daoUsuarios();
    $usuarios = $daoUsuario->leer_usuarios();
    $daoUsuario->destruct();

    if (mysqli_num_rows($usuarios) > 0) {
        echo '<table>';
        while ($aux = mysqli_fetch_array($usuarios)) {
            echo '<tr>';
            echo '<td>' . $aux[0] . '</td>';
            echo '<td>' . $aux[1] . '</td>';
            echo '<td>' . $aux[2] . '</td>';
            echo '<td>' . $aux[3] . '</td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Eliminar usuario"/><input type="hidden" id="nombre_usuario" value="' . $aux[0] . '" /></form></td>';
            echo '<td><a href="../Vistas/modificar_usuario_admin.php?nombre_usuario=' . $aux[0] . '" ><button>Modificar usuario</button></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}

function getDatosPerfil_admin($nombre_usuario) {
    $usuario = getUsuarioByUsuario($nombre_usuario);
    $datos = [];
    array_push($datos, $usuario->get_nombre_usuario());
    array_push($datos, $usuario->get_nombre_apellidos());
    array_push($datos, $usuario->get_contrasenya_user());
    array_push($datos, $usuario->get_moroso());
    array_push($datos, $usuario->getTipoUsr());

    return $datos;
}
