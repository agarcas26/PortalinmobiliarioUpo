
        <?php

class Usuario {

    private $nombre_usuario;
    private $nombre_apellidos;
    private $contrasenya_user;
    private $moroso = false;

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

            function getUsuario_usuario($usuario) {
                $listado_usuarios = leer_usuarios();
                $enc = false;
                while (!$enc && mysqli_fetch_array($listado_usuarios)) {
                    if ($listado_usuarios[0] == $usuario) {
                        $enc = true;
                    }
                }

                return $enc;
            }

            function crearNuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo) {
                crear_usuario($nombre_usuario, $contrasenya, $usuario, $email, "false", $tipo);
            }

            function actualizarDatosUsuario($datos) {
                modificar_usuario($nuevos_datos);
            }

        }
        
    
