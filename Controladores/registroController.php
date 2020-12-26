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
        function registroController($nombre_usuario, $email, $usuario, $pass){
            $filtros = Array(
                'nombre_usuario' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_STRING,
                'usuario' => FILTER_SANITIZE_STRING,
                'tipo' => FILTER_SANITIZE_STRING,
                'contrasena' => FILTER_SANITIZE_STRING,
                'conf_contrasena' => FILTER_SANITIZE_STRING
            );
            
        }
        ?>
    </body>
</html>
