<!doctype html>
<<html>
    <head>
        <title>Login Controller</title>
        <?php        
        include_once '../Modelos/loginModel.php';
        ?>
    </head>
    <body>
        <?php
        function controllerInicioSesion($nombre_usuario, $pass) {
            if (preg_match($pattern, $nombre_usuario) && preg_match($pattern, $pass)) {
                $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
                $pass = filter_var($pass, FILTER_SANITIZE_STRING);
                
                return modeloInicioSesion($nombre_usuario, $pass);
            } else {
                return "Introduzca unos datos válidos";
            }
        }
        ?>
    </body>
</html>
