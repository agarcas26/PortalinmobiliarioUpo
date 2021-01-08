<!doctype html>
<html>
    <head>
        <title></title>
        <?php
        include_once '../scripts.js';
        ?>
    </head>
    <body>   
        <header>
            <script src="scripts.js">
                header();
            </script>
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
        <script src="scripts.js">
                footer();
        </script>
    </footer>
</html>
