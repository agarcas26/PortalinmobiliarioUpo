<!doctype html>
<html>
    <head>
        <title>Detalle inmueble</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <script src="../scripts.js"></script>
        <?php
        include_once 'header.php';
        include_once 'aside.php';
        include_once '../Controladores/InmueblesController.php';
        include_once '../Controladores/ResenyasController.php';
        ?>
    </head>
    <body>
        <header class="masthead">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif(isset($_SESSION['admin'])) {
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
                    <table>  
                      
                       
                        <?php
                       
                                                listar_inmuebles_usuarioAll();
                        ?>
                    </table>
                </section>
<!--                <section id="resenyas_inmueble">
                    <button id="nueva_resenya" onclick="nueva_resenya()">Escribir una reseña</button>
                    <?php
                    //Hacer una tabla por cada resenya asociada a este anuncio
                    ?>
                </section>-->
            </article>
        </main>
    </body>
    <?php
    include_once 'footer.html';
    ?>
</html>
