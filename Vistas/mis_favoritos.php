<!doctype html>
<html>
    <head>
        <title>Mis favoritos</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        include_once '../Controladores/FavoritosController.php';

        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body>
            <header class="masthead text-white text-center">
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                </aside>
                <article>
                    <section>
                        <h4>Mis favoritos</h4>
                        <?php
                        get_favoritos_usuario();
                        ?>
                    </section>
                </article>
            </main>
        </body>
        <footer>
            <?php include_once 'footer.html'; ?>
        </footer>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
