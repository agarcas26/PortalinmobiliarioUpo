<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Modelos/InmueblesModel.php';
include_once '../Dao/daoInmueble.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";

function insertInmuebles() {
    if ($_POST["btonInsertar"]) {
        if (empty($_POST["txtDireccion"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtDireccion"] = "Debe de completar el campo direccion.";
        }
        if (empty($_POST["txtNum_habitaciones"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_habitaciones"] = "Debe de completar el campo numero de habitaciones.";
        }
        if (empty($_POST["txtNum_banyos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_banyos"] = "Debe de completar el campo numero de baños.";
        }
        if (empty($_POST["txtCocina"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtCocina"] = "Debe de completar el campo cocina.";
        }
        if (empty($_POST["txtTipo_inmueble"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtTipo_inmueble"] = "Debe de completar el campo tipo de inmueble.";
        }
        if (empty($_POST["txtPlanta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtPlanta"] = "Debe de completar el campo planta.";
        }
        if (empty($_POST["txtAscensor"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtAscensor"] = "Debe de completar el campo ascensor.";
        }
    }
    if ($_SESSION["validacion"]) {
        $inmueble1 = new InmueblesModel();
        $inmueble1->setDireccion($_POST["txtDireccion"]);
        $inmueble1->setNum_habitaciones($_POST["txtNum_habitaciones"]);
        $inmueble1->setNum_banyos($_POST["txtNum_banyos"]);
        $inmueble1->setCocina($_POST["txtCocina"]);
        $inmueble1->setTipo_inmueble($_POST["txtTipo_inmueble"]);
        $inmueble1->setPlanta($_POST["txtPlanta"]);
        $inmueble1->setAscensor($_POST["txtAscensor"]);
        $daoInmueble = new daoInmuebles();

        $insertOk = $daoInmueble->insertar($inmueble1);
        if (!$insertOk) {
            $_SESSION["errores"]["insertOk"] = "No se ha insertado correctamente";
        }
    }
    if ($_SESSION["validacion"]) {
        header('Location: ../Vistas/perfil.php'); //se va a la pantalla de perfil sin errores
    } else {
        header('Location: ../Vistas/perfil.php'); //se va a la pantalla de perfil mostrando un mensaje de error
    }
}

function listar() {
    $daoinmueble = new daoinmueble();
    $inmuebles = $daoinmueble->listar();


    while (mysqli_fetch_array($inmuebles)) {
        $inmueble_aux = new inmueble();
        $inmueble_aux->setCp($inmuebles[1]);
        $inmueble_aux->setMetros($inmuebles[12]);
        $inmueble_aux->setNombre_localidad($inmuebles[5]);
        $inmueble_aux->setNombre_provincia($inmuebles[6]);
        $inmueble_aux->setNombre_usuario_duenyo($inmuebles[4]);
        $inmueble_aux->setNombre_via($inmuebles[2]);
        $inmueble_aux->setNum_banyos($inmuebles[7]);
        $inmueble_aux->setNumero($inmuebles[0]);
        $inmueble_aux->setNumero_plantas($inmuebles[10]);
        $inmueble_aux->setPlanta($inmuebles[11]);
        $inmueble_aux->setTipo($inmuebles[9]);
        $inmueble_aux->setCocina($inmuebles[8]);
        $inmueble_aux->setTipo_via($inmuebles[3]);

        $anuncios[] = $anuncio_aux;
    }
    return $anuncios;
}

function getInmuebleByAnuncio($anuncio) {
    $lista = listar();
    $i = 0;
    $encontrado = false;
    $r = false;

    while ($encontrado == false && i < sizeof($lista)) {
        $aux = new inmueble();
        if ($lista[$i]->getCp() == $anuncio->getCP()) {
            if ($lista[$i]->getTipo_via() == $anuncio->getTipo_via()) {
                if ($lista[$i]->getNumero() == $anuncio->getNumero()) {
                    $r=$lista[$i];
                    $encontrado=true;
                }
            }
        }

        $i++;
    }

    return $r;
}
