<!doctype html>
<html>
    <head>
        <title>title</title>
        <?php
        include 'Controladores';
        ?>
    </head>
    <body>
        <h2>Iniciar sesion</h2>

        <form action="login.php" method="post">
            <div class="usuario">
                <label class="label" for="fijo">Usuario: </label>
                <input type="text" id="user" name="user">
            </div> 
            <div class="contraseña">
                <label class="label" for="fijo">Contraseña:  </label>
                <input type="password" id="pass" name="pass">
            </div> 
            <div class="entrar">
                <input type="submit" name="entrar" value="entrar" />
            </div> 
            <div class="registro">
                <input type="submit" name="registro" value="registro" />
            </div>
        </form>
        <?php
        
        
        
        function getusuario($nombre_usuario) {
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
        }

        if (isset($_POST['registro'])) {
            header('Location: registro.php');
        } elseif (isset($_POST['entrar'])) {

            $filtros = Array(
                'user' => FILTER_SANITIZE_STRING,
                'pass' => FILTER_SANITIZE_STRING
            );
            $entradas = filter_input_array(INPUT_POST, $filtros);
            $result = getusuario($entradas[user]);

            if ($entradas[user] == $result[0] && $entradas[pass] == $result[1]) {
                echo '<h1>Acceso permitido</h1>';

                session_start();
                if (!isset($_SESSION['user']))
                    $_SESSION['user'] = $entradas[user];
                else
                    $_SESSION['user'] = $entradas[user];

                if (getTipoUsusario($entradas[user]) = "Profesional")
                    header('Location: profesionales.php');

                if (getTipoUsusario($entradas[user]) = "Particular")
                    header('Location: particular.php');
            } else
                echo '<h1>Acceso denegado</h1>';
        }
        ?>
    </body>
</html>





