<!doctype html>
<html>
    <head>
        <title>Mis alertas</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        include_once '../Controladores/AlertasController.php';
        include_once '../Controladores/busquedaController.php';
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
                <article class="">
                    <section>
                        <h4>Mis alertas</h4>
                        <?php
                        get_alertas_usuario();
                        ?>
                    </section>
                </article>
            </main>
        </body>
        <?php
        include_once 'footer.html';
        ?>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
