<?php

include_once '../DAO/daoInmuebles.php';
include_once '../Modelos/InmueblesModel.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

//if (session_status() != PHP_SESSION_ACTIVE) {
//    session_start();
//}
//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";
$_SESSION["cancelado"] = false;

//direccion en caso de exito, sustituir vista.php por la vista correspondiente 
//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false

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

//        echo '<a href="../Vistas/detalles_inmueble.php?direccion=' . $direccion . '">'
//        . '<input type="submit" name="ver_detalle" id="ver_detalle" value="Ver detalle" />'
//        . '</td>'
//        . '</a>';
        echo " ";
//        echo '<a href="../Vistas/alta_resenya.php">'
//        . '<input type="submit" name="alta_resenya" id="alta_resenya" value="Escribir reseña" />'
//        . '</td>'
//        . '</a>';
        echo '<td>';
        echo '<a href="../Vistas/modificar_inmueble.php">'
        . '<input type="submit" name="btonmodificar" id="btonmodificar" value="Modificar datos" />'
        . '</td>'
        . '</a>';
        echo '<td>';
        echo '<form action="../Controladores/InmueblesController.php" method="POST">'
        . '<a href="../Controladores/InmueblesController.php?' . $direccion . '">'
        . '<input type="submit" name="btoneliminar" id="btoneliminar" value="Eliminar inmueble" />'
        . '</a></form>';


        echo '</table>';
    }

    return $inmueble;
}

if (isset($_POST["btonInsertar"])) {

  
        $_SESSION["validacion"] = true;

        $_SESSION["errores"] = "";
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
        if (empty($_POST["fileFotos"])) {
            $_SESSION["validacion"] = false;
            $_SESSION["errores"]["fileFotos"] = "Debe añadir una imagen del inmueble.";
        }


        if ($_SESSION["validacion"]) {

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
            // $inmueble1->setNombre_usuario_duenyos($_SESSION['usuario_particular']);
            if (isset($_SESSION['usuario_particular'])) {
                $nombre_usuario_duenyos = $_SESSION['usuario_particular'];
            } else {

                $nombre_usuario_duenyos = $_SESSION['usuario_profesional'];
            }
            $inmueble1->setNombre_usuario_duenyos($nombre_usuario_duenyos);
            $daoInmueble = new daoInmuebles();

            $insertOk = $daoInmueble->insertar($inmueble1);
            if (!$insertOk) {
                $_SESSION["errores"]["insertOk"] = "No se ha insertado correctamente";
            }
        }

//        if ($_SESSION["validacion"]) {
//            header('Location: ../Vistas/inmueble.php ');
//        } else {
//            header('Location: ../Vistas/alta_inmueble.php');
//        }
    echo "<pre>";
    var_dump($inmueble1);
    var_dump($insertOk);
    echo "</pre>";
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
            $inmueble1 = new Inmueble();
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
        echo '<a href="../Vistas/detalles_inmueble.php?direccion=' . $direccion . '">'
        . '<input type="submit" name="ver_detalle" id="ver_detalle" value="Ver detalle" />'
        . '</td>'
        . '</a>';
        echo " ";
//        echo '<a href="../Vistas/alta_resenya.php">'
//        . '<input type="submit" name="alta_resenya" id="alta_resenya" value="Escribir reseña" />'
//        . '</td>'
//        . '</a>';
        echo '<a href="../Vistas/modificar_inmueble.php">'
        . '<input type="submit" name="btonmodificar" id="btonmodificar" value="Modificar datos" />'
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

//function get_inmueble_by_direccion() {
//    $daoInmuebles = new daoInmuebles();
//    if (isset($_SESSION['usuario_particular'])) {
//        $usuario = $_SESSION['usuario_particular'];
//    }
//    if (isset($_SESSION['usuario_profesional'])) {
//        $usuario = $_SESSION['usuario_profesional'];
//    }
//    $inmueble = new Inmueble();
//    $inmueble->setNumero($numero);
//    $inmueble->setCp($cp);
//    $inmueble->setNombre_via($nombre_via);
//    $inmueble->setTipo_via($tipo_via);
//    $inmueble2 = $daoInmuebles->get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via);
//    $daoInmuebles->destruct();
//    for ($i = 0; $i < sizeof($inmueble2); $i++) {
//
//        echo '<table id="inmuebles">';
//        echo '</tr><tr>';
//        echo '<td>' . ' Número : ' . $inmueble2[$i]->getNumero() . " " . '</td>';
//        echo '<td>' . ' Código Postal :' . $inmueble2[$i]->getCp() . '</td>';
//        echo '<td>' . ' - Nombre vía : ' . $inmueble2[$i]->getNombre_via() . " " . '</td>';
//        echo '<td>' . ' - Tipo vía : ' . $inmueble2[$i]->getTipo_via() . " " . '</td>';
//        echo '</tr>';
//        echo '</table>';
//    }
//    echo "<pre>";
//    var_dump($inmueble2);
//
//    echo "</pre>";
//}


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
