<!doctype html>
<html>
    <head>
        <title>Mis anuncios</title> <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        include_once '../Controladores/AnunciosController.php';

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
                        <table id="anuncios">
                            <?php
                            $anuncios = listar_anuncios_usuario();
                            while (mysqli_fetch_array($anuncios)) {
                                echo '<tr>';
                                echo '<td><figure></figure></td>';
                                echo '<td>' . $anuncios[2] . '</td>';
                                echo '<td>' . $anuncios[1] . '</td>';
                                echo '<td>' . $anuncios[3] . '</td>';
                                echo '<td>' . $anuncios[4] . '</td>';
                                echo '<td>' . $anuncios[7] . '</td>';
                                echo '<td>' . $anuncios[8] . '</td>';
                                echo '</tr>';
                            }
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
