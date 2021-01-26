<?php

include_once '../DAO/daoBusqueda.php';
include_once '../Controladores/AnunciosController.php';
include_once '../Controladores/busquedaController.php';
include_once '../Modelos/AnunciosModel.php';



if (isset($_POST['aplicar_filtros'])) {
    $num_banyos = $_POST['num_banyos'];
    $tipo_inmueble = $_POST['tipo_inmueble'];
    $tipo_oferta = $_POST['tipo_oferta'];
    $precio_max = $_POST['precio_max'];
    $num_hab = $_POST['num_hab'];
    $m2 = $_POST['m2'];
    $fecha = $_POST['fecha'];
    $dao = new daoBusqueda();
    $dao->crear_busqueda($num_banyos, $tipo_inmueble, $tipo_oferta, $precio_max, $num_hab, $m2, $fecha);
    $dao->destruct();
    mostrarVistaLista();
}

if (isset($_POST['lista'])) {
    mostrarVistaLista();
}
if (isset($_POST['cuadricula'])) {
    mostrarVistaCuadricula();
}

function mostrarVistaLista() {
    $dao = new daoanuncios();
    $array_anuncios = $dao->listar();
    $dao->destruct();
    for ($i = 0; $i < sizeof($array_anuncios); $i++) {
        echo '<tr>';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' . $array_anuncios[$i][1] . '</td>';
        echo '<td>' . $array_anuncios[$i][7] . '</td>';
        echo '<td>' . $array_anuncios[$i][8] . '</td>';
        echo '<td>' . '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $array_anuncios[$i][0] . '">'
        . '<button name="ver_detalle" id="ver_detalle" value="Ver detalle">Ver detalle</button></a></td>';
        echo '</tr>';
    }
}

function mostrarVistaCuadricula() {
    $dao = new daoanuncios();
    $array_anuncios = $dao->listar();
    $dao->destruct();
    for ($i = 0; $i < sizeof($array_anuncios); $i++) {
        echo '<tr>';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' . $array_anuncios[$i][7] . '</td>';
        echo '<form>';
        echo '<td>' . '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $array_anuncios[$i][0] . '"><button name="ver_detalle" id="ver_detalle" value="Ver detalle">Ver detalle</button></a>' . '</td>';
        echo '</form>';
        echo '</tr>';
    }
}

function get_ultimas_busquedas() {
    $dao = new daoBusqueda();
    $ultimas_busquedas = $dao->listar_busquedas();
    $dao->destruct();
    while ($fila = mysqli_fetch_row($ultimas_busquedas)) {
        $direccion = $fila[1] . $fila[2] . $fila[3] . $fila[4];
        //Buscamos en img/inmuebles/direccion y listamos la primera foto
            echo '<li>' . $ultimas_busquedas[7] . '</li>';
            echo '<li>' . $ultimas_busquedas[4] . '</li>';
            echo '<li>' . $ultimas_busquedas[5] . '</li>';
    }
}

function get_ultimas_busquedas_usuario() {
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    }
    if (isset($_SESSION['usuario_profesional'])) {
        $usuario = $_SESSION['usuario_profesional'];
    }
    $dao = new daoBusqueda();
    $ultimas_busquedas = $dao->listar_busquedas_usuario($usuario);
    $dao->destruct();
    if (mysqli_num_rows($ultimas_busquedas) > 0) {
        while (mysqli_fetch_array($ultimas_busquedas)) {
            echo '<li>' . $ultimas_busquedas['m2'] . '</li>';
            echo '<li>' . $ultimas_busquedas['num_banyos'] . '</li>';
            echo '<li>' . $ultimas_busquedas['precio_max'] . '</li>';
            echo '<li>' . $ultimas_busquedas['tipo_inmueble'] . '</li>';
            echo '<li>' . $ultimas_busquedas['tipo_oferta'] . '</li>';
        }
    }
}

function print_resultados_busqueda() {
    $barra_busqueda = $_POST["barra_busqueda"];
    $anuncios[] = anuncios_barra_busqueda($barra_busqueda);
    echo"<tr>"
    . "<th>Titulo<th>"
    . "<th>Fecha Publicacion<th>"
    . "<th>Publicado por<th>"
    . "<th>Direccion<th>";
    for ($i = 0; $i < siceof($anuncios); $i++) {

        echo "<td>" . $anuncios[$i]->getPrecio() . "</td>"
        . "<td>" . $anuncios[$i]->getTitulo() . "</td>"
        . "<td>" . $anuncios[$i]->getFecha_anuncio() . "</td>"
        . "<td>" . $anuncios[$i]->getNombre_usuario_publica() . "</td>"
        . "<td>" . $anuncios[$i]->getNombre_via() . " "
        . $anuncios[$i]->getNumero() . " "
        . $anuncios[$i]->getCp() . "</td>";
    }
    echo "</tr>";
}

function print_resultados_filtros() {
    $anuncios[] = anuncios_busqueda();
    echo"<tr>"
    . "<th>Titulo<th>"
    . "<th>Fecha Publicacion<th>"
    . "<th>Publicado por<th>"
    . "<th>Direccion<th>";
    for ($i = 0; $i < siceof($anuncios); $i++) {

        echo "<td>" . $anuncios[$i]->getPrecio() . "</td>"
        . "<td>" . $anuncios[$i]->getTitulo() . "</td>"
        . "<td>" . $anuncios[$i]->getFecha_anuncio() . "</td>"
        . "<td>" . $anuncios[$i]->getNombre_usuario_publica() . "</td>"
        . "<td>" . $anuncios[$i]->getNombre_via() . " "
        . $anuncios[$i]->getNumero() . " "
        . $anuncios[$i]->getCp() . "</td>";
    }
    echo "</tr>";
}

function listar_busquedas_usuario() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }

    $dao = new daoBusqueda();
    $busquedas_usuario = $dao->listar_busquedas_usuario($nombre_usuario);
    $dao->destruct();
    return $busquedas_usuario;
}
