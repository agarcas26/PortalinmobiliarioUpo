<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/daoFavoritos';

function get_favoritos_usuario() {
    $favoritos = get_favoritos();
    while(mysqli_fetch_array($favoritos)){
        echo '<tr>';
        echo '';
        echo '</tr>';
    }
}