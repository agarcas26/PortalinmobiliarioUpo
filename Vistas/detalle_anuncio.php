<!doctype html>
<html>
    <head>
        <title>Detalle inmueble</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <script src="../scripts.js"></script><script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/AnunciosController.php';
        include_once '../Controladores/ResenyasController.php';
        ?>
    </head>
    <body>
        <header class="masthead">
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
        <?php
        if (!isset($_POST['realizar_busqueda'])) {
            $dirección;
            $datos;
            ?>
            <main>
                <article>
                    <section id="detalle_inmueble">
                        <table>
                            <?php
                            mostrar_detalle_anuncio($_GET["id_anuncio"]);
                            ?>
                        </table>
                    </section>
                    <section>
                        <?php
                        resenyas_anuncio($_GET["id_anuncio"]);
                        mostrarValorar();
                        ?>
                          <script type="text/javascript">

                $(document).ready(function () {
                    muestraEstrellas();
                });
            </script>
                    </section>
                </article>
            </main> 
            <?php
        }
        ?>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
