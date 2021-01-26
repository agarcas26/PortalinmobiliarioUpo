<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Controladores/busquedaController.php';

function get_alertas_usuario() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }

    $busquedas = listar_busquedas_usuario();

    if (mysqli_num_rows($busquedas) > 0) {
        while (mysqli_fetch_array($busquedas)) {
            if ($busquedas[1] == $nombre_usuario) {
                array_push($alertas, $busquedas);
            }
        }
    }

    for ($i = 0; $i < sizeof($alertas); $i++) {
        echo '<tr>';
        for ($j = 0; $j < sizeof($alertas[$i]); $j++) {
            echo '<td>' . $alertas[$i][$j] . '</td>';
        }
        echo '</tr>';
    }
}

function vista_previa_alertas(){
    
    
}

function ver_todas_las_alertas(){
    
}