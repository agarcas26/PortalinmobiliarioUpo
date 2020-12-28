<!doctype html>
<html>
    <head>
        <?php
        include_once '../Modelos/AdministradoresModel.php.php';
        ?>
    </head>
    <body>
        <?php

        function iniciar_sesion_administrador($usuario, $pass) {
            return comprobar_administrador($usuario, $pass);
        }
        ?>
    </body>
</html>