<?php

include_once '../DAO/daoInmuebles.php';
include_once '../Modelos/InmueblesModel.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

//if (session_status() != PHP_SESSION_ACTIVE) {
//    session_start();
//}
//damos por correcto el formulario
$validado = true;
//como es correcto eliminamos todos los errores

$cancelado = false;

//direccion en caso de exito, sustituir vista.php por la vista correspondiente 
//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false

if (isset($_POST["btonInsertar"])) {
    $_SESSION["errores"] = "";
    if (empty($_POST["txtNumero"])) {
        $validado  = false;
        $$erroresNum = "Debe de completar el campo numero.";
    }
    if (empty($_POST["txtCp"])) {
       $validado  = false;
        $erroresCp = "Debe de completar el campo cp.";
    }
    if (empty($_POST["txtNombre_via"])) {
        $validado  = false;
        $erroresNombre_via = "Debe de completar el campo nombre via.";
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["txtNombre_via"])){
        $validado  = false;
        $erroresNombre_via = "formato incorrecto.";
    }
    if (empty($_POST["txtTipo_via"])) {
        $validado = false;
        $erroresTipo_via = "Debe de completar el campo tipo de via.";
    }if (empty($_POST["txtNombre_localidad"])) {
        $validado = false;
        $erroresLocalidad = "Debe de completar el nombre de la localidad.";
    }if (empty($_POST["txtNombre_provincia"])) {
        $validado = false;
        $erroresProvincia = "Debe de completar el nombre de la provincia.";
    }
    if (empty($_POST["txtNum_banyos"])) {
        $validado = false;
        $erroresNum_banyos = "Debe de completar el campo numero de baños.";
    }
    if (empty($_POST["txtNum_habitaciones"])) {
        $validado = false;
        $erroresNum_habitaciones = "Debe de completar el campo numero de habitaciones.";
    }
    if (empty($_POST["txtCocina"])) {
        $validado = false;
        $erroresCocina = "Debe de completar el campo cocina.";
    }
    if (empty($_POST["txtNum_Planta"])) {
        $validado = false;
        $erroresNum_Planta = "Debe de completar el campo numero de plantas.";
    }
    if (empty($_POST["txtPlanta"])) {
        $validado = false;
        $erroresPlanta = "Debe de completar el campo planta.";
    }
    if (empty($_POST["txtMetros"])) {
        $validado = false;
        $errorestMetros = "Debe de completar el campo metros.";
    }
    if (empty($_POST["txtTipo_Inmueble"])) {
        $validado = false;
        $erroresTipo_Inmueble = "Debe de completar el campo tipo de inmueble.";
    }
    if (empty($_POST["fileFotos"])) {
        $validado = false;
        $erroresfileFotos = "Debe añadir una imagen del inmueble.";
    }


    if ($validado) {
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
        $inmueble1->setTipo_inmueble($_POST["txtTipo_Inmueble"]);
        $inmueble1->setFotos($_POST["fileFotos"]);
        if (isset($_SESSION['usuario_particular'])) {
            $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
        } elseif (isset($_SESSION['usuario_profesional'])) {

            $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
        }
        $inmueble1->setNombre_usuario_duenyos($nombre_usuario_duenyos);
        $daoInmueble = new daoInmuebles();

        $insertOk = $daoInmueble->insertar($inmueble1);
        if (!$insertOk) {
            $NoInsertado = "No se ha insertado correctamente";
        }
    }

    if ($validado) {
        header('Location: ../Vistas/inmueble.php ');
    } else {
        header('Location: ../Vistas/alta_inmueble.php');
    }
}

if (isset($_POST["btonModificar"])) {
    if (empty($_POST["txtNum_banyos"])) {
        $validado = false;
        $erroresNum_banyos = "Debe de completar el campo numero de baños.";
    }
    if (empty($_POST["txtNum_habitaciones"])) {
        $validado = false;
        $erroresNum_habitaciones = "Debe de completar el campo numero de habitaciones.";
    }
    if (empty($_POST["txtCocina"])) {
        $validado = false;
        $erroresCocina = "Debe de completar el campo cocina.";
    }
    if (empty($_POST["txtNum_Planta"])) {
        $validado = false;
        $erroresNum_Planta = "Debe de completar el campo numero de plantas.";
    }
    if (empty($_POST["txtPlanta"])) {
        $validado = false;
        $erroresPlanta = "Debe de completar el campo planta.";
    }
    if (empty($_POST["txtMetros"])) {
        $validado = false;
        $errorestMetros = "Debe de completar el campo metros.";
    }
    if (empty($_POST["txtTipo_Inmueble"])) {
        $validado = false;
        $erroresTipo_Inmueble = "Debe de completar el campo tipo de inmueble.";
    }
    if (empty($_POST["fileFotos"])) {
        $validado = false;
        $erroresfileFotos = "Debe añadir una imagen del inmueble.";
    }

    if ($validado) {
        $inmueble2 = new Inmueble();
        $inmueble2->setNumero($_POST["txtNumero"]);
        $inmueble2->setCp($_POST["txtCp"]);
        $inmueble2->setNombre_via($_POST["txtNombre_via"]);
        $inmueble2->setTipo_via($_POST["txtTipo_via"]);
        $inmueble2->setNum_banyos($_POST["txtNum_banyos"]);
        $inmueble2->setNum_hab($_POST["txtNum_habitaciones"]);
        $inmueble2->setCocina($_POST["txtCocina"]);
        $inmueble2->setNum_plantas($_POST["txtNum_Planta"]);
        $inmueble2->setPlanta($_POST["txtPlanta"]);
        $inmueble2->setMetros($_POST["txtMetros"]);
        $inmueble2->setTipo_inmueble($_POST["txtTipo_Inmueble"]);
        $inmueble2->setFotos($_POST["fileFotos"]);
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
            $NoModificado = "No se ha modificado correctamente";
        }
    }
    if ($validado) {
        header('Location: ../Vistas/detalles_inmueble.php ');
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
        echo '<table id="inmuebles">';
        echo '</tr><tr>';
        echo '<tr>' . ' Número : ' . $aux[$i]->getNumero() . " " . '</tr>';
        echo '<tr>' . '  - Código Postal :' . $aux[$i]->getCp() . '</tr>';
        echo '<tr>' . ' </br> - Nombre vía : ' . $aux[$i]->getNombre_via() . " " . '</tr>';
        echo '<tr>' . ' </br> - Tipo vía : ' . $aux[$i]->getTipo_via() . " " . '</tr>';
        echo '<tr>' . ' </br> - Usuario : ' . $aux[$i]->getNombre_usuario_duenyos() . " " . '</tr>';
        echo '<tr>' . ' </br> - Localidad : ' . $aux[$i]->getNombre_localidad() . " " . '</tr>';
        echo '<tr>' . ' </br> - Provincia : ' . $aux[$i]->getNombre_provincia() . " " . '</tr>';
        echo '<tr>' . ' </br> - N.Baños : ' . $aux[$i]->getNum_banyos() . " " . '</tr>';
        echo '<tr>' . ' </br> - N.Habitaciones : ' . $aux[$i]->getNum_hab() . " " . '</tr>';
        echo '<tr>' . ' </br> - Cocina : ' . $aux[$i]->getCocina() . " " . '</tr>';
        echo '<tr>' . ' </br> - Tipo Inmueble : ' . $aux[$i]->getTipo_inmueble() . " " . '</tr>';
        echo '<tr>' . ' </br> - N.Plantas : ' . $aux[$i]->getNumero_plantas() . " " . '</tr>';
        echo '<tr>' . ' </br> - Planta : ' . $aux[$i]->getPlanta() . " " . '</tr>';
        echo '<tr>' . ' </br> - Metros cuadrados : ' . $aux[$i]->getMetros() . " " . '</tr>';
        $fotos = preg_split("/-/", $aux[$i]->getFotos());
        for ($i = 0; $i < sizeof($fotos); $i++) {
            echo '<tr>' . ' </br> - Fotos : ' . '<img id="foto_inmueble" src="../img/Inmueble/' . $direccion . '/' . $fotos[$i] . '" alt="' . $fotos[$i] . '"/>' . '</tr>';
        }
        echo '<td>';
        echo '<a href="../Vistas/modificar_inmueble.php?direccion=' . $direccion . '">Modificar datos'
        //. '<input type="submit"  name="btonModificar" id="btonModificar" value="Modificar d" />'
        . '</a>'
        . '</td>';
        echo " ";
        echo '<td>';
        echo '<form action="../Controladores/InmueblesController.php" method="POST">'
        . '<a href="../Controladores/InmueblesController.php?direccion=' . $direccion . '">'
        . '<input type="submit" name="btoneliminar" id="btoneliminar" value="Eliminar inmueble" />'
        . '</a></form>'
        . '</td>';


        echo '</table>';
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

    $dao = new daoInmuebles();
    $inmuebles_usuario = $dao->read($nombre_usuario_duenyos);
    $dao->destruct();
//Listar  inmuebles by usuario
    for ($i = 0; $i < sizeof($inmuebles_usuario); $i++) {

        $direccion = $inmuebles_usuario[$i]->getNumero() . "-" . $inmuebles_usuario[$i]->getCp() . "-" . $inmuebles_usuario[$i]->getNombre_via() . "-" . $inmuebles_usuario[$i]->getTipo_via();

        echo '<table id="inmuebles" style="border: 3px dotted blue">';
        echo '<tr>';
        echo '<td>' . ' Número : ' . $inmuebles_usuario[$i]->getNumero() . " " . '</td>';
        echo '<td>' . ' Código Postal :' . $inmuebles_usuario[$i]->getCp() . '</td>';
        echo '<td>' . ' - Nombre vía : ' . $inmuebles_usuario[$i]->getNombre_via() . " " . '</td>';
        echo '<td>' . ' - Tipo vía : ' . $inmuebles_usuario[$i]->getTipo_via() . " " . '</td>';
         echo " ";
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
        echo '</table>';
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

function deleteInmueble() {
    $inmueble1 = new Inmueble();

    $inmueble1->setNumero($numero);
    $inmueble1->setCp($cp);
    $inmueble1->setNombre_via($nombre_via);
    $inmueble1->setTipo_via($tipo_via);
    $daoInmueble = new daoInmuebles();
    $deleteOk = $daoInmueble->eliminar($inmueble1);
    $daoInmueble->destruct();
    if (!$deleteOk) {
        $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
    }

    if ($_SESSION["errores"]) {
        header('Location:../Vistas/inmueble.php ');
    } else {
        header('Location:../Vistas/perfil.php '); //muestra el mensaje de error de eliminacion
    }
}
