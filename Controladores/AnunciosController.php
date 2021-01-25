<?php

include_once '../Modelos/UsuarioModel.php';
include_once '../Modelos/AnunciosModel.php';
include_once '../DAO/daoanuncios.php';
include_once '../Modelos/InmueblesModel.php';
include_once '../Controladores/InmueblesController.php';
include_once '../DAO/daoInmuebles.php';

//FALTA INSERTAR ANUNCIOS
//funcion eliminar anuncios
$_SESSION["errores"] = "";
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores

$_SESSION["cancelado"] = false;

//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false
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
    if ($_POST["btonmodificar"]) {
        if (empty($_POST["txtPrecio"])) {
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
        $anuncio1 = new AnunciosModel();

        $anuncio1->setPrecio($_POST["txtPrecio"]);
        $anuncio1->setDireccion($_POST["txtDireccion"]);

         $daoanuncios = new daoAnuncios();
        $modifyOk = $daoanuncios->modificar($anuncio1);
        if (!$modifyOk) {
            $_SESSION["errores"]["modifyOk"] = "No se ha modificado correctamente";
        }

        if ($_SESSION["validacion"] || $_SESSION["cancelado"]) {

            header('Location: ../Vistas/perfil.php');
        } else {
            header('Location: ../Vistas/perfil.php'); //mensajes de errores
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

function anuncios_barra_busqueda($barra_busqueda) {
    $all_anuncios = listAllAnuncios();
    $anuncios = [];
    while (mysqli_fetch_array($all_anuncios)) {
        for ($i = 0; $i < sizeof($all_anuncios); $i++) {
            if ($all_anuncios[i] == $barra_busqueda) {
                $anuncio_aux = new Anuncio();
                $anuncio_aux->setId_anuncio($all_anuncios[0]);
                $anuncio_aux->setNombre_via($all_anuncios[1]);
                $anuncio_aux->setTipo_via($all_anuncios[2]);
                $anuncio_aux->setCp($all_anuncios[3]);
                $anuncio_aux->setNumero($all_anuncios[4]);
                $anuncio_aux->setNombre_usuario_publica($all_anuncios[5]);
                $anuncio_aux->setNombre_usuario_anuncio($all_anuncios[6]);
                $anuncio_aux->setPrecio($all_anuncios[7]);
                $anuncio_aux->setFecha_anuncio($all_anuncios[8]);
                $anuncios[] = $anuncio_aux;
            }
        }
    }

    return $anuncios;
}

function getFiltros() {
    $filtros = [];
    if (isset($_GET["num_banyos"])) {
        $filtros[] = $_GET["num_banyos"];
    } else {
        $filtros[] = "notset";
    }

    if (isset($_GET["tipo_inmueble"])) {
        $filtros[] = $_GET["tipo_inmueble"];
    } else {
        $filtros[] = "notset";
    }

    if (isset($_GET["tipo_oferta"])) {
        $filtros[] = $_GET["tipo_oferta"];
    } else {
        $filtros[] = "notset";
    }

    if (isset($_GET["precio_max"])) {
        $filtros[] = $_GET["precio_max"];
    } else {
        $filtros[] = "notset";
    }

    if (isset($_GET["num_hab"])) {
        $filtros[] = $_GET["num_hab"];
    } else {
        $filtros[] = "notset";
    }

    if (isset($_GET["m2"])) {
        $filtros[] = $_GET["m2"];
    } else {
        $filtros[] = "notset";
    }

    if (isset($_GET["fecha"])) {
        $filtros[] = $_GET["fecha"];
    } else {
        $filtros[] = "notset";
    }

    return $filtros;
}

function probarFiltros($filtros, $anuncio) {
    $r = false;
    $inmueble = getInmuebleByAnuncio($anuncio);

    if ($filtros[0] == "notset" || $filtros[0] == $inmueble->getNum_banyos()) {
        if ($filtros[1] == "notset" || $filtros[1] == $inmueble->getTipo()) {
            //if ($filtros[2] == "notset" || $filtros[2] == $anuncio->getTipo()) {
            if ($filtros[3] == "notset" || $filtros[3] < $anuncio->getPrecio()) {
                //if ($filtros[4] == "notset" || $filtros[4] == $inmueble->getNumeroHabitaciones()) {
                if ($filtros[5] == "notset" || $filtros[5] == $inmueble->getMetros()) {
                    if ($filtros[6] == "notset" || $filtros[6] > $anuncio->getFecha_anuncio()) {
                        $r = true;
                    }
                }
                //}
            }
            //}
        }
    }

    return $r;
}

function anuncios_busqueda() {
    $filtros = getFiltros();
    $all_anuncios = listAllAnuncios();
    $anuncios = [];
    while (mysqli_fetch_array($all_anuncios)) {
        for ($i = 0; $i < sizeof($all_anuncios); $i++) {
            if (probarFiltros($filtros, $all_anuncios)) {
                $anuncio_aux = new Anuncio();
                $anuncio_aux->setId_anuncio($all_anuncios[0]);
                $anuncio_aux->setNombre_via($all_anuncios[1]);
                $anuncio_aux->setTipo_via($all_anuncios[2]);
                $anuncio_aux->setCp($all_anuncios[3]);
                $anuncio_aux->setNumero($all_anuncios[4]);
                $anuncio_aux->setNombre_usuario_publica($all_anuncios[5]);
                $anuncio_aux->setNombre_usuario_anuncio($all_anuncios[6]);
                $anuncio_aux->setPrecio($all_anuncios[7]);
                $anuncio_aux->setFecha_anuncio($all_anuncios[8]);
                $anuncios[] = $anuncio_aux;
            }
        }
    }

    return $anuncios;
}
