<!doctype html>
<html>
    <head>
        <?php
        include_once '../Controladores/registroController.php';
        include_once '../Controladores/UsuarioController.php';
        ?>
    </head>
    <body>
        <?php
        
        function registroGetUsuario($usuario){
            return getUsuarioByUsuario($usuario);            
        }
        
        function registroNuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo){
            nuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo);
        }
        
        ?>
    </body>
</html>