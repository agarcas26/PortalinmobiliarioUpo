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
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead">
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
                <nav style="display: inline-block" id="buscador" class="navbar navbar-light bg-light static-top">
                    <form action="../Controladores/indexController.php" method="POST">
                        <select type="multiple" class="dropdown-item" id="filtros">
                            <option>Compra</option>
                            <option>Alquiler</option>
                            <option>Vacacional</option>
                            <option>Apartamento</option>
                        </select>
                        <input type="text" style="width: 250%" id="barra_buscador" class="" name="barra_buscador" value="" maxlength="100" />
                        <button type="submit" class="btn btn-block btn-lg btn-primary" id="realizar_busqueda" name="realizar_busqueda" >Buscar</button>
                    </form>
                </nav>
                <aside id="ultimas_busquedas">                    
                </aside>
                <h1>Tus últimas búsquedas</h1>
                    <ul class="list-inline mb-0">
                        <?php 
                        $ultimas_busquedas = get_ultimas_busquedas_usuario();
                        while(mysqli_fetch_row($ultimas_busquedas)){
                            echo '<li>'.'</li>';
                        }
                        ?>
                    </ul>
                    <h1>Lo más buscado</h1>
                    <ul class="list-inline mb-0">
                        <?php 
                        $ultimas_busquedas = get_ultimas_busquedas();
                        while(mysqli_fetch_row($ultimas_busquedas)){
                            echo '<li>'.'</li>';
                        }
                        ?>
                    </ul>
                <article>
                </article>
            </main>
            <?php
        }
        ?>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
