<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../PortalinmobiliarioUpo/Controladores/AnunciosController.php';

function aside_sesion_iniciada() {
    $anuncios = listar_anuncios_usuario($_SESSION['usuario']);

    while (mysqli_fetch_array($anuncios)) {
        echo '<a><figure><figcaption></figcaption>' . $anuncios[7] . '</figure></a>';
    }
}

function aside_sesion_no_iniciada() {
    $anuncios = listAllAnuncios();

    while (mysqli_fetch_array($anuncios)) {
        echo '<a><figure><figcaption></figcaption>' . $anuncios[7] . '</figure></a>';
    }
}
