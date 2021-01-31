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


    public function insertar($objAnuncio) {


        $nombre_via = $objAnuncio->getNombre_via();
        $tipo_via = $objAnuncio->getTipo_via();
        $cp = $objAnuncio->getCp();
        $numero = $objAnuncio->getNumero();
        $precio = $objAnuncio->getPrecio();
        $fecha_anuncio = $objAnuncio->getFecha_anuncio();
        $nombre_usuario_publica = $objAnuncio->getNombre_usuario_publica();
        $nombre_usuario_anuncio = $objAnuncio->getNombre_usuario_anuncio();
        $titulo = $objAnuncio->getTitulo();
       
        $sql = "INSERT INTO `anuncio` (`id_anuncio`, `nombre_via`, `tipo_via`, `cp`, `numero`, `nombre_usuario_publica`, `nombre_usuario_anuncio`, `precio`, `fecha_anuncio`, `titulo`) VALUES (null,'$nombre_via','$tipo_via', '$cp','$numero','$nombre_usuario_publica','$nombre_usuario_publica','$precio',CURRENT_DATE,'$titulo')";
        $result = $this->conexion->query($sql);
        
        print_r($sql);
        
    }


    public function read($idAnuncio) {

        $sql = "SELECT * FROM `anuncio` WHERE `id_anuncio`='$idAnuncio'";
        $objMySqlLi = $this->conexion->query($sql);
        if ($objMySqlLi->num_rows > 0) {
            while ($aux = mysqli_fetch_assoc($objMySqlLi)) {
                $objAnuncio = new Anuncio();
                $objAnuncio->setId_anuncio($aux["id_anuncio"]);
                $objAnuncio->setNombre_via($aux["nombre_via"]);
                $objAnuncio->setTipo_via($aux["tipo_via"]);
                $objAnuncio->setCp($aux["cp"]);
                $objAnuncio->setNumero($aux["numero"]);
                $objAnuncio->setFecha_anuncio($aux["fecha_anuncio"]);
                $objAnuncio->setPrecio($aux["precio"]);
                $objAnuncio->setTitulo($aux["titulo"]);
                $objAnuncio->setNombre_usuario_publica($aux["nombre_usuario_publica"]);
                $objAnuncio->setNombre_usuario_anuncio($aux["nombre_usuario_anuncio"]);
            }
        }
        return $objAnuncio;
    }

    public function eliminar($idAnuncio) {

        $sql = "DELETE FROM `anuncio` WHERE `id_anuncio`='$idAnuncio'";
        $result = $this->conexion->query($sql);
        
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
        $result = $this->conexion->query($sql);
        
    }

    public function listar() {
        $sql = "SELECT * FROM `anuncio`";
        $resultado = $this->conexion->query($sql);

        return $resultado;
    }

    function listar_anuncios_usuario($usuario) {
        $sql = "SELECT * FROM `anuncio` WHERE `nombre_usuario_publica`='" . $usuario . "';";
        $resultado = $this->conexion->query($sql);

        return $resultado;
    }

    function get_tipo_anuncio($id_anuncio) {
        $sentence = "SELECT `compra`.`id_compra` FROM `compra` WHERE `compra`.`id_anuncio` = '" . $id_anuncio . "'";
        $result = mysqli_query($this->conexion, $sentence);

        if (mysqli_num_rows($result) > 0) {
            $tipo_anuncio = "compra";
        } else {
            $tipo_anuncio = "alquiler";
        }

        return $tipo_anuncio;
    }

}
