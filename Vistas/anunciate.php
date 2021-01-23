<!doctype html>
<html>
    <head>
        <title>Publica ya tu anuncio</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario'])) {
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
            <h3>Alta de un nuevo inmueble</h3>
                <form class="form-control-plaintext">
                    <table class="table">
                        <tr>
                            <td>
                                <input class="custom-file" type="file" value="Añade tus fotos"/></br>
                                <label>Puedes subir varias imágenes a la vez. Recuerda subir fotos de todas las estancias.</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select id="tipo_inmueble" type="picker" label="Tipo de inmueble" display="" aria-invalid="false" class="dropdown-menu">
                                    <option value="casa">Casa</option>
                                    <option value="atico">Ático</option>
                                    <option value="duplex">Dúplex</option>
                                    <option value="piso">Piso</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input tabindex="-1" type="radio" name="oferta" value="venta" checked="">Vendo</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input tabindex="-1" type="radio" name="oferta" value="alquiler">Alquilo</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                    <input tabindex="-1" type="radio" name="oferta" value="vacacional">Vacacional</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input placeholder="Precio de venta" id="precio" type="tel" label="Precio de venta" display="money" value=""></br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input placeholder="Precio de venta" id="superficie" type="tel" label="Superficie" display="surface" value=""></br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="" tabindex="-1" placeholder="Calle, número y población" value=""></br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Número de habitaciones</label>
                                <span class="">
                                    <button>-</button>
                                    <input tabindex="0" readonly="" class="" value="2">
                                    <button>+</button>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Número de baños</label>
                                <span class="">
                                    <button>-</button>
                                    <input tabindex="0" readonly="" class="" value="1">
                                    <button>+</button>
                                </span>
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
