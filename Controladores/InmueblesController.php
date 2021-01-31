<?php

include_once '../DAO/daoInmuebles.php';
include_once '../Modelos/InmueblesModel.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = " ";
$_SESSION["cancelado"] = false;


if (isset($_POST["btonInsertar"])) {
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
        //$_SESSION["errores"]["txtPlanta"] = "Debe de completar el campo planta.";
    }
    if (empty($_POST["txtMetros"])) {
        $_SESSION["validacion"] = false;
        //$_SESSION["errores"]["txtMetros"] = "Debe de completar el campo metros.";
    }
    if (empty($_POST["tipo_inmueble"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["tipo_inmueble"] = "Debe de completar el campo tipo de inmueble.";
    }
    if (empty($_FILES["fileFotos"])) {
        $_SESSION["validacion"] = false;
        //$_SESSION["errores"]["fileFotos"] = "Debe añadir una imagen del inmueble.";
    }
    $inmueble1 = new Inmueble();
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
    $inmueble1->setTipo_inmueble($_POST["tipo_inmueble"]);
    $ruta = '../img/Inmueble/' . $inmueble1->getNumero() . "-" . $inmueble1->getCp() . "-" . $inmueble1->getNombre_via() . "-" . $inmueble1->getTipo_via();

    mkdir($ruta);
    $file = opendir($ruta);
    if (sizeof($_FILES['fileFotos']['name']) > 0) {
        for ($i = 0; $i < sizeof($_FILES['fileFotos']['name']); $i++) {
            $inmueble1->setFotos($_FILES["fileFotos"]['name'][$i]);
            move_uploaded_file($_FILES['fileFotos']['tmp_name'][$i], $ruta . "/" . $_FILES['fileFotos']['name'][$i]);
        }
    }
    closedir($file);

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } else {

        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }
    $inmueble1->setNombre_usuario_duenyos($nombre_usuario_duenyos);
    $daoInmueble = new daoInmuebles();

    $insertOk = $daoInmueble->insertar($inmueble1);

    header('Location: ../Vistas/inmueble.php');
}
if (isset($_POST["btonModificar"])) {
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
    if (empty($_POST["tipo_inmueble"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtTipo_Inmueble"] = "Debe de completar el campo tipo de inmueble.";
    }
    if (empty($_FILES["fileFotos"])) {
        $_SESSION["validacion"] = false;
        //$_SESSION["errores"]["fileFotos"] = "Debe añadir una imagen del inmueble.";
    }

    if ($_SESSION["validacion"]) {
        $inmueble2 = new Inmueble();
        $inmueble2->setNumero($_POST["txtNumero"]);
        $inmueble2->setCp($_POST["txtCp"]);
        $inmueble2->setNombre_via($_POST["txtNombre_via"]);
        $inmueble2->setTipo_via($_POST["txtTipo_via"]);
        $inmueble2->setNombre_localidad($_POST["txtNombre_localidad"]);
        $inmueble2->setNombre_provincia($_POST["txtNombre_provincia"]);
        $inmueble2->setNum_banyos($_POST["txtNum_banyos"]);
        $inmueble2->setNum_hab($_POST["txtNum_habitaciones"]);
        $inmueble2->setCocina($_POST["txtCocina"]);
        $inmueble2->setNumero_plantas($_POST["txtNum_Planta"]);
        $inmueble2->setPlanta($_POST["txtPlanta"]);
        $inmueble2->setMetros($_POST["txtMetros"]);
        $inmueble2->setTipo_inmueble($_POST["tipo_inmueble"]);
        $inmueble2->setFotos($_FILES["fileFotos"]);
        if (isset($_SESSION['usuario_particular'])) {
            $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
        } elseif (isset($_SESSION['usuario_profesional'])) {

            $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
        }
        $inmueble2->setNombre_usuario_duenyos($nombre_usuario_duenyos);
        $daoInmueble2 = new daoInmuebles();
        $modifyOk = $daoInmueble2->modificar($inmueble2);
        $daoInmueble2->destruct();
        if (!$modifyOk) {
            $_SESSION["errores"]["modifyOk"] = "No se ha modificado correctamente";
        }
    }

    if ($_SESSION["validacion"]) {
        header('Location: ../Vistas/inmueble.php');
    } else {
        header('Location: ../Vistas/modificar_inmueble.php');
    }
}

function select_inmuebles_usuario() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } else {

        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }
    $inmueble1 = new Inmueble();
    $inmueble1->setNombre_usuario_duenyos($nombre_usuario_duenyos);

    $dao = new daoInmuebles();
    $inmuebles_usuario = $dao->read($nombre_usuario_duenyos);
    $dao->destruct();
    //Listar  inmuebles by usuario
    if (sizeof($inmuebles_usuario) > 0) {
        echo '<select id="inmuebles_usuario" name="inmuebles_usuario" aria-invalid="false">';
        for ($i = 0; $i < sizeof($inmuebles_usuario); $i++) {
            $direccion = $inmuebles_usuario[$i]->getTipo_via() . " " . $inmuebles_usuario[$i]->getNombre_via() . " " . $inmuebles_usuario[$i]->getNumero() . " " . $inmuebles_usuario[$i]->getCp();
            $value = $inmuebles_usuario[$i]->getTipo_via() . "-" . $inmuebles_usuario[$i]->getNombre_via() . "-" . $inmuebles_usuario[$i]->getNumero() . "-" . $inmuebles_usuario[$i]->getCp();
            echo '<option value="' . $value . '">' . $direccion . '</option>';
        }
        echo '</select>';
    } else {
        echo '<td><label>Aún no tienes inmuebles... ¡Anímate a crear el primero!</label></td>';
    }
}

function getInmuebleByDireccion($direccion) {
    $direccion = str_replace("%20", " ", $direccion);
    $direccion_array = preg_split("/-/", $direccion);

    $numero = $direccion_array[0];
    $cp = $direccion_array[1];
    $nombre_via = $direccion_array[2];
    $tipo_via = $direccion_array[3];

    $dao = new daoInmuebles();
    $aux = $dao->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
    $dao->destruct();
    $inmueble = [];
    for ($i = 0; $i < sizeof($aux); $i++) {
        $inmueble = new Inmueble();
        $inmueble->setNumero($aux[$i]->getNumero());
        $inmueble->setCp($aux[$i]->getCp());
        $inmueble->setNombre_via($aux[$i]->getNombre_via());
        $inmueble->setTipo_via($aux[$i]->getTipo_via());
        $inmueble->setNombre_usuario_duenyos($aux[$i]->getNombre_usuario_duenyos());
        $inmueble->setNombre_localidad($aux[$i]->getNombre_localidad());
        $inmueble->setNombre_provincia($aux[$i]->getNombre_provincia());
        $inmueble->setNum_banyos($aux[$i]->getNum_banyos());
        $inmueble->setNum_hab($aux[$i]->getNum_hab());
        $inmueble->setCocina($aux[$i]->getCocina());
        $inmueble->setTipo_inmueble($aux[$i]->getTipo_inmueble());
        $inmueble->setNumero_plantas($aux[$i]->getNumero_plantas());
        $inmueble->setPlanta($aux[$i]->getPlanta());
        $inmueble->setMetros($aux[$i]->getMetros());
        $inmueble->setFotos($aux[$i]->getFotos());
        echo '<table id="inmuebles" style="border: 1px solid black">';
        echo '<tr><td>' . ' Número : ' . $aux[$i]->getNumero() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Código Postal :' . $aux[$i]->getCp() . '</td></tr>';
        echo '<tr><td>' . ' - Nombre vía : ' . $aux[$i]->getNombre_via() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Tipo vía : ' . $aux[$i]->getTipo_via() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Usuario : ' . $aux[$i]->getNombre_usuario_duenyos() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Localidad : ' . $aux[$i]->getNombre_localidad() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Provincia : ' . $aux[$i]->getNombre_provincia() . " " . '</td></tr>';
        echo '<tr><td>' . ' - N.Baños : ' . $aux[$i]->getNum_banyos() . " " . '</td></tr>';
        echo '<tr><td>' . ' - N.Habitaciones : ' . $aux[$i]->getNum_hab() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Cocina : ' . $aux[$i]->getCocina() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Tipo Inmueble : ' . $aux[$i]->getTipo_inmueble() . " " . '</td></tr>';
        echo '<tr><td>' . ' - N.Plantas : ' . $aux[$i]->getNumero_plantas() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Planta : ' . $aux[$i]->getPlanta() . " " . '</td></tr>';
        echo '<tr><td>' . ' - Metros cuadrados : ' . $aux[$i]->getMetros() . " " . '</td></tr>';
        $fotos = preg_split("/;/", $aux[$i]->getFotos());

        for ($i = 0; $i < sizeof($fotos); $i++) {
            echo '<tr><td> - Fotos : <img id="foto_inmueble" src="../img/Inmueble/' . $direccion . '/' . $fotos[$i] . '" alt="' . $fotos[$i] . '"/></td></tr>';
        }

        echo '</table>';
        echo '<td>';
        echo '<a href="../Vistas/modificar_inmueble.php?direccion=' . $direccion . '">Modificar datos'
        . '</a>'
        . '</td>';
        echo " ";
        echo '<td>';
        echo '<form action="../Controladores/InmueblesController.php" method="POST">'
        . '<a href="../Controladores/InmueblesController.php?direccion=' . $direccion . '">'
        . '<input type="hidden" id="direccion" name="direccion" value="' . $direccion . '" >'
        . '<input type="submit" name="btonEliminar" id="btonEliminar" value="Eliminar inmueble" />'
        . '</a></form>'
        . '</td>';
    }

    return $inmueble;
}

function getInmuebleByDireccionnoprint($direccion) {
    $direccion = str_replace("%20", " ", $direccion);
    $direccion_array = preg_split("/-/", $direccion);

    $numero = $direccion_array[0];
    $cp = $direccion_array[1];
    $nombre_via = $direccion_array[2];
    $tipo_via = $direccion_array[3];

    $dao = new daoInmuebles();
    $aux = $dao->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
    $dao->destruct();
    $inmueble = [];
    for ($i = 0; $i < sizeof($aux); $i++) {
        $inmueble = new Inmueble();
        $inmueble->setNumero($aux[$i]->getNumero());
        $inmueble->setCp($aux[$i]->getCp());
        $inmueble->setNombre_via($aux[$i]->getNombre_via());
        $inmueble->setTipo_via($aux[$i]->getTipo_via());
        $inmueble->setNombre_usuario_duenyos($aux[$i]->getNombre_usuario_duenyos());
        $inmueble->setNombre_localidad($aux[$i]->getNombre_localidad());
        $inmueble->setNombre_provincia($aux[$i]->getNombre_provincia());
        $inmueble->setNum_banyos($aux[$i]->getNum_banyos());
        $inmueble->setNum_hab($aux[$i]->getNum_hab());
        $inmueble->setCocina($aux[$i]->getCocina());
        $inmueble->setTipo_inmueble($aux[$i]->getTipo_inmueble());
        $inmueble->setNumero_plantas($aux[$i]->getNumero_plantas());
        $inmueble->setPlanta($aux[$i]->getPlanta());
        $inmueble->setMetros($aux[$i]->getMetros());
        $inmueble->setFotos($aux[$i]->getFotos());
    }
    return $inmueble;
}

function get_datos_by_direccion($direccion) {
    $direccion = str_replace("%20", " ", $direccion);
    $direccion_array = preg_split("/-/", $direccion);

    $numero = $direccion_array[0];
    $cp = $direccion_array[1];
    $nombre_via = $direccion_array[2];
    $tipo_via = $direccion_array[3];

    $dao = new daoInmuebles();
    $aux = $dao->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via)[0];
    $dao->destruct();
    $datos = [];
    array_push($datos, $aux->getNumero());
    array_push($datos, $aux->getCp());
    array_push($datos, $aux->getNombre_via());
    array_push($datos, $aux->getTipo_via());
    array_push($datos, $aux->getNombre_usuario_duenyos());
    array_push($datos, $aux->getNombre_localidad());
    array_push($datos, $aux->getNombre_provincia());
    array_push($datos, $aux->getNum_banyos());
    array_push($datos, $aux->getNum_hab());
    array_push($datos, $aux->getCocina());
    array_push($datos, $aux->getTipo_inmueble());
    array_push($datos, $aux->getNumero_plantas());
    array_push($datos, $aux->getPlanta());
    array_push($datos, $aux->getMetros());
    array_push($datos, $aux->getFotos());
    $inmueble = new Inmueble();
    $inmueble->setNumero($aux->getNumero());
    $inmueble->setCp($aux->getCp());
    $inmueble->setNombre_via($aux->getNombre_via());
    $inmueble->setTipo_via($aux->getTipo_via());
    $inmueble->setNombre_usuario_duenyos($aux->getNombre_usuario_duenyos());
    $inmueble->setNombre_localidad($aux->getNombre_localidad());
    $inmueble->setNombre_provincia($aux->getNombre_provincia());
    $inmueble->setNum_banyos($aux->getNum_banyos());
    $inmueble->setNum_hab($aux->getNum_hab());
    $inmueble->setCocina($aux->getCocina());
    $inmueble->setTipo_inmueble($aux->getTipo_inmueble());
    $inmueble->setNumero_plantas($aux->getNumero_plantas());
    $inmueble->setPlanta($aux->getPlanta());
    $inmueble->setMetros($aux->getMetros());
    $inmueble->setFotos($aux->getFotos());
    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } elseif (isset($_SESSION['usuario_profesional'])) {

        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }
    $inmueble->setNombre_usuario_duenyos($nombre_usuario_duenyos);

    return $datos;
}

function listar_inmuebles_usuario() {

    if (isset($_SESSION['usuario_particular'])) {
        $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
    } else {

        $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
    }
    $inmueble1 = new Inmueble();
    $inmueble1->setNombre_usuario_duenyos($nombre_usuario_duenyos);

    $dao = new daoInmuebles();
    $inmuebles_usuario = $dao->read($nombre_usuario_duenyos);
    $dao->destruct();
    //Listar  inmuebles by usuario
    for ($i = 0; $i < sizeof($inmuebles_usuario); $i++) {

        echo '<table id="datos_visa" class="display table-bordered" style="width:100%">';
        echo '</tr><tr>';
        echo '<td>' . ' Número : ' . $inmuebles_usuario[$i]->getNumero() . " " . '</td>';
        echo '<td>' . ' Código Postal :' . $inmuebles_usuario[$i]->getCp() . '</td>';
        echo '<td>' . ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() . " " . '</td>';

        echo '</tr>';
        echo '</table>';
    }
}

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

        $direccion = $inmuebles_usuario[$i]->getNumero() . "-" . $inmuebles_usuario[$i]->getCp() . "-" . $inmuebles_usuario[$i]->getNombre_via() . "-" . $inmuebles_usuario[$i]->getTipo_via();

        echo '<table id="inmuebles" style="border: 1px solid black">';
        echo '<tr>';
        echo '<td>' . '<strong> Número :</strong> ' . $inmuebles_usuario[$i]->getNumero() . " " . '</td>';
        echo '<td>' . '<strong> Código Postal : </strong>' . $inmuebles_usuario[$i]->getCp() . '</td>';
        echo '<td>' . '<strong> Nombre vía : </strong>' . $inmuebles_usuario[$i]->getNombre_via() . " " . '</td>';
        echo '<td>' . '<strong> Tipo vía : </strong>' . $inmuebles_usuario[$i]->getTipo_via() . " " . '</td>';

        echo '</table>';
        echo "<br>";
        echo '<td>';
        echo '<a href="../Vistas/detalles_inmueble.php?direccion=' . $direccion . '">'
        . '<input type="submit" name="ver_detalle" id="ver_detalle" value="Ver detalle" />'
        . '</a>'
        . '</td>';

        echo "  ";
        echo '<td>';
        echo '<a href="../Vistas/modificar_inmueble.php?direccion=' . $direccion . '">'
        . '<input type="submit" name="btonModificar" id="btonModificar" value="Modificar " />'
        . '</a>'
        . '</td>';
        echo '</tr>';
    }
}

function getInmuebleByAnuncio($anuncio) {
    $daoInmueble = new daoInmuebles();
    $inmuebles = $daoInmueble->listar();
    $daoInmueble->destruct();
    $encontrado = false;

    $inmueble_aux = new Inmueble();
    if (mysqli_num_rows($inmuebles) > 0) {
        while ($aux = mysqli_fetch_array($inmuebles) and!$encontrado) {
            if ($aux[1] == $anuncio->getCP()) {
                if ($aux[3] == $anuncio->getTipo_via()) {
                    if ($aux[0] == $anuncio->getNumero()) {
                        $encontrado = true;
                        $inmueble_aux->setNumero($aux[0]);
                        $inmueble_aux->setCp($aux[1]);
                        $inmueble_aux->setNombre_via($aux[2]);
                        $inmueble_aux->setTipo_via($aux[3]);
                        $inmueble_aux->setNombre_usuario_duenyos($aux[4]);
                        $inmueble_aux->setNombre_localidad($aux[5]);
                        $inmueble_aux->setNombre_provincia($aux[6]);
                        $inmueble_aux->setNum_banyos($aux[7]);
                        $inmueble_aux->setNum_hab($aux[8]);
                        $inmueble_aux->setCocina($aux[9]);
                        $inmueble_aux->setTipo_inmueble($aux[10]);
                        $inmueble_aux->setNumero_plantas($aux[11]);
                        $inmueble_aux->setPlanta($aux[12]);
                        $inmueble_aux->setMetros($aux[13]);
                        $inmueble_aux->setFotos($aux[14]);
                    }
                }
            }
        }
    }
    return $inmueble_aux;
}

if (isset($_POST['btonEliminar'])) {
    $traer = new daoInmuebles();

    $direccion_array = preg_split("/-/", $_POST["direccion"]);

    $numero = $direccion_array[0];
    $cp = $direccion_array[1];
    $nombre_via = $direccion_array[2];
    $tipo_via = $direccion_array[3];

    $datos = $traer->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
    $daoInmueble = new daoInmuebles();
    $deleteOk = $daoInmueble->eliminar($datos[0]);
    $daoInmueble->destruct();
    if (!$deleteOk) {
        $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
        header('Location: ../Vistas/inmueble.php');
    } else {
        header('Location: ../Vistas/inmueble.php');
    }
}
