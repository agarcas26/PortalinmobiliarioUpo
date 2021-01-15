
        <?php
        include_once '../Modelos/loginModel.php';
        
        if (isset($_POST['entrar'])) {
            if (controllerInicioSesion($_POST['user'], $_POST['pass']) == true) {
                $_SESSION['usuario'] = $_POST['user'];
                header("Location: index.php");
            } else {
                echo controllerInicioSesion($_POST['user'], $_POST['pass']);
            }
        }

        if (isset($_POST['registro'])) {
            header("Location: registro.php");
        }

        function controllerInicioSesion($nombre_usuario, $pass) {
            if (preg_match($pattern, $nombre_usuario) && preg_match($pattern, $pass)) {
                $nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
                $pass = filter_var($pass, FILTER_SANITIZE_STRING);

                return modeloInicioSesion($nombre_usuario, $pass);
            } else {
                return "Introduzca unos datos válidos";
            }
        }
