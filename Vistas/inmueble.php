<!doctype html>
<html>
    <head>
        <title>Detalle inmueble</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/InmueblesController.php';
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
                    <h1><?php echo $dirección; ?></h1>
                    <ul class="img-fluid">
                        <?php 
                        //Galería de imágenes del inmueble
                        ?>
                    </ul>
                    <table>
                        <?php 
                        //Datos del inmueble
                        ?>
                    </table>
                    </section>
                    <section id="resenyas_inmueble">
                        <button id="nueva_resenya" onclick="nueva_resenya()">Escribir una reseña</button>
                        <?php
                        //Hacer una tabla por cada resenya asociada a este anuncio
                        ?>
                    </section>
                </article>
            </main> <?php
        }
        ?>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
