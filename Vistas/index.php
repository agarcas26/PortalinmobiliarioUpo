<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido, ¿qué buscas?</title>
        <?php
        include_once '../header.php';
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
        <?php
        if (!isset($_POST['realizar_busqueda'])) {
            ?>
            <main>
                <nav id="buscador" class="navbar navbar-light bg-light static-top">
                    <form action="../Controladores/indexController.php" method="POST">
                        <select multiple id="filtros">
                            <option>Compra</option>
                            <option>Alquiler</option>
                            <option>Vacacional</option>
                            <option>Apartamento</option>
                            <option>option</option>
                        </select>
                        <input type="text" id="barra_buscador" name="barra_buscador" value="" maxlength="100" />
                        <button type="submit" class="btn btn-block btn-lg btn-primary" id="realizar_busqueda" name="realizar_busqueda" value="Buscar" />
                    </form>
                </nav>
                <aside id="ultimas_busquedas">
                    <!-- Insertar galería de fotos de las últimas búsquedas -->
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"></li>
                    </ul>
                </aside>
                <article>
                </article>
            </main>
            <?php
        }
        ?>


        <script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
        <script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    <footer class="footer bg-light">
        <?php
        include_once '../Vistas/footer.html';
        ?>
    </footer>
</html>
