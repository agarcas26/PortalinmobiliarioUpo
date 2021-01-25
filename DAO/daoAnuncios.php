<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/AnunciosModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoAnuncios {

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

    //operaciones crud 
    //insertar anuncio
    public function insertar($objAnuncio) {
        //paso del objeto anuncio a las variables individuales
        //        $idAnuncio = $objAnuncio->getIdAnuncio();

        $nombre_via = $objAnuncio->getNombre_via();
        $tipo_via = $objAnuncio->getTipo_via();
        $cp = $objAnuncio->getCp();
        $numero = $objAnuncio->getNumero();
        $precio = $objAnuncio->getPrecio();
        $fecha_anuncio = $objAnuncio->getFecha_anuncio();
        $nombre_usuario_publica = $objAnuncio->getNombre_usuario_publica();
        $nombre_usuario_anuncio = $objAnuncio->getNombre_usuario_anuncio();
        $titulo = $objAnuncio->getTitulo();
        $sql = "INSERT INTO `anuncio` (`id_anuncio`, `nombre_via`, `tipo_via`, `cp`, `numero`, `nombre_usuario_publica`, `nombre_usuario_anuncio`, `precio`, `fecha_anuncio`, `titulo`) VALUES (null,'$nombre_via','$tipo_via', '$cp','$numero','$nombre_usuario_publica','$nombre_usuario_anuncio','$precio','$fecha_anuncio','$titulo')";
        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    //leer anuncio por id
    public function read($objAnuncio) {
        $idAnuncio = $objAnuncio->getIdAnuncio();
        $sql = "SELECT * FROM `anuncio` WHERE `id_anuncio`='$idAnuncio'";
        $objMySqlLi = $this->conexion->query($sql);

        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);
            $objAnuncio->setIdAnuncio($arrayAux["idAnuncio"]);
            $objAnuncio->setNombre_via($arrayAux["nombre_via"]);
            $objAnuncio->setTipo_via($arrayAux["tipo_via"]);
            $objAnuncio->setCp($arrayAux["cp"]);
            $objAnuncio->setNumero($arrayAux["numero"]);
            $objAnuncio->setFecha_anuncio($arrayAux["fecha_anuncio"]);
            $objAnuncio->setPrecio($arrayAux["precio"]);
            $objAnuncio->setTitulo($arrayAux["titulo"]);
            $objAnuncio->setNombre_usuario_publica($arrayAux["nombre_usuario_publica"]);
            $objAnuncio->setNombre_usuario_anuncio($arrayAux["nombre_usuario_anuncio"]);

            return $objAnuncio;
        }
        mysqli_close($this->conexion);
    }

    public function eliminar($objAnuncio) {
        $idAnuncio = $objAnuncio->getIdAnuncio();

        $sql = "DELETE FROM `anuncio` WHERE `id_anuncio`='$idAnuncio'";
        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    public function modificar($objAnuncio) {
        $nombre_via = $objAnuncio->getNombre_via();
        $tipo_via = $objAnuncio->getTipo_via();
        $cp = $objAnuncio->getCp();
        $numero = $objAnuncio->getNumero();
        $precio = $objAnuncio->getPrecio();
        $fecha_anuncio = $objAnuncio->getFecha_anuncio();
        $nombre_usuario_publica = $objAnuncio->getNombre_usuario_publica();
        $nombre_usuario_anuncio = $objAnuncio->getNombre_usuario_anuncio();
        $titulo = $objAnuncio->getTitulo();

        $sql = "UPDATE `anuncio` SET `nombre_via`='$nombre_via',`tipo_via`='$tipo_via',`cp`='$cp',`numero`='$numero',`precio`='$precio',"
                . "`fecha_anuncio`='$fecha_anuncio',`nombre_usuario_publica`='$nombre_usuario_publica',`nombre_usuario_anuncio`='$nombre_usuario_anuncio',`titulo`='$titulo'";
        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    public function listar() {
        $sql = "SELECT * FROM `anuncio`";
        $resultado = $this->conexion->query($sql);

        $arrayAnuncios = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayAnuncios, $fila);
        }
        mysqli_close($this->conexion);

        return $arrayAnuncios;
    }

    function listar_anuncios_usuario($usuario) {
        $sql = "SELECT * FROM `anuncio` WHERE `nombre_usuario_anuncio`='" . $usuario . "';";
        $resultado = $this->conexion->query($sql);

        $arrayAnuncios = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayAnuncios, $fila);
        }
        mysqli_close($this->conexion);
        return $arrayAnuncios;
    }

}
