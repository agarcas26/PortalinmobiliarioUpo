<!doctype html>
<html>
    <head>
        <title>Mi perfil</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/aside.php';
        include_once '../Vistas/header.php';
        include_once '../Controladores/AnunciosController.php';
        include_once '../Controladores/AlertasController.php';
        include_once '../Controladores/FavoritosController.php';

        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body>
            <header class="masthead">
                <?php
                if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                    sesion_iniciada();
                } else {
                    no_sesion_iniciada();
                }
                ?>
            </header>
            <aside>
                <?php
//                if (isset($_SESSION['usuario_particular'])) {
//                    aside_sesion_iniciada();
//                } else {
//                    aside_sesion_no_iniciada();
//                }
                ?>
            </aside>
            <main>
                <article>
                    <section>
                        <a href="../Vistas/alta_inmueble.php">¿Quieres registrar un nuevo inmueble?</a>
                    </section>
                    <h4>Mis favoritos</h4>
                    <!-- Mostramos vista previa favoritos -->
                    <section>
                        <table>
                            <?php
                            if (!isset($_POST['ver_todos_favoritos'])) {
                                vista_previa_favoritos();
                            }
                            ?>
                            <form action="../Vistas/mis_favoritos.php" method="POST">
                                <input type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
                        </table>
                    </section>
                    <!-- Mostramos vista previa alertas -->
                    <h4>Mis alertas</h4>
                    <section>
                        <table>
                            <?php
                            if (!isset($_POST['ver_todas_alertas'])) {
                                vista_previa_alertas();
                            }
                            ?>
                            <form action="../Vistas/mis_alertas.php" method="POST">
                                <input type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
                        </table>
                    </section>
                    <h4>Mis anuncios</h4>
                    <!-- Mostramos vista previa anuncios -->
                    <section>
                        <table>
                            <?php
                            if (!isset($_POST['ver_todos_anuncios'])) {
                                vista_previa_anuncios();
                            }
                            ?>
                            <form action="../Vistas/mis_anuncios.php" method="POST">
                                <input type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
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
        header("Location: ../Vistas/login.php");
    }
    ?>
</html>
