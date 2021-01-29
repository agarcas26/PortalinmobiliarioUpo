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
            $img = $inmueble->getFotos();   //Conseguir fotos inmueble
        } else {
            $img = "../img/productDefaultImage.jpg";
        }
//        Características inmuebles
//        $caracteristicas = listarCaracteristicasProducto($idProducto);

        if ($usuario) {
            $valoracion_usuario = get_valoracion_usuario($usuario, $id_inmueble);
        }
        $media_valoraciones = get_valoraciones_inmueble($id_inmueble);
//        $puntuacion = obtenerPuntuacionProducto($idProducto);
//        $categorias = listarCategorias();
    } else {
        $error = "Este inmueble no está disponible temporalmente";
    }
} else {
    //header("Location: principal.php");
}

//Método para enviar una nueva valoración de un producto
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

    //header("location:producto.php?idProducto=$idProducto");
} else if (isset($_GET["editarValoracion"])) 
{//Método que controla la actualización de la opinión de un cliente sobre un producto
    $id_inmueble = preg_split(" - ", $_GET["id_inmueble"]);
    $puntuacion_nueva = filter_var($_GET["puntuacion"], FILTER_SANITIZE_NUMBER_INT);
    $valoracion_nueva = trim(filter_var($_GET["valoracion"], FILTER_SANITIZE_STRING));

    set_valoracion($usuario, $id_inmueble, $puntuacion_nueva);
    //header("location:anuncio.php?id_anuncio=$id_anuncio");
} else if (isset($_GET["eliminarValoracion"])) {
//Eliminación de la valoración de un producto
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    } else {
        $usuario = $_SESSION['usuario_profesional'];
    }

    $id_inmueble = preg_split(" - ", $_GET["id_inmueble"]);

    eliminarValoracion($usuario, $id_inmueble);
    //header("location:anuncio.php?id_anuncio=$id_anuncio");
}
/*
 * Esta función muestra la media de las valoraciones en formato de estrellas
 */

function mostrarValorar() {
    echo '<form id="formValoracionInmueble" class="md-form mr-auto mb-4" method="GET">'
    . '<textarea class="form-control" name="valoracion" placeholder="Valora el inmueble" required></textarea>';

    for ($index = 1; $index <= 5; $index++) {
        echo "<span id = 'puntuacion-$index' class = 'review fa fa-star unchecked'></span>";
    }

    echo '<input id="puntuacion" type="number" name="puntuacion" hidden>'
    . '<input name="id_inmueble" type="number" value="' . $_GET["id_inmueble"] . '" hidden>'
    . '<br>'
    . '<input id="btn-coment" type="submit" name="enviarValoracion" value="Enviar" class="btn btn-success">'
    . '</form>';
}
