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

if(isset($_POST["enviarValoracion"])){
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } else {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }
    $puntuacion=$_POST["puntuacion"];
    $descripcion=$_POST["valoracion"];
    
    $anuncio= readAnuncio($_POST["id_anuncio"]);
    
    $direccion_inmueble[] = $anuncio->getNumero();
    $direccion_inmueble[] = $anuncio->getCp();
    $direccion_inmueble[] = $anuncio->getNombre_via();
    $direccion_inmueble[] = $anuncio->getTipo_via();
    
    set_valoracion($nombre_usuario, $direccion_inmueble, $puntuacion, $descripcion);
    
    header("Location: ../Vistas/detalle_anuncio.php?id_anuncio=".$_POST["id_anuncio"]);
}

function resenyas_anuncio($id_anuncio) {
    $anuncio = readAnuncio($id_anuncio);
    $inmueble = getInmuebleByAnuncio($anuncio);

    $resenyas_inmueble = get_resenyas_inmueble($inmueble);
    for ($i = 0; $i < sizeof($resenyas_inmueble); $i++) {
        echo '<table id="datos_visa" class="display table-bordered" style="width:100%">';
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

function set_valoracion($nombre_usuario, $direccion_inmueble, $puntuacion, $descripcion) {
    $objResenyas = new Resenya();
    $dao = new daoResenyas();
    $objResenyas->setCp($direccion_inmueble[0]);
    $objResenyas->setDescripcion($descripcion);
    $objResenyas->setFecha_resenya("CURRENT_DATE");
    $objResenyas->setId_resenya(null);
    $objResenyas->setNombre_usuario($nombre_usuario);
    $objResenyas->setNombre_via($direccion_inmueble[1]);
    $objResenyas->setNumero($direccion_inmueble[3]);
    $objResenyas->setTipo_via($direccion_inmueble[2]);
    $objResenyas->setValoracion($puntuacion);
    $dao->escribirResenyas($objResenyas);
    $dao->destruct();
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

