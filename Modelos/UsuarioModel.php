<!doctype html>
<html>
    <head>
        <?php
        include_once '../DAO/UsuarioCRUD.php';
        ?>
    </head>
    <body>
        <?php

        class Usuario {

            private $usuario_pk;
            private $particular_profesional;
            private $contrasenya;
            private $listas = [];
            private $moroso;

            function set_usuario_pk($usuario) {
                $this->usuario_pk = $usuario;
            }

            function get_usuario_pk() {
                return $this->usuario_pk;
            }

            function set_particular_profesional($particular_profesional) {
                $this->particular_profesional = $particular_profesional;
            }

            function get_particular_profesional() {
                return $this->particular_profesional;
            }

            function set_contrasenya($contrasenya) {
                $this->contrasenya = $contrasenya;
            }

            function get_contrasenya() {
                return $this->contrasenya;
            }

            function set_listas($nueva_lista) {
                $this->listas = $nueva_lista;
            }

            function get_listas() {
                return $this->listas;
            }

            function set_moroso($moroso) {
                $this->moroso = $moroso;
            }

            function get_moroso() {
                return $this->moroso;
            }

            function getUsuario_usuario($usuario) {                
                var $listado_usuarios = leer_usuarios();
                var $enc = false;
                while (!$enc && mysqli_fetch_array($listado_usuarios)) {
                    if($listado_usuarios[0] == $usuario){
                        $enc = true;
                    }
                }
                
                return $enc;
            }
            
            function crearNuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo){
                crear_usuario($nombre_usuario, $contrasenya, $usuario, $email, "false", $tipo);
            }
        }
        ?>
    </body>
</html>