<!doctype html>
<html>
    <head>
        <title>Mis alertas</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        include_once '../Controladores/AlertasController.php';
        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body><header>
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                </aside>
                <article class="">
                    <section>
                        <table>
                            <?php
                            get_alertas_usuario();
                            ?>
                        </table>
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
