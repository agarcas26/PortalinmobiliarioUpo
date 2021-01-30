<!doctype html>
<html>
    <head>
        <title>Detalle inmueble</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once 'header.php';
        include_once 'aside.php';
        include_once '../Controladores/InmueblesController.php';
        include_once '../Controladores/ResenyasController.php';
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
                <section id="detalle_inmueble">
                    <h1></h1>
                    <ul class="img-fluid">
                        <?php
                        //Galería de imágenes del inmueble
                        ?>
                    </ul>
                    <table id="datos_visa" class="display table-bordered" style="width:100%">
                        <?php
                        listar_inmuebles_usuarioAll();
                        ?>
                    </table>
                </section>
<
                </section>-->
            </article>
        </main>
    </body>
    <?php
    include_once 'footer.html';
    ?>
</html>
