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
            <input type="text" id="user" name="user" class="form-text">
            <!-- OPCION LISTA / CUADRICULA -->
            <form action="busquedaUsuarioController_admin.php" method="GET">
                <input type="submit" name="busuario" value="Buscar" />
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
