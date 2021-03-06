<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Controladores/InmueblesController.php';
include_once '../Controladores/ResenyasController.php';

if (isset($_GET["id_inmueble"])) {

    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }

    $inmueble = getInmuebleByDireccion($_GET["id_inmueble"]);
    $id_inmueble = preg_split("-", $_GET["id_inmueble"]);

    if ($inmueble) {
        if (file_exists($inmueble->getFotos())) {
            $img = $inmueble->getFotos();  
        } else {
            $img = "../img/productDefaultImage.jpg";
        }


        if ($usuario) {
            $valoracion_usuario = get_valoracion_usuario($usuario, $id_inmueble);
        }
        $media_valoraciones = get_valoraciones_inmueble($id_inmueble);

    } else {
        $error = "Este inmueble no está disponible temporalmente";
    }
} else {
  ;
}

if (isset($_GET["enviarValoracion"])) {

    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }

    $id_inmueble = preg_split(" - ", $_GET["id_inmueble"]);

    $puntuacion_nueva = filter_var($_GET["puntuacion"], FILTER_SANITIZE_NUMBER_INT);
    $valoracion_nueva = trim(filter_var($_GET["valoracion"], FILTER_SANITIZE_STRING));

    set_valoracion($usuario, $id_inmueble, $puntuacion_nueva);

   
} else if (isset($_GET["editarValoracion"])) 
{
    $id_inmueble = preg_split(" - ", $_GET["id_inmueble"]);
    $puntuacion_nueva = filter_var($_GET["puntuacion"], FILTER_SANITIZE_NUMBER_INT);
    $valoracion_nueva = trim(filter_var($_GET["valoracion"], FILTER_SANITIZE_STRING));

    set_valoracion($usuario, $id_inmueble, $puntuacion_nueva);
  
} else if (isset($_GET["eliminarValoracion"])) {

    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }

    $id_inmueble = preg_split(" - ", $_GET["id_inmueble"]);

    eliminarValoracion($usuario, $id_inmueble);
 
}


function mostrarValorar($id_anuncio) {
    echo '<form action="../Controladores/ResenyasController.php" id="formValoracionInmueble" class="md-form mr-auto mb-4" method="POST">'
    . '<textarea class="form-control" name="valoracion" placeholder="Valora el inmueble" required></textarea>';

     echo '<span class="estrellado-val" id="valorar">'
                . '<img class="puntuacion-st" id="1" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion-st" id="2" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion-st" id="3" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion-st" id="4" class="unchecked" src="../img/unchecked.png">'
                . '<img class="puntuacion-st" id="5" class="unchecked" src="../img/unchecked.png">'. '</span>';

    echo '<input id="input_puntuacion" type="number" name="puntuacion" value="0"  hidden>'
    . '<input name="id_anuncio" type="number" value="' . $id_anuncio . '" hidden>'
    . '<br>'
    . '<input hidden name="id_anuncio" value="'.$id_anuncio.'">'       
    . '<input id="btn-coment" type="submit" name="enviarValoracion" value="Enviar" class="btn btn-success">'
    . '</form>';
}
