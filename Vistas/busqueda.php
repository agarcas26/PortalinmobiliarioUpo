<!doctype html>
<html>
    <head>
        <title></title>
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
    <footer class="footer bg-light">
        <?php
        include_once '../Vistas/footer.html';
        ?>
    </footer>
</html>
