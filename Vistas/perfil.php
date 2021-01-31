<!doctype html>
<html>
    <head>
        <title>Mi perfil</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
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
            <header class="masthead text-white text-center">
                <?php
                if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                    sesion_iniciada();
                } elseif (isset($_SESSION['admin'])) {
                    cabecera_admin();
                } else {
                    no_sesion_iniciada();
                }
                ?>
            </header>

            <main>
                <article>
                    <section>
                        <a style="float:right;" href="../Vistas/alta_inmueble.php"><button class="btn btn-primary">¿Quieres registrar un nuevo inmueble?</button></a>
                    </section>
                    <section>
                        <a style="float:right;" href="../Vistas/modificar_perfil.php"><button class="btn btn-primary">Configuración del perfil</button></a>
                    </section>
                    <h4>Mis favoritos</h4>
                    <!-- Mostramos vista previa favoritos -->
                    <section>
                        <table class="display table-bordered" style="width:100%">
                            <?php
                            if (!isset($_POST['ver_todos_favoritos'])) {
                                vista_previa_favoritos();
                            }
                            ?>
                            <form action="../Vistas/mis_favoritos.php" method="POST">
                                <input class="btn btn-primary" type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
                        </table>
                    </section>

                    <h4>Mis alertas</h4>
                    <section>
                        <table class="display table-bordered" style="width:100%">
                            <?php
                            if (!isset($_POST['ver_todas_alertas'])) {
                                vista_previa_alertas();
                            }
                            ?>
                            <form action="../Vistas/mis_alertas.php" method="POST">
                                <input class="btn btn-primary" type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
                        </table>
                    </section>
                    <h4>Mis anuncios</h4>

                    <section>
                        <table class="display table-bordered" style="width:100%">
                            <?php
                            if (!isset($_POST['ver_todos_anuncios'])) {
                                vista_previa_anuncios();
                            }
                            ?>
                            <form action="../Vistas/mis_anuncios.php" method="POST">
                                <input class="btn btn-primary" type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
                        </table>
                    </section>
                    <h4>Mis Inmuebles</h4>

                    <section>
                        <table class="display table-bordered" style="width:100%">
                            <?php
                            if (!isset($_POST['ver_todos_inmuebles'])) {
                                listar_inmuebles_usuario();
                            }
                            ?>
                            <form action="inmueble.php" method="POST">
                                <input class="btn btn-primary" type="submit" name="ver_todos" id="ver_todos" value="Ver todos" />
                            </form>
                        </table>
                    </section>
                </article>
            </main>
        </body>
        <?php
        include_once 'footer.html';
        ?>
        <?php
    } else {
        header("Location: ../Vistas/login.php");
    }
    ?>
</html>
