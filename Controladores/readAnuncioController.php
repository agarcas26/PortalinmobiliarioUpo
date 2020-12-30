<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of readAnuncioController
 *
 * @author agarc
 */
include_once '../Modelos/modelo_anuncios.php';
include_once '../Dao/daoanuncios.php';

function readAnuncio($idAnuncio){
    $anuncio1= new anuncio();
    $anuncio1->setIdAnuncio($idAnuncio);
    
    $daoAnuncio= new daoanuncios();
    return $daoAnuncio->read($anuncio1);
}
