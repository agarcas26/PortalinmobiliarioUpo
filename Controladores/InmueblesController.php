<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Modelos/InmueblesModel.php';
include_once '../DAO/daoInmuebles.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";
$_SESSION["cancelado"] = false;

//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false

function insertInmuebles() {
    if ($_POST["btonInsertar"]) {
        if (empty($_POST["txtNumero"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNumero"] = "Debe de completar el campo numero.";
        }
        if (empty($_POST["txtCp"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtCp"] = "Debe de completar el campo cp.";
        }
        if (empty($_POST["txtNombre_via"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNombre_via"] = "Debe de completar el campo nombre via.";
        }if (empty($_POST["txtTipo_via"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtTipo_via"] = "Debe de completar el campo tipo de via.";
        }if (empty($_POST["txtNombre_localidad"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNombre_localidad"] = "Debe de completar el nombre de la localidad.";
        }if (empty($_POST["txtNombre_provincia"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNombre_provincia"] = "Debe de completar el nombre de la provincia.";
        }
        if (empty($_POST["txtNum_banyos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_banyos"] = "Debe de completar el campo numero de baños.";
        }
        if (empty($_POST["txtNum_habitaciones"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_habitaciones"] = "Debe de completar el campo numero de habitaciones.";
        }
        if (empty($_POST["txtCocina"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtCocina"] = "Debe de completar el campo cocina.";
        }
        if (empty($_POST["txtNum_Planta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_Planta"] = "Debe de completar el campo numero de plantas.";
        }
        if (empty($_POST["txtPlanta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtPlanta"] = "Debe de completar el campo planta.";
        }
        if (empty($_POST["txtMetros"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtMetros"] = "Debe de completar el campo metros.";
        }
        if (empty($_POST["txtTipo_Inmueble"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtTipo_Inmueble"] = "Debe de completar el campo tipo de inmueble.";
        }
        if (empty($_FILES["fileFotos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["fileFotos"] = "Debe añadir una imagen del inmueble.";
        }
    }
    if ($_SESSION["validacion"]) {

        $inmueble1 = new InmueblesModel();
        $inmueble1->setNumero($_POST["txtNumero"]);
        $inmueble1->setCp($arrayAux["txtCp"]);
        $inmueble1->setNombre_via($arrayAux["txtNombre_via"]);
        $inmueble1->setTipo_via($arrayAux["txtTipo_via"]);

        $inmueble1->setNombre_localidad($arrayAux["txtNombre_localidad"]);
        $inmueble1->setNombre_provincia($arrayAux["txtNombre_provincia"]);
        $inmueble1->setNum_banyos($arrayAux["txtNum_banyos"]);
        $inmueble1->setNum_hab($arrayAux["txtNum_habitaciones"]);
        $inmueble1->setCocina($arrayAux["txtCocina"]);
        $inmueble1->setNum_plantas($arrayAux["txtNum_Planta"]);
        $inmueble1->setPlanta($arrayAux["txtPlanta"]);
        $inmueble1->setMetros($arrayAux["txtMetros"]);
        $inmueble1->setTipo_inmueble($arrayAux["txtTipo_Inmueble"]);
        $inmueble1->setFotos($arrayAux["fileFotos"]);

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

function modificarInmueble() {
    if (empty($_POST[""])){}
}

function listar() {
    $daoinmueble = new daoinmueble();
    $inmuebles = $daoinmueble->listar();


    while (mysqli_fetch_array($inmuebles)) {
        $inmueble_aux = new inmueble();
        $inmueble_aux->setCp($inmuebles[1]);
        $inmueble_aux->setMetros($inmuebles[13]);
        $inmueble_aux->setNombre_localidad($inmuebles[5]);
        $inmueble_aux->setNombre_provincia($inmuebles[6]);
        $inmueble_aux->setNombre_usuario_duenyo($inmuebles[4]);
        $inmueble_aux->setNombre_via($inmuebles[2]);
        $inmueble_aux->setNum_banyos($inmuebles[7]);
        $inmueble_aux->setNumero($inmuebles[0]);
        $inmueble_aux->setNumero_plantas($inmuebles[11]);
        $inmueble_aux->setPlanta($inmuebles[12]);
        $inmueble_aux->setTipo($inmuebles[10]);
        $inmueble_aux->setCocina($inmuebles[9]);
        $inmueble_aux->setTipo_via($inmuebles[3]);
        $inmueble_aux->setFotos($inmuebles[14]);
        $inmueble_aux->setNum_hab($inmuebles[8]);
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
                    $r = $lista[$i];
                    $encontrado = true;
                }
            }
        }

        $i++;
    }

    return $r;
}
