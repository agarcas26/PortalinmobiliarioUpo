<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>   
        <header>
            <ul>
                <li><img src="" alt="Logo"></li>
                <li><a href="">Inmobiliaria UPO</a></li>
                <li><input type="text" name="buscador"/></li>
                <li><a href="login.php">Mi cuenta</a></li>
                <li><a href="anunciate.php">Publica tu anuncio gratis</a></li>
            </ul>
            <ul>
                <!-- Filtros -->
            </ul>
        </header>
        <main>
            <label>Mostrando <!-- Insertar numero de resultados --> resultados</label>
            <select id="ordenar_por">
                <option value="fecha">Los más actualizados</option>
                <option value="valoracion">Mejor valorados</option>
                <option value="baratos">Más baratos primero</option>
            </select>
            <!-- OPCION LISTA / CUADRICULA -->
            <form action="busquedaController.php" method="GET">
                <input type="submit" value="Lista" />
                <input type="submit" value="Cuadricula" />
            </form>
            
            <!-- ANUNCIOS -->
        </main>
        <?php
        ?>
    </body>
    <footer>
        
    </footer>
</html>
