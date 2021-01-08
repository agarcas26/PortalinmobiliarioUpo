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
            <form action="Busqueda.php" method="POST">
                <select multiple id="filtros">
                    <option>Compra</option>
                    <option>Alquiler</option>
                    <option>Vacacional</option>
                    <option>Apartamento</option>
                    <option>option</option>
                </select>
                <input type="text" id="barra_buscador" name="barra_buscador" value="" maxlength="100" />
                <input type="submit" id="realizar_busqueda" name="realizar_busqueda" value="Buscar" />
            </form>
        </nav>
        <aside id="ultimas_busquedas">
            <!-- Insertar galería de fotos de las últimas búsquedas -->
        </aside>
        <article>
            <?php
//            if (isset($_POST['realizar_busqueda'])) {
//                $palabras_clave = split(' ', $_POST['barra_buscador']);
//                
//                foreach($_POST['filtros'] as $filtro){
//                    $palabras_clave .= $filtro;
//                }
//                
//                //Buscamos en la bbdd aquellos inmuebles que contentan las palabras clave
//            }
//            ?>
        </article>

    </body>

    <?php ?>
</body>
</html>
