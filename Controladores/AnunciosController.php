<?php

include_once '../Modelos/UsuarioModel.php';
include_once '../Modelos/AnunciosModel.php';
include_once '../Dao/daoanuncios.php';
include_once '../Modelos/InmueblesModel.php';
include_once '../Dao/daoInmueble.php';

session_start();
//FALTA INSERTAR ANUNCIOS
//funcion eliminar anuncios
$_SESSION["errores"] = "";

function deleteAnuncio($idanuncio) {
    $anuncio1 = new modelo_anuncios();

    $anuncio1->setIdAnuncio($idanuncio);
    $daoAnuncio = new daoanuncios();
    $deleteOk = $daoAnuncio->eliminar($anuncio1);
    if (!$deleteOk) {
        $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
    }

    if ($_SESSION["errores"]) {
        header('Location:../Vistas/perfil.php ');
    } else {
        header('Location:../Vistas/perfil.php '); //muestra el mensaje de error de eliminacion
    }
}

//funcion modificar anuncios
function modifyAnuncio() {
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
}

//funcion consultar anuncios 

function readAnuncio($idAnuncio) {
    $anuncio1 = new anuncio();
    $anuncio1->setIdAnuncio($idAnuncio);

    $daoAnuncio = new daoanuncios();
    return $daoAnuncio->read($anuncio1);
}

//funcion listar anuncios
function listAllAnuncios() {
    $daoanuncios = new daoanuncios();
    return $daoanuncios->listar();
}

function listar_anuncios_usuario() {
    $daoanuncios = new daoanuncios();
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    }
    if (isset($_SESSION['usuario_profesional'])) {
        $usuario = $_SESSION['usuario_profesional'];
    }
    return $daoanuncios->listar_anuncios_usuario($usuario);
}

function vista_previa_anuncios() {
    $daoanuncios = new daoanuncios();
    $anuncios = $daoanuncios->listar();
    return mysqli_fetch_row($anuncios);
}
