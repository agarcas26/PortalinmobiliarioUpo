<!doctype html>
<html>
    <head>
        <title></title>
        <?php
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>   
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                alert("No tiene acceso a esta seccion");
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
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>