<!doctype html>
<html>
    <head>
        <title></title>
        <?php
        include_once '../Model/PerfilModel.php';
        ?>
    </head>
    <body>
        <?php

        function getDatosPerfil($usuario) {
            return getDatosPerfil($usuario);
        }

        function salvarCambiosController($datos, $pass, $nueva_pass, $conf_nueva_pass) {
            if ($datos[sizeof($datos) - 1] == $pass) {
                if ($nueva_pass != NULL) {
                    if ($nueva_pass == $conf_nueva_pass) {
                        //Filtrar y sanear las entradas
                        $datos[sizeof($datos) - 1] = $nueva_pass;
                        salvarCambios($datos);
                    }
                } else {
                    return "Las contraseñas no coinciden";
                }
            }else{
                return "Introduzca correctamente su contraseña actual";
            }
        }
        ?>
    </body>
</html>
