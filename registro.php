<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regístrate</title>
    </head>
    <body>
        <?php

        function conexion1__bbdd() {
            $host = 'localhost';
            $dbname = 'inmobiliaria';
            $port = 3306;
            $username = 'root';
            $passwd = '';
            return mysqli_connect($host, $username, $passwd, $dbname);
        }

        if (!isset($_POST['enviar'])) {
            ?>
            <form action="registro.php" method="POST">
                Nombre: <input type="text" id="nombre_usuario" name="nombre_usuario" value="" />
                Email: <input type="text" id="email" name="email" value="" />
                Usuario: <input type="text" id="usuario" name="usuario" value="" />
                Contraseña: <input type="password" id="contrasena" name="contrasena" value="" />
                Confirmar contraseña: <input type="password" id="conf_contrasena" name="conf_contrasena" value="" />

                <input type="submit" id="enviar" name="enviar" value="Confirmar registro" />
            </form>
            <?php
        } else {
            $nombre_usuario = $_POST['nombre_usuario'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            //Comprobar que no haya usuarios repetidos ni correos repetidos en la bbdd

            $contrasena = $_POST['contrasena'];
            $conf_contrasena = $_POST['conf_contrasena'];

            if ($contrasena === $conf_contrasena) {
                //Insertamos los datos en la bbdd
            }
        }
        ?>
    </body>
</html>