<?php

class Usuario {

    private $nombre_usuario;
    private $nombre_apellidos;
    private $contrasenya_user;
    private $moroso = false;
    private $tipo; //Se refiere a particular o profesional

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function set_nombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function get_nombre_usuario() {
        return $this->nombre_usuario;
    }

    function set_nombre_apellidos($nombre_apellidos) {
        $this->nombre_apellidos = $nombre_apellidos;
    }

    function get_nombre_apellidos() {
        return $this->nombre_apellidos;
    }

    function set_contrasenya_user($contrasenya_user) {
        $this->contrasenya_user = $contrasenya_user;
    }

    function get_contrasenya_user() {
        return $this->contrasenya_user;
    }

    function set_moroso($moroso) {
        $this->moroso = $moroso;
    }

    function get_moroso() {
        return $this->moroso;
    }

    function __construct($nombre_apellidos, $nombre_usuario, $pass, $moroso) {
        $this->set_nombre_apellidos($nombre_apellidos);
        $this->set_nombre_usuario($nombre_usuario);
        $this->set_contrasenya_user($contrasenya_user);
        $this->set_moroso($moroso);
    }

    function __toString() {
        return $this->get_nombre_usuario() . "," . $this->get_nombre_usuario() . "," . $this->get_contrasenya_user() . "," . $this->get_moroso();
    }
    
    function getTipoUsr(){
        if(is_a($this, "UsuarioParticular")){
            return "particular";
        }
        else{
            return "profesional";
        }
    }

}
