<!doctype html>
<html>
    <head>
        <?php
        include_once '../Modelos/UsuarioModel.php';
        ?>
    </head>
    <body>
        <?php
        function getUsuarioByUsuario($usuario) {
        if(getUsuario_usuario($usuario)){
        return true;
        }else{
        return false;
        }
        }

        function nuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo){
        crearNuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo);
        }

        function actualizarDatosUsuario($datos){
        //Sanear y filtrar las entradas


        }
        ?>
    </body>
</html>