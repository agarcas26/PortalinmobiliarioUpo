<?php

include_once '../Modelos/ResenyaModel.php';
include_once '../Dao/daoResenyas.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";

function escribirResenyas() {
    if ($_POST["btonEscribir"]) {
        if (empty($_POST["txtDescripcion"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtDescripcion"] = "Debe introducir una descripción.";
        }
        if (empty($_POST["txtValoracion"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtValoracion"] = "Debe introducir una valoración.";
        }
    }
    if ($_SESSION["validacion"]) {
        $resenya1 = new Resenyamodel();
        $resenya1->setDescripcion($_POST["txtDescripcion"]);
        $resenya1->setValoracion($_POST["txtValoracion"]);
        $daoresenya = new daoResenyas();

        $insertOk = $daoresenya->escribirResenyas($resenya1);
        if (!$insertOk) {
            $_SESSION["errores"]["insertOk"] = "No se ha insertado correctamente";
        }
        if ($_SESSION["validacion"]) {
            header('Location:../Vistas/Inmuebles.php'); //sin errores
        } else {
            header('Location:../Vistas/Inmuebles.php'); //con errores
        }
    }
}

function eliminarResenyas() {
    if ($_POST["txtDescripcion"]) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtDescripcion"] = "Debe de rellenar el campo descripcion";
    }
    if ($_POST["txtValoracion"]) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtValoracion"] = "Debe de rellenar el campo valoracion";
    }
    if ($_SESSION["validacion"]) {
        $resenya2 = new Resenyamodel();
        $resenya2->setDescripcion($_POST["txtDescripcion"]);
        $resenya2->setValoracion($_POST["txtValoracion"]);

        $daoResenya = new daoResenyas();
        $deleteOk = $daoResenya->eliminarResenyas($resenya2);
        if (!$deleteOk) {
            $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
        }
    }
    if ($_SESSION["validacion"]) {
        header('Location: ../Vistas/Inmuebles.php'); //sin errores
    } else {
        header('Location: ../Vistas/Inmuebles.php'); //con errores
    }
}
function modificarResenya(){
    if($_POST["txtDescripcion"]){
        $_SESSION["validacion"]=false;
        $_SESSION["errores"]["txtDescripcion"]="debe completar el campo descripción.";
        
    }
    if ($_POST["txtValoracion"]) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtValoracion"] = "Debe de rellenar el campo valoracion";
    }
}