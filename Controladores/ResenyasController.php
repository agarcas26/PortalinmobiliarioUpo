<?php

include_once '../Modelos/ResenyaModel.php';
include_once '../DAO/daoResenyas.php';
include_once '../Controladores/AnunciosController.php';
include_once '../Controladores/InmueblesController.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";
$_SESSION["cancelado"] = false;

function resenyas_anuncio($id_anuncio) {
    $anuncio = readAnuncio($id_anuncio);
    $inmueble = getInmuebleByAnuncio($anuncio);

    $resenyas_inmueble = get_resenyas_inmueble($inmueble);
    for ($i = 0; $i < sizeof($resenyas_inmueble); $i++) {
        echo '<table>';
        echo '<tr>';
        echo '<td>' . $resenyas_inmueble[$i]->getFecha_resenya() . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="estrellado" id="'. $resenyas_inmueble[$i]->getValoracion() .'">'
                . '<img class="puntuacion" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion" class="unchecked" src="../img/unchecked.png">'. '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $resenyas_inmueble[$i]->getDescripcion() . '</td>';
        echo '</tr>';
        echo '</table>';
    }
    
}

function get_resenyas_inmueble($inmueble) {
    $daoResenyas = new daoResenyas();
    $resenyas_inmueble = $daoResenyas->read_by_inmueble($inmueble->getNumero(), $inmueble->getCp(), $inmueble->getNombre_via(), $inmueble->getTipo_via());
    $daoResenyas->destruct();

    return $resenyas_inmueble;
}

function get_valoracion_usuario($nombre_usuario, $direccion_inmueble) {
    $dao = new daoResenyas();
    $resenya = $dao->read_by_usuario_inmueble($nombre_usuario, $direccion_inmueble[0], $direccion_inmueble[1], $direccion_inmueble[2], $direccion_inmueble[3]);
    $dao->destruct();

    return $resenya->getValoracion();
}

function get_valoraciones_inmueble($direccion_inmueble) {
    $dao = new daoResenyas();
    $resenyas = $dao->read_by_inmueble($direccion_inmueble[0], $direccion_inmueble[1], $direccion_inmueble[2], $direccion_inmueble[3]);
    $dao->destruct();
    $media_valoraciones = 0;

    for ($i = 0; $i < sizeof($resenyas); $i++) {
        $media_valoraciones = $resenyas[$i]->getValoracion();
    }

    $media_valoraciones = $media_valoraciones / sizeof($resenyas);

    return $media_valoraciones;
}

function set_valoracion($nombre_usuario, $direccion_inmueble, $puntuacion) {
    $objResenyas = new Resenya();
    $dao = new daoResenyas();
    $objResenyas->setCp($direccion_inmueble[0]);
    $objResenyas->setDescripcion("l");
    $objResenyas->setFecha_resenya($fecha_resenya);
    $objResenyas->setId_resenya(null);
    $objResenyas->setNombre_usuario($nombre_usuario);
    $objResenyas->setNombre_via($direccion_inmueble[1]);
    $objResenyas->setNumero($direccion_inmueble[3]);
    $objResenyas->setTipo_via($direccion_inmueble[2]);
    $objResenyas->setValoracion($puntuacion);
    $dao->escribirResenyas($objResenyas);
    $dao->destruct();
}

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
        $daoResenya = new daoResenyas();

        $insertOk = $daoresenya->escribirResenyas($resenya1);
        $daoResenya->destruct();
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
    if ($_POST["btonEliminar"]) {


        if ($_POST["txtDescripcion"]) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtDescripcion"] = "Debe de rellenar el campo descripcion";
        }
        if ($_POST["txtValoracion"]) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtValoracion"] = "Debe de rellenar el campo valoracion";
        }
    }
    if ($_SESSION["validacion"]) {
        $resenya2 = new Resenyamodel();
        $resenya2->setDescripcion($_POST["txtDescripcion"]);
        $resenya2->setValoracion($_POST["txtValoracion"]);

        $daoResenya = new daoResenyas();
        $deleteOk = $daoResenya->eliminarResenyas($resenya2);
        $daoResenya->destruct();
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

function modificarResenya() {
    if ($_POST["btonModificar"]) {
        if ($_POST["txtDescripcion"]) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtDescripcion"] = "debe completar el campo descripción.";
        }
        if ($_POST["txtValoracion"]) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtValoracion"] = "Debe de rellenar el campo valoracion";
        }
    } elseif ($_POST["btonCancelar"]) {
        $_SESSION["cancelado"] = true;
        $_SESSION["errores"]["msj"] = "ha cancelado la operación.";
    } else {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["msj"] = "Petición ajena al sistema.";
    }
    if ($_SESSION["validacion"]) {
        $resenya1 = new ResenyaModel();
        $resenya1->setDescripcion($_POST["txtDescripcion"]);
        $resenya1->setValoracion($_POST["txtValoracion"]);

        $daoResenya = new daoResenyas();
        $modifyOk = $daoResenya->modificarResenyas($resenya1);
        $daoResenya->destruct();
        if (!$modifyOk) {
            $_SESSION["errores"]["modifyOk"] = "No se ha modificado correctamente";
        }
        if ($_SESSION["validacion"] || $_SESSION["cancelado"]) {
            header('Location: ../Vistas/Inmuebles.php'); //modificacion cancelada vuelve al formulario 
        } else {
            header('Location: ../Vistas/Inmuebles.php');
        }
    }
}

function listarResenyas() {
    $daoResenyas = new daoResenyas();
    $resenyas = $daoResenyas->listarResenyas();
    $daoResenya->destruct();
    return $resenyas;
}

function leerResenyasbyUsuarios() {
    $user = new UsuarioModel();
    $daoResenyas = new daoResenyas();
    $resenyas_usuario = $daoResenyas->read_by_user($user);
    $daoResenya->destruct();
    return $resenyas_usuario;
}
