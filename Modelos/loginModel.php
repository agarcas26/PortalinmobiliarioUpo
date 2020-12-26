<!doctype html>
<html>
    <head>
        <title>LoginModel</title>
        <?php
        include_once '../Persistencia/Persistencia.php';
        ?>
    </head>
    <body>
        <?php

        function modeloInicioSesion($nombre_usuario, $pass) {
            $is_registrado = getUsuario($nombre_usuario, $pass);
        }
        ?>
    </body>
</html>
