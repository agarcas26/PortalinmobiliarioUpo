<?php

include_once '../Controladores/loginController.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sesion_iniciada() {
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }
    echo "<nav class='navbar navbar-light bg-light static-top'>"
    . "<a href='../Vistas/perfil.php'>¡Bienvenido " . $usuario . "! Mi perfil</a>"
    . "<a href='../Vistas/mis_anuncios.php'>Mis anuncios</a>"
    . "<a href='../Vistas/mis_alertas.php'>Mis alertas</a>"
    . "<a href='../Vistas/mis_favoritos.php'>Mis favoritos</a>"
    . "<a href='../Vistas/inmueble.php'>Mis inmuebles</a>"
    . "<a href='../Controladores/logoutController.php'>Cerrar sesión</a>"
    . "</nav>"
    . "<br>"
    . "<a class='navbar-brand' href='index.php'><img src='../img/logo.png' alt='Logo'/></a>";
}

function no_sesion_iniciada() {
    echo "<nav class='navbar navbar-light bg-light static-top'>"
    . "<a href='../Vistas/login.php'>¿Ya tienes cuenta?Inicia sesión</a>"
    . "<a href='../Vistas/registro.php'>¡Regístrate gratis!</a>"
    . "</nav>"
    . "<br>"
    . "<a class='navbar-brand' href='../Vistas/index.php'><img src='../img/logo.png' alt='Logo'/></a>";
}

function cabecera_admin() {
     echo "<nav class='navbar navbar-light bg-light static-top'>"
    . "<a href='../Vistas/perfil.php'>¡Bienvenido " . $_SESSION["admin"] . "! Mi perfil</a>"
    . "<a href='../Vistas/mis_anuncios.php'>Mis anuncios</a>"
    . "<a href='../Vistas/mis_alertas.php'>Mis alertas</a>"
    . "<a href='../Vistas/mis_favoritos.php'>Mis favoritos</a>"
    . "<a href='../Vistas/inmueble.php'>Mis inmuebles</a>"
    . "<a href='../Vistas/busqueda_usuario_admin.php'>Administrar usuarios</a>"
    . "<a href='../Controladores/logoutController.php'>Cerrar sesión</a>"
    . "</nav>"
    . "<br>"
    . "<a class='navbar-brand' href='index.php'><img src='../img/logo.png' alt='Logo'/></a>";
}

