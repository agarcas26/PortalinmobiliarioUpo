<!doctype html>
<<html>
    <head>
        <title>Login Controller</title>
    </head>
    <body>
        <?php

        function controllerInicioSesion($nombre_usuario, $pass) {
            
            $usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING);
            
            $linea = array("", "", "");
            $con = mysqli_connect("localhost", "root", "", "PortalinmoviliariaUpo");
            if (!$con) {
                die(' No puedo conectar: ' . mysqli_error($con));
            }

            $sql = "SELECT * FROM `usuarios` WHERE user='" . $nombre_usuario . "'";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die('Error: ' . mysql_error($con));
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    $linea[0] = $row['user'];
                    $linea[1] = $row['pass'];
                    $linea[2] = $row['particular_profesional'];
                }
            }
            mysqli_close($con);
            return array('user' => $linea[0], 'pass' => $linea[1], 'particular_profesional' => $linea[2]);

            $filtros = Array(
                'user' => FILTER_SANITIZE_STRING,
                'pass' => FILTER_SANITIZE_STRING
            );
            $entradas = filter_input_array(INPUT_POST, $filtros);
            $result = getusuario($entradas[user]);

            
            modeloInicioSesion();
        }
        ?>
    </body>
</html>
