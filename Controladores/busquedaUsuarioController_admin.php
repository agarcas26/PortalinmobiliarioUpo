<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/daoUsuarios.php';
include_once '../Controladores/UsuarioController.php';

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
            echo '<td>' . $aux[4] . '</td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Eliminar usuario"/><input name="nombre_usuario" id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Modificar usuario"/><input name="nombre_usuario"  id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}

if(isset($_POST['eliminar'])){
    $daoUsuario = new daoUsuarios();
    $usuarios = $daoUsuario->eliminar_usuario($_POST['nombre_usuario']);
    $daoUsuario->destruct();
    
}

if(isset($_POST['modificar'])){
    $_SESSION['searchuser'] = $_POST['nombre_usuario'];
    
    getDatosPerfil();
}

if(isset($_POST['guardar'])){
    $usuario = new Usuario();
    $usuario->set_moroso($_POST['moroso']);
    $usuario->setTipo($_POST['tipo']);
    $usuario->set_contrasenya_user($_POST['contrasenya']);
    $usuario->set_nombre_apellidos($_POST['nombre_apellidos']);
    $usuario->set_nombre_usuario($_POST['nombre_usuario']);
    
    $daoUsuario = new daoUsuarios();
    $daoUsuario->modificar_usuario($nuevos_datos);
    $daoUsuario->destruct();
    
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
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="modificar" name="modificar" value="Modificar usuario"/><input type="hidden" id="nombre_usuario" value="' . $aux[0] . '" /></form></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}


function getDatosPerfil(){
    $usuario = getUsuarioByUsuario($_SESSION['searchuser']);
    $datos = [];
    array_push($datos,$usuario->get_nombre_usuario());
    array_push($datos,$usuario->get_nombre_apellidos());
    array_push($datos,$usuario->getContrasenya());
    array_push($datos,$usuario->getMoroso());
    array_push($datos,$usuario->getTipo());
    
    return $datos;
}