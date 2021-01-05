<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Modelos/modelo_anuncios.php';
include_once '../Dao/daoanuncios.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
//$_SESSION["error"];
//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";

$_SESSION["cancelado"] = false;
//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false

if ($_POST["btonmodificar"]) {
    if (emppty($_POST["txtPrecio"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtPrecio"] = "Debe de completar el campo precio.";
    }
    if (empty($_POST["txtDireccion"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtDireccion"] = "Debe de completar el campo direccion.";
    }
} elseif ($_POST["btonCancelar"]) {
    $_SESSION["cancelado"] = true;
    $_SESSION["errores"]["sms"] = "ha cancelado la operación.";
} else {
    $_SESSION["validacion"] = false;
    $_SESSION["errores"]["sms"] = "Petición ajena al sistema.";
}
if ($_SESSION["validacion"]) {
    $anuncio1 = new modelo_anuncios();

    $anuncio1->setPrecio($_POST["txtPrecio"]);
    $anuncio1->setDireccion($_POST["txtDireccion"]);
    

    $modifyOk = $daoanuncios->modificar($anuncio1);
    if (!$modifyOk) {
        $_SESSION["errores"]["modifyOk"] = "No se ha modificado correctamente";
    }

    if ($_SESSION["validacion"] || $_SESSION["cancelado"]) {

        header('Location: ../Vista/perfil.php');
    } else {
        header('Location: ../Vista/perfil.php'); //mensajes de errores
    }
}