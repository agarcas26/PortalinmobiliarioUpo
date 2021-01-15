

        <?php
        include_once '../Controladores/UsuarioController.php';
        ?>

        <?php

        function getDatosPerfil($usuario) {
            return getUsuarioByUsuario($usuario);
        }

        function salvarCambios($datos) {
            actualizarDatosUsuario($datos);
        }
        ?>

