<!doctype html>
<html>
    <head>
        <title>Mi perfil</title>
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
            <header>
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
                        <a href="../PortalinmobiliarioUpo/Vistas/alta_inmueble.html">¿Quieres registrar un nuevo inmueble?</a>
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
                        $anuncio = vista_previa_anuncios();
                        ?>
                        <table>
                            <tr>
                                <td>
                                    <figure>
                                        <!-- Imagen -->
                                    </figure>
                                </td>
                                <td>
                                    <?php echo $anuncio[0] . " " . $anuncio[2] . " " . $anuncio[1] ?>
                                </td>
                                <td>
                                    <?php echo $anuncio[8] ?>
                                </td>
                                <td>
                                    <?php echo $anuncio[7] ?>
                                </td>
                            </tr>
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
