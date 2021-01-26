<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/daoFavoritos.php';

function get_favoritos_usuario() {
    $daoFavoritos = new daoFavoritos();
    $favoritos = $daoFavoritos->listar_favoritos();
    $daoFavoritos->destruct();

    if (sizeof($favoritos) > 0) {
        for($i = 0; $i < sizeof($favoritos); $i++){
            echo '<tr>';
            echo '<td>' . $favoritos[$i][0] . " Dirección:   " . $favoritos[$i][2] . " " . $favoritos[$i][1] . '</td>';
            echo '<td>   Fecha de publicación:  ' . $favoritos[$i][8] . '</td>';
            echo '<td>   Precio:  ' . $favoritos[$i][7] . '</td>';
            echo '</tr>';
        }
    }
}

function vista_previa_favoritos(){
    $daoFavoritos = new daoFavoritos();
    $favoritos = $daoFavoritos->listar_favoritos();
    $daoFavoritos->destruct();

    if (sizeof($favoritos) > 0) {
        for($i = 0; $i < sizeof($favoritos); $i++){
            echo '<tr>';
            echo '<td>' . $favoritos[$i][0] . " Dirección:   " . $favoritos[$i][2] . " " . $favoritos[$i][1] . '</td>';
            echo '<td>   Fecha de publicación:  ' . $favoritos[$i][8] . '</td>';
            echo '<td>   Precio:  ' . $favoritos[$i][7] . '</td>';
            echo '</tr>';
        }
    }
}
