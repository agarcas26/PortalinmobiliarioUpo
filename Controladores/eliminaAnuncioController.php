<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Modelos/modelo_inmuebles.php';
include_once '../Dao/daoinmueble.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SESSION["errores"] = "";

function deleteAnuncio($idanuncio) {
    $anuncio1 = new modelo_anuncios();

    $anuncio1->setIdAnuncio($idanuncio);
    $daoAnuncio = new daoanuncios();
    $deleteOk = $daoAnuncio->eliminar($anuncio1);
    if (!$deleteOk) {
        $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
    }
}
if($_SESSION["errores"]){
    header('Location:../Vistas/perfil.php '); 
}else{
    header('Location:../Vistas/perfil.php '); //muestra el mensaje de error de eliminacion
}