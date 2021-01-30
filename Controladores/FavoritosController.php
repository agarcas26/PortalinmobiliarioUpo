<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/daoFavoritos.php';

function get_favoritos_usuario() {
    $daoFavoritos = new daoFavoritos();
    $favoritos = $daoFavoritos->listar_favoritos_user();
    $daoFavoritos->destruct();

    if (sizeof($favoritos) > 0) {
        for ($i = 0; $i < sizeof($favoritos); $i++) {
            echo '<table id="datos_visa" class="display table-bordered" style="width:100%">';
            echo '<tr>';
            echo '<td>' . $favoritos[$i][0] . " Dirección:   " . $favoritos[$i][2] . " " . $favoritos[$i][1] . " " . $favoritos[$i][4] . " " . $favoritos[$i][3] . '</td>';
            echo '</tr><tr>';
            echo '<td>   Precio:  ' . $favoritos[$i][7] . '</td>';
            echo '</tr><tr>';
            echo '<td>   Fecha de publicación:  ' . $favoritos[$i][8] . '</td>';
            echo '</tr><tr>';
            echo '</tr><tr>';
            echo '<td>   Fecha de publicación:  ' . $favoritos[$i][9] . '</td>';
            echo '</tr><tr>';
            echo '</table>';
        }
    }
}

function vista_previa_favoritos() {
    $daoFavoritos = new daoFavoritos();
    $favoritos = $daoFavoritos->listar_favoritos_user();
    $daoFavoritos->destruct();

    if (sizeof($favoritos) > 0) {
        for ($i = 0; $i < sizeof($favoritos); $i++) {
            echo '<tr>';
            echo '<td>' . $favoritos[$i][0] . " Dirección:   " . $favoritos[$i][2] . " " . $favoritos[$i][1] . '</td>';
            echo '<td>   Fecha de publicación:  ' . $favoritos[$i][8] . '</td>';
            echo '<td>   Precio:  ' . $favoritos[$i][7] . '</td>';
            echo '</tr>';
        }
    }
}


function esFavorito($id_anuncio) {
    $r=false;
    $daoFavoritos = new daoFavoritos();
    $favoritos = $daoFavoritos->listar_favoritos_user();
    $daoFavoritos->destruct();
    $i=0;
    while($i < sizeof($favoritos)&&!$r){
        if($favoritos[$i][0]==$id_anuncio){
            $r=true;
        }
        $i++;
    }
    
   return $r; 
}


    
    function toggle_favorito($id_anuncio, $nombre_usuario) {
        $daoFavoritos = new daoFavoritos();
        if(esFavorito($id_anuncio)){
            $daoFavoritos->eliminar_favorito($id_anuncio);
        }
        else{
            $daoFavoritos->crear_favorito($id_anuncio, $nombre_usuario);
        }
        $daoFavoritos->destruct();
    }