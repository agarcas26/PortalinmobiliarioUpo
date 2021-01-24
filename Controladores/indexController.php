<?php

include_once '../Controladores/AnuncioController.php';

if (isset($_POST['realizar_busqueda'])) {
//    $palabras_clave = split(' ', $_POST['barra_buscador']);
//
//    foreach ($_POST['tipo_oferta'] as $filtro) {
//        $palabras_clave .= $filtro;
//    }
//
//
//    if (preg_match("/ab+c/", $_POST['barra_buscador'])) {
//        filter_var($_POST['barra_buscador'], FILTER_SANITIZE_STRING);
//        anuncios_barra_busqueda($_POST['barra_buscador']);
//    }
    
    header("Location: ../Vistas/busqueda.php");
}


