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
        <?php
        include_once '../Controladores/registroController.php';
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <?php
            if (!isset($_POST['enviar'])) { //esto va en el controlador no en la vista
                ?>
                <form action="registroController.php" method="POST">
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
            }
            ?>
        </main>
    </body>
    <footer class="footer bg-light">
        <?php
        include_once '../Vistas/footer.html';
        ?>
    </footer>
</html>