<?php

include_once '../DAO/daoBusqueda.php';
include_once '../Controladores/AnunciosController.php';
include_once '../Controladores/AnunciosController.php';
include_once '../Modelos/AnunciosModel.php';



if (isset($_GET['aplicar_filtros'])) {
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = ($_SESSION['usuario_particular']);
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = ($_SESSION['usuario_rofesional']);
    }

    $dao = new daoBusqueda();
    $dao->crear_busqueda($nombre_usuario, $filtros[0], $filtros[1], $filtros[2], $filtros[3], $filtros[4], $filtros[5]);
    $dao->destruct();

    $filtros = getFiltros();
    $anuncios = anuncios_busqueda($filtros);

    mostrarVistaLista($anuncios);

    header("Location: ../Vistas/busqueda.php");
}

if (isset($_POST['lista'])) {
    $filtros = getFiltros();
    $anuncios = anuncios_busqueda($filtros);

    mostrarVistaLista($anuncios);
}

if (isset($_POST['cuadricula'])) {
    $filtros = getFiltros();
    $anuncios = anuncios_busqueda($filtros);

    mostrarVistaCuadricula($anuncios);
}

if (isset($_GET["id_busqueda"])) {
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }

    $dao = new daoBusqueda();
    $busquedas_usuario = $dao->eliminar_alerta_usuario($_GET["id_busqueda"]);
    $dao->destruct();
    unset($_GET["id_busqueda"]);
    header("Location: ../Vistas/mis_alertas.php");
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

function mostrarVistaLista($anuncios) {
    for ($i = 0; $i < sizeof($anuncios); $i++) {
        echo '<tr>';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' . $anuncios[$i]->getTipo_via() . '</td>';
        echo '<td>' . $anuncios[$i]->getNombre_via() . '</td>';
        echo '<td>' . $anuncios[$i]->getPrecio() . '</td>';
        echo '<td>' . $anuncios[$i]->getFecha_anuncio() . '</td>';
        echo '<td>' . '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $anuncios[$i]->getId_anuncio() . '">'
        . '  <button name="ver_detalle" id="ver_detalle" value="Ver detalle">Ver detalle</button></a></td>';
        if (!isset($_SESSION['usuario_profesional'])) {
            echo '<td>' . '<a href="../Vistas/pago.php?id_anuncio=' . $anuncios[$i]->getId_anuncio() . '">'
            . '  <button name="transaccion" id="transaccion" value="transaccion">¡Lo quiero!</button></a></td>';
        }
        echo '</tr>';
    }
}

function mostrarVistaCuadricula($anuncios) {
    for ($i = 0; $i < sizeof($anuncios); $i++) {
        echo '<tr>';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' . $anuncios[$i]->getPrecio() . '</td>';
        echo '<td>'
        . '<a href="../Vistas/detalle_anuncio.php?id_anuncio='
        . $anuncios[$i]->getId_anuncio()
        . '"><button name="ver_detalle" id="ver_detalle" value="Ver detalle">Ver detalle</button></a>'
        . '</td>';
        echo '</tr>';
    }
}

function get_ultimas_busquedas() {
    $dao = new daoBusqueda();
    $ultimas_busquedas = $dao->listar_busquedas();
    $dao->destruct();

    if (mysqli_num_rows($ultimas_busquedas) > 0) {
        while ($fila_busqueda = mysqli_fetch_array($ultimas_busquedas)) {
            echo '<tr>';
            echo '<td class="td"></td>';       //imagenes
            echo '</tr>';
            echo '<tr>';
            echo '<td class="td">' . $fila_busqueda[8] . ' m2      </td>';
            echo '<td class="td">' . $fila_busqueda[2] . ' baños       </td>';
            echo '<td class="td">' . $fila_busqueda[7] . '€        </td>';
            echo '<td class="td">Tipo inmueble: ' . $fila_busqueda[4] . '      </td>';
            echo '<td class="td">Tipo oferta: ' . $fila_busqueda[5] . '        </td>';
            echo '</tr>';
        }
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
        $i = 0;
        while ($fila = mysqli_fetch_array($ultimas_busquedas) and $i < 3) {
            echo '<tr>';
            echo '<td class="td"></td>';       //imagenes
            echo '</tr>';
            echo '<tr>';
            echo '<td class="td">' . $fila[8] . ' m2      </td>';
            echo '<td class="td">' . $fila[2] . ' baños       </td>';
            echo '<td class="td">' . $fila[7] . '€        </td>';
            echo '<td class="td">Tipo inmueble: ' . $fila[4] . '      </td>';
            echo '<td class="td">Tipo oferta: ' . $fila[5] . '        </td>';
            echo '</tr>';

            $i = $i + 1;
        }
    }
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

function listar_alertas_usuario() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = $_SESSION['usuario_profesional'];
    }

    $dao = new daoBusqueda();
    $busquedas_usuario = $dao->listar_alertas_usuario($nombre_usuario);
    $dao->destruct();
    return $busquedas_usuario;
}

//function print_resultados_busqueda() {
//    $barra_busqueda = $_POST["barra_busqueda"];
//    $anuncios[] = anuncios_barra_busqueda($barra_busqueda);
//    echo"<tr>"
//    . "<th>Titulo<th>"
//    . "<th>Fecha Publicacion<th>"
//    . "<th>Publicado por<th>"
//    . "<th>Direccion<th>";
//    for ($i = 0; $i < siceof($anuncios); $i++) {
//        echo "<td>" . $anuncios[$i]->getPrecio() . "</td>"
//        . "<td>" . $anuncios[$i]->getTitulo() . "</td>"
//        . "<td>" . $anuncios[$i]->getFecha_anuncio() . "</td>"
//        . "<td>" . $anuncios[$i]->getNombre_usuario_publica() . "</td>"
//        . "<td>" . $anuncios[$i]->getNombre_via() . " "
//        . $anuncios[$i]->getNumero() . " "
//        . $anuncios[$i]->getCp() . "</td>";
//    }
//    echo "</tr>";
//}

//function print_resultados_filtros() {
//    $anuncios[] = anuncios_busqueda();
//    echo"<tr>"
//    . "<th>Titulo<th>"
//    . "<th>Fecha Publicacion<th>"
//    . "<th>Publicado por<th>"
//    . "<th>Direccion<th>";
//    for ($i = 0; $i < siceof($anuncios); $i++) {
//        echo "<td>" . $anuncios[$i]->getPrecio() . "</td>"
//        . "<td>" . $anuncios[$i]->getTitulo() . "</td>"
//        . "<td>" . $anuncios[$i]->getFecha_anuncio() . "</td>"
//        . "<td>" . $anuncios[$i]->getNombre_usuario_publica() . "</td>"
//        . "<td>" . $anuncios[$i]->getNombre_via() . " "
//        . $anuncios[$i]->getNumero() . " "
//        . $anuncios[$i]->getCp() . "</td>";
//    }
//    echo "</tr>";
//}

