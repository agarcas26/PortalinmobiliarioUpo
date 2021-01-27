<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Controladores/busquedaController.php';

function get_alertas_usuario() {
    $alertas = [];
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }

    $busquedas = listar_alertas_usuario();

    if (mysqli_num_rows($busquedas) > 0) {
        while ($fila = mysqli_fetch_array($busquedas)) {
            if ($fila[1] == $nombre_usuario) {
                array_push($alertas, $fila);
            }
        }
    }

    for ($i = 0; $i < sizeof($alertas); $i++) {
        echo '<table>';
        echo '<tr>';
        echo '<td>Tipo de inmueble: ' . $alertas[$i][4] . '</td>';
        echo '</tr><tr>';
        echo '<td>Tipo de oferta: ' . $alertas[$i][5] . '</td>';
        echo '</tr><tr>';
        echo '<td>Metros cuadrados: ' . $alertas[$i][8] . '</td>';
        echo '</tr><tr>';
        echo '<td>Número de baños: ' . $alertas[$i][2] . '</td>';
        echo '</tr><tr>';
        echo '<td>Número de habitaciones: ' . $alertas[$i][7] . '</td>';
        echo '</tr><tr>';
        echo '<td>Precio máximo: ' . $alertas[$i][6] . '€</td>';
        echo '</tr><tr>';
        echo '<td><button onclick="eliminar_alerta('.$alertas[$i][0].')" type="button">Eliminar alerta</button></td>';
        echo '</tr>';
        echo '</table>';
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
        $i = 0;
        while ($fila = mysqli_fetch_array($alertas) and $i < 3) {
            if ($fila[3] == 'true') {
                echo '<tr>';
                echo '<td>Tipo de inmueble: ' . $fila[4] . '</td>';
                echo '<td>Tipo de oferta: ' . $fila[5] . '</td>';
                echo '<td>Metros cuadrados: ' . $fila[8] . '</td>';
                echo '<td>Número de baños: ' . $fila[2] . '</td>';
                echo '<td>Número de habitaciones: ' . $fila[7] . '</td>';
                echo '<td>Precio máximo: ' . $fila[6] . '€</td>';
                echo '</tr>';
                $i++;
            }
        }
    }
}

function ver_todas_las_alertas() {
    get_alertas_usuario();
}
