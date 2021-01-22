<!doctype html>
<html>
    <head>
        <title>Mis alertas</title>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
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
