<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/ResenyaModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoResenyas {

    public $conObj;
    public $conn;
    private $resenya;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conn = $this->conObj->establecer_conexion();
    }

    function escribirResenyas($objResenyas) {
        //$id_resenyas = $objUsuario->getId_resenyas();
        $nombre_usuario = $objResenyas->getNombre_usuario();
        $cp = $objResenyas->getCp();
        $nombre_via = $objResenyas->getNombre_via();
        $tipo_via = $objResenyas->getTipo_via();
        $numero = $objResenyas->getNumero();
        $descripcion = $objResenyas->getDescripcion();
        $fecha_resenya = $objResenyas->getFecha_resenya();
        $valoracion = $objResenyas->getValoracion();

        $sql = "INSERT INTO `resenya`(`id_resenya`, `nombre_usuario`, `cp`, `nombre_via`, `tipo_via`, `numero`, `descripcion`, `fecha_resenya`, `valoracion`) (null,'$nombre_usuario','$cp','$nombre_via','$tipo_via','$numero','$descripcion','$fecha_resenya','$valoracion')";

        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

    function modificarResenyas($objResenyas) {
        $nombre_usuario = $objResenyas->getNombre_usuario();
        $cp = $objResenyas->getCp();
        $nombre_via = $objResenyas->getNombre_via();
        $tipo_via = $objResenyas->getTipo_via();
        $numero = $objResenyas->getNumero();
        $descripcion = $objResenyas->getDescripcion();
        $fecha_resenya = $objResenyas->getFecha_resenya();
        $valoracion = $objResenyas->getValoracion();

        $sql = "UPDATE `resenya` SET `nombre_usuario`='$nombre_usuario',`cp`='$cp',`nombre_via`='$nombre_via',`tipo_via`='$tipo_via',"
                . "`numero`='$numero',`descripcion`='$descripcion',`fecha_resenya`='$fecha_resenya',`valoracion`='$valoracion'";
        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

    public function eliminarResenyas($objResenyas) {
        $id_resenya = $objResenyas->getId_resenya();

        $sql = "DELETE FROM `resenya` WHERE `id_resenya`='$id_resenya'";
        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

    public function listarResenyas() {
        $sql = "SELECT * FROM `resenya`";
        $resultado = $this->conn->query($sql);
        $arrayResenyas = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayResenyas, $fila);
        }
        mysqli_close($this->conn);
        return $arrayResenyas;
    }

}

function read($objResenyas) {
    $id_resenya = $objResenyas->getId_resenya();
    $sql = "SELECT * FROM `resenya` WHERE `id_resenya`='$id_resenya'";
    $objMySqlLi = $this->conn->query($sql);

    if ($objMySqlLi->num_rows != 1) {
        return false;
    } else {
        $arrayAux = mysqli_fetch_assoc($objMySqlLi);
        $objResenyas->setId_resenya($arrayAux["id_resenya"]);
        $objResenyas->setNombre_usuario($arrayAux["nombre_usuario"]);
        $objResenyas->setCp($arrayAux["cp"]);
        $objResenyas->setNombre_via($arrayAux["nombre_via"]);
        $objResenyas->setTipo_via($arrayAux["tipo_via"]);
        $objResenyas->setNumero($arrayAux["numero"]);
        $objResenyas->setDescripcion($arrayAux["descripcion"]);
        $objResenyas->setFecha_resenya($arrayAux["fecha_resenya"]);
        $objResenyas->setValoracion($arrayAux["valoracion"]);
        return $objResenyas;
    }
    mysqli_close($this->conn);
}

function read_by_user($objUser) {

    $id_resenya = $objUser->getId_resenya();
    $objMySqlLi = $this->conn->query($sql);

    $sql = "SELECT * FROM `resenya` r, usuarios u WHERE u.`nombre_usuario`  AND r.`id_resenya` = '$id_resenya'";
    //seleccioname de la tabla reseña y la tabla usuario, las reseñas del usuario cuyo id usuario e id reseña coinciden
    if ($objMySqlLi->num_rows != 1) {
        return false;
    } else {
        $arrayAux = mysqli_fetch_assoc($objMySqlLi);
        $objUser->setId_resenya($arrayAux["id_resenya"]);
        $objUser->setNombre_usuario($arrayAux["nombre_usuario"]);
        $objUser->setCp($arrayAux["cp"]);
        $objUser->setNombre_via($arrayAux["nombre_via"]);
        $objUser->setTipo_via($arrayAux["tipo_via"]);
        $objUser->setNumero($arrayAux["numero"]);
        $objUser->setDescripcion($arrayAux["descripcion"]);
        $objUser->setFecha_resenya($arrayAux["fecha_resenya"]);
        $objUser->setValoracion($arrayAux["valoracion"]);
        return $objUser;
    }
    mysqli_close($this->conn);
}

function read_by_inmueble($objInmueble) {

    $id_resenya = $objInmueble->getId_resenya();
    $objMySqlLi = $this->conn->query($sql);

    $sql = "SELECT * FROM `resenya` r, inmueble i WHERE i.`numero`, i.cp , i.nombre_via, i.tipo_via  AND r.`id_resenya` = '$id_resenya'";
    //seleccioname de la tabla reseña y la tabla usuario, las reseñas del usuario cuyo id usuario e id reseña coinciden
    if ($objMySqlLi->num_rows != 1) {
        return false;
    } else {
        $arrayAux = mysqli_fetch_assoc($objMySqlLi);
        $objInmueble->setId_resenya($arrayAux["id_resenya"]);
        $objInmueble->setNombre_usuario($arrayAux["nombre_usuario"]);
        $objInmueble->setCp($arrayAux["cp"]);
        $objInmueble->setNombre_via($arrayAux["nombre_via"]);
        $objInmueble->setTipo_via($arrayAux["tipo_via"]);
        $objInmueble->setNumero($arrayAux["numero"]);
        $objInmueble->setDescripcion($arrayAux["descripcion"]);
        $objInmueble->setFecha_resenya($arrayAux["fecha_resenya"]);
        $objInmueble->setValoracion($arrayAux["valoracion"]);
        return $objInmueble;
    }
    mysqli_close($this->conn);
}
