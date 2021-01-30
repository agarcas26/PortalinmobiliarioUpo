<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/daoUsuarios.php';

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST['busuario'])) {
    $daoUsuario = new daoUsuarios();
    $usuarios = $daoUsuario->get_usuario_by_nombre_usuario($_POST['user']);
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
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Eliminar usuario"/><input id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Modificar usuario"/><input id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
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
    $daoUsuario = new daoUsuarios();
    $usuarios = $daoUsuario->eliminar_usuario($_POST['nombre_usuario']);
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
            echo '<td>' . $aux[4] . '</td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Eliminar usuario"/><input id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
            echo '<td><form action="../Controladores/busquedaUsuarioController_admin.php" method="POST" ><input type="submit" id="eliminar" name="eliminar" value="Modificar usuario"/><input id="nombre_usuario" value="' . $aux[0] . '" hidden /></form></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
