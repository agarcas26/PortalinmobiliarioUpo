<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Controladores/AnunciosController.php';

class daoFavoritos {

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

    function listar_favoritos() {
        $favoritos = [];
        $sentence = "SELECT `favorito`.`id_anuncio` FROM `favorito`";
        $id_anuncios_favoritos = mysqli_query($this->conexion, $sentence);

        while ($id_anuncio = mysqli_fetch_row($id_anuncios_favoritos)) {
            $anuncios = listAllAnuncios();
            while ($anuncio = mysqli_fetch_row($anuncios)) {
                if ($anuncio[0] == $id_anuncio[0]) {
                    array_push($favoritos, $anuncio);
                }
            }
        }

        return $favoritos;
    }

    function listar_favoritos_user($usuario) {
        $favoritos = [];
        $sentence = "SELECT `favorito`.`id_anuncio` FROM `favorito` WHERE `nombre_usuario`='" . $usuario . "';";
        $id_anuncios_favoritos = mysqli_query($this->conexion, $sentence);

        while ($id_anuncio = mysqli_fetch_row($id_anuncios_favoritos)) {
            $anuncios = listAllAnuncios();
            while ($anuncio = mysqli_fetch_row($anuncios)) {
                if ($anuncio[0] == $id_anuncio[0]) {
                    array_push($favoritos, $anuncio);
                }
            }
        }

        return $favoritos;
    }

    function crear_favorito($id_anuncio, $nombre_usuario) {
        $sentence = "INSERT INTO `favorito` (`id_anuncio`,`nombre_usuario`) VALUES ('" . $id_anuncio . "','" . $nombre_usuario . "')";
        $result = mysqli_query($this->conexion, $sentence);
    }

    function eliminar_favorito($id_anuncio) {
        $sentence = "DELETE FROM `favorito` WHERE `id_anuncio`='" . $id_anuncio . "'";
        $result = mysqli_query($this->conexion, $sentence);
    }

}
