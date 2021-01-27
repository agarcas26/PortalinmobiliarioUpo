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
    $numero = $direccion[0];
    $cp = $direccion[1];
    $nombre_via = $direccion[2];
    $tipo_via = $direccion[3];

    $dao = new daoInmuebles();
    $aux = $dao->get_imueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
    $dao->destruct();

    $inmueble = new inmueble();
    if (mysqli_num_rows($aux) > 0) {
        while ($fila = mysqli_fetch_array($aux)) {
            $inmueble->setNumero($fila['numero']);
            $inmueble->setCp($fila['cp']);
            $inmueble->setCocina($fila['cocina']);
            $inmueble->setFotos($fila['fotos']);
            $inmueble->setMetros($fila['m2']);
            $inmueble->setNombre_localidad($fila['nombre_localidad']);
            $inmueble->setNombre_provincia($fila['nomnre_provincia']);
            $inmueble->setNombre_usuario_duenyo($fila['nombre_usuario_duenyo']);
            $inmueble->setNombre_via($fila['nombre_via']);
            $inmueble->setNum_banyos($fila['num_banyos']);
            $inmueble->setNum_hab($fila['num_hab']);
            $inmueble->setPlanta($fila['planta']);
            $inmueble->setNumero_plantas($fila['numero_plantas']);
        }
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

function listar() {
    $daoinmueble = new daoInmuebles();
    $inmuebles = $daoinmueble->listar();
    $daoInmueble->destruct();


    while (mysqli_fetch_array($inmuebles)) {
        $inmueble_aux = new inmueble();
        $inmueble_aux->setCp($inmuebles[1]);
        $inmueble_aux->setMetros($inmuebles[13]);
        $inmueble_aux->setNombre_localidad($inmuebles[5]);
        $inmueble_aux->setNombre_provincia($inmuebles[6]);
        $inmueble_aux->setNombre_usuario_duenyo($inmuebles[4]);
        $inmueble_aux->setNombre_via($inmuebles[2]);
        $inmueble_aux->setNum_banyos($inmuebles[7]);
        $inmueble_aux->setNumero($inmuebles[0]);
        $inmueble_aux->setNumero_plantas($inmuebles[11]);
        $inmueble_aux->setPlanta($inmuebles[12]);
        $inmueble_aux->setTipo($inmuebles[10]);
        $inmueble_aux->setCocina($inmuebles[9]);
        $inmueble_aux->setTipo_via($inmuebles[3]);
        $inmueble_aux->setFotos($inmuebles[14]);
        $inmueble_aux->setNum_hab($inmuebles[8]);
        $anuncios[] = $inmueble_aux;
    }
    return $anuncios;
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

        echo '<option>'
        . ' Número : ' . $inmuebles_usuario[$i]->getNumero() .
        '   Código Postal :' . $inmuebles_usuario[$i]->getCp() .
        ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() .
        ' - Tipo de vía : ' . $inmuebles_usuario[$i]->getTipo_via() . '</option>';

        echo '<option>' . $inmuebles_usuario[$i]->getNumero() . " - " . $inmuebles_usuario[$i]->getCp() . " - " . $inmuebles_usuario[$i]->getNombre_via() . " - " . $inmuebles_usuario[$i]->getTipo_via() . '</option>';


    }
//echo "<pre>";
//var_dump($inmueble1);
//var_dump($inmuebles_usuario);
//echo "</pre>";
}

function listar_inmuebles_usuarioAll() {


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
        echo '<option>'
      
        . ' Número : ' . $inmuebles_usuario[$i]->getNumero() .
        '   Código Postal :' . $inmuebles_usuario[$i]->getCp() .
        ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() .
        ' - Tipo de vía : ' . $inmuebles_usuario[$i]->getTipo_via() .
        ' - Usuario : ' . $inmuebles_usuario[$i]->getNombre_usuario_duenyos() .
        ' - Localidad : ' . $inmuebles_usuario[$i]->getNombre_localidad() .
        ' - Provincia : ' . $inmuebles_usuario[$i]->getNombre_provincia() .
        ' - N.Baños : ' . $inmuebles_usuario[$i]->getNum_banyos() .
        ' - N.Habitaciones : ' . $inmuebles_usuario[$i]->getNum_hab() .
        ' - Cocina Amueblada : ' . $inmuebles_usuario[$i]->getCocina() .
        ' - Tipo de oferta : ' . $inmuebles_usuario[$i]->getTipo_inmueble() .
        ' - Numero de plantas : ' . $inmuebles_usuario[$i]->getNumero_plantas() .
        ' - Planta (Edificios): ' . $inmuebles_usuario[$i]->getPlanta() .
        ' - Metros Cuadrados:  ' . $inmuebles_usuario[$i]->getMetros() .
        ' - Fotos:  ' . $inmuebles_usuario[$i]->getFotos() .
        '</option>';
    }
//echo "<pre>";
//var_dump($inmueble1);
//var_dump($inmuebles_usuario);
//echo "</pre>";
}
