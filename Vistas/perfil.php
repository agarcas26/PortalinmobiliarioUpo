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
                if (isset($_SESSION['usuario_particular'])) {
                    aside_sesion_iniciada();
                } else {
                    aside_sesion_no_iniciada();
                }
                ?>
            </aside>
            <main>
                <article>
                    <section>
                        <a href="../Vistas/alta_inmueble.php">¿Quieres registrar un nuevo inmueble?</a>
                    </section>
                    <!-- Mostramos vista previa favoritos -->
                    <section>

                    </section>
                    <!-- Mostramos vista previa alertas -->
                    <section>

                    </section>
                    <!-- Mostramos vista previa anuncios -->
                    <section>
                        <?php
                        if (!isset($_POST['ver_todos'])) {
                            vista_previa_anuncios();
                        } else {
                            ver_todos_los_anuncios();
                        }
                        ?>
                        <table>

                            <form>
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
