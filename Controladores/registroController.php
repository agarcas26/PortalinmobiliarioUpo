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
        $nombre_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $pass = $_POST['conf_contrasena'];
        $tipo = $_POST['tipo'];
        registroController($nombre_usuario, $email, $usuario, $pass, $tipo);

        function registroController($nombre_usuario, $email, $usuario, $pass, $tipo) {

            if (preg_match($nombre_usuario, "^(?!.* (?: |$))[A-Z][a-z ]+$") && preg_match($email, "/^[\w]+@{1}[\w]+\.[a-z]{2,3}$/") && preg_match($usuario, "^@?(\w){1,15}") && preg_match($pass, "^(?![a-z]*$)(?![A-Z]*$)(?!\d*$)(?") && preg_match($tipo, "^(?!.* (?: |$))[A-Z][a-z ]+$")) {
                filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
                filter_var($email, FILTER_SANITIZE_EMAIL);
                filter_var($usuario, FILTER_SANITIZE_MAGIC_QUOTES);
                filter_var($pass, FILTER_SANITIZE_MAGIC_QUOTES);
                filter_var($tipo, FILTER_SANITIZE_STRING);

                if (registroGetUsuario($usuario) == NULL) {
                    registroNuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo);
                }
                return "Usuario registrado con exito";
            } else {
                return "Los datos introducidos no son válidos";
            }
        }
        ?>
    </body>
</html>
