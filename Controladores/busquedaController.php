<?php

include_once '../DAO/daoBusqueda.php';
include_once '../Controladores/AnunciosController.php';
include_once '../Controladores/busquedaController.php';
include_once '../Modelos/AnunciosModel.php';



if (isset($_POST['aplicar_filtros'])) {
    
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario = ($_SESSION['usuario_particular']);
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario = ($_SESSION['usuario_rofesional']);
    }
    
    $num_banyos = $_POST['num_banyos'];
    $tipo_inmueble = $_POST['tipo_inmueble'];
    $tipo_oferta = $_POST['tipo_oferta'];
    $precio_max = $_POST['precio_max'];
    $num_hab = $_POST['num_hab'];
    $m2 = $_POST['m2'];
    $fecha = $_POST['fecha'];

    $dao = new daoBusqueda();
    $dao->crear_busqueda($nombre_usuario, $num_banyos, $tipo_inmueble, $tipo_oferta, $precio_max, $num_hab, $m2);
    $dao->destruct();
    
    header("Location: ../Vistas/busqueda.php");
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

function mostrarVistaLista() {
    $anuncios = anuncios_busqueda();
    for ($i = 0; $i < sizeof($anuncios); $i++) {
        echo '<tr>';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' . $anuncios[$i]->getTipo_via() . '</td>';
        echo '<td>' . $anuncios[$i]->getNombre_via() . '</td>';
        echo '<td>' . $anuncios[$i]->getPrecio() . '</td>';
        echo '<td>' . $anuncios[$i]->getFecha_anuncio() . '</td>';
        echo '<td>' . '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $anuncios[$i]->getId_anuncio() . '">'
        . '  <button name="ver_detalle" id="ver_detalle" value="Ver detalle">Ver detalle</button></a></td>'
        . '<td>' . '<a href="../Vistas/pago.php?id_anuncio=' . $anuncios[$i]->getId_anuncio() . '">'
        . '  <button name="transaccion" id="transaccion" value="transaccion">¡Lo quiero!</button></a></td>';
        echo '</tr>';
    }
    
}

function mostrarVistaCuadricula() {
    $anuncios = anuncios_busqueda();
    for ($i = 0; $i < sizeof($anuncios); $i++) {
        echo '<tr>';
        echo '<td>' . '</td>';    //Insertar imágenes
        echo '<td>' . $anuncios[$i]->getPrecio() . '</td>';
        echo '<form>';
        echo '<td>' . '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $anuncios[$i]->getId_anuncio() . '"><button name="ver_detalle" id="ver_detalle" value="Ver detalle">Ver detalle</button></a>' . '</td>';
        echo '</form>';
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

