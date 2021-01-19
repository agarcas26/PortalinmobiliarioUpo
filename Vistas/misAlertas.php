<!doctype html>
<html>
    <head>
        <title>Mis Alertas</title>
        <?php
        include_once '../header.php';
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
            <h1>Activar nueva alerta</h1>
            <label>Te avisaremos cuando haya alguna oferta disponible de las características que tú elijas</label>            
            <form>
                <input type="submit" name="guardar_alerta" value="Guardar alerta" />
                <table>
                    <tr>
                        <td>Nombre de la alerta</td>
                        <td><input type="text" name="nombre" /></td>
                    </tr>
                    <tr>
                        <td>Tipo de inmueble</td>
                        <td>
                            <select id="tipo_inmueble">
                                <option value="first">text1</option>
                                <option value="second">text2</option>
                                <option value="third">text3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo de oferta</td>
                        <td>
                            <select id="tipo_oferta">
                                <option value="alquiler">Alquiler</option>
                                <option value="venta">Venta</option>
                                <option value="vacacional">Vacacional</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Provincia</td>
                        <td>
                            <select id="tipo_inmueble">
                                <option value="first">text1</option>
                                <option value="second">text2</option>
                                <option value="third">text3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Localidad</td>
                        <td>
                            <select id="tipo_inmueble">
                                <option value="first">text1</option>
                                <option value="second">text2</option>
                                <option value="third">text3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Precio máximo</td>
                        <td><input type="number" name="precio_max" /></td></td>
                    </tr>
                </table>
            </form>
        </main>
    </body>
    <footer class="footer bg-light">
        <?php
        include_once '../Vistas/footer.html';
        ?>
    </footer>
</html>
