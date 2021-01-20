<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sesion_iniciada() {
    echo "<img src='src' alt='Logo'/>" 
    + "<a href='index.php'>Inmobiliaria UPO</a>" 
    + "<nav>" 
    + "<a href='./Vistas/perfil.php'>Mi perfil</a>" 
    + "<a href='./Vistas/mis_anuncios.php'>Mi anuncios</a>" 
    + "</nav>";
}

function no_sesion_iniciada() {
    echo "<img src='src' alt='Logo'/>" 
    + "<a href='index.php'>Inmobiliaria UPO</a>" 
    + "<nav>" 
    + "<a href='login.php'>¿Ya tienes cuenta?Inicia sesión</a>"
    + "<a href='registro.php'>¡Regístrate gratis!</a>"
    + "</nav>";
}

function cabecera_admin() {
    
}
