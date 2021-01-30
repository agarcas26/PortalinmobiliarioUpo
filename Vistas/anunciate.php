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
        <main>
            <?php
            if (!isset($_POST['guardar'])) {
                ?>
                <h3>Alta de un nuevo anuncio </h3>
                <form class="form-control-plaintext" action="../Controladores/AnunciosController.php" method="POST">
                    <table id="datos_visa" class="display table-bordered" style="width:100%">
                        <tr>
                            <td>
                                <label>¿Quiere publicar un anuncio de vacacional, compra o alquiler?</label>
                            </td>
                            <td>
                                <select>
                                    <option value="alquiler">Vacacional</option>
                                    <option value="alquiler">Alquiler</option>
                                    <option value="compra">Compra</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ponga un precio</label>
                            </td>
                            <td>
                                <input type="number" step="0.01" name="precio" id="precio" />
                            </td>
                        </tr>
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
                            <td>
                            <?php
                            select_inmuebles_usuario();
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                O bien puedes 
                            </td>
                            <td>
                                <a href="../Vistas/alta_inmueble.php">Dar de alta un nuevo inmueble</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" name="guardar" class="btn-success" value="">Guardar</button>
                            </td>
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
