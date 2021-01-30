<!doctype html>
<html>
    <head>
        <title>Detalle inmueble</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/AnunciosController.php';
        include_once '../Controladores/ResenyasController.php';
        include_once '../Controladores/valoracionController.php';
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
        <?php
        if (!isset($_POST['realizar_busqueda'])) {
            $dirección;
            $datos;
            ?>
            <main>
                <article>
                    <section id="detalle_anuncio">
                        <table id="datos_visa" class="display table-bordered" style="width:100%">
                            <?php
                            mostrar_detalle_anuncio($_GET["id_anuncio"]);
                            ?>
                        </table>
                        <span class="favorito" val="inactiva">
                            <img class="corazon" id="inactiva" src="../img/nofav.png">
                        </span>
                        <span class="alerta" val="inactiva">
                            <img class="campana" id="inactiva" src="../img/noalerta.png">
                        </span>
                    </section>
                    <section>
                        <?php
                        resenyas_anuncio($_GET["id_anuncio"]);
                        mostrarValorar($_GET["id_anuncio"]);
                        ?>
                    </section>
                </article>
            </main> 
            <?php
        }
        ?>
    </body>
    <br>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
