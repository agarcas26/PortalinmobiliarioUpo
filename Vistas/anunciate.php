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
                <form>
                    <button>Añade tus fotos</button>
                    <label>Puedes subir varias a la vez. Recuerda subir fotos de todas las estancias.</label>
                    <select id="tipo_inmueble" type="picker" label="Tipo de inmueble" display="" aria-invalid="false" class="">
                        <option value="casa">Casa</option>
                        <option value="atico">Ático</option>
                        <option value="duplex">Dúplex</option>
                        <option value="piso">Piso</option>
                    </select>
                    <ul>
                        <li>
                            <label class="" tabindex="0">
                                <input tabindex="-1" type="radio" name="oferta" value="venta" checked="">Vendo</label>
                        </li>
                        <li>
                            <label class="" tabindex="0">
                                <input tabindex="-1" type="radio" name="oferta" value="alquiler">Alquilo</label>
                        </li>
                        <li>
                            <label class="" tabindex="0">
                                <input tabindex="-1" type="radio" name="oferta" value="vacacional">Vacacional</label>
                        </li>
                    </ul>
                    <input placeholder="Precio de venta" id="precio" type="tel" label="Precio de venta" display="money" value="">
                    <input placeholder="Precio de venta" id="superficie" type="tel" label="Superficie" display="surface" value="">
                    <input class="" tabindex="-1" placeholder="Calle, número y población" value="">
                    <label>Número de habitaciones</label>
                    <span class="">
                        <button>-</button>
                        <input tabindex="0" readonly="" class="" value="2">
                        <button>+</button>
                    </span>
                    <label>Número de baños</label>
                    <span class="">
                        <button>-</button>
                        <input tabindex="0" readonly="" class="" value="1">
                        <button>+</button>
                    </span>

                    <input type="submit" name="guardar" value="Guardar">
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
