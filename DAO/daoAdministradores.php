<!doctype html>
<html>
    <head>
        <?php
        include_once '../Persistencia/Conexion.php';
        ?>
    </head>
    <body>
        <?php

        function listar_administradores() {
            $sentence = "SELECT * FROM `administradores`";
            $result = mysqli_query($conexion, $sentence);
        }

        function get_administrador($nombre_usuario_admin, $contrasenya_admin) {
            $sentence = "SELECT * FROM `administradores` WHERE `administradores`.`nombre_usuario_admin` = '" . $nombre_usuario_admin . "' and `administradores`.`contrasenya_admin` = '" . $contrasenya_admin . "';";
            $result = mysqli_query($conexion, $sentence);

            return mysqli_fetch_row($result);
        }
        ?>
    </body>
</html>