
<!doctype html>
<html>
    <head>
        <title>Detalle inmueble</title>
        <link rel = "stylesheet" href = "../Bootstrap/css/landing-page.css"/>
        <link rel = "stylesheet" href = "../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/InmueblesController.php';
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
        if (!isset($_POST['ver_detalle'])) {
            ?>
            <main>
                <article>
                    <section id="ver_detalle">
                        <table id="datos_visa" class="display table-bordered" style="width:100%">


                            <form  action='../Controladores/InmueblesController.php' method='POST' style="margin-left:10px;">
                                <table id="datos_visa" class="display table-bordered" style="width:50%">
                                    <table id="datos_visa" class="display table-bordered" style="width:50%">
                                        <tr>
                                            <td>
                                                <label>¿Desea eliminar este inmueble?</label>
                                            </td>
                                        </tr>
                                        <?php
                                        getInmuebleByDireccion($_GET['direccion']);
                                        ?>
                                       
                                    </table>
                            </form>
                        </table>
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



