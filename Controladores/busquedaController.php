<?php

include_once '../DAO/daoBusqueda.php';
include_once '../Controladores/AnunciosController.php';
include_once '../Modelos/AnunciosModel.php';



if (isset($_POST['aplicar_filtros'])) {
    $num_banyos = $_POST['num_banyos'];
    $tipo_inmueble = $_POST['tipo_inmueble'];
    $tipo_oferta = $_POST['tipo_oferta'];
    $precio_max = $_POST['precio_max'];
    $num_hab = $_POST['num_hab'];
    $m2 = $_POST['m2'];
    $fecha = $_POST['fecha'];
    $dao = new daoBusqueda;
    $dao->crear_busqueda($num_banyos, $tipo_inmueble, $tipo_oferta, $precio_max, $num_hab, $m2, $fecha);

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
    for ($i = 0; $i < sizeof($array_anuncios); $i++) {
        echo '<tr>';
        echo '<a href="../Vistas/inmueble.php">';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' .  $array_anuncios[i][1]. '</td>';
        echo '<td>' .  $array_anuncios[i][7]. '</td>';
        echo '<td>' .  $array_anuncios[i][8]. '</td>';
        echo '</a>';
        echo '</tr>';
    }
}

function mostrarVistaCuadricula() {    
    $dao = new daoanuncios();
    $array_anuncios = $dao->listar();
    for ($i = 0; $i < sizeof($array_anuncios); $i++) {        
        echo '<tr>';
        echo '<a href="../Vistas/inmueble.php">';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' .  $array_anuncios[i][7]. '</td>';
        echo '</a>';
        echo '</tr>';
        
    }
}

function get_ultimas_busquedas() {
    $dao = new daoBusqueda();
    $ultimas_busquedas = $dao->listar_busquedas();
    while (mysqli_fetch_row($ultimas_busquedas)) {
        $direccion = $ultimas_busquedas[1] . $ultimas_busquedas[2] . $ultimas_busquedas[3] . $ultimas_busquedas[4];
        //Buscamos en img/inmuebles/direccion y listamos la primera foto
        echo '<li>' .  '</li>';
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
    while (mysqli_fetch_row($ultimas_busquedas)) {
        echo '<li>' . '</li>';
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
