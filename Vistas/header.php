<?php
include_once '../Controladores/loginController.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sesion_iniciada() {
    echo"<nav  style='width: 100%;position:absolute; top:0; left:0;' class='navbar navbar-light bg-light static-top'>"
    . "<a href='../Vistas/perfil.php'>Mi perfil</a>"
    . "<a href='../Vistas/mis_anuncios.php'>Mi anuncios</a>"
    . "<a href='../Vistas/login.php' onclick='cerrarSesion();'>Cerrar sesión</a>" //AÑADIR FUNCIONALIDAD
    . "</nav>"
    ."<br>"
    . "<a href='index.php'><img src='../img/logo.png' alt='Logo'/></a>";
}

function no_sesion_iniciada() {
    echo "<nav  style='width: 100%;position:absolute; top:0; left:0;' class='navbar navbar-light bg-light static-top'>"
    . "<a href='../Vistas/login.php'>¿Ya tienes cuenta?Inicia sesión</a>"
    . "<a href='../Vistas/registro.php'>¡Regístrate gratis!</a>"
    . "</nav>"
    ."<br>"
    ."<a href='../Vistas/index.php'><img src='../img/logo.png' alt='Logo'/></a>";
}

function cabecera_admin() {
    
}
