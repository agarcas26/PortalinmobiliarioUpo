
        <?php
        include_once '../Model/PerfilModel.php';
    
        if (isset($_POST['logout'])) {
            unset($_SESSION['user']);
            header('Location: login.php');
        }

        if (isset($_POST['guardar'])) {
            salvarCambiosController($datos, $_POST['pass'], $_POST['nueva_pass'], $_POST['conf_nueva_pass']);
        }

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
            } else {
                return "Introduzca correctamente su contraseña actual";
            }
        }
        

