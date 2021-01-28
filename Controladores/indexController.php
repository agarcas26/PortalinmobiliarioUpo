<?php

include_once '../Controladores/AnunciosController.php';

if (isset($_POST['realizar_busqueda'])) {

    if (preg_match("/ab+c/", $_POST['barra_buscador'])) {
        filter_var($_POST['barra_buscador'], FILTER_SANITIZE_STRING);
        anuncios_barra_busqueda(preg_split(" ", $_POST['barra_buscador']));
    }

    header("Location: ../Vistas/busqueda.php");
}


