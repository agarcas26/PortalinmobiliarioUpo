<!doctype html>
<html>
    <head>
        <title>Pago</title>
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
        <header>
            <img id="logo" src="" />
            <a href="">Inmobiliaria UPO</a>
        </header>
        <main>
            <form action="psgoController.php" method="POST">
                <input type="submit" name="paypal" value="PayPal" />
                <input type="submit" name="visa" onclick="datosTarjeta()" value="Visa" />
                <table id="datos_visa">
                </table>
                <table>
                    <tr>
                        <td><strong>Datos del inmueble</strong></td>
                        <td><strong>Datos del usuario</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <input type="submit" name="guardar" value="Confirmar pago" />
            </form>
        </main>
    </body>
</html>
