<?php

require_once '../Dao/daoAnuncios.php';
require_once '../Dao/daoAlquiler.php';
require_once '../Dao/daoCompra.php';
require_once '../Dao/daoPago.php';
require_once '../Dao/daoContrato_Alquiler.php';
require_once '../Dao/daoContrato_Compra.php';
require_once '../Modelos/AnunciosModel.php';
require_once '../Modelos/AlquilerModel.php';
require_once '../Modelos/CompraModel.php';

if (isset($_POST["payment_status"]))
    if ($_POST["payment_status"] != "VERIFIED") {
        header("Location: ../Vistas/busqueda.php");
    } else {
        $validate = true;
    }
if (isset($_POST["guardar"])) {
    if ($_POST["guardar"] != "Confirmar pago") {
        header("Location: ../Vistas/busqueda.php");
    } else {
        $validate = true;
    }
}
if ($validate == true) {
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }
    $dao = new daoAnuncios();
    if (isset($_GET["id_anuncio"])) {
        $anuncio = $dao->get_tipo_anuncio($_GET["id_anuncio"]);
    } else {
        $anuncio = $dao->get_tipo_anuncio($_POST["id_anuncio"]);
    }
    $dao->destruct();
    if ($anuncio == "Compra") {
        $dao = new daoCompra();
        $dao->crear_compra($usuario, $_GET["id_anuncio"], (getPrecio($_GET["id_anuncio"]) * 0.05));
        $dao->destruct();

        $dao = new dao_Contrato_Compra;
        $dao->crear_contrato_compra($usuario, $id_contrato_alquiler, $id_compra, date('d-m-Y'));
        $dao->destruct();
    } else {
        $dao = new daoAlquiler();
        $dao->crear_alquileres($usuario, $anuncio);
        $dao->destruct();

        $dao = new dao_Contrato_Alquiler;
        $dao->crear_contrato_alquiler($usuario, $id_contrato_compra, $id_alquiler, date('d-m-Y'), date("d-m-Y", strtotime(date('d-m-Y') . "+ 1 month")), getPrecio($_GET["id_anuncio"]));
        $dao->destruct();
    }
    $dao = new daoPago();
    $dao->crear_pago(date('d-m-Y'));
    $dao->destruct();

    $dao = new daoAnuncios();
    $dao->eliminar($_GET["id_anuncio"]);
    $dao->destruct();
    header("Location: ../Vistas/index.php");
}

