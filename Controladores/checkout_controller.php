<?php
require_once '../Dao/daoAnuncios.php';
require_once '../Dao/daoAlquiler.php';
require_once '../Dao/daoCompra.php';
require_once '../Modelos/AnunciosModel.php';
require_once '../Modelos/AlquilerModel.php';
require_once '../Modelos/CompraModel.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($_POST["payment_status"]!="VERIFIED"){
    header("Location: ../Vistas/busqueda.php");
}else{
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }
    $dao=new daoAnuncios();
    $anuncio=$dao->get_tipo_anuncio($_GET["id_anuncio"]);
    $dao->destruct();
    if($anuncio=="Compra"){
        $dao=new daoCompra();
        $dao->crear_compra($usuario, $anuncio, $señal);
        
        $dao->destruct();
    }else{
        $dao=new daoAlquiler();
        $dao->crear_alquileres($usuario, $anuncio);
        
        $dao->destruct();
    }
     $dao=new daoAnuncios();
    $dao->eliminar($_GET["id_anuncio"]);
    $dao->destruct();
}

