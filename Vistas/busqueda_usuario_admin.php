<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <title></title>
        <?php
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>   
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                echo"No tiene acceso a esta seccion";
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <label>Mostrando resultados</label>
            <form action="../Vistas/busqueda_usuario_admin.php" method="GET">
                <input type="text" id="user" name="user" class="form-text">
                <input type="submit" name="busuario" value="Buscar" />
            </form>
            <?php
            include_once '../Controladores/busquedaUsuarioController_admin.php';
            if(!isset($_GET['busuario'])){
                listar_usuarios();
            }
            ?>
        </main>
    </body>
    <?php
    include_once 'footer.html';
    ?>
</html>
