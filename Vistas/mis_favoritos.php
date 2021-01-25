<!doctype html>
<html>
    <head>
        <title>Mis favoritos</title> <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        include_once '../Controladores/FavoritosController.php';

        session_start();
        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body><header>
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                    <?php aside_sesion_iniciada(); ?>
                </aside>
                <article>
                    <section>
                        <table class="table-borderless">
                            <?php
                            get_favoritos_usuario();
                            ?>
                        </table>
                    </section>
                </article>
            </main>
        </body>
        <footer>
            <?php include_once '../PortalinmobiliarioUpo/Vistas/footer.html'; ?>
        </footer>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
