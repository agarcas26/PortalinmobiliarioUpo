<!doctype html>
<html>
    <head>
        <title>Mis alertas</title>
        <?php
        include_once '../PortalinmobiliarioUpo/header.php';
        include_once '../PortalinmobiliarioUpo/aside.php';
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
        <footer>
            <?php include_once '../PortalinmobiliarioUpo/Vistas/footer.html'; ?>
        </footer>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
