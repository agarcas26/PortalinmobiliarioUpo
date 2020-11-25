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
    </head>
    <body>
        <header>
            <div id="encabezado">
                <figure id="logo">
                    <img src="src" alt="Inmobiliaria UPO"/>
                </figure>

                <a href="login.php">¿Ya tienes cuenta?Inicia sesión</a>  
            </div>
            
            <a href="anunciate.php">Pon tu anuncio</a>
        </header>
        <nav id="buscador">
            <ul id="filtros">
                <li>Compra</li>
                <li>Alquiler</li>
                <li>Vacacional</li>
                <li>Apartamento</li>
                <li>Casa</li>
            </ul>
            <input type="text" id="barra_buscador" name="barra_buscador" value="" maxlength="100" />
        </nav>
        <aside id="ultimas_busquedas">
            <!-- Insertar galería de fotos de las últimas búsquedas -->
        </aside>
        <?php
        ?>
    </body>
</html>
