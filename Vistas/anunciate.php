<!doctype html>
<html>
    <head>
        <title>Publica ya tu anuncio</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
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
            <?php
            if (!isset($_POST['guardar'])) {
                ?>
                <h3>Alta de un nuevo anuncio </h3>
                <form class="form-control-plaintext" action="../Controladores/AnunciosController.php" method="POST">
                    <table id="datos_visa" class="display table-bordered" style="width:100%">
                        <tr>
                            <td>
                                <label>Añade un título a tu anuncio</label>
                            </td>
                            <td>
                                <input type="text" name="txtTitulo" id="txtTitulo" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Puedes seleccionar uno de tus inmuebles</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select id="inmuebles_usuario" type="picker" label="Tus inmuebles" display="" aria-invalid="false" class="dropdown-menu">
                                    <?php
                                    select_inmuebles_usuario();
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>O bien puedes <a href="../Vistas/alta_inmueble.php"><button>Dar de alta un nuevo inmueble</button></a></label>
                            </td>
                        </tr>
                        <tr>
                        <input type="submit" name="guardar" class="btn-success" value="Guardar">
                        </tr>
                    </table>
                </form>
                <?php
            }
            ?>
        </main>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
