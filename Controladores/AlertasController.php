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

function vista_previa_alertas() {
    $daoAlertas = new daoBusqueda();

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } else {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }

    $alertas = $daoAlertas->listar_busquedas_usuario($nombre_usuario);
    $daoAlertas->destruct();

    if (mysqli_num_rows($alertas) > 0) {
        while ($fila = mysqli_fetch_array($alertas)) {
            if ($fila[3] == 'true') {
                echo '<tr>';
                echo '<td>Tipo de inmueble: '.$fila[4].'</td>';
                echo '<td>Tipo de oferta: '.$fila[5].'</td>';
                echo '<td>Metros cuadrados: '.$fila[8].'</td>';
                echo '<td>Número de baños: '.$fila[2].'</td>';
                echo '<td>Número de habitaciones: '.$fila[7].'</td>';
                echo '<td>Precio máximo: '.$fila[6].'€</td>';
                echo '</tr>';
            }
        }
    }
}

function ver_todas_las_alertas() {
    get_alertas_usuario();
}
