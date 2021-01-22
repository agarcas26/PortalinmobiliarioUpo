<!doctype html>
<html>
    <head>
        <title>Mis favoritos</title> <?php
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
                <article>
                    <section>
                        <table>
                            <?php
                            $favoritos = get_favoritos_usuario();

                            while (mysqli_fetch_array($favoritos)) {
                                echo '<tr>';
                                echo '<td>' . '</td>';
                                echo '</tr>';
                            }
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
