<?php

include_once '../Modelos/UsuarioModel.php';
include_once '../Modelos/modelo_anuncios.php';
include_once '../Dao/daoanuncios.php';

session_start();

$anuncio1 = new anuncios();

$anuncio1->setDireccion($_POST["direccion"]);
$anuncio1->setIdAnuncio($_POST["idAnuncio"]);
$anuncio1->setPrecio($_POST["precio"]);
$anuncio1->setUsuario_pk($_POST["usuario_pk"]);

$daoAnuncio = new daoanuncios();

$daoAnuncio->insertar($anuncio1);

header('Location: ../Vistas/perfil.php ');
//TENGO QUE AÑADIR COSAS AUN 