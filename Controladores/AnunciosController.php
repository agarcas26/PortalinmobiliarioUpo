<?php

include_once '../Modelos/UsuarioModel.php';
include_once '../Modelos/AnunciosModel.php';
include_once '../DAO/daoAnuncios.php';
include_once '../Modelos/InmueblesModel.php';
include_once '../Controladores/InmueblesController.php';
include_once '../Controladores/busquedaController.php';
include_once '../DAO/daoInmuebles.php';

//FALTA INSERTAR ANUNCIOS
//funcion eliminar anuncios
$_SESSION["errores"] = "";
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores

$_SESSION["cancelado"] = false;

if (isset($_POST["guardar"])) {
    if (isset($_POST['inmuebles_usuario'])) {
        if (isset($_POST['precio']) && isset($_POST['tipo_oferta'])) {
            insertAnuncio($_POST['inmuebles_usuario']);
            // header("Location: ../Vistas/mis_anuncios.php");
        }
    }
}

function ver_detalle($id_anuncio) {
    $daoAnuncios = new daoAnuncios();
    $id_anuncio = $_GET['id_anuncio'];
    $anuncio = readAnuncio($id_anuncio);
    $tipo_anuncio = $daoAnuncios->get_tipo_anuncio($id_anuncio);
    $daoAnuncios->destruct();
    $inmueble_anunciado = getInmuebleByAnuncio($anuncio);

    mostrar_detalle_anuncio();
    header("Location: ../Vistas/detalle_anuncio.php");
}

function mostrar_detalle_anuncio($id_anuncio) {
    $dao = new daoAnuncios();
    $array_anuncios = $dao->listar();
    $dao->destruct();
    while ($fila = mysqli_fetch_array($array_anuncios)) {
        if ($id_anuncio == $fila[0]) {
            echo '<tr>'
            . '<td></td>' //FOTOS
            . '</tr>'
            . '<tr>'
            . '<td><h3>Titulo:' . $fila[9] . '</h3></td>'
            . '</tr>'
            . '<tr>'
            . '<td>Precio:' . $fila[7] . '</td>'
            . '</tr>'
            . '<tr>'
            . '<td>CP:' . $fila[4] . '</td>'
            . '</tr>'
            . '<tr>'
            . '<td>Fecha:' . $fila[8] . '</td>'
            . '</tr>'
            . '<tr>'
            . '<td>Anunciante:' . $fila[5] . '</td>'
            . '</tr>'
            . '<tr>'
            . '<td>Direccion: ' . $fila[2] . ' ' . $fila[1] . ' numero ' . $fila[4] . '</td>'
            . '</tr>'
            . '<tr>';
            if (!isset($_SESSION['usuario_profesional'])) {
                echo '<td>' . '<a href="../Vistas/pago.php?id_anuncio=' . $fila[0] . '">'
                . '<button name="transaccion" id="transaccion" value="transaccion">¡Lo quiero!</button></a></td>';
            }
            echo '</tr>';
        }
    }
}

function mostrar_info_anuncio($id_anuncio) {
    $anuncio = listAllAnuncios();
    while ($fila = mysqli_fetch_array($anuncio)) {
        if ($id_anuncio == $fila[0]) {
            echo '<h5>Titulo:' . $fila[9] . '</h5><br>'
            . '<Precio:' . $fila[7] . '<br>'
            . 'CP:' . $fila[4] . '<br>'
            . 'Fecha:' . $fila[8] . '<br>'
            . 'Anunciante:' . $fila[5] . '<br>'
            . 'Direccion: ' . $fila[2] . ' ' . $fila[1] . ' numero ' . $fila[4];
        }
    }
}

function getPrecio($id_anuncio) {
    $dao = new daoAnuncios();
    $array_anuncios = $dao->listar();
    $dao->destruct();
    while ($fila = mysqli_fetch_array($array_anuncios)) {
        if ($id_anuncio == $fila[0]) {
            return $fila[7];
        }
    }
}

function insertAnuncio($direccion) {
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }
    $direccion = preg_split('/-/', $direccion);
    $anuncio1 = new Anuncio();
    $anuncio1->setPrecio($_POST["precio"]);
    $anuncio1->setTitulo($_POST["txtTitulo"]);
    $anuncio1->setFecha_anuncio("CURRENT_DATE");
    $anuncio1->setCp($direccion[3]);
    $anuncio1->setNombre_via($direccion[1]);
    $anuncio1->setNumero($direccion[2]);
    $anuncio1->setTipo_via($direccion[0]);
    $anuncio1->setNombre_usuario_publica($nombre_usuario_duenyos);
    $daoAnuncio = new daoAnuncios();
    $insertOk = $daoAnuncio->insertar($anuncio1);
}

function deleteAnuncio($idanuncio) {
    $anuncio1 = new modelo_anuncios();

    $anuncio1->setIdAnuncio($idanuncio);
    $daoAnuncio = new daoAnuncios();
    $deleteOk = $daoAnuncio->eliminar($anuncio1);
    $daoAnuncios->destruct();
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

        $daoAnuncios = new daoAnuncios();
        $modifyOk = $daoAnuncios->modificar($anuncio1);
        $daoAnuncios->destruct();
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
    $daoAnuncio = new daoAnuncios();
    $anuncio = $daoAnuncio->read($idAnuncio);
    $daoAnuncio->destruct();
    return $anuncio;
}

//funcion listar anuncios
function listAllAnuncios() {
    $daoAnuncios = new daoAnuncios();
    $anuncios = $daoAnuncios->listar();
    $daoAnuncios->destruct();
    return $anuncios;
}

function listar_anuncios_usuario() {
    $daoAnuncios = new daoAnuncios();
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    }
    if (isset($_SESSION['usuario_profesional'])) {
        $usuario = $_SESSION['usuario_profesional'];
    }
    $anuncios_usuario = $daoAnuncios->listar_anuncios_usuario($usuario);
    $daoAnuncios->destruct();
    if (mysqli_num_rows($anuncios_usuario) > 0) {
        while ($fila = mysqli_fetch_array($anuncios_usuario)) {
            echo '<table id="datos_visa" class="display table-bordered" style="width:100%">';
            echo '</tr><tr>';
            echo '<td>' . $fila[1] . " " . $fila[3] . " " . $fila[2] . '</td>';
            echo '</tr><tr>';
            echo '<td>' . $fila[8] . '</td>';
            echo '</tr><tr>';
            echo '<td>' . $fila[7] . '</td>';
            echo '</tr><tr>';
            echo '<td>';
            echo '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $fila[0] . '">'
            . '<input type="submit" name="ver_detalle" id="ver_detalle" value="Ver detalle" />'
            . '</td>'
            . '</a>';
            echo '</tr>';
            echo '</table>';
        }
    }
}

function vista_previa_anuncios() {
    $daoAnuncios = new daoAnuncios();
    $anuncios = $daoAnuncios->listar();
    $daoAnuncios->destruct();

    if (mysqli_num_rows($anuncios) > 0) {
        while ($fila = mysqli_fetch_array($anuncios)) {
            echo '<tr>';
            echo '<td>' . $fila[0] . " Dirección:   " . $fila[2] . " " . $fila[1] . '</td>';
            echo '<td>   Fecha de publicación:  ' . $fila[8] . '</td>';
            echo '<td>   Precio:  ' . $fila[7] . '</td>';
            echo '</tr>';
        }
    }
}

function ver_todos_los_anuncios() {
    $anuncios = listAllAnuncios();
    $i = 0;

    if (mysqli_num_rows($anuncios) > 0) {
        while (mysqli_fetch_array($anuncios)) {
            echo '<tr>';
            echo '<td><figure>' . $anuncios[14] . '</figure></td>';
            echo '<td>' . $anuncios[1] . " " . $anuncios[3] . " " . $anuncios[2] . '</td>';
            echo '<td>' . $anuncio[8] . '</td>';
            echo '<td>' . $anuncio[7] . '</td>';
            echo '<td>';
            echo '<a href="../Vistas/detalle_anuncio.php?id_anuncio=' . $anuncios[0] . '">'
            . '<input type="submit" name="ver_detalle" id="ver_detalle" value="Ver detalle" />'
            . '</td>'
            . '</a>';
            echo '</tr>';
            $i++;
        }
    }
}

function anuncios_barra_busqueda($barra_busqueda) {
    $all_anuncios = listAllAnuncios();
    $anuncios = [];
    while (mysqli_fetch_array($all_anuncios)) {
        for ($i = 0; $i < sizeof($all_anuncios); $i++) {
            for ($j = 0; $j < sizeof($barra_busqueda); $j++) {
                if ($all_anuncios[i] == $barra_busqueda[$j]) {
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
    }

    return $anuncios;
}

function probarFiltros($filtros, $anuncio) {
    $r = false;
    $inmueble = getInmuebleByAnuncio($anuncio);

    if ($filtros[0] == "notset" || $filtros[0] == $inmueble->getNum_banyos()) {
        if ($filtros[1] == "notset" || $filtros[1] == $inmueble->getTipo()) {
            if ($filtros[2] == "notset" || $filtros[2] == $anuncio->getTipo()) {
                if ($filtros[3] == "notset" || $filtros[3] < $anuncio->getPrecio()) {
                    if ($filtros[4] == "notset" || $filtros[4] == $inmueble->getNum_hab()) {
                        if ($filtros[5] == "notset" || $filtros[5] == $inmueble->getMetros()) {
                            if ($filtros[6] == "notset" || $filtros[6] > $anuncio->getFecha_anuncio()) {
                                $r = true;
                            }
                        }
                    }
                }
            }
        }
    }

    return $r;
}

function anuncios_busqueda($filtros) {
    $all_anuncios = listAllAnuncios();
    $anuncios = [];
    if (mysqli_num_rows($all_anuncios) > 0) {
        while ($anuncio = mysqli_fetch_array($all_anuncios)) {
            $anuncio_aux = new Anuncio();
            $anuncio_aux->setId_anuncio($anuncio[0]);
            $anuncio_aux->setNombre_via($anuncio[1]);
            $anuncio_aux->setTipo_via($anuncio[2]);
            $anuncio_aux->setCp($anuncio[3]);
            $anuncio_aux->setNumero($anuncio[4]);
            $anuncio_aux->setNombre_usuario_publica($anuncio[5]);
            $anuncio_aux->setNombre_usuario_anuncio($anuncio[6]);
            $anuncio_aux->setPrecio($anuncio[7]);
            $anuncio_aux->setFecha_anuncio($anuncio[8]);
            if (probarFiltros($filtros, $anuncio_aux)) {
                $anuncios[] = $anuncio_aux;
            }
        }
    }

    return $anuncios;
}
