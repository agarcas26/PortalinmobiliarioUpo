<?php

include_once '../DAO/daoInmuebles.php';
include_once '../Modelos/InmueblesModel.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";
$_SESSION["cancelado"] = false;
//direccion en caso de exito, sustituir vista.php por la vista correspondiente 
$url_exito = "../Vistas/inmueble.php";
//direccion en caso de error, por lo general será la vista del formulario que llamo
//a este controlador
$url_error = "../Vistas/alta_inmueble.php";

//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false

function getInmuebleByDireccion($direccion) {
    $direccion = preg_split("/-/", $direccion);

    $numero = $direccion[0];
    $cp = $direccion[1];
    $nombre_via = $direccion[2];
    $tipo_via = $direccion[3];

    $dao = new daoInmuebles();
    $aux = $dao->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
    $dao->destruct();

    $inmueble = new inmueble();
    for ($i = 0; $i < sizeof($aux); $i++) {
        $inmueble->setNumero($aux[$i]->getNumero());
        $inmueble->setCp($aux[$i]->getCp());
        $inmueble->setCocina($aux[$i]->getCocina());
        $inmueble->setFotos($aux[$i]->getFotos());
        $inmueble->setMetros($aux[$i]->getMetros());
        $inmueble->setNombre_localidad($aux[$i]->getNombre_localidad());
        $inmueble->setNombre_provincia($aux[$i]->getNombre_provincia());
        $inmueble->setNombre_usuario_duenyo($aux[$i]->getNombre_usuario_duenyos());
        $inmueble->setNombre_via($aux[$i]->getNombre_via());
        $inmueble->setNum_banyos($aux[$i]->getNum_banyos());
        $inmueble->setNum_hab($aux[$i]->getNum_hab());
        $inmueble->setPlanta($aux[$i]->getPlanta());
        $inmueble->setNumero_plantas($aux[$i]->getNumero_plantas());
    }


    return $inmueble;
}

function insertInmueble() {
    if ($_POST["btonInsertar"]) {
        if (empty($_POST["txtNumero"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNumero"] = "Debe de completar el campo numero.";
        }
        if (empty($_POST["txtCp"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtCp"] = "Debe de completar el campo cp.";
        }
        if (empty($_POST["txtNombre_via"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNombre_via"] = "Debe de completar el campo nombre via.";
        }if (empty($_POST["txtTipo_via"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtTipo_via"] = "Debe de completar el campo tipo de via.";
        }if (empty($_POST["txtNombre_localidad"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNombre_localidad"] = "Debe de completar el nombre de la localidad.";
        }if (empty($_POST["txtNombre_provincia"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNombre_provincia"] = "Debe de completar el nombre de la provincia.";
        }
        if (empty($_POST["txtNum_banyos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_banyos"] = "Debe de completar el campo numero de baños.";
        }
        if (empty($_POST["txtNum_habitaciones"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_habitaciones"] = "Debe de completar el campo numero de habitaciones.";
        }
        if (empty($_POST["txtCocina"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtCocina"] = "Debe de completar el campo cocina.";
        }
        if (empty($_POST["txtNum_Planta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_Planta"] = "Debe de completar el campo numero de plantas.";
        }
        if (empty($_POST["txtPlanta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtPlanta"] = "Debe de completar el campo planta.";
        }
        if (empty($_POST["txtMetros"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtMetros"] = "Debe de completar el campo metros.";
        }
        if (empty($_POST["txtTipo_Inmueble"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtTipo_Inmueble"] = "Debe de completar el campo tipo de inmueble.";
        }
//    if (empty($_POST["fileFotos"])) {
//        $_SESSION["validacion"] = false;
//        $_SESSION["errores"]["fileFotos"] = "Debe añadir una imagen del inmueble.";
//    }
    }
    if ($_SESSION["validacion"]) {

        $inmueble1 = new inmueble();
        $inmueble1->setNumero($_POST["txtNumero"]);
        $inmueble1->setCp($_POST["txtCp"]);
        $inmueble1->setNombre_via($_POST["txtNombre_via"]);
        $inmueble1->setTipo_via($_POST["txtTipo_via"]);
        $inmueble1->setNombre_localidad($_POST["txtNombre_localidad"]);
        $inmueble1->setNombre_provincia($_POST["txtNombre_provincia"]);
        $inmueble1->setNum_banyos($_POST["txtNum_banyos"]);
        $inmueble1->setNum_hab($_POST["txtNum_habitaciones"]);
        $inmueble1->setCocina($_POST["txtCocina"]);
        $inmueble1->setNumero_plantas($_POST["txtNum_Planta"]);
        $inmueble1->setPlanta($_POST["txtPlanta"]);
        $inmueble1->setMetros($_POST["txtMetros"]);
        $inmueble1->setTipo_inmueble($_POST["txtTipo_Inmueble"]);
//    $inmueble1->setNombre_usuario_duenyo($_SESSION['usuario_particular']);
        $inmueble1->setFotos($_POST["fileFotos"]);
        if (isset($_SESSION['usuario_particular'])) {
            $nombre_usuario_duenyo = $_SESSION['usuario_particular'];
        } else {

            $nombre_usuario_duenyo = $_SESSION['usuario_profesional'];
        }
        $inmueble1->setNombre_usuario_duenyo($nombre_usuario_duenyo);
        $daoInmueble = new daoInmuebles();

        $insertOk = $daoInmueble->insertar($inmueble1);
        if (!$insertOk) {
            $_SESSION["errores"]["insertOk"] = "No se ha insertado correctamente";
        }
    }
    echo "<pre>";
    var_dump($inmueble1);
    var_dump($_SESSION);
    echo "</pre>";
//    if ($_SESSION["validacion"]) {
//        header('Location: ' . $url_exito);
//    } else {
//        header('Location: ' . $url_error);
//    }
}

function modificarInmueble() {
    if (empty($_POST["btonmodificar"])) {
        if (empty($_POST["txtNum_banyos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_banyos"] = "Debe de completar el campo numero de baños.";
        }
        if (empty($_POST["txtNum_habitaciones"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_habitaciones"] = "Debe de completar el campo numero de habitaciones.";
        }
        if (empty($_POST["txtCocina"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtCocina"] = "Debe de completar el campo cocina.";
        }
        if (empty($_POST["txtNum_Planta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtNum_Planta"] = "Debe de completar el campo numero de plantas.";
        }
        if (empty($_POST["txtPlanta"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtPlanta"] = "Debe de completar el campo planta.";
        }
        if (empty($_POST["txtMetros"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtMetros"] = "Debe de completar el campo metros.";
        }
        if (empty($_POST["txtTipo_inmueble"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["txtTipo_Inmueble"] = "Debe de completar el campo tipo de inmueble.";
        }
        if (empty($_POST["fileFotos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["fileFotos"] = "Debe de completar el campo fotos.";
        }
        if ($_SESSION["validacion"]) {
            $inmueble1 = new inmueble();
            $inmueble1->setNum_banyos($_POST["txtNum_banyos"]);
            $inmueble1->setNum_hab($_POST["txtNum_habitaciones"]);
            $inmueble1->setCocina($_POST["txtCocina"]);
            $inmueble1->setNum_plantas($_POST["txtNum_Planta"]);
            $inmueble1->setPlanta($_POST["txtPlanta"]);
            $inmueble1->setMetros($_POST["txtMetros"]);
            $inmueble1->setTipo_inmueble($_POST["txtTipo_Inmueble"]);
            $inmueble1->setFotos($_POST["fileFotos"]);
            $daoInmueble2 = new daoInmuebles();
            $modifyOk = $daoInmueble2->modificar($inmueble1);
            $daoInmueble2->destruct();
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
}

function listar_inmuebles_usuario() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } else {

        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }
    $inmueble1 = new inmueble();
    $inmueble1->setNombre_usuario_duenyos($nombre_usuario_duenyos);

    $dao = new daoInmuebles();
    $inmuebles_usuario = $dao->read($nombre_usuario_duenyos);
    $dao->destruct();
//Listar  inmuebles by usuario
    for ($i = 0; $i < sizeof($inmuebles_usuario); $i++) {

        echo '<table id="inmuebles">';
        echo '</tr><tr>';
        echo '<td>' . ' Número : ' . $inmuebles_usuario[$i]->getNumero() . " " . '</td>';
        echo '<td>' . ' Código Postal :' . $inmuebles_usuario[$i]->getCp() . '</td>';
        echo '<td>' . ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() . " " . '</td>';

        echo '</tr>';
        echo '</table>';
    }
//echo "<pre>";
//var_dump($inmueble1);
//var_dump($inmuebles_usuario);
//echo "</pre>";
}

//EN CONSTRUCCION COMO LO TOQUES TE RAJO
function listar_inmuebles_usuarioAll() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } else {

        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }

    $dao = new daoInmuebles();
    $inmuebles_usuario = $dao->read($nombre_usuario_duenyos);
    $dao->destruct();
//Listar  inmuebles by usuario
    for ($i = 0; $i < sizeof($inmuebles_usuario); $i++) {
//        echo '<option>'
//        . ' Número : ' . $inmuebles_usuario[$i]->getNumero() .
//        '   Código Postal :' . $inmuebles_usuario[$i]->getCp() .
//        ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() .
//        ' - Tipo de vía : ' . $inmuebles_usuario[$i]->getTipo_via() .
//        ' - Usuario : ' . $inmuebles_usuario[$i]->getNombre_usuario_duenyos() .
//        ' - Localidad : ' . $inmuebles_usuario[$i]->getNombre_localidad() .
//        ' - Provincia : ' . $inmuebles_usuario[$i]->getNombre_provincia() .
//        ' - N.Baños : ' . $inmuebles_usuario[$i]->getNum_banyos() .
//        ' - N.Habitaciones : ' . $inmuebles_usuario[$i]->getNum_hab() .
//        ' - Cocina Amueblada : ' . $inmuebles_usuario[$i]->getCocina() .
//        ' - Tipo de oferta : ' . $inmuebles_usuario[$i]->getTipo_inmueble() .
//        ' - Numero de plantas : ' . $inmuebles_usuario[$i]->getNumero_plantas() .
//        ' - Planta (Edificios): ' . $inmuebles_usuario[$i]->getPlanta() .
//        ' - Metros Cuadrados:  ' . $inmuebles_usuario[$i]->getMetros() .
//        ' - Fotos:  ' . $inmuebles_usuario[$i]->getFotos() .
//        '</option>';
        $direccion = $inmuebles_usuario[$i]->getNumero() . "-" . $inmuebles_usuario[$i]->getCp() . "-" . $inmuebles_usuario[$i]->getNombre_via() . "-" . $inmuebles_usuario[$i]->getTipo_via();

        echo '<table id="inmuebles">';
        echo '</tr><tr>';
        echo '<td>' . ' Número : ' . $inmuebles_usuario[$i]->getNumero() . " " . '</td>';
        echo '<td>' . ' Código Postal :' . $inmuebles_usuario[$i]->getCp() . '</td>';
        echo '<td>' . ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() . " " . '</td>';
        echo '<td>' . ' - Tipo vía : ' . $inmuebles_usuario[$i]->getTipo_via() . " " . '</td>';
        echo '<a href="../Vistas/detalles_inmueble.php?direccion="' . $direccion . '"">'
        . '<input type="submit" name="ver_detalle" id="ver_detalle" value="Ver detalle" />'
        . '</td>'
        . '</a>';
        echo " ";
        echo '<a href="../Vistas/alta_resenya.php">'
        . '<input type="submit" name="alta_resenya" id="alta_resenya" value="Escribir reseña" />'
        . '</td>'
        . '</a>';
        echo '</tr>';
        echo '</table>';
    }
//echo "<pre>";
//var_dump($inmueble1);
//var_dump($inmuebles_usuario);
//echo "</pre>";
}

function get_inmueble_by_direccion() {
    $daoInmuebles = new daoInmuebles();
    if (isset($_SESSION['usuario_particular'])) {
        $usuario = $_SESSION['usuario_particular'];
    }
    if (isset($_SESSION['usuario_profesional'])) {
        $usuario = $_SESSION['usuario_profesional'];
    }
    $inmueble = new inmueble();
    $inmueble->setNumero($numero);
    $inmueble->setCp($cp);
    $inmueble->setNombre_via($nombre_via);
    $inmueble->setTipo_via($tipo_via);
    $inmueble2 = $daoInmuebles->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
    $daoInmuebles->destruct();
    for ($i = 0; $i < sizeof($inmueble2); $i++) {

        echo '<table id="inmuebles">';
        echo '</tr><tr>';
        echo '<td>' . ' Número : ' . $inmueble2[$i]->getNumero() . " " . '</td>';
        echo '<td>' . ' Código Postal :' . $inmueble2[$i]->getCp() . '</td>';
        echo '<td>' . ' - Nombre vía : ' . $inmueble2[$i]->getNombre_via() . " " . '</td>';
        echo '<td>' . ' - Tipo vía : ' . $inmueble2[$i]->getTipo_via() . " " . '</td>';
        echo '</tr>';
        echo '</table>';
    }
    echo "<pre>";
    var_dump($inmueble2);

    echo "</pre>";
}

function getInmuebleByAnuncio($anuncio) {
    $lista = listar();
    $i = 0;
    $encontrado = false;
    $r = false;

    while ($encontrado == false && i < sizeof($lista)) {
        $aux = new inmueble();
        if ($lista[$i]->getCp() == $anuncio->getCP()) {
            if ($lista[$i]->getTipo_via() == $anuncio->getTipo_via()) {
                if ($lista[$i]->getNumero() == $anuncio->getNumero()) {
                    $r = $lista[$i];
                    $encontrado = true;
                }
            }
        }

        $i++;
    }

    return $r;
}

function listar() {
    $daoInmueble = new daoInmuebles();
    $inmuebles = $daoInmueble->listar();
    $daoInmueble->destruct();

    $anuncios = [];
    while ($aux = mysqli_fetch_array($inmuebles)) {
        $inmueble_aux = new inmueble();
        $inmueble_aux->setCp($aux[1]);
        $inmueble_aux->setMetros($aux[13]);
        $inmueble_aux->setNombre_localidad($aux[5]);
        $inmueble_aux->setNombre_provincia($aux[6]);
        $inmueble_aux->setNombre_usuario_duenyo($aux[4]);
        $inmueble_aux->setNombre_via($aux[2]);
        $inmueble_aux->setNum_banyos($aux[7]);
        $inmueble_aux->setNumero($aux[0]);
        $inmueble_aux->setNumero_plantas($aux[11]);
        $inmueble_aux->setPlanta($aux[12]);
        $inmueble_aux->setTipo($aux[10]);
        $inmueble_aux->setCocina($aux[9]);
        $inmueble_aux->setTipo_via($aux[3]);
        $inmueble_aux->setFotos($aux[14]);
        $inmueble_aux->setNum_hab($aux[8]);
    }
    return $anuncios;
}
