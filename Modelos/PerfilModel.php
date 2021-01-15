<!doctype html>
<html>
    <head>
        <title>title</title>
        <?php
        include_once '../Controladores/UsuarioController.php';
        ?>
    </head>
    <body>
        <?php

        function getDatosPerfil($usuario) {
            return getUsuarioByUsuario($usuario);
        }

        function salvarCambios($datos) {
            actualizarDatosUsuario($datos);
        }
        ?>
    </body>
</html>
