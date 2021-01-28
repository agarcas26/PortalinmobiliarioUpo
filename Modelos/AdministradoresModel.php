<?php

include_once '../DAO/AdministradoresCRUD.php';

class Administradores {

    private $nombre_usuario_admin;
    private $contrasenya_admin;
    
    function __construct($nombre_usuario, $pass) {
        $this->setNombre_usuario_admin($nombre_usuario);
        $this->setContrasenya_admin($pass);
    }

    function getNombre_usuario_admin() {
        return $this->nombre_usuario_admin;
    }

    function getContrasenya_admin() {
        return $this->contrasenya_admin;
    }

    function setNombre_usuario_admin($nombre_usuario_admin) {
        $this->nombre_usuario_admin = $nombre_usuario_admin;
    }

    function setContrasenya_admin($contrasenya_admin) {
        $this->contrasenya_admin = $contrasenya_admin;
    }
    
    
}
