
        <?php
        include_once '../Persistencia/UsuarioCRUD.php';
        ?>

        <?php

        function modeloInicioSesion($nombre_usuario, $pass) {
            //mejor en SQL(?)
            $usuarios = leer_usuarios();

            if (sizeof($usuarios) > 0) {
                while (!$encontrado) {
                    //comparamos los usuarios hasta que haya match
                }
            }
            
            if($encontrado){
                return true;
            }
        }
        ?>
