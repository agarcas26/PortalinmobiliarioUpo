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
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/registroController.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <article>
                <section>
                    <form action="../Controladores/registroController.php" method="POST">
                        <div class="form-group">
                        Nombre: <input class="form-control" type="text" id="nombre_usuario" name="nombre_usuario" value="" />
                        <br>
                        </div>
                        <div class="form-group">
                        Usuario: <input class="form-control" type="text" id="usuario" name="usuario" value="" />
                        <br>
                        </div>
                        <div class="form-check">
                        Tipo de usuario:
                        <br>
                        <input class="form-check-input" required type="radio" name="tipo" id="profesional" value="profesional">
                        <label class="form-check-label" for="profesional">Profesional</label>
                        <br>
                        <input class="form-check-input" type="radio" name="tipo" id="particular" value="particular">
                        <label class="form-check-label" for="particular">Particular</label>
                        <br>
                        </div>
                        <div class="form-group">
                        Contraseña: <input class="form-control" type="password" id="contrasena" name="contrasena" value="" />
                        <br>
                        </div>
                        <div class="form-group">
                        Confirmar contraseña: <input class="form-control" type="password" id="conf_contrasena" name="conf_contrasena" value="" />
                        </div>
                        <input class="btn btn-primary" type="submit" id="enviar" name="enviar" value="Confirmar registro" />
                    </form>
                </section>
            </article>
        </main>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>