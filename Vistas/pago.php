<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <title>Pago</title>
        <?php
        include_once '../Vistas/header.php';
        ?>
        <script type="text/javascript">
            function datosTarjeta() {
                var tabla_datos = document.getElementById("datos_visa");
                tabla_datos.innerHTML("<tr>"
                        + "<td><label>Nombre titular</label><input type='text' name='titular'/></td>"
                        + "</tr><tr>"
                        + "<td><label>Número tarjeta</label><input type='number' name='num_tarjeta'/></td>"
                        + "</tr>"
                        + "<tr>"
                        + "<td><label>Caducidad</label><input type='text' name='caducidad' /></td>"
                        + "<td><label>CVV</label><input type='password' name='cvv' /></td>"
                        + "</tr>");
            }
        </script>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
                $usuario = $_SESSION['admin'];
            } else {
                no_sesion_iniciada();
            }
            if (isset($_SESSION['usuario_particular'])) {
                $usuario = $_SESSION['usuario_particular'];
            } else if (isset($_SESSION['usuario_profesional'])) {
                $usuario = $_SESSION['usuario_profesional'];
            }
                ?>
            </header>
            <main>
                <form action="pagoController.php" method="POST">
                    <input class="btn btn-primary" type="submit" name="paypal" value="PayPal" />
                    <input class="btn btn-primary" type="submit" name="visa" onclick="datosTarjeta()" value="Visa" />
                    <table id="datos_visa">
                    </table>
                    <table>
                        <tr>
                            <td><strong>Datos del inmueble</strong></td>
                            <td><strong>Datos del usuario</strong></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><?php echo $usuario; ?></td>
                        </tr>
                    </table>
                    <input class="btn-block btn-secondary" type="submit" name="guardar" value="Confirmar pago" />
                </form>
            </main>
        </body>
        <?php
        include_once '../Vistas/footer.html';
        ?>
</html>
