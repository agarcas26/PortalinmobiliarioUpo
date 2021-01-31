<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/ResenyaModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoResenyas {

    public $conObj;
    public $conexion;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conexion = $this->conObj->getConexion();
    }

    function destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    function escribirResenyas($objResenyas) {
        $salida = true;
        $nombre_usuario = $objResenyas->getNombre_usuario();
        $cp = $objResenyas->getCp();
        $nombre_via = $objResenyas->getNombre_via();
        $tipo_via = $objResenyas->getTipo_via();
        $numero = $objResenyas->getNumero();
        $descripcion = $objResenyas->getDescripcion();
        $fecha_resenya = $objResenyas->getFecha_resenya();
        $valoracion = $objResenyas->getValoracion();

        $sql = "INSERT INTO `resenya`(`id_resenya`, `nombre_usuario`, `cp`, `nombre_via`, `tipo_via`, `numero`, `descripcion`, `fecha_resenya`, `valoracion`) VALUES (null,'$nombre_usuario','$cp','$nombre_via','$tipo_via','$numero','$descripcion',CURRENT_DATE,'$valoracion')";

        if (!$this->conexion->query($sql)) {
            $salida = false;
        }

        return $salida;
    }

    function modificarResenyas($objResenyas) {
        $salida = true;
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
        if (!$this->conexion->query($sql)) {
            $salida = false;
        }

        return $salida;
    }

    function eliminarResenyas($id_resenya) {
        $salida = true;

        $sql = "DELETE FROM `resenya` WHERE `id_resenya`='$id_resenya'";
        if (!$this->conexion->query($sql)) {
            $salida = false;
        }
        return $salida;
    }

    function listarResenyas() {
        $sql = "SELECT * FROM `resenya`";
        $resultado = $this->conn->query($sql);

        return $resultado;
    }

    function read($objResenyas) {
        $id_resenya = $objResenyas->getId_resenya();
        $sql = "SELECT * FROM `resenya` WHERE `id_resenya`='$id_resenya'";
        $objMySqlLi = $this->conn->query($sql);

        if ($objMySqlLi->num_rows > 0) {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);
            $objResenyas = new Resenya();
            $objResenyas->setId_resenya($arrayAux["id_resenya"]);
            $objResenyas->setNombre_usuario($arrayAux["nombre_usuario"]);
            $objResenyas->setCp($arrayAux["cp"]);
            $objResenyas->setNombre_via($arrayAux["nombre_via"]);
            $objResenyas->setTipo_via($arrayAux["tipo_via"]);
            $objResenyas->setNumero($arrayAux["numero"]);
            $objResenyas->setDescripcion($arrayAux["descripcion"]);
            $objResenyas->setFecha_resenya($arrayAux["fecha_resenya"]);
            $objResenyas->setValoracion($arrayAux["valoracion"]);
        }
        return $objResenyas;
    }

    function read_by_user($nombre_usuario_duenyos) {
        $objMySqlLi = $this->conexion->query($sql);
        $sql = "SELECT * FROM `resenya` WHERE u.`nombre_usuario_duenyos` = '" . $id_resenya . "'";
     
        if ($objMySqlLi->num_rows > 0) {
            $objResenya = new Resenya();
            while ($aux = mysqli_fetch_assoc($objMySqlLi)) {
                $objResenya->setId_resenya($aux ["id_resenya"]);
                $objResenya->setNombre_usuario($aux ["nombre_usuario"]);
                $objResenya->setCp($aux ["cp"]);
                $objResenya->setNombre_via($aux ["nombre_via"]);
                $objResenya->setTipo_via($aux ["tipo_via"]);
                $objResenya->setNumero($aux ["numero"]);
                $objResenya->setDescripcion($aux ["descripcion"]);
                $objResenya->setFecha_resenya($aux ["fecha_resenya"]);
                $objResenya->setValoracion($aux["valoracion"]);
                array_push($arrayAux, $objResenya);
            }
        }
        return $arrayAux;
    }

    function read_by_inmueble($numero, $cp, $nombre_via, $tipo_via) {
        $sql = "SELECT * FROM `resenya` r WHERE r.`numero`='$numero' and r.`cp` = '$cp' and r.`nombre_via`='$nombre_via' and r.`tipo_via` = '$tipo_via'";
        $objMySqlLi = $this->conexion->query($sql);
        $arrayAux = [];
     
        if ($objMySqlLi->num_rows > 0) {
            $objResenya = new Resenya();
            while ($aux = mysqli_fetch_assoc($objMySqlLi)) {
                $objResenya->setId_resenya($aux["id_resenya"]);
                $objResenya->setNombre_usuario($aux["nombre_usuario"]);
                $objResenya->setCp($aux["cp"]);
                $objResenya->setNombre_via($aux["nombre_via"]);
                $objResenya->setTipo_via($aux["tipo_via"]);
                $objResenya->setNumero($aux["numero"]);
                $objResenya->setDescripcion($aux["descripcion"]);
                $objResenya->setFecha_resenya($aux["fecha_resenya"]);
                $objResenya->setValoracion($aux["valoracion"]);
                array_push($arrayAux, $objResenya);
            }
        }
        return $arrayAux;
    }

    function read_by_usuario_inmueble($nombre_usuario, $numero, $cp, $nombre_via, $tipo_via) {
        $objMySqlLi = $this->conexion->query($sql);
        $sql = "SELECT * FROM `resenya` r WHERE r.`nombre_usuario`='$nombre_usuario' r.`numero`='$numero' and r.`cp` = '$cp' and r.`nombre_via`='$nombre_via' and r.`tipo_via` = '$tipo_via'";
        $arrayAux = [];
     
        if ($objMySqlLi->num_rows > 0) {
            $objResenya = new Resenya();
            while (mysqli_fetch_assoc($objMySqlLi)) {
                $objResenya->setId_resenya($arrayAux["id_resenya"]);
                $objResenya->setNombre_usuario($objMySqlLi["nombre_usuario"]);
                $objResenya->setCp($objMySqlLi["cp"]);
                $objResenya->setNombre_via($objMySqlLi["nombre_via"]);
                $objResenya->setTipo_via($objMySqlLi["tipo_via"]);
                $objResenya->setNumero($objMySqlLi["numero"]);
                $objResenya->setDescripcion($objMySqlLi["descripcion"]);
                $objResenya->setFecha_resenya($objMySqlLi["fecha_resenya"]);
                $objResenya->setValoracion($objMySqlLi["valoracion"]);
                array_push($arrayAux, $objResenya);
            }
        }
        return $arrayAux;
    }

}
