<!doctype html>
<html>
    <head>
        <title>Mis anuncios</title> 
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        include_once '../Controladores/AnunciosController.php';

        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body>
            <header class="masthead">
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                    <?php //aside_sesion_iniciada(); ?>
                </aside>
                <article>
                    <section>
                        <h4>Mis anuncios</h4>
                        <?php
                        listar_anuncios_usuario();
                        ?>
                    </section>
                </article>
            </main>
        </body>
        <?php
        include_once '../Vistas/footer.html';
        ?>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
