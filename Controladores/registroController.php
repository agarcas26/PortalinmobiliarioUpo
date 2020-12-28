<!doctype html>
<html>
    <head>
        <title>registroController</title>
        <?php
        include_once '../Modelos/registroModel.php';
        ?>
    </head>
    <body>
        <?php

        function registroController($nombre_usuario, $email, $usuario, $pass) {

            if (preg_match($nombre_usuario, "^(?!.* (?: |$))[A-Z][a-z ]+$") && preg_match($email, "/^[\w]+@{1}[\w]+\.[a-z]{2,3}$/") && preg_match($usuario, "^@?(\w){1,15}") && preg_match($pass, "^(?![a-z]*$)(?![A-Z]*$)(?!\d*$)(?")) {
                filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
                filter_var($email, FILTER_SANITIZE_EMAIL);
                filter_var($usuario, FILTER_SANITIZE_MAGIC_QUOTES);
                filter_var($pass, FILTER_SANITIZE_MAGIC_QUOTES);

                return registroModel($nombre_usuario, $email, $usuario, $pass);
            }else{
                return "Los datos introducidos no son válidos";
            }
        }
        ?>
    </body>
</html>
