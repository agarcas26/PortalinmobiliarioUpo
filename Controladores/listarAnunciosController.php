<?php

include_once("../Dao/daoanuncios.php");

function listAllAnuncios(){
    $daoanuncios = new daoanuncios();
    return $daoanuncios->listar();
}