<!doctype html>
<html>
    <head>
        <?php
        include_once '../DAO/AdministradoresCRUD.php';
        ?>
    </head>
    <body>
        <?php

        function comprobar_administrador($usuario, $pass) {
            $listado_admin = listar_administradores();
            $encontrado = false;
            while (!encontrado && myqli_fetch_array($listado_admin)) {
                if($listado_admin[0] == $usuario && $listado_admin[1] == $pass){
                   $encontrado = true;
                }
            }
            
            return $encontrado;
        }
        ?>
    </body>
</html>