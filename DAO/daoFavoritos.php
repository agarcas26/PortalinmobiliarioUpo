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
        $sentence = "SELECT `favorito`.`id_anuncio` FROM `favorito`";
        $id_anuncios_favoritos = mysqli_query($this->conexion, $sentence);

        $anuncios = listAllAnuncios();

        while (mysqli_fetch_row($id_anuncios_favoritos)) {
            for ($i = 0; $i < sizeof($anuncios); $i++) {
                if ($anuncios[i][0] == $id_anuncios_favoritos) {
                    array_push($favoritos, $anuncios[i]);
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
