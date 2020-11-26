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
                <br>
                Email: <input type="text" id="email" name="email" value="" />
                <br>
                Usuario: <input type="text" id="usuario" name="usuario" value="" />
                <br>
                Tipo de usuario:
                <br>
                <input required type="radio" name="tipo" id="profesional" value="profesional">
                <label for="profesional">Profesional</label>
                <br>
                <input type="radio" name="tipo" id="particular" value="particular">
                <label for="particular">Particular</label>
                <br>
                Contraseña: <input type="password" id="contrasena" name="contrasena" value="" />
                <br>
                Confirmar contraseña: <input type="password" id="conf_contrasena" name="conf_contrasena" value="" />

                <input type="submit" id="enviar" name="enviar" value="Confirmar registro" />
            </form>
            <?php
        } else {
            $nombre_usuario = $_POST['nombre_usuario'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            //Comprobar que no haya usuarios repetidos ni correos repetidos en la bbdd

            $filtros = Array(
                'nombre_usuario' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_STRING,
                'usuario' => FILTER_SANITIZE_STRING,
                'tipo' => FILTER_SANITIZE_STRING,
                'contrasena' => FILTER_SANITIZE_STRING,
                'conf_contrasena' => FILTER_SANITIZE_STRING
            );

            $con = mysqli_connect("localhost", "root", "", "PortalinmoviliariaUpo");
            if (!$con) {
                die(' No puedo conectar: ' . mysqli_error($con));
            }

            $entradas = filter_input_array(INPUT_POST, $filtros);
            $sql = "INSERT INTO person (nombre, email, user, particular_profesional, pass) VALUES ('$entradas[nombre_usuario]','$entradas[email]','$entradas[usuario]','$entradas[tipo]','$entradas[contrasena]')";

            if ($entradas[contrasena] === $entradas[conf_contrasena]) {
                $result = mysqli_query($con, $sql);
            }

            if (!$result) {
                die('Error: ' . mysql_error($con));
            } else {
                if (mysqli_num_rows($result) != 0) {
                    ?>
                    <h1>Registrado correctamente</h1>
                    <br>
                    <form action="registro.php" method="POST">
                        <input type="submit" id="enviar" name="aceptar" value="De acuerdo" />
                    </form>
                    <?php
                    mysqli_close($con);
                    if (isset($_POST['aceptar']))
                        header('Location: login.php');
                }
            }
        }
        ?>
    </body>
</html>