<?php

if (isset($_POST['realizar_busqueda'])) {
    $palabras_clave = split(' ', $_POST['barra_buscador']);

    foreach ($_POST['filtros'] as $filtro) {
        $palabras_clave .= $filtro;
    }

    //Buscamos en la bbdd aquellos inmuebles que contentan las palabras clave
    /*
      Pasamos la lista de anuncios a busquedaController.php para listar los anuncios
      y rellenamos la barra de busqueda de busqueda.php
     */
    header("Location: ../Vistas/busqueda.php");
}